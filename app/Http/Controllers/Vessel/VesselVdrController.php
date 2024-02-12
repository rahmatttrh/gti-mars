<?php

namespace App\Http\Controllers\Vessel;

use App\Http\Controllers\Controller;
use App\Models\Vdr;
use Illuminate\Http\Request;

class VesselVdrController extends Controller
{
   public function release($id){
      $dekripId = dekripRambo($id);
      $vdr = Vdr::find($dekripId);

      $vdr->update([
         'status' => 1
      ]);

      return redirect()->back()->with('success', 'VDR successfully sent to Fleet Control');
   }
}
