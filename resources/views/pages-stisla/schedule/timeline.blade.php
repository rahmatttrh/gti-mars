@extends('layouts.stisla.app')
@section('title')
    Timeline Sailing Order
@endsection
@section('content')
   <style>
      
.timeline-steps {
    display: flex;
    justify-content: center;
    flex-wrap: wrap
}

.timeline-steps .timeline-step {
    align-items: center;
    display: flex;
    flex-direction: column;
    position: relative;
    margin: 1rem
}

@media (min-width:768px) {
    .timeline-steps .timeline-step:not(:last-child):after {
        content: "";
        display: block;
        border-top: .25rem dotted #3b82f6;
        width: 3.46rem;
        position: absolute;
        left: 7.5rem;
        top: .3125rem
    }
    .timeline-steps .timeline-step:not(:first-child):before {
        content: "";
        display: block;
        border-top: .25rem dotted #3b82f6;
        width: 3.8125rem;
        position: absolute;
        right: 7.5rem;
        top: .3125rem
    }
}

.timeline-steps .timeline-content {
    width: 10rem;
    text-align: center
}

.timeline-steps .timeline-content .inner-circle {
    border-radius: 1.5rem;
    height: 1rem;
    width: 1rem;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background-color: #3b82f6
}

.timeline-steps .timeline-content .inner-circle:before {
    content: "";
    background-color: #3b82f6;
    display: inline-block;
    height: 3rem;
    width: 3rem;
    min-width: 3rem;
    border-radius: 6.25rem;
    opacity: .5
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
         {{-- <h2 class="section-title">Schedule Plan</h2>
         <p class="section-lead">
         We use 'DataTables' made by @SpryMedia. You can check the full documentation <a href="https://datatables.net/">here</a>.
         </p> --}}

         {{-- <div class="badge badge-info">
            Timeline Activity
         </div>
         <hr> --}}
         <div class="text-center">
            <h4 class="text-center">Timeline</h4>
            <a href="" class="btn btn-sm btn-light border">Export PDF</a>
         </div>
         
         <div class="row mt-4">
            <div class="col">
                <div class="timeline-steps aos-init aos-animate" data-aos="fade-up">
                    <div class="timeline-step">
                        <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2003">
                            <div class="inner-circle"></div>
                            <p class="h6 mt-3 mb-1">START</p>
                            <p class="h6 text-muted mb-0 mb-lg-0">Favland Founded</p>
                        </div>
                    </div>
                    <div class="timeline-step">
                        <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2004">
                            <div class="inner-circle"></div>
                            <p class="h6 mt-3 mb-1">2004</p>
                            <p class="h6 text-muted mb-0 mb-lg-0">Launched Trello</p>
                        </div>
                    </div>
                    <div class="timeline-step">
                        <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2005">
                            <div class="inner-circle"></div>
                            <p class="h6 mt-3 mb-1">2005</p>
                            <p class="h6 text-muted mb-0 mb-lg-0">Launched Messanger</p>
                        </div>
                    </div>
                    <div class="timeline-step">
                        <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2010">
                            <div class="inner-circle"></div>
                            <p class="h6 mt-3 mb-1">2010</p>
                            <p class="h6 text-muted mb-0 mb-lg-0">Open New Branch</p>
                        </div>
                    </div>
                    <div class="timeline-step mb-0">
                        <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2020">
                            <div class="inner-circle"></div>
                            <p class="h6 mt-3 mb-1">2020</p>
                            <p class="h6 text-muted mb-0 mb-lg-0">In Fortune 500</p>
                        </div>
                    </div>
                    <div class="timeline-step">
                     <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2005">
                         <div class="inner-circle"></div>
                         <p class="h6 mt-3 mb-1">2005</p>
                         <p class="h6 text-muted mb-0 mb-lg-0">Launched Messanger</p>
                     </div>
                 </div>
                 <div class="timeline-step">
                     <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2010">
                         <div class="inner-circle"></div>
                         <p class="h6 mt-3 mb-1">2010</p>
                         <p class="h6 text-muted mb-0 mb-lg-0">Open New Branch</p>
                     </div>
                 </div>
                 <div class="timeline-step mb-0">
                     <div class="timeline-content" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="And here's some amazing content. It's very engaging. Right?" data-original-title="2020">
                         <div class="inner-circle"></div>
                         <p class="h6 mt-3 mb-1">2020</p>
                         <p class="h6 text-muted mb-0 mb-lg-0">In Fortune 500</p>
                     </div>
                 </div>
                </div>
            </div>
        </div>
         <div class="row">
            <div class="col-md-6">
               <div class="card border shadow-sm">
                  <div class="card-header">
                  <h4>SCHEDULE TIMELINE {{$schedule->code}}</h4>
                  
                  </div>
                  <div class="card-body" id="top-5-scroll">
                     <div  class="activities " >
                        {{-- <div class="activities" style="height: 350px; overflow-y: scroll"> --}}
                        @if ($reports->count() > 0)
                           @foreach ($reports as $report)
                           <div class="activity">
                              <div class="activity-icon bg-info text-white shadow-primary">
                              <i class="fas fa-comment-alt"></i>
                              </div>
                              <div class="activity-detail">
                              <div class="mb-2">
                                 <span class="text-job text-primary">{{  \Carbon\Carbon::parse($report->created_at)->format('d-m-y H:i ')}}</span>
                                 <span class="bullet"></span>
                              
                              </div>
                              <p>{{$report->vessel->name}} {{$report->status->name}}  {{$report->port_id == null ? '' :  'at ' .$report->port->name}} {{$report->anchor ?? ''}}</p>
                              @if ($report->status_id == 9)
                                    <a href="" class="btn btn-sm btn-primary shadow-none" data-toggle="modal" data-target="#report-evidance-{{$report->id}}">Evidance</a>
                              @endif
                  
                              @if ($report->status_id == 6)
                                    <span class="btn btn-primary btn-sm shadow-none">ETA : {{formatDateTime($report->eta)}} at {{$report->destination->name}}</span>
                              @endif
                  
                              @if ($report->status_id > 27 && $report->status_id < 32)
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
                  </div>
                  <div class="card-footer pt-3 d-flex justify-content-center">
                  {{-- <div class="budget-price justify-content-center">
                     <div
                        class="budget-price-square bg-primary"
                        data-width="20"
                     ></div>
                     <div class="budget-price-label">Selling Price</div>
                  </div>
                  <div class="budget-price justify-content-center">
                     <div
                        class="budget-price-square bg-danger"
                        data-width="20"
                     ></div>
                     <div class="budget-price-label">Budget Price</div>
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
            <span class="modal-title">Evidance Anchored at Secure Area</span>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <img src="{{asset('storage/' .$report->foto)}}" class="img-fluid" alt="Responsive image">
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


