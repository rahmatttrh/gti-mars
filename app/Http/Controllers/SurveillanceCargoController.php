<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Surveillance;
use App\Models\SurveillanceCargo;
use Illuminate\Http\Request;

class SurveillanceCargoController extends Controller
{
    public function store(Request $req){
        $surveillance = Surveillance::find($req->surveillance);
        $employee = Employee::where('email', auth()->user()->email)->first();

        SurveillanceCargo::create([
            'status' => 0,
            'surveillance_id' => $surveillance->id,
            'employee_id' => $employee->id,
            // 'date' => $surveillance->date,
            'origin_id' => $employee->port_id,
            'destination_id' => $req->destination,
            'desc' => $req->desc,
            'qty' => $req->qty,
            'unit' => $req->unit,
            'weight' => $req->weight
        ]);

        return redirect()->back()->with('success', 'Cargo Added.');
    }

    public function send($id){
        $dekripId = dekripRambo($id);
        $surveillanceCargo = SurveillanceCargo::find($dekripId);
        $surveillanceCargo->update([
            'status' => 1
        ]);
        return redirect()->back()->with('success', 'Cargo Sent.');

    }
}
