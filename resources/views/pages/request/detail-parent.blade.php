@extends('layouts.app')
@section('title')
   Request Detail
@endsection
@section('content')
   <div class="container-xl">
      <!-- Page title -->
      <div class="page-header d-print-none">
         <div class="row align-items-center">
            <div class="col">
            <!-- Page pre-title -->
               <div class="page-pretitle">
                  Overview
               </div>
               <h2 class="page-title">
                Request Detail
               </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
               <div class="btn-list">
               
                  
                  
                  <div class="dropdown">
                     <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                     Option
                     </button>
                     <div class="dropdown-menu dropdown-menu-end">
                       
                        
                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-delete-parent">
                           Delete
                        </a>
                        
                        {{-- <div class="dropdown-divider"></div>
                        
                        <a class="dropdown-item" target="_blank" href="">
                           Preview
                        </a> --}}
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="page-body" >
      <div class="container-xl">
         <div class="row">
            <div class="col-md-12">
               <div class="card mb-3">
                  <div class="card-body">
                     <div class="row">
                        <div class="col">
                           <h2 class="text-left">{{$parent->code}}</h2>
                           <h4>{{$parent->date}}</h4>
                           <small>Pick Up Point from <b>{{$parent->origin->name}}</b></small>
                        </div>
                        {{-- <div class="col text-end">
                           <h2 class="text-left">{{$parent->code}}</h2>
                           <h4>{{$parent->date}}</h4>
                           <small>Pick Up Point from <b>{{$parent->origin->name}}</b></small>
                        </div> --}}
                     </div>
                     
                  </div>
                  
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-4">
                           @if ($errors->any())
                              <div class="alert alert-danger">
                                 <ul>
                                       @foreach ($errors->all() as $error)
                                          <li><small class="text-danger">{{ $error }}</small></li>
                                       @endforeach
                                 </ul>
                              </div>
                           @endif
                           <form action="{{route('request.add')}}" method="POST">
                              @csrf
                              <input type="number" name="parent" id="parent" value="{{$parent->id}}" hidden>
                              <div class="form-floating mb-3">
                                 <select name="activity" id="activity" class="form-select">
                                    <option value="" selected disabled >Choose Activity</option>
                                    @foreach ($activities as $activity)
                                       <option value="{{$activity->id}}">{{$activity->name}}</option>
                                    @endforeach
                                 </select>
                                 <label for="activity">Activity</label>
                              </div>
                              
                              <div class="form-floating mb-3">
                                 <select required name="destination" id="destination" class="form-select">
                                    <option value="" selected disabled >Choose Destination</option>
                                    @foreach ($ports as $port)
                                       <option value="{{$port->id}}">{{$port->name}}</option>
                                    @endforeach
                                 </select>
                                 <label for="destination">Destination</label>
                              </div>
                              <div class="form-floating border-bottom mb-3 pb-3">
                                 <input type="text" class="form-control" id="desc" name="desc" >
                                 <label for="desc">Description</label>
                              </div>
                              {{-- <hr> --}}
                              <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                           
                                 Save
                              </button>
                           </form>
                        </div>
                        <div class="col-md-8">
                           <div class="card">
                              {{-- <div class="card-header">
                                <h3 class="card-title">People</h3>
                              </div> --}}
                              
                              <div class="table-responsive ">
                                 <table  class="table" >
                                    <thead>
                                       <tr>
                                          <th>Activity</th>
                                          <th>Destination</th>
                                          <th>Status</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($parent->requests as $request)
                                          <tr>
                                             <td>
                                                <a href="{{route('request.detail', enkripRambo($request->id))}}">{{$request->activity->name}} {{$request->description}}</a>
                                                </td>
                                             <td>{{$request->destination->name}}</td>
                                             <td><x-status.request :request="$request" /></td>
                                          </tr>
                                       @endforeach
                                       
                                    </tbody>
                                 </table>
                              </div>
                           
                              <div class="card-footer">
                                 <small>Hint : This is a list of activity request data that has not been sent to marine, and can still be changed</small>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-3">
               <div class="card">
                  <div class="card-body">
                     <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor nihil culpa ratione consequuntur dicta, provident temporibus aliquid! Omnis totam numquam praesentium voluptates eos.</small>
                  </div>
               </div>
               
            </div>
         </div>
      </div>
   </div>

   <x-modal.request.delete-parent :parent="$parent" />
@endsection