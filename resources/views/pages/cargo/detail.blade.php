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
                        @if (auth()->user()->hasRole('retail'))
                           <a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#arriveCargoPlan">
                              Arrive
                           </a>
                           @elseif(auth()->user()->hasRole('receiving'))
                           <a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#approveCargoPlan">
                              Approve
                           </a>
                           @elseif(auth()->user()->hasRole('supplier'))
                           <a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#releaseCargoPlan">
                              Release
                           </a>
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item" href="#">
                              Delete
                           </a>
                        @endif
                        
                        
                        
                     </div>
                  </div>
                  
                  
                  @if(auth()->user()->hasRole('supplier'))
                  <div class="dropdown">
                     <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                     Actions
                     </button>
                     <div class="dropdown-menu dropdown-menu-end">
                        
                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#addCargoItem">
                           Add Cargo Item
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('cargo.timeline')}}">
                           Timeline
                        </a>
                        <a class="dropdown-item" target="_blank" href="{{route('cargo.receipt')}}">
                           Print Preview
                        </a>
                     </div>
                  </div>
                  @endif
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
                        <h1>14/C/MAR/23</h1>
                        <h4 class="card-title m-0">
                           Indofood
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
                           Lorem ipsum dolor sit
                        </td>
                        <td class="text-muted">1</td>
                        <td class="text-muted">Unit</td>
                        <td class="text-muted">7.0</td>
                        <td class="text-muted">9.2</td>
                        <td class="text-muted">Lorem, ipsum.</td>
                        <td>
                           <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCargoItem">Delete</a>
                        </td>
                     </tr>
                     <tr>
                        <td>773248</td>
                        <td class="text-muted">
                           Consectetur adipisicing elit
                        </td>
                        <td class="text-muted">1</td>
                        <td class="text-muted">Unit</td>
                        <td class="text-muted">3.0</td>
                        <td class="text-muted">2.8</td>
                        <td class="text-muted">Lorem, ipsum.</td>
                        <td><a href="" data-bs-toggle="modal" data-bs-target="#deleteCargoItem">Delete</a></td>
                     </tr>
                     <tr>
                        <td>991234</td>
                        <td class="text-muted">
                           Spernatur totam distinctio!
                        </td>
                        <td class="text-muted">1</td>
                        <td class="text-muted">Unit</td>
                        <td class="text-muted">5.0</td>
                        <td class="text-muted">5.1</td>
                        <td class="text-muted">Lorem, ipsum.</td>
                        <td><a href="" data-bs-toggle="modal" data-bs-target="#deleteCargoItem">Delete</a></td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>

   <x-modal.cargo.add />
   <div class="modal modal-blur fade" id="deleteCargoItem" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="modal-title">Are you sure?</div>
            <div>If you proceed, you will lose this data</b>.</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
            <a href="" class="btn btn-danger" >Yes, delete this data</a>
            {{-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Yes, delete all my data</button> --}}
          </div>
        </div>
      </div>
   </div>
   <div class="modal modal-blur fade" id="releaseCargoPlan" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="modal-title">Are you sure?</div>
            <div>If you proceed, you will not able to edit this data again</b>.</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
            <a href="{{route('cargo.progress')}}" class="btn btn-primary" >Yes, release</a>
            {{-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Yes, delete all my data</button> --}}
          </div>
        </div>
      </div>
   </div>
   <div class="modal modal-blur fade" id="arriveCargoPlan" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="modal-title">Are you sure?</div>
            <div>Make sure the ID Cargo match</b>.</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
            <a href="#" class="btn btn-primary" >Yes, Arrive</a>
            {{-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Yes, delete all my data</button> --}}
          </div>
        </div>
      </div>
   </div>

   <div class="modal modal-blur fade" id="approveCargoPlan" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="modal-title">Are you sure?</div>
            <div>Convert to Manifest</b>.</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
            <a href="#" class="btn btn-primary" >Yes, Approve</a>
            {{-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Yes, delete all my data</button> --}}
          </div>
        </div>
      </div>
   </div>

@endsection