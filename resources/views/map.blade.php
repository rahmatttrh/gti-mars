@extends('layouts.app')
@section('title')
    Dashboard Map
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
               Dashboard Tracking
            </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
               <div class="btn-list">
                  
                  <div class="dropdown">
                     <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                     Vessel
                     </button>
                     <div class="dropdown-menu dropdown-menu-end">
                        
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item"  href="/">
                           Vessel
                        </a>
                        <a class="dropdown-item" href="">
                           Port/Barge
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
         @foreach ($schedules as $schedule)
             @if ($schedule->requests->where('status', 1)->count() > 0)
             <div class="alert alert-primary" role="alert">
               You have Request Activity on Schedule {{$schedule->vessel->name ?? 'Vessel : Not Available'}} . Click <a href="{{route('schedule.detail', enkripRambo($schedule->id))}}" class="alert-link">here</a> to check.
             </div>
             @endif
         @endforeach
         {{-- @if ($requestRecents->count() > 0)
            @foreach ($requestRecents as $rr)
            <div class="alert alert-primary" role="alert">
               You have Request Activity. Click <a href="{{route('schedule.detail', enkripRambo($requestRecents->first()->schedule_id))}}" class="alert-link">here</a> to check.
             </div>
            @endforeach
         @endif --}}

         @if ($requestAdditionals->count() > 0)
            @foreach ($requestAdditionals as $request)
               <div class="alert alert-primary" role="alert">
                  You have a Additional Request at Schedule of {{$request->schedule->vessel->name}}. Click <a href="{{route('schedule.detail', enkripRambo($request->schedule_id))}}" class="alert-link">here</a> to see detail.
               </div>
            @endforeach
         @endif

         <div class="card" id="map"  style="width: 100%; height: 70vh"></div>
         
         {{-- <div class="card">
            <div class="card-body" id='map' style="width: 100%; height: 67vh">
            </div>
         </div> --}}

         <div class="row">
            <div class="col-md-8">
               <div class="card mt-3 ">
                  <div class="card-header"><div class="badge bg-primary">Sailing Order</div></div>
                  <div class="card-header border-0">
                     <div class="card-title text-uppercase">{{$monthName}}</div>
                  </div>
                  <div class="position-relative">
                     <div class="position-absolute top-0 left-0 px-3 mt-1 w-75">
                        <div class="row g-2">
                           <div class="col">
                              <div>{{$totalSchedule}} Schedules</div>
                              <div>{{$totalRequest}} Request</div>
                           </div>
                        </div>
                     </div>
                     <div id="chart-development-activity"></div>
                  </div>
                  <div class="card-table table-responsive">
                     <table class="table table-vcenter">
                        <thead>
                           <tr>
                              <th class="text-center">No</th>
                              <th>Day</th>
                              <th>Date</th>
                              <th>Vessel</th>
                              <th>Type</th>
                              <th>Status</th>
                              {{-- <th>Activity</th> --}}
                              {{-- <th>From</th> --}}
                              {{-- <th>Status</th> --}}
                           </tr>
                        </thead>
                        <tbody>
                           @if ($schedules->count() > 0)
                              @foreach ($schedules as $schedule)
                              <tr>
                                 <td class="text-center">{{ ++$i}}</td>
                                 <td>
                                    {{\Carbon\Carbon::parse($schedule->date)->format('l')}} <br>

                                 </td>
                                 <td>{{\Carbon\Carbon::parse($schedule->date)->format('d/m/Y')}}</td>
                                 <td>
                                    <a href="{{route('schedule.detail', enkripRambo($schedule->id))}}">
                                       {{$schedule->vessel->name ?? '-'}}
                                       {{-- @if ($schedule->type == 1)
                                          <div class="badge">R</div>
                                       @endif --}}
                                    </a>
                                 </td>
                                 <td>
                                    {{$schedule->vessel_type}}
                                 </td>
                                 <td><x-status.schedule :schedule="$schedule" :lastreport="$schedule->lastreport()" /></td>
                                 {{-- <td class="">{{\Carbon\Carbon::parse($schedule->date)->format('d/m/Y')}}</td> --}}
                                 {{-- <td class=""><a href="#" data-bs-toggle="modal" data-bs-target="#modal-request-list-{{$schedule->id}}">{{$schedule->requests()->count()}} Activity</a></td> --}}
                                 {{-- <td class="text-nowrap text-muted">{{$schedule->origin->name}} </td> --}}
                                 
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
            <div class="col-md-4 mt-3">
               <div class="card mb-2" style="height: calc(33rem + 10px)">
                  <div class="card-header">
                     <div class="badge bg-info">
                        Vessel Update
                     </div>
                  </div>
                  <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                     <div class="divide-y">
                        @foreach ($recentVessels as $vessel)
                           
                              <div class="row">
                                 <div class="col">
                                    <a href="" class="">{{$vessel->name}} </a> 
                                    <div class="mt-1 d-flex">

                                       <x-status.vessel :vessel="$vessel" />
                                       {{-- <div class="badge bg-light border text-dark">Pabelokan</div> --}}
                                    </div>
                                    {{-- <div class="text-muted"><small>{{$vessel->updated_at->format('d-m-y H:i ')}}</small></div> --}}
                                 </div>
                              </div>
                        @endforeach
                     </div>
                  </div>
                  <div class="card-footer">
                     {{-- <small>Click on activity to add into this schedule</small> --}}
                  </div>
               </div>
            </div>
         </div>
         
         {{-- <div id='map' class="rounded"  style="width: 100%; height: 60vh"></div> --}}
      </div>
   </div>

@endsection

@push('map')
<script>
	mapboxgl.accessToken = 'pk.eyJ1IjoicmFobWF0cmgiLCJhIjoiY2xwNml3MzJ0MjBpNjJscXl6am9mc21sayJ9.BHym8QvhGHWK1QC3qDX4sg';
   const map = new mapboxgl.Map({
   container: 'map', // container ID
   // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
   style: 'mapbox://styles/mapbox/streets-v12', // style URL
   center: [106.648409, -5.606965], // starting position [lng, lat]
   zoom: 8.3 // starting zoom
   });
   
   // map.Marker({
   //    color: '#57fa7d',
   //    scale: 0.6
   // })

   map.on('load', function () {

      map.addSource('earthquakes', {
         type: 'geojson',
         data: {!! $geoJsonVessel !!},
         cluster: true,
         clusterMaxZoom: 14,
         clusterRadius: 50
         
      });

      map.addLayer({
         id: 'clusters', 
         type: 'circle',
         source: 'earthquakes',
         filter: ['has', 'point_count'],
         paint: {
            'circle-color': [
                  'step',
                  ['get', 'point_count'],
                  '#51bbd6',
                  100,
                  '#f1f075',
                  750,
                  '#f28cb1'
            ],
            'circle-radius': [
                  'step',
                  ['get', 'point_count'],
                  20,
                  100,
                  30,
                  750,
                  40
            ]
         }
      });

      map.addLayer({
         id: 'cluster-count',
         type: 'symbol',
         source: 'earthquakes',
         filter: ['has', 'point_count'],
         layout: {
            'text-field': '{point_count_abbreviated}',
            'text-font': ['DIN Offc Pro Medium', 'Arial Unicode MS Bold'],
            'text-size': 12
         }
      });

      map.addLayer({
         'id': 'poi-labels',
         'type': 'symbol',
         'source': 'earthquakes',
         'layout': {
         'text-field': ['get', 'title'],
         'text-variable-anchor': ['top', 'bottom', 'left', 'right'],
         'text-radial-offset': 0.5,
         'text-justify': 'auto',
         'icon-image': ['get', 'icon']
         }
      });


      map.addLayer({
         id: 'unclustered-point',
         type: 'circle',
         source: 'earthquakes',
         
         filter: ['!', ['has', 'point_count']],
         
         paint: {
               // 'circle-color': '#185ADB',
             'circle-color': [
                'match',
                ['get', 'type'],
                'Vessel',
                '#185ADB',
                'Port',
                '#223b53',
                /* other */ '#ccc'
              ],
            
               'circle-radius': 7,
               // 'circle-stroke-width': 1,
               // 'circle-stroke-color': '#66DE93'
            }
         
      });
      

      map.on('click', 'clusters', function (e) {
         var features = map.queryRenderedFeatures(e.point, {
            layers: ['clusters']
         });
         var clusterId = features[0].properties.cluster_id;
         map.getSource('earthquakes').getClusterExpansionZoom(
            clusterId,
            function (err, zoom) {
                  if (err) return;

                  map.easeTo({
                     center: features[0].geometry.coordinates,
                     zoom: zoom
                  });
            }
         );
      });

      


      map.on('click', 'unclustered-point', function (e) {
         var coordinates = e.features[0].geometry.coordinates.slice();
         var nama = e.features[0].properties.title;
         var no = e.features[0].properties.no;
         var lat = e.features[0].properties.lat;
         var long = e.features[0].properties.long;
         var speed = e.features[0].properties.speed;
         var heading = e.features[0].properties.heading;

         new mapboxgl.Popup()
            .setLngLat(coordinates)
            .setHTML(
                  "<div class='card'><div class='card-header'><span class='font-bold text-lg'><b>" + nama +"</b></span></div><div class='card-body'><div class='row'><div class='col-md-2'>S <br> H</div><div class='col-md-10'>: "+ speed + " Knot<br>: " + heading + "</div></div></div>  <div class='card-footer'>"+lat+", "+long + "</div></div>"
            )
            .addTo(map);
      });

      map.on('mouseenter', 'clusters', function () {
         map.getCanvas().style.cursor = 'pointer';
      });
      map.on('mouseleave', 'clusters', function () {
         map.getCanvas().style.cursor = '';
      });
   });


   // loadLocation({!! $geoJsonVessel !!})
   map.setStyle('mapbox://styles/mapbox/outdoors-v11')
   map.addControl(new mapboxgl.NavigationControl())


   for (const feature of geojson.features) {
  // create a HTML element for each feature
  const el = document.createElement('div');
  el.className = 'marker';

  // make a marker for each feature and add to the map
  new mapboxgl.Marker(el).setLngLat(feature.geometry.coordinates).addTo(map);
}
</script>

@endpush

@push('autorefresh')
<script type="text/javascript">
   window.setTimeout( function() {
       window.location.reload();
   }, 300000);
</script>
@endpush

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



      


    