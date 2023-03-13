@extends('layouts.app')
@section('title')
    Cargo Detail
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
                Cargo Detail
               </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
            <div class="btn-list">
               {{-- <span class="d-none d-sm-inline">
                  <a href="#" class="btn btn-white">
                  New view
                  </a>
               </span> --}}
               <div class="dropdown">
                  <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                  Option
                  </button>
                  <div class="dropdown-menu dropdown-menu-end">
                     <a class="dropdown-item" href="#">
                        Delete
                     </a>
                     
                  </div>
               </div>
               
               
               <div class="dropdown">
                  <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                  Actions
                  </button>
                  <div class="dropdown-menu dropdown-menu-end">
                     
                     <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#addCargoItem">
                        Add Cargo Item
                     </a>
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item" href="#">
                        Timeline
                     </a>
                     <a class="dropdown-item" href="#">
                        Print Preview
                     </a>
                  </div>
               </div>
            </div>
            </div>
         </div>
      </div>
   </div>
   <div class="page-body" >
      <div class="container-xl">
         <div class="row row-deck">
            <div class="col-md-7">
               <div class="card mb-3">
                  <div class="card-body">
                    <div class="row g-2 align-items-center">
                      <div class="col ms-2">
                        <h1>ID Cargo</h1>
                        <h4 class="card-title m-0">
                           Lorem, ipsum dolor.
                        </h4>
                        <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi ipsam maxime possimus.</small>
                        
                        
                      </div>
                      
                      
                    </div>
                    <div class="row">
                     <div class="col-md-12">
                      
                     </div>
                    </div>
                  </div>
               </div>
            </div>
            <div class="col-md-5">
               <div class="card mb-3">
                  <div class="card-header">
                     Schedule
                  </div>
                  <div class="card-body">
                     <div class="mt-2 mb-2">
                        <div class="mb-2">
                           Date: <strong>12/03/2023</strong>
                        </div>
                        <div class="mb-2">
                           Route: <strong>KJ4</strong> - <strong>Pabelokan</strong>
                        </div>
                     </div>
                     
                  </div>
               </div>
            </div>
         </div>
         
         <div class="card card-lg">
            <div class="table-responsive">
               <table class="table table-vcenter card-table">
                  <thead>
                     <tr>
                        <th>No Document</th>
                        <th>Descriptioin</th>
                        <th>Qty</th>
                        <th>Unit</th>
                        <th>M</th>
                        <th>Ton</th>
                        <th>Remarks</th>
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>343422</td>
                        <td class="text-muted">
                           Lorem ipsum dolor sit.
                        </td>
                        <td class="text-muted">1</td>
                        <td class="text-muted">Unit</td>
                        <td class="text-muted">7.0</td>
                        <td class="text-muted">9.2</td>
                        <td class="text-muted">Lorem, ipsum.</td>
                        <td><a href="">Delete</a></td>
                     </tr>
                     <tr>
                        <td>343422</td>
                        <td class="text-muted">
                           Lorem ipsum dolor sit.
                        </td>
                        <td class="text-muted">1</td>
                        <td class="text-muted">Unit</td>
                        <td class="text-muted">7.0</td>
                        <td class="text-muted">9.2</td>
                        <td class="text-muted">Lorem, ipsum.</td>
                        <td><a href="">Delete</a></td>
                     </tr>
                     <tr>
                        <td>343422</td>
                        <td class="text-muted">
                           Lorem ipsum dolor sit.
                        </td>
                        <td class="text-muted">1</td>
                        <td class="text-muted">Unit</td>
                        <td class="text-muted">7.0</td>
                        <td class="text-muted">9.2</td>
                        <td class="text-muted">Lorem, ipsum.</td>
                        <td><a href="">Delete</a></td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>

   <x-modal.cargo.add />

@endsection