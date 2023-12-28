@extends('layouts.stisla.app')
@section('title')
    User
@endsection
@section('content')
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
               <div class="card-header">
                  <b>Form Add</b>
               </div>
               <div class="card-body">
                  <form action="{{route('user.store')}}" method="POST">
                     @csrf
                     <div class="form-row">
                        
                        <div class="form-group col-md-8">
                           <label for="name">Name*</label>
                           <input type="text" class="form-control " id="name" name="name" >
                        </div>
                        <div class="form-group col-md-4">
                           <label for="ekstensi">Ekstensi</label>
                           <input type="text" class="form-control " id="ekstensi" name="ekstensi" >
                        </div>
                        
                        <div class="form-group col-md-6">
                           <label for="username">Username</label>
                           <input type="text" class="form-control " id="username" name="username" >
                        </div>
                        <div class="form-group col-md-6">
                           <label>Location*</label>
                           <select  class="custom-select" id="port" name="port">
                              <option  disabled selected>Choose one</option>
                              @foreach ($ports as $port)
                                  <option value="{{$port->id}}">{{$port->name}}</option>
                              @endforeach
                           </select>
                        </div>
                        
                     </div>
                     <div class="form-row">
                        <div class="form-group col-md-12">
                           <label for="email">Email</label>
                           <input type="text" class="form-control " id="email" name="email" >
                        </div>
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
                     <button class="btn btn-primary">Submit</button>
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
                           
                           <th>Username</th>
                           <th>Location</th>
                           {{-- <th>Email</th> --}}
                           {{-- <th>Role</th> --}}
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($users as $user)
                        @if ($user->hasRole('vessel'))
                           @else
                           <tr>
                              <td class="text-center">{{++$i}}</td>
                              <td>
                                 {{-- <a href="{{route('vessel.detail', enkripRambo($user->id))}}">{{$user->name}}</a>  --}}
                                 {{$user->name}} 
                                 {{-- <br>
                                 <small>{{$user->email}}</small> --}}
                              </td>
                              <td>{{$user->username}}</td>
                              <td>
                                 {{$user->getPortName() ?? ''}}
                                 
                              </td>
                              
                              
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
                                 <div class="btn-group btn-sm">
                                 <a href="{{route('user.detail', enkripRambo($user->id))}}" class="btn btn-primary btn-sm">Detail</a>
                                 <a href="{{route('user.edit', enkripRambo($user->id))}}" class="btn btn-primary btn-sm">Edit</a>
                                 <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#user-delete-{{$user->id}}"><i class="fa fa-trash"></i></a>
                                 </div>
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