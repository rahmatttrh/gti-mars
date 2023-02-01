@extends('layouts.app')

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
               Dashboard
            </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
               <div class="btn-list">
                  <span class="d-none d-sm-inline">
                     <a href="#" class="btn btn-white">
                     New view
                     </a>
                  </span>
                  {{-- <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
                     
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                     Create new report
                  </a> --}}
                  <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="page-body">
      <div class="container-xl">
         <div class="row row-cards">
            {{-- @if (auth()->user()->hasRole(['superadmin']))
            <h1>Superrrr</h1>
            @elseif(auth()->user()->hasRole(['marine']))
            <h1>Marineeee</h1>
            @endif --}}
            <div class="col-3">
               <div class="card card-sm">
                  <div class="card-body">
                     <div class="row align-items-center">
                     <div class="col-auto">
                        <span class="bg-blue text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                           <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" /><path d="M12 3v3m0 12v3" /></svg>
                        </span>
                     </div>
                     <div class="col">
                        <div class="font-weight-medium">
                           132 Logistic
                        </div>
                        <div class="text-muted">
                           12 waiting
                        </div>
                     </div>
                     </div>
                  </div>
               </div>
            </div>
            
            <div class="col-3">
              <div class="card card-sm">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="bg-yellow text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/users -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="9" cy="7" r="4" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /><path d="M21 21v-2a4 4 0 0 0 -3 -3.85" /></svg>
                      </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium">
                        13 Vessel
                      </div>
                      <div class="text-muted">
                        163 today
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-3">
              <div class="card card-sm">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <span class="bg-twitter text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c-.002 -.249 1.51 -2.772 1.818 -4.013z" /></svg>
                      </span>
                    </div>
                    <div class="col">
                      <div class="font-weight-medium">
                        8 Port
                      </div>
                      <div class="text-muted">
                        16 today
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-3">
               <div class="card card-sm">
                 <div class="card-body">
                   <div class="row align-items-center">
                     <div class="col-auto">
                       <span class="bg-yellow text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/users -->
                         <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="9" cy="7" r="4" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /><path d="M21 21v-2a4 4 0 0 0 -3 -3.85" /></svg>
                       </span>
                     </div>
                     <div class="col">
                       <div class="font-weight-medium">
                         13 Vessel
                       </div>
                       <div class="text-muted">
                         163 today
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
         </div>
         {{-- <div class="row row-deck row-cards">
            <div class="col-sm-6 col-lg-3">
               <div class="card">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                     <div class="subheader">Sales</div>
                     <div class="ms-auto lh-1">
                        <div class="dropdown">
                           <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                           <div class="dropdown-menu dropdown-menu-end">
                           <a class="dropdown-item active" href="#">Last 7 days</a>
                           <a class="dropdown-item" href="#">Last 30 days</a>
                           <a class="dropdown-item" href="#">Last 3 months</a>
                           </div>
                        </div>
                     </div>
                     </div>
                     <div class="h1 mb-3">75%</div>
                     <div class="d-flex mb-2">
                     <div>Conversion rate</div>
                     <div class="ms-auto">
                        <span class="text-green d-inline-flex align-items-center lh-1">
                           7% <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                           <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="3 17 9 11 13 15 21 7" /><polyline points="14 7 21 7 21 14" /></svg>
                        </span>
                     </div>
                     </div>
                     <div class="progress progress-sm">
                     <div class="progress-bar bg-blue" style="width: 75%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                        <span class="visually-hidden">75% Complete</span>
                     </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-sm-6 col-lg-3">
               <div class="card">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                     <div class="subheader">Revenue</div>
                     <div class="ms-auto lh-1">
                        <div class="dropdown">
                           <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                           <div class="dropdown-menu dropdown-menu-end">
                           <a class="dropdown-item active" href="#">Last 7 days</a>
                           <a class="dropdown-item" href="#">Last 30 days</a>
                           <a class="dropdown-item" href="#">Last 3 months</a>
                           </div>
                        </div>
                     </div>
                     </div>
                     <div class="d-flex align-items-baseline">
                     <div class="h1 mb-0 me-2">$4,300</div>
                     <div class="me-auto">
                        <span class="text-green d-inline-flex align-items-center lh-1">
                           8% <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                           <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="3 17 9 11 13 15 21 7" /><polyline points="14 7 21 7 21 14" /></svg>
                        </span>
                     </div>
                     </div>
                  </div>
                  <div id="chart-revenue-bg" class="chart-sm"></div>
               </div>
            </div>
            <div class="col-sm-6 col-lg-3">
               <div class="card">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                     <div class="subheader">New clients</div>
                     <div class="ms-auto lh-1">
                        <div class="dropdown">
                           <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                           <div class="dropdown-menu dropdown-menu-end">
                           <a class="dropdown-item active" href="#">Last 7 days</a>
                           <a class="dropdown-item" href="#">Last 30 days</a>
                           <a class="dropdown-item" href="#">Last 3 months</a>
                           </div>
                        </div>
                     </div>
                     </div>
                     <div class="d-flex align-items-baseline">
                     <div class="h1 mb-3 me-2">6,782</div>
                     <div class="me-auto">
                        <span class="text-yellow d-inline-flex align-items-center lh-1">
                           0% <!-- Download SVG icon from http://tabler-icons.io/i/minus -->
                           <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="5" y1="12" x2="19" y2="12" /></svg>
                        </span>
                     </div>
                     </div>
                     <div id="chart-new-clients" class="chart-sm"></div>
                  </div>
               </div>
            </div>
            <div class="col-sm-6 col-lg-3">
               <div class="card">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                     <div class="subheader">Active users</div>
                     <div class="ms-auto lh-1">
                        <div class="dropdown">
                           <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                           <div class="dropdown-menu dropdown-menu-end">
                           <a class="dropdown-item active" href="#">Last 7 days</a>
                           <a class="dropdown-item" href="#">Last 30 days</a>
                           <a class="dropdown-item" href="#">Last 3 months</a>
                           </div>
                        </div>
                     </div>
                     </div>
                     <div class="d-flex align-items-baseline">
                     <div class="h1 mb-3 me-2">2,986</div>
                     <div class="me-auto">
                        <span class="text-green d-inline-flex align-items-center lh-1">
                           4% <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                           <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="3 17 9 11 13 15 21 7" /><polyline points="14 7 21 7 21 14" /></svg>
                        </span>
                     </div>
                     </div>
                     <div id="chart-active-users" class="chart-sm"></div>
                  </div>
               </div>
            </div>
         </div> --}}
         <div class="row mt-1 row-cards">
            <div class="col-lg-7">
               <div class="card mb-2">
                  <div class="card-header border-0">
                     <div class="card-title">Schedules by Request</div>
                  </div>
                  {{-- <div class="card-header border-0 bg-info">
                     <div class="btn btn-sm btn-light">Create new schedule</div>
                  </div> --}}
                  <div class="card-table table-responsive ">
                     <table class="table table-vcenter">
                        <thead class="bg-primary">
                           <tr>
                              <th>Vessel</th>
                              {{-- <th>Date</th> --}}
                              <th>From</th>
                              <th>Destination</th>
                              <th >Status</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($schedules as $schedule)
                              <tr>
                                 <td class="">
                                    <div class=" text-nowrap text-muted ">
                                       {{$schedule->vessel->name}}
                                    </div>
                                 </td>
                                 {{-- <td class="text-nowrap text-muted">
                                    {{ \Carbon\Carbon::parse($schedule->date)->format('d/m/Y') }} 
                                 </td> --}}
                                 <td class="text-muted">
                                    {{$schedule->origin->name}} -
                                    {{-- {{$schedule->jetty->name}} <br> --}}
                                    <small>{{ \Carbon\Carbon::parse($schedule->date)->format('d/m/Y') }} </small> 
                                 </td>
                                 <td class="text-muted">
                                    {{$schedule->destination->name}} <br>
                                    <small>{{ \Carbon\Carbon::parse($schedule->arrival)->format('d/m/Y h:m') }}</small> 
                                 </td>
                                 <td class="text-muted">
                                    <span class="badge bg-success me-1"></span> <small>Docking</small>
                                 </td>
                              </tr>
                           @endforeach
                           
                        </tbody>
                     </table>
                     
                  </div>
                  {{-- <div class="card-footer d-flex align-items-center py-3">
                     {{$vessels->links()}}
                  </div> --}}
               </div>
            </div>
            <div class="col-md-5">
               <div class="card mb-2">
                  <div class="card-header border-0">
                     <div class="card-title">Routine Schedules</div>
                  </div>
                  
                  <div class="card-table table-responsive ">
                     <table class="table table-vcenter">
                        <thead class="bg-primary">
                           <tr>
                              <th>Vessel</th>
                              <th>Route</th>
                              <th>Day</th>
                              <th>Status</th>
                           </tr>
                        </thead>
                        <tbody>
                           {{-- @foreach ($schedulesFix as $schedule)
                              <tr>
                                 <td class=" ">
                                    <div class=" text-nowrap text-muted ">
                                       {{$schedule->vessel->name}}
                                    </div>
                                 </td>
                                 <td class="text-nowrap text-muted">
                                    {{$schedule->origin->name}} - {{$schedule->destination->name}}
                                 </td>
                                 <td class="text-nowrap text-muted">
                                    {{ \Carbon\Carbon::parse($schedule->date)->format('l') }}
                                 </td>
                                 <td class="text-muted">
                                    <span class="badge bg-success me-1"></span><small>Docking</small> 
                                 </td>
                              </tr>
                           @endforeach --}}
                        </tbody>
                     </table>
                  </div>
                  {{-- <div class="card-footer d-flex align-items-center py-3">
                     {{$vessels->links()}}
                  </div> --}}
               </div>
               
             </div>
            
         </div>
      </div>
   </div>

   <x-modal.add-vessel />
   
   
@endsection

      


    