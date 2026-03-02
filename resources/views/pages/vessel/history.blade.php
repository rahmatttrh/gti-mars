@extends('layouts.app')
@section('title')
   History Vessel
@endsection
@section('content')
   <div class="container-xl">
      <!-- Page title -->
      <div class="page-header d-print-none">
         <div class="row align-items-center">
            <div class="col">
               <div class="page-pretitle">
                  History
               </div>
               <h2 class="page-title">
                  {{$vessel->name}} - {{$monthName}}
               </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
               <div class="btn-list">
                  <div class="dropdown">
                     <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                     Month
                     </button>
                        <div class="dropdown-menu dropdown-menu-end">
                           <a class="dropdown-item" href="{{route('vessel.history', [enkripRambo($vessel->id), 1])}}">
                              Januari
                           </a>
                           <a class="dropdown-item" href="{{route('vessel.history', [enkripRambo($vessel->id), 2])}}">
                              Februari
                           </a>
                           <a class="dropdown-item" href="{{route('vessel.history', [enkripRambo($vessel->id), 3])}}">
                              Maret
                           </a>
                           <a class="dropdown-item" href="{{route('vessel.history', [enkripRambo($vessel->id), 4])}}">
                              April
                           </a>
                           <a class="dropdown-item" href="{{route('vessel.history', [enkripRambo($vessel->id), 5])}}">
                              Mei
                           </a>
                           <a class="dropdown-item" href="{{route('vessel.history', [enkripRambo($vessel->id), 6])}}">
                              Juni
                           </a>
                           <a class="dropdown-item" href="{{route('vessel.history', [enkripRambo($vessel->id), 7])}}">
                              Juli
                           </a>
                           <a class="dropdown-item" href="{{route('vessel.history', [enkripRambo($vessel->id), 8])}}">
                              Agustus
                           </a>
                           <a class="dropdown-item" href="{{route('vessel.history', [enkripRambo($vessel->id), 9])}}">
                              September
                           </a>
                           <a class="dropdown-item" href="{{route('vessel.history', [enkripRambo($vessel->id), 10])}}">
                              Oktober
                           </a>
                           <a class="dropdown-item" href="{{route('vessel.history', [enkripRambo($vessel->id), 11])}}">
                              November
                           </a>
                           <a class="dropdown-item" href="{{route('vessel.history', [enkripRambo($vessel->id), 12])}}">
                              Desember
                           </a>
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
            <div class="col-md-9">
               <div class="card">
           
                  <div class="table-responsive">
                     <table   class="table " >
                        <thead>
                           <tr>
                              <th>No.</th>
                              <th>Date</th>
                              <th>Activity</th>
                              <th>Origin</th>
                              <th>Deviasi</th>
                              <th>Destination</th>
                           </tr>
                        </thead>
                        <tbody>
                           @if ($reports->count() > 0)
                              @foreach ($reports as $report)
                                 <tr>
                                    <td >{{++$i}}</td>
                                    <td>
                                       <a href="{{route('schedule.detail', enkripRambo($report->schedule->id))}}">
                                          {{\Carbon\Carbon::parse($report->schedule->date)->format('d/m/Y')}}
                                       </a>
                                    </td>
                                    <td>
                                       <a href="#" data-bs-toggle="modal" data-bs-target="#modal-request-list-{{$report->schedule->id}}">{{$report->schedule->requests->count()}} Activity</a>
                                       </td>
                                    <td>
                                       {{$report->schedule->origin->name}} 
                                    </td>
                                    <td>-</td>
                                    <td>
                                       {{$report->schedule->destination->name}} <br>
                                    </td>
                                 </tr>
                                 <x-modal.schedule.request :schedule="$report->schedule" />
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
            <div class="col-md-3">
               <div class="card card-sm mb-2">
                  <div class="card-body">
                     <div class="row align-items-center">
                        <div class="col-auto">
                           <span class="bg-blue text-white avatar">
                              <!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                 <path
                                    d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                 <path d="M12 3v3m0 12v3" />
                              </svg>
                           </span>
                        </div>
                        <div class="col">
                           <div class="font-weight-medium">
                              {{$schedules->count()}}
                           </div>
                           <div class="text-muted">
                              Total Schedule
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card card-sm">
                  <div class="card-body">
                     <div class="row align-items-center">
                        <div class="col-auto">
                           <span class="bg-yellow text-white avatar">
                              <!-- Download SVG icon from http://tabler-icons.io/i/users -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                 <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                 <circle cx="9" cy="7" r="4" />
                                 <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                 <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                 <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                              </svg>
                           </span>
                        </div>
                        <div class="col">
                           <div class="font-weight-medium">
                              {{$totalRequests}}
                           </div>
                           <div class="text-muted">
                              Total Activity
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         
         {{-- <div class="row  row-deck row-cards">
            @if ($vessels->count() > 0)
               @foreach ($vessels as $vessel)
                  <div class="col-md-6 col-lg-3">
                     <div class="card">
                        <div class="card-body p-4 text-center">
                           <span class="avatar avatar-xl mb-3 avatar-rounded ">@if ($vessel->status == 1)
                              <img src="{{asset('img/vessel/docking.png')}}" alt="">
                              @elseif($vessel->status == 2)
                              <img src="{{asset('img/vessel/ship.png')}}" alt="">
                              @endif
                           </span>
                           <h3 class="m-0 mb-1"><a href="#">{{$vessel->name}}</a></h3>
                           <div class="text-muted">{{$vessel->type}}</div>
                        </div>
                        <div class="d-flex">
                           <a href="{{route('vessel.detail', enkripRambo($vessel->id) )}}" class="card-btn"><!-- Download SVG icon from http://tabler-icons.io/i/phone -->
                              <!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                           <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
                              Detail</a>
                        </div>
                        <div class="card-footer text-center">
                           <x-status.vessel :vessel="$vessel" />
                        </div>
                     </div>
                  </div>
               @endforeach
               @else
               <div class="col-m-12">
                  <div class="card">
                     <div class="card-body py-5 text-center">
                        <img width="100px" src="{{asset('img/flaticon/browser.png')}}" alt=""> <br><br>
                        <small class="text-muted">Data Empty</small>
                     </div>
                  </div>
                  
               </div>
            @endif
            
         </div> --}}
      </div>
   </div>

@endsection