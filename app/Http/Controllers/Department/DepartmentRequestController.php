<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Department;
use App\Models\Port;
use App\Models\Request as ModelsRequest;
use App\Models\Schedule;
use App\Models\Vessel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DepartmentRequestController extends Controller
{
   public function create()
   {
      $activities = Activity::get();
      $ports = Port::get();
      return view('pages.request.create', [
         'activities' => $activities,
         'ports' => $ports
      ]);
   }

   public function save(Request $req)
   {

      $department = Department::where('email', auth()->user()->email)->first();
      // dd($department);
      $now = Carbon::today();
      $request = ModelsRequest::orderBy("created_at", "desc")->first();

      if (isset($request)) {
         $code =
            "R/" . $department->code . '/' . $now->format("dmy") . '/' . ($request->id + 1);
      } else {
         $code = "R/"  . $department->code . '/' . $now->format("dmy") . '/' . 1;
      }
      $request = ModelsRequest::create([
         'code' => $code,
         'department_id' => $department->id,
         'func' => $department->code,
         'activity_id' => $req->activity,
         'date' => $req->date,
         'description' => $req->desc,
         'origin_id' => $req->origin,
         'destination_id' => $req->destination,
         'status' => 00
      ]);

      return redirect()->route('request.detail', enkripRambo($request->id))->with('success', 'Request Activity successfully saved');
   }

   public function draft()
   {
      $requests = ModelsRequest::where('status', 0)->get();
      return view('pages.request.draft', [
         'requests' => $requests
      ])->with('i');
   }

   public function progress()
   {
      $today = Carbon::now();
      $month = $today->format('m');
      $vessels = Vessel::get();
      $schedules = Schedule::get();
      $depart = Department::where('email', auth()->user()->email)->first();

      $departs = ModelsRequest::selectRaw('id, date, department_id, code, origin_id, destination_id, func, status , description, schedule_id, activity_id')->where('department_id', $depart->id)->where('status', '>', 0)->orderBy('department_id', 'desc')->get()->groupBy('func');

      return view('pages.request.progress', [
         'title' => 'Progress',
         'departs' => $departs,
         'vessels' => $vessels,
         'schedules' => $schedules,
         'month' => $month
      ])->with('i');
   }

   public function release($id)
   {
      $dekripId = dekripRambo($id);
      $request = ModelsRequest::find($dekripId);

      $request->update([
         'status' => 01
      ]);

      return redirect()->route('depart.request.progress')->with('success', 'Request Activity successfully send to marine');
   }
}
