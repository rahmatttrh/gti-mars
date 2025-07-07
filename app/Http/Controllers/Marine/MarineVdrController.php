<?php

namespace App\Http\Controllers\Marine;

use App\Http\Controllers\Controller;
use App\Models\Cargo;
use App\Models\Log;
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
      // dd('ok');
      if (auth()->user()->hasRole('admin-dsp') || auth()->user()->hasRole('superadmin-dsp')) {
         return view('pages-stisla.forbidden');
      }

      

      $vdrAlerts = Vdr::where('status', 1)->get();

      // return view('pages.vdr.marine.index');
      $today = Carbon::now();
      // dd($today->month);
      $vessels = Vessel::get();
      // $vessel = Vessel::find(11);
      $vdrs = Vdr::where('status', '>=', 1)->orderBy('date', 'desc')->get();
      // dd($vdrs);

      // $operatingHeaders = VdrOperatingHeader::get();
      // // dd(count($operatingHeaders));

      // foreach($operatingHeaders as $head){

      // }

      if ($today->month == 1) {
         $monthName = 'Januari';
      } else if ($today->month == 2) {
         $monthName = 'Februari';
      } else if ($today->month == 3) {
         $monthName = 'Maret';
      } else if ($today->month == 4) {
         $monthName = 'April';
      } else if ($today->month == 5) {
         $monthName = 'Mei';
      } else if ($today->month == 6) {
         $monthName = 'Juni';
      } else if ($today->month == 7) {
         $monthName = 'Juli';
      } else if ($today->month == 8) {
         $monthName = 'Agustus';
      } else if ($today->month == 9) {
         $monthName = 'September';
      } else if ($today->month == 10) {
         $monthName = 'Oktober';
      } else if ($today->month == 11) {
         $monthName = 'November';
      } else if ($today->month == 12) {
         $monthName = 'Desember';
      }

      $dateFinal = array();
      $value = array();
      $fuel = array();
      $now = Carbon::now();
      // $lastWeek = $now->addDays(-4);

      // dd($lastWeek);

      // $day1 = $now->addDays(-1);
      // $day2 = $now->addDays(-2);


      $start = $now->startOfWeek(Carbon::TUESDAY);
      $end = $now->endOfWeek(Carbon::MONDAY);

      // $dateArray[] = $now;
      // $dateArray[] = $day1;
      // $dateArray[] = $day2;

      $endDate = Carbon::now()->addDays(1);
      // dd($startDate);
      $startDate = Carbon::now()->addDays(-6);

      // $endDate = new Carbon($req->end);
      $dates = array();
      while ($startDate->lte($endDate)){
         $dates[] = $startDate->toDateString();
         $startDate->addDay();
      }
      

      // dd($dates);

      foreach($dates as $date){
         $vdrs = Vdr::where('status', '>', 0)->whereNotIn('status', [101, 202, 303])->where('date', $date)->get();

         $totalTime = null;
         $totalFuel = null;
         foreach ($vdrs as $vdr) {
            $operatings = VdrOperating::where('vdr_id', $vdr->id)->get();
            $totalTime += $operatings->sum('time');
            $totalFuel += $operatings->sum('daily');
         }

         

         // dd($operatings);
         $dateFinal[] = formatDateOnly($date);
         $value[] = $totalTime;
         $fuel[] = $totalFuel;


      }

      // dd($date);
      // foreach ($vdrs as $vdr) {
      //    $operatings = VdrOperating::where('vdr_id', $vdr->id)->get();
      //    $totalTime = $operatings->sum('time');
      //    $totalFuel = $operatings->sum('daily');

        
      //    $date[] = formatDateOnly($vdr->date);
      //    $value[] = $totalTime;
      //    $fuel[] = $totalFuel;
      // }
      

      $vdrs= Vdr::where('status', '>', 0)->where('date', Carbon::now())->orderBy('created_at', 'desc')->get();


      // dd($value);
      return view('pages-stisla.vdr.home-marine', [
         'now' => Carbon::now(),
         'title' => 'Today',
         'vdrAlerts' => $vdrAlerts,
         'thisMonth' => $today->month,
         'thisYear' => $today->year,
         'monthName' => $monthName,
         'vdrs' => $vdrs,
         'thisVessel' => null,
         'vessel' => null,
         'vessels' => $vessels,
         'date' => $dateFinal,
         'value' => $value,
         'fuel' => $fuel
      ])->with('i');
   }

   public function indexAll()
   {
      // dd('ok');
      if (auth()->user()->hasRole('admin-dsp') || auth()->user()->hasRole('superadmin-dsp')) {
         return view('pages-stisla.forbidden');
      }

      

      $vdrAlerts = Vdr::where('status', 1)->get();

      // return view('pages.vdr.marine.index');
      $today = Carbon::now();
      // dd($today->month);
      $vessels = Vessel::get();
      // $vessel = Vessel::find(11);
      $vdrs = Vdr::where('status', '>=', 1)->orderBy('date', 'desc')->get();
      // dd($vdrs);

      // $operatingHeaders = VdrOperatingHeader::get();
      // // dd(count($operatingHeaders));

      // foreach($operatingHeaders as $head){

      // }

      if ($today->month == 1) {
         $monthName = 'Januari';
      } else if ($today->month == 2) {
         $monthName = 'Februari';
      } else if ($today->month == 3) {
         $monthName = 'Maret';
      } else if ($today->month == 4) {
         $monthName = 'April';
      } else if ($today->month == 5) {
         $monthName = 'Mei';
      } else if ($today->month == 6) {
         $monthName = 'Juni';
      } else if ($today->month == 7) {
         $monthName = 'Juli';
      } else if ($today->month == 8) {
         $monthName = 'Agustus';
      } else if ($today->month == 9) {
         $monthName = 'September';
      } else if ($today->month == 10) {
         $monthName = 'Oktober';
      } else if ($today->month == 11) {
         $monthName = 'November';
      } else if ($today->month == 12) {
         $monthName = 'Desember';
      }

      $dateFinal = array();
      $value = array();
      $fuel = array();
      $now = Carbon::now();
      // $lastWeek = $now->addDays(-4);

      // dd($lastWeek);

      // $day1 = $now->addDays(-1);
      // $day2 = $now->addDays(-2);


      $start = $now->startOfWeek(Carbon::TUESDAY);
      $end = $now->endOfWeek(Carbon::MONDAY);

      // $dateArray[] = $now;
      // $dateArray[] = $day1;
      // $dateArray[] = $day2;

      $endDate = Carbon::now()->addDays(1);
      // dd($startDate);
      $startDate = Carbon::now()->addDays(-6);

      // $endDate = new Carbon($req->end);
      $dates = array();
      while ($startDate->lte($endDate)){
         $dates[] = $startDate->toDateString();
         $startDate->addDay();
      }
      

      // dd($dates);

      foreach($dates as $date){
         $vdrs = Vdr::where('status', '>', 0)->whereNotIn('status', [101, 202, 303])->where('date', $date)->get();

         $totalTime = null;
         $totalFuel = null;
         foreach ($vdrs as $vdr) {
            $operatings = VdrOperating::where('vdr_id', $vdr->id)->get();
            $totalTime += $operatings->sum('time');
            $totalFuel += $operatings->sum('daily');
         }

         

         // dd($operatings);
         $dateFinal[] = formatDateOnly($date);
         $value[] = $totalTime;
         $fuel[] = $totalFuel;


      }

      // dd($date);
      // foreach ($vdrs as $vdr) {
      //    $operatings = VdrOperating::where('vdr_id', $vdr->id)->get();
      //    $totalTime = $operatings->sum('time');
      //    $totalFuel = $operatings->sum('daily');

        
      //    $date[] = formatDateOnly($vdr->date);
      //    $value[] = $totalTime;
      //    $fuel[] = $totalFuel;
      // }

      $vdrs= Vdr::where('status', '>', 0)->orderBy('date', 'desc')->get();


      // dd($value);
      return view('pages-stisla.vdr.home-marine', [
         'now' => Carbon::now(),
         'title' => 'All',
         'vdrAlerts' => $vdrAlerts,
         'thisMonth' => $today->month,
         'thisYear' => $today->year,
         'monthName' => $monthName,
         'vdrs' => $vdrs,
         'thisVessel' => null,
         'vessel' => null,
         'vessels' => $vessels,
         'date' => $dateFinal,
         'value' => $value,
         'fuel' => $fuel
      ])->with('i');
   }


   public function validation()
   {
      if (auth()->user()->username == 'pet') {
         $vdrValidations = Vdr::where('status', 1)->orderBy('updated_at', 'desc')->get();
      } elseif (auth()->user()->username == 'marine') {
         $vdrValidations = Vdr::where('status', 2)->orderBy('updated_at', 'desc')->get();
      } elseif (auth()->user()->username == 'lutfi') {
         $vdrValidations = Vdr::where('status', 3)->orderBy('updated_at', 'desc')->get();
      }

      return view('pages-stisla.marine.vdr.validation', [
         'title' => 'Validation',
         'vdrs' => $vdrValidations
      ])->with('i');
   }

   public function validationPet()
   {

      $vdrValidations = Vdr::where('status', 1)->orderBy('updated_at', 'desc')->get();


      return view('pages-stisla.marine.vdr.validation', [
         'title' => 'Validation',
         'vdrs' => $vdrValidations
      ])->with('i');
   }

   public function rejectPet()
   {

      $vdrValidations = Vdr::where('status', 101)->orderBy('updated_at', 'desc')->get();


      return view('pages-stisla.marine.vdr.validation', [
         'title' => 'Reject',
         'vdrs' => $vdrValidations
      ])->with('i');
   }

   public function rejectMarine()
   {

      $vdrValidations = Vdr::where('status', 202)->orderBy('updated_at', 'desc')->get();


      return view('pages-stisla.marine.vdr.validation', [
         'title' => 'Reject',
         'vdrs' => $vdrValidations
      ])->with('i');
   }

   public function rejectSuptent()
   {

      $vdrValidations = Vdr::where('status', 303)->orderBy('updated_at', 'desc')->get();


      return view('pages-stisla.marine.vdr.validation', [
         'title' => 'Reject',
         'vdrs' => $vdrValidations
      ])->with('i');
   }

   public function rejectList()
   {

      // if (auth()->user()->username == 'pet') {
      //    $vdrValidations = Vdr::where('status', 101)->orderBy('updated_at', 'desc')->get();
      // } elseif(auth()->user()->username == 'marine'){
      //    $vdrValidations = Vdr::where('status', 202)->orderBy('updated_at', 'desc')->get();
      // } elseif(auth()->user()->username == 'suptent'){
      //    $vdrValidations = Vdr::where('status', 303)->orderBy('updated_at', 'desc')->get();
      // }

      $vdrValidations = Vdr::whereIn('status', [303,202,101])->orderBy('updated_at', 'desc')->get();
      

      
      return view('pages-stisla.marine.vdr.validation', [
         'vdrs' => $vdrValidations,
         'title' => 'Reject'
      ])->with('i');
   }

   public function historyList()
   {

      if (auth()->user()->username == 'pet') {
         $vdrs = Vdr::where('status', '>', 1)->whereNotIn('status', [303,202,101])->orderBy('updated_at', 'desc')->get();
      } elseif(auth()->user()->username == 'marine'){
         $vdrs = Vdr::where('status', '>', 2)->whereNotIn('status', [303,202,101])->orderBy('updated_at', 'desc')->get();
      } elseif(auth()->user()->username == 'suptent'){
         $vdrs = Vdr::where('status', '>', 3)->whereNotIn('status', [303,202,101])->orderBy('updated_at', 'desc')->get();
      }
      


      return view('pages-stisla.marine.vdr.validation', [
         'title' => 'History',
         'vdrs' => $vdrs
      ])->with('i');
   }

   public function validationSuptent()
   {

      $vdrValidations = Vdr::where('status', 3)->orderBy('updated_at', 'desc')->get();


      return view('pages-stisla.marine.vdr.validation', [
         'vdrs' => $vdrValidations
      ])->with('i');
   }

   public function validationComplete()
   {

      $vdrValidations = Vdr::where('status', 4)->orderBy('updated_at', 'desc')->get();


      return view('pages-stisla.marine.vdr.validation', [
         'vdrs' => $vdrValidations
      ])->with('i');
   }

   public function approvePet(Request $req)
   {
      // $dekripId = dekripRambo($id);
      $vdr = Vdr::find($req->id);
      $vdr->update([
         'status' => 2,
         'title1' => $req->title1,
         'name1' => $req->name1,
      ]);


      Log::create([
         'system' => 'VDR',
         'user_id' => auth()->user()->id,
         'action' => 'Approve VDR',
         'vdr_id' => $vdr->id,
         'desc' => 'PET',
         'table' => 'vdrs'
      ]);

      VdrTimestamp::create([
         'vdr_id' => $vdr->id,
         'status' => 2,
         'user_id' => auth()->user()->id
      ]);
      // dd()

      return redirect()->back()->with('success', 'VDR PET Approved');
   }

   public function approveMarine(Request $req)
   {
      // $dekripId = dekripRambo($id);
      $vdr = Vdr::find($req->id);
      $vdr->update([
         'status' => 3,
         'title1' => $req->title2,
         'name1' => $req->name2,
      ]);


      Log::create([
         'system' => 'VDR',
         'user_id' => auth()->user()->id,
         'action' => 'Approve VDR',
         'vdr_id' => $vdr->id,
         'desc' => 'Marine',
         'table' => 'vdrs'
      ]);

      VdrTimestamp::create([
         'vdr_id' => $vdr->id,
         'status' => 3,
         'user_id' => auth()->user()->id
      ]);
      // dd()

      return redirect()->back()->with('success', 'VDR Marine Approved');
   }

   public function approveSuptent(Request $req)
   {
      // $dekripId = dekripRambo($id);

      dd('approve suptent');
      $vdr = Vdr::find($req->id);
      $vdr->update([
         'status' => 4,
         'title1' => $req->title3,
         'name1' => $req->name3,
      ]);


      Log::create([
         'system' => 'VDR',
         'user_id' => auth()->user()->id,
         'action' => 'Approve VDR',
         'vdr_id' => $vdr->id,
         'desc' => 'Superintendent',
         'table' => 'vdrs'
      ]);

      VdrTimestamp::create([
         'vdr_id' => $vdr->id,
         'status' => 4,
         'user_id' => auth()->user()->id
      ]);
      // dd()

      return redirect()->back()->with('success', 'VDR Marine Approved');
   }


   public function approve($id)
   {
      $dekripId = dekripRambo($id);
      $vdr = Vdr::find($dekripId);
      $vdr->update([
         'status' => 3,
         'title2' => 'Marine',
         'name2' => 'Capt. Umar',
      ]);



      VdrTimestamp::create([
         'vdr_id' => $vdr->id,
         'status' => 3,
         'user_id' => auth()->user()->id
      ]);
      // dd()

      return redirect()->back()->with('success', 'VDR Marine Approved');
   }

   public function approveForm(Request $req)
   {

      $vdr = Vdr::find($req->vdr);
      $vdr->update([
         'status' => 3,
         'title2' => 'Marine Dept',
         'name2' => $req->name2,
      ]);



      VdrTimestamp::create([
         'vdr_id' => $vdr->id,
         'status' => 3,
         'user_id' => auth()->user()->id
      ]);
      // dd()

      return redirect()->back()->with('success', 'VDR Marine Approved');
   }

   public function reject(Request $req)
   {
      $vdr = Vdr::find($req->vdr);

      if (auth()->user()->username == 'pet') {
         $status = 101;
      } elseif(auth()->user()->username == 'marine'){
         $status = 202;
      } elseif(auth()->user()->username == 'lutfi'){
         $status = 303;
      }


      $vdr->update([
         'status' => $status,
         'reject_by' => auth()->user()->id,
         'reject_date' => Carbon::now(),
         'reject_desc' => $req->desc
      ]);
      

      VdrTimestamp::create([
         'vdr_id' => $vdr->id,
         'type' => 'reject',
         'status' => 1,
         'user_id' => auth()->user()->id,
         'desc' => $req->desc
      ]);

      return redirect()->back()->with('success', 'VDR Rejected, sent back to Vessel');
   }

   // public function approveSuptent($id){
   //    $dekripId = dekripRambo($id);
   //    $vdr = Vdr::find($dekripId);
   //    $vdr->update([
   //       'status' => 3
   //    ]);
   //    VdrTimestamp::create([
   //       'vdr_id' => $vdr->id,
   //       'status' => 3,
   //       'user_id' => auth()->user()->id
   //    ]);

   //    return redirect()->back()->with('success', 'VDR Suptent Approved');
   // }

   public function approveLuthfi($id)
   {
      $dekripId = dekripRambo($id);
      $vdr = Vdr::find($dekripId);
      // dd('lutfi');

      // dd($vdr->title1);
      $vdr->update([
         'status' => 4,
         'title3' => 'Suptent',
         'name3' => 'Lutfi',
      ]);

      // dd($vdr->name3);
      // dd()

      VdrTimestamp::create([
         'vdr_id' => $vdr->id,
         'status' => 4,
         'user_id' => auth()->user()->id
      ]);

      return redirect()->back()->with('success', 'VDR Approved');
   }
}
