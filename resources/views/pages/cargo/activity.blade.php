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
                  Cargo Timeline
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
            <div class="card-body">
               <div class="divide-y">   
                  <div>
                     <div class="row">
                        <div class="col-auto">
                           <span class="avatar bg-primary"></span>
                        </div>
                        <div class="col">
                           <div class="text-truncate">
                              <strong>Supplier</strong> released Cargo Plan
                           </div>
                           <div class="text-muted">2 days ago</div>
                        </div>
                        <div class="col-auto align-self-center">
                           <div class="badge bg-primary"></div>
                        </div>
                     </div>
                  </div>
                  <div>
                     <div class="row">
                        <div class="col-auto">
                           <span class="avatar bg-info"></span>
                        </div>
                        <div class="col">
                           <div class="text-truncate">
                              <strong>Validation</strong> progress
                           </div>
                           <div class="text-muted">1 days ago</div>
                        </div>
                        <div class="col-auto align-self-center">
                           <div class="badge bg-info"></div>
                        </div>
                     </div>
                  </div>
                  <div>
                     <div class="row">
                        <div class="col-auto">
                           <span class="avatar bg-success"></span>
                        </div>
                        <div class="col">
                           <div class="text-truncate">
                              <strong>Approved</strong> Cargo Plan
                           </div>
                           <div class="text-muted">1 days ago</div>
                        </div>
                        <div class="col-auto align-self-center">
                           <div class="badge bg-info"></div>
                        </div>
                     </div>
                  </div>
                  <div>
                     <div class="row">
                        <div class="col-auto">
                           <span class="avatar bg-info"></span>
                        </div>
                        <div class="col">
                           <div class="text-truncate">
                              On the way
                           </div>
                           <div class="text-muted">1 days ago</div>
                        </div>
                        <div class="col-auto align-self-center">
                           <div class="badge bg-info"></div>
                        </div>
                     </div>
                  </div>
                  <div>
                     <div class="row">
                        <div class="col-auto">
                           <span class="avatar bg-primary"></span>
                        </div>
                        <div class="col">
                           <div class="text-truncate">
                              <strong>Arrived</strong> at destination
                           </div>
                           <div class="text-muted">1 days ago</div>
                        </div>
                        <div class="col-auto align-self-center">
                           <div class="badge bg-primary"></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
          </div>
      </div>
   </div>
@endsection