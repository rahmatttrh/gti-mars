<?php

namespace App\Http\Controllers;

use App\Imports\CrewVdr;
use App\Models\Cargo;
use App\Models\Log as ModelsLog;
use App\Models\Vdr;
use App\Models\VdrActivity;
use App\Models\VdrCargo;
use App\Models\VdrCargoHeading;
use App\Models\VdrCrew;
use App\Models\VdrEngine;
use App\Models\VdrEngineHeading;
use App\Models\VdrHistory;
use App\Models\VdrHse;
use App\Models\VdrHseHeader;
use App\Models\VdrOperating;
use App\Models\VdrOperatingHeader;
use App\Models\VdrPeriodic;
use App\Models\VdrWeather;
use App\Models\VdrWeatherHeading;
use App\Models\Vessel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Svg\Tag\Rect;

class VdrController extends Controller
{
   public function index()
   {
      // dd('ok');
      return view('pages.vdr.vdr', [])->with('i');
   }

   public function history()
   {

      $user = auth()->user();

      // Opsi 1 
      $vessel = Vessel::where('email', $user->email)->first();

      $vdrs = Vdr::where('vessel_id', $vessel->id)->orderby('date', 'desc')->get();

      // dd($vdrs);

      //   return view('pages.vdr.history-vdr', [
      return view('pages-stisla.vessel.vdr.history', [
         'vdrs' => $vdrs
      ])->with('i');
   }

   public function chart()
   {

      $user = auth()->user();

      // Opsi 1 
      $vessel = Vessel::where('email', $user->email)->first();

      $vdrs = Vdr::where('vessel_id', $vessel->id)->orderby('date', 'desc')->get();

      // $fuels = VdrCargo::where('heading_id', '1')->get();
      $result = VdrCargo::join('vdrs', 'vdr_cargos.vdr_id', '=', 'vdrs.id')
         ->where('vdrs.vessel_id', $vessel->id)
         ->where('vdr_cargos.heading_id', '1')
         ->select('vdrs.date as tanggal', 'vdr_cargos.consumption as value')
         ->get();

      $startDate = date('Y-m-01');
      $endDate = date('Y-m-t');

      $vdrCargoModel = new VdrCargo();
      $result = $vdrCargoModel->getDataForDateRange($vessel->id, $startDate, $endDate);


      $fuels = json_encode($result);

      return view('pages.vdr.chart-vdr', [
         'vdrs' => $vdrs,
         'fuels' => $fuels
      ])->with('i');
   }

   public function vdrVessel()
   {
      // dd('ok');
      $user = auth()->user();

      // Opsi 1 
      $vessel = Vessel::where('email', $user->email)->first();

      $vdr = Vdr::where('vessel_id', $vessel->id)->where('date', date('Y-m-d'))->first();
      // dd($vdr->id);

      $activities = $vdr ? VdrActivity::where('vdr_id', $vdr->id)->get() : null;
      $cargos = $vdr ? VdrCargo::where('vdr_id', $vdr->id)->get() : null;
      $weathers = $vdr ? VdrWeather::where('vdr_id', $vdr->id)->get() : null;
      $hses = $vdr ? VdrHse::where('vdr_id', $vdr->id)->get() : null;
      $engines = $vdr ? VdrEngine::where('vdr_id', $vdr->id)->get() : null;
      $crews = $vdr ? VdrCrew::where('vdr_id', $vdr->id)->orderBy('is_crew', 'desc')->get() : null;
      $operatings = $vdr ? VdrOperating::where('vdr_id', $vdr->id)->get() : null;
      $periodic = $vdr ? VdrPeriodic::where('vdr_id', $vdr->id)->first() : null;
      $totalJam = $vdr ? VdrOperating::where('vdr_id', $vdr->id)->sum('time') : null;
      $totalDaily = $vdr ? VdrOperating::where('vdr_id', $vdr->id)->sum('daily') : null;

      $vdrs = Vdr::where('vessel_id', $vessel->id)->orderBy('date', 'desc')->get();



      $wHeadings = VdrWeatherHeading::get();
      $hseHeadings = VdrHseHeader::get();
      $operatingHeadings = VdrOperatingHeader::get();
      $cargoHeadings = VdrCargoHeading::get();



      //   pages.vdr.create-vdr
      return view('pages-stisla.vdr.home-vessel', [
         //   return view('pages.vdr.create-vdr', [
         'user' => $user,
         'vdrs' => $vdrs,
         'vessel' => $vessel,
         'vdr' => $vdr,
         'activities' => $activities,
         'operatings' => $operatings,
         'cargos' => $cargos,
         'weathers' => $weathers,
         'hses' => $hses,
         'engines' => $engines,
         'crews' => $crews,
         'periodic' => $periodic,
         'totalJam' => $totalJam,
         'totalDaily' => $totalDaily,

         'wHeadings' => $wHeadings,
         'hseHeadings' => $hseHeadings,
         'operatingHeadings' => $operatingHeadings,
         'cargoHeadings' => $cargoHeadings
      ])->with('i');
   }

   public function vdrCreate()
   {

      // dd('old');

      $user = auth()->user();

      // Opsi 1 
      $vessel = Vessel::where('email', $user->email)->first();
      $today = Carbon::now();
      $vdr = null;




      $lastVdr = Vdr::where('vessel_id', $vessel->id)->orderBy('date', 'desc')->first();
      // dd($lastVdr);




      $activities = $vdr ? VdrActivity::where('vdr_id', $vdr->id)->get() : null;
      $cargos = $vdr ? VdrCargo::where('vdr_id', $vdr->id)->get() : null;
      $weathers = $vdr ? VdrWeather::where('vdr_id', $vdr->id)->get() : null;
      $hses = $vdr ? VdrHse::where('vdr_id', $vdr->id)->get() : null;
      $engines = $vdr ? VdrEngine::where('vdr_id', $vdr->id)->get() : null;
      $crews = $vdr ? VdrCrew::where('vdr_id', $vdr->id)->orderBy('is_crew', 'desc')->get() : null;
      $operatings = $vdr ? VdrOperating::where('vdr_id', $vdr->id)->get() : null;
      $totalJam = $vdr ? VdrOperating::where('vdr_id', $vdr->id)->sum('time') : null;
      $totalDaily = $vdr ? VdrOperating::where('vdr_id', $vdr->id)->sum('daily') : null;


      $wHeadings = VdrWeatherHeading::get();
      $hseHeadings = VdrHseHeader::get();
      $operatingHeadings = VdrOperatingHeader::get();
      $cargoHeadings = VdrCargoHeading::get();

      //   pages.vdr.create-vdr
      return view('pages-stisla.vessel.vdr.form', [
         //   return view('pages.vdr.create-vdr', [
         'user' => $user,
         'vessel' => $vessel,
         'vdr' => $vdr,
         'activities' => $activities,
         'operatings' => $operatings,
         'cargos' => $cargos,
         'weathers' => $weathers,
         'hses' => $hses,
         'engines' => $engines,
         'crews' => $crews,
         'totalJam' => $totalJam,
         'totalDaily' => $totalDaily,

         'wHeadings' => $wHeadings,
         'hseHeadings' => $hseHeadings,
         'operatingHeadings' => $operatingHeadings,
         'cargoHeadings' => $cargoHeadings,

         'lastVdr' => $lastVdr ?? null
      ])->with('i');
   }

   public function vdrCreateSpa()
   {

      $user = auth()->user();

      // Opsi 1 
      $vessel = Vessel::where('email', $user->email)->first();
      $today = Carbon::now();
      $vdr = null;




      $lastVdr = Vdr::where('vessel_id', $vessel->id)->orderBy('date', 'desc')->first();
      // dd($lastVdr);
      if ($lastVdr) {
         $cek = Vdr::where('vessel_id', $vessel->id)->where('date', $today->format('Y-m-d'))->first();

         if ($cek) {
            # code...
            return redirect()->back()->with('warning', 'Failed Create VDR, karena sudah ada VDR pada hari ini');
         }
         // dd('ok');
         $vdrId = $this->funcStore($lastVdr);
         // dd($vdrId);
         $vdr = Vdr::find($vdrId);


         $activities = $vdr ? VdrActivity::where('vdr_id', $vdr->id)->get() : null;
         $cargos = $vdr ? VdrCargo::where('vdr_id', $vdr->id)->get() : null;
         $weathers = $vdr ? VdrWeather::where('vdr_id', $vdr->id)->get() : null;
         $hses = $vdr ? VdrHse::where('vdr_id', $vdr->id)->get() : null;
         $engines = $vdr ? VdrEngine::where('vdr_id', $vdr->id)->get() : null;
         $crews = $vdr ? VdrCrew::where('vdr_id', $vdr->id)->orderBy('is_crew', 'desc')->get() : null;
         $operatings = $vdr ? VdrOperating::where('vdr_id', $vdr->id)->get() : null;
         $totalJam = $vdr ? VdrOperating::where('vdr_id', $vdr->id)->sum('time') : null;
         $totalDaily = $vdr ? VdrOperating::where('vdr_id', $vdr->id)->sum('daily') : null;
         $lastVdr = Vdr::where('vessel_id', $vessel->id)->orderBy('date', 'desc')->first();

         // dd($lastVdr);



         // return view('pages-stisla.vessel.vdr.create', [

         //    'user' => $user,
         //    'vessel' => $vessel,
         //    'vdr' => $vdr,
         //    'activities' => $activities,
         //    'operatings' => $operatings,
         //    'cargos' => $cargos,
         //    'weathers' => $weathers,
         //    'hses' => $hses,
         //    'engines' => $engines,
         //    'crews' => $crews,
         //    'totalJam' => $totalJam,
         //    'totalDaily' => $totalDaily,



         //    'lastVdr' => $lastVdr ?? null
         // ])->with('i');
      } else {

         $vdrId = $this->funcStoreEmpty($vessel->id);
      }



      ModelsLog::create([
         'system' => 'VDR',
         'user_id' => auth()->user()->id,
         'vessel_id' => $vdr->vessel_id,
         'action' => 'Create VDR',
         'vdr_id' => $vdrId,
         'desc' => '',
         'table' => 'vdrs'
      ]);

      return redirect()->route('vdr.show.spa', [enkripRambo($vdrId), enkripRambo('index')]);
      // dd('ok');



      $activities = $vdr ? VdrActivity::where('vdr_id', $vdr->id)->get() : null;
      $cargos = $vdr ? VdrCargo::where('vdr_id', $vdr->id)->get() : null;
      $weathers = $vdr ? VdrWeather::where('vdr_id', $vdr->id)->get() : null;
      $hses = $vdr ? VdrHse::where('vdr_id', $vdr->id)->get() : null;
      $engines = $vdr ? VdrEngine::where('vdr_id', $vdr->id)->get() : null;
      $crews = $vdr ? VdrCrew::where('vdr_id', $vdr->id)->orderBy('is_crew', 'desc')->get() : null;
      $operatings = $vdr ? VdrOperating::where('vdr_id', $vdr->id)->get() : null;
      $totalJam = $vdr ? VdrOperating::where('vdr_id', $vdr->id)->sum('time') : null;
      $totalDaily = $vdr ? VdrOperating::where('vdr_id', $vdr->id)->sum('daily') : null;


      $wHeadings = VdrWeatherHeading::get();
      $hseHeadings = VdrHseHeader::get();
      $operatingHeadings = VdrOperatingHeader::get();
      $cargoHeadings = VdrCargoHeading::get();

      //   pages.vdr.create-vdr
      return view('pages-stisla.vessel.vdr.create', [
         //   return view('pages.vdr.create-vdr', [
         'user' => $user,
         'vessel' => $vessel,
         'vdr' => $vdr,
         'activities' => $activities,
         'operatings' => $operatings,
         'cargos' => $cargos,
         'weathers' => $weathers,
         'hses' => $hses,
         'engines' => $engines,
         'crews' => $crews,
         'totalJam' => $totalJam,
         'totalDaily' => $totalDaily,

         'wHeadings' => $wHeadings,
         'hseHeadings' => $hseHeadings,
         'operatingHeadings' => $operatingHeadings,
         'cargoHeadings' => $cargoHeadings,

         'lastVdr' => $lastVdr ?? null
      ])->with('i');
   }

   public function vdrRevisiStore($id)
   {
      $vdr = Vdr::find(dekripRambo($id));

      // dd($vdr);

      $vdrRevisi = VdrHistory::where('vdr_id', $vdr->id)->first();


      // dd($vdr->code);


      $vdrHistory = VdrHistory::create([
         'vdr_id' => $vdr->id,
         'area' => $vdr->area,
         'code' => $vdr->code,
         'date' => $vdr->date,
         'crew_onduty' => $vdr->crew_onduty,
         'crew_max' => $vdr->crew_max,
         'location_midnight' => $vdr->location_midnight,
         // 'created_by' => $vdr->created_by,
         'contract' => $vdr->contract,
         'contract_start' => $vdr->contract_start,
         'contract_end' => $vdr->contract_end,
         'owner' => $vdr->owner,
         'master' => $vdr->master,
         'ce' => $vdr->ce,
         'status' => 0,

         'name1' => $vdr->name1,
         'name2' => $vdr->name2,
         'name3' => $vdr->name3,
         'name4' => $vdr->name4,

         'name1' => $vdr->name1,
         'name2' => $vdr->name2,
         'name3' => $vdr->name3,
         'name4' => $vdr->name4,

         'reject_by' => $vdr->reject_by,
         'reject_date' => $vdr->reject_date,
         'reject_desc' => $vdr->reject_desc,
         // 'reject_data' => $vdr->reject_data

      ]);

      $vdrWeathers = VdrWeather::where('vdr_id', $vdr->id)->get();
      foreach ($vdrWeathers as $vw) {
         VdrWeather::create([
            // 'vdr_id' => $vd
            'history_id' => $vdrHistory->id,
            'heading_id' => $vw->heading_id,
            't_0006' => $vw->t_0006,
            't_0612' => $vw->t_0612,
            't_1218' => $vw->t_1218,
            't_1824' => $vw->t_1824,
            'status' => 1
         ]);
      }


      $vdrHses = VdrHse::where('vdr_id', $vdr->id)->get();
      foreach ($vdrHses as $vh) {
         VdrHse::create([
            'history_id' => $vdrHistory->id,
            'header_id' => $vh->header_id,
            'previous' => $vh->previous,
            'today' => $vh->today,
         ]);
      }


      $vdrActivities = VdrActivity::where('vdr_id', $vdr->id)->get();
      foreach ($vdrActivities as $va) {
         VdrActivity::create([
            'history_id' => $vdrHistory->id,
            'activity' => $va->activity,
            'start' => $va->start,
            'finish' => $va->finish,
            'high' => $va->high,
            'normal' => $va->normal,
            'slow' => $va->slow,
            'manu' => $va->manu,
            'idle' => $va->idle,
            'tow' => $va->tow,
            'ah' => $va->ah,
            'sb' => $va->sb
         ]);
      }


      $vdrCargos = VdrCargo::where('vdr_id', $vdr->id)->get();
      foreach ($vdrCargos as $vc) {
         VdrCargo::create([
            'history_id' => $vdrHistory->id,
            'heading_id' => $vc->heading_id,
            'opening' => $vc->opening,
            'consumption' => $vc->consumption,
            'received' => $vc->received,
            'transferred' => $vc->transferred,
            'closing' => $vc->closing,
            'remarks' => $vc->remark
         ]);
      }


      $vdrOperatings = VdrOperating::where('vdr_id', $vdr->id)->get();
      foreach ($vdrOperatings as $vo) {
         VdrOperating::create([
            'history_id' => $vdrHistory->id,
            'heading_id' => $vo->heading->id,
            'time' => $vo->time,
            'speed' => $vo->speed,
            'contractual_fuel' => $vo->contractual_fuel,
            'daily' => $vo->daily,
         ]);
      }


      $vdrPeriodics = VdrPeriodic::where('vdr_id', $vdr->id)->get();
      foreach ($vdrPeriodics as $vp) {
         VdrPeriodic::create([
            'history_id' => $vdrHistory->id,
            'activity' => $vp->activity,
            'rob_time' => $vp->rob_time,
            'rob_value' => $vp->rob_value,
            'rob_actual' => $vp->rob_actual,
            'rob_diff' => $vp->rob_diff,

            'fuel_cons_remu' => $vp->fuel_cons_remu,
            'fuel_cons_correct' => $vp->corrected,
            'fuel_cons_actual' => $vp->fuel_cons_actual,
            'fuel_cons_total' => $vp->fuel_cons_total
         ]);
      }


      $vdrCrews = VdrCrew::where('vdr_id', $vdr->id)->get();
      foreach ($vdrCrews as $vc) {
         VdrCrew::create([
            'history_id' => $vdrHistory->id,
            'is_crew' => $vc->is_crew,
            'name' => $vc->name,
            'rank' => $vc->rank,
            'company' => $vc->company,
         ]);
      }


      $vdrEngines = VdrEngine::where('vdr_id', $vdr->id)->get();
      foreach ($vdrEngines as $ve) {
         VdrEngine::create([

            'history_id' => $vdrHistory->id,
            'heading_id' => $ve->heading_id,
            'm_ref' => $ve->m_ref,
            'm_port' => $ve->m_port,
            'm_stbd' => $ve->m_stbd,
            'm_center' => $ve->m_center,
            'm_other' => $ve->m_other,
            'a_ref' => $ve->a_ref,
            'a_port' => $ve->a_port,
            'a_stbd' => $ve->a_stbd,
            'a_other' => $ve->a_other
         ]);
      }



      $date = Carbon::create($vdr->date);
      $year = $date->format('y');
      $month = $date->format('m');
      $day = $date->format('d');

      $awalan = $vdr->contract . "/" . str_replace(' ', '', strtoupper($vdr->vessel->name)) . '/';
      $timestamp = $year  . $month  . $day;

      $vdrHistories = VdrHistory::where('vdr_id', $vdr->id)->get();

      if (count($vdrHistories) > 0) {
         $num = count($vdrHistories);
      } else {
         $num = 0;
      }

      // Menggabungkan awalan dan $idPadded
      $hasil = $awalan . $timestamp . '/' . $num;

      $vdr->update([
         'status' => 0,
         'code' => $hasil
      ]);


      // $vdrHistories = VdrHistory::where('vdr_id', $vdr->id)->get();


      // $vdr->update([
      //    'status' => 0,
      //    'code' => $vdr->code . '/' . 'R' . count($vdrHistories)
      // ]);

      ModelsLog::create([
         'system' => 'VDR',
         'user_id' => auth()->user()->id,
         'vessel_id' => $vdr->vessel_id,
         'action' => 'Create Revisi VDR',
         'vdr_id' => $vdr->id,
         'desc' => '',
         'table' => 'vdrs'
      ]);

      return redirect()->route('vdr.show.spa', [enkripRambo($vdr->id), enkripRambo('index')])->with('success', 'VDR duplicated');
   }

   public function show($id, $enkripTab)
   {
      $dekripId = dekripRambo($id);
      $vdr = Vdr::find($dekripId);
      // dd($vdr->id);
      $user = auth()->user();


      # code...
      $activities = VdrActivity::where('vdr_id', $vdr->id)->get();
      $cargos = VdrCargo::where('vdr_id', $vdr->id)->get();
      $weathers = VdrWeather::where('vdr_id', $vdr->id)->get();
      $hses = VdrHse::where('vdr_id', $vdr->id)->get();
      $engines = VdrEngine::where('vdr_id', $vdr->id)->get();
      $operatings = VdrOperating::where('vdr_id', $vdr->id)->get();
      $crews = VdrCrew::where('vdr_id', $vdr->id)->orderBy('is_crew', 'desc')->get();
      $periodic = VdrPeriodic::where('vdr_id', $vdr->id)->first();

      $totalJam = $vdr ? VdrOperating::where('vdr_id', $vdr->id)->sum('time') : null;
      $totalDaily = $vdr ? VdrOperating::where('vdr_id', $vdr->id)->sum('daily') : null;
      $totalDaily = $vdr->customRound($totalDaily);
      $vdrs = Vdr::get();

      $totalHours = '';
      $debugHours = 0;
      $debugMinutes = 0;
      $ops = VdrOperating::where('vdr_id', $vdr->id)->get();
      foreach ($ops as $op) {
         $time = $op->time;
         $array = explode('.', $op->time);
         $hours = floor($time);
         $minutes = intval($array[1]);

         $debugHours += $hours;
         $debugMinutes += $minutes;
      }
      // dd($debugHours);

      if ($debugMinutes >= 60) {
         $minLeft = $debugMinutes - 60;
         $debugMinutes = $minLeft;
         $debugHours += 1;
         if ($debugMinutes >= 60) {
            $minLeft = $debugMinutes - 60;
            $debugMinutes = $minLeft;
            $debugHours += 1;
         }
         if ($debugMinutes >= 60) {
            $minLeft = $debugMinutes - 60;
            $debugMinutes = $minLeft;
            $debugHours += 1;
         }
      }

      if ($debugMinutes < 10) {
         $finalMinutes = '0' . $debugMinutes;
      } else {
         $finalMinutes = $debugMinutes;
      }
      $finalHours  = sprintf('%02d', floor($debugHours));
      $final = $finalHours . ':' . $finalMinutes;

      if ($enkripTab != null) {
         $tab = dekripRambo($enkripTab);
      } else {
         $tab = 'index';
      }

      $lastVdr = Vdr::where('vessel_id', $vdr->vessel_id)->orderBy('date', 'asc')->first();
      $vdrOperatingHigh = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 1)->first()->time;
      $vdrOperatingNormal = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 2)->first()->time;
      $vdrOperatingSlow = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 3)->first()->time;
      $vdrOperatingManu = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 4)->first()->time;
      $vdrOperatingIdle = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 5)->first()->time;
      $vdrOperatingTow = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 6)->first()->time;
      $vdrOperatingAh = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 7)->first()->time;
      $vdrOperatingSb = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 8)->first()->time;
      // if (auth()->user()->hasRole('superuser')) {
      //   dd($lastVdr);
      // }
      // dd('ok');
      return view('pages-stisla.vdr.detail', [
         //   return view('pages.vdr.show-vdr', [
         'tab' => $tab,
         'lastVdr' => $lastVdr,
         'vessel' => $vdr->vessel,
         'user' => $user,
         'vdr' => $vdr,
         'activities' => $activities,
         'cargos' => $cargos,
         'periodic' => $periodic,
         'weathers' => $weathers,
         'hses' => $hses,
         'engines' => $engines,
         'crews' => $crews,
         'operatings' => $operatings,
         'totalJam' =>  $final,
         'totalDaily' => $totalDaily,
         'vdrs' => $vdrs,

         'vdrOperatingHigh' => $vdrOperatingHigh,
         'vdrOperatingNormal' => $vdrOperatingNormal,
         'vdrOperatingSlow' => $vdrOperatingSlow,
         'vdrOperatingManu' => $vdrOperatingManu,
         'vdrOperatingIdle' => $vdrOperatingIdle,
         'vdrOperatingTow' => $vdrOperatingTow,
         'vdrOperatingAh' => $vdrOperatingAh,
         'vdrOperatingSb' => $vdrOperatingSb,
      ])->with('i');

      // return view('pages.vdr.create-vdr', [
      //     'user' => $user,
      //     'vessel' => $vessel,
      //     'vdr' => $vdr,
      //     'activities' => $activities,
      //     'cargos' => $cargos,
      //     'weathers' => $weathers,
      //     'hses' => $hses,
      // ])->with('i');
   }

   public function showSpa($id, $enkripTab)
   {
      $dekripId = dekripRambo($id);
      $vdr = Vdr::find($dekripId);
      // dd($vdr->id);
      $user = auth()->user();


      # code...
      $activities = VdrActivity::where('vdr_id', $vdr->id)->get();
      $cargos = VdrCargo::where('vdr_id', $vdr->id)->get();
      $weathers = VdrWeather::where('vdr_id', $vdr->id)->get();
      $hses = VdrHse::where('vdr_id', $vdr->id)->get();
      $engines = VdrEngine::where('vdr_id', $vdr->id)->get();
      $operatings = VdrOperating::where('vdr_id', $vdr->id)->get();
      $crews = VdrCrew::where('vdr_id', $vdr->id)->orderBy('is_crew', 'desc')->get();
      $periodic = VdrPeriodic::where('vdr_id', $vdr->id)->first();

      $totalJam = $vdr ? VdrOperating::where('vdr_id', $vdr->id)->sum('time') : null;
      $totalDaily = $vdr ? VdrOperating::where('vdr_id', $vdr->id)->sum('daily') : null;
      $totalDaily = $vdr->customRound($totalDaily);
      $vdrs = Vdr::get();

      $totalHours = '';
      $debugHours = 0;
      $debugMinutes = 0;
      $ops = VdrOperating::where('vdr_id', $vdr->id)->get();
      foreach ($ops as $op) {
         $time = $op->time;
         $array = explode('.', $op->time);
         $hours = floor($time);
         $minutes = intval($array[1]);

         $debugHours += $hours;
         $debugMinutes += $minutes;
      }
      // dd($debugHours);

      if ($debugMinutes >= 60) {
         $minLeft = $debugMinutes - 60;
         $debugMinutes = $minLeft;
         $debugHours += 1;
         if ($debugMinutes >= 60) {
            $minLeft = $debugMinutes - 60;
            $debugMinutes = $minLeft;
            $debugHours += 1;
         }
         if ($debugMinutes >= 60) {
            $minLeft = $debugMinutes - 60;
            $debugMinutes = $minLeft;
            $debugHours += 1;
         }
      }

      if ($debugMinutes < 10) {
         $finalMinutes = '0' . $debugMinutes;
      } else {
         $finalMinutes = $debugMinutes;
      }
      $finalHours  = sprintf('%02d', floor($debugHours));
      $final = $finalHours . ':' . $finalMinutes;

      if ($enkripTab != null) {
         $tab = dekripRambo($enkripTab);
      } else {
         $tab = 'index';
      }

      $lastVdr = Vdr::where('vessel_id', $vdr->vessel_id)->orderBy('date', 'asc')->first();
      $vdrOperatingHigh = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 1)->first()->time;
      $vdrOperatingNormal = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 2)->first()->time;
      $vdrOperatingSlow = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 3)->first()->time;
      $vdrOperatingManu = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 4)->first()->time;
      $vdrOperatingIdle = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 5)->first()->time;
      $vdrOperatingTow = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 6)->first()->time;
      $vdrOperatingAh = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 7)->first()->time;
      $vdrOperatingSb = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 8)->first()->time;
      // if (auth()->user()->hasRole('superuser')) {
      //   dd($lastVdr);
      // }
      // dd('ok');
      $editable = 0;

      if (auth()->user()->hasRole('vessel')) {
         if ($vdr->status == 0) {
            $editable = 1;
         }
      }


      $vdrHistories = VdrHistory::where('vdr_id', $vdr->id)->get();

      return view('pages-stisla.vdr.detail-new', [
         //   return view('pages.vdr.show-vdr', [
         'editable' => $editable,
         'tab' => $tab,
         'lastVdr' => $lastVdr,
         'vessel' => $vdr->vessel,
         'user' => $user,
         'vdr' => $vdr,
         'activities' => $activities,
         'cargos' => $cargos,
         'periodic' => $periodic,
         'weathers' => $weathers,
         'hses' => $hses,
         'engines' => $engines,
         'crews' => $crews,
         'operatings' => $operatings,
         'totalJam' =>  $final,
         'totalDaily' => $totalDaily,
         'vdrs' => $vdrs,

         'vdrOperatingHigh' => $vdrOperatingHigh,
         'vdrOperatingNormal' => $vdrOperatingNormal,
         'vdrOperatingSlow' => $vdrOperatingSlow,
         'vdrOperatingManu' => $vdrOperatingManu,
         'vdrOperatingIdle' => $vdrOperatingIdle,
         'vdrOperatingTow' => $vdrOperatingTow,
         'vdrOperatingAh' => $vdrOperatingAh,
         'vdrOperatingSb' => $vdrOperatingSb,

         'vdrHistories' => $vdrHistories
      ])->with('i');

      // return view('pages.vdr.create-vdr', [
      //     'user' => $user,
      //     'vessel' => $vessel,
      //     'vdr' => $vdr,
      //     'activities' => $activities,
      //     'cargos' => $cargos,
      //     'weathers' => $weathers,
      //     'hses' => $hses,
      // ])->with('i');
   }

   public function store(Request $req)
   {
      $req->validate([
         'vessel_id' => 'required',
         'created_by' => 'required',
         'date' => 'required',
         'onduty' => 'required|numeric',
         'max' => 'required|numeric',
         'location_midnight' => 'required'
      ]);




      // dd($req);
      $cek = Vdr::where('vessel_id', $req->vessel_id)->where('date', $req->date)->first();

      if ($cek) {
         # code...
         return redirect()->back()->with('warning', 'VDR gagal Disimpan, karena sudah ada pada hari ini!');
      }

      $vessel = Vessel::find($req->vessel_id);

      $lastVdr = Vdr::where('vessel_id', $req->vessel_id)->orderBy('date', 'desc')->first();
      if ($lastVdr) {
         $lastVdrWeathers =  VdrWeather::where('vdr_id', $lastVdr->id)->get();
         $lastVdrHses = VdrHse::where('vdr_id', $lastVdr->id)->get();
         // dd($lastVdr->id);
         $lastVdrOperatings = VdrOperating::where('vdr_id', $lastVdr->id)->get();
         $lastVdrCrews = VdrCrew::where('vdr_id', $lastVdr->id)->get();
      }

      $vessel = Vessel::find($req->vessel_id);


      // dd($lastVdr->date);

      DB::beginTransaction();

      try {

         if ($lastVdr) {
            $vdr = Vdr::create([

               'vessel_id' => $req->vessel_id,
               'date' => $req->date,
               'crew_onduty' => $req->onduty,
               'crew_max' => $req->max,
               'location_midnight' => $req->location_midnight,
               'created_by' => $req->created_by,
               'contract' => $lastVdr->contract,
               'contract_start' => $lastVdr->contract_start,
               'contract_end' => $lastVdr->contract_end,
               'owner' => $lastVdr->owner,
               'master' => $lastVdr->master,
               'ce' => $lastVdr->ce,
               'status' => 0
            ]);
         } else {
            $vdr = Vdr::create([

               'vessel_id' => $req->vessel_id,
               'date' => $req->date,
               'crew_onduty' => $req->onduty,
               'crew_max' => $req->max,
               'location_midnight' => $req->location_midnight,
               'created_by' => $req->created_by,

               'status' => 0
            ]);
         }

         $vesselVdrs = Vdr::where('vessel_id', $vessel->id)->get();

         $vesselVdrs = Vdr::where('vessel_id', $vessel->id)->get();

         // dd($lastVdr->date);



         $today = Carbon::now();
         // dd($today->format('m'));

         $year = $today->format('Y');
         $month = $today->format('m');
         $day = $today->format('d');

         $date = Carbon::create($req->date);
         $year = $date->format('Y');
         $month = $date->format('m');
         $day = $date->format('d');

         // $awalan = "VDR/PHEOSES/" . str_replace(' ', '', strtoupper($vessel->name)) . '/';

         // // Mengonversi $id ke dalam format tiga digit dengan leading zeros
         // $idPadded = sprintf("%02d", count($vesselVdrs) + 1);
         // $timestamp = $year . '/' . $month . '/' . $day;

         // // Menggabungkan awalan dan $idPadded
         // $hasil = $awalan . $timestamp;
         // $vdr->update([
         //    'code' => $hasil
         // ]);

         if ($lastVdr) {
            $contract = $lastVdr->contract;
         } else {
            $contract = '';
         }

         $awalan = $contract . "/" . str_replace(' ', '', strtoupper($vessel->name)) . '/';

         $timestamp = $year  . $month  . $day;

         $vdrHistories = VdrHistory::where('vdr_id', $vdr->id)->get();

         if (count($vdrHistories) > 0) {
            $num = count($vdrHistories);
         } else {
            $num = 0;
         }

         // Menggabungkan awalan dan $idPadded
         $hasil = $awalan . $timestamp . '/' . $num;

         $vdr->update([
            'code' => $hasil
         ]);



         $periodic = VdrPeriodic::create([
            'vdr_id' => $vdr->id,
            'activity' => 'Not Applicable'
         ]);

         $cargoHeadings = VdrCargoHeading::get();
         foreach ($cargoHeadings as $key => $heading) {
            # code...

            $vdrCargo = VdrCargo::where('vdr_id', $vdr->id)
               ->where('heading_id', $heading->id)
               ->first();

            if (!$vdrCargo) {
               # code...
               $createVdrCargo = VdrCargo::create([
                  'vdr_id' => $vdr->id,
                  'heading_id' => $heading->id,
                  'created_by' => $vdr->created_by,
                  'created_at' => NOW(),
                  'updated_at' => NOW()
               ]);
            }
         }

         $wHeadings = VdrWeatherHeading::get();
         foreach ($wHeadings as $key => $heading) {
            # code...
            $vdrWeather = VdrWeather::where('vdr_id', $vdr->id)
               ->where('heading_id', $heading->id)
               ->first();

            if (!$vdrWeather) {
               # code...
               $createVdrWeather = VdrWeather::create([
                  'vdr_id' => $vdr->id,
                  'heading_id' => $heading->id,
                  'created_at' => NOW(),
                  'updated_at' => NOW()
               ]);
            }
         }
         $vdrWeathers = VdrWeather::where('vdr_id', $vdr->id)->get();
         if ($lastVdr) {
            if (count($lastVdrWeathers) > 0) {
               foreach ($vdrWeathers as $vdrWeather) {
                  foreach ($lastVdrWeathers as $lastWeather) {
                     if ($lastWeather->heading_id == $vdrWeather->heading_id) {
                        $vdrWeather->update([
                           't_0006' => $lastWeather->t_0006,
                           't_0612' => $lastWeather->t_0612,
                           't_1218' => $lastWeather->t_1218,
                           't_1824' => $lastWeather->t_1824,
                        ]);
                     }
                  }
               }
            }
         }





         // HSE
         $hseHeadings = VdrHseHeader::get();
         foreach ($hseHeadings as $key => $heading) {
            # code...
            $vdrHse = VdrHse::where('vdr_id', $vdr->id)
               ->where('header_id', $heading->id)
               ->first();

            if (!$vdrHse) {
               $createVdrHse = VdrHse::create([
                  'vdr_id' => $vdr->id,
                  'header_id' => $heading->id,
                  'created_at' => NOW(),
                  'updated_at' => NOW()
               ]);
            }
         }
         $vdrHses = VdrHse::where('vdr_id', $vdr->id)->get();
         // Generate value hse from last VDR
         if ($lastVdr) {
            if (count($lastVdrHses) > 0) {
               // dd('oke');
               foreach ($vdrHses as $vdrHse) {
                  // dd($vdrHse->id);
                  foreach ($lastVdrHses as $lastHse) {
                     if ($lastHse->header_id == $vdrHse->header_id) {
                        // dd( $lastHse->heading_id);
                        $vdrHse->update([
                           'previous' => $lastHse->previous,
                           'today' => $lastHse->today,
                        ]);
                     }
                  }
               }
            }
         }






         $engineHeadings = VdrEngineHeading::get();
         foreach ($engineHeadings as $key => $heading) {
            # code...
            $vdrEngine = VdrEngine::where('vdr_id', $vdr->id)
               ->where('heading_id', $heading->id)
               ->first();

            if (!$vdrEngine) {
               # code...
               $createVdrEngine = VdrEngine::create([
                  'vdr_id' => $vdr->id,
                  'heading_id' => $heading->id,
                  'created_at' => NOW(),
                  'updated_at' => NOW()
               ]);
            }
         }

         $operatingHeadings = VdrOperatingHeader::get();
         foreach ($operatingHeadings as $key => $heading) {
            # code...
            $vdrOperating = VdrOperating::where('vdr_id', $vdr->id)
               ->where('heading_id', $heading->id)
               ->first();

            if (!$vdrOperating) {
               # code...
               $createVdrOperating = VdrOperating::create([
                  'vdr_id' => $vdr->id,
                  'heading_id' => $heading->id,
                  'created_at' => NOW(),
                  'updated_at' => NOW()
               ]);
            }
         }
         $vdrOperatings = VdrOperating::where('vdr_id', $vdr->id)->get();
         if ($lastVdr) {
            if (count($lastVdrOperatings) > 0) {
               foreach ($vdrOperatings as $vdrOperating) {
                  foreach ($lastVdrOperatings as $lastOperating) {
                     if ($lastOperating->heading_id == $vdrOperating->heading_id) {
                        $vdrOperating->update([
                           'speed' => $lastOperating->speed,
                           'contractual_fuel' => $lastOperating->contractual_fuel,
                           // 'daily' => $lastOperating->daily,
                        ]);
                     }
                  }
               }
            }
         }




         if ($lastVdr) {
            foreach ($lastVdrCrews as $lastCrew) {
               if ($lastCrew->is_crew == 1) {
                  $createVdrCrew = VdrCrew::create([
                     'vdr_id' => $vdr->id,
                     'is_crew' => $lastCrew->is_crew,
                     'name' => $lastCrew->name,
                     'rank' => $lastCrew->rank,
                     'company' => $lastCrew->company,
                     'created_at' => NOW(),
                     'updated_at' => NOW()
                  ]);
               }
            }
         }






         // Jika semuanya berhasil, kita commit transaksi
         DB::commit();

         // $vessel = Vessel::where('email', auth()->user()->email)->first();
         ModelsLog::create([
            'system' => 'VDR',
            'user_id' => auth()->user()->id,
            'vessel_id' => $vdr->vessel_id,
            'action' => 'Create VDR Form Lama',
            'vdr_id' => $vdr->id,
            'desc' => '',
            'table' => 'vdrs'
         ]);

         return redirect()->route('vdr.show', [enkripRambo($vdr->id), enkripRambo('index')])->with('success', 'VDR data successfully saved.');
      } catch (\Exception $e) {
         // Jika terjadi kesalahan, kita rollback transaksi
         DB::rollback();
         Log::error('Kesalahan saat menjalankan transaksi: ' . $e->getMessage());
         return back()->with('warning', 'Terjadi kesalahan: ' . $e->getMessage());

         return back()->with('warning', 'Failed, Data gagal di Update!');
         // Handle atau laporkan kesalahan
         // return response()->json(['message' => 'Failed to create order'], 500);
      }
   }


   public function delete(Request $req)
   {
      $vdr = Vdr::find($req->id);
      $vdrWeathers =  VdrWeather::where('vdr_id', $vdr->id)->get();
      $vdrHses = VdrHse::where('vdr_id', $vdr->id)->get();
      $vdrOperatings = VdrOperating::where('vdr_id', $vdr->id)->get();
      $vdrCrews = VdrCrew::where('vdr_id', $vdr->id)->get();
      $vdrEngines = VdrEngine::where('vdr_id', $vdr->id)->get();
      $vdrCargos = VdrCargo::where('vdr_id', $vdr->id)->get();
      $vdrActivities = VdrActivity::where('vdr_id', $vdr->id)->get();

      foreach ($vdrWeathers as $vdrW) {
         $vdrW->delete();
      }
      foreach ($vdrHses as $vdrH) {
         $vdrH->delete();
      }
      foreach ($vdrOperatings as $vdrO) {
         $vdrO->delete();
      }
      foreach ($vdrCrews as $vdrC) {
         $vdrC->delete();
      }
      foreach ($vdrEngines as $vdrE) {
         $vdrE->delete();
      }
      foreach ($vdrCargos as $vdrCargo) {
         $vdrCargo->delete();
      }
      foreach ($vdrActivities as $vdrAct) {
         $vdrAct->delete();
      }

      $vdr->delete();

      return redirect()->to('/')->with('success', 'VDR deleted');
   }

   public function edit($id)
   {
      $user = auth()->user();
      // Opsi 1 
      $vessel = Vessel::where('email', $user->email)->first();

      $dekripId = dekripRambo($id);
      $vdr = Vdr::find($dekripId);
      $activities = VdrActivity::where('vdr_id', $vdr->id)->get();
      $cargos = VdrCargo::where('vdr_id', $vdr->id)->get();
      $weathers = VdrWeather::where('vdr_id', $vdr->id)->get();
      $hses = VdrHse::where('vdr_id', $vdr->id)->get();

      return view('pages-stisla.vessel.vdr.edit', [
         'user' => $user,
         'vessel' => $vessel,
         'vdr' => $vdr,
         'activities' => $activities,
         'cargos' => $cargos,
         'weathers' => $weathers,
         'hses' => $hses,
      ]);
   }

   public function update(Request $req)
   {
      $req->validate([
         'id' => 'required',
         'onduty' => 'required|numeric',
         'max' => 'required|numeric',
         'location_midnight' => 'required'
      ]);

      $vdr = Vdr::find($req->id);

      DB::beginTransaction();

      try {

         $updateVdr = $vdr->update([
            'date' => $req->date,
            'crew_onduty' => $req->onduty,
            'crew_max' => $req->max,
            'location_midnight' => $req->location_midnight,
            'contract' => $req->contract,
            'contract_start' => $req->contract_start,
            'contract_end' => $req->contract_end,
            'owner' => $req->owner,
            'master' => $req->master,
            'ce' => $req->ce

         ]);


         // Jika semuanya berhasil, kita commit transaksi
         DB::commit();

         return back()->with('success', 'VDR data successfully updated.');
      } catch (\Exception $e) {
         // Jika terjadi kesalahan, kita rollback transaksi
         DB::rollback();
         Log::error('Kesalahan saat menjalankan transaksi: ' . $e->getMessage());
         return back()->with('warning', 'Terjadi kesalahan: ' . $e->getMessage());

         return back()->with('warning', 'Failed, Data gagal di Update!');
         // Handle atau laporkan kesalahan
         // return response()->json(['message' => 'Failed to create order'], 500);
      }
   }


   public function updateGeneral($vdr, $date, $loc, $onduty, $pax, $contract, $contract_start, $contract_end, $owner, $master, $ce)
   {




      $vdr = Vdr::find($vdr);

      $vesselVdrs = Vdr::where('vessel_id', $vdr->vessel->id)->get();

      $sameVdr = Vdr::where('vessel_id', $vdr->vessel->id)->where('date', $date)->first();
      if ($sameVdr) {
         $msg = 'VDR di Tanggal tersebut sudah ada';
      } else {
         $msg = '';
      }

      $date = Carbon::create($date);
      $year = $date->format('y');
      $year = $date->format('y');
      $month = $date->format('m');
      $day = $date->format('d');

      $awalan = $contract . "/" . str_replace(' ', '', strtoupper($vdr->vessel->name)) . '/';

      $vdrHistories = VdrHistory::where('vdr_id', $vdr->id)->get();
      $timestamp = $year  . $month  . $day;

      if (count($vdrHistories) > 0) {
         $num = count($vdrHistories);
      } else {
         $num = 0;
      }

      // Menggabungkan awalan dan $idPadded
      $hasil = $awalan . $timestamp . '/' . $num;

      $vdr->update([
         'code' => $hasil
      ]);

      // if ($sameVdr == null) {
      $vdr->update([
         'date' => $date,
         'code' => $hasil,
         'location_midnight' => $loc,
         'crew_onduty' => $onduty,
         'crew_max' => $pax,
         'contract' => $contract,
         'contract_start' => $contract_start,
         'contract_end' => $contract_end,
         'owner' => $owner,
         'master' => $master,
         'ce' => $ce,

      ]);
      // } 


      return response()->json([
         'success' => true,
         'result' => $vdr->code,
         'code' => $vdr->code,
         'error' =>  $msg

      ]);
   }

   public function updateWeatherAjax($vdr, $weather, $t6, $t12, $t18, $t24)
   {

      $vdr = Vdr::find($vdr);
      $weather = VdrWeather::find($weather);
      $weather->update([
         't_0006' => $t6,
         't_0612' => $t12,
         't_1218' => $t18,
         't_1824' => $t24,

      ]);

      return response()->json([
         'success' => true,
         'result' => $t6

      ]);
   }

   public function updateHsseAjax($vdr, $hsse, $prev, $today)
   {

      $vdr = Vdr::find($vdr);
      $hse = VdrHse::find($hsse);
      $hse->update([
         'previous' => $prev,
         'today' => $today,
      ]);

      return response()->json([
         'success' => true,
         'result' => $today,
         'month' => $prev + $today

      ]);
   }

   public function updateBu($vdr, $bu)
   {

      $vdr = Vdr::find($vdr);
      $vdr->update([
         'area' => $bu,
      ]);

      return response()->json([
         'success' => true,
         'result' => $bu,

      ]);
   }

   public function updateOperatingAjax($vdr, $op, $minspeed, $contractfuel, $daily)
   {

      $vdr = Vdr::find($vdr);
      $vdrOperating = VdrOperating::find($op);
      $vdrOperating->update([
         'speed' => $minspeed,
         'contractual_fuel' => $contractfuel,
         'daily' => $daily
      ]);

      $vdrOperatings = VdrOperating::where('vdr_id', $vdr->id)->get();

      $opCurrent = VdrOperating::find($op);

      return response()->json([
         'success' => true,
         'result' => $minspeed,
         'daily' => $opCurrent->daily,
         'totalDaily' => round($vdrOperatings->sum('daily'))

      ]);
   }

   public function updateOperatingBAjax($vdr, $op,  $contractfuel, $daily)
   {

      $vdr = Vdr::find($vdr);
      $vdrOperating = VdrOperating::find($op);
      $vdrOperating->update([

         'contractual_fuel' => $contractfuel,
         'daily' => $daily
      ]);

      $vdrOperatings = VdrOperating::where('vdr_id', $vdr->id)->get();

      $opCurrent = VdrOperating::find($op);

      return response()->json([
         'success' => true,
         'result' => $contractfuel,
         'daily' => $opCurrent->daily,
         'totalDaily' => round($vdrOperatings->sum('daily'))

      ]);
   }

   public function updateCargoAjax($vdr, $cargo, $opening, $consumption, $received, $transferred, $closing, $remark)
   {

      $vdr = Vdr::find($vdr);
      $vdrCargo = VdrCargo::find($cargo);
      $vdrCargo->update([
         'opening' => $opening,
         'consumption' => $consumption,
         'received' => $received,
         'transferred' => $transferred,
         'closing' => $closing,
         'remarks' => $remark
      ]);

      if ($vdrCargo->heading_id == 2 || $vdrCargo->heading_id == 1) {
         $actual = ($vdrCargo->opening + $vdrCargo->received) - ($vdrCargo->transferred + $vdrCargo->closing);
         $vdrCargo->update([
            'consumption' => $actual
         ]);
      }



      return response()->json([
         'success' => true,
         'result' => $opening,
         'consumption' => $vdrCargo->consumption,
      ]);
   }

   public function updatePeriodicAjax($vdr, $periodic, $activity, $time, $value, $actual, $diff)
   {

      $vdr = Vdr::find($vdr);
      $vdrPeriodic = VdrPeriodic::find($periodic);
      $vdrPeriodic->update([
         'activity' => $activity,
         'rob_time' => $time,
         'rob_value' => $value,
         'rob_actual' => $actual,
         'rob_diff' => $diff
      ]);





      return response()->json([
         'success' => true,
         'result' => $time,
         'diff' => $diff,
      ]);
   }

   public function updateSpecialAjax($vdr, $periodic, $remu, $correct, $actual, $total)
   {

      $vdr = Vdr::find($vdr);
      $vdrPeriodic = VdrPeriodic::find($periodic);
      $vdrPeriodic->update([
         'fuel_cons_remu' => $remu,
         'fuel_cons_correct' => $correct,
         'fuel_cons_actual' => $actual,
         'fuel_cons_total' => $total
      ]);





      return response()->json([
         'success' => true,
         'result' => $correct,

         'specialTotal' => $total,
      ]);
   }



   public function updateActivityAjax($vdr, $act, $high, $normal, $slow, $manu, $idle, $tow, $ah, $sb)
   {

      $vdr = Vdr::find($vdr);
      $vdrActivity = VdrActivity::find($act);




      $vdrActivity->update([
         'activity' => $activity,
         'start' => $start,
         'finish' => $finish,
         'high' => $high,
         'normal' => $normal,
         'slow' => $slow,
         'manu' => $manu,
         'idle' => $idle,
         'tow' => $tow,
         'ah' => $ah,
         'sb' => $sb
      ]);

      $thigh = 0;
      $tnormal = 0;
      $tslow = 0;
      $tmanu = 0;
      $tidle = 0;
      $ttow = 0;
      $tah = 0;
      $tsb = 0;

      $activities = VdrActivity::where('vdr_id', $vdr)->get();

      foreach ($activities as $key => $activity) {

         $thigh = $this->hitungTime($thigh, $activity->high);

         $tnormal = $this->hitungTime($tnormal, $activity->normal);

         $tslow = $this->hitungTime($tslow, $activity->slow);

         $tmanu = $this->hitungTime($tmanu, $activity->manu);

         $tidle = $this->hitungTime($tidle, $activity->idle);

         $ttow = $this->hitungTime($ttow, $activity->tow);

         $tah = $this->hitungTime($tah, $activity->ah);

         $tsb = $this->hitungTime($tsb, $activity->sb);
      }

      $totalMode = array(
         'high'   => $thigh,
         'normal' => $tnormal,
         'slow'   => $tslow,
         'manu'   => $tmanu,
         'idle'   => $tidle,
         'tow'    => $ttow,
         'ah'     => $tah,
         'sb'     => $tsb
      );



      $operatings = VdrOperating::where('vdr_id', $vdr->id)->get();


      // $operatings = VdrOperating::where('vdr_id', $req->vdr_id)->get();
      // $vdr = Vdr::find($vdr);

      foreach ($operatings as $operating) {
         $activities = VdrActivity::where('vdr_id', $vdr)->get();

         $totalHigh = $operating->getSumHigh();
         $totalNormal = $operating->getSumNormal();
         $totalSlow = $operating->getSumSlow();
         $totalManu = $operating->getSumManu();
         $totalIdle = $operating->getSumIdle();
         $totalTow = $operating->getSumTow();
         $totalAh = $operating->getSumAh();
         $totalSb = $operating->getSumSb();

         if ($operating->heading_id == 1) {
            $operating->update([
               'time' => floatval($totalHigh)
            ]);
         } elseif ($operating->heading_id == 2) {
            $operating->update([
               'time' => floatval($totalNormal)
            ]);
         } elseif ($operating->heading_id == 3) {
            $operating->update([
               'time' => floatval($totalSlow)
            ]);
         } elseif ($operating->heading_id == 4) {
            $operating->update([
               'time' => floatval($totalManu)
            ]);
         } elseif ($operating->heading_id == 5) {
            $operating->update([
               'time' => floatval($totalIdle)
            ]);
         } elseif ($operating->heading_id == 6) {
            $operating->update([
               'time' => floatval($totalTow)
            ]);
         } elseif ($operating->heading_id == 7) {
            $operating->update([
               'time' => floatval($totalAh)
            ]);
         } elseif ($operating->heading_id == 8) {
            $operating->update([
               'time' => floatval($totalSb)
            ]);
         }
      }


      // Hitung Operating Data
      $operatings = VdrOperating::where('vdr_id', $vdr->id)->get();

      foreach ($operatings as $key => $operating) {

         $bulat = floor($operating->time);

         $desimal = $operating->time - $bulat;

         $a = $bulat * $operating->contractual_fuel;

         $b = (($desimal * 100) / 60) * $operating->contractual_fuel;

         $daily = $a + $b;
         // dd($daily);

         $operatingUpdate = $operating->update([
            'daily' => $daily
         ]);
      }

      $vdrOperatingHigh = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 1)->first();
      $vdrOperatingNormal = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 2)->first();
      $vdrOperatingSlow = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 3)->first();
      $vdrOperatingManu = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 4)->first();
      $vdrOperatingIdle = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 5)->first();
      $vdrOperatingTow = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 6)->first();
      $vdrOperatingAh = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 7)->first();
      $vdrOperatingSb = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 8)->first();

      return response()->json([
         'success' => true,
         'result' => $vdr->id,

         'vdrOperatingHigh' => $vdrOperatingHigh,
         'vdrOperatingNormal' => $vdrOperatingNormal,
         'vdrOperatingSlow' => $vdrOperatingSlow,
         'vdrOperatingIdle' => $vdrOperatingIdle,
         'vdrOperatingManu' => $vdrOperatingManu,
         'vdrOperatingAh' => $vdrOperatingAh,
         'vdrOperatingTow' => $vdrOperatingTow,
         'vdrOperatingSb' => $vdrOperatingSb,

         'highTime' => $vdrOperatingHigh->time,
         'normalTime' => $vdrOperatingNormal->time,
         'slowTime' => $vdrOperatingSlow->time,
         'manuTime' => $vdrOperatingManu->time,
         'idleTime' => $vdrOperatingIdle->time,
         'towTime' => $vdrOperatingTow->time,
         'ahTime' => $vdrOperatingAh->time,
         'sbTime' => $vdrOperatingSb->time


      ]);





      // return redirect()->route('vdr.show', [enkripRambo($vdr), enkripRambo('activity')])->with('success', 'Activity data successfully updated.');

   }

   public function updateActivityTimeAjax($vdr, $act, $start, $finish)
   {

      $vdr = Vdr::find($vdr);
      $vdrActivity = VdrActivity::find($act);




      $vdrActivity->update([

         'start' => $start,
         'finish' => $finish,

      ]);


      return response()->json([
         'success' => true,
         'result' => $vdr->id,
      ]);





      // return redirect()->route('vdr.show', [enkripRambo($vdr), enkripRambo('activity')])->with('success', 'Activity data successfully updated.');

   }

   public function updateActivityHighAjax($vdr, $act, $high)
   {

      $vdr = Vdr::find($vdr);
      $vdrActivity = VdrActivity::find($act);

      $vdrActivity->update([
         'high' => $high,
      ]);

      $thigh = 0;
      $activities = VdrActivity::where('vdr_id', $vdr)->get();

      foreach ($activities as $key => $activity) {
         $thigh = $this->hitungTime($thigh, $activity->high);
      }

      $totalMode = array(
         'high'   => $thigh,
      );

      $operating = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 1)->first();
      $totalHigh = $operating->getSumHigh();
      $operating->update([
         'time' => floatval($totalHigh)
      ]);


      // Hitung Operating Data
      $operating = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 1)->first();
      $bulat = floor($operating->time);
      $desimal = $operating->time - $bulat;
      $a = $bulat * $operating->contractual_fuel;
      $b = (($desimal * 100) / 60) * $operating->contractual_fuel;
      $daily = $a + $b;
      // dd($daily);

      $operating->update([
         'daily' => $daily
      ]);

      $vdrOperatingHigh = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 1)->first();


      // TOTAL JAM
      $debugHours = 0;
      $debugMinutes = 0;
      $ops = VdrOperating::where('vdr_id', $vdr->id)->get();
      foreach ($ops as $op) {
         $time = $op->time;
         $array = explode('.', $op->time);
         $hours = floor($time);
         $minutes = intval($array[1]);

         $debugHours += $hours;
         $debugMinutes += $minutes;
      }
      // dd($debugHours);

      if ($debugMinutes >= 60) {
         $minLeft = $debugMinutes - 60;
         $debugMinutes = $minLeft;
         $debugHours += 1;
         if ($debugMinutes >= 60) {
            $minLeft = $debugMinutes - 60;
            $debugMinutes = $minLeft;
            $debugHours += 1;
         }
         if ($debugMinutes >= 60) {
            $minLeft = $debugMinutes - 60;
            $debugMinutes = $minLeft;
            $debugHours += 1;
         }
      }

      if ($debugMinutes < 10) {
         $finalMinutes = '0' . $debugMinutes;
      } else {
         $finalMinutes = $debugMinutes;
      }
      $finalHours  = sprintf('%02d', floor($debugHours));
      $final = $finalHours . ':' . $finalMinutes;



      // TOTAL DAILY
      $totalDaily = $vdr ? VdrOperating::where('vdr_id', $vdr->id)->sum('daily') : null;
      $totalDaily = $vdr->customRound($totalDaily);



      return response()->json([
         'success' => true,
         'result' => $vdr->id,
         'totalJam' => $final,
         'totalDaily' => $totalDaily,
         'vdrOperatingHigh' => $vdrOperatingHigh,
      ]);





      // return redirect()->route('vdr.show', [enkripRambo($vdr), enkripRambo('activity')])->with('success', 'Activity data successfully updated.');

   }

   public function updateActivityNormalAjax($vdr, $act,  $normal)
   {

      $vdr = Vdr::find($vdr);
      $vdrActivity = VdrActivity::find($act);

      $vdrActivity->update([
         'normal' => $normal,
      ]);

      $tnormal = 0;
      $activities = VdrActivity::where('vdr_id', $vdr)->get();

      foreach ($activities as $key => $activity) {
         $tnormal = $this->hitungTime($tnormal, $activity->normal);
      }

      $totalMode = array(
         'normal' => $tnormal,
      );

      $operating = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 2)->first();
      $totalNormal = $operating->getSumNormal();
      $operating->update([
         'time' => floatval($totalNormal)
      ]);


      // Hitung Operating Data
      $operatings = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 2)->get();
      $bulat = floor($operating->time);

      $desimal = $operating->time - $bulat;
      $a = $bulat * $operating->contractual_fuel;
      $b = (($desimal * 100) / 60) * $operating->contractual_fuel;
      $daily = $a + $b;
      // dd($daily);

      $operating->update([
         'daily' => $daily
      ]);

      $vdrOperatingNormal = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 2)->first();

      // TOTAL JAM
      $debugHours = 0;
      $debugMinutes = 0;
      $ops = VdrOperating::where('vdr_id', $vdr->id)->get();
      foreach ($ops as $op) {
         $time = $op->time;
         $array = explode('.', $op->time);
         $hours = floor($time);
         $minutes = intval($array[1]);

         $debugHours += $hours;
         $debugMinutes += $minutes;
      }
      // dd($debugHours);

      if ($debugMinutes >= 60) {
         $minLeft = $debugMinutes - 60;
         $debugMinutes = $minLeft;
         $debugHours += 1;
         if ($debugMinutes >= 60) {
            $minLeft = $debugMinutes - 60;
            $debugMinutes = $minLeft;
            $debugHours += 1;
         }
         if ($debugMinutes >= 60) {
            $minLeft = $debugMinutes - 60;
            $debugMinutes = $minLeft;
            $debugHours += 1;
         }
      }

      if ($debugMinutes < 10) {
         $finalMinutes = '0' . $debugMinutes;
      } else {
         $finalMinutes = $debugMinutes;
      }
      $finalHours  = sprintf('%02d', floor($debugHours));
      $final = $finalHours . ':' . $finalMinutes;


      // TOTAL DAILY
      $totalDaily = $vdr ? VdrOperating::where('vdr_id', $vdr->id)->sum('daily') : null;
      $totalDaily = $vdr->customRound($totalDaily);

      return response()->json([
         'success' => true,
         'result' => $vdr->id,
         'totalJam' => $final,
         'totalDaily' => $totalDaily,

         'vdrOperatingNormal' => $vdrOperatingNormal,
         'normalTime' => $vdrOperatingNormal->time,
      ]);

      // return redirect()->route('vdr.show', [enkripRambo($vdr), enkripRambo('activity')])->with('success', 'Activity data successfully updated.');

   }

   public function updateActivitySlowAjax($vdr, $act,  $slow)
   {

      $vdr = Vdr::find($vdr);
      $vdrActivity = VdrActivity::find($act);


      $vdrActivity->update([
         'slow' => $slow,
      ]);


      $tslow = 0;


      $activities = VdrActivity::where('vdr_id', $vdr)->get();

      foreach ($activities as $key => $activity) {
         $tslow = $this->hitungTime($tslow, $activity->slow);
      }

      $totalMode = array(
         'slow'   => $tslow,
      );



      $operating = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 3)->first();
      $totalSlow = $operating->getSumSlow();
      $operating->update([
         'time' => floatval($totalSlow)
      ]);

      $bulat = floor($operating->time);
      $desimal = $operating->time - $bulat;
      $a = $bulat * $operating->contractual_fuel;
      $b = (($desimal * 100) / 60) * $operating->contractual_fuel;
      $daily = $a + $b;
      // dd($daily);

      $operating->update([
         'daily' => $daily
      ]);


      $vdrOperatingSlow = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 3)->first();

      $debugHours = 0;
      $debugMinutes = 0;
      $ops = VdrOperating::where('vdr_id', $vdr->id)->get();
      foreach ($ops as $op) {
         $time = $op->time;
         $array = explode('.', $op->time);
         $hours = floor($time);
         $minutes = intval($array[1]);

         $debugHours += $hours;
         $debugMinutes += $minutes;
      }
      // dd($debugHours);

      if ($debugMinutes >= 60) {
         $minLeft = $debugMinutes - 60;
         $debugMinutes = $minLeft;
         $debugHours += 1;
         if ($debugMinutes >= 60) {
            $minLeft = $debugMinutes - 60;
            $debugMinutes = $minLeft;
            $debugHours += 1;
         }
         if ($debugMinutes >= 60) {
            $minLeft = $debugMinutes - 60;
            $debugMinutes = $minLeft;
            $debugHours += 1;
         }
      }

      if ($debugMinutes < 10) {
         $finalMinutes = '0' . $debugMinutes;
      } else {
         $finalMinutes = $debugMinutes;
      }
      $finalHours  = sprintf('%02d', floor($debugHours));
      $final = $finalHours . ':' . $finalMinutes;

      $totalDaily = $vdr ? VdrOperating::where('vdr_id', $vdr->id)->sum('daily') : null;
      $totalDaily = $vdr->customRound($totalDaily);

      return response()->json([
         'success' => true,
         'result' => $vdr->id,
         'totalJam' => $final,
         'totalDaily' => $totalDaily,
         'vdrOperatingSlow' => $vdrOperatingSlow,
         'slowTime' => $vdrOperatingSlow->time,
      ]);
   }

   public function updateActivityManuAjax($vdr, $act, $manu)
   {

      $vdr = Vdr::find($vdr);
      $vdrActivity = VdrActivity::find($act);

      $vdrActivity->update([
         'manu' => $manu,
      ]);

      $tmanu = 0;
      $activities = VdrActivity::where('vdr_id', $vdr)->get();

      foreach ($activities as $key => $activity) {
         $tmanu = $this->hitungTime($tmanu, $activity->manu);
      }

      $totalMode = array(
         'manu'   => $tmanu,
      );

      $operating = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 4)->first();
      $totalManu = $operating->getSumManu();
      $operating->update([
         'time' => floatval($totalManu)
      ]);


      // Hitung Operating Data
      $operating = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 4)->first();
      $bulat = floor($operating->time);
      $desimal = $operating->time - $bulat;
      $a = $bulat * $operating->contractual_fuel;
      $b = (($desimal * 100) / 60) * $operating->contractual_fuel;
      $daily = $a + $b;
      // dd($daily);

      $operating->update([
         'daily' => $daily
      ]);

      $vdrOperatingManu = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 4)->first();


      // TOTAL JAM
      $debugHours = 0;
      $debugMinutes = 0;
      $ops = VdrOperating::where('vdr_id', $vdr->id)->get();
      foreach ($ops as $op) {
         $time = $op->time;
         $array = explode('.', $op->time);
         $hours = floor($time);
         $minutes = intval($array[1]);

         $debugHours += $hours;
         $debugMinutes += $minutes;
      }
      // dd($debugHours);

      if ($debugMinutes >= 60) {
         $minLeft = $debugMinutes - 60;
         $debugMinutes = $minLeft;
         $debugHours += 1;
         if ($debugMinutes >= 60) {
            $minLeft = $debugMinutes - 60;
            $debugMinutes = $minLeft;
            $debugHours += 1;
         }
         if ($debugMinutes >= 60) {
            $minLeft = $debugMinutes - 60;
            $debugMinutes = $minLeft;
            $debugHours += 1;
         }
      }

      if ($debugMinutes < 10) {
         $finalMinutes = '0' . $debugMinutes;
      } else {
         $finalMinutes = $debugMinutes;
      }
      $finalHours  = sprintf('%02d', floor($debugHours));
      $final = $finalHours . ':' . $finalMinutes;



      // TOTAL DAILY
      $totalDaily = $vdr ? VdrOperating::where('vdr_id', $vdr->id)->sum('daily') : null;
      $totalDaily = $vdr->customRound($totalDaily);



      return response()->json([
         'success' => true,
         'result' => $vdr->id,
         'totalJam' => $final,
         'totalDaily' => $totalDaily,
         'vdrOperatingManu' => $vdrOperatingManu,
      ]);





      // return redirect()->route('vdr.show', [enkripRambo($vdr), enkripRambo('activity')])->with('success', 'Activity data successfully updated.');

   }

   public function updateActivityIdleAjax($vdr, $act, $idle)
   {

      $vdr = Vdr::find($vdr);
      $vdrActivity = VdrActivity::find($act);

      $vdrActivity->update([
         'idle' => $idle,
      ]);

      $tidle = 0;
      $activities = VdrActivity::where('vdr_id', $vdr)->get();

      foreach ($activities as $key => $activity) {
         $tidle = $this->hitungTime($tidle, $activity->idle);
      }

      $totalMode = array(
         'idle'   => $tidle,
      );

      $operating = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 5)->first();
      $totalIdle = $operating->getSumIdle();
      $operating->update([
         'time' => floatval($totalIdle)
      ]);


      // Hitung Operating Data
      $operating = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 5)->first();
      $bulat = floor($operating->time);
      $desimal = $operating->time - $bulat;
      $a = $bulat * $operating->contractual_fuel;
      $b = (($desimal * 100) / 60) * $operating->contractual_fuel;
      $daily = $a + $b;
      // dd($daily);

      $operating->update([
         'daily' => $daily
      ]);

      $vdrOperatingIdle = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 5)->first();


      // TOTAL JAM
      $debugHours = 0;
      $debugMinutes = 0;
      $ops = VdrOperating::where('vdr_id', $vdr->id)->get();
      foreach ($ops as $op) {
         $time = $op->time;
         $array = explode('.', $op->time);
         $hours = floor($time);
         $minutes = intval($array[1]);

         $debugHours += $hours;
         $debugMinutes += $minutes;
      }
      // dd($debugHours);

      if ($debugMinutes >= 60) {
         $minLeft = $debugMinutes - 60;
         $debugMinutes = $minLeft;
         $debugHours += 1;
         if ($debugMinutes >= 60) {
            $minLeft = $debugMinutes - 60;
            $debugMinutes = $minLeft;
            $debugHours += 1;
         }
         if ($debugMinutes >= 60) {
            $minLeft = $debugMinutes - 60;
            $debugMinutes = $minLeft;
            $debugHours += 1;
         }
      }

      if ($debugMinutes < 10) {
         $finalMinutes = '0' . $debugMinutes;
      } else {
         $finalMinutes = $debugMinutes;
      }
      $finalHours  = sprintf('%02d', floor($debugHours));
      $final = $finalHours . ':' . $finalMinutes;



      // TOTAL DAILY
      $totalDaily = $vdr ? VdrOperating::where('vdr_id', $vdr->id)->sum('daily') : null;
      $totalDaily = $vdr->customRound($totalDaily);



      return response()->json([
         'success' => true,
         'result' => $vdr->id,
         'totalJam' => $final,
         'totalDaily' => $totalDaily,
         'vdrOperatingIdle' => $vdrOperatingIdle,
      ]);
   }

   public function updateActivityTowAjax($vdr, $act, $tow)
   {

      $vdr = Vdr::find($vdr);
      $vdrActivity = VdrActivity::find($act);

      $vdrActivity->update([
         'tow' => $tow,
      ]);

      $ttow = 0;
      $activities = VdrActivity::where('vdr_id', $vdr)->get();

      foreach ($activities as $key => $activity) {
         $ttow = $this->hitungTime($ttow, $activity->tow);
      }

      $totalMode = array(
         'tow'   => $ttow,
      );

      $operating = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 6)->first();
      $totalTow = $operating->getSumTow();
      $operating->update([
         'time' => floatval($totalTow)
      ]);


      // Hitung Operating Data
      $operating = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 6)->first();
      $bulat = floor($operating->time);
      $desimal = $operating->time - $bulat;
      $a = $bulat * $operating->contractual_fuel;
      $b = (($desimal * 100) / 60) * $operating->contractual_fuel;
      $daily = $a + $b;
      // dd($daily);

      $operating->update([
         'daily' => $daily
      ]);

      $vdrOperatingTow = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 6)->first();


      // TOTAL JAM
      $debugHours = 0;
      $debugMinutes = 0;
      $ops = VdrOperating::where('vdr_id', $vdr->id)->get();
      foreach ($ops as $op) {
         $time = $op->time;
         $array = explode('.', $op->time);
         $hours = floor($time);
         $minutes = intval($array[1]);

         $debugHours += $hours;
         $debugMinutes += $minutes;
      }
      // dd($debugHours);

      if ($debugMinutes >= 60) {
         $minLeft = $debugMinutes - 60;
         $debugMinutes = $minLeft;
         $debugHours += 1;
         if ($debugMinutes >= 60) {
            $minLeft = $debugMinutes - 60;
            $debugMinutes = $minLeft;
            $debugHours += 1;
         }
         if ($debugMinutes >= 60) {
            $minLeft = $debugMinutes - 60;
            $debugMinutes = $minLeft;
            $debugHours += 1;
         }
      }

      if ($debugMinutes < 10) {
         $finalMinutes = '0' . $debugMinutes;
      } else {
         $finalMinutes = $debugMinutes;
      }
      $finalHours  = sprintf('%02d', floor($debugHours));
      $final = $finalHours . ':' . $finalMinutes;



      // TOTAL DAILY
      $totalDaily = $vdr ? VdrOperating::where('vdr_id', $vdr->id)->sum('daily') : null;
      $totalDaily = $vdr->customRound($totalDaily);



      return response()->json([
         'success' => true,
         'result' => $vdr->id,
         'totalJam' => $final,
         'totalDaily' => $totalDaily,
         'vdrOperatingTow' => $vdrOperatingTow,
      ]);
   }

   public function updateActivityAhAjax($vdr, $act, $ah)
   {

      $vdr = Vdr::find($vdr);
      $vdrActivity = VdrActivity::find($act);

      $vdrActivity->update([
         'ah' => $ah,
      ]);

      $tah = 0;
      $activities = VdrActivity::where('vdr_id', $vdr)->get();

      foreach ($activities as $key => $activity) {
         $tah = $this->hitungTime($tah, $activity->ah);
      }

      $totalMode = array(
         'ah'   => $tah,
      );

      $operating = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 7)->first();
      $totalAh = $operating->getSumAh();
      $operating->update([
         'time' => floatval($totalAh)
      ]);


      // Hitung Operating Data
      $operating = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 7)->first();
      $bulat = floor($operating->time);
      $desimal = $operating->time - $bulat;
      $a = $bulat * $operating->contractual_fuel;
      $b = (($desimal * 100) / 60) * $operating->contractual_fuel;
      $daily = $a + $b;
      // dd($daily);

      $operating->update([
         'daily' => $daily
      ]);

      $vdrOperatingAh = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 7)->first();


      // TOTAL JAM
      $debugHours = 0;
      $debugMinutes = 0;
      $ops = VdrOperating::where('vdr_id', $vdr->id)->get();
      foreach ($ops as $op) {
         $time = $op->time;
         $array = explode('.', $op->time);
         $hours = floor($time);
         $minutes = intval($array[1]);

         $debugHours += $hours;
         $debugMinutes += $minutes;
      }
      // dd($debugHours);

      if ($debugMinutes >= 60) {
         $minLeft = $debugMinutes - 60;
         $debugMinutes = $minLeft;
         $debugHours += 1;
         if ($debugMinutes >= 60) {
            $minLeft = $debugMinutes - 60;
            $debugMinutes = $minLeft;
            $debugHours += 1;
         }
         if ($debugMinutes >= 60) {
            $minLeft = $debugMinutes - 60;
            $debugMinutes = $minLeft;
            $debugHours += 1;
         }
      }

      if ($debugMinutes < 10) {
         $finalMinutes = '0' . $debugMinutes;
      } else {
         $finalMinutes = $debugMinutes;
      }
      $finalHours  = sprintf('%02d', floor($debugHours));
      $final = $finalHours . ':' . $finalMinutes;



      // TOTAL DAILY
      $totalDaily = $vdr ? VdrOperating::where('vdr_id', $vdr->id)->sum('daily') : null;
      $totalDaily = $vdr->customRound($totalDaily);



      return response()->json([
         'success' => true,
         'result' => $vdr->id,
         'totalJam' => $final,
         'totalDaily' => $totalDaily,
         'vdrOperatingAh' => $vdrOperatingAh,
      ]);
   }

   public function updateActivitySbAjax($vdr, $act, $sb)
   {

      $vdr = Vdr::find($vdr);
      $vdrActivity = VdrActivity::find($act);

      $vdrActivity->update([
         'sb' => $sb,
      ]);

      $tsb = 0;
      $activities = VdrActivity::where('vdr_id', $vdr)->get();

      foreach ($activities as $key => $activity) {
         $tsb = $this->hitungTime($tsb, $activity->sb);
      }

      $totalMode = array(
         'sb'   => $tsb,
      );

      $operating = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 8)->first();
      $totalSb = $operating->getSumSb();
      $operating->update([
         'time' => floatval($totalSb)
      ]);


      // Hitung Operating Data
      $operating = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 8)->first();
      $bulat = floor($operating->time);
      $desimal = $operating->time - $bulat;
      $a = $bulat * $operating->contractual_fuel;
      $b = (($desimal * 100) / 60) * $operating->contractual_fuel;
      $daily = $a + $b;
      // dd($daily);

      $operating->update([
         'daily' => $daily
      ]);

      $vdrOperatingSb = VdrOperating::where('vdr_id', $vdr->id)->where('heading_id', 8)->first();


      // TOTAL JAM
      $debugHours = 0;
      $debugMinutes = 0;
      $ops = VdrOperating::where('vdr_id', $vdr->id)->get();
      foreach ($ops as $op) {
         $time = $op->time;
         $array = explode('.', $op->time);
         $hours = floor($time);
         $minutes = intval($array[1]);

         $debugHours += $hours;
         $debugMinutes += $minutes;
      }
      // dd($debugHours);

      if ($debugMinutes >= 60) {
         $minLeft = $debugMinutes - 60;
         $debugMinutes = $minLeft;
         $debugHours += 1;
         if ($debugMinutes >= 60) {
            $minLeft = $debugMinutes - 60;
            $debugMinutes = $minLeft;
            $debugHours += 1;
         }
         if ($debugMinutes >= 60) {
            $minLeft = $debugMinutes - 60;
            $debugMinutes = $minLeft;
            $debugHours += 1;
         }
      }

      if ($debugMinutes < 10) {
         $finalMinutes = '0' . $debugMinutes;
      } else {
         $finalMinutes = $debugMinutes;
      }
      $finalHours  = sprintf('%02d', floor($debugHours));
      $final = $finalHours . ':' . $finalMinutes;



      // TOTAL DAILY
      $totalDaily = $vdr ? VdrOperating::where('vdr_id', $vdr->id)->sum('daily') : null;
      $totalDaily = $vdr->customRound($totalDaily);



      return response()->json([
         'success' => true,
         'result' => $vdr->id,
         'totalJam' => $final,
         'totalDaily' => $totalDaily,
         'vdrOperatingSb' => $vdrOperatingSb,
      ]);
   }

   public function updateActivityDescAjax($vdr, $act, $desc)
   {

      $vdr = Vdr::find($vdr);
      $vdrActivity = VdrActivity::find($act);

      $vdrActivity->update([
         'activity' => $desc,
      ]);



      return response()->json([
         'success' => true,
         'result' => $vdr->id,

      ]);
   }

   public function addActivityRow($vdr)
   {
      $vdr = Vdr::find(dekripRambo($vdr));

      $lastActivity = VdrActivity::where('vdr_id', $vdr->id)->orderBy('created_at', 'desc')->first();

      if ($lastActivity) {
         $start = $lastActivity->finish;
         $finish = '00:00';
      } else {
         $start = '00:00';
         $finish = '00:00';
      }

      VdrActivity::create([
         'vdr_id' => $vdr->id,
         'activity' => '-',
         'start' => $start,
         'finish' => $finish,
         'high' => 00.00,
         'normal' => 00.00,
         'slow' => 00.00,
         'manu' => 00.00,
         'idle' => 00.00,
         'tow' => 00.00,
         'ah' => 00.00,
         'sb' => 00.00,
         'created_by' => auth()->user()->name
      ]);

      return redirect()->route('vdr.show.spa', [enkripRambo($vdr->id), enkripRambo('index')])->with('success', 'Row added');
   }

   public function addActivityAjax($vdr)
   {
      $vdr = Vdr::find($vdr);

      VdrActivity::create([
         'vdr_id' => $vdr->id,
         'activity' => '',
         'start' => null,
         'finish' => null,
         'high' => 00.00,
         'normal' => 00.00,
         'slow' => 00.00,
         'manu' => 00.00,
         'idle' => 00.00,
         'tow' => 00.00,
         'ah' => 00.00,
         'sb' => 00.00,
         'created_by' => auth()->user()->name
      ]);
   }

   public function storeCrewAjax($id)
   {

      $vdr = Vdr::find(dekripRambo($id));
      VdrCrew::create([
         'vdr_id' => $vdr->id,
         'is_crew' => 1,
         'name' => '-',
         'rank' => '-'
      ]);

      // $vdr->calculateCrew();


      // return response()->json([
      //    'success' => true,
      //    'result' => 'Crew',
      // ]);

      return redirect()->route('vdr.show.spa', [enkripRambo($vdr->id), enkripRambo('index')])->with('success', 'Row added');
   }

   public function storePaxAjax($id)
   {

      $vdr = Vdr::find(dekripRambo($id));
      VdrCrew::create([
         'vdr_id' => $vdr->id,
         'is_crew' => 0,
         'name' => '-',
         'company' => '-'
      ]);

      // $vdr->calculateCrew();



      // return response()->json([
      //    'success' => true,
      //    'result' => 'Crew',
      // ]);

      return redirect()->route('vdr.show.spa', [enkripRambo($vdr->id), enkripRambo('index')])->with('success', 'Row added');
   }

   public function updateCrewAjax($vdr, $crew, $name, $rank)
   {

      $vdr = Vdr::find($vdr);
      $vdrCrew = VdrCrew::find($crew);
      $vdrCrew->update([
         'name' => $name,
         'rank' => $rank,

      ]);





      return response()->json([
         'success' => true,
         'result' => $name,
      ]);
   }

   public function updatePaxAjax($vdr, $crew, $name, $company)
   {

      $vdr = Vdr::find($vdr);
      $vdrCrew = VdrCrew::find($crew);
      $vdrCrew->update([
         'name' => $name,
         'company' => $company,

      ]);





      return response()->json([
         'success' => true,
         'result' => $name,
      ]);
   }

   public function updateCheckCrewAjax($vdr, $crew)
   {

      $vdr = Vdr::find($vdr);
      $vdrCrew = VdrCrew::find($crew);
      $vdrCrew->update([
         'status' => 1
      ]);

      $vdrCrews = VdrCrew::where('vdr_id', $vdr->id)->where('is_crew', 1)->where('status', 1)->get();
      $vdrHseManhours = VdrHse::where('vdr_id', $vdr->id)->where('header_id', 7)->first();

      $today = count($vdrCrews) * 14;

      $vdrHseManhours->update([
         'today' => $today,
      ]);



      return response()->json([
         'success' => true,
         'hseid' => $vdrHseManhours->id,
         'month' => $vdrHseManhours->previous + $today,
         'today' => $today,
         'result' => count($vdrCrews),
      ]);
   }

   public function updateUncheckCrewAjax($vdr, $crew)
   {

      $vdr = Vdr::find($vdr);
      $vdrCrew = VdrCrew::find($crew);
      $vdrCrew->update([
         'status' => 0
      ]);

      $vdrCrews = VdrCrew::where('vdr_id', $vdr->id)->where('is_crew', 1)->where('status', 1)->get();
      $vdrHseManhours = VdrHse::where('vdr_id', $vdr->id)->where('header_id', 7)->first();

      $today = count($vdrCrews) * 14;

      $vdrHseManhours->update([
         'today' => $today,
      ]);


      return response()->json([
         'success' => true,
         'hseid' => $vdrHseManhours->id,
         'month' => $vdrHseManhours->previous + $today,
         'today' => $today,
         'result' => count($vdrCrews),
      ]);
   }

   public function updateEngineAjax($vdr, $engine, $m_ref, $m_port, $m_stbd, $m_center, $m_other, $a_ref, $a_port, $a_stbd, $a_other)
   {

      $vdr = Vdr::find($vdr);
      $vdrEngine = VdrEngine::find($engine);




      $vdrEngine->update([
         'm_ref' => $m_ref,
         'm_port' => $m_port,
         'm_stbd' => $m_stbd,
         'm_center' => $m_center,
         'm_other' => $m_other,
         'a_ref' => $a_ref,
         'a_port' => $a_port,
         'a_stbd' => $a_stbd,
         'a_other' => $a_other
      ]);



      return response()->json([
         'success' => true,
         'result' => $m_ref,




      ]);





      // return redirect()->route('vdr.show', [enkripRambo($vdr), enkripRambo('activity')])->with('success', 'Activity data successfully updated.');

   }














   public function updateGeneralPost(Request $req)
   {




      $vdr = Vdr::find($req->vdr);
      $vdr->update([

         'location_midnight' => $req->location_midnight,


      ]);

      // return response()->json([
      //    'success' => true,
      //    'result' => $vdr->location_midnight

      // ]);


   }

   public function updateApproval(Request $req)
   {
      $vdr = Vdr::find($req->id);

      $vdr->update([
         'title1' => $req->title1,
         'name1' => $req->name1,
         'title2' => $req->title2,
         'name2' => $req->name2,
         'title3' => $req->title3,
         'name3' => $req->name3,
      ]);

      return back()->with('success', 'VDR data successfully updated.');
   }

   public function hitungTime($cumValue, $currentValue)
   {
      // Pisahkan bagian jam dan menit
      $cumMinutes =  fmod($cumValue, 1) * 100;
      $thisMinutes =  fmod($currentValue, 1) * 100;
      $totalMinutes = $cumMinutes + $thisMinutes;

      if ($totalMinutes > 59) {

         $hours = floor($currentValue);

         # code...
         if ($totalMinutes == 60) {
            # code...
            $sisaMinutes = 0;
            $tambahHours = 1;
         } else {
            $sisaMinutes = $totalMinutes - 60;
            $tambahHours = 1;
         }

         $penambahanJam = $hours + $tambahHours + ($sisaMinutes / 100);

         $result = $penambahanJam + floor($cumValue);
         // $penambahan

      } else {

         $result = $cumValue + $currentValue;
      }

      return $result;
   }

   public function storeActivity(Request $req)
   {

      // dd($req);
      // $req->validate([
      //     'id' => 'required',
      //     'vessel_id' => 'required',
      //     'created_by' => 'required',
      //     'activity' => 'required',
      //     'start' => 'required',
      //     'finish' => 'required',
      //     'high' => 'required',
      //     'normal' => 'required',
      //     'slow' => 'required',
      //     'manu' => 'required',
      //     'idle' => 'required',
      //     'tow' => 'required',
      //     'ah' => 'required',
      //     'sb' => 'required'
      // ]);



      // DB::beginTransaction();
      // // dd($req->sb);
      // try {
      $createVdr = VdrActivity::create([
         'vdr_id' => $req->id,
         'created_by' => $req->created_by,
         'activity' => $req->activity,
         'start' => $req->start,
         // 'finish' => $req->finish,
         'high' => $req->high,
         'normal' => $req->normal,
         'slow' => $req->slow,
         'manu' => $req->manu,
         'idle' => $req->idle,
         'tow' => $req->tow,
         'ah' => $req->ah,
         'sb' => $req->sb
      ]);

      $high = 0;
      $normal = 0;
      $slow = 0;
      $manu = 0;
      $idle = 0;
      $tow = 0;
      $ah = 0;
      $sb = 0;
      $total = 0;


      // TESTING
      $high = $this->hitungTime($high, $req->high);
      $normal = $this->hitungTime($normal, $req->normal);
      $slow = $this->hitungTime($slow, $req->slow);
      $manu = $this->hitungTime($manu, $req->manu);
      $idle = $this->hitungTime($idle, $req->idle);
      $tow = $this->hitungTime($tow, $req->tow);
      $ah = $this->hitungTime($ah, $req->ah);
      $sb = $this->hitungTime($sb, $req->sb);
      $sum = $high + $normal + $slow + $manu + $idle + $tow + $ah + $sb;

      $totalHour = explode('.', "$sum", 2)[0];
      // dd($sum);
      // $totalHour = $this->hitungTime($total, $sum);
      // dd($totalHour);

      $minHigh = explode('.', $req->high, 2)[1];
      $minNormal = explode('.', $req->normal, 2)[1];
      $minSlow = explode('.', $req->slow, 2)[1];
      $minManu = explode('.', $req->manu, 2)[1];
      $minIdle = explode('.', $req->idle, 2)[1];
      $minTow = explode('.', $req->tow, 2)[1];
      $minAh = explode('.', $req->ah, 2)[1];
      $minSb = explode('.', $req->sb, 2)[1];
      $totalMinute = $minHigh + $minNormal + $minSlow + $minManu + $minIdle + $minTow + $minAh + $minSb;
      // dd($totalMinute);
      // dd($req->sb);
      // if ($totalMinute > 0) {
      //    $grandMinute = explode('.', "$sum", 2)[1];
      // } else {
      //    $grandMinute = 0;
      // }
      // dd($sum);
      $totalHours = '';
      $debugHours = 0;
      $debugMinutes = 0;

      $hourHigh = floor($req->high);
      $arrayHigh = explode('.', $req->high);
      $minuteHigh = intval($arrayHigh[1]);

      $hourNormal = floor($req->normal);
      $arrayNormal = explode('.', $req->normal);
      $minuteNormal = intval($arrayNormal[1]);

      $hourSlow =  floor($req->slow);
      $arraySlow = explode('.', $req->slow);
      $minuteSlow = intval($arraySlow[1]);

      $hourManu =  floor($req->manu);
      $arrayManu = explode('.', $req->manu);
      $minuteManu = intval($arrayManu[1]);

      $hourIdle =  floor($req->idle);
      $arrayIdle = explode('.', $req->idle);
      $minuteIdle = intval($arrayIdle[1]);

      $hourTow =  floor($req->tow);
      $arrayTow = explode('.', $req->tow);
      $minuteTow = intval($arrayTow[1]);

      $hourAh =  floor($req->ah);
      $arrayAh = explode('.', $req->ah);
      $minuteAh = intval($arrayAh[1]);

      $hourSb =  floor($req->sb);
      $arraySb = explode('.', $req->sb);
      $minuteSb = intval($arraySb[1]);


      $debugHour = $hourHigh + $hourNormal + $hourSlow + $hourManu + $hourIdle + $hourTow + $hourAh + $hourSb;
      $debugMinute = $minuteHigh + $minuteNormal + $minuteSlow + $minuteManu + $minuteIdle + $minuteTow + $minuteAh + $minuteSb;

      if ($debugMinute >= 60) {
         $minLeft = $debugMinute - 60;
         $debugMinute = $minLeft;
         $debugHour += 1;
         if ($debugMinute >= 60) {
            $minLeft = $debugMinute - 60;
            $debugMinute = $minLeft;
            $debugHour += 1;
            if ($debugMinute >= 60) {
               $minLeft = $debugMinute - 60;
               $debugMinute = $minLeft;
               $debugHour += 1;
               if ($debugMinute >= 60) {
                  $minLeft = $debugMinute - 60;
                  $debugMinute = $minLeft;
                  $debugHour += 1;
               }
            }
         }
      }





      // dd(intval($totalMinute));
      $currentStart = new Carbon($req->start);
      // dd($currentStart);
      $start = $currentStart;
      $grandTotal = $currentStart->addHours($debugHour);
      // dd($sum);
      $grandFinal = $grandTotal->addMinutes(intval($debugMinute));
      // dd('start:' . $start . ' normal:'. $normal . ' final:'. $grandFinal);
      // dd($grandFinal);
      $createVdr->update([
         'finish' => $grandFinal
      ]);




      $activities = VdrActivity::where('vdr_id', $req->vdr_id)->get();

      foreach ($activities as $key => $activity) {

         $high = 0;
         $normal = 0;
         $slow = 0;
         $manu = 0;
         $idle = 0;
         $tow = 0;
         $ah = 0;
         $sb = 0;
         $total = 0;

         $high = $this->hitungTime($high, $activity->high);
         $normal = $this->hitungTime($normal, $activity->normal);
         $slow = $this->hitungTime($slow, $activity->slow);
         $manu = $this->hitungTime($manu, $activity->manu);
         $idle = $this->hitungTime($idle, $activity->idle);
         $tow = $this->hitungTime($tow, $activity->tow);
         $ah = $this->hitungTime($ah, $activity->ah);
         $sb = $this->hitungTime($sb, $activity->sb);
         // dd($idle);

         // $high = $activity->high;
         // $normal = $activity->normal;
         // $slow = $activity->slow;
         // $manu = $activity->manu;
         // $idle = $activity->idle;
         // $tow = $activity->tow;
         // $ah = $activity->ah;
         // $sb = $activity->sb;

         $total = $high + $normal + $slow + $manu + $idle + $tow + $ah + $sb;
         // dd($total);
         // dd($high . $normal . $slow . $manu . $idle . $tow .$ah .$sb);
         // $grand = $activity->start + $total;

         // $currentStart = new Carbon($activity->start);
         // $grandTotal = $currentStart->addHours($total);
         // dd($total);
         // $activity->update([
         //    'finish' => $grandTotal
         // ]);


      }

      $totalMode = array(
         'high'   => $high,
         'normal' => $normal,
         'slow'   => $slow,
         'manu'   => $manu,
         'idle'   => $idle,
         'tow'    => $tow,
         'ah'     => $ah,
         'sb'     => $sb
      );

      // $totalOperating = VdrActivity::selectRaw('SUM(high) as high, SUM(normal) as normal, SUM(slow) as slow, SUM(manu) as manu , SUM(idle) as idle, SUM(tow) as tow, SUM(ah) as ah, SUM(sb) as sb')
      //     ->where('vdr_id', $req->vdr_id)
      //     ->first();

      $operatings = VdrOperating::where('vdr_id', $req->vdr_id)->get();
      $vdr = Vdr::find($req->vdr_id);

      foreach ($operatings as $operating) {
         $activities = VdrActivity::where('vdr_id', $req->vdr_id)->get();
         // $totalHigh = $activities->sum('high');
         // $totalNormal = $operating->getSumNormal();
         // $totalSlow = $activities->sum('slow');
         // $totalManu = $activities->sum('manu');
         // $totalIdle = $activities->sum('idle');
         // $totalTow = $activities->sum('tow');
         // $totalAh = $activities->sum('ah');
         // $totalSb = $activities->sum('sb');
         $totalHigh = $operating->getSumHigh();
         $totalNormal = $operating->getSumNormal();
         $totalSlow = $operating->getSumSlow();
         $totalManu = $operating->getSumManu();
         $totalIdle = $operating->getSumIdle();
         $totalTow = $operating->getSumTow();
         $totalAh = $operating->getSumAh();
         $totalSb = $operating->getSumSb();

         if ($operating->heading_id == 1) {
            $operating->update([
               'time' => floatval($totalHigh)
            ]);
         } elseif ($operating->heading_id == 2) {
            $operating->update([
               'time' => floatval($totalNormal)
            ]);
         } elseif ($operating->heading_id == 3) {
            $operating->update([
               'time' => floatval($totalSlow)
            ]);
         } elseif ($operating->heading_id == 4) {
            $operating->update([
               'time' => floatval($totalManu)
            ]);
         } elseif ($operating->heading_id == 5) {
            $operating->update([
               'time' => floatval($totalIdle)
            ]);
         } elseif ($operating->heading_id == 6) {
            $operating->update([
               'time' => floatval($totalTow)
            ]);
         } elseif ($operating->heading_id == 7) {
            $operating->update([
               'time' => floatval($totalAh)
            ]);
         } elseif ($operating->heading_id == 8) {
            $operating->update([
               'time' => floatval($totalSb)
            ]);
         }





         // $field = $operating->heading->field;


         // if ($field) {
         //    $totalWaktu = $totalMode[$field];
         //    $updateOperating = $operating->update([
         //       'time' => floatval($totalWaktu)
         //    ]);
         // }

         // dd('not ok');
      }

      // Hitung Operating Data
      $this->hitungOperatingData($req->vdr_id);
      // dd($oper)

      // Jika semuanya berhasil, kita commit transaksi
      DB::commit();

      // ModelsLog::create([
      //    'system' => 'VDR',
      //    'user_id' => auth()->user()->id,
      //    'vessel_id' => $vdr->vessel_id,
      //    'action' => 'Add Activity',
      //    'vdr_id' => $vdr->id,
      //    'desc' => 'on VDR ' . $vdr->code,
      //    'table' => 'vdr_activities'
      // ]);

      return redirect()->route('vdr.show.spa', [enkripRambo($req->vdr_id), enkripRambo('activity')])->with('success', 'Activity data successfully saved.');
      // } catch (\Exception $e) {
      //    // Jika terjadi kesalahan, kita rollback transaksi
      //    DB::rollback();
      //    Log::error('Kesalahan saat menjalankan transaksi: ' . $e->getMessage());
      //    return back()->with('warning', 'Terjadi kesalahan: ' . $e->getMessage());

      //    return back()->with('warning', 'Failed, Data gagal di Update!');
      //    // Handle atau laporkan kesalahan
      //    // return response()->json(['message' => 'Failed to create order'], 500);
      // }
   }

   public function storeCrew(Request $req)
   {

      $req->validate([
         'name' => 'required',
         'is_crew' => 'required',
      ]);

      $vdr = Vdr::find($req->id);
      $createVdr = VdrCrew::create([
         'vdr_id' => $req->id,
         'is_crew' => $req->is_crew,
         'name' => $req->name,
         'rank' => $req->rank,
         'company' => $req->company,
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      if ($createVdr) {
         # code...
         ModelsLog::create([
            'system' => 'VDR',
            'user_id' => auth()->user()->id,
            'action' => 'Add Crew',
            'vessel_id' => $vdr->vessel_id,
            'vdr_id' => $vdr->id,
            'desc' => 'on VDR ' . $vdr->code,
            'table' => 'vdr_crews'
         ]);
         return redirect()->route('vdr.show', [enkripRambo($vdr->id), enkripRambo('crew')])->with('success', 'Crew / Passenger data successfully saved');
      } else {
         return redirect()->back()->with('warning', 'Crew / Passenger gagal Disimpan!');
      }
   }

   public function updateActivity(Request $req)
   {
      $req->validate([
         'id' => 'required',
         'activity' => 'required',
         'start' => 'required',
         'finish' => 'required',
         'high' => 'required',
         'normal' => 'required',
         'slow' => 'required',
         'manu' => 'required',
         'idle' => 'required',
         'tow' => 'required',
         'ah' => 'required',
         'sb' => 'required'
      ]);


      DB::beginTransaction();
      // dd($datas);
      try {


         $updateVdr = VdrActivity::where('id', $req->id)
            ->update([
               'activity' => $req->activity,
               'start' => $req->start,
               'finish' => $req->finish,
               'high' => $req->high,
               'normal' => $req->normal,
               'slow' => $req->slow,
               'manu' => $req->manu,
               'idle' => $req->idle,
               'tow' => $req->tow,
               'ah' => $req->ah,
               'sb' => $req->sb
            ]);

         $high = 0;
         $normal = 0;
         $slow = 0;
         $manu = 0;
         $idle = 0;
         $tow = 0;
         $ah = 0;
         $sb = 0;

         $activities = VdrActivity::where('vdr_id', $req->vdr_id)->get();

         foreach ($activities as $key => $activity) {

            $high = $this->hitungTime($high, $activity->high);

            $normal = $this->hitungTime($normal, $activity->normal);

            $slow = $this->hitungTime($slow, $activity->slow);

            $manu = $this->hitungTime($manu, $activity->manu);

            $idle = $this->hitungTime($idle, $activity->idle);

            $tow = $this->hitungTime($tow, $activity->tow);

            $ah = $this->hitungTime($ah, $activity->ah);

            $sb = $this->hitungTime($sb, $activity->sb);
         }

         $totalMode = array(
            'high'   => $high,
            'normal' => $normal,
            'slow'   => $slow,
            'manu'   => $manu,
            'idle'   => $idle,
            'tow'    => $tow,
            'ah'     => $ah,
            'sb'     => $sb
         );

         // $totalOperating = VdrActivity::selectRaw('SUM(high) as high, SUM(normal) as normal, SUM(slow) as slow, SUM(manu) as manu , SUM(idle) as idle, SUM(tow) as tow, SUM(ah) as ah, SUM(sb) as sb')
         //     ->where('vdr_id', $req->vdr_id)
         //     ->first();

         $operatings = VdrOperating::where('vdr_id', $req->vdr_id)->get();


         $operatings = VdrOperating::where('vdr_id', $req->vdr_id)->get();
         $vdr = Vdr::find($req->vdr_id);

         foreach ($operatings as $operating) {
            $activities = VdrActivity::where('vdr_id', $req->vdr_id)->get();
            // $totalHigh = $activities->sum('high');
            // $totalNormal = $operating->getSumNormal();
            // $totalSlow = $activities->sum('slow');
            // $totalManu = $activities->sum('manu');
            // $totalIdle = $activities->sum('idle');
            // $totalTow = $activities->sum('tow');
            // $totalAh = $activities->sum('ah');
            // $totalSb = $activities->sum('sb');
            $totalHigh = $operating->getSumHigh();
            $totalNormal = $operating->getSumNormal();
            $totalSlow = $operating->getSumSlow();
            $totalManu = $operating->getSumManu();
            $totalIdle = $operating->getSumIdle();
            $totalTow = $operating->getSumTow();
            $totalAh = $operating->getSumAh();
            $totalSb = $operating->getSumSb();

            if ($operating->heading_id == 1) {
               $operating->update([
                  'time' => floatval($totalHigh)
               ]);
            } elseif ($operating->heading_id == 2) {
               $operating->update([
                  'time' => floatval($totalNormal)
               ]);
            } elseif ($operating->heading_id == 3) {
               $operating->update([
                  'time' => floatval($totalSlow)
               ]);
            } elseif ($operating->heading_id == 4) {
               $operating->update([
                  'time' => floatval($totalManu)
               ]);
            } elseif ($operating->heading_id == 5) {
               $operating->update([
                  'time' => floatval($totalIdle)
               ]);
            } elseif ($operating->heading_id == 6) {
               $operating->update([
                  'time' => floatval($totalTow)
               ]);
            } elseif ($operating->heading_id == 7) {
               $operating->update([
                  'time' => floatval($totalAh)
               ]);
            } elseif ($operating->heading_id == 8) {
               $operating->update([
                  'time' => floatval($totalSb)
               ]);
            }





            // $field = $operating->heading->field;


            // if ($field) {
            //    $totalWaktu = $totalMode[$field];
            //    $updateOperating = $operating->update([
            //       'time' => floatval($totalWaktu)
            //    ]);
            // }

            // dd('not ok');
         }


         // Hitung Operating Data
         $this->hitungOperatingData($req->vdr_id);

         // Jika semuanya berhasil, kita commit transaksi
         DB::commit();
         $vdr = Vdr::find($req->vdr_id);

         ModelsLog::create([
            'system' => 'VDR',
            'user_id' => auth()->user()->id,
            'vessel_id' => $vdr->vessel_id,
            'action' => 'Update Activity',
            'vdr_id' => $vdr->id,
            'desc' => 'on VDR ' . $vdr->code,
            'table' => 'vdr_activities'
         ]);

         return redirect()->route('vdr.show', [enkripRambo($req->vdr_id), enkripRambo('activity')])->with('success', 'Activity data successfully updated.');
      } catch (\Exception $e) {
         // Jika terjadi kesalahan, kita rollback transaksi
         DB::rollback();
         Log::error('Kesalahan saat menjalankan transaksi: ' . $e->getMessage());
         return back()->with('warning', 'Terjadi kesalahan: ' . $e->getMessage());

         return back()->with('warning', 'Failed, Data gagal di Update!');
         // Handle atau laporkan kesalahan
         // return response()->json(['message' => 'Failed to create order'], 500);
      }
   }

   public function hitungOperatingData($vdrId)
   {

      // get Operating Data 

      $operatings = VdrOperating::where('vdr_id', $vdrId)->get();

      foreach ($operatings as $key => $operating) {

         $bulat = floor($operating->time);

         $desimal = $operating->time - $bulat;

         $a = $bulat * $operating->contractual_fuel;

         $b = (($desimal * 100) / 60) * $operating->contractual_fuel;

         $daily = $a + $b;
         // dd($daily);

         $operatingUpdate = $operating->update([
            'daily' => $daily
         ]);
      }
   }

   public function deleteActivity(Request $req)
   {
      $req->validate([
         'id' => 'required'
      ]);
      $vdrActivity = VdrActivity::find($req->id);
      $vdr = Vdr::find($vdrActivity->vdr_id);
      $deleteActivity  = VdrActivity::destroy($req->id);

      if ($deleteActivity) {
         # code...
         // $vdr = Vdr::find($req->vdr_id);
         $operatings = VdrOperating::where('vdr_id', $vdr->id)->get();
         // $vdr = Vdr::find($req->vdr_id);

         foreach ($operatings as $operating) {
            $activities = VdrActivity::where('vdr_id', $vdr->id)->get();
            // $totalHigh = $activities->sum('high');
            // $totalNormal = $operating->getSumNormal();
            // $totalSlow = $activities->sum('slow');
            // $totalManu = $activities->sum('manu');
            // $totalIdle = $activities->sum('idle');
            // $totalTow = $activities->sum('tow');
            // $totalAh = $activities->sum('ah');
            // $totalSb = $activities->sum('sb');
            $totalHigh = $operating->getSumHigh();
            $totalNormal = $operating->getSumNormal();
            $totalSlow = $operating->getSumSlow();
            $totalManu = $operating->getSumManu();
            $totalIdle = $operating->getSumIdle();
            $totalTow = $operating->getSumTow();
            $totalAh = $operating->getSumAh();
            $totalSb = $operating->getSumSb();

            if ($operating->heading_id == 1) {
               $operating->update([
                  'time' => floatval($totalHigh)
               ]);
            } elseif ($operating->heading_id == 2) {
               $operating->update([
                  'time' => floatval($totalNormal)
               ]);
            } elseif ($operating->heading_id == 3) {
               $operating->update([
                  'time' => floatval($totalSlow)
               ]);
            } elseif ($operating->heading_id == 4) {
               $operating->update([
                  'time' => floatval($totalManu)
               ]);
            } elseif ($operating->heading_id == 5) {
               $operating->update([
                  'time' => floatval($totalIdle)
               ]);
            } elseif ($operating->heading_id == 6) {
               $operating->update([
                  'time' => floatval($totalTow)
               ]);
            } elseif ($operating->heading_id == 7) {
               $operating->update([
                  'time' => floatval($totalAh)
               ]);
            } elseif ($operating->heading_id == 8) {
               $operating->update([
                  'time' => floatval($totalSb)
               ]);
            }





            // $field = $operating->heading->field;


            // if ($field) {
            //    $totalWaktu = $totalMode[$field];
            //    $updateOperating = $operating->update([
            //       'time' => floatval($totalWaktu)
            //    ]);
            // }

            // dd('not ok');
         }

         ModelsLog::create([
            'system' => 'VDR',
            'user_id' => auth()->user()->id,
            'action' => 'Delete Activity',
            'desc' => 'on VDR ' . $vdr->code,
            'table' => 'vdr_activities'
         ]);
         return redirect()->route('vdr.show', [enkripRambo($vdrActivity->vdr_id), enkripRambo('activity')])->with('success', 'Activity data successfully deleted');
      } else {
         return redirect()->back()->with('warning', 'Activity gagal di delete!');
      }
   }

   public function deleteActivitySpa(Request $req)
   {
      $req->validate([
         'id' => 'required'
      ]);
      $vdrActivity = VdrActivity::find($req->id);
      $vdr = Vdr::find($vdrActivity->vdr_id);
      $deleteActivity  = VdrActivity::destroy($req->id);

      if ($deleteActivity) {
         # code...
         // $vdr = Vdr::find($req->vdr_id);
         $operatings = VdrOperating::where('vdr_id', $vdr->id)->get();
         // $vdr = Vdr::find($req->vdr_id);

         foreach ($operatings as $operating) {
            $activities = VdrActivity::where('vdr_id', $vdr->id)->get();
            // $totalHigh = $activities->sum('high');
            // $totalNormal = $operating->getSumNormal();
            // $totalSlow = $activities->sum('slow');
            // $totalManu = $activities->sum('manu');
            // $totalIdle = $activities->sum('idle');
            // $totalTow = $activities->sum('tow');
            // $totalAh = $activities->sum('ah');
            // $totalSb = $activities->sum('sb');
            $totalHigh = $operating->getSumHigh();
            $totalNormal = $operating->getSumNormal();
            $totalSlow = $operating->getSumSlow();
            $totalManu = $operating->getSumManu();
            $totalIdle = $operating->getSumIdle();
            $totalTow = $operating->getSumTow();
            $totalAh = $operating->getSumAh();
            $totalSb = $operating->getSumSb();

            if ($operating->heading_id == 1) {
               $operating->update([
                  'time' => floatval($totalHigh)
               ]);
            } elseif ($operating->heading_id == 2) {
               $operating->update([
                  'time' => floatval($totalNormal)
               ]);
            } elseif ($operating->heading_id == 3) {
               $operating->update([
                  'time' => floatval($totalSlow)
               ]);
            } elseif ($operating->heading_id == 4) {
               $operating->update([
                  'time' => floatval($totalManu)
               ]);
            } elseif ($operating->heading_id == 5) {
               $operating->update([
                  'time' => floatval($totalIdle)
               ]);
            } elseif ($operating->heading_id == 6) {
               $operating->update([
                  'time' => floatval($totalTow)
               ]);
            } elseif ($operating->heading_id == 7) {
               $operating->update([
                  'time' => floatval($totalAh)
               ]);
            } elseif ($operating->heading_id == 8) {
               $operating->update([
                  'time' => floatval($totalSb)
               ]);
            }





            // $field = $operating->heading->field;


            // if ($field) {
            //    $totalWaktu = $totalMode[$field];
            //    $updateOperating = $operating->update([
            //       'time' => floatval($totalWaktu)
            //    ]);
            // }

            // dd('not ok');
         }

         ModelsLog::create([
            'system' => 'VDR',
            'user_id' => auth()->user()->id,
            'action' => 'Delete Activity',
            'desc' => 'on VDR ' . $vdr->code,
            'table' => 'vdr_activities'
         ]);
         return redirect()->route('vdr.show.spa', [enkripRambo($vdrActivity->vdr_id), enkripRambo('activity')])->with('success', 'Activity data successfully deleted');
      } else {
         return redirect()->back()->with('warning', 'Activity gagal di delete!');
      }
   }

   public function deleteActivityRow(Request $req)
   {

      if ($req->checkActivity == null) {
         return redirect()->back()->with('warning', 'Gagal, Klik pada checkbox Activity yang ingin dihapus');
      }

      foreach ($req->checkActivity as $key => $id) {

         $vdr = Vdr::find($req->vdr_id);
         // $vdrActivity = VdrActivity::find($req->id);

         // Menghapus data dari TempDiscipline berdasarkan ID
         $deleteActivity  = VdrActivity::destroy($id);

         if ($deleteActivity) {
            # code...
            // $vdr = Vdr::find($req->vdr_id);
            $operatings = VdrOperating::where('vdr_id', $vdr->id)->get();
            // $vdr = Vdr::find($req->vdr_id);

            foreach ($operatings as $operating) {
               $activities = VdrActivity::where('vdr_id', $vdr->id)->get();
               // $totalHigh = $activities->sum('high');
               // $totalNormal = $operating->getSumNormal();
               // $totalSlow = $activities->sum('slow');
               // $totalManu = $activities->sum('manu');
               // $totalIdle = $activities->sum('idle');
               // $totalTow = $activities->sum('tow');
               // $totalAh = $activities->sum('ah');
               // $totalSb = $activities->sum('sb');
               $totalHigh = $operating->getSumHigh();
               $totalNormal = $operating->getSumNormal();
               $totalSlow = $operating->getSumSlow();
               $totalManu = $operating->getSumManu();
               $totalIdle = $operating->getSumIdle();
               $totalTow = $operating->getSumTow();
               $totalAh = $operating->getSumAh();
               $totalSb = $operating->getSumSb();

               if ($operating->heading_id == 1) {
                  $operating->update([
                     'time' => floatval($totalHigh)
                  ]);
               } elseif ($operating->heading_id == 2) {
                  $operating->update([
                     'time' => floatval($totalNormal)
                  ]);
               } elseif ($operating->heading_id == 3) {
                  $operating->update([
                     'time' => floatval($totalSlow)
                  ]);
               } elseif ($operating->heading_id == 4) {
                  $operating->update([
                     'time' => floatval($totalManu)
                  ]);
               } elseif ($operating->heading_id == 5) {
                  $operating->update([
                     'time' => floatval($totalIdle)
                  ]);
               } elseif ($operating->heading_id == 6) {
                  $operating->update([
                     'time' => floatval($totalTow)
                  ]);
               } elseif ($operating->heading_id == 7) {
                  $operating->update([
                     'time' => floatval($totalAh)
                  ]);
               } elseif ($operating->heading_id == 8) {
                  $operating->update([
                     'time' => floatval($totalSb)
                  ]);
               }
            }

            $thigh = 0;
            $tnormal = 0;
            $tslow = 0;
            $tmanu = 0;
            $tidle = 0;
            $ttow = 0;
            $tah = 0;
            $tsb = 0;
            $activities = VdrActivity::where('vdr_id', $vdr)->get();

            foreach ($activities as $key => $activity) {

               $thigh = $this->hitungTime($thigh, $activity->high);

               $tnormal = $this->hitungTime($tnormal, $activity->normal);

               $tslow = $this->hitungTime($tslow, $activity->slow);

               $tmanu = $this->hitungTime($tmanu, $activity->manu);

               $tidle = $this->hitungTime($tidle, $activity->idle);

               $ttow = $this->hitungTime($ttow, $activity->tow);

               $tah = $this->hitungTime($tah, $activity->ah);

               $tsb = $this->hitungTime($tsb, $activity->sb);
            }

            $totalMode = array(
               'high'   => $thigh,
               'normal' => $tnormal,
               'slow'   => $tslow,
               'manu'   => $tmanu,
               'idle'   => $tidle,
               'tow'    => $ttow,
               'ah'     => $tah,
               'sb'     => $tsb
            );



            $operatings = VdrOperating::where('vdr_id', $vdr->id)->get();


            // $operatings = VdrOperating::where('vdr_id', $req->vdr_id)->get();
            // $vdr = Vdr::find($vdr);

            foreach ($operatings as $operating) {
               $activities = VdrActivity::where('vdr_id', $vdr)->get();

               $totalHigh = $operating->getSumHigh();
               $totalNormal = $operating->getSumNormal();
               $totalSlow = $operating->getSumSlow();
               $totalManu = $operating->getSumManu();
               $totalIdle = $operating->getSumIdle();
               $totalTow = $operating->getSumTow();
               $totalAh = $operating->getSumAh();
               $totalSb = $operating->getSumSb();

               if ($operating->heading_id == 1) {
                  $operating->update([
                     'time' => floatval($totalHigh)
                  ]);
               } elseif ($operating->heading_id == 2) {
                  $operating->update([
                     'time' => floatval($totalNormal)
                  ]);
               } elseif ($operating->heading_id == 3) {
                  $operating->update([
                     'time' => floatval($totalSlow)
                  ]);
               } elseif ($operating->heading_id == 4) {
                  $operating->update([
                     'time' => floatval($totalManu)
                  ]);
               } elseif ($operating->heading_id == 5) {
                  $operating->update([
                     'time' => floatval($totalIdle)
                  ]);
               } elseif ($operating->heading_id == 6) {
                  $operating->update([
                     'time' => floatval($totalTow)
                  ]);
               } elseif ($operating->heading_id == 7) {
                  $operating->update([
                     'time' => floatval($totalAh)
                  ]);
               } elseif ($operating->heading_id == 8) {
                  $operating->update([
                     'time' => floatval($totalSb)
                  ]);
               }
            }


            // Hitung Operating Data
            $operatings = VdrOperating::where('vdr_id', $vdr->id)->get();

            foreach ($operatings as $key => $operating) {

               $bulat = floor($operating->time);

               $desimal = $operating->time - $bulat;

               $a = $bulat * $operating->contractual_fuel;

               $b = (($desimal * 100) / 60) * $operating->contractual_fuel;

               $daily = $a + $b;
               // dd($daily);

               $operatingUpdate = $operating->update([
                  'daily' => $daily
               ]);
            }
         }
      }

      return redirect()->route('vdr.show.spa', [enkripRambo($req->vdr_id), enkripRambo('activity')])->with('success', 'Activity data successfully deleted');
      // $deleteActivity  = VdrActivity::destroy($req->id);


   }

   public function deleteCrewRow(Request $req)
   {

      if ($req->checkCrew == null) {
         return redirect()->back()->with('warning', 'Gagal, Klik pada checkbox Crew yang ingin dihapus');
      }

      foreach ($req->checkCrew as $key => $id) {

         $vdr = Vdr::find($req->vdr);
         // $vdrActivity = VdrActivity::find($req->id);

         // Menghapus data dari TempDiscipline berdasarkan ID
         $deleteCrew  = VdrCrew::destroy($id);
      }

      return redirect()->route('vdr.show.spa', [enkripRambo($req->vdr), enkripRambo('activity')])->with('success', 'Crew data successfully deleted');
      // $deleteActivity  = VdrActivity::destroy($req->id);


   }

   public function deletePaxRow(Request $req)
   {

      if ($req->checkPax == null) {
         return redirect()->back()->with('warning', 'Gagal, Klik pada checkbox Pax yang ingin dihapus');
      }

      foreach ($req->checkPax as $key => $id) {

         $vdr = Vdr::find($req->vdr);
         // $vdrActivity = VdrActivity::find($req->id);

         // Menghapus data dari TempDiscipline berdasarkan ID
         $deletePax  = VdrCrew::destroy($id);
      }

      return redirect()->route('vdr.show.spa', [enkripRambo($req->vdr), enkripRambo('activity')])->with('success', 'Pax data successfully deleted');
      // $deleteActivity  = VdrActivity::destroy($req->id);


   }

   public function deleteCrew(Request $req)
   {
      $req->validate([
         'id' => 'required'
      ]);

      $vdrCrew = VdrCrew::where('id', $req->id)->first();
      $deleteCrew  = VdrCrew::destroy($req->id);

      if ($deleteCrew) {
         # code...
         ModelsLog::create([
            'system' => 'VDR',
            'user_id' => auth()->user()->id,
            'vessel_id' => $vdrCrew->vdr->vessel_id,
            'action' => 'Delete Crew',
            'vdr_id' => $vdrCrew->vdr->id,
            'desc' => 'on VDR ' . $vdrCrew->vdr->code,
            'table' => 'vdr_crews'
         ]);
         return redirect()->route('vdr.show', [enkripRambo($vdrCrew->vdr->id), enkripRambo('crew')])->with('success', 'VDR Crew data successfully deleted');
      } else {
         return redirect()->back()->with('warning', 'VDR Crew gagal di delete!');
      }
   }

   public function deleteCrewSpa(Request $req)
   {
      $req->validate([
         'id' => 'required'
      ]);

      $vdrCrew = VdrCrew::where('id', $req->id)->first();
      $deleteCrew  = VdrCrew::destroy($req->id);

      if ($deleteCrew) {
         # code...
         ModelsLog::create([
            'system' => 'VDR',
            'user_id' => auth()->user()->id,
            'vessel_id' => $vdrCrew->vdr->vessel_id,
            'action' => 'Delete Crew',
            'vdr_id' => $vdrCrew->vdr->id,
            'desc' => 'on VDR ' . $vdrCrew->vdr->code,
            'table' => 'vdr_crews'
         ]);
         return redirect()->route('vdr.show.spa', [enkripRambo($vdrCrew->vdr->id), enkripRambo('crew')])->with('success', 'VDR Crew data successfully deleted');
      } else {
         return redirect()->back()->with('warning', 'VDR Crew gagal di delete!');
      }
   }

   public function updateCargo(Request $req)
   {
      $req->validate([
         'id' => 'required',
         'vdr_id' => 'required'
      ]);

      $datas = $req->id;

      DB::beginTransaction();

      try {

         foreach ($datas as $key => $cargoId) {

            $cargo = VdrCargo::find($cargoId);



            if ($cargo->heading_id == 1) {
               $closing = $req->closing[$key];
            } elseif ($cargo->heading_id == 2) {
               $closing = $req->closing[$key];
            } else {
               $closing = ($req->opening[$key] + $req->received[$key]) - ($req->consumption[$key] + $req->transferred[$key]);
            }
            $updateCargo = $cargo->update([
               'opening' => $req->opening[$key],
               'consumption' => $req->consumption[$key],
               'received' => $req->received[$key],
               'transferred' => $req->transferred[$key],
               'closing' => $closing,
               'remarks' => $req->remarks[$key]
            ]);

            if ($cargo->heading_id == 2 || $cargo->heading_id == 1) {
               $actualWater = ($cargo->opening + $cargo->received) - ($cargo->transferred + $cargo->closing);
               $cargo->update([
                  'consumption' => $actualWater
               ]);
            }
         }


         // Jika semuanya berhasil, kita commit transaksi
         DB::commit();

         return redirect()->route('vdr.show', [enkripRambo($req->vdr_id), enkripRambo('cargo')])->with('success', 'VDR Cargo data successfully updated.');
      } catch (\Exception $e) {
         // Jika terjadi kesalahan, kita rollback transaksi
         DB::rollback();
         Log::error('Kesalahan saat menjalankan transaksi: ' . $e->getMessage());
         return back()->with('warning', 'Terjadi kesalahan: ' . $e->getMessage());

         return back()->with('warning', 'Failed, Data gagal di Update!');
         // Handle atau laporkan kesalahan
         // return response()->json(['message' => 'Failed to create order'], 500);
      }
   }

   public function updateCargoOld(Request $req)
   {
      $req->validate([
         'id' => 'required',
         'vdr_id' => 'required'
      ]);

      $cargo = VdrCargo::find($req->id);


      $updateCargo = $cargo->update([
         'opening' => $req->opening,
         'consumption' => $req->consumption,
         'received' => $req->received,
         'transferred' => $req->transferred,
         'closing' => $req->closing,
         'remarks' => $req->remarks
      ]);

      if ($updateCargo) {
         # code...
         return redirect()->back()->with('success', 'Vdr Cargo data successfully updated');
      } else {
         return redirect()->back()->with('warning', 'Vdr Cargo gagal di update!');
      }
   }

   public function updateWeather(Request $req)
   {
      $req->validate([
         'id' => 'required',
         'vdr_id' => 'required'
      ]);

      //   dd('oke');

      $datas = $req->id;

      DB::beginTransaction();

      try {

         foreach ($datas as $key => $weatherId) {

            $weather = VdrWeather::find($weatherId);

            $updateWeather = $weather->update([
               't_0006' => $req->t_0006[$key],
               't_0612' => $req->t_0612[$key],
               't_1218' => $req->t_1218[$key],
               't_1824' => $req->t_1824[$key]
            ]);
         }


         // Jika semuanya berhasil, kita commit transaksi
         DB::commit();

         ModelsLog::create([
            'system' => 'VDR',
            'user_id' => auth()->user()->id,
            'vessel_id' => $weather->vdr->vessel_id,
            'action' => 'Update Weather Condition',
            'vdr_id' => $weather->vdr->id,
            'desc' => 'on VDR ' . $weather->vdr->code,
            'table' => 'vdr_crews'
         ]);
         return redirect()->route('vdr.show', [enkripRambo($req->vdr_id), enkripRambo('weathers')])->with('success', 'VDR Weather data successfully updated.');
      } catch (\Exception $e) {
         // Jika terjadi kesalahan, kita rollback transaksi
         DB::rollback();
         Log::error('Kesalahan saat menjalankan transaksi: ' . $e->getMessage());
         return back()->with('warning', 'Terjadi kesalahan: ' . $e->getMessage());

         return back()->with('warning', 'Failed, Data gagal di Update!');
         // Handle atau laporkan kesalahan
         // return response()->json(['message' => 'Failed to create order'], 500);
      }
   }

   public function updateHse(Request $req)
   {
      $req->validate([
         'id' => 'required',
         'vdr_id' => 'required'
      ]);

      $datas = $req->id;

      DB::beginTransaction();
      // dd($datas);
      try {

         foreach ($datas as $key => $hseId) {

            $hse = VdrHse::find($hseId);
            if ($hse->header_id != '8') {
               # code...
               $updateHse = $hse->update([
                  'previous' => $req->previous[$key],
                  'today' => $req->today[$key],
                  'status' => '1'
               ]);
            }
         }


         // Jika semuanya berhasil, kita commit transaksi
         DB::commit();

         return redirect()->route('vdr.show', [enkripRambo($req->vdr_id), enkripRambo('hse')])->with('success', 'VDR HSE data successfully updated.');
      } catch (\Exception $e) {
         // Jika terjadi kesalahan, kita rollback transaksi
         DB::rollback();
         Log::error('Kesalahan saat menjalankan transaksi: ' . $e->getMessage());
         return back()->with('warning', 'Terjadi kesalahan: ' . $e->getMessage());

         return back()->with('warning', 'Failed, Data gagal di Update!');
         // Handle atau laporkan kesalahan
         // return response()->json(['message' => 'Failed to create order'], 500);
      }
   }

   public function updateEngine(Request $req)
   {
      $req->validate([
         'id' => 'required',
         'vdr_id' => 'required'
      ]);

      $datas = $req->id;

      DB::beginTransaction();
      // dd($datas);
      try {

         foreach ($datas as $key => $engineId) {

            $engine = VdrEngine::find($engineId);
            if ($engine->header_id != '8') {
               # code...
               $updateEngine = $engine->update([
                  'm_ref' => $req->m_ref[$key],
                  'm_port' => $req->m_port[$key],
                  'm_stbd' => $req->m_stbd[$key],
                  'm_center' => $req->m_center[$key],
                  'm_other' => $req->m_other[$key],
                  'a_ref' => $req->a_ref[$key],
                  'a_port' => $req->a_port[$key],
                  'a_stbd' => $req->a_stbd[$key],
                  'a_other' => $req->a_other[$key]
               ]);
            }
         }


         // Jika semuanya berhasil, kita commit transaksi
         DB::commit();

         return redirect()->route('vdr.show', [enkripRambo($req->vdr_id), enkripRambo('engine')])->with('success', 'VDR Engine data successfully updated.');
      } catch (\Exception $e) {
         // Jika terjadi kesalahan, kita rollback transaksi
         DB::rollback();
         Log::error('Kesalahan saat menjalankan transaksi: ' . $e->getMessage());
         return back()->with('warning', 'Terjadi kesalahan: ' . $e->getMessage());

         return back()->with('warning', 'Failed, Data gagal di Update!');
         // Handle atau laporkan kesalahan
         // return response()->json(['message' => 'Failed to create order'], 500);
      }
   }

   public function updateOperating(Request $req)
   {
      $req->validate([
         'id' => 'required',
         'vdr_id' => 'required'
      ]);


      $datas = $req->id;

      DB::beginTransaction();
      // dd($datas);
      try {

         foreach ($datas as $key => $operatingId) {

            $operating = VdrOperating::find($operatingId);

            // dd($req->contractual_fuel[$key]);

            // if ($operating->heading->field != null) {

            # code...
            $updateOperating = $operating->update([
               'speed' => $req->speed[$key],
               'contractual_fuel' => $req->contractual_fuel[$key],
               'daily' => $req->daily[$key]
            ]);
            // echo $updateOperating;
            // }
         }


         // Jika semuanya berhasil, kita commit transaksi
         DB::commit();

         $vdr = Vdr::find($req->vdr_id);
         ModelsLog::create([
            'system' => 'VDR',
            'user_id' => auth()->user()->id,
            'vessel_id' => $vdr->vessel_id,
            'action' => 'Update Operating Data',
            'vdr_id' => $vdr->id,
            'desc' => 'on VDR ' . $vdr->code,
            'table' => 'vdr_operating'
         ]);

         return redirect()->route('vdr.show', [enkripRambo($req->vdr_id), enkripRambo('operating')])->with('success', 'VDR Engine data successfully updated.');
      } catch (\Exception $e) {
         // Jika terjadi kesalahan, kita rollback transaksi
         DB::rollback();
         Log::error('Kesalahan saat menjalankan transaksi: ' . $e->getMessage());
         return back()->with('warning', 'Terjadi kesalahan: ' . $e->getMessage());

         return back()->with('warning', 'Failed, Data gagal di Update!');
         // Handle atau laporkan kesalahan
         // return response()->json(['message' => 'Failed to create order'], 500);
      }
   }


   public function updateCrew(Request $req)
   {
      $req->validate([
         'name' => 'required',
         'is_crew' => 'required',
      ]);


      $vdrCrew = VdrCrew::where('id', $req->id)->first();
      $updateVdr = VdrCrew::where('id', $req->id)
         ->update([
            'is_crew' => $req->is_crew,
            'name' => $req->name,
            'rank' => $req->rank,
            'company' => $req->company
         ]);

      if ($updateVdr) {
         # code...
         ModelsLog::create([
            'system' => 'VDR',
            'user_id' => auth()->user()->id,
            'vessel_id' => $vdrCrew->vdr->vessel_id,
            'action' => 'Update Crew',
            'vdr_id' => $vdrCrew->vdr->id,
            'desc' => 'on VDR ' . $vdrCrew->vdr->code,
            'table' => 'vdr_crews'
         ]);
         return redirect()->route('vdr.show', [enkripRambo($vdrCrew->vdr->id), enkripRambo('crew')])->with('success', 'Crew data successfully updated');
      } else {
         return redirect()->back()->with('warning', 'Crew gagal di update!');
      }
   }

   public function importCrew(Request $req)
   {

      $req->validate([
         'file_upload' => 'required|mimes:xlsx,xls',
      ]);

      // ProductdStokImport
      try {
         Excel::import(new CrewVdr($req->vdr_id), $req->file('file_upload'));

         $count = Session::get('count', 0);

         return redirect()->route('vdr.show', [enkripRambo($req->vdr_id), enkripRambo('crew')])->with('success', "$count crew berhasil di tambah.", Session::forget('count'));
      } catch (\Exception $e) {
         Session::forget('count');
         // 
         return back()->with('error', 'Error importing data: ' . $e->getMessage());
      }
   }


   public function funcStore($lastVdr)
   {


      // dd('ok');
      // $lastVdr = $lastVdr;
      $vessel = Vessel::find($lastVdr->vessel_id);
      // dd(str_replace(' ', '', $vessel->name));


      $lastVdrWeathers =  VdrWeather::where('vdr_id', $lastVdr->id)->get();
      $lastVdrHses = VdrHse::where('vdr_id', $lastVdr->id)->get();
      // dd($lastVdr->id);
      $lastVdrOperatings = VdrOperating::where('vdr_id', $lastVdr->id)->get();
      $lastVdrEngines = VdrEngine::where('vdr_id', $lastVdr->id)->get();
      $lastVdrCrews = VdrCrew::where('vdr_id', $lastVdr->id)->get();

      $vesselVdrs = Vdr::where('vessel_id', $vessel->id)->get();

      // dd($lastVdr->date);



      $today = Carbon::now();
      // dd($today->format('m'));

      $year = $today->format('y');
      $month = $today->format('m');
      $day = $today->format('d');

      // $date = Carbon::create($req->date);
      // $year = $date->format('Y');
      // $month = $date->format('m');
      // $day = $date->format('d');

      // $date = Carbon::create()

      $contract = $lastVdr->contract;
      // dd('contract : ' . $contract);


      if ($vessel->contract_type == 'Non PO') {
         $func = $vessel->func;
         $area = $vessel->area;
      } else {
         $func = '';
         $area = '';
      }


      $vdr = Vdr::create([
         'area' => $vessel->area,
         'vessel_id' => $lastVdr->vessel_id,
         'date' => $today,
         'crew_onduty' => $lastVdr->onduty,
         'crew_max' => $lastVdr->max,
         'location_midnight' => $lastVdr->location_midnight,
         'created_by' => $lastVdr->created_by,
         'contract' => $contract,
         'contract_start' => $lastVdr->contract_start,
         'contract_end' => $lastVdr->contract_end,
         'owner' => $lastVdr->owner,
         'master' => $lastVdr->master,
         'ce' => $lastVdr->ce,
         'status' => 0,

         'func' => $func,
         'area' => $area
      ]);



      $awalan = $contract . "/" . str_replace(' ', '', strtoupper($vessel->name)) . '/';

      // Mengonversi $id ke dalam format tiga digit dengan leading zeros
      $idPadded = sprintf("%02d", count($vesselVdrs) + 1);

      $timestamp = $year  . $month  . $day;

      $vdrHistories = VdrHistory::where('vdr_id', $vdr->id)->get();

      if (count($vdrHistories) > 0) {
         $num = count($vdrHistories);
      } else {
         $num = 0;
      }

      // Menggabungkan awalan dan $idPadded
      $hasil = $awalan . $timestamp . '/' . $num;

      $vdr->update([
         'code' => $hasil
      ]);

      $periodic = VdrPeriodic::create([
         'vdr_id' => $vdr->id,
         'activity' => 'Not Applicable'
      ]);


      foreach (range(1, 10) as $i) {
         VdrActivity::create([
            'vdr_id' => $vdr->id,
            'activity' => '-',
            'start' => '00:00',
            'finish' => '00:00',
            'high' => 00.00,
            'normal' => 00.00,
            'slow' => 00.00,
            'manu' => 00.00,
            'idle' => 00.00,
            'tow' => 00.00,
            'ah' => 00.00,
            'sb' => 00.00,
            'created_by' => auth()->user()->name
         ]);
      }





      $cargoHeadings = VdrCargoHeading::get();
      foreach ($cargoHeadings as $key => $heading) {
         # code...

         $vdrCargo = VdrCargo::where('vdr_id', $vdr->id)
            ->where('heading_id', $heading->id)
            ->first();

         if (!$vdrCargo) {
            # code...
            $createVdrCargo = VdrCargo::create([
               'vdr_id' => $vdr->id,
               'heading_id' => $heading->id,
               'created_by' => $vdr->created_by,
               'created_at' => NOW(),
               'updated_at' => NOW()
            ]);
         }
      }

      $wHeadings = VdrWeatherHeading::get();
      foreach ($wHeadings as $key => $heading) {
         # code...
         $vdrWeather = VdrWeather::where('vdr_id', $vdr->id)
            ->where('heading_id', $heading->id)
            ->first();

         if (!$vdrWeather) {
            # code...
            $createVdrWeather = VdrWeather::create([
               'vdr_id' => $vdr->id,
               'heading_id' => $heading->id,
               'created_at' => NOW(),
               'updated_at' => NOW()
            ]);
         }
      }
      $vdrWeathers = VdrWeather::where('vdr_id', $vdr->id)->get();
      if ($lastVdr) {
         if (count($lastVdrWeathers) > 0) {
            foreach ($vdrWeathers as $vdrWeather) {
               foreach ($lastVdrWeathers as $lastWeather) {
                  if ($lastWeather->heading_id == $vdrWeather->heading_id) {
                     $vdrWeather->update([
                        't_0006' => $lastWeather->t_0006,
                        't_0612' => $lastWeather->t_0612,
                        't_1218' => $lastWeather->t_1218,
                        't_1824' => $lastWeather->t_1824,
                     ]);
                  }
               }
            }
         }
      }

      if ($lastVdr) {
         foreach ($lastVdrCrews as $lastCrew) {
            if ($lastCrew->is_crew == 1) {
               if ($lastCrew->status == null) {
                  $status = 1;
               } else {
                  $status = $lastCrew->status;
               }
               $createVdrCrew = VdrCrew::create([
                  'vdr_id' => $vdr->id,
                  'is_crew' => $lastCrew->is_crew,
                  'name' => $lastCrew->name,
                  'rank' => $lastCrew->rank,
                  'company' => $lastCrew->company,
                  'status' => $status,
                  'created_at' => NOW(),
                  'updated_at' => NOW()
               ]);
            }
         }

         $vdrCrew = VdrCrew::where('vdr_id', $vdr->id)->where('is_crew', 1)->where('status', 1)->get();

         $vdr->update([
            'crew_onduty' => count($vdrCrew)
         ]);
      }





      // HSE
      $hseHeadings = VdrHseHeader::get();
      foreach ($hseHeadings as $key => $heading) {
         # code...
         $vdrHse = VdrHse::where('vdr_id', $vdr->id)
            ->where('header_id', $heading->id)
            ->first();

         if (!$vdrHse) {
            $createVdrHse = VdrHse::create([
               'vdr_id' => $vdr->id,
               'header_id' => $heading->id,
               'created_at' => NOW(),
               'updated_at' => NOW()
            ]);
         }
      }
      $vdrHses = VdrHse::where('vdr_id', $vdr->id)->get();
      // Generate value hse from last VDR
      if ($lastVdr) {
         if (count($lastVdrHses) > 0) {
            // dd('oke');
            foreach ($vdrHses as $vdrHse) {
               // dd($vdrHse->id);
               foreach ($lastVdrHses as $lastHse) {
                  if ($lastHse->header_id == $vdrHse->header_id) {
                     // dd( $lastHse->heading_id);
                     $vdrHse->update([
                        'previous' => $lastHse->previous,
                        'today' => $lastHse->today,
                     ]);
                  }


                  if ($vdrHse->header_id == 7  && $lastHse->header_id == 7) {
                     $vdrHse->update([
                        'previous' => $lastHse->previous + $lastHse->today,
                        'today' => count($vdrCrew) * 14,
                     ]);
                  }
               }
            }
         }
      }






      $engineHeadings = VdrEngineHeading::get();
      foreach ($engineHeadings as $key => $heading) {
         # code...
         $vdrEngine = VdrEngine::where('vdr_id', $vdr->id)
            ->where('heading_id', $heading->id)
            ->first();

         if (!$vdrEngine) {
            # code...
            $createVdrEngine = VdrEngine::create([
               'vdr_id' => $vdr->id,
               'heading_id' => $heading->id,
               'created_at' => NOW(),
               'updated_at' => NOW()
            ]);
         }
      }
      $vdrEngines = VdrEngine::where('vdr_id', $vdr->id)->get();
      if ($lastVdr) {
         if (count($lastVdrEngines) > 0) {
            foreach ($vdrEngines as $vdrEngine) {
               foreach ($lastVdrEngines as $lastVdrEngine) {
                  if ($lastVdrEngine->heading_id == $vdrEngine->heading_id) {
                     $vdrEngine->update([
                        'm_ref' => $lastVdrEngine->m_ref,
                        'm_port' => $lastVdrEngine->m_port,
                        'm_stbd' => $lastVdrEngine->m_stbd,
                        'm_center' => $lastVdrEngine->m_center,
                        'm_other' => $lastVdrEngine->m_other,
                        'a_ref' => $lastVdrEngine->a_ref,
                        'a_port' => $lastVdrEngine->a_port,
                        'a_stbd' => $lastVdrEngine->a_stbd,
                        'a_other' => $lastVdrEngine->a_other
                     ]);
                  }
               }
            }
         }
      }



      $operatingHeadings = VdrOperatingHeader::get();
      foreach ($operatingHeadings as $key => $heading) {
         # code...
         $vdrOperating = VdrOperating::where('vdr_id', $vdr->id)
            ->where('heading_id', $heading->id)
            ->first();

         if (!$vdrOperating) {
            # code...
            $createVdrOperating = VdrOperating::create([
               'vdr_id' => $vdr->id,
               'heading_id' => $heading->id,
               'created_at' => NOW(),
               'updated_at' => NOW()
            ]);
         }
      }
      $vdrOperatings = VdrOperating::where('vdr_id', $vdr->id)->get();
      if ($lastVdr) {
         if (count($lastVdrOperatings) > 0) {
            foreach ($vdrOperatings as $vdrOperating) {
               foreach ($lastVdrOperatings as $lastOperating) {
                  if ($lastOperating->heading_id == $vdrOperating->heading_id) {
                     $vdrOperating->update([
                        'speed' => $lastOperating->speed,
                        'contractual_fuel' => $lastOperating->contractual_fuel,
                        // 'daily' => $lastOperating->daily,
                     ]);
                  }
               }
            }
         }
      }






      // dd($vdr->code);





      return $vdr->id;
      // return redirect()->route('vdr.show', [enkripRambo($vdr->id), enkripRambo('index')])->with('success', 'VDR data successfully saved.');

   }

   public function funcStoreEmpty($vesselId)
   {


      // dd('ok');
      // $lastVdr = $lastVdr;
      $vessel = Vessel::find($vesselId);
      // dd(str_replace(' ', '', $vessel->name));




      $vesselVdrs = Vdr::where('vessel_id', $vessel->id)->get();

      // dd($lastVdr->date);



      $today = Carbon::now();
      $year = $today->format('y');
      $month = $today->format('m');
      $day = $today->format('d');



      $vdr = Vdr::create([
         'area' => $vessel->area,
         'vessel_id' => $vessel->id,
         'date' => $today,
         'crew_onduty' => 0,
         'crew_max' => 0,
         'location_midnight' => '-',
         'created_by' => $vessel->name,
         'contract' => $vessel->contract ?? '-',
         'contract_start' => Carbon::now(),
         'contract_end' => Carbon::now(),
         'owner' => '-',
         'master' => '-',
         'ce' => '-',
         'status' => 0
      ]);


      if ($vessel->contract != null) {
         $contract = $vessel->contract;
      } else {
         $contract = '-';
      }


      $awalan = $contract . "/" . str_replace(' ', '', strtoupper($vessel->name)) . '/';

      // Mengonversi $id ke dalam format tiga digit dengan leading zeros
      $idPadded = sprintf("%02d", count($vesselVdrs) + 1);

      $timestamp = $year  . $month  . $day;

      $vdrHistories = VdrHistory::where('vdr_id', $vdr->id)->get();

      if (count($vdrHistories) > 0) {
         $num = count($vdrHistories);
      } else {
         $num = 0;
      }

      // Menggabungkan awalan dan $idPadded
      $hasil = $awalan . $timestamp . '/' . $num;

      $vdr->update([
         'code' => $hasil
      ]);

      $periodic = VdrPeriodic::create([
         'vdr_id' => $vdr->id,
         'activity' => 'Not Applicable'
      ]);

      $cargoHeadings = VdrCargoHeading::get();
      foreach ($cargoHeadings as $key => $heading) {
         # code...

         $vdrCargo = VdrCargo::where('vdr_id', $vdr->id)
            ->where('heading_id', $heading->id)
            ->first();

         if (!$vdrCargo) {
            # code...
            $createVdrCargo = VdrCargo::create([
               'vdr_id' => $vdr->id,
               'heading_id' => $heading->id,
               'created_by' => $vdr->created_by,
               'remarks' => '-',
               'created_at' => NOW(),
               'updated_at' => NOW()
            ]);
         }
      }

      $wHeadings = VdrWeatherHeading::get();
      foreach ($wHeadings as $key => $heading) {
         # code...
         $vdrWeather = VdrWeather::where('vdr_id', $vdr->id)
            ->where('heading_id', $heading->id)
            ->first();

         if (!$vdrWeather) {
            # code...
            $createVdrWeather = VdrWeather::create([
               'vdr_id' => $vdr->id,
               'heading_id' => $heading->id,
               't_0006' => '-',
               't_0612' => '-',
               't_1218' => '-',
               't_1824' => '-',
               'created_at' => NOW(),
               'updated_at' => NOW()
            ]);
         }
      }


      // HSE
      $hseHeadings = VdrHseHeader::get();
      foreach ($hseHeadings as $key => $heading) {
         # code...
         $vdrHse = VdrHse::where('vdr_id', $vdr->id)
            ->where('header_id', $heading->id)
            ->first();

         if (!$vdrHse) {
            $createVdrHse = VdrHse::create([
               'vdr_id' => $vdr->id,
               'header_id' => $heading->id,
               'created_at' => NOW(),
               'updated_at' => NOW()
            ]);
         }
      }




      $engineHeadings = VdrEngineHeading::get();
      foreach ($engineHeadings as $key => $heading) {
         # code...
         $vdrEngine = VdrEngine::where('vdr_id', $vdr->id)
            ->where('heading_id', $heading->id)
            ->first();

         if (!$vdrEngine) {
            # code...
            $createVdrEngine = VdrEngine::create([
               'vdr_id' => $vdr->id,
               'heading_id' => $heading->id,
               'created_at' => NOW(),
               'updated_at' => NOW()
            ]);
         }
      }

      $operatingHeadings = VdrOperatingHeader::get();
      foreach ($operatingHeadings as $key => $heading) {
         # code...
         $vdrOperating = VdrOperating::where('vdr_id', $vdr->id)
            ->where('heading_id', $heading->id)
            ->first();

         if (!$vdrOperating) {
            # code...
            $createVdrOperating = VdrOperating::create([
               'vdr_id' => $vdr->id,
               'heading_id' => $heading->id,
               'speed' => 0,
               'contractual_fuel' => 0,
               'created_at' => NOW(),
               'updated_at' => NOW()
            ]);
         }
      }


      VdrCrew::create([
         'vdr_id' => $vdr->id,
         'is_crew' => 1,
         'name' => '',
         'rank' => '',
         'company' => '',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);

      VdrCrew::create([
         'vdr_id' => $vdr->id,
         'is_crew' => 0,
         'name' => '',
         'rank' => '',
         'company' => '',
         'created_at' => NOW(),
         'updated_at' => NOW()
      ]);










      return $vdr->id;
      // return redirect()->route('vdr.show', [enkripRambo($vdr->id), enkripRambo('index')])->with('success', 'VDR data successfully saved.');

   }
}
