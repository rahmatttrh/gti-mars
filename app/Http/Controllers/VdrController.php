<?php

namespace App\Http\Controllers;

use App\Models\Vdr;
use App\Models\Vessel;
use Illuminate\Http\Request;

class VdrController extends Controller
{
    public function index()
    {
        return view('pages.vdr.vdr', [])->with('i');
    }

    public function create()
    {
        // dd(auth()->user());
        // $employee = Employee::find($dekripId);

        $user = auth()->user();

        // Opsi 1 
        $vessel = Vessel::where('email', $user->email)->first();

        $vdr = Vdr::where('vessel_id', $vessel->id)->where('date', date('Y-m-d'))->first();

        return view('pages.vdr.create-vdr', [
            'user' => $user,
            'vessel' => $vessel,
            'vdr' => $vdr
        ])->with('i');
    }


    public function store(Request $req)
    {
        $req->validate([
            'vessel_id' => 'required',
            'created_by' => 'required',
            'date' => 'required',
            'onduty' => 'required|numeric',
            'max' => 'required|numeric',
            'location_midnight' => 'required'
        ]);

        // dd($req);
        $cek = Vdr::where('vessel_id', $req->vessel_id)->where('date', $req->date)->first();

        if ($cek) {
            # code...
            return redirect()->back()->with('warning', 'VDR gagal Disimpan, karena sudah ada pada hari ini!');
        }

        $vdr = Vdr::create([
            'vessel_id' => $req->vessel_id,
            'date' => $req->date,
            'crew_onduty' => $req->onduty,
            'crew_max' => $req->max,
            'location_midnight' => $req->location_midnight,
            'created_by' => $req->created_by
        ]);

        if ($vdr) {
            # code...
            return redirect()->back()->with('success', 'VDR data successfully saved');
        } else {
            return redirect()->back()->with('warning', 'VDR gagal Disimpan!');
        }
    }

    public function update(Request $req)
    {
        $req->validate([
            'id' => 'required',
            'onduty' => 'required|numeric',
            'max' => 'required|numeric',
            'location_midnight' => 'required'
        ]);


        $updateVdr = Vdr::where('id', $req->id)->update([
            'crew_onduty' => $req->onduty,
            'crew_max' => $req->max,
            'location_midnight' => $req->location_midnight
        ]);

        if ($updateVdr) {
            # code...
            return redirect()->back()->with('success', 'VDR data successfully updated');
        } else {
            return redirect()->back()->with('warning', 'VDR gagal Diupdate!');
        }
    }
}
