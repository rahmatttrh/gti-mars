@extends('layouts.stisla.app')
@section('title')
   Detail Vessel
@endsection
@section('content')
<section class="section">
    <div class="section-header">
      <h1 class="section-title">Detail Vessel</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item "><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item active">Detail Vessel</div>
      </div>
    </div>

   <div class="section-body">
      {{-- <h2 class="section-title">Schedule Plan</h2>
      <p class="section-lead">
         We use 'DataTables' made by @SpryMedia. You can check the full documentation <a href="https://datatables.net/">here</a>.
      </p> --}}

      <div class="row">
         <div class="col-md-4">
            <div class="card">
            {{-- <div class="card-header">
               <h4>Basic DataTables</h4>
            </div> --}}
            <div class="card-body">
               <small>{{$vessel->type}}</small><br>
               <b>{{$vessel->name}}</b>
               <hr>
               
               <small>CONTACT</small><br>
               <b>Telp : {{$vessel->telp}}</b><br>
               <b>Username : {{$vessel->username}}</b><br>
               <b>Email : {{$vessel->email}}</b><br>
               <b>DPA Name : {{$vessel->dpa_name}}</b><br>
               <b>DPA Telp : {{$vessel->dpa_telp}}</b><br>

               <hr>
               
               <small>PERSON</small><br>
               <b>Master : {{$vessel->master}}</b><br>
               <b>Chief Officer : {{$vessel->co}}</b><br>
            </div>
            </div>
         </div>
         <div class="col-md-8">
            <div class="card">
               <div class="card-body">
                  <small>Detail</small><br>
                  <b>Prev name : {{$vessel->prev_name}}</b><br>
                  <b>IMO Number : {{$vessel->imo}}</b><br>
                  <b>Type of Vessel : {{$vessel->type}}</b><br>
                  <b>Vessel Owner : {{$vessel->owner}}</b><br>
                  <b>Vessel Operator : {{$vessel->operator}}</b><br>
                  <b>Flag : {{$vessel->operator}}</b><br>
                  <b>Call Sign : {{$vessel->operator}}</b><br>
                  <b>Port of Registry : {{$vessel->operator}}</b><br>
                  <b>Year of Build : {{$vessel->operator}}</b><br>
                  <b>Vessel Classed By : {{$vessel->operator}}</b><br>
                  <b>Deadweight Tonnage : {{$vessel->operator}}</b><br>
                  <b>Clear Deckspace : {{$vessel->operator}}</b><br>
               </div>
            </div>
         </div>
      </div>
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