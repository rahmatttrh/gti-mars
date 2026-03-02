<?php

namespace App\Http\Controllers\Vessel;

use App\Http\Controllers\Controller;
use App\Models\FuelItem;
use App\Models\Request as ModelsRequest;
use App\Models\Schedule;
use App\Models\Vessel;
use App\Models\WaterItem;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VesselRequestController extends Controller
{
   public function index(){
      $requests = ModelsRequest::where('user_id', auth()->user()->id)->orderBy('updated_at', 'desc')->get();
      return view('pages-stisla.vessel.request.index', [
         'requests' => $requests
      ])->with('i');
   }

   public function create(){
      return view('pages-stisla.vessel.request.create');
   }

   

   public function store(Request $req){

      $req->validate([

      ]);

      $vessel = Vessel::where('email', auth()->user()->email)->first();

      $now = Carbon::today();
      $lastRequest = ModelsRequest::orderBy("created_at", "desc")->first();
      $lastSchedule = Schedule::orderBy("created_at", "desc")->first();

      if (isset($lastRequest)) {
         $code =
            "R/" . 'V' . '/' . $now->format("dmy") . '/' . ($lastRequest->id + 1);
      } else {
         $code = "R/"  . 'V' . '/' . $now->format("dmy") . '/' . 1;
      }

      if (isset($lastSchedule)) {
         $scheduleCode =
            "SO"  . '/' . $now->format("dmy") . '/' . ($lastSchedule->id + 1);
      } else {
         $scheduleCode = "SO"   . '/' . $now->format("dmy") . '/' . 1;
      }

      if ($req->activity == 5) {
         $class = 'Fuel Oil';
      } elseif($req->activity == 6){
         $class = 'Fresh Water';
      }

      if (auth()->user()->hasRole('vessel')) {
         $vessel = Vessel::where('email', auth()->user()->email)->first();
         $vesselId = $vessel->id;
         $user = 'Vessel';
      } else {
         $vesselId = null;
         $user = 'Barge';
      }
      
      $request = ModelsRequest::create([
         'code' => $code,
         'type' => 2,
         'user_id' => auth()->user()->id,
         // 'func' => $department->code,
         'activity_id' => $req->activity,
         'date' => $req->date,
         'desc' => $req->desc,
         'qty' => $req->qty,
         'status' => 101
      ]);
      $schedule = Schedule::create([
         'code' => $scheduleCode,
         'by' => $user,
         'vessel_id' => $vesselId,
         'class' => $class,
         'type' => 2,
         'vessel_id' => $vessel->id,
         'status' => 101,
         'date' => $req->date,
      ]);

      if ($req->activity == 5) {
         FuelItem::create([
            'request_id' => $request->id,
            'qty' => $req->qty
         ]);
      } elseif($req->activity == 6){
         WaterItem::create([
            'request_id' => $request->id,
            'qty' => $req->qty
         ]);
      }

      $request->update([
         'schedule_id' => $schedule->id,
         'status' => 101
      ]);


      return redirect()->route('request.detail', enkripRambo($request->id))->with('success', 'Request Activity successfully send to Marine');
   }
}
