@extends('layouts.stisla.app-main')
@section('title')
   Vessel Detail
@endsection

@section('content')
<section class="section">
    {{-- <div class="section-header">
      <h1 class="section-title">Detail Vessel</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item "><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item active">Detail Vessel</div>
      </div>
    </div> --}}

   <div class="section-body">
      
     
      

            <form action="{{route('vessel.update')}}" method="POST">
               @csrf
               @method('PUT')
               <input type="number" name="vessel" id="vessel" value="{{$vessel->id}}" hidden>

               <div class="row">
                  <div class="col-md-6">
                     
                     <div class="card shadow">
                        <div class="card-body">
                           <h4 class="border-bottom">Form Edit Vessel</h4>
                           <small>Kolom input dengan tanda (*) wajib di isi</small>
                           {{-- <div class="section-header p-0 shadow-none">
               
                              <div class="breadcrumb-item ">Master Data</div>
                              <div class="breadcrumb-item "><a href="{{route('vessel')}}">Vessel</a></div>
                              <div class="breadcrumb-item active">Detail</div>
                             
                           </div> --}}
                           {{-- <h4 class="">Detail Vessel</h4>
                           <hr> --}}
                           <div class="form-row">
                              <div class="form-group col-md-12">
                                 <label for="name" >Vessel Name*</label>
                                 <input type="text" class="form-control" id="name" name="name" value="{{$vessel->name}}" >
                              </div>
                              
                           </div>

                           <div class=" form-row">
                              <div class="form-group col-md-5">
                                 <label for="type" >Vessel Type*</label>
                                 {{-- <input type="text" class="form-control" id="type" name="type"  > --}}
                                 <select  class="form-control" id="type" required  name="type" >
                                    <option value="" disabled selected>Select</option>
                                    <option {{$vessel->type == 'Crew Boat' ? 'selected' : ''}}  value="Crew Boat">Crew Boat</option>
                                    <option {{$vessel->type == 'AHTS' ? 'selected' : ''}} value="AHTS">AHTS</option>
                                    <option {{$vessel->type == 'Supply' ? 'selected' : ''}}  value="Supply">Supply</option>
                                 </select>
                              </div>
                              <div class="form-group col-md-7">
                                 <label for="username" >Username*</label>
                                 <input type="text" required class="form-control" id="username" name="username" value="{{$vessel->username}}"  >
                                 </div>
                           </div>



                           <div class="form-row">
                              <div class="form-group col-md-5">
                                 <label for="status">Status*</label>
                                 <select  class="form-control" id="status" required name="status" >
                                    <option value="" disabled selected>Select</option>
                                    <option {{$vessel->status == 0 ? 'selected' : ''}} value="0">Offhire</option>
                                    <option {{$vessel->status == 1 ? 'selected' : ''}} value="1">Onhire</option>
                                    <option {{$vessel->status == 2 ? 'selected' : ''}} value="2">Maintenance</option>
                                 </select>
                              </div>

                              <div class="form-group col-md-7">
                                 <label for="contract">Contract Number*</label>
                                 <input type="text" class="form-control" id="contract" required name="contract" value="{{$vessel->contract}}" >
                              </div>
                           </div>

                           <div class="form-row">
                              <div class="form-group col-md-5">
                                 <label for="contract_type">Contract Type*</label>
                                 <select  class="form-control" id="contract_type" required name="contract_type" >
                                    <option value="" disabled selected>Select Contract</option>
                                    <option {{$vessel->contract_type == 'Under PO' ? 'selected' : ''}} value="Under PO">Under PO</option>
                                    <option {{$vessel->contract_type == 'Non PO' ? 'selected' : ''}} value="Non PO">Non PO</option>
                                 </select>
                              </div>
                              <div class="form-group col-md-7">
                                 <label for="contract_type"> IPB / Non IPB</label>
                                 <select  class="form-control" id="ipb"  name="ipb" >
                                    <option value="" disabled selected>Select IPB / Non IPB</option>
                                    <option {{$vessel->ipb == 'IPB' ? 'selected' : ''}} value="IPB">IPB</option>
                                    <option {{$vessel->ipb == 'Non IPB' ? 'selected' : ''}} value="Non IPB">Non IPB</option>
                                    
                                 </select>
                              </div>
                              <div class="form-group col-md-5">
                                 <label for="contract_type">Func</label>
                                 <select  class="form-control" id="func"  name="func" >
                                    <option value="" disabled selected>Select Func</option>
                                    <option value="Empty" >Empty</option>
                                    <option {{$vessel->func == 'WI' ? 'selected' : ''}} value="WI">WI</option>
                                    <option {{$vessel->func == 'Drilling' ? 'selected' : ''}} value="Drilling">Drilling</option>
                                    <option {{$vessel->func == 'Project' ? 'selected' : ''}} value="Project">Project</option>
                                    <option {{$vessel->func == 'Security' ? 'selected' : ''}} value="Security">Security</option>
                                    
                                 </select>
                              </div>
                              <div class="form-group col-md-7">
                                 <label for="contract_type">Area</label>
                                 <select  class="form-control" id="area"  name="area" >
                                    <option value="" disabled selected>Select BU</option>
                                    <option value="Empty"  >Empty</option>
                                    <option {{$vessel->area == 'SBU' ? 'selected' : ''}} value="SBU">SBU</option>
                                    <option {{$vessel->area == 'CBU' ? 'selected' : ''}} value="CBU">CBU</option>
                                    <option {{$vessel->area == 'NBU' ? 'selected' : ''}} value="NBU">NBU</option>
                                 </select>
                              </div>
                              
                           </div>
                           {{-- <hr> --}}
                           <hr>
                           <button class="btn btn-primary shadow">Update</button>
                           
                           {{-- <a href="{{route('vessel.delete', enkripRambo($vessel->id))}}" class="btn btn-danger" >Delete</a> --}}
                        </div>
                     </div>
                     

                     

                     
                     
                  </div>

                  <div class="col-md-6">
                     <div class="card">
                        <div class="card-body">
                           {{-- <div class="badge badge-info">VDR</div> --}}
                           <span class=""><i>Recent VDR</i></span>
                           
                          
                          @if ($lastVdr != null)
                          <div class="table-responsive mt-2" >
                           <table class="w-100 border">
                             
                              <thead>
                                 <tr>
                                    <td class="border">VDR ID</td>
                                    <td class="border" colspan="2">{{$lastVdr->code}}</td>
                                 </tr>
                                 <tr>
                                    <td class="border">Date</td>
                                    <td class="border" colspan="2">{{formatDate($lastVdr->date)}}</td>
                                 </tr>
                                 <tr>
                                    <td class="border">Status</td>
                                    <td class="border" colspan="2"><x-status-stisla.vdr-plain :vdr="$lastVdr" /></td>
                                 </tr>
                                 {{-- <tr>
                                    <td colspan="5" class="border"><b class="text-primary" style="color: #1f4481 !important">Summary of Daily Operating Data</b></td>
                                   
                                 </tr> --}}
                                 <tr class="text-center bg-lgray ">
                                    {{-- <th><input type="checkbox" name="" id="checkboxAll"></th> --}}
                                    <th class="border">Operating Mode</th>
                                    <th class="border">Min. Speed as Contract (Knots) <br> </th>
                                    <th class="border" >Contractual Fuel Cons.
                                       Remuneration Figures</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 
                                    @foreach ($lastVdr->operatings as $operating)
                                    @if ($operating->heading->speed == '0' && $operating->heading->contractual == '0')
                                        @else
                                        <tr id="baris-{{$operating->id}}">
                                          <!-- <td> -->
                                          <input  type="hidden" name="id[]" value="{{$operating->id}}">
                                          <input  type="hidden" id="operating_{{$operating->id}}" value="{{$operating->id}}">
                                          <!-- </td> -->
                                          <td class="text-truncate border"> 
                                             @if ( $operating->heading->description == "Maneuvering (Manu) - Including DP")
                                             Maneuvering (Manu)
                                                 @else
                                                 {{$operating->heading->description}}
                                             @endif
                                             </td>
                                          
                                          <td class="text-center align-middle bg-y border">
                                                @if($operating->heading->speed == '1')
                                                <input class="input" style="background-color: rgb(226, 236, 151)" class="w-100 input_operating_{{$operating->id}}" type="number" id="speed_{{$operating->id}}" name="speed[]"  value="{{$operating->speed}}">
                                                @else
                                                <input class="input" style="background-color: rgb(226, 236, 151)" class="w-100 input_operating_{{$operating->id}}" type="hidden" id="speed_{{$operating->id}}" name="speed[]"  value="{{$operating->speed}}">
                                                @endif
                                          </td>
                     
                                          <td class="text-center align-middle bg-y border">
                                             <!-- {{$operating->contractual_fuel}} -->
                                                @if($operating->heading->contractual == '1')
                                                <input class="input" style="background-color: rgb(226, 236, 151)" class="w-100 input_operating_{{$operating->id}}" type="text" id="fuel_{{$operating->id}}" name="contractual_fuel[]"  value="{{$operating->contractual_fuel}}">
                                                @else
                                                <input class="input" style="background-color: rgb(226, 236, 151)" class="w-100 input_operating_b_{{$operating->id}}" type="hidden" id="fuel_{{$operating->id}}" name="contractual_fuel[]"  value="{{$operating->contractual_fuel}}">
                                                @endif
                                          </td>
                                          
                                       </tr>
                                    @endif
                                    
                                    @endforeach
                                   
                  
                                 
                              </tbody>
                           </table>
                        </div>
                              @else

                              Belum ada data VDR
                          @endif
                           
                        </div>
                        
                     </div>
                     
                  </div>
               </div>
               
               
            </form>
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
  
    
@endsection