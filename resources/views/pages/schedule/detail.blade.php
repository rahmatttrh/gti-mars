@extends('layouts.app')
@section('title')
    Schedule Detail
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
                  Vessel Schedule Detail
               </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
            <div class="btn-list">
               {{-- <span class="d-none d-sm-inline">
                  <a href="#" class="btn btn-white">
                  New view
                  </a>
               </span> --}}
               @if (auth()->user()->hasRole('marine') && $schedule->status == 1)
                  <div class="dropdown">
                     <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                     Option
                     </button>
                     <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="{{route('schedule.edit', enkripRambo($schedule->id))}}">
                           Edit
                        </a>
                        <a class="dropdown-item" href="#">
                           Delete
                        </a>
                        
                     </div>
                  </div>
               @endif

               @if (auth()->user()->hasRole('vessel'))
                  @if ($schedule->status == 1 )
                     <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-departure">
                        <!-- Download SVG icon from http://tabler-icons.io/i/crane -->
	                     <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 21h6" /><path d="M9 21v-18l-6 6h18" /><path d="M9 3l10 6" /><path d="M17 9v4a2 2 0 1 1 -2 2" /></svg>
                        Loading
                     </button>
                     @elseif($schedule->status == 2)
                     <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-castoff">Cast Off</button>
                     @elseif($schedule->status == 3)
                     <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-fullaway">Full Away</button>
                  @endif
               @endif
               
               <div class="dropdown">
                  <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                  Actions
                  </button>
                  <div class="dropdown-menu dropdown-menu-end">
                    
                     
                     

                     @if ($schedule->status == 3 && auth()->user()->hasRole('vessel'))
                        <a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#modal-arrived">
                           Arrived
                        </a>
                     @endif
                     
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item" href="#">
                        Timeline
                     </a>
                     <a class="dropdown-item" href="#">
                        Print Preview
                     </a>
                  </div>
               </div>
            </div>
            </div>
         </div>
      </div>
   </div>
   <div class="page-body" >
      <div class="container-xl">
         <div class="row row-deck">
            <div class="col-md-8">
               <div class="card">
                  <div class="card-body">
                     <div class="text-muted">Date : {{\Carbon\Carbon::parse($schedule->date)->format('d/m/Y')}}</div>
                     <div class="text-muted">
                        Loc : {{$schedule->origin->name}} to {{$schedule->destination->name}}
                     </div>
                     <h2>
                        {{$schedule->vessel->name ?? 'Vessel Not Avalaible'}}
                     </h2>
                  </div>
                  <div class="card-footer">
                     
                     <div class="text-muted">ETD : {{$schedule->departure_estimasi}}</div>
                     <div class="text-muted">ETA : {{$schedule->arrive_estimasi}}</div>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="card">
                  <div class="card-header">
                     <x-status.schedule :schedule="$schedule" />
                  </div>
                  <div class="card-body">
                     
                  </div>
               </div>
            </div>
            {{-- <div class="col-md-2">
               @if ($schedule->status == 1)
               <a href="#" data-bs-toggle="modal" data-bs-target="#modal-select-vessel-{{$schedule->id}}" class="btn btn-primary mb-3 btn-block" style="width: 100%">Assign Boat</a>
               
               @else
               <a href="#" class="btn btn-light border mb-3 btn-block" style="width: 100%"><small>Boat assigned</small></a>
               @endif
               
              
            </div> --}}
         </div>

         <hr>
         {{-- <h5>Activity</h5> --}}
         
         @foreach ($requests as $request)
            <div class="accordion mb-2 bg-white" id="accordion-example_{{$request->id}} ">
               <div class="accordion-item">
                  <h2 class="accordion-header" id="heading-{{$request->id}}">
                     <button class="accordion-button " type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse-{{$request->id}}" aria-expanded="true">
                        {{$request->code}}
                     </button>
                  </h2>
                  <div id="collapse-{{$request->id}}" class="accordion-collapse collapse show"
                     data-bs-parent="#accordion-example_{{$request->id}}">
                     <div class="accordion-body pt-0">
                        <hr>
                        <dl class="row">
                           {{-- <dt class="col-2">Date</dt>
                           <dd class="col-10">: {{\Carbon\Carbon::parse($request->date)->format('d/m/Y')}}</dd> --}}
                           <dt class="col-2">Department</dt>
                           <dd class="col-10">: {{$request->department->name}}</dd>
                           <dt class="col-2">Activity</dt>
                           <dd class="col-10">: {{$request->activity->name}} - {{$request->description}}</dd>
                        
                        </dl>
                     </div>
                  </div>
               </div>
            </div>
         @endforeach


         
         
      </div>
   </div>

   {{-- <x-modal.schedule.select-vessel :vessels="$vessels" :schedule="$schedule" /> --}}
   <x-modal.schedule.departure :schedule="$schedule" />
   <x-modal.schedule.arrived :schedule="$schedule"/>

@endsection