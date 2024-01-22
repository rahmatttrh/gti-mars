<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Vessel;
use Illuminate\Http\Request;

class LogController extends Controller
{
   public function dsp(){
      $logs = Log::where('system', 'DSP')->get();
      return view('pages-stisla.log.dsp', [
         'logs' => $logs
      ])->with('i');
   }

   public function vdr(){
      $vessels = Vessel::get();
      $logs = Log::where('system', 'VDR')->orderBy('created_at', 'desc')->take(30)->get();
      // dd($logs);
      return view('pages-stisla.log.vdr', [
         'filter' => false,
         'vessels' => $vessels,
         'selectedVessel' => null,
         'logs' => $logs,
         'start' => null,
         'end' => null
      ])->with('i');
   }

   public function vdrFilter(Request $req){
      $vessels = Vessel::get();
      $startDate = $req->start;
      $endDate = $req->end;
      // dd($req->vessel);
      if ($req->vessel == 'all') {
         // dd('all');
         $logs = Log::where('system', 'VDR')->whereBetween('created_at', [$startDate, $endDate])->orderBy('created_at', 'desc')->take(30)->get();
         $selectedVessel = null;
      } else {
         // dd('vessel');
         $selectedVessel = Vessel::find($req->vessel);
         $logs = Log::where('system', 'VDR')->whereBetween('created_at', [$startDate, $endDate])->orderBy('created_at', 'desc')->where('vessel_id', $req->vessel)->take(30)->get();
         // dd($logs);
      }
      
      
      return view('pages-stisla.log.vdr', [
         'filter' => true,
         'vessels' => $vessels,
         'selectedVessel' => $selectedVessel,
         'logs' => $logs,
         'start' => $startDate,
         'end' => $endDate
      ])->with('i');
   }
}
