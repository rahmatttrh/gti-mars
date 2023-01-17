<?php

namespace App\Http\Controllers;

use App\Models\Port;
use App\Models\Schedule;
use App\Models\Vessel;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
   public function index()
   {
      $schedules = Schedule::get();
      $vessels = Vessel::get();
      $ports = Port::get();
      return view('pages.schedule.index', [
         'schedules' => $schedules,
         'vessels' => $vessels,
         'ports' => $ports
      ])->with('i');
   }

   public function store(Request $req)
   {
      $req->validate([]);

      Schedule::create([
         'vessel_id' => $req->vessel,
         'origin_id' => $req->origin,
         'destination_id' => $req->destination,
         'status' => 1,
         'departure' => $req->departure,
         'arrival' => $req->arrival
      ]);

      return redirect()->back()->with('success', 'Schedule successfuly added');
   }

   public function detail($id)
   {
      $dekripId = dekripRambo($id);
      $schedule = Schedule::find($dekripId);

      return view('pages.schedule.detail', [
         'schedule' => $schedule
      ]);
   }
}
