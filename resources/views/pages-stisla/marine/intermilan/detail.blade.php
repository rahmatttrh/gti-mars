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
         <div class="col-md-12">
            
            <div class="card shadow">
               
              
               <div class="card-body">
                  
                  <a href="" class="btn btn-sm btn-primary mb-2">Submit</a>
                  <a class="btn btn-sm btn-light border mb-2" href="{{route('document.intermilan.export', [enkripRambo($start),enkripRambo($end)])}}" target="_blank" class="" data-toggle="tooltip" data-placement="top" title="Export PDF">Export PDF </a>
                  <div class="d-flex justify-content-between">
                     <div class="">
                        <span>{{$intermilan->code}} </span> <br>
                        <span>{{$intermilan->title}}</span>
                        <h5 class="mb--2">
                        
                           INTERMILAN {{formatDate($start)}} - {{formatDate($end)}}</h5>
                        
                     </div>
                     
                     
                  
                  </div>
                  
                  {{-- <hr> --}}
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

                     <li class="nav-item">
                        <a class="nav-link" id="ok-tab" data-toggle="tab" href="#ok" role="tab" aria-controls="ok" aria-selected="false">Schedule</a>
                     </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                     <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                           <div class="col-md-10">
                              <a data-toggle="collapse" href="#formRequest">Add Row</a> |
                              <a data-toggle="collapse" href="#formSchedule">Add Schedule</a> |
                              <a href="{{asset('template/template-import-material.xlsx')}}">Download Template Import Material</a>
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
                              <div class="collapse" id="formSchedule">
                                 <form action="{{route('schedule.store.so')}}" method="POST">
                                    @csrf
                                    <input type="date" name="start" id="start" value="{{$start}}" hidden>
                                       <input type="date" name="end" id="end" value="{{$end}}" hidden>
                                    <table class="table table-sm table-striped border">
                                       <tr>
                                          
                                          <td style="width:150px">
                                             
                                             

                                             <select name="vessel" id="vessel" style="width:100%; border:none !important; padding-left:none; text-align: left !important;padding-top: 5px;padding-bottom: 5px;">
                                                <option value="" selected disabled>Select Vessel</option>
                                                @foreach ($vessels as $vessel)
                                                      <option value="{{$vessel->id}}">{{$vessel->name}}</option>
                                                @endforeach
                                             </select>
                                          </td>
                                          <td style="width:100px">
                                             <input type="date" name="date" id="date" style="width:100%; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Activity...">
                                             
                                          </td>
                                          
                                          <td>
                                             <button class="btn btn-sm btn-primary" type="submit" > Add</button> 
                                          </td>
                                       </tr>
                                    </table>
                                 </form>  
                              </div>
                              <div class="table-responsive">
                                 <table class=" table-striped border " >
                                    <thead>
                                       <tr>
                                          <th>Station</th>
                                          <th>Activity</th>
                                          <th>Status</th>
                                          <th>Location</th>
                                          <th>Date</th>
                                          <th>Boat</th>
                                          @foreach ($dates as $date)
                                             <th class="text-center">{{formatDateOnly($date)}}</th>
                                          @endforeach
                                       </tr>
                                    </thead>
                                    <tbody class="" id="myAccordion">

                                       @if ($requests->count() > 0)
                                          @foreach ($requests as $item)
                                             @if ($item->user->getPort()->func = 'DWI')
                                             <tr class="border" style="background-color: rgb(242, 248, 221)">
                                                @else
                                                <tr style="background-color: rgb(230, 221, 252)">
                                             @endif
                                             <td  class="text-uppercase bg-light">
                                             <a data-toggle="collapse" href="#requestAction-{{$item->id}}">{{$item->user->username}}</a> 
                                             {{-- <a data-toggle="collapse" href="#formItem-{{$item->id}}">{{$item->user->username}}</a>  --}}
                                             </td>
                                          
                                                <td >
                                                   {{-- <a data-toggle="collapse" href="#formRequestActionDrop-{{$item->id}}">{{$item->description}}</a> --}}
                                                @if ($item->transit == 1)
                                                      <i><b>[Transit]</b> </i>
                                                @endif
                                                   {{$item->description}}
                                                   
                                                   @if (count($item->cargoItems) > 0)
                                                   (
                                                      @foreach ($item->cargoItems as $cargo)
                                                         <a data-toggle="collapse" href="#formItemEdit-{{$cargo->id}}">{{$cargo->description}}</a>,
                                                      @endforeach
                                                   )
                                                   @endif

                                                   @if ($item->remark != null)
                                                      <i> ({{$item->remark}})</i>
                                                   @endif
                                                   
                                                </td>
                                                <td>
                                                   <x-status-stisla.request-plain :request="$item" />
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
                                                         <select style="width: 140px" name="schedule" id="schedule" required>
                                                            <option value="" selected disabled>Select Schedule {{$item->schedule_id}}</option>
                                                            {{-- <option value=""><a href="/">OK</a></option> --}}
                                                            @foreach ($schedules as $sche)
                                                               @if ($sche->class == 'Cargo' || $sche->class == 'Crew')
                                                               <option {{$item->schedule_id == $sche->id ? 'selected' : ''}} value="{{$sche->id}}">{{formatDateOnly($sche->date)}} {{$sche->vessel->name}} </option>
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

                                             <tr class="collapse" id="requestAction-{{$item->id}}" data-parent="#myAccordion">
                                                <td class="border py-2"></td>
                                                <td class="border py-2">
                                                   <a data-toggle="collapse" href="#formItem-{{$item->id}}">Add Item</a> |
                                                   <a data-toggle="collapse" href="#formImportItem-{{$item->id}}">Import Item</a> |
                                                   <a data-toggle="collapse" href="#formRequestActionDrop-{{$item->id}}">Drop Point</a> |
                                                   
                                                   
                                                   <a href="">Complete</a> 
                                                   @if (auth()->user()->hasRole('marine') && $item->created_by == 'marine')
                                                   | <a data-toggle="collapse" href="#formRequestDelete-{{$item->id}}">Delete</a>
                                                   @endif
                                                   

                                                </td>
                                             </tr>


                                                <form action="{{route('intermilan.marine.cargo.store')}}" method="POST">
                                                   @csrf
                                                   <input type="number" name="requestId" id="requestId" value="{{$item->id}}" hidden>
                                                   <tr class="collapse" id="formItem-{{$item->id}}" data-parent="#myAccordion">
                                                      {{-- <div > --}}
                                                         <td class="border">Add Item </td>
                                                         <td colspan="12" class="border">

                                                            <table>
                                                               <tbody>
                                                                  <tr>
                                                                     <td class="border"><b>Material Name</b></td>
                                                                     <td class="border"><b>Qty</b></td>
                                                                     <td class="border"><b>Unit/Satuan</b></td>
                                                                     <td class="border"></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td class="border"><input type="text" name="desc" id="desc" style="width: 100%; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Item Name"></td>
                                                                     <td class="border" style="width: 80px"><input type="text" name="qty" id="qty" style="width: 100%; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Qty"></td>
                                                                     <td class="border"><input type="text" name="unit" id="unit" style="width: 100%; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Container/Pallet/Box"></td>
                                                                     <td class="border"><button class="btn btn-sm btn-block btn-primary shadow-none" style="height: 30px" type="submit">Submit</button></td>
                                                                  </tr>

                                                                  <tr>
                                                                     <td class="border"><b>PO/Contract</b></td>
                                                                     <td class="border"><b>Weight</b></td>
                                                                     <td class="border" colspan=""><b>Remark</b></td>
                                                                     <td class="border" rowspan="">
                                                                        
                                                                        
                                                                     </td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td class="border"><input type="text" name="contract" id="contract" style="width:100%; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="PO/Contract"></td>
                                                                     <td class="border" style="width: 80px"><input type="text" name="weight" id="weight" style="width: 100%; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Weight"></td>
                                                                     <td class="border" colspan=""><input type="text" name="remark" id="remark" style="width:100%; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Remarks"></td>
                                                                     <td class="border">
                                                                        {{-- @if ($item->created_by == 'marine')
                                                                        <a href="{{route('intermilan.marine.request.delete', enkripRambo($item->id))}}" class="text-danger">Delete</a>
                                                                        @endif --}}
                                                                     </td>
                                                                  </tr>
                                                               </tbody>
                                                            </table>
                                                            <div class="row">
                                                               <div class="col-4">
                                                                  
                                                                  
                                                                  {{-- <input type="text" name="qty_package" id="qty_package" style="width: 80px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Satuan"> --}}
                                                                  

                                                                  
                                                                  
                                                               </div>
                                                               <div class="col-4">
                                                                  
                                                                  
                                                               </div>
                                                               <div class="col-4">
                                                                  
                                                               </div>
                                                            </div>
                                                            
                                                            
                                                            
                                                         </td>
                                                      {{-- </div> --}}
                                                   </tr>
                                                </form>

                                                <form action="{{route('intermilan.marine.request.material.import')}}" method="POST" enctype="multipart/form-data">
                                                   @csrf
                                                   <input type="number" name="requestId" id="requestId" value="{{$item->id}}" hidden>
                                                   <tr class="collapse" id="formImportItem-{{$item->id}}" data-parent="#myAccordion">
                                                      {{-- <div > --}}
                                                         <td class="border">Import Item</td>
                                                         <td colspan="12" >

                                                            <table>
                                                               <tbody>
                                                                  <tr>
                                                                     
                                                                     <td class="border"><b>File Excel</b> <span class="text-muted">(Format Excel harus mengikuti Template Import yang tersedia)</span></td>
                                                                     <td class="border"></td>
                                                                     
                                                                  </tr>
                                                                  <tr>
                                                                     <td class="border">
                                                                        <input type="file" required name="file" id="file" style="width: 250px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Item Name">
                                                                        <button class="btn btn-sm  btn-primary shadow-none" style="height: 30px" type="submit">Import</button></td>
                                                                     
                                                                     <td class="border"></td>
                                                                  </tr>

                                                                  
                                                               </tbody>
                                                            </table>
                                                            <div class="row">
                                                               <div class="col-4">
                                                                  
                                                                  
                                                                  {{-- <input type="text" name="qty_package" id="qty_package" style="width: 80px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Satuan"> --}}
                                                                  

                                                                  
                                                                  
                                                               </div>
                                                               <div class="col-4">
                                                                  
                                                                  
                                                               </div>
                                                               <div class="col-4">
                                                                  
                                                               </div>
                                                            </div>
                                                            
                                                            
                                                            
                                                         </td>
                                                      {{-- </div> --}}
                                                   </tr>
                                                </form>

                                                <form action="{{route('intermilan.marine.request.drop')}}" method="POST">
                                                   @csrf
                                                   <input type="number" name="requestId" id="requestId" value="{{$item->id}}" hidden>
                                                   <tr class="collapse" id="formRequestActionDrop-{{$item->id}}" data-parent="#myAccordion">
                                                      {{-- <div > --}}
                                                         <td class="border">Drop Action</td>
                                                         <td class="border" colspan="12" >

                                                            <table>
                                                               <tbody>
                                                                  <tr>
                                                                     <td class="border"><b>Origin</b></td>
                                                                     <td class="border"><b>Drop Point</b></td>
                                                                     <td class="border"><b>Destination</b></td>
                                                                     <td class="border"></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td class="border">
                                                                        <select name="origin" id="origin" style="border: none">
                                                                           @foreach ($ports as $port)
                                                                              
                                                                              <option {{$item->origin_id == $port->id ? 'selected' : ''}} value="{{$port->id}}">{{$port->code}}</option>
                                                                           @endforeach
                                                                        </select>
                                                                        {{-- <input type="text" name="desc" id="desc" style="width: 100%; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Item Name"> --}}
                                                                     </td>
                                                                     <td class="border">
                                                                        <select name="drop" id="drop" style="border: none">
                                                                           <option value="" selected disabled>Select</option>
                                                                           @foreach ($ports as $port)
                                                                              
                                                                              <option  value="{{$port->id}}">{{$port->code}}</option>
                                                                           @endforeach
                                                                        </select>
                                                                        {{-- <input type="text" name="desc" id="desc" style="width: 100%; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Item Name"> --}}
                                                                     </td>
                                                                     <td class="border">
                                                                        <select name="destination" id="destination" style="border: none">
                                                                           @foreach ($ports as $port)
                                                                              
                                                                              <option {{$item->destination_id == $port->id ? 'selected' : ''}} value="{{$port->id}}">{{$port->code}}</option>
                                                                           @endforeach
                                                                        </select>
                                                                        {{-- <input type="text" name="desc" id="desc" style="width: 100%; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Item Name"> --}}
                                                                     </td>
                                                                     {{-- <td class="border">
                                                                        <select name="" id="">
                                                                           @foreach ($schedules as $sche)
                                                                              @if ($sche->class == 'Cargo' || $sche->class == 'Crew')
                                                                              <option {{$item->schedule_id == $sche->id ? 'selected' : ''}} value="{{$sche->id}}">{{$sche->vessel->name}} </option>
                                                                              @endif
                                                                              
                                                                           @endforeach
                                                                        </select>
                                                                        <input type="text" name="desc" id="desc" style="width: 100%; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Item Name">
                                                                     </td> --}}
                                                                     <td class="border"><button class="btn btn-sm btn-block btn-primary shadow-none" style="height: 30px" type="submit">Submit</button></td>
                                                                  </tr>

                                                                  <tr>
                                                                     <td class="border" colspan="4"><b>Remark</b></td>
                                                                     
                                                                        
                                                                        
                                                                     </td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td class="border" colspan="4"><input type="text" name="remark" id="remark" style="width:100%; text-align: left !important;padding-top: 7px;padding-bottom: 7px;"  placeholder="Input remarks.."></td>
                                                                     
                                                                  </tr>
                                                                  <tr>
                                                                     <td colspan="4"><small>Jika Drop Point dipilih, sistem akan otomatis duplikasi aktifitas dengan tujuan yang sama</small></td>
                                                                  </tr>
                                                               </tbody>
                                                            </table>
                                                            <div class="row">
                                                               <div class="col-4">
                                                                  
                                                                  
                                                                  {{-- <input type="text" name="qty_package" id="qty_package" style="width: 80px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Satuan"> --}}
                                                                  

                                                                  
                                                                  
                                                               </div>
                                                               <div class="col-4">
                                                                  
                                                                  
                                                               </div>
                                                               <div class="col-4">
                                                                  
                                                               </div>
                                                            </div>
                                                            
                                                            
                                                            
                                                         </td>
                                                      {{-- </div> --}}
                                                   </tr>
                                                </form>


                                                <form action="{{route('intermilan.marine.request.delete')}}" method="POST">
                                                   @csrf
                                                   <input type="number" name="requestId" id="requestId" value="{{$item->id}}" hidden>
                                                   <tr class="collapse" id="formRequestDelete-{{$item->id}}" data-parent="#myAccordion">
                                                      {{-- <div > --}}
                                                         <td class="border">Delete Request</td>
                                                         <td colspan="12" >

                                                            <table>
                                                               <tbody>
                                                                  <tr>
                                                                     
                                                                     <td class="border"><b>Delete Request Activity?</b></td>
                                                                     <td class="border"></td>
                                                                     
                                                                  </tr>
                                                                  <tr>
                                                                     <td class="border">
                                                                        
                                                                        <button class="btn btn-sm  btn-danger shadow-none" style="height: 30px" type="submit">Delete</button></td>
                                                                     
                                                                     <td class="border"></td>
                                                                  </tr>

                                                                  
                                                               </tbody>
                                                            </table>
                                                            <div class="row">
                                                               <div class="col-4">
                                                                  
                                                                  
                                                                  {{-- <input type="text" name="qty_package" id="qty_package" style="width: 80px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Satuan"> --}}
                                                                  

                                                                  
                                                                  
                                                               </div>
                                                               <div class="col-4">
                                                                  
                                                                  
                                                               </div>
                                                               <div class="col-4">
                                                                  
                                                               </div>
                                                            </div>
                                                            
                                                            
                                                            
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

                                                   <tr class="collapse" id="formItemEdit-{{$cargo->id}}" data-parent="#myAccordion">
                                                      {{-- <div > --}}
                                                         <td class="border">Edit Item</td>
                                                         <td class="border" colspan="12" >
                                                            <table>
                                                               <tbody>
                                                                  <tr>
                                                                     <td class="border"><b>Material name</b></td>
                                                                     <td class="border"><b>Qty</b></td>
                                                                     <td class="border"><b>Unit</b></td>
                                                                     <td class="border"></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td class="border"><input type="text" name="desc" id="desc" style="width:100%; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required value="{{$cargo->description}}"></td>
                                                                     <td class="border" style="width: 80px"><input type="text" name="qty" id="qty" style="width:100%; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required value="{{$cargo->qty}}"></td>
                                                                     <td class="border"><input type="text" name="unit" id="unit" style="width:100%; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required value="{{$cargo->unit}}"></td>
                                                                     <td class="border"><button class="btn btn-sm btn-light btn-block shadow-none" style="height: 30px" type="submit">Update</button></td>
                                                                  </tr>

                                                                  <tr>
                                                                     <td class="border"><b>PO/Contract</b></td>
                                                                     <td class="border"><b>Weight</b></td>
                                                                     <td class="border"><b>Remark</b></td>
                                                                     <td class="border"></td>
                                                                  </tr>
                                                                  <tr>
                                                                     <td class="border"><input type="text" name="contract" id="contract" style="width:100%; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required value="{{$cargo->contract}}"></td>
                                                                     <td class="border"><input type="text" name="weight" id="weight" style="width:100%; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required value="{{$cargo->weight}}"></td>
                                                                     <td class="border"><input type="text" name="remark" id="remark" style="width:100%; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required value="{{$cargo->remark}}"></td>
                                                                     <td class="border"><a class="text-danger" style="height: 30px" href="{{route('cargo.delete', enkripRambo($cargo->id))}}"  >Delete</a></td>
                                                                  </tr>
                                                               </tbody>
                                                            </table>

                                                            {{-- <div class="row">
                                                               <div class="col-md-6">
                                                                  <div>
                                                                     <label for="">Name:</label>
                                                                     
                                                                  </div>
                                                               </div>
                                                               <div class="col-md-6">
                                                                  <span>
                                                                     <label for="">Qty</label>
                                                                     
                                                                     
                                                                  </span>
                                                                  <span>
                                                                     <label for="">Unit:</label>
                                                                     
                                                                  </span>
                                                               </div>
                                                               <div class="col-md-3">
                                                                  <span>
                                                                     
                                                                  </span>
                                                               </div>
                                                            </div>

                                                            <span>
                                                               <label for="">Satuan Package:</label>
                                                               <input type="text" name="qty_package" id="qty_package" style="width: 80px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required value="{{$cargo->qty_package}}">
                                                            </span>
                                                            
                                                            <span>
                                                               <label for="">Weight:</label>
                                                               
                                                            </span>

                                                            <span>
                                                               <label for="">No Contract:</label>
                                                               
                                                            </span>

                                                            <span>
                                                               <label for="">Remark:</label>
                                                               
                                                            </span> --}}
                                                            
                                                            
                                                            
                                                            
                                                            

                                                            
                                                            
                                                            
                                                            
                                                            
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
                           <div class="col-md-2">
                              
                                 <table>
                                    <thead>
                                       <tr><th colspan="2" class="">Schedule</th></tr>
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
                                 <table class="table table-sm border">
                                    <tbody>
                                       <tr>
                                          <th colspan="2" class="border">Description</th>
                                          
                                       </tr>
                                       <tr>
                                          <td class="border">Color</td>
                                          <td class="border">Keterangan</td>
                                       </tr>
                                       <tr>
                                          <td class="bg-draft border"></td>
                                          <td class="border">Draft</td>
                                       </tr>
                                       <tr>
                                          <td class="bg-assigned border"></td>
                                          <td class="border">Assigned</td>
                                       </tr>
                                       <tr>
                                          <td class="bg-complete border"></td>
                                          <td class="border">Complete</td>
                                       </tr>
                                    </tbody>
                                 </table>
                           </div>
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

                        <div class="tab-pane fade " id="ok" role="tabpanel" aria-labelledby="ok-tab">
                           <div class="row">
                              <div class="col-md-3">
                                 <div class="badge badge-info mb-2">Schedule</div>
                                 
                                 <table class="table table-sm border">
                                    <tbody>
                                       <tr>
                                          <th colspan="2" class="border">Description</th>
                                          
                                       </tr>
                                       <tr>
                                          <td class="border">Color</td>
                                          <td class="border">Keterangan</td>
                                       </tr>
                                       <tr>
                                          <td class="bg-draft border"></td>
                                          <td class="border">Draft</td>
                                       </tr>
                                       <tr>
                                          <td class="bg-assigned border"></td>
                                          <td class="border">Assigned</td>
                                       </tr>
                                       <tr>
                                          <td class="bg-complete border"></td>
                                          <td class="border">Complete</td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>

                              <div class="col-md-9">
                                 <table class="table table-sm border">
                                    
                                    <tbody>
                                       {{-- <tr><th colspan="4" class="border">Sailing Order</th></tr> --}}
                                       <tr>

                                          <th class="text-center border" style="width: 100px" >Date</th>
                                          <th class="border" colspan="3">Vessel</th>
                                          {{-- <th>Status</th> --}}
                                       </tr>
                                       @foreach ($weekSchedules as $schedule)
                                             <tr>
                                                @if ($schedule->status == 0)
                                                   <td class="text-center bg-draft border">{{formatDateB($schedule->date)}}</td>
                                                   @elseif($schedule->status > 0 && $schedule->status != 11)
                                                   <td class="text-center bg-assigned border">{{formatDateB($schedule->date)}}</td>
                                                   @elseif($schedule->status == 11)
                                                   <td class="text-center bg-complete border">{{formatDateB($schedule->date)}}</td>
                                                @endif
                                                
                                                <td class="border" colspan="3">
                                                   <a href="{{route('schedule.detail', enkripRambo($schedule->id))}}">{{$schedule->vessel->name ?? 'Not Available'}} </a>
                                                   
                                                   
                                                </td>
                                                {{-- <td><x-status-stisla.schedule-plain :schedule="$schedule" /></td> --}}
                                             </tr>
                                             @foreach ($schedule->items as $item)
                                                <tr>
                                                   <td class="border"></td>
                                                   <td class="border">{{$item->description}}</td>
                                                   <td class="border">{{$item->request->origin->name}} - {{$item->request->destination->name}}</td>
                                                   <td class="border">
                                                      <x-status-stisla.request-plain :request="$item->request" />
                                                   </td>
                                                </tr>
                                             @endforeach
                                             
                                       @endforeach
                                       
                                       
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                           
                        </div>
                  </div>
                     
                  
               </div>
             </div>
            
            
            
            
            
            
            
         </div>
        
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