<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\ReportRequest;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DepartmentScheduleController extends Controller
{
   public function complete($id)
   {

      // dd(auth()->user()->getPort());
      $dekripId = dekripRambo($id);
      $schedule = Schedule::find($dekripId);

      // Cek jika ada additional request
      $draftAdditional = false;
      foreach ($schedule->requests as $req) {
         if ($req->status == 20) {
            $draftAdditional = true;
         }
      }

      // jika ada additional request akan merubah status schedule ke 4 dan status additional request ke 21
      // menunggu approval dari marine
      if ($draftAdditional == true) {
         $schedule->update([
            'status' => 2
         ]);

         Report::create([
            'schedule_id' => $schedule->id,
            'vessel_id' => $schedule->vessel_id,
            'employee_id' => auth()->user()->getEmployeeId(),
            'status_id' => 16,
            'port_id' => auth()->user()->getPort()
         ]);

         foreach ($schedule->requests as $req) {
            if ($req->status == 20) {
               $req->update([
                  'status' => 3
               ]);

               ReportRequest::create([
                  'request_id' => $req->id,
                  'employee_id' => auth()->user()->getEmployeeId(),
                  'status_id' => 16,
                  'port_id' => auth()->user()->getPort()
               ]);
            }

            if ($req->destination_id == auth()->user()->getPort()) {
               ReportRequest::create([
                  'request_id' => $req->id,
                  'employee_id' => auth()->user()->getEmployeeId(),
                  'status_id' => 16,
                  'port_id' => auth()->user()->getPort()
               ]);
            }
         }
      } else {
         // jika tidak ada additional request akan merubah status schedule ke 2
         // vessel dapat melakukan update schedule
         $schedule->update([
            'status' => 2
         ]);

         Report::create([
            'schedule_id' => $schedule->id,
            'vessel_id' => $schedule->vessel_id,
            'employee_id' => auth()->user()->getEmployeeId(),
            'status_id' => 16,
            'port_id' => auth()->user()->getPort()
         ]);

         // foreach ($schedule->requests as $req) {
         //    if ($req->port == auth()->user()->getPort()) {
         //       ReportRequest::create([
         //          'request_id' => $req->id,
         //          'employee_id' => auth()->user()->getEmployeeId(),
         //          'status_id' => 16,
         //          'port_id' => auth()->user()->getPort()
         //       ]);
         //    }
         // }
      }

      return redirect()->back()->with('success', 'Schedule successfully completed');
      // dd($draftAdditional);
   }
}
