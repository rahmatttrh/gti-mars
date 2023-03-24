@extends('layouts.app')
@section('title')
   Request Draft
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
                  Request Draft
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
                        <a class="dropdown-item" href="{{route('request.create')}}">
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
                        <th>Code</th>
                        <th>Date</th>
                        <th>Activity</th>
                        <th>Route</th>
                        <th>Status</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($requests as $request)
                        <tr>
                           <td class="text-center">{{++$i}}</td>
                           <td><a href="{{route('request.detail', enkripRambo($request->id))}}">{{$request->code}}</a></td>
                           <td>{{$request->schedule->date}}</td>
                           <td>{{$request->activity->name}}</td>
                           <td>{{$request->schedule->origin->name}} - {{$request->schedule->destination->name}}</td>
                           <td>
                              <x-status.request :request="$request" />
                           </td>
                        </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
@endsection