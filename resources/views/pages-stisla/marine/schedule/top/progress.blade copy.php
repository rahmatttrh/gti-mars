@extends('layouts.stisla.app')
@section('title')
   DSP Progress Sailing Order
@endsection

@section('content')


   <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
         <a class="nav-link active" id="progress-tab" data-toggle="tab" href="#progress" role="tab" aria-controls="progress" aria-selected="true">Porgress</a>
      </li>
      {{-- <li class="nav-item">
         <a class="nav-link" id="inbox-tab" data-toggle="tab" href="#inbox" role="tab" aria-controls="inbox" aria-selected="false">Inbox</a>
      </li> --}}
      
      <li class="nav-item">
         <a class="nav-link" id="history-tab" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="false">History </a>
      </li>

   </ul>
   <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="progress" role="tabpanel" aria-labelledby="progress-tab">
         <div class="table-responsive">
            <table class="table-striped" id="table-8">
               <thead>     
                                             
               <tr>
                  {{-- <th class="text-center">
                     #
                  </th> --}}
                  <th>ID</th>
                  <th>Vessel</th>
                  <th>Date</th>
                  <th>Type</th>
                  
                  <th>Route</th>
                  <th>Request</th>
                  
                  {{-- <th>Capacity</th> --}}
                  <th>Status</th>
                  {{-- <th></th> --}}
               </tr>
               </thead>
               <tbody>     
               @foreach ($schedules->where('status', '!=', 11) as $schedule)
                     <tr>
                        {{-- <td class="text-center">
                        {{++$i}}
                        </td> --}}
                        <td>
                           <a href="{{route('schedule.detail', enkripRambo($schedule->id))}}">{{$schedule->code}}</a> 
                           
                        </td>
                        <td>
                           {{$schedule->vessel->name ?? '-'}} 
                        </td>
                        <td>
                              
                           {{\Carbon\Carbon::parse($schedule->date)->format('d/m/Y')}}
                        </td>
                        <td>{{$schedule->class}}</td>
                        
                        <td>
                           @foreach ($schedule->routes as $route)
                                 {{$route->port->code}} - 
                              @endforeach
                           {{-- @if (count($schedule->routes) > 0)
                           {{$schedule->routes->where('rank', 1)->first()->port->name}}
                           @endif --}}
                        </td>
                        <td>{{$schedule->requests()->where('status', 1)->count()}} / {{$schedule->requests()->count()}}</td>
                        
                        {{-- <td>
                           {{$schedule->total_size ?? '-'}} m<sup>2</sup> / {{$schedule->total_weight ?? '-'}} ton
                        </td> --}}
                        <td>
                           <x-status-stisla.schedule :schedule="$schedule" :lastreport="$schedule->lastreport()" />
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
      <div class="tab-pane fade" id="inbox" role="tabpanel" aria-labelledby="inbox-tab">
         <b>Inbox</b>
         <div class="table-responsive">
            <table class=" table-striped" id="">
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
                              {{$route->port->code}} - 
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
            <table class=" table-striped " id="">
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
      
      <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
         {{-- <b>history</b> --}}
         <div class="table-responsive ">
            <table class="" id="table-3">
               <thead>     
                                             
                  <tr>
                     {{-- <th class="text-center">
                        #
                     </th> --}}
                     <th>ID</th>
                     <th>Vessel</th>
                     <th>Date</th>
                     <th>Type</th>
                     
                     <th>Route</th>
                     <th>Request</th>
                     
                     {{-- <th>Capacity</th> --}}
                     <th>Status</th>
                     {{-- <th></th> --}}
                  </tr>
                  </thead>
                  <tbody>     
                  @foreach ($schedules->where('status', 11) as $schedule)
                        <tr>
                           {{-- <td class="text-center">
                           {{++$i}}
                           </td> --}}
                           <td>
                              <a href="{{route('schedule.detail', enkripRambo($schedule->id))}}">{{$schedule->code}}</a> 
                              
                           </td>
                           <td>
                              {{$schedule->vessel->name}} 
                           </td>
                           <td>
                                 
                              {{\Carbon\Carbon::parse($schedule->date)->format('d/m/Y')}}
                              {{-- <br>
                              <small>{{\Carbon\Carbon::parse($schedule->date)->format('l')}}</small> --}}
                           </td>
                           <td>{{$schedule->class}}</td>
                           
                           <td>
                              @foreach ($schedule->routes as $route)
                                    {{$route->port->code}} - 
                                 @endforeach
                              {{-- @if (count($schedule->routes) > 0)
                              {{$schedule->routes->where('rank', 1)->first()->port->name}}
                              @endif --}}
                           </td>
                           <td>{{$schedule->requests()->where('status', 1)->count()}} / {{$schedule->requests()->count()}}</td>
                           
                           {{-- <td>
                              {{$schedule->total_size ?? '-'}} m<sup>2</sup> / {{$schedule->total_weight ?? '-'}} ton
                           </td> --}}
                           <td>
                              <x-status-stisla.schedule :schedule="$schedule" :lastreport="$schedule->lastreport()" />
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
   
 @endsection