<?php

namespace App\Http\Controllers\Marine;

use App\Http\Controllers\Controller;
use App\Mail\ApprovalEmail;
use App\Mail\AssignEmail;
use App\Models\Activity;
use App\Models\Deviation;
use App\Models\DeviationReport;
use App\Models\Port;
use App\Models\Postpone;
use App\Models\Schedule;
use Carbon\Carbon;
use App\Models\Report;
use App\Models\ReportRequest;
use App\Models\ReportVessel;
use App\Models\Request as ModelsRequest;
use App\Models\ScheduleRoute;
use App\Models\Status;
use App\Models\Type;
use App\Models\Vessel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MarineScheduleController extends Controller
{
   public function plan($month)
   {

      $dekripMonth = dekripRambo($month);
      // $today = Carbon::now();
      // $month = $today->format('m');

      if (auth()->user()->hasRole('vessel')) {
         $schedules = Schedule::where('vessel_id', auth()->user()->getVesselId())->whereMonth('created_at', $dekripMonth)->orderBy('date', 'asc')->get();
      } else {
         $schedules = Schedule::orderBy('date', 'asc')->where('status', '=', 0)->whereMonth('created_at', $dekripMonth)->get();
      }

      // $vessels = Vessel::get();
      // $ports = Port::get();

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
      return view('pages.schedule.index', [
         'typeName' => 'by Request',
         'type' => 2,
         'month' => $month,
         'monthName' => $monthName,
         'schedules' => $schedules,
         // 'vessels' => $vessels,
         // 'ports' => $ports
      ])->with('i');
   }

   public function order($month)
   {

      $dekripMonth = dekripRambo($month);
      // $today = Carbon::now();
      // $month = $today->format('m');

      $schedules = Schedule::orderBy('date', 'asc')->where('status', '>', 0)->where('status', '!=', 11)->whereMonth('created_at', $dekripMonth)->get();

      // $vessels = Vessel::get();
      // $ports = Port::get();

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
      return view('pages.schedule.order', [
         'typeName' => 'by Request',
         'type' => 2,
         'month' => $monthName,
         'monthName' => $monthName,
         'schedules' => $schedules,
         // 'vessels' => $vessels,
         // 'ports' => $ports
      ])->with('i');
   }

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
      $req->validate([
         'vessel' => 'required',
         'origin_id' => 'different:destination_id',
         'destination_id' => 'different:origin_id'
      ]);
      // dd($req->type);
      $vessel = Vessel::find($req->vessel);

      $schedule = Schedule::create([
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



      return redirect()->route('schedule.detail', enkripRambo($schedule->id))->with('success', 'Schedule successfuly added');
   }

   public function edit($id)
   {
      $dekripId = dekripRambo($id);
      $schedule = Schedule::find($dekripId);
      $ports = Port::get();
      $vessels = Vessel::get();
      $activities = Activity::get();

      return view('pages.schedule.edit', [
         'schedule' => $schedule,
         'ports' => $ports,
         'vessels' => $vessels,
         'activities' => $activities
      ]);
   }

   public function update(Request $req)
   {
      $schedule = Schedule::find($req->schedule);
      $schedule->update([
         'vessel_id' => $req->vessel,
         'date' => $req->date,
         'origin_id' => $req->origin,
         'destination_id' => $req->destination,
         'etd' => $req->departure_estimasi,
         'eta' => $req->arrive_estimasi,
         'remark' => $req->remark
      ]);

      return redirect()->route('schedule.detail', enkripRambo($schedule->id))->with('success', 'Schedule has successfully updated');
   }

   public function delete($id)
   {
      $dekripId = dekripRambo($id);
      $schedule = Schedule::find($dekripId);
      $requests = ModelsRequest::where('schedule_id', $schedule->id)->get();

      foreach ($requests as $request) {
         $request->update([
            'status' => 1,
            'schedule_id' => null
         ]);
      }

      $routes = ScheduleRoute::where('schedule_id', $schedule->id)->get();
      foreach ($routes as $route) {
         $route->delete();
      }

      $schedule->delete();

      return redirect()->route('schedule.plan')->with('success', 'Schedule successfully deleted');
   }

   public function send($id)
   {
      $dekripId = dekripRambo($id);
      $schedule = Schedule::find($dekripId);
      $vessel = Vessel::find($schedule->vessel_id);
      $status = Status::where('code', '01')->first();

      $now = Carbon::now();

      foreach ($schedule->requests as $req) {
         $req->update([
            'status' => 3
         ]);

         ReportRequest::create([
            'request_id' => $req->id,
            'status_id' => $status->id,

         ]);
      }

      // Report::create([
      //    'schedule_id' => $schedule->id,
      //    'vessel_id' => $schedule->vessel_id,
      //    'assign' => $now
      // ]);
      Report::create([
         'schedule_id' => $schedule->id,
         'vessel_id' => $schedule->vessel_id,
         'status_id' => 1,
      ]);

      $schedule->update([
         'status' => 1
      ]);



      // $vessel->update([
      //    'status' => 1,
      //    'schedule_id' => $schedule->id
      // ]);

      ReportVessel::create([
         'vessel_id' => $schedule->vessel_id,
         'status_id' => 1
      ]);



      $date = Carbon::parse($schedule->date)->format('d/m/Y');

      $body = $date;
      $body .= '<br>';
      $body .= $schedule->origin->name;

      $data = [
         'to' => $schedule->vessel->name,
         'from' => 'Marine Department',
         'subject' => 'Schedule Plan',
         'body' => $body,
         'schedule' => $schedule,
         'activities' => $schedule->requests,
         'link' => route('schedule.detail', enkripRambo($schedule->id))
      ];

      // Mail::to("rahmattrust@gmail.com")->send(new AssignEmail($data));
      // Mail::to("develop@ekanuri.com")->send(new AssignEmail($data));

      return redirect()->back()->with('success', 'Schedule successfully assign to ' . $vessel->name);
   }

   public function removeRequest($id)
   {
      $dekripId = dekripRambo($id);
      $request = ModelsRequest::find($dekripId);
      $schedule = Schedule::find($request->schedule_id);
      $request->update([
         'status' => 1,
         'schedule_id' => null
      ]);

      $schedule->update([
         'total_weight' => $schedule->total_weight - $request->total_weight,
         'total_size' => $schedule->total_size - $request->total_size
      ]);

      return redirect()->back()->with('success', 'Request Activity successfully removed from list');
   }

   public function resetRoute($id)
   {
      $dekripId = dekripRambo($id);
      $schedule = Schedule::find($dekripId);
      $requests = ModelsRequest::where('schedule_id', $schedule->id)->get();

      foreach ($requests as $request) {
         $request->update([
            'status' => 1,
            'schedule_id' => null
         ]);
      }

      $routes = ScheduleRoute::where('schedule_id', $schedule->id)->get();
      foreach ($routes as $route) {
         $route->delete();
      }

      $schedule->update([
         'total_size' => null,
         'total_weight' => null
      ]);

      return redirect()->back()->with('success', 'Schedule Route successfully reseted');
   }

   public function postpone(Request $req)
   {
      $req->validate([]);

      $schedule = Schedule::find($req->schedule);
      $schedule->update([
         'date' => $req->to
      ]);

      Postpone::create([
         'status' => 0,
         'schedule_id' => $schedule->id,
         'from' => $req->from,
         'to' => $req->to,
         'reason' => $req->reason
      ]);

      return redirect()->back()->with('success', 'Schedule has been Postpone');
   }

   public function history($month)
   {
      $dekripMonth = dekripRambo($month);

      // $today = Carbon::now();
      // $month = $today->format('m');

      $schedules = Schedule::orderBy('date', 'asc')->where('status', '=', 11)->whereMonth('created_at', $dekripMonth)->get();

      // $vessels = Vessel::get();
      // $ports = Port::get();

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
      return view('pages.schedule.history', [
         'typeName' => 'by Request',
         'type' => 2,
         'month' => $monthName,
         'monthName' => $monthName,
         'schedules' => $schedules,
         // 'vessels' => $vessels,
         // 'ports' => $ports
      ])->with('i');
   }
}
