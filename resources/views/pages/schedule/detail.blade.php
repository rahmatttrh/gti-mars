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
                        {{-- <a class="dropdown-item" href="#">
                           Timeline
                        </a> --}}
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
         <div class="row">
            <div class="col-md-8">
               <div class="card">
                  <div class="card-header bg-secondary">
                     <x-status.schedule :schedule="$schedule" />
                  </div>
                  <div class="card-body">
                     <h1>
                        {{$schedule->vessel->name ?? 'Vessel Not Avalaible'}}
                     </h1>
                     {{$schedule->origin->name}} - {{$schedule->destination->name}}<br>
                     {{\Carbon\Carbon::parse($schedule->date)->format('d/m/Y')}} <br>
                     <div class="text-muted">#Note {{$schedule->remark}}</div>
                  </div>
                  <div class="card-footer">
                     <div class="text-muted mt-2">ETD {{\Carbon\Carbon::parse($schedule->etd)->format('H:i')}}</div>
                     <div class="text-muted">ETA {{\Carbon\Carbon::parse($schedule->eta)->format('H:i')}}</div>
                     
                  </div>
               </div>
               {{-- <hr> --}}
               <small class="badge badge-primary mb-2 mt-3">Activity</small><br>
               @if ($requests->count() > 0)
               <x-schedule.request :requests="$requests" :schedule="$schedule" />
               @else
               <div class="card">
                  <div class="card-body">
                     <small class="text-muted">Empty</small>
                  </div>
               </div>
               
               @endif
               
            </div>
            <div class="col-md-4">
               {{-- <div class="row">
                  <div class="col-md-6">
                     <div class="card card-sm">
                        <div class="card-body">
                          <div class="row align-items-center">
                            <div class="col-auto">
                              <div class="chart-sparkline chart-sparkline-square" id="sparkline-sales"></div>
                            </div>
                            <div class="col">
                              <div class="font-weight-medium">
                                132 Sales
                              </div>
                              <div class="text-muted">
                                12 waiting payments
                              </div>
                            </div>
                          </div>
                        </div>
                     </div>
                  </div>
               </div> --}}
               <div class="card mb-3">
                  <div class="card-body">
                     <div class="row mb-3 align-items-center">
                        <div class="col">
                           <div class="text-muted">
                              Deadweight {{$schedule->total_weight}} / {{$schedule->vessel->deadweight}} ton
                           </div>
                           <div class="mt-2">
                              <div class="row g-2 align-items-center">
                                 <div class="col-auto">
                                    {{$persenWeight}}%
                                 </div>
                                 <div class="col">
                                    <div class="progress progress-sm">
                                    <div class="progress-bar" style="width: {{$persenWeight}}%" role="progressbar" aria-valuenow="{{$persenWeight}}" aria-valuemin="0" aria-valuemax="100">
                                       {{-- <span class="visually-hidden">25% Complete</span> --}}
                                    </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row mb-3 align-items-center">
                        <div class="col">
                          <div class="text-muted">
                             Deckspace {{$schedule->total_size}} / {{$schedule->vessel->desk_space}} (m<sup>2</sup>)
                          </div>
                          <div class="mt-2">
                            <div class="row g-2 align-items-center">
                              <div class="col-auto">
                                {{$persenSize}}%
                              </div>
                              <div class="col">
                                <div class="progress progress-sm">
                                  <div class="progress-bar" style="width: {{$persenSize}}%" role="progressbar" aria-valuenow="{{$persenSize}}" aria-valuemin="0" aria-valuemax="100">
                                    {{-- <span class="visually-hidden">25% Complete</span> --}}
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                     </div>
                     <small>Hint : this data refers to the selected vessel data</small>
                  </div>
               </div>
               {{-- <div class="card mb-3">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col">
                        <div class="text-muted">
                           Deckspace {{$schedule->total_size}} / {{$schedule->vessel->desk_space}} (m<sup>2</sup>)
                        </div>
                        <div class="mt-2">
                          <div class="row g-2 align-items-center">
                            <div class="col-auto">
                              {{$persenSize}}%
                            </div>
                            <div class="col">
                              <div class="progress progress-sm">
                                <div class="progress-bar" style="width: {{$persenSize}}%" role="progressbar" aria-valuenow="{{$persenSize}}" aria-valuemin="0" aria-valuemax="100">
                                  <span class="visually-hidden">25% Complete</span>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
               </div>  --}}
               <div class="card">
                  <div class="card-header">
                     Timeline
                  </div>
                  <div class="card-body">
                     @if ($report)
                        <x-schedule.report :report="$report" />
                        @else
                        <small class="text-muted">Empty</small>
                     @endif
                  </div>
               </div>
               {{-- <div class="card">
                  <div class="card-body">
                     <h1>halo</h1>
                  </div>
               </div> --}}
               <small class="badge badge-primary mb-2 mt-3">Deviation</small><br>
               <x-schedule.deviation :deviations="$deviations" />
            </div>
         </div>
         
         
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

   <x-modal.schedule.add-deviation :schedule="$schedule" :ports="$ports"/>
   

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