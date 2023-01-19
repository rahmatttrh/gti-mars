@extends('layouts.app')
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
                  Port Detail
               </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
               <div class="btn-list">
                  <div class="dropdown">
                     <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                     Options
                     </button>
                     <div class="dropdown-menu dropdown-menu-end">
                     <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-edit-port">
                        Edit
                     </a>
                     <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-delete-port">
                        Delete
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
            <div class="progress card-progress">
              <div class="progress-bar bg-green" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                <span class="visually-hidden">20% Complete</span>
              </div>
            </div>
            <div class="card-body">
              <h5 class="">
                <a href="#">Port Name</a>
              </h5>
              <div class="avatar-list avatar-list-stacked mb-2">
                <h1>{{$port->name}}</h1>
              </div>
              <div class="card-meta d-flex justify-content-between">
                <div class="d-flex align-items-center">
                  <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                  {{-- <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg> --}}
                  <span>Latitude {{$port->latitude}}, Longitude {{$port->longitude}}</span>
                </div>
                <span>Type Port</span>
              </div>
            </div>
         </div>

         <div class="card mt-3">
            <div class="card-body">
               <div class="accordion" id="accordion-example">
                  <div class="accordion-item">
                     <h2 class="accordion-header" id="heading-1">
                        <button class="accordion-button " type="button" data-bs-toggle="collapse"
                           data-bs-target="#collapse-1" aria-expanded="true">
                           Detail
                        </button>
                     </h2>
                     <div id="collapse-1" class="accordion-collapse collapse"
                        data-bs-parent="#accordion-example">
                        <div class="accordion-body pt-0">
                           <hr>
                           <dl class="row">
                              <dt class="col-3">Date:</dt>
                              <dd class="col-9">2020-01-05 16:42:29 UTC</dd>
                              
                              <dt class="col-3">Location:</dt>
                              <dd class="col-9"><span class="flag flag-country-pl"></span>
                                 Poland</dd>
                              <dt class="col-3">IP Address:</dt>
                              <dd class="col-9">46.113.11.3</dd>
                              
                           </dl>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card mt-3">
                  <div class="card-header">
                     <h3 class="card-title">
                        Jetty
                     </h3>
                     <div class="card-actions">
                        <a href="#" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modal-add-jetty">
                           Add<!-- Download SVG icon from http://tabler-icons.io/i/edit -->
                           {{-- <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" /><path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" /><line x1="16" y1="5" x2="19" y2="8" /></svg> --}}
                        </a>
                     </div>
                  </div>
                  
                  <div class="table-responsive">
                     <table class="table card-table table-vcenter " >
                        <thead>
                           <tr>
                              <th class="text-center w-1">No.</th>
                              <th>Name</th>
                              <th>Size</th>
                              <th></th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($jetties as $jetty)
                              <tr>
                                 <td class="text-muted text-center"><small>{{++$i}}</small></td>
                                 <td><span class="">{{$jetty->name}}</span></td>
                                 
                                 <td class="text-muted">
                                    {{$jetty->size}} m
                                 </td>
                                 <td class="d-flex align-items-center">
                                    <div class="ms-auto">
                                       <a href="" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-edit-jetty-{{$jetty->id}}">Edit</a>
                                       <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal-delete-jetty-{{$jetty->id}}">Delete</a>
                                    </div>
                                    
                                 </td>
                              </tr>
                              <x-modal.edit-jetty :jetty="$jetty" />
                              <x-modal.delete-jetty :jetty="$jetty" />
                           @endforeach
                        </tbody>
                     </table>
                  </div>
                  <div class="card-footer d-flex align-items-center">
                     {{-- <small>
                        <p class="m-0 text-muted">Showing <span>{{$jetties->firstItem()}}</span> to <span>{{$jetties->lastItem()}}</span> of <span>{{$totalJetty}}</span> entries</p>
                     </small>
                     <div class="pagination m-0 ms-auto">
                        {{$jetties->links()}}
                     </div> --}}
                  </div>
               </div>
            </div>
         </div>

         {{-- <div class="card mt-3">
            <div class="card-header">
               <h3 class="card-title">
                  Detail
               </h3>
               <div class="card-actions">
                  <a href="#">
                     Edit configuration<!-- Download SVG icon from http://tabler-icons.io/i/edit -->
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" /><path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" /><line x1="16" y1="5" x2="19" y2="8" /></svg>
                  </a>
               </div>
            </div>
            <div class="card-body">
               <dl class="row">
                  <dt class="col-3">Date:</dt>
                  <dd class="col-9">2020-01-05 16:42:29 UTC</dd>
                  
                  <dt class="col-3">Location:</dt>
                  <dd class="col-9"><span class="flag flag-country-pl"></span>
                     Poland</dd>
                  <dt class="col-3">IP Address:</dt>
                  <dd class="col-9">46.113.11.3</dd>
                  
               </dl>
            </div>
         </div> --}}

         
      </div>
   </div>
   <x-modal.add-port />
   <x-modal.edit-port :port="$port" />
   <x-modal.delete-port :port="$port" />
   <x-modal.add-jetty :port="$port" />
@endsection