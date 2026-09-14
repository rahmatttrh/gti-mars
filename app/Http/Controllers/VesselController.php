<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Port;
use App\Models\Report;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Vdr;
use App\Models\Vessel;
use App\Models\VesselHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class VesselController extends Controller
{
   public function index()
   {
      $vessels = Vessel::where('status', 1)->get();
      $data = 'onhire';
      return view('pages-stisla.master-data.vessel', [
         'vessels' => $vessels,
         'data' => $data
      ])->with('i');
   }

   public function indexOffhire()
   {
      $vessels = Vessel::where('status', 0)->get();
      $data = 'offhire';
      return view('pages-stisla.master-data.vessel', [
         'vessels' => $vessels,
         'data' => $data
      ])->with('i');
   }

   public function create()
   {
      return view('pages-stisla.master-data.vessel-create');
   }

   public function store(Request $req)
   {


      $req->validate([
         'name' => 'required',
         'username' => 'required|unique:vessels',
         // 'email' => 'required|email|unique:vessels',
         'type' => 'required',
      ]);

      if ($req->email != null) {
         $req->validate([
            'email' => 'required|email|unique:vessels',
         ]);

         $email = $req->email;
      } else {
         $email = $req->username . '@test.com';
      }

      if ($req->func == 'Empty') {
         $func = null;
      } else {
         $func = $req->func;
      }

      Vessel::create([
         'status' => $req->status,
         'port_id' => null,
         'username' => $req->username,
         'name' => $req->name,
         'email' => $email,
         'telp' => $req->telp,
         'contract' => $req->contract,
         'contract_type' => $req->contract_type,
         'func' => $func,
         'ipb' => $req->ipb,
         'area' => $req->area,

         'imo' => $req->imo,
         'type' => $req->type,
         'prev_name' => $req->prev_name,
         'flag' => $req->flag,
         'call_sign' => $req->call_sign,
         'owner' => $req->owner,
         'operator' => $req->operator,
         'portname' => $req->port,
         'build' => $req->build,
         'classed_by' => $req->classed_by,

         'class_notation' => $req->class_notation,
         'loa' => $req->loa,
         'beam' => $req->beam,
         'depth' => $req->depth,
         'maxdraft' => $req->maxdraft,
         'deadweight' => 100,
         'gross' => $req->gross,
         'deckspace' => 100,
         'deckstrength' => $req->deckstrength,
         'deckcapacity' => $req->deckcapacity,

         'main_engine' => $req->main_engine,
         'no_engine' => $req->no_engine,
         'no_main_propeller' => $req->no_main_propellers,
         'no_rudder' => $req->no_rudder,
         'generator' => $req->generators_and_manufactures,
         'no_generator' => $req->no_generator,
         'generator_detail' => $req->generator_detail,
         'kort_nozzle' => $req->kort_nozzle,
         'bow_thruster' => $req->bow_thruster,
         'stern_thruster' => $req->stern_thruster,
         'other_propulsor' => $req->other_propulsors,
         'speed_max' => $req->speed_max,
         'speed_eco' => $req->speed_eco,
         'speed_towing' => $req->speed_towing,
         'no_berth' => $req->no_berth,
         'berth_detail' => $req->berth_detail,
         'crane' => $req->crane,
         'comm_system' => $req->comm_system,

         'bunker_type' => $req->bunker_type,
         'bunker_capacity' => $req->bunker_capacity,
         'daily_fuel_consumption' => $req->daily_fuel_consumption,
         'potable_water_capacity' => $req->potable_water_capacity,
         'potable_water' => $req->potable_water,
         'fifi_pump_capacity' => $req->fifi_pump_capacity,
         'no_immarsat' => $req->no_immarsat,
         'no_vsat' => $req->no_vsat,

         'dpa_name' => $req->dpa_name,
         'dpa_telp' => $req->dpa_telp

      ]);

      $user = User::create([
         'name' => $req->name,
         'username' => $req->username,
         'email' => $email,
         'password' => Hash::make('oses_2025')
      ]);

      $user->assignRole('vessel');

      return redirect()->route('vessel')->with('success', 'Vessel successfuly added');
   }

   public function edit($id)
   {
      $dekripId = dekripRambo($id);
      $vessel = Vessel::find($dekripId);



      return view('pages.vessel.edit', [
         'vessel' => $vessel
      ]);
   }


   public function exportPdf()
   {
      $vessels = Vessel::where('status', 1)->where('contract_type', 'Non PO')->get();
      $vesselb = Vessel::where('username', 'inapermata1')->orWhere('username', 'inapermata2')->get();

      $finalVessels  = $vessels->merge($vesselb);

      return view('pages.document.vessel', [
         'vessels' => $finalVessels
      ]);
   }

   public function update(Request $req)
   {

      // dd('OK');
      $req->validate([
         'name' => 'required',
         // 'username' => 'required',
         // 'email' => 'required|email',
         // 'deadweight' => 'required',
         // 'deckspace' => 'required'
      ]);

      $vessel = Vessel::find($req->vessel);
      $user = User::where('email', $vessel->email)->first();

      if ($req->func == 'Empty') {
         $func = null;
      } else {
         $func = $req->func;
      }

      if ($req->area == 'Empty') {
         $area = null;
      } else {
         $area = $req->area;
      }

      $vessel->update([
         'status' => $req->status,
         'name' => $req->name,
         'area' => $area,
         'func' => $func,
         'ipb' => $req->ipb,
         // 'username' => $req->username,
         // 'email' => $req->email,
         'telp' => $req->telp,
         'imo' => $req->imo,
         'type' => $req->type,
         'prev_name' => $req->prev_name,
         'flag' => $req->flag,
         'call_sign' => $req->call_sign,
         'owner' => $req->owner,
         'operator' => $req->operator,
         'portname' => $req->port,
         'build' => $req->build,
         'classed_by' => $req->classed_by,
         'txid' => $req->txid,
         'mmsi' => $req->mmsi,

         'class_notation' => $req->class_notation,
         'loa' => $req->loa,
         'beam' => $req->beam,
         'depth' => $req->depth,
         'maxdraft' => $req->maxdraft,
         'deadweight' => $req->deadweight,
         'gross' => $req->gross,
         'deckspace' => $req->deckspace,
         'deckstrength' => $req->deckstrength,
         'deckcapacity' => $req->deckcapacity,

         'contract' => $req->contract,
         'contract_type' => $req->contract_type,


         // 'main_engine' => $req->main_engine,
         // 'no_engine' => $req->no_engine,
         // 'no_main_propellers' => $req->no_main_propellers,
         // 'no_rudder' => $req->no_rudder,
         // 'generators' => $req->generators_and_manufactures,
         // 'no_generator' => $req->no_generator,
         // 'generator_detail' => $req->generator_detail,
         // 'kort_nozzles' => $req->kort_nozzle,
         // 'bow_thruster' => $req->bow_thruster,
         // 'stern_thruster' => $req->stern_thruster,
         // 'other_propulsors' => $req->other_propulsors,
         // 'speed_max' => $req->speed_max,
         // 'speed_eco' => $req->speed_eco,
         // 'speed_towing' => $req->speed_towing,
         // 'no_berth' => $req->no_berth,
         // 'berth_detail' => $req->berth_detail,
         // 'crane' => $req->crane,
         // 'comm_system' => $req->comm_system,

         // 'bunker_type' => $req->bunker_type,
         // 'bunker_capacity' => $req->bunker_capacity,
         // 'daily_fuel_consumption' => $req->daily_fuel_consumption,
         // 'potable_water_capacity' => $req->potable_water_capacity,
         // 'potable_water' => $req->potable_water,
         // 'fifi_pump_capacity' => $req->fifi_pump_capacity,
         // 'no_immarsat' => $req->no_immarsat,
         // 'no_vsat' => $req->no_vsat,

         'dpa_name' => $req->dpa_name,
         'dpa_telp' => $req->dpa_telp
      ]);

      // $user->update([
      //    'name' => $req->name,
      //    'username' => $req->username,
      //    'email' => $req->email
      // ]);
      return redirect()->route('vessel')->with('success', 'Vessel successfuly updated');
   }

   public function updateEmail(Request $req)
   {
      $req->validate([
         'email_vessel' => 'required'
      ]);
      $vessel = Vessel::find($req->vessel);

      $vessel->update([
         'email' => $req->email_vessel,
         'email_office' => $req->email_office
      ]);

      $user = User::where('username', $vessel->username)->first();
      $user->update([
         'email' => $req->email_vessel
      ]);

      return redirect()->back()->with('success', 'Email updated');
   }


   public function updateStowage(Request $req)
   {
      $req->validate([
         'stowage_plan' => 'required'
      ]);
      $vessel = Vessel::find($req->vessel);
      // dd('ok');
      // dd(request('doc'));
      if (request('stowage_plan')) {
         Storage::delete($vessel->stowage_plan);
         $stowage_plan = request()->file('stowage_plan')->store('stowage/plan');
      } elseif ($vessel->stowage_plan) {
         $stowage_plan = $vessel->stowage_plan;
      } else {
         $stowage_plan = null;
      }

      $vessel->update([
         'stowage_plan' => $stowage_plan
      ]);

      return redirect()->back()->with('success', 'Stowage Plan successfully updated');
   }

   public function detail($id)
   {
      $dekripId = dekripRambo($id);
      // dd($dekripId);
      $vessel = Vessel::find($dekripId);
      // dd($vessel->port->name);
      $today = Carbon::now();
      $lastVdr = Vdr::where('vessel_id', $vessel->id)->orderBy('date', 'desc')->first();

      $activeContract = Contract::where('vessel_id', $vessel->id)->where('status', 1)->first();
      if ($activeContract) {
         $vdrs = Vdr::where('vessel_id', $vessel->id)->whereBetween('date', [$activeContract->start_date, $activeContract->end_date])->orderBy('date', 'desc')->get();
      } else {
         $vdrs = [];
      }
      $contracts = Contract::where('vessel_id', $vessel->id)->orderBy('start_date', 'desc')->get();

      // return view('pages.vessel.detail', [
      return view('pages-stisla.master-data.vessel-detail', [
         'vessel' => $vessel,
         'today' => $today,
         'lastVdr' => $lastVdr,
         'activeContract' => $activeContract,
         'vdrs' => $vdrs,
         'contracts' => $contracts
      ]);
   }

   public function delete($id)
   {
      // dd('okeee');
      $dekripId = dekripRambo($id);
      $vessel = Vessel::find($dekripId);
      // dd(count($vessel->schedules));

      if (count($vessel->schedules) >= 1) {
         // dd('adaa');
         return redirect()->back()->with('warning', 'Failed! This vessel has a schedule');
      } else {
         // dd('kosong');
         $vessel->delete();
         return redirect()->route('vessel')->with('success', 'Vessel successfully deleted');
      }
   }

   public function history($id, $month)
   {
      $dekripId = dekripRambo($id);
      $vessel = Vessel::find($dekripId);
      // ->where('complete', '!=', null)
      $reports = Report::where('vessel_id', $vessel->id)->whereMonth('created_at', $month)->get();
      $schedules = Schedule::where('vessel_id', $vessel->id)->where('status', '>', 0)->whereMonth('date', $month)->get();

      $totalRequests = 0;
      foreach ($schedules as $schedule) {
         $totalRequests = $totalRequests + $schedule->requests()->count();
      }

      // dd($schedules);


      if ($month == 1) {
         $monthName = 'Januari';
      } elseif ($month == 2) {
         $monthName = 'Februari';
      } elseif ($month == 3) {
         $monthName = 'Maret';
      } elseif ($month == 4) {
         $monthName = 'April';
      } elseif ($month == 5) {
         $monthName = 'Mei';
      } elseif ($month == 6) {
         $monthName = 'Juni';
      } elseif ($month == 7) {
         $monthName = 'Juli';
      } elseif ($month == 8) {
         $monthName = 'Agustus';
      } elseif ($month == 9) {
         $monthName = 'September';
      } elseif ($month == 10) {
         $monthName = 'Oktober';
      } elseif ($month == 11) {
         $monthName = 'November';
      } elseif ($month == 12) {
         $monthName = 'Desember';
      }
      return view('pages.vessel.history', [
         'vessel' => $vessel,
         'reports' => $reports,
         'monthName' => $monthName,
         'schedules' => $schedules,
         'totalRequests' => $totalRequests
      ])->with('i');
   }


   public function schedule($id)
   {
      $dekripId = dekripRambo($id);
      $vessel = Vessel::find($dekripId);

      $today = Carbon::now();
      $month = $today->format('m');
      $schedules = Schedule::where('vessel_id', $vessel->id)->whereMonth('date', $month)->get();
      $vessels = Vessel::get();
      $ports = Port::get();

      if ($month == 1) {
         $monthName = 'Januari';
      } elseif ($month == 2) {
         $monthName = 'Februari';
      } elseif ($month == 3) {
         $monthName = 'Maret';
      } elseif ($month == 4) {
         $monthName = 'April';
      } elseif ($month == 5) {
         $monthName = 'Mei';
      } elseif ($month == 6) {
         $monthName = 'Juni';
      } elseif ($month == 7) {
         $monthName = 'Juli';
      } elseif ($month == 8) {
         $monthName = 'Agustus';
      } elseif ($month == 9) {
         $monthName = 'September';
      } elseif ($month == 10) {
         $monthName = 'Oktober';
      } elseif ($month == 11) {
         $monthName = 'November';
      } elseif ($month == 12) {
         $monthName = 'Desember';
      }
      return view('pages.schedule.index', [
         'typeName' => 'by Request',
         'type' => 2,
         'vessel' => $vessel,
         'month' => $month,
         'monthName' => $monthName,
         'schedules' => $schedules,
         'vessels' => $vessels,
         'ports' => $ports
      ])->with('i');
   }

   public function onhire($id)
   {
      // dd('ok');
      $dekripId = dekripRambo($id);
      $vessel = Vessel::find($dekripId);
      $today = Carbon::today();

      VesselHistory::create([
         'vessel_id' => $vessel->id,
         'onhire' => $today
      ]);

      $vessel->update([
         'status' => 1
      ]);



      return redirect()->back()->with('success', 'Vessel set On Hire');
   }

   public function offhire($id)
   {
      $dekripId = dekripRambo($id);
      $vessel = Vessel::find($dekripId);
      $today = Carbon::today();
      $vesselHistory = VesselHistory::where('vessel_id', $vessel->id)->first();
      if ($vesselHistory) {
         $vesselHistory->update([
            'offhire' => $today
         ]);
      } else {
         VesselHistory::create([
            'vessel_id' => $vessel->id,
            'offhire' => $today
         ]);
      }


      $vessel->update([
         'status' => 0
      ]);


      return redirect()->back()->with('success', 'Vessel set Off Hire');
   }
}
