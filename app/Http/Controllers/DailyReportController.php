<?php

namespace App\Http\Controllers;


use App\Models\DailyBargeLocation;
use App\Models\DailyReport;
use App\Models\Port;
use App\Models\Vessel;
use Illuminate\Http\Request;

class DailyReportController extends Controller
{
    public function index()
    {
        $dailyReports = DailyReport::orderBy('date', 'desc')->get();
        return view('pages-stisla.marine.daily-report.index', [
            'dailyReports' => $dailyReports
        ]);
    }

    public function create()
    {
        $barges = Port::where('type', 'Barge')->get();
        $vessels = Vessel::get();
        return view('pages-stisla.marine.daily-report.create', []);
    }

    public function store(Request $req)
    {
        $req->validate([]);

        $currentDailyReport = DailyReport::where('date', $req->date)->first();
        if ($currentDailyReport != null) {
            return redirect()->route('daily.report.detail', enkripRambo($currentDailyReport->id))->with('success', 'Daily Report di tanggal tersebut sudah ada');
        } else {
            $dailyReport = DailyReport::create([
                'date' => $req->date,
                'status' => 0
            ]);

            return redirect()->route('daily.report.detail', enkripRambo($dailyReport->id))->with('success', 'Daily Report berhasil dibuat');
        }
    }


    public function detail($id)
    {
        $dailyReport = DailyReport::find(dekripRambo($id));
        $barges = Port::where('type', 'Barge')->get();
        $vessels = Vessel::get();


        $dailyBargeLocs = DailyBargeLocation::where('daily_id', $dailyReport->id)->get();
        return view('pages-stisla.marine.daily-report.detail', [
            'dailyReport' => $dailyReport,
            'barges' => $barges,
            'vessels' => $vessels,

            'dailyBargeLocs' => $dailyBargeLocs
        ]);
    }
}
