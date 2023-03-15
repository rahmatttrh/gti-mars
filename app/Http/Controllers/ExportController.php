<?php

namespace App\Http\Controllers;

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
}
