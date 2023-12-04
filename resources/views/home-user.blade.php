@extends('layouts.stisla.app')
@section('title')
    Dashboard
@endsection
@section('content')
  <section class="section">
    <div class="row">
      <div class="col-md-3">
        <div class="card  profile-widget">
          <div class="profile-widget-header">                     
            <img alt="image" src="{{asset('stisla/img/avatar/avatar-1.png')}}" class="rounded-circle profile-widget-picture">
            <div class="profile-widget-items">
              
              <div class="profile-widget-item">
                <div class="profile-widget-item-label">Name</div>
                <div class="h3"><b>{{$user->name}}</b></div>
              </div>
              {{-- <div class="profile-widget-item">
                <div class="profile-widget-item-label">Following</div>
                <div class="profile-widget-item-value">2,1K</div>
              </div> --}}
            </div>
          </div>
          <div class="profile-widget-description">
            <ul class="list-group">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Loc
                <span class="badge badge-primary badge-pill">{{$user->port->name}}</span>
              </li>
              {{-- <li class="list-group-item d-flex justify-content-between align-items-center">
                Dept
                <span class="badge badge-primary badge-pill">{{$user->department->name}}</span>
              </li> --}}
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Email
                <span class="badge badge-primary badge-pill">{{$user->email}}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Username
                <span class="badge badge-primary badge-pill">{{$user->username}}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Ext
                <span class="badge badge-primary badge-pill">{{$user->ekstensi}}</span>
              </li>
            </ul>
          </div>
          <div class="card-footer text-center">
            
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <div class="row">
      
          <div class=" col-md-6 col-sm-12">
            <div class="card card-statistic-2">
              
              <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-rocket"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Progress Request</h4>
                </div>
                <div class="card-body">{{$requests->where('status', '>', 0)->count()}} </div>
              </div>
            </div>
          </div>
          <div class=" col-md-6 col-sm-12">
            <div class="card card-statistic-2">
              
              <div class="card-icon shadow-success bg-success">
                <i class="fas fa-check"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Complete Request</h4>
                </div>
                <div class="card-body">{{$requests->where('status', 12)->count()}}</div>
              </div>
            </div>
          </div>
        </div>
        @if ($confirms->count() > 0)
          @foreach ($confirms as $confirm)
            <div class="alert alert-primary" role="alert">
                You have a Arrival Cargo from {{$confirm->origin->name}}. Click <a href="{{route('schedule.detail', enkripRambo($confirm->schedule_id))}}" class="alert-link">here</a> to see detail.
            </div>
          @endforeach
        @endif
        <div class="card">
          <div class="card-header">
            <h4>Request Activity</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped" id="table-1">
                <thead>                                 
                  <tr>
                    <th>#</th>
                    {{-- <th>BCM</th> --}}
                    <th>Date</th>
                    <th>Vessel</th>
                    <th>Activity</th>
                    <th>Route</th>
                    <th>Status</th>
                 </tr>
                </thead>
                <tbody>     
                  @if ($requests->count() > 0)
                    @foreach ($requests as $r)
                    <tr>
                      <td>{{++$i}}</td>
                        {{-- <td >
                          <a href="{{route('request.detail', enkripRambo($r->id))}}">{{$r->bcm}}</a>
                        </td> --}}
                        <td ><a href="{{route('request.detail', enkripRambo($r->id))}}">{{ \Carbon\Carbon::parse($r->date)->format('d/m/Y') }}</a> </td>
                        <td>{{$r->schedule->vessel->name ?? '-'}}</td>
                        {{-- <td ><a href="{{route('request.detail', enkripRambo($r->id))}}">{{$r->activity->name ?? ''}} {{$r->description}}</a></td> --}}
                        <td >{{$r->activity->name ?? ''}} {{$r->description}}</td>
                        <td >{{$r->origin->name}} - {{$r->destination->name}}</td>
                        <td>
                          {{-- <x-status.request :request="$r" :lastreport="$r->schedule->lastreport()" /> --}}
                              @if ($r->status < 3)
                                <x-status-stisla.request :request="$r" :lastreport="null"/>
                                @else
                                {{-- {{$r->schedule_id}} --}}
                                {{-- {{$r->id}} --}}
                                <x-status-stisla.request :request="$r" :lastreport="$r->getStatus()"/>
                              @endif
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="5" style="text-align: center"><small>Empty</small></td>
                    </tr>
                  @endif
                </tbody>
              </table>
            </div>
          </div>
      </div>
      </div>
    </div>
    
  </section>
@endsection

