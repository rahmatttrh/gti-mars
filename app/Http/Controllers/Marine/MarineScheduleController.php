<?php

namespace App\Http\Controllers\Marine;

use App\Http\Controllers\Controller;
use App\Models\Port;
use App\Models\Schedule;
use Carbon\Carbon;
use App\Models\Report;
use App\Models\Type;
use App\Models\Vessel;
use Illuminate\Http\Request;

class MarineScheduleController extends Controller
{

   public function create()
   {
      $vessels = Vessel::get();
      $ports = Port::get();
      $types = Type::get();
      return view('pages.schedule.create', [
         'vessels' => $vessels,
         'ports' => $ports,
         'types' => $types
      ]);
   }

   public function store(Request $req)
   {
      $req->validate([]);
      // dd($req->type);
      $vessel = Vessel::find($req->vessel);

      Schedule::create([
         'type' => 2,
         'status' => 0,
         'vessel_id' => $req->vessel,
         'date' => $req->date,
         'origin_id' => $req->origin,
         'destination_id' => $req->destination,
         'etd' => $req->departure_estimasi,
         'eta' => $req->arrive_estimasi,
         'remark' => $req->remark
      ]);



      return redirect()->route('schedule.request')->with('success', 'Schedule successfuly added');
   }

   public function send($id)
   {
      $dekripId = dekripRambo($id);
      $schedule = Schedule::find($dekripId);
      $vessel = Vessel::find($schedule->vessel_id);

      $now = Carbon::now();

      foreach ($schedule->requests as $req) {
         $req->update([
            'status' => 3
         ]);
      }

      Report::create([
         'schedule_id' => $schedule->id,
         'vessel_id' => $schedule->vessel_id,
         'assign' => $now
      ]);

      $schedule->update([
         'status' => 1
      ]);

      $vessel->update([
         'status' => 1,
      ]);

      return redirect()->back()->with('success', 'Schedule successfully assign to' . $vessel->name);
   }
}
