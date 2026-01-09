@extends('layouts.stisla.app-main')
@section('title')
   Vessel Detail
@endsection

@section('content')

<style>
   input, select {
  border: none; /* Sets border width, style, and color */
}
</style>
<section class="section">
    {{-- <div class="section-header">
      <h1 class="section-title">Detail Vessel</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item "><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item active">Detail Vessel</div>
      </div>
    </div> --}}

   <div class="section-body">
      
     
      

            

               <div class="row">
                  <div class="col-md-4">
                     
                     <div class="card shadow">
                       
                        <div class="card-body">
                           <h3>Vessel Detail</h3>
                           
                           <form action="{{route('vessel.update')}}" method="POST">
                              @csrf
                              @method('PUT')
                              <input type="number" name="vessel" id="vessel" value="{{$vessel->id}}" hidden>

                              <div class="table-responsive">
                                 <table class="w-100 border">
                                    <tbody>
                                       
                                       <tr>
                                          <td class="border">Vessel Name</td>
                                          <td><input type="text" class="w-100 py-1" id="name" name="name" value="{{$vessel->name}}" ></td>
                                       </tr>
                                       <tr>
                                          <td class="border">Vessel Type</td>
                                          <td class="border">
                                             <select  class="w-100 py-1" id="type" required  name="type" >
                                                <option value="" disabled selected>Select</option>
                                                <option {{$vessel->type == 'Crew Boat' ? 'selected' : ''}}  value="Crew Boat">Crew Boat</option>
                                                <option {{$vessel->type == 'AHTS' ? 'selected' : ''}} value="AHTS">AHTS</option>
                                                <option {{$vessel->type == 'Supply' ? 'selected' : ''}}  value="Supply">Supply</option>
                                             </select>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td class="border">Username</td>
                                          <td class="border"><input type="text" required class="w-100 py-1" id="username" name="username" value="{{$vessel->username}}"  ></td>
                                       </tr>
                                       <tr>
                                          <td class="border">Status</td>
                                          <td class="border">
                                             <select  class="w-100 py-1" id="status" required name="status" >
                                                <option value="" disabled selected>Select</option>
                                                <option {{$vessel->status == 0 ? 'selected' : ''}} value="0">Offhire</option>
                                                <option {{$vessel->status == 1 ? 'selected' : ''}} value="1">Onhire</option>
                                                <option {{$vessel->status == 2 ? 'selected' : ''}} value="2">Maintenance</option>
                                             </select>
                                          </td>
                                       </tr>
                                       </tbody>
                                 </table>
                              </div>
                              
                              
                              <hr>
                              <button class="btn btn-primary shadow">Update Detail</button>
                           </form>
                           
                           {{-- <a href="{{route('vessel.delete', enkripRambo($vessel->id))}}" class="btn btn-danger" >Delete</a> --}}
                        </div>
                     </div>

                     <div class="card">
                        <div class="card-body">
                           <div class="badge badge-light">Contract Histories</div>
                           
                           <table class="table table-sm w-100 border mt-2">
                              <tbody>
                                 {{-- <tr>
                                    <td class="border" colspan="2"><b>Total Contracts:</b> {{ count($contracts) }} </td>
                                 </tr> --}}
                                 <tr>
                                    <td class="border">No. Kontrak</td>
                                    <td class="border">Period</td>
                                 </tr>
                                 @foreach ($contracts as $con)
                                    <tr>
                                       <td class="border">{{ $con->contract_number }}</td>
                                       <td class="border">{{ formatDate($con->start_date) }} to {{ formatDate($con->end_date) }}</td>
                                    </tr>
                                     
                                 @endforeach
                              </tbody>
                           </table>
                        </div>
                     </div>
                     

                     

                     
                     
                  </div>

                  <div class="col-md-8">
                     <div class="card">
                        <div class="card-body">
                           
                            
                          

                           <p>
                              <a class="btn btn-light border" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                               <i class="fas fa-plus"></i> Add Contract
                              </a>
                              <hr>
                              {{-- <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                 Button with data-target
                              </button> --}}
                              </p>
                              <div class="collapse p-0" id="collapseExample">
                              
                                
                                 <form action="{{ route('contract.store') }}" method="POST">
                                    @csrf
                                    {{-- @method('PUT') --}}
                                    <input type="number" name="vessel_id" id="vessel_id" value="{{$vessel->id}}" hidden>

                                    <div class="row ">
                                       <div class="col-md-6">
                                          <table class="w-100 border mt-2">
                                             <tbody>
                                                <tr>
                                                   <td class="border">Contract Number</td>
                                                   <td class="border" colspan="2">
                                                      <input type="text" class="w-100 py-1" required name="contract_number" id="contract_number" value="{{ old('contract_number') }}">
                                                   </td>
                                                </tr>
                                                 <tr>
                                                   <td class="border">Contract Type</td>
                                                   <td class="border" colspan="2">
                                                      <select  class="w-100 py-1" required id="contract_type" required name="contract_type" >
                                                         <option value="" disabled selected>Select Contract</option>
                                                         <option {{ $activeContract->end_date ?? old('contract_type') == 'Under PO' ? 'selected' : ''}} value="Under PO">Under PO</option>
                                                         <option {{ $activeContract->end_date ?? old('contract_type') == 'Non PO' ? 'selected' : ''}} value="Non PO">Non PO</option>
                                                      </select>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td class="border">IPB</td>
                                                   <td class="border" colspan="2">
                                                      <select  class="w-100 py-1" required id="ipb"  name="ipb" >
                                                         <option value="" disabled selected>Select IPB / Non IPB</option>
                                                         <option {{ $activeContract->ipb ?? old('ipb') == 'IPB' ? 'selected' : ''}} value="IPB">IPB</option>
                                                         <option {{ $activeContract->ipb ?? old('ipb') == 'Non IPB' ? 'selected' : ''}} value="Non IPB">Non IPB</option>
                                                         
                                                      </select>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td class="border">Func</td>
                                                   <td class="border" colspan="2">
                                                      <select  class="w-100 py-1" required id="func"  name="func" >
                                                         <option value="" disabled selected>Select Func</option>
                                                         <option {{ $activeContract->func ?? old('func') =='Empty' ? 'selected' : '' }} value="Empty" >Non Func</option>
                                                         <option {{ $activeContract->func ?? old('func') == 'WI' ? 'selected' : ''}} value="WI">WI</option>
                                                         <option {{ $activeContract->func ?? old('func') == 'Drilling' ? 'selected' : ''}} value="Drilling">Drilling</option>
                                                         <option {{ $activeContract->func ?? old('func') == 'Project' ? 'selected' : ''}} value="Project">Project</option>
                                                         <option {{ $activeContract->func ?? old('func') == 'Security' ? 'selected' : ''}} value="Security">Security</option>
                                                         
                                                      </select>
                                                   </td>
                                                </tr>
                                                
                                                {{-- <tr>
                                                   <td class="border">Status</td>
                                                   <td class="border" colspan="2">
                                                      <select name="status" id="status" required class="w-100 py-1">
                                                         <option value="1">Active</option>
                                                         <option value="0">Disable</option>
                                                      </select>
                                                   </td>
                                                </tr> --}}
                                             </tbody>
                                          </table>
                                       </div>

                                       <div class="col-md-6">
                                          <table class="w-100 border mt-2">
                                             <tbody>
                                                <tr>
                                                   <td class="border">Start Date</td>
                                                   <td class="border" colspan="2">
                                                      <input type="date" name="contract_start" required id="contract_start" class="w-100 py-1" value="{{ $activeContract->end_date ?? old('contract_start') }}">
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td class="border">End Date</td>
                                                   <td class="border" colspan="2">
                                                      <input type="date" name="contract_end" required id="contract_end" class="w-100 py-1" value="{{ old('contract_end') }}">
                                                   </td>
                                                </tr>
                                               
                                                {{-- <tr>
                                                   <td class="border">Status</td>
                                                   <td class="border" colspan="2">
                                                      <select name="status" id="status" class="w-100 py-1">
                                                         <option value="1">Active</option>
                                                         <option value="">Disable</option>
                                                      </select>
                                                   </td>
                                                </tr> --}}
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>

                                    <button class="btn btn-primary mt-2" type="submit">Submit New Contract</button>
                                    <hr>
                                    

                                 </form>
                               
                              </div>

                              @if ($activeContract)
                                 <div class="badge badge-info">Current Contract </div>
                                  <form action="{{ route('contract.update.details') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="number" name="activeContractId" id="activeContractId" value="{{ $activeContract->id }}" hidden>
                                    <div class="row ">
                                       <div class="col-md-6">
                                          <table class="w-100 border mt-2">
                                             <tbody>
                                                <tr>
                                                   <td class="border">Contract Number</td>
                                                   <td class="border" colspan="2">
                                                      <input type="text" class="w-100 py-1" name="update_contract_number" id="update_contract_number" value="{{ $activeContract->contract_number }}">
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td class="border">Contract Type</td>
                                                   <td class="border" colspan="2">
                                                      <select  class="w-100 py-1" id="update_type" required name="update_type" >
                                                         <option value="" disabled selected>Select Contract</option>
                                                         <option {{$activeContract->type == 'Under PO' ? 'selected' : ''}} value="Under PO">Under PO</option>
                                                         <option {{$activeContract->type == 'Non PO' ? 'selected' : ''}} value="Non PO">Non PO</option>
                                                      </select>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td class="border">IPB</td>
                                                   <td class="border" colspan="2">
                                                      <select  class="w-100 py-1" id="update_ipb"  name="update_ipb" >
                                                         <option value="" disabled selected>Select IPB / Non IPB</option>
                                                         <option {{$activeContract->ipb == 'IPB' ? 'selected' : ''}} value="IPB">IPB</option>
                                                         <option {{$activeContract->ipb == 'Non IPB' ? 'selected' : ''}} value="Non IPB">Non IPB</option>
                                                         
                                                      </select>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td class="border">Func</td>
                                                   <td class="border" colspan="2">
                                                      <select  class="w-100 py-1" id="update_func"  name="update_func" >
                                                         <option value="" disabled selected>Select Func</option>
                                                         <option value="Empty" >Empty</option>
                                                         <option {{$activeContract->func == 'Empty' ? 'selected' : ''}} value="Empty">Non Func</option>
                                                         <option {{$activeContract->func == 'WI' ? 'selected' : ''}} value="WI">WI</option>
                                                         <option {{$activeContract->func == 'Drilling' ? 'selected' : ''}} value="Drilling">Drilling</option>
                                                         <option {{$activeContract->func == 'Project' ? 'selected' : ''}} value="Project">Project</option>
                                                         <option {{$activeContract->func == 'Security' ? 'selected' : ''}} value="Security">Security</option>
                                                         
                                                      </select>
                                                   </td>
                                                </tr>
                                                
                                                <tr>
                                                   <td class="border">Status</td>
                                                   <td class="border" colspan="2">
                                                      <select name="update_status" id="update_status" class="w-100 py-1">
                                                         <option {{$activeContract->status == 1 ? 'selected' : ''}} value="1">Active</option>
                                                         <option {{$activeContract->status == 0 ? 'selected' : ''}} value="0">Disable</option>
                                                      </select>
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </div>

                                       <div class="col-md-6">
                                          <table class="w-100 border mt-2">
                                             <tbody>
                                                <tr>
                                                   <td class="border">Start Date</td>
                                                   <td class="border" colspan="2">
                                                      <input type="date" name="update_start_date" id="update_start_date" class="w-100 py-1" value="{{ $activeContract->start_date }}">
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td class="border">End Date</td>
                                                   <td class="border" colspan="2">
                                                      <input type="date" name="update_end_date" id="update_end_date" class="w-100 py-1" value="{{ $activeContract->end_date }}">
                                                   </td>
                                                </tr>
                                                
                                                
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                    <div class="table-responsive mt-2" >
                                       
                                    
                                       <table class="w-100 border ">
                                       
                                          <thead>
                                             
                                             <tr class=" bg-lgray ">
                                                {{-- <th><input type="checkbox" name="" id="checkboxAll"></th> --}}
                                                <th class="border py-2">Operating Mode</th>
                                                <th class="border py-2">Min. Speed as Contract (Knots) <br> </th>
                                                <th class="border py-2" >Contractual Fuel Cons.
                                                   Remuneration Figures</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             @foreach ($activeContract->details as $detail)
                                             <input type="text" name="detailId[]" id="detailId" value="{{$detail->id}}" hidden>
                                                <tr>
                                                   <td class="text-truncate border">{{$detail->heading->description}}</td>
                                                   <td class="text-truncate border">
                                                      <input type="number" name="speed[]" id="speed" value="{{$detail->speed}}">
                                                   </td>
                                                   <td class="text-truncate border">
                                                      <input type="number" name="contractual_fuel[]" id="contractual_fuel" value="{{$detail->contractual_fuel}}">
                                                   </td>
                                                </tr>
                                             @endforeach
                                             
                                                
                                             
                              
                                             
                                          </tbody>
                                       </table>
                                       
                                       <small>Note: Data diatas akan ditampilkan ketika <i>User Kapal</i> membuat VDR Online .</small>
                                    </div>
                                    <br>
                                    <button class="btn btn-primary" type="submit">Save Update</button>
                                    <small class="">Klik 'Save Update', akan merubah data semua VDR pada table 'VDRs in Current Contrcat'</small>
                                    
                                    <hr>
                                    </form>
                                    <a href="#" class="text-danger mt-" data-toggle="modal" data-target="#modalDeleteContract">Delete Contract...</a>
                              @else
                                  <p class="text-danger"><i>No Active Contract</i></p>
                              @endif
                              
                        </div>
                     </div>

                     <div class="card">
                        <div class="card-body">
                           <div class="badge badge-light">VDRs in Current Contract</div>
                           <div class="badge badge-light">{{ count($vdrs) }} VDR</div>
                           <div class="table-responsive mt-2">
                              <table class="table table-bordered table-sm datatables-vdr ">
                                 <thead>
                                    <tr>
                                       <th>VDR ID</th>
                                       <th>No. Kontrak</th>
                                       <th>Date</th>
                                       
                                       <th>Status</th>
                                       {{-- <th>Speed (Knots)</th>
                                       <th>Fuel Cons. (Liters)</th> --}}
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($vdrs as $vdr)
                                       <tr class="border-bottom">
                                          <td class=""><a href="{{route('vdr.show.spa', [enkripRambo($vdr->id), enkripRambo('index')])}}"> {{ $vdr->code }}</a></td>
                                          <td>{{ $vdr->contract }}</td>
                                          <td>{{ $vdr->date }}</td>
                                          
                                          <td>
                                             <x-status-stisla.vdr :vdr="$vdr" />
                                          </td>
                                          {{-- <td>{{ $vdr->speed }}</td>
                                          <td>{{ $vdr->fuel_consumption }}</td> --}}
                                       </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                     
                     
                  </div>
               </div>
               
            
            <hr>
        
      
     
   </div>
</section>


  {{-- @foreach ($vessels as $vessel)
  <div class="modal fade" id="vessel-onhire-{{$vessel->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirm On Hire</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Change Status of {{$vessel->name}} to On Hire?
        </div>
        <div class="modal-footer bg-whitesmoke">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a href="{{route('vessel.onhire', enkripRambo($vessel->id))}}" class="btn btn-primary">On</a>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="vessel-offhire-{{$vessel->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirm Off Hire</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Change Status of {{$vessel->name}} to Off Hire?
        </div>
        <div class="modal-footer bg-whitesmoke">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a href="{{route('vessel.offhire', enkripRambo($vessel->id))}}" class="btn btn-primary">Off</a>
        </div>
      </div>
    </div>
  </div>
  @endforeach --}}

  @if ($activeContract)
      <div class="modal fade" id="modalDeleteContract" tabindex="1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
         
         
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Delete Contract</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               Hapus data kontrak ?
               <hr>
               
               <table>
                  <tbody>
                     <tr>
                        <td><b>Contract Number:</b> {{ $activeContract->contract_number }}</td>
                     </tr>
                     <tr>
                        <td><b>Type:</b> {{ $activeContract->type }}</td>
                     </tr>
                     <tr>
                        <td><b>Start Date:</b> {{ $activeContract->start_date }}</td>
                     </tr>
                     <tr>
                        <td><b>End Date:</b> {{ $activeContract->end_date }}</td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <div class="modal-footer bg-whitesmoke">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <a href="{{route('contract.delete', enkripRambo($activeContract->id))}}"  class="btn btn-danger">Delete Contract</a>
            </div>
         </div>
      </div>
   </div>
  @endif
   
  
    
@endsection