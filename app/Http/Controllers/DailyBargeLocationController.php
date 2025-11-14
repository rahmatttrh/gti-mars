<?php

namespace App\Http\Controllers;

use App\Models\DailyBargeLocation;
use Illuminate\Http\Request;

class DailyBargeLocationController extends Controller
{
    public function store(Request $req)
    {
        $req->validate([]);

        DailyBargeLocation::create([
            'daily_id' => $req->dailyId,
            'barge' => $req->barge,
            'loc' => $req->loc,
            'area' => $req->area
        ]);

        return redirect()->back()->with('success', 'Barge/Rig/Tanker Location addeed');
    }


    public function delete($id)
    {
        $dailyBargeLoc = DailyBargeLocation::find(dekripRambo($id));
        $dailyBargeLoc->delete();

        return redirect()->back()->with('success', 'Barge/Rig/Tanker Location deleted');
    }
}
