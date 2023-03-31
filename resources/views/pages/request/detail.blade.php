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
                  @if (auth()->user()->hasRole('marine') && $request->status == 01)
                     <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-select-vessel-{{$request->id}}">
                        <!-- Download SVG icon from http://tabler-icons.io/i/ship -->
	                     <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M2 20a2.4 2.4 0 0 0 2 1a2.4 2.4 0 0 0 2 -1a2.4 2.4 0 0 1 2 -1a2.4 2.4 0 0 1 2 1a2.4 2.4 0 0 0 2 1a2.4 2.4 0 0 0 2 -1a2.4 2.4 0 0 1 2 -1a2.4 2.4 0 0 1 2 1a2.4 2.4 0 0 0 2 1a2.4 2.4 0 0 0 2 -1" /><path d="M4 18l-1 -5h18l-2 4" /><path d="M5 13v-6h8l4 6" /><path d="M7 7v-4h-1" /></svg>
                        Set Schedule
                     </button>
                  @endif
                  
                  @if (auth()->user()->hasRole('logistic') && $request->status == 00)
                     <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#releaseCargoPlan">
                        <!-- Download SVG icon from http://tabler-icons.io/i/send -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="10" y1="14" x2="21" y2="3" /><path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5" /></svg>
                        Release
                     </button>
                     <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCargoItem">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                        Add Cargo
                     </button>
                  @endif
                  
                  
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
                        @if (auth()->user()->hasRole('logistic') && $request->status == 00)
                        <a class="dropdown-item" href="#">
                           Delete
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
                     <h1>{{$request->code}}</h1>
                     
                     <small> {{$request->department->name}} Department</small>
                     <h4 class="card-title m-0 mb-1">
                        {{$request->activity->name ?? ''}}  {{$request->description}}
                     </h4>
                     {{-- @if ($request->status == 0)
                        <div class="badge">STATUS : 00</div>
                        @elseif($request->status == 1)
                        <div class="badge">STATUS : 01</div>
                     @endif --}}
                     <x-status.request :request="$request" />
                  </div>
                  <div class="card-footer">
                     {{$request->date}}
                     , {{$request->origin->name}} to {{$request->destination->name}}
                  </div>
               </div>
            </div>
            <div class="col-md-5">
               
               <div class="card mb-3">
                  <div class="card-header">
                     Schedule
                  </div>
                  <div class="card-body">
                     @if ($request->schedule)
                        <div class="mt-2 mb-2">
                           <div class="mb-1">
                              Date : {{$request->schedule->date}}
                           </div>
                           <div class="mb-1">
                              Route : {{$request->schedule->origin->name}} - {{$request->schedule->destination->name}}
                           </div>
                           <div class="mb-1">
                              Boat : {{$request->schedule->vessel->name ?? 'Not Available'}}
                           </div>
                           <div class="mb-1">
                              Estimasi Keberangkatan : {{$request->schedule->departure_estimasi ?? 'Not Available'}}
                           </div>
                           <div class="mb-1">
                              Estimasi Kedatangan : {{$request->schedule->arrive_estimasi ?? 'Not Available'}}
                           </div>
                        </div>
                        @else
                        <small>Not Available</small>
                     @endif
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
                     @if ($cargoItems->count() > 0)
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
                        @else
                        <tr>
                           <td colspan="9" style="text-align: center"><small>Empty</small></td>
                        </tr>
                     @endif
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
            <div>This Request Activity will send to Marine</b>.</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
            <a href="{{route('depart.request.release', enkripRambo($request->id))}}" class="btn btn-primary" >Yes, release</a>
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

   <x-modal.activity.select-vessel :schedules="$schedules" :request="$request" />

@endsection