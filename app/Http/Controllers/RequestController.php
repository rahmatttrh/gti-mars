<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\CargoItem;
use App\Models\Department;
use App\Models\Port;
use App\Models\Request as ModelsRequest;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class RequestController extends Controller
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

   public function check(Request $req)
   {
      // $schedules = Schedule::where('date', $req->date)->where('origin_id', $req->origin_id)->where('destination_id', $req->destination_id)->get();
      $schedules = Schedule::get();
      $activities = Activity::get();
      $ports = Port::get();
      $department = Department::where('email', auth()->user()->email)->first();

      $activity = Activity::find($req->activity);
      return view('pages.request.check', [
         'department' => $department,
         'origin' => $req->origin,
         'destination' => $req->destination,
         'date' => $req->departure_date,
         'activity' => $activity,
         'schedules' => $schedules,
         'activities' => $activities,
         'ports' => $ports
      ])->with('i');
   }

   public function store(Request $req)
   {
      $department = Department::find($req->department);
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
         'department_id' => $req->department,
         'type_id' => $req->type,
         'activity_id' => $req->activity,
         'date' => $req->date,
         'schedule_id' => $req->schedule,
         'status' => 01
      ]);

      return redirect()->route('request.detail', enkripRambo($request->id))->with('success', 'Request Activity successfully saved');
   }

   public function detail($id)
   {
      $dekripId = dekripRambo($id);
      $request = ModelsRequest::find($dekripId);
      $cargoItems = CargoItem::where('request_id', $request->id)->get();
      return view('pages.request.detail', [
         'request' => $request,
         'cargoItems' => $cargoItems
      ])->with('i');
   }

   public function draft()
   {
      $requests = ModelsRequest::where('status', 1)->get();
      return view('pages.request.draft', [
         'requests' => $requests
      ])->with('i');
   }

   public function progress()
   {
      $requests = ModelsRequest::where('status', 2)->get();
      return view('pages.request.progress', [
         'requests' => $requests
      ])->with('i');
   }




   public function release($id)
   {
      $dekripId = dekripRambo($id);
      $request = ModelsRequest::find($dekripId);

      $request->update([
         'status' => 02
      ]);

      return redirect()->back()->with('success', 'Request Activity successfully send to marine');
   }
}
