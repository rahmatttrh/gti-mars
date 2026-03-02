@extends('layouts.app')
@section('title')
   Cargo Progress
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
                  Cargo Progress
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
                        <a class="dropdown-item" href="">
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
                        <th>ID Cargo</th>
                        <th>Date</th>
                        <th>Route</th>
                        <th>Status</th>
                     </tr>
                  </thead>
                  <tbody>
                     <td class="text-center">1</td>
                     <td><a href="{{route('cargo.detail')}}">14/C/MAR/23</a></td>
                     <td>14/10/2023</td>
                     <td>KJ4 - Widuri-T</td>
                     <td>
                        <div class="badge bg-light border text-dark"><span class="badge bg-info me-1"></span>Progress</div>
                     </td>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
@endsection