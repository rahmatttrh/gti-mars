<?php

namespace App\Http\Controllers;

use App\Models\Port;
use App\Models\Schedule;
use App\Models\Vessel;
use Illuminate\Http\Request;

class MarineController extends Controller
{
   public function scheduleRequest()
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

   public function scheduleSelectVessel(Request $req)
   {
      $schedule = Schedule::find($req->schedule);
      $schedule->update([
         'status' => 2,
         'vessel_id' => $req->vessel
      ]);
      return redirect()->back()->with('success', 'Vessel berhasil di pilih.');
   }
}
