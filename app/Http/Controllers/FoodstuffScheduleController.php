<?php

namespace App\Http\Controllers;

use App\Models\FoodstuffSchedule;
use Illuminate\Http\Request;

class FoodstuffScheduleController extends Controller
{
    public function store(Request $req)
    {
        FoodstuffSchedule::create([
            'intermilan_id' => $req->intermilanId,
            'vessel_id' => $req->foodstuff_vessel,
            'location' => $req->location,
            'description' => $req->description,
            'schedule' => $req->schedule
        ]);

        return redirect()->back()->with('success', 'Schedule Foodstuff berhasil ditambahkan');
    }

    public function delete($id)
    {
        $foodstuffSchedule = FoodstuffSchedule::find(dekripRambo($id));
        $foodstuffSchedule->delete();

        return redirect()->back()->with('success', 'Foodstuff Schedule berhasil dihapus');
    }


    public function ajaxUpdate($id, Request $req)
    {
        $foodstuffSchedule = FoodstuffSchedule::find($id);
        $foodstuffSchedule->update([
            'vessel_id' => $req->vessel,
            'location' => $req->location,
            'description' => $req->desc,
            'schedule' => $req->schedule,

        ]);

        return response()->json([
            'success' => true,
            'result' => $foodstuffSchedule->id,
            'message' => 'Foodstuff Schedule berhasil di ubah'

        ]);
    }

    public function ajaxUpdateChange($id, Request $req)
    {
        $foodstuffSchedule = FoodstuffSchedule::find($id);
        $foodstuffSchedule->update([
            'vessel_id' => $req->vessel,
            'location' => $req->location,
            'description' => $req->desc,
            'schedule' => $req->schedule,

        ]);

        return response()->json([
            'success' => true,
            'result' => $foodstuffSchedule->id,
            'message' => 'Foodstuff Schedule berhasil di ubah'

        ]);
    }
}
