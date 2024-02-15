@extends('layouts.stisla.app')
@section('title')
    Schedule Plan
@endsection
@section('content')
<section class="section">
    {{-- <div class="section-header">
      <h1 class="section-title">Schedule Plan {{$monthName}}</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item "><a href="{{route('dsp.marine')}}">Dashboard</a></div>
        <div class="breadcrumb-item active">Schedule Plan</div>
      </div>
    </div> --}}

    <div class="section-body">
      
      
      <div class="row ">
        <div class="col-12">
          <div class="card border shadow">
            {{-- <div class="card-header">
              <h4>Basic DataTables</h4>
            </div> --}}
            {{-- <div class="card-header">
               
                
            </div> --}}
            <div class="card-body">
              
               {{-- <div class="d-flex">
                  <div class="dropdown mr-2 show">
                     <a class="btn btn-light border dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       Dropdown link
                     </a>
                   
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
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
                  <a href="{{route('schedule.create')}}" class="btn btn-light border">
                     <i class="fa fa-plus"></i>
                     Create
                  </a>
               </div> --}}
               <div class="d-flex justify-content-between align-items-center">
                  <div class="div">
                     <div class="dropdown dropright d-inline mr-2 ">
                        <button class="btn btn-light border dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Select Month
                        </button>
                        <div class="dropdown-menu">
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
                     <a href="{{route('schedule.create')}}" class="btn btn-light border">
                        <i class="fa fa-plus"></i>
                        Create
                     </a>
                  </div>
                  <div class="div">
                     <h3># {{$monthName}}</h3>
                  </div>
               </div>
               
               
               <hr>
               <div class="table-responsive">
                  <table class="table table-striped table-sm" id="table-8">
                     <thead>     
                        {{-- <tr>
                           <th colspan="9" ></th>

                        </tr>                             --}}
                     <tr>
                        <th class="text-center">
                           #
                        </th>
                        <th>ID</th>
                        <th>Type</th>
                        <th>Vessel</th>
                        <th>Route</th>
                        <th>Request</th>
                        <th>Date</th>
                        <th>Capacity</th>
                        <th>Status</th>
                        {{-- <th></th> --}}
                     </tr>
                     </thead>
                     <tbody>     
                     @foreach ($regulerSchedules as $schedule)
                           <tr>
                              <td class="text-center">
                              {{++$i}}
                              </td>
                              <td>
                                 <a href="{{route('schedule.detail', enkripRambo($schedule->id))}}">{{$schedule->code}}</a> 
                                 
                              </td>
                              <td>{{$schedule->class}}</td>
                              <td>
                                 {{$schedule->vessel->name}} 
                              </td>
                              <td>
                                 @foreach ($schedule->routes as $route)
                                       {{$route->port->name}} - 
                                    @endforeach
                                 {{-- @if (count($schedule->routes) > 0)
                                 {{$schedule->routes->where('rank', 1)->first()->port->name}}
                                 @endif --}}
                              </td>
                              <td>{{$schedule->requests()->where('status', 1)->count()}} / {{$schedule->requests()->count()}}</td>
                              <td>
                                    
                                 {{\Carbon\Carbon::parse($schedule->date)->format('d/m/Y')}}
                                 {{-- <br>
                                 <small>{{\Carbon\Carbon::parse($schedule->date)->format('l')}}</small> --}}
                              </td>
                              <td>
                                 {{$schedule->total_size ?? '-'}} m<sup>2</sup> / {{$schedule->total_weight ?? '-'}} ton
                              </td>
                              <td>
                                 <x-status-stisla.schedule-plain :schedule="$schedule" :lastreport="$schedule->lastreport()" />
                              </td>
                              {{-- <td>
                                 <a href="{{route('schedule.detail', enkripRambo($schedule->id))}}" class="btn btn-sm btn-primary">Detail</a>
                              </td> --}}
                           </tr>
                     @endforeach   
                     </tbody>
                  </table>
               </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </section>
    
@endsection