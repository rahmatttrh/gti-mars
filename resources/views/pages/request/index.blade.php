@extends('layouts.app')
@section('title')
   Request Activity
@endsection
@section('content')
   <div class="container-xl">
      <!-- Page title -->
      <div class="page-header d-print-none">
         <div class="row align-items-center">
            <div class="col">
            <!-- Page pre-title -->
               <div class="page-pretitle">
                  Request Activity
               </div>
               <h2 class="page-title">
                  {{$title}}  {{$monthName ?? ''}}
               </h2>
            </div>
            <!-- Page title actions -->
            
            <div class="col-auto ms-auto d-print-none">
               <div class="btn-list">
                  <div class="dropdown">
                     <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                     Month
                     </button>
                     @if ($title == 'Inbox')
                        <div class="dropdown-menu dropdown-menu-end">
                           <a class="dropdown-item" href="{{route('request.month', enkripRambo(01))}}">
                              Januari
                           </a>
                           <a class="dropdown-item" href="{{route('request.month', enkripRambo(02))}}">
                              Februari
                           </a>
                           <a class="dropdown-item" href="{{route('request.month', enkripRambo(03))}}">
                              Maret
                           </a>
                           <a class="dropdown-item" href="{{route('request.month', enkripRambo(04))}}">
                              April
                           </a>
                           <a class="dropdown-item" href="{{route('request.month', enkripRambo(05))}}">
                              Mei
                           </a>
                           <a class="dropdown-item" href="{{route('request.month', enkripRambo(06))}}">
                              Juni
                           </a>
                           <a class="dropdown-item" href="{{route('request.month', enkripRambo(07))}}">
                              Juli
                           </a>
                           <a class="dropdown-item" href="{{route('request.month', enkripRambo(8))}}">
                              Agustus
                           </a>
                           <a class="dropdown-item" href="{{route('request.month', enkripRambo(9))}}">
                              September
                           </a>
                           <a class="dropdown-item" href="{{route('request.month', enkripRambo(10))}}">
                              Oktober
                           </a>
                           <a class="dropdown-item" href="{{route('request.month', enkripRambo(11))}}">
                              November
                           </a>
                           <a class="dropdown-item" href="{{route('request.month', enkripRambo(12))}}">
                              Desember
                           </a>
                        </div>
                        @else<div class="dropdown-menu dropdown-menu-end">
                           <a class="dropdown-item" href="{{route('request.month.progress', enkripRambo(01))}}">
                              Januari
                           </a>
                           <a class="dropdown-item" href="{{route('request.month.progress', enkripRambo(02))}}">
                              Februari
                           </a>
                           <a class="dropdown-item" href="{{route('request.month.progress', enkripRambo(03))}}">
                              Maret
                           </a>
                           <a class="dropdown-item" href="{{route('request.month.progress', enkripRambo(04))}}">
                              April
                           </a>
                           <a class="dropdown-item" href="{{route('request.month.progress', enkripRambo(05))}}">
                              Mei
                           </a>
                           <a class="dropdown-item" href="{{route('request.month.progress', enkripRambo(06))}}">
                              Juni
                           </a>
                           <a class="dropdown-item" href="{{route('request.month.progress', enkripRambo(07))}}">
                              Juli
                           </a>
                           <a class="dropdown-item" href="{{route('request.month.progress', enkripRambo(8))}}">
                              Agustus
                           </a>
                           <a class="dropdown-item" href="{{route('request.month.progress', enkripRambo(9))}}">
                              September
                           </a>
                           <a class="dropdown-item" href="{{route('request.month.progress', enkripRambo(10))}}">
                              Oktober
                           </a>
                           <a class="dropdown-item" href="{{route('request.month.progress', enkripRambo(11))}}">
                              November
                           </a>
                           <a class="dropdown-item" href="{{route('request.month.progress', enkripRambo(12))}}">
                              Desember
                           </a>
                        </div>
                     @endif
                  </div>
                  <div class="dropdown">
                     <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                     Option
                     </button>
                     <div class="dropdown-menu dropdown-menu-end">
                        @if (auth()->user()->hasRole('logistic'))
                        <a class="dropdown-item" href="{{route('request.create')}}">
                           Create
                        </a>
                        @endif
                        
                        @if ($title == 'Inbox')
                           <a class="dropdown-item" target="_blank" href="{{route('request.print', enkripRambo($month))}}">
                              Print Preview
                           </a>
                           @else
                           <a class="dropdown-item" target="_blank" href="{{route('request.print.progress', enkripRambo($month))}}">
                              Print Preview
                           </a>
                        @endif
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="page-body">
      <div class="container-xl">
         <div class="row">
            <div class="col-md-12">
               <div class="card">
                  {{-- <div class="card-header">
                    <h3 class="card-title">People</h3>
                  </div> --}}
                  <div class="table-responsive ">
                     <table   class="table" >
                        <thead>
                           <tr>
                              <th class="text-center">FUNC</th>
                              {{-- <th>Code </th> --}}
                              <th>Date</th>
                              <th>Route</th>
                              <th>Activity</th>
                              <th>Status</th>
                              {{-- <th></th> --}}
                           </tr>
                        </thead>
                        <tbody>
                           @if ($departs->count() > 0)
                              @foreach ($departs as $depart => $reqs)
                                 <tr>
                                 <td class="text-center" rowspan="{{count($reqs)+1}}">{{$depart}}</td>
                                 </tr>
                                 @foreach ($reqs as $request)
                                 <tr>
                                    
                                    {{-- <td><a href="{{route('request.detail', enkripRambo($request->id))}}">{{$request->code}}</a></td> --}}
                                    <td>{{$request->date}}</td>
                                    <td>{{$request->origin->name}} - {{$request->destination->name}}</td>
                                    <td><a href="{{route('request.detail', enkripRambo($request->id))}}"> {{$request->activity->name ?? ''}} {{$request->description}}</a></td>
                                    <td><x-status.request :request="$request" /></td>
                                    
                                    {{-- <td>
                                       @if ($request->status == 1)
                                       <a href="" class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#approveRequest_{{$request->id}}">Approve</a>
                                       <a href="" class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#modal-select-vessel-{{$request->id}}">Approve</a>
                                       @endif
                                    </td> --}}
                                 </tr>
                                 <x-modal.activity.approve :request="$request" />
                                 <x-modal.schedule.select-vessel :schedules="$schedules" :vessels="$vessels" :request="$request" />
                                 @endforeach
                              @endforeach
                              @else
                              <tr>
                                 <td colspan="6" style="text-align: center"><small>Empty</small></td>
                              </tr>
                           @endif
                           
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            {{-- <div class="col-md-3">
               @foreach ($schedules as $schedule)
                  <div class="list-group-item bg-white">
                     <div class="d-flex justify-content-between">
                        <div class="text-truncate">
                           <small>{{\Carbon\Carbon::parse($schedule->date)->format('d/m/Y')}} - {{$schedule->vessel->name}}</small> <br>
                           <small>{{$schedule->origin->name}} - {{$schedule->destination->name}}</small>
                        </div>
                        <div class="text-right">
                           <div class="badge">{{$schedule->requests()->count()}}</div>
                        </div>
                     </div>
                  </div>
               @endforeach
               
            </div> --}}
         </div>
        
      </div>
   </div>

   
@endsection