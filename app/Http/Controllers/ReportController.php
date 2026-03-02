<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Schedule;
use App\Models\Vessel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
   public function index(){
      return view('pages-stisla.report.index');
   }

   public function departure($id)
   {
      $dekripId = dekripRambo($id);
      $schedule = Schedule::find($dekripId);
      $vessel = Vessel::find($schedule->vessel_id);

      Report::create([
         'schedule_id' => $schedule->id,
         'departure' => Carbon::now()
      ]);

      $schedule->update([
         'status' => 3
      ]);

      $vessel->update([
         'status' => 2
      ]);

      return redirect()->back()->with('success', 'Successfully update');
   }
}
