@extends('layouts.stisla.app')
@section('title')
    DSP Intermilan Management 
@endsection
@section('content')
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
         /* text-align: center;  */
         /* background-color: rgb(226, 236, 151) */
         
      }
</style>
<section class="section">

   
   
   <div class="section-body mt--3">
      {{-- Home / Intermilan / Detail --}}
      <div class="row">
         <div class="col-md-12">
            
            <div class="card">
               
              
               <div class="card-body">
                  
                  {{-- <a href="" class="btn  btn-primary mb-2 mr-1">Submit</a>
                  <a class="btn  btn-light border mb-2" href="{{route('document.intermilan.export', [enkripRambo($start),enkripRambo($end)])}}" target="_blank" class="" data-toggle="tooltip" data-placement="top" title="Export PDF">Export PDF </a>
                  <div class="d-flex justify-content-between">
                     <div class="mb-2">
                        <span>{{$intermilan->code}} </span> <br>
                        <span style="font-size: 24px; font-weight:700" class="mb--2 text-uppercase">
                        
                           INTERMILAN {{$intermilan->title}} 
                        </span> <br>
                        <span class="mb-2">{{formatDate($start)}} - {{formatDate($end)}}</span>
                        
                        
                     </div>
                     
                     
                  
                  </div> --}}

                  <div class="row">
                     <div class="col-md-6">
                        
                        <table class="table table-sm border">
                           <tbody>
                              <tr>
                                 <td colspan="2" class="border">
                                     <h5> <i class="text-primary fa fa-calendar-alt"></i> INTERMILAN</h5>
                                 </td>
                              </tr>
                              <tr>
                                 <td class="border">ID</td>
                                 <td class="border">{{$intermilan->code}}</td>
                              </tr>
                              <tr>
                                 <td class="border">Periode</td>
                                 <td class="border">{{formatDate($start)}} - {{formatDate($end)}}</td>
                              </tr><tr>
                                 <td class="border">Title</td>
                                 <td class="border">{{$intermilan->title}}</td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                     <div class="col-md-6">
                        
                            
                        <div class="btn-group">
                           <button onclick="location.reload()" class="btn mb-2 btn-info">
                              <i class="fa fa-refresh"></i>
                              Refresh Data
                            </button>
                           @if (auth()->user()->hasRole('fleet|marine|superuser'))
                           <a href="#" data-toggle="modal" data-target="#modalSubmitIntermilan" class="btn  btn-primary mb-2"><i class="fa fa-paper-plane"></i> Submit</a>
                           <a href="#" class="btn  btn-light border mb-2">Edit</a>
                           <a href="#" class="btn  btn-light border mb-2">Delete</a>
                           @endif
                           
                           <a class="btn  btn-light border mb-2" href="{{route('document.intermilan.export', [enkripRambo($start),enkripRambo($end)])}}" target="_blank" class="" data-toggle="tooltip" data-placement="top" title="Export PDF">
                              <i class="fa fa-file"></i>
                              Export PDF 
                           </a>
                        </div>
                        @if (auth()->user()->hasRole('fleet|marine|superuser'))
                        <a href="{{asset('template/template-import-material.xlsx')}}" class="btn btn-success mb-2 mx-1"><i class="fa fa-download"></i> Download Template Import Material</a>
                         <br>
                         <div class="my-2">
                           <small><b>Note: </b> Klik "Refresh Data" untuk menampilkan Activity Plan terbaru dari User</small>
                           <br>
                           <small><b>Note: </b> Klik "Submit" untuk mengirim Activity Plan ke Kapal</small>
                        </div>
                        @endif
                        
                     </div>
                  </div>
                  
                  {{-- <hr> --}}
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Activity</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Crew</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="contact-tab"  href="{{route('intermilan.marine.risalah', enkripRambo($intermilan->id))}}"  aria-controls="contact" aria-selected="false">Risalah</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link"  href="{{route('intermilan.marine.timeline', enkripRambo($intermilan->id))}}"  aria-controls="ok" aria-selected="false">Timeline</a>
                     </li>

                     {{-- <li class="nav-item">
                        <a class="nav-link" id="ok-tab" data-toggle="tab" href="#ok" role="tab" aria-controls="ok" aria-selected="false">Schedule</a>
                     </li> --}}
                  </ul>
                  <div class="tab-content" id="myTabContent">
                     <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                           <div class="col-md-12">

                              <a data-toggle="collapse" href="#formRequest" class="btn btn-sm btn-light border-bottom mb-2"><i class="fa fa-plus"></i> Add Activity</a>
                              {{-- <hr> --}}
                              <div class="collapse" id="formRequest">
                                 
                                 <form action="{{route('intermilan.marine.request.store')}}" method="POST">
                                    @csrf
                                    <input type="text" name="intermilan" id="intermilan" value="{{$intermilan->id}}" hidden>


                                    <div class="row">
                                       <div class="col-md-2">
                                          <select  class="form-control" name="user" id="user">
                                                <option value="" selected disabled>User</option>
                                                @foreach ($ports as $port)
                                                <option value="{{$port->id}}">{{$port->name}}</option>
                                             @endforeach
                                                
                                             </select>
                                       </div>
                                       <div class="col-md-4">
                                          <input type="text" name="desc" id="desc" class="form-control" required placeholder="Activity...">
                                       </div>
                                       <div class="col-md-2">
                                          <select  class="form-control" id="origin"  name="origin">
                                                <option value="" selected disabled>Origin</option>
                                                @foreach ($ports as $port)
                                                   <option {{ old('origin') == $port->id ? 'selected' : '' }} value="{{ $port->id }}">{{ $port->code }}</option>
                                                @endforeach
                                                
                                             </select>
                                       </div>
                                       <div class="col-md-2">
                                          <select  class="form-control" id="destination"  name="destination">
                                                <option value="" selected disabled>Destination</option>
                                                @foreach ($ports as $port)
                                                   <option {{ old('origin') == $port->id ? 'selected' : '' }} value="{{ $port->id }}">{{ $port->code }}</option>
                                                @endforeach
                                                
                                             </select>
                                       </div>
                                       
                                       <div class="col-md-2">
                                          {{-- <input type="text" name="desc" id="desc" class="form-control"  required placeholder="Activity..."> --}}
                                             <select  class="form-control" id="req_boat" required  name="req_boat">
                                                <option value="" selected disabled>Required Boat</option>
                                                <option value="AHTS">AHTS</option>
                                                <option value="Cargo">Cargo</option>
                                                <option value="Supply Boat">Supply Boat</option>
                                                <option value="AHTS / Cargo">AHTS / Cargo</option>
                                                <option value="AHTS / Supply Boat">AHTS / Supply Boat</option>
                                                <option value="Crew Boat">Crew Boat</option>
                                                <option value="CC 114">CC 114</option>
                                                
                                             </select>
                                       </div>
                                    </div>
                                    <button class="btn  btn-primary mt-2 px-2" type="submit" > <i class="fa fa-save"></i> Save</button> 
                                    
                                    
                                 </form>  
                                 <hr>
                              </div>


                              {{-- <a data-toggle="collapse" href="#formRequest">Add Row</a> |
                              <a data-toggle="collapse" href="#formSchedule">Add Schedule</a> |
                              <a href="{{asset('template/template-import-material.xlsx')}}">Download Template Import Material</a>
                              <div class="collapse" id="formRequest">
                                 <form action="{{route('intermilan.marine.request.store')}}" method="POST">
                                    @csrf
                                    <input type="text" name="intermilan" id="intermilan" value="{{$intermilan->id}}" hidden>
                                    
                                    <table class="table table-sm table-striped border">
                                       <tr>
                                          
                                          <td style="width:150px">
                                             
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
                                            
                                          </td>
                                          <td>
                                             <button class="btn btn-sm btn-primary btn-block" type="submit" > Add</button> 
                                          </td>
                                       </tr>
                                    </table>
                                   
                                    
                                    
                                    
                                 
                                    
                                    
                                    
                                 </form>  
                              </div> --}}



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
                                          
                                          <th>Location</th>
                                          <th>Req Date</th>
                                          <th>Req Boat</th>
                                          <th>Boat</th>
                                          <th>Status</th>
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
                                                <td>{{$item->req_boat}}</td>
                                                <td class="d-flex align-items-center py-2">
                                                   {{-- @if ($item->activity_id == 1 || $item->activity_id == 2)
                                                      <form action="{{route('intermilan.marine.select.schedule.list')}}" method="POST" class="d-flex">
                                                         @csrf
                                                         @method('PUT')
                                                         <input type="text" name="requestId" id="requestId" value="{{$item->id}}" hidden>
                                                         <select style="" name="schedule" id="schedule" required>
                                                            <option value="" selected disabled>Select Schedule </option>
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
                                                         
                                                            Assign 
                                                         </button>
                                                      </form>
                                                      @else
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
                                                   @endif --}}

                                                   @if ($item->vessel_id != null)
                                                       <a href="#"  data-toggle="modal" data-target="#modalAssignVessel-{{$item->id}}" class="">{{$item->vessel->name}}</a>
                                                       @else
                                                       <a href="#"  data-toggle="modal" data-target="#modalAssignVessel-{{$item->id}}" class="">Empty</a>
                                                   @endif
                                                   
                                                   
                                                   
                                                   
                                                </td>
                                                <td>
                                                   <x-status-stisla.request-plain :request="$item" />
                                                </td>
                                                @foreach ($dates as $date)
                                                   @php
                                                      $found = false;
                                                   @endphp

                                                   @foreach ($item->vessels as $v)
                                                      @if ($v->date == $date)
                                                            @php $found = true; @endphp
                                                            @break
                                                      @endif
                                                   @endforeach

                                                   @if ($found)
                                                      <x-status-stisla.item-vessel :item="$item" :itemdate="$v->date" :date="$date" />
                                                   @else
                                                      <td class="text-center">
                                                      -
                                                   </td>
                                                   @endif

                                                   {{-- <td class="text-center">
                                                      {{ $found ? $date : '-' }}
                                                   </td> --}}
                                                @endforeach
                                                {{-- @foreach ($dates as $date)
                                                   @if ($date == $item->date)
                                                      <x-status-stisla.item-vessel :item="$item" />
                                                      
                                                      
                                                   @else
                                                   <td class="text-center">- </td>
                                                   @endif
                                                
                                                @endforeach --}}
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
                                                         <td colspan="6" class="border">

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
                                                         <td colspan="6" >

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
                                                         <td class="border" colspan="6" >

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
                                                         <td class="border" colspan="6" >
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
                              <div class="my-2">
                                 <small><b>Note: </b> Klik data pada kolom "Boat" untuk memilih/merubah kapal dan estimasi pelaksanaan</small>
                              </div>
                           </div>
                          
                        </div>

                        <hr>

                        <div class="row">
                           <div class="col-md-5">
                              <table class="border table table-sm">
                                 <tbody>
                                    <tr>
                                       <th colspan="4" class=" border"> <b>Boat List</b> </th>
                                    </tr>
                                    @foreach ($vessels as $vessel)
                                       <tr>
                                          @if ($vessel->type == 'Tug Boat')
                                                <td class="text-center border" style="background-color: rgb(44, 95, 249)">J</td>
                                                @elseif($vessel->ipb == 'IPB')
                                                <td class="text-center border" style="background-color: rgb(251, 161, 128)">I</td>
                                             @else 
                                                @if ($vessel->id == 7)
                                                {{-- Triton Jawara --}}
                                                <td class="text-center border" style="background-color: rgb(255, 231, 16)">A</td>
                                                @elseif($vessel->id == 2)
                                                {{-- Transko Balihe --}}
                                                <td class="text-white text-center border" style="background-color: rgb(244, 66, 66)">B</td>
                                                {{-- @elseif($vessel->id == 7)
                                                SK Canopus
                                                <td class="text-center border" style="background-color: rgb(184, 152, 46)">C</td> --}}
                                                @elseif($vessel->id == 3)
                                                {{-- Logindo Overcomer --}}
                                                <td class="text-center border" style="background-color: rgb(89, 192, 51)">D</td>
                                                @elseif($vessel->id == 9)
                                                {{-- Elok Jaya --}}
                                                <td class="text-center text-white" style="background-color: rgb(41, 95, 134)">E</td>
                                                @elseif($vessel->id == 4)
                                                {{-- Indoliziz Satu --}}
                                                <td class="text-center border" style="background-color: rgb(172, 236, 149)">F</td>
                                                @elseif($vessel->id == 11)
                                                {{-- Giat Jaya --}}
                                                <td class="text-center border" style="background-color: rgb(129, 181, 245)">G</td>
                                                @elseif($vessel->id == 6 || $vessel->id == 36)
                                                {{-- Sigap Jaya --}}
                                                <td class="text-center border" style="background-color: rgb(241, 156, 38)">L</td>
                                                @elseif($vessel->id == 1)
                                                {{-- Transko Moloko --}}
                                                <td class="text-center border" style="background-color: rgb(213, 226, 131)">G</td>
                                                @else
                                                <td class="text-center border" style="background-color: rgb(192, 190, 189)"></td>
                                             @endif
                                          @endif
                                          

                                             <td class="border">
                                                {{ $vessel->name }}
                                             </td>
                                             <td class="border">
                                                {{ $vessel->type }}
                                             </td>
                                             <td class="border">
                                                {{ $vessel->ipb }}
                                             </td>
                                             
                                       </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
                           <div class="col-md-2">
                              
                              {{-- <table>
                                 <thead>
                                    <tr><th colspan="2" class="">Schedule</th></tr>
                                    <tr>

                                       <th class="text-center">Date</th>
                                       <th>Vessel</th>
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
                              </table> --}}
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
                              <hr>
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


<div class="modal fade" id="modalSubmitIntermilan" tabindex="-1" role="dialog"  aria-hidden="true">
   <div class="modal-dialog" role="document">
      <form action="{{ route('intermilan.marine.submit') }}" method="POST" enctype="multipart/form-data">
         @csrf
         @method('PUT')

         <input type="number" name="intermilanId" id="intermilanId" value="{{ $intermilan->id }}" hidden>

         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title"> 
                  <i class="fas fa-exclamation-triangle text-warning"></i>
                  {{-- <i class="fas fa-exclamation-circle text-warning fa-bounce"></i>  --}}
                  Konfirmasi Submit Intermilan</h5>

               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
               
            </div>
            <div class="modal-body">
               
               {{-- <i class="fas fa-times-circle text-danger"></i> --}}
               <b>Apakah Anda yakin ingin mengirim data ini?</b> <br>
                <small>Activity Plan dengan status "Vessel Assigned" akan ditampilkan di akun Kapal. <br><br></small>
              
                
               
               <div class="table-responsive">
                  <table class="table table-sm border">
                     <tbody>
                        
                        <tr>
                              <td class="">ID</td>
                              <td class="">{{$intermilan->code}}</td>
                           </tr>
                           <tr>
                              <td class="">Periode</td>
                              <td class="">{{formatDate($start)}} - {{formatDate($end)}}</td>
                           </tr><tr>
                              <td class="">Title</td>
                              <td class="">{{$intermilan->title}}</td>
                           </tr>
                        
                     </tbody>
                  </table>
               </div>

               

                  <small> <b>Note:</b> Setelah submit, data akan ditampilkan pada akun Kapal. </small>
               


               
               
            </div>
            <div class="modal-footer bg-whitesmoke">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-info" onclick="handleClick(this)">Submit</button>
            </div>
         </div>
      </form>
   </div>
</div>

@foreach ($requests as $request)

<div class="modal fade" id="modalAssignVessel-{{ $request->id }}" tabindex="-1" role="dialog"  aria-hidden="true">
   <div class="modal-dialog" role="document">
      <form action="{{route('intermilan.marine.assign')}}" method="POST" enctype="multipart/form-data">
         @csrf
         @method('PUT')
         <input type="number" name="intermilanId" id="intermilanId" value="{{ $intermilan->id }}" hidden>
         <input type="number" name="requestId" id="requestId" value="{{ $request->id }}" hidden>

         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Form Assign Vessel</h5>

               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
               
            </div>
            <div class="modal-body">

               <div class="table-responsive">
                  <table class="table table-sm border">
                     <tbody>
                        <tr>
                           <td>User</td>
                           <td>{{$request->user->username}}</td>
                        </tr>
                        <tr>
                           <td>Activity</td>
                           <td>
                              {{$request->description}}
                               @if (count($request->cargoItems) > 0)
                                                (
                                                   @foreach ($request->cargoItems as $cargo)
                                                      <a data-toggle="collapse" href="#formItemEdit-{{$cargo->id}}">{{$cargo->description}}</a>,
                                                   @endforeach
                                                )
                                                @endif
                           </td>
                        </tr>
                        <tr>
                           <td>Loc</td>
                           <td>
                              {{$request->origin->code}} - {{$request->destination->code}}
                           </td>
                        </tr>
                        <tr>
                           <td>Request Date</td>
                           <td>
                              {{ formatDate($request->date) }}
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               
               @if ($request->vessel_id != null)
                      <a href="{{ route('intermilan.vessel.detail', enkripRambo($request->vessel_id)) }}" class="btn btn-sm btn-primary mb-4">Lihat Manifest Kapal</a>
                  @endif
               {{-- <div class="badge badge-info">Approval 1</div> --}}
               <div class="row mb-2">
                  
                  <div class="col-md-12">
                     <div class="form-group">
                        {{-- <label for="" class="label">Vessel</label> --}}
                     <select class="form-control" name="vessel" id="vessel" required>
                           <option value="" selected  disabled>Select Vessel  </option>
                           @foreach ($vessels as $vessel)
                              
                              <option {{$request->vessel_id == $vessel->id ? 'selected' : ''}} value="{{$vessel->id}}">{{$vessel->name}} </option>
                             
                              
                           @endforeach
                           
                        </select>
                        </div>
                  </div>

                  <div class="col-md-12">
                     <div class="badge badge-info">Estimasi tanggal pelaksanaan</div>
                     <div class="row mt-2">
                        <div class="col-md-6">

                           <input type="date" class="form-control" required name="est_start" id="est_start" value="{{ $request->est_start }}" min="{{ $start }}" max="{{ $end }}">
                        </div>
                        <div class="col-md-6">
                           
                           <input type="date" class="form-control" required name="est_end" id="est_end" value="{{ $request->est_end }}" min="{{ $start }}" max="{{ $end }}">
                        </div>
                     </div>
                  </div>

                  
                  
               </div>


               
               
            </div>
            <div class="modal-footer bg-whitesmoke">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-info" onclick="handleClick(this)">Assign</button>
            </div>
         </div>
      </form>
   </div>
</div>



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