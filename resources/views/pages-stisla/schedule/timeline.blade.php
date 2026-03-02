@extends('layouts.stisla.app')
@section('title')
    Timeline Sailing Order
@endsection
@section('content')
   <style>
      body {
            background-color: #f9f9fa
         }

         @media (min-width:992px) {
            .page-container {
               max-width: 1140px;
               margin: 0 auto
            }

            .page-sidenav {
               display: block !important
            }
         }

         .padding {
            padding: 2rem
         }

         .w-32 {
            width: 32px !important;
            height: 32px !important;
            font-size: .85em
         }

         .tl-item .avatar {
            z-index: 2
         }

         .circle {
            border-radius: 500px
         }

         .gd-warning {
            color: #fff;
            border: none;
            background: #f4c414 linear-gradient(45deg, #f4c414, #f45414)
         }

         .timeline {
            position: relative;
            border-color: rgba(160, 175, 185, .15);
            padding: 0;
            margin: 0
         }

         .p-4 {
            padding: 1.5rem !important
         }

         .block,
         .card {
            background: #fff;
            border-width: 0;
            border-radius: .25rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, .05);
            margin-bottom: 1.5rem
         }

         .mb-4,
         .my-4 {
            margin-bottom: 1.5rem !important
         }

         .tl-item {
            border-radius: 3px;
            position: relative;
            display: -ms-flexbox;
            display: flex
         }

         .tl-item>* {
            padding: 10px
         }

         .tl-item .avatar {
            z-index: 2
         }

         .tl-item:last-child .tl-dot:after {
            display: none
         }

         .tl-item.active .tl-dot:before {
            border-color: #448bff;
            box-shadow: 0 0 0 4px rgba(68, 139, 255, .2)
         }

         .tl-item:last-child .tl-dot:after {
            display: none
         }

         .tl-item.active .tl-dot:before {
            border-color: #448bff;
            box-shadow: 0 0 0 4px rgba(68, 139, 255, .2)
         }

         .tl-dot {
            position: relative;
            border-color: rgba(160, 175, 185, .15)
         }

         .tl-dot:after,
         .tl-dot:before {
            content: '';
            position: absolute;
            border-color: inherit;
            border-width: 2px;
            border-style: solid;
            border-radius: 50%;
            width: 10px;
            height: 10px;
            top: 15px;
            left: 50%;
            transform: translateX(-50%)
         }

         .tl-dot:after {
            width: 0;
            height: auto;
            top: 25px;
            bottom: -15px;
            border-right-width: 0;
            border-top-width: 0;
            border-bottom-width: 0;
            border-radius: 0
         }

         tl-item.active .tl-dot:before {
            border-color: #448bff;
            box-shadow: 0 0 0 4px rgba(68, 139, 255, .2)
         }

         .tl-dot {
            position: relative;
            border-color: rgba(160, 175, 185, .15)
         }

         .tl-dot:after,
         .tl-dot:before {
            content: '';
            position: absolute;
            border-color: inherit;
            border-width: 2px;
            border-style: solid;
            border-radius: 50%;
            width: 10px;
            height: 10px;
            top: 15px;
            left: 50%;
            transform: translateX(-50%)
         }

         .tl-dot:after {
            width: 0;
            height: auto;
            top: 25px;
            bottom: -15px;
            border-right-width: 0;
            border-top-width: 0;
            border-bottom-width: 0;
            border-radius: 0
         }

         .tl-content p:last-child {
            margin-bottom: 0
         }

         .tl-date {
            font-size: .85em;
            margin-top: 2px;
            min-width: 100px;
            max-width: 100px
         }

         .avatar {
            position: relative;
            line-height: 1;
            border-radius: 500px;
            white-space: nowrap;
            font-weight: 700;
            border-radius: 100%;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-pack: center;
            justify-content: center;
            -ms-flex-align: center;
            align-items: center;
            -ms-flex-negative: 0;
            flex-shrink: 0;
            border-radius: 500px;
            box-shadow: 0 5px 10px 0 rgba(50, 50, 50, .15)
         }

         .b-warning {
            border-color: #f4c414!important;
         }

         .b-primary {
            border-color: #4e91fc!important;
         }

         .b-info {
            border-color: #4bc3fa!important;
         }

         .b-danger {
            border-color: #f54394!important;
         }
   </style>
   <section class="section">
      {{-- <div class="section-header">
         <h1 class="section-title">Timeline Sailing Order {{$schedule->code}}</h1>
         <div class="section-header-breadcrumb">
         @if (auth()->user()->hasRole('marine'))
            <div class="breadcrumb-item "><a href="{{route('dsp.marine')}}">Dashboard</a></div>
            @elseif(auth()->user()->hasRole('vessel'))
            <div class="breadcrumb-item "><a href="{{route('dsp.vessel')}}">Dashboard</a></div>
            @elseif(auth()->user()->hasRole('user'))
            <div class="breadcrumb-item "><a href="{{route('dsp.user')}}">Dashboard</a></div>
         @endif
         
         <div class="breadcrumb-item active"><a href="{{route('schedule.detail', enkripRambo($schedule->id))}}">Schedule</a></div>
         <div class="breadcrumb-item active">Timeline</div>
         </div>
      </div> --}}

      <div class="section-body">
         
         <div class="page-content page-container" id="page-content">
            <div class="row">
               <div class="col">
                  <h4>Timeline of {{$schedule->code}}</h4>
                  <hr>
                  {{formatDate($schedule->date)}} <br>
                  <span>{{$schedule->vessel->name}}</span> <br>
                  
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

                  <span class="badge badge-info mb-2">Boat Cargo Manifest</span> <br>

                  <table class="border">
                     <thead>
                        <tr class="border">
                           <th>No. BCM</th>
                           <th>Route</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($schedule->cargos as $cargo)
                           <tr class="border">
                              <td>{{$cargo->code}}</td>
                              <td>{{$cargo->origin->code}} - {{$cargo->destination->code}}</td>
                           </tr>
                        @endforeach
                     </tbody>
                  </table>
                  
                  {{-- <h2>{{$schedule->vessel->name}}</h2> --}}
               </div>
               <div class="col-lg-8">
                  <div class="timeline  ">
                     
                        @foreach ($reports as $report)
                           <div class="tl-item">
                              @if ($report->status_id == 10)
                              <div class="tl-dot b-warning"></div>
                              @elseif($report->status_id <= 2)
                              <div class="tl-dot b-info"></div>
                                  @else
                                  <div class="tl-dot b-primary"></div>
                              @endif
                              
                              <div class="tl-content">
                                 <div class="">
                                    @php
                                        
                                    
                                    if ($report->status_id == 6){
                                       $desc = 'ETA : ' . formatDateTime($report->eta) . ' at '.$report->destination->name;
                                    }
                                       else {
                                          $desc = $report->desc ;
                                       }
                                       @endphp
                                        
                                       @if ($report->status_id > 2)
                                          <a href="" class="" data-toggle="modal" data-target="#report-evidance-{{$report->id}}"> {{$report->status->name}}  {{$report->port_id == null ? '' :  'at ' .$report->port->code}} {{$report->anchor ?? ''}} [{{$desc}}]</a>
                                          @else
                                          <p class=" text-muted mb-0 mb-lg-0"> {{$report->status->name}}  {{$report->port_id == null ? '' :  'at ' .$report->port->code}} {{$report->anchor ?? ''}}</p>
                                       @endif
                                       @if ($report->status_id > 27 && $report->status_id < 32)
                                          <span class="btn btn-primary btn-sm shadow-none">Anchor {{$report->anchor}}</span>
                                       @endif
                                 </div>
                                 <div class="tl-date text-muted mt-1">{{  \Carbon\Carbon::parse($report->date)->format('d-m-y H:i ')}}</div>
                              </div>
                           </div>
                        @endforeach
                        
                       
                        {{-- <div class="tl-item">
                           <div class="tl-dot b-warning"></div>
                           <div class="tl-content">
                              <div class="">Learn how to use <a href="#" data-abc="true">Google Analytics</a> to discover vital information about your readers.</div>
                              <div class="tl-date text-muted mt-1">3 days ago</div>
                           </div>
                        </div> --}}
                  </div>
               </div>
               
               
            
            </div>
         </div>

      </div>
   </section>

   
  @if ($reports->count() > 0)
    @foreach ($reports as $report)
    <div class="modal fade" id="report-evidance-{{$report->id}}" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <span class="modal-title">Report Detail</span>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Photo</p>  
            {{-- <hr> --}}
               @if ($report->foto)
               <img src="{{asset('storage/' .$report->foto)}}" class="img-fluid" alt="Responsive image">
               @else
               <small class="text-muted">Empty</small>
               @endif
            
            <hr>
            <p>Document</p>
            {{-- <hr> --}}
            @if ($report->doc)
            <embed  style="width: 100%; height:500px;overflow:hidden" class="text-center" id="preview-pdf" src="{{asset('storage/' . $report->doc)}}" frameborder="0"></embed>
            @else
            <small class="text-muted">Empty</small>
            @endif
            
            {{-- <img width="100vh" src="" alt=""> --}}
            {{-- {{$report->foto}} --}}
          </div>
          <div class="modal-footer bg-whitesmoke">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            
          </div>
        </div>
      </div>
    </div>
    @endforeach
  @endif
    
@endsection

@push('report')
   <script>

      $(document).ready(function() {
         console.log('report function');
         $('#foto').hide();
         $('.eta').hide();
         $('.anchor').hide();

         $('.status').change(function() {
            console.log('okeee');
            var status = $(this).val();
            if (status == 10) {
              $('#foto').show();
              $('.eta').hide();
              $('.anchor').hide();
            } else if(status == 6) {
              $('#foto').hide();
              $('.anchor').hide();
              $('.eta').show();
            } else if (status > 24 && status <29) {
              $('#foto').hide();
              $('.anchor').show();
              $('.eta').hide();
            } else {
              $('#foto').hide();
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


