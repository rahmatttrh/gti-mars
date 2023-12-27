@extends('layouts.stisla.app')
@section('title')
	User Edit
@endsection
@section('content')
   <section class="section">
      <div class="section-header">
         <h1 class="section-title">Edit User </h1>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item "><a href="{{ route('dsp.user') }}">Dashboard</a></div>
            <div class="breadcrumb-item active">Create User</div>
         </div>
      </div>

      <div class="section-body">
         <div class="row">
            <div class="col-md-6">
               @if ($errors->any())
                  <div class="alert alert-danger">
                     @foreach ($errors->all() as $err)
                        {{ $err }}
                     @endforeach
                  </div>
               @endif
               <div class="card border">
                  <form action="{{ route('user.update') }}" method="POST">
                     @csrf
                     @method('PUT')
                     <input type="number" name="user" id="user" value="{{$user->id}}" hidden>
                     <div class="card-body">
                        <div class="form-row">
                           
                           <div class="form-group col-md-6">
                              <label for="name">Name</label>
                              <input class="form-control " id="name" type="text" required name="name" value="{{$user->name}}">
                           </div>
                           <div class="form-group col-md-6">
                              <label for="username">Username</label>
                              <input class="form-control " id="username" type="text" required name="username" value="{{$user->username}}">
                           </div>
                        </div>

                        <div class="form-row">
                           <div class="form-group col-md-6">
                              <label for="email">Email</label>
                              <input class="form-control " id="email" type="text"   required name="email" value="{{$user->email}}">
                           </div>
                           <div class="form-group col-md-6">
                              <label>Location</label>
                              <select class="custom-select" id="port" disabled style="background-color: lightgrey" required name="port">
                                 @foreach ($ports as $prt)
                                 <option {{$port->id == $prt->id ? 'selected' : ''}} value="{{$prt->id}}">{{$prt->name}}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        

                        
                        <button class="btn btn-primary" type="submit">Update</button>
                     </div>
                     {{-- <div class="card-footer bg-whitesmoke">
                        <button class="btn btn-primary" type="submit">Submit</button>
                     </div> --}}
                  </form>
               </div>
            </div>      
         </div>
      </div>
   </section>
@endsection

