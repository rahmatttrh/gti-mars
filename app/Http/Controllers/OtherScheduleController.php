<?php

namespace App\Http\Controllers;

use App\Models\OtherSchedule;
use Illuminate\Http\Request;

class OtherScheduleController extends Controller
{
    public function store(Request $req)
    {
        $req->validate([]);


        OtherSchedule::create([
            'intermilan_id' => $req->intermilanId,
            'description' => $req->desc
        ]);

        return redirect()->back()->with('success', 'Lain-lain berhasil ditambahkan');
    }


    public function delete($id)
    {
        $otherSchedule = OtherSchedule::find(dekripRambo($id));
        $otherSchedule->delete();

        return redirect()->back()->with('success', 'Lain-lain Schedule berhasil dihapus');
    }


    public function ajaxUpdate($id, Request $req)
    {
        $otherSchedule = OtherSchedule::find($id);
        $otherSchedule->update([

            'description' => $req->desc,

        ]);

        return response()->json([
            'success' => true,
            'result' => $otherSchedule->id,
            'message' => 'Lain-lain berhasil di ubah'
        ]);
    }
}
