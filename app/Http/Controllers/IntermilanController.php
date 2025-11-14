<?php

namespace App\Http\Controllers;

use App\Imports\RequestDetailImport;
use App\Models\BargeSchedule;
use App\Models\CargoItem;
use App\Models\Department;
use App\Models\Employee;
use App\Models\FoodstuffSchedule;
use App\Models\HopperSchedule;
use App\Models\Intermilan;
use App\Models\InterWeather;
use App\Models\IpbSchedule;
use App\Models\LiftingSchedule;
use App\Models\MainStrategy;
use App\Models\MaintenanceSchedule;
use App\Models\OtherSchedule;
use App\Models\PaxSchedule;
use App\Models\Port;
use App\Models\ProjectSchedule;
use App\Models\Request as ModelsRequest;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Vessel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class IntermilanController extends Controller
{
    public function index()
    {


        // $users = User::get();
        $vessels = Vessel::get();



        // dd($users);

        $now = Carbon::now();
        $today = $now->format('l');
        // dd($today);

        if ($today == 'Friday') {
            // dd('Friday');
            $start = $now->addDay(-4);
            $end = Carbon::now()->addDays(3);
        }
        if ($today == 'Saturday') {
            // dd('Monday');
            $start = $now->addDay(-5);
            $end = Carbon::now()->addDays(2);
        }
        if ($today == 'Sunday') {
            // dd('Monday');
            $start = $now->addDay(-6);
            $end = Carbon::now()->addDays(1);
        }
        if ($today == 'Monday') {
            // dd('Monday');
            $start = $now->addDay(+0);
            $end = Carbon::now()->addDays(7);
        }
        if ($today == 'Tuesday') {
            // dd('Monday');
            $start = $now;
            $end = Carbon::now()->addDays(8);
        }
        if ($today == 'Wednesday') {
            // dd('Monday');
            $start = $now->addDays(-2);
            $end = Carbon::now()->addDays(5);
        }
        if ($today == 'Thursday') {
            // dd('Monday');
            $start = $now->addDays(-3);
            $end = Carbon::now()->addDays(4);
        }

        // dd($start);



        $start = $start->format('Y-m-d');
        // dd($start);
        $end = $end->format('Y-m-d');

        $requests = ModelsRequest::where('status', 1)->orderBy('date', 'desc')->get();


        $lastIntermilan = Intermilan::orderBy('to', 'desc')->first();
        if ($lastIntermilan) {
            $start = Carbon::make($lastIntermilan->to)->addDay();
            $to = Carbon::make($lastIntermilan->to)->addDay();
            $end = $to->addDays(6);
        } else {
            $start = Carbon::now();
            $end = Carbon::now();
        }


        // dd($start);


        return view('pages-stisla.marine.intermilan.index', [
            'intermilans' => Intermilan::orderBy('from', 'desc')->get(),
            'now' => Carbon::now(),
            'requests' => $requests,

            'start' => $start->format('Y-m-d'),
            'end' => $end->format('Y-m-d')
        ])->with('i');
    }


    public function storeMarine(Request $req)
    {
        $lastIntermilan = Intermilan::orderBy('updated_at', 'desc')->get();

        if ($lastIntermilan != null) {
            $id = count($lastIntermilan) + 1;
        } else {
            $id = 1;
        }

        $from = Carbon::make($req->from);
        $to = Carbon::make($req->to);

        $code =  'I/M/' . $from->format('d') . $to->format('d')  . $from->format('m') . $from->format('y')  .  '/' . $id;
        // dd($code);
        Intermilan::create([
            'status' => 0,
            'code' => $code,
            'title' => $req->title,
            'from' => $req->from,
            'to' => $req->to
        ]);

        return redirect()->back()->with('success', 'Intermilan added');
    }

    public function storeMarineCargo(Request $req)
    {
        $intermilan = Intermilan::find($req->intermilan);

        $request = ModelsRequest::find($req->requestId);
        $user = User::find($request->user_id);
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

    public function updateMarineCargo(Request $req)
    {
        $intermilan = Intermilan::find($req->intermilan);

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

    public function storeMarineRequest(Request $req)
    {
        $intermilan = Intermilan::find($req->intermilan);

        $port = Port::find($req->user);
        $user = User::where('email', $port->email)->first();
        $employee = Employee::where('email', $port->email)->first();

        $now = Carbon::today();
        $request = ModelsRequest::orderBy("created_at", "desc")->first();
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
            'date' => $intermilan->from,
            'origin_id' => $req->origin,
            'destination_id' => $req->destination,
            'status' => $status,
            'created_by' => 'marine'
        ]);

        return redirect()->back()->with('success', 'Intermilan added');
    }

    public function importMaterial(Request $req)
    {
        Excel::import(new RequestDetailImport($req->requestId), $req->file('file'));
        return redirect()->back()->with('success', 'Material successfully imported');
    }

    public function deleteMarineRequest($id)
    {

        dd('ok');
        $request = ModelsRequest::find(dekripRambo($id));

        foreach ($request->cargoItems as $item) {
            $item->delete();
        }

        $request->delete();

        return redirect()->back()->with('success', 'Request successfully deleted');
    }



    public function detail($id)
    {
        $intermilan = Intermilan::find(dekripRambo($id));
        $vessels = Vessel::get();
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
        $weekSchedules = Schedule::where('class', '!=', 'Crew Change')->whereBetween('date', [$startDate, $endDate])->orderBy('date', 'asc')->get();
        $schedules = Schedule::orderBy('date', 'asc')->whereBetween('date', [$startDate, $endDate])->get();
        // dd(count($requests));

        $cargoItems = CargoItem::whereBetween('date', [$startDate, $endDate])->get();



        return view('pages-stisla.marine.intermilan.detail', [
            'intermilan' => $intermilan,
            'vessels' => $vessels,
            'requests' => $requests,
            'schedules' => $schedules,
            'weekSchedules' => $weekSchedules,
            'users' => Port::get(),
            'dates' => $dates,
            'start' => $startDate,
            'end' => $endDate,
            'cargoItems' => $cargoItems,
            'now' => Carbon::now(),
            'ports' => $ports
        ])->with('i');
    }

    public function risalah($id)
    {
        $intermilan = Intermilan::find(dekripRambo($id));
        $startDate = new Carbon($intermilan->from);
        $endDate = new Carbon($intermilan->to);
        $vessels = Vessel::get();
        $schedules = Schedule::orderBy('date', 'asc')->whereBetween('date', [$startDate, $endDate])->get();
        $weekSchedules = Schedule::where('class', '!=', 'Crew Change')->whereBetween('date', [$startDate, $endDate])->orderBy('date', 'asc')->get();
        $requests = ModelsRequest::where('status', '>=', 1)->whereBetween('date', [$startDate, $endDate])->get();

        $weather = InterWeather::where('intermilan_id', $intermilan->id)->first();
        if ($weather) {
            # code...
        } else {
            $weather =  InterWeather::create([
                'intermilan_id' => $intermilan->id
            ]);
        }

        $ipbs = IpbSchedule::where('intermilan_id', $intermilan->id)->get();
        if (count($ipbs) == 0) {
            IpbSchedule::create([
                'intermilan_id' => $intermilan->id,
                'status' => 1,
                'title' => 'SBU'
            ]);
            IpbSchedule::create([
                'intermilan_id' => $intermilan->id,
                'status' => 1,
                'title' => 'CBU'
            ]);
            IpbSchedule::create([
                'intermilan_id' => $intermilan->id,
                'status' => 1,
                'title' => 'NBU'
            ]);
        }

        $liftingSchedules = LiftingSchedule::where('intermilan_id', $intermilan->id)->get();
        $ipbs = IpbSchedule::where('intermilan_id', $intermilan->id)->get();

        $barges = Port::where('type', 'barge')->get();
        $platforms = Port::where('type', 'Platform')->get();


        $bargeSchedules = BargeSchedule::where('intermilan_id', $intermilan->id)->get();
        $projectSchedules = ProjectSchedule::where('intermilan_id', $intermilan->id)->get();
        $foodstuffSchedules = FoodstuffSchedule::where('intermilan_id', $intermilan->id)->get();
        $paxSchedules = PaxSchedule::where('intermilan_id', $intermilan->id)->get();
        $maintenanceSchedules = MaintenanceSchedule::where('intermilan_id', $intermilan->id)->get();
        $hopperSchedules = HopperSchedule::where('intermilan_id', $intermilan->id)->get();
        $otherSchedules = OtherSchedule::where('intermilan_id', $intermilan->id)->get();
        $mainStrategies = MainStrategy::where('intermilan_id', $intermilan->id)->get();
        // dd($paxSchedules);



        return view('pages-stisla.marine.intermilan.detail-risalah', [
            'intermilan' => $intermilan,
            'start' => $startDate,
            'end' => $endDate,
            'vessels' => $vessels,
            'schedules' => $schedules,
            'now' => Carbon::now(),
            'weekSchedules' => $weekSchedules,
            'requests' => $requests,

            'weather' => $weather,
            'barges' => $barges,
            'liftingSchedules' => $liftingSchedules,
            'ipbs' => $ipbs,
            'bargeSchedules' => $bargeSchedules,
            'projectSchedules' => $projectSchedules,
            'platforms' => $platforms,
            'foodstuffSchedules' => $foodstuffSchedules,
            'paxSchedules' => $paxSchedules,
            'maintenanceSchedules' => $maintenanceSchedules,
            'hopperSchedules' => $hopperSchedules,
            'otherSchedules' => $otherSchedules,
            'mainStrategies' => $mainStrategies

        ])->with('i');
    }


    public function ajaxUpdate($id, Request $req)
    {
        $intermilan = Intermilan::find($id);
        $intermilan->update([

            'body' => $req->body,

        ]);

        return response()->json([
            'success' => true,
            'result' => $intermilan->id,
            'message' => 'Note berhasil di ubah'
        ]);
    }
}
