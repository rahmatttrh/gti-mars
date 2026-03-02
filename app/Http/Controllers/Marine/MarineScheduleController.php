<?php

namespace App\Http\Controllers\Marine;

use App\Http\Controllers\Controller;
use App\Imports\CrewsImport;
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
use Maatwebsite\Excel\Facades\Excel;

class MarineScheduleController extends Controller
{

   public function progress(){
      // $now = Carbon::now();
      // $dekripMonth = dekripRambo($month);
      

      $schedules = Schedule::orderBy('date', 'asc')->where('status', '>', 0)->orderBy('vessel_type', 'asc')->get();
      // $regulerSchedules = Schedule::orderBy('updated_at', 'desc')->where('status', '=', 0)->where('by', '!=', 'user')->whereMonth('date', $dekripMonth)->get();
      $cargoSchedules = Schedule::where('by', 'user')->where('class', 'Cargo/Crew')->where('status', 0)->get();
      $movingSchedules = Schedule::where('type', 2)->where('class', '!=', 'Cargo/Crew')->where('status', 0)->get();

      $vessels = Vessel::get();
      $ports = Port::get();
      $activities = Activity::get();

      $requests = ModelsRequest::orderBy('date', 'asc')->get();
      // dd($activities);

     
      return view('pages-stisla.marine.schedule.top.progress',[
        
         'schedules' => $schedules,
         'cargoSchedules' => $cargoSchedules,
         'movingSchedules' => $movingSchedules,
         'vessels' => $vessels,
         'ports' => $ports,
         'requests' => $requests,
         'activityId' => null,
         'activities' => $activities,

         'vesselId' => null,
         'vesselName' => 'All',
         'date' => 'All',
         'activity' => 'All',
         'qty' => count($requests),
         'totalFuel' => null,
         'totalWater' => null
      ])->with('i');
   }

   public function progressFilter(Request $req){
      // dd('filter');

      $vessels = Vessel::get();
      $activities = Activity::get();
      $vessel = Vessel::find($req->vessel);
      $activity = Activity::find($req->activity);

      // if ($req->vessel == 'all' && $req->activity == 'all') {
      //    $requests = ModelsRequest::orderBy('date', 'asc')->get();
      //    $vesselName ='All';
      //    $activity = 'All';
      // }
      $startDate = $req->start;
      $endDate = $req->end;

      $requests = ModelsRequest::where('activity_id', $req->activity)->whereBetween('date', [$startDate, $endDate])->orderBy('date', 'asc')->get();
      $finalReqs = array();
      $totalFuel = null;
      $totalWater = null;

      foreach($requests as $req){
         if ($req->schedule_id != null && $req->schedule->vessel_id == $vessel->id) {
            $finalReqs[] = $req;
            if ($req->activity_id == 5) {
               $totalFuel += $req->qty_approve;
            }

            if ($req->activity_id == 6) {
               $totalWater += $req->qty_approve;
            }
             
         }
      }

      // dd($activity->id);
     
      return view('pages-stisla.marine.schedule.top.progress',[
        
         'vessels' => $vessels,
         'requests' => $finalReqs,
         'activities' => $activities,

         // 'vesselId' => $vessel->id,
         'vesselName' => $vessel->name,
         'date' => formatDate($startDate) . ' - ' . formatDate($endDate),
         'activityId' => $activity->id,
         'activity' => $activity->name,
         'qty' => count($finalReqs),
         'totalFuel' => $totalFuel,
         'totalWater' => $totalWater
      ])->with('i');
   }
   public function inbox()
   {
      $cargoSchedules = Schedule::where('by', 'user')->where('class', 'Cargo/Crew')->where('status', 0)->get();
      $movingSchedules = Schedule::where('type', 2)->where('class', '!=', 'Cargo/Crew')->where('status', 0)->get();

      return view('pages-stisla.marine.schedule.inbox', [
         'cargoSchedules' => $cargoSchedules,
         'movingSchedules' => $movingSchedules
      ])->with('i');
   }

   public function plan($month){
      $dekripMonth = dekripRambo($month);
      $regulerSchedules = Schedule::where('type', 1)->whereMonth('date', $dekripMonth)->get();
      $schedules = Schedule::whereMonth('created_at', $dekripMonth)->orderBy('vessel_type', 'asc')->get();
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

      return view('pages-stisla.marine.schedule.top.plan', [
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

   public function planOld($month)
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
         // dd($elok->name . ' Type: ' .  $elok->type);
         $sigap = Vessel::find(6);
         $tegas = Vessel::find(36);

         foreach ($mondays as $monday) {
            // dd($day->format('Y-m-d'));
            // $tuesday = $monday->addDays(1);
            $lastSchedule = Schedule::orderBy("created_at", "desc")->first();
            if (isset($lastSchedule)) {
               $scheduleCode =
                  "SO"  . '/' . $now->format("dmy") . '/' . ($lastSchedule->id + 1);
            } else {
               $scheduleCode = "SO"   . '/' . $now->format("dmy") . '/' . 1;
            }
            // dd($elok->name . ' Type: ' .  $elok->type);
            if($elok->type == 'Crew Boat'){
               $classElok = 'Crew';
               // dd('crew');
            } else{
               $classElok = 'Cargo';
               // dd('cargo');
            }

            $elokMonday = Schedule::create([
               'by' => 'system',
               // 'code' => $scheduleCode,
               'type' => 1,
               'status' => 0,
               'class' => $classElok,
               'vessel_id' => $elok->id,
               'vessel_type' => $elok->type,
               'date' => $monday->format('Y-m-d'),
               'etd' => $monday->format('Y-m-d'),
               'eta' => $monday->format('Y-m-d'),
            ]);
            $elokCode = "SO"  . '/' . $now->format("dmy") . '/' . $elokMonday->id;
            $elokMonday->update([
               'code' => $elokCode
            ]);

            ScheduleRoute::create([
               'schedule_id' => $elokMonday->id,
               'port_id' => $giat->vesselSchedule->monday_id,
               'rank' => 1,
               'status' => 1,
               'date' => $monday
            ]);


            $lastSchedule = Schedule::orderBy("created_at", "desc")->first();
            if (isset($lastSchedule)) {
               $scheduleCode =
                  "SO"  . '/' . $now->format("dmy") . '/' . ($lastSchedule->id + 1);
            } else {
               $scheduleCode = "SO"   . '/' . $now->format("dmy") . '/' . 1;
            }

            if($giat->type == 'Crew Boat'){
               $classGiat = 'Crew';
            } else{
               $classGiat = 'Cargo';
            }
            $giatMonday = Schedule::create([
               'by' => 'system',
               'type' => 1,
               'status' => 0,
               'class' => $classGiat,
               'vessel_id' => $giat->id,
               'vessel_type' => $giat->type,
               'date' => $monday->format('Y-m-d'),
               'etd' => $monday->format('Y-m-d'),
               'eta' => $monday->format('Y-m-d'),
            ]);
            $giatCode = "SO"  . '/' . $now->format("dmy") . '/' . $giatMonday->id;
            $giatMonday->update([
               'code' => $giatCode
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
            $lastSchedule = Schedule::orderBy("created_at", "desc")->first();
            if (isset($lastSchedule)) {
               $scheduleCode =
                  "SO"  . '/' . $now->format("dmy") . '/' . ($lastSchedule->id + 1);
            } else {
               $scheduleCode = "SO"   . '/' . $now->format("dmy") . '/' . 1;
            }

            if($elok->type == 'Crew Boat'){
               $classElok = 'Crew';
            } else{
               $classElok = 'Cargo';
            }

            // dd($elok->name);

            $elokWednesday = Schedule::create([
               'by' => 'system',
               'type' => 1,
               'status' => 0,
               'vessel_id' => $elok->id,
               'vessel_type' => $elok->type,
               'class' => $classElok,
               'date' => $wednesday->format('Y-m-d'),
               'etd' => $wednesday->format('Y-m-d'),
               'eta' => $wednesday->format('Y-m-d'),
            ]);
            $elokWCode = "SO"  . '/' . $now->format("dmy") . '/' . $elokWednesday->id;
            $elokWednesday->update([
               'code' => $elokWCode
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
            $lastSchedule = Schedule::orderBy("created_at", "desc")->first();
            if (isset($lastSchedule)) {
               $scheduleCode =
                  "SO"  . '/' . $now->format("dmy") . '/' . ($lastSchedule->id + 1);
            } else {
               $scheduleCode = "SO"   . '/' . $now->format("dmy") . '/' . 1;
            }
            if($giat->type == 'Crew Boat'){
               $classGiat = 'Crew';
            } else{
               $classGiat = 'Cargo';
            }
            $giatSaturday = Schedule::create([
               'by' => 'system',
               'type' => 1,
               'class' => $classGiat,
               'status' => 0,
               'vessel_id' => $giat->id,
               'vessel_type' => $giat->type,
               'date' => $saturday->format('Y-m-d'),
               'etd' => $saturday->format('Y-m-d'),
               'eta' => $saturday->format('Y-m-d'),
            ]);
            $giatSCode = "SO"  . '/' . $now->format("dmy") . '/' . $giatSaturday->id;
            $giatSaturday->update([
               'code' => $giatSCode
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
            $lastSchedule = Schedule::orderBy("created_at", "desc")->first();
            if (isset($lastSchedule)) {
               $scheduleCode =
                  "SO"  . '/' . $now->format("dmy") . '/' . ($lastSchedule->id + 1);
            } else {
               $scheduleCode = "SO"   . '/' . $now->format("dmy") . '/' . 1;
            }

            if($sigap->type == 'Crew Boat'){
               $classSigap = 'Crew';
            } else{
               $classSigap = 'Cargo';
            }
            $sigapSunday = Schedule::create([
               'by' => 'system',
               'type' => 1,
               'class' => $classSigap,
               'status' => 0,
               'vessel_id' => $sigap->id,
               'vessel_type' => $sigap->type,
               'date' => $sunday->format('Y-m-d'),
               'etd' => $sunday->format('Y-m-d'),
               'eta' => $sunday->format('Y-m-d'),
            ]);
            $sigapCode = "SO"  . '/' . $now->format("dmy") . '/' . $sigapSunday->id;
            $sigapSunday->update([
               'code' => $sigapCode
            ]);

            $lastSchedule = Schedule::orderBy("created_at", "desc")->first();
            if (isset($lastSchedule)) {
               $scheduleCode =
                  "SO"  . '/' . $now->format("dmy") . '/' . ($lastSchedule->id + 1);
            } else {
               $scheduleCode = "SO"   . '/' . $now->format("dmy") . '/' . 1;
            }

            if($tegas->type == 'Crew Boat'){
               $classTegas = 'Crew';
            } else{
               $classTegas = 'Cargo';
            }
            $tegasSunday = Schedule::create([
               'by' => 'system',
               'type' => 1,
               'class' => $classTegas,
               'status' => 0,
               'vessel_id' => $tegas->id,
               'vessel_type' => $tegas->type,
               'date' => $sunday->format('Y-m-d'),
               'etd' => $sunday->format('Y-m-d'),
               'eta' => $sunday->format('Y-m-d'),
            ]);
            $tegasCode = "SO"  . '/' . $now->format("dmy") . '/' . $tegasSunday->id;
            $tegasSunday->update([
               'code' => $tegasCode
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
         $schedules = Schedule::orderBy('date', 'asc')->where('status', '=', 0)->where('by', '!=', 'user')->orderBy('vessel_type', 'asc')->get();
         $regulerSchedules = Schedule::orderBy('updated_at', 'desc')->where('status', '=', 0)->where('by', '!=', 'user')->whereMonth('date', $dekripMonth)->get();
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

      return view('pages-stisla.marine.schedule.top.plan', [
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
      // dd('create');
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

   public function storeNew(Request $req){
      // dd($req->start);
      $now = Carbon::today();
      $vessel = Vessel::find($req->vessel);
      $lastSchedule = Schedule::orderBy("created_at", "desc")->first();
      if (isset($lastSchedule)) {
         $scheduleCode =
            "SO"  . '/' . $now->format("dmy") . '/' . ($lastSchedule->id + 1);
      } else {
         $scheduleCode = "SO"   . '/' . $now->format("dmy") . '/' . 1;
      }

      if ($vessel->type == 'Crew Boat') {
         $class = 'Crew';
      } else {
         $class = 'Cargo';
      }

      $schedule = Schedule::create([
         'by' => 'marine',
         'code' => $scheduleCode,
         'class' => $class,
         'type' => 2,
         'status' => 0,
         'vessel_id' => $vessel->id,
         'vessel_type' => $vessel->type,
         'date' => $req->date,
      ]);

      

      return redirect()->back()->with('success', 'Sailing Order successfully added');
   }

   public function storeCrewChangeSchedule(Request $req){
      $now = Carbon::today();
      $vessel = Vessel::find($req->vessel);
      $lastSchedule = Schedule::orderBy("created_at", "desc")->first();
      if (isset($lastSchedule)) {
         $scheduleCode =
            "SO"  . '/' . $now->format("dmy") . '/' . ($lastSchedule->id + 1);
      } else {
         $scheduleCode = "SO"   . '/' . $now->format("dmy") . '/' . 1;
      }

      $schedule = Schedule::create([
         'by' => 'marine',
         'code' => $scheduleCode,
         'class' => 'Crew Change',
         'type' => 2,
         'status' => 0,
         'vessel_id' => $vessel->id,
         'vessel_type' => $vessel->type,
         'date' => $req->date,
         'description' => $req->func
      ]);

      return redirect()->route('marine.crew.change', [enkripRambo($now->format('m')), enkripRambo($now->format('Y'))] )->with('success', 'Schedule Crew Change successfully added');

   }

   public function importCrewChange(Request $req){
      $now = Carbon::today();
      $schedule = Schedule::find($req->schedule);
      // dd($schedule->requests);
      if (count($schedule->requests) > 0) {
         dd('ada req');
      } else {
         $request = ModelsRequest::orderBy("created_at", "desc")->first();
         if (isset($request)) {
            $code = "R/M/" . $now->format("dmy") . '/' . ($request->id + 1);
         } else {
            $code = "R/M/" . $now->format("dmy") . '/' . 1;
         }
         $requestUser = ModelsRequest::create([
            'code' => $code,
            'type' => 2,
            'class' => 'main',
            'activity_id' => 2,
            'user_id' => auth()->user()->id,
            'user_name' => auth()->user()->name,
            'employee_id' => auth()->user()->id,
            // 'department_id' => 'Marine',
            'func' => 'Marine',
            'schedule_id' => $schedule->id,
            'date' => $req->date,
            'origin_id' => $req->origin,
            'destination_id' => $req->destination,
            'status' => 2
         ]);
      }

      Excel::import(new CrewsImport($requestUser->id), $req->file('file-crew'));

      return redirect()->back()->with('success', 'Manifest Crew imported');
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
      $now = Carbon::today();
      $vessel = Vessel::find($req->vessel);
      $lastSchedule = Schedule::orderBy("created_at", "desc")->first();
      if (isset($lastSchedule)) {
         $scheduleCode =
            "SO"  . '/' . $now->format("dmy") . '/' . ($lastSchedule->id + 1);
      } else {
         $scheduleCode = "SO"   . '/' . $now->format("dmy") . '/' . 1;
      }

      $vesselHasSchedule = Schedule::where('date', $req->date)->where('vessel_id', $vessel->id)->first();
      if ($vesselHasSchedule) {
         return redirect()->back()->with('error', 'This vessel has already schedule at that day');
      } else {
         $schedule = Schedule::create([
            'by' => 'marine',
            'code' => $scheduleCode,
            'class' => 'Cargo',
            'type' => 2,
            'status' => 0,
            'vessel_id' => $vessel->id,
            'vessel_type' => $vessel->type,
            'date' => $req->date,
            // 'etd' => $req->departure_estimasi,
            // 'eta' => $req->arrive_estimasi,
            'remark' => $req->remark
         ]);

         ScheduleRoute::create([
            'schedule_id' => $schedule->id,
            'port_id' => $req->port,
            'rank' => 1,
            'status' => 1,
            'date' => $now
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

   public function jettyUpdate(Request $req){
      $schedule = Schedule::find($req->schedule);
      $schedule->update([
         'remark' => $req->jetty
      ]);

      return redirect()->back()->with('success', 'Jetty updated');
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

      return redirect()->route('marine.request')->with('success', 'Schedule deleted');
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

      if ($schedule->class == 'Cargo' || $schedule->class == 'Crew') {
         foreach ($schedule->requests->where('status', 2) as $req) {
            $req->update([
               'status' => 3
            ]);
   
            ReportRequest::create([
               'request_id' => $req->id,
               'status_id' => $status->id,
   
            ]);
         }
      } else {
         foreach ($schedule->requests as $req) {
            $req->update([
               'status' => 3
            ]);
   
            ReportRequest::create([
               'request_id' => $req->id,
               'status_id' => $status->id,
   
            ]);
         }
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

      foreach($schedule->revisions as $rev){
         $rev->update([
            'status' => 0
         ]);
      }



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
      // dd($req->schedule);
      // $scheduleRoute = ScheduleRoute::find($req->destination);
      $lastScheduleRoute = ScheduleRoute::where('schedule_id', $req->schedule)->where('status', 1)->orderBy('rank', 'desc')->first();
      // dd($lastScheduleRoute->rank);
      if ($lastScheduleRoute) {
         $rank = $lastScheduleRoute->rank + 1;
      } else {
         $rank = 1;
      }

      ScheduleRoute::create([
         'schedule_id' => $req->schedule,
         'status' => 1,
         'port_id' => $req->destination,
         'rank' => $rank
      ]);

      // $scheduleRoute->update([
      //    'status' => 1,
      //    'rank' => $rank
      // ]);

      return redirect()->back()->with('success', 'Schedule Route successfully added');
   }

   public function reorderRoute(Request $req)
   {

      $choseRoute = ScheduleRoute::find($req->route);
      $schedule = Schedule::find($choseRoute->schedule_id);
      // dd($choseRoute->port->name);

      if ($req->after) {
         $after = ScheduleRoute::find($req->after);
         // dd($after->port->name);
         $remainRoutes = ScheduleRoute::where('schedule_id', $schedule->id)->where('rank', '>', $after->rank)->where('id', '!=', $choseRoute->id)->get();
         foreach ($remainRoutes as $rr) {
            $rr->update([
               'rank' => $rr->rank + 1
            ]);
         }
         $newRank = $after->rank + 1;
      } else{
         $newRank = $choseRoute->rank;
      }
      

      $choseRoute->update([
         'date' => $req->date,
         'rank' => $newRank
      ]);

      return redirect()->back()->with('success', 'Schedule Route successfully updated');
   }

   public function deleteRoute($id){
      $dekripId = dekripRambo($id);
      // dd($dekripId);
      $scheduleRoute = ScheduleRoute::find($dekripId);
      // dd($scheduleRoute->id);
      $scheduleRoute->delete();

      return redirect()->back()->with('success', 'Route deleted');
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

   public function history()
   {
      // $dekripMonth = dekripRambo($month);

      // $today = Carbon::now();
      // $month = $today->format('m');

      $schedules = Schedule::orderBy('date', 'asc')->where('status', '=', 11)->get();

      // $vessels = Vessel::get();
      // $ports = Port::get();

      // if ($dekripMonth == 1) {
      //    $monthName = 'Januari';
      // } elseif ($dekripMonth == 2) {
      //    $monthName = 'Februari';
      // } elseif ($dekripMonth == 3) {
      //    $monthName = 'Maret';
      // } elseif ($dekripMonth == 4) {
      //    $monthName = 'April';
      // } elseif ($dekripMonth == 5) {
      //    $monthName = 'Mei';
      // } elseif ($dekripMonth == 6) {
      //    $monthName = 'Juni';
      // } elseif ($dekripMonth == 7) {
      //    $monthName = 'Juli';
      // } elseif ($dekripMonth == 8) {
      //    $monthName = 'Agustus';
      // } elseif ($dekripMonth == 9) {
      //    $monthName = 'September';
      // } elseif ($dekripMonth == 10) {
      //    $monthName = 'Oktober';
      // } elseif ($dekripMonth == 11) {
      //    $monthName = 'November';
      // } elseif ($dekripMonth == 12) {
      //    $monthName = 'Desember';
      // }
      return view('pages-stisla.marine.schedule.history', [
         // 'typeName' => 'by Request',
         // 'type' => 2,
         // 'month' => $month,
         // 'monthName' => $monthName,
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
