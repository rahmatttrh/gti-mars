<?php

namespace App\Http\Controllers\Vessel;

use App\Http\Controllers\Controller;
use App\Models\Deviation;
use App\Models\DeviationReport;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VesselDeviationController extends Controller
{
   public function confirm($id)
   {
      $dekripId = dekripRambo($id);

      $deviation = Deviation::find($dekripId);
      // dd($deviation);
      $now = Carbon::now();

      $deviation->update([
         'status' => 1,
      ]);

      $deviationReport = DeviationReport::where('deviation_id', $deviation->id)->first();
      $deviationReport->update([
         'confirm' => $now
      ]);

      return redirect()->back()->with('success', 'Deviation successfully confirmed');
   }

   public function arrive($id)
   {
      $dekripId = dekripRambo($id);
      $deviation = Deviation::find($dekripId);
      $now = Carbon::now();

      $deviation->update([
         'status' => 2,
      ]);
      $deviationReport = DeviationReport::where('deviation_id', $deviation->id)->first();
      $deviationReport->update([
         'arrive' => $now
      ]);

      return redirect()->back()->with('success', 'Deviation successfully Arrived');
   }

   public function complete($id)
   {
      $dekripId = dekripRambo($id);
      $deviation = Deviation::find($dekripId);
      $now = Carbon::now();

      $deviation->update([
         'status' => 3
      ]);

      $deviationReport = DeviationReport::where('deviation_id', $deviation->id)->first();
      $deviationReport->update([
         'complete' => $now
      ]);

      return redirect()->back()->with('success', 'Deviation successfully Completed');
   }
}
