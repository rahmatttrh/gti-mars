<?php

namespace App\Http\Controllers\Marine;

use App\Http\Controllers\Controller;
use App\Models\Vdr;
use App\Models\VdrOperating;
use App\Models\VdrTimestamp;
use App\Models\Vessel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MarineVdrController extends Controller
{
   public function index()
   {
      if (auth()->user()->hasRole('admin-dsp') || auth()->user()->hasRole('superadmin-dsp')) {
         return view('pages-stisla.forbidden');
      }

      $vdrAlerts = Vdr::where('status', 1)->get();

      // return view('pages.vdr.marine.index');
      $today = Carbon::now();
      // dd($today->month);
      $vessels = Vessel::get();
      // $vessel = Vessel::find(11);
      $vdrs = Vdr::where('status', '>=', 1)->whereMonth('date', $today->month)->whereYear('date', $today->year)->orderBy('date', 'asc')->get();
      // dd($vdrs);

      // $operatingHeaders = VdrOperatingHeader::get();
      // // dd(count($operatingHeaders));

      // foreach($operatingHeaders as $head){

      // }
      
      if ($today->month == 1) {
         $monthName = 'Januari';
      } else if ($today->month == 2){
         $monthName = 'Februari';
      } else if ($today->month == 3){
         $monthName = 'Maret';
      } else if ($today->month == 4){
         $monthName = 'April';
      } else if ($today->month == 5){
         $monthName = 'Mei';
      } else if ($today->month == 6){
         $monthName = 'Juni';
      }  else if ($today->month == 7){
         $monthName = 'Juli';
      } else if ($today->month == 8){
         $monthName = 'Agustus';
      } else if ($today->month == 9){
         $monthName = 'September';
      } else if ($today->month == 10){
         $monthName = 'Oktober';
      } else if ($today->month == 11){
         $monthName = 'November';
      } else if ($today->month == 12){
         $monthName = 'Desember';
      }

      $date = array();
      $value = array();
      $fuel = array();
      foreach($vdrs as $vdr){
         $operatings = VdrOperating::where('vdr_id', $vdr->id)->get();
         $totalTime = $operatings->sum('time');
         $totalFuel = $operatings->sum('daily');

         // dd($operatings);
         $date[] = formatDateOnly($vdr->date);
         $value[] = $totalTime;
         $fuel[] = $totalFuel;
      }

      

      // dd($value);
      return view('pages-stisla.vdr.home-marine', [
         'vdrAlerts' => $vdrAlerts,
         'thisMonth' => $today->month,
         'thisYear' => $today->year,
         'monthName' => $monthName,
         'vdrs' => $vdrs,
         'thisVessel' => null,
         'vessel' => null,
         'vessels' => $vessels,
         'date' => $date,
         'value' => $value,
         'fuel' => $fuel
      ])->with('i');
   }


   public function validation(){
      $vdrs = Vdr::where('status', 1)->get();
      return view('pages-stisla.marine.vdr.validation', [
         'vdrs' => $vdrs
      ])->with('i');
   }


   public function approve($id){
      $dekripId = dekripRambo($id);
      $vdr = Vdr::find($dekripId);
      $vdr->update([
         'status' => 2
      ]);

      VdrTimestamp::create([
         'vdr_id' => $vdr->id,
         'status' => 2,
         'user_id' => auth()->user()->id
      ]);
      // dd()

      return redirect()->back()->with('success', 'VDR Marine Approved');
   }

   public function approveSuptent($id){
      $dekripId = dekripRambo($id);
      $vdr = Vdr::find($dekripId);
      $vdr->update([
         'status' => 3
      ]);
      // dd()
      VdrTimestamp::create([
         'vdr_id' => $vdr->id,
         'status' => 3,
         'user_id' => auth()->user()->id
      ]);

      return redirect()->back()->with('success', 'VDR Suptent Approved');
   }

   public function approveLuthfi($id){
      $dekripId = dekripRambo($id);
      $vdr = Vdr::find($dekripId);
      $vdr->update([
         'status' => 4
      ]);
      // dd()

      VdrTimestamp::create([
         'vdr_id' => $vdr->id,
         'status' => 4,
         'user_id' => auth()->user()->id
      ]);

      return redirect()->back()->with('success', 'VDR Approved');
   }
}
