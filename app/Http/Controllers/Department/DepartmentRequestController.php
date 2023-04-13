<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Port;
use App\Models\Request as ModelsRequest;
use App\Models\Schedule;
use App\Models\Type;
use App\Models\Vessel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DepartmentRequestController extends Controller
{
   public function create()
   {
      if (auth()->user()->hasRole('logistic')) {
         $acts = Activity::where('type_id', 1)->get();
      } elseif (auth()->user()->hasRole('drilling')) {
         $acts = Activity::where('type_id', 3)->orWhere('type_id', 4)->get();
      }
      $activities = $acts;
      $types = Type::get();
      $ports = Port::get();
      return view('pages.request.create', [
         'activities' => $activities,
         'ports' => $ports,
         'types' => $types
      ]);
   }

   public function save(Request $req)
   {

      $employee = Employee::where('email', auth()->user()->email)->first();
      $department = Department::find($employee->department->id);
      $now = Carbon::today();
      $request = ModelsRequest::orderBy("created_at", "desc")->first();

      if ($department->id == 2) {
         $type = 1;
      } elseif ($department->id == 3) {
         $type = 2;
      }

      if (isset($request)) {
         $code =
            "R/" . $department->code . '/' . $now->format("dmy") . '/' . ($request->id + 1);
      } else {
         $code = "R/"  . $department->code . '/' . $now->format("dmy") . '/' . 1;
      }
      $request = ModelsRequest::create([
         'code' => $code,
         'type' => $type,
         'employee_id' => $employee->id,
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
      $employee = Employee::where('email', auth()->user()->email)->first();

      $requests = ModelsRequest::where('status', 0)->where('department_id', $employee->department_id)->get();
      return view('pages.request.draft', [
         'requests' => $requests
      ])->with('i');
   }

   public function progress()
   {
      $employee = Employee::where('email', auth()->user()->email)->first();
      $today = Carbon::now();
      $month = $today->format('m');
      $vessels = Vessel::get();
      $schedules = Schedule::get();
      // $depart = Department::where('email', auth()->user()->email)->first();

      $departs = ModelsRequest::selectRaw('id, date, department_id, code, origin_id, destination_id, func, status , description, schedule_id, activity_id')->where('department_id', $employee->department_id)->where('status', '>', 0)->orderBy('department_id', 'desc')->get()->groupBy('func');

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

      return redirect()->route('request.progress')->with('success', 'Request Activity successfully send to marine');
   }
}
