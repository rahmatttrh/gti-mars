<?php

namespace App\Http\Controllers;

use App\Models\Vdr;
use App\Models\Vessel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TimesheetController extends Controller
{
    public function filter(Request $req)
    {
        $month = $req->month;
        $year = $req->year;

        $vessels = Vessel::get();
        $vesselId = [];

        foreach ($vessels as $vessel) {
            $vesselId[] = $vessel->id;
        }
        $vdrs = Vdr::whereIn('vessel_id', $vesselId)->get();

        $totalDays = Carbon::create($year, $month)->daysInMonth;

        // dd($vdrs);

        return view('main-costcontrol', [
            'vessels' => $vessels,
            'vdrs' => $vdrs,
            'month' => $month,
            'year' => $year,
            'totalDays' => $totalDays

        ])->with('i');
    }

    public function filterVessel(Request $req)
    {
        $vessel = Vessel::find($req->vesselId);
        // dd($vessel->name);
        return redirect()->route('timesheet.vessel.detail', [enkripRambo($vessel->id), enkripRambo($req->month), enkripRambo($req->year)]);
    }

    public function vesselDetail($id, $month, $year)
    {
        $vessel = Vessel::find(dekripRambo($id));
        $month = dekripRambo($month);
        $year = dekripRambo($year);
        $current  = Carbon::createFromDate($year, $month, 1);
        $totalDays = Carbon::create($year, $month)->daysInMonth;


        $vdrVessels = Vdr::where('vessel_id', $vessel->id)
            ->whereMonth('date', $month)
            ->whereYear('date', $year)
            ->where('status', 4)
            ->get();

        // dd($vdrVessels);

        $totalVdrs = count($vdrVessels);
        $percent = round(($totalVdrs / $totalDays) * 100);



        return view('pages-stisla.timesheet.detail-vessel', [
            'vessel' => $vessel,
            'current' => $current,
            'month' => $month,
            'year' => $year,
            'vdrVessels' => $vdrVessels,
            'totalDays' => $totalDays,
            'totalVdrs' => $totalVdrs,
            'percent' => $percent
        ])->with('i');
    }

    public function exportPdf($id, $month, $year)
    {
        $vessel = Vessel::find(dekripRambo($id));
        $month = dekripRambo($month);
        $year = dekripRambo($year);
        $current  = Carbon::createFromDate($year, $month, 1);
        $totalDays = Carbon::create($year, $month)->daysInMonth;


        $vdrVessels = Vdr::where('vessel_id', $vessel->id)
            ->whereMonth('date', $month)
            ->whereYear('date', $year)
            ->where('status', 4)
            ->get();

        $lastVdr = Vdr::where('vessel_id', $vessel->id)
            ->whereMonth('date', $month)
            ->whereYear('date', $year)
            ->where('status', 4)
            ->orderBy('date', 'desc')
            ->first();

        // dd($vdrVessels);

        $totalVdrs = count($vdrVessels);
        $percent = round(($totalVdrs / $totalDays) * 100);

        // dd('ok');


        return view('pages-stisla.timesheet.pdf', [
            'vessel' => $vessel,
            'lastVdr' => $lastVdr,
            'current' => $current,
            'month' => $month,
            'year' => $year,
            'vdrVessels' => $vdrVessels,
            'totalDays' => $totalDays,
            'totalVdrs' => $totalVdrs,
            'percent' => $percent
        ])->with('i');
    }
}
