@extends('layouts.stisla.app')
@section('title')
    Schedule Inbox
@endsection
@section('content')
<section class="section">
    {{-- <div class="section-header">
      <h1 class="section-title">Schedule Inbox</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item "><a href="{{route('dsp.marine')}}">Dashboard</a></div>
        <div class="breadcrumb-item active">Schedule Inbox</div>
      </div>
    </div> --}}

   <div class="section-body">
      <div class="row mt-3">
         <div class="col-12">
            <div class="card">
            {{-- <div class="card-header">
               <h4>Cargo/Crew</h4>
               
            </div> --}}
            <div class="card-body">
               <div class="table-responsive">
                  <table class=" table-striped" id="table-1">
                  <thead>   
                     <tr>
                        <th colspan="7">Cargo/Crew</th>
                     </tr>                              
                     <tr>
                        <th class="text-center">
                        #
                        </th>
                        <th>ID</th>
                        <th>Vessel</th>
                        <th>Route</th>
                        <th>Activity</th>
                        <th>Date</th>
                        <th>Capacity</th>
                        <th style="width: 100px">Status</th>
                     </tr>
                  </thead>
                  <tbody>     
                     @foreach ($cargoSchedules as $schedule)
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
                                 <a href="{{route('schedule.detail', enkripRambo($schedule->id))}}">{{$schedule->vessel->name ?? 'Empty'}}</a> <br>
                                 <small>{{$schedule->vessel->type ?? '-'}}</small>
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
                           
                        </tr>
                     @endforeach   
                  </tbody>
                  </table>
               </div>

               <div class="table-responsive mt-3">
                  <table class=" table-striped " id="table-1">
                     <thead>       
                     <tr>
                        <th colspan="6">Moving,Lifting</th>
                     </tr>                          
                        <tr>
                        <th class="text-center">
                           #
                        </th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Request by</th>
                        <th>Status</th>
                        <th></th>
                        </tr>
                     </thead>
                     <tbody>     
                        @foreach ($movingSchedules as $schedule)
                        <tr>
                           <td class="text-center">{{++$i}}</td>
                           <td>{{$schedule->class}}</td>
                           <td>{{$schedule->requests()->first()->bargeItem->barge->name ?? ''}} {{$schedule->requests()->first()->desc ?? ''}}</td>
                           <td>{{formatDate($schedule->date)}}</td>
                           <td>{{$schedule->requests()->first()->employee->name ?? ''}}</td>
                           <td><x-status-stisla.schedule :schedule="$schedule" /></td>
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