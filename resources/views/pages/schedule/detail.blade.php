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
                           <a class="dropdown-item" href="{{route('schedule.edit', enkripRambo($schedule->id))}}">
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
         <x-notification.deviation :deviations="$deviations" />
         <div class="row ">
            <div class="col-md-8">
               <div class="card">
                  <div class="card-header bg-secondary">
                     <x-status.schedule :schedule="$schedule" :lastreport="$lastreport" />
                  </div>
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-8">
                           <small>Vessel</small>
                           <h2>
                              {{$schedule->vessel->name ?? 'Vessel Not Avalaible'}}
                           </h2>
                           <small>Pick up point from {{$schedule->origin->name}} </small>
                           <h2> {{$schedule->origin->name}}
                              @foreach ($routes as  $route)
                                 - {{$route->port->name}} 
                              @endforeach
                           </h2>
                           @if (auth()->user()->hasRole('marine') && $schedule->status == 0)
                              <small><a href="#" data-bs-toggle="modal" data-bs-target="#schedule-reset-route">Reset route</a></small>
                           @endif
                           
                           <div class="text-muted mt-3"> 
                              @if ($lastPostpone)
                                 {{\Carbon\Carbon::parse($lastPostpone->from)->format('d/m/Y')}} Postpone to
                              @endif
                              <b>{{\Carbon\Carbon::parse($schedule->date)->format('d/m/Y')}}</b>
                              @if ($lastPostpone)
                                 <br><small>{{$lastPostpone->reason}}</small>
                              @endif
                           </div>
                           
                           <div class="text-muted mb-2 mt-2">ETD {{\Carbon\Carbon::parse($schedule->etd)->format('H:i')}}</div>
                        </div>
                        <div class="col-md-4">
                           <div class="card bg-info text-white ">
                              <div class="card-body">
                                 <div class="row mb-3 align-items-center">
                                    <div class="col">
                                       <div class="text-muted text-white">
                                          <small> Deadweight {{$schedule->total_weight}} / {{$schedule->vessel->deadweight}} ton</small>
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
                                         <small>  Deckspace {{$schedule->total_size}} / {{$schedule->vessel->deckspace}} (m<sup>2</sup>)</small>
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
                     <div class="text-muted"># {{$schedule->remark}}</div>   
                     
                  </div>
               </div>
               
               {{-- <hr> --}}
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
            <div class="col-md-4">
               @if (auth()->user()->hasRole('marine') && $schedule->status == 0)
                  <div class="card " style="height: calc(20rem + 10px)">
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
                                          <div class="text-truncate">
                                             <a href="#" data-bs-toggle="modal" data-bs-target="#add-request-{{$req->id}}">
                                             {{$req->activity->name}} {{$req->description}}</a>
                                          </div>
                                          <div class="text-muted">{{$req->origin->name}} - {{$req->destination->name}}</div>
                                          <div class="text-muted">{{$req->employee->name}}/{{$req->department->name}}</div>
                                       </div>
                                    </div>
                                 </div>
                                 <x-modal.schedule.add-request :request="$req" :schedule="$schedule" />
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

   @if (auth()->user()->hasRole('department'))
   <x-modal.cargo.additional :schedule="$schedule" :routes="$routes" :activities="$activities"/>
   @endif
  
   <x-modal.schedule.accept :schedule="$schedule" />
   <x-modal.schedule.postpone :schedule="$schedule" />
   <x-modal.schedule.delete :schedule="$schedule" />
   <x-modal.schedule.reset :schedule="$schedule" />
   <x-modal.schedule.update-status :schedule="$schedule" :routes="$routes" :ports="$ports" :iddestinations="$iddestinations" :destinations="$destinations" :statuses="$statuses" />
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

   <x-modal.schedule.add-deviation :schedule="$schedule" :ports="$ports" :routes="$scheduleRoutes"/>
   

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