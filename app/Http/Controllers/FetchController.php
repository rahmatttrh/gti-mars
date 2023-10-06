<?php

namespace App\Http\Controllers;

use App\Models\Jetty;
use App\Models\Port;
use App\Models\Schedule;
use Illuminate\Http\Request;

class FetchController extends Controller
{
   public function fetchJetty($value)
   {

      $port = Port::find($value);
      $jetties = Jetty::where('port_id', $port->id)->get();

      // Masukin ke array
      $result = array();
      $result[] = '<option selected value=""></option>';
      foreach ($jetties as $row) {
         $result[] = '<option value="' . $row->id . '">' .  $row->name . '</option>';
      }

      // Kirim balik ke ajax
      return response()->json([
         'success' => true,
         'result' => $result

      ]);
   }

   public function fetchSchedule($date, $value)
   {

      $schedules = Schedule::where('date', $date)->where('jetty_id', $value)->get();

      // Masukin ke array
      $result = array();
      // $result[] = '<div class="list-group-item">
      //    <div class="row">
      //       <div class="col text-truncate">
      //          <a href="#" class="text-body d-block">09:00 - 10:00</a>
      //          <div class="text-muted text-truncate mt-n1 text-uppercase">Giat Jaya</div>
      //       </div>
      //    </div>
      // </div>';
      foreach ($schedules as $row) {
         $result[] = '<div class="list-group-item">
         <div class="row">
            <div class="col text-truncate">
               <a href="#" class="text-body d-block"><small>' . $row->docking  . ' - ' . $row->departure . '</small></a>
               <div class="text-muted text-truncate mt-n1 text-uppercase"><small>' . $row->vessel->name . '</small></div>
            </div>
         </div>
      </div>';
      }

      // Kirim balik ke ajax
      return response()->json([
         'success' => true,
         'result' => $result

      ]);
   }


   public function fetchSchedules($date)
   {

      $schedules = Schedule::where('date', $date)->get();

      // Masukin ke array
      $result = array();
      // $result[] = '<div class="list-group-item">
      //    <div class="row">
      //       <div class="col text-truncate">
      //          <a href="#" class="text-body d-block">09:00 - 10:00</a>
      //          <div class="text-muted text-truncate mt-n1 text-uppercase">Giat Jaya</div>
      //       </div>
      //    </div>
      // </div>';
      foreach ($schedules as $row) {
         if ($row->vessel_id != null) {
            $vesselName = $row->vessel->name;
            $vesselType = $row->vessel->type;
            $totalWeight = $row->total_weight;
            $vesselDeadweight = $row->vessel->deadweight;
            $persen = $totalWeight / $vesselDeadweight * 100;
         } else {
            $vesselName = '-';
            $vesselType = '';
            $totalWeight = 0;
            $vesselDeadweight = '0';
            $persen = '-';
         }
         $result[] = '<tr>
         <td>' . \Carbon\Carbon::parse($row->date)->format('d/m/Y') . '</td>
         <td>
            ' . $vesselName  . '
         </td>
         <td>' . $vesselType  . ' </td>
         <td>' . $persen  . ' %</td>
         
      </tr>';
      }

      // Kirim balik ke ajax
      return response()->json([
         'success' => true,
         'result' => $result

      ]);
   }
}
