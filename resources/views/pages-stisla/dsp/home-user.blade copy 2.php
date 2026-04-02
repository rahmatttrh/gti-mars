@extends('layouts.stisla.app')
@section('title')
    DSP Dashboard
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
   text-align: center; 
   /* background-color: rgb(226, 236, 151) */
   
}
</style>
   <section class="section">
      <div class="row">
         <div class="col-md-3">
            <div class="card border shadow-lg">
               <div class="card-body">

                  {{-- <small>Name</small> --}}
                  <h4 class="text-dark">{{$user->name ?? ''}}</h4>
                  {{-- <small>Name</small> --}}
                  {{-- <small >{{$user->port->type ?? ''}} - {{$user->port->region ?? ''}}</small><br>
                  <b class="text-dark">{{$user->port->name ?? ''}}</b> --}}
                  <hr>
                  <div class="row">
                     <div class="col-md-6">
                        <small>Progress Request</small><br>
                        <b>{{$requests->where('status', '>', 0)->count()}} </b>
                     </div>
                     <div class="col-md-6">
                        <small>Complete Request</small><br>
                        <b>{{$requests->where('status', 12)->count()}} </b>
                     </div>
                  </div>
                  
                  <hr>
                  <a href="{{asset('template/template-import-material.xlsx')}}">Download Template Import Material</a>
                  
               </div>
               

               
               {{-- <div class="card-body">{{$user->name}} </div> --}}
            </div>

            <div class="card shadow-lg">
               <div class="card-body">
                  <div class="badge badge-info">Intermilan List</div>
                  <table class="border mt-2">
                     {{-- <tbody>
                        <tr>
                           <td colspan=""><b>Intermilan List</b></td>
                        </tr> --}}

                        @foreach ($intermilans as $inter)
                            <tr>
                              <td class="border"><a href="{{route('intermilan.user.detail', enkripRambo($inter->id))}}">{{$inter->code}}</a></td>
                              {{-- <td>{{formatDateB($inter->from)}} - {{formatDateB($inter->to)}}</td> --}}
                           </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>

           
               

            
            
         </div>
         <div class="col-md-9">

            <div class="card shadow">
               {{-- <div class="card-header">
                  
               </div> --}}
               <div class="card-body px-3">
                  <div class="d-flex justify-content-between" >
                     <div>
                        <h4>INTERMILAN USER</h4>
                        
                     </div>
                     
                     <a  data-toggle="collapse" href="#collapseExample">Add New Intermilan...</a>
                  </div>
                  <div class="collapse" id="collapseExample">
                     <form action="{{route('intermilan.user.store')}}" method="POST">
                        @csrf
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group form-group-default">
                                 <label>From</label>
                                 <input type="date" name="from" id="from" class="form-control" required>
                                 
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group form-group-default">
                                 <label>To</label>
                                 <input type="date" name="to" id="to" class="form-control" required>
                                 
                              </div>
                           </div>
                        </div>
                        <div class="form-group form-group-default">
                           <label>Title</label>
                           <input type="text" name="title" id="title" class="form-control" required>
                        </div>
                        
                        <button class="btn btn-primary mb-4" type="submit" > Add</button> 
                        
                       
                        
                        
                        
                     </form>  
                  </div>
                  
                  <hr>

                  @if ($lastIntermilan != null)
                      
                  <table class="table-striped border table-sm">
                     <tr>
                        <td class="border">ID</td>
                        <th class="border">{{$lastIntermilan->code}}</th>
                        <td class="border">Title</td>
                        <th class="border">{{$lastIntermilan->title}}</th>
                     </tr>
                     <tr>
                        <td class="border">Periode</td>
                        <th class="border" colspan="3">{{formatDate($startDate)}} -  {{formatDate($endDate)}}</th>
                     </tr>
                     <tr>
                        <td colspan="4" class="border"><a data-toggle="collapse" href="#formRequest" class="btn btn-sm btn-primary" >Add Row</a></td>
                     </tr>
                  </table>
                  
                  <div class="collapse" id="formRequest">
                     <form action="{{route('intermilan.user.request.store')}}" method="POST">
                        @csrf
                        <input type="number" name="intermilanId" id="intermilanId" hidden value="{{$lastIntermilan->id}}" >
                        <table class="table-striped border table-sm">
                           
                           <tr>
                              {{-- <td class="text-center bg-y" style="width: 180px">
                                 <input  style="background-color: rgb(226, 236, 151)" class="w-100 }" type="text" style="border-color: red!"  >
                              </td> --}}
                              
                              <td style="width:320px" class="border">
                                 <input type="text" name="desc" id="desc" style="width:100%; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Activity...">
                                 
                              </td>

                              <td style="" class="border">
                                 <input type="date" name="date" id="date" class="py-2" style="width:100%; text-align: left !important;" required >
                                 
                              </td>
                              <td class="border">
                                 <select  style="border:none !important; padding-left:none; text-align: left !important;padding-top: 5px;padding-bottom: 5px;" id="origin"  name="origin">
                                    <option value="" selected disabled>Origin</option>
                                    @foreach ($ports as $port)
                                       <option {{ old('origin') == $port->id ? 'selected' : '' }} value="{{ $port->id }}">{{ $port->name }}</option>
                                    @endforeach
                                    
                                 </select>
                                 <select  style="border:none !important;; padding-left:none; text-align: left !important;padding-top: 5px;padding-bottom: 5px;" id="destination"  name="destination">
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
                              <td class="border">
                                 <button class="btn btn-sm btn-primary btn-block" type="submit" > Add</button> 
                              </td>
                           </tr>
                        </table>
                       
                       
                        
                        
                        
                     </form>  
                  </div>
                  @endif

                  <div class="table-responsive mt-1">
                     <table class="border" >
                        <thead>
                           
                           <tr>
                              <th class="border py-2">Station</th>
                              <th class="border py-2">Activity</th>
                              <th class="border py-2">Location</th>
                              <th class="border py-2">Date</th>
                              <th></th>
                             
                           </tr>
                        </thead>
                        <tbody id="myAccordion2">
                           @if ($lastIntermilan != null)
                           @if ($userRequests->count() > 0)
                              @foreach ($userRequests as $item)
                                 
                                 <tr style="background-color: rgb(230, 221, 252)">
                                 <td  class="text-uppercase bg-light">
                                   <a data-toggle="collapse" href="#formItem-{{$item->id}}">{{$item->user->username}}</a> 
                                 </td>
                                
                                    <td >
                                       {{$item->description}} 
                                       @if (count($item->cargoItems) > 0)
                                       (
                                          @foreach ($item->cargoItems as $cargo)
                                              <a data-toggle="collapse" href="#formItemEdit-{{$cargo->id}}">{{$cargo->description}}</a>,
                                          @endforeach
                                       )
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
                                    <td class="d-flex align-items-center">
                                       @if ($item->status == 0)
                                       <a href="{{route('intermilan.user.request.release', enkripRambo($item->id))}}" class="btn btn-sm btn-primary">Submit</a>
                                       @elseif($item->status == 1)
                                       <a href="{{route('intermilan.user.request.cancel',  enkripRambo($item->id))}}" class="btn btn-sm btn-light">Cancel</a>
                                       @endif
                                       
                                       
                                       
                                       
                                    </td>
                                    
                                 </tr>


                                    <form action="{{route('intermilan.user.cargo.store')}}" method="POST">
                                       @csrf
                                       <input type="number" name="requestId" id="requestId" value="{{$item->id}}" hidden>
                                       <tr class="collapse" id="formItem-{{$item->id}}" data-parent="#myAccordion2">

                                          {{-- <td colspan="5">
                                             <div class="col-md-6">
                                                <input type="text" name="desc" id="desc" style="width: 250px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Item Name">
                                                <input type="text" name="qty" id="qty" style="width: 80px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Qty">
                                                <input type="text" name="unit" id="unit" style=" text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Container/Pallet/Box">
                                             </div>
                                             <div class="col-md-6">
                                                <input type="text" name="qty_package" id="qty_package" style="width: 80px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Satuan">
                                                <input type="text" name="weight" id="weight" style="width: 50px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Weight">

                                                <input type="text" name="contract" id="contract" style=" text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="PO/Contract">
                                                <input type="text" name="remark" id="remark" style="width: 250px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Remarks">
                                             </div>
                                          </td> --}}
                                          {{-- <div > --}}
                                             <td class="border">Add Item</td>
                                             <td colspan="12" class="border" >
                                                <table>
                                                   <tbody>
                                                      <tr>
                                                         <th class="border">Matreial Name</th>
                                                         <th class="border">Qty</th>
                                                         <th class="border">Unit/Satuan</th>
                                                         <th class="border"></th>
                                                      </tr>
                                                      <tr>
                                                         <td class="border">
                                                            <input type="text" name="desc" id="desc" style="width: 250px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Item Name">
                                                         </td>
                                                         <td class="border">
                                                            <input type="text" name="qty" id="qty" style="width: 80px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Qty">
                                                         </td>
                                                         <td class="border">
                                                            <input type="text" name="unit" id="unit" style=" text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Container/Pallet/Box">
                                                         </td>
                                                         <td class="border">
                                                            <button class="btn btn-sm btn-primary shadow-none" style="height: 30px" type="submit">Add material</button>
                                                            {{-- <a data-toggle="collapse" href="#formImport-{{$item->id}}">Form Import</a>  --}}
                                                         </td>
                                                      </tr>

                                                      <tr>
                                                         <th class="border">PO/Contract</th>
                                                         <th class="border">Weight</th>
                                                         <th class="border">Remark</th>
                                                         <th class="border">
                                                            

                                                         </th>
                                                      </tr>
                                                      <tr>
                                                         <td class="border">
                                                            <input type="text" name="contract" id="contract" style="width: 250px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="PO/Contract">
                                                         </td>
                                                         <td class="border">
                                                            <input type="text" name="weight" id="weight" style="width: 50px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Weight">
                                                         </td>
                                                         <td class="border">
                                                            <input type="text" name="remark" id="remark" style="width: 250px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Remarks">
                                                         </td>

                                                         <td class="border">
                                                            <a data-toggle="collapse" href="#formImport-{{$item->id}}">Form Import</a> 
                                                         </td>
                                                      </tr>
                                                   </tbody>
                                                </table>

                                                {{-- <input type="text" name="desc" id="desc" style="width: 250px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Item Name">
                                                <input type="text" name="qty" id="qty" style="width: 80px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Qty">
                                                <input type="text" name="unit" id="unit" style=" text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Container/Pallet/Box">
                                                
                                                <input type="text" name="qty_package" id="qty_package" style="width: 80px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Satuan">
                                                <input type="text" name="weight" id="weight" style="width: 50px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Weight">

                                                <input type="text" name="contract" id="contract" style="width: 250px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="PO/Contract">
                                                <input type="text" name="remark" id="remark" style="width: 250px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Remarks">
                                                <button class="btn btn-sm btn-primary shadow-none" style="height: 30px" type="submit">Submit</button>
                                                <a data-toggle="collapse" href="#formImport-{{$item->id}}">Form Import</a>  --}}
                                             </td>
                                          {{-- </div> --}}
                                       </tr>
                                    </form>

                                    <form action="{{route('intermilan.marine.request.material.import')}}" method="POST" enctype="multipart/form-data">
                                       @csrf
                                       <input type="text" name="requestId" id="requestId" value="{{$item->id}}" hidden>
                                       <tr class="collapse" id="formImport-{{$item->id}}" data-parent="#myAccordion2">
                                          <td></td>
                                          <td colspan="2">
                                             <div class="form-group">
                                                <div class="input-group mb-3">
                                                   <input type="file" class="form-control" id="file" name="file">
                                                   <div class="input-group-append">
                                                      <button class="btn btn-light border" type="submit">Import Item</button>
                                                   </div>
                                                </div>
                                             </div>
                                          </td>
                                       </tr>
                                       
                                    </form>

                                    @foreach ($item->cargoItems as $cargo)

                                    <form action="{{route('intermilan.user.cargo.update')}}" method="POST">
                                       @csrf
                                       @method('PUT')
                                       <input type="number" name="requestId" id="requestId" value="{{$item->id}}" hidden>
                                       <input type="number" name="cargoId" id="cargoId" value="{{$cargo->id}}" hidden>

                                       <tr class="collapse" id="formItemEdit-{{$cargo->id}}" data-parent="#myAccordion2">
                                          {{-- <div > --}}
                                             <td>Edit Item</td>
                                             <td colspan="12" >
                                                <table>
                                                   <tbody>
                                                      <tr>
                                                         <th class="border">Material Name</th>
                                                         <th class="border">Qty</th>
                                                         <th class="border">Unit/Satuan</th>
                                                         <th class="border"></th>
                                                      </tr>
                                                      <tr>
                                                         <td class="border">
                                                            <input type="text" name="desc" id="desc" style="width: 250px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required value="{{$cargo->description}}">
                                                         </td>
                                                         <td class="border">
                                                            <input type="text" name="qty" id="qty" style="width: 80px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required value="{{$cargo->qty}}">
                                                         </td>
                                                         <td class="border">
                                                            <input type="text" name="unit" id="unit" style=" text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required value="{{$cargo->unit}}">
                                                         </td>
                                                         <td class="border">
                                                            <button class="btn btn-sm btn-light shadow-none" style="height: 30px" type="submit">Update</button>
                                                         </td>
                                                      </tr>

                                                      <tr>
                                                         <th class="border">PO/Contract</th>
                                                         <th class="border">Weight</th>
                                                         <th class="border">Remark</th>
                                                         <th class="border"></th>
                                                      </tr>
                                                      <tr>
                                                         <td class="border">
                                                            <input type="text" name="contract" id="contract" style=" text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required value="{{$cargo->contract}}">
                                                         </td>
                                                         <td class="border">
                                                            <input type="text" name="weight" id="weight" style="width: 50px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required value="{{$cargo->weight}}">
                                                         </td>
                                                         <td class="border">
                                                            <input type="text" name="remark" id="remark" style="width: 250px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required value="{{$cargo->remark}}">
                                                         </td>
                                                         <td class="border">
                                                            <a class="" style="height: 30px" href="{{route('cargo.delete', enkripRambo($cargo->id))}}"  >Delete</a>
                                                         </td>
                                                      </tr>
                                                   </tbody>
                                                </table>

                                                {{-- <input type="text" name="desc" id="desc" style="width: 250px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required value="{{$cargo->description}}">
                                                <input type="text" name="qty" id="qty" style="width: 80px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required value="{{$cargo->qty}}">
                                                <input type="text" name="unit" id="unit" style=" text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required value="{{$cargo->unit}}">
                                                <input type="text" name="qty_package" id="qty_package" style="width: 80px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required value="{{$cargo->qty_package}}">
                                                <input type="text" name="weight" id="weight" style="width: 50px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required value="{{$cargo->weight}}">

                                                <input type="text" name="contract" id="contract" style=" text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required value="{{$cargo->contract}}">
                                                <input type="text" name="remark" id="remark" style="width: 250px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required value="{{$cargo->remark}}">
                                                <button class="btn btn-sm btn-light shadow-none" style="height: 30px" type="submit">Update</button>
                                                <a class="btn btn-sm btn-danger shadow-none" style="height: 30px" href="{{route('cargo.delete', enkripRambo($cargo->id))}}"  >Delete</a> --}}
                                             </td>
                                          {{-- </div> --}}
                                       </tr>
                                    </form>

                                    
                                    @endforeach
                                 

                                 
                              @endforeach
                           @endif
                           @endif
                           
                           
                           
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
                  <hr>
               </div>
            </div>


            

            {{-- <div class="card">
               <div class="card-body">
                  <div class="table-responsive">
                     <table class=" table-striped " id="table-1">
                           <thead>
                             
                              <tr>
                                 <th>ID</th>
                                 <th>Desc</th>
                                 <th>Route</th>
                                 <th>Vessel</th>
                                 <th>Date</th>
                                
                                 <th>Status</th>
                                
                              </tr>
                           </thead>
                           <tbody>
                              @if ($userRequests->count() > 0)
                              
                                 @foreach ($userRequests as $request)
                                    <tr>
                                      
                                       <td><a href="{{route('request.detail.new', enkripRambo($request->id))}}">{{$request->code}}</a></td>
                                       <td>
                                       {{$request->desc}} 
                                       @if ($request->activity_id == 1)
                                         ( @foreach ($request->cargoItems as $cargo)
                                             {{$cargo->description}}
                                          @endforeach
                                         )
                                       @endif
                                       
                                       </td>
                                       <td class="text-truncate">
                                      
                                       @if ($request->activity_id < 5)
                                       {{$request->origin->code ?? ''}} to {{$request->destination->code ?? ''}}
                                       @if ($request->titip_id)
                                             ({{$request->titip->name}})
                                       @endif
                                       @else
                                       -
                                       @endif
                                       
                                       </td>
                                       
                                       <td><a href="{{route('schedule.detail', enkripRambo($request->schedule_id))}}">{{$request->schedule->vessel->name ?? 'Empty'}}</a></td>
                                       <td>{{formatDate($request->date)}}</td>
                                      
                                       <td>
                                         
                                             <div class="badge badge-info">Waiting Vessel</div>
                                       </td>
                                       
                                    </tr>
                                 @endforeach
                                 @else
                                 <tr>
                                    <td colspan="6" style="text-align: center"><small>Emtpy</small></td>
                                 </tr>
                              @endif
                              
                           </tbody>
                     </table>
                  </div>
               </div>
            </div> --}}


            @if (count($titipRequests) > 0)
               
               @foreach ($titipRequests as $titip)
                  Request anda untuk <b> {{$titip->desc}}
                  @foreach ($titip->cargoItems as $item)
                      {{$item->desc}}
                  @endforeach
                  Tgl {{formatDate($titip->date)}} </b> tujuan {{$titip->request->origin->name}} - {{$titip->request->destination->name}} telah dititipkan di <b>{{$titip->request->destination->name}}</b> oleh Fleet Control.
                  Silahkan <b>Release Request Ulang</b> dengan rute baru {{$titip->origin->name}} - {{$titip->destination->name}}
                  <br>
                  <hr>
               @endforeach
               
            @endif
            @if ($confirms->count() > 0)
               @foreach ($confirms as $confirm)
                  <div class="alert alert-info" role="alert">
                     You have a Arrival Cargo from {{$confirm->origin->name}}. Click <a href="{{route('schedule.detail', enkripRambo($confirm->schedule_id))}}" class="alert-link">here</a> to see detail.
                  </div>
               @endforeach
            @endif
            
            
            
            
        
         </div>

         
      </div>
   </section>
@endsection

