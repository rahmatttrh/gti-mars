<?php

namespace App\Http\Controllers;

use App\Models\Deflection;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Offloading;
use App\Models\Port;
use App\Models\Report;
use App\Models\ReportVessel;
use App\Models\Request as ModelsRequest;
use App\Models\Schedule;
use App\Models\ScheduleRoute;
use App\Models\Vessel;
use Carbon\Carbon;
use Facade\FlareClient\Http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Http\Controllers\GeofenceController;
use App\Models\Document;
use App\Models\News;
use App\Models\Surveillance;
use App\Models\User;
use App\Models\Vdr;
use App\Models\VdrOperating;
use App\Models\VdrOperatingHeader;
use App\Models\VesselHistory;
use Throwable;

class HomeController extends Controller
{
   /**
    * Create a new controller instance.
    *
    * @return void
    */
   public function __construct()
   {
      $this->middleware('auth');
   }

   /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */

   public $geoJsonVessel;
   private function loadLocVessel()
   {
      $vessels = Vessel::get();
      $ports = Port::get();
      $customLocVessel = [];

      foreach ($vessels as $vessel) {
         if ($vessel->latitude) {

            $customLocVessel[] = [
               'type' => 'Feature',
               'geometry' => [
                  'coordinates' => [$vessel->longitude, $vessel->latitude],
                  'type' => 'Point'
               ],

               'properties' => [
                  'type' => 'Vessel',
                  'locationId' => $vessel->id,
                  'title' => $vessel->name,
                  'speed' => $vessel->speed,
                  'calcspeed' => $vessel->calcspeed,
                  'heading' => $vessel->heading,
                  'lat' => $vessel->latitude,
                  'long' => $vessel->longitude,
                  // 'markerLogo' => $marker,
                  'status' => $vessel->status,
               ]
            ];
         }
      }

      // foreach($ports as $port){
      //    if ($port->latitude) {

      //       $customLocVessel[] = [
      //          'type' => 'Feature',
      //          'geometry' => [
      //             'coordinates' => [$port->longitude, $port->latitude],
      //             'type' => 'Point'
      //          ],
      //          'properties' => [
      //             'type' => 'Port',
      //             'locationId' => $port->id,
      //             'title' => $port->name,
      //             'lat' => $port->latitude,
      //             'long' => $port->longitude,
      //          ]
      //       ];
      //    }
      // }

      $geoLocationVessel = [
         'type' => 'featureCollection',
         'features' => $customLocVessel
      ];

      $geoJsonVessel = collect($geoLocationVessel)->toJson();
      $this->geoJsonVessel = $geoJsonVessel;
   }

   public function map()
   {
      $today = Carbon::now();
      $month = $today->format('m');

      if ($month == 1) {
         $monthName = 'Januari';
      } elseif ($month == 2) {
         $monthName = 'Februari';
      } elseif ($month == 3) {
         $monthName = 'Maret';
      } elseif ($month == 4) {
         $monthName = 'April';
      } elseif ($month == 5) {
         $monthName = 'Mei';
      } elseif ($month == 6) {
         $monthName = 'Juni';
      } elseif ($month == 7) {
         $monthName = 'Juli';
      } elseif ($month == 8) {
         $monthName = 'Agustus';
      } elseif ($month == 9) {
         $monthName = 'September';
      } elseif ($month == 10) {
         $monthName = 'Oktober';
      } elseif ($month == 11) {
         $monthName = 'November';
      } elseif ($month == 12) {
         $monthName = 'Desember';
      }

      $allSchedules = Schedule::whereMonth('date', $month)->orderBy('date', 'asc')->get();
      $allRequests = ModelsRequest::where('status', '>', 1)->whereMonth('date', $month)->get();
      $customSchedules = [];
      $customQtyRequests = [];
      foreach ($allSchedules as $schedule) {
         $customSchedules[] = $schedule->date;
         $requestsMonth = ModelsRequest::where('date', $schedule->date)->get();
         $customQtyRequests[] =  round($requestsMonth->count());
      }
      $requestLogistics = ModelsRequest::whereMonth('date', $month)->where('department_id', 2)->get();
      $requestDrillings = ModelsRequest::whereMonth('date', $month)->where('department_id', 3)->get();

      $this->loadLocVessel();
      $schedules = Schedule::orderBy('date', 'asc')->get();
      $allVessels = Vessel::get();
      $recentVessels = Vessel::where('longitude', '!=', null)->orderBy('updated_at', 'desc')->get();
      $vessels = Vessel::where('latitude', '!=', null)->get();
      $ports = Port::where('latitude', '!=', null)->get();
      // $elok = Vessel::where('imo', '9543483')->first();
      // dd($elok->name);

      try {
         $url = 'https://api.scu.co.id/vtms/oses/position?mmsi=all';
      $token = '73ob73y64nt3n63MP4tk4l1';
      $response = Http::withHeaders([
         'Authorization' => 'Bearer ' . $token,
      ])->post($url, []);

      $responseBody = json_decode($response->getBody());
      // dd($responseBody->data);

      foreach ($responseBody->data as $res) {
         // dd($vessel->IMO);
         // if ($res->name == 'WINNER') {
         //    dd($res->name);
         // }
         if ($res->MMSI) {
            $vessel = Vessel::where('mmsi', $res->MMSI)->first();
            $barge = Port::where('mmsi', $res->MMSI)->first();

            if ($vessel) {
               $vessel->update([
                  'latitude' => $res->lat,
                  'longitude' => $res->lon,
                  'speed' => $res->speed,
                  'calcspeed' => $res->calcspeed,
                  'heading' => $res->heading
               ]);
            }

            if ($barge) {
               $barge->update([
                  'latitude' => $res->lat,
                  'longitude' => $res->lon
               ]);
            }
         }
      }
      } catch (Throwable $e) {
            report($e);
   
            return false;
      }
      

      // $acc = Vessel::find(27);
      // $kj4 = Port::find(1);
      // $tesDis = (new GeofenceController)->getDistance($acc->latitude, $acc->longitude, $kj4->latitude, $kj4->longitude);
      // dd($acc->name . ' ke ' . $kj4->name . ': ' .$tesDis);
      // dd(count($ports));

      foreach ($vessels as $vessel) {
         $vesselLat = $vessel->latitude;
         $vesselLong = $vessel->longitude;
         foreach ($ports as $port) {
            $portLat = $port->latitude;
            $portLong = $port->longitude;
            $distance = (new GeofenceController)->getDistance($vesselLat, $vesselLong, $portLat, $portLong);
            // dd($vessel->name . ' ke ' . $port->name . ': ' .$distance);
            if ($distance < 300) {
               $vessel->update([

                  'port_id' => $port->id
               ]);

               // ReportVessel::create([
               //    'vessel_id' => $vessel->id,
               //    'port_id' => $port->id,
               //    'status_id' => 3
               // ]);
            }
            // else {
            //    $vessel->update([
            //       'status' => 3,
            //       'port_id' => null
            //    ]);
            // }


         }
      }



      return view('map', [
         'today' => $today,
         'monthName' => $monthName,
         'schedules' => $schedules,
         'geoJsonVessel' => $this->geoJsonVessel,
         'recentVessels' => $recentVessels,
         'allSchedules' => $allSchedules,
         'allRequests' => $allRequests,
         'totalSchedule' => $allSchedules->count(),
         'totalRequest' => $allRequests->count(),
         'dateSchedules' => collect($customSchedules)->toJson(),
         'qtyRequests' => collect($customQtyRequests)->toJson(),
         'requestLogistics' => $requestLogistics->count(),
         'requestDrillings' => $requestDrillings->count()
      ])->with('i');
   }

   public function dashboardChart($month)
   {

      if ($month == 1) {
         $monthName = 'Januari';
      } elseif ($month == 2) {
         $monthName = 'Februari';
      } elseif ($month == 3) {
         $monthName = 'Maret';
      } elseif ($month == 4) {
         $monthName = 'April';
      } elseif ($month == 5) {
         $monthName = 'Mei';
      } elseif ($month == 6) {
         $monthName = 'Juni';
      } elseif ($month == 7) {
         $monthName = 'Juli';
      } elseif ($month == 8) {
         $monthName = 'Agustus';
      } elseif ($month == 9) {
         $monthName = 'September';
      } elseif ($month == 10) {
         $monthName = 'Oktober';
      } elseif ($month == 11) {
         $monthName = 'November';
      } elseif ($month == 12) {
         $monthName = 'Desember';
      }



      $schedules = Schedule::orderBy('date', 'asc')->get();
      // $schedules = Schedule::whereMonth('date', $month)->orderBy('date', 'asc')->get();
      $scheduleRecents = Schedule::orderBy('updated_at', 'asc')->where('status', '>=', 1)->first();
      $requests = ModelsRequest::whereMonth('date', $month)->get();
      $completeRequests = ModelsRequest::whereMonth('date', $month)->where('status', 9)->get();
      if ($requests->count() > 0) {
         $persentage = ($completeRequests->count() / $requests->count()) * 100;
      } else {
         $persentage = 0;
      }

      $requestAdditionals = ModelsRequest::where('class', 'additional')->where('status', 2)->get();
      $requestRecents = ModelsRequest::where('status', 1)->orWhere('status', 202)->get();
      $requestProgress = ModelsRequest::where('status', '>', 1)->where('status', '!=', 202)->get();
      $requestLogistics = ModelsRequest::whereMonth('date', $month)->where('department_id', 2)->get();
      $requestDrillings = ModelsRequest::whereMonth('date', $month)->where('department_id', 3)->get();
      // dd($requestAdditionals);
      $customSchedules = [];
      $customQtyRequests = [];
      foreach ($schedules as $schedule) {
         $customSchedules[] = $schedule->date;
         $customQtyRequests[] = $schedule->requests()->count();
      }
      // dd($scheduleRecents->status);
      $reports = Report::orderBy('created_at', 'desc')->whereMonth('created_at', $month)->get();
      $offloadings = Offloading::orderBy('created_at', 'desc')->whereMonth('created_at', $month)->get();
      $deflections = Deflection::orderBy('created_at', 'desc')->whereMonth('created_at', $month)->get();

      return view('chart', [
         'monthName' => $monthName,
         'requestRecents' => $requestRecents,
         'requestAdditionals' => $requestAdditionals,
         'requestProgress' => $requestProgress,
         'schedules' => $schedules,
         'dateSchedules' => collect($customSchedules)->toJson(),
         'qtyRequests' => collect($customQtyRequests)->toJson(),
         'totalSchedule' => $schedules->count(),
         'totalRequest' => $requests->count(),
         'requestLogistics' => $requestLogistics->count(),
         'requestDrillings' => $requestDrillings->count(),
         'persentage' => $persentage,
         'scheduleRecents' => $scheduleRecents,
         'reports' => $reports,
         'offloadings' => $offloadings,
         'deflections' => $deflections
      ])->with('i');
   }

   public function dashboardTable()
   {
      $today = Carbon::now();
      $month = $today->format('m');
      $schedules = Schedule::where('type', 2)->whereMonth('date', $month)->get();
      $requestRecents = ModelsRequest::where('status', 1)->orWhere('status', 202)->get();
      $requestProgress = ModelsRequest::where('status', '>', 1)->where('status', '!=', 202)->get();
      // $user = Employee::where('email', auth()->user->email)->first();
      // dd($user);
      if ($month == 1) {
         $monthName = 'Januari';
      } elseif ($month == 2) {
         $monthName = 'Februari';
      } elseif ($month == 3) {
         $monthName = 'Maret';
      } elseif ($month == 4) {
         $monthName = 'April';
      } elseif ($month == 5) {
         $monthName = 'Mei';
      } elseif ($month == 6) {
         $monthName = 'Juni';
      } elseif ($month == 7) {
         $monthName = 'Juli';
      } elseif ($month == 8) {
         $monthName = 'Agustus';
      } elseif ($month == 9) {
         $monthName = 'September';
      } elseif ($month == 10) {
         $monthName = 'Oktober';
      } elseif ($month == 11) {
         $monthName = 'November';
      } elseif ($month == 12) {
         $monthName = 'Desember';
      }

      return view('home', [
         // 'user' => $user,
         'today' => $today,
         'monthName' => $monthName,
         'requestRecents' => $requestRecents,
         'requestProgress' => $requestProgress,
         'schedules' => $schedules,
      ])->with('i');
   }

   public function index(){
      $today = Carbon::now();
      $docs = Document::get();
      foreach ($docs as $doc) {
         $diffMonth = $today->diffInMonths($doc->date);
         if ($diffMonth <= 2) {
            $doc->update([
               'status' => 3
            ]);
         } else if($diffMonth <= 12) {
            $doc->update([
               'status' => 2
            ]);
         } else if($diffMonth > 12){
            $doc->update([
               'status' => 1
            ]);
         }
      }
      
      if (auth()->user()->hasRole('vessel')) {
         $now = Carbon::now();
         $currentVessel = Vessel::where('email', auth()->user()->email)->first();
         
         $schedules = Schedule::where('vessel_id', $currentVessel->id)->where('status', '>=', 1)->where('status', '!=', 101)->where('date', '>=', $now)->take(3)->get();
         $requests = ModelsRequest::where('user_id', auth()->user()->id)->get();
         $nowSchedule = Schedule::find($currentVessel->schedule_id);
         // dd($schedules);

         $vdr = Vdr::where('vessel_id', $currentVessel->id)->where('date', date('Y-m-d'))->first();
         $requests = ModelsRequest::where('user_id', auth()->user()->id)->get();
         $docs = Document::where('vessel_id', $currentVessel->id)->get();
      } else {
         $currentVessel = null;
         $schedules = null;
         $requests = null;
         $nowSchedule = null;
         $vdr = null;
         $requests = null;
         $docs = null;
      }

      $feed = News::get()->first();
      return view('main', [
         'feed' => $feed,
         'currentVessel' => $currentVessel,
         'schedules' => $schedules,
         'requests' => $requests,
         'nowSchedule' => $nowSchedule,
         'vdr' => $vdr,
         'requests' => $requests,
         'docs' => $docs
      ]);
   }

   public function indexold()
   {
      // dd('ok');

      return view('main');

      if (auth()->user()->hasRole('marine')) {
         $this->map();
      }
      $today = Carbon::now();
      $month = $today->format('m');

      $vessels = Vessel::get();
      $vessel3 = Vessel::paginate('3');
      // dd($today->format('m'));

      if ($month == 1) {
         $monthName = 'Januari';
      } elseif ($month == 2) {
         $monthName = 'Februari';
      } elseif ($month == 3) {
         $monthName = 'Maret';
      } elseif ($month == 4) {
         $monthName = 'April';
      } elseif ($month == 5) {
         $monthName = 'Mei';
      } elseif ($month == 6) {
         $monthName = 'Juni';
      } elseif ($month == 7) {
         $monthName = 'Juli';
      } elseif ($month == 8) {
         $monthName = 'Agustus';
      } elseif ($month == 9) {
         $monthName = 'September';
      } elseif ($month == 10) {
         $monthName = 'Oktober';
      } elseif ($month == 11) {
         $monthName = 'November';
      } elseif ($month == 12) {
         $monthName = 'Desember';
      }


      if (auth()->user()->hasRole('superuser')) {
         $vessel = '';
         $schedules = Schedule::where('type', 2)->where('status', '>', 1)->whereMonth('date', $month)->get();
      } elseif (auth()->user()->hasRole('marine')) {
         $vessels = Vessel::where('status', '>', 1)->get();
         $vessel = '';
         $schedules = Schedule::whereMonth('date', $month)->orderBy('date', 'asc')->get();
         $requests = ModelsRequest::where('status', '>', 1)->whereMonth('date', $month)->get();
         $completeRequests = ModelsRequest::whereMonth('date', $month)->where('status', 9)->get();
         if ($requests->count() > 0) {
            $persentage = ($completeRequests->count() / $requests->count()) * 100;
            // dd($requests->count());
         } else {
            $persentage = 0;
         }

         // $requests = ModelsRequest::get();
         $requestAdditionals = ModelsRequest::where('class', 'additional')->where('status', 5)->get();
         $requestRecents = ModelsRequest::where('status', 1)->orWhere('status', 202)->paginate(5);
         $scheduleRecents = Schedule::orderBy('updated_at', 'desc')->where('status', '>=', 1)->get();
         $requestProgress = ModelsRequest::where('status', '>', 1)->where('status', '!=', 202)->get();

         // dd($requestAdditionals);
         $requestUndos = ModelsRequest::where('status', 202)->get();

         $requestLogistics = ModelsRequest::where('department_id', 2)->get();
         $requestDrillings = ModelsRequest::whereMonth('date', $month)->where('department_id', 3)->get();

         $customSchedules = [];
         $customQtyRequests = [];
         foreach ($schedules as $schedule) {
            $customSchedules[] = $schedule->date;
            $requestsMonth = ModelsRequest::where('date', $schedule->date)->get();
            $customQtyRequests[] =  $requestsMonth->count();
         }


         $offloadings = Offloading::orderBy('created_at', 'desc')->whereMonth('created_at', $month)->get();
         $deflections = Deflection::orderBy('created_at', 'desc')->whereMonth('created_at', $month)->get();


         $this->loadLocVessel();
         $schedules = Schedule::orderBy('date', 'asc')->get();
         $allVessels = Vessel::get();

         $vessels = Vessel::where('latitude', '!=', null)->get();
         $ports = Port::where('latitude', '!=', null)->get();
         // $elok = Vessel::where('imo', '9543483')->first();
         // dd($elok->name);

         $url = 'https://api.scu.co.id/vtms/oses/position?mmsi=all';
         $token = '73ob73y64nt3n63MP4tk4l1';
         $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
         ])->post($url, []);

         $responseBody = json_decode($response->getBody());
         // dd($responseBody->data);

         foreach ($responseBody->data as $res) {
            // dd($vessel->IMO);
            // if ($res->name == 'WINNER') {
            //    dd($res->name);
            // }
            if ($res->MMSI) {
               $vessel = Vessel::where('mmsi', $res->MMSI)->first();
               $barge = Port::where('mmsi', $res->MMSI)->first();

               if ($vessel) {
                  if ($vessel->latitude != $res->lat) {
                     $vessel->update([
                        'latitude' => $res->lat,
                        'longitude' => $res->lon,
                        'speed' => $res->speed,
                        'calcspeed' => $res->calcspeed,
                        'heading' => $res->heading,
                        'last_update' => $res->date
                     ]);
                  }
               }

               if ($barge) {
                  $barge->update([
                     'latitude' => $res->lat,
                     'longitude' => $res->lon
                  ]);
               }
            }
         }

         // $acc = Vessel::find(27);
         // $kj4 = Port::find(1);
         // $tesDis = (new GeofenceController)->getDistance($acc->latitude, $acc->longitude, $kj4->latitude, $kj4->longitude);
         // dd($acc->name . ' ke ' . $kj4->name . ': ' .$tesDis);
         // dd(count($ports));

         foreach ($vessels as $vessel) {
            $vesselLat = $vessel->latitude;
            $vesselLong = $vessel->longitude;

            if ($vessel->speed > 0) {
               $vessel->update([
                  // 'status' => 2,
                  'port_id' => null
               ]);
            } else {
               foreach ($ports as $port) {
                  $portLat = $port->latitude;
                  $portLong = $port->longitude;
                  $distance = (new GeofenceController)->getDistance($vesselLat, $vesselLong, $portLat, $portLong);
                  // dd($vessel->name . ' ke ' . $port->name . ': ' .$distance);
                  if ($distance < 300) {
                     $vessel->update([
                        // 'status' => 9,
                        'port_id' => $port->id
                     ]);

                     if ($vessel->schedule_id && $vessel->schedule->status > 1) {
                        $curentReport = Report::where('schedule_id', $vessel->schedule_id)->orderBy('updated_at', 'desc')->first();
                        // dd($curentReport);
                        if ($curentReport->status_id == 8 && $curentReport->port_id == $port->id) {
                        } else {
                           Report::create([
                              'schedule_id' => $vessel->schedule_id,
                              'vessel_id' => $vessel->id,
                              // arrived
                              'status_id' => 8,
                              'port_id' => $port->id
                           ]);
                        }
                     }
                     // ReportVessel::create([
                     //    'vessel_id' => $vessel->id,
                     //    'port_id' => $port->id,
                     //    'status_id' => 3
                     // ]);
                  }
                  // else {
                  //    $vessel->update([
                  //       'status' => 3,
                  //       'port_id' => null
                  //    ]);
                  // }


               }
            }
         }

         $recentVessels = Vessel::where('longitude', '!=', null)->orderBy('port_id', 'desc')->orderBy('updated_at', 'desc')->get();
         $reports = Report::orderBy('created_at', 'desc')->whereMonth('created_at', $month)->get();
         $vesselReports = ReportVessel::orderBy('created_at', 'desc')->whereMonth('created_at', $month)->take(5)->get();

         $vesselLastUpdates = Vessel::orderBy('last_update', 'desc')->take(5)->get();
         // dd($vesselLastUpdates);
         return view('home-stisla', [
            'today' => $today,
            'monthName' => $monthName,
            'requestAdditionals' => $requestAdditionals,
            'requestRecents' => $requestRecents,
            'requestProgress' => $requestProgress,
            'schedules' => $schedules,
            'dateSchedules' => collect($customSchedules)->toJson(),
            'qtyRequests' => collect($customQtyRequests)->toJson(),
            'totalSchedule' => $schedules->count(),
            'totalRequest' => $requests->count(),
            'requestLogistics' => $requestLogistics->count(),
            'requestDrillings' => $requestDrillings->count(),
            'persentage' => $persentage,
            'scheduleRecents' => $scheduleRecents,
            'reports' => $reports,
            'vesselReport' => $vesselReports,
            'offloadings' => $offloadings,
            'deflections' => $deflections,
            'geoJsonVessel' => $this->geoJsonVessel,
            'recentVessels' => $recentVessels,
            'vesselLastUpdates' => $vesselLastUpdates
         ])->with('i');
      } elseif (auth()->user()->hasRole('department')) {
         $employee = Employee::where('email', auth()->user()->email)->first();
         $vessel = '';
         $schedules = Schedule::where('type', 2)->where('status', '>', 1)->whereMonth('date', $month)->get();
         $confirms = ModelsRequest::where('destination_id', auth()->user()->getPort())->where('status', 10)->get();
         // dd($confirms);
         $requests = ModelsRequest::where('employee_id', auth()->user()->getEmployeeId())->orderBy('parent_id', 'asc')->get();
      } elseif (auth()->user()->hasRole('logistic')) {
         $employee = Employee::where('email', auth()->user()->email)->first();
         $vessel = '';
         $schedules = Schedule::where('type', 2)->where('status', '>', 1)->whereMonth('date', $month)->get();
         // dd($employee->name);
         $requests = ModelsRequest::where('department_id', $employee->department->id)->get();
      } elseif (auth()->user()->hasRole('drilling')) {
         $employee = Employee::where('email', auth()->user()->email)->first();
         $vessel = '';
         $schedules = Schedule::where('type', 2)->where('status', '>', 1)->whereMonth('date', $month)->get();
         $requests = ModelsRequest::where('department_id', $employee->department_id)->get();
      } elseif (auth()->user()->hasRole('vessel')) {
         $vessel = Vessel::where('email', auth()->user()->email)->first();
         $schedules = Schedule::where('vessel_id', $vessel->id)->where('status', '>', 1)->get();
         $nowSchedule = Schedule::find($vessel->schedule_id);
         if ($nowSchedule) {
            $routes = ScheduleRoute::where('schedule_id', $nowSchedule->id)->orderBy('rank', 'asc')->get();
         } else {
            $routes = null;
         }

         $recentSchedules = Schedule::where('vessel_id', $vessel->id)->where('status', '=', 1)->get();
         $reports = ReportVessel::where('vessel_id', $vessel->id)->orderBy('created_at', 'desc')->get();
         return view('home', [
            'today' => $today,
            'vessel' => $vessel,
            'schedules' => $schedules,
            'nowSchedule' => $nowSchedule,
            'recentSchedules' => $recentSchedules,
            'reports' => $reports,
            'routes' => $routes
         ])->with('i');
      } elseif (auth()->user()->hasRole('supplier')) {
         $vessel = '';
         $schedules = Schedule::where('type', 2)->where('status', '>', 1)->whereMonth('date', $month)->get();
      } elseif (auth()->user()->hasRole('platform')) {
         $vessel = '';
         $schedules = Schedule::where('type', 2)->where('status', '>', 1)->whereMonth('date', $month)->get();
      } elseif (auth()->user()->hasRole('retail')) {
         $vessel = Vessel::where('email', auth()->user()->email)->first();
         $schedules = Schedule::get();
      } elseif (auth()->user()->hasRole('receiving')) {
         $vessel = '';
         $schedules = Schedule::get();
      }
      // if (auth()->user()->hasRole('marine')) {
      //    $vessel = '';
      //    $schedules = Schedule::where('type', 2)->whereMonth('date', $month)->get();
      // } elseif (auth()->user()->hasRole('superuser')) {
      //    $vessel = '';
      //    $schedules = Schedule::where('type', 2)->where('status', '>', 1)->whereMonth('date', $month)->get();
      // } elseif (auth()->user()->hasRole('vessel')) {
      //    $vessel = Vessel::where('email', auth()->user()->email)->first();
      //    $schedules = Schedule::where('type', 2)->where('status', '>', 1)->where('vessel_id', $vessel->id)->whereMonth('date', $month)->get();
      // }

      $schedulesFix = Schedule::where('type', 1)->where('status', '>', 1)->whereMonth('date', $month)->get();
      $user = Employee::where('email', auth()->user()->email)->first();


      return view('home-user', [
         'user' => $user,
         'today' => $today,
         'requests' => $requests,
         'monthName' => $monthName,
         'vessel' => $vessel,
         'vessels' => $vessels,
         // 'vessel3' => $vessel3,
         'schedules' => $schedules,
         'confirms' => $confirms
         // 'schedulesFix' => $schedulesFix
      ])->with('i');
   }



   public function dspMarine()
   {

      $this->map();

      // $tegas = User::where('email', 'tegasjaya@gmail.com')->first();
      // dd($tegas);

      $today = Carbon::now();
      $month = $today->format('m');
      $vessels = Vessel::get();
      foreach ($vessels as $vessel) {
         $vessel->update([
            'status' => 1
         ]);

         VesselHistory::create([
            'vessel_id' => $vessel->id,
            'onhire' => $today
         ]);
      }

      if ($month == 1) {
         $monthName = 'Januari';
      } elseif ($month == 2) {
         $monthName = 'Februari';
      } elseif ($month == 3) {
         $monthName = 'Maret';
      } elseif ($month == 4) {
         $monthName = 'April';
      } elseif ($month == 5) {
         $monthName = 'Mei';
      } elseif ($month == 6) {
         $monthName = 'Juni';
      } elseif ($month == 7) {
         $monthName = 'Juli';
      } elseif ($month == 8) {
         $monthName = 'Agustus';
      } elseif ($month == 9) {
         $monthName = 'September';
      } elseif ($month == 10) {
         $monthName = 'Oktober';
      } elseif ($month == 11) {
         $monthName = 'November';
      } elseif ($month == 12) {
         $monthName = 'Desember';
      }

      $vessels = Vessel::where('status', '>', 1)->get();

      $schedules = Schedule::orderBy('updated_at', 'desc')->get();
      $progressSchedules = Schedule::where('status', '>', '1')->get();
      $requests = ModelsRequest::where('status', '>', 1)->whereMonth('date', $month)->get();
      $completeRequests = ModelsRequest::whereMonth('date', $month)->where('status', 9)->get();

      if ($requests->count() > 0) {
         $persentage = ($completeRequests->count() / $requests->count()) * 100;
         // dd($requests->count());
      } else {
         $persentage = 0;
      }

      // $requests = ModelsRequest::get();
      $requestAdditionals = ModelsRequest::where('class', 'additional')->where('status', 5)->get();
      $requestRecents = ModelsRequest::where('status', 1)->orWhere('status', 202)->paginate(5);
      $scheduleRecents = Schedule::orderBy('updated_at', 'desc')->where('status', '>=', 1)->get();
      $requestProgress = ModelsRequest::where('status', '>', 1)->where('status', '!=', 202)->get();

      // dd($requestAdditionals);
      $requestUndos = ModelsRequest::where('status', 202)->get();

      $requestLogistics = ModelsRequest::where('department_id', 2)->get();
      $requestDrillings = ModelsRequest::whereMonth('date', $month)->where('department_id', 3)->get();

      $customSchedules = [];
      $customQtyRequests = [];
      foreach ($schedules as $schedule) {
         $customSchedules[] = $schedule->date;
         $requestsMonth = ModelsRequest::where('date', $schedule->date)->get();
         $customQtyRequests[] =  $requestsMonth->count();
      }


      $offloadings = Offloading::orderBy('created_at', 'desc')->whereMonth('created_at', $month)->get();
      $deflections = Deflection::orderBy('created_at', 'desc')->whereMonth('created_at', $month)->get();


      $this->loadLocVessel();

      $vessels = Vessel::where('latitude', '!=', null)->get();
      $ports = Port::where('latitude', '!=', null)->get();
      // $elok = Vessel::where('imo', '9543483')->first();
      // dd($elok->name);

      $url = 'https://api.scu.co.id/vtms/oses/position?mmsi=all';
      $token = '73ob73y64nt3n63MP4tk4l1';
      $response = Http::withHeaders([
         'Authorization' => 'Bearer ' . $token,
      ])->post($url, []);

      $responseBody = json_decode($response->getBody());
      // dd($responseBody->data);

      foreach ($responseBody->data as $res) {
         // dd($vessel->IMO);
         // if ($res->name == 'WINNER') {
         //    dd($res->name);
         // }
         if ($res->MMSI) {
            $vessel = Vessel::where('mmsi', $res->MMSI)->first();
            $barge = Port::where('mmsi', $res->MMSI)->first();

            if ($vessel) {
               if ($vessel->latitude != $res->lat) {
                  $vessel->update([
                     'latitude' => $res->lat,
                     'longitude' => $res->lon,
                     'speed' => $res->speed,
                     'calcspeed' => $res->calcspeed,
                     'heading' => $res->heading,
                     'last_update' => $res->date
                  ]);
               }
            }

            if ($barge) {
               $barge->update([
                  'latitude' => $res->lat,
                  'longitude' => $res->lon
               ]);
            }
         }
      }

      // $acc = Vessel::find(27);
      // $kj4 = Port::find(1);
      // $tesDis = (new GeofenceController)->getDistance($acc->latitude, $acc->longitude, $kj4->latitude, $kj4->longitude);
      // dd($acc->name . ' ke ' . $kj4->name . ': ' .$tesDis);
      // dd(count($ports));

      foreach ($vessels as $vessel) {
         $vesselLat = $vessel->latitude;
         $vesselLong = $vessel->longitude;

         if ($vessel->speed > 0) {
            $vessel->update([
               // 'status' => 2,
               'port_id' => null
            ]);
         } else {
            foreach ($ports as $port) {
               $portLat = $port->latitude;
               $portLong = $port->longitude;
               $distance = (new GeofenceController)->getDistance($vesselLat, $vesselLong, $portLat, $portLong);
               // dd($vessel->name . ' ke ' . $port->name . ': ' .$distance);
               if ($distance < 300) {
                  $vessel->update([
                     // 'status' => 9,
                     'port_id' => $port->id
                  ]);

                  if ($vessel->schedule_id && $vessel->schedule->status > 1) {
                     $curentReport = Report::where('schedule_id', $vessel->schedule_id)->orderBy('updated_at', 'desc')->first();
                     // dd($curentReport);
                     if ($curentReport->status_id == 7 && $curentReport->port_id == $port->id) {
                        Report::create([
                           'schedule_id' => $vessel->schedule_id,
                           'vessel_id' => $vessel->id,
                           // arrived
                           'status_id' => 8,
                           'port_id' => $port->id
                        ]);
                     } else {
                        
                     }
                  }
                  // ReportVessel::create([
                  //    'vessel_id' => $vessel->id,
                  //    'port_id' => $port->id,
                  //    'status_id' => 3
                  // ]);
               }
               // else {
               //    $vessel->update([
               //       'status' => 3,
               //       'port_id' => null
               //    ]);
               // }


            }
         }
      }

      $recentVessels = Vessel::where('longitude', '!=', null)->orderBy('port_id', 'desc')->orderBy('updated_at', 'desc')->get();
      $reports = Report::orderBy('created_at', 'desc')->whereMonth('created_at', $month)->get();
      $vesselReports = ReportVessel::orderBy('created_at', 'desc')->whereMonth('created_at', $month)->take(5)->get();

      $vesselLastUpdates = Vessel::orderBy('last_update', 'desc')->take(5)->get();
      // dd($vesselLastUpdates);
      $nav = 'dashboard';
      // dd($nav);
      return view('pages-stisla.dsp.home-stisla', [
         'nav' => $nav,
         'today' => $today,
         'monthName' => $monthName,
         'requestAdditionals' => $requestAdditionals,
         'requestRecents' => $requestRecents,
         'requestProgress' => $requestProgress,
         'schedules' => $schedules,
         'progressSchedules' => $progressSchedules,
         'dateSchedules' => collect($customSchedules)->toJson(),
         'qtyRequests' => collect($customQtyRequests)->toJson(),
         'totalSchedule' => $schedules->count(),
         'totalRequest' => $requests->count(),
         'requestLogistics' => $requestLogistics->count(),
         'requestDrillings' => $requestDrillings->count(),
         'persentage' => $persentage,
         'scheduleRecents' => $scheduleRecents,
         'reports' => $reports,
         'vesselReport' => $vesselReports,
         'offloadings' => $offloadings,
         'deflections' => $deflections,
         'geoJsonVessel' => $this->geoJsonVessel,
         'recentVessels' => $recentVessels,
         'vesselLastUpdates' => $vesselLastUpdates
      ])->with('i');

      
   }

   public function dspVessel()
   {

      $today = Carbon::now();
      $month = $today->format('m');

      $vessels = Vessel::get();
      $vessel3 = Vessel::paginate('3');
      // dd($today->format('m'));

      if ($month == 1) {
         $monthName = 'Januari';
      } elseif ($month == 2) {
         $monthName = 'Februari';
      } elseif ($month == 3) {
         $monthName = 'Maret';
      } elseif ($month == 4) {
         $monthName = 'April';
      } elseif ($month == 5) {
         $monthName = 'Mei';
      } elseif ($month == 6) {
         $monthName = 'Juni';
      } elseif ($month == 7) {
         $monthName = 'Juli';
      } elseif ($month == 8) {
         $monthName = 'Agustus';
      } elseif ($month == 9) {
         $monthName = 'September';
      } elseif ($month == 10) {
         $monthName = 'Oktober';
      } elseif ($month == 11) {
         $monthName = 'November';
      } elseif ($month == 12) {
         $monthName = 'Desember';
      }
      $currentVessel = Vessel::where('email', auth()->user()->email)->first();
      // dd($vessel->name);
      $schedules = Schedule::where('vessel_id', $currentVessel->id)->where('status', '>', 1)->where('status', '!=', 101)->get();
      $requests = ModelsRequest::where('user_id', auth()->user()->id)->get();
      $nowSchedule = Schedule::find($currentVessel->schedule_id);
      if ($nowSchedule) {
         $routes = ScheduleRoute::where('schedule_id', $nowSchedule->id)->orderBy('rank', 'asc')->get();
      } else {
         $routes = null;
      }

      $recentSchedules = Schedule::where('vessel_id', $currentVessel->id)->where('status', '=', 1)->get();
      $reports = ReportVessel::where('vessel_id', $currentVessel->id)->orderBy('created_at', 'desc')->get();
      $surveillances = Surveillance::where('vessel_id', $currentVessel->id)->get();


      $this->loadLocVessel();

      $vessels = Vessel::where('latitude', '!=', null)->get();
      $ports = Port::where('latitude', '!=', null)->get();

      $url = 'https://api.scu.co.id/vtms/oses/position?mmsi=all';
      $token = '73ob73y64nt3n63MP4tk4l1';
      $response = Http::withHeaders([
         'Authorization' => 'Bearer ' . $token,
      ])->post($url, []);

      $responseBody = json_decode($response->getBody());
      
      foreach ($responseBody->data as $res) {
         
         if ($res->MMSI) {
            $thisVessel = Vessel::where('mmsi', $res->MMSI)->first();
            $barge = Port::where('mmsi', $res->MMSI)->first();

            if ($thisVessel) {
               if ($thisVessel->latitude != $res->lat) {
                  $thisVessel->update([
                     'latitude' => $res->lat,
                     'longitude' => $res->lon,
                     'speed' => $res->speed,
                     'calcspeed' => $res->calcspeed,
                     'heading' => $res->heading,
                     'last_update' => $res->date
                  ]);
               }
            }

            if ($barge) {
               $barge->update([
                  'latitude' => $res->lat,
                  'longitude' => $res->lon
               ]);
            }
         }
      }

      foreach ($vessels as $vessel) {
         $vesselLat = $vessel->latitude;
         $vesselLong = $vessel->longitude;

         if ($vessel->speed > 0) {
            $vessel->update([
               // 'status' => 2,
               'port_id' => null
            ]);
         } else {
            foreach ($ports as $port) {
               $portLat = $port->latitude;
               $portLong = $port->longitude;
               $distance = (new GeofenceController)->getDistance($vesselLat, $vesselLong, $portLat, $portLong);
               // dd($vessel->name . ' ke ' . $port->name . ': ' .$distance);
               if ($distance < 300) {
                  $vessel->update([
                     // 'status' => 9,
                     'port_id' => $port->id
                  ]);

                  if ($vessel->schedule_id && $vessel->schedule->status > 1) {
                     $curentReport = Report::where('schedule_id', $vessel->schedule_id)->orderBy('updated_at', 'desc')->first();
                     // dd($curentReport);
                     // if ($curentReport->status_id == 7 && $curentReport->port_id == $port->id) {
                        if ($curentReport->status_id == 7 && $curentReport->port_id == $port->id) {
                           Report::create([
                              'schedule_id' => $vessel->schedule_id,
                              'vessel_id' => $vessel->id,
                              // arrived
                              'status_id' => 8,
                              'port_id' => $port->id
                           ]);
                        } else {
                           
                        }
                  }
                  // ReportVessel::create([
                  //    'vessel_id' => $vessel->id,
                  //    'port_id' => $port->id,
                  //    'status_id' => 3
                  // ]);
               }
               // else {
               //    $vessel->update([
               //       'status' => 3,
               //       'port_id' => null
               //    ]);
               // }


            }
         }
      }

     

      return view('pages-stisla.dsp.home-vessel', [
         'today' => $today,
         'vessel' => $currentVessel,
         'schedules' => $schedules,
         'requests' => $requests,
         'surveillances' => $surveillances,
         'nowSchedule' => $nowSchedule,
         'recentSchedules' => $recentSchedules,
         'reports' => $reports,
         'routes' => $routes
      ])->with('i');
   }

   public function dspUser()
   {
      $today = Carbon::now();
      $month = $today->format('m');

      $vessels = Vessel::get();
      $vessel3 = Vessel::paginate('3');
      // dd($today->format('m'));

      if ($month == 1) {
         $monthName = 'Januari';
      } elseif ($month == 2) {
         $monthName = 'Februari';
      } elseif ($month == 3) {
         $monthName = 'Maret';
      } elseif ($month == 4) {
         $monthName = 'April';
      } elseif ($month == 5) {
         $monthName = 'Mei';
      } elseif ($month == 6) {
         $monthName = 'Juni';
      } elseif ($month == 7) {
         $monthName = 'Juli';
      } elseif ($month == 8) {
         $monthName = 'Agustus';
      } elseif ($month == 9) {
         $monthName = 'September';
      } elseif ($month == 10) {
         $monthName = 'Oktober';
      } elseif ($month == 11) {
         $monthName = 'November';
      } elseif ($month == 12) {
         $monthName = 'Desember';
      }

      $employee = Employee::where('email', auth()->user()->email)->first();
      $vessel = '';
      $schedules = Schedule::where('type', 2)->where('status', '>', 1)->whereMonth('date', $month)->get();

      $empl = Employee::where('email', auth()->user()->email)->first();
      if ($empl) {
         // dd('ok');
         $user = Employee::where('email', auth()->user()->email)->first();
         $confirms = ModelsRequest::where('destination_id', auth()->user()->getPort())->where('status', 10)->get();
         $requests = ModelsRequest::where('employee_id', auth()->user()->getEmployeeId())->orderBy('parent_id', 'asc')->get();
      } else {
         $user = User::where('email', auth()->user()->email)->first();
         $portId = Port::where('email', auth()->user()->email)->first()->id;
         $confirms = ModelsRequest::where('destination_id', $portId)->where('status', 10)->get();
         $requests = ModelsRequest::where('user_id', auth()->user()->id)->orderBy('parent_id', 'asc')->get();
      }

      // dd(auth()->user()->getPort());


      return view('pages-stisla.dsp.home-user', [
         'user' => $user,
         'today' => $today,
         'requests' => $requests,
         'monthName' => $monthName,
         'vessel' => $vessel,
         'vessels' => $vessels,
         // 'vessel3' => $vessel3,
         'schedules' => $schedules,
         'confirms' => $confirms
         // 'schedulesFix' => $schedulesFix
      ])->with('i');
   }

   public function dspFm(){
      $user = User::find(auth()->user()->id);
      $requests = ModelsRequest::where('activity_id', 5)->orWhere('activity_id', 6)->where('status','>', 0)->orderBy('status', 'desc')->get();
      $schedules = Schedule::where('class', 'Fuel Oil')->orderBy('updated_at', 'desc')->get();
      $progressSchedules = Schedule::where('status', '>=', 0)->where('status', '!=', 101)->where('class', 'Fuel Oil')->get();
      return view('pages-stisla.dsp.home-fm', [
         'user' => $user,
         'requests' => $requests,
         'schedules' => $schedules,
         'progressSchedules' => $progressSchedules
      ])->with('i');
   }


   

   public function vdrFilter(Request $req)
   {

      // dd($req->year);
      // return view('pages.vdr.marine.index');
      $today = Carbon::now();
      // dd($today->month);
      $vessels = Vessel::get();

      $vessel = Vessel::find($req->vessel);
      $startDate = $req->start;
      $endDate = $req->end;
      $vdrs = Vdr::where('status', '>=', 1)->where('vessel_id', $vessel->id)->whereBetween('date', [$startDate, $endDate])->get();
      // dd($vdrs);

      $month = $req->month;
      $year = $req->year;
      // $vdrs = Vdr::where('vessel_id', $vessel->id)->whereMonth('date', $month)->whereYear('date', $year)->orderBy('date', 'asc')->get();
      // dd($vdrs);

      // $operatingHeaders = VdrOperatingHeader::get();
      // // dd(count($operatingHeaders));

      // foreach($operatingHeaders as $head){

      // }
      
      // if ($month == 1) {
      //    $monthName = 'Januari';
      // } else if ($month == 2){
      //    $monthName = 'Februari';
      // } else if ($month == 3){
      //    $monthName = 'Maret';
      // } else if ($month == 4){
      //    $monthName = 'April';
      // } else if ($month == 5){
      //    $monthName = 'Mei';
      // } else if ($month == 6){
      //    $monthName = 'Juni';
      // }  else if ($month == 7){
      //    $monthName = 'Juli';
      // } else if ($month == 8){
      //    $monthName = 'Agustus';
      // } else if ($month == 9){
      //    $monthName = 'September';
      // } else if ($month == 10){
      //    $monthName = 'Oktober';
      // } else if ($month == 11){
      //    $monthName = 'November';
      // } else if ($month == 12){
      //    $monthName = 'Desember';
      // }

      $date = array();
      $value = array();
      $fuel = array();
      foreach($vdrs as $vdr){
         $operatings = VdrOperating::where('vdr_id', $vdr->id)->get();
         $totalTime = $operatings->sum('time');
         $totalFuel = $operatings->sum('daily');

         // dd($operatings);
         $date[] = formatDateOnly($vdr->date);
         $value[] = $totalTime;
         $fuel[] = $totalFuel;
      }

      // dd($value);
      return view('pages-stisla.vdr.home-marine', [
         'thisMonth' => $month,
         'thisYear' => $year,
         // 'monthName' => $monthName,
         'vdrAlerts' => null,
         'vdrs' => $vdrs,
         'start' => $startDate,
         'end' => $endDate,
         'vessel' => $vessel->id,
         'thisVessel' => $vessel,
         'vessels' => $vessels,
         'date' => $date,
         'value' => $value,
         'fuel' => $fuel
      ])->with('i');
   }

   public function vdrMarineTable()
   {
      $vdrs = Vdr::where('status', '>=', 1)->get();
      return view('pages-stisla.marine.vdr.history', [
         'vdrs' => $vdrs
      ])->with('i');


      // return view('pages.vdr.marine.table', [
      //    'vdrs' => $vdrs
      // ])->with('i');
   }

   public function proactMarine(){
      return view('pages-stisla.marine.proact.index');
   }

   public function mapMarine(){
      return view('pages-stisla.marine.map.index');
   }

   public function proact(){
      $system = 'PROACT';
      return view('pages-stisla.under', [
         'system' => $system
      ]);
   }
   public function mapp(){
      $system = 'MAP';
      return view('pages-stisla.under', [
         'system' => $system
      ]);
   }

   public function fullMap()
   {

      $this->map();

      // $tegas = User::where('email', 'tegasjaya@gmail.com')->first();
      // dd($tegas);

      $today = Carbon::now();
      $month = $today->format('m');
      $vessels = Vessel::get();
      foreach ($vessels as $vessel) {
         $vessel->update([
            'status' => 1
         ]);

         VesselHistory::create([
            'vessel_id' => $vessel->id,
            'onhire' => $today
         ]);
      }

      if ($month == 1) {
         $monthName = 'Januari';
      } elseif ($month == 2) {
         $monthName = 'Februari';
      } elseif ($month == 3) {
         $monthName = 'Maret';
      } elseif ($month == 4) {
         $monthName = 'April';
      } elseif ($month == 5) {
         $monthName = 'Mei';
      } elseif ($month == 6) {
         $monthName = 'Juni';
      } elseif ($month == 7) {
         $monthName = 'Juli';
      } elseif ($month == 8) {
         $monthName = 'Agustus';
      } elseif ($month == 9) {
         $monthName = 'September';
      } elseif ($month == 10) {
         $monthName = 'Oktober';
      } elseif ($month == 11) {
         $monthName = 'November';
      } elseif ($month == 12) {
         $monthName = 'Desember';
      }

      $vessels = Vessel::where('status', '>', 1)->get();

      $schedules = Schedule::orderBy('updated_at', 'desc')->get();
      $progressSchedules = Schedule::where('status', '>', '1')->get();
      $requests = ModelsRequest::where('status', '>', 1)->whereMonth('date', $month)->get();
      $completeRequests = ModelsRequest::whereMonth('date', $month)->where('status', 9)->get();

      if ($requests->count() > 0) {
         $persentage = ($completeRequests->count() / $requests->count()) * 100;
         // dd($requests->count());
      } else {
         $persentage = 0;
      }

      // $requests = ModelsRequest::get();
      $requestAdditionals = ModelsRequest::where('class', 'additional')->where('status', 5)->get();
      $requestRecents = ModelsRequest::where('status', 1)->orWhere('status', 202)->paginate(5);
      $scheduleRecents = Schedule::orderBy('updated_at', 'desc')->where('status', '>=', 1)->get();
      $requestProgress = ModelsRequest::where('status', '>', 1)->where('status', '!=', 202)->get();

      // dd($requestAdditionals);
      $requestUndos = ModelsRequest::where('status', 202)->get();

      $requestLogistics = ModelsRequest::where('department_id', 2)->get();
      $requestDrillings = ModelsRequest::whereMonth('date', $month)->where('department_id', 3)->get();

      $customSchedules = [];
      $customQtyRequests = [];
      foreach ($schedules as $schedule) {
         $customSchedules[] = $schedule->date;
         $requestsMonth = ModelsRequest::where('date', $schedule->date)->get();
         $customQtyRequests[] =  $requestsMonth->count();
      }


      $offloadings = Offloading::orderBy('created_at', 'desc')->whereMonth('created_at', $month)->get();
      $deflections = Deflection::orderBy('created_at', 'desc')->whereMonth('created_at', $month)->get();


      $this->loadLocVessel();

      $vessels = Vessel::where('latitude', '!=', null)->get();
      $ports = Port::where('latitude', '!=', null)->get();
      // $elok = Vessel::where('imo', '9543483')->first();
      // dd($elok->name);

      $url = 'https://api.scu.co.id/vtms/oses/position?mmsi=all';
      $token = '73ob73y64nt3n63MP4tk4l1';
      $response = Http::withHeaders([
         'Authorization' => 'Bearer ' . $token,
      ])->post($url, []);

      $responseBody = json_decode($response->getBody());
      // dd($responseBody->data);

      foreach ($responseBody->data as $res) {
         // dd($vessel->IMO);
         // if ($res->name == 'WINNER') {
         //    dd($res->name);
         // }
         if ($res->MMSI) {
            $vessel = Vessel::where('mmsi', $res->MMSI)->first();
            $barge = Port::where('mmsi', $res->MMSI)->first();

            if ($vessel) {
               if ($vessel->latitude != $res->lat) {
                  $vessel->update([
                     'latitude' => $res->lat,
                     'longitude' => $res->lon,
                     'speed' => $res->speed,
                     'calcspeed' => $res->calcspeed,
                     'heading' => $res->heading,
                     'last_update' => $res->date
                  ]);
               }
            }

            if ($barge) {
               $barge->update([
                  'latitude' => $res->lat,
                  'longitude' => $res->lon
               ]);
            }
         }
      }

      // $acc = Vessel::find(27);
      // $kj4 = Port::find(1);
      // $tesDis = (new GeofenceController)->getDistance($acc->latitude, $acc->longitude, $kj4->latitude, $kj4->longitude);
      // dd($acc->name . ' ke ' . $kj4->name . ': ' .$tesDis);
      // dd(count($ports));

      foreach ($vessels as $vessel) {
         $vesselLat = $vessel->latitude;
         $vesselLong = $vessel->longitude;

         if ($vessel->speed > 0) {
            $vessel->update([
               // 'status' => 2,
               'port_id' => null
            ]);
         } else {
            foreach ($ports as $port) {
               $portLat = $port->latitude;
               $portLong = $port->longitude;
               $distance = (new GeofenceController)->getDistance($vesselLat, $vesselLong, $portLat, $portLong);
               // dd($vessel->name . ' ke ' . $port->name . ': ' .$distance);
               if ($distance < 300) {
                  $vessel->update([
                     // 'status' => 9,
                     'port_id' => $port->id
                  ]);

                  if ($vessel->schedule_id && $vessel->schedule->status > 1) {
                     $curentReport = Report::where('schedule_id', $vessel->schedule_id)->orderBy('updated_at', 'desc')->first();
                     // dd($curentReport);
                     if ($curentReport->status_id == 7 && $curentReport->port_id == $port->id) {
                        Report::create([
                           'schedule_id' => $vessel->schedule_id,
                           'vessel_id' => $vessel->id,
                           // arrived
                           'status_id' => 8,
                           'port_id' => $port->id
                        ]);
                     } else {
                        
                     }
                  }
                  // ReportVessel::create([
                  //    'vessel_id' => $vessel->id,
                  //    'port_id' => $port->id,
                  //    'status_id' => 3
                  // ]);
               }
               // else {
               //    $vessel->update([
               //       'status' => 3,
               //       'port_id' => null
               //    ]);
               // }


            }
         }
      }

      $recentVessels = Vessel::where('longitude', '!=', null)->orderBy('port_id', 'desc')->orderBy('updated_at', 'desc')->get();
      $reports = Report::orderBy('created_at', 'desc')->whereMonth('created_at', $month)->get();
      $vesselReports = ReportVessel::orderBy('created_at', 'desc')->whereMonth('created_at', $month)->take(5)->get();

      $vesselLastUpdates = Vessel::orderBy('last_update', 'desc')->take(5)->get();
      // dd($vesselLastUpdates);
      return view('pages-stisla.dsp.map', [
         'today' => $today,
         'monthName' => $monthName,
         'requestAdditionals' => $requestAdditionals,
         'requestRecents' => $requestRecents,
         'requestProgress' => $requestProgress,
         'schedules' => $schedules,
         'progressSchedules' => $progressSchedules,
         'dateSchedules' => collect($customSchedules)->toJson(),
         'qtyRequests' => collect($customQtyRequests)->toJson(),
         'totalSchedule' => $schedules->count(),
         'totalRequest' => $requests->count(),
         'requestLogistics' => $requestLogistics->count(),
         'requestDrillings' => $requestDrillings->count(),
         'persentage' => $persentage,
         'scheduleRecents' => $scheduleRecents,
         'reports' => $reports,
         'vesselReport' => $vesselReports,
         'offloadings' => $offloadings,
         'deflections' => $deflections,
         'geoJsonVessel' => $this->geoJsonVessel,
         'recentVessels' => $recentVessels,
         'vesselLastUpdates' => $vesselLastUpdates
      ])->with('i');
   }

   public function forbidden(){
      return view('pages-stisla.forbidden');
   }
}
