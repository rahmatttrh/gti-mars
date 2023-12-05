<?php

namespace App\Http\Controllers;

use App\Models\Port;
use App\Models\Status;
use App\Models\Surveillance;
use App\Models\SurveillanceCargo;
use App\Models\SurveillanceCrew;
use App\Models\Vessel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SurveillanceController extends Controller
{
    public function create(){
        $today = Carbon::today();
        $avior = Vessel::where('email', 'avior@pertamina.com')->first();
        $marvela = Vessel::where('email', 'marvela08@pertamina.com')->first();
        // dd($marvela->name);
        $todaySurveillances = Surveillance::where('date', $today)->get();
        if (count($todaySurveillances) > 0) {
           
        } else {
            Surveillance::create([
                'status' => 0,
                'vessel_id' => $avior->id,
                'date' => $today,
            ]);
            Surveillance::create([
                'status' => 0,
                'vessel_id' => $marvela->id,
                'date' => $today,
            ]);
        }

        $todaySurveillances = Surveillance::where('date', $today)->get();

        return view('pages-stisla.user.surveillance.create', [
            'todaySurveillances' => $todaySurveillances,
            'avior' => $avior,
            'marvela' => $marvela
        ]);
    }
    public function detail($id){
        $today = Carbon::today();
        $dekripId = dekripRambo($id);
        $surveillance = Surveillance::find($dekripId);
        // $existingSurveillance = Surveillance::where('vessel_id', $vessel->id)->where('date', $today)->first();
        
        // if ($existingSurveillance) {
        //     // dd('sudah ada');
        //     $surveillance = $existingSurveillance;
        // } else {
        //     $surveillance = Surveillance::create([
        //         'status' => 0,
        //         'vessel_id' => $vessel->id,
        //         'date' => $today,
        //     ]);
        // }

        $ports = Port::get();
        $statuses = Status::where('type', 1)->get();

        if (auth()->user()->hasRole('Deparmtent')) {
            $cargos = SurveillanceCargo::where('surveillance_id', $surveillance->id)->orderBy('origin_id', 'desc')->get();
            $crews = SurveillanceCrew::where('surveillance_id', $surveillance->id)->get();
        } else {
            $cargos = SurveillanceCargo::where('surveillance_id', $surveillance->id)->where('status', '>', 0)->orderBy('origin_id', 'desc')->get();
            $crews = SurveillanceCrew::where('surveillance_id', $surveillance->id)->where('status', '>', 0)->get();
        }
        


        return view('pages-stisla.user.surveillance.detail' , [
            'surveillance' => $surveillance,
            'ports' => $ports,
            'statuses' => $statuses,
            'cargos' => $cargos,
            'crews' => $crews
        ])->with('i');
    }
}
