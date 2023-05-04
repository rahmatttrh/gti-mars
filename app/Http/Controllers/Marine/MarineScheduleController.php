<?php

namespace App\Http\Controllers\Marine;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Carbon\Carbon;
use App\Models\Report;
use Illuminate\Http\Request;

class MarineScheduleController extends Controller
{
   public function send($id)
   {
      $dekripId = dekripRambo($id);
      $schedule = Schedule::find($dekripId);

      $now = Carbon::now();
      oreach ($schedule->requests as $req) {
         $req->update([
            'status' => 3
         ]);
      }

      Report::create([
         'schedule_id' => $schedule->id,
         'vessel_id' => $schedule->vessel_id,
         'loading_start' => $now
      ]);

      $schedule->update([
         'status' => 1
      ]);
cc
      $vessel->update([
         'status' => 2,
         'port_id' => $schedule->origin_id,
      ]);

      dd($schedule->id);
   }
}
