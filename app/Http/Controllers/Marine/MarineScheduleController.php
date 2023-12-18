<?php

namespace App\Http\Controllers\Marine;

use App\Http\Controllers\Controller;
use App\Mail\ApprovalEmail;
use App\Mail\AssignEmail;
use App\Models\Activity;
use App\Models\Deviation;
use App\Models\DeviationReport;
use App\Models\Port;
use App\Models\Postpone;
use App\Models\Schedule;
use Carbon\Carbon;
use App\Models\Report;
use App\Models\ReportRequest;
use App\Models\ReportVessel;
use App\Models\Request as ModelsRequest;
use App\Models\ScheduleRoute;
use App\Models\Status;
use App\Models\Type;
use App\Models\Vessel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MarineScheduleController extends Controller
{
   public function inbox()
   {
      $cargoSchedules = Schedule::where('type', 2)->where('class', 'Cargo/Crew')->where('status', 0)->get();
      $movingSchedules = Schedule::where('type', 2)->where('class', '!=', 'Cargo/Crew')->where('status', 0)->get();

      return view('pages-stisla.marine.schedule.inbox', [
         'cargoSchedules' => $cargoSchedules,
         'movingSchedules' => $movingSchedules
      ])->with('i');
   }

   public function plan($month)
   {

      $now = Carbon::now();
      $dekripMonth = dekripRambo($month);
      // dd($dekripMonth);
      // $today = Carbon::now();
      // $month = $today->format('m');

      // dd($dekripMonth);

      // $vessels = Vessel::get();
      // $ports = Port::get();
      $regulerSchedules = Schedule::where('type', 1)->whereMonth('date', $dekripMonth)->get();
      // dd($regulerSchedules);
      if ($regulerSchedules->count() > 0) {
         // dd('ada');
      } else {
         // dd('ga ada bro');
         // $dt = Carbon::createFromDate(2023, $dekripMonth);
         // dd($dt->daysInMonth);

         $yearMonth = $now->format('Y') . '-' . $dekripMonth;
         // dd($yearMonth);
         $start = Carbon::parse($yearMonth)->startOfMonth();
         $end = Carbon::parse($yearMonth)->endOfMonth();

         $dates = [];
         while ($start->lte($end)) {
            $dates[] = $start->copy();
            $start->addDay();
         }
         // dd($dates);

         $mondays = [];
         $tuesdays = [];
         $wednesdays = [];
         $thursdays = [];
         $fridays = [];
         $saturdays = [];
         $sundays = [];

         // dd($days);
         foreach ($dates as $date) {
            if ($date->format('l') == 'Monday') {
               $mondays[] = $date;
            }
         }
         foreach ($dates as $date) {
            if ($date->format('l') == 'Tuesday') {
               $tuesdays[] = $date;
            }
         }
         foreach ($dates as $date) {
            if ($date->format('l') == 'Wednesday') {
               $wednesdays[] = $date;
            }
         }
         foreach ($dates as $date) {
            if ($date->format('l') == 'Thursday') {
               $thursdays[] = $date;
            }
         }
         foreach ($dates as $date) {
            if ($date->format('l') == 'Friday') {
               $fridays[] = $date;
            }
         }
         foreach ($dates as $date) {
            if ($date->format('l') == 'Saturday') {
               $saturdays[] = $date;
            }
         }
         foreach ($dates as $date) {
            if ($date->format('l') == 'Sunday') {
               $sundays[] = $date;
            }
         }
         // dd($wednesdays);
         $vessel = Vessel::find(9);
         $giat = Vessel::find(11);
         $elok = Vessel::find(9);
         $sigap = Vessel::find(6);
         $tegas = Vessel::find(35);

         foreach ($mondays as $monday) {
            // dd($day->format('Y-m-d'));
            // $tuesday = $monday->addDays(1);
            $elokMonday = Schedule::create([
               'by' => 'system',
               'type' => 1,
               'status' => 0,
               'class' => 'Cargo/Crew',
               'vessel_id' => $elok->id,
               'vessel_type' => $elok->type,
               'date' => $monday->format('Y-m-d'),
               'etd' => $monday->format('Y-m-d'),
               'eta' => $monday->format('Y-m-d'),
            ]);

            ScheduleRoute::create([
               'schedule_id' => $elokMonday->id,
               'port_id' => $giat->vesselSchedule->monday_id,
               'rank' => 1,
               'status' => 1,
               'date' => $monday
            ]);


            $giatMonday = Schedule::create([
               'by' => 'system',
               'type' => 1,
               'status' => 0,
               'class' => 'Cargo/Crew',
               'vessel_id' => $giat->id,
               'vessel_type' => $giat->type,
               'date' => $monday->format('Y-m-d'),
               'etd' => $monday->format('Y-m-d'),
               'eta' => $monday->format('Y-m-d'),
            ]);


            ScheduleRoute::create([
               'schedule_id' => $giatMonday->id,
               'port_id' => 1,
               'rank' => 1,
               'status' => 1,
               'date' => $monday
            ]);
            ScheduleRoute::create([
               'schedule_id' => $giatMonday->id,
               'port_id' => $giat->vesselSchedule->tuesday_id,
               'rank' => 2,
               'status' => 1,
               'date' => $monday->addDay()
            ]);
            ScheduleRoute::create([
               'schedule_id' => $elokMonday->id,
               'port_id' => $giat->vesselSchedule->tuesday_id,
               'rank' => 2,
               'status' => 1,
               'date' => $monday
            ]);
         }

         foreach ($tuesdays as $tuesday) {
         }

         foreach ($wednesdays as $wednesday) {



            $elokWednesday = Schedule::create([
               'by' => 'system',
               'type' => 1,
               'status' => 0,
               'vessel_id' => $elok->id,
               'vessel_type' => $elok->type,
               'class' => 'Cargo/Crew',
               'date' => $wednesday->format('Y-m-d'),
               'etd' => $wednesday->format('Y-m-d'),
               'eta' => $wednesday->format('Y-m-d'),
            ]);
            ScheduleRoute::create([
               'schedule_id' => $elokWednesday->id,
               'port_id' => $elok->vesselSchedule->wednesday_id,
               'rank' => 1,
               'status' => 1,
               'date' => $wednesday
            ]);
            ScheduleRoute::create([
               'schedule_id' => $elokWednesday->id,
               'port_id' => $elok->vesselSchedule->thursday_id,
               'rank' => 2,
               'status' => 1,
               'date' => $wednesday->addDay()
            ]);
         }

         foreach ($thursdays as $thursday) {
            // dd($day->format('Y-m-d'));
            // $sigapThursday = Schedule::create([
            //    'by' => 'system',
            //    'type' => 1,
            //    'status' => 0,
            //    'vessel_id' => $sigap->id,
            //    'vessel_type' => $sigap->type,
            //    'date' => $thursday->format('Y-m-d'),
            //    'etd' => $thursday->format('Y-m-d'),
            //    'eta' => $thursday->format('Y-m-d'),
            // ]);

            // ScheduleRoute::create([
            //    'schedule_id' => $sigapThursday->id,
            //    'port_id' => 1,
            //    'rank' => 1,
            //    'status' => 1
            // ]);

         }

         foreach ($saturdays as $saturday) {
            // dd($day->format('Y-m-d'));
            $giatSaturday = Schedule::create([
               'by' => 'system',
               'type' => 1,
               'class' => 'Cargo/Crew',
               'status' => 0,
               'vessel_id' => $giat->id,
               'vessel_type' => $giat->type,
               'date' => $saturday->format('Y-m-d'),
               'etd' => $saturday->format('Y-m-d'),
               'eta' => $saturday->format('Y-m-d'),
            ]);

            ScheduleRoute::create([
               'schedule_id' => $giatSaturday->id,
               'port_id' => $giat->vesselSchedule->saturday_id,
               'rank' => 1,
               'status' => 1,
               'date' => $saturday
            ]);

            ScheduleRoute::create([
               'schedule_id' => $giatSaturday->id,
               'port_id' => $giat->vesselSchedule->sunday_id,
               'rank' => 2,
               'status' => 1,
               'date' => $saturday->addDay()
            ]);
         }

         foreach ($sundays as $sunday) {
            $sigapSunday = Schedule::create([
               'by' => 'system',
               'type' => 1,
               'class' => 'Cargo/Crew',
               'status' => 0,
               'vessel_id' => $sigap->id,
               'vessel_type' => $sigap->type,
               'date' => $sunday->format('Y-m-d'),
               'etd' => $sunday->format('Y-m-d'),
               'eta' => $sunday->format('Y-m-d'),
            ]);
            $tegasSunday = Schedule::create([
               'by' => 'system',
               'type' => 1,
               'class' => 'Cargo/Crew',
               'status' => 0,
               'vessel_id' => $tegas->id,
               'vessel_type' => $tegas->type,
               'date' => $sunday->format('Y-m-d'),
               'etd' => $sunday->format('Y-m-d'),
               'eta' => $sunday->format('Y-m-d'),
            ]);

            // Minggu
            ScheduleRoute::create([
               'schedule_id' => $sigapSunday->id,
               'port_id' => $sigap->vesselSchedule->sunday_id,
               'rank' => 1,
               'status' => 1,
               'date' => $sunday
            ]);

            ScheduleRoute::create([
               'schedule_id' => $tegasSunday->id,
               'port_id' => $tegas->vesselSchedule->sunday_id,
               'rank' => 1,
               'status' => 1,
               'date' => $sunday
            ]);

            // selasa
            ScheduleRoute::create([
               'schedule_id' => $sigapSunday->id,
               'port_id' => $sigap->vesselSchedule->tuesday_id,
               'rank' => 2,
               'status' => 1,
               'date' => $sunday->addDays(2)
            ]);

            ScheduleRoute::create([
               'schedule_id' => $tegasSunday->id,
               'port_id' => $tegas->vesselSchedule->tuesday_id,
               'rank' => 2,
               'status' => 1,
               'date' => $sunday->addDays(2)
            ]);

            // Rabu
            ScheduleRoute::create([
               'schedule_id' => $sigapSunday->id,
               'port_id' => $sigap->vesselSchedule->wednesday_id,
               'rank' => 3,
               'status' => 1,
               'date' => $sunday->addDay()
            ]);

            ScheduleRoute::create([
               'schedule_id' => $tegasSunday->id,
               'port_id' => $tegas->vesselSchedule->wednesday_id,
               'rank' => 3,
               'status' => 1,
               'date' => $sunday->addDay()
            ]);

            // Kamis
            ScheduleRoute::create([
               'schedule_id' => $sigapSunday->id,
               'port_id' => $sigap->vesselSchedule->thursday_id,
               'rank' => 4,
               'status' => 1,
               'date' => $sunday->addDay()
            ]);

            ScheduleRoute::create([
               'schedule_id' => $tegasSunday->id,
               'port_id' => $tegas->vesselSchedule->thursday_id,
               'rank' => 4,
               'status' => 1,
               'date' => $sunday->addDay()
            ]);
         }
      }

      if (auth()->user()->hasRole('vessel')) {
         $schedules = Schedule::where('vessel_id', auth()->user()->getVesselId())->whereMonth('created_at', $dekripMonth)->orderBy('vessel_type', 'asc')->get();
         $requlerSchedules = null;
      } else {
         $schedules = Schedule::orderBy('date', 'asc')->where('status', '=', 0)->where('type', 2)->orderBy('vessel_type', 'asc')->get();
         $regulerSchedules = Schedule::orderBy('date', 'asc')->where('status', '=', 0)->where('type', 1)->whereMonth('date', $dekripMonth)->get();
      }

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

      $vessels = Vessel::get();
      $movingSchedules = Schedule::orderBy('date', 'asc')->where('status', '=', 0)->where('class', 'Moving')->get();

      return view('pages-stisla.marine.schedule.index', [
         'typeName' => 'by Request',
         'type' => 2,
         'month' => $dekripMonth,
         'monthName' => $monthName,
         'schedules' => $schedules,
         'regulerSchedules' => $regulerSchedules,
         'movingSchedules' => $movingSchedules,
         'vessels' => $vessels,
         // 'ports' => $ports
      ])->with('i');
   }



   public function order($month)
   {

      $dekripMonth = dekripRambo($month);
      // $today = Carbon::now();
      // $month = $today->format('m');

      $schedules = Schedule::orderBy('date', 'asc')->where('status', '>', 0)->where('status', '!=', 11)->whereMonth('created_at', $dekripMonth)->get();

      // $vessels = Vessel::get();
      // $ports = Port::get();

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
      return view('pages-stisla.marine.schedule.progress', [
         'typeName' => 'by Request',
         'type' => 2,
         'month' => $month,
         'monthName' => $monthName,
         'schedules' => $schedules,
         // 'vessels' => $vessels,
         // 'ports' => $ports
      ])->with('i');
   }

   public function create()
   {
      $vessels = Vessel::where('status', 1)->get();
      $offhireVessels = Vessel::where('status', 0)->get();
      $ports = Port::get();
      $types = Type::get();
      return view('pages-stisla.marine.schedule.create', [
         'vessels' => $vessels,
         'offhireVessels' => $offhireVessels,
         'ports' => $ports,
         'types' => $types,
         'date' => null,
         'from' => null
      ]);
   }

   public function store(Request $req)
   {
      $req->validate([
         'vessel' => 'required',
         'date' => 'required'
         // 'origin_id' => 'different:destination_id',
         // 'destination_id' => 'different:origin_id'
      ]);
      // dd($req->type);
      $vessel = Vessel::find($req->vessel);

      $vesselHasSchedule = Schedule::where('date', $req->date)->where('vessel_id', $vessel->id)->first();
      if ($vesselHasSchedule) {
         return redirect()->back()->with('error', 'This vessel has already schedule at that day');
      } else {
         $schedule = Schedule::create([
            'by' => 'marine',
            'class' => 'Cargo/Crew',
            'type' => 2,
            'status' => 0,
            'vessel_id' => $vessel->id,
            'vessel_type' => $vessel->type,
            'date' => $req->date,
            // 'etd' => $req->departure_estimasi,
            // 'eta' => $req->arrive_estimasi,
            'remark' => $req->remark
         ]);

         return redirect()->route('schedule.detail', enkripRambo($schedule->id))->with('success', 'Schedule successfuly added');
      }
   }

   public function edit($id)
   {
      $dekripId = dekripRambo($id);
      $schedule = Schedule::find($dekripId);
      $ports = Port::get();
      $vessels = Vessel::get();
      $activities = Activity::get();

      return view('pages.schedule.edit', [
         'schedule' => $schedule,
         'ports' => $ports,
         'vessels' => $vessels,
         'activities' => $activities
      ]);
   }

   public function update(Request $req)
   {
      $schedule = Schedule::find($req->schedule);
      $schedule->update([
         'vessel_id' => $req->vessel,
         'date' => $req->date,
         'etd' => $req->departure_estimasi,
         'remark' => $req->remark
      ]);

      return redirect()->route('schedule.detail', enkripRambo($schedule->id))->with('success', 'Schedule has successfully updated');
   }

   public function delete($id)
   {
      $now = Carbon::now();
      $month = $now->format('m');
      $dekripId = dekripRambo($id);
      $schedule = Schedule::find($dekripId);
      $requests = ModelsRequest::where('schedule_id', $schedule->id)->get();

      foreach ($requests as $request) {
         $request->update([
            'status' => 1,
            'schedule_id' => null
         ]);
      }

      $routes = ScheduleRoute::where('schedule_id', $schedule->id)->get();
      foreach ($routes as $route) {
         $route->delete();
      }

      $schedule->delete();

      return redirect()->route('schedule.plan', enkripRambo($month))->with('success', 'Schedule deleted');
   }

   public function send($id)
   {
      $dekripId = dekripRambo($id);
      $schedule = Schedule::find($dekripId);
      if (!$schedule->vessel_id) {
         return redirect()->back()->with('error', 'Failed! Vessel is empty, choose a vessel first');
      }
      $vessel = Vessel::find($schedule->vessel_id);
      $status = Status::where('code', '01')->first();
      $scheduleRoute = ScheduleRoute::where('schedule_id', $schedule->id)->where('status', null)->first();

      // dd($scheduleRoute);
      if ($scheduleRoute) {
         return redirect()->back()->with('warning', 'Route belum selesai di buat');
      }

      $now = Carbon::now();

      foreach ($schedule->requests as $req) {
         $req->update([
            'status' => 3
         ]);

         ReportRequest::create([
            'request_id' => $req->id,
            'status_id' => $status->id,

         ]);
      }

      // Report::create([
      //    'schedule_id' => $schedule->id,
      //    'vessel_id' => $schedule->vessel_id,
      //    'assign' => $now
      // ]);
      Report::create([
         'schedule_id' => $schedule->id,
         'vessel_id' => $schedule->vessel_id,
         'status_id' => 1,
      ]);

      $schedule->update([
         'status' => 1
      ]);



      // $vessel->update([
      //    'status' => 1,
      //    'schedule_id' => $schedule->id
      // ]);

      ReportVessel::create([
         'vessel_id' => $schedule->vessel_id,
         'status_id' => 1
      ]);



      $date = Carbon::parse($schedule->date)->format('d/m/Y');

      $body = $date;
      $body .= '<br>';
      // $body .= $schedule->origin->name;

      $data = [
         'to' => $schedule->vessel->name,
         'from' => 'Marine Department',
         'subject' => 'Schedule Plan',
         'body' => $body,
         'schedule' => $schedule,
         'activities' => $schedule->requests,
         'link' => route('schedule.detail', enkripRambo($schedule->id))
      ];

      // Mail::to("rahmattrust@gmail.com")->send(new AssignEmail($data));
      // Mail::to("develop@ekanuri.com")->send(new AssignEmail($data));

      return redirect()->back()->with('success', 'Schedule successfully assign to ' . $vessel->name);
   }

   public function removeRequest($id)
   {
      $dekripId = dekripRambo($id);
      $request = ModelsRequest::find($dekripId);
      $schedule = Schedule::find($request->schedule_id);
      $request->update([
         'status' => 1,
         'schedule_id' => null
      ]);

      $schedule->update([
         'total_weight' => $schedule->total_weight - $request->total_weight,
         'total_size' => $schedule->total_size - $request->total_size
      ]);

      return redirect()->back()->with('success', 'Request Activity successfully removed from list');
   }

   public function addRoute(Request $req)
   {
      $scheduleRoute = ScheduleRoute::find($req->destination);
      $lastScheduleRoute = $scheduleRoute::where('schedule_id', $req->schedule)->where('status', 1)->orderBy('rank', 'desc')->first();
      // dd($lastScheduleRoute->rank);
      if ($lastScheduleRoute) {
         $rank = $lastScheduleRoute->rank + 1;
      } else {
         $rank = 1;
      }
      $scheduleRoute->update([
         'status' => 1,
         'rank' => $rank
      ]);

      return redirect()->back()->with('success', 'Schedule Route successfully added');
   }

   public function reorderRoute(Request $req)
   {

      $choseRoute = ScheduleRoute::find($req->route);
      $schedule = Schedule::find($choseRoute->schedule_id);
      // dd($choseRoute->port->name);

      $after = ScheduleRoute::find($req->after);
      // dd($after->port->name);
      $remainRoutes = ScheduleRoute::where('schedule_id', $schedule->id)->where('rank', '>', $after->rank)->where('id', '!=', $choseRoute->id)->get();
      foreach ($remainRoutes as $rr) {
         $rr->update([
            'rank' => $rr->rank + 1
         ]);
      }

      $choseRoute->update([
         'rank' => $after->rank + 1
      ]);

      return redirect()->back()->with('success', 'Schedule Route successfully updated');
   }

   public function resetRoute($id)
   {
      $dekripId = dekripRambo($id);
      $schedule = Schedule::find($dekripId);
      $requests = ModelsRequest::where('schedule_id', $schedule->id)->get();

      // foreach ($requests as $request) {
      //    $request->update([
      //       'status' => null,

      //       'rank' => null
      //    ]);
      // }

      $routes = ScheduleRoute::where('schedule_id', $schedule->id)->get();
      foreach ($routes as $route) {
         $route->update([
            'status' => null,
            'rank' => null
         ]);
      }

      // $schedule->update([
      //    'total_size' => null,
      //    'total_weight' => null
      // ]);

      return redirect()->back()->with('success', 'Schedule Route successfully reseted');
   }

   public function postpone(Request $req)
   {
      $req->validate([]);

      $schedule = Schedule::find($req->schedule);
      $schedule->update([
         'date' => $req->to
      ]);

      Postpone::create([
         'status' => 0,
         'schedule_id' => $schedule->id,
         'from' => $req->from,
         'to' => $req->to,
         'reason' => $req->reason
      ]);

      return redirect()->back()->with('success', 'Schedule has been Postpone');
   }

   public function history($month)
   {
      $dekripMonth = dekripRambo($month);

      // $today = Carbon::now();
      // $month = $today->format('m');

      $schedules = Schedule::orderBy('date', 'asc')->where('status', '=', 11)->whereMonth('created_at', $dekripMonth)->get();

      // $vessels = Vessel::get();
      // $ports = Port::get();

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
      return view('pages.schedule.history', [
         'typeName' => 'by Request',
         'type' => 2,
         'month' => $month,
         'monthName' => $monthName,
         'schedules' => $schedules,
         // 'vessels' => $vessels,
         // 'ports' => $ports
      ])->with('i');
   }

   public function addCargo(Request $req)
   {
      // $req->validate([
      //    'desc' => 'required'
      // ]);

      $now = Carbon::today();
      $schedule = Schedule::find($req->schedule);
      $lastRequest = ModelsRequest::orderBy("created_at", "desc")->first();

      $destination = Port::find($req->port);
      $vessel = Vessel::find($schedule->vessel_id);

      // if (isset($lastRequest)) {
      //    $code =
      //       "R/" . $department->code . '/' . $now->format("dmy") . '/' . ($lastRequest->id + 1);
      // } else {
      //    $code = "R/"  . $department->code . '/' . $now->format("dmy") . '/' . 1;
      // }

      $request = ModelsRequest::create([
         // 'code' => $code,
         'employee_id' => 1,
         'type' => 1,
         'class' => 'deviation',
         'schedule_id' => $schedule->id,
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
            'rank' => $fromScheduleRoute->rank + 1,
            'status' => 1
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

      return redirect()->back()->with('success', 'Cargo successfully added to vessel');
   }


   public function addCrew(Request $req)
   {
      // $req->validate([
      //    'desc' => 'required'
      // ]);

      $now = Carbon::today();
      $schedule = Schedule::find($req->schedule);
      $lastRequest = ModelsRequest::orderBy("created_at", "desc")->first();

      $destination = Port::find($req->port);
      $vessel = Vessel::find($schedule->vessel_id);

      // if (isset($lastRequest)) {
      //    $code =
      //       "R/" . $department->code . '/' . $now->format("dmy") . '/' . ($lastRequest->id + 1);
      // } else {
      //    $code = "R/"  . $department->code . '/' . $now->format("dmy") . '/' . 1;
      // }

      $request = ModelsRequest::create([
         // 'code' => $code,
         'employee_id' => 1,
         'type' => 2,
         'class' => 'deviation',
         'schedule_id' => $schedule->id,
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
            'rank' => $fromScheduleRoute->rank + 1,
            'status' => 1
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

      return redirect()->back()->with('success', 'Cargo successfully added to vessel');
   }


   public function selectVessel(Request $req)
   {
      $schedule = Schedule::find($req->schedule);
      $schedule->update([
         // 'status' => 1,
         'vessel_id' => $req->vessel
      ]);
      return redirect()->back()->with('success', 'Vessel selected.');
   }
}
