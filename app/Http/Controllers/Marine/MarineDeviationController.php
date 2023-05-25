<?php

namespace App\Http\Controllers\Marine;

use App\Http\Controllers\Controller;
use App\Models\Deviation;
use App\Models\DeviationReport;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MarineDeviationController extends Controller
{
   public function add(Request $req)
   {
      $req->validate([
         'desc' => 'required'
      ]);
      $now = Carbon::now();

      // $deviation = Deviation::create([
      //    'status' => 0,
      //    'schedule_id' => $req->schedule,
      //    'port_id' => $req->port,
      //    'desc' => $req->desc
      // ]);

      // DeviationReport::create([
      //    'deviation_id' => $deviation->id,
      //    'assign' => $now
      // ]);

      // return redirect()->back()->with('success', 'Deviation successfully added to Schedule');
   }

   public function delete($id)
   {
      $dekripId = dekripRambo($id);
      $deviation = Deviation::find($dekripId);
      $deviationReport = DeviationReport::where('deviation_id', $deviation->id)->first();

      $deviationReport->delete();
      $deviation->delete();

      return redirect()->back()->with('success', 'Deviation successfully deleted');
      // dd($deviation->desc);
   }
}
