@extends('layouts.app')
@section('title')
   Activity
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
                  Activity
               </h2>
            </div>
            <!-- Page title actions -->
            {{-- <div class="col-auto ms-auto d-print-none">
               <div class="btn-list">
                  <div class="dropdown">
                     <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                     Option
                     </button>
                     <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#addActivity">
                           Create
                        </a>
                        
                        <a class="dropdown-item" target="_blank" href="#">
                           Print Preview
                        </a>
                     </div>
                  </div>
               </div>
            </div> --}}
         </div>
      </div>
   </div>
   <div class="page-body">
      <div class="container-xl">
         <div class="row">
            <div class="col-md-4">
               <div class="card">
                  <form action="{{route('activity.store')}}" method="POST">
                     @csrf
                  <div class="card-body">
                     @if ($errors->any())
                        <div class="alert alert-danger text-danger">
                           <ul>
                                 @foreach ($errors->all() as $error)
                                    <li><small>{{ $error }}</small></li>
                                 @endforeach
                           </ul>
                        </div>
                     @endif
                        
                     {{-- <div class="form-floating mb-3">
                        <select required name="type" id="type" class="form-select">
                           @foreach ($types as $type)
                              <option value="{{$type->id}}">{{$type->name}}</option>
                           @endforeach
                        </select>
                        <label for="type">Type</label>
                     </div> --}}
                     <div class="form-floating mb-3">
                        <input type="text" value="{{old('name')}}" class="form-control" id="name" name="name" >
                        <label for="name">Name</label>
                     </div>
                     <div class="form-floating mb-3">
                        <input type="text" value="{{old('desc')}}" class="form-control" id="desc" name="desc" >
                        <label for="desc">Description (Optional)</label>
                     </div>
                           
                     
                  </div>
                  <div class="card-footer">
                     <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><circle cx="12" cy="14" r="2" /><polyline points="14 4 14 8 8 8 8 4" /></svg>
                        Save
                     </button>
                  </div>
               </form>
               </div>
            </div>
            <div class="col-md-8">
               <div class="card">
                  <div class="table-responsive">
                     <table   class="table" >
                        <thead>
                           <tr>
                              <th class="text-center">No.</th>
                              {{-- <th>Type</th> --}}
                              <th>Name</th>
                              <th>Description</th>
                              {{-- <th></th> --}}
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($activities as $act)
                              <tr>
                                 <td class="text-center">{{++$i}}</td>
                                 <td>
                                    <div class="dropdown">
                                       <a href="#" class="dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                                          {{$act->name}}
                                       </a>
                                       <div class="dropdown-menu dropdown-menu-end">
                                          <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editActivity_{{$act->id}}">
                                             Edit
                                          </a>
                                          <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#deleteActivity_{{$act->id}}">
                                             Delete
                                          </a>
                                       </div>
                                    </div>
                                 </td>
                                 {{-- <td>{{$act->type->name}}</td> --}}
                                 
                                 <td>{{$act->desc ?? '-'}}</td>
                                 {{-- <td>
                                    <div class="btn-group">
                                       <a href="#" data-bs-toggle="modal" data-bs-target="#deleteActivity_{{$act->id}}" class="btn btn-sm btn-danger">Delete</a>
                                       <a href="#" data-bs-toggle="modal" data-bs-target="#editActivity_{{$act->id}}" class="btn btn-sm btn-dark">Edit</a>
                                    </div>
                                 </td> --}}
                              </tr>
      
                              <x-modal.activity.edit :types="$types" :activity="$act" />
                              <x-modal.activity.delete :activity="$act" />
                           @endforeach
                           
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
        
      </div>
   </div>

   <x-modal.activity.add :types="$types"  />
@endsection