<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Port;
use App\Models\ReportSurveillance;
use App\Models\Status;
use App\Models\Surveillance;
use App\Models\SurveillanceCargo;
use App\Models\SurveillanceCrew;
use App\Models\Vessel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SurveillanceController extends Controller
{
    public function marine(){
        $surveillances = Surveillance::get();
        return view('pages-stisla.marine.surveillance.index', [
            'surveillances' => $surveillances
        ])->with('i');
    }

    public function create(){
        $today = Carbon::today();
        $employee = Employee::where('email', auth()->user()->email)->first();
        $port = Port::find($employee->port_id);

        if ($port->region == 'NBU') {
            $region = 'NBU';
            $vessel1 = Vessel::where('email', 'accelerate@pertamina.com')->first();
            $vessel2 = Vessel::where('email', 'prisai@pertamina.com')->first();
            $todaySurveillances = Surveillance::where('region', 'NBU')->where('date', $today)->get();
        } elseif($port->region == 'CBU'){
            $region = 'CBU';
            $vessel1 = Vessel::where('email', 'magelang@pertamina.com')->first();
            $vessel2 = Vessel::where('email', 'clarissa68@pertamina.com')->first();
            $todaySurveillances = Surveillance::where('region', 'CBU')->where('date', $today)->get();
        } elseif($port->region == 'SBU'){
            $region = 'SBU';
            $vessel1 = Vessel::where('email', 'castmarine3@pertamina.com')->first();
            $vessel2 = Vessel::where('email', 'accomplish@pertamina.com')->first();
            $todaySurveillances = Surveillance::where('region', 'SBU')->where('date', $today)->get();
        }

        if (count($todaySurveillances) > 0) {
            
        } else {
            Surveillance::create([
                'status' => 0,
                'region' => $region,
                'vessel_id' => $vessel1->id,
                'date' => $today,
            ]);
            Surveillance::create([
                'status' => 0,
                'region' => $region,
                'vessel_id' => $vessel2->id,
                'date' => $today,
            ]);
        }
        
       
        

        $todaySurveillances = Surveillance::where('region', $region)->where('date', $today)->get();

        return view('pages-stisla.user.surveillance.create', [
            'todaySurveillances' => $todaySurveillances,
        ]);
    }

    public function detail($id){
        $today = Carbon::today();
        $dekripId = dekripRambo($id);
        $surveillance = Surveillance::find($dekripId);
        

        $ports = Port::where('region', $surveillance->region)->get();
        $statuses = Status::where('type', 1)->get();

        if (auth()->user()->hasRole('department')) {
            $cargos = SurveillanceCargo::where('surveillance_id', $surveillance->id)->orderBy('origin_id', 'desc')->get();
            // dd($cargos);
            $crews = SurveillanceCrew::where('surveillance_id', $surveillance->id)->get();
        } else {
            $cargos = SurveillanceCargo::where('surveillance_id', $surveillance->id)->where('status', '>', 0)->orderBy('origin_id', 'desc')->get();
            $crews = SurveillanceCrew::where('surveillance_id', $surveillance->id)->where('status', '>', 0)->get();
        }

        $report = ReportSurveillance::where('surveillance_id', $surveillance->id)->latest()->first();
        $reports = ReportSurveillance::where('surveillance_id', $surveillance->id)->latest()->get();
        // dd($report->id);

        $surveillance->update([
            'total_weight' => $surveillance->cargos->where('status', '=', 1)->sum('weight')
        ]);

        $persenWeight = $surveillance->total_weight / $surveillance->vessel->deadweight * 100;


        return view('pages-stisla.surveillance.detail' , [
            'surveillance' => $surveillance,
            'report' => $report,
            'reports' => $reports,
            'ports' => $ports,
            'statuses' => $statuses,
            'cargos' => $cargos,
            'crews' => $crews,
            'persenWeight' => $persenWeight
        ])->with('i');
    }

    public function today(){
        $today = Carbon::today();
        $vessel = Vessel::where('email', auth()->user()->email)->first();
        $surveillance = Surveillance::where('vessel_id', $vessel->id)->where('date', $today)->first();
        // dd($surveillance->id);

        if ($surveillance) {
            return redirect()->route('surveillance.detail', enkripRambo($surveillance->id));
        } else {
            return redirect()->back()->with('warning', "You don't have Surveillance schedule for today");
        }

        

    }

    public function complete($id){
        $dekripId = dekripRambo($id);
        $surveillance = Surveillance::find($dekripId);

        $surveillance->update([
            'status' => 2
        ]);

        ReportSurveillance::create([
            'surveillance_id' => $surveillance->id,
            'status_id' => 12
        ]);

        return redirect()->back()->with('success', 'Surveillance completed');
    }

    public function historyVessel(){
        $vessel = Vessel::where('email', auth()->user()->email)->first();
        $histories = Surveillance::where('vessel_id', $vessel->id)->where('status', 2)->get();
        return view('pages-stisla.vessel.surveillance.history', [
            'histories' => $histories
        ])->with('i');
    }

    public function historyUser(){
        $port = Port::where('email', auth()->user()->email)->first();
        // $histories = Surveillance::where('user_id', $port->id)->where('status', 2)->get();
        $cargoHistories = SurveillanceCargo::where('user_id', auth()->user()->id)->where('status', 2)->get();
        return view('pages-stisla.user.surveillance.history', [
            'cargoHistories' => $cargoHistories
        ])->with('i');
    }
}
