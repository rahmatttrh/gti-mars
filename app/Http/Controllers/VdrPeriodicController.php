<?php

namespace App\Http\Controllers;

use App\Models\Vdr;
use App\Models\VdrCargo;
use App\Models\VdrPeriodic;
use Illuminate\Http\Request;

class VdrPeriodicController extends Controller
{
   public function update(Request $req){
      // dd('ok');
      $req->validate([
         'activity' => 'required',
         'rob_time' => 'required',
         'rob_value' => 'required',
         'rob_actual' => 'required'
      ]);
      $vdr = Vdr::find($req->vdr_id);
      $periodic = VdrPeriodic::find($req->periodic);
      $rob_diff = $req->rob_actual - $req->rob_value;
      // dd($req->rob_value);

      $periodic->update([
         'activity' => $req->activity,
         'rob_time' => $req->rob_time,
         'rob_value' => $req->rob_value,
         'rob_actual' => $req->rob_actual,
         'rob_diff' => $rob_diff,

      ]);

      return redirect()->back()->with('success', 'Data VDR successfully updated');
   }

   public function updateSpecial(Request $req){
      // dd('ok');
      $req->validate([
         
         'fuel_cons_remu' => 'required',
         'fuel_cons_actual' => 'required',
      ]);
      $vdr = Vdr::find($req->vdr_id);
      $periodic = VdrPeriodic::find($req->periodic);
      // dd($rob_actual);

      // dd($vdr->cargos->where('heading_id', 1)->opening);
      
      // dd($cargoFuel->opening);

      $corrected = $req->fuel_cons_remu - $periodic->rob_diff;

      $periodic->update([
         
         'fuel_cons_remu' => $req->fuel_cons_remu,
         'fuel_cons_correct' => $corrected,
         'fuel_cons_actual' => $req->fuel_cons_actual,
         'fuel_cons_total' => $corrected + $req->fuel_cons_actual
      ]);

      $cargoFuel = VdrCargo::where('vdr_id', $vdr->id)->where('heading_id', 1)->first();
      $cargoWater = VdrCargo::where('vdr_id', $vdr->id)->where('heading_id', 2)->first();

      if ($periodic->fuel_cons_total > 0) {
         $actualFuel = $periodic->fuel_cons_total + $cargoFuel->received - $cargoFuel->transferred - $cargoFuel->closing;
      } 
      // else {
      //    // $actualFuel = 0 ;
      //    $actualFuel = 0 + $cargoFuel->received - $cargoFuel->transferred - $cargoFuel->closing;
      // }

      

      $actualWater = ($cargoWater->opening + $cargoWater->received) - ($cargoWater->transferred + $cargoWater->closing);

      

      // dd($cargoWater->transferred + $cargoWater->closing);

      $cargoWater->update([
         'consumption' => $actualWater
      ]);

      if ($periodic->rob_diff < 0) {
         $periodic->update([
            'fuel_cons_correct' => $periodic->fuel_cons_remu,
            'fuel_cons_total' => $periodic->fuel_cons_remu + $req->fuel_cons_actual
         ]);

        
         // $cargoFuel->update([
         //    'consumption' => $periodic->fuel_cons_correct
         // ]);
      }

      $cargoFuel->update([
         'consumption' => $periodic->fuel_cons_total
      ]);

      return redirect()->back()->with('success', 'Data VDR successfully updated');
   }
}
