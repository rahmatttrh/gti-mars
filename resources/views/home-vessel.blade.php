@extends('layouts.stisla.app')
@section('title')
    Dashboard
@endsection
@section('content')
   <section class="section">
      <div class="row">
         <div class="col-md-3">
            <div class="card card-statistic-2">  
               <div class="card-icon shadow-primary bg-primary">
               <i class="fas fa-ship"></i>
               </div>
               <div class="card-wrap">
               <div class="card-header">
                  <h4>Vessel Name</h4>
               </div>
               <div class="card-body">{{$vessel->name}}</div>
               </div>
            </div>
            <div class="card border">
               <div class="card-body">
                  <small>Progress Schedule</small><br>
                  <b>{{count($schedules->where('status', '>', 1)->where('status', '!=', 11))}}</b>
                  <hr>
                  <small>Complete Schedule</small><br>
                  <b>{{count($schedules->where('status', 11))}}</b>
               </div>
            </div>
         
            @if ($vessel->latitude)
               <div class="card mb-3" id="map2"  style="width: 100%; height: 35vh"></div>
               @else
               <div class="card mb-3">
                  <div class="card-body text-center py-4">
                     <small style="text-muted">No GPS Signal</small>
                  </div>
               </div>
            @endif
         </div>
         <div class="col-md-9">
         
            @if ($recentSchedules->count() > 0)
               @foreach ($recentSchedules as $recent)
               <div class="alert alert-warning" role="alert">
                     You have a Schedule for {{\Carbon\Carbon::parse($recent->date)->format('d/m/Y')}}. Click <a href="{{route('schedule.detail', enkripRambo($recent->id))}}" class="alert-link">here</a> to see detail.
               </div>
               @endforeach
            @endif
            {{-- <div class="card">
               <div class="card-body">
                  <span>Ongoing Schedule</span> <br>
                  
                  @foreach ($schedules as $sche)
                     @if ($sche->status != 11)
                     <a href="{{route('schedule.detail', enkripRambo($sche->id))}}"><b>{{$sche->code}} - {{formatDate($sche->date)}} </b></a>
                     @else
                     <small>Empty</small>
                     @endif
                     
                  @endforeach
               </div>
            </div> --}}
            @if (count($surveillances) > 0)
            <div class="card">
               <div class="card-header">
                  <h4>Surveillance Activity</h4>
               </div>
               <div class="card-body">
                  <div class="card shadow-none card-statistic-2">
                  @foreach ($surveillances as $surv)
                  
                  <div class="card-wrap">
                     {{-- <div class="card-header">
                        <h4>Progress Request</h4>
                     </div> --}}
                     <div class="card-body"><a href="{{route('surveillance.detail', enkripRambo($surv->id))}}">{{formatDate($surv->date)}} - {{$surv->vessel->name}}</a> </div>
                  </div>
                  <hr>
                  @endforeach
                  </div>
               </div>
            </div>
            @endif
            
            <div class="card">
               <div class="card-header">
                  <h4>Sailing Order</h4>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                  <table class="table table-striped table-sm" id="table-6">
                     <thead >
                        <tr>
                           <th class="text-center">No</th>
                           <th>ID</th>
                           <th>Date</th>
                           <th>Type</th>
                           {{-- <th>Activity</th> --}}
                           <th>Status</th>
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>
                        @if ($schedules->count() > 0 )
                           @foreach ($schedules as $schedule)
                              <tr>
                                 <td class="text-center">{{++$i}}</td>
                                 <td >{{$schedule->code}}</td>
                                 <td>{{ \Carbon\Carbon::parse($schedule->date)->format('d/m/Y') }}</td>
                                 
                                 {{-- <td class="text-muted">
                                    From {{$schedule->origin->name}} 
                                 </td> --}}
                                 <td>{{$schedule->class}}</td>
                                 {{-- <td class="text-muted"><a href="#" data-bs-toggle="modal" data-bs-target="#modal-request-list-{{$schedule->id}}">{{$schedule->requests->count()}} Activity</a></td> --}}
                                 <td>
                                    <x-status-stisla.schedule :schedule="$schedule" :lastreport="$schedule->lastreport()" />
                                    {{-- @if ($schedule->deviations->where('status', 0)->count() == 0)
                                    <div class="badge bg-danger">Deviation Alert</div>
                                    @endif --}}
                                 </td>
                                 <td>
                                    <a href="{{route('schedule.detail', enkripRambo($schedule->id))}}" class="btn btn-sm btn-primary">Detail</a>
                                 </td>
                              </tr>
                              <x-modal.schedule.request :schedule="$schedule" />
                           @endforeach
                           @else
                           <tr>
                              <td colspan="5" class="text-center text-muted"><small>Empty</small></td>
                           </tr>
                        @endif
                        
                     </tbody>
                  </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
      
   </section>
@endsection


@push('map')
<script>
    $("#modal-4").fireModal({
    footerClass: 'bg-whitesmoke',
    body: 'Add the <code>bg-whitesmoke</code> class to the <code>footerClass</code> option.',
    buttons: [
      {
        text: 'No Action!',
        class: 'btn btn-primary btn-shadow',
        handler: function(modal) {
        }
      }
    ]
  });

    mapboxgl.accessToken = 'pk.eyJ1IjoicmFobWF0cmgiLCJhIjoiY2xwNml3MzJ0MjBpNjJscXl6am9mc21sayJ9.BHym8QvhGHWK1QC3qDX4sg';
    const map = new mapboxgl.Map({
    container: 'map2', // container ID
    // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
    style: 'mapbox://styles/mapbox/streets-v12', // style URL
    center: [{!! $vessel->longitude !!}, {!! $vessel->latitude !!}], // starting position [lng, lat]
    zoom: 7.4 // starting zoom
    });
    
    const marker1 = new mapboxgl.Marker()
    .setLngLat([{!! $vessel->longitude !!}, {!! $vessel->latitude !!}])
    .addTo(map);

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

