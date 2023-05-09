<?php

namespace App\Http\Controllers\Marine;

use App\Http\Controllers\Controller;
use App\Models\Request as ModelsRequest;
use App\Models\RequestHistory;
use App\Models\Schedule;
use App\Models\Vessel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MarineRequestController extends Controller
{
   public function undoApprove(Request $req)
   {
      $now = Carbon::now();
      $request = ModelsRequest::find($req->requestId);

      RequestHistory::create([
         'request_id' => $request->id,
         'date' => $request->undo,
         'reason' => $request->reason,
         'approve' => $now
      ]);

      $request->update([
         'status' => 00,
         'undo' => null,
         'reason' => null
      ]);

      return redirect()->to('/')->with('success', 'Cancel Request successfully approved');
   }

   public function selectSchedule(Request $req)
   {
      // dd($req->request_id);
      $request = ModelsRequest::find($req->request_id);
      $schedule = Schedule::find($req->schedule);
      $vessel = Vessel::find($schedule->vessel_id);
      $weight = $schedule->total_weight + $request->total_weight;

      if ($weight > $vessel->deadweight) {
         return redirect()->back()->with('warning', 'Failed, Total Weight (' . $request->total_weight  .  ' ton) melebihi Deadweight Vessel (' . $schedule->total_weight  . 'ton /' . $vessel->deadweight . ' ton)');
      } else {
         $request->update([
            'status' => 02,
            'schedule_id' => $req->schedule
         ]);

         $schedule->update([
            'total_size' => $schedule->total_size + $request->total_size,
            'total_weight' => $schedule->total_weight + $request->total_weight
         ]);

         return redirect()->back()->with('success', 'Request Activity successfully set on Schedule');
      }
   }
}
