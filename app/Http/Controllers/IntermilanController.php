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
use App\Models\IntermilanTimeline;
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
use App\Models\RequestVessel;
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


    public function assignVessel(Request $req)
    {
        $request = ModelsRequest::find($req->requestId);
        $vessel = Vessel::find($req->vessel);

        $activity = null;
        $activity2 = null;
        if ($request->vessel_id == null) {
            $activity = 'Vessel Assigned to ' . $vessel->name;
            # code...
        } else {
            if ($request->vessel_id != $req->vessel) {
                $activity = 'Vessel Changed to '  . $vessel->name;
            }
        }
        if ($activity) {
            IntermilanTimeline::create([
                'intermilan_id' => $req->intermilanId,
                'request_id' => $request->id,
                'user_id' => auth()->user()->id,
                'activity' => $activity
            ]);
        }


        if ($request->est_start == null) {
            $activity2 = 'Date Set to ' . formatDate($req->est_start) . ' - ' . formatDate($req->est_end);
        } else {
            if ($request->est_start != $req->est_start || $request->est_end != $req->est_end) {
                $activity2 = 'Date Changed to' . formatDate($req->est_start) . ' - ' . formatDate($req->est_end);
            }
        }

        if ($activity2) {
            IntermilanTimeline::create([
                'intermilan_id' => $req->intermilanId,
                'request_id' => $request->id,
                'user_id' => auth()->user()->id,
                'activity' => $activity2
            ]);
        }

        $request->update([
            'vessel_id' => $req->vessel,
            'status' => 2,
            'intermilan_id' => $req->intermilanId,
            'est_start' => $req->est_start,
            'est_end' => $req->est_end
        ]);

        $requestVessels = RequestVessel::where('request_id', $request->id)->get();
        if (count($requestVessels) > 0) {
            foreach ($requestVessels as $rv) {
                $rv->delete();
            }
        }

        $start = Carbon::parse($req->est_start);
        $end   = Carbon::parse($req->est_end);

        $dates = [];

        while ($start->lte($end)) {
            $dates[] = $start->copy()->format('Y-m-d');
            $start->addDay();
        }

        // dd($dates);

        foreach ($dates as $d) {
            RequestVessel::create([
                'request_id' => $request->id,
                'vessel_id' => $req->vessel,
                'date' => $d
            ]);
        }







        return redirect()->back()->with('success', 'Vessel successfully assigned');
    }

    public function submitMarine(Request $req)
    {
        $intermilan = Intermilan::find($req->intermilanId);
        $requestUsers = ModelsRequest::where('intermilan_id', $intermilan->id)->where('status', 2)->get();
        foreach ($requestUsers as $request) {
            $request->update([
                'status' => 3
            ]);
        }

        return redirect()->back()->with('success', 'Intermilan submitted, Activity Plan in this Intermilan has been submitted to vessel');
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
            'created_by' => 'marine',
            'req_boat' => $req->req_boat
        ]);

        return redirect()->back()->with('success', 'Intermilan added');
    }

    public function importMaterial(Request $req)
    {
        Excel::import(new RequestDetailImport($req->requestId), $req->file('file'));
        return redirect()->back()->with('success', 'Material successfully imported');
    }

    public function deleteMarineRequest(Request $req)
    {

        //   dd('ok');
        $request = ModelsRequest::find($req->requestId);

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

    public function detailVessel($id)
    {
        $vessel = Vessel::find(dekripRambo($id));

        $pendingRequests = ModelsRequest::where('vessel_id', $vessel->id)->where('status', '3')->get();
        $progressRequests = ModelsRequest::where('vessel_id', $vessel->id)->where('status', '4')->get();
        $progressCargos = CargoItem::where('vessel_id', $vessel->id)->where('status', '2')->get();
        $confirmationRequests = ModelsRequest::where('vessel_id', $vessel->id)->where('status', '10')->get();

        return view('pages-stisla.marine.intermilan.detail-vessel', [
            'vessel' => $vessel,
            'pendingRequests' => $pendingRequests,
            'progressRequests' => $progressRequests,
            'confirmationRequests' => $confirmationRequests,
            'progressCargos' => $progressCargos

        ]);
    }



    public function crew($id)
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




        return view('pages-stisla.marine.intermilan.detail-crew', [
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


    public function timeline($id)
    {
        $intermilan = Intermilan::find(dekripRambo($id));
        $startDate = new Carbon($intermilan->from);
        $endDate = new Carbon($intermilan->to);
        $vessels = Vessel::get();

        $timelines = IntermilanTimeline::where('intermilan_id', $intermilan->id)->orderBy('created_at', 'desc')->get();


        // dd($paxSchedules);



        return view('pages-stisla.marine.intermilan.detail-timeline', [
            'intermilan' => $intermilan,
            'start' => $startDate,
            'end' => $endDate,
            'vessels' => $vessels,
            'now' => Carbon::now(),
            'timelines' => $timelines



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
