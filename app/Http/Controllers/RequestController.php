<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\CargoItem;
use App\Models\Department;
use App\Models\Employee;
use App\Models\PassengerItem;
use App\Models\Port;
use App\Models\Request as ModelsRequest;
use App\Models\Schedule;
use App\Models\Vessel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequestController extends Controller
{
   public function index()
   {
      $today = Carbon::now();
      $month = $today->format('m');
      $requests = ModelsRequest::get();
      $vessels = Vessel::get();
      $schedules = Schedule::get();

      $departs = ModelsRequest::selectRaw('id, date, department_id, code, origin_id, destination_id, func, status , description, schedule_id, activity_id')->where('status', '=', 1)->orderBy('department_id', 'desc')->get()->groupBy('func');

      return view('pages.request.index', [
         'title' => 'Inbox',
         'departs' => $departs,
         'vessels' => $vessels,
         'schedules' => $schedules,
         'month' => $month
      ])->with('i');
   }

   public function month($month)
   {
      $dekripMonth = dekripRambo($month);
      $requests = ModelsRequest::whereMonth('date', $dekripMonth)->where('status', '=', 1)->get();

      if ($dekripMonth == 1) {
         $monthName = 'Januari';
      } elseif ($dekripMonth == 2) {
         $monthName = 'Februari';
      } elseif ($dekripMonth == 3) {
         $monthName = 'Maret';
      } elseif ($dekripMonth == 4) {
         $monthName = 'April';
      } elseif ($dekripMonth == 5) {
         $monthName = 'Mei';
      } elseif ($dekripMonth == 6) {
         $monthName = 'Juni';
      } elseif ($dekripMonth == 7) {
         $monthName = 'Juli';
      } elseif ($dekripMonth == 8) {
         $monthName = 'Agustus';
      } elseif ($dekripMonth == 9) {
         $monthName = 'September';
      } elseif ($dekripMonth == 10) {
         $monthName = 'Oktober';
      } elseif ($dekripMonth == 11) {
         $monthName = 'November';
      } elseif ($dekripMonth == 12) {
         $monthName = 'Desember';
      }
      $vessels = Vessel::get();
      $schedules = Schedule::get();

      $departs = ModelsRequest::selectRaw('id, date, department_id, code, origin_id, destination_id, func, status , description, schedule_id, activity_id')->whereMonth('date', $dekripMonth)->where('status', '=', 1)->orderBy('department_id', 'desc')->get()->groupBy('func');

      return view('pages.request.index', [
         'title' => 'Inbox',
         'departs' => $departs,
         'vessels' => $vessels,
         'schedules' => $schedules,
         'month' => $dekripMonth,
         'monthName' => $monthName
      ])->with('i');
   }

   public function monthProgress($month)
   {
      $dekripMonth = dekripRambo($month);
      $requests = ModelsRequest::whereMonth('date', $dekripMonth)->where('status', '>', 1)->get();

      if ($dekripMonth == 1) {
         $monthName = 'Januari';
      } elseif ($dekripMonth == 2) {
         $monthName = 'Februari';
      } elseif ($dekripMonth == 3) {
         $monthName = 'Maret';
      } elseif ($dekripMonth == 4) {
         $monthName = 'April';
      } elseif ($dekripMonth == 5) {
         $monthName = 'Mei';
      } elseif ($dekripMonth == 6) {
         $monthName = 'Juni';
      } elseif ($dekripMonth == 7) {
         $monthName = 'Juli';
      } elseif ($dekripMonth == 8) {
         $monthName = 'Agustus';
      } elseif ($dekripMonth == 9) {
         $monthName = 'September';
      } elseif ($dekripMonth == 10) {
         $monthName = 'Oktober';
      } elseif ($dekripMonth == 11) {
         $monthName = 'November';
      } elseif ($dekripMonth == 12) {
         $monthName = 'Desember';
      }

      $vessels = Vessel::get();
      $schedules = Schedule::get();

      $departs = ModelsRequest::selectRaw('id, date, department_id, code, origin_id, destination_id, func, status , description, schedule_id, activity_id')->whereMonth('date', $dekripMonth)->where('status', '=', 1)->orderBy('department_id', 'desc')->get()->groupBy('func');

      return view('pages.request.progress', [
         'title' => 'Progress',
         'departs' => $departs,
         'vessels' => $vessels,
         'schedules' => $schedules,
         'month' => $dekripMonth,
         'monthName' => $monthName
      ])->with('i');
   }



   public function check(Request $req)
   {
      // $schedules = Schedule::where('date', $req->date)->where('origin_id', $req->origin_id)->where('destination_id', $req->destination_id)->get();
      $schedules = Schedule::get();
      $activities = Activity::get();
      $ports = Port::get();
      $department = Department::where('email', auth()->user()->email)->first();

      $activity = Activity::find($req->activity);
      return view('pages.request.check', [
         'department' => $department,
         'origin' => $req->origin,
         'destination' => $req->destination,
         'date' => $req->departure_date,
         'activity' => $activity,
         'desc' => $req->desc,
         'schedules' => $schedules,
         'activities' => $activities,
         'ports' => $ports
      ])->with('i');
   }

   public function store(Request $req)
   {
      $department = Department::find($req->department);
      $now = Carbon::today();
      $request = ModelsRequest::orderBy("created_at", "desc")->first();
      $employee = Employee::where('email', auth()->user()->email)->first();
      if (isset($request)) {
         $code =
            "R/" . $department->code . '/' . $now->format("dmy") . '/' . ($request->id + 1);
      } else {
         $code = "R/"  . $department->code . '/' . $now->format("dmy") . '/' . 1;
      }
      $request = ModelsRequest::create([
         'code' => $code,
         'employee_id' => $employee->id,
         'department_id' => $req->department,
         'func' => $department->code,
         'type_id' => $req->type,
         'activity_id' => $req->activity,
         'date' => $req->date,
         'schedule_id' => $req->schedule,
         'description' => $req->desc,
         'status' => 00
      ]);

      return redirect()->route('request.detail', enkripRambo($request->id))->with('success', 'Request Activity successfully saved');
   }



   public function selectSchedule(Request $req)
   {
      // dd($req->request_id);
      $request = ModelsRequest::find($req->request_id);
      $request->update([
         'status' => 02,
         'schedule_id' => $req->schedule
      ]);

      return redirect()->back()->with('success', 'Request Activity successfully set on Schedule');
   }

   // public function progressMarine()
   // {
   //    $requests = ModelsRequest::where('status', '>', 1)->get();
   //    // dd($requests);
   //    return view('pages.request.progress', [
   //       'requests' => $requests
   //    ])->with('i');
   // }

   public function progressMarine()
   {
      $today = Carbon::now();
      $month = $today->format('m');
      $requests = ModelsRequest::get();
      $vessels = Vessel::get();
      $schedules = Schedule::get();

      $departs = ModelsRequest::selectRaw('id, date, department_id, code, origin_id, destination_id, func, status , description, schedule_id, activity_id')->where('status', '>', 1)->orderBy('department_id', 'desc')->get()->groupBy('func');

      return view('pages.request.progress', [
         'title' => 'Progress',
         'departs' => $departs,
         'vessels' => $vessels,
         'schedules' => $schedules,
         'month' => $month
      ])->with('i');
   }

   public function detail($id)
   {
      $dekripId = dekripRambo($id);
      $request = ModelsRequest::find($dekripId);
      $cargoItems = CargoItem::where('request_id', $request->id)->get();
      $passengerItems = PassengerItem::where('request_id', $request->id)->get();
      $schedules = Schedule::where('origin_id', $request->origin_id)->where('destination_id', $request->destination_id)->get();
      return view('pages.request.detail', [
         'request' => $request,
         'schedules' => $schedules,
         'cargoItems' => $cargoItems,
         'passengerItems' => $passengerItems
      ])->with('i');
   }










   public function approve($id)
   {
      $dekripId = dekripRambo($id);
      $request = ModelsRequest::find($dekripId);

      $request->update([
         'status' => 02
      ]);

      return redirect()->back()->with('success', 'Request Activity successfully approved');
   }
}
