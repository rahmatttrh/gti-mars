@extends('layouts.stisla.app')
@section('title')
   DSP Detail Sailing Order
@endsection
@section('content')
<section class="section">
   <div class="section-body">
      <div class="row">
         <div class="col-md-3">
            
            <div class="card shadow- border">
               {{-- <div class="card-header">
                  <x-status-stisla.schedule :schedule="$schedule" :lastreport="$lastreport" />
               </div> --}}
               <div class="card-body">
                  <x-status-stisla.schedule :schedule="$schedule" :lastreport="$lastreport" />
                  <hr>
                  <h5><b>{{$schedule->vessel->name ?? 'Vessel Empty'}}</b></h5>
                  
                  
                  @if ($schedule->class == 'Cargo' || $schedule->class == 'Crew' || $schedule->class == 'Crew Change')
                     <span>
                        @foreach ($fixRoutes as  $route)
                              
                           @if (auth()->user()->hasRole('marine'))
                              <a href="#" data-toggle="modal" data-target="#reorder-route-{{$route->id}}">
                              @if ($route->rank > 1)
                                 -
                                 @else
                                 
                              @endif 
                              {{$route->port->code}} 
                              @if ($route->port->port_id != null)
                                 ({{$route->port->port->code}})

                              @endif
                              </a>
                           @else
                              @if ($route->rank > 1)
                              -
                              @else
                              @endif 
                              {{$route->port->code}} 
                           @endif
                           
                          
                              
                        @endforeach
                        <br>
                        {{-- @if (auth()->user()->hasRole('marine'))
                        <a href="#" data-toggle="modal" data-target="#add-schedule-route" class="" add-schedule-route>add more</a>
                        @endif --}}
                        @if (auth()->user()->hasRole('marine'))
                                 {{$schedule->remark}}
                              @else
                              {{$schedule->remark}}
                              @endif
                     </span>  
                  @endif
                  @if ($schedule->class == 'Moving' || $schedule->class == 'Lifting' || $schedule->class == 'Fuel Oil' || $schedule->class == 'Fresh Water')
                      <span><b>{{$schedule->requests()->first()->origin->name}}</b> to <b>{{$schedule->requests()->first()->destination->name}}</b></span>
                  @endif
                  
                  <hr>
                  <div class="d-flex justify-content-between">
                     <span>Day</span>
                     <span>{{formatDayName($schedule->date)}}</span>
                  </div>
                  <div class="d-flex justify-content-between">
                     <span>Date</span>
                     <span>{{formatDate($schedule->date)}}</span>
                  </div>
                  <div class="d-flex justify-content-between">
                     <span>ID</span>
                     <span>{{$schedule->code}}</span>
                  </div>
                  <div class="d-flex justify-content-between">
                     <span>Class</span>
                     <span class="text-uppercase">{{$schedule->class }}</span>
                  </div>
                  <div class="d-flex justify-content-between">
                     <span>Capacity</span>
                     <span class="">
                        @if ($schedule->vessel)
                        {{intval($schedule->vessel->deadweight)}} Ton
                        @else
                        -
                        @endif
                        
                     </span>
                  </div>
                  
                  @if ($schedule->class != 'Crew Change')
                  <div class="d-flex justify-content-between">
                     <span>COB</span>
                     <span class="">{{$persenWeight ?? '0'}}% [{{$schedule->total_weight}} Ton]</span>
                  </div>
                  <div class="d-flex justify-content-between">
                     <span>POB</span>
                     <span class="">{{$totalDeparture ?? '0'}}</span>
                  </div>
                  @endif
                  @if ($schedule->class == 'Crew Change')
                  <div class="d-flex justify-content-between">
                     <span>Depart</span>
                     <span class="">{{$totalDeparture}}</span>
                  </div>
                  <div class="d-flex justify-content-between">
                     <span>Return</span>
                     <span class="">{{$totalReturn}}</span>
                  </div>
                  @endif
                  
                  
               </div>
               <div class="card-footer bg-whitesmoke">
                  {{-- @foreach ($reports as $report)
                     @if ($report)
                     <small class="text-primary"><b>{{formatDateTime($report->created_at)}}</b></small><br>
                     <small class="border-bottom">{{$report->status->name}}  {{$report->port->name ?? ''}} {{$report->anchor ?? ''}}</small><br>
                     @if ($report->status_id == 6)
                        <small >ETA : {{formatDateTime($report->eta)}} at {{$report->destination->name}}</small> <br>
                     @endif
                     @if ($report->status_id == 9)
                        <a href=""  data-toggle="modal" data-target="#report-evidance-{{$report->id}}"><small>Evidance</small></a> <br>
                     @endif
                  @endif
                  <span class="mb-2"></span>
                  
                  
                  @endforeach --}}
                  @if ($report)
                     <small class="text-primary"><b>{{formatDateTime($report->date)}}</b></small><br>
                     <small class="">{{$report->status->name}}  {{$report->port->code ?? ''}} {{$report->anchor ?? ''}}</small><br>
                     @if ($report->status_id == 6)
                        <small >ETA : {{formatDateTime($report->eta)}} at {{$report->destination->code}}</small> <br>
                     @endif
                     @if ($report->status_id == 9)
                        <a href=""  data-toggle="modal" data-target="#report-evidance-{{$report->id}}"><small>Evidance</small></a> <br>
                     @endif
                  @endif
                  <div class="d-flex justify-content-between mt-2">
                     <a href="{{route('schedule.timeline', enkripRambo($schedule->id))}}"><small>Timeline</small></a> <br>
                     <a href="{{route('document.manifest', enkripRambo($schedule->id))}}" target="_blank" class=""><small>Export PDF</small></a> 
                  </div>
                  @if (auth()->user()->hasRole('marine'))
                  <hr>
                  <a href="#" data-toggle="modal" data-target="#schedule-delete"><small>Delete</small></a>
                  @endif
                  
                  
               </div>
            </div>
            {{-- @if ($schedule->class == 'Crew Change')
               <div class="row">
                  <div class="col-md-6">
                     <div class="card card-info">
                        <div class="card-body">
                           {{$totalDeparture}}
                           <br>
                           Depart
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="card card-success">
                        <div class="card-body">
                           {{$totalReturn}} <br>
                           Return
                        </div>
                     </div>
                  </div>
               </div>
                     
            @endif --}}
            {{-- <div class="card border">
               <div class="card-body">
                  <small class="text-primary"><b>{{formatDateTime($report->created_at)}}</b></small><br>
                  <small>{{$report->status->name}} at {{$report->port->name}}</small><br>
                  <a href=""><small>See all..</small></a>
               </div>
            </div>
            <x-schedule-stisla.timeline :reports="$reports" /> --}}
         </div>
         <div class="col-md-9">
            
            <x-schedule.logistic-bcm-edit :requests="$requests" :schedule="$schedule" :cargos="$cargos" :items="$items" :cargo="$cargo" />
           
         </div>
      </div>
   </div>
</section>
   
   <div class="modal fade" id="schedule-vessel-complete" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
         <form action="{{route('schedule.vessel.complete')}}" method="POST" enctype="multipart/form-data">
         @csrf
         @method('PUT')
         <input type="number" name="schedule" id="schedule" value="{{$schedule->id}}" hidden>
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Complete Schedule</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="form-row">
                  <div class="form-group col-md-12">
                     <label for="desc">Document</label>
                     <input type="file" class="form-control" id="doc" name="doc" >
                  </div>
                  
               </div>
            </div>
            <div class="modal-footer bg-whitesmoke">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-info">Complete</button>
            </div>
         </div>
         </form>
      </div>
      {{-- <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Confirm Complete</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               Complete this Sailing Order? 
            </div>
            <div class="modal-footer bg-whitesmoke">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <a href="{{route('schedule.vessel.complete', enkripRambo($schedule->id))}}" class="btn btn-success">Complete</a>
            </div>
         </div>
      </div> --}}
   </div>

  {{-- Modal Send Schedule --}}
   @if ($schedule->vessel)
   <div class="modal fade" id="schedule-send" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Confirm</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               Send schedule to <br>
                {{$schedule->vessel->name}}?
            </div>
            <div class="modal-footer bg-whitesmoke">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <a href="{{route('schedule.send', enkripRambo($schedule->id))}}" class="btn btn-info">Send</a>
            </div>
         </div>
      </div>
   </div>
   @endif

   {{-- Modal Accept Schedule --}}
   <div class="modal fade" id="schedule-accept" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Confirm Accept</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               Accept this Sailing Order?
            </div>
            <div class="modal-footer bg-whitesmoke">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <a href="{{route('schedule.accept', enkripRambo($schedule->id))}}" class="btn btn-info">Accept</a>
            </div>
         </div>
      </div>
   </div>

   {{-- Modal Revision Schedule --}}
   <div class="modal fade" id="schedule-revision" tabindex="1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <form action="{{route('schedule.revision')}}" method="POST">
         @csrf
         @method('PUT')
         <input type="number" name="schedule" id="schedule" value="{{$schedule->id}}" hidden>
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Form Revision Schedule</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="form-row">
                  <div class="form-group col-md-12">
                     <label for="desc">Description</label>
                     <input type="text" class="form-control" id="desc" name="desc" >
                  </div>
                  
               </div>
            </div>
            <div class="modal-footer bg-whitesmoke">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-info">Revision</button>
            </div>
         </div>
         </form>
      </div>
   </div>

  

  

  

  
  
    
@endsection

@push('report')
   <script>

      $(document).ready(function() {
         // console.log('report function');
         // $('#foto').hide();
         $('.eta').hide();
         $('.anchor').hide();

         $('.status').change(function() {
            // console.log('okeee');
            var status = $(this).val();
            if (status == 9) {
            //   $('#foto').show();
              $('.eta').hide();
              $('.anchor').hide();
            } else if(status == 3) {
            //   $('#foto').show();
              $('.eta').hide();
              $('.anchor').hide();
            } else if(status == 6) {
            //   $('#foto').hide();
              $('.anchor').hide();
              $('.eta').show();
            } else if (status > 27 && status < 32) {
            //   $('#foto').hide();
              $('.anchor').show();
              $('.eta').hide();
            } else {
            //   $('#foto').hide();
              $('.eta').hide();
              $('.anchor').hide();
            }
         })

         
      })
   </script>
@endpush

@if ($schedule->vessel)
    

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
    center: [{!! $schedule->vessel->longitude !!}, {!! $schedule->vessel->latitude !!}], // starting position [lng, lat]
    zoom: 7.4 // starting zoom
    });
    
    const marker1 = new mapboxgl.Marker()
    .setLngLat([{!! $schedule->vessel->longitude !!}, {!! $schedule->vessel->latitude !!}])
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
@endif


