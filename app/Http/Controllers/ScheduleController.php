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

      $schedules = Schedule::get();
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


      return view('pages.schedule.edit', [
         'schedule' => $schedule,
         'ports' => $ports
      ]);
   }

   public function update(Request $req)
   {
      $schedule = Schedule::find($req->schedule);
      $schedule->update([
         'func' => $req->func,
         'station' => $req->station,
         'activity' => $req->activity,
         'date' => $req->date,
         'req_boat' => $req->req_boat,
         'origin_id' => $req->origin,
         'destination_id' => $req->destination,
      ]);

      return redirect()->route('schedule.detail', enkripRambo($schedule->id))->with('success', 'Schedule has successfully updated');
   }

   public function detail($id)
   {
      $dekripId = dekripRambo($id);
      $schedule = Schedule::find($dekripId);
      $vessel = Vessel::get();

      return view('pages.schedule.detail', [
         'schedule' => $schedule,
         'vessels' => $vessel
      ]);
   }
}
