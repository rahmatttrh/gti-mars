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
               Dashboard Map
            </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
               <div class="btn-list">
                  <div class="dropdown">
                     <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                     Month
                     </button>
                        <div class="dropdown-menu dropdown-menu-end">
                           <a class="dropdown-item" href="{{route('dashboard.chart', 1)}}">
                              Januari
                           </a>
                           <a class="dropdown-item" href="{{route('dashboard.chart', 2)}}">
                              Februari
                           </a>
                           <a class="dropdown-item" href="{{route('dashboard.chart', 3)}}">
                              Maret
                           </a>
                           <a class="dropdown-item" href="{{route('dashboard.chart', 4)}}">
                              April
                           </a>
                           <a class="dropdown-item" href="{{route('dashboard.chart', 5)}}">
                              Mei
                           </a>
                           <a class="dropdown-item" href="{{route('dashboard.chart', 6)}}">
                              Juni
                           </a>
                           <a class="dropdown-item" href="{{route('dashboard.chart', 7)}}">
                              Juli
                           </a>
                           <a class="dropdown-item" href="{{route('dashboard.chart', 8)}}">
                              Agustus
                           </a>
                           <a class="dropdown-item" href="{{route('dashboard.chart', 9)}}">
                              September
                           </a>
                           <a class="dropdown-item" href="{{route('dashboard.chart', 10)}}">
                              Oktober
                           </a>
                           <a class="dropdown-item" href="{{route('dashboard.chart', 11)}}">
                              November
                           </a>
                           <a class="dropdown-item" href="{{route('dashboard.chart', 12)}}">
                              Desember
                           </a>
                        </div>
                  </div>
                  <div class="dropdown">
                     <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                     Option
                     </button>
                     <div class="dropdown-menu dropdown-menu-end">
                        {{-- @if (auth()->user()->hasRole('logistic'))
                        <a class="dropdown-item" href="{{route('request.create')}}">
                           Create
                        </a>
                        @endif --}}
                        {{-- <a class="dropdown-item"  href="{{route('test.email')}}">
                           Tes Email
                        </a> --}}
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item"  href="/">
                           Chart
                        </a>
                        <a class="dropdown-item" href="{{route('dashboard.table')}}">
                           Table
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
         {{-- @foreach ($schedules as $schedule)
             @if ($schedule->requests->where('status', 1)->count() > 0)
             <div class="alert alert-primary" role="alert">
               You have Request Activity on Schedule {{$schedule->vessel->name ?? 'Vessel : Not Available'}} . Click <a href="{{route('schedule.detail', enkripRambo($schedule->id))}}" class="alert-link">here</a> to check.
             </div>
             @endif
         @endforeach --}}
         {{-- @if ($requestRecents->count() > 0)
            @foreach ($requestRecents as $rr)
            <div class="alert alert-primary" role="alert">
               You have Request Activity. Click <a href="{{route('schedule.detail', enkripRambo($requestRecents->first()->schedule_id))}}" class="alert-link">here</a> to check.
             </div>
            @endforeach
         @endif --}}

         {{-- @if ($requestAdditionals->count() > 0)
            @foreach ($requestAdditionals as $request)
               <div class="alert alert-primary" role="alert">
                  You have a Additional Request at Schedule of {{$request->schedule->vessel->name}}. Click <a href="{{route('schedule.detail', enkripRambo($request->schedule_id))}}" class="alert-link">here</a> to see detail.
               </div>
            @endforeach
         @endif --}}
         
         <div class="card">
            <div class="card-body" id='map' style="width: 100%; height: 67vh">
               {{-- <div   style="width: 100%; height: 60vh"></div> --}}
            </div>
         </div>

         <div class="row">
            <div class="col-md-8">
               <div class="card mt-3 table-responsive">
                  <table class="table table-vcenter">
                     <thead>
                        <tr>
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
            <div class="col-md-4 mt-3">
               <div class="card mb-3" >
                  <div class="card-header">
                     <div class="badge bg-primary">
                        Vessel Update
                     </div>
                  </div>
                  <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                     <div class="divide-y">
                        <small>Empty</small>
                        {{-- @foreach ($reports as $report)
                           <div>
                              <div class="row">
                                 <div class="col">
                                    <div class="">
                                       <a href="{{route('schedule.detail', enkripRambo($report->schedule_id))}}">{{$report->vessel->name}} </a> 
                                       {{$report->status->name}} {{$report->port->name ?? ''}}
                                    </div>
                                    <div class="text-muted"><small>{{$report->updated_at->format('d-m-y H:i ')}}</small></div>
                                 </div>
                              </div>
                           </div>
                        @endforeach --}}
                     </div>
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
   center: [106.164483,-5.545883], // starting position [lng, lat]
   zoom: 8 // starting zoom
   });
</script>

@endpush



      


    