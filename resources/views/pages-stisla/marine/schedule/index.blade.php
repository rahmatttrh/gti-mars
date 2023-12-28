@extends('layouts.stisla.app')
@section('title')
    Schedule Plan
@endsection
@section('content')
<section class="section">
    <div class="section-header">
      <h1 class="section-title">Schedule Plan</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item "><a href="{{route('dsp.marine')}}">Dashboard</a></div>
        <div class="breadcrumb-item active">Schedule Plan</div>
      </div>
    </div>

    <div class="section-body">
      
      
      <div class="row ">
        <div class="col-12">
          <div class="card">
            {{-- <div class="card-header">
              <h4>Basic DataTables</h4>
            </div> --}}
            <div class="card-header">
               <div class="dropdown d-inline mr-2 ">
                  <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                <a href="{{route('schedule.create')}}" class="btn btn-primary btn-sm">
                  <i class="fa fa-plus"></i>
                  Create
                </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-sm" id="table-8">
                  <thead>                                 
                    <tr>
                      <th class="text-center">
                        #
                      </th>
                      <th>ID</th>
                      <th>Vessel</th>
                      <th>From</th>
                      <th>Activity</th>
                      <th>Date</th>
                      <th>Capacity</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>     
                    @foreach ($regulerSchedules as $schedule)
                        <tr>
                            <td class="text-center">
                            {{++$i}}
                            </td>
                            <td>
                              {{$schedule->code}}
                              <br>
                              <small>{{$schedule->class}}</small>
                           </td>
                            <td>
                                <a href="{{route('schedule.detail', enkripRambo($schedule->id))}}">{{$schedule->vessel->name}}</a> <br>
                                <small>{{$schedule->vessel_type}}</small>
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
                                <br>
                                <small>{{\Carbon\Carbon::parse($schedule->date)->format('l')}}</small>
                            </td>
                            <td>
                                {{$schedule->total_size ?? '-'}} m<sup>2</sup> / {{$schedule->total_weight ?? '-'}} ton
                            </td>
                            <td>
                                <x-status-stisla.schedule :schedule="$schedule" :lastreport="$schedule->lastreport()" />
                            </td>
                            {{-- <td class="align-middle">
                                <div class="progress" data-height="4" data-toggle="tooltip" title="100%">
                                    <div class="progress-bar bg-success" data-width="100%"></div>
                                </div>
                            </td> --}}
                            {{-- <td>
                            <img alt="image" src="assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Wildan Ahdian">
                            </td>
                            <td>2018-01-20</td>
                            <td><div class="badge badge-success">Completed</div></td>
                            <td><a href="#" class="btn btn-secondary">Detail</a></td> --}}
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