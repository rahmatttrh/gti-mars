@extends('layouts.app')
@section('title')
   Parties
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
                  Parties
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
                        <a class="dropdown-item" href="{{route('party.create')}}">
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
                        <th class="text-center">Logo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Platform</th>
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($parties as $party)
                     <tr>
                        <td class="text-center">{{++$i}}</td>
                        <td class="text-center">
                           @if ($party->logo)
                              <img width="100px" height="35" style="object-fit: contain" src="{{asset('storage/' . $party->logo)}}" alt="">
                              @else
                              <img width="100px" height="35" style="object-fit: contain" src="{{asset('img/flaticon/image-gallery.png')}}" alt="">
                           @endif
                        </td>
                        <td>{{$party->name}}</td>
                        {{-- <td>{{$party->tagline}}</td> --}}
                        <td>{{$party->email}}</td>
                        <td>
                           @if ($party->type == 2)
                              Supplier
                              @elseif($party->type == 3)
                              Tenant
                              @elseif($party->type == 4)
                              Retail
                           @endif
                        </td>
                        <td>{{$party->platform->name}}</td>
                        {{-- style="max-width: 250px;" --}}
                        {{-- <td class="text-truncate" style="max-width: 380px;" data-toggle="tooltip" data-placement="top" title="{{$party->desc}}">{{$party->desc}}</td> --}}
                        <td class="text-end">
                           <div class="btn-group" role="group" aria-label="Basic example">
                              
                              <a href="{{route('party.edit', enkripRambo($party->id))}}" class="btn btn-sm btn-dark">Edit</a>
                              <a href="{{route('party.detail', enkripRambo($party->id))}}" class="btn btn-sm btn-secondary">Detail</a>
                              <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteParty_{{$party->id}}">Delete</a>
                           </div>
                        </td>
                     </tr>
                     <x-modal.party.delete :party="$party" />
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
@endsection