<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceSchedule;
use Illuminate\Http\Request;

class MaintenanceScheduleController extends Controller
{
    public function store(Request $req)
    {
        $req->validate([]);
        if ($req->maintenance_vessel != null) {
            $vessel = $req->maintenance_vessel;
            $barge = null;
        } elseif ($req->maintenance_barge != null) {
            $vessel = null;
            $barge = $req->maintenance_barge;
        }

        MaintenanceSchedule::create([
            'intermilan_id' => $req->intermilanId,
            'vessel_id' => $vessel,
            'barge_id' => $barge,
            'description' => $req->desc
        ]);

        return redirect()->back()->with('success', 'Maintenance Schedule berhasil ditambahkan');
    }


    public function delete($id)
    {
        $maintenanceSchedule = MaintenanceSchedule::find(dekripRambo($id));
        $maintenanceSchedule->delete();

        return redirect()->back()->with('success', 'Maintenance Schedule berhasil dihapus');
    }



    public function ajaxUpdate($id, Request $req)
    {
        $maintenanceSchedule = MaintenanceSchedule::find($id);
        $maintenanceSchedule->update([
            'vessel_id' => $req->vessel,
            'barge_id' => $req->barge,
            'description' => $req->desc,

        ]);

        return response()->json([
            'success' => true,
            'result' => $maintenanceSchedule->id,
            'message' => 'Maintenance Schedule berhasil di ubah'

        ]);
    }

    public function ajaxUpdateChange($id, Request $req)
    {
        $maintenanceSchedule = MaintenanceSchedule::find($id);
        $maintenanceSchedule->update([
            'vessel_id' => $req->vessel,
            'barge_id' => $req->barge,
            'description' => $req->desc,

        ]);

        return response()->json([
            'success' => true,
            'result' => $maintenanceSchedule->id,
            'message' => 'Maintenance Schedule berhasil di ubah'

        ]);
    }
}
