<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Mail\ApprovalEmail;
use App\Mail\NotificationEmail;
use App\Models\Activity;
use App\Models\CargoItem;
use App\Models\Department;
use App\Models\Employee;
use App\Models\ParentRequest;
use App\Models\Port;
use App\Models\Request as ModelsRequest;
use App\Models\RequestHistory;
use App\Models\Schedule;
use App\Models\Type;
use App\Models\Vessel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DepartmentRequestController extends Controller
{
   public function create()
   {
      if (auth()->user()->getDepartment()->name == 'Logistic') {
         $acts = Activity::where('type_id', 1)->get();
      } elseif (auth()->user()->getDepartment()->name == 'drilling') {
         $acts = Activity::where('type_id', 3)->orWhere('type_id', 4)->orWhere('type_id', 2)->get();
      } else {
         $acts = Activity::get();
      }
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
      $req->validate([
         'activity' => 'required',
      ]);
      $date = Carbon::today();
      $employee = Employee::where('email', auth()->user()->email)->first();
      $department = Department::find($employee->department->id);
      $now = Carbon::today();
      $request = ModelsRequest::orderBy("created_at", "desc")->first();
      $destination = Port::find($req->destination);

      if ($department->id == 2) {
         $type = 1;
      } elseif ($department->id == 3) {
         $type = 2;
      } else {
         $type = 3;
      }

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
         'type' => $type,
         'employee_id' => $employee->id,
         'department_id' => $department->id,
         'func' => $department->code,
         'activity_id' => $req->activity,
         'date' => $req->date,
         'description' => $req->desc,
         'origin_id' => $req->origin,
         'destination_id' => $req->destination,
         'destination_name' => $destination->name,
         'status' => 00
      ]);



      return redirect()->route('request.detail.parent', enkripRambo($parent->id))->with('success', 'Request Activity successfully saved');
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

      $request = ModelsRequest::orderBy("created_at", "desc")->first();
      if (isset($request)) {
         $code =
            "R/" . $department->code . '/' . $now->format("dmy") . '/' . ($request->id + 1);
      } else {
         $code = "R/"  . $department->code . '/' . $now->format("dmy") . '/' . 1;
      }

      ModelsRequest::create([
         'code' => $code,
         'type' => 0,
         'parent_id' => $parent->id,
         'employee_id' => $employee->id,
         'status' => 0,
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

      if (auth()->user()->getDepartment()->name == 'Logistic') {
         $acts = Activity::where('type_id', 1)->get();
      } elseif (auth()->user()->getDepartment()->name == 'drilling') {
         $acts = Activity::where('type_id', 3)->orWhere('type_id', 4)->orWhere('type_id', 2)->get();
      }
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
      $request = ModelsRequest::find($dekripId);

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

      $request->update([
         'status' => 01
      ]);

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
