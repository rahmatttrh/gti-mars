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

      $vdr->update([
         'status' => 1,
         'release_date' => Carbon::now()
      ]);

      if ($vessel->func != null) {
         $vdr->update([
            'func' => $vessel->func
         ]);
      }




      $emailController = new EmailController();
      $emailController->approvalVdrPet(enkripRambo($vdr->id));




      return redirect()->back()->with('success', 'VDR successfully sent to Fleet Control');
   }
}
