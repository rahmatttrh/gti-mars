@extends('layouts.stisla.app')
@section('title')
   DSP Dashboard
@endsection
@section('content')
   <section class="section bg-white">
      <div class="row">
         <div class="col-md-3">
            <div class="card border card-statistic-2">  
               <div class="card-icon shadow-primary bg-info">
               <i class="fas fa-ship"></i>
               </div>
               <div class="card-wrap">
               <div class="card-header">
                  <small>Name</small>
                  <h4 class="text-dark">{{$vessel->name}}</h4>
               </div>
               {{-- <div class="card-body">{{$vessel->name}}</div> --}}
               </div>
            </div>
            <div class="card border">
               <div class="card-body">
                  <div class="row">
                     <div class="col text-center">
                        <small>Progress</small><br>
                        <b>{{count($schedules->where('status', '>', 1)->where('status', '!=', 11))}}</b>
                     </div>
                     <div class="col text-center">
                        <small>Complete</small><br>
                        <b>{{count($schedules->where('status', 11))}}</b>
                     </div>
                  </div>
                  
                  
               </div>
               <div class="card-body p-0">
                  @if ($vessel->latitude)
                     <div class="" id="map2"  style="width: 100%; height: 38vh"></div>
                     @else
                           <small style="text-muted">No GPS Signal</small>
                        
                  @endif
               </div>
            </div>
         
            
         </div>
         <div class="col-md-9">
         
            
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
            <div class="card border">
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
            
            
                  {{-- @if ($recentSchedules->count() > 0)
                        @foreach ($recentSchedules as $recent)
                        <div class="alert alert-info" role="alert">
                           <i class="fa fa-bell"></i>  You have a Schedule for {{\Carbon\Carbon::parse($recent->date)->format('d/m/Y')}}. Click <a href="{{route('schedule.detail', enkripRambo($recent->id))}}" class="alert-link">here</a> to see detail.
                        </div>
                        @endforeach
                     
                  @endif --}}
                  {{-- <div class="table-responsive"> --}}
                     <table class="table-striped" id="table-6">
                        <thead>
                           <tr><th colspan="6" >Sailing Order</th></tr>
                           <tr>
                              {{-- <th class="text-center">No</th> --}}
                              <th>ID</th>
                              <th>Vessel</th>
                              <th>Date</th>
                              <th>Type</th>
                              {{-- <th>Activity</th> --}}
                              <th class="text-center">Status</th>
                              {{-- <th></th> --}}
                           </tr>
                        </thead>
                        <tbody>
                           @if ($schedules->count() > 0 )
                              @foreach ($schedules as $schedule)
                                 <tr>
                                    {{-- <td class="text-center">{{++$i}}</td> --}}
                                    <td>
                                       <a href="{{route('schedule.detail', enkripRambo($schedule->id))}}">{{$schedule->code}} </a> 
                                    </td>
                                    <td>
                                       {{$schedule->vessel->name}} 
                                    </td>
                                    <td>
                                       {{ formatDateName($schedule->date) }}
                                    </td>
                                    
                                    {{-- <td class="text-muted">
                                       From {{$schedule->origin->name}} 
                                    </td> --}}
                                    <td>{{$schedule->class}}</td>
                                    {{-- <td class="text-muted"><a href="#" data-bs-toggle="modal" data-bs-target="#modal-request-list-{{$schedule->id}}">{{$schedule->requests->count()}} Activity</a></td> --}}
                                    <td  class="text-center">
                                       <x-status-stisla.schedule :schedule="$schedule" :lastreport="$schedule->lastreport()" />
                                       {{-- @if ($schedule->deviations->where('status', 0)->count() == 0)
                                       <div class="badge bg-danger">Deviation Alert</div>
                                       @endif --}}
                                    </td>
                                    {{-- <td>
                                       <a href="{{route('schedule.detail', enkripRambo($schedule->id))}}" class="btn btn-sm btn-primary">Detail</a>
                                    </td> --}}
                                    {{-- <td>
                                       {{$schedule->revisions->where('status', 1)->first()->desc}}
                                    </td> --}}
                                 </tr>
                                 <x-modal.schedule.request :schedule="$schedule" />
                              @endforeach
                              @else
                              <tr>
                                 <td colspan="7" class="text-center text-muted"><small>Empty</small></td>
                              </tr>
                           @endif
                           
                        </tbody>
                     </table>
                  {{-- </div> --}}
                  
                  <div class="table-responsive mt-3">
                     <table class="table-striped" id="table-7">
                        <thead>
                           <tr><th colspan="6" class="py-2">My Request</th></tr>
                           <tr>
                              
                              {{-- <th class="text-center">No.</th> --}}
                              <th>ID</th>
                              <th>Activity</th>
                              <th>Date</th>
                              <th>QTY</th>
                              
                              <th>Schedule ID</th>
                              <th class="text-center">Status</th>
                              {{-- <th></th> --}}
                           </tr>
                        </thead>
                        <tbody>
                           @if ($requests->count() > 0)
                              @foreach ($requests as $request)
                                 <tr>
                                    {{-- <td class="text-center">{{++$i}}</td> --}}
                                    <td><a href="{{route('request.detail', enkripRambo($request->id))}}"> {{$request->code}}</a></td>
                                    <td>{{$request->activity->name ?? ''}} {{$request->description}}</td>
                                    <td>{{formatDateName($request->date)}}</td>
                                    <td>{{$request->qty}} KL</td>
                                    <td>{{$request->schedule->code}}</td>
                                    <td class="text-center">
                                       {{-- <x-status.request :request="$request" :lastreport="$request->schedule->lastreport()" /> --}}
                                          @if ($request->status < 3)
                                             <x-status-stisla.request :request="$request" :lastreport="null"/>
                                             @else
                                             <x-status-stisla.request :request="$request" :lastreport="$request->schedule->lastreport()"/>
                                          @endif
                                    </td>
                                    <td></td>
                                    
                                    {{-- <td>
                                       <a href="{{route('request.detail', enkripRambo($request->id))}}" class="btn btn-sm btn-primary">Detail</a>
                                    </td> --}}
                                 </tr>
                              @endforeach
                              @else
                              <tr>
                                 <td colspan="8" style="text-align: center"><small>Emtpy</small></td>
                              </tr>
                           @endif
                           
                        </tbody>
                     </table>
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

