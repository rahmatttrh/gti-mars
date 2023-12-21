@extends('layouts.stisla.app')
@section('title')
    Dashboard
@endsection
@section('content')
   <section class="section">
      <div class="row">
         <div class="col-md-4">
            <div class="card border card-statistic-2">
               <div class="card-icon bg-primary">
                  <i class="fas fa-archive"></i>
               </div>
               <div class="card-wrap">
                  <div class="card-header">
                  <h4>Total Schedules</h4>
                  </div>
                  <div class="card-body">{{count($schedules)}}</div>
               </div>
               <div class="card-stats">
                  {{-- <div class="card-stats-title">
                  Statistic
                  
                  </div> --}}
                  <div class="card-stats-items mb-4">
                     <div class="card-stats-item">
                        <div class="card-stats-item-count">{{count($schedules->where('status', '=', 0))}}</div>
                        <div class="card-stats-item-label">Draft</div>
                     </div>
                     <div class="card-stats-item">
                        <div class="card-stats-item-count">{{count($schedules->where('status', '>', 0)->where('status', '!=', 11))}}</div>
                        <div class="card-stats-item-label">Progress</div>
                     </div>
                     <div class="card-stats-item">
                        <div class="card-stats-item-count">{{count($schedules->where('status', 11))}}</div>
                        <div class="card-stats-item-label">Complete</div>
                     </div>
                  
                  </div>
               </div>
               
               
            </div>
            <div class="card border shadow-sm">
               <div class="card-header">
                  <small class="badge badge-primary">Schedule Update</small>
               </div>
               <div class="card-body">
                  {{-- <small class="badge badge-primary mb-2">Schedule Update</small> --}}
                  {{-- <hr> --}}
                  <div class="activities" style="height: 250px; overflow-y: scroll">
                  @if ($reports->count() > 0)
                     @foreach ($reports as $report)
                     <div class="activity">
                        {{-- <div class="activity-icon bg-primary text-white shadow-primary">
                        <i class="fas fa-comment-alt"></i>
                        </div> --}}
                        <div class="activity-detail border shadow-none">
                        <div class="mb-2">
                           <span class="text-job text-primary">{{  \Carbon\Carbon::parse($report->created_at)->format('d-m-y H:i ')}}</span>
                           <span class="bullet"></span>
                        
                        </div>
                        <p>{{$report->vessel->name}} {{$report->status->name}}  {{$report->port_id == null ? '' :  'at ' .$report->port->name}}.</p>
                        @if ($report->status_id == 10)
                              <a href="" class="btn btn-sm btn-primary shadow-none" data-toggle="modal" data-target="#report-evidance-{{$report->id}}">Evidance</a>
                        @endif
      
                        @if ($report->status_id == 6)
                              <span class="btn btn-primary btn-sm shadow-none">ETA : {{formatDateTime($report->eta)}} at {{$report->destination->name}}</span>
                        @endif
      
                        @if ($report->status_id > 24 && $report->status_id < 29)
                              <span class="btn btn-primary btn-sm shadow-none">Anchor {{$report->anchor}}</span>
                        @endif
                        </div>
                     </div>
                     
                        @endforeach
                        @else
                        <div class="row">
                        <div class="col">
                              <small class="text-center text-muted">Empty</small>
                        </div>
                        </div>
                  @endif
                  
                  </div>
                  {{-- <div class="tickets-list" style="height: 250px; overflow-y: scroll">
                  @foreach ($reports as $report)
                     <a href="{{route('schedule.detail', enkripRambo($report->schedule_id))}}" class="ticket-item">
                        <div class="ticket-title">
                        <h4>{{$report->vessel->name}} {{$report->status->name}}</h4>
                        </div>
                        <div class="ticket-info">
                        <div>{{$report->port->name ?? 'Offshore'}}</div>
                        <div class="bullet"></div>
                        <div class="text-primary">{{$report->updated_at->format('d-m-y H:i ')}}</div>
                        </div>
                     </a>
                     
                  @endforeach
                  
                  <a
                     href="features-tickets.html"
                     class="ticket-item ticket-more"
                  >
                     View All <i class="fas fa-chevron-right"></i>
                  </a>
                  </div> --}}
               </div>
            </div>
         </div>
         
         
         <div class="col-md-8">
         <div id="map" class="card" style="height: 62vh; width:auto; border-radius: 15px;background-size: cover;"></div>
         <div class="row">
            <div class="col-md-12">
               <div class="card border shadow-sm">
               {{-- <div class="card-header">
                  <small class="badge badge-primary">Vessel Coordinate</small>
               </div> --}}
               <div class="card-body">
                  <div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">
                  
                     <div class="carousel-inner">
                     @php
                           $no = 0
                     @endphp
                     @foreach ($vesselLastUpdates as $vessel)
                        @php
                           ++$no
                        @endphp
                        <div class="carousel-item {{$no == 1 ? 'active' : '' }} text-center">
                           <h4>{{$vessel->name}}</h4>
                           {{-- <small>Standby Pabelokan</small><br> --}}
                           <small>[{{$vessel->latitude}}, {{$vessel->longitude}}]</small><br>
                           <small>Heading {{$vessel->heading}}</small><br>
                           
                           <small>Last Update at {{$vessel->last_update}}</small>
                           {{-- <hr> --}}
                           {{-- <img class="d-block w-100" src="assets/img/news/img01.jpg" alt="First slide"> --}}
                        </div>
                     @endforeach
                     
                     </div>
                     <a class="carousel-control-prev" href="#carouselExampleIndicators3" role="button" data-slide="prev">
                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                     <span class="sr-only">Previous</span>
                     </a>
                     <a class="carousel-control-next" href="#carouselExampleIndicators3" role="button" data-slide="next">
                     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                     <span class="sr-only">Next</span>
                     </a>
                  </div>
               </div>
               {{-- <div class="card-footer">
                  <small>Recent Update</small>
               </div> --}}
               </div>
            </div>
            <div class="col-md-5">
               
            </div>
         </div>
         </div>
      </div>

      
      <div class="row">
         <div class="col-md-12">
         <div class="card">
            {{-- <div class="card-header">
               <small class="badge badge-primary">Schedules</small>
            </div> --}}
            <div class="card-body">
               <div class="table-responsive">
               <table class="table table-striped table-sm" id="table-12">
                  <thead>                                 
                     <tr>
                     <th class="text-center">
                        #
                     </th>

                     <th>Vessel</th>
                     <th>Date</th>
                     <th>Activity</th>
                     <th>Route</th>
                     <th>Status</th>
                     </tr>
                  </thead>
                  <tbody>     
                     @foreach ($schedules as $schedule)
                     <tr>
                        <td class="text-center">
                           <small>{{++$i}}</small> 
                        </td>
                        <td>
                           <a href="{{route('schedule.detail', enkripRambo($schedule->id))}}">
                           {{$schedule->vessel->name ?? '-'}} <br>
                           <small>{{$schedule->vessel->type ?? '-'}}</small>
                           </a>
                        </td>
                        <td>{{formatDateName($schedule->date)}}</td>
                        <td>
                           {{$schedule->class}}
                           {{-- @if ($schedule->type == 1)
                              Cargo/Crew
                              @elseif($schedule->type == 2)
                              Moving
                              @elseif($schedule->type == 3)
                              Lifting
                           @endif --}}
                           
                        </td>
                        <td class="d-flex">
                           @foreach ($schedule->routes as $route)
                           <div class="mr-2">{{$route->port->name}} <br>
                              <small>{{formatDate($route->date)}}</small>
                           </div> 
                           @endforeach
                        </td>
                        {{-- <td><small>{{\Carbon\Carbon::parse($schedule->date)->format('d/m/Y')}}</small></td> --}}
                        
                        <td>
                           {{-- <div class="badge badge-info"><small>Draft</small></div> --}}
                           <x-status-stisla.schedule :schedule="$schedule" :lastreport="$schedule->lastreport()" />
                        </td>
                     </tr>
                     @endforeach                            
                     
                  </tbody>
               </table>
               </div>
            </div>
         </div>
         </div>
      </div>
   </section>
@endsection

@push('autorefresh')
<script type="text/javascript">
   window.setTimeout( function() {
       window.location.reload();
   }, 300000);
</script>
@endpush
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