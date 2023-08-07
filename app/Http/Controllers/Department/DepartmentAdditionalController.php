<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Port;
use App\Models\Report;
use App\Models\Request as ModelsRequest;
use App\Models\Schedule;
use App\Models\ScheduleRoute;
use App\Models\Vessel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DepartmentAdditionalController extends Controller
{
   public function store(Request $req)
   {

      $now = Carbon::today();
      $schedule = Schedule::find($req->schedule);
      $lastRequest = ModelsRequest::orderBy("created_at", "desc")->first();
      $department = auth()->user()->getDepartment();
      // dd($department->code);
      $employee = Employee::find(auth()->user()->getEmployeeId());
      $destination = Port::find($req->port);
      $vessel = Vessel::find($schedule->vessel_id);

      if (isset($lastRequest)) {
         $code =
            "R/" . $department->code . '/' . $now->format("dmy") . '/' . ($lastRequest->id + 1);
      } else {
         $code = "R/"  . $department->code . '/' . $now->format("dmy") . '/' . 1;
      }

      $request = ModelsRequest::create([
         'code' => $code,
         'type' => 1,
         'class' => 'additional',
         'schedule_id' => $schedule->id,
         'employee_id' => $employee->id,
         'department_id' => $department->id,
         'func' => $department->code,
         'activity_id' => $req->activity,
         'date' => $req->date,
         'description' => $req->desc,
         'origin_id' => auth()->user()->getPort(),
         'destination_id' => $req->port,
         'destination_name' => $destination->name,
         'status' => 2
      ]);


      // $lastScheduleRoutes = ScheduleRoute::where('schedule_id', $schedule->id)->orderBy('created_at', 'desc')->first();
      // $route = ScheduleRoute::where('schedule_id', $schedule->id)->where('port_id', $req->port)->first();


      // if ($route) {
      //    $request->update([
      //       'rank' => $route->rank
      //    ]);
      // } else {

      // $fromScheduleRoute = ScheduleRoute::where('schedule_id', $schedule->id)->where('port_id', $req->from)->first();

      // $remainScheduleRoutes = ScheduleRoute::where('schedule_id', $schedule->id)->where('rank', '>', $fromScheduleRoute->rank)->get();

      // foreach ($remainScheduleRoutes as $route) {
      //    $route->update([
      //       'rank' => $route->rank + 1
      //    ]);
      // }
      // ScheduleRoute::create([
      //    'schedule_id' => $schedule->id,
      //    'request_id' => $request->id,
      //    'port_id' => $req->port,
      //    'rank' => $fromScheduleRoute->rank + 1
      // ]);

      // $remainRequest = ModelsRequest::where('schedule_id', $schedule->id)->where('rank', '>', $fromScheduleRoute->rank)->get();
      // foreach ($remainRequest as $remreq) {
      //    $remreq->update([
      //       'rank' => $remreq->rank + 1
      //    ]);
      // }
      // $request->update([
      //    'rank' => $fromScheduleRoute->rank + 1
      // ]);
      // }


      Report::create([
         'schedule_id' => $schedule->id,
         'vessel_id' => $schedule->vessel_id,
         'employee_id' => $employee->id,
         'status_id' => 14,
         'port_id' => $req->port
      ]);

      return redirect()->back()->with('success', 'Additional successfully added to schedule');
   }

   public function send($id)
   {
      $dekripId = dekripRambo($id);
      $request = ModelsRequest::find($dekripId);
      $request->update([
         'status' => 5
      ]);

      return redirect()->back()->with('success', 'Additional successfully send to marine');
   }
}
