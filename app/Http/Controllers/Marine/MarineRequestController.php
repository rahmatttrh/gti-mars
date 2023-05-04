<?php

namespace App\Http\Controllers\Marine;

use App\Http\Controllers\Controller;
use App\Models\Request as ModelsRequest;
use App\Models\RequestHistory;
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
      $request->update([
         'status' => 02,
         'schedule_id' => $req->schedule
      ]);

      return redirect()->back()->with('success', 'Request Activity successfully set on Schedule');
   }
}
