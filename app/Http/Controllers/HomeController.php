<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Vessel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   /**
    * Create a new controller instance.
    *
    * @return void
    */
   public function __construct()
   {
      $this->middleware('auth');
   }

   /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
   public function index()
   {
      $today = Carbon::now();
      $month = $today->format('m');

      $vessels = Vessel::get();
      $vessel3 = Vessel::paginate('3');
      if (auth()->user()->hasRole('marine')) {
         $schedules = Schedule::where('type', 2)->whereMonth('date', $month)->get();
      } else {
         $schedules = Schedule::where('type', 2)->where('status', '>', 1)->whereMonth('date', $month)->get();
      }

      $schedulesFix = Schedule::where('type', 1)->where('status', '>', 1)->whereMonth('date', $month)->get();

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

      return view('home', [
         'monthName' => $monthName,
         'vessels' => $vessels,
         'vessel3' => $vessel3,
         'schedules' => $schedules,
         'schedulesFix' => $schedulesFix
      ]);
   }
}
