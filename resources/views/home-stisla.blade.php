@extends('layouts.stisla.app')
@section('title')
    Dashboard
@endsection
@section('content')
  <section class="section">
    <div class="row">
      <div class="col-lg-3 col-md-5 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-stats">
            <div class="card-stats-title">
              Statistic
              {{-- <div class="dropdown d-inline">
                <a
                  class="font-weight-600 dropdown-toggle"
                  data-toggle="dropdown"
                  href="#"
                  id="orders-month"
                  >August</a
                >
                <ul class="dropdown-menu dropdown-menu-sm">
                  <li class="dropdown-title">Select Month</li>
                  <li><a href="#" class="dropdown-item">January</a></li>
                  <li>
                    <a href="#" class="dropdown-item">February</a>
                  </li>
                  <li><a href="#" class="dropdown-item">March</a></li>
                  <li><a href="#" class="dropdown-item">April</a></li>
                  <li><a href="#" class="dropdown-item">May</a></li>
                  <li><a href="#" class="dropdown-item">June</a></li>
                  <li><a href="#" class="dropdown-item">July</a></li>
                  <li>
                    <a href="#" class="dropdown-item active">August</a>
                  </li>
                  <li>
                    <a href="#" class="dropdown-item">September</a>
                  </li>
                  <li><a href="#" class="dropdown-item">October</a></li>
                  <li>
                    <a href="#" class="dropdown-item">November</a>
                  </li>
                  <li>
                    <a href="#" class="dropdown-item">December</a>
                  </li>
                </ul>
              </div> --}}
            </div>
            <div class="card-stats-items">
              <div class="card-stats-item">
                <div class="card-stats-item-count">{{count($schedules->where('status', 0))}}</div>
                <div class="card-stats-item-label">Draft</div>
              </div>
              <div class="card-stats-item">
                <div class="card-stats-item-count">{{count($schedules->where('status', '>' ,0))}}</div>
                <div class="card-stats-item-label">Progress</div>
              </div>
              
            </div>
          </div>
          <div class="card-icon bg-success">
            <i class="fas fa-archive"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Schedules</h4>
            </div>
            <div class="card-body">{{count($schedules)}}</div>
          </div>
          
        </div>
        <div class="card bg-danger shadow">
          {{-- <div class="card-header">
            <small class="badge badge-light">Location Updates</small>
          </div> --}}
          <div class="card-body">
            <div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">
              {{-- <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators3" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators3" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators3" data-slide-to="2"></li>
              </ol> --}}
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
                    <hr>
                    <small>Last Update <br> {{$vessel->last_update}}</small>
                    {{-- <hr> --}}
                    {{-- <img class="d-block w-100" src="assets/img/news/img01.jpg" alt="First slide"> --}}
                  </div>
                @endforeach
                {{-- <div class="carousel-item active text-center">
                  <h4>Triton Jawara</h4>
                  <small>Standby Pabelokan</small><br>
                  <small>[-5.458963, 106.2754]</small><br>
                  <small>Heading 551</small><br>
                  <hr>
                  <small>Last Update 25, November 2023</small>
                </div>
                <div class="carousel-item  text-center">
                  <h4>Transko Balihe</h4>
                  <small>Standby KJ4</small><br>
                  <small>[-5.458963, 106.2754]</small><br>
                  <small>Heading 551</small><br>
                  <hr>
                  <small>Last Update 22, November 2023</small>
                </div>
                <div class="carousel-item  text-center">
                  <h4>Giat Jaya</h4>
                  <small>Fullaway</small><br>
                  <small>[-5.458963, 106.2754]</small><br>
                  <small>Heading 31</small><br>
                  <hr>
                  <small>Last Update 12, November 2023</small>
                </div> --}}
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
        <div class="card card-hero">
          <div class="card-header">
            <div class="card-icon">
              <i class="far fa-ship"></i>
            </div>
            {{-- <h4>14</h4> --}}
            <div class="card-description">Schedule Updates</div>
          </div>
          <div class="card-body p-0">
            <div class="tickets-list">
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
                  {{-- <div>
                    <div class="row">
                        <div class="col">
                          <div class="">
                              <a href="{{route('schedule.detail', enkripRambo($report->schedule_id))}}">{{$report->vessel->name}} </a> 
                              {{$report->status->name}} {{$report->port->name ?? ''}}
                          </div>
                          <div class="text-muted"><small>{{$report->updated_at->format('d-m-y H:i ')}}</small></div>
                        </div>
                    </div>
                  </div> --}}
              @endforeach
              {{-- <a href="#" class="ticket-item">
                <div class="ticket-title">
                  <h4>Tegas Jaya Start Offloading</h4>
                </div>
                <div class="ticket-info">
                  <div>Pabelokan</div>
                  <div class="bullet"></div>
                  <div class="text-primary">1 min ago</div>
                </div>
              </a>
              <a href="#" class="ticket-item">
                <div class="ticket-title">
                  <h4>Tegas Jaya Arrived</h4>
                </div>
                <div class="ticket-info">
                  <div>Pabelokan</div>
                  <div class="bullet"></div>
                  <div>2 hours ago</div>
                </div>
              </a>
              <a href="#" class="ticket-item">
                <div class="ticket-title">
                  <h4>NMS Accelerate Arrived <h4>
                </div>
                <div class="ticket-info">
                  <div>KJ4</div>
                  <div class="bullet"></div>
                  <div>6 hours ago</div>
                </div>
              </a> --}}
              <a
                href="features-tickets.html"
                class="ticket-item ticket-more"
              >
                View All <i class="fas fa-chevron-right"></i>
              </a>
            </div>
          </div>
        </div>
        {{-- <div class="card">
          <div class="card-body">
            <div class="summary">
              
              <div class="summary-item">
                <h6>Recent Update <span class="text-muted">(5)</span></h6>
                <ul class="list-unstyled list-unstyled-border">
                  <li class="media">
                    <div class="media-body">
                      <div class="media-title"><a href="#">Triton Jawara</a></div>
                      <div class="text-muted text-small">Standby <a href="#">Pabelokan</a> <div class="bullet"></div> 12/11/23, 17:45</div>
                    </div>
                  </li>
                  <li class="media">
                    <div class="media-body">
                      <div class="media-title"><a href="#">Transisko Balihe</a></div>
                      <div class="text-muted text-small">Standby <a href="#">KJ4</a> <div class="bullet"></div> 12/11/23, 17:45</div>
                    </div>
                  </li>
                  <li class="media">
                    <div class="media-body">
                      <div class="media-title"><a href="#">Giat Jaya</a></div>
                      <div class="text-muted text-small">Sailing <div class="bullet"></div> 12/11/23, 17:45</div>
                    </div>
                  </li>
                  <li class="media">
                    <div class="media-body">
                      <div class="media-title"><a href="#">NMS Accelerate</a></div>
                      <div class="text-muted text-small">Standby <a href="#">KJ4</a> <div class="bullet"></div> 12/11/23, 17:45</div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div> --}}
      </div>
      {{-- <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
          
          <div class="card-icon shadow-primary bg-primary">
            <i class="fas fa-dollar-sign"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Balance</h4>
            </div>
            <div class="card-body">$187,13</div>
          </div>
        </div>
      </div> --}}
      
      <div class="col-md-9">
        <div id="map" class="card" style="height: 85vh; width:auto; border-radius: 15px;background-size: cover;

        ">
        </div>
        <div class="card">
          <div class="card-header">
            <h4>Schedules</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="table-1">
                <thead>                                 
                  <tr>
                    <th class="text-center">
                      #
                    </th>
                    <th>Day</th>
                    <th>Date</th>
                    <th>Vessel</th>
                    <th>Type</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>     
                  @foreach ($schedules as $schedule)
                    <tr>
                      <td>
                        {{++$i}}
                      </td>
                      <td>{{\Carbon\Carbon::parse($schedule->date)->format('l')}}</td>
                      <td>{{\Carbon\Carbon::parse($schedule->date)->format('d/m/Y')}}</td>
                      <td>
                        <a href="{{route('schedule.detail', enkripRambo($schedule->id))}}">
                            {{$schedule->vessel->name ?? '-'}}
                            {{-- @if ($schedule->type == 1)
                              <div class="badge">R</div>
                            @endif --}}
                        </a>
                      </td>
                      <td>{{$schedule->vessel_type}}</td>
                      <td><x-status-stisla.schedule :schedule="$schedule" :lastreport="$schedule->lastreport()" /></td>
                    </tr>
                  @endforeach                            
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
    

    <div class="row mt-3">
      <div class="col-8">
        
      </div>
      <div class="col-md-4">
        
      </div>
    </div>
  </section>
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