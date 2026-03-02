@extends('layouts.app')
@section('title')
   Platform
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
                  Platforms
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
                        <a class="dropdown-item" href="{{route('platform.create')}}">
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
               <table id="example"  class="table" >
                  <thead>
                     <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center" >Logo</th>
                        <th>Name</th>
                        <th>System</th>
                        <th>Email</th>
                        {{-- <th>Description</th> --}}
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($platforms as $platform)
                     <tr>
                        <td class="text-center">{{++$i}}</td>
                        <td class="text-center">
                           {{-- <img src="{{asset('img/logo/ENC.jpg')}}" alt=""> --}}
                           @if ($platform->logo)
                              <img width="100px" height="35" style="object-fit: contain" src="{{asset('storage/' . $platform->logo)}}" alt="">
                              @else
                              <img width="100" height="35" style="object-fit: contain" src="{{asset('img/flaticon/image-gallery.png')}}" alt="">
                           @endif
                           
                        </td>
                        <td>{{$platform->name}}</td>
                        <td>{{$platform->system}}</td>
                        <td>{{$platform->email}}</td>
                        {{-- style="max-width: 250px;" --}}
                        {{-- <td class="text-truncate" style="max-width: 380px;" data-toggle="tooltip" data-placement="top" title="{{$platform->desc}}">{{$platform->desc}}</td> --}}
                        <td class="text-end">
                           <div class="btn-group " role="group" aria-label="Basic example">
                              
                              <a href="{{route('platform.edit', enkripRambo($platform->id))}}" class="btn btn-sm btn-dark ">Edit</a>
                              <a href="{{route('platform.detail', enkripRambo($platform->id))}}" class="btn btn-sm btn-secondary">Detail</a>
                              <a href="#" class="btn btn-sm btn-danger " data-bs-toggle="modal" data-bs-target="#deletePlatform_{{$platform->id}}">Delete</a>
                           </div>
                        </td>
                     </tr>
                     {{-- {{route('platform.detail', enkripRambo($platform->id))}} --}}
                     <div class="modal modal-blur fade" id="deletePlatform_{{$platform->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-body">
                              <div class="modal-title">Are you sure?</div>
                              <div>If you proceed, you will lose data of <b>{{$platform->name}}</b>.</div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
                              <a href="{{route('platform.delete', enkripRambo($platform->id))}}" class="btn btn-danger" >Yes, delete this data</a>
                              {{-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Yes, delete all my data</button> --}}
                            </div>
                          </div>
                        </div>
                     </div>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>

   
@endsection