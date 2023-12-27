@extends('layouts.stisla.app')
@section('title')
    Dashboard
@endsection
@section('content')
   <section class="section">
      <div class="row">
         <div class="col-md-3">
            <div class="card card-statistic-2 border">
               <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-user"></i>
               </div>
               <div class="card-wrap">
                  <div class="card-header">
                     <small>Name</small>
                     <h4 class="text-dark">{{$user->name}}</h4>
                  </div>
                  {{-- <div class="card-body">{{$user->name}} </div> --}}
               </div>
            </div>

           
               <div class="card border">
                  <div class="card-body">
                     {{-- <small>Name</small> --}}
                     <small >{{$user->port->type}} - {{$user->port->region ?? ''}}</small><br>
                     <b class="text-dark">{{$user->port->name}}</b>
                     
                  </div>
                  {{-- <div class="card-body">{{$user->name}} </div> --}}
               </div>

            <div class="card border">
               <div class="card-body">
                  
                  <small>Progress Request</small><br>
                  <b>{{$requests->where('status', '>', 0)->count()}} </b>
                  <hr>
                  <small>Complete Request</small><br>
                  <b>{{$requests->where('status', 12)->count()}} </b>
               </div>
            </div>
            
         </div>
         <div class="col-md-9">
            
            @if ($confirms->count() > 0)
               @foreach ($confirms as $confirm)
                  <div class="alert alert-primary" role="alert">
                     You have a Arrival Cargo from {{$confirm->origin->name}}. Click <a href="{{route('schedule.detail', enkripRambo($confirm->schedule_id))}}" class="alert-link">here</a> to see detail.
                  </div>
               @endforeach
            @endif
            <div class="card">
               {{-- <div class="card-header">
                  <h4>Request Activity</h4>
               </div> --}}
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table table-striped table-sm" id="table-1">
                     <thead>                                 
                        <tr>
                           <th>#</th>
                           <th>Class</th>
                           <th>Route</th>
                           <th>Vessel</th>
                           <th>Date</th>
                           <th>Status</th>
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>     
                        @if ($requests->count() > 0)
                           @foreach ($requests as $r)
                           <tr>
                           <td>{{++$i}}</td>
                           <td >{{$r->activity->name ?? ''}} {{$r->description}}</td>
                           <td >{{$r->origin->name}} - {{$r->destination->name}}</td>
                           <td><a href="{{route('schedule.detail', enkripRambo($r->schedule_id))}}">{{$r->schedule->vessel->name ?? '-'}}</a></td>
                           <td>{{formatDate($r->date)}}</td>
                              
                              {{-- <td ><a href="{{route('request.detail', enkripRambo($r->id))}}">{{$r->activity->name ?? ''}} {{$r->description}}</a></td> --}}
                              
                     
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
                              <td>
                                 <a href="{{route('request.detail', enkripRambo($r->id))}}" class="btn btn-sm btn-primary">Detail</a>
                              </td>
                           </tr>
                           @endforeach
                           @else
                           <tr>
                              <td colspan="7" style="text-align: center"><small>Empty</small></td>
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

