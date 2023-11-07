<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Mail\ApprovalEmail;
use App\Mail\NotificationEmail;
use App\Models\Activity;
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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
      $acts = Activity::orderBy('name', 'asc')->get();
      $activities = $acts;
      $types = Type::get();
      $ports = Port::get();
      return view('pages.request.create', [
         'activities' => $activities,
         'ports' => $ports,
         'types' => $types
      ]);
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
      return view('pages.request.draft', [
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

      return view('pages.request.progress', [
         'title' => 'Progress',
         'departs' => $departs,
         'vessels' => $vessels,
         'schedules' => $schedules,
         'month' => $month
      ])->with('i');
   }

   public function release($id)
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

      return view('pages.request.history', [
         'title' => 'Progress',
         'departs' => $departs,
         'vessels' => $vessels,
         'schedules' => $schedules,
         'month' => $month
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
