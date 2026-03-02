<?php

namespace App\Http\Controllers\Marine;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\ReportRequest;
use App\Models\Request as ModelsRequest;
use App\Models\RequestReject;
use App\Models\Schedule;
use App\Models\ScheduleRoute;
use App\Models\Vessel;
use Illuminate\Http\Request;

class MarineAdditionalController extends Controller
{

   public function approve(Request $req)
   {
      // dd($req->requestId);
      $request = ModelsRequest::find($req->requestId);
      $schedule = Schedule::find($request->schedule_id);
      $masterRoute = ScheduleRoute::where('schedule_id', $schedule->id)->first();
      $route = ScheduleRoute::where('schedule_id', $schedule->id)->where('port_id', $request->destination_id)->first();
      // dd($req->from);

      $vessel = Vessel::find($schedule->vessel_id);
      $weight = $schedule->total_weight + $request->total_weight;
      $size = $schedule->total_size + $request->total_size;
      if ($weight > $vessel->deadweight) {
         return redirect()->back()->with('warning', 'Failed, Total Weight (' . $request->total_weight  .  ' ton) melebihi Deadweight Vessel (' . $schedule->total_weight  . 'ton /' . $vessel->deadweight . ' ton)');
      }
      if ($size > $vessel->deckspace) {
         return redirect()->back()->with('warning', 'Failed, Total Size (' . $request->total_size  .  ') melebihi Deck Space Vessel (' . $schedule->total_size  . ' /' . $vessel->deckspace . ')');
      }

      if ($masterRoute) {
         dd('ada master');
         if ($route != null) {
            // dd('ada');
            $request->update([
               'status' => 4,
               'rank' => $route->rank
            ]);
            ReportRequest::create([
               'request_id' => $request->id,
               'status_id' => 1
            ]);
         } else {
            // dd('ga ada');
            $fromScheduleRoute = ScheduleRoute::where('schedule_id', $schedule->id)->where('port_id', $req->from)->first();

            // dd($req->from);
            if ($fromScheduleRoute) {
               dd('from nya  ada');
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
            } else {
               dd('fromnya ga ada');
            }




            $request->update([
               'status' => 4,
               'rank' => $fromScheduleRoute->rank + 1
            ]);
            ReportRequest::create([
               'request_id' => $request->id,
               'status_id' => 1,

            ]);
         }
      } else {
         // dd('ga ada master');
         ScheduleRoute::create([
            'schedule_id' => $schedule->id,
            'request_id' => $request->id,
            'port_id' => $request->origin_id,
            'rank' => 1
         ]);
         ScheduleRoute::create([
            'schedule_id' => $schedule->id,
            'request_id' => $request->id,
            'port_id' => $request->destination_id,
            'rank' => 2
         ]);
         $request->update([
            'status' => 2,
            'rank' =>  1
         ]);
         ReportRequest::create([
            'request_id' => $request->id,
            'status_id' => 1,

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

   public function approveee(Request $req)
   {
      // dd($req->request_id);
      $request = ModelsRequest::find($req->requestId);
      $schedule = Schedule::find($req->schedule);
      $vessel = Vessel::find($schedule->vessel_id);
      $weight = $schedule->total_weight + $request->total_weight;
      $size = $schedule->total_size + $request->total_size;
      // dd($schedule->total_weight);
      // $lastScheduleRoutes = ScheduleRoute::where('schedule_id', $schedule->id)->orderBy('created_at', 'desc')->first();
      // dd($lastScheduleRoutes->rank);

      if ($weight > $vessel->deadweight) {
         return redirect()->back()->with('warning', 'Failed, Total Weight (' . $request->total_weight  .  ' ton) melebihi Deadweight Vessel (' . $schedule->total_weight  . 'ton /' . $vessel->deadweight . ' ton)');
      } elseif ($size > $vessel->deckspace) {
         return redirect()->back()->with('warning', 'Failed, Total Size (' . $request->total_size  .  ') melebihi Deck Space Vessel (' . $schedule->total_size  . ' /' . $vessel->deckspace . ')');
      } else {
         $scheduleRoutes = ScheduleRoute::where('schedule_id', $schedule->id)->get();
         // dd($scheduleRoutes != null);
         if ($scheduleRoutes->count() > 0) {
            // dd('ada');
            $lastScheduleRoutes = ScheduleRoute::where('schedule_id', $schedule->id)->orderBy('created_at', 'desc')->first();
            $route = ScheduleRoute::where('schedule_id', $schedule->id)->where('port_id', $request->destination_id)->first();
            if ($route) {
               // dd('sudah ada');
               $request->update([
                  'rank' => $route->rank
               ]);
            } else {
               // dd('ok');
               ScheduleRoute::create([
                  'schedule_id' => $schedule->id,
                  'request_id' => $request->id,
                  'port_id' => $request->destination_id,
                  'rank' => $lastScheduleRoutes->rank + 1
               ]);
               $request->update([
                  'rank' => $lastScheduleRoutes->rank + 1
               ]);
            }
         } else {
            // dd('tidak ada');
            $route = ScheduleRoute::where('schedule_id', $schedule->id)->where('port_id', $request->destination_id)->first();
            if ($route) {
               // dd('sudah ada');
            } else {
               // dd('ok');
               ScheduleRoute::create([
                  'schedule_id' => $schedule->id,
                  'request_id' => $request->id,
                  'port_id' => $request->destination_id,
                  'rank' => 1
               ]);
            }

            $request->update([
               'rank' => 1
            ]);
         }

         $request->update([
            'status' => 02,
            'schedule_id' => $req->schedule,
            'remark' => $req->remark
         ]);

         $schedule->update([
            'total_size' => $schedule->total_size + $request->total_size,
            'total_weight' => $schedule->total_weight + $request->total_weight
         ]);


         // $body = $request->activity->name . ' ' . $request->description . ' has successfully set on schedule vessel ' . $schedule->vessel->name . ' at ' . Carbon::parse($schedule->date)->format('d/m/Y');

         // $data = [
         //    'to' => $request->employee->name,
         //    'from' => 'Marine Department',
         //    'subject' => 'Request Activity Progress',
         //    'request' => $request,
         //    'body' => $body,
         //    'cargos' => null,
         //    'link' => route('request.detail', enkripRambo($request->id))
         // ];
         // Mail::to("develop@ekanuri.com")->send(new ApprovalEmail($data));



         return redirect()->route('schedule.detail', enkripRambo($schedule->id))->with('success', 'Request Activity successfully set on Schedule');
      }
   }

   public function approvec(Request $req)
   {
      // dd($req->requestId);
      $request = ModelsRequest::find($req->requestId);
      $schedule = Schedule::find($request->schedule_id);
      $masterRoute = ScheduleRoute::where('schedule_id', $schedule->id)->first();
      $route = ScheduleRoute::where('schedule_id', $schedule->id)->where('port_id', $request->destination_id)->first();
      // dd($req->from);

      $vessel = Vessel::find($schedule->vessel_id);
      $weight = $schedule->total_weight + $request->total_weight;
      $size = $schedule->total_size + $request->total_size;
      if ($weight > $vessel->deadweight) {
         return redirect()->back()->with('warning', 'Failed, Total Weight (' . $request->total_weight  .  ' ton) melebihi Deadweight Vessel (' . $schedule->total_weight  . 'ton /' . $vessel->deadweight . ' ton)');
      }
      if ($size > $vessel->deckspace) {
         return redirect()->back()->with('warning', 'Failed, Total Size (' . $request->total_size  .  ') melebihi Deck Space Vessel (' . $schedule->total_size  . ' /' . $vessel->deckspace . ')');
      }

      if ($masterRoute) {
         dd('ada master');
         if ($route != null) {
            // dd('ada');
            $request->update([
               'status' => 4,
               'rank' => $route->rank
            ]);
            ReportRequest::create([
               'request_id' => $request->id,
               'status_id' => 1
            ]);
         } else {
            // dd('ga ada');
            $fromScheduleRoute = ScheduleRoute::where('schedule_id', $schedule->id)->where('port_id', $req->from)->first();

            // dd($req->from);
            if ($fromScheduleRoute) {
               dd('from nya  ada');
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
            } else {
               dd('fromnya ga ada');
            }




            $request->update([
               'status' => 4,
               'rank' => $fromScheduleRoute->rank + 1
            ]);
            ReportRequest::create([
               'request_id' => $request->id,
               'status_id' => 1,

            ]);
         }
      } else {
         // dd('ga ada master');
         ScheduleRoute::create([
            'schedule_id' => $schedule->id,
            'request_id' => $request->id,
            'port_id' => $request->origin_id,
            'rank' => 1
         ]);
         ScheduleRoute::create([
            'schedule_id' => $schedule->id,
            'request_id' => $request->id,
            'port_id' => $request->destination_id,
            'rank' => 2
         ]);
         $request->update([
            'status' => 2,
            'rank' =>  1
         ]);
         ReportRequest::create([
            'request_id' => $request->id,
            'status_id' => 1,

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

   public function approveb(Request $req)
   {
      // dd($req->requestId);
      $request = ModelsRequest::find($req->requestId);
      $schedule = Schedule::find($request->schedule_id);

      $route = ScheduleRoute::where('schedule_id', $schedule->id)->where('port_id', $request->destination_id)->first();
      // dd($route);
      if ($route != null) {
         // dd('ada');
         $request->update([
            'rank' => $route->rank
         ]);
      } else {
         // dd('ga ada');
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
