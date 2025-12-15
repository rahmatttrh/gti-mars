<?php

namespace App\Http\Controllers\Vessel;

use App\Http\Controllers\Controller;
use App\Http\Controllers\EmailController;
use App\Models\Vdr;
use App\Models\Vessel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Log as ModelsLog;
use App\Models\VdrActivity;
use App\Models\VdrOperating;
use App\Models\VdrPeriodic;

class VesselVdrController extends Controller
{
   public function release($id)
   {
      $dekripId = dekripRambo($id);
      $vdr = Vdr::find($dekripId);
      $vessel = Vessel::find($vdr->vessel_id);





      // tanggal vdr yg mau di release
      $inputDate = Carbon::parse($vdr->date);

      // Ambil semua tanggal vdr yang sudah ada
      $dates = Vdr::orderBy('date')->pluck('date')->map(fn($d) => Carbon::parse($d));

      if ($dates->count() > 0) {
         // Tanggal minimum yang sudah ada
         $startDate = Carbon::create('2025-12-01');
         $endDate = $inputDate->copy()->subDay();

         $missingDates = [];

         // Loop semua tanggal dari start sampai 1 hari sebelum inputDate
         for ($date = $startDate->copy(); $date->lte($endDate); $date->addDay()) {
               // Jika tanggal ini tidak pernah ada di DB → gap
               if (!$dates->contains(fn($d) => $d->isSameDay($date))) {
                  $missingDates[] = $date->format('Y-m-d');
               }
         }
         // Jika ada tanggal yang hilang → error
         if (!empty($missingDates)) {

            return redirect()->back()->with('warning-vdr', 'Entri Data tanggal sebelumnya (' . implode(', ', $missingDates). ') tidak ditemukan pada sistem. Silahkan lakukan pembuatan atau penginputan data untuk tanggal tersebut agar proses Release dapat dilanjutkan' );
         }
      }













      $vdrRejects = Vdr::where('vessel_id', $vessel->id)->whereBetween('date', ['2025-09-16', $vdr->date])->whereIn('status', [101, 202, 303, 505])->get();
      $lastVdrPending = Vdr::where('vessel_id', $vessel->id)->whereIn('status', [1])->where('id', '!=', $vdr->id)->whereBetween('date', ['2025-09-16', $vdr->date])->orderBy('date', 'desc')->first();
      $vdrRevisi = Vdr::where('vessel_id', $vessel->id)->where('id', '!=', $vdr->id)->whereBetween('date', ['2025-09-16', $vdr->date])->where('status', 0)->where('reject_by', '!=', null)->first();
      // dd($lastVdrPending);
      $vdrDraft = Vdr::where('vessel_id', $vessel->id)->where('id', '!=', $vdr->id)->whereIn('status', [0])->whereBetween('date', ['2025-09-16', $vdr->date])->whereDate('date', '!= ', $vdr->date)->orderBy('date', 'desc')->first();

      // if ($vdr->vessel->username == 'encone') {
      //    dd($lastVdrPending);
      // }

      if ($lastVdrPending) {
         return redirect()->back()->with('warning', 'Anda memiliki VDR yang masih menunggu Validasi PET (' . $vdr->code . ')');
      }

      if ($vdrDraft) {
         return redirect()->back()->with('warning', 'Anda masih memiliki VDR Draft ditanggal sebelumnya [ ' . $vdrDraft->code .']' . ' . Release VDR tersebut terlebih dahulu.');
      }

      if ($vdr->vessel->username == 'clarisa68') {
         // dd($lastVdrPending);
      }

      if (count($vdrRejects) > 0) {
         return redirect()->back()->with('warning', 'Anda memiliki VDR Reject ditanggal sebelumnya, revisi VDR tersebut terlebih dahulu');
      }


      if ($vdrRevisi) {
         return redirect()->back()->with('warning', 'Anda memiliki VDR yang masih dalam proses Revisi (' . $vdrRevisi->code . ')');
      }

      $periodic = VdrPeriodic::where('vdr_id', $vdr->id)->first();
      if ($periodic->activity != null && $periodic->activity != 'Not Applicable') {
         if ($periodic->fuel_cons_remu == null) {
            return redirect()->back()->with('warning', 'Terdapat aktivitas ' . $periodic->activity . ', tapi data Special Calculation kosong. Harap lengkapi data tersebut terlebih dahulu');
         }
      }

      if ($vdr->reject_by == 149) {
         $status = 1;
      } elseif ($vdr->reject_by == 1) {
         $status = 2;
      } else {
         $status = 1;
      }

      // if ($status == 1) {
      //    $emailController = new EmailController();
      //    $emailController->approvalVdrPet(enkripRambo($vdr->id));
      // } else {
      //    $emailController = new EmailController();
      //    $emailController->approvalVdrMarine(enkripRambo($vdr->id));
      // }
      $vdrActivities = VdrActivity::where('vdr_id', $vdr->id)->get();
      foreach ($vdrActivities as $act) {
         if ($act->high == 0.00 && $act->normal == 0.00 && $act->slow == 0.00 && $act->manu == 0.00 && $act->idle == 0.00 && $act->tow == 0.00 && $act->ah == 0.00  && $act->sp == 0.00 && $act->sb == 0.00) {
            $act->delete();
         }
      }


      $totalDaily = VdrOperating::where('vdr_id', $vdr->id)->sum('daily');
      // $realTotalDaily = $totalDaily;

      // $totalDaily = round($totalDaily, 1); // di komen dulu 
      $totalDaily = round($totalDaily);

      if ($vdr->id == 2234) {
         $vdr->update([
            'status' => $status,
            'status' => $status,
            'release_date' => Carbon::now(),
            // 'total_daily' => $totalDaily
         ]);
      } else {
         $vdr->update([
            'status' => $status,
            'status' => $status,
            'release_date' => Carbon::now(),
            'total_daily' => $totalDaily
         ]);
      }


      if ($vessel->func != null) {
         $vdr->update([
            'func' => $vessel->func
         ]);
      }




      // $emailController = new EmailController();
      // $emailController->approvalVdrPet(enkripRambo($vdr->id));
      // $emailController = new EmailController();
      // $emailController->approvalVdrPet(enkripRambo($vdr->id));

      ModelsLog::create([
         'system' => 'VDR',
         'user_id' => auth()->user()->id,
         'vessel_id' => $vdr->vessel_id,
         'action' => 'Release VDR',
         'vdr_id' => $vdr->id,
         'desc' => '',
         'table' => 'vdrs'
      ]);




      return redirect()->back()->with('success', 'VDR successfully sent to Fleet Control');
   }
}
