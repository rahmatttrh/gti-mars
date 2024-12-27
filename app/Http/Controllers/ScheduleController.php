<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Cargo;
use App\Models\CargoItem;
use App\Models\Deflection;
use App\Models\Deviation;
use App\Models\Offloading;
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
      // dd('ok');
      $now = Carbon::now();
      // dd($now->addDay(1));
      $dekripId = dekripRambo($id);
      $schedule = Schedule::find($dekripId);
      $schedules = Schedule::orderBy('date', 'asc')->get();

      // dd(count($schedules));
      // $ahtsVessels = Vessel::where('type', 'AHTS')->get();

      // $recentRequests = ModelsRequest::where('date', $schedule->date)->where('status', '=', 1)->get();

      $recentRequests = ModelsRequest::where('status', 1)->where('activity_id','!=', 7)->get();
      $recentCrewChangeRequests = ModelsRequest::where('activity_id', 7)->where('status', 1)->get();

      if ($schedule->class == 'Crew Change') {
         // dd(count($schedule->requests));
         $totalDeparture = null;
         $totalReturn = null;
         foreach($schedule->requests->where('activity_id', 7) as $req){
            // dd(count($req->passengerItems->where('type', 'Departure')));
            $totalDeparture += count($req->passengerItems->where('type', 'Departure'));
         }
         foreach($schedule->requests->where('activity_id', 7) as $req){
            // dd(count($req->passengerItems->where('type', 'Departure')));
            $totalReturn += count($req->passengerItems->where('type', 'Return'));
         }

         $schedule->update([
            'total_depart' => $totalDeparture,
            'total_return' => $totalReturn
         ]);

         // dd($totalDeparture);
      } else {
         $totalDeparture = null;
         $totalReturn = null;
         foreach($schedule->requests->where('activity_id', 2)->where('status', '!=', 12) as $req){
            // dd(count($req->passengerItems->where('type', 'Departure')));
            $totalDeparture += count($req->passengerItems->where('type', 'Departure'));
         }
      }
      


      if ($schedule->class == 'Cargo' || $schedule->class == 'Crew') {
         // dd('moving');
         $vessels = Vessel::get();
         $statuses = Status::where('class', 'cargo')->where('type', 1)->get();
      } 
      // elseif($schedule->class == 'Fuel Oil' || $schedule->class == 'Fresh Water' ) {
      //    // dd('cargo/crew');
      //    $statuses = Status::where('type', 1)->get();
      // } 
      else {
         // dd('cargo/crew');
         // $vessels = Vessel::where('type', 'AHTS')->get();
         $vessels = Vessel::get();
         $statuses = Status::where('class', 'moving')->where('type', 1)->get();
      }

      $ports = Port::get();
      $scheduleRoutes = ScheduleRoute::where('schedule_id', $schedule->id)->orderBy('rank', 'asc')->get();
      $reports = Report::where('schedule_id', $schedule->id)->orderBy('created_at', 'desc')->paginate('3');
      $report = Report::where('schedule_id', $schedule->id)->orderBy('created_at', 'desc')->first();
      $routes = ScheduleRoute::where('schedule_id', $schedule->id)->get();
      $fixRoutes = ScheduleRoute::where('schedule_id', $schedule->id)->where('status', 1)->orderBy('rank', 'asc')->get();
      // dd($fixRoutes);
      $lastPostpone = Postpone::where('schedule_id', $schedule->id)->orderBy('updated_at', 'desc')->first();
      // dd($lastPostpone->to);

      // $inboxs = ModelsRequest::where('status', '=', 1)->get();

      // if (auth()->user()->hasRole('vessel')) {
      //    $acts = Activity::get();
      // } else {
      //    if (auth()->user()->getDepartment()->name == 'Logistic') {
      //       $acts = Activity::where('type_id', 1)->get();
      //    } elseif (auth()->user()->getDepartment()->name == 'drilling') {
      //       $acts = Activity::where('type_id', 3)->orWhere('type_id', 4)->orWhere('type_id', 2)->get();
      //    } else {
      //       $acts = Activity::get();
      //    }
      // }
      $acts = Activity::get();
      $activities = $acts;

      if (auth()->user()->hasRole('marine')) {
         $requests = ModelsRequest::where('schedule_id', $schedule->id)->where('status', '>=', 2)->orderBy('rank', 'asc')->get();
      } elseif (auth()->user()->hasRole('department')) {
         $requests = ModelsRequest::where('schedule_id', $schedule->id)->where('status', '>=', 3)->orWhere('class', 'additional')->where('status', '>=', 2)->orderBy('rank', 'asc')->get();
      } else {
         $requests = ModelsRequest::where('schedule_id', $schedule->id)->where('status', '>=', 2)->where('status', '!=', 505)->orderBy('rank', 'asc')->get();
      }


      // foreach ($routes as $route) {
      //    $reqs = ModelsRequest::where('origin_id', '=', $route->port_id)->where('status', '=', 1)->get();
      //    foreach ($reqs as $req) {
      //       $recentRequests[] = $req;
      //    }
      // }

      // dd($recentRequests->count())

      // dd($recentRequests);
      // $destinations = ModelsRequest::where('schedule_id', $schedule->id)->where('status', '>=', 2)->get();

      // $dests = ModelsRequest::select('destination_id')->where('schedule_id', $schedule->id)->where('status', '>=', 2)
      //    ->get();
      $destinations = ModelsRequest::selectRaw('destination_name')->where('schedule_id', $schedule->id)->where('status', '>=', 2)->orderBy('updated_at', 'asc')->get()->groupBy('destination_name');
      $iddestinations = ModelsRequest::selectRaw('destination_id')->where('schedule_id', $schedule->id)->where('status', '>=', 2)->orderBy('updated_at', 'asc')->get()->groupBy('destination_id');
      // dd($iddestinations);

      // $report = Report::where('schedule_id', $schedule->id)->first();
      // if ($schedule->type == 2) {
      //    $vessel = Vessel::where('type', 'Crew Boat')->get();
      // } else {
      //    $vessel = Vessel::get();
      // }

      

      // $report = Report::where('schedule_id', $schedule->id)->first();
      $lastreport = Report::where('schedule_id', $schedule->id)->orderBy('created_at', 'desc')->first();
      // dd($report);
      // dd($report->loading);

      $offloadings = Offloading::where('schedule_id', $schedule->id)->orderBy('created_at', 'desc')->get();

      if (auth()->user()->hasRole('marine')) {
         $deviations = ModelsRequest::where('class', 'deviation')->where('schedule_id', $schedule->id)->where('status', '>=', 0)->get();
      } elseif (auth()->user()->hasRole('vessel')) {
         $deviations = ModelsRequest::where('class', 'deviation')->where('schedule_id', $schedule->id)->where('status', '>', 0)->get();
      } else {
         $deviations = null;
      }
      // dd($schedule->requests->sum('weight'));
      foreach ($schedule->requests as $request) {
         // dd($request->cargoItems->sum('weight'));
         $request->update([
            'total_weight' => $request->cargoItems->sum('weight')
         ]);
         // foreach($request->cargoItems as $item){
         //    dd($item->weight);
         // }
      }

      $schedule->update([
         'total_weight' => $schedule->requests->where('status', '>', 1)->sum('total_weight')
      ]);

      // dd($schedule->vessel->deadweight);

      if ($schedule->vessel) {
         $persenWeight = $schedule->total_weight / $schedule->vessel->deadweight * 100;
         $persenSize = $schedule->total_size / $schedule->vessel->deckspace * 100;
      } else {
         $persenWeight = 0;
         $persenSize = 0;
      }

      // dd($totalDeparture);

      // dd(round($persenWeight));
      // dd(count($recentCrewChangeRequests));
      // dd(count($requests));
      $activities = Activity::get();
      $types = Type::get();
      $allPorts = Port::where('type', '!=', 'platform')->get();
      $platforms = Port::where('type', 'platform')->get();
      $barges = Port::where('type', 'Barge')->get();
      $cargos = Cargo::where('schedule_id', $schedule->id)->get();
      $items = CargoItem::get();

      $deflections = Deflection::get();

      // dd($items);

      if (auth()->user()->hasRole('vessel') || auth()->user()->hasRole('department')) {
         return view('pages-stisla.schedule.detail', [
            'schedules' => $schedules,
            'schedule' => $schedule,
            'report' => $report,
            'lastreport' => $lastreport,
            'reports' => $reports,
            'requests' => $requests,
            'vessels' => $vessels,
            // 'ahtsVessels' => $ahtsVessels,
            'ports' => $ports,
            'routes' => $routes,
            'fixRoutes' => $fixRoutes,
            'statuses' => $statuses,
            'deviations' => $deviations,
            'persenWeight' => round($persenWeight),
            'persenSize' => round($persenSize),
            'destinations' => $destinations,
            'iddestinations' => $iddestinations,
            'recentRequests' => $recentRequests,
            'lastPostpone' => $lastPostpone,
            'activities' => $acts,
            'offloadings' => $offloadings,
            'scheduleRoutes' => $scheduleRoutes,
            'recentCrewChangeRequests' => $recentCrewChangeRequests,
            'totalDeparture' => $totalDeparture,
            'totalReturn' => $totalReturn,
            // 'report' => $requests
            'activities' => $activities,
            'allPorts' => $ports,
            'platforms' => $platforms,
            'barges' => $barges,
            'types' => $types,
            'cargos' => $cargos,
            'items' => $items,
            'deflections' => $deflections
         ]);
      } else {
         return view('pages-stisla.schedule.detail', [
            // 'ahtsVessels' => $ahtsVessels,
            'schedules' => $schedules,
            'schedule' => $schedule,
            'report' => $report,
            'lastreport' => $lastreport,
            'reports' => $reports,
            'requests' => $requests,
            'vessels' => $vessels,
            'ports' => $ports,
            'routes' => $routes,
            'fixRoutes' => $fixRoutes,
            'statuses' => $statuses,
            'deviations' => $deviations,
            'persenWeight' => round($persenWeight),
            'persenSize' => round($persenSize),
            'destinations' => $destinations,
            'iddestinations' => $iddestinations,
            'recentRequests' => $recentRequests,
            'lastPostpone' => $lastPostpone,
            'activities' => $acts,
            'offloadings' => $offloadings,
            'scheduleRoutes' => $scheduleRoutes,
            'recentCrewChangeRequests' => $recentCrewChangeRequests,
            'totalDeparture' => $totalDeparture,
            'totalReturn' => $totalReturn,
            // 'report' => $requests
            'activities' => $activities,
            'allPorts' => $ports,
            'platforms' => $platforms,
            'barges' => $barges,
            'types' => $types,
            'cargos' => $cargos,
            'items' => $items,
            'deflections' => $deflections
         ]);
      }
   }

   public function timeline($id)
   {
      $dekripId = dekripRambo($id);
      $schedule = Schedule::find($dekripId);
      $reports = Report::where('schedule_id', $schedule->id)->orderBy('created_at', 'desc')->get();
      $fixRoutes = ScheduleRoute::where('schedule_id', $schedule->id)->where('status', 1)->orderBy('rank', 'asc')->get();

      return view('pages-stisla.schedule.timeline', [
         'schedule' => $schedule,
         'reports' => $reports,
         'fixRoutes' => $fixRoutes
        
      ]);
   }

   public function editMtd($id){
      $cargoItem = CargoItem::find(dekripRambo($id));
      $schedule = Schedule::find($cargoItem->request->schedule_id);
      $cargos = Cargo::where('schedule_id', $schedule->id)->get();
      $items = CargoItem::get();
      $lastreport = Report::where('schedule_id', $schedule->id)->orderBy('created_at', 'desc')->first();
      $fixRoutes = ScheduleRoute::where('schedule_id', $schedule->id)->where('status', 1)->orderBy('rank', 'asc')->get();
      $report = Report::where('schedule_id', $schedule->id)->orderBy('created_at', 'desc')->first();
      $requests = ModelsRequest::where('schedule_id', $schedule->id)->where('status', '>=', 2)->where('status', '!=', 505)->orderBy('rank', 'asc')->get();

      return view('pages-stisla.schedule.mtd-edit', [
         'schedule' => $schedule,
         'item' => $cargoItem,
         'cargos' => $cargos,
         'items' => $items,
         'lastreport' => $lastreport,
         'fixRoutes' => $fixRoutes,
         'report' => $report,
         'requests' => $requests
      ]);

   }

   public function editBcm($id){
      $cargo = Cargo::find(dekripRambo($id));
      $schedule = Schedule::find($cargo->schedule_id);
      $cargos = Cargo::where('schedule_id', $schedule->id)->get();
      $items = CargoItem::get();
      $lastreport = Report::where('schedule_id', $schedule->id)->orderBy('created_at', 'desc')->first();
      $fixRoutes = ScheduleRoute::where('schedule_id', $schedule->id)->where('status', 1)->orderBy('rank', 'asc')->get();
      $report = Report::where('schedule_id', $schedule->id)->orderBy('created_at', 'desc')->first();
      $requests = ModelsRequest::where('schedule_id', $schedule->id)->where('status', '>=', 2)->where('status', '!=', 505)->orderBy('rank', 'asc')->get();

      return view('pages-stisla.schedule.bcm-edit', [
         'schedule' => $schedule,
         'cargo' => $cargo,
         'cargos' => $cargos,
         'items' => $items,
         'lastreport' => $lastreport,
         'fixRoutes' => $fixRoutes,
         'report' => $report,
         'requests' => $requests
      ]);

   }
}
