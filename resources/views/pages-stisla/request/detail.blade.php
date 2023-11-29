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
        @if ($request->activity_id != 3 && $request->status == 0)
          <div class="col-8">
          @else
          <div class="col-12">
        @endif
        
          @if (auth()->user()->hasRole('department'))
              <x-request-stisla.action-user :request="$request" />
          @endif
          <div class="btn-group ml-2">
            <a href="{{route('invoice.request', enkripRambo($request->id))}}" class="btn btn-light border btn-lg">Preview PDF</a>
           
            @if (auth()->user()->hasRole('department') )
              <button type="button" class="btn btn-light border btn-lg dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                <span class="sr-only">Toggle Dropdown</span>
              </button>
              <div class="dropdown-menu">
                @if ($request->status == 00)
                {{-- <a class="dropdown-item" href="{{route('request.edit', enkripRambo($request->id))}}"> Edit</a> --}}
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#request-delete">
                    Delete
                </a>
                @endif
                
                {{-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#schedule-delete">Delete</a> --}}
                {{-- <a class="dropdown-item" href="{{route('document.manifest', enkripRambo($schedule->id))}}">Preview Manifest</a> --}}
              </div>
            @endif
            
          </div>
          <hr>
          <div class="card">
            <div class="card-header">
              <h4>{{formatDate($request->date)}}</h4>
              <div class="card-header-action">
                @if ($request->status < 3)
                  <x-status-stisla.request :request="$request" :lastreport="null"/>
                  @else
                  <x-status-stisla.request :request="$request" :lastreport="$request->schedule->lastreport()"/>
                @endif
              </div>
            </div>
            <div class="card-body">
              <div class="summary">
                <div class="summary-info">
                  <h4>{{$request->origin->name}} -  {{$request->destination->name}}</h4>
                  <div class="text-muted">{{$request->activity->name}} : {{$request->activity_id}}</div>
                  <div class="d-block mt-2">                              
                    <small> Request by {{$request->employee->name}}  {{$request->employee->ekstensi}}</small>
                  </div>
                </div>
                <hr>
                
                @if ($request->activity_id == 1)
                  <div class="card shadow-none border">
                    <div class="card-header">
                      <h4>Manifest</h4>
                      {{-- {{$request->cargoItems->sum('weight')}} --}}
                    </div>
                    <div class="card-body p-3">
                      <div class="table-responsive">
                        <table class="table table-sm">
                          <thead>
                            <tr>
                              <th>MTD</th>
                              <th>Descriptive</th>
                              {{-- <th>Remark</th> --}}
                              <th>Contract</th>
                              <th class="text-center">Qty</th>
                              <th class="text-center">Drop</th>
                              {{-- <th class="text-center">Onboard</th> --}}
                              {{-- <th class="">Desc</th> --}}
                              <th class="text-center">Size (m<sup>2</sup>)</th>
                              <th class="text-center">Weight (ton)</th>
                              @if ($request->status == 10 && auth()->user()->hasRole('department'))
                                <th>Action</th>
                              @endif
                          </tr>
                          </thead>
                          <tbody>
                            @if ($cargoItems->count() > 0)
                              @foreach ($cargoItems as $item)   
                                <tr>
                                    <td class=" text-truncate">
                                      <div class="dropdown">
                                        {{$item->mtd}}
                                      </div>
                                    </td>
                                    <td class=" text-truncate ">
                                      {{$item->desc}} 
                                    </td>
                                    {{-- <td class=" ">{{$item->remark ?? '-'}}</td> --}}
                                    <td class=" text-truncate">{{$item->contract}}</td>
                                    <td class=" text-center text-truncate" >{{$item->qty}} {{$item->unit}}</td>
                                    <td class=" text-center">{{$item->offloading ? $item->offloading->offloading : '-'}}</td>
                                    {{-- <td class=" text-center">
                                      {{$item->offloading ? $item->offloading->onboard : '-'}} # {{$item->offloading->desc ?? '-'}}
                                    
                                    </td> --}}
                                    <td class=" text-center">{{$item->size}}</td>
                                    <td class=" text-center">{{$item->weight}}</td>
                                    
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
                                <x-modal.cargo.delete :item="$item" />
                                
                              @endforeach
                                <tr>
                                  @if ($request->status >= 10 && auth()->user()->hasRole('department'))
                                      <td colspan="5" class="text-muted text-end">Total</td>
                                      @else
                                      <td colspan="5" class="text-muted text-end">Total</td>
                                  @endif
                                  <td class="text-muted text-center">{{$request->total_size}}</td>
                                  <td class="text-muted text-center">{{$request->total_weight}}</td>
                                </tr>
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
                  @elseif($request->activity_id == 2)
                  <div class="card shadow-none border">
                    <div class="card-header">
                      <h4>Manifest</h4>
                      {{-- {{$request->cargoItems->sum('weight')}} --}}
                    </div>
                    <div class="card-body p-3">
                      <div class="table-responsive">
                        <table class="table table-sm">
                          <thead>
                            <tr>
                                <th>Type</th>
                               <th>Name</th>
                               <th>Barcode</th>
                               <th>Department</th>
                               <th>Company</th>
                               <th>Desc</th>
                               {{-- <th></th> --}}
                            </tr>
                         </thead>
                         <tbody>
                            @if ($passengerItems->count() > 0)
                               @foreach ($passengerItems as $passenger)
                                  <tr>
                                     <td>{{$passenger->type}}</td>
                                     <td >{{$passenger->name}}</td>
                                     <td >{{$passenger->barcode}}</td>
                                     <td >{{$passenger->department}}</td>
                                     <td >{{$passenger->company}}</td>
                                     <td >{{$passenger->desc}}</td>
                                     {{-- <td class="text-end">
                                        @if ($request->status == 0)
                                        <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deletePassengerItem_{{$passenger->id}}">Delete</a>
                                        @endif
                                     </td> --}}
                                  </tr>
                                  <x-modal.passenger.delete :item="$passenger" />
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
                  @elseif($request->activity_id == 3)
                  <div class="summary-item">
                    <h6>Barge </h6>
                    <ul class="list-unstyled list-unstyled-border">
                      
                      <li class="media">
                        <a href="#">
                          <img class="mr-3 rounded" width="50" src="{{asset('stisla/img/products/product-1-50.png')}}" alt="product">
                        </a>
                        <div class="media-body">
                          {{-- <div class="media-right">$405</div> --}}
                          <div class="media-title h2"><a href="#">{{$request->bargeItem->barge->name}}</a></div>
                          <div class="text-muted text-small">Moving</div>
                        </div>
                      </li>
                    </ul>
                  </div>
                @endif
                
                
              </div>
            </div>
          </div>
        </div>

        @if ($request->activity_id == 1 && $request->status == 0)
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
        @endif
        
      </div>
      
    </div>
  </section>





  <div class="modal fade" id="request-release" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirm Request Release</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Release this request to Fleet Control?
        </div>
        <div class="modal-footer bg-whitesmoke">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a href="{{route('request.release', enkripRambo($request->id))}}" class="btn btn-primary">Release</a>
        </div>
      </div>
    </div>
  </div>
    
@endsection