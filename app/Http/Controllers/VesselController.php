<?php

namespace App\Http\Controllers;

use App\Models\Port;
use App\Models\Report;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Vessel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VesselController extends Controller
{
   public function index()
   {
      $vessels = Vessel::get();
      return view('pages.vessel.index', [
         'vessels' => $vessels
      ])->with('i');
   }

   public function create()
   {
      return view('pages.vessel.create');
   }

   public function store(Request $req)
   {
      $req->validate([]);

      Vessel::create([
         'name' => $req->name,
         'email' => $req->email,
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

         'class_notation' => $req->class_notation,
         'loa' => $req->loa,
         'beam' => $req->beam,
         'depth' => $req->depth,
         'max_draft' => $req->max_draft,
         'deadweight' => $req->deadweight,
         'gross' => $req->gross,
         'desk_space' => $req->desk_space,
         'deck_strength' => $req->deck_strength,
         'deck_cargo_capacity' => $req->deck_cargo_capacity,

         'main_engine' => $req->main_engine,
         'no_engine' => $req->no_engine,
         'no_main_propellers' => $req->no_main_propellers,
         'no_rudder' => $req->no_rudder,
         'generators_and_manufactures' => $req->generators_and_manufactures,
         'no_generator' => $req->no_generator,
         'generator_detail' => $req->generator_detail,
         'kort_nozzle' => $req->kort_nozzle,
         'bow_thruster' => $req->bow_thruster,
         'stern_thruster' => $req->stern_thruster,
         'other_propulsors' => $req->other_propulsors,
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
         'email' => $req->email,
         'password' => Hash::make('12345678')
      ]);

      $user->assignRole('vessel');

      return redirect()->back()->with('success', 'Vessel successfuly added');
   }

   public function edit($id)
   {
      $dekripId = dekripRambo($id);
      $vessel = Vessel::find($dekripId);

      return view('pages.vessel.edit', [
         'vessel' => $vessel
      ]);
   }

   public function update(Request $req)
   {
      $req->validate([]);

      $vessel = Vessel::find($req->vessel);
      $user = User::where('email', $req->email)->first();
      $vessel->update([
         'name' => $req->name,
         'imo' => $req->imo,
         'email' => $req->email,
         'type' => $req->type,
         'flag' => $req->flag,
         'owner' => $req->owner,
         'operator' => $req->operator,
         'deck_cargo_capacity' => $req->deck_cargo_capacity
      ]);

      $user->update([
         'name' => $req->name,
         'email' => $req->email
      ]);
      return redirect()->back()->with('success', 'Vessel successfuly updated');
   }

   public function detail($id)
   {
      $dekripId = dekripRambo($id);
      // dd($dekripId);
      $vessel = Vessel::find($dekripId);
      // dd($vessel->port->name);
      return view('pages.vessel.detail', [
         'vessel' => $vessel
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

   public function history($id)
   {
      $dekripId = dekripRambo($id);
      $vessel = Vessel::find($dekripId);
      $reports = Report::where('vessel_id', $vessel->id)->where('complete', '!=', null)->get();
      return view('pages.vessel.history', [
         'vessel' => $vessel,
         'reports' => $reports
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
}
