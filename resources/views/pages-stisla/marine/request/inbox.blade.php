@extends('layouts.stisla.app')
@section('title')
    DSP Intermilan Management 
@endsection
@section('content')
<section class="section">
   
   <div class="section-body">
      <div class="row">
         <div class="col-9">
            <div class="row">
               <div class="col-md-4">
                  <h3>INTERMILAN</h3>
                  <hr>
               </div>
               <div class="col-md-8 d-flex justify-content-end">
                  <form action="{{route('intermilan.filter')}}" method="POST">
                     @csrf
                     <div class="form-group">
                        <div class="input-group">
                        <input type="date" class="form-control" name="start" id="start" value="{{$start}}">
                        <span class="mx-2 mt-3">To</span>
                        <input type="date" class="form-control" name="end" id="end" value="{{$end}}">
                        <div class="input-group-append">
                           <button class="btn btn-light border btn-block " type="submit">Show</button>
                           {{-- <button class="btn btn-light border btn-lg" type="submit">Show</button> --}}
                        </div>
                        {{-- <div class="input-group-append">
                           <a href="" class="btn btn-light border btn-block " >Print</a>
                        </div> --}}
                        </div>
                     </div>
                  </form>

                  <div class="form-group">
                     <a href="{{route('document.intermilan.export', [enkripRambo($start),enkripRambo($end)])}}" target="_blank" class="btn btn-light shadow-sm  ml-1" data-toggle="tooltip" data-placement="top" title="Export PDF"><i class="fa fa-print"></i> </a>
                  </div>
                  
                  
               </div>
            </div>
            {{-- <div class="badge badge-info mb-2">Incoming Request</div> --}}
            
            
            {{-- <div class="badge badge-info mb-2">Incoming Request</div> --}}
            <div class="table-responsive mb-3">
               <table class=" table-striped " >
                  <thead>
                     <tr>
                        <th colspan="2">Waiting Validation</th>
                        {{-- <th>Desc</th> --}}
                        <th>Route</th>
                        <th>User</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($schedules as $schedule)
                        @if (count($schedule->requests->where('status','=', 1)) > 0 )
                              <tr>
                                 <td colspan="4">{{formatDate($schedule->date)}} <a href="{{route('schedule.detail', enkripRambo($schedule->id))}}"> <b>{{$schedule->vessel->name ?? 'Vessel Not Available'}} </b></a></td>
                                 
                                 
                              </tr>
                              @foreach ($schedule->requests->where('status','=', 1) as $request)
                                 <tr>
                                 {{-- <td class="text-center">{{++$i}}</td> --}}
                                 <td></td>
                                 <td><a href="{{route('request.detail', enkripRambo($request->id))}}">
                                 {{$request->desc}}
                                 @foreach ($request->cargoItems as $item)
                                       {{$item->desc}},
                                 @endforeach
                                 </a> </td>
                                 <td>
                                 {{-- @if ($request->activity_id < 5)
                                    {{$request->origin->name}} to {{$request->destination->name}}
                                 @else
                                 @endif --}}

                                 {{$request->origin->name}} to {{$request->destination->name}}
                                 
                                 </td>
                                 <td>{{$request->user->name}}</td>
                                 {{-- <td>
                                 <x-status-stisla.request :request="$request" />
                                 </td> --}}
                                 {{-- <td><a href="{{route('request.detail', enkripRambo($request->id))}}">{{$request->code}}</a></td> --}}
                                 {{-- <td><a href="{{route('schedule.detail', enkripRambo($request->schedule_id))}}">{{$request->schedule->vessel->name ?? 'Empty'}}</a></td> --}}
                                 {{-- <td>{{formatDate($request->date)}}</td> --}}
                                 
                                 
                              </tr>
                              @endforeach
                              
                        @endif

                        @if (count($schedule->requests->where('status','=', 101)) > 0)
                        <tr>
                           <td colspan="4">{{formatDate($schedule->date)}} <a href="{{route('schedule.detail', enkripRambo($schedule->id))}}"> <b>{{$schedule->vessel->name ?? 'Vessel Not Available'}} </b></a></td>
                           
                           
                        </tr>
                        <tr>
                           <td></td>
                           <td>{{$schedule->requests->first()->desc }} {{$schedule->requests->first()->fuel->qty }} KL</td>
                           <td>{{$schedule->requests->first()->origin->name }} to {{$schedule->requests->first()->destination->name }}</td>
                        </tr>
                        @endif
                     @endforeach
                     
                     @if (count($requests->where('status', 1)) > 0)
                           @else
                           <tr>
                           <td class="text-center" colspan="4" style="height: 35px">Tidak ada Request Activity dari User</td>
                           </tr>
                     @endif
                  </tbody>
               </table>
            </div>
            {{-- <hr> --}}
            <div class="table-responsive">
               <table class=" table-striped " >
                  <thead>
                     <tr>
                        <th class="text-center">Station</th>
                        <th>Activity</th>
                        <th>Location</th>
                        <th>Boat</th>
                        @foreach ($dates as $date)
                           <th class="text-center">{{formatDateOnly($date)}}</th>
                        @endforeach
                        
                     </tr>
                  </thead>
                  <tbody>

                     @if ($users->count() > 0)
                        @foreach ($users as $user => $reqs)
                           <tr>
                              <td class="text-center text-muted" rowspan="{{count($reqs)+1}}">{{$user}}</td>
                           </tr>
                           @foreach ($reqs as $request)
                           <tr>
                              <td style="width: 240px">
                                 {{$request->description}}
                                 @foreach ($request->cargoItems as $item)
                                       {{$item->desc}},
                                 @endforeach
                              </td>
                              <td style="width:115px">
                                 {{-- @if ($request->activity_id < 5)
                                 {{$request->origin->code}} to {{$request->destination->code}}
                                 @else
                                 
                                 @endif --}}
                                 {{$request->origin->code}} to {{$request->destination->code}}
                              </td>
                              <td>
                                 <a href="{{route('schedule.detail', enkripRambo($request->schedule_id))}}"> {{$request->schedule->vessel->name ?? 'Not Available'}}</a>
                                
                              </td>
                              @foreach ($dates as $date)
                                 @if ($date == $request->date)
                                    <x-status-stisla.request-vessel :request="$request" />
                                    
                                    
                                 @else
                                 <td class="text-center">-</td>
                                 @endif
                                 
                              @endforeach
                           </tr>
                           @endforeach
                        @endforeach
                        @else
                        <tr>
                           <td colspan="4" class="text-center" style="height: 35px">Tidak ada data Intermilan di rentang waktu yang dipilih</td>
                        </tr>
                     @endif
                     
                     {{-- @foreach ($users as $user)
                        @if (count($user->requests->where('status', '>', 1)) > 0)
                        <tr>
                           <td class="text-center" rowspan="{{count($user->requests) +1 }}">{{$user->name}}</td>
                        </tr>
                           @foreach ($requests->where('status', '>', 1) as $request)
                              @if ($request->user_id == $user->id)
                                 <tr>
                                    <td style="width: 220px">
                                       {{$request->desc}}
                                       @foreach ($request->cargoItems as $item)
                                             {{$item->desc}},
                                       @endforeach
                                    </td>
                                    <td style="width:110px">@if ($request->activity_id < 5)
                                       {{$request->origin->code}} to {{$request->destination->code}}
                                       @else
                                       
                                       @endif</td>
                                    <td>
                                       {{$request->schedule->vessel->name ?? 'Not Available'}}
                                    </td>
                                    @foreach ($dates as $date)
                                       @if ($date == $request->date)
                                          <x-status-stisla.request-vessel :request="$request" />
                                          
                                          
                                       @else
                                       <td class="text-center">-</td>
                                       @endif
                                       
                                    @endforeach
                                 </tr>
                                 
                              @endif
                              
                           @endforeach
                        @endif
                           
                     @endforeach --}}
                     
                  </tbody>
               </table>
            </div>
            
            
            
            
            
         </div>
         <div class="col-md-3">
            <div class="badge badge-info mb-2">Create Sailing Order</div>
            <form action="{{route('schedule.store.so')}}" method="POST">
               @csrf
               {{-- <div class="form-group"> --}}
                  <input type="date" name="start" id="start" value="{{$start}}" hidden>
                  <input type="date" name="end" id="end" value="{{$end}}" hidden>
                  <select name="vessel" id="vessel" class="form-control mb-2">
                     @foreach ($vessels as $vessel)
                           <option value="{{$vessel->id}}">{{$vessel->name}}</option>
                     @endforeach
                     <option value="">Elok Jaya</option>
                  </select>
               {{-- </div> --}}
               {{-- <div class="form-group"> --}}
                  <div class="input-group mb-3">
                     <input type="date" class="form-control" name="date" id="date" value="{{$now->format('Y-m-d')}}"  min="{{$start}}" max="{{$end}}">
                     <div class="input-group-append">
                        <button class="btn btn-light border btn-block " type="submit">Create</button>
                     </div>
                  </div>
               {{-- </div> --}}
            </form>
            <table>
               <thead>
                  <tr><th colspan="2" class="">Sailing Order</th></tr>
                  <tr>

                     <th class="text-center">Date</th>
                     <th>Vessel</th>
                     {{-- <th>Status</th> --}}
                  </tr>
               </thead>
               <tbody>
                  @foreach ($weekSchedules as $schedule)
                        <tr>
                        @if ($schedule->status == 0)
                           <td class="text-center bg-draft">{{formatDateOnly($schedule->date)}}</td>
                           @elseif($schedule->status > 0 && $schedule->status != 11)
                           <td class="text-center bg-assigned">{{formatDateOnly($schedule->date)}}</td>
                           @elseif($schedule->status == 11)
                           <td class="text-center bg-complete">{{formatDateOnly($schedule->date)}}</td>
                        @endif
                        
                        <td>
                           <a href="{{route('schedule.detail', enkripRambo($schedule->id))}}">{{$schedule->vessel->name ?? 'Not Available'}} </a>
                           
                           
                        </td>
                        {{-- <td><x-status-stisla.schedule-plain :schedule="$schedule" /></td> --}}
                        </tr>
                  @endforeach
                  <tr>
                     <td></td>
                  </tr>
                  <tr>
                     <th colspan="2">Description</th>
                     
                  </tr>
                  <tr>
                     <td>Color</td>
                     <td>Keterangan</td>
                  </tr>
                  <tr>
                     <td class="bg-draft"></td>
                     <td>Draft</td>
                  </tr>
                  <tr>
                     <td class="bg-assigned"></td>
                     <td>Assigned</td>
                  </tr>
                  <tr>
                     <td class="bg-complete"></td>
                     <td>Complete</td>
                  </tr>
                  
               </tbody>
            </table>
            <hr>
            {{-- <form action="{{route('intermilan.filter')}}" method="POST">
               @csrf
               <div class="">Date Range</div>
               <div class="form-group">
                  <div class="input-group">  
                     <input type="date" class="form-control">
                     <input type="date" class="form-control">
                     
                  </div>
                  </div>
               <div class="form-group">
                  <div class="input-group mb-2">
                     <div class="input-group-prepend">
                        <div class="input-group-text">From</div>
                     </div>
                     <input type="date" class="form-control" id="inlineFormInputGroup" placeholder="Username">
                  </div>
               </div>
               <div class="form-group">
                  <div class="input-group mb-2">
                     <div class="input-group-prepend">
                        <div class="input-group-text">To</div>
                     </div>
                     <input type="date" class="form-control" id="inlineFormInputGroup" placeholder="Username">
                  </div>
               </div>
               <div class="form-group">
                  <div class="input-group">
                     
                     <input type="date" name="start" id="start" class="form-control">
                     <span class="mx-2 mt-3">To</span>
                     <input type="date" name="end" id="end" class="form-control">
                     
                  </div>
                  <button class="btn btn-light border btn-block mt-2" type="submit">Show</button>
               </div>
               <button class="btn btn-light border btn-block mt-2" type="submit">Show</button>
            </form>
            <hr> --}}

            {{-- <table>
               <thead>
                  <tr>
                     <th>Abjad</th>
                     <th>Vessel Name</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td class="bg-triton">A</td>
                     <td>Triton Jawara</td>
                  </tr>
                  <tr>
                     <td class="bg-balihe">B</td>
                     <td>Transko Balihe</td>
                  </tr>
               </tbody>
            </table> --}}

            
            
         </div>
         {{-- <div class="col-md-4">
            <table>
               <thead>
                  <tr>
                     <th>Date</th>
                     <th>Desc</th>
                  </tr>
               </thead>
               <tbody>
                  @if (count($requests) > 0)
                     @foreach ($requests as $req)
                        <tr>
                        <td>{{formatDate($req->date)}}</td>
                        <td>
                           {{$req->desc}} <br>
                           <small>
                           @if ($req->activity_id == 1 || $req->activity_id == 2)
                                 @foreach ($req->cargoItems as $item)
                                    {{$item->desc}}
                                 @endforeach
                                 @if (count($req->passengerItems) >  0)
                                 {{count($req->passengerItems)}} Total Passenger
                                 @endif
                           @endif
                           @if ($req->activity_id == 3)
                           {{$req->origin->name}} - {{$req->destination->name}}
                           @endif
                           @if ($req->activity_id == 5 || $req->activity_id == 6)
                           {{$req->fuel->qty}} KL
                           @endif

                        </small>
                        </td>
                        </tr>
                     @endforeach
                     @else
                     <tr>
                        <td colspan="2" style="height: 200px" class="text-center"><span>Tidak ada Request Activity dari User</span></td>
                     </tr>
                     
                  @endif
                  
               </tbody>
            </table>
         </div> --}}
         
      </div>
   </div>
</section>
    
@endsection