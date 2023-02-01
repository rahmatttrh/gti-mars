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
                  BOAT PLANNING  <div class="uppercase"> [{{$monthName}}]</div>
               </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
               <div class="btn-list">
                  @if ($type == 2)
                     {{-- <a href="{{route('schedule.create')}}" class="btn btn-primary d-none d-sm-inline-block">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                        Create schedule
                     </a> --}}
                     {{-- <a href="{{route('schedule.create.old')}}" class="btn btn-primary d-none d-sm-inline-block">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                        Create schedule Old
                     </a> --}}
                     <div class="dropdown">
                        <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                        Month
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                           <a class="dropdown-item" href="{{route('schedule.month', enkripRambo(01))}}">
                              Januari
                           </a>
                           <a class="dropdown-item" href="{{route('schedule.month', enkripRambo(02))}}">
                              Februari
                           </a>
                           <a class="dropdown-item" href="{{route('schedule.month', enkripRambo(03))}}">
                              Maret
                           </a>
                           <a class="dropdown-item" href="{{route('schedule.month', enkripRambo(04))}}">
                              April
                           </a>
                           <a class="dropdown-item" href="{{route('schedule.month', enkripRambo(05))}}">
                              Mei
                           </a>
                           <a class="dropdown-item" href="{{route('schedule.month', enkripRambo(06))}}">
                              Juni
                           </a>
                           <a class="dropdown-item" href="{{route('schedule.month', enkripRambo(07))}}">
                              Juli
                           </a>
                           <a class="dropdown-item" href="{{route('schedule.month', enkripRambo(8))}}">
                              Agustus
                           </a>
                           <a class="dropdown-item" href="{{route('schedule.month', enkripRambo(9))}}">
                              September
                           </a>
                           <a class="dropdown-item" href="{{route('schedule.month', enkripRambo(10))}}">
                              Oktober
                           </a>
                           <a class="dropdown-item" href="{{route('schedule.month', enkripRambo(11))}}">
                              November
                           </a>
                           <a class="dropdown-item" href="{{route('schedule.month', enkripRambo(12))}}">
                              Desember
                           </a>
                        </div>
                     </div>
                     <div class="dropdown">
                        <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                        Option
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                           <a class="dropdown-item" href="{{route('schedule.create')}}">
                              Create
                           </a>
                           <a class="dropdown-item" target="_blank" href="{{route('schedule.print', enkripRambo($month))}}">
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
         <div class="card">
            <div class="table-responsive">
               <table class="table card-table table-vcenter " >
                  <thead>
                     <tr>
                        <th class="text-center w-1" rowspan="2">No.</th>
                        <th>Date</th>
                        <th>Function</th>
                        <th>Station</th>
                        <th>Activity</th>
                        <th>Location (Form - To)</th>
                        <th>Required Boat</th>
                        <th>Assignment Boat</th>
                        <th>Status</th>
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($schedules as $schedule)
                     <tr>
                        <td class="text-muted text-center"><small>{{++$i}}</small></td>
                        <td class="text-muted text-truncate">{{\Carbon\Carbon::parse($schedule->date)->format('d/m/Y')}}</td>
                        <td class="text-muted">{{$schedule->func}}</td>
                        <td class="text-muted">{{$schedule->station}}</td>
                        <td class="text-muted text-truncate" style="max-width: 20px;" data-toggle="tooltip" data-placement="top" title="{{$schedule->activity}}">
                           {{$schedule->activity}}
                        </td>
                        <td class="text-muted text-truncate">{{$schedule->origin->name}} - {{$schedule->destination->name}}</td>
                        <td class="text-muted">SCV</td>
                        <td class="text-muted text-truncate">
                           @if ($schedule->status == 1)
                              -
                              @else
                              {{$schedule->vessel->name}}
                           @endif
                        </td>
                        <td class="text-muted">
                           <x-status.schedule :schedule="$schedule" />
                        </td>
                        <td>
                           <a href="{{route('schedule.detail', enkripRambo($schedule->id))}}" class="btn btn-sm btn-secondary">Detail</a>
                           {{-- <div class="dropdown">
                              <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                              Action
                              </button>
                              <div class="dropdown-menu dropdown-menu-end">
                                 @if ($schedule->status == 1)
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-select-vessel-{{$schedule->id}}">
                                       Select Vessel
                                    </a>
                                    @else
                                 @endif
                                 
                                 <div class="dropdown-divider"></div>
                                 <a class="dropdown-item" href="{{route('schedule.detail', enkripRambo($schedule->id))}}">
                                    Detail
                                 </a>
                              </div>
                           </div> --}}
                        </td>
                     </tr>
                     <x-modal.select-vessel :vessels="$vessels" :schedule="$schedule" />
                     @endforeach
                     
                     <tr class="mb-4">
                        <td class="text-muted text-center"></td>
                        <td class="text-muted"></td>
                        <td class="text-muted"></td>
                        <td class="text-muted"></td>
                        <td class="text-muted"></td>
                        <td class="text-muted"></td>
                        <td class="text-muted"></td>
                        <td class="text-muted"></td>
                        <td class="text-muted">
                           
                        </td>
                        <td class="text-left">
                           <div class="btn-group">
                              {{-- <a href="#" class="btn btn-outline-secondary ">Detail</a> --}}
                           </div>
                           
                        </td>
                     </tr>
                     
                  </tbody>
               </table>
            </div>
          </div>
      </div>
   </div>

   <x-modal.add-schedule :vessels="$vessels" :ports="$ports" :type="$type" />
   {{-- <x-modal.select-month /> --}}
@endsection