<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Deviation;
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





   public function createOld()
   {
      $vessels = Vessel::get();
      $ports = Port::get();
      return view('pages.schedule.create', [
         'vessels' => $vessels,
         'ports' => $ports
      ]);
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
      $ports = Port::get();
      if (auth()->user()->hasRole('marine')) {
         $deviations = Deviation::where('schedule_id', $schedule->id)->where('status', '>=', 0)->get();
      } elseif (auth()->user()->hasRole('vessel')) {
         $deviations = Deviation::where('schedule_id', $schedule->id)->where('status', '>=', 0)->get();
      } else {
         $deviation = null;
      }

      $persenWeight = $schedule->total_weight / $schedule->vessel->deadweight * 100;
      $persenSize = $schedule->total_size / $schedule->vessel->deckspace * 100;
      // dd(round($persen));
      return view('pages.schedule.detail', [
         'schedule' => $schedule,
         'report' => $report,
         'requests' => $requests,
         'vessels' => $vessel,
         'ports' => $ports,
         'deviations' => $deviations,
         'persenWeight' => round($persenWeight),
         'persenSize' => round($persenSize)
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
