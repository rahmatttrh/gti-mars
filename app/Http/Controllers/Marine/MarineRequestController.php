<?php

namespace App\Http\Controllers\Marine;

use App\Http\Controllers\Controller;
use App\Mail\ApprovalEmail;
use App\Models\Port;
use App\Models\ReportRequest;
use App\Models\Request as ModelsRequest;
use App\Models\RequestHistory;
use App\Models\Schedule;
use App\Models\ScheduleRoute;
use App\Models\Type;
use App\Models\Vessel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MarineRequestController extends Controller
{

   public function inbox(){
      $requests = ModelsRequest::where('status', 1)->get();
      return view('pages-stisla.marine.request.inbox', [
         'requests' => $requests
      ])->with('i');
   }

   public function progress(){
      $requests = ModelsRequest::where('status', '>', 1)->where('status', '<=', 12)->get();
      return view('pages-stisla.marine.request.progress', [
         'requests' => $requests
      ])->with('i');
   }

   public function history(){
      $requests = ModelsRequest::where('status', '=', 12)->get();
      return view('pages-stisla.marine.request.history', [
         'requests' => $requests
      ])->with('i');
   }

   // public function progress()
   // {
   //    $today = Carbon::now();
   //    $month = $today->format('m');
   //    $requests = ModelsRequest::get();
   //    $vessels = Vessel::get();
   //    $schedules = Schedule::get();

   //    $departs = ModelsRequest::selectRaw('id, date, department_id, code, origin_id, destination_id, func, status , description, schedule_id, activity_id')->where('status', '>', 1)->orderBy('department_id', 'desc')->get()->groupBy('func');

   //    return view('pages.request.progress', [
   //       'title' => 'Progress',
   //       'departs' => $departs,
   //       'vessels' => $vessels,
   //       'schedules' => $schedules,
   //       'month' => $month
   //    ])->with('i');
   // }
   // public function undoApprove(Request $req)
   // {
   //    $now = Carbon::now();
   //    $request = ModelsRequest::find($req->requestId);

   //    RequestHistory::create([
   //       'request_id' => $request->id,
   //       'date' => $request->undo,
   //       'reason' => $request->reason,
   //       'approve' => $now
   //    ]);

   //    $request->update([
   //       'status' => 00,
   //       'undo' => null,
   //       'reason' => null
   //    ]);

   //    return redirect()->to('/')->with('success', 'Cancel Request successfully approved');
   // }

   public function undoApprove($id){
      $dekripId = dekripRambo($id);
      $request = ModelsRequest::find($dekripId);
      $request->update([
         'status' => 1
      ]);

      return redirect()->back()->with('success', 'Undo Request Successfully');
   }




   public function selectSchedule(Request $req)
   {
      // dd($req->request_id);
      // dd('ok');
      $request = ModelsRequest::find($req->request_id);
      $schedule = Schedule::find($req->schedule);
      // dd($req->schedule);
      if (!$schedule->vessel_id) {
         // dd('ok');
         return redirect()->back()->with('error', 'Failed! Vessel is empty, choose a vessel first');
      }


      $vessel = Vessel::find($schedule->vessel_id);
      $weight = $schedule->total_weight + $request->total_weight;
      $size = $schedule->total_size + $request->total_size;



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

         // $lastScheduleRoutes = ScheduleRoute::where('schedule_id', $schedule->id)->orderBy('created_at', 'desc')->first();
         // $routeOrigin = ScheduleRoute::where('schedule_id', $schedule->id)->where('port_id', $request->origin_id)->first();
         // if (!$routeOrigin) {
         //    ScheduleRoute::create([
         //       'schedule_id' => $schedule->id,
         //       'request_id' => $request->id,
         //       'port_id' => $request->origin_id,
         //       'rank' => $lastScheduleRoutes->rank + 1,
         //       'status' => 1
         //    ]);
         // }

         $lastScheduleRoutes = ScheduleRoute::where('schedule_id', $schedule->id)->orderBy('created_at', 'desc')->first();
         $route = ScheduleRoute::where('schedule_id', $schedule->id)->where('port_id', $request->destination_id)->first();

         if ($route) {
            // dd('from rute sudah ada');
            $request->update([
               'schedule_id' => $schedule->id,
               'rank' => $route->rank
            ]);
         } else {
            // dd('ok');
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
            'rank' => 1
         ]);
      }

      $now = Carbon::now();
      if ($request->class == 'main') {
         $request->update([
            'status' => 02,
            'schedule_id' => $req->schedule,
            'remark' => $req->remark
         ]);
         RequestHistory::create([
            'request_id' => $request->id,
            'date' => $now,
            'type' => 'validated',
            'desc' => $req->desc

         ]);
      } elseif ($request->class == 'additional') {
         $request->update([
            'status' => 04,
            'schedule_id' => $req->schedule,
            'remark' => $req->remark
         ]);
         RequestHistory::create([
            'request_id' => $request->id,
            'date' => $now,
            'type' => 'validated',
            'desc' => $req->desc
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
            'remark' => $req->remark
         ]);
      }



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


      // dd('ok');
      return redirect()->route('schedule.detail', enkripRambo($schedule->id))->with('success', 'Request Activity set on this schedule');
   }

   public function rejectSchedule(Request $req)
   {
      // dd($req->request_id);
      // dd('ok');
      $request = ModelsRequest::find($req->request_id);
      $schedule = Schedule::find($req->schedule);
      $vessel = Vessel::find($schedule->vessel_id);
      $weight = $schedule->total_weight + $request->total_weight;
      $size = $schedule->total_size + $request->total_size;

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
            $lastScheduleRoutesA = ScheduleRoute::where('schedule_id', $schedule->id)->orderBy('created_at', 'desc')->first();
            $routeFrom = ScheduleRoute::where('schedule_id', $schedule->id)->where('port_id', $request->origin_id)->first();
            if (!$routeFrom) {
               // dd('from tidak ada');
               ScheduleRoute::create([
                  'schedule_id' => $schedule->id,
                  'request_id' => $request->id,
                  'date' =>  Carbon::now(),
                  'port_id' => $request->origin_id,
                  'rank' => $lastScheduleRoutesA->rank + 1
               ]);
            }

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
                  'date' =>  Carbon::now(),
                  'port_id' => $request->destination_id,
                  'rank' => $lastScheduleRoutes->rank + 1
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
               'rank' => 1
            ]);

            ScheduleRoute::create([
               'schedule_id' => $schedule->id,
               'request_id' => $request->id,
               'date' =>  Carbon::now(),
               'port_id' => $request->destination_id,
               'rank' => 2
            ]);

            $request->update([
               'rank' => 1
            ]);
         }



         $request->update([
            'status' => 02,
            'schedule_id' => $req->schedule,
            'remark' => $req->remark
         ]);
         $now = Carbon::now();

         RequestHistory::create([
            'request_id' => $request->id,
            'date' => $now,
            'type' => 'validated'
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

   public function add(Request $req)
   {
      // dd($req->request_id);
      $request = ModelsRequest::find($req->request_id);
      $schedule = Schedule::find($req->schedule);
      $vessel = Vessel::find($schedule->vessel_id);
      $weight = $schedule->total_weight + $request->total_weight;
      $size = $schedule->total_size + $request->total_size;

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

   public function createSchedule($date, $from)
   {
      $dekripDate = dekripRambo($date);
      $dekripFrom = dekripRambo($from);

      $port = Port::find($dekripFrom);

      // dd($port->name);
      $vessels = Vessel::get();
      $ports = Port::get();
      $types = Type::get();
      // dd($date);
      return view('pages.schedule.create', [
         'vessels' => $vessels,
         'ports' => $ports,
         'types' => $types,
         'date' => $dekripDate,
         'from' => $dekripFrom
      ]);
   }
}
