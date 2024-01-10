<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Department\DepartmentRequestController;
use App\Imports\CargoItemImport;
use App\Imports\PassengerItemImport;
use App\Mail\ApprovalEmail;
use App\Models\Activity;
use App\Models\ParentRequest;
use App\Models\Port;
use App\Models\Request as ModelsRequest;
use App\Models\Schedule;
use App\Models\ScheduleRoute;
use App\Models\Vessel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class ParentRequestController extends Controller
{
   public function detail($id)
   {
      $dekripId = dekripRambo($id);
      $parent = ParentRequest::find($dekripId);
      $now = Carbon::now();
      // dd($parent->origin_id);
      // $scheduleRoutes = ScheduleRoute::where('port_id', 12)->where('schedule_id', 29)->first();
      // dd($scheduleRoutes->schedule->vessel->name);

      if ($parent->status == 202) {
         
         $scheduleRoutes = ScheduleRoute::where('port_id', $parent->origin_id)->get();
      } else {
         $scheduleRoutes = null;
      }
      $activities = Activity::get();
      $ports = Port::get();
      // $requestHistories = RequestHistory::where('request_id', $request->id)->get();
      // $cargoItems = CargoItem::where('request_id', $request->id)->get();
      // $passengerItems = PassengerItem::where('request_id', $request->id)->get();
      // $schedules = Schedule::where('origin_id', $request->origin_id)->where('destination_id', $request->destination_id)->where('status', 0)->get();

      // $requests = ModelsRequest::where('parent_id', $parent->id)->first();
      // dd($requests->parent->code);
      // dd($parent->requests);

      // $vessels = Vessel::where('latitude', '!=', null)->get();
      $vessels = Vessel::where('port_id', $parent->origin_id)->get();
      $scheduleRoutes = ScheduleRoute::where('port_id', $parent->origin_id)->where('date', $parent->date)->get();
      $schedules = Schedule::where('date', $parent->date)->get();
      // dd($scheduleRoutes);
      // foreach($scheduleRoutes as $sche){
      //    dd($sche->schedule->vessel->name);
      // }

      $nearestVessels = array();
      if ($parent->date ==  $now->format('Y-m-d')) {
         // dd('today');
         foreach($vessels as $vessel){
            $vesselLat = $vessel->latitude;
            $vesselLong = $vessel->longitude;
            $portLat = $parent->origin->latitude;
            $portLong = $parent->origin->longitude;
            $distance = (new GeofenceController)->getDistance($vesselLat, $vesselLong, $portLat, $portLong);
            
            if($distance < 1800){
               // dd($vessel->name);
               $nearestVessels[] = $vessel;

            }
         }
      }
      // foreach($nearestVessels as $ves){
      //    dd($ves->name);
      // }
      // dd($nearestVessels);
      return view('pages-stisla.request.parent', [
         'parent' => $parent,
         'activities' => $activities,
         'ports' => $ports,
         'scheduleRoutes' => $scheduleRoutes,
         'schedules' => $schedules,
         'nearestVessels' => $nearestVessels,
         'vessels' => $vessels
         
      ])->with('i');
   }

   public function delete($id)
   {
      $dekripId = dekripRambo($id);
      $parent = ParentRequest::find($dekripId);
      $status = 0;
      foreach ($parent->requests as $request) {
         if ($request->status > 0) {
            $status = 1;
         }
      }

      if ($status == 0) {
         foreach ($parent->requests as $request) {
            $request->delete();
         }
         return redirect()->route('request.draft')->with('success', 'Master Request successfully deleted');
      } elseif ($status == 1) {
         return redirect()->back()->with('success', 'Failed, this Master Request has atleast one Request Activity On Progress');
      }
   }

   public function release($id)
   {
      $dekripId = dekripRambo($id);
      $now = Carbon::now();
      $parent = ParentRequest::find($dekripId);
      $reqDate = \Carbon\Carbon::parse($parent->date)->format('Y-m-d');
      // dd($parent->id);
      $todaySchedules = Schedule::where('date', $parent->date)->get();
      $allSchedules = Schedule::where('date','>=', $parent->date)->get();
      $scheduleRoutes = ScheduleRoute::where('date', $reqDate)->where('port_id', $parent->origin_id)->get();
      $scheduleRoute = ScheduleRoute::where('date', $reqDate)->where('port_id', $parent->origin_id)->first();
      // $todayScheduleRoute = ScheduleRoute::where('date', $parent->date)->where('port_id', $parent->origin_id)->first();
      $vessels = Vessel::where('latitude', '!=', null)->get();
      // dd($now->format('Y-m-d'));

      


      foreach ($parent->requests as $request) {
         (new DepartmentRequestController)->release(enkripRambo($request->id));

      }

      $parent->update([
         'status' => 201
      ]);



      return redirect()->back()->with('success', 'You got a vessel!, do you wanna change?');
      // return redirect()->route('request.progress')->with('success', 'Request Activity successfully send to marine');
   }

   public function change(Request $req){
      // dd($req->parent);
      $parent = ParentRequest::find($req->parent);
      $schedule = Schedule::find($req->schedule);
      $schedule->update([
         'vessel_id' => $req->vessel
      ]);
      // dd($parent->origin->name);


      foreach($parent->requests as $request){
         $request->update([
            'status' => 1,
            // 'schedule_id' => $req->schedule
         ]);
      }

      $parent->update([
         'status' => 1
      ]);

      return redirect()->route('request.progress')->with('success', 'Request Activity sent to Fleet Control');
   }

   public function releaseOld($id)
   {
      $dekripId = dekripRambo($id);
      $parent = ParentRequest::find($dekripId);
      // dd($parent->id);
      $schedules = Schedule::where('date', $parent->date)->get();
      $scheduleRoute = ScheduleRoute::where('date', $parent->date)->where('port_id', $parent->origin_id)->first();

      foreach ($parent->requests as $request) {
         (new DepartmentRequestController)->release(enkripRambo($request->id));
         // $request->update([
         //    'status' => 01
         // ]);

         // $activityName = $request->activity->name . ' ' . $request->description;

         // $data = [
         //    'to' => 'Marine Department',
         //    'from' => $request->department->name . ' Department',
         //    'subject' => 'Request Activity Approval',
         //    'request' => $request,
         //    'body' => $activityName,
         //    'cargos' => $request->cargoItems,
         //    'link' => route('request.detail', enkripRambo($request->id))
         // ];

         // Mail::to("develop@ekanuri.com")->send(new ApprovalEmail($data));
         // Mail::to("rahmattrust@gmail.com")->send(new ApprovalEmail($data));
         // return redirect()->back()->with('success', 'Email has sent');
      }

      // $parent->update([
      //    'status' => 01
      // ]);




      return redirect()->route('request.progress')->with('success', 'Request Activity successfully send to marine');
   }

   public function addCargo(Request $req){
      // dd('add cargo');
      $parent = ParentRequest::find($req->parent);
      // dd($parent->id);
      Excel::import(new CargoItemImport($parent->id), $req->file('file-cargo'));

      return redirect()->back()->with('success', 'Cargo item added');
   }

   public function addCrew(Request $req){
      // dd('add crew');
      $req->validate([
         'destination' => 'required'
      ]);
      $parent = ParentRequest::find($req->parent);
      // dd($parent->id);
      Excel::import(new PassengerItemImport($parent->id, $req->destination), $req->file('file-crew'));

      return redirect()->back()->with('success', 'Crew item added');
   }
}
