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
            <div class="col-auto ms-auto d-print-none">
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
            </div>
         </div>
      </div>
   </div>
   <div class="page-body">
      <div class="container-xl">
         <div class="card">
            {{-- <div class="card-header">
              <h3 class="card-title">People</h3>
            </div> --}}
            <div class="table-responsive py-4">
               <table  id="example" class="table" >
                  <thead>
                     <tr>
                        <th class="text-center">No.</th>
                        <th>Type</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($activities as $act)
                        <tr>
                           <td class="text-center">{{++$i}}</td>
                           <td>{{$act->type->name}}</td>
                           <td>{{$act->name}}</td>
                           <td>{{$act->desc ?? '-'}}</td>
                           <td>
                              <div class="btn-group">
                                 <a href="#" data-bs-toggle="modal" data-bs-target="#deleteActivity_{{$act->id}}" class="btn btn-sm btn-danger">Delete</a>
                                 <a href="#" data-bs-toggle="modal" data-bs-target="#editActivity_{{$act->id}}" class="btn btn-sm btn-dark">Edit</a>
                              </div>
                           </td>
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

   <x-modal.activity.add :types="$types"  />
@endsection