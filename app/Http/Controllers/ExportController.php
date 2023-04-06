<?php

namespace App\Http\Controllers;

use App\Models\Request as ModelsRequest;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExportController extends Controller
{
   public function schedule($month)
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

      $schedules = Schedule::whereMonth('date', $dekripMonth)->get();

      $now = Carbon::now();
      $html = view("pages.pdf.schedule", [
         "schedules" => $schedules,
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
}
