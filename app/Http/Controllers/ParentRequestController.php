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

      if ($parent->status == 202) {
         $scheduleRoutes = ScheduleRoute::where('date', $parent->date)->where('port_id', $parent->origin_id)->get();
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
      return view('pages-stisla.request.parent', [
         'parent' => $parent,
         'activities' => $activities,
         'ports' => $ports,
         'scheduleRoutes' => $scheduleRoutes
         
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

      // $nearestVessels = array();
      // if ($reqDate ==  $now->format('Y-m-d')) {
      //    foreach($todaySchedules as $today){

      //    }
      // }
      // if ($reqDate ==  $now->format('Y-m-d')) {
      //    // dd('today');
      //    foreach($vessels as $vessel){
      //       $vesselLat = $vessel->latitude;
      //       $vesselLong = $vessel->longitude;
      //       $portLat = $parent->origin->latitude;
      //       $portLong = $request->origin->longitude;
      //       $distance = (new GeofenceController)->getDistance($vesselLat, $vesselLong, $portLat, $portLong);
      //       if($distance < 600){
      //          $nearestVessel = $vessel;
      //       }
      //    }

      //    if ($nearestVessel) {
      //       if ($nearestVessel->schedule_id) {
      //          // dd('kapal sudah ada schedule');
      //          $request->update([
      //             'status' => 1,
      //             'schedule_id' => $nearestVessel->schedule->id
      //          ]);
      //          return redirect()->back()->with('success', 'Your request activity would be pick up at ' . \Carbon\Carbon::parse($nearestVessel->schedule->date)->format('d/m/Y') . ' by ' . $nearestVessel->name);
      //       } else {
      //          // dd('kapal blm ada schedule');
      //          $schedule = Schedule::create([
      //             'by' => 'system',
      //             'vessel_id' => $nearestVessel->id,
      //             'type' => 2,
      //             'status' => 0,
      //             'date' => $request->date,
      //          ]);
      //          $nearestVessel->update([
      //             'schedule_id' => $schedule->id
      //          ]);
      //          ScheduleRoute::create([
      //             'schedule_id' => $schedule->id,
      //             'port_id' => $request->origin_id,
      //             'rank' => 1,
      //             'status' => 1,
      //             'date' => $request->date
      //          ]);
      //          $request->update([
      //             'status' => 1,
      //             'schedule_id' => $schedule->id,
      //          ]);
      //          return redirect()->back()->with('success', 'Your request activity would be pick up at ' . \Carbon\Carbon::parse($schedule->date)->format('d/m/Y') . ' by ' . $nearestVessel->name);
      //       }
      //    }



      // }



      // if (count($scheduleRoutes) > 0) {
      //    $schedule = Schedule::find($scheduleRoute->schedule_id);
      // } else {
      //    $schedule = Schedule::create([
      //       'by' => 'system',
      //       'vessel_id' => $nearestVessel->id,
      //       'type' => 2,
      //       'status' => 0,
      //       'date' => $parent->date,
      //    ]);
      // }


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

      $parent->update([
         'status' => 201
      ]);



      return redirect()->back()->with('success', 'Request Activity successfully send to marine');
      // return redirect()->route('request.progress')->with('success', 'Request Activity successfully send to marine');
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
      $parent = ParentRequest::find($req->parent);
      // dd($parent->id);
      Excel::import(new PassengerItemImport($parent->id, $req->destination), $req->file('file-crew'));

      return redirect()->back()->with('success', 'Crew item added');
   }
}
