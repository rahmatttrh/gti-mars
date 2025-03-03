<?php

namespace App\Http\Controllers;

use App\Imports\CrewVdr;
use App\Models\Log as ModelsLog;
use App\Models\Vdr;
use App\Models\VdrActivity;
use App\Models\VdrCargo;
use App\Models\VdrCargoHeading;
use App\Models\VdrCrew;
use App\Models\VdrEngine;
use App\Models\VdrEngineHeading;
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
      



      //   pages.vdr.create-vdr
      return view('pages-stisla.vdr.home-vessel', [
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
         'periodic' => $periodic,
         'totalJam' => $totalJam,
         'totalDaily' => $totalDaily
      ])->with('i');
   }

   public function vdrCreate()
   {

        $user = auth()->user();

        // Opsi 1 
        $vessel = Vessel::where('email', $user->email)->first();

        $vdr = null;

        $activities = $vdr ? VdrActivity::where('vdr_id', $vdr->id)->get() : null;
        $cargos = $vdr ? VdrCargo::where('vdr_id', $vdr->id)->get() : null;
        $weathers = $vdr ? VdrWeather::where('vdr_id', $vdr->id)->get() : null;
        $hses = $vdr ? VdrHse::where('vdr_id', $vdr->id)->get() : null;
        $engines = $vdr ? VdrEngine::where('vdr_id', $vdr->id)->get() : null;
        $crews = $vdr ? VdrCrew::where('vdr_id', $vdr->id)->orderBy('is_crew', 'desc')->get() : null;
        $operatings = $vdr ? VdrOperating::where('vdr_id', $vdr->id)->get() : null;
        $totalJam = $vdr ? VdrOperating::where('vdr_id', $vdr->id)->sum('time') : null;
        $totalDaily = $vdr ? VdrOperating::where('vdr_id', $vdr->id)->sum('daily') : null;



      //   pages.vdr.create-vdr
      return view('pages-stisla.vdr.home-vessel', [
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
            'totalDaily' => $totalDaily
        ])->with('i');
   }

   public function show($id)
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
      $vdrs = Vdr::get();

      $totalHours = '';
      $debugHours = 0;
      $debugMinutes = 0;
      $ops = VdrOperating::where('vdr_id', $vdr->id)->get() ;
      foreach($ops as $op){
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
      // dd($debugMinutes);
 
      // dd($totalJam);
      return view('pages-stisla.vdr.detail', [
      //   return view('pages.vdr.show-vdr', [
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
         'totalJam' => $debugHours . ':'. $debugMinutes,
         'totalDaily' => $totalDaily,
         'vdrs' => $vdrs
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

      DB::beginTransaction();

      try {

         $vdr = Vdr::create([
            
               'vessel_id' => $req->vessel_id,
               'date' => $req->date,
               'crew_onduty' => $req->onduty,
               'crew_max' => $req->max,
               'location_midnight' => $req->location_midnight,
               'created_by' => $req->created_by,
               'status' => 0
         ]);

         $vdr->update([
            'code' => vdrId($vdr->id)
         ]);

         $periodic = VdrPeriodic::create([
            'vdr_id' => $vdr->id
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

         $hseHeadings = VdrHseHeader::get();
         foreach ($hseHeadings as $key => $heading) {
               # code...
               $vdrHse = VdrHse::where('vdr_id', $vdr->id)
                  ->where('header_id', $heading->id)
                  ->first();

               if (!$vdrHse) {
                  # code...
                  $createVdrWeather = VdrHse::create([
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
                     'created_at' => NOW(),
                     'updated_at' => NOW()
                  ]);
               }
         }


         // Jika semuanya berhasil, kita commit transaksi
         DB::commit();

         // $vessel = Vessel::where('email', auth()->user()->email)->first();
         ModelsLog::create([
            'system' => 'VDR',
            'user_id' => auth()->user()->id,
            'vessel_id' => $vdr->vessel_id,
            'action' => 'Create VDR',
            'vdr_id' => $vdr->id,
            'desc' => '',
            'table' => 'vdrs'
         ]);

         return redirect()->route('vdr.show', enkripRambo($vdr->id))->with('success', 'VDR data successfully saved.');
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



      DB::beginTransaction();
      // dd($req->sb);
      try {
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
         if ($totalMinute > 0) {
            $grandMinute = explode('.', "$sum", 2)[1];
         } else {
            $grandMinute = 0;
         }
         // dd($sum);
         

         // dd(intval($totalMinute));
         $currentStart = new Carbon($req->start);
         // dd($currentStart);
         $start = $currentStart;
         $grandTotal = $currentStart->addHours($totalHour);
         // dd($sum);
         $grandFinal = $grandTotal->addMinutes(intval($totalMinute));
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
            $totalHigh = $activities->sum('high');
            $totalNormal = $activities->sum('normal');
            $totalSlow = $activities->sum('slow');
            $totalManu = $activities->sum('manu');
            $totalIdle = $activities->sum('idle');
            $totalTow = $activities->sum('tow');
            $totalAh = $activities->sum('ah');
            $totalSb = $activities->sum('sb');

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

         ModelsLog::create([
            'system' => 'VDR',
            'user_id' => auth()->user()->id,
            'vessel_id' => $vdr->vessel_id,
            'action' => 'Add Activity',
            'vdr_id' => $vdr->id,
            'desc' => 'on VDR ' . $vdr->code,
            'table' => 'vdr_activities'
         ]);

         return back()->with('success', 'Activity data successfully saved.');
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
         return redirect()->back()->with('success', 'Crew / Passenger data successfully saved');
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


         foreach ($operatings as $operating) {

               $field = $operating->heading->field;


               if ($field) {
                  # code...
                  $totalWaktu = $totalMode[$field];

                  $updateOperating = $operating->update([
                     'time' => floatval($totalWaktu)
                  ]);
               }
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

         return back()->with('success', 'Activity data successfully updated.');
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

         $daily = round($a + $b);
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

         ModelsLog::create([
            'system' => 'VDR',
            'user_id' => auth()->user()->id,
            'action' => 'Delete Activity',
            'desc' => 'on VDR ' . $vdr->code,
            'table' => 'vdr_activities'
         ]);
         return redirect()->back()->with('success', 'Activity data successfully deleted');
      } else {
         return redirect()->back()->with('warning', 'Activity gagal di delete!');
      }
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
         return redirect()->back()->with('success', 'VDR Crew data successfully deleted');
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

               

               if($cargo->heading_id == 1){
                  $closing = $req->closing[$key];
               } elseif($cargo->heading_id == 2){
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

         return back()->with('success', 'VDR Cargo data successfully updated.');
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
         return back()->with('success', 'VDR Weather data successfully updated.');
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

         return back()->with('success', 'VDR HSE data successfully updated.');
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

         return back()->with('success', 'VDR Engine data successfully updated.');
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

         return back()->with('success', 'VDR Engine data successfully updated.');
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
         return redirect()->back()->with('success', 'Crew data successfully updated');
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

         return back()->with('success', "$count crew berhasil di tambah.", Session::forget('count'));
      } catch (\Exception $e) {
         Session::forget('count');
         // 
         return back()->with('error', 'Error importing data: ' . $e->getMessage());
      }
   }
}
