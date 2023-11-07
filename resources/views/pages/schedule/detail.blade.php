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
                  SAILING ORDER
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

                  @if (auth()->user()->hasRole('department'))
                     <x-schedule.action-department :schedule="$schedule" />
                  @endif
                  
                  <div class="dropdown">
                     <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                     Option
                     </button>
                     <div class="dropdown-menu dropdown-menu-end">
                        @if (auth()->user()->hasRole('marine'))
                           @if ($schedule->status == 0 || $schedule->status == 1)
                           <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-postpone-schedule">
                              Postpone
                           </a>
                           @endif
                           
                        @endif
                        @if (auth()->user()->hasRole('marine') && $schedule->status == 0)
                           {{-- <a class="dropdown-item" href="{{route('schedule.edit', enkripRambo($schedule->id))}}">
                              Edit
                           </a> --}}
                           <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#schedule-edit">
                              Edit
                           </a>
                           
                           <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-delete-schedule">
                              Delete
                           </a>
                        @endif
                        
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('document.manifest', enkripRambo($schedule->id))}}">
                           Preview Manifest
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
         <x-notification.deviation :deviations="$deviations" :schedule="$schedule" />
         <div class="row ">
            <div class="col-md-8">
               <div class="card mb-3">
                  <div class="card-header bg-light">
                     <x-status.schedule :schedule="$schedule" :lastreport="$lastreport" />
                  </div>
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-8">
                           <small>{{$schedule->vessel->type ?? ''}}</small>
                           <h1 class="d-flex align-items-center">
                              {{$schedule->vessel->name ?? 'Vessel Not Avalaible'}} 
                              @if ($schedule->type == 1)
                              &nbsp;<div class="badge">R</div>
                                 @endif
                           </h1>
                           <h1> {{\Carbon\Carbon::parse($schedule->date)->format('d/m/y')}}</h1>
                           {{-- <small>Pick up point from {{$schedule->origin->name}} </small> --}}
                           {{-- <span class="badge bg-info">s</span> --}}
                           <div>
                              <span class="text-primary h3"></span>
                              @foreach ($fixRoutes as  $route)
                                 
                                 <a href="#" class="h3" data-bs-toggle="modal" data-bs-target="#reorder-route-{{$route->id}}">
                                    @if ($route->rank > 1)
                                        -
                                    @endif 
                                    {{$route->port->name}}
                                 </a>
                                 

                                 <x-modal.schedule.reorder-route :schedule="$schedule" :route="$route" :fixroutes="$fixRoutes" />
                              @endforeach
                           </div>
                           

                           {{-- @if (auth()->user()->hasRole('marine') )
                              <small><a href="#" data-bs-toggle="modal" data-bs-target="#reset-route">Reset route</a></small>
                           @endif --}}
                          
                           
                           <div class="text-muted mt-1"> 
                              @if ($lastPostpone)
                                 {{\Carbon\Carbon::parse($lastPostpone->from)->format('d/m/y')}} Postpone to
                              @endif
                              {{\Carbon\Carbon::parse($schedule->date)->format('d/m/y')}} {{\Carbon\Carbon::parse($schedule->etd)->format('H:i')}}
                              @if ($lastPostpone)
                                 <br><small>{{$lastPostpone->reason}}</small>
                              @endif
                           </div>
                           <div class="text-muted mt-2">Remark : {{$schedule->remark}}</div>   
                           
                           {{-- <div class="text-muted mb-2 mt-2">ETD {{\Carbon\Carbon::parse($schedule->etd)->format('H:i')}}</div> --}}
                        </div>
                        <div class="col-md-4">
                           <div class="card bg-info text-white ">
                              <div class="card-body">
                                 <div class="row mb-3 align-items-center">
                                    <div class="col">
                                       <div class="text-muted text-white">
                                          <small> Deadweight {{$schedule->total_weight}} / {{$schedule->vessel->deadweight ?? '0'}} ton</small>
                                       </div>
                                       <div class="mt-2">
                                          <div class="row g-2 align-items-center">
                                             <div class="col-auto">
                                                {{$persenWeight}}%
                                             </div>
                                             <div class="col">
                                                <div class="progress progress-sm">
                                                <div class="progress-bar" style="width: {{$persenWeight}}%" role="progressbar" aria-valuenow="{{$persenWeight}}" aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row mb-3 align-items-center">
                                    <div class="col">
                                      <div class="text-muted text-white">
                                         <small>  Deckspace {{$schedule->total_size}} / {{$schedule->vessel->deckspace ?? '0'}} (m<sup>2</sup>)</small>
                                      </div>
                                      <div class="mt-2">
                                        <div class="row g-2 align-items-center">
                                          <div class="col-auto">
                                            {{$persenSize}}%
                                          </div>
                                          <div class="col">
                                            <div class="progress progress-sm">
                                              <div class="progress-bar" style="width: {{$persenSize}}%" role="progressbar" aria-valuenow="{{$persenSize}}" aria-valuemin="0" aria-valuemax="100">
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                 </div>
                                 {{-- <small>Hint : this data refers to the selected vessel data</small> --}}
                              </div>
                           </div>
                        </div>
                     </div>
                     
                  </div>
                  <div class="card-footer">
                     @if (auth()->user()->hasRole('marine'))
                        <small><a href="#" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#add-route">Add Route</a></small>
                        <small><a href="#" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#reset-route">Reset Route</a></small>
                     @endif
                  </div>
               </div>
               
               {{-- <hr> --}}
               {{-- <small class="badge badge-primary mb-2 mt-3">Activity</small><br> --}}
               @if ($requests->count() > 0)
                  <div class="card">
                     <ul class="nav nav-tabs" data-bs-toggle="tabs">
                        <li class="nav-item">
                           <a href="#tabs-home-7" class="nav-link {{$schedule->vessel_type != 'Crew Boat' ? 'active' : ''}}" data-bs-toggle="tab">Cargo</a>
                        </li>
                        <li class="nav-item">
                           <a href="#tabs-profile-7" class="nav-link {{$schedule->vessel_type === 'Crew Boat' ? 'active' : ''}}" data-bs-toggle="tab">Passenger</a>
                        </li>
                        <li class="nav-item ms-auto">
                           <a href="#tabs-settings-7" class="nav-link" title="Settings" data-bs-toggle="tab"><!-- Download SVG icon from http://tabler-icons.io/i/settings -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" /><circle cx="12" cy="12" r="3" /></svg>
                           </a>
                        </li>
                     </ul>
                     <div class="card-body">
                        <div class="tab-content">
                           <div class="tab-pane {{$schedule->vessel_type != 'Crew Boat' ? 'active show' : ''}}" id="tabs-home-7">
                              <x-schedule.request :requests="$requests" :routes="$routes" :fixroutes="$fixRoutes" :schedule="$schedule" />
                           </div>
                           <div class="tab-pane {{$schedule->vessel_type === 'Crew Boat' ? 'active show' : ''}}" id="tabs-profile-7">
                              <x-schedule.crew :requests="$requests" :routes="$routes" :fixroutes="$fixRoutes" :schedule="$schedule" />
                           </div>
                           <div class="tab-pane" id="tabs-settings-7">
                              <div>Donec ac vitae diam amet vel leo egestas consequat rhoncus in luctus amet, facilisi sit mauris accumsan nibh habitant senectus</div>
                           </div>
                        </div>
                     </div>
                  </div>
                  
                  @else
                  <div class="card mb-2">
                     <div class="card-body">
                        <small class="text-muted">Empty</small>
                     </div>
                  </div>
               @endif
            </div>
            <div class="col-md-4">
               @if (auth()->user()->hasRole('marine') )
                  <div class="card mb-2" style="height: calc(25rem + 10px)">
                     <div class="card-header">
                        Recent Request Activity
                     </div>
                     <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                        <div class="divide-y">
                           @if ($recentRequests->count() > 0)
                              @foreach ($recentRequests as $req)
                                 <div>
                                    <div class="row">
                                       <div class="col">
                                          <div class="text-truncate text-muted">
                                             {{-- <a href="#" data-bs-toggle="modal" data-bs-target="#add-request-{{$req->id}}">
                                             {{$req->activity->name}} {{$req->description}}</a> --}}
                                             {{$req->activity->name}} {{$req->description}}
                                          </div>
                                          <div class="text-muted">{{$req->origin->name}} - {{$req->destination->name}}</div>
                                          <div class="text-muted mb-1"><small> {{$req->employee->name}}</small></div>
                                          <a href="#" data-bs-toggle="modal" class="btn btn-light btn-sm" data-bs-target="#add-request-{{$req->id}}">Approve</a>
                                          <a href="#" data-bs-toggle="modal" class="btn btn-light btn-sm" data-bs-target="#reject-request-{{$req->id}}">Change</a>
                                       </div>
                                    </div>
                                 </div>
                                 <x-modal.schedule.add-request :request="$req" :schedule="$schedule" :routes="$routes" />
                                 <x-modal.schedule.reject-request :request="$req" :schedule="$schedule" :routes="$routes" :schedules="$schedules" />
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
                     <div class="card-footer">
                        <small>Click on activity to add into this schedule</small>
                     </div>
                  </div>
               @endif
               @if ($schedule->status > 0)
                  <x-schedule.report :report="$report" :reports="$reports" />
               @endif
               <x-schedule.offloading :offloadings="$offloadings" />
            </div>

            {{-- <div class="row">
               <div class="col-md-8">
                  <small class="badge badge-primary mb-2 mt-3">Activity</small><br>
                  @if ($requests->count() > 0)
                     <x-schedule.request :requests="$requests" :routes="$routes" :schedule="$schedule" />
                  @else
                     <div class="card mb-2">
                        <div class="card-body">
                           <small class="text-muted">Empty</small>
                        </div>
                     </div>
                  @endif

                  @if ($deviations != null)
                  <x-schedule.deviation :deviations="$deviations" />
                  @endif
               </div>
            </div> --}}
         </div>
         
         
      </div>
   </div>

   {{-- @if (auth()->user()->hasRole('department')) --}}
   <x-modal.cargo.additional :schedule="$schedule" :routes="$routes" :activities="$activities"/>
   {{-- @endif --}}
  
   <x-modal.schedule.accept :schedule="$schedule" />
   <x-modal.schedule.postpone :schedule="$schedule" />
   <x-modal.schedule.delete :schedule="$schedule" />
   <x-modal.schedule.reset :schedule="$schedule"  />
   <x-modal.schedule.edit :schedule="$schedule" :vessels="$vessels" />
   <x-modal.schedule.add-route :schedule="$schedule" :routes="$routes" />
   
   <x-modal.schedule.update-status :schedule="$schedule" :fixroutes="$fixRoutes" :ports="$ports" :iddestinations="$iddestinations" :destinations="$destinations" :statuses="$statuses" />
   {{-- <x-modal.schedule.select-vessel :vessels="$vessels" :schedule="$schedule" /> --}}
   <x-modal.schedule.send :schedule="$schedule" />
   {{-- <x-modal.schedule.standby :schedule="$schedule" />
   <x-modal.schedule.loading :schedule="$schedule" />
   <x-modal.schedule.loading-complete :schedule="$schedule" />
   <x-modal.schedule.castoff :schedule="$schedule" />
   <x-modal.schedule.fullaway :schedule="$schedule" /> --}}
   {{-- <x-modal.schedule.arrive :schedule="$schedule" /> --}}
   {{-- <x-modal.schedule.standby-dest :schedule="$schedule" />
   <x-modal.schedule.unloading :schedule="$schedule" />
   <x-modal.schedule.unloading-complete :schedule="$schedule" />
   <x-modal.schedule.complete :schedule="$schedule" />

   <x-modal.schedule.departure :schedule="$schedule" /> --}}
   {{-- <x-modal.schedule.arrived :schedule="$schedule"/> --}}

   <x-modal.schedule.add-deviation :schedule="$schedule" :ports="$ports" :routes="$scheduleRoutes" :activities="$activities"/>
   <x-modal.schedule.add-additional :schedule="$schedule" :ports="$ports" :routes="$scheduleRoutes" :activities="$activities"/>

   <x-modal.schedule.cargo.add :schedule="$schedule" :ports="$ports" :routes="$scheduleRoutes" />


@endsection

@push('capacity')
   <script>
      document.addEventListener("DOMContentLoaded", function () {
      	window.ApexCharts && (new ApexCharts(document.getElementById('sparkline-sales'), {
      		chart: {
      			type: "radialBar",
      			fontFamily: 'inherit',
      			height: 40,
      			width: 40,
      			animations: {
      				enabled: false
      			},
      			sparkline: {
      				enabled: true
      			},
      		},
      		tooltip: {
      			enabled: false,
      		},
      		plotOptions: {
      			radialBar: {
      				hollow: {
      					margin: 0,
      					size: '75%'
      				},
      				track: {
      					margin: 0
      				},
      				dataLabels: {
      					show: false
      				}
      			}
      		},
      		colors: ["#206bc4"],
      		series: [56],
      	})).render();
      });
   </script>
@endpush