<?php

namespace App\Http\Controllers\Marine;

use App\Http\Controllers\Controller;
use App\Mail\ApprovalEmail;
use App\Models\Request as ModelsRequest;
use App\Models\RequestHistory;
use App\Models\Schedule;
use App\Models\Vessel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
      $size = $schedule->total_size + $request->total_size;

      if ($weight > $vessel->deadweight) {
         return redirect()->back()->with('warning', 'Failed, Total Weight (' . $request->total_weight  .  ' ton) melebihi Deadweight Vessel (' . $schedule->total_weight  . 'ton /' . $vessel->deadweight . ' ton)');
      } elseif ($size > $vessel->deckspace) {
         return redirect()->back()->with('warning', 'Failed, Total Size (' . $request->total_size  .  ') melebihi Deck Space Vessel (' . $schedule->total_size  . ' /' . $vessel->deckspace . ')');
      } else {



         // $request->update([
         //    'status' => 02,
         //    'schedule_id' => $req->schedule,
         //    'remark' => $req->remark
         // ]);

         // $schedule->update([
         //    'total_size' => $schedule->total_size + $request->total_size,
         //    'total_weight' => $schedule->total_weight + $request->total_weight
         // ]);

         $body = $request->activity->name . ' ' . $request->description . ' has successfully set on schedule vessel ' . $schedule->vessel->name . ' at ' . Carbon::parse($schedule->date)->format('d/m/Y');

         $data = [
            'to' => $request->employee->name,
            'from' => 'Marine Department',
            'subject' => 'Request Activity Progress',
            'request' => $request,
            'body' => $body,
            'cargos' => $request->cargoItems,
            'link' => route('request.detail', enkripRambo($request->id))
         ];
         Mail::to("develop@gmail.com")->send(new ApprovalEmail($data));



         return redirect()->back()->with('success', 'Request Activity successfully set on Schedule');
      }
   }
}
