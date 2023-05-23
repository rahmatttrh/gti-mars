@extends('layouts.app')
@section('title')
    Dashboard Chart
@endsection

@section('content')

   <div class="container-xl">
      <!-- Page title -->
      <div class="page-header d-print-none">
         <div class="row align-items-center">
            <div class="col">
               <!-- Page pre-title -->
               <div class="page-pretitle">
                  Overview
               </div>
            <h2 class="page-title">
               Dashboard
            </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
               <div class="btn-list">
                  <div class="dropdown">
                     <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                     Month
                     </button>
                        <div class="dropdown-menu dropdown-menu-end">
                           <a class="dropdown-item" href="{{route('dashboard.chart', 1)}}">
                              Januari
                           </a>
                           <a class="dropdown-item" href="{{route('dashboard.chart', 2)}}">
                              Februari
                           </a>
                           <a class="dropdown-item" href="{{route('dashboard.chart', 3)}}">
                              Maret
                           </a>
                           <a class="dropdown-item" href="{{route('dashboard.chart', 4)}}">
                              April
                           </a>
                           <a class="dropdown-item" href="{{route('dashboard.chart', 5)}}">
                              Mei
                           </a>
                           <a class="dropdown-item" href="{{route('dashboard.chart', 6)}}">
                              Juni
                           </a>
                           <a class="dropdown-item" href="{{route('dashboard.chart', 7)}}">
                              Juli
                           </a>
                           <a class="dropdown-item" href="{{route('dashboard.chart', 8)}}">
                              Agustus
                           </a>
                           <a class="dropdown-item" href="{{route('dashboard.chart', 9)}}">
                              September
                           </a>
                           <a class="dropdown-item" href="{{route('dashboard.chart', 10)}}">
                              Oktober
                           </a>
                           <a class="dropdown-item" href="{{route('dashboard.chart', 11)}}">
                              November
                           </a>
                           <a class="dropdown-item" href="{{route('dashboard.chart', 12)}}">
                              Desember
                           </a>
                        </div>
                  </div>
                  <div class="dropdown">
                     <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                     Option
                     </button>
                     <div class="dropdown-menu dropdown-menu-end">
                        {{-- @if (auth()->user()->hasRole('logistic'))
                        <a class="dropdown-item" href="{{route('request.create')}}">
                           Create
                        </a>
                        @endif --}}
                        {{-- <a class="dropdown-item"  href="{{route('test.email')}}">
                           Tes Email
                        </a> --}}
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item"  href="/">
                           Chart
                        </a>
                        <a class="dropdown-item" href="{{route('dashboard.table')}}">
                           Table
                        </a>
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="page-body">
      <div class="container-xl">
         @if ($requestRecents->count() > 0)
         <div class="alert alert-primary" role="alert">
            You have {{$requestRecents->count()}} Request Activity. Click <a href="{{route('request')}}" class="alert-link">here</a> to check.
          </div>
         @endif
         
         <div class="row row-cards">
            <div class="col-md-9">
               <div class="card">
                  <div class="card-header border-0">
                     <div class="card-title text-uppercase">{{$monthName}}</div>
                  </div>
                  <div class="position-relative">
                     <div class="position-absolute top-0 left-0 px-3 mt-1 w-75">
                        <div class="row g-2">
                           <div class="col">
                              <div>{{$totalSchedule}} Schedules</div>
                              <div>{{$totalRequest}} Activity</div>
                           </div>
                        </div>
                     </div>
                     <div id="chart-development-activity"></div>
                  </div>
                  <div class="card-table table-responsive">
                     <table class="table table-vcenter">
                        <thead>
                           <tr>
                              <th>Date</th>
                              <th>Vessel</th>
                              <th>Activity</th>
                              <th>Route</th>
                              <th>Status</th>
                           </tr>
                        </thead>
                        <tbody>
                           @if ($schedules->count() > 0)
                              @foreach ($schedules as $schedule)
                              <tr>
                                 <td>
                                    <a href="{{route('schedule.detail', enkripRambo($schedule->id))}}">
                                       {{\Carbon\Carbon::parse($schedule->date)->format('d/m/Y')}}
                                    </a>
                                 </td>
                                 <td class=""><a href="{{route('vessel.history', [enkripRambo($schedule->vessel->id), $today->format('m') ])}}">{{$schedule->vessel->name}}</a></td>
                                 <td class=""><a href="#" data-bs-toggle="modal" data-bs-target="#modal-request-list-{{$schedule->id}}">{{$schedule->requests()->count()}} Activity</a></td>
                                 <td class="text-nowrap text-muted">{{$schedule->origin->name}} - {{$schedule->destination->name}}</td>
                                 <td><x-status.schedule :schedule="$schedule" :lastreport="$schedule->lastreport()" /></td>
                              </tr>
                              <x-modal.schedule.request :schedule="$schedule" />
                              @endforeach
                              @else
                              <tr>
                                 <td colspan="5" class="text-center"><small>Empty</small></td>
                              </tr>
                           @endif
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>

            <div class="col-md-3">  
               <div class="card mb-2">
                  {{-- <div class="card-header">
                     Department Request
                  </div> --}}
                 <div class="card-body">
                   <div id="chart-demo-pie"></div>
                 </div>
               </div>
               <div class="card" style="height: calc(16rem + 10px)">
                  <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                     <div class="divide-y">
                        @if ($scheduleRecents->count() > 0)
                           @foreach ($scheduleRecents as $scherecent)
                           <div>
                              <div class="row">
                                 <div class="col">
                                    <div class="text-truncate">
                                       <strong>{{$scherecent->vessel->name}}</strong> <x-status.schedule-plain :schedule="$scherecent" /> 
                                    </div>
                                    <div class="text-muted"><small>{{$scherecent->updated_at->diffForHumans()}}</small></div>
                                 </div>
                                 {{-- <div class="col-auto align-self-center">
                                    <div class="badge bg-primary"></div>
                                 </div> --}}
                              </div>
                           </div>
                           @endforeach
                           @else
                           <div>
                              <div class="row">
                                 <div class="col text-center">
                                    
                                    <div class="text-muted">Empty</div>
                                 </div>
                              </div>
                           </div>
                        @endif
                        
                       
                     </div>
                  </div>
               </div>
            </div>
            
            
         </div>
      </div>
   </div>

@endsection

@push('chart')
<script>
   // @formatter:off
   

   document.addEventListener("DOMContentLoaded", function () {
      window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-activity'), {
         chart: {
            type: "radialBar",
            fontFamily: 'inherit',
            height: 40,
            width: 40,
            animations: {
               enabled: false
            },
            sparkline: {
               enabled: true
            },
         },
         tooltip: {
            enabled: false,
         },
         plotOptions: {
            radialBar: {
               hollow: {
                  margin: 0,
                  size: '75%'
               },
               track: {
                  margin: 0
               },
               dataLabels: {
                  show: false
               }
            }
         },
         colors: ["#206bc4"],
         series: [35],
      })).render();

      window.ApexCharts && (new ApexCharts(document.getElementById('chart-development-activity'), {
         chart: {
            type: "area",
            fontFamily: 'inherit',
            height: 192,
            sparkline: {
               enabled: true
            },
            animations: {
               enabled: false
            },
         },
         dataLabels: {
            enabled: false,
         },
         fill: {
            opacity: .16,
            type: 'solid'
         },
         stroke: {
            width: 2,
            lineCap: "round",
            curve: "smooth",
         },
         series: [{
            name: "Request",
            data: {!! $qtyRequests !!}

         }],
         grid: {
            strokeDashArray: 4,
         },
         xaxis: {
            labels: {
               padding: 0,
            },
            tooltip: {
               enabled: false
            },
            axisBorder: {
               show: false,
            },
            type: 'datetime',
         },
         yaxis: {
            labels: {
               padding: 4
            },
         },
         labels: {!! $dateSchedules !!},
         // labels: [
         //    '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24'
         // ],
         colors: ["#206bc4"],
         legend: {
            show: false,
         },
         point: {
            show: false
         },
      })).render();

      window.ApexCharts && (new ApexCharts(document.getElementById('chart-demo-pie'), {
         chart: {
            type: "donut",
            fontFamily: 'inherit',
            height: 150,
            sparkline: {
               enabled: true
            },
            animations: {
               enabled: false
            },
         },
         fill: {
            opacity: 1,
         },
         // series: [0, 0],
         series: [{!! $requestLogistics !!}, {!! $requestDrillings!!}],
         labels: ["Logistic", "Drilling"],
         grid: {
            strokeDashArray: 4,
         },
         colors: ["#206bc4", "#79a6dc", "#d2e1f3"],
         legend: {
            show: true,
            position: 'bottom',
            offsetY: 12,
            markers: {
               width: 10,
               height: 10,
               radius: 100,
            },
            itemMargin: {
               horizontal: 8,
               vertical: 8
            },
         },
         tooltip: {
            fillSeriesColor: false
         },
      })).render();

      window.ApexCharts && (new ApexCharts(document.getElementById('chart-temperature'), {
         chart: {
            type: "line",
            fontFamily: 'inherit',
            height: 240,
            parentHeightOffset: 0,
            toolbar: {
               show: false,
            },
            animations: {
               enabled: false
            },
         },
         fill: {
            opacity: 1,
         },
         stroke: {
            width: 2,
            lineCap: "round",
            curve: "smooth",
         },
         series: [{
            name: "Tokyo",
            data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
         },{
            name: "London",
            data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
         }],
         grid: {
            padding: {
               top: -20,
               right: 0,
               left: -4,
               bottom: -4
            },
            strokeDashArray: 4,
         },
         dataLabels: {
            enabled: true,
         },
         xaxis: {
            labels: {
               padding: 0,
            },
            tooltip: {
               enabled: false
            },
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
         },
         yaxis: {
            labels: {
               padding: 4
            },
         },
         colors: ["#206bc4", "#5eba00"],
         legend: {
            show: false,
         },
         markers: {
            size: 2
         },
      })).render();

      window.ApexCharts && (new ApexCharts(document.getElementById('chart-completion-tasks-10'), {
         chart: {
            type: "area",
            fontFamily: 'inherit',
            height: 240,
            parentHeightOffset: 0,
            toolbar: {
               show: false,
            },
            animations: {
               enabled: false
            },
         },
         dataLabels: {
            enabled: false,
         },
         fill: {
            opacity: .16,
            type: 'solid'
         },
         stroke: {
            width: 2,
            lineCap: "round",
            curve: "smooth",
         },
         series: [{
            name: "",
            data: [155, 65, 465, 265, 225, 325, 80, 125, 255, 90, 155, 345]
         },{
            name: "",
            data: [113, 42, 65, 54, 76, 65, 35, 75, 55, 85, 125, 95]
         }],
         grid: {
            padding: {
               top: -20,
               right: 0,
               left: -4,
               bottom: -4
            },
            strokeDashArray: 4,
         },
         xaxis: {
            labels: {
               padding: 0,
            },
            tooltip: {
               enabled: false
            },
            axisBorder: {
               show: false,
            },
            type: 'string',
         },
         yaxis: {
            labels: {
               padding: 4
            },
         },
         // labels: [
         //    '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26'
         // ],
         labels: [
            'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ag', 'Sept', 'Okt', 'Nov' , 'Des'
         ],
         colors: ["#206bc4", "#cd201f"],
         legend: {
            show: false,
         },
      })).render();
   });
   // @formatter:on
</script>
@endpush

      


    