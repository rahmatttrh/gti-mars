@extends('layouts.stisla.app')
@section('title')
    Schedule History
@endsection
@section('content')
<section class="section">
    <div class="section-header">
      <h1 class="section-title">Schedule History</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item "><a href="{{route('dsp.marine')}}">Dashboard</a></div>
        <div class="breadcrumb-item active">Schedule History</div>
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
                <table class="table table-striped" id="table-1">
                  <thead>                                 
                    <tr>
                      <th class="text-center">
                        #
                      </th>
                      <th>Class</th>
                      <th>Vessel</th>
                      <th>From</th>
                      <th>Activity</th>
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
                            <td>{{$schedule->class}}</td>
                            <td>
                                <a href="{{route('schedule.detail', enkripRambo($schedule->id))}}">{{$schedule->vessel->name ?? ''}}</a> <br>
                                {{-- <small>{{$schedule->vessel->vessel_type}} Supply</small> --}}
                            </td>
                            <td>
                                @if (count($schedule->routes) > 0)
                                {{$schedule->routes->where('rank', 1)->first()->port->name}}
                                @endif
                            </td>
                            <td>{{$schedule->requests()->where('status', 1)->count()}} / {{$schedule->requests()->count()}}</td>
                            <td>
                                {{-- {{\Carbon\Carbon::parse($schedule->date)->format('l')}} <br> --}}
                                {{\Carbon\Carbon::parse($schedule->date)->format('d/m/Y')}}
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