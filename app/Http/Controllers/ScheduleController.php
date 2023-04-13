<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Port;
use App\Models\Report;
use App\Models\Request as ModelsRequest;
use App\Models\Schedule;
use App\Models\Type;
use App\Models\Vessel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
   public function fixed()
   {
      $schedules = Schedule::get();
      dd($schedules);
      $vessels = Vessel::get();
      $ports = Port::get();
      return view('pages.schedule.index', [
         'typeName' => 'Fix',
         'type' => 1,
         'schedules' => $schedules,
         'vessels' => $vessels,
         'ports' => $ports
      ])->with('i');
   }

   public function request()
   {

      $today = Carbon::now();
      $month = $today->format('m');

      if (auth()->user()->hasRole('vessel')) {
         $schedules = Schedule::where('vessel_id', auth()->user()->getVesselId())->get();
      } else {
         $schedules = Schedule::get();
      }

      $vessels = Vessel::get();
      $ports = Port::get();

      // if ($month == 1) {
      //    $monthName = 'Januari';
      // } elseif ($month == 2) {
      //    $monthName = 'Februari';
      // } elseif ($month == 3) {
      //    $monthName = 'Maret';
      // } elseif ($month == 4) {
      //    $monthName = 'April';
      // } elseif ($month == 5) {
      //    $monthName = 'Mei';
      // } elseif ($month == 6) {
      //    $monthName = 'Juni';
      // } elseif ($month == 7) {
      //    $monthName = 'Juli';
      // } elseif ($month == 8) {
      //    $monthName = 'Agustus';
      // } elseif ($month == 9) {
      //    $monthName = 'September';
      // } elseif ($month == 10) {
      //    $monthName = 'Oktober';
      // } elseif ($month == 11) {
      //    $monthName = 'November';
      // } elseif ($month == 12) {
      //    $monthName = 'Desember';
      // }
      return view('pages.schedule.index', [
         'typeName' => 'by Request',
         'type' => 2,
         'month' => $month,
         'monthName' => '',
         'schedules' => $schedules,
         'vessels' => $vessels,
         'ports' => $ports
      ])->with('i');
   }

   public function month($month)
   {
      $dekripMonth = dekripRambo($month);
      if (auth()->user()->hasRole('vessel')) {
         $schedules = Schedule::where('vessel_id', auth()->user()->getVesselId())->whereMonth('date', $dekripMonth)->get();
      } else {
         $schedules = Schedule::whereMonth('date', $dekripMonth)->get();
      }

      $vessels = Vessel::get();
      $ports = Port::get();

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

      return view('pages.schedule.index', [
         'typeName' => 'by Request',
         'type' => 2,
         'month' => $dekripMonth,
         'monthName' => $monthName,
         'schedules' => $schedules,
         'vessels' => $vessels,
         'ports' => $ports
      ])->with('i');
   }



   public function create()
   {
      $vessels = Vessel::get();
      $ports = Port::get();
      $types = Type::get();
      return view('pages.schedule.create', [
         'vessels' => $vessels,
         'ports' => $ports,
         'types' => $types
      ]);
   }

   public function createOld()
   {
      $vessels = Vessel::get();
      $ports = Port::get();
      return view('pages.schedule.create', [
         'vessels' => $vessels,
         'ports' => $ports
      ]);
   }

   public function store(Request $req)
   {
      $req->validate([]);
      // dd($req->type);
      $vessel = Vessel::find($req->vessel);

      Schedule::create([
         'type' => 2,
         'status' => 0,
         'vessel_id' => $req->vessel,
         'date' => $req->date,
         'origin_id' => $req->origin,
         'destination_id' => $req->destination,
         'etd' => $req->departure_estimasi,
         'eta' => $req->arrive_estimasi,
         'remark' => $req->remark
      ]);

      $vessel->update([
         'status' => 1
      ]);

      return redirect()->route('schedule.request')->with('success', 'Schedule successfuly added');
   }

   public function storeOld(Request $req)
   {
      $req->validate([]);
      // dd($req->type);

      Schedule::create([
         'type' => 2,
         'status' => 1,
         'func' => $req->func,
         'station' => $req->station,
         'activity' => $req->activity,
         'date' => $req->date,
         'req_boat' => $req->req_boat,
         'origin_id' => $req->origin,
         'destination_id' => $req->destination,
      ]);

      return redirect()->route('schedule.request')->with('success', 'Schedule successfuly added');
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
         'activities' => $vessels
      ]);
   }

   public function update(Request $req)
   {
      $schedule = Schedule::find($req->schedule);
      $schedule->update([
         'vessel_id' => $req->vessel,
         'date' => $req->date,
         'origin_id' => $req->origin,
         'destination_id' => $req->destination,
         'etd' => $req->departure_estimasi,
         'eta' => $req->arrive_estimasi,
         'remark' => $req->remark
      ]);

      return redirect()->route('schedule.detail', enkripRambo($schedule->id))->with('success', 'Schedule has successfully updated');
   }

   public function detail($id)
   {
      $dekripId = dekripRambo($id);
      $schedule = Schedule::find($dekripId);
      $requests = ModelsRequest::where('schedule_id', $schedule->id)->where('status', '>=', 2)->get();
      // $report = Report::where('schedule_id', $schedule->id)->first();
      $vessel = Vessel::get();
      $report = Report::where('schedule_id', $schedule->id)->first();
      // dd($schedule->requests());
      // dd($report->loading);
      return view('pages.schedule.detail', [
         'schedule' => $schedule,
         'report' => $report,
         'requests' => $requests,
         'vessels' => $vessel,
         // 'report' => $requests
      ]);
   }

   public function timeline($id)
   {
      $dekripId = dekripRambo($id);
      $schedule = Schedule::find($dekripId);

      return view('pages.schedule.timeline', [
         'schedule' => $schedule
      ]);
   }
}
