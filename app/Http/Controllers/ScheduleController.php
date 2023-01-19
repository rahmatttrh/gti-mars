<?php

namespace App\Http\Controllers;

use App\Models\Port;
use App\Models\Schedule;
use App\Models\Vessel;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
   public function fixed()
   {
      $schedules = Schedule::where('type', 1)->get();
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
      $schedules = Schedule::where('type', 2)->get();
      $vessels = Vessel::get();
      $ports = Port::get();
      return view('pages.schedule.index', [
         'typeName' => 'by Request',
         'type' => 2,
         'schedules' => $schedules,
         'vessels' => $vessels,
         'ports' => $ports
      ])->with('i');
   }

   public function create()
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

      Schedule::create([
         'type' => 2,
         'status' => 1,
         'vessel_id' => $req->vessel,
         'date' => $req->date,
         'origin_id' => $req->origin,
         'jetty_id' => $req->jetty,
         'docking' => $req->docking,
         'departure' => $req->departure,
         'destination_id' => $req->destination,
         'arrival' => $req->arrival
      ]);

      return redirect()->route('schedule.request')->with('success', 'Schedule successfuly added');
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
