<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeofenceController;
use App\Imports\CargoItemImport;
use App\Imports\PassengerItemImport;
use App\Imports\RequestImport;
use App\Mail\ApprovalEmail;
use App\Mail\NotificationEmail;
use App\Models\Activity;
use App\Models\BargeItem;
use App\Models\Cargo;
use App\Models\CargoItem;
use App\Models\Department;
use App\Models\Employee;
use App\Models\ParentRequest;
use App\Models\Port;
use App\Models\Report;
use App\Models\ReportRequest;
use App\Models\Request as ModelsRequest;
use App\Models\RequestHistory;
use App\Models\Schedule;
use App\Models\ScheduleRoute;
use App\Models\Type;
use App\Models\Vessel;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class DepartmentRequestController extends Controller
{
   public function create()
   {
      // if (auth()->user()->getDepartment()->name == 'Logistic') {
      //    $acts = Activity::where('type_id', 1)->orderBy('name', 'asc')->get();
      // } elseif (auth()->user()->getDepartment()->name == 'drilling') {
      //    $acts = Activity::where('type_id', 3)->orWhere('type_id', 4)->orWhere('type_id', 2)->orderBy('name', 'asc')->get();
      // } else {
      //    $acts = Activity::orderBy('name', 'asc')->get();
      // }
      $employee = Employee::where('email', auth()->user()->email)->first();
      $now = Carbon::now();
      $acts = Activity::get();
      $activities = $acts;
      $types = Type::get();
      $ports = Port::where('type', '!=', 'platform')->get();
      $platforms = Port::where('type', 'platform')->get();
      $barges = Port::where('type', 'Barge')->get();

      // $schedules = Schedule::where('date', '>=', $now)->get();
      // dd($schedules);
      $scheduleRoutes = ScheduleRoute::where('date', '>=', $now)->where('port_id', $employee->port_id)->get();
      $schedules = array();
      // dd($scheduleRoutes);
      foreach ($scheduleRoutes as $row) {

         $schedule = Schedule::find($row->schedule_id);
         $first = ScheduleRoute::where('schedule_id', $schedule->id)->where('rank', 1)->first();

         if ($row->schedule->vessel_id != null) {
            $vesselName = $row->schedule->vessel->name;
            $vesselType = $row->schedule->vessel->type;
            $totalWeight = $row->schedule->total_weight;
            $vesselDeadweight = $row->schedule->vessel->deadweight;
            $persen = $totalWeight / $vesselDeadweight * 100;
         } else {
            $vesselName = '-';
            $vesselType = '';
            $totalWeight = 0;
            $vesselDeadweight = '0';
            $persen = '-';
         }

         $schedules[] = $schedule;
      }

      // dd($schedules);
      
      return view('pages-stisla.user.request.create', [
         'activities' => $activities,
         'ports' => $ports,
         'platforms' => $platforms,
         'barges' => $barges,
         'types' => $types,
         'schedules' => $schedules,
         'scheduleRoutes' => $scheduleRoutes
      ]);
   }

   public function storeImport(Request $req){
      // dd('ok');
      $employee = Employee::where('email', auth()->user()->email)->first();
      $department = Department::find($employee->department->id);
      $now = Carbon::today();
      $request = ModelsRequest::orderBy("created_at", "desc")->first();
      $date = Carbon::today();
      // dd($req->file('file-cargo'));
      $parentLast = ParentRequest::orderBy("created_at", "desc")->first();

      if (isset($parentLast)) {
         $code = "PR/"  . $date->format("dmy") . '/' . ($parentLast->id + 1);
      } else {
         $code = "PR/"  . $date->format("dmy") . '/' . 1;
      }

      $parent = ParentRequest::create([
         'status' => 0,
         'code' => $code,
         'origin_id' => $req->origin,
         'date' => $req->date,
         'employee_id' => $employee->id,
         'department_id' => $department->id,
         'activity_id' => $req->activity
      ]);
      
      if ($department->id == 2) {
         $type = 1;
      } elseif ($department->id == 3) {
         $type = 2;
      } else {
         $type = 3;
      }

      if (isset($request)) {
         $code =
            "R/" . $department->code . '/' . $now->format("dmy") . '/' . ($request->id + 1);
      } else {
         $code = "R/"  . $department->code . '/' . $now->format("dmy") . '/' . 1;
      }



      

      if ($req->activity == 3) {
         $request = ModelsRequest::create([
            'code' => $code,
            'type' => $type,
            'class' => 'main',
            'employee_id' => $employee->id,
            'department_id' => $department->id,
            'func' => $department->code,
            'activity_id' => $req->activity,
            'date' => $req->date,
            'origin_id' => $req->origin,
            'destination_id' => $req->destination,
            'status' => 00
         ]);
         $schedule = Schedule::create([
            'by' => 'user',
            'class' => 'Moving',
            'type' => 3,
            'status' => 0,
            'date' => $req->date,
         ]);

         $request->update([
            'schedule_id' => $schedule->id,
            'status' => 1
         ]);

         BargeItem::create([
            'status' => 1,
            'request_id' => $request->id,
            'barge_id' => $req->barge
         ]);

         return redirect()->route('request.detail', enkripRambo($request->id))->with('success', 'Request Activity successfully send to Marine');
      } else if ($req->activity == 1) {
         Excel::import(new CargoItemImport($parent->id), $req->file('file-cargo'));
         return redirect()->route('request.detail.parent', enkripRambo($parent->id))->with('success', 'Request Activity successfully saved');
      } else if($req->activity == 2) {
      //    $request = ModelsRequest::create([
      //    'code' => $code,
      //    'type' => $type,
      //    'class' => 'main',
      //    'employee_id' => $employee->id,
      //    'department_id' => $department->id,
      //    'func' => $department->code,
      //    'activity_id' => $req->activity,
      //    'date' => $req->date,
      //    'origin_id' => $req->origin,
      //    'destination_id' => $req->destination,
      //    'status' => 00
      // ]);
         Excel::import(new PassengerItemImport($parent->id, $req->destination), $req->file('file-passenger'));
         return redirect()->route('request.detail.parent', enkripRambo($parent->id))->with('success', 'Request Activity successfully saved');
      }

      

      
   }

   public function save(Request $req)
   {

      $employee = Employee::where('email', auth()->user()->email)->first();
      $department = Department::find($employee->department->id);
      $now = Carbon::today();
      $request = ModelsRequest::orderBy("created_at", "desc")->first();

      if ($department->id == 2) {
         $type = 1;
      } elseif ($department->id == 3) {
         $type = 2;
      } else {
         $type = 3;
      }

      if (isset($request)) {
         $code =
            "R/" . $department->code . '/' . $now->format("dmy") . '/' . ($request->id + 1);
      } else {
         $code = "R/"  . $department->code . '/' . $now->format("dmy") . '/' . 1;
      }
      $request = ModelsRequest::create([
         'code' => $code,
         'type' => $type,
         'employee_id' => $employee->id,
         'department_id' => $department->id,
         'func' => $department->code,
         'activity_id' => $req->activity,
         'date' => $req->date,
         'description' => $req->desc,
         'origin_id' => $req->origin,
         'destination_id' => $req->destination,
         'status' => 00
      ]);

      return redirect()->route('request.detail', enkripRambo($request->id))->with('success', 'Request Activity successfully saved');
   }

   public function store(Request $req)
   {

      // dd('ok');
      $req->validate([
         'activity' => 'required',
         'date' => ['required', 'before:+1 week'],
      ]);
      $date = Carbon::today();


      $employee = Employee::where('email', auth()->user()->email)->first();
      $department = Department::find($employee->department->id);
      $now = Carbon::today();
      $request = ModelsRequest::orderBy("created_at", "desc")->first();
      $destination = Port::find($req->destination);
      $activity = Activity::find($req->activity);

      $type = $activity->type->id;

      // dd($type);

      // if ($department->id == 2) {
      //    $type = 1;
      // } elseif ($department->id == 3) {
      //    $type = 2;
      // } else {
      //    $type = 3;
      // }

      $parentLast = ParentRequest::orderBy("created_at", "desc")->first();

      if (isset($parentLast)) {
         $code = "PR/"  . $date->format("dmy") . '/' . ($parentLast->id + 1);
      } else {
         $code = "PR/"  . $date->format("dmy") . '/' . 1;
      }

      $parent = ParentRequest::create([
         'status' => 0,
         'code' => $code,

         'origin_id' => $req->origin,
         'date' => $req->date,
         'employee_id' => $employee->id,
         'department_id' => $department->id,
      ]);


      if (isset($request)) {
         $code =
            "R/" . $department->code . '/' . $now->format("dmy") . '/' . ($request->id + 1);
      } else {
         $code = "R/"  . $department->code . '/' . $now->format("dmy") . '/' . 1;
      }

      $request = ModelsRequest::create([
         'parent_id' => $parent->id,
         'code' => $code,
         'bcm' => $req->bcm,
         'type' => $type,
         'class' => 'main',
         'employee_id' => $employee->id,
         'department_id' => $department->id,
         'func' => $department->code,
         'activity_id' => $req->activity,
         'date' => $req->date,
         'description' => $req->desc,
         'origin_id' => $req->origin,
         'destination_id' => $req->destination,
         'destination_name' => $destination->name,
         'status' => 0
      ]);

      RequestHistory::create([
         'request_id' => $request->id,
         'date' => $now,
         'type' => 'created',
      ]);

      return redirect()->route('request.detail', enkripRambo($request->id))->with('success', 'Request Activity successfully saved');
   }

   public function additionalStore(Request $req)
   {
      $req->validate([
         // 'activity' => 'required',
      ]);

      // dd($req->date);

      $date = Carbon::today();
      $employee = Employee::where('email', auth()->user()->email)->first();
      $department = Department::find($employee->department->id);
      $now = Carbon::today();
      $request = ModelsRequest::orderBy("created_at", "desc")->first();
      $origin = Port::find(auth()->user()->getPort());
      $destination = Port::find($req->destination);
      $schedule = Schedule::find($req->schedule);

      // dd($origin->name);

      if ($department->id == 2) {
         $type = 1;
      } elseif ($department->id == 3) {
         $type = 2;
      } else {
         $type = 3;
      }


      if (isset($request)) {
         $code =
            "R/" . $department->code . '/' . $now->format("dmy") . '/' . ($request->id + 1);
      } else {
         $code = "R/"  . $department->code . '/' . $now->format("dmy") . '/' . 1;
      }

      $request = ModelsRequest::create([
         'code' => $code,
         'type' => $type,
         'class' => 'additional',
         'schedule_id' => $schedule->id,
         'employee_id' => $employee->id,
         'department_id' => $department->id,
         'func' => $department->code,
         'activity_id' => $req->activity,
         'date' => $req->date,
         'description' => $req->desc,
         'origin_id' => $origin->id,
         'destination_id' => $destination->id,
         'destination_name' => $destination->name,
         'status' => 2
      ]);

      Report::create([
         'schedule_id' => $schedule->id,
         'vessel_id' => $schedule->vessel_id,
         'employee_id' => auth()->user()->getEmployeeId(),
         'status_id' => 14,
         'port_id' => auth()->user()->getPort()
      ]);

      // ReportRequest::create([
      //    'request_id' => $request->id,
      //    'employee_id' => auth()->user()->getEmployeeId(),
      //    'status_id' => 13,
      //    'port_id' => auth()->user()->getPort()
      // ]);

      return redirect()->back()->with('success', 'Additional Request successfully added');
   }

   public function add(Request $req)
   {
      $req->validate([
         'activity' => 'required'
      ]);
      $now = Carbon::today();
      $parent = ParentRequest::find($req->parent);
      $destination = Port::find($req->destination);

      $employee = Employee::where('email', auth()->user()->email)->first();
      $department = Department::find($employee->department->id);
      if ($department->id == 2) {
         $type = 1;
      } elseif ($department->id == 3) {
         $type = 2;
      } else {
         $type = 3;
      }

      $request = ModelsRequest::orderBy("created_at", "desc")->first();
      if (isset($request)) {
         $code =
            "R/" . $department->code . '/' . $now->format("dmy") . '/' . ($request->id + 1);
      } else {
         $code = "R/"  . $department->code . '/' . $now->format("dmy") . '/' . 1;
      }

      ModelsRequest::create([
         'code' => $code,
         'bcm' => $req->bcm,
         'type' => $type,
         'parent_id' => $parent->id,
         'employee_id' => $employee->id,
         'status' => 0,
         'class' => 'main',
         'func' => $department->code,
         'date' => $parent->date,
         'department_id' => $department->id,
         'origin_id' => $parent->origin_id,
         'destination_id' => $req->destination,
         'destination_name' => $destination->name,
         'activity_id' => $req->activity,
         'description' => $req->desc
      ]);


      return redirect()->back()->with('success', 'Request Activity successfully added');
   }




   public function edit($id)
   {
      $dekripId = dekripRambo($id);
      $request = ModelsRequest::find($dekripId);

      // if (auth()->user()->getDepartment()->name == 'Logistic') {
      //    $acts = Activity::where('type_id', 1)->get();
      // } elseif (auth()->user()->getDepartment()->name == 'drilling') {
      //    $acts = Activity::where('type_id', 3)->orWhere('type_id', 4)->orWhere('type_id', 2)->get();
      // }

      $acts = Activity::get();
      $activities = $acts;
      $types = Type::get();
      $ports = Port::get();
      return view('pages.request.edit', [
         'request' => $request,
         'activities' => $activities,
         'ports' => $ports,
         'types' => $types
      ]);
   }

   public function update(Request $req)
   {
      $request = ModelsRequest::find($req->requestId);

      $request->update([
         'activity_id' => $req->activity,
         'date' => $req->date,
         'description' => $req->desc,
         'origin_id' => $req->origin,
         'destination_id' => $req->destination,
      ]);

      return redirect()->route('request.detail', enkripRambo($request->id))->with('success', 'Request Activity successfully updated');
   }

   public function draft()
   {
      $employee = Employee::where('email', auth()->user()->email)->first();

      $requests = ModelsRequest::where('status', 0)->where('employee_id', $employee->id)->orderBy('parent_id', 'asc')->get();
      // $parents = ParentRequest::where()
      return view('pages-stisla.user.request.draft', [
         'requests' => $requests
      ])->with('i');
   }

   public function progress()
   {
      $employee = Employee::where('email', auth()->user()->email)->first();
      $today = Carbon::now();
      $month = $today->format('m');
      $vessels = Vessel::get();
      $schedules = Schedule::get();
      // $depart = Department::where('email', auth()->user()->email)->first();

      $departs = ModelsRequest::selectRaw('id, date, department_id, code, origin_id, destination_id, func, status , description, schedule_id, activity_id')->where('employee_id', $employee->id)->where('status', '>', 0)->where('status', '<', 12)->orderBy('department_id', 'desc')->get()->groupBy('func');
      $progress = ModelsRequest::where('status', '>', 0)->get();
      return view('pages-stisla.user.request.progress', [
         'title' => 'Progress',
         'departs' => $departs,
         'vessels' => $vessels,
         'schedules' => $schedules,
         'month' => $month,
         'progress' => $progress
      ])->with('i');
   }

   public function release($id)
   {
      // dd('oke');
      $dekripId = dekripRambo($id);
      $now = Carbon::now();
      $request = ModelsRequest::find($dekripId);
      $type = $request->activity->type_id;
      $schedules = Schedule::where('date', $request->date)->get();
      $scheduleRoute = ScheduleRoute::where('date', $request->date)->where('port_id', $request->origin_id)->first();

      // jika request cargo
      if ($request->activity_id == 2) {
         $vessels = Vessel::where('type', 'Crew Boat')->where('latitude', '!=', null)->get();
         if (!$vessels) {
            $vessels = Vessel::where('latitude', '!=', null)->get();
         }
      } else {
         $vessels = Vessel::where('type','!=', 'Crew Boat')->where('latitude', '!=', null)->get();
         if (!$vessels) {
            $vessels = Vessel::where('latitude', '!=', null)->get();
         }
        
      }


      // $nearVessel = null;
      $reqDate = \Carbon\Carbon::parse($request->date)->format('Y-m-d');
      // dd($now->format('Y-m-d'));

      // $nearestVessels = array();
      if ($reqDate ==  $now->format('Y-m-d')) {
         // dd('today');
         foreach($vessels as $vessel){
            $vesselLat = $vessel->latitude;
            $vesselLong = $vessel->longitude;
            $portLat = $request->origin->latitude;
            $portLong = $request->origin->longitude;
            $distance = (new GeofenceController)->getDistance($vesselLat, $vesselLong, $portLat, $portLong);
            if($distance < 600){
               $nearestVessel = $vessel;
            }
         }

         // dd(count($nearestVessels) > 0);
         if ($nearestVessel) {
            // dd('ada kapal terdekat');
            if ($nearestVessel->schedule_id) {
               // dd('kapal sudah ada schedule');
               $request->update([
                  'status' => 1,
                  'schedule_id' => $nearestVessel->schedule->id
               ]);
               return redirect()->back()->with('success', 'Your request activity would be pick up at ' . \Carbon\Carbon::parse($nearestVessel->schedule->date)->format('d/m/Y') . ' by ' . $nearestVessel->name);
            } else {
               // dd('kapal blm ada schedule');
               $schedule = Schedule::create([
                  'by' => 'system',
                  'vessel_id' => $nearestVessel->id,
                  'type' => 2,
                  'status' => 0,
                  'date' => $request->date,
               ]);
               $nearestVessel->update([
                  'schedule_id' => $schedule->id
               ]);
               ScheduleRoute::create([
                  'schedule_id' => $schedule->id,
                  'port_id' => $request->origin_id,
                  'rank' => 1,
                  'status' => 1,
                  'date' => $request->date
               ]);
               $request->update([
                  'status' => 1,
                  'schedule_id' => $schedule->id,
               ]);
               return redirect()->back()->with('success', 'Your request activity would be pick up at ' . \Carbon\Carbon::parse($schedule->date)->format('d/m/Y') . ' by ' . $nearestVessel->name);
            }
         }
      }

      


      // dd('end');
      if($scheduleRoute){
         // dd('ada routeee');
         $schedule = Schedule::find($scheduleRoute->schedule_id);
         $request->update([
            'status' => 1,
            'schedule_id' => $schedule->id
         ]);
         return redirect()->back()->with('success', 'Your request activity would be pick up at ' . \Carbon\Carbon::parse($scheduleRoute->date)->format('d/m/Y') . ' by ' . $scheduleRoute->schedule->vessel->name);
      } 

      if ($schedules) {
         foreach($schedules as $schedule){
            $uncompleteRoute = ScheduleRoute::where('schedule_id', $schedule->id)->where('port_id', $request->origin_id)->where('status', 1)->first();
            if($uncompleteRoute != null ){
               $schedule = Schedule::find($uncompleteRoute->schedule_id);
               $request->update([
                  'status' => 1,
                  'schedule_id' => $schedule->id
               ]);
            }
         }
         return redirect()->back()->with('success', 'Your request activity would be pick up at ' . \Carbon\Carbon::parse($schedule->date)->format('d/m/Y') . ' by ' . $schedule->vessel->name);
      } else {
         $schedule = Schedule::create([
            'by' => 'user',
            'type' => 2,
            'status' => 0,
            'date' => $request->date,
         ]);
         $request->update([
            'status' => 1,
            'schedule_id' => $schedule->id,
         ]);
         return redirect()->back()->with('success', 'Your request activity would be pick up at ' . \Carbon\Carbon::parse($schedule->date)->format('d/m/Y'));
      }

      


      // $routineSchedule = Schedule::where('type', 1)->where('date', $request->date)->first();
      // // $routineSchedule = Schedule::where('type', 1)->where('date', $request->date)->first();
      // if ($routineSchedule) {
      //    // jika ada schedule rutin
      //    // dd('ada schedule rutin di tanggal berikut');
      //    $vessel = Vessel::find($routineSchedule->vessel_id);
      //    if ($routineSchedule->status > 1) {
      //       // dd('schedule sudah jalan');
      //       $request->update([
      //          'class' => 'additional',
      //          'status' => 1,
      //          'schedule_id' => $routineSchedule->id,
      //       ]);
      //    } else {
      //       // dd('schedule belum jalan');
      //       $request->update([
      //          'status' => 1,
      //          'schedule_id' => $routineSchedule->id,
      //       ]);
      //    }



      //    RequestHistory::create([
      //       'request_id' => $request->id,
      //       'date' => $now,
      //       'type' => 'released'
      //    ]);
      //    return redirect()->back()->with('success', 'Your request activity would be pick up at ' . \Carbon\Carbon::parse($routineSchedule->date)->format('d/m/Y') . ' by ' . $vessel->name);
      // } else {
      //    // jika tidak ada schedule rutin
      //    // dd('tidak ada schedule rutin ditanggal tersebut');
        

      //    $requestSchedule = Schedule::where('type', 2)->where('date', $request->date)->first();

      //    // $requestSchedule = Schedule::where('type', 2)->where('date', $request->date)->first();
      //    // cek apakah ada schedule by request ditanggal tersebut
      //    if ($requestSchedule) {
      //       // jika ada
      //       // cek deckspace kapal masih tersedia atau tidak
      //       // dd('ada schedule by requestSchedule di tanggal tersebut');
      //       $vessel = Vessel::find($requestSchedule->vessel_id);
      //       if ($vessel) {
      //          $vesselName = $vessel->name;
      //       } else {
      //          $vesselName = '-';
      //       }
      //       $request->update([
      //          'status' => 1,
      //          'schedule_id' => $requestSchedule->id,
      //       ]);
      //       RequestHistory::create([
      //          'request_id' => $request->id,
      //          'date' => $now,
      //          'type' => 'released'
      //       ]);
      //       return redirect()->back()->with('succedeed', 'Your request activity would be pick up at ' . \Carbon\Carbon::parse($requestSchedule->date)->format('d/m/Y') . ' by ' . $vesselName);
      //    } else {
      //       // dd('tidak ada schedule by request di tanggal tersebut');
      //       // $vessel = Vessel::where('port_id', $request->origin_id)->first();
      //       $schedule = Schedule::create([
      //          'by' => 'user',
      //          'type' => 2,
      //          'status' => 0,
      //          'date' => $request->date,
      //          // 'origin_id' => $request->origin_id,
      //          // 'destination_id' => $request->destination_id,
      //       ]);
      //       $request->update([
      //          'status' => 1,
      //          'schedule_id' => $schedule->id,
      //       ]);
      //       return redirect()->back()->with('succedeed', 'Your request activity would be pick up at ' . \Carbon\Carbon::parse($schedule->date)->format('d/m/Y'));
      //    }
      // }

   }

   public function releaseOld($id)
   {
      $dekripId = dekripRambo($id);
      $now = Carbon::now();
      $request = ModelsRequest::find($dekripId);
      $type = $request->activity->type_id;
      // dd($type);

      // if ($type == 2) {
      //    // dd('crew');
      //    $routineSchedule = Schedule::where('type', 1)->where('date', $request->date)->where('vessel_type', 'Crew Boat')->first();
      // } else {
      //    // dd('cargo');
      //    $routineSchedule = Schedule::where('type', 1)->where('date', $request->date)->where('vessel_type', '!=', 'Crew Boat')->first();
      //    // dd($routineSchedule->vessel->name);
      // }

      $routineSchedule = Schedule::where('type', 1)->where('date', $request->date)->first();
      // $routineSchedule = Schedule::where('type', 1)->where('date', $request->date)->first();
      if ($routineSchedule) {
         // jika ada schedule rutin
         // dd('ada schedule rutin di tanggal berikut');
         $vessel = Vessel::find($routineSchedule->vessel_id);
         if ($routineSchedule->status > 1) {
            // dd('schedule sudah jalan');
            $request->update([
               'class' => 'additional',
               'status' => 1,
               'schedule_id' => $routineSchedule->id,
            ]);
         } else {
            // dd('schedule belum jalan');
            $request->update([
               'status' => 1,
               'schedule_id' => $routineSchedule->id,
            ]);
         }



         RequestHistory::create([
            'request_id' => $request->id,
            'date' => $now,
            'type' => 'released'
         ]);
         return redirect()->back()->with('succedeed', 'Your request activity would be pick up at ' . \Carbon\Carbon::parse($routineSchedule->date)->format('d/m/Y') . ' by ' . $vessel->name);
      } else {
         // jika tidak ada schedule rutin
         // dd('tidak ada schedule rutin ditanggal tersebut');
         // if ($type == 2) {

         //    // dd('crew');
         //    $requestSchedule = Schedule::where('type', 2)->where('date', $request->date)->where('vessel_type', 'Crew Boat')->first();
         // } else {
         //    // dd('cargo');
         //    $requestSchedule = Schedule::where('type', 2)->where('date', $request->date)->where('vessel_type', '!=', 'Crew Boat')->first();
         // }

         $requestSchedule = Schedule::where('type', 2)->where('date', $request->date)->first();

         // $requestSchedule = Schedule::where('type', 2)->where('date', $request->date)->first();
         // cek apakah ada schedule by request ditanggal tersebut
         if ($requestSchedule) {
            // jika ada
            // cek deckspace kapal masih tersedia atau tidak
            // dd('ada schedule by requestSchedule di tanggal tersebut');
            $vessel = Vessel::find($requestSchedule->vessel_id);
            if ($vessel) {
               $vesselName = $vessel->name;
            } else {
               $vesselName = '-';
            }
            $request->update([
               'status' => 1,
               'schedule_id' => $requestSchedule->id,
            ]);
            RequestHistory::create([
               'request_id' => $request->id,
               'date' => $now,
               'type' => 'released'
            ]);
            return redirect()->back()->with('succedeed', 'Your request activity would be pick up at ' . \Carbon\Carbon::parse($requestSchedule->date)->format('d/m/Y') . ' by ' . $vesselName);
         } else {
            // dd('tidak ada schedule by request di tanggal tersebut');
            // $vessel = Vessel::where('port_id', $request->origin_id)->first();
            $schedule = Schedule::create([
               'by' => 'user',
               'type' => 2,
               'status' => 0,
               'date' => $request->date,
               // 'origin_id' => $request->origin_id,
               // 'destination_id' => $request->destination_id,
            ]);
            $request->update([
               'status' => 1,
               'schedule_id' => $schedule->id,
            ]);
            return redirect()->back()->with('succedeed', 'Your request activity would be pick up at ' . \Carbon\Carbon::parse($schedule->date)->format('d/m/Y'));
         }
      }


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

      // $request->update([
      //    'status' => 01
      // ]);

   }

   public function releasea($id)
   {
      $dekripId = dekripRambo($id);
      $request = ModelsRequest::find($dekripId);
      $availableVessel = Vessel::where('port_id', $request->origin_id)->first();
      $routineSchedule = Schedule::where('type', 1)->where('date', $request->date)->first();
      if ($routineSchedule) {
         // jika ada schedule rutin
         // dd('ada schedule rutin di tanggal berikut');
         $vessel = Vessel::find($routineSchedule->vessel_id);
         $request->update([
            'status' => 5,
            'schedule_id' => $routineSchedule->id,
         ]);
         return redirect()->back()->with('succedeed', 'Your request activity would be pick up at ' . \Carbon\Carbon::parse($routineSchedule->date)->format('d/m/Y') . ' by ' . $vessel->name);
      } else {
         // jika tidak ada schedule rutin
         // dd('tidak ada schedule rutin ditanggal tersebut');
         $requestSchedule = Schedule::where('type', 2)->where('date', $request->date)->first();
         if ($requestSchedule) {
            dd('ada schedule by request di tanggal tersebut');
         } else {
            dd('tidak ada schedule by request ditanggal tersebut');
         }
      }





      // cek apakah ada kapal di lokasi pickup
      if ($availableVessel) {
         // dd('ada vessel di lokasi pickup');

         // jika ada, cek apakah kapal tersebut sudah memiliki schedule apa blm
         if ($availableVessel->schedule) {
            dd('vessel dilokasi sudah memiliki schedule');
         } else {
            // dd('vessel dilokasi belum memiliki schedule');
            $route = ScheduleRoute::where('port_id', $request->origin_id)->first();
            // dd($route->schedule->date);
            if ($route) {
               dd('ada schedule yang akan melewati lokasi pickup');
               $request->update([
                  'schedule_id' => $route->schedule->id,
                  'status' => 5
               ]);

               return redirect()->back()->with('succedeed', 'Your request activity would be pick up at ' . \Carbon\Carbon::parse($route->schedule->date)->format('d/m/Y') . ' by ' . $route->schedule->vessel->name);
            } else {
               // dd('tidak ada schedule yang akan melewati lokasi pickup');
               // Jika tidak ada schedule yang melewati lokasi pickup
               $routineSchedule = Schedule::where('type', 1)->where('date', $request->date)->first();
               // Cek apakah ada schedule rutin ditanggal tersebut
               if ($routineSchedule) {
                  // jika ada schedule rutin
                  dd('ada schedule rutin di tanggal berikut');
                  $vessel = Vessel::find($routineSchedule->vessel_id);
                  $request->update([
                     'status' => 5,
                     'schedule_id' => $routineSchedule->id,
                  ]);
                  return redirect()->back()->with('succedeed', 'Your request activity would be pick up at ' . \Carbon\Carbon::parse($routineSchedule->date)->format('d/m/Y') . ' by ' . $vessel->name);
               } else {
                  // jika tidak ada schedule rutin
                  // dd('tidak ada schedule rutin ditanggal tersebut');
                  $requestSchedule = Schedule::where('type', 2)->where('date', $request->date)->first();
                  if ($requestSchedule) {
                     dd('ada schedule by request di tanggal tersebut');
                  } else {
                     dd('tidak ada schedule by request ditanggal tersebut');
                  }
               }
            }
            // $schedule = Schedule::create([
            //    'type' => 2,
            //    'status' => 0,
            //    'vessel_id' => $availableVessel->id,
            //    'date' => $request->date,
            //    'origin_id' => $request->origin_id,
            //    'destination_id' => $request->destination_id,
            //    // 'etd' => $req->departure_estimasi,
            //    // 'eta' => $req->arrive_estimasi,
            //    // 'remark' => $req->remark
            // ]);
            // return redirect()->back()->with('success', 'Request successfully sent to Marine, you got a vessel!');
         }
      } else {
         dd('dilokasi pickup tidak ada vessel');
         // jika tidak ada kapal dilokasi pickup, cek apakah ada schedule yang memilii rute melewati lokasi pickup
         $routineSchedule = Schedule::where('date', $request->date)->first();
         // Cek apakah ada schedule rutin ditanggal tersebut
         if ($routineSchedule) {
            // jika ada schedule rutin
            // dd('ada schedule rutin di tanggal berikut');
            $vessel = Vessel::find($routineSchedule->vessel_id);
            $request->update([
               'status' => 5,
               'schedule_id' => $routineSchedule->id,
            ]);
            return redirect()->back()->with('succedeed', 'Your request activity would be pick up at ' . \Carbon\Carbon::parse($routineSchedule->date)->format('d/m/Y') . ' by ' . $vessel->name);
         } else {
            // jika tidak ada schedule rutin
            dd('tidak ada schedule rutin');
         }
      }




      $activityName = $request->activity->name . ' ' . $request->description;

      $data = [
         'to' => 'Marine Department',
         'from' => $request->department->name . ' Department',
         'subject' => 'Request Activity Approval',
         'request' => $request,
         'body' => $activityName,
         'cargos' => $request->cargoItems,
         'link' => route('request.detail', enkripRambo($request->id))
      ];



      // Mail::to("develop@ekanuri.com")->send(new ApprovalEmail($data));
      // Mail::to("rahmattrust@gmail.com")->send(new ApprovalEmail($data));
      // return redirect()->back()->with('success', 'Email has sent');

      // $request->update([
      //    'status' => 01
      // ]);

      return redirect()->route('request.progress')->with('success', 'Request Activity successfully send to marine');
   }

   public function history()
   {
      $employee = Employee::where('email', auth()->user()->email)->first();
      $today = Carbon::now();
      $month = $today->format('m');
      $vessels = Vessel::get();
      $schedules = Schedule::get();
      // $depart = Department::where('email', auth()->user()->email)->first();

      $departs = ModelsRequest::selectRaw('id, date, department_id, code, origin_id, destination_id, func, status , description, schedule_id, activity_id')->where('employee_id', $employee->id)->where('status', '=', 12)->orderBy('department_id', 'desc')->get()->groupBy('func');
      $histories = ModelsRequest::where('status', '=', 12)->get();
      return view('pages-stisla.user.request.history', [
         'title' => 'Progress',
         'departs' => $departs,
         'vessels' => $vessels,
         'schedules' => $schedules,
         'month' => $month,
         'histories' => $histories
      ])->with('i');
   }

   public function undo(Request $req)
   {
      $request = ModelsRequest::find($req->requestId);
      $now = Carbon::now();

      $request->update([
         'status' => 202,
         'undo' => $now,
         'reason' => $req->reason
      ]);

      return redirect()->back()->with('success', 'Request Activity successfully Canceled, waiting approve Marine');
   }

   public function delete($id)
   {
      $dekripId = dekripRambo($id);
      $request = ModelsRequest::find($dekripId);
      $parentId = $request->parent->id;

      $cargoItems = CargoItem::where('request_id', $request->id)->get();
      foreach ($cargoItems as $item) {
         $item->delete();
      }

      $request->delete();

      return redirect()->route('request.detail.parent', enkripRambo($parentId))->with('success', 'Request Activity successfully deleted');
   }
}
