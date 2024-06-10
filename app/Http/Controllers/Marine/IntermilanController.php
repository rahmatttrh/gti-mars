<?php

namespace App\Http\Controllers\Marine;

use App\Http\Controllers\Controller;
use App\Models\ReportRequest;
use App\Models\Request as ModelsRequest;
use App\Models\RequestHistory;
use App\Models\Schedule;
use App\Models\ScheduleRoute;
use App\Models\Vessel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IntermilanController extends Controller
{
   public function selectSchedule(Request $req)
   {
      // dd($req->request_id);
      // dd('ok');
      // dd($req->schedule);
      $request = ModelsRequest::find($req->requestId);
      $schedule = Schedule::find($req->schedule);
      // dd($req->schedule);
      if (!$schedule->vessel_id) {
         // dd('ok');
         return redirect()->back()->with('error', 'Failed! Vessel is empty, choose a vessel first');
      }
      // dd( $request);

      $vessel = Vessel::find($schedule->vessel_id);
      $weight = $schedule->total_weight + $request->total_weight;
      $size = $schedule->total_size + $request->total_size;

      $totalDepart = count($request->passengerItems->where('type', 'Departure'));
      $totalReturn = count($request->passengerItems->where('type', 'Return'));
      if ($totalDepart > 150) {
         return redirect()->back()->with('error', 'Total Pax Departure ' . $totalDepart . ' melebihi Kapasitas (15
         )');
      }

      if ($totalReturn > 150) {
         return redirect()->back()->with('error', 'Total Pax Return ' . $totalReturn . ' melebihi Kapasitas (15
         )');
      }

      // $lastScheduleRoutes = ScheduleRoute::where('schedule_id', $schedule->id)->orderBy('created_at', 'desc')->first();
      // dd($lastScheduleRoutes->rank);

      if ($weight > $vessel->deadweight) {
         return redirect()->back()->with('warning', 'Failed, Total Weight (' . $request->total_weight  .  ' ton) melebihi Deadweight Vessel (' . $schedule->total_weight  . 'ton /' . $vessel->deadweight . ' ton)');
      }
      if ($size > $vessel->deckspace) {
         return redirect()->back()->with('warning', 'Failed, Total Size (' . $request->total_size  .  ') melebihi Deck Space Vessel (' . $schedule->total_size  . ' /' . $vessel->deckspace . ')');
      }

      $scheduleRoutes = ScheduleRoute::where('schedule_id', $schedule->id)->get();
      // dd($scheduleRoutes != null);

      if ($scheduleRoutes->count() > 0) {
         // dd('ada schedule route');
         $lastScheduleRoutesA = ScheduleRoute::where('schedule_id', $schedule->id)->orderBy('created_at', 'desc')->first();
         $routeFrom = ScheduleRoute::where('schedule_id', $schedule->id)->where('port_id', $request->origin_id)->first();
         if (!$routeFrom) {
            // dd('from tidak ada di route');
            ScheduleRoute::create([
               'schedule_id' => $schedule->id,
               'request_id' => $request->id,
               'date' =>  Carbon::now(),
               'port_id' => $request->origin_id,
               'rank' => $lastScheduleRoutesA->rank + 1,
               'date' => null,
               'status' => 1
            ]);
         }

         $lastScheduleRoutes = ScheduleRoute::where('schedule_id', $schedule->id)->orderBy('created_at', 'desc')->first();
         $route = ScheduleRoute::where('schedule_id', $schedule->id)->where('port_id', $request->destination_id)->first();

         if ($route) {
            // dd('from rute sudah ada');
            $request->update([
               'schedule_id' => $schedule->id,
               'rank' => $route->rank
            ]);
         } else {
            // dd('blm ada rute');
            ScheduleRoute::create([
               'schedule_id' => $schedule->id,
               'request_id' => $request->id,
               'date' =>  Carbon::now(),
               'port_id' => $request->destination_id,
               'rank' => $lastScheduleRoutes->rank + 1,
               'date' => null,
               'status' => 1
            ]);
            $request->update([
               'rank' => $lastScheduleRoutes->rank + 1
            ]);
         }
      } else {
         // dd('tidak ada');
         ScheduleRoute::create([
            'schedule_id' => $schedule->id,
            'request_id' => $request->id,
            'date' =>  Carbon::now(),
            'port_id' => $request->origin_id,
            'rank' => 1,
            'status' => 1
         ]);

         ScheduleRoute::create([
            'schedule_id' => $schedule->id,
            'request_id' => $request->id,
            'date' =>  Carbon::now(),
            'port_id' => $request->destination_id,
            'rank' => 2,
            'status' => 1
         ]);

         $request->update([
            'rank' => 1,
            'schedule_id' => $schedule->id
         ]);
      }

      $now = Carbon::now();
      if ($request->class == 'main') {
         $request->update([
            'status' => 02,
            'schedule_id' => $request->schedule_id,
            
         ]);
         RequestHistory::create([
            'request_id' => $request->id,
            'date' => $now,
            'type' => 'validated',
            // 'desc' => $req->desc

         ]);
      } elseif ($request->class == 'additional') {
         $request->update([
            'status' => 04,
            'schedule_id' => $request->schedule_id,
            // 'remark' => $req->remark
         ]);
         RequestHistory::create([
            'request_id' => $request->id,
            'date' => $now,
            'type' => 'validated',
            // 'desc' => $req->desc
         ]);
         ReportRequest::create([
            'request_id' => $request->id,
            'status_id' => 15,
         ]);
      } 

      if ($request->activity_id ==3) {
         $request->update([
            'status' => 02,
            'schedule_id' => $schedule->id,
            // 'remark' => $req->remark
         ]);
      }

      $request->update([
         'schedule_id' => $schedule->id,
         'undo' => null,
         'reason' => null
      ]);


      $schedule->update([
         'total_size' => $schedule->total_size + $request->total_size,
         'total_weight' => $schedule->total_weight + $request->total_weight
      ]);


      return redirect()->route('marine.request')->with('success', 'Request Activity assigned');
   }
}
