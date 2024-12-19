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
         'rob_diff' => $rob_diff,

         'fuel_cons_remu' => $req->fuel_cons_remu,
         'fuel_cons_correct' => $req->fuel_cons_correct,
         'fuel_cons_actual' => $req->fuel_cons_actual,
         'fuel_cons_total' => $req->fuel_cons_correct + $req->fuel_cons_actual
      ]);

      return redirect()->back()->with('success', 'Data VDR successfully updated');
   }
}
