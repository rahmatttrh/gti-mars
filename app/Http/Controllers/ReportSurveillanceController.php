<?php

namespace App\Http\Controllers;

use App\Models\ReportSurveillance;
use Illuminate\Http\Request;

class ReportSurveillanceController extends Controller
{
    public function store(Request $req){
        $req->validate([]);

        ReportSurveillance::create([
            'surveillance_id' => $req->surveillance,
            'status_id' => $req->status,
            'port_id' => $req->port
        ]);

        return redirect()->back()->with('success', 'Report saved.');
    }
}
