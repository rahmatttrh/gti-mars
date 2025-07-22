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
                  {{-- <b>Form Add User</b>
               <hr> --}}
               <div class="section-header p-0 shadow-none">
               
                  <div class="breadcrumb-item ">Master Data</div>
                  <div class="breadcrumb-item active">User</div>
                 
               </div>
                  <form action="{{route('user.store')}}" method="POST">
                     @csrf
                     {{-- <label class="d-block"><b>Choose app</b></label>
                     <div class="d-flex mb-3">
                        <div class="form-check mr-3">
                           <input class="form-check-input" type="checkbox" name="dsp" id="dsp" value="dsp">
                           <label class="form-check-label" for="dsp">
                             DSP
                           </label>
                        </div>
                        <div class="form-check mr-3">
                           <input class="form-check-input" type="checkbox" name="vdr" id="vdr" value="vdr" checked>
                           <label class="form-check-label" for="vdr">
                             VDR
                           </label>
                        </div>
                        <div class="form-check mr-3">
                           <input class="form-check-input" type="checkbox" name="proact" id="proact" value="proact" disabled>
                           <label class="form-check-label text-muted" for="proact">
                              PROACT
                           </label>
                        </div>
                        <div class="form-check mr-3">
                           <input class="form-check-input" type="checkbox" name="map" id="map" value="map" disabled>
                           <label class="form-check-label text-muted" for="map">
                             MAP
                           </label>
                        </div>
                     </div> --}}
                     
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
                       
                        <div class="form-group col-md-12">
                           <label for="name">Name*</label>
                           <input type="text" class="form-control " id="name" name="name" >
                        </div>
                        <div class="form-group col-md-6">
                           {{-- <label for="email"></label> --}}
                           <input type="text" class="form-control " placeholder="Email" id="email" name="email" >
                        </div>
                        
                        <div class="form-group col-md-6">
                           {{-- <label for="username">Username *</label> --}}
                           <input type="text" class="form-control " placeholder="Username" id="username" name="username" >
                        </div>
                        {{-- <div class="form-group col-md-6">
                           <label for="no_telp">No. Telp</label>
                           <input type="text" class="form-control " id="no_telp" name="no_telp" >
                        </div> --}}

                        <div class="form-group col-md-12">
                           {{-- <label>Level*</label> --}}
                           <select  class="custom-select" required id="level" name="level">
                              <option  disabled selected>Choose Level User</option>
                              <option value="marine">Marine</option>
                              <option value="suptent">Suptent</option>
                              <option value="suptent_loc">Suptent On Location</option>
               
                           </select>
                        </div>
                        <div class="form-group col-md-6">
                           <label>Func</label>
                           <select  class="custom-select" required id="func" name="func">
                              <option  disabled selected>Choose</option>
                              <option  value="Empty">Empty</option>
                              <option value="WI">WI</option>
                              <option value="Drilling">Drilling</option>
                              {{-- <option value="NBU">NBU</option> --}}
               
                           </select>
                        </div>
                        <div class="form-group col-md-6">
                           <label>Area</label>
                           <select  class="custom-select" required id="area" name="area">
                              <option  disabled selected>Choose</option>
                              <option  value="Empty">Empty</option>
                              <option value="SBU">SBU</option>
                              <option value="CBU">CBU</option>
                              <option value="NBU">NBU</option>
               
                           </select>
                        </div>
                        
                        
                        
                        
                       
                        
                     </div>
                     
                    
                     <button class="btn btn-primary mr-2">Submit</button>
                     <a href="{{route('user')}}" class="btn btn-light border">Reset</a>
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
                           
                           <td>{{$user->area}} {{$user->func}}</td>
                           
                          
                           
                         
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