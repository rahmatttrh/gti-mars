@extends('layouts.stisla.app')
@section('title')
    DSP Intermilan Management 
@endsection
@section('content')
<section class="section">

   <style>
      td {
  border-right: solid 1px rgb(255, 255, 255); 
  border-left: solid 1px rgb(255, 255, 255);
}
   </style>
   
   <div class="section-body">
      <div class="row">
         <div class="col-md-9">
            <div class="card">
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-6">
                        <h3>INTERMILAN</h3>
                        <a href="">Detail</a>
                        <hr>
                     </div>
                     <div class="col d-flex justify-content-end">
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
                
                  <div class="table-responsive">
                     <table class=" table-striped border " >
                        <thead>
                           <tr>
                              <th>Station</th>
                              <th>Activity</th>
                              <th>Location</th>
                              <th>Date</th>
                              <th>Boat</th>
                              @foreach ($dates as $date)
                                 <th class="text-center">{{formatDateOnly($date)}}</th>
                              @endforeach
                           </tr>
                        </thead>
                        <tbody>
      
                           @if ($cargoItems->count() > 0)
                              @foreach ($cargoItems as $item)
                                @if ($item->request_id != null)
      
                                @if ($item->request->user->getPort()->func == 'DWI')
                                 <tr class="border" style="background-color: rgb(242, 248, 221)">
                                    @else
                                    <tr style="background-color: rgb(230, 221, 252)">
                                 @endif
                                 <td  class="text-uppercase bg-light">
                                    {{$item->request->user->username}}
                                 </td>
                                
                                    <td >
                                       {{$item->description}}
                                    </td>
                                    <td >
                                       {{-- @if ($request->activity_id < 5)
                                       {{$request->origin->code}} to {{$request->destination->code}}
                                       @else
                                       
                                       @endif --}}
                                       {{$item->request->origin->code}}
                                       {{-- @if ($request->origin->port_id != null)
                                          ({{$request->origin->port->code}})
                                           
                                       @endif --}}
                                        to {{$item->request->destination->code}}
                                    </td>
                                    <td>{{formatDate($item->request->date)}}</td>
                                    <td class="d-flex align-items-center">
                                       @if ($item->request->activity_id == 1 || $item->request->activity_id == 2)
                                          <form action="{{route('intermilan.marine.select.schedule.list')}}" method="POST" class="d-flex">
                                             @csrf
                                             @method('PUT')
                                             <input type="text" name="cargoItemId" id="cargoItemId" value="{{$item->id}}" hidden>
                                             <select style="width: 150px" name="schedule" id="schedule" required>
                                                <option value="" selected disabled>Select Schedule {{$item->schedule_id}}</option>
                                                {{-- <option value=""><a href="/">OK</a></option> --}}
                                                @foreach ($schedules as $sche)
                                                   @if ($sche->class == 'Cargo' || $sche->class == 'Crew')
                                                   <option {{$item->schedule_id == $sche->id ? 'selected' : ''}} value="{{$sche->id}}">{{$sche->vessel->name}} - {{formatDate($sche->date)}}</option>
                                                   @endif
                                                   
                                                @endforeach
                                                
                                             </select>
                                             @if ($item->request->status == 1)
                                                <button class="btn btn-sm border btn-info">
                                                 @else
                                                 <button class="btn btn-sm border btn-light">
                                             @endif
                                             {{-- <button class="btn btn-sm border btn-info"> --}}
                                                {{-- <i class="fa fa-save"></i> --}}
                                                Assign
                                             </button>
                                          </form>
                                           @else
                                           {{-- <a href="{{route('schedule.detail', enkripRambo($request->schedule_id))}}"> {{$request->schedule->vessel->name ?? 'Not Available'}}</a> --}}
                                           <form action="{{route('intermilan.marine.select.vessel')}}" method="POST" class="d-flex">
                                             @csrf
                                             @method('PUT')
                                             <input type="text" name="requestId" id="requestId" value="{{$item->request->id}}" hidden>
                                             <input type="text" name="scheduleId" id="scheduleId" value="{{$item->request->schedule->id}}" hidden>
                                             <select style="width: 150px" name="vessel" id="vessel">
                                                <option value="" selected disabled>Select Vessel</option>
                                                @foreach ($vessels as $vessel)
      
                                                   <option {{$item->request->schedule->vessel_id == $vessel->id ? 'selected' : ''}} value="{{$vessel->id}}">{{$vessel->name ?? '-'}}</option>
                                                @endforeach
                                                
                                             </select>
                                             @if ($item->request->schedule->vessel_id != null)
                                                <button type="submit" class="btn btn-sm border">Assign</button>
                                                @else
                                                <button type="submit" class="btn btn-sm border btn-info">Assign</button>
                                             @endif
                                             
                                          </form>
                                       @endif
                                       
                                       
                                       
                                       
                                    </td>
                                    @foreach ($dates as $date)
                                       @if ($date == $item->date)
                                          <x-status-stisla.item-vessel :item="$item" />
                                          
                                          
                                       @else
                                       <td class="text-center">- </td>
                                       @endif
                                       
                                    @endforeach
                                    
                                 </tr>
                                 @endif
                              @endforeach
                              @else
                              <tr>
                                 <td colspan="4" class="text-center" style="height: 35px">Tidak ada data Intermilan di rentang waktu yang dipilih</td>
                              </tr>
                           @endif
                           
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            
            
            
            
            
            
         </div>
         <div class="col-md-3">
            <div class="card">
               <div class="card-body">
                  <div class="badge badge-info mb-2">Create Sailing Order</div>
            <form action="{{route('schedule.store.so')}}" method="POST">
               @csrf
               {{-- <div class="form-group"> --}}
                  <input type="date" name="start" id="start" value="{{$start}}" hidden>
                  <input type="date" name="end" id="end" value="{{$end}}" hidden>
                  <select name="vessel" id="vessel" class="form-control mb-2">
                     <option value="" selected disabled>Select Vessel</option>
                     @foreach ($vessels as $vessel)
                           <option value="{{$vessel->id}}">{{$vessel->name}}</option>
                     @endforeach
                  </select>
               {{-- </div> --}}
               {{-- <div class="form-group"> --}}
                  <div class="input-group mb-3">
                     {{-- min="{{$start}}" max="{{$end}}" --}}
                     <input type="date" class="form-control" name="date" id="date" value="{{$now->format('Y-m-d')}}"  >
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
               </div>
            </div>
            
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