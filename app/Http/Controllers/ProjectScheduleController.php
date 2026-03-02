<?php

namespace App\Http\Controllers;

use App\Models\ProjectSchedule;
use Illuminate\Http\Request;

class ProjectScheduleController extends Controller
{
    public function store(Request $req)
    {
        ProjectSchedule::create([
            'intermilan_id' => $req->intermilanId,
            'vessel_id' => $req->project_vessel,
            'description' => $req->description,
            'port_id' => $req->project_port
        ]);

        return redirect()->back()->with('success', 'Project Schedule berhasil ditambahkan');
    }


    public function delete($id)
    {
        $projectSchedule = ProjectSchedule::find(dekripRambo($id));
        $projectSchedule->delete();

        return redirect()->back()->with('success', 'Project Schedule berhasil dihapus');
    }


    public function ajaxUpdate($id, Request $req)
    {
        $projectSchedule = ProjectSchedule::find($id);
        $projectSchedule->update([
            'vessel_id' => $req->vessel,
            'description' => $req->desc,
            'port_id' => $req->port,

        ]);

        return response()->json([
            'success' => true,
            'result' => $projectSchedule->id,
            'message' => 'Project Schedule berhasil di ubah'

        ]);
    }


    public function ajaxUpdateChange($id, Request $req)
    {
        $projectSchedule = ProjectSchedule::find($id);
        $projectSchedule->update([
            'vessel_id' => $req->vessel,
            'description' => $req->desc,
            'port_id' => $req->port,

        ]);

        return response()->json([
            'success' => true,
            'result' => $projectSchedule->id,
            'message' => 'Project Schedule berhasil di ubah'

        ]);
    }
}
