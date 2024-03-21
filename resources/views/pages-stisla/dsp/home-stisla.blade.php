@extends('layouts.stisla.app')
@section('title')
   DSP Dashboard
@endsection
@section('content')
   <section class="section">
      <div class="row">
         <div class="col-md-4 text-center">
            <div class="card shadow-lg card-statistic-2 mb--4">
               <div class="card-icon bgb-2">
                  <i class="fas fa-archive"></i>
               </div>
               <div class="card-wrap">
                  <div class="card-header">
                  <h4><a href="#schedule" data-toggle="tooltip" data-placement="bottom" title="See All Schedule">Total Schedules</a></h4>
                  </div>
                  <div class="card-body">{{count($schedules)}}</div>
               </div>
               <div class="card-stats">
                  <div class="card-stats-items mb-2">
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
               
               <div id="map" style="height: 30vh" class="card-footer">
                  Loading Vessel Coordinates...
               </div>
               <div class="card-footer">
                  @if ($reports->count() > 0)
                  {{-- <small>LAST UPDATE</small>
                  <hr> --}}
                     <small>{{  \Carbon\Carbon::parse($reports->first()->created_at)->format('d-m-y H:i ')}}</small><span class="bullet"></span><br>
                     <span>{{$reports->first()->vessel->name}} {{$reports->first()->status->name}}  {{$reports->first()->port_id == null ? '' :  'at ' .$reports->first()->port->name}}</span> <br>
                     @if ($reports->first()->status_id == 10)
                              <a href="" class="btn btn-sm btn-primary shadow-none" data-toggle="modal" data-target="#report-evidance-{{$reports->first()->id}}">Foto</a>
                        @endif
      
                        @if ($reports->first()->status_id == 6)
                              <span class="btn btn-primary btn-sm shadow-none">ETA : {{formatDateTime($reports->first()->eta)}} at {{$reports->first()->destination->name}}</span>
                        @endif
      
                        @if ($reports->first()->status_id > 24 && $reports->first()->status_id < 29)
                              <span class="btn btn-primary btn-sm shadow-none">Anchor {{$reports->first()->anchor}}</span>
                        @endif
                     @else
                     <small>Timeline Empty</small>
                  @endif

               </div>
               <div class="card-footer bg-whitesmoke">
                  <div id="carouselExampleIndicators3" class="carousel slide bg-whitesmoke" data-ride="carousel">
                  
                     <div class="carousel-inner">
                     @php
                           $no = 0
                     @endphp
                     @foreach ($vesselLastUpdates as $vessel)
                        @php
                           ++$no
                        @endphp
                        <div class="carousel-item {{$no == 1 ? 'active' : '' }} text-center bg-whitesmoke">
                           <small><b>{{$vessel->name}}</b> </small> <br>
                           {{-- <small>[{{$vessel->latitude}}, {{$vessel->longitude}}]</small><br>
                           <small>Heading {{$vessel->heading}}</small><br> --}}
                           
                           <small>Last Update at {{$vessel->last_update}}</small>
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
            </div> 
         </div>
         
         
         <div class="col-md-8">
            <div class="card shadow-lg" id="schedule">
               <div class="card-body">
                  {{-- <small><b>Schedule Vessel</b></small>
                  <hr> --}}
                  {{-- @if (count($incomingRequests) > 0)
                  <div class="badge badge-info mb-1">Incoming Request !</div>
                  <table>
                     <tbody>
                        @foreach ($incomingRequests as $req)
                        <tr>
                           <td>{{$req->desc}}</td>
                        </tr>
                            
                        @endforeach
                     </tbody>
                  </table>
                  @endif --}}
                  
                  
                  <div class="table-responsive">
                  <table class=" table-striped " id="table-12">
                     <thead>                                 
                        <tr>
                        {{-- <th class="text-center">
                           #
                        </th> --}}
                        <th>Vessel</th>
                        {{-- <th>Date</th> --}}
                        {{-- <th>ID</th> --}}
                        {{-- <th>Type</th> --}}
                        
                        <th>Desc</th>
                        <th>Route</th>
                        <th class="text-center">Status</th>
                        {{-- <th></th> --}}
                        </tr>
                     </thead>
                     <tbody>     
                        @foreach ($progressSchedules as $schedule)
                        {{-- @if (count($schedule->requests) > 0) --}}
                           <tr>
                              
                              <td rowspan="">
                                 <span><a href="{{route('schedule.detail', enkripRambo($schedule->id))}}">{{$schedule->vessel->name ?? 'Not Available'}} </a></span><br>
                                 <small>{{formatDate($schedule->date)}}</small>
                                
                              </td>
                              
                              {{-- <td>
                                 <span>{{$schedule->class}}</span>
                              </td> --}}
                              
                              
                              
                              @if ($schedule->class == 'Crew' || $schedule->class == 'Cargo')
                                 <td class="">
                                    @if (count($schedule->requests->where('activity_id', 1)) > 0)
                                        Cargo |
                                    @endif
                                    @if (count($schedule->requests->where('activity_id', 2)) > 0)
                                        Crew |
                                    @endif
                                    {{-- {{count($schedule->requests)}} Request --}}
                                    
                                 </td>
                                 <td>
                                    @foreach ($schedule->routes as $route)
                                    <span>{{$route->port->code}} - </span>
                                    @endforeach
                                 </td>
                                 @elseif($schedule->class == 'Moving')
                                 <td>
                                    {{$schedule->requests->first()->desc}} {{$schedule->requests->first()->bargeItem->barge->name}} <br>
                                    
                                 </td>
                                 <td>
                                    
                                    <span>{{$schedule->requests->first()->origin->code}} - {{$schedule->requests->first()->destination->code}}</span>
                                 </td>
                                 @elseif(($schedule->class == 'Fuel Oil'))
                                 <td>
                                    {{$schedule->requests->first()->desc}} {{$schedule->requests->first()->fuel->qty}} KL  
                                 </td>
                                 <td>
                                    
                                    <span>{{$schedule->requests->first()->origin->code}} - {{$schedule->requests->first()->destination->code}}</span>
                                 </td>
                                 @elseif(($schedule->class == 'Fresh Water'))
                                 <td>
                                    {{-- {{$schedule->requests->first()->qty}} / {{$schedule->requests->first()->qty_approve}} KL <br> --}}
                                    <small>
                                       
                                       {{$schedule->date}}
                                       {{-- Request by {{$schedule->requests->first()->user->name}} --}}
                                    </small>
                                 </td>
                                 <td>
                                    
                                    <span>{{$schedule->requests->first()->origin->code}} - {{$schedule->requests->first()->destination->code}}</span>
                                 </td>
                                 @else
                                 <td></td>
                              @endif
                              
                              {{-- <td><small>{{\Carbon\Carbon::parse($schedule->date)->format('d/m/Y')}}</small></td> --}}
                              
                              <td class="text-center">
                                 {{-- <div class="badge badge-info"><small>Draft</small></div> --}}
                                 <x-status-stisla.schedule :schedule="$schedule" :lastreport="$schedule->lastreport()" />
                              </td>
                              
                              
                              {{-- <td>
                                 <a href="{{route('schedule.detail', enkripRambo($schedule->id))}}" class="btn btn-sm btn-primary">Detail</a>
                              </td> --}}
                           </tr>
                           
                           
                           
                           
                        {{-- @endif --}}
                        
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