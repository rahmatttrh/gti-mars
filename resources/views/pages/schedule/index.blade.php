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
                  Vessel Schedule
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
               <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-add-schedule">
                  <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                  Create new schedule
               </a>
               <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
                  <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
               </a>
            </div>
            </div>
         </div>
      </div>
   </div>
   <div class="page-body" >
      <div class="container-xl">
         <div class="card">
           
            
      
            <div class="table-responsive">
               <table class="table card-table table-vcenter ">
                  <thead>
                     <tr>
                        <th class="text-center w-1">No.</th>
                        <th>Vessel name</th>
                        {{-- <th>Owner</th> --}}
                        {{-- <th>Operator</th> --}}
                        <th>Destination</th>
                        <th>Departure</th>
                        <th>Arrival</th>
                        <th>Status</th>
                        <th>Cargo</th>
                        <th></th>
                        {{-- <th></th> --}}
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($schedules as $schedule)
                        <tr>
                           <td class="text-muted text-center"><small>{{++$i}}</small></td>
                           <td><span class="">{{$schedule->vessel->name}}</span></td>
                           <td class="text-muted">
                              {{$schedule->port->name}}
                           </td>
                           <td class="text-muted">
                              {{-- 15 Dec 2017, 09:00 WIB --}}
                              {{$schedule->departure}}
                           </td>
                           <td class="text-muted">
                              {{$schedule->arrival}}
                           </td>
                           <td>
                              <span class="badge bg-success me-1"></span> Boarding
                           </td>
                           <td><small>145M2/300M2</small> <div class="progress progress-xs">
                              <div class="progress-bar bg-primary" style="width: 71.0%"></div>
                           </div>
                           </td>
                           <td>
                              <div class="dropdown">
                                 <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                                 Actions
                                 </button>
                                 <div class="dropdown-menu dropdown-menu-end">
                                 <a class="dropdown-item" href="#">
                                    Action
                                 </a>
                                 <a class="dropdown-item" href="#">
                                    Another action
                                 </a>
                                 </div>
                              </div>
                           </td>
                        
                        </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
          </div>
      </div>
   </div>

   <x-modal.add-schedule :vessels="$vessels" :ports="$ports" />
@endsection