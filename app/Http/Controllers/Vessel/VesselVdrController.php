<?php

namespace App\Http\Controllers\Vessel;

use App\Http\Controllers\Controller;
use App\Http\Controllers\EmailController;
use App\Models\Vdr;
use App\Models\Vessel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Log as ModelsLog;
use App\Models\VdrOperating;

class VesselVdrController extends Controller
{
   public function release($id)
   {
      $dekripId = dekripRambo($id);
      $vdr = Vdr::find($dekripId);
      $vessel = Vessel::find($vdr->vessel_id);

      $vdrRejects = Vdr::where('vessel_id', $vessel->id)->whereBetween('date', ['2025-09-16', $vdr->date])->whereIn('status', [101, 202, 303, 505])->get();
      $lastVdrPending = Vdr::where('vessel_id', $vessel->id)->whereIn('status', [1])->whereBetween('date', ['2025-09-16', $vdr->date])->orderBy('date', 'desc')->first();
      // dd($lastVdrPending);

      if ($lastVdrPending) {
         return redirect()->back()->with('warning', 'Anda memiliki VDR yang masih menunggu Validasi PET (' . $vdr->code . ')');
      }

      if (count($vdrRejects) > 0) {
         return redirect()->back()->with('warning', 'Anda memiliki VDR Reject ditanggal sebelumnya, revisi VDR tersebut terlebih dahulu');
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


      $totalDaily = VdrOperating::where('vdr_id', $vdr->id)->sum('daily') ;
      // $realTotalDaily = $totalDaily;

      // $totalDaily = round($totalDaily, 1); // di komen dulu 
      $totalDaily = round($totalDaily);


      $vdr->update([
         'status' => $status,
         'status' => $status,
         'release_date' => Carbon::now(),
         'total_daily' => $totalDaily
      ]);

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
