<?php

namespace App\Http\Controllers\Marine;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\ReportRequest;
use App\Models\Request as ModelsRequest;
use App\Models\RequestReject;
use App\Models\Schedule;
use App\Models\ScheduleRoute;
use Illuminate\Http\Request;

class MarineAdditionalController extends Controller
{
   public function approve(Request $req)
   {
      // dd($req->requestId);
      $request = ModelsRequest::find($req->requestId);
      $schedule = Schedule::find($request->schedule_id);

      $route = ScheduleRoute::where('schedule_id', $schedule->id)->where('port_id', $request->destination_id)->first();
      if ($route) {
         $request->update([
            'rank' => $route->rank
         ]);
      } else {
         $fromScheduleRoute = ScheduleRoute::where('schedule_id', $schedule->id)->where('port_id', $req->from)->first();



         $remainScheduleRoutes = ScheduleRoute::where('schedule_id', $schedule->id)->where('rank', '>', $fromScheduleRoute->rank)->get();
         foreach ($remainScheduleRoutes as $route) {
            $route->update([
               'rank' => $route->rank + 1
            ]);
         }
         ScheduleRoute::create([
            'schedule_id' => $schedule->id,
            'request_id' => $request->id,
            'port_id' => $request->destination_id,
            'rank' => $fromScheduleRoute->rank + 1
         ]);

         $remainRequest = ModelsRequest::where('schedule_id', $schedule->id)->where('rank', '>', $fromScheduleRoute->rank)->get();
         foreach ($remainRequest as $remreq) {
            $remreq->update([
               'rank' => $remreq->rank + 1
            ]);
         }
         $request->update([
            'status' => 4,
            'rank' => $fromScheduleRoute->rank + 1
         ]);
         ReportRequest::create([
            'request_id' => $request->id,
            'status_id' => 15,

         ]);
      }

      Report::create([
         'schedule_id' => $schedule->id,
         'vessel_id' => $schedule->vessel_id,
         'employee_id' => 1,
         'status_id' => 15,
         'port_id' => $req->port
      ]);

      return redirect()->back()->with('success', 'Additional Request successfully approved');
   }

   public function reject(Request $req)
   {
      $request = ModelsRequest::find($req->requestId);
      $request->update([
         'status' => 505
      ]);

      RequestReject::create([
         'request_id' => $request->id,
         'reason' => $req->reason
      ]);

      return redirect()->back()->with('success', 'Additional Request successfully rejected');
   }
}
