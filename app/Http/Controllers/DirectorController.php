<?php

namespace App\Http\Controllers;

use App\Models\Vdr;
use App\Models\VdrActivity;
use App\Models\VdrCargo;
use App\Models\VdrOperating;
use App\Models\VdrOperatingHeader;
use App\Models\Vessel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DirectorController extends Controller
{

   public function dashboardDaily(){
      $today = Carbon::now();

      $month = $today->format('m');
      $year = $today->format('Y');
      // dd($year);

     

      if ($month == 1) {
         $monthName = 'Januari';
      } elseif ($month == 2) {
         $monthName = 'Februari';
      } elseif ($month == 3) {
         $monthName = 'Maret';
      } elseif ($month == 4) {
         $monthName = 'April';
      } elseif ($month == 5) {
         $monthName = 'Mei';
      } elseif ($month == 6) {
         $monthName = 'Juni';
      } elseif ($month == 7) {
         $monthName = 'Juli';
      } elseif ($month == 8) {
         $monthName = 'Agustus';
      } elseif ($month == 9) {
         $monthName = 'September';
      } elseif ($month == 10) {
         $monthName = 'Oktober';
      } elseif ($month == 11) {
         $monthName = 'November';
      } elseif ($month == 12) {
         $monthName = 'Desember';
      }

      $now = Carbon::now();
      // dd($now->format('Y-m-d'));

      // $yearMonth = $now->format('Y-m');
      $yearMonth = $year . '-' . $month;
      // dd($yearMonth);
      $start = Carbon::parse($yearMonth)->startOfMonth();
      $end = Carbon::parse($yearMonth)->endOfMonth();

      $dates = [];
      while ($start->lte($end)) {
         $dates[] = $start->copy();
         $start->addDay();
      }

      $dateArray = [];
      foreach($dates as $d){
         $dateArray[] = $d->format('d');
      }
      // dd($dates);

      foreach($dates as $date){
         $vdrs = Vdr::whereDate('date', $date)->get();
         $fuel = 0;
         $water = 0;
         foreach($vdrs as $v){
            $vdrOperating = VdrOperating::where('vdr_id', $v->id)->sum('daily');
            $fuel += $vdrOperating;

            $vdrWater = VdrCargo::where('vdr_id', $v->id)->where('heading_id', 2)->sum('consumption');
            $water += $vdrWater;
         }

         $fuelArray[] = round($fuel);
         $waterArray[] = round($water);
      }

      return view('pages-urbix.dashboard-daily', [
         'monthName' => $monthName,
         'dateArray' => $dateArray,
         'today' => $today,
         'fuelArray' => $fuelArray,
         'waterArray' => $waterArray,
      ]);
   }

   public function dashboardMonth($id){
      $today = Carbon::now();

      $month = dekripRambo($id);
      $year = $today->format('Y');
      // dd($year);

      // dd($month);

      if ($month == 1) {
         $monthName = 'Januari';
      } elseif ($month == 2) {
         $monthName = 'Februari';
      } elseif ($month == 3) {
         $monthName = 'Maret';
      } elseif ($month == 4) {
         $monthName = 'April';
      } elseif ($month == 5) {
         $monthName = 'Mei';
      } elseif ($month == 6) {
         $monthName = 'Juni';
      } elseif ($month == 7) {
         $monthName = 'Juli';
      } elseif ($month == 8) {
         $monthName = 'Agustus';
      } elseif ($month == 9) {
         $monthName = 'September';
      } elseif ($month == 10) {
         $monthName = 'Oktober';
      } elseif ($month == 11) {
         $monthName = 'November';
      } elseif ($month == 12) {
         $monthName = 'Desember';
      }

      $now = Carbon::now();
      // dd($now->format('Y-m-d'));

      // $yearMonth = $now->format('Y-m');
      $yearMonth = $year . '-' . $month;
      // dd($yearMonth);
      $start = Carbon::parse($yearMonth)->startOfMonth();
      $end = Carbon::parse($yearMonth)->endOfMonth();

      $dates = [];
      while ($start->lte($end)) {
         $dates[] = $start->copy();
         $start->addDay();
      }

      $dateArray = [];
      foreach($dates as $d){
         $dateArray[] = $d->format('d');
      }
      // dd($dates);

      foreach($dates as $date){
         $vdrs = Vdr::whereDate('date', $date)->get();
         $fuel = 0;
         $water = 0;
         foreach($vdrs as $v){
            $vdrOperating = VdrOperating::where('vdr_id', $v->id)->sum('daily');
            $fuel += $vdrOperating;

            $vdrWater = VdrCargo::where('vdr_id', $v->id)->where('heading_id', 2)->sum('consumption');
            $water += $vdrWater;
         }

         $fuelArray[] = round($fuel);
         $waterArray[] = round($water);
      }

      return view('pages-urbix.dashboard-daily', [
         'monthName' => $monthName,
         'dateArray' => $dateArray,
         'today' => $today,
         'fuelArray' => $fuelArray,
         'waterArray' => $waterArray,
      ]);
   }

   public function vessels(){
      $vessels = Vessel::get();
      return view('pages-urbix.bod.vessels', [
         'vessels' => $vessels
      ]);
   }

   public function vesselData($id){
      $vessel = Vessel::find(dekripRambo($id));

      $today = Carbon::now();
      // dd($today->format('Y'));
      

      // dd(12 - $today->format('m'));

      $qty = 12 - $today->format('m');

      $allMonth = [];
      $monthArray = [];
      for ($x = 1; $x <= $qty; $x++) {
         $month = Carbon::createFromFormat('d/m/Y', '01/' . $x . '/' . $today->format('Y'));
         $allMonth[] = $month;

         $monthArray[] = formatDateMonth($month);
      }

      $fuelArray = [];
      $waterArray = [];

      $vdrOperatingHeaders = VdrOperatingHeader::get();
      // $high = 0;
      // $normal = 0;
      // $slow = 0;
      // $manu = 0;
      // $idle = 0;
      // $tow = 0;
      // $ah = 0;
      // $sb = 0;
      // $maintenance = 0;
      // $dt = 0;

      $vdrOperating = [];

      $highArray = [];
      $normalArray = [];
      $slowArray = [];
      $manuArray = [];
      $indleArray = [];
      $towArray = [];
      $ahArray = [];
      $sbArray = [];
      $maintenanceArray = [];
      $dtArray = [];

      foreach($allMonth as $m){
         $vdrs = Vdr::where('vessel_id', $vessel->id)->whereMonth('date', $m)->get();
         $fuel = 0;
         $water = 0;

         $high = 0;
         $normal = 0;
         $slow = 0;
         $manu = 0;
         $idle = 0;
         $tow = 0;
         $ah = 0;
         $sb = 0;
         $maintenance = 0;
         $dt = 0;
         
         foreach($vdrs as $v){
            $vdrOperatings = VdrOperating::where('vdr_id', $v->id)->get();
            $daily = VdrOperating::where('vdr_id', $v->id)->sum('daily');
            $fuel += $daily;

            $vdrWater = VdrCargo::where('vdr_id', $v->id)->where('heading_id', 2)->sum('consumption');
            $water += $vdrWater;



            
            $vdrOperatingHigh = $vdrOperatings->where('heading_id', 1)->first()->daily;
            $high += $vdrOperatingHigh;

            $vdrOperatingNormal = $vdrOperatings->where('heading_id', 2)->first()->daily;
            $normal += $vdrOperatingNormal;

            $vdrOperatingSlow = $vdrOperatings->where('heading_id', 3)->first()->daily;
            $slow += $vdrOperatingSlow;

            $vdrOperatingManu = $vdrOperatings->where('heading_id', 4)->first()->daily;
            $manu += $vdrOperatingManu;

            $vdrOperatingIdle = $vdrOperatings->where('heading_id', 5)->first()->daily;
            $idle += $vdrOperatingIdle;

            $vdrOperatingTow = $vdrOperatings->where('heading_id', 6)->first()->daily;
            $tow += $vdrOperatingTow;

            $vdrOperatingAh = $vdrOperatings->where('heading_id', 7)->first()->daily;
            $ah += $vdrOperatingAh;

            $vdrOperatingSb = $vdrOperatings->where('heading_id', 8)->first()->daily;
            $sb += $vdrOperatingSb;

            $vdrOperatingMaintenance = $vdrOperatings->where('heading_id', 9)->first()->daily;
            $maintenance += $vdrOperatingMaintenance;

            $vdrOperatingDt = $vdrOperatings->where('heading_id', 10)->first()->daily;
            $dt += $vdrOperatingDt;
         }

         $fuelArray[] = round($fuel);
         $waterArray[] = round($water);

         $highArray[] = round($high);
         $normalArray[] = round($normal);
         $slowArray[] = round($slow);
         $manuArray[] = round($manu);
         $idleArray[] = round($idle);
         $towArray[] = round($tow);
         $ahArray[] = round($ah);
         $sbArray[] = round($sb);
         $maintenanceArray[] = round($maintenance);
         $dtArray[] = round($dt);
      }
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

      $today = Carbon::now();

      $month = $today->format('m');
      $year = $today->format('Y');
      // dd($year);

     

      if ($month == 1) {
         $monthName = 'January';
      } elseif ($month == 2) {
         $monthName = 'February';
      } elseif ($month == 3) {
         $monthName = 'March';
      } elseif ($month == 4) {
         $monthName = 'April';
      } elseif ($month == 5) {
         $monthName = 'May';
      } elseif ($month == 6) {
         $monthName = 'June';
      } elseif ($month == 7) {
         $monthName = 'July';
      } elseif ($month == 8) {
         $monthName = 'Augustus';
      } elseif ($month == 9) {
         $monthName = 'September';
      } elseif ($month == 10) {
         $monthName = 'October';
      } elseif ($month == 11) {
         $monthName = 'November';
      } elseif ($month == 12) {
         $monthName = 'December';
      }

      $now = Carbon::now();
      // dd($now->format('Y-m-d'));

      // $yearMonth = $now->format('Y-m');
      $yearMonth = $year . '-' . $month;
      // dd($yearMonth);
      $start = Carbon::parse($yearMonth)->startOfMonth();
      $end = Carbon::parse($yearMonth)->endOfMonth();

      $dates = [];
      while ($start->lte($end)) {
         $dates[] = $start->copy();
         $start->addDay();
      }

      $dateArray = [];
      foreach($dates as $d){
         $dateArray[] = $d->format('d');
      }
      // dd($dates);

      foreach($dates as $date){
         $vdrs = Vdr::where('vessel_id', $vessel->id)->whereDate('date', $date)->get();
         $fuel = 0;
         $water = 0;
         foreach($vdrs as $v){
            $vdrOperating = VdrOperating::where('vdr_id', $v->id)->sum('daily');
            $fuel += $vdrOperating;

            $vdrWater = VdrCargo::where('vdr_id', $v->id)->where('heading_id', 2)->sum('consumption');
            $water += $vdrWater;
         }

         $fuelDateArray[] = round($fuel);
         $waterDateArray[] = round($water);
      }

         $lastVdr = Vdr::where('vessel_id', $vessel->id)->orderBy('date', 'desc')->first();

         

         return view('pages-urbix.bod.vessel-data', [
            'monthName' => $monthName,
            'lastVdr' => $lastVdr,
            'vessel' => $vessel,
            'fuelArray' => $fuelArray,
            'waterArray' => $waterArray,
            'monthArray' => $monthArray,

            'fuelDateArray' => $fuelDateArray,
            'waterDateArray' => $waterDateArray,
            'dateArray' => $dateArray,

            // 'lastActivity' => $lastActivity,

            'activities' => $lastAct,
            'maintenanceVessels' => $maintenanceVessels,

            'highArray' => $highArray,
            'normalArray' => $normalArray,
            'slowArray' => $slowArray,
            'manuArray' => $manuArray,
            'idleArray' => $idleArray,
            'towArray' => $towArray,
            'ahArray' => $ahArray,
            'sbArray' => $sbArray,
            'maintenanceArray' => $maintenanceArray,
            'dtArray' => $dtArray,

         ]);
   }
}
