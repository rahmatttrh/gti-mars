<?php

namespace App\Http\Controllers;

use App\Models\Jetty;
use App\Models\Port;
use App\Models\Schedule;
use App\Models\ScheduleRoute;
use App\Models\Vessel;
use Illuminate\Http\Request;

use App\Http\Controllers\GeofenceController;
use Carbon\Carbon;

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

   public function fetchScheduleOld($date, $value)
   {

      $schedules = Schedule::where('date', $date)->where('jetty_id', $value)->get();
      // dd($schschedulesedu);
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


   public function fetchSchedulesOld2($date, $origin)
   {

      $schedules = Schedule::where('date', $date)->get();
      $scheduleRoutes = ScheduleRoute::where('date', $date)->where('port_id', $origin);
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

   public function fetchSchedules($date, $origin)
   {

      $now = Carbon::now();
      $schedules = Schedule::where('date', $date)->get();
      // dd($schedules);
      $scheduleRoutes = ScheduleRoute::where('port_id', $origin)->where('date', '>=', $date)->orderBy('date', 'asc')->take(5)->get();

      // Masukin ke array
      $result = array();
      $near = array();
      $routes = array();

      $nearestVessels = array();
      $port = Port::find($origin);
      $portLat = $port->latitude;
      $portLong = $port->longitude;
      $vessels = Vessel::where('latitude', '!=', null)->get();

      
      // $nearVessel = null;
      foreach($vessels as $vessel){
         $vesselLat = $vessel->latitude;
         $vesselLong = $vessel->longitude;
         $distance = (new GeofenceController)->getDistance($vesselLat, $vesselLong, $portLat, $portLong);
         if($distance < 30000){
            $nearestVessels[] = $vessel;
            $nearVessel = $vessel;
         }
      }

      // foreach($nearestVessels as $near){
      //    $tesVes = $near->name;
      // }
      // dd($nearestVessels);
      
      foreach ($scheduleRoutes as $row) {
         $schedule = Schedule::find($row->schedule_id);
         $first = ScheduleRoute::where('schedule_id', $schedule->id)->where('rank', 1)->first();

         if ($row->schedule->vessel_id != null) {
            $vesselName = $row->schedule->vessel->name;
            $vesselType = $row->schedule->vessel->type;
            $totalWeight = $row->schedule->total_weight;
            $vesselDeadweight = $row->schedule->vessel->deadweight;
            $persen = $totalWeight / $vesselDeadweight * 100;
         } else {
            $vesselName = '-';
            $vesselType = '';
            $totalWeight = 0;
            $vesselDeadweight = '0';
            $persen = '-';
         }

         $result[] = '<tr>
            <td>
               ' . $vesselName  . ' 
            </td>
            <td>' . \Carbon\Carbon::parse($row->date)->format('d-m-Y')  .' 
            </td>
            
            
            <td> ' .
                  $row->port->name . ' 
              
            </td>
            <td>' . $persen  . ' %</td>
         </tr>';

         // $result[] = '<tr>
         //    <td>
         //       ' . $vesselName  . ' <br>
         //       <small> ' . $vesselType . '</small>
         //    </td>
         //    <td>' . \Carbon\Carbon::parse($row->date)->format('l') .  ' on '. $row->port->name .' <br> 
         //       <small> ' . \Carbon\Carbon::parse($row->date)->format('d/m/Y') .' </small>
         //    </td>
            
            
         //    <td> ' .
         //          $first->port->name . ' 
         //       <br>
         //       <small> '. \Carbon\Carbon::parse($first->date)->format('d/m/Y') .'</small>
         //    </td>
         //    <td>' . $persen  . ' %</td>
         // </tr>';
      }


      if (count($scheduleRoutes) == 0) {
         $schedules = Schedule::where('date', $date)->get();
         foreach ($schedules as $row) {
            
            // $first = ScheduleRoute::where('schedule_id', $schedule->id)->where('rank', 1)->first();
   
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
               <td>
                  ' . $vesselName  . ' 
               </td>
               <td>' . \Carbon\Carbon::parse($row->date)->format('d-m-Y')  .'
               </td>
               
               
               <td> ' .
                     '-' . ' 
                 
               </td>
               <td>' . $persen  . ' %</td>
            </tr>';
         }
      } 

      

      // foreach ($schedules as $row) {
      //    $first = ScheduleRoute::where('schedule_id', $schedule->id)->where('rank', 1)->first();
      //    if ($row->vessel_id != null) {
      //       $vesselName = $row->vessel->name;
      //       $vesselType = $row->vessel->type;
      //       $totalWeight = $row->total_weight;
      //       $vesselDeadweight = $row->vessel->deadweight;
      //       $persen = $totalWeight / $vesselDeadweight * 100;
      //    } else {
      //       $vesselName = '-';
      //       $vesselType = '';
      //       $totalWeight = 0;
      //       $vesselDeadweight = '0';
      //       $persen = '-';
      //    }
      //    $result[] = '<tr>
      //       <td>
      //       ' . $vesselName  . ' <br>
      //       <small> ' . $vesselType . '</small>
      //       </td>
      //       <td> - <br> 
      //          <small> - </small>
      //       </td>
            
            
      //       <td> ' .
      //             $first->port->name . ' 
      //          <br>
      //          <small> '. \Carbon\Carbon::parse($row->date)->format('d/m/Y') .'</small>
      //       </td>
      //       <td>' . $persen  . ' %</td>
         
      //    </tr>';
      // }

      

      if ($date == $now->format('Y-m-d')) {
         $log = 'today';
         foreach ($nearestVessels as $row) {
         
            $near[] = '<tr>
               <td>
                  ' . $row->name  . ' /
                  <small> ' . $row->type . '</small>
               </td>
            </tr>';
         }
      } else {
         $log = 'not today';
         $near[] = null;
      }
      

      // Kirim balik ke ajax
      return response()->json([
         'success' => true,
         'result' => $result,
         'near' => $near,
         'log' => count($schedules)
      ]);
   }
}
