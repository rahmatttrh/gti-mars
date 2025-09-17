<?php

namespace App\Http\Controllers\Marine;

use App\Http\Controllers\Controller;
use App\Http\Controllers\EmailController;
use App\Models\Cargo;
use App\Models\Employee;
use App\Models\Log;
use App\Models\Vdr;
use App\Models\VdrActivity;
use App\Models\VdrCargo;
use App\Models\VdrCrew;
use App\Models\VdrHse;
use App\Models\VdrOperating;
use App\Models\VdrPeriodic;
use App\Models\VdrTimestamp;
use App\Models\VdrWeather;
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

      if (auth()->user()->hasRole('suptent_loc') || auth()->user()->hasRole('superadmin-dsp')) {
         return redirect()->route('vdr.marine.validation');
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
      while ($startDate->lte($endDate)) {
         $dates[] = $startDate->toDateString();
         $startDate->addDay();
      }


      // dd($dates);

      foreach ($dates as $date) {
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


      $vdrs = Vdr::where('status', '>', 0)->orderBy('created_at', 'desc')->whereIn('status', [1, 2, 3, 5])->get();


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
      while ($startDate->lte($endDate)) {
         $dates[] = $startDate->toDateString();
         $startDate->addDay();
      }


      // dd($dates);

      foreach ($dates as $date) {
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

      $vdrs = Vdr::where('status', '>', 0)->orderBy('updated_at', 'desc')->get();


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
         'fuel' => $fuel,
         'start' => null,
         'end' => null
      ])->with('i');
   }


   public function validation()
   {

      $vdrValidations = collect();
      if (auth()->user()->username == 'pet') {
         $vdrValidations = Vdr::where('status', 1)->orderBy('updated_at', 'desc')->get();
      } elseif (auth()->user()->username == 'marine') {
         $vdrValidations = Vdr::where('status', 2)->orderBy('updated_at', 'desc')->get();
      } elseif (auth()->user()->username == 'lutfiaryanto') {
         $vdrValidations = Vdr::where('status', 3)->orderBy('updated_at', 'desc')->get();
      }

      // if (auth()->user()->hasRole('suptent_loc')) {
      //    $vdrValidations = Vdr::where('area', auth()->user()->getArea())->where('status', 5)->orderBy('updated_at', 'desc')->get();
      // }

      if (auth()->user()->hasRole('suptent_loc')) {
         $employee = Employee::where('username', auth()->user()->username)->first();
         if ($employee->area != null) {
            $vdrValidations = Vdr::where('area',  $employee->area)->whereIn('status', [5])->orderBy('updated_at', 'desc')->get();
         } else {
            $vdrValidations = Vdr::where('func', $employee->func)->whereIn('status', [5])->orderBy('updated_at', 'desc')->get();
         }

         // dd($vdrs);
      }

      if (auth()->user()->hasRole('superuser')) {
         $vdrValidations = Vdr::get();
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

      $vdrValidations = Vdr::whereIn('status', [303, 202, 101])->orderBy('updated_at', 'desc')->get();



      return view('pages-stisla.marine.vdr.validation', [
         'vdrs' => $vdrValidations,
         'title' => 'Reject'
      ])->with('i');
   }

   public function historyList()
   {

      if (auth()->user()->username == 'pet') {
         $vdrs = Vdr::where('status', '>', 1)->whereNotIn('status', [303, 202, 101])->orderBy('updated_at', 'desc')->get();
      } elseif (auth()->user()->username == 'marine') {
         $vdrs = Vdr::where('status', '>', 2)->whereNotIn('status', [303, 202, 101])->orderBy('updated_at', 'desc')->get();
      } elseif (auth()->user()->username == 'lutfiaryanto') {
         $vdrs = Vdr::where('status', '>', 3)->whereNotIn('status', [303, 202, 101])->orderBy('updated_at', 'desc')->get();
      }



      if (auth()->user()->hasRole('suptent_loc')) {
         $employee = Employee::where('username', auth()->user()->username)->first();
         if ($employee->area != null) {
            $vdrs = Vdr::where('area',  $employee->area)->whereIn('status', [3, 4])->orderBy('updated_at', 'desc')->get();
         } else {
            $vdrs = Vdr::where('func', $employee->func)->whereIn('status', [3, 4])->orderBy('updated_at', 'desc')->get();
         }

         // dd($vdrs);
      }

      $vessels = Vessel::get();
      $vessel = null;

      return view('pages-stisla.marine.vdr.history', [
         'title' => 'History',
         'vdrs' => $vdrs,
         'vessels' => $vessels,
         'vessel' => $vessel
      ])->with('i');
   }

   public function validationSuptent()
   {

      $vdrValidations = Vdr::whereIn('status', [3, 5])->orderBy('updated_at', 'desc')->get();


      return view('pages-stisla.marine.vdr.validation', [
         'vdrs' => $vdrValidations,
         'title' => 'Validation'
      ])->with('i');
   }

   public function validationComplete()
   {

      $vdrValidations = Vdr::where('status', 4)->orderBy('updated_at', 'desc')->get();


      return view('pages-stisla.marine.vdr.validation', [
         'vdrs' => $vdrValidations,
         'title' => 'Complete'
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
         'timestamp1' => Carbon::now()
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

      $emailController = new EmailController();
      $emailController->approvalVdrMarine(enkripRambo($vdr->id));

      return redirect()->back()->with('success', 'VDR PET Approved');
   }

   public function approvePetFromEmail(Request $req)
   {
      // $dekripId = dekripRambo($id);
      $vdr = Vdr::find($req->id);
      $vdr->update([
         'status' => 2,
         'title1' => $req->title1,
         'name1' => $req->name1,
      ]);


      // Log::create([
      //    'system' => 'VDR',
      //    'user_id' => auth()->user()->id,
      //    'action' => 'Approve VDR',
      //    'vdr_id' => $vdr->id,
      //    'desc' => 'PET',
      //    'table' => 'vdrs'
      // ]);

      // VdrTimestamp::create([
      //    'vdr_id' => $vdr->id,
      //    'status' => 2,
      //    'user_id' => auth()->user()->id
      // ]);
      // dd()

      $emailController = new EmailController();
      $emailController->approvalVdrMarine(enkripRambo($vdr->id));

      return redirect()->route('vdr.pdf.email', [enkripRambo($vdr->id), enkripRambo('pet')])->with('success', 'VDR Approved');
   }

   public function approveMarine(Request $req)
   {
      dd('marine');
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

   public function approveSuptent($id)
   {
      // $dekripId = dekripRambo($id);

      // dd('approve suptent');
      $vdr = Vdr::find(dekripRambo($id));

      if ($vdr->area != null) {
         $title = 'Marine Representative';
      } else {
         $title = 'Suptent';
      }
      $vdr->update([
         'status' => 4,
         'title3' => $title,
         'name3' => auth()->user()->name,
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


   // VDR Approve Marine with form option PIC
   public function approveForm(Request $req)
   {
      $vdr = Vdr::find($req->vdr);
      $vessel = Vessel::find($vdr->vessel_id);

      // Cek Vessel Uner PO atau Non PO
      if ($vessel->contract_type == 'Under PO') {

         // Cek Vessel IPB atau bukan
         if ($vessel->ipb == 'IPB') {
            // dd('IPB');
            // jika Vessel IPB butuh validasi Suptent BU
            $status = 5;

            // $emailController = new EmailController();
            // $emailController->approvalVdrSuptentBu(enkripRambo($vdr->id));
         } else {
            // dd('Non IPB');
            // Jika bukan Vessel IPB langsung ke Suptent (Pak Lutfi)
            $status = 3;

            $emailController = new EmailController();
            $emailController->approvalVdrSuptent(enkripRambo($vdr->id));
         }
      } else {

         // dd('non po');
         // Jika Vessel Non PO butuh validasi Suptent Func
         $status = 5;
         $emailController = new EmailController();
         $emailController->approvalVdrSuptentLoc(enkripRambo($vdr->id));
      }

      // $status = 3;

      // $emailController = new EmailController();
      // $emailController->approvalVdrSuptent(enkripRambo($vdr->id));

      // dd($status);
      $vdr->update([
         'status' => $status,
         'title2' => 'Marine Dept',
         'name2' => $req->name2,
         'timestamp2' => Carbon::now()
      ]);



      VdrTimestamp::create([
         'vdr_id' => $vdr->id,
         'status' => $status,
         'user_id' => auth()->user()->id
      ]);
      // dd()


      // $emailController = new EmailController();
      // $emailController->approvalVdrSuptent(enkripRambo($vdr->id));



      return redirect()->back()->with('success', 'VDR Marine Approved');
   }

   public function approveFormEmail(Request $req)
   {

      $vdr = Vdr::find($req->vdr);
      // dd($req->name2);

      $vessel = Vessel::find($vdr->vessel_id);

      if ($vessel->contract_type == 'Under PO') {
         $status = 3;
      } else {
         $status = 5;
      }
      // dd($status);
      $vdr->update([
         'status' => $status,
         'title2' => 'Marine Dept',
         'name2' => $req->name2,
      ]);



      // VdrTimestamp::create([
      //    'vdr_id' => $vdr->id,
      //    'status' => $status,
      //    'user_id' => auth()->user()->id
      // ]);
      // dd()

      // $emailController = new EmailController();
      // $emailController->approvalVdr(enkripRambo($vdr->id));

      $emailController = new EmailController();
      $emailController->approvalVdrSuptent(enkripRambo($vdr->id));

      return redirect()->back()->with('success', 'VDR Marine Approved');
   }


   public function approveSuptentLocForm(Request $req)
   {

      $vdr = Vdr::find($req->vdr);

      $vessel = Vessel::find($vdr->vessel_id);


      // dd($status);
      $vdr->update([
         'status' => 3,
         'title4' => 'Suptent',
         'name4' => auth()->user()->name,
      ]);



      VdrTimestamp::create([
         'vdr_id' => $vdr->id,
         'status' => 3,
         'user_id' => auth()->user()->id
      ]);
      // dd()

      $emailController = new EmailController();
      $emailController->approvalVdrSuptent(enkripRambo($vdr->id));

      return redirect()->back()->with('success', 'VDR Suptent Location Approved');
   }

   public function reject(Request $req)
   {
      $vdr = Vdr::find($req->vdr);

      if (auth()->user()->username == 'pet') {
         $status = 101;
      } elseif (auth()->user()->username == 'marine') {
         $status = 202;
      } elseif (auth()->user()->username == 'lutfiaryanto') {
         $status = 303;
      }


      $vdr->update([
         'status' => $status,
         'reject_by' => auth()->user()->id,
         'reject_date' => Carbon::now(),
         'reject_desc' => $req->desc,
         // 'reject_data' => $req->data
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

   public function rejectFromEmailStore(Request $req)
   {
      $vdr = Vdr::find($req->vdr);

      if ($req->user == 'pet') {
         $status = 101;
      } elseif ($req->user == 'marine') {
         $status = 202;
      } elseif ($req->user == 'suptent') {
         $status = 303;
      } elseif ($req->user == 'suptent-loc') {
         $status = 505;
      }


      // dd($req->data);
      // dd($req->user);


      $vdr->update([
         'status' => $status,
         'reject_by' => $req->userid,
         'reject_date' => Carbon::now(),
         'reject_desc' => $req->desc,
         'reject_data' => $req->data
      ]);


      VdrTimestamp::create([
         'vdr_id' => $vdr->id,
         'type' => 'reject',
         'status' => 1,
         'user_id' => $req->userid,
         'desc' => $req->desc
      ]);

      return redirect()->route('vdr.pdf.email', [enkripRambo($vdr->id), enkripRambo($req->user)])->with('success', 'VDR Rejected, sent back to Vessel');
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

   public function approveLutfi($id)
   {
      $dekripId = dekripRambo($id);
      $vdr = Vdr::find($dekripId);
      // dd('lutfi');

      // dd($vdr->title1);

      if ($vdr->area != null) {
         $title = 'Marine Representative';
      } else {
         $title = 'Suptent';
      }

      $vdr->update([
         'status' => 4,
         'title3' => $title,
         'name3' => 'Lutfi Aryanto',
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


   public function approveMarineFromEmail($id)
   {
      $dekripId = dekripRambo($id);
      $vdr = Vdr::find($dekripId);
      // dd('Success Approve VDR from email');

      // dd($vdr->title1);
      $vdr->update([
         'status' => 4,
         'title3' => 'Suptent',
         'name3' => 'Lutfi Aryanto',
      ]);

      // dd($vdr->name3);
      // dd()



      return redirect()->route('vdr.pdf.email', [enkripRambo($vdr->id), enkripRambo('suptent')])->with('success', 'VDR Approved');
   }



   public function approveSuptentFromEmail($id)
   {
      $dekripId = dekripRambo($id);
      $vdr = Vdr::find($dekripId);
      // dd('Success Approve VDR from email');

      // dd($vdr->title1);
      $vdr->update([
         'status' => 4,
         'title3' => 'Suptent',
         'name3' => 'Lutfi Aryanto',
         'timestamp3' => Carbon::now()
      ]);

      // dd($vdr->name3);
      // dd()



      return redirect()->route('vdr.pdf.email', [enkripRambo($vdr->id), enkripRambo('suptent')])->with('success', 'VDR Approved');
   }

   public function approveSuptentLocFromEmail($id)
   {
      $dekripId = dekripRambo($id);
      $vdr = Vdr::find($dekripId);
      // dd('Success Approve VDR from email');
      // $suptenLoc = Employee::where('role', 'suptent_loc')->where('area', $vdr->area)->first();
      $suptenLoc = Employee::where('role', 'suptent_loc')->first();

      // dd($vdr->title1);
      $vdr->update([
         'status' => 3,
         'title4' => 'Suptent on Location',
         'name4' => $suptenLoc->name,
      ]);

      // dd($vdr->name3);
      // dd()



      return redirect()->route('vdr.pdf.email', [enkripRambo($vdr->id), enkripRambo('suptent-loc')])->with('success', 'VDR Approved');
   }

   public function rejectFromEmail($id, $user, $userid)
   {

      $dekripId = dekripRambo($id);
      $vdr = Vdr::find($dekripId);
      $vdrActivities = VdrActivity::where('vdr_id', $vdr->id)->get();
      $vdrCargos = VdrCargo::where('vdr_id', $vdr->id)->get();
      $vdrWheathers = VdrWeather::where('vdr_id', $vdr->id)->get();
      $hses = VdrHse::where('vdr_id', $vdr->id)->get();
      $operatings = VdrOperating::where('vdr_id', $vdr->id)->get();
      $periodic = VdrPeriodic::where('vdr_id', $vdr->id)->first();

      $totalJam = $vdr ? VdrOperating::where('vdr_id', $vdr->id)->sum('time') : null;
      $totalDaily = $vdr ? VdrOperating::where('vdr_id', $vdr->id)->sum('daily') : null;
      $totalDaily = $vdr->customRound($totalDaily);

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

      // return('email');






      return view('pages.document.vdr-email-reject', [
         'user' => dekripRambo($user),
         'userid' => dekripRambo($userid),
         'vdr' => $vdr,
         'vessel' => $vdr->vessel,
         'vdrActivities' => $vdrActivities,
         'vdrCargos' => $vdrCargos,
         'vdrPeriodic' => $periodic,
         'vdrWheathers' => $vdrWheathers,
         'hses' => $hses,
         'operatings' => $operatings,
         'totaljam' => $final,
         'totaldaily' => $totalDaily
      ]);
   }
}
