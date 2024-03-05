@extends('layouts.stisla.app')
@section('title')
    Dashboard
@endsection
@section('content')
   <section class="section">
      <div class="row">
         <div class="col-md-3">
            <div class="card card-statistic-2 shadow-sm border">
               <div class="card-icon  bgb-3 text-white">
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

           
               <div class="card border shadow-sm">
                  <div class="card-body">
                     {{-- <small>Name</small> --}}
                     <small >{{$user->port->type}} - {{$user->port->region ?? ''}}</small><br>
                     <b class="text-dark">{{$user->port->name}}</b>
                     
                  </div>
                  <div class="card-footer">
                     <small>Progress Request</small><br>
                     <b>{{$requests->where('status', '>', 0)->count()}} </b>
                     <hr>
                     <small>Complete Request</small><br>
                     <b>{{$requests->where('status', 12)->count()}} </b>
                  </div>
                  {{-- <div class="card-body">{{$user->name}} </div> --}}
               </div>

            
            
         </div>
         <div class="col-md-9">
            
            @if ($confirms->count() > 0)
               @foreach ($confirms as $confirm)
                  <div class="alert alert-info" role="alert">
                     You have a Arrival Cargo from {{$confirm->origin->name}}. Click <a href="{{route('schedule.detail', enkripRambo($confirm->schedule_id))}}" class="alert-link">here</a> to see detail.
                  </div>
               @endforeach
            @endif
            <div class="d-flex  align-items-center">
               <div class="">
                  <span class="btn btn-white border"><b>INTERMILAN</b></span>
                  {{-- <b class="mt-2">INTERMILAN </b> <br> --}}
                  <div class="btn-group dropright ">
                     <button type="button" class="btn btn-light border shadow-none dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     {{$monthName}}
                     </button>
                     <div class="dropdown-menu dropright">
                        <a class="dropdown-item" href="{{route('dsp.user', [enkripRambo(01), enkripRambo($year)])}}">
                           Januari
                         </a>
                         <a class="dropdown-item" href="{{route('dsp.user', [enkripRambo(02), enkripRambo($year)])}}">
                             Februari
                         </a>
                         <a class="dropdown-item" href="{{route('dsp.user', [enkripRambo(03), enkripRambo($year)])}}">
                             Maret
                         </a>
                         <a class="dropdown-item" href="{{route('dsp.user', [enkripRambo(04), enkripRambo($year)])}}">
                             April
                         </a>
                         <a class="dropdown-item" href="{{route('dsp.user', [enkripRambo(05), enkripRambo($year)])}}">
                             Mei
                         </a>
                         <a class="dropdown-item" href="{{route('dsp.user', [enkripRambo(06), enkripRambo($year)])}}">
                             Juni
                         </a>
                         <a class="dropdown-item" href="{{route('dsp.user', [enkripRambo(07), enkripRambo($year)])}}">
                             Juli
                         </a>
                         <a class="dropdown-item" href="{{route('dsp.user', [enkripRambo(8), enkripRambo($year)])}}">
                             Agustus
                         </a>
                         <a class="dropdown-item" href="{{route('dsp.user', [enkripRambo(9), enkripRambo($year)])}}">
                             September
                         </a>
                         <a class="dropdown-item" href="{{route('dsp.user', [enkripRambo(10), enkripRambo($year)])}}">
                             Oktober
                         </a>
                         <a class="dropdown-item" href="{{route('dsp.user', [enkripRambo(11), enkripRambo($year)])}}">
                             November
                         </a>
                         <a class="dropdown-item" href="{{route('dsp.user', [enkripRambo(12), enkripRambo($year)])}}">
                             Desember
                         </a>
                     </div>
                  </div>
                  <div class="btn-group dropright">
                     <button type="button" class="btn btn-light border shadow-none dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     {{$year}}
                     </button>
                     <div class="dropdown-menu dropright">
                        <a class="dropdown-item" href="{{route('dsp.user', [enkripRambo($month), enkripRambo(2024)])}}">
                           2024
                         </a>
                         <a class="dropdown-item" href="{{route('dsp.user', [enkripRambo($month), enkripRambo(2023)])}}">
                             2023
                         </a>
                         <a class="dropdown-item" href="{{route('dsp.user', [enkripRambo($month), enkripRambo(2022)])}}">
                             2022
                         </a>
                     </div>
                  </div>
               </div>
               <div>
                  
                  {{-- <div class="dropdown d-inline ">
                     <button class="btn btn-light border btn-sm shadow-none dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       {{$monthName}}
                     </button>
                     <div class="dropdown-menu">
                       <a class="dropdown-item" href="{{route('dsp.user', [enkripRambo(01), enkripRambo(auth()->user()->getYear())])}}">
                         Januari
                       </a>
                       <a class="dropdown-item" href="{{route('dsp.user', [enkripRambo(02), enkripRambo(auth()->user()->getYear())])}}">
                           Februari
                       </a>
                       <a class="dropdown-item" href="{{route('dsp.user', [enkripRambo(03), enkripRambo(auth()->user()->getYear())])}}">
                           Maret
                       </a>
                       <a class="dropdown-item" href="{{route('dsp.user', [enkripRambo(04), enkripRambo(auth()->user()->getYear())])}}">
                           April
                       </a>
                       <a class="dropdown-item" href="{{route('dsp.user', [enkripRambo(05), enkripRambo(auth()->user()->getYear())])}}">
                           Mei
                       </a>
                       <a class="dropdown-item" href="{{route('dsp.user', [enkripRambo(06), enkripRambo(auth()->user()->getYear())])}}">
                           Juni
                       </a>
                       <a class="dropdown-item" href="{{route('dsp.user', [enkripRambo(07), enkripRambo(auth()->user()->getYear())])}}">
                           Juli
                       </a>
                       <a class="dropdown-item" href="{{route('dsp.user', [enkripRambo(8), enkripRambo(auth()->user()->getYear())])}}">
                           Agustus
                       </a>
                       <a class="dropdown-item" href="{{route('dsp.user', [enkripRambo(9), enkripRambo(auth()->user()->getYear())])}}">
                           September
                       </a>
                       <a class="dropdown-item" href="{{route('dsp.user', [enkripRambo(10), enkripRambo(auth()->user()->getYear())])}}">
                           Oktober
                       </a>
                       <a class="dropdown-item" href="{{route('dsp.user', [enkripRambo(11), enkripRambo(auth()->user()->getYear())])}}">
                           November
                       </a>
                       <a class="dropdown-item" href="{{route('dsp.user', [enkripRambo(12), enkripRambo(auth()->user()->getYear())])}}">
                           Desember
                       </a>
                     </div>
                  </div> --}}
                  {{-- <div class="dropdown d-inline">
                     <button class="btn btn-light border btn-sm shadow-none dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       {{$year}}
                     </button>
                     <div class="dropdown-menu">
                       <a class="dropdown-item" href="{{route('dsp.marine.intermilan', [enkripRambo($month), enkripRambo(2024)])}}">
                         2024
                       </a>
                       <a class="dropdown-item" href="{{route('dsp.marine.intermilan', [enkripRambo($month), enkripRambo(2023)])}}">
                           2023
                       </a>
                       <a class="dropdown-item" href="{{route('dsp.marine.intermilan', [enkripRambo($month), enkripRambo(2022)])}}">
                           2022
                       </a>
                     </div>
                  </div> --}}
               </div>
               
            </div>
            
            <div class="card shadow-sm border mt-2">
               {{-- <div class="card-header">
                  <small>INTERMILAN</small>
               </div> --}}
               <div class="card-body">
                  
                  
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                     @foreach ($dates as $date)
                     <li class="nav-item">
                        @if ($allRequests->where('date', $date->format('Y-m-d'))->first() != null)
                        <a class="nav-link" id="date-{{$date->format('d')}}-tab" data-toggle="tab" href="#date-{{$date->format('d')}}" role="tab" aria-controls="date-{{$date->format('d')}}" aria-selected="true"><div class="badge badge-danger">
                           {{$date->format('d')}}
                           {{-- {{$date->format('Y-m-d')}} --}}
                        </div></a>
                        @else 
                        <a class="nav-link" id="date-{{$date->format('d')}}-tab" data-toggle="tab" href="#date-{{$date->format('d')}}" role="tab" aria-controls="date-{{$date->format('d')}}" aria-selected="true"><div class="badge badge-info">
                           {{$date->format('d')}}
                           {{-- {{$date->format('Y-m-d')}} --}}
                        </div></a>
                        @endif
                     </li>
                     @endforeach
                     
                  </ul>
                  <div class="tab-content" id="myTabContent">
                     <div class="tab-pane fade show active text-center" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="text-muted mt-4 mb-4">klik tanggal diatas untuk menampilkan data Intermilan</div>
                     </div>
                     @foreach ($dates as $date)
                     <div class="tab-pane fade " id="date-{{$date->format('d')}}" role="tabpanel" aria-labelledby="date-{{$date->format('d')}}-tab">
                        <table>
                           <thead>
                              <tr>
                                 <td colspan="6">{{$date->format('d F Y')}}</td>
                              </tr>
                              <tr>
                                 <td>ID</td>
                                 <td>Location</td>
                                 {{-- <td>Activity</td> --}}
                                 {{-- <td>Required Boat</td> --}}
                                 <td>Boat Assigned</td>
                                 <td>User</td>
                                 <td>Status</td>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($allRequests as $req)
                                 @if ($req->date == $date->format('Y-m-d'))
                                    <tr>
                                       <td>
                                          <a href="{{route('request.detail.new', enkripRambo($req->id))}}">{{$req->desc}}</a>
                                       </td>
                                       <td>
                                          @if ($req->activity_id == 5)
                                             {{$req->employee->name}}
                                              @else
                                              {{$req->origin->name ?? '-'}} - {{$req->destination->name ?? '-'}}
                                          @endif
                                          
                                       </td>
                                       
                                       {{-- <td>{{$req->activity->name}}</td> --}}
                                       
                                       {{-- <td>{{$req->schedule->vessel->type ?? '-'}}</td> --}}
                                       <td>{{$req->schedule->vessel->name ?? '-'}}</td>
                                       <td>{{$req->employee->name ?? '-'}}</td>
                                       <td><x-status-stisla.request-plain :request="$req" /></td>
                                    </tr>
                                    @if ($req->activity_id == 1)
                                    <tr>
                                       <td colspan="7">
                                          <small>
                                          @foreach ($req->cargoItems as $item)
                                              {{$item->desc}},
                                          @endforeach
                                          @if (count($req->passengerItems) >  0)
                                          {{count($req->passengerItems)}} Total Passenger
                                          @endif
                                          </small>
                                       </td>
                                    </tr>
                                 
                                    @endif
                                    @if ($req->activity_id == 2)
                                    <tr>
                                       <td colspan="7">
                                          <small>
                                             @if (count($req->passengerItems) >  0)
                                             {{count($req->passengerItems)}} Total Passenger (
                                             {{count($req->passengerItems->where('type', 'Departure'))}} Berangkat, {{count($req->passengerItems->where('type', 'Return'))}} Pulang)
                                             @endif
                                          
                                          </small>
                                       </td>
                                    </tr>
                                 
                                    @endif
                                    
                                    
                                    @else
                                    
                                 @endif
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                     @endforeach
                     
                  </div>
               </div>
            </div>
            
        
         </div>

         
      </div>
   </section>
@endsection

