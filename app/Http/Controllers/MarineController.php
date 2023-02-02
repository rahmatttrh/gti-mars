<?php

namespace App\Http\Controllers;

use App\Models\Port;
use App\Models\Schedule;
use App\Models\Vessel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MarineController extends Controller
{
   public function scheduleRequest()
   {
      $today = Carbon::now();
      $month = $today->format('m');
      $schedules = Schedule::whereMonth('date', $month)->get();
      $vessels = Vessel::get();
      $ports = Port::get();

      if ($month == 1) {
         $monthName = 'Januari';
      } elseif ($month == 2) {
         $monthName = 'Februari';
      } elseif ($month == 3) {
         $monthName = 'Maret';
      } elseif ($month == 4) {
         $monthName = 'April';
      } elseif ($month == 5) {
         $monthName = 'Mei';
      } elseif ($month == 6) {
         $monthName = 'Juni';
      } elseif ($month == 7) {
         $monthName = 'Juli';
      } elseif ($month == 8) {
         $monthName = 'Agustus';
      } elseif ($month == 9) {
         $monthName = 'September';
      } elseif ($month == 10) {
         $monthName = 'Oktober';
      } elseif ($month == 11) {
         $monthName = 'November';
      } elseif ($month == 12) {
         $monthName = 'Desember';
      }
      return view('pages.schedule.index', [
         'typeName' => 'by Request',
         'type' => 2,
         'month' => $month,
         'monthName' => $monthName,
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
      return redirect()->back()->with('success', 'Boat berhasil di pilih.');
   }
}
