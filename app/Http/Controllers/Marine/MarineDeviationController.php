<?php

namespace App\Http\Controllers\Marine;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Deviation;
use App\Models\DeviationReport;
use App\Models\Employee;
use App\Models\Port;
use App\Models\Report;
use App\Models\Request as ModelsRequest;
use App\Models\Schedule;
use App\Models\ScheduleRoute;
use App\Models\Vessel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MarineDeviationController extends Controller
{

   public function store(Request $req)
   {
      // $req->validate([
      //    'desc' => 'required'
      // ]);

      $now = Carbon::today();
      $schedule = Schedule::find($req->schedule);
      $lastRequest = ModelsRequest::orderBy("created_at", "desc")->first();
      $department = Department::find(1);
      $employee = Employee::find(1);
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
         'class' => 'deviation',
         'schedule_id' => $schedule->id,
         'employee_id' => $employee->id,
         'department_id' => $department->id,
         'func' => $department->code,
         'activity_id' => $req->activity,
         'date' => $req->date,
         'description' => $req->desc,
         'origin_id' => $req->from,
         'destination_id' => $req->port,
         'destination_name' => $destination->name,
         'status' => 2
      ]);


      $lastScheduleRoutes = ScheduleRoute::where('schedule_id', $schedule->id)->orderBy('created_at', 'desc')->first();

      // Cek apakah destinasi yg dipilih sudah ada di rute awal
      $route = ScheduleRoute::where('schedule_id', $schedule->id)->where('port_id', $req->port)->first();


      if ($route) {
         // Jika sudah ada, maka masukan rank yang sudah ada
         // dd('sudah ada');
         $request->update([
            'rank' => $route->rank
         ]);
      } else {
         // Jika belum ada

         
         $fromScheduleRoute = ScheduleRoute::where('schedule_id', $schedule->id)->where('port_id', $req->from)->first();
         // dd($fromScheduleRoute->rank);
         $remainScheduleRoutes = ScheduleRoute::where('schedule_id', $schedule->id)->where('rank', '>', $fromScheduleRoute->rank)->get();
         // dd($remainScheduleRoutes);
         foreach ($remainScheduleRoutes as $route) {
            $route->update([
               'rank' => $route->rank + 1
            ]);
         }
         ScheduleRoute::create([
            'schedule_id' => $schedule->id,
            'request_id' => $request->id,
            'port_id' => $req->port,
            'rank' => $fromScheduleRoute->rank + 1
         ]);

         $remainRequest = ModelsRequest::where('schedule_id', $schedule->id)->where('rank', '>', $fromScheduleRoute->rank)->get();
         foreach ($remainRequest as $remreq) {
            $remreq->update([
               'rank' => $remreq->rank + 1
            ]);
         }
         $request->update([
            'rank' => $fromScheduleRoute->rank + 1
         ]);
      }


      Report::create([
         'schedule_id' => $schedule->id,
         'vessel_id' => $schedule->vessel_id,
         'employee_id' => 1,
         'status_id' => 18,
         'port_id' => $req->port
      ]);


      // DeviationReport::create([
      //    'deviation_id' => $deviation->id,
      //    'assign' => $now
      // ]);

      return redirect()->back()->with('success', 'Deviation successfully added to Schedule');
   }

   public function send($id)
   {
      $dekripId = dekripRambo($id);
      $request = ModelsRequest::find($dekripId);

      $request->update([
         'status' => 3
      ]);

      return redirect()->back()->with('success', 'Deviation successfully send to Vessel');
   }

   public function storeA(Request $req)
   {
      // $req->validate([
      //    'desc' => 'required'
      // ]);

      $now = Carbon::today();
      $schedule = Schedule::find($req->schedule);
      $request = ModelsRequest::orderBy("created_at", "desc")->first();
      $department = Department::find(1);
      $employee = Employee::find(1);
      $destination = Port::find($req->port);

      $vessel = Vessel::find($schedule->vessel_id);
      $weight = $schedule->total_weight + $request->total_weight;
      $size = $schedule->total_size + $request->total_size;

      if (isset($request)) {
         $code =
            "R/" . $department->code . '/' . $now->format("dmy") . '/' . ($request->id + 1);
      } else {
         $code = "R/"  . $department->code . '/' . $now->format("dmy") . '/' . 1;
      }



      $fromScheduleRoute = ScheduleRoute::where('schedule_id', $schedule->id)->where('port_id', $req->from)->first();
      // dd($scheduleRoute->port_id);

      $remainScheduleRoutes = ScheduleRoute::where('schedule_id', $schedule->id)->where('rank', '>', $fromScheduleRoute->rank)->get();
      // dd($remainScheduleRoutes);
      foreach ($remainScheduleRoutes as $route) {
         $route->update([
            'rank' => $route->rank + 1
         ]);
      }



      $request = ModelsRequest::create([
         'code' => $code,
         'type' => 1,
         'class' => 'deviation',
         'schedule_id' => $schedule->id,
         'employee_id' => $employee->id,
         'department_id' => $department->id,
         'func' => $department->code,
         'activity_id' => $req->activity,
         'date' => $req->date,
         'description' => $req->desc,
         'origin_id' => $req->from,
         'destination_id' => $req->port,
         'destination_name' => $destination->name,
         'status' => 20
      ]);

      ScheduleRoute::create([
         'schedule_id' => $schedule->id,
         'request_id' => $request->id,
         'port_id' => $req->port,
         'rank' => $fromScheduleRoute->rank + 1
      ]);


      Report::create([
         'schedule_id' => $schedule->id,
         'vessel_id' => $schedule->vessel_id,
         'employee_id' => 1,
         'status_id' => 18,
         'port_id' => $req->port
      ]);


      // DeviationReport::create([
      //    'deviation_id' => $deviation->id,
      //    'assign' => $now
      // ]);

      return redirect()->back()->with('success', 'Deviation successfully added to Schedule');
   }


   // public function add(Request $req)
   // {
   //    $req->validate([
   //       'desc' => 'required'
   //    ]);
   //    $now = Carbon::now();



   //    $deviation = Deviation::create([
   //       'status' => 0,
   //       'schedule_id' => $req->schedule,
   //       'port_id' => $req->port,
   //       'desc' => $req->desc,
   //       'reason' => $req->reason
   //    ]);

   //    DeviationReport::create([
   //       'deviation_id' => $deviation->id,
   //       'assign' => $now
   //    ]);

   //    return redirect()->back()->with('success', 'Deviation successfully added to Schedule');
   // }

   public function delete($id)
   {
      $dekripId = dekripRambo($id);
      $deviation = Deviation::find($dekripId);
      $deviationReport = DeviationReport::where('deviation_id', $deviation->id)->first();

      $deviationReport->delete();
      $deviation->delete();

      return redirect()->back()->with('success', 'Deviation successfully deleted');
      // dd($deviation->desc);
   }
}
