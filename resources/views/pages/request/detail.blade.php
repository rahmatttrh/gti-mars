@extends('layouts.app')
@section('title')
   Request Detail
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
                Request Detail
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
                        {{-- <a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#arriveCargoPlan">
                           Arrive
                        </a>
                        <a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#approveCargoPlan">
                           Approve
                        </a> --}}
                        @if (auth()->user()->hasRole('logistic') && $request->status == 0)
                           <a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#releaseCargoPlan">
                              Release
                           </a>
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item" href="#">
                              Delete
                           </a>
                           @else
                           <small class="dropdown-item">Request has been sent</small>
                        @endif
                        
                     </div>
                  </div>
                  
                  
                  
                  <div class="dropdown">
                     <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                     Actions
                     </button>
                     <div class="dropdown-menu dropdown-menu-end">
                        @if (auth()->user()->hasRole('logistic') && $request->status == 0)
                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#addCargoItem">
                           Add Item
                        </a>
                        @endif
                        
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('cargo.timeline')}}">
                           Timeline
                        </a>
                        <a class="dropdown-item" target="_blank" href="{{route('cargo.receipt')}}">
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
                           <h1>{{$request->code}}</h1>
                           
                           <small> {{$request->department->name}} Department</small>
                           <h4 class="card-title m-0">
                              {{$request->activity->name}}
                           </h4>
                           <h4 class="card-title m-0">
                              {{$request->desc}}
                           </h4>
                           @if ($request->status == 0)
                              <div class="btn btn-warning mt-3">STATUS : 00</div>
                              @elseif($request->status == 1)
                              <div class="btn btn-info mt-3">STATUS : 01</div>
                           @endif
                           
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
                        <div class="mb-1">
                           Date : {{$request->schedule->date}}
                        </div>
                        <div class="mb-1">
                           Route : {{$request->schedule->origin->name}} - {{$request->schedule->destination->name}}
                        </div>
                        <div class="mb-1">
                           Required Boat : {{$request->schedule->req_boat}}
                        </div>
                        <div class="mb-1">
                           Boat : {{$request->schedule->vessel->name ?? 'Waiting'}}
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
                        <th>No.</th>
                        <th>No Document</th>
                        <th>Descriptioin</th>
                        <th>Qty</th>
                        <th>Unit</th>
                        <th>Size</th>
                        <th>Weight</th>
                        <th>Remarks</th>
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($cargoItems as $item)
                        <tr>
                           <td class="text-muted">{{++$i}}</td>
                           <td class="text-muted">
                              {{$item->no_doc}}
                           </td>
                           <td class="text-muted">{{$item->desc}}</td>
                           <td class="text-muted">{{$item->qty}}</td>
                           <td class="text-muted">{{$item->unit}}</td>
                           <td class="text-muted">{{$item->size}} m<sup>2</sup></td>
                           <td class="text-muted">{{$item->weight}} ton</td>
                           <td class="text-muted">{{$item->remark}}</td>
                           <td>
                              @if ($request->status == 0)
                              <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCargoItem_{{$item->id}}">Delete</a>
                              @endif
                           </td>
                        </tr>
                        <x-modal.cargo.delete :item="$item" />
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>

   <x-modal.cargo.add :request="$request" />
   
   <div class="modal modal-blur fade" id="releaseCargoPlan" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="modal-title">Are you sure?</div>
            <div>If you proceed, you will not able to edit this data again</b>.</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
            <a href="{{route('request.release', enkripRambo($request->id))}}" class="btn btn-primary" >Yes, release</a>
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