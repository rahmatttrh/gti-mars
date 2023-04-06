<?php

namespace App\Http\Controllers\Vessel;

use App\Http\Controllers\Controller;
use App\Models\Port;
use App\Models\Report;
use App\Models\Schedule;
use App\Models\Vessel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VesselScheduleController extends Controller
{
   public function loading($id)
   {
      $now = Carbon::now();
      $dekripId = dekripRambo($id);
      $schedule = Schedule::find($dekripId);
      $vessel = Vessel::find($schedule->vessel_id);
      $port = Port::find($schedule->origin_id);

      foreach ($schedule->requests as $req) {
         $req->update([
            'status' => 3
         ]);
      }

      Report::create([
         'schedule_id' => $schedule->id,
         'vessel_id' => $schedule->vessel_id,
         'loading' => $now
      ]);

      $schedule->update([
         'status' => 1
      ]);

      $vessel->update([
         'status' => 2,
         'port_id' => $schedule->origin_id,
      ]);

      return redirect()->back()->with('success', 'Report successfully saved');
   }

   public function castoff($id)
   {
      $now = Carbon::now();
      $dekripId = dekripRambo($id);
      $schedule = Schedule::find($dekripId);
      $vessel = Vessel::find($schedule->vessel_id);
      foreach ($schedule->requests as $req) {
         $req->update([
            'status' => 4
         ]);
      }

      $report = Report::where('schedule_id', $schedule->id)->first();
      $report->update([
         'schedule_id' => $schedule->id,
         'castoff' => $now
      ]);
      $schedule->update([
         'status' => 2
      ]);
      $vessel->update([
         'status' => 3
      ]);

      return redirect()->back()->with('success', 'Report successfully saved');
   }

   public function fullaway($id)
   {
      $now = Carbon::now();
      $dekripId = dekripRambo($id);
      $schedule = Schedule::find($dekripId);
      $vessel = Vessel::find($schedule->vessel_id);
      foreach ($schedule->requests as $req) {
         $req->update([
            'status' => 5
         ]);
      }

      $report = Report::where('schedule_id', $schedule->id)->first();
      $report->update([
         'schedule_id' => $schedule->id,
         'fullaway' => $now
      ]);
      $schedule->update([
         'status' => 3
      ]);
      $vessel->update([
         'status' => 4,
         'port_id' => null
      ]);

      return redirect()->back()->with('success', 'Report successfully saved');
   }

   public function arrive($id)
   {
      $now = Carbon::now();
      $dekripId = dekripRambo($id);
      $schedule = Schedule::find($dekripId);
      $vessel = Vessel::find($schedule->vessel_id);
      foreach ($schedule->requests as $req) {
         $req->update([
            'status' => 6
         ]);
      }

      $report = Report::where('schedule_id', $schedule->id)->first();
      $report->update([
         'schedule_id' => $schedule->id,
         'arrive' => $now
      ]);
      $schedule->update([
         'status' => 4
      ]);
      $vessel->update([
         'status' => 5,
         'port_id' => $schedule->destination_id
      ]);

      return redirect()->back()->with('success', 'Report successfully saved');
   }



   public function unloading($id)
   {
      $now = Carbon::now();
      $dekripId = dekripRambo($id);
      $schedule = Schedule::find($dekripId);
      $vessel = Vessel::find($schedule->vessel_id);
      foreach ($schedule->requests as $req) {
         $req->update([
            'status' => 7
         ]);
      }

      $report = Report::where('schedule_id', $schedule->id)->first();
      $report->update([
         'schedule_id' => $schedule->id,
         'unloading' => $now
      ]);
      $schedule->update([
         'status' => 5
      ]);
      $vessel->update([
         'status' => 5,
         'port_id' => $schedule->destination_id
      ]);

      return redirect()->back()->with('success', 'Report successfully saved');
   }

   public function complete($id)
   {
      $now = Carbon::now();
      $dekripId = dekripRambo($id);
      $schedule = Schedule::find($dekripId);
      $vessel = Vessel::find($schedule->vessel_id);
      foreach ($schedule->requests as $req) {
         $req->update([
            'status' => 8
         ]);
      }

      $report = Report::where('schedule_id', $schedule->id)->first();
      $report->update([
         'schedule_id' => $schedule->id,
         'complete' => $now
      ]);
      $schedule->update([
         'status' => 6
      ]);
      $vessel->update([
         'status' => 0,
         'port_id' => $schedule->destination_id
      ]);

      return redirect()->back()->with('success', 'Report successfully saved');
   }
}
