<?php

namespace App\Http\Controllers;

use App\Models\Port;
use App\Models\Surveillance;
use App\Models\SurveillanceCargo;
use App\Models\SurveillanceCrew;
use App\Models\Vessel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SurveillanceController extends Controller
{
    public function create(){
        $avior = Vessel::where('email', 'avior@pertamina.com')->first();
        $marvela = Vessel::where('email', 'marvela08@pertamina.com')->first();
        return view('pages-stisla.user.surveillance.create', [
            'avior' => $avior,
            'marvela' => $marvela
        ]);
    }
    public function detail($id){
        $today = Carbon::today();
        $dekripId = dekripRambo($id);
        $vessel = Vessel::find($dekripId);
        $existingSurveillance = Surveillance::where('vessel_id', $vessel->id)->where('date', $today)->first();
        
        if ($existingSurveillance) {
            // dd('sudah ada');
            $surveillance = $existingSurveillance;
        } else {
            $surveillance = Surveillance::create([
                'status' => 0,
                'vessel_id' => $vessel->id,
                'date' => $today,
            ]);
        }

        $ports = Port::get();

        $cargos = SurveillanceCargo::where('surveillance_id', $surveillance->id)->orderBy('origin_id', 'desc')->get();
        $crews = SurveillanceCrew::where('surveillance_id', $surveillance->id)->get();


        return view('pages-stisla.user.surveillance.detail' , [
            'surveillance' => $surveillance,
            'ports' => $ports,
            'cargos' => $cargos,
            'crews' => $crews
        ])->with('i');
    }
}
