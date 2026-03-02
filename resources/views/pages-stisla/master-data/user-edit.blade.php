@extends('layouts.stisla.app-main')
@section('title')
   User
@endsection

@section('content')
<style>
   table {
      width: 100%;
   }

   /* table, th, td {
      border: 1px solid rgb(226, 218, 218);
      border-collapse: collapse;
      font-size: 12px;
   }
   th, td {
      padding-left: 5px
   } */
   
   input {
      width: 70px"
   }
</style>
<section class="section">
   {{-- <div class="section-header">
      <h1 class="section-title">User Management</h1>
      <div class="section-header-breadcrumb">
         <div class="breadcrumb-item "><a href="{{route('dsp.user')}}">Dashboard</a></div>
         <div class="breadcrumb-item active">User</div>
      </div>
   </div> --}}
   {{--  --}}

   <div class="section-body">
     

      <div class="row">
         <div class="col-md-4">
            <div class="card border shadow">
              
               <div class="card-body">
                  <b>Form Edit Userrr</b>
               <hr>
                  <form action="{{route('user.update')}}" method="POST">
                     @csrf
                     @method('PUT')

                     <input type="text" name="user" id="user" value="{{$user->id}}" hidden>
                     <div class="form-row">
                       
                        <div class="form-group col-md-12">
                           <label for="name">Name*</label>
                           <input type="text" class="form-control " id="name" name="name" value="{{$user->name}}" >
                        </div>
                        <div class="form-group col-md-6">
                           {{-- <label for="email">Email *</label> --}}
                           <input type="text" class="form-control " id="email" name="email" placeholder="Email" value="{{$user->email}}">
                        </div>
                        
                        <div class="form-group col-md-6">
                           {{-- <label for="username">Username *</label> --}}
                           <input type="text" class="form-control " id="username" name="username" placeholder="Username" value="{{$user->username}}">
                        </div>
                        

                        <div class="form-group col-md-12">
                           <label>Level*</label>
                           <select  class="custom-select" required id="level" name="level">
                              <option  disabled selected>Choose</option>
                              <option {{$user->role == 'marine' ? 'selected' : ''}} value="marine">Marine</option>
                              <option {{$user->role == 'suptent' ? 'selected' : ''}} value="suptent">Suptent</option>
                              <option {{$user->role == 'suptent_loc' ? 'selected' : ''}} value="suptent_loc">Suptent On Location</option>
               
                           </select>
                        </div>
                        <div class="form-group col-md-6">
                           <label>Func</label>
                           <select  class="custom-select" required id="func" name="func">
                              <option  disabled selected>Choose</option>
                              <option  value="Empty">Empty</option>
                              <option {{$user->func == 'WI' ? 'selected' : ''}} value="WI">WI</option>
                              <option {{$user->func == 'Drilling' ? 'selected' : ''}} value="Drilling">Drilling</option>
                              {{-- <option {{$user->func == 'NBU' ? 'selected' : ''}} value="NBU">NBU</option> --}}
               
                           </select>
                        </div>
                        <div class="form-group col-md-6">
                           <label>Area</label>
                           <select  class="custom-select" required id="area" name="area">
                              <option  disabled selected>Choose</option>
                              <option  value="Empty">Empty</option>
                              <option {{$user->area == 'SBU' ? 'selected' : ''}} value="SBU">SBU</option>
                              <option {{$user->area == 'CBU' ? 'selected' : ''}} value="CBU">CBU</option>
                              <option {{$user->area == 'NBU' ? 'selected' : ''}} value="NBU">NBU</option>
               
                           </select>
                        </div>
                        
                        
                        
                        
                       
                        
                     </div>
                     
                    
                     <button class="btn btn-primary mr-2">Update</button>
                     {{-- <a href="{{route('user')}}" class="btn btn-light border">Reset</a> --}}
                  </form>
               </div>
            </div>
         </div>
         <div class="col-8">
            <div class="card border shadow-sm">
               {{-- <div class="card-header">
                  <h4>Basic DataTables</h4>
               </div> --}}
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table table-striped table-sm" id="table-1">
                     <thead>
                        <tr>
                           {{-- <th class="text-center">No.</th> --}}
                           <th>Name</th>
                           {{-- <th>System</th> --}}
                           <th>Email</th>
                           <th>Username</th>
                           <th>Role</th>
                           
                           
                           
                           {{-- <th>Location</th> --}}
                           {{-- <th>Email</th> --}}
                           <th>Desc</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($users as $user)
                        <tr>
                           {{-- <td class="text-center">{{++$i}}</td> --}}
                           <td>
                              {{-- <a href="{{route('vessel.detail', enkripRambo($user->id))}}">{{$user->name}}</a>  --}}
                              {{$user->name}} 
                             
                           </td>
                           <td>{{$user->email}}</td>
                           <td>{{$user->username}}</td>
                           <td>
                              {{$user->role}}
                           </td>
                           
                           <td>{{$user->area}}</td>
                           
                          
                           
                         
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