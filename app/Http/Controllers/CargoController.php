<?php

namespace App\Http\Controllers;

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

   public function check()
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
