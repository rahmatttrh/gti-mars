<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Request as ModelsRequest;
use App\Models\Schedule;
use App\Models\ScheduleRoute;
use App\Models\Vdr;
use App\Models\VdrActivity;
use App\Models\VdrCargo;
use App\Models\VdrHse;
use App\Models\VdrOperating;
use App\Models\VdrPeriodic;
use App\Models\VdrWeather;
use App\Models\Vessel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DocumentController extends Controller
{

   public function vdr($id)
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

      return view('pages.document.vdr', [
         'vdr' => $vdr,
         'vessel' => $vdr->vessel,
         'vdrActivities' => $vdrActivities,
         'vdrCargos' => $vdrCargos,
         'vdrPeriodic' => $periodic,
         'vdrWheathers' => $vdrWheathers,
         'hses' => $hses,
         'operatings' => $operatings,
         'totaljam' => $totalJam,
         'totaldaily' => $totalDaily
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

   public function intermilanExport($start, $end){
      $dekripStart = dekripRambo($start);
      $dekripEnd = dekripRambo($end);
      // dd($dekripEnd);
      $startDate = new Carbon($dekripStart);
      $endDate = new Carbon($dekripEnd);
      $dates = array();
      while ($startDate->lte($endDate)){
         $dates[] = $startDate->toDateString();
         $startDate->addDay();
      }

      $users = ModelsRequest::selectRaw('id, date, department_id, code, origin_id, destination_id, func, status,user_id , user_name , description, schedule_id, activity_id')->where('status', '>=', 1)->whereBetween('date', [$dekripStart, $dekripEnd])->get()->groupBy('user_name');
      // dd($users);

      // dd( $startDate->format('F'));

      return view('pages.document.intermilan-new', [
         'users' => $users,
         'dates' => $dates,
         'start' => $dekripStart,
         'end' => $dekripEnd,
         'monthName' => $startDate->format('F Y')
      ])->with('i');
   }



   public function add(Request $req){
      $vessel = Vessel::find($req->vessel);
      // dd($vessel->name);

      $today = Carbon::now();
      $doc = Document::create([
         'status' => 1,
         'vessel_id' => $vessel->id,
         'name' => $req->name,
         'date' => $req->date
      ]);

      $diffMonth = $today->diffInMonths($doc->date);
      if ($diffMonth <= 2) {
         $doc->update([
            'status' => 3
         ]);
      } else if($diffMonth <= 12) {
         $doc->update([
            'status' => 2
         ]);
      } else if($diffMonth > 12){
         $doc->update([
            'status' => 1
         ]);
      }

      return redirect()->back()->with('success', 'Document Alert added');
      // dd($diffMonth);
   }

   public function update(Request $req){
      // dd($req->doc);
      $doc = Document::find($req->doc);

      $today = Carbon::now();
      $doc->update([
         'name' => $req->name,
         'date' => $req->date
      ]);

      $diffMonth = $today->diffInMonths($doc->date);
      if ($diffMonth <= 2) {
         $doc->update([
            'status' => 3
         ]);
      } else if($diffMonth <= 12) {
         $doc->update([
            'status' => 2
         ]);
      } else if($diffMonth > 12){
         $doc->update([
            'status' => 1
         ]);
      }

      return redirect()->back()->with('success', 'Document Alert updated');
   }




}
