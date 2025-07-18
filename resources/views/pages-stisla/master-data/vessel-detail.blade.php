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
                  <div class="col-md-4">
                     <div class="section-header shadow">
               
                        <div class="breadcrumb-item ">Master Data</div>
                        <div class="breadcrumb-item "><a href="{{route('vessel')}}">Vessel</a></div>
                        <div class="breadcrumb-item active">Detail</div>
                       
                     </div>
                     <div class="card shadow">
                        <div class="card-body">
                           {{-- <h4 class="">Detail Vessel</h4>
                           <hr> --}}
                           <div class="form-row">
                              <div class="form-group col-md-12">
                                 <label for="name" >Vessel Name</label>
                                 <input type="text" class="form-control" id="name" name="name" value="{{$vessel->name}}" >
                              </div>
                              
                           </div>
                           <div class="form-row">
                              <div class="form-group col-md-5">
                                 <label for="status">Status</label>
                                 <select  class="form-control" id="status" required name="status" >
                                    <option value="" disabled selected>Select</option>
                                    <option {{$vessel->status == 0 ? 'selected' : ''}} value="0">Offhire</option>
                                    <option {{$vessel->status == 1 ? 'selected' : ''}} value="1">Onhire</option>
                                    <option {{$vessel->status == 2 ? 'selected' : ''}} value="2">Maintenance</option>
                                 </select>
                              </div>

                              <div class="form-group col-md-7">
                                 <label for="contract">Contract Number</label>
                                 <input type="text" class="form-control" id="contract" name="contract" value="{{$vessel->contract}}" >
                              </div>
                           </div>

                           <div class="form-row">
                              <div class="form-group col-md-5">
                                 {{-- <label for="contract_type">Contract Type</label> --}}
                                 <select  class="form-control" id="contract_type" required name="contract_type" >
                                    <option value="" disabled selected>Select Contract</option>
                                    <option {{$vessel->contract_type == 'Under PO' ? 'selected' : ''}} value="Under PO">Under PO</option>
                                    <option {{$vessel->contract_type == 'Non PO' ? 'selected' : ''}} value="Non PO">Non PO</option>
                                 </select>
                              </div>
                              <div class="form-group col-md-7">
                                 {{-- <label for="contract_type">Area</label> --}}
                                 <select  class="form-control" id="area"  name="area" >
                                    <option value="" disabled selected>Select BU</option>
                                    <option {{$vessel->area == 'SBU' ? 'selected' : ''}} value="SBU">SBU</option>
                                    <option {{$vessel->area == 'CBU' ? 'selected' : ''}} value="CBU">CBU</option>
                                    <option {{$vessel->area == 'NBU' ? 'selected' : ''}} value="NBU">NBU</option>
                                 </select>
                              </div>
                              <div class="form-group col-md-12">
                                 {{-- <label for="contract_type">Func</label> --}}
                                 <select  class="form-control" id="area"  name="area" >
                                    <option value="" disabled selected>Select Func</option>
                                    <option {{$vessel->area == 'WI' ? 'selected' : ''}} value="WI">WI</option>
                                    <option {{$vessel->area == 'Drilling' ? 'selected' : ''}} value="Drilling">Drilling</option>
                                    <option {{$vessel->area == 'NBU' ? 'selected' : ''}} value="NBU">NBU</option>
                                 </select>
                              </div>
                           </div>
                           {{-- <hr> --}}
                           
                           {{-- <a href="{{route('vessel.delete', enkripRambo($vessel->id))}}" class="btn btn-danger" >Delete</a> --}}
                        </div>
                     </div>
                     <button class="btn btn-primary btn-block py-3 shadow">Update</button>

                     

                     
                     
                  </div>

                  <div class="col-md-8">
                     <div class="card">
                        <div class="card-body">
                           <div class="row">
                              <div class="col-md-12">
                                 
                                 <div class=" form-row">
                                    <div class="form-group col-md-6">
                                       <label for="type" >Type</label>
                                       <input type="text" class="form-control" id="type" name="type" value="{{$vessel->type}}" >
                                    </div>
                                    <div class="form-group col-md-6" >
                                    <label for="telp" >Telp</label>
                                    <input type="email" class="form-control" id="telp" name="telp" value="{{$vessel->telp}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label for="username" >Username</label>
                                    <input type="text" class="form-control" id="username" name="username" value="{{$vessel->username}}" >
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="email" >Email</label>
                                       <input type="email" class="form-control" id="email" name="email" value="{{$vessel->email}}" >
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="dpa_name">DPA Name</label>
                                       <input type="text" class="form-control" id="dpa_name" name="dpa_name" value="{{$vessel->dpa_name}}" >
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="dpa_telp">DPA No. Telp</label>
                                       <input type="text" class="form-control" id="dpa_telp" name="dpa_telp" value="{{$vessel->dpa_telp}}" >
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="master">Master</label>
                                       <input type="text" class="form-control" id="master" name="master" value="{{$vessel->master}}" >
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="co">CO</label>
                                       <input type="text" class="form-control" id="co" name="co" value="{{$vessel->co}}" >
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="form-row">
                                    <div class="form-group col-md-12">
                                       <label for="prev_name">Prev Name</label>
                                       <input type="text" class="form-control" id="prev_name" name="prev_name" value="{{$vessel->prev_name}}" >
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="imo">IMO Number</label>
                                       <input type="text" class="form-control" id="imo" name="imo" value="{{$vessel->imo}}" >
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="owner">Vessel Owner</label>
                                       <input type="text" class="form-control" id="owner" name="owner" value="{{$vessel->owner}}" >
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="operator">Vessel Operator</label>
                                       <input type="text" class="form-control" id="operator" name="operator" value="{{$vessel->operator}}" >
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="flag">Flag</label>
                                       <input type="text" class="form-control" id="flag" name="flag" value="{{$vessel->flag}}" >
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="call_sign">Call Sign</label>
                                       <input type="text" class="form-control" id="call_sign"  name="call_sign" value="{{$vessel->call_sign}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="portname">Port of Registry</label>
                                       <input type="text" class="form-control" id="portname" name="portname" value="{{$vessel->portname}}" >
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="build">Year of Build</label>
                                       <input type="text" class="form-control" id="build" name="build" value="{{$vessel->build}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="classed_by">Vessel Classified by</label>
                                       <input type="text" class="form-control" id="classed_by" name="classed_by" value="{{$vessel->classed_by}}" >
                                    </div>
                                 </div>
                                 <div class="form-row">
                                    <div class="form-group col-md-6">
                                       <label for="txid">TXID </label>
                                       <input type="text" class="form-control" id="txid" name="txid" value="{{$vessel->txid}}" >
                                    </div>
                                    <div class="form-group col-md-6">
                                       <label for="mmsi">MMSI </label>
                                       <input type="text" class="form-control" id="mmsi" name="mmsi" value="{{$vessel->mmsi}}" >
                                    </div>
                                    <div class="form-group col-md-4">
                                       <label for="deadweight">Deadweight </label>
                                       <input type="text" class="form-control" id="deadweight" name="deadweight" value="{{$vessel->deadweight}}" >
                                    </div>
                                    <div class="form-group col-md-4">
                                       <label for="deckspace">Deckspace</label>
                                       <input type="text" class="form-control" id="deckspace" name="deckspace" value="{{$vessel->deckspace}}" >
                                    </div>
                                    <div class="form-group col-md-4">
                                       <label for="depth">Depth</label>
                                       <input type="text" class="form-control" id="depth" name="depth" value="{{$vessel->depth}}" >
                                    </div>
                                 </div>
                                 
                              </div>
                              
                           </div>
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