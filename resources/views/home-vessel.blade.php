@extends('layouts.stisla.app')
@section('title')
    Dashboard
@endsection
@section('content')
  <section class="section">
    <div class="row">
      <div class="col-md-4">
        <div class="card  profile-widget">
          <div class="profile-widget-header">                     
            <img alt="image" src="{{asset('img/vessel/cargo-ship.png')}}" class="rounded-circle profile-widget-picture bg-info">
            <div class="profile-widget-items">
              
              <div class="profile-widget-item">
                <div class="profile-widget-item-label">Name</div>
                <div class="h3"><b>{{$vessel->name}}</b></div>
              </div>
              {{-- <div class="profile-widget-item">
                <div class="profile-widget-item-label">Following</div>
                <div class="profile-widget-item-value">2,1K</div>
              </div> --}}
            </div>
          </div>
          <div class="profile-widget-description">
            <ul class="list-group">
              <li class="list-group-item d-flex justify-content-between align-items-center">
              
                <span class="badge badge-primary badge-pill">{{$vessel->type}}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
              
                <span class="badge badge-primary badge-pill">{{$vessel->email}}</span>
              </li>
              
              
            </ul>
          </div>
            
          <div class="card-footer text-center">
            
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
      <div class="col-md-8">
        <div class="row">
      
          <div class=" col-md-6 col-sm-12">
            <div class="card card-statistic-2">
              
              <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-rocket"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Progress Request</h4>
                </div>
                <div class="card-body"> </div>
              </div>
            </div>
          </div>
          <div class=" col-md-6 col-sm-12">
            <div class="card card-statistic-2">
              
              <div class="card-icon shadow-success bg-success">
                <i class="fas fa-check"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Complete Request</h4>
                </div>
                <div class="card-body"></div>
              </div>
            </div>
          </div>
        </div>
        @if ($recentSchedules->count() > 0)
            @foreach ($recentSchedules as $recent)
              <div class="alert alert-info" role="alert">
                  You have a Schedule for {{\Carbon\Carbon::parse($recent->date)->format('d/m/Y')}}. Click <a href="{{route('schedule.detail', enkripRambo($recent->id))}}" class="alert-link">here</a> to see detail.
              </div>
            @endforeach
        @endif
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
        <div class="card">
          <div class="card-header">
            <h4>Request Activity</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="table-6">
                <thead >
                  <tr>
                     {{-- <th class="text-center">No.</th> --}}
                     <th>Date</th>
                     {{-- <th>Route</th> --}}
                     <th>Activity</th>
                     <th>Status</th>
                     {{-- <th></th> --}}
                  </tr>
               </thead>
               <tbody>
                  @if ($schedules->count() > 0 )
                     @foreach ($schedules as $schedule)
                        <tr>
                           {{-- <td class="text-muted text-center">{{++$i}}</td> --}}
                           <td><a href="{{route('schedule.detail', enkripRambo($schedule->id))}}">{{ \Carbon\Carbon::parse($schedule->date)->format('d/m/Y') }}</a></td>
                           
                           {{-- <td class="text-muted">
                              From {{$schedule->origin->name}} 
                           </td> --}}
                           <td class="text-muted"><a href="#" data-bs-toggle="modal" data-bs-target="#modal-request-list-{{$schedule->id}}">{{$schedule->requests->count()}} Activity</a></td>
                           <td>
                              <x-status.schedule :schedule="$schedule" :lastreport="$schedule->lastreport()" />
                              {{-- @if ($schedule->deviations->where('status', 0)->count() == 0)
                              <div class="badge bg-danger">Deviation Alert</div>
                              @endif --}}
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

