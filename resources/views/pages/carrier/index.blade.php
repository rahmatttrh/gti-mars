@extends('layouts.app')
@section('title')
   Carrier
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
                  Carrier
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
                        <a class="dropdown-item" href="{{route('carrier.create')}}">
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
         <div class="row">
            <div class="col-md-8">
               <div class="card">
                  {{-- <div class="card-header">
                    <h3 class="card-title">People</h3>
                  </div> --}}
                  <div class="table-responsive">
                     <table class="table" >
                        <thead>
                           <tr>
                              {{-- <th class="text-center">No.</th> --}}
                              <th>Name</th>
                              <th></th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($carriers as $carrier)
                           <tr>
                              {{-- <td class="text-center">{{++$i}}</td> --}}
                              <td>{{$carrier->name}}</td>
                              {{-- style="max-width: 250px;" --}}
                              {{-- <td class="text-truncate" style="max-width: 380px;" data-toggle="tooltip" data-placement="top" title="{{$party->desc}}">{{$party->desc}}</td> --}}
                              <td class="text-end">
                                 <div class="btn-group" role="group" aria-label="Basic example">
                                    
                                    <a href="{{route('carrier.edit', enkripRambo($carrier->id))}}" class="btn btn-sm btn-dark">Edit</a>
                                    <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCarrier_{{$carrier->id}}">Delete</a>
                                 </div>
                              </td>
                           </tr>
                           <x-modal.carrier.delete :carrier="$carrier" />
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="card">
                  <div class="card-header">
                  <small class="">Reserved</small>
                  </div>
                  <div class="list-group list-group-flush overflow-auto" id="reserved" style="max-height: 12rem">
                     
                     <div class="list-group-item">
                        <div class="row">
                           <div class="col text-truncate">
                              <small>Schedule will show here</small>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="card-footer">
                     <small class="text-muted">Silahkan memilih waktu Docking dan Departure selain waktu diatas</small>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection