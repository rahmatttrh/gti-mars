@extends('layouts.stisla.app')
@section('title')
    DSP Intermilan Management 
@endsection
@section('content')
<section class="section">

   <style>
      table {
         font-size: 11px;
      }

      td {
  border-right: solid 1px rgb(255, 255, 255); 
  border-left: solid 1px rgb(255, 255, 255);
  line-height: 1.2 !important;
}

input {
      border:0;
      outline:0;
      text-align: center; 
      /* background-color: rgb(226, 236, 151) */
      
   }
   </style>
   
   <div class="section-body">
      <div class="row">
         <div class="col-md-9">

            <div class="card">
               
              
               <div class="card-body">
                  <div class="d-flex justify-content-between">
                     <div class="">
                        <h5>INTERMILAN {{formatDate($start)}} - {{formatDate($end)}}</h5>
                        <span>{{$intermilan->title}}</span>
                     </div>
                     
                  <a href="{{route('document.intermilan.export', [enkripRambo($start),enkripRambo($end)])}}" target="_blank" class="" data-toggle="tooltip" data-placement="top" title="Export PDF">Export PDF </a>
                  </div>
                  
                  <hr>
                 <ul class="nav nav-tabs" id="myTab" role="tablist">
                   <li class="nav-item">
                     <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Intermilan</a>
                   </li>
                   <li class="nav-item">
                     <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Crew</a>
                   </li>
                   <li class="nav-item">
                     <a class="nav-link" id="contact-tab"  href="{{route('intermilan.marine.risalah', enkripRambo($intermilan->id))}}"  aria-controls="contact" aria-selected="false">Risalah</a>
                   </li>
                 </ul>
                 <div class="tab-content" id="myTabContent">
                   <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                     <a data-toggle="collapse" href="#formRequest">Add Row...</a>
                     <div class="collapse" id="formRequest">
                        <form action="{{route('intermilan.marine.request.store')}}" method="POST">
                           @csrf
                           <input type="text" name="intermilan" id="intermilan" value="{{$intermilan->id}}" hidden>
                           
                           <table class="table table-sm table-striped border">
                              <tr>
                                 {{-- <td class="text-center bg-y" style="width: 180px">
                                    <input  style="background-color: rgb(226, 236, 151)" class="w-100 }" type="text" style="border-color: red!"  >
                                 </td> --}}
                                 <td style="width:150px">
                                    {{-- <select  name="user" id="user"  style="padding: 5px; width:100%" required>
                                       @foreach ($ports as $port)
                                          <option value="">{{$port->name}}</option>
                                       @endforeach
                                    </select> --}}
                                    <select  style="width:100%; border:none !important; padding-left:none; text-align: left !important;padding-top: 5px;padding-bottom: 5px;" name="user" id="user">
                                       <option value="" selected disabled>User</option>
                                       @foreach ($ports as $port)
                                       <option value="{{$port->id}}">{{$port->name}}</option>
                                    @endforeach
                                       
                                    </select>
                                 </td>
                                 <td style="width:320px">
                                    <input type="text" name="desc" id="desc" style="width:100%; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Activity...">
                                    
                                 </td>
                                 <td >
                                    <select  style="width:130px;border:none !important; padding-left:none; text-align: left !important;padding-top: 5px;padding-bottom: 5px;" id="origin"  name="origin">
                                       <option value="" selected disabled>Origin</option>
                                       @foreach ($ports as $port)
                                          <option {{ old('origin') == $port->id ? 'selected' : '' }} value="{{ $port->id }}">{{ $port->name }}</option>
                                       @endforeach
                                       
                                    </select>
                                    <select  style="width:130px;border:none !important;; padding-left:none; text-align: left !important;padding-top: 5px;padding-bottom: 5px;" id="destination"  name="destination">
                                       <option value="" selected disabled>Destination</option>
                                       @foreach ($ports as $port)
                                          <option {{ old('origin') == $port->id ? 'selected' : '' }} value="{{ $port->id }}">{{ $port->name }}</option>
                                       @endforeach
                                       
                                    </select>
                                    {{-- <select class="" id="origin"  name="origin" style="padding: 5px; width:150px">
                                       <option disabled selected>Origin</option>
                                       @foreach ($ports as $port)
                                          <option {{ old('origin') == $port->id ? 'selected' : '' }} value="{{ $port->id }}">{{ $port->name }}</option>
                                       @endforeach
                                       
                                    </select> --}}
                                    {{-- <select class=" " id="destination"  name="destination" style="padding: 5px;width:150px">
                                       <option disabled selected>Destination</option>
                                       @foreach ($ports as $port)
                                          <option {{ old('destination') == $port->id ? 'selected' : '' }} value="{{ $port->id }}">{{ $port->name }}</option>
                                       @endforeach
                                      
                                    </select> --}}
                                 </td>
                                 <td>
                                    <button class="btn btn-sm btn-primary btn-block" type="submit" > Add</button> 
                                 </td>
                              </tr>
                           </table>
                           {{-- <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group form-group-default">
                                    <label>User</label>
                                    
                                    
                                 </div>
                              </div>
                              <div class="form-group col-md-3">
                                 <label>Origin/From</label>
                                 <select class="custom-select origin" id="origin"  name="origin">
                                    <option disabled selected>Choose one</option>
                                    @foreach ($ports as $port)
                                       <option {{ old('origin') == $port->id ? 'selected' : '' }} value="{{ $port->id }}">{{ $port->name }}</option>
                                    @endforeach
                                    
                                 </select>
                              </div>
                              <div class="form-group col-md-3 ">
                                 <label>Destination</label>
                                 <select class="custom-select " id="destination"  name="destination">
                                    <option disabled selected>Choose one</option>
                                    @foreach ($ports as $port)
                                       <option {{ old('destination') == $port->id ? 'selected' : '' }} value="{{ $port->id }}">{{ $port->name }}</option>
                                    @endforeach
                                   
                                 </select>
                              </div>
                              
                           </div>
                           <div class="form-group form-group-default">
                              
                              <input type="text" name="activity" id="activity" class="form-control" required placeholder="Activity...">
                           </div> --}}
                           
                           
                           
                          
                           
                           
                           
                        </form>  
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

                              @if ($requests->count() > 0)
                                 @foreach ($requests as $item)
                                    @if ($item->user->getPort()->func = 'DWI')
                                    <tr class="border" style="background-color: rgb(242, 248, 221)">
                                       @else
                                       <tr style="background-color: rgb(230, 221, 252)">
                                    @endif
                                    <td  class="text-uppercase bg-light">
                                      <a data-toggle="collapse" href="#formItem-{{$item->id}}">{{$item->user->username}}</a> 
                                    </td>
                                   
                                       <td >
                                          {{$item->description}} (
                                             @foreach ($item->cargoItems as $cargo)
                                                 <a data-toggle="collapse" href="#formItemEdit-{{$cargo->id}}">{{$cargo->description}}</a>,
                                             @endforeach
                                          )
                                       </td>
                                       <td class="text-truncate">
                                          {{-- @if ($request->activity_id < 5)
                                          {{$request->origin->code}} to {{$request->destination->code}}
                                          @else
                                          
                                          @endif --}}
                                          {{$item->origin->code}}
                                          {{-- @if ($request->origin->port_id != null)
                                             ({{$request->origin->port->code}})
                                              
                                          @endif --}}
                                           - {{$item->destination->code}}
                                       </td>
                                       <td>{{formatDateB($item->date)}}</td>
                                       <td class="d-flex align-items-center">
                                          @if ($item->activity_id == 1 || $item->activity_id == 2)
                                             <form action="{{route('intermilan.marine.select.schedule.list')}}" method="POST" class="d-flex">
                                                @csrf
                                                @method('PUT')
                                                <input type="text" name="requestId" id="requestId" value="{{$item->id}}" hidden>
                                                <select style="width: 120px" name="schedule" id="schedule" required>
                                                   <option value="" selected disabled>Select Schedule {{$item->schedule_id}}</option>
                                                   {{-- <option value=""><a href="/">OK</a></option> --}}
                                                   @foreach ($schedules as $sche)
                                                      @if ($sche->class == 'Cargo' || $sche->class == 'Crew')
                                                      <option {{$item->schedule_id == $sche->id ? 'selected' : ''}} value="{{$sche->id}}">{{$sche->vessel->name}} </option>
                                                      @endif
                                                      
                                                   @endforeach
                                                   
                                                </select>
                                                @if ($item->status == 1)
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
                                                <input type="text" name="requestId" id="requestId" value="{{$item->id}}" hidden>
                                                <input type="text" name="scheduleId" id="scheduleId" value="{{$item->schedule->id}}" hidden>
                                                <select style="width: 150px" name="vessel" id="vessel">
                                                   <option value="" selected disabled>Select Vessel</option>
                                                   @foreach ($vessels as $vessel)
         
                                                      <option {{$item->schedule->vessel_id == $vessel->id ? 'selected' : ''}} value="{{$vessel->id}}">{{$vessel->name ?? '-'}}</option>
                                                   @endforeach
                                                   
                                                </select>
                                                @if ($item->schedule->vessel_id != null)
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


                                       <form action="{{route('intermilan.marine.cargo.store')}}" method="POST">
                                          @csrf
                                          <input type="number" name="requestId" id="requestId" value="{{$item->id}}" hidden>
                                          <tr class="collapse" id="formItem-{{$item->id}}">
                                             {{-- <div > --}}
                                                <td>Add Item</td>
                                                <td colspan="12" >
                                                   <input type="text" name="desc" id="desc" style="width: 250px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Item Name">
                                                   <input type="text" name="qty" id="qty" style="width: 80px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Qty">
                                                   <input type="text" name="unit" id="unit" style=" text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Container/Pallet/Box">
                                                   <input type="text" name="qty_package" id="qty_package" style="width: 80px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Satuan">
                                                   <input type="text" name="weight" id="weight" style="width: 50px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Weight">

                                                   <input type="text" name="contract" id="contract" style=" text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="PO/Contract">
                                                   <input type="text" name="remark" id="remark" style="width: 250px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Remarks">
                                                   <button class="btn btn-sm btn-primary shadow-none" style="height: 30px" type="submit">Submit</button>
                                                   @if ($item->created_by == 'marine')
                                                   <a href="{{route('intermilan.marine.request.delete', enkripRambo($item->id))}}">Delete</a>
                                                   @endif
                                                   
                                                </td>
                                             {{-- </div> --}}
                                          </tr>
                                       </form>


                                       @foreach ($item->cargoItems as $cargo)

                                       <form action="{{route('intermilan.marine.cargo.update')}}" method="POST">
                                          @csrf
                                          @method('PUT')
                                          <input type="number" name="requestId" id="requestId" value="{{$item->id}}" hidden>
                                          <input type="number" name="cargoId" id="cargoId" value="{{$cargo->id}}" hidden>

                                          <tr class="collapse" id="formItemEdit-{{$cargo->id}}">
                                             {{-- <div > --}}
                                                <td>Edit Item</td>
                                                <td colspan="12" >
                                                   <input type="text" name="desc" id="desc" style="width: 250px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required value="{{$cargo->description}}">
                                                   <input type="text" name="qty" id="qty" style="width: 80px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required value="{{$cargo->qty}}">
                                                   <input type="text" name="unit" id="unit" style=" text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required value="{{$cargo->unit}}">
                                                   <input type="text" name="qty_package" id="qty_package" style="width: 80px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required value="{{$cargo->qty_package}}">
                                                   <input type="text" name="weight" id="weight" style="width: 50px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required value="{{$cargo->weight}}">

                                                   <input type="text" name="contract" id="contract" style=" text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required value="{{$cargo->contract}}">
                                                   <input type="text" name="remark" id="remark" style="width: 250px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required value="{{$cargo->remark}}">
                                                   <button class="btn btn-sm btn-light shadow-none" style="height: 30px" type="submit">Update</button>
                                                   {{-- <a class="btn btn-sm btn-danger shadow-none" style="height: 30px" href="#" data-bs-toggle="modal" data-bs-target="#deleteCargo_{{$cargo->id}}" >Delete</a> --}}
                                                   <a class="btn btn-sm btn-danger shadow-none" style="height: 30px" href="{{route('cargo.delete', enkripRambo($cargo->id))}}"  >Delete</a>
                                                </td>
                                             {{-- </div> --}}
                                          </tr>
                                       </form>

                                       
                                       @endforeach
                                    

                                    
                                 @endforeach
                              @endif
                              
                              {{-- @if ($cargoItems->count() > 0)
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
                                         
                                          {{$item->request->origin->code}}
                                         
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
                                               
                                                   Assign
                                                </button>
                                             </form>
                                              @else
                                              
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
                              @endif --}}
                              
                           </tbody>


                           {{-- <thead>
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
                                        
                                          {{$item->request->origin->code}}
                                         
                                           to {{$item->request->destination->code}}
                                       </td>
                                       <td> {{formatDate($item->date)}}</td>
                                       <td class="d-flex align-items-center">
                                          @if ($item->request->activity_id == 1 || $item->request->activity_id == 2)
                                             <form action="{{route('intermilan.marine.select.schedule.list')}}" method="POST" class="d-flex">
                                                @csrf
                                                @method('PUT')
                                                <input type="text" name="cargoItemId" id="cargoItemId" value="{{$item->id}}" hidden>
                                                <select style="width: 150px" name="schedule" id="schedule" required>
                                                   <option value="" selected disabled>Select Schedule {{$item->schedule_id}}</option>
                                                  
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
                                            
                                                   Assign
                                                </button>
                                             </form>
                                              @else
                                          
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
                              
                           </tbody> --}}
                        </table>
                     </div>
                   </div>

                   <div class="tab-pane fade " id="profile" role="tabpanel" aria-labelledby="profile-tab">
                     <div class="table-responsive">
                        <table class=" table-striped border " >
                           <thead>
                              <tr>
                                 <th>Station</th>
                                 <th>Activity</th>
                                 <th>Location</th>
                                 <th>Date</th>
                                 <th>Boat</th>
                                 {{-- @foreach ($dates as $date)
                                    <th class="text-center">{{formatDateOnly($date)}}</th>
                                 @endforeach --}}
                              </tr>
                           </thead>
                           <tbody>
         
                             
                              
                           </tbody>
                        </table>
                     </div>
                   </div>


                   
                   <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                     <div class="form-group col-md-12">

                           <b>A. Info HSSE & Highlight Activitas </b>
                           <table>
                              <tr>
                                 <td>1</td>
                                 <td>Prakiraan cuaca SBU, NBU, CBU 14-21 Oktober 2025</td>
                              </tr>
                           </table>
                        
                        {{-- <textarea class="form-control" id="desc" name="desc"   rows="3"></textarea> --}}
   
                        <textarea name="desc" id="desc" cols="30" rows="5" hidden></textarea>
                      {{-- <span>B</span> --}}
                        <main>
                           <trix-toolbar id="my_toolbar"></trix-toolbar>
                           <div class="more-stuff-inbetween"></div>
                           <trix-editor toolbar="my_toolbar" input="desc" ></trix-editor>
                        </main>
                        {{-- <input type="text" class="form-control text-left" id="desc" name="desc" > --}}
                     </div>


                   </div>
                 </div>
               </div>
             </div>
            
            
            
            
            
            
            
         </div>
         <div class="col-md-3">
            <div class="card shadow">
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

@foreach ($requests as $request)
    @foreach ($request->cargoItems as $cargo)
    <div class="modal modal-blur fade" id="deleteCargo_{{$cargo->id}}" tabindex="" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="modal-title">Are you sure?</div>
            <div>If you proceed, you will lose data of <b>-</b>.</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
            <a href="{{route('activity.delete', enkripRambo($cargo->id))}}" class="btn btn-danger" >Yes, delete this data</a>
            {{-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Yes, delete all my data</button> --}}
          </div>
        </div>
      </div>
   </div>
    @endforeach
@endforeach


    
@endsection