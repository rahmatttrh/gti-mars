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
                  Vessel Schedule [{{$typeName}}]
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
               @if ($type == 2)
                  <a href="{{route('schedule.create')}}" class="btn btn-primary d-none d-sm-inline-block">
                     <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                     Create schedule
                  </a>
               @endif
               
               {{-- <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-add-schedule">
                  <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                  Create new schedule
               </a> --}}
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
               <table class="table card-table table-vcenter " >
                  <thead>
                     <tr>
                        <th class="text-center w-1">No.</th>
                        <th>Vessel</th>
                        <th>Date</th>
                        <th>From</th>
                        <th>Time</th>
                        <th>Destination</th>
                        <th>Arrival</th>
                        <th>Status</th>
                        {{-- <th>Cargo</th> --}}
                        <th></th>
                        {{-- <th></th> --}}
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($schedules as $schedule)
                        <tr>
                           <td class="text-muted text-center"><small>{{++$i}}</small></td>
                           <td><span class="text-muted">{{$schedule->vessel->name}}</span></td>
                           <td class="text-muted">
                              <small>{{ \Carbon\Carbon::parse($schedule->date)->format('l') }}</small> <br>
                              <small>{{ \Carbon\Carbon::parse($schedule->date)->format('d/m/Y') }} </small>
                           </td>
                           <td class="text-muted">
                              {{$schedule->origin->name}} -
                              {{$schedule->jetty->name}}
                           </td>
                           <td class="text-muted">
                              {{$schedule->docking}} - {{$schedule->departure}}
                              {{-- {{ \Carbon\Carbon::parse($schedule->docking)->format('h:m') }} -
                              {{ \Carbon\Carbon::parse($schedule->departure)->format('h:m') }}  --}}
                           </td>
                           <td class="text-muted">
                              {{$schedule->destination->name}}
                           </td>
                           <td class="text-muted">
                              <small>{{ \Carbon\Carbon::parse($schedule->arrival)->format('l') }}</small> <br>
                              <small>{{ \Carbon\Carbon::parse($schedule->arrival)->format('d/m/Y h:m') }} </small>
                           </td>
                           <td class="text-muted">
                              <span class="badge bg-success me-1"></span> <small>Docking</small>  
                           </td>
                           {{-- <td><small>145M2/300M2</small> <div class="progress progress-sm">
                              <div class="progress-bar bg-primary" style="width: 71.0%"></div>
                           </div>
                           </td> --}}
                           <td>
                              <a href="{{route('schedule.detail', enkripRambo($schedule->id))}}" class="btn btn-secondary btn-sm">Detail</a>
                              
                              {{-- <div class="dropdown">
                                 <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                   Dropdown button
                                 </button>
                                 <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                   <a class="dropdown-item" href="#">Action</a>
                                   <a class="dropdown-item" href="#">Another action</a>
                                   <a class="dropdown-item" href="#">Something else here</a>
                                 </div>
                               </div> --}}
                              {{-- <div class="dropdown">
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
                              </div> --}}
                           </td>
                        
                        </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
          </div>
      </div>
   </div>

   <x-modal.add-schedule :vessels="$vessels" :ports="$ports" :type="$type" />
@endsection