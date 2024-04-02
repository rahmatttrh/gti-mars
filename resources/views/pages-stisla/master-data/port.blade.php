@extends('layouts.stisla.app')
@section('title')
    Port 
@endsection
@section('content')
   <section class="section">
      

      <div class="section-body">
         {{-- <h2 class="section-title">Schedule Plan</h2>
         <p class="section-lead">
         We use 'DataTables' made by @SpryMedia. You can check the full documentation <a href="https://datatables.net/">here</a>.
         </p> --}}

         <div class="row">
            <div class="col-md-3">
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
                  <button class="btn btn-info">Add</button>
               </form>
            </div>
         <div class="col-9">
            
            <div class="table-responsive">
               <table class="table-sm table-striped " id="table-1">
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
                        <td>
                           {{$port->name}}
                           @if ($port->port_id)
                                 (<span class="text-muted">{{$port->port->code ?? ''}}</span>)
                           @endif
                        </td>
                        
                        <td>{{$port->region}}</td>
                        <td>{{$port->email}}</td>
                        <td>{{$port->type}}</td>
                        <td>
                           
                           <a href="{{route('port.edit', enkripRambo($port->id))}}" class="">Edit</a>
                           <a href="" class="">Delete</a>
                        </td>
                     </tr>
                  @endforeach
                  
                  </tbody>
               </table>
            </div>
              
         </div>
         </div>
      </div>
   </section>


 {{-- Modal delete User --}}
   @foreach ($ports as $port)
   <div class="modal fade" id="user-delete-{{$port->id}}" tabindex="-1" role="dialog" aria-hidden="true">
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
               <a href="{{route('user.delete', enkripRambo($port->id))}}" class="btn btn-danger">Delete</a>
            </div>
         </div>
      </div>
   </div>
   @endforeach
 
  
    
@endsection