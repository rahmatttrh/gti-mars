<?php

namespace App\Http\Controllers;

use App\Models\Deflection;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Offloading;
use App\Models\Report;
use App\Models\ReportVessel;
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

   public function dashboardChart($month)
   {

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

      $schedules = Schedule::where('type', 2)->whereMonth('date', $month)->orderBy('date', 'asc')->get();
      $scheduleRecents = Schedule::orderBy('updated_at', 'asc')->where('status', '>=', 1)->first();
      $requests = ModelsRequest::whereMonth('date', $month)->get();
      $completeRequests = ModelsRequest::whereMonth('date', $month)->where('status', 9)->get();
      if ($requests->count() > 0) {
         $persentage = ($completeRequests->count() / $requests->count()) * 100;
      } else {
         $persentage = 0;
      }
      $requestRecents = ModelsRequest::where('status', 1)->orWhere('status', 202)->get();
      $requestProgress = ModelsRequest::where('status', '>', 1)->where('status', '!=', 202)->get();
      $requestLogistics = ModelsRequest::whereMonth('date', $month)->where('department_id', 2)->get();
      $requestDrillings = ModelsRequest::whereMonth('date', $month)->where('department_id', 3)->get();

      $customSchedules = [];
      $customQtyRequests = [];
      foreach ($schedules as $schedule) {
         $customSchedules[] = $schedule->date;
         $customQtyRequests[] = $schedule->requests()->count();
      }
      // dd($scheduleRecents->status);
      $reports = Report::orderBy('created_at', 'desc')->whereMonth('created_at', $month)->get();
      $offloadings = Offloading::orderBy('created_at', 'desc')->whereMonth('created_at', $month)->get();
      $deflections = Deflection::orderBy('created_at', 'desc')->whereMonth('created_at', $month)->get();

      return view('chart', [
         'monthName' => $monthName,
         'requestRecents' => $requestRecents,
         'requestProgress' => $requestProgress,
         'schedules' => $schedules,
         'dateSchedules' => collect($customSchedules)->toJson(),
         'qtyRequests' => collect($customQtyRequests)->toJson(),
         'totalSchedule' => $schedules->count(),
         'totalRequest' => $requests->count(),
         'requestLogistics' => $requestLogistics->count(),
         'requestDrillings' => $requestDrillings->count(),
         'persentage' => $persentage,
         'scheduleRecents' => $scheduleRecents,
         'reports' => $reports,
         'offloadings' => $offloadings,
         'deflections' => $deflections
      ])->with('i');
   }

   public function dashboardTable()
   {
      $today = Carbon::now();
      $month = $today->format('m');
      $schedules = Schedule::where('type', 2)->whereMonth('date', $month)->get();
      $requestRecents = ModelsRequest::where('status', 1)->orWhere('status', 202)->get();
      $requestProgress = ModelsRequest::where('status', '>', 1)->where('status', '!=', 202)->get();

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
         'today' => $today,
         'monthName' => $monthName,
         'requestRecents' => $requestRecents,
         'requestProgress' => $requestProgress,
         'schedules' => $schedules,
      ])->with('i');
   }

   public function index()
   {
      $today = Carbon::now();
      $month = $today->format('m');

      $vessels = Vessel::get();
      $vessel3 = Vessel::paginate('3');
      // dd($today->format('m'));

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
         $schedules = Schedule::where('type', 2)->whereMonth('date', $month)->orderBy('date', 'asc')->get();
         $requests = ModelsRequest::where('status', '>', 1)->whereMonth('date', $month)->get();
         $completeRequests = ModelsRequest::whereMonth('date', $month)->where('status', 9)->get();
         if ($requests->count() > 0) {
            $persentage = ($completeRequests->count() / $requests->count()) * 100;
            // dd($requests->count());
         } else {
            $persentage = 0;
         }

         // $requests = ModelsRequest::get();
         $requestRecents = ModelsRequest::where('status', 1)->orWhere('status', 202)->paginate(5);
         $scheduleRecents = Schedule::orderBy('updated_at', 'desc')->where('status', '>=', 1)->get();
         $requestProgress = ModelsRequest::where('status', '>', 1)->where('status', '!=', 202)->get();
         $requestUndos = ModelsRequest::where('status', 202)->get();

         $requestLogistics = ModelsRequest::where('department_id', 2)->get();
         $requestDrillings = ModelsRequest::whereMonth('date', $month)->where('department_id', 3)->get();

         $customSchedules = [];
         $customQtyRequests = [];
         foreach ($schedules as $schedule) {
            $customSchedules[] = $schedule->date;
            $customQtyRequests[] = $schedule->requests()->count();
         }
         // $dateSchedules = collect($geoLocationTeknisi)->toJson()
         // dd(collect($customQtyRequests)->toJson());
         // dd($scheduleRecents->status);
         // dd($requestLogis->count());
         $reports = Report::orderBy('created_at', 'desc')->whereMonth('created_at', $month)->get();
         $offloadings = Offloading::orderBy('created_at', 'desc')->whereMonth('created_at', $month)->get();
         $deflections = Deflection::orderBy('created_at', 'desc')->whereMonth('created_at', $month)->get();

         return view('chart', [
            'today' => $today,
            'monthName' => $monthName,
            'requestRecents' => $requestRecents,
            'requestProgress' => $requestProgress,
            'schedules' => $schedules,
            'dateSchedules' => collect($customSchedules)->toJson(),
            'qtyRequests' => collect($customQtyRequests)->toJson(),
            'totalSchedule' => $schedules->count(),
            'totalRequest' => $requests->count(),
            'requestLogistics' => $requestLogistics->count(),
            'requestDrillings' => $requestDrillings->count(),
            'persentage' => $persentage,
            'scheduleRecents' => $scheduleRecents,
            'reports' => $reports,
            'offloadings' => $offloadings,
            'deflections' => $deflections
         ])->with('i');
      } elseif (auth()->user()->hasRole('department')) {
         $employee = Employee::where('email', auth()->user()->email)->first();
         $vessel = '';
         $schedules = Schedule::where('type', 2)->where('status', '>', 1)->whereMonth('date', $month)->get();
         $confirms = ModelsRequest::where('destination_id', auth()->user()->getPort())->where('status', 10)->get();
         // dd($confirms);
         $requests = ModelsRequest::where('employee_id', auth()->user()->getEmployeeId())->orderBy('parent_id', 'asc')->get();
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
         $schedules = Schedule::where('vessel_id', $vessel->id)->where('status', '>', 1)->get();
         $nowSchedule = Schedule::find($vessel->schedule_id);
         $recentSchedules = Schedule::where('vessel_id', $vessel->id)->where('status', '=', 1)->get();
         $reports = ReportVessel::where('vessel_id', $vessel->id)->orderBy('created_at', 'desc')->get();
         return view('home', [
            'today' => $today,
            'vessel' => $vessel,
            'schedules' => $schedules,
            'nowSchedule' => $nowSchedule,
            'recentSchedules' => $recentSchedules,
            'reports' => $reports
         ])->with('i');
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
         'confirms' => $confirms
         // 'schedulesFix' => $schedulesFix
      ])->with('i');
   }
}
