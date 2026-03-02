<?php

namespace App\Http\Controllers;

use App\Models\Request as ModelsRequest;
use App\Models\Schedule;
use App\Models\Vdr;
use App\Models\Vessel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExportController extends Controller
{
   public function schedule($status, $month)
   {

      $dekripMonth = dekripRambo($month);
      // dd($dekripMonth);
      if ($dekripMonth == 1) {
         $monthName = 'Januari';
      } elseif ($dekripMonth == 2) {
         $monthName = 'Februari';
      } elseif ($dekripMonth == 3) {
         $monthName = 'Maret';
      } elseif ($dekripMonth == 4) {
         $monthName = 'April';
      } elseif ($dekripMonth == 5) {
         $monthName = 'Mei';
      } elseif ($dekripMonth == 6) {
         $monthName = 'Juni';
      } elseif ($dekripMonth == 7) {
         $monthName = 'Juli';
      } elseif ($dekripMonth == 8) {
         $monthName = 'Agustus';
      } elseif ($dekripMonth == 9) {
         $monthName = 'September';
      } elseif ($dekripMonth == 10) {
         $monthName = 'Oktober';
      } elseif ($dekripMonth == 11) {
         $monthName = 'November';
      } elseif ($dekripMonth == 12) {
         $monthName = 'Desember';
      }

      $schedules = Schedule::whereMonth('date', $dekripMonth)->get();
      if ($status == 'plan') {
         $requests = ModelsRequest::whereMonth('date', $dekripMonth)->where('status', '=', 2)->get();
      } elseif ($status == 'order') {
         $requests = ModelsRequest::whereMonth('date', $dekripMonth)->where('status', '>', 2)->get();
      } elseif ($status == 'history') {
         $requests = ModelsRequest::whereMonth('date', $dekripMonth)->where('status', '=', 12)->get();
      }



      $now = Carbon::now();
      $html = view("pages.pdf.schedule", [
         "schedules" => $schedules,
         'requests' => $requests,
         'month' => $monthName,
         "now" => $now
      ])->with("i");

      $filename = "Schedule Month: " . $dekripMonth;

      $pdf = \App::make("dompdf.wrapper");

      $pdf->loadHTML($html)->setPaper("a4", "landscape");
      return $pdf->stream($filename);
   }

   public function cargo()
   {

      $now = Carbon::now();
      $html = view("pages.pdf.cargo-receipt", [
         "now" => $now
      ])->with("i");

      $filename = "Cargo Receipt";

      $pdf = \App::make("dompdf.wrapper");

      $pdf->loadHTML($html)->setPaper("a4", "landscape");
      return $pdf->stream($filename);
   }

   public function request($month)
   {
      $dekripMonth = dekripRambo($month);
      if ($dekripMonth == 1) {
         $monthName = 'Januari';
      } elseif ($dekripMonth == 2) {
         $monthName = 'Februari';
      } elseif ($dekripMonth == 3) {
         $monthName = 'Maret';
      } elseif ($dekripMonth == 4) {
         $monthName = 'April';
      } elseif ($dekripMonth == 5) {
         $monthName = 'Mei';
      } elseif ($dekripMonth == 6) {
         $monthName = 'Juni';
      } elseif ($dekripMonth == 7) {
         $monthName = 'Juli';
      } elseif ($dekripMonth == 8) {
         $monthName = 'Agustus';
      } elseif ($dekripMonth == 9) {
         $monthName = 'September';
      } elseif ($dekripMonth == 10) {
         $monthName = 'Oktober';
      } elseif ($dekripMonth == 11) {
         $monthName = 'November';
      } elseif ($dekripMonth == 12) {
         $monthName = 'Desember';
      }

      $requests = ModelsRequest::whereMonth('date', $dekripMonth)->get();
      // $requests = ModelsRequest::whereMonth('date', $dekripMonth)->groupBy('department_id')->get();
      $departs = ModelsRequest::selectRaw('id, department_id, code, date, func, description, schedule_id, activity_id')->orderBy('department_id', 'desc')->whereMonth('date', $dekripMonth)->where('status', '=', 1)->get()->groupBy('func');

      $now = Carbon::now();
      $html = view("pages.pdf.request", [
         "departs" => $departs,
         'month' => $monthName,
         "now" => $now
      ])->with("i");

      $filename = "Request Activity Month: " . $dekripMonth;

      $pdf = \App::make("dompdf.wrapper");

      $pdf->loadHTML($html)->setPaper("a4", "landscape");
      return $pdf->stream($filename);
   }

   public function requestProgress($month)
   {
      $dekripMonth = dekripRambo($month);
      if ($dekripMonth == 1) {
         $monthName = 'Januari';
      } elseif ($dekripMonth == 2) {
         $monthName = 'Februari';
      } elseif ($dekripMonth == 3) {
         $monthName = 'Maret';
      } elseif ($dekripMonth == 4) {
         $monthName = 'April';
      } elseif ($dekripMonth == 5) {
         $monthName = 'Mei';
      } elseif ($dekripMonth == 6) {
         $monthName = 'Juni';
      } elseif ($dekripMonth == 7) {
         $monthName = 'Juli';
      } elseif ($dekripMonth == 8) {
         $monthName = 'Agustus';
      } elseif ($dekripMonth == 9) {
         $monthName = 'September';
      } elseif ($dekripMonth == 10) {
         $monthName = 'Oktober';
      } elseif ($dekripMonth == 11) {
         $monthName = 'November';
      } elseif ($dekripMonth == 12) {
         $monthName = 'Desember';
      }

      $requests = ModelsRequest::whereMonth('date', $dekripMonth)->get();
      // $requests = ModelsRequest::whereMonth('date', $dekripMonth)->groupBy('department_id')->get();
      $departs = ModelsRequest::selectRaw('id, department_id, code,status,  date, func, description, schedule_id, activity_id')->orderBy('department_id', 'desc')->whereMonth('date', $dekripMonth)->where('status', '>', 1)->get()->groupBy('func');

      $now = Carbon::now();
      $html = view("pages.pdf.request", [
         "departs" => $departs,
         'month' => $monthName,
         "now" => $now
      ])->with("i");

      $filename = "Request Activity Month: " . $dekripMonth;

      $pdf = \App::make("dompdf.wrapper");

      $pdf->loadHTML($html)->setPaper("a4", "landscape");
      return $pdf->stream($filename);
   }




   public function index()
   {
      return view('pages-stisla.vdr.report.index', [
         'data' => 0
      ]);
   }

   public function filter(Request $req)
   {
      // dd('ok');
      $from = Carbon::create($req->from);
      $to = Carbon::create($req->to);
      $vessel = Vessel::where('username', auth()->user()->username)->first();

      $vdrs = Vdr::where('vessel_id', $vessel->id)->whereBetween('date', [$from, $to])->where('status', 4)->orderBy('date', 'desc')->get();
      return view('pages-stisla.vdr.report.index', [
         'data' => 1,
         'vessel' => $vessel,
         'from' => $from,
         'to' => $to,
         'vdrs' => $vdrs
      ])->with('i');
   }

   public function vdrMultiple($from, $to, $vessel)
   {
      // dd('ok');
      $from = Carbon::create(dekripRambo($from));
      $to = Carbon::create(dekripRambo($to));
      $vessel = Vessel::find(dekripRambo($vessel));

      $vdrs = Vdr::where('vessel_id', $vessel->id)->whereBetween('date', [$from, $to])->where('status', 4)->orderBy('date', 'desc')->get();
      return view('pages.document.vdr-multiple', [
         'data' => 1,
         'vessel' => $vessel,
         'from' => $from,
         'to' => $to,
         'vdrs' => $vdrs
      ])->with('i');
   }


   public function indexMarine()
   {
      $vessels = Vessel::get();
      return view('pages-stisla.vdr.report.index-marine', [
         'vessels' => $vessels,
         'data' => 0
      ]);
   }

   public function filterMarine(Request $req)
   {
      // dd('ok');
      $from = Carbon::create($req->from);
      $to = Carbon::create($req->to);
      $vessel = Vessel::find($req->vessel);
      $vessels = Vessel::get();

      $vdrs = Vdr::where('vessel_id', $vessel->id)->whereBetween('date', [$from, $to])->where('status', 4)->orderBy('date', 'desc')->get();
      return view('pages-stisla.vdr.report.index-marine', [
         'data' => 1,
         'vessel' => $vessel,
         'from' => $from,
         'to' => $to,
         'vdrs' => $vdrs,
         'vessels' => $vessels
      ])->with('i');
   }
}
