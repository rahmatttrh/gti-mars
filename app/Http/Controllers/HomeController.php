<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Request as ModelsRequest;
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


      if (auth()->user()->hasRole('superuser')) {
         $vessel = '';
         $schedules = Schedule::where('type', 2)->where('status', '>', 1)->whereMonth('date', $month)->get();
      } elseif (auth()->user()->hasRole('marine')) {
         $vessels = Vessel::where('status', '>', 1)->get();
         $vessel = '';
         $schedules = Schedule::where('type', 2)->whereMonth('date', $month)->get();
         $requests = ModelsRequest::get();
         $requestRecents = ModelsRequest::where('status', 1)->get();
         $requestProgress = ModelsRequest::where('status', '>', 1)->where('status', '!=', 202)->get();
         $requestUndos = ModelsRequest::where('status', 202)->get();

         return view('home', [
            'today' => $today,
            'requests' => $requests,
            'monthName' => $monthName,
            'vessel' => $vessel,
            'vessels' => $vessels,
            'schedules' => $schedules,
            'requestUndos' => $requestUndos
         ])->with('i');
      } elseif (auth()->user()->hasRole('logistic')) {
         $employee = Employee::where('email', auth()->user()->email)->first();
         $vessel = '';
         $schedules = Schedule::where('type', 2)->where('status', '>', 1)->whereMonth('date', $month)->get();
         // dd($employee->name);
         $requests = ModelsRequest::where('department_id', $employee->department->id)->get();
      } elseif (auth()->user()->hasRole('drilling')) {
         $employee = Employee::where('email', auth()->user()->email)->first();
         $vessel = '';
         $schedules = Schedule::where('type', 2)->where('status', '>', 1)->whereMonth('date', $month)->get();
         $requests = ModelsRequest::where('department_id', $employee->department_id)->get();
      } elseif (auth()->user()->hasRole('vessel')) {
         $vessel = Vessel::where('email', auth()->user()->email)->first();
         $schedules = Schedule::where('vessel_id', $vessel->id)->where('status', '>=', 0)->get();
         $requests = '';
      } elseif (auth()->user()->hasRole('supplier')) {
         $vessel = '';
         $schedules = Schedule::where('type', 2)->where('status', '>', 1)->whereMonth('date', $month)->get();
      } elseif (auth()->user()->hasRole('platform')) {
         $vessel = '';
         $schedules = Schedule::where('type', 2)->where('status', '>', 1)->whereMonth('date', $month)->get();
      } elseif (auth()->user()->hasRole('retail')) {
         $vessel = Vessel::where('email', auth()->user()->email)->first();
         $schedules = Schedule::get();
      } elseif (auth()->user()->hasRole('receiving')) {
         $vessel = '';
         $schedules = Schedule::get();
      }
      // if (auth()->user()->hasRole('marine')) {
      //    $vessel = '';
      //    $schedules = Schedule::where('type', 2)->whereMonth('date', $month)->get();
      // } elseif (auth()->user()->hasRole('superuser')) {
      //    $vessel = '';
      //    $schedules = Schedule::where('type', 2)->where('status', '>', 1)->whereMonth('date', $month)->get();
      // } elseif (auth()->user()->hasRole('vessel')) {
      //    $vessel = Vessel::where('email', auth()->user()->email)->first();
      //    $schedules = Schedule::where('type', 2)->where('status', '>', 1)->where('vessel_id', $vessel->id)->whereMonth('date', $month)->get();
      // }

      $schedulesFix = Schedule::where('type', 1)->where('status', '>', 1)->whereMonth('date', $month)->get();



      return view('home', [
         'today' => $today,
         'requests' => $requests,
         'monthName' => $monthName,
         'vessel' => $vessel,
         'vessels' => $vessels,
         // 'vessel3' => $vessel3,
         'schedules' => $schedules,
         // 'schedulesFix' => $schedulesFix
      ])->with('i');
   }
}
