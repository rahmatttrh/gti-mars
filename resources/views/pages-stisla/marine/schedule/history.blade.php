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
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table table-striped" id="table-1">
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
                              </td>
                              <td>
                                 {{$schedule->requests()->where('status', 1)->count()}} / {{$schedule->requests()->count()}}
                              </td>
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