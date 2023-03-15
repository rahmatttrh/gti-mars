<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Port;
use App\Models\Schedule;
use App\Models\Vessel;
use Illuminate\Http\Request;

class CargoController extends Controller
{
   public function create()
   {
      $vessels = Vessel::get();
      $ports = Port::get();
      $schedules = Schedule::get();
      return view('pages.cargo.create', [
         'vessels' => $vessels,
         'ports' => $ports,
         'schedules' => $schedules
      ])->with('i');
   }

   public function check(Request $req)
   {
      $schedules = Schedule::get();
      $ports = Port::get();
      $cargo = Cargo::create([
         'party_id' => auth()->user()->getPartyId(),
         'origin_id' => $req->origin,
         'destination_id' => $req->destination,
         'departure' => $req->departure_date,
         'return' => $req->return_date
      ]);

      return view('pages.cargo.check', [
         'cargo' => $cargo,
         'schedules' => $schedules,
         'ports' => $ports
      ])->with('i');
   }

   public function choose(Request $req)
   {
      $cargo = Cargo::find($req->cargo);
      dd($cargo);
   }

   public function progress()
   {
      return view('pages.cargo.progress');
   }

   public function timeline()
   {
      return view('pages.cargo.activity');
   }

   public function checkDummy()
   {
      $vessels = Vessel::get();
      $ports = Port::get();
      $schedules = Schedule::get();
      return view('pages.cargo.check', [
         'vessels' => $vessels,
         'ports' => $ports,
         'schedules' => $schedules
      ])->with('i');
   }

   public function detail()
   {
      return view('pages.cargo.detail');
   }
}
