@extends('layouts.stisla.app')
@section('title')
    User Management
@endsection
@section('content')
<style>
   table {
      width: 100%;
   }

   table, th, td {
      border: 1px solid rgb(226, 218, 218);
      border-collapse: collapse;
      font-size: 12px;
   }
   th, td {
      padding-left: 5px
   }
   
   input {
      width: 70px"
   }
</style>
<section class="section">
   <div class="section-header">
      <h1 class="section-title">User Management</h1>
      <div class="section-header-breadcrumb">
         <div class="breadcrumb-item "><a href="{{route('dsp.user')}}">Dashboard</a></div>
         <div class="breadcrumb-item active">User</div>
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
                  <b>Form Add</b>
               </div> --}}
               <div class="card-body">
                  <form action="{{route('user.update')}}" method="POST">
                     @csrf
                     <label class="d-block"><b>Choose app</b></label>
                     <div class="d-flex mb-3">
                        <div class="form-check mr-3">
                           <input class="form-check-input" type="radio" {{$user->system == 'dsp' ?  'selected' : ''}} name="sistem" id="dsp" value="dsp">
                           <label class="form-check-label" for="dsp">
                             DSP
                           </label>
                        </div>
                        <div class="form-check mr-3">
                           <input class="form-check-input" type="radio" {{$user->system == 'vdr' ?  'selected' : ''}} name="sistem" id="vdr" value="vdr" checked>
                           <label class="form-check-label" for="vdr">
                             VDR
                           </label>
                        </div>
                        <div class="form-check mr-3">
                           <input class="form-check-input" type="radio" {{$user->system == 'proact' ?  'selected' : ''}} name="sistem" id="proact" value="proact" >
                           <label class="form-check-label" for="proact">
                              PROACT
                           </label>
                        </div>
                        <div class="form-check mr-3">
                           <input class="form-check-input" type="radio" {{$user->system == 'map' ?  'selected' : ''}} name="sistem" id="map" value="map">
                           <label class="form-check-label" for="map">
                             MAP
                           </label>
                        </div>
                     </div>
                     
                     {{-- <div class="form-group">
                        <label class="d-block">Choose app</label>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                          <label class="form-check-label" for="inlineCheckbox1">DSP</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                          <label class="form-check-label" for="inlineCheckbox2">VDR</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                           <label class="form-check-label" for="inlineCheckbox2">PROACT</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                           <label class="form-check-label" for="inlineCheckbox2">MAP</label>
                        </div>
                     </div> --}}
                     <div class="form-row">
                        <div class="form-group col-md-5">
                           <label>Role *</label>
                           <select  class="custom-select" id="role" name="role">
                              {{-- <option value="department">User</option> --}}
                              <option {{$user->hasRole('admin-dsp') ? 'selected' : ''}} {{$user->hasRole('admin-vdr') ? 'selected' : ''}} value="admin" selected>Admin</option>
                              <option {{$user->hasRole('superadmin-dsp') ? 'selected' : ''}} {{$user->hasRole('superadmin-vdr') ? 'selected' : ''}} value="superadmin">Super Admin</option>
                              {{-- <option value="admin-fm">Admin FM</option> --}}
                              {{-- <option value="superadmin">Super</option> --}}
                           </select>
                        </div>
                        <div class="form-group col-md-7">
                           <label for="email">Email *</label>
                           <input type="text" class="form-control " value="{{$user->email}}" id="email" name="email" >
                        </div>
                        <div class="form-group col-md-12">
                           <label for="name">Name*</label>
                           <input type="text" class="form-control " value="{{$user->name}}" id="name" name="name" >
                        </div>
                        <div class="form-group col-md-5">
                           <label for="username">Username *</label>
                           <input type="text" class="form-control " value="{{$user->username}}" id="username" name="username" >
                        </div>
                        <div class="form-group col-md-7">
                           <label for="no_telp">No. Telp</label>
                           <input type="text" class="form-control " value="{{$user->no_telp}}" id="no_telp" name="no_telp" >
                        </div>
                        
                        
                        
                        
                        {{-- <div class="form-group col-md-6">
                           <label>Location*</label>
                           <select  class="custom-select" id="port" name="port">
                              <option  disabled selected>Choose one</option>
                              @foreach ($ports as $port)
                                  <option value="{{$port->id}}">{{$port->name}}</option>
                              @endforeach
                           </select>
                        </div> --}}
                        
                     </div>
                     
                     {{-- <div class="form-row">
                        <div class="form-group col-md-12">
                           <label>Location*</label>
                           <select  class="custom-select" id="port" name="port">
                              <option  disabled selected>Choose one</option>
                              @foreach ($ports as $port)
                                  <option value="{{$port->id}}">{{$port->name}}</option>
                              @endforeach
                           </select>
                        </div>
                        
                     </div> --}}
                     <button class="btn btn-primary" type="submit">Submit</button>
                     <a href="{{route('user')}}" class="btn btn-light border">Reset</a>
                  </form>
               </div>
            </div>
         </div>
         <div class="col-8">
            <div class="card">
               {{-- <div class="card-header">
                  <h4>Basic DataTables</h4>
               </div> --}}
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table table-striped table-sm" id="table-1">
                     <thead>
                        <tr>
                           <th class="text-center">No.</th>
                           <th>Name</th>
                           <th>System</th>
                           <th>Role</th>
                           <th>Email</th>
                           <th>Telp</th>
                           <th>Username</th>
                           {{-- <th>Location</th> --}}
                           {{-- <th>Email</th> --}}
                           {{-- <th>Role</th> --}}
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($users as $user)
                        @if ($user->hasRole('vessel') || $user->hasRole('department') || $user->hasRole('marine'))
                           @else
                           <tr>
                              <td class="text-center">{{++$i}}</td>
                              <td>
                                 {{-- <a href="{{route('vessel.detail', enkripRambo($user->id))}}">{{$user->name}}</a>  --}}
                                 {{$user->name}} 
                                 {{-- <br>
                                 <small>{{$user->email}}</small> --}}
                              </td>
                              <td>{{strtoupper($user->system)}}</td>
                              <td>
                                 {{getRoleName($user)}}
                              </td>
                              <td>{{$user->email}}</td>
                              <td>{{$user->no_telp}}</td>
                              <td>{{$user->username}}</td>
                             
                              
                              
                              {{-- <td>{{$user->email}}</td> --}}
                              {{-- <td>
                                 @if ($user->hasRole('department'))
                                    User
                                    @elseif($user->hasRole('vessel'))
                                    Vessel
                                    @elseif($user->hasRole('marine'))
                                    Admin
                                 @endif
                              </td> --}}
                              <td>
                                 {{-- <div class="btn-group btn-sm">
                                 <a href="{{route('user.detail', enkripRambo($user->id))}}" class="btn btn-primary btn-sm">Detail</a>
                                 <a href="{{route('user.edit', enkripRambo($user->id))}}" class="btn btn-primary btn-sm">Edit</a>
                                 <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#user-delete-{{$user->id}}"><i class="fa fa-trash"></i></a>
                                 </div> --}}
                                 {{-- <a href="{{route('user.detail', enkripRambo($user->id))}}" >Detail</a> --}}
                                 <a href="{{route('user.edit', enkripRambo($user->id))}}" class="mx-1" >Edit</a>
                                 <a href="#"  data-toggle="modal" data-target="#user-delete-{{$user->id}}">Delete</a>
                              </td>
                           </tr>
                        @endif
                        
                        @endforeach
                        
                     </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>


 {{-- Modal delete User --}}
   @foreach ($users as $user)
   <div class="modal fade" id="user-delete-{{$user->id}}" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Confirmation</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               Delete {{$user->name}} ?
            </div>
            <div class="modal-footer bg-whitesmoke">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <a href="{{route('user.delete', enkripRambo($user->id))}}" class="btn btn-danger">Delete</a>
            </div>
         </div>
      </div>
   </div>
   @endforeach
 
  
    
@endsection