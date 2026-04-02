<?php

namespace App\Http\Controllers;

use App\Models\CargoItem;
use App\Models\Department;
use App\Models\Employee;
use App\Models\IntermilanUser;
use App\Models\Port;
use App\Models\Request as ModelsRequest;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Vessel;
use Carbon\Carbon;
use Deprecated;
use Illuminate\Http\Request;

class IntermilanUserController extends Controller
{
   public function store(Request $req)
   {
      $req->validate([]);

      $user = User::find(auth()->user()->id);

      $lastIntermilan = IntermilanUser::where('user_id', $user->id)->orderBy('updated_at', 'desc')->get();

      if ($lastIntermilan != null) {
         $id = count($lastIntermilan) + 1;
      } else {
         $id = 1;
      }
      $from = Carbon::make($req->from);
      $to = Carbon::make($req->to);

      $code =  'I/U/' . $from->format('d') . $to->format('d')  . $from->format('m') . $from->format('y')  .  '/' . $id;

      IntermilanUser::create([
         'code' => $code,
         'user_id' => auth()->user()->id,
         'from' => $req->from,
         'to' => $req->to,
         'title' => $req->title
      ]);

      return redirect()->back()->with('success', 'Intermilan User successfully added');
   }

   public function detail($id)
   {
      $intermilan = IntermilanUser::find(dekripRambo($id));
      $intermilanUsers = IntermilanUser::orderBy('from', 'desc')->get();
      $startDate = new Carbon($intermilan->from);
      $endDate = new Carbon($intermilan->to);
      $dates = array();
      $ports = Port::get();

      while ($startDate->lte($endDate)) {
         $dates[] = $startDate->toDateString();
         $startDate->addDay();
      }
      // dd($dates);


      $startDate = $intermilan->from;
      // dd($startDate);
      $endDate = $intermilan->to;
      $requests = ModelsRequest::where('status', '>=', 1)->whereBetween('date', [$startDate, $endDate])->get();
      $users = ModelsRequest::selectRaw('id, date, department_id, code, origin_id, destination_id, func, status,user_id , user_name , description, schedule_id, activity_id')->where('status', '>', 0)->where('activity_id', '!=', 7)->whereBetween('date', [$startDate, $endDate])->get()->groupBy('user_name');
      // dd(count($requests));





      $today = Carbon::now();



      // $month = $today->format('m');
      $month = $today->format('m');
      $year = $today->format('Y');
      // dd($year);

      $vessels = Vessel::get();
      $vessel3 = Vessel::paginate('3');
      // dd($today->format('m'));

      if ($month == 1) {
         $monthName = 'Januari';
      } elseif ($month == 2) {
         $monthName = 'Februari';
      } elseif ($month == 3) {
         $monthName = 'Maret';
      } elseif ($month == 4) {
         $monthName = 'April';
      } elseif ($month == 5) {
         $monthName = 'Mei';
      } elseif ($month == 6) {
         $monthName = 'Juni';
      } elseif ($month == 7) {
         $monthName = 'Juli';
      } elseif ($month == 8) {
         $monthName = 'Agustus';
      } elseif ($month == 9) {
         $monthName = 'September';
      } elseif ($month == 10) {
         $monthName = 'Oktober';
      } elseif ($month == 11) {
         $monthName = 'November';
      } elseif ($month == 12) {
         $monthName = 'Desember';
      }

      $now = Carbon::now();
      // dd($now->format('Y-m-d'));

      // $yearMonth = $now->format('Y-m');
      $yearMonth = $year . '-' . $month;
      // dd($yearMonth);
      $start = Carbon::parse($yearMonth)->startOfMonth();
      $end = Carbon::parse($yearMonth)->endOfMonth();

      $dates = [];
      while ($start->lte($end)) {
         $dates[] = $start->copy();
         $start->addDay();
      }

      // dd($dates);
      foreach ($dates as $date) {
         // dd($date->format('Y-m-d'));

         $requests = ModelsRequest::get();
         foreach ($requests as $req) {
            if ($req->date == $date->format('Y-m-d')) {
               // dd('Ada');
            }
         }
      }

      $employee = Employee::where('email', auth()->user()->email)->first();
      $vessel = '';
      $schedules = Schedule::where('type', 2)->where('status', '>', 1)->whereMonth('date', $month)->whereYear('date', $year)->get();

      $empl = Employee::where('email', auth()->user()->email)->first();
      if ($empl) {
         // dd('ok');
         $user = Employee::where('email', auth()->user()->email)->first();
         $confirms = ModelsRequest::where('destination_id', auth()->user()->getPort())->where('status', 10)->get();
         $requests = ModelsRequest::where('employee_id', auth()->user()->getEmployeeId())->orderBy('parent_id', 'asc')->get();
      } else {
         $user = User::where('email', auth()->user()->email)->first();
         // dd($user->port_id);
         $port = Port::where('email', auth()->user()->email)->first();
         if ($port == null) {
            // dd('ok');
            $portId = auth()->user()->port_id;
         } else {
            $portId = $port->id;
         }
         $confirms = ModelsRequest::where('destination_id', $portId)->where('status', 10)->get();
         $requests = ModelsRequest::where('user_id', auth()->user()->id)->orderBy('parent_id', 'asc')->get();
      }

      $cargoItems = CargoItem::where('user_id', auth()->user()->id)->get();

      $allRequests = ModelsRequest::get();

      // dd(auth()->user()->getPort());

      $titipRequests = ModelsRequest::where('user_id', auth()->user()->id)->where('status', 0)->where('request_id', '!=', null)->get();
      $userRequests = ModelsRequest::where('user_id', auth()->user()->id)->orderBy('parent_id', 'asc')->get();
      $ports = Port::get();

      // dd($user->name);


      $lastIntermilan = $intermilan;
      $startDate = new Carbon($lastIntermilan->from);
      $endDate = new Carbon($lastIntermilan->to);
      $userRequests = ModelsRequest::where('user_id', auth()->user()->id)->whereBetween('date', [$startDate, $endDate])->orderBy('parent_id', 'asc')->get();


      return view('pages-stisla.user.intermilan.detail', [
         'intermilans' => $intermilanUsers,
         'lastIntermilan' => $lastIntermilan,
         'startDate' => $startDate,
         'endDate' => $endDate,
         'ports' => $ports,
         'userRequests' => $userRequests,
         'month' => $month,
         'year' => $year,
         'user' => $user,
         'today' => $today,
         'allRequests' => $allRequests,
         'requests' => $requests,
         'monthName' => $monthName,
         'vessel' => $vessel,
         'vessels' => $vessels,
         // 'vessel3' => $vessel3,
         'schedules' => $schedules,
         'confirms' => $confirms,
         'dates' => $dates,
         'titipRequests' => $titipRequests,
         'cargoItems' => $cargoItems
      ])->with('i');
   }

   public function storeRequest(Request $req)
   {
      $intermilan = IntermilanUser::find($req->intermilanId);


      $user = User::find(auth()->user()->id);
      $port = Port::where('email', $user->email)->first();
      $employee = Employee::where('email', $port->email)->first();

      $now = Carbon::today();
      $request = ModelsRequest::where('user_id', $user->id)->orderBy("created_at", "desc")->first();
      // $employee = Employee::where('email', auth()->user()->email)->first();
      // dd($employee->id);

      // dd($employee->department_id);
      if ($employee) {
         $employeeId = $employee->id;
         $departmentId = Department::find($employee->department->id)->id;
         $departmentCode = Department::find($employee->department->id)->code;
      } else {
         $departmentId = null;
         $employeeId = null;
         $departmentCode = null;
      }


      if ($user->hasRole('vessel')) {
         $level = 'V';
      } else if ($user->hasRole('department')) {
         $level = 'U';
      }

      if (isset($request)) {
         $code =
            "R/" . $level . '/' . $now->format("dmy") . '/' . ($request->id + 1);
      } else {
         $code = "R/"  . $level . '/' . $now->format("dmy") . '/' . 1;
      }

      if (isset($lastSchedule)) {
         $scheduleCode =
            "SO"  . '/' . $now->format("dmy") . '/' . ($lastSchedule->id + 1);
      } else {
         $scheduleCode = "SO"   . '/' . $now->format("dmy") . '/' . 1;
      }

      if ($req->activity == 1 || $req->activity == 2 || $req->activity == 7) {
         $status = 0;
      } else {
         $status = 1;
      }

      $requestUser = ModelsRequest::create([
         'code' => $code,
         'type' => 2,
         'class' => 'main',
         'user_id' => $user->id,
         'user_name' => $user->name,
         'employee_id' => $employeeId,
         'department_id' => $departmentId,
         'func' => $departmentCode,
         'desc' => $req->desc,
         'description' => $req->desc,
         'activity_id' => 1,
         'date' => $req->date,
         'origin_id' => $req->origin,
         'destination_id' => $req->destination,
         'status' => 0
      ]);

      return redirect()->back()->with('success', 'Request added');
   }

   public function releaseRequest($id)
   {
      $request = ModelsRequest::find(dekripRambo($id));

      $request->update([
         'status' => 1
      ]);

      foreach ($request->cargoItems as $item) {
         $item->update([
            'status' => 1
         ]);
      }

      return redirect()->back()->with('success', 'Request successfully released');
   }

   public function cancelRequest($id)
   {
      $request = ModelsRequest::find(dekripRambo($id));

      $request->update([
         'status' => 0
      ]);

      foreach ($request->cargoItems as $item) {
         $item->update([
            'status' => 0
         ]);
      }

      return redirect()->back()->with('success', 'Request successfully canceled');
   }


   public function storeCargo(Request $req)
   {
      // $intermilan = Intermilan::find($req->intermilan);

      $request = ModelsRequest::find($req->requestId);
      $user = User::find(auth()->user()->id);
      $port = Port::where('email', $user->email)->first();
      // dd($port->region);
      $cargoItem = CargoItem::orderBy("created_at", "desc")->first();

      // dd($request->)
      // dd($port->name);
      if ($port) {
         $mtdThis = $port->mtd;
      } else {
         $mtdThis = '1';
      }

      if (isset($cargoItem)) {
         $mtd = $mtdThis . ($cargoItem->id + 1);
      } else {
         $mtd =  $mtdThis  . 1;
      }

      if ($port->region == 'SBU') {
         $mtd = 'S' . $mtd;
      } elseif ($port->region == 'CBU') {
         $mtd = 'C' . $mtd;
      } elseif ($port->region == 'NBU') {
         $mtd = 'N' . $mtd;
      } else {
         $mtd = '0' . $mtd;
      }



      // dd($mtd);
      // $user = User::find()

      CargoItem::create([
         'type' => 'main',
         'status' => 0,
         'request_id' => $req->requestId,
         'no_doc' => $req->no_document,
         'mtd' => $mtd,
         'contract' => $req->contract,
         'description' => $req->desc,
         'qty' => $req->qty,
         'qty_package' => $req->qty_package,
         'unit' => $req->unit,
         'size' => $req->size,
         'weight' => $req->weight,
         'remark' => $req->remark,
         'date' => $request->date,
         'user_id' => $user->id,
         'user_name' => $user->username
      ]);

      $request->update([
         'total_size' => $request->cargoItems->sum('size'),
         'total_weight' => $request->cargoItems->sum('weight')
      ]);




      return redirect()->back()->with('success', 'Cargo Item successfully added');
   }

   public function updateCargo(Request $req)
   {
      // $intermilan = Intermilan::find($req->intermilan);

      $request = ModelsRequest::find($req->requestId);
      $cargo = CargoItem::find($req->cargoId);

      $user = User::find($request->user_id);
      $port = Port::where('email', $user->email)->first();

      $cargo->update([
         'contract' => $req->contract,
         'description' => $req->desc,
         'qty' => $req->qty,
         'qty_package' => $req->qty_package,
         'unit' => $req->unit,
         'size' => $req->size,
         'weight' => $req->weight,
         'remark' => $req->remark,
      ]);



      $request->update([
         'total_size' => $request->cargoItems->sum('size'),
         'total_weight' => $request->cargoItems->sum('weight')
      ]);




      return redirect()->back()->with('success', 'Cargo Item successfully updated');
   }
}
