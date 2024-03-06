@extends('layouts.stisla.app')
@section('title')
  DSP Progress Sailing Order
@endsection

@section('content')


   <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
         <a class="nav-link active" id="progress-tab" data-toggle="tab" href="#progress" role="tab" aria-controls="progress" aria-selected="true">Porgress</a>
      </li>
      <li class="nav-item">
         <a class="nav-link" id="history-tab" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="false">History</a>
      </li>
      
   

   </ul>
   <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="progress" role="tabpanel" aria-labelledby="progress-tab">
         <div class="table-responsive">
            <table class="table table-striped table-sm" id="table-1">
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
                  <th></th>
                  </tr>
               </thead>
               <tbody>     
                  @foreach ($progresses as $schedule)
                     <tr>
                        <td class="text-center">
                        {{++$i}}
                        </td>
                        <td>
                           {{$schedule->code}} <br>
                           <small>{{$schedule->class}}</small>
                           </td>
                        <td>
                           {{$schedule->vessel->name ?? ''}} <br>
                              <small>{{$schedule->vessel->vessel_type}} Supply</small>
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
      <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
         <div class="table-responsive">
            <table class="table table-striped table-sm" id="table-1">
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
                  <th></th>
                  </tr>
               </thead>
               <tbody>     
                  @foreach ($histories as $schedule)
                     <tr>
                        <td class="text-center">
                        {{++$i}}
                        </td>
                        <td>
                           {{$schedule->code}} <br>
                           <small>{{$schedule->class}}</small>
                           </td>
                        <td>
                           {{$schedule->vessel->name ?? ''}} <br>
                              <small>{{$schedule->vessel->vessel_type}} Supply</small>
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
   
 @endsection