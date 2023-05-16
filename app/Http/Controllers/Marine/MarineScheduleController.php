<?php

namespace App\Http\Controllers\Marine;

use App\Http\Controllers\Controller;
use App\Mail\ApprovalEmail;
use App\Mail\AssignEmail;
use App\Models\Activity;
use App\Models\Deviation;
use App\Models\DeviationReport;
use App\Models\Port;
use App\Models\Schedule;
use Carbon\Carbon;
use App\Models\Report;
use App\Models\Request as ModelsRequest;
use App\Models\Type;
use App\Models\Vessel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MarineScheduleController extends Controller
{
   public function plan()
   {

      $today = Carbon::now();
      $month = $today->format('m');

      if (auth()->user()->hasRole('vessel')) {
         $schedules = Schedule::where('vessel_id', auth()->user()->getVesselId())->orderBy('date', 'asc')->get();
      } else {
         $schedules = Schedule::orderBy('date', 'asc')->get();
      }

      $vessels = Vessel::get();
      $ports = Port::get();

      // if ($month == 1) {
      //    $monthName = 'Januari';
      // } elseif ($month == 2) {
      //    $monthName = 'Februari';
      // } elseif ($month == 3) {
      //    $monthName = 'Maret';
      // } elseif ($month == 4) {
      //    $monthName = 'April';
      // } elseif ($month == 5) {
      //    $monthName = 'Mei';
      // } elseif ($month == 6) {
      //    $monthName = 'Juni';
      // } elseif ($month == 7) {
      //    $monthName = 'Juli';
      // } elseif ($month == 8) {
      //    $monthName = 'Agustus';
      // } elseif ($month == 9) {
      //    $monthName = 'September';
      // } elseif ($month == 10) {
      //    $monthName = 'Oktober';
      // } elseif ($month == 11) {
      //    $monthName = 'November';
      // } elseif ($month == 12) {
      //    $monthName = 'Desember';
      // }
      return view('pages.schedule.index', [
         'typeName' => 'by Request',
         'type' => 2,
         'month' => $month,
         'monthName' => '',
         'schedules' => $schedules,
         'vessels' => $vessels,
         'ports' => $ports
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
         'origin_id' => 'different:destination_id',
         'destination_id' => 'different:origin_id'
      ]);
      // dd($req->type);
      $vessel = Vessel::find($req->vessel);

      Schedule::create([
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



      return redirect()->route('schedule.plan')->with('success', 'Schedule successfuly added');
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

   public function send($id)
   {
      $dekripId = dekripRambo($id);
      $schedule = Schedule::find($dekripId);
      $vessel = Vessel::find($schedule->vessel_id);

      $now = Carbon::now();

      foreach ($schedule->requests as $req) {
         $req->update([
            'status' => 3
         ]);
      }

      Report::create([
         'schedule_id' => $schedule->id,
         'vessel_id' => $schedule->vessel_id,
         'assign' => $now
      ]);

      $schedule->update([
         'status' => 1
      ]);

      $vessel->update([
         'status' => 1,
      ]);

      $date = Carbon::parse($schedule->date)->format('d/m/Y');

      $body = $date;
      $body .= '<br>';
      $body .= $schedule->origin->name . ' - ' . $schedule->destination->name;

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
      Mail::to("develop@ekanuri.com")->send(new AssignEmail($data));

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
}
