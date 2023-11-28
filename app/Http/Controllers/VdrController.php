<?php

namespace App\Http\Controllers;

use App\Models\Vdr;
use App\Models\VdrActivity;
use App\Models\VdrCargo;
use App\Models\VdrCargoHeading;
use App\Models\VdrHse;
use App\Models\VdrHseHeader;
use App\Models\VdrWeather;
use App\Models\VdrWeatherHeading;
use App\Models\Vessel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VdrController extends Controller
{
    public function index()
    {
        return view('pages.vdr.vdr', [])->with('i');
    }

    public function create()
    {

        $user = auth()->user();

        // Opsi 1 
        $vessel = Vessel::where('email', $user->email)->first();

        $vdr = Vdr::where('vessel_id', $vessel->id)->where('date', date('Y-m-d'))->first();

        if ($vdr) {
            # code...
            $activities = VdrActivity::where('vdr_id', $vdr->id)->get();
            $cargos = VdrCargo::where('vdr_id', $vdr->id)->get();
            $weathers = VdrWeather::where('vdr_id', $vdr->id)->get();
            $hses = VdrHse::where('vdr_id', $vdr->id)->get();
            // 
        } else {
            $activities = null;
            $cargos = null;
            $weathers = null;
            $hses = null;
        }

        return view('pages.vdr.vdr-create', [
            'user' => $user,
            'vessel' => $vessel,
            'vdr' => $vdr,
            'activities' => $activities,
            'cargos' => $cargos,
            'weathers' => $weathers,
            'hses' => $hses,
        ])->with('i');

        // return view('pages.vdr.create-vdr', [
        //     'user' => $user,
        //     'vessel' => $vessel,
        //     'vdr' => $vdr,
        //     'activities' => $activities,
        //     'cargos' => $cargos,
        //     'weathers' => $weathers,
        //     'hses' => $hses,
        // ])->with('i');
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

        DB::beginTransaction();

        try {

            $vdr = Vdr::create([
                'vessel_id' => $req->vessel_id,
                'date' => $req->date,
                'crew_onduty' => $req->onduty,
                'crew_max' => $req->max,
                'location_midnight' => $req->location_midnight,
                'created_by' => $req->created_by
            ]);

            $cargoHeadings = VdrCargoHeading::get();

            foreach ($cargoHeadings as $key => $heading) {
                # code...

                $vdrCargo = VdrCargo::where('vdr_id', $vdr->id)
                    ->where('heading_id', $heading->id)
                    ->first();

                if (!$vdrCargo) {
                    # code...
                    $createVdrCargo = VdrCargo::create([
                        'vdr_id' => $vdr->id,
                        'heading_id' => $heading->id,
                        'created_by' => $vdr->created_by,
                        'created_at' => NOW(),
                        'updated_at' => NOW()
                    ]);
                }
            }

            $wHeadings = VdrWeatherHeading::get();

            foreach ($wHeadings as $key => $heading) {
                # code...
                $vdrWeather = VdrWeather::where('vdr_id', $vdr->id)
                    ->where('heading_id', $heading->id)
                    ->first();

                if (!$vdrWeather) {
                    # code...
                    $createVdrWeather = VdrWeather::create([
                        'vdr_id' => $vdr->id,
                        'heading_id' => $heading->id,
                        'created_at' => NOW(),
                        'updated_at' => NOW()
                    ]);
                }
            }

            $hseHeadings = VdrHseHeader::get();

            foreach ($hseHeadings as $key => $heading) {
                # code...
                $vdrHse = VdrHse::where('vdr_id', $vdr->id)
                    ->where('header_id', $heading->id)
                    ->first();

                if (!$vdrHse) {
                    # code...
                    $createVdrWeather = VdrHse::create([
                        'vdr_id' => $vdr->id,
                        'header_id' => $heading->id,
                        'created_at' => NOW(),
                        'updated_at' => NOW()
                    ]);
                }
            }


            // Jika semuanya berhasil, kita commit transaksi
            DB::commit();

            return back()->with('success', 'VDR data successfully saved.');
            
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, kita rollback transaksi
            DB::rollback();
            Log::error('Kesalahan saat menjalankan transaksi: ' . $e->getMessage());
            return back()->with('warning', 'Terjadi kesalahan: ' . $e->getMessage());

            return back()->with('warning', 'Failed, Data gagal di Update!');
            // Handle atau laporkan kesalahan
            // return response()->json(['message' => 'Failed to create order'], 500);
        }
    }

    public function edit($id){
        $user = auth()->user();
        // Opsi 1 
        $vessel = Vessel::where('email', $user->email)->first();

        $dekripId = dekripRambo($id);
        $vdr = Vdr::find($dekripId);
        $activities = VdrActivity::where('vdr_id', $vdr->id)->get();
        $cargos = VdrCargo::where('vdr_id', $vdr->id)->get();
        $weathers = VdrWeather::where('vdr_id', $vdr->id)->get();
        $hses = VdrHse::where('vdr_id', $vdr->id)->get();

        return view('pages-stisla.vessel.vdr.edit', [
            'user' => $user,
            'vessel' => $vessel,
            'vdr' => $vdr,
            'activities' => $activities,
            'cargos' => $cargos,
            'weathers' => $weathers,
            'hses' => $hses,
        ]);
    }

    public function update(Request $req)
    {
        $req->validate([
            'id' => 'required',
            'onduty' => 'required|numeric',
            'max' => 'required|numeric',
            'location_midnight' => 'required'
        ]);

        $vdr = Vdr::find($req->id);

        DB::beginTransaction();

        try {

            $updateVdr = $vdr->update([
                'crew_onduty' => $req->onduty,
                'crew_max' => $req->max,
                'location_midnight' => $req->location_midnight
            ]);


            // Jika semuanya berhasil, kita commit transaksi
            DB::commit();

            return back()->with('success', 'VDR data successfully updated.');
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, kita rollback transaksi
            DB::rollback();
            Log::error('Kesalahan saat menjalankan transaksi: ' . $e->getMessage());
            return back()->with('warning', 'Terjadi kesalahan: ' . $e->getMessage());

            return back()->with('warning', 'Failed, Data gagal di Update!');
            // Handle atau laporkan kesalahan
            // return response()->json(['message' => 'Failed to create order'], 500);
        }
    }

    public function storeActivity(Request $req)
    {

        // dd($req);
        // $req->validate([
        //     'id' => 'required',
        //     'vessel_id' => 'required',
        //     'created_by' => 'required',
        //     'activity' => 'required',
        //     'start' => 'required',
        //     'finish' => 'required',
        //     'high' => 'required',
        //     'normal' => 'required',
        //     'slow' => 'required',
        //     'manu' => 'required',
        //     'idle' => 'required',
        //     'tow' => 'required',
        //     'ah' => 'required',
        //     'sb' => 'required'
        // ]);

        

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

    public function updateCargo(Request $req)
    {
        $req->validate([
            'id' => 'required',
            'vdr_id' => 'required'
        ]);

        $cargo = VdrCargo::find($req->id);


        $updateCargo = $cargo->update([
            'opening' => $req->opening,
            'consumption' => $req->consumption,
            'received' => $req->received,
            'transferred' => $req->transferred,
            'closing' => $req->closing,
            'remarks' => $req->remarks
        ]);

        if ($updateCargo) {
            # code...
            return redirect()->back()->with('success', 'Vdr Cargo data successfully updated');
        } else {
            return redirect()->back()->with('warning', 'Vdr Cargo gagal di update!');
        }
    }
}
