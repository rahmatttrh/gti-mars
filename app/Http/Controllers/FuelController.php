<?php

namespace App\Http\Controllers;

use App\Models\Request as ModelsRequest;
use App\Models\Schedule;
use Illuminate\Http\Request;

class FuelController extends Controller
{
   public function approve(Request $req){
      $request = ModelsRequest::find($req->requestId);
      $schedule = Schedule::find($request->schedule_id);

      if ($req->qty_approve > $request->qty) {
         return redirect()->back()->with('warning', 'Qty Approve melebihi Qty Request');
      }

      $request->update([
         'status' => 1,
         'qty_approve' => $req->qty_approve
      ]);
      $schedule->update([
         'status' => 0
      ]);

      return redirect()->back()->with('success', 'Fuel request approved');
   }
}
