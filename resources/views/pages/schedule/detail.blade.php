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
               @if (auth()->user()->hasRole('marine') && $schedule->status == 0)
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
                  @if ($schedule->status == 0 )
                     <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-loading">
                        
                        Loading
                     </button>
                     @elseif($schedule->status == 1)
                     <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-loading-complete">
                        
                        Complete Loading
                     </button>
                     @elseif($schedule->status == 2)
                     <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-castoff">
                        
                        Cast Off
                     </button>
                     @elseif($schedule->status == 3)
                     <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-fullaway">Full Away</button>
                     @elseif($schedule->status == 4)
                     <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-arrive">Arrive</button>
                     @elseif($schedule->status == 5)
                     <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-unloading">Unloading</button>
                     @elseif($schedule->status == 6)
                     <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-unloading-complete">Complete Unloading</button>
                     @elseif($schedule->status == 7)
                     <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-complete">Complete</button>
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
                     {{-- <a href="" data-bs-toggle="modal" data-bs-target="#modal-arrived"></a> --}}
                     
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
            <div class="col-md-7">
               <div class="card">
                  <div class="card-header">
                    
                     <div class="text-muted">Date : {{\Carbon\Carbon::parse($schedule->date)->format('d/m/Y')}}
                     <br>
                     Loc : {{$schedule->origin->name}} to {{$schedule->destination->name}}</div>
                  </div>
                  <div class="card-body">
                     
                     <h1>
                        {{$schedule->vessel->name ?? 'Vessel Not Avalaible'}}
                     </h1>
                     <x-status.schedule :schedule="$schedule" />
                  </div>
                  <div class="card-footer">
                     
                     <div class="text-muted">ETD : {{\Carbon\Carbon::parse($schedule->etd)->format('d/m/Y - H:i')}}</div>
                     <div class="text-muted">ETA : {{\Carbon\Carbon::parse($schedule->eta)->format('d/m/Y - H:i')}}</div>
                     <div class="text-muted"># {{$schedule->remark}}</div>
                  </div>
               </div>
            </div>
            <div class="col-md-5">
               <div class="card">
                  <div class="card-header">
                     <small>Timeline</small>
                  </div>
                  <div class="card-body">
                     @if ($report)
                        <dl class="row">
                           <dt class="col-4">Loading Start</dt>
                           <dd class="col-8">: {{ $report->loading_start ? \Carbon\Carbon::parse($report->loading_start)->format('d/m/Y - H:i') : '-'}}</dd>
                           <dt class="col-4">Loading End</dt>
                           <dd class="col-8">: {{ $report->loading_end ? \Carbon\Carbon::parse($report->loading_end)->format('d/m/Y - H:i') : '-'}}</dd>
                           <dt class="col-4">Cast Off</dt>
                           <dd class="col-8">: {{ $report->castoff ? \Carbon\Carbon::parse($report->castoff)->format('d/m/Y - H:i, ') : '-'}}</dd>
                           <dt class="col-4">Full Away</dt>
                           <dd class="col-8">: {{ $report->fullaway ? \Carbon\Carbon::parse($report->fullaway)->format('d/m/Y - H:i, ') : '-'}}</dd>
                           <dt class="col-4">Arrive</dt>
                           <dd class="col-8">: {{ $report->arrive ? \Carbon\Carbon::parse($report->arrive)->format('d/m/Y - H:i, ') : '-'}}</dd>
                           <dt class="col-4">Unloading Start</dt>
                           <dd class="col-8">: {{ $report->unloading ? \Carbon\Carbon::parse($report->unloading_start)->format('d/m/Y - H:i, ') : '-'}}</dd>
                           <dt class="col-4">Unloading End</dt>
                           <dd class="col-8">: {{ $report->unloading ? \Carbon\Carbon::parse($report->unloading_end)->format('d/m/Y - H:i, ') : '-'}}</dd>
                           <dt class="col-4">Complete</dt>
                           <dd class="col-8">: {{ $report->complete ? \Carbon\Carbon::parse($report->complete)->format('d/m/Y - H:i, ') : '-'}}</dd>
                        </dl>
                        @else
                        <small>Report empty</small>
                     @endif
                     
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
                           <dd class="col-10">: {{$request->activity->name ?? ''}} - {{$request->description}}</dd>
                           <dt class="col-2">Request by</dt>
                           <dd class="col-10">: {{$request->employee->name ?? ''}}</dd>
                           <dt class="col-2">Status</dt>
                           <dd class="col-10">: <x-status.request :request="$request" /></dd>
                        </dl>
                     </div>
                  </div>
               </div>
            </div>
         @endforeach
         
      </div>
   </div>

   {{-- <x-modal.schedule.select-vessel :vessels="$vessels" :schedule="$schedule" /> --}}
   <x-modal.schedule.loading :schedule="$schedule" />
   <x-modal.schedule.loading-complete :schedule="$schedule" />
   <x-modal.schedule.castoff :schedule="$schedule" />
   <x-modal.schedule.fullaway :schedule="$schedule" />
   <x-modal.schedule.arrive :schedule="$schedule" />
   <x-modal.schedule.unloading :schedule="$schedule" />
   <x-modal.schedule.unloading-complete :schedule="$schedule" />
   <x-modal.schedule.complete :schedule="$schedule" />

   <x-modal.schedule.departure :schedule="$schedule" />
   <x-modal.schedule.arrived :schedule="$schedule"/>

@endsection