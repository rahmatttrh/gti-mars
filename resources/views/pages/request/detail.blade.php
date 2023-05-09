@extends('layouts.app')
@section('title')
   Request Detail
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
                Request Detail
               </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
               <div class="btn-list">
                  @if (auth()->user()->hasRole('marine'))
                     @if ($request->status == 01)
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-select-vessel-{{$request->id}}">
                           <!-- Download SVG icon from http://tabler-icons.io/i/ship -->
                           <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M2 20a2.4 2.4 0 0 0 2 1a2.4 2.4 0 0 0 2 -1a2.4 2.4 0 0 1 2 -1a2.4 2.4 0 0 1 2 1a2.4 2.4 0 0 0 2 1a2.4 2.4 0 0 0 2 -1a2.4 2.4 0 0 1 2 -1a2.4 2.4 0 0 1 2 1a2.4 2.4 0 0 0 2 1a2.4 2.4 0 0 0 2 -1" /><path d="M4 18l-1 -5h18l-2 4" /><path d="M5 13v-6h8l4 6" /><path d="M7 7v-4h-1" /></svg>
                           Set Schedule
                        </button>
                        @elseif($request->status == 202)
                        <button class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#modal-cancel-request">
                           Approve Cancel Request
                        </button>
                     @endif
                  @endif

                  @if (auth()->user()->hasRole('department'))
                     @if ($request->status == 00)
                     <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#releaseCargoPlan">
                        <!-- Download SVG icon from http://tabler-icons.io/i/send -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="10" y1="14" x2="21" y2="3" /><path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5" /></svg>
                        Release
                     </button>
                        @if ($request->type == 1)
                           <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCargoItem">
                              <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                              Add Cargo
                           </button>
                        @elseif($request->status == 2)
                           <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPassengerItem">
                              <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                              Add Passenger
                           </button>
                        @endif
                     @endif
                  @endif

                  {{-- @if (auth()->user()->hasRole('logistic'))
                     @if ($request->status == 00)
                        
                        
                     @endif
                  @endif

                  @if (auth()->user()->hasRole('drilling'))
                     @if ($request->status == 00)
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#releaseCargoPlan">
                           <!-- Download SVG icon from http://tabler-icons.io/i/send -->
                           <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="10" y1="14" x2="21" y2="3" /><path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5" /></svg>
                           Release
                        </button>
                        
                     @endif
                  @endif --}}
                  
                  
                  <div class="dropdown">
                     <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                     Option
                     </button>
                     <div class="dropdown-menu dropdown-menu-end">
                       
                        @if (auth()->user()->hasRole('logistic') || auth()->user()->hasRole('drilling') || auth()->user()->hasRole('department'))
                           @if ( $request->status == 202)
                           @else
                           <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#undoRequest">
                              Cancel
                           </a>
                           @endif
                           @if ($request->status == 00)
                              
                              <a class="dropdown-item" href="{{route('request.edit', enkripRambo($request->id))}}"> Edit</a>
                              <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#deleteRequest">
                                 Delete
                              </a>
                           @endif
                        @endif
                        
                        <div class="dropdown-divider"></div>
{{--                        
                        @if ($request->schedule_id)
                           <a class="dropdown-item" href="{{route('schedule.timeline', enkripRambo($request->schedule->id))}}">
                              Timeline 
                           </a>
                        @endif --}}
                        
                        <a class="dropdown-item" target="_blank" href="{{route('invoice.request', enkripRambo($request->id))}}">
                           Preview Invoice
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
         <div class="row">
            <div class="col-md-8">
               <div class="card mb-3">
                  <div class="card-body">
                     <h1>{{$request->code}}</h1>
                     
                     <small> {{$request->department->name}} Department</small>
                     <h4 class="card-title m-0 ">
                        {{$request->activity->name ?? ''}}  {{$request->description}}
                     </h4>
                     <small>
                        {{\Carbon\Carbon::parse($request->date)->format('d/m/Y')}}
                     , {{$request->origin->name}} to {{$request->destination->name}}
                     </small>
                     
                     <div class="mb-3"></div>
                     {{-- @if ($request->status == 0)
                        <div class="badge">STATUS : 00</div>
                        @elseif($request->status == 1)
                        <div class="badge">STATUS : 01</div>
                     @endif --}}
                     <x-status.request  :request="$request" />
                    
                     <small></small>
                  </div>
                  <div class="card-footer">
                     <small >Requested by {{$request->employee->name}} / {{$request->employee->ekstensi}}</small><br>
                     <small >Requested at {{\Carbon\Carbon::parse($request->created_at)->format('d/m/Y - H:i')}}</small>
                  </div>
               </div>
               <x-requests.cargo :request="$request" :cargos="$cargoItems" :passengers="$passengerItems" :i="$i" />
            </div>
            <div class="col-md-4">
               {{-- @if (auth()->user()->hasRole('marine')) --}}
                  @if ($request->status >= 2)
                  <x-requests.schedule :schedule="$request->schedule" :histories="$requestHistories" />
                  {{-- @elseif ($request->status >= 3)
                  <x-requests.schedule :schedule="$request->schedule" :histories="$requestHistories" /> --}}
                  @endif
               {{-- @endif --}}

               
               @if ($request->status == 202)
                  <div class="card  mb-3">
                     <div class="card-header ">
                        Cancel Request Activity
                     </div>
                     <div class="card-body">
                        <small>{{$request->reason}}</small>
                     </div>
                  </div>
               @endif

               @if (!$request->schedule)
               <div class="card mb-3">
                  <div class="card-header">
                     Schedule
                  </div>
                  <div class="card-body text-center">
                     <small>Empty</small>
                  </div>
               </div>
               @endif

               @if ($request->schedule)
                  @if ($request->schedule->report)
                  <x-requests.timeline :report="$request->schedule->report" />
                  @endif
               @endif
               
            </div>
         </div>
         
         
         
      </div>
   </div>

   <x-modal.cargo.add :request="$request" />
   <x-modal.passenger.add :request="$request" />
   <x-modal.request.undo :request="$request" />
   <x-modal.request.undo-approve :request="$request" />
   <x-modal.request.delete :request="$request" />
   
   <div class="modal modal-blur fade" id="releaseCargoPlan" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="modal-title">Are you sure?</div>
            <div>This Request Activity will send to Marine</b>.</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
            <a href="{{route('request.release', enkripRambo($request->id))}}" class="btn btn-primary" >Yes, release</a>
            {{-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Yes, delete all my data</button> --}}
          </div>
        </div>
      </div>
   </div>
   <div class="modal modal-blur fade" id="arriveCargoPlan" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="modal-title">Are you sure?</div>
            <div>Make sure the ID Cargo match</b>.</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
            <a href="#" class="btn btn-primary" >Yes, Arrive</a>
            {{-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Yes, delete all my data</button> --}}
          </div>
        </div>
      </div>
   </div>

   <div class="modal modal-blur fade" id="approveCargoPlan" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="modal-title">Are you sure?</div>
            <div>Convert to Manifest</b>.</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
            <a href="#" class="btn btn-primary" >Yes, Approve</a>
            {{-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Yes, delete all my data</button> --}}
          </div>
        </div>
      </div>
   </div>

   <x-modal.activity.select-vessel :schedules="$schedules" :request="$request" />

@endsection