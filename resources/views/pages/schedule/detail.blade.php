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

                  @if (auth()->user()->hasRole('marine'))
                     <x-schedule.action-marine :schedule="$schedule" />
                  @endif

                  @if (auth()->user()->hasRole('vessel'))
                     <x-schedule.action-vessel :schedule="$schedule" />
                  @endif
                  
                  <div class="dropdown">
                     <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                     Option
                     </button>
                     <div class="dropdown-menu dropdown-menu-end">
                        @if (auth()->user()->hasRole('marine') && $schedule->status == 0)
                        <a class="dropdown-item" href="{{route('schedule.edit', enkripRambo($schedule->id))}}">
                           Edit
                        </a>
                        <a class="dropdown-item" href="#">
                           Delete
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
            <div class="col-md-7">
               <div class="card">
                  <div class="card-header">
{{--                     
                     <div class="text-muted">Date : {{\Carbon\Carbon::parse($schedule->date)->format('d/m/Y')}}
                     <br>
                     Loc : {{$schedule->origin->name}} to {{$schedule->destination->name}}</div> --}}
                     
                     {{$schedule->origin->name}} - {{$schedule->destination->name}}<br>
                     {{\Carbon\Carbon::parse($schedule->date)->format('d/m/Y')}}
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
                     {{-- <small>Timeline</small> --}}
                  </div>
                  <div class="card-body">
                     @if ($report)
                        <x-schedule.report :report="$report" />
                        @else
                        <small>Report empty</small>
                     @endif
                     
                  </div>
               </div>
            </div>
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
                           <dt class="col-2"><x-status.request :request="$request" /></dt>
                        </dl>
                     </div>
                  </div>
               </div>
            </div>
         @endforeach
         
      </div>
   </div>

   {{-- <x-modal.schedule.select-vessel :vessels="$vessels" :schedule="$schedule" /> --}}
   <x-modal.schedule.send :schedule="$schedule" />
   <x-modal.schedule.standby :schedule="$schedule" />
   <x-modal.schedule.loading :schedule="$schedule" />
   <x-modal.schedule.loading-complete :schedule="$schedule" />
   <x-modal.schedule.castoff :schedule="$schedule" />
   <x-modal.schedule.fullaway :schedule="$schedule" />
   <x-modal.schedule.arrive :schedule="$schedule" />
   <x-modal.schedule.standby-dest :schedule="$schedule" />
   <x-modal.schedule.unloading :schedule="$schedule" />
   <x-modal.schedule.unloading-complete :schedule="$schedule" />
   <x-modal.schedule.complete :schedule="$schedule" />

   <x-modal.schedule.departure :schedule="$schedule" />
   <x-modal.schedule.arrived :schedule="$schedule"/>

@endsection