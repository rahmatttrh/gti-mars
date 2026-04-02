<?php

namespace App\Http\Controllers\Marine;

use App\Http\Controllers\Controller;
use App\Mail\ApprovalEmail;
use App\Models\CargoItem;
use App\Models\Port;
use App\Models\ReportRequest;
use App\Models\Request as ModelsRequest;
use App\Models\RequestHistory;
use App\Models\Schedule;
use App\Models\ScheduleRoute;
use App\Models\Type;
use App\Models\User;
use App\Models\Vessel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MarineRequestController extends Controller
{

   public function indexCrewChange($month, $year)
   {
      $dekripMonth = dekripRambo($month);
      $dekripYear = dekripRambo($year);
      // dd('ok');


      if ($dekripMonth == 1) {
         $monthName = 'Januari';
      } elseif ($dekripMonth == 2) {
         $monthName = 'Februari';
      } elseif ($dekripMonth == 3) {
         $monthName = 'Maret';
      } elseif ($dekripMonth == 4) {
         $monthName = 'April';
      } elseif ($dekripMonth == 5) {
         $monthName = 'Mei';
      } elseif ($dekripMonth == 6) {
         $monthName = 'Juni';
      } elseif ($dekripMonth == 7) {
         $monthName = 'Juli';
      } elseif ($dekripMonth == 8) {
         $monthName = 'Agustus';
      } elseif ($dekripMonth == 9) {
         $monthName = 'September';
      } elseif ($dekripMonth == 10) {
         $monthName = 'Oktober';
      } elseif ($dekripMonth == 11) {
         $monthName = 'November';
      } elseif ($dekripMonth == 12) {
         $monthName = 'Desember';
      }

      $requests = ModelsRequest::where('activity_id', 2)->where('status', 1)->whereMonth('date', $dekripMonth)->whereYear('date', $dekripYear)->get();
      $schedules = Schedule::where('class', 'Crew Change')->whereMonth('date', $dekripMonth)->whereYear('date', $dekripYear)->orderBy('date', 'asc')->get();

      foreach ($schedules as $sche) {
         $totalDepart = 0;
         $totalReturn = 0;
         foreach ($sche->requests->where('status', '>', 1) as $req) {
            $totalDepart += count($req->passengerItems->where('type', 'Departure'));
            $totalReturn += count($req->passengerItems->where('type', 'Return'));
         }

         $sche->update([
            'total_depart' => $totalDepart,
            'total_return' => $totalReturn
         ]);
      }
      return view('pages-stisla.marine.request.crewchange', [
         'year' => $dekripYear,
         'month' => $dekripMonth,
         'monthName' => $monthName,
         'schedules' => $schedules,
         'requests' => $requests
      ])->with('i');
   }

   public function filterCrewChange(Request $req)
   {
      return redirect()->route('marine.crew.change', [enkripRambo($req->month), enkripRambo($req->year)]);
   }
   public function index()
   {


      // $users = User::get();
      $vessels = Vessel::get();



      // dd($users);

      $now = Carbon::now();
      $today = $now->format('l');
      // dd($today);

      if ($today == 'Friday') {
         // dd('Friday');
         $start = $now->addDay(-4);
         $end = Carbon::now()->addDays(3);
      }
      if ($today == 'Saturday') {
         // dd('Monday');
         $start = $now->addDay(-5);
         $end = Carbon::now()->addDays(2);
      }
      if ($today == 'Sunday') {
         // dd('Monday');
         $start = $now->addDay(-6);
         $end = Carbon::now()->addDays(1);
      }
      if ($today == 'Monday') {
         // dd('Monday');
         $start = $now->addDay(+0);
         $end = Carbon::now()->addDays(7);
      }
      if ($today == 'Tuesday') {
         // dd('Monday');
         $start = $now;
         $end = Carbon::now()->addDays(8);
      }
      if ($today == 'Wednesday') {
         // dd('Monday');
         $start = $now->addDays(-2);
         $end = Carbon::now()->addDays(5);
      }
      if ($today == 'Thursday') {
         // dd('Monday');
         $start = $now->addDays(-3);
         $end = Carbon::now()->addDays(4);
      }


      $start = $start->format('Y-m-d');
      // dd($start);
      $end = $end->format('Y-m-d');
      $requests = ModelsRequest::where('status', '>=', 1)->whereBetween('date', [$start, $end])->get();
      $users = ModelsRequest::selectRaw('id, date, department_id, code, origin_id, destination_id, func, status,user_id , user_name , description, schedule_id, activity_id')->where('status', '>', 0)->where('activity_id', '!=', 7)->whereBetween('date', [$start, $end])->get()->groupBy('user_name');
      // dd(count($requests));
      $weekSchedules = Schedule::where('class', '!=', 'Crew Change')->whereBetween('date', [$start, $end])->orderBy('date', 'asc')->get();
      // $schedules = Schedule::orderBy('date', 'asc')->whereBetween('date', [$start, $end])->get();
      $schedules = Schedule::orderBy('date', 'asc')->get();

      $startDate = new Carbon($start);
      $endDate = new Carbon($end);
      $dates = array();
      while ($startDate->lte($endDate)) {
         $dates[] = $startDate->toDateString();
         $startDate->addDay();
      }

      $vessels = Vessel::get();





      return view('pages-stisla.marine.request.inbox', [
         'vessels' => $vessels,
         'requests' => $requests,
         'schedules' => $schedules,
         'users' => $users,
         'dates' => $dates,
         'weekSchedules' => $weekSchedules,
         'start' => $start,
         'end' => $end,
         'vessels' => $vessels,
         'now' => Carbon::now()
      ])->with('i');
   }

   public function indexList()
   {


      // $users = User::get();
      $vessels = Vessel::get();



      // dd($users);

      $now = Carbon::now();
      $today = $now->format('l');
      // dd($today);

      if ($today == 'Friday') {
         // dd('Friday');
         $start = $now->addDay(-4);
         $end = Carbon::now()->addDays(3);
      }
      if ($today == 'Saturday') {
         // dd('Monday');
         $start = $now->addDay(-5);
         $end = Carbon::now()->addDays(2);
      }
      if ($today == 'Sunday') {
         // dd('Monday');
         $start = $now->addDay(-6);
         $end = Carbon::now()->addDays(1);
      }
      if ($today == 'Monday') {
         // dd('Monday');
         $start = $now->addDay(+0);
         $end = Carbon::now()->addDays(7);
      }
      if ($today == 'Tuesday') {
         // dd('Monday');
         $start = $now;
         $end = Carbon::now()->addDays(8);
      }
      if ($today == 'Wednesday') {
         // dd('Monday');
         $start = $now->addDays(-2);
         $end = Carbon::now()->addDays(5);
      }
      if ($today == 'Thursday') {
         // dd('Monday');
         $start = $now->addDays(-3);
         $end = Carbon::now()->addDays(4);
      }

      // dd($start);



      $start = $start->format('Y-m-d');
      // dd($start);
      $end = $end->format('Y-m-d');
      $requests = ModelsRequest::where('status', '>=', 1)->whereBetween('date', [$start, $end])->get();
      $users = ModelsRequest::selectRaw('id, date, department_id, code, origin_id, destination_id, func, status,user_id , user_name , description, schedule_id, activity_id')->where('status', '>', 0)->where('activity_id', '!=', 7)->whereBetween('date', [$start, $end])->get()->groupBy('user_name');
      // dd(count($requests));
      $weekSchedules = Schedule::where('class', '!=', 'Crew Change')->whereBetween('date', [$start, $end])->orderBy('date', 'asc')->get();
      // $schedules = Schedule::orderBy('date', 'asc')->whereBetween('date', [$start, $end])->get();
      $today = Carbon::today();
      $schedules = Schedule::orderBy('date', 'desc')->whereMonth('date', $today)->get();

      $startDate = new Carbon($start);
      $endDate = new Carbon($end);
      $dates = array();
      while ($startDate->lte($endDate)) {
         $dates[] = $startDate->toDateString();
         $startDate->addDay();
      }

      $vessels = Vessel::get();
      $cargoItems = CargoItem::whereBetween('date', [$start, $end])->get();





      return view('pages-stisla.marine.request.inbox-list', [
         'vessels' => $vessels,
         'requests' => $requests,
         'schedules' => $schedules,
         'users' => $users,
         'dates' => $dates,
         'weekSchedules' => $weekSchedules,
         'start' => $start,
         'end' => $end,
         'vessels' => $vessels,
         'cargoItems' => $cargoItems,
         'now' => Carbon::now()
      ])->with('i');
   }

   public function filter(Request $req)
   {
      // dd('ok');
      // $requests = ModelsRequest::where('status','=', 1)->get();

      // dd('ok');
      // $users = User::get();
      $vessels = Vessel::get();
      $startDate = new Carbon($req->start);
      // dd($startDate);
      $endDate = new Carbon($req->end);
      $dates = array();
      while ($startDate->lte($endDate)) {
         $dates[] = $startDate->toDateString();
         $startDate->addDay();
      }
      // dd($dates);


      $startDate = $req->start;
      // dd($startDate);
      $endDate = $req->end;
      $requests = ModelsRequest::where('status', '>=', 1)->whereBetween('date', [$startDate, $endDate])->get();
      $users = ModelsRequest::selectRaw('id, date, department_id, code, origin_id, destination_id, func, status,user_id , user_name , description, schedule_id, activity_id')->where('status', '>', 0)->where('activity_id', '!=', 7)->whereBetween('date', [$startDate, $endDate])->get()->groupBy('user_name');
      // dd(count($requests));
      $weekSchedules = Schedule::where('class', '!=', 'Crew Change')->whereBetween('date', [$startDate, $endDate])->orderBy('date', 'asc')->get();
      $schedules = Schedule::orderBy('date', 'asc')->whereBetween('date', [$startDate, $endDate])->get();
      // dd(count($requests));

      $cargoItems = CargoItem::whereBetween('date', [$startDate, $endDate])->get();



      return view('pages-stisla.marine.request.inbox-list', [
         'vessels' => $vessels,
         'requests' => $requests,
         'schedules' => $schedules,
         'weekSchedules' => $weekSchedules,
         'users' => $users,
         'dates' => $dates,
         'start' => $startDate,
         'end' => $endDate,
         'cargoItems' => $cargoItems,
         'now' => Carbon::now()
      ])->with('i');
   }

   public function indexListCrew()
   {

      // dd('ok'
      // $users = User::get();
      $vessels = Vessel::get();



      // dd($users);

      $now = Carbon::now();
      $today = $now->format('l');
      // dd($today);

      if ($today == 'Friday') {
         // dd('Friday');
         $start = $now->addDay(-4);
         $end = Carbon::now()->addDays(3);
      }
      if ($today == 'Saturday') {
         // dd('Monday');
         $start = $now->addDay(-5);
         $end = Carbon::now()->addDays(2);
      }
      if ($today == 'Sunday') {
         // dd('Monday');
         $start = $now->addDay(-6);
         $end = Carbon::now()->addDays(1);
      }
      if ($today == 'Monday') {
         // dd('Monday');
         $start = $now->addDay(+0);
         $end = Carbon::now()->addDays(7);
      }
      if ($today == 'Tuesday') {
         // dd('Monday');
         $start = $now;
         $end = Carbon::now()->addDays(8);
      }
      if ($today == 'Wednesday') {
         // dd('Monday');
         $start = $now->addDays(-2);
         $end = Carbon::now()->addDays(5);
      }
      if ($today == 'Thursday') {
         // dd('Monday');
         $start = $now->addDays(-3);
         $end = Carbon::now()->addDays(4);
      }

      // dd($start);



      $start = $start->format('Y-m-d');
      // dd($start);
      $end = $end->format('Y-m-d');
      $requests = ModelsRequest::where('status', '>=', 1)->whereBetween('date', [$start, $end])->get();
      $users = ModelsRequest::selectRaw('id, date, department_id, code, origin_id, destination_id, func, status,user_id , user_name , description, schedule_id, activity_id')->where('status', '>', 0)->where('activity_id', '!=', 7)->whereBetween('date', [$start, $end])->get()->groupBy('user_name');
      // dd(count($requests));
      $weekSchedules = Schedule::where('class', '!=', 'Crew Change')->whereBetween('date', [$start, $end])->orderBy('date', 'asc')->get();
      // $schedules = Schedule::orderBy('date', 'asc')->whereBetween('date', [$start, $end])->get();
      $schedules = Schedule::orderBy('date', 'asc')->get();

      $startDate = new Carbon($start);
      $endDate = new Carbon($end);
      $dates = array();
      while ($startDate->lte($endDate)) {
         $dates[] = $startDate->toDateString();
         $startDate->addDay();
      }

      $vessels = Vessel::get();
      $cargoItems = CargoItem::whereBetween('date', [$start, $end])->get();





      return view('pages-stisla.marine.request.crewchange', [
         'vessels' => $vessels,
         'requests' => $requests,
         'schedules' => $schedules,
         'users' => $users,
         'dates' => $dates,
         'weekSchedules' => $weekSchedules,
         'start' => $start,
         'end' => $end,
         'vessels' => $vessels,
         'cargoItems' => $cargoItems,
         'now' => Carbon::now()
      ])->with('i');
   }

   public function filterGet($start, $end)
   {
      // $requests = ModelsRequest::where('status','=', 1)->get();
      $dekripStart = dekripRambo($start);
      $dekripEnd = dekripRambo($end);
      // dd('ok');
      // $users = User::get();
      $vessels = Vessel::get();
      $startDate = new Carbon($dekripStart);
      // dd($startDate);
      $endDate = new Carbon($dekripEnd);
      $dates = array();
      while ($startDate->lte($endDate)) {
         $dates[] = $startDate->toDateString();
         $startDate->addDay();
      }
      // dd($dates);


      $startDate = $dekripStart;
      // dd($startDate);
      $endDate = $dekripEnd;
      $requests = ModelsRequest::where('status', '>=', 1)->whereBetween('date', [$startDate, $endDate])->get();
      $users = ModelsRequest::selectRaw('id, date, department_id, code, origin_id, destination_id, func, status,user_id , user_name , description, schedule_id, activity_id')->where('status', '>', 0)->whereBetween('date', [$startDate, $endDate])->where('activity_id', '!=', 7)->get()->groupBy('user_name');
      // dd(count($requests));
      $weekSchedules = Schedule::whereBetween('date', [$startDate, $endDate])->orderBy('date', 'asc')->get();
      $schedules = Schedule::orderBy('date', 'asc')->whereBetween('date', [$startDate, $endDate])->get();
      // dd(count($requests));



      return view('pages-stisla.marine.request.inbox', [
         'vessels' => $vessels,
         'requests' => $requests,
         'schedules' => $schedules,
         'weekSchedules' => $weekSchedules,
         'users' => $users,
         'dates' => $dates,
         'start' => $startDate,
         'end' => $endDate,
         'now' => Carbon::now()
      ])->with('i');
   }

   public function inbox()
   {
      $requests = ModelsRequest::where('status', 1)->get();
      return view('pages-stisla.marine.request.inbox', [
         'requests' => $requests
      ])->with('i');
   }

   public function progress()
   {
      $requests = ModelsRequest::where('status', '>', 1)->where('status', '<=', 12)->get();
      return view('pages-stisla.marine.request.progress', [
         'requests' => $requests
      ])->with('i');
   }

   public function history()
   {
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

   // public function undoApprove($id){
   //    $dekripId = dekripRambo($id);
   //    $request = ModelsRequest::find($dekripId);
   //    $request->update([
   //       'status' => 1
   //    ]);

   //    return redirect()->back()->with('success', 'Undo Request Successfully');
   // }


   public function undoApprove(Request $req)
   {
      // dd($req->requestId);
      $now = Carbon::now();
      $request = ModelsRequest::find($req->requestId);
      // dd($request->id);


      $request->update([
         'status' => 1,
         // 'schedule_id' => null,
         'undo' => $now,
         'reason' => $req->reason
      ]);

      return redirect()->back()->with('success', 'Cancel Request successfully approved');
   }




   public function selectSchedule($request, $schedule)
   {
      // dd($req->request_id);
      // dd('ok');


      $request = ModelsRequest::find(dekripRambo($request));
      $schedule = Schedule::find(dekripRambo($schedule));
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
            'rank' => 1
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

      if ($request->activity_id == 3) {
         $request->update([
            'status' => 02,
            'schedule_id' => $schedule->id,
            // 'remark' => $req->remark
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
      // Mail::to("system.ekanuri@gmail.com")->send(new ApprovalEmail($data));


      // dd('ok');
      return redirect()->route('schedule.detail', enkripRambo($schedule->id))->with('success', 'Request Activity set on this schedule');
   }

   public function changeDestination(Request $req)
   {
      // dd('ok');
      $now = Carbon::now();
      $request = ModelsRequest::find($req->request_id);
      $lastRequest = ModelsRequest::orderBy("created_at", "desc")->first();
      if (isset($lastRequest)) {
         $code =
            "R/M/" . $now->format("dmy") . '/' . ($lastRequest->id + 1);
      } else {
         $code = "R/M/" . $now->format("dmy") . '/' . 1;
      }

      $newRequest = ModelsRequest::create([
         'code' => $code,
         'type' => 2,
         'class' => 'main',
         'user_id' => $request->user_id,
         'user_name' => $request->user_name,
         'employee_id' => $request->employee->id,
         'department_id' => $request->department->id,
         'func' => $request->department->code,
         'desc' => $request->desc,
         'description' => $request->desc,
         'activity_id' => $request->activity_id,
         'date' => $request->date,
         'origin_id' => $req->destination,
         'destination_id' => $request->destination_id,
         'status' => 0,
         'request_id' => $request->id,
         'remark' => 'titipan'
      ]);
      foreach ($request->cargoItems as $item) {
         CargoItem::create([
            'type' => 'main',
            'status' => 1,
            'request_id' => $newRequest->id,
            'no_doc' => $item->no_document,
            'mtd' => $item->mtd,
            'contract' => $item->contract,
            'desc' => $item->desc,
            'qty' => $item->qty,
            'unit' => $item->unit,
            'size' => $item->size,
            'weight' => $item->weight,
            'remark' => $item->remark
         ]);
      }
      $newRequest->update([
         'total_size' => $newRequest->cargoItems->sum('size'),
         'total_weight' => $newRequest->cargoItems->sum('weight')
      ]);

      $request->update([
         'origin_id' => $req->origin,
         'destination_id' => $req->destination,
         'titip_id' => $request->destination_id,
         'remark' => $req->desc
      ]);


      return redirect()->back()->with('success', 'Request Activity destination changed');
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
         // Mail::to("system.ekanuri@gmail.com")->send(new ApprovalEmail($data));



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
         // Mail::to("system.ekanuri@gmail.com")->send(new ApprovalEmail($data));



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



   public function store(Request $req)
   {
      $now = Carbon::today();
      $schedule = Schedule::find($req->schedule);
      // dd($schedule->vessel->name);
      $request = ModelsRequest::orderBy("created_at", "desc")->first();
      if (isset($request)) {
         $code =
            "R/M/" . $now->format("dmy") . '/' . ($request->id + 1);
      } else {
         $code = "R/M/" . $now->format("dmy") . '/' . 1;
      }

      $requestMarine = ModelsRequest::create([
         'code' => $code,
         'schedule_id' => $schedule->id,
         'type' => 2,
         'class' => 'main',
         'user_id' => auth()->user()->id,
         'user_name' => auth()->user()->name,
         'desc' => $req->desc,
         'description' => $req->desc,
         'activity_id' => $req->activity,
         'date' => $req->date,
         'origin_id' => $req->origin,
         'destination_id' => $req->destination,
         'total_weight' => 0,
         'total_size' => 0,
         'status' => 0
      ]);

      return redirect()->route('request.select.schedule', [enkripRambo($requestMarine->id), enkripRambo($schedule->id)])->with('success', "Request Activity sucessfully added");
   }

   public function selectVessel(Request $req)
   {
      // dd('ok');
      // dd($req->requestId);
      $request = ModelsRequest::find($req->requestId);
      $schedule = Schedule::find($req->scheduleId);
      // dd($schedule->date);
      $schedule->update([
         'vessel_id' => $req->vessel
      ]);
      $request->update([
         'status' => 2
      ]);

      return redirect()->route('marine.request')->with('success', 'Vessel assigned');
   }
}
