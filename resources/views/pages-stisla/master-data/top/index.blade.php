@extends('layouts.stisla.app')
@section('title')
   DSP Master Data
@endsection

@section('content')


   <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
         <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Vessel</a>
      </li>
      <li class="nav-item">
         <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Port</a>
      </li>
   </ul>
   <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
         <div class="table-responsive">
            <table class=" table-striped " id="table-4">
            <thead>
               <tr>
                  {{-- <th class="text-center">No.</th> --}}
                  <th>Name</th>
                  <th>TXID</th>
                  <th>Email</th>
                  <th>Type</th>
                  <th>Status</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($vessels as $vessel)
               <tr>
                  {{-- <td class="text-center">{{++$i}}</td> --}}
                  <td><a href="{{route('vessel.detail', enkripRambo($vessel->id))}}">{{$vessel->name}}</a> </td>
                  <td>{{$vessel->txid }}</td>
                  <td>{{$vessel->email}}</td>
                  <td>{{$vessel->type}}</td>
                  <td>
                     @if ($vessel->status == 0)
                        <a href="#" class="badge badge-light" data-toggle="modal" data-target="#vessel-onhire-{{$vessel->id}}">Off Hire</a>
                        @elseif($vessel->status == 1)
                        <a href="#" class="badge badge-primary" data-toggle="modal" data-target="#vessel-offhire-{{$vessel->id}}">On Hire</a>
                     @endif
                  </td>
               </tr>
               @endforeach
               
            </tbody>
            </table>
         </div>
      
      </div>
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
         <div class="row">
            <div class="col-md-4">
               <b>Form Add Port</b>
               <hr>
               <form action="{{route('port.store')}}" method="POST">
                  @csrf
                  <div class="form-row">
                     
                     <div class="form-group col-md-12">
                        <label for="name">Location Name*</label>
                        <input type="text" class="form-control " id="name" name="name" >
                     </div>
                     <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="text" class="form-control " id="email" name="email" >
                     </div>
                     <div class="form-group col-md-6">
                        <label for="username">Username</label>
                        <input type="text" class="form-control " id="username" name="username" >
                     </div>
                  </div>
                  <div class="form-row">
                     <div class="form-group col-md-7">
                        <label>Type*</label>
                        <select  class="custom-select" id="type" name="type">
                           <option  disabled selected>Choose one</option>
                           <option value="Port">Port</option>
                           <option value="Barge">Barge</option>
                           <option value="Island">Island</option>
                           <option value="Rig/Barge/Tanker">Rig/Barge/Tanker</option>
                           <option value="Platform">Platform</option>
                        </select>
                     </div>
                     <div class="form-group col-md-5">
                        <label>Region</label>
                        <select  class="custom-select" id="region" name="region">
                           <option  disabled selected>Choose one</option>
                           <option value="NBU">NBU</option>
                           <option value="CBU">CBU</option>
                           <option value="SBU">SBU</option>
                        </select>
                     </div>
                  </div>
                  <button class="btn btn-primary">Submit</button>
               </form>
            </div>
            <div class="col-8">
               <div class="table-responsive">
                  <table class=" table-striped" id="table-1">
                     <thead>
                     <tr>
                        {{-- <th class="text-center">No.</th> --}}
                        <th>Name</th>
                        <th>Region</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th></th>
                     </tr>
                     </thead>
                     <tbody>
                     @foreach ($ports as $port)
                        <tr>
                           {{-- <td class="text-center">{{++$i}}</td> --}}
                           <td>{{$port->name}}</td>
                           
                           <td>{{$port->region}}</td>
                           <td>{{$port->email}}</td>
                           <td>{{$port->type}}</td>
                           <td>
                              
                              <a href="{{route('port.edit', enkripRambo($port->id))}}" class="">Edit</a>
                              <a href="#" class="" data-toggle="modal" data-target="#port-delete-{{$port->id}}">Delete</a>
                           </td>
                        </tr>
                     @endforeach
                     
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   

{{-- Modal delete Port --}}
@foreach ($ports as $port)
<div class="modal fade" id="port-delete-{{$port->id}}" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Confirmation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            Delete {{$port->name}} ?
         </div>
         <div class="modal-footer bg-whitesmoke">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <a href="{{route('port.delete', enkripRambo($port->id))}}" class="btn btn-danger">Delete</a>
         </div>
      </div>
   </div>
</div>
@endforeach

@foreach ($vessels as $vessel)
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
  @endforeach


@endsection