<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Deviation;
use App\Models\Port;
use App\Models\Postpone;
use App\Models\Report;
use App\Models\Request as ModelsRequest;
use App\Models\Schedule;
use App\Models\ScheduleRoute;
use App\Models\Status;
use App\Models\Type;
use App\Models\Vessel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\PostInc;

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
         $schedules = Schedule::where('vessel_id', auth()->user()->getVesselId())->whereMonth('date', $dekripMonth)->where('status', 2)->get();
      } else {
         $schedules = Schedule::whereMonth('date', $dekripMonth)->where('status', '<', 4)->get();
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
      $requests = ModelsRequest::where('schedule_id', $schedule->id)->where('status', '>=', 2)->orderBy('destination_id', 'desc')->orderBy('updated_at', 'asc')->get();
      $recentRequests = ModelsRequest::where('origin_id', '=', $schedule->origin_id)->where('status', '=', 1)->get();

      $statuses = Status::get();
      $ports = Port::get();
      $reports = Report::where('schedule_id', $schedule->id)->get();
      $routes = ScheduleRoute::where('schedule_id', $schedule->id)->get();
      $lastPostpone = Postpone::where('schedule_id', $schedule->id)->orderBy('updated_at', 'desc')->first();
      // dd($lastPostpone->to);

      // $inboxs = ModelsRequest::where('status', '=', 1)->get();

      foreach ($routes as $route) {
         $reqs = ModelsRequest::where('origin_id', '=', $route->port_id)->where('status', '=', 1)->get();
         foreach ($reqs as $req) {
            $recentRequests[] = $req;
         }
      }

      // dd($recentRequests->count())

      // dd($recentRequests);
      // $destinations = ModelsRequest::where('schedule_id', $schedule->id)->where('status', '>=', 2)->get();

      // $dests = ModelsRequest::select('destination_id')->where('schedule_id', $schedule->id)->where('status', '>=', 2)
      //    ->get();
      $destinations = ModelsRequest::selectRaw('destination_name')->where('schedule_id', $schedule->id)->where('status', '>=', 2)->orderBy('updated_at', 'asc')->get()->groupBy('destination_name');
      $iddestinations = ModelsRequest::selectRaw('destination_id')->where('schedule_id', $schedule->id)->where('status', '>=', 2)->orderBy('updated_at', 'asc')->get()->groupBy('destination_id');
      // dd($iddestinations);

      // $report = Report::where('schedule_id', $schedule->id)->first();
      $vessel = Vessel::get();
      $report = Report::where('schedule_id', $schedule->id)->first();
      $lastreport = Report::where('schedule_id', $schedule->id)->orderBy('created_at', 'desc')->first();
      // dd($report);
      // dd($report->loading);

      if (auth()->user()->hasRole('marine')) {
         $deviations = Deviation::where('schedule_id', $schedule->id)->where('status', '>=', 0)->get();
      } elseif (auth()->user()->hasRole('vessel')) {
         $deviations = Deviation::where('schedule_id', $schedule->id)->where('status', '>=', 0)->get();
      } else {
         $deviations = null;
      }

      $persenWeight = $schedule->total_weight / $schedule->vessel->deadweight * 100;
      $persenSize = $schedule->total_size / $schedule->vessel->deckspace * 100;
      // dd(round($persen));
      return view('pages.schedule.detail', [
         'schedule' => $schedule,
         'report' => $report,
         'lastreport' => $lastreport,
         'reports' => $reports,
         'requests' => $requests,
         'vessels' => $vessel,
         'ports' => $ports,
         'routes' => $routes,
         'statuses' => $statuses,
         'deviations' => $deviations,
         'persenWeight' => round($persenWeight),
         'persenSize' => round($persenSize),
         'destinations' => $destinations,
         'iddestinations' => $iddestinations,
         'recentRequests' => $recentRequests,
         'lastPostpone' => $lastPostpone
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
