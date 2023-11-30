@extends('layouts.stisla.app')
@section('title')
    Request Detail
@endsection
@section('content')
<section class="section">
    <div class="section-header">
      <h1 class="section-title">Request Detail</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item "><a href="{{route('dsp.user')}}">Dashboard</a></div>
        <div class="breadcrumb-item active">Request Detail</div>
      </div>
    </div>

    <div class="section-body">
      {{-- <h2 class="section-title">Schedule Plan</h2>
      <p class="section-lead">
        We use 'DataTables' made by @SpryMedia. You can check the full documentation <a href="https://datatables.net/">here</a>.
      </p> --}}

      <div class="row">
        <div class="col-12">
        
          {{-- @if (auth()->user()->hasRole('department'))
          @endif --}}
          <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#parent-release">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="10" y1="14" x2="21" y2="3" /><path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5" /></svg>
            Release to Marine
         </button>
          <div class="btn-group ml-2">
            <a href="{{route('invoice.request', enkripRambo($parent->id))}}" class="btn btn-light border btn-lg">Preview PDF</a>
           
            @if (auth()->user()->hasRole('department') )
              <button type="button" class="btn btn-light border btn-lg dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <div class="dropdown-menu">
                {{-- @if ($request->status == 00) --}}
                {{-- <a class="dropdown-item" href="{{route('request.edit', enkripRambo($request->id))}}"> Edit</a> --}}
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#request-delete">
                    Delete
                </a>
                {{-- @endif --}}
                
                {{-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#schedule-delete">Delete</a> --}}
                {{-- <a class="dropdown-item" href="{{route('document.manifest', enkripRambo($schedule->id))}}">Preview Manifest</a> --}}
              </div>
            @endif
            
          </div>
          <hr>
          <div class="card">
            <div class="card-header">
              <h4>{{formatDate($parent->date)}}</h4>
              <div class="card-header-action">
                {{-- @if ($parent->status < 3)
                  <x-status-stisla.request :request="$request" :lastreport="null"/>
                  @else
                  <x-status-stisla.request :request="$request" :lastreport="$request->schedule->lastreport()"/>
                @endif --}}
              </div>
            </div>
            <div class="card-body">
              <div class="summary">
                <div class="summary-info">
                  <h4>Pickup Point from <b>{{$parent->origin->name}}</b> </h4>
                  <div class="text-muted">{{$parent->activity->name}} </div>
                  <div class="d-block mt-2">                              
                    <small> Request by {{$parent->employee->name}}  {{$parent->employee->ekstensi}}</small>
                  </div>
                </div>
                <hr>
                
                <div class="card shadow-none border">
                  <div class="card-header">
                    <h4>{{count($parent->requests)}} Destination</h4>
                    {{-- {{$request->cargoItems->sum('weight')}} --}}
                  </div>
                  <div class="card-body p-3">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th>MTD</th>
                            <th>Destination</th>
                            <th>Descriptive</th>
                            <th>Contract</th>
                            <th class="text-center">Qty</th>
                            <th class="text-center">Weight</th>
                            <th class="text-center">Drop</th>
                            <th class="text-center">Size (m<sup>2</sup>)</th>
                            
                            {{-- @if ($request->status == 10 && auth()->user()->hasRole('department'))
                              <th>Action</th>
                            @endif --}}
                        </tr>
                        </thead>
                        <tbody>
                          @foreach ($parent->requests as $request)
                          {{-- <tr>
                            <td colspan="8">{{$request->destination->name}}</td>
                          </tr> --}}
                            @foreach ($request->cargoItems as $item)
                                <tr>
                                  <td class=" text-truncate">
                                    <div class="dropdown">
                                      {{$item->mtd}}
                                    </div>
                                  </td>
                                  <td>{{$item->request->destination->name}}</td>
                                  <td class=" text-truncate ">
                                    {{$item->desc}} 
                                  </td>
                                  {{-- <td class=" ">{{$item->remark ?? '-'}}</td> --}}
                                  <td class=" text-truncate">{{$item->contract}}</td>
                                  <td class=" text-center text-truncate" >{{$item->qty}} {{$item->unit}}</td>
                                  <td class=" text-center">{{$item->weight}}</td>
                                  <td class=" text-center">{{$item->offloading ? $item->offloading->offloading : '-'}}</td>
                                  {{-- <td class=" text-center">
                                    {{$item->offloading ? $item->offloading->onboard : '-'}} # {{$item->offloading->desc ?? '-'}}
                                  
                                  </td> --}}
                                  <td class=" text-center">{{$item->size}}</td>
                                  
                                  {{-- <td>
                                    @if ($request->status == 0)
                                    <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCargoItem_{{$item->id}}">Delete</a>
                                    @endif
                                  </td> --}}
                                  @if ($request->status == 10 && auth()->user()->hasRole('department'))
                                    <td>
                                        @if ($item->status == 1)
                                          <a href="#" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#confirmCargo_{{$item->id}}">Confirm</a>
                                          <x-modal.cargo.confirm :cargo="$item" :routes="$routes" :schedule="$request->schedule" />
                                          @else
                                          -
                                        @endif
                                    </td>
                                  @endif
                              </tr>
                            @endforeach
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                
                
              </div>
            </div>
          </div>
        </div>

        {{-- @if ($request->activity_id == 1 && $request->status == 0)
          <div class="col-md-4">
            <div class="card shadow-none border">
              <div class="card-header">Form Add Cargo</div>
              <form action="{{route('cargo.item.store')}}" method="POST">
                @csrf
                <input type="number" name="req" id="req" value="{{$request->id}}" hidden>
                <div class="card-body">
                  <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="no_document">MTD</label>
                        <input style="background-color: lightgrey" type="text" class="form-control" id="no_document" name="no_document" >
                    </div>
                    <div class="form-group col-md-12">
                        <label for="desc">Descriptive</label>
                        <input style="background-color: lightgrey" type="text" class="form-control" id="desc" name="desc">
                    </div>
                    <div class="form-group col-md-12">
                      <label for="contract">PO/Contract</label>
                      <input style="background-color: lightgrey" type="text" class="form-control" id="contract" name="contract">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="qty">Qty</label>
                      <input style="background-color: lightgrey" type="number" class="form-control" id="qty" name="qty">
                    </div>
                    <div class="form-group col-md-8">
                      <label for="unit">Unit</label>
                      <input style="background-color: lightgrey" type="text" class="form-control" id="unit" name="unit">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="weight">Weight</label>
                      <input style="background-color: lightgrey" type="number" class="form-control" id="weight" name="weight">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="size">Size</label>
                      <input style="background-color: lightgrey" type="number" class="form-control" id="size" name="size">
                    </div>
                    
                  </div>
                  <button type="submit" class="btn btn-primary btn-block py-2">Add</button>
                </div>
              </form>
            </div>
          </div>
        @endif --}}
        
      </div>
      
    </div>
  </section>





  <div class="modal fade" id="parent-release" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Release Request</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Release all request to Fleet Control?
        </div>
        <div class="modal-footer bg-whitesmoke">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a href="{{route('parent.release', enkripRambo($parent->id))}}" class="btn btn-primary">Release</a>
        </div>
      </div>
    </div>
  </div>
    
@endsection