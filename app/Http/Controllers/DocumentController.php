<?php

namespace App\Http\Controllers;

use App\Models\Request as ModelsRequest;
use App\Models\Schedule;
use App\Models\ScheduleRoute;
use App\Models\Vdr;
use App\Models\VdrActivity;
use App\Models\VdrCargo;
use Illuminate\Http\Request;

class DocumentController extends Controller
{

   public function vdr($id)
   {
      $dekripId = dekripRambo($id);
      $vdr = Vdr::find($dekripId);
      $vdrActivities = VdrActivity::where('vdr_id', $vdr->id)->get();
      $vdrCargos = VdrCargo::where('vdr_id', $vdr->id)->get();

      return view('pages.document.vdr', [
         'vdr' => $vdr,
         'vdrActivities' => $vdrActivities,
         'vdrCargos' => $vdrCargos
      ]);
   }

   public function manifest($id)
   {
      $dekripId = dekripRambo($id);
      $schedule = Schedule::find($dekripId);
      $destinations = ModelsRequest::selectRaw('destination_name')->where('schedule_id', $schedule->id)->where('status', '>=', 2)->orderBy('updated_at', 'asc')->get()->groupBy('destination_name');
      $fixRoutes = ScheduleRoute::where('schedule_id', $schedule->id)->where('status', 1)->orderBy('rank', 'asc')->get();
      return view('pages.document.manifest', [
         'schedule' => $schedule,
         'destinations' => $destinations,
         'routes' => $fixRoutes
      ]);
   }

   public function intermilan($month)
   {
      // dd($month);
      $dekripMonth = dekripRambo($month);
      // dd($dekripMonth);
      $requests = ModelsRequest::whereMonth('date', $dekripMonth)->get();
      return view('pages.document.intermilan', [
         'requests' => $requests
      ])->with('i');
   }
}
