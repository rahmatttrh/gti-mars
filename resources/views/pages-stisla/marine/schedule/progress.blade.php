@extends('layouts.stisla.app')
@section('title')
    Schedule Progress
@endsection
@section('content')
<section class="section">
    <div class="section-header">
      <h1 class="section-title">Schedule Progress {{$monthName}}</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item "><a href="{{route('dsp.marine')}}">Dashboard</a></div>
        <div class="breadcrumb-item active">Schedule Progress</div>
      </div>
    </div>

    <div class="section-body">
      {{-- <h2 class="section-title">Schedule Plan</h2>
      <p class="section-lead">
        We use 'DataTables' made by @SpryMedia. You can check the full documentation <a href="https://datatables.net/">here</a>.
      </p> --}}

      <div class="row">
        <div class="col-12">
          <div class="card">
            {{-- <div class="card-header">
              <h4>Basic DataTables</h4>
            </div> --}}
            <div class="card-body">
              <div class="table-responsive">
                <table class=" table-striped " id="table-1">
                  <thead>                                 
                     <tr>
                        <th class="text-center">
                          #
                        </th>
                        <th>ID</th>
                        <th>Vessel</th>
                        <th>Route</th>
                        <th>Request</th>
                        <th>Date</th>
                        <th>Capacity</th>
                        <th>Status</th>
                        <th></th>
                      </tr>
                  </thead>
                  <tbody>     
                    @foreach ($schedules as $schedule)
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
                         {{$schedule->vessel->name}} <br>
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
                     <td>
                       <a href="{{route('schedule.detail', enkripRambo($schedule->id))}}" class="btn btn-sm btn-primary">Detail</a>
                     </td>
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