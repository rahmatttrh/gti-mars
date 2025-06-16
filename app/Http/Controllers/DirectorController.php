<?php

namespace App\Http\Controllers;

use App\Models\Vdr;
use App\Models\VdrActivity;
use App\Models\VdrCargo;
use App\Models\VdrOperating;
use App\Models\Vessel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DirectorController extends Controller
{
   public function vessels(){
      $vessels = Vessel::get();
      return view('pages-urbix.bod.vessels', [
         'vessels' => $vessels
      ]);
   }

   public function vesselData($id){
      $vessel = Vessel::find(dekripRambo($id));

      $months = ['Jan', 'Mar', 'Apr', 'May'];
         $today = Carbon::now();
         // dd($today->format('Y'));

         $jan = Carbon::createFromFormat('d/m/Y', '01/01/' . $today->format('Y'));
         $feb = Carbon::createFromFormat('d/m/Y', '01/02/' . $today->format('Y'));
         $mar = Carbon::createFromFormat('d/m/Y', '01/03/' . $today->format('Y'));
         $apr = Carbon::createFromFormat('d/m/Y', '01/04/' . $today->format('Y'));
         $may = Carbon::createFromFormat('d/m/Y', '01/05/' . $today->format('Y'));
         $jun = Carbon::createFromFormat('d/m/Y', '01/06/' . $today->format('Y'));
         // dd($jan);


         // Fuel
         $janVrds = Vdr::where('vessel_id', $vessel->id)->whereMonth('date', $jan)->get();
         $janFuel = 0;
         $janWater = 0;
         foreach($janVrds as $janv){
            $vdrOperating = VdrOperating::where('vdr_id', $janv->id)->sum('daily');
            $janFuel += $vdrOperating;

            $vdrWater = VdrCargo::where('vdr_id', $janv->id)->where('heading_id', 2)->sum('consumption');
            $janWater += $vdrWater;

         }

         $febVrds = Vdr::where('vessel_id', $vessel->id)->whereMonth('date', $feb)->get();
         $febFuel = 0;
         $febWater = 0;
         foreach($febVrds as $febv){
            $vdrOperating = VdrOperating::where('vdr_id', $febv->id)->sum('daily');
            $febFuel += $vdrOperating;

            $vdrWater = VdrCargo::where('vdr_id', $febv->id)->where('heading_id', 2)->sum('consumption');
            $febWater += $vdrWater;
         }

         $marVrds = Vdr::where('vessel_id', $vessel->id)->whereMonth('date', $mar)->get();
         $marFuel = 0;
         $marWater = 0;
         foreach($marVrds as $marv){
            $vdrOperating = VdrOperating::where('vdr_id', $marv->id)->sum('daily');
            $marFuel += $vdrOperating;

            $vdrWater = VdrCargo::where('vdr_id', $marv->id)->where('heading_id', 2)->sum('consumption');
            $marWater += $vdrWater;
         }

         $aprVrds = Vdr::where('vessel_id', $vessel->id)->whereMonth('date', $apr)->get();
         $aprFuel = 0;
         $aprWater = 0;
         foreach($aprVrds as $aprv){
            $vdrOperating = VdrOperating::where('vdr_id', $aprv->id)->sum('daily');
            $aprFuel += $vdrOperating;

            $vdrWater = VdrCargo::where('vdr_id', $aprv->id)->where('heading_id', 2)->sum('consumption');
            $aprWater += $vdrWater;
         }

         $mayVrds = Vdr::where('vessel_id', $vessel->id)->whereMonth('date', $may)->get();
         $mayFuel = 0;
         $mayWater = 0;
         foreach($mayVrds as $mayv){
            $vdrOperating = VdrOperating::where('vdr_id', $mayv->id)->sum('daily');
            $mayFuel += $vdrOperating;

            $vdrWater = VdrCargo::where('vdr_id', $mayv->id)->where('heading_id', 2)->sum('consumption');
            $mayWater += $vdrWater;
         }

         $junVrds = Vdr::where('vessel_id', $vessel->id)->whereMonth('date', $jun)->get();
         $junFuel = 0;
         $junWater = 0;
         foreach($junVrds as $junv){
            $vdrOperating = VdrOperating::where('vdr_id', $junv->id)->sum('daily');
            $junFuel += $vdrOperating;

            $vdrWater = VdrCargo::where('vdr_id', $junv->id)->where('heading_id', 2)->sum('consumption');
            $junWater += $vdrWater;
         }



        


         $fuelArray = [round($janFuel), round($febFuel), round($marFuel), round($aprFuel), round($mayFuel), round($junFuel)];
         $waterArray = [round($janWater), round($febWater), round($marWater), round($aprWater), round($mayWater), round($junWater)];
         $monthArray = [formatDateMonth($jan), formatDateMonth($feb), formatDateMonth($mar), formatDateMonth($apr), formatDateMonth($may), formatDateMonth($jun)];
         // dd($fuelArray);

         $lastAct = [];
         $lastVdr = Vdr::where('vessel_id', $vessel->id)->orderBy('date', 'desc')->first();
         if ($lastVdr) {
            $lastAct = VdrActivity::where('vdr_id', $lastVdr->id)->orderBy('created_at', 'desc')->get();
         }

         $maintenanceVessels = Vessel::where('status', 2)->get();

         // dd($lastActivity);
         // foreach($lastActivity as $lAct){
         //    dd($lAct->vdr->id);
         // }
         

         return view('pages-urbix.bod.vessel-data', [
            'vessel' => $vessel,
            'fuelArray' => $fuelArray,
            'waterArray' => $waterArray,
            'monthArray' => $monthArray,

            // 'lastActivity' => $lastActivity,

            'activities' => $lastAct,
            'maintenanceVessels' => $maintenanceVessels

         ]);
   }
}
