<?php

namespace App\Http\Controllers;

use App\Models\Vdr;
use App\Models\VdrActivity;
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

        if ($vdr) {
            # code...
            $activities = VdrActivity::where('vdr_id', $vdr->id)->get();
        } else {
            $activities = null;
        }


        return view('pages.vdr.create-vdr', [
            'user' => $user,
            'vessel' => $vessel,
            'vdr' => $vdr,
            'activities' => $activities
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

    public function storeActivity(Request $req)
    {
        $req->validate([
            'id' => 'required',
            'vessel_id' => 'required',
            'created_by' => 'required',
            'activity' => 'required',
            'start' => 'required',
            'finish' => 'required',
            'high' => 'required',
            'normal' => 'required',
            'slow' => 'required',
            'manu' => 'required',
            'idle' => 'required',
            'tow' => 'required',
            'ah' => 'required',
            'sb' => 'required'
        ]);

        $createVdr = VdrActivity::create([
            'vdr_id' => $req->id,
            'created_by' => $req->created_by,
            'activity' => $req->activity,
            'start' => $req->start,
            'finish' => $req->finish,
            'high' => $req->high,
            'normal' => $req->normal,
            'slow' => $req->slow,
            'manu' => $req->manu,
            'idle' => $req->idle,
            'tow' => $req->tow,
            'ah' => $req->ah,
            'sb' => $req->sb
        ]);

        if ($createVdr) {
            # code...
            return redirect()->back()->with('success', 'Activity data successfully saved');
        } else {
            return redirect()->back()->with('warning', 'Activity gagal Disimpan!');
        }
    }

    public function updateActivity(Request $req)
    {
        $req->validate([
            'id' => 'required',
            'activity' => 'required',
            'start' => 'required',
            'finish' => 'required',
            'high' => 'required',
            'normal' => 'required',
            'slow' => 'required',
            'manu' => 'required',
            'idle' => 'required',
            'tow' => 'required',
            'ah' => 'required',
            'sb' => 'required'
        ]);



        $updateVdr = VdrActivity::where('id', $req->id)
            ->update([
                'activity' => $req->activity,
                'start' => $req->start,
                'finish' => $req->finish,
                'high' => $req->high,
                'normal' => $req->normal,
                'slow' => $req->slow,
                'manu' => $req->manu,
                'idle' => $req->idle,
                'tow' => $req->tow,
                'ah' => $req->ah,
                'sb' => $req->sb
            ]);

        if ($updateVdr) {
            # code...
            return redirect()->back()->with('success', 'Activity data successfully updated');
        } else {
            return redirect()->back()->with('warning', 'Activity gagal di update!');
        }
    }

    public function deleteActivity(Request $req)
    {
        $req->validate([
            'id' => 'required'
        ]);

        $deleteActivity  = VdrActivity::destroy($req->id);

        if ($deleteActivity) {
            # code...
            return redirect()->back()->with('success', 'Activity data successfully deleted');
        } else {
            return redirect()->back()->with('warning', 'Activity gagal di delete!');
        }
    }
}
