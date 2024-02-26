<?php

namespace App\Http\Controllers;

use App\Models\Vdr;
use App\Models\VdrPeriodic;
use Illuminate\Http\Request;

class VdrPeriodicController extends Controller
{
   public function update(Request $req){
      $req->validate([
         'activity' => 'required',
         'rob_time' => 'required',
         'rob_value' => 'required',
         'rob_actual' => 'required'
      ]);
      $vdr = Vdr::find($req->vdr_id);
      $periodic = VdrPeriodic::find($req->periodic);
      $rob_diff = $req->rob_actual - $req->rob_value;
      // dd($rob_actual);

      $periodic->update([
         'activity' => $req->activity,
         'rob_time' => $req->rob_time,
         'rob_value' => $req->rob_value,
         'rob_actual' => $req->rob_actual,
         'rob_diff' => $rob_diff
      ]);

      return redirect()->back()->with('success', 'Data VDR successfully updated');
   }
}
