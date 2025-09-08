<?php

namespace App\Http\Controllers\Vessel;

use App\Http\Controllers\Controller;
use App\Http\Controllers\EmailController;
use App\Models\Vdr;
use App\Models\Vessel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VesselVdrController extends Controller
{
   public function release($id)
   {
      $dekripId = dekripRambo($id);
      $vdr = Vdr::find($dekripId);
      $vessel = Vessel::find($vdr->vessel_id);

      if ($vdr->reject_by == 149) {
         $status = 1;
      } elseif ($vdr->reject_by == 1) {
         $status = 2;
      } else {
         $status = 1;
      }

      if ($status == 1) {
         $emailController = new EmailController();
         $emailController->approvalVdrPet(enkripRambo($vdr->id));
      } else {
         $emailController = new EmailController();
         $emailController->approvalVdrMarine(enkripRambo($vdr->id));
      }



      $vdr->update([
         'status' => $status,
         'status' => $status,
         'release_date' => Carbon::now()
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




      return redirect()->back()->with('success', 'VDR successfully sent to Fleet Control');
   }
}
