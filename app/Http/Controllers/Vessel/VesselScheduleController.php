<?php

namespace App\Http\Controllers\Vessel;

use App\Http\Controllers\Controller;
use App\Models\Deviation;
use App\Models\DeviationReport;
use App\Models\Port;
use App\Models\Report;
use App\Models\ReportRequest;
use App\Models\ReportVessel;
use App\Models\Schedule;
use App\Models\Status;
use App\Models\Vessel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class VesselScheduleController extends Controller
{
   public function index()
   {

      $today = Carbon::now();
      $month = $today->format('m');

      $schedules = Schedule::where('vessel_id', auth()->user()->getVesselId())->where('status', 2)->orWhere('status', 3)->orderBy('date', 'asc')->get();

      return view('pages.schedule.index', [
         'typeName' => 'by Request',
         'type' => 2,
         'month' => $month,
         'monthName' => '',
         'schedules' => $schedules,
      ])->with('i');
   }
   public function accept($id)
   {
      $dekripId = dekripRambo($id);
      $schedule = Schedule::find($dekripId);
      $vessel = Vessel::find($schedule->vessel_id);
      $schedule->update([
         'status' => 2
      ]);

      $status = Status::where('code', '02')->first();

      Report::create([
         'schedule_id' => $schedule->id,
         'vessel_id' => $schedule->vessel_id,
         'status_id' => $status->id,
      ]);

      $vessel->update([
         'status' => 1,
         'schedule_id' => $schedule->id
      ]);

      foreach ($schedule->requests as $req) {
         ReportRequest::create([
            'request_id' => $req->id,
            'status_id' => $status->id,
         ]);
      }

      ReportVessel::create([
         'vessel_id' => $schedule->vessel_id,
         'status_id' => 2
      ]);

      return redirect()->back()->with('success', 'This Schedule is yours');
   }

   public function updateStatus(Request $req)
   {
      $req->validate([]);
      // dd($req->status);
      $schedule = Schedule::find($req->schedule);
      $vessel = Vessel::find($schedule->vessel_id);
      foreach ($schedule->requests as $request) {

         if ($req->status == 9 && $request->destination_id == $req->port) {
            $request->update([
               'status' => 10
            ]);
            ReportRequest::create([
               'request_id' => $request->id,
               'status_id' => 13,
               'port_id' => $req->port
            ]);
         } elseif ($req->status == 11 && $request->destination_id == $req->port) {
            $request->update([
               'status' => 12
            ]);

            ReportRequest::create([
               'request_id' => $request->id,
               'status_id' => 12,
               'port_id' => $req->port
            ]);
         } else {
            ReportRequest::create([
               'request_id' => $request->id,
               'status_id' => $req->status,
               'port_id' => $req->port
            ]);
         }
      }

      Report::create([
         'schedule_id' => $req->schedule,
         'vessel_id' => $schedule->vessel_id,
         'status_id' => $req->status,
         'port_id' => $req->port
      ]);

      ReportVessel::create([
         'vessel_id' => $schedule->vessel_id,
         'port_id' => $req->port,
         'status_id' => $req->status
      ]);



      if ($req->status == 12) {
         $schedule->update([
            'status' => 11
         ]);
         $vessel->update([
            'status' => 0,
            'schedule_id' => null
         ]);
      } elseif ($req->status == 9) {
         $schedule->update([
            'status' => 3
         ]);
      } else {
         $schedule->update([
            'status' => 2
         ]);
      }




      return redirect()->back()->with('success', "Schedule Status successfully updated");
   }

   public function standby($id)
   {
      $now = Carbon::now();
      $dekripId = dekripRambo($id);
      $schedule = Schedule::find($dekripId);
      $vessel = Vessel::find($schedule->vessel_id);

      foreach ($schedule->requests as $req) {
         $req->update([
            'status' => 3
         ]);
      }

      $report = Report::where('schedule_id', $schedule->id)->first();
      $report->update([
         'schedule_id' => $schedule->id,
         'standby' => $now
      ]);

      $schedule->update([
         'status' => 2
      ]);

      $vessel->update([
         'status' => 2,
         'port_id' => $schedule->origin_id,
      ]);

      return redirect()->back()->with('success', 'Report successfully saved');
   }

   public function loading($id)
   {
      $now = Carbon::now();
      $dekripId = dekripRambo($id);
      $schedule = Schedule::find($dekripId);
      $vessel = Vessel::find($schedule->vessel_id);

      foreach ($schedule->requests as $req) {
         $req->update([
            // Loading
            'status' => 4
         ]);
      }

      $report = Report::where('schedule_id', $schedule->id)->first();
      $report->update([
         'loading_start' => $now
      ]);

      $schedule->update([
         'status' => 3
      ]);

      return redirect()->back()->with('success', 'Report successfully saved');
   }


   public function loadingEnd($id)
   {
      $now = Carbon::now();
      $dekripId = dekripRambo($id);
      $schedule = Schedule::find($dekripId);
      $vessel = Vessel::find($schedule->vessel_id);
      foreach ($schedule->requests as $req) {
         $req->update([
            'status' => 5
         ]);
      }

      $report = Report::where('schedule_id', $schedule->id)->first();
      $report->update([
         'loading_end' => $now
      ]);
      $schedule->update([
         'status' => 4
      ]);

      return redirect()->back()->with('success', 'Report successfully saved');
   }


   public function castoff($id)
   {
      $now = Carbon::now();
      $dekripId = dekripRambo($id);
      $schedule = Schedule::find($dekripId);
      foreach ($schedule->requests as $req) {
         $req->update([
            'status' => 6
         ]);
      }

      $report = Report::where('schedule_id', $schedule->id)->first();
      $report->update([
         'castoff' => $now
      ]);
      $schedule->update([
         'status' => 5
      ]);

      return redirect()->back()->with('success', 'Report successfully saved');
   }

   public function fullaway($id)
   {
      $now = Carbon::now();
      $dekripId = dekripRambo($id);
      $schedule = Schedule::find($dekripId);
      $vessel = Vessel::find($schedule->vessel_id);
      foreach ($schedule->requests as $req) {
         $req->update([
            'status' => 7
         ]);
      }

      $report = Report::where('schedule_id', $schedule->id)->first();
      $report->update([
         'fullaway' => $now
      ]);
      $schedule->update([
         'status' => 6
      ]);
      $vessel->update([
         'status' => 3,
         'port_id' => null
      ]);

      return redirect()->back()->with('success', 'Report successfully saved');
   }

   public function arrive($id)
   {
      $now = Carbon::now();
      $dekripId = dekripRambo($id);
      $schedule = Schedule::find($dekripId);
      $vessel = Vessel::find($schedule->vessel_id);
      foreach ($schedule->requests as $req) {
         $req->update([
            'status' => 8
         ]);
      }

      $report = Report::where('schedule_id', $schedule->id)->first();
      $report->update([
         'arrive' => $now
      ]);
      $schedule->update([
         'status' => 7
      ]);
      $vessel->update([
         'status' => 2,
         'port_id' => $schedule->destination_id
      ]);

      return redirect()->back()->with('success', 'Report successfully saved');
   }

   public function standbyDest($id)
   {
      $now = Carbon::now();
      $dekripId = dekripRambo($id);
      $schedule = Schedule::find($dekripId);
      $vessel = Vessel::find($schedule->vessel_id);
      foreach ($schedule->requests as $req) {
         $req->update([
            'status' => 9
         ]);
      }

      $report = Report::where('schedule_id', $schedule->id)->first();
      $report->update([
         'standby_dest' => $now
      ]);
      $schedule->update([
         'status' => 8
      ]);

      return redirect()->back()->with('success', 'Report successfully saved');
   }

   public function unloading($id)
   {
      $now = Carbon::now();
      $dekripId = dekripRambo($id);
      $schedule = Schedule::find($dekripId);
      $vessel = Vessel::find($schedule->vessel_id);
      foreach ($schedule->requests as $req) {
         $req->update([
            'status' => 10
         ]);
      }

      $report = Report::where('schedule_id', $schedule->id)->first();
      $report->update([
         'unloading_start' => $now
      ]);
      $schedule->update([
         'status' => 9
      ]);
      // $vessel->update([
      //    'status' => 5,
      //    'port_id' => $schedule->destination_id
      // ]);

      return redirect()->back()->with('success', 'Report successfully saved');
   }

   public function unloadingEnd($id)
   {
      $now = Carbon::now();
      $dekripId = dekripRambo($id);
      $schedule = Schedule::find($dekripId);
      $vessel = Vessel::find($schedule->vessel_id);
      foreach ($schedule->requests as $req) {
         $req->update([
            'status' => 11
         ]);
      }

      $report = Report::where('schedule_id', $schedule->id)->first();
      $report->update([
         'unloading_end' => $now
      ]);
      $schedule->update([
         'status' => 10
      ]);
      // $vessel->update([
      //    'status' => 5,
      //    'port_id' => $schedule->destination_id
      // ]);

      return redirect()->back()->with('success', 'Report successfully saved');
   }

   public function complete($id)
   {
      $now = Carbon::now();
      $dekripId = dekripRambo($id);
      $schedule = Schedule::find($dekripId);
      $vessel = Vessel::find($schedule->vessel_id);
      foreach ($schedule->requests as $req) {
         $req->update([
            'status' => 12
         ]);
      }

      $report = Report::where('schedule_id', $schedule->id)->first();
      $report->update([
         'schedule_id' => $schedule->id,
         'complete' => $now
      ]);
      $schedule->update([
         'status' => 11
      ]);
      // $vessel->update([
      //    'status' => 0,
      //    'port_id' => $schedule->destination_id
      // ]);

      return redirect()->back()->with('success', 'Report successfully saved');
   }
}
