@extends('layouts.app')
@section('title')
    Schedule List
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
                  SCHEDULE PLAN &nbsp;  <span class="text-uppercase text-info"> {{$monthName}}</span>
               </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
               <div class="btn-list">
                  @if ($type == 2)
                     
                     <div class="dropdown">
                        <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                        Month
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                           <a class="dropdown-item" href="{{route('schedule.plan', enkripRambo(01))}}">
                              Januari
                           </a>
                           <a class="dropdown-item" href="{{route('schedule.plan', enkripRambo(02))}}">
                              Februari
                           </a>
                           <a class="dropdown-item" href="{{route('schedule.plan', enkripRambo(03))}}">
                              Maret
                           </a>
                           <a class="dropdown-item" href="{{route('schedule.plan', enkripRambo(04))}}">
                              April
                           </a>
                           <a class="dropdown-item" href="{{route('schedule.plan', enkripRambo(05))}}">
                              Mei
                           </a>
                           <a class="dropdown-item" href="{{route('schedule.plan', enkripRambo(06))}}">
                              Juni
                           </a>
                           <a class="dropdown-item" href="{{route('schedule.plan', enkripRambo(07))}}">
                              Juli
                           </a>
                           <a class="dropdown-item" href="{{route('schedule.plan', enkripRambo(8))}}">
                              Agustus
                           </a>
                           <a class="dropdown-item" href="{{route('schedule.plan', enkripRambo(9))}}">
                              September
                           </a>
                           <a class="dropdown-item" href="{{route('schedule.plan', enkripRambo(10))}}">
                              Oktober
                           </a>
                           <a class="dropdown-item" href="{{route('schedule.plan', enkripRambo(11))}}">
                              November
                           </a>
                           <a class="dropdown-item" href="{{route('schedule.plan', enkripRambo(12))}}">
                              Desember
                           </a>
                        </div>
                     </div>
                     <div class="dropdown">
                        <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                        Option
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                           @if (auth()->user()->hasRole('superuser') || auth()->user()->hasRole('marine'))
                           {{-- <a class="dropdown-item" href="{{route('schedule.create')}}">
                              Create
                           </a> --}}
                           <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#schedule-create">
                              Create
                           </a>
                           @endif
                           
                           {{-- <a class="dropdown-item" target="_blank" href="{{route('schedule.print', ['plan',$month])}}">
                              Print Preview 
                           </a> --}}
                           <a class="dropdown-item" target="_blank" href="{{route('document.intermilan', enkripRambo($month))}}">
                              Print Preview 
                           </a>
                           
                        </div>
                     </div>
                  @endif
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="page-body" >
      <div class="container-xl">
         <div class="badge bg-cyan">Routine</div>
         <div class="card mt-2 mb-3 ">
           {{-- ID Example for display datatable --}}
            <div class="table-responsive">
               <table id=""  class="table " >
                  <thead>
                     <tr>
                        <th class="text-center">No.</th>
                        <th>Vessel</th>
                        <th>Type</th>
                        <th>Day</th>
                        <th>Date</th>
                        {{-- <th>From</th> --}}
                        
                        <th class="text-center">Activity</th>
                        <th>Capacity</th>
                        <th>Status</th>
                        {{-- <th></th> --}}
                     </tr>
                  </thead>
                  <tbody>
                     @if ($regulerSchedules->count() > 0)
                        @foreach ($regulerSchedules as $schedule)
                           <tr>
                              <td class="text-muted text-center"><small>{{++$i}}</small></td>
                              <td class="text-muted text-truncate">
                                 <a href="{{route('schedule.detail', enkripRambo($schedule->id))}}">{{$schedule->vessel->name}}</a> 
                              </td>
                              <td class="text-muted">
                                 {{$schedule->vessel->type ?? '-'}}
                              </td>
                              <td class="text-muted text-truncate"> {{\Carbon\Carbon::parse($schedule->date)->format('l')}}</td>
                              <td class="text-muted text-truncate"> {{\Carbon\Carbon::parse($schedule->date)->format('d/m/Y')}}</td>
                        
                              {{-- <td class="text-muted text-truncate">{{$schedule->origin->name}} - {{$schedule->destination->name}}</td> --}}
                              {{-- <td class="text-muted text-truncate">{{$schedule->origin->name}}</td> --}}
                              
                              <td class="text-muted text-center">
                                 {{$schedule->requests()->where('status', 1)->count()}} / {{$schedule->requests()->count()}}
                              </td>
                              <td class="text-muted">
                                 {{$schedule->total_size ?? '-'}} m<sup>2</sup> / {{$schedule->total_weight ?? '-'}} ton
                              </td>
                              <td class="text-muted">
                                 <x-status.schedule :schedule="$schedule" :lastreport="$schedule->lastreport()" />
                              </td>
                              
                           </tr>
                           {{-- <x-modal.schedule.select-vessel :vessels="$vessels" :schedule="$schedule" /> --}}
                        @endforeach
                        @else
                        <tr>
                           <td colspan="7" class="text-center"><small class="text-muted">Empty</small></td>
                        </tr>
                     @endif
                  </tbody>
               </table>
            </div>
         </div>
         <div class="badge bg-info">By Request</div>
         <div class="card mt-2">
           {{-- ID Example for display datatable --}}
            <div class="table-responsive">
               <table id=""  class="table " >
                  <thead>
                     <tr>
                        <th class="text-center">No.</th>
                        <th>Vessel</th>
                        <th>Type</th>
                        <th>Day</th>
                        <th>Date</th>
                        {{-- <th>From</th> --}}
                        
                        <th class="text-center">Activity</th>
                        <th>Capacity</th>
                        <th>Status</th>
                        {{-- <th></th> --}}
                     </tr>
                  </thead>
                  <tbody>
                     @if ($schedules->count() > 0)
                        @php
                              $no = 0
                        @endphp
                        @foreach ($schedules as $schedule)
                           
                           <tr>
                              <td class="text-muted text-center"><small>{{++$no}}</small></td>
                              <td class="text-muted text-truncate">
                                 <a href="{{route('schedule.detail', enkripRambo($schedule->id))}}">{{$schedule->vessel->name ?? 'Not available'}}</a> 
                              </td>
                              <td class="text-muted">
                                 {{$schedule->vessel->type ?? '-'}}
                              </td>
                              <td class="text-muted text-truncate"> {{\Carbon\Carbon::parse($schedule->date)->format('l')}}</td>
                              <td class="text-muted text-truncate"> {{\Carbon\Carbon::parse($schedule->date)->format('d/m/Y')}}</td>
                        
                              {{-- <td class="text-muted text-truncate">{{$schedule->origin->name}} - {{$schedule->destination->name}}</td> --}}
                              {{-- <td class="text-muted text-truncate">{{$schedule->origin->name}}</td> --}}
                              
                              <td class="text-muted text-center">
                                 {{$schedule->requests()->where('status', 1)->count()}} / {{$schedule->requests()->count()}}
                              </td>
                              <td class="text-muted">
                                 {{$schedule->total_size ?? '-'}} m<sup>2</sup> / {{$schedule->total_weight ?? '-'}} ton
                              </td>
                              <td class="text-muted">
                                 <x-status.schedule :schedule="$schedule" :lastreport="$schedule->lastreport()" />
                              </td>
                              
                           </tr>
                           {{-- <x-modal.schedule.select-vessel :vessels="$vessels" :schedule="$schedule" /> --}}
                        @endforeach
                        @else
                        <tr>
                           <td colspan="7" class="text-center"><small class="text-muted">Empty</small></td>
                        </tr>
                     @endif
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
   <x-modal.schedule.create :vessels="$vessels" />
   {{-- <x-modal.add-schedule :vessels="$vessels" :ports="$ports" :type="$type" /> --}}
   {{-- <x-modal.select-month /> --}}
@endsection