@extends('layouts.stisla.app')
@section('title')
    Request Detail
@endsection
@section('content')
<section class="section">
   {{-- <div class="section-header">
      <h1 class="section-title">Request Detail</h1>
      <div class="section-header-breadcrumb">
         <div class="breadcrumb-item "><a href="{{route('dsp.user')}}">Dashboard</a></div>
         <div class="breadcrumb-item active">Request Detail</div>
      </div>
   </div> --}}

   <div class="section-body">
      {{-- <h2 class="section-title">Schedule Plan</h2>
      <p class="section-lead">
         We use 'DataTables' made by @SpryMedia. You can check the full documentation <a href="https://datatables.net/">here</a>.
      </p> --}}

      <div class="row">
         <div class="col-md-12">
            
         </div>
         <div class="col-12">
         
            {{-- @if (auth()->user()->hasRole('department'))
            @endif --}}
            
            
            <div class="card">
               <div class="card-body">
                  
                  <div class="row">
                     <div class="col">
                        <div class="d-flex">
                           @if (auth()->user()->hasRole('department'))
                              <x-parent-stisla.action-user :parent="$parent" :ports="$ports" />
                           @endif
                           
            
                           <div class="btn-group ml-2">
                              {{-- <a href="{{route('invoice.request', enkripRambo($parent->id))}}" class="btn btn-light border btn-lg">Preview PDF</a> --}}
                              
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
                        </div>
                        <hr>
                        {{$parent->activity->name}} Activity
                        From <b>{{$parent->origin->name}}</b><br>
                        <small> Request by {{$parent->employee->name}}  {{$parent->employee->ekstensi}}</small>
                     </div>
                     @if ($parent->status == 0)
                     <div class="col">
                        <form action="{{route('parent.add.cargo')}}" method="POST" enctype="multipart/form-data">
                           @csrf
                           <input type="number" name="parent" id="parent" value="{{$parent->id}}" hidden>
                           <div class="form-group">
                              <div class="input-group">
                                    <input type="file" required class="form-control" name="file-cargo" id="file-cargo">
                                    
                                 <div class="input-group-append">
                                    <button class="btn btn-primary px-4" type="submit">Add Cargo</button>
                                 </div>
                              </div>
                           </div>
                           {{-- <div class="form-row">
                           <div class="form-group col-md-12">
                              <label for="status">Vessel</label>
                              
                           </div>
                           </div>
                           <button class="btn btn-primary btn-lg">Report Status</button> --}}
                        </form>
                        <form class="" action="{{route('parent.add.crew')}}" method="POST" enctype="multipart/form-data">
                           @csrf
                           <input type="number" name="parent" id="parent" value="{{$parent->id}}" hidden>
                           <div class="form-group">
                              <div class="input-group">
                                 <input type="file" class="form-control" required name="file-crew" id="file-crew">
                                 <select class="form-control" name="destination" required id="destination">
                                    <option selected disabled>Destination...</option>
                                       @foreach ($ports as $port)
                                       <option value="{{$port->id}}">{{$port->name}}</option>
                                       @endforeach
                                 </select>
                                 <div class="input-group-append">
                                 <button class="btn btn-primary px-4" type="submit">Add Crew</button>
                                 </div>
                              </div>
                           </div>
                           {{-- <div class="form-row">
                              <div class="form-group col-md-12">
                                 <label for="status">Vessel</label>
                                 
                              </div>
                           </div>
                           <button class="btn btn-primary btn-lg">Report Status</button> --}}
                        </form>
                     </div> 
                     @elseif($parent->status == 201)
                     <div class="col">
                        
                        <form class="" action="{{route('parent.change.vessel')}}" method="POST">
                           @csrf
                           <input type="number" name="parent" id="parent" value="{{$parent->id}}" hidden>
                           <input type="number" name="schedule" id="schedule" value="{{$parent->requests->first()->schedule->id}}" hidden>
                           <div class="form-group">
                              <label for="schedule">Change vessel? </label>
                              <div class="input-group">
                                 <select class="form-control" name="vessel" id="vessel">
                                    {{-- @foreach ($vessels as $vessel)
                                    <option {{$parent->requests->first()->schedule->vessel_id == $vessel->id ? 'selected' : ''}} value="{{$vessel->id}}">{{$vessel->name}} {{$vessel->id}}  {{$parent->requests->first()->schedule->vessel_id == $vessel->id ? '- Selected' : ''}}</option>
                                    @endforeach --}}
                                       {{-- @if (count($scheduleRoutes) > 0)
                                          @foreach ($scheduleRoutes as $sche)
                                             @if ($parent->requests->first()->schedule_id == $sche->schedule->id)
                                             <option {{$parent->requests->first()->schedule_id == $sche->schedule->id ? 'selected' : ''}} value="{{$sche->schedule->id}}">{{$sche->schedule->vessel->name}}  {{$parent->requests->first()->schedule_id == $sche->schedule->id ? '- Selected' : ''}}</option>
                                             @endif
                                          @endforeach
                                       @endif --}}

                                       <option value="{{$parent->requests->first()->schedule->vessel_id}}" selected>{{$parent->requests->first()->schedule->vessel->name}}</option>
                                       @if (count($nearestVessels) > 0)
                                          @foreach ($nearestVessels  as $vess)
                                             @if ($vess->id == $parent->requests->first()->schedule->vessel_id)
                                                @else
                                                <option value="{{$vess->id}}">{{$vess->name}}</option>
                                             @endif
                                          @endforeach
                                       @endif

                                       {{-- @foreach ($schedules as $schedule)
                                          <option {{$parent->requests->first()->schedule_id == $schedule->id ? 'selected' : ''}} value="{{$schedule->id}}">{{$schedule->vessel->name}}  {{$parent->requests->first()->schedule_id == $schedule->id ? '- Selected' : ''}}</option>
                                          @endforeach --}}
                                       
                                 </select>
                                 <div class="input-group-append">
                                 <button class="btn btn-primary px-4" type="submit">Submit</button>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div> 
                     @endif
                     
                  </div>
               </div>
               <div class="card-body">
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                     <li class="nav-item">
                     <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Cargo</a>
                     </li>
                     <li class="nav-item">
                     <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Crew </a>
                     </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                     <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="table-responsive">
                           <table class="table-striped" id="table-1">
                              <thead>
                              <tr>
                                 <th>Status</th>
                                 <th>MTD</th>
                                 <th>Destination</th>
                                 <th>Descriptive</th>
                                 <th>Contract</th>
                                 <th class="text-center">Qty</th>
                                 <th class="text-center">Weight</th>
                                 <th class="text-center">Drop</th>
                                 <th class="text-center">Size (m<sup>2</sup>)</th>
                                 <th></th>
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
                                       <td><x-status-stisla.request :request="$item->request" /></td>
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
                                       @if (auth()->user()->hasRole('department') && $parent->status == 0)
                                          <td>
                                             {{-- <div class="btn-group mb-3 btn-group-sm" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cargo-edit-{{$item->id}}"><i class="fa fa-edit"></i></button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#cargo-delete-{{$item->id}}"><i class="fa fa-trash"></i></button>
                                             </div> --}}
                                             <a href="#" data-toggle="modal" data-target="#cargo-edit-{{$item->id}}">Edit</a>
                                             <a href="#" data-toggle="modal" data-target="#cargo-delete-{{$item->id}}">Delete</a>
                                          </td>

                                          @elseif($request->status == 10 && auth()->user()->hasRole('department'))
                                          <td>
                                          @if ($item->status == 1)
                                             <a href="#" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#confirmCargo_{{$item->id}}">Confirm</a>
                                             <x-modal.cargo.confirm :cargo="$item" :routes="$routes" :schedule="$request->schedule" />
                                             @else
                                             -
                                          @endif
                                       </td>
                                       @else
                                       <td>-</td>
                                       @endif
                                       
                                    </tr>
                                 @endforeach
                              @endforeach
                              </tbody>
                           </table>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                     <div class="table-responsive">
                        <table class=" table-striped " id="table-5">
                           <thead>
                           <tr>
                              <th>Status</th>
                                 <th>Type</th>
                                 <th>Route</th>
                              <th>Name</th>
                              <th>Barcode</th>
                              <th>Department</th>
                              <th>Company</th>
                              <th>Desc</th>
                              <th></th>
                           </tr>
                        </thead>
                        <tbody>
                           
                           @foreach ($parent->requests as $request)
                           @foreach ($request->passengerItems as $passenger)
                              <tr>
                                 <td><x-status-stisla.request :request="$passenger->request" /></td>
                                 <td>{{$passenger->type}}</td>
                                 <td> {{$passenger->request->destination->name}}</td>
                                 <td >{{$passenger->name}}</td>
                                 <td >{{$passenger->barcode}}</td>
                                 <td >{{$passenger->department}}</td>
                                 <td >{{$passenger->company}}</td>
                                 <td >{{$passenger->desc}}</td>
                                 <td>
                                    @if (auth()->user()->hasRole('department') && $parent->status == 0)
                                       {{-- <div class="btn-group mb-3 btn-group-sm" role="group" aria-label="Basic example">
                                       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#passenger-edit-{{$passenger->id}}"><i class="fa fa-edit"></i></button>
                                       <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#passenger-delete-{{$passenger->id}}"><i class="fa fa-trash"></i></button>
                                       </div> --}}
                                       <a href="#" data-toggle="modal" data-target="#passenger-edit-{{$passenger->id}}">Edit</a>
                                       <a href="#" data-toggle="modal" data-target="#passenger-delete-{{$passenger->id}}">Delete</a>
                                    @endif
                                    
                                 </td>
                                 {{-- <td class="text-end">
                                    @if ($request->status == 0)
                                    <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deletePassengerItem_{{$passenger->id}}">Delete</a>
                                    @endif
                                 </td> --}}
                              </tr>
                              {{-- <x-modal.passenger.delete :item="$passenger" /> --}}
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
   </div>
</section>




  {{-- Modal Release Parent (all request) --}}
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

  {{-- Modal edit passenger --}}
  @foreach ($parent->requests as $request)
    @foreach ($request->passengerItems as $passenger)
    <div class="modal fade" id="passenger-edit-{{$passenger->id}}" tabindex="1" role="dialog"  aria-hidden="true">
      <div class="modal-dialog" role="document">
        <form action="{{route('passenger.update')}}" method="POST">
          @csrf
          @method('PUT')
          <input type="number" name="passenger" id="passenger" value="{{$passenger->id}}" hidden>
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit Passenger </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              {{-- Change {{$req->activity->name}} {{$req->description}} to  ...
              <hr> --}}
              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="type">Type</label>
                  <select id="type" name="type" class="form-control">
                    <option {{$passenger->type == 'Depart' ? 'selected' : ''}} value="Depart">Departure</option>
                    <option {{$passenger->type == 'Return' ? 'selected' : ''}} value="Return">Return</option>
                  </select>
                </div>
                <div class="form-group col-md-8">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" id="name" value="{{$passenger->name}}">
                </div>
                <div class="form-group col-md-6">
                  <label for="barcode">Barcode</label>
                  <input type="text" class="form-control" name="barcode" id="barcode" value="{{$passenger->barcode}}">
                </div>
                <div class="form-group col-md-6">
                  <label for="department">Department</label>
                  <input type="text" class="form-control" name="department" id="department" value="{{$passenger->department}}">
                </div>
                <div class="form-group col-md-6">
                  <label for="company">Company</label>
                  <input type="text" class="form-control" name="company" id="company" value="{{$passenger->company}}">
                </div>
                <div class="form-group col-md-6">
                  <label for="desc">Description</label>
                  <input type="text" class="form-control" name="desc" id="desc" value="{{$passenger->desc}}">
                </div>
              </div>
              
            </div>
            <div class="modal-footer bg-whitesmoke">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="modal fade" id="passenger-delete-{{$passenger->id}}" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Delete Confirmation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Delete {{$passenger->name}} data of the list?
          </div>
          <div class="modal-footer bg-whitesmoke">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <a href="{{route('passenger.delete', enkripRambo($passenger->id))}}" class="btn btn-danger">Delete</a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  @endforeach


  {{-- Modal edit cargo --}}
  @foreach ($parent->requests as $request)
    @foreach ($request->cargoItems as $cargo)
    <div class="modal fade" id="cargo-edit-{{$cargo->id}}" tabindex="1" role="dialog"  aria-hidden="true">
      <div class="modal-dialog" role="document">
        <form action="{{route('cargo.update')}}" method="POST">
          @csrf
          @method('PUT')
          <input type="number" name="cargo" id="cargo" value="{{$cargo->id}}" hidden>
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit Cargo </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              {{-- Change {{$req->activity->name}} {{$req->description}} to  ...
              <hr> --}}
              <div class="form-row">
                
                <div class="form-group col-md-4">
                  <label for="mtd">MTD</label>
                  <input type="text" class="form-control" name="mtd" id="mtd" value="{{$cargo->mtd}}">
                </div>
                <div class="form-group col-md-8">
                  <label for="contract">Contract/PO</label>
                  <input type="text" class="form-control" name="contract" id="contract" value="{{$cargo->contract}}">
                </div>
                <div class="form-group col-md-12">
                  <label for="desc">Descriptive</label>
                  <input type="text" class="form-control" name="desc" id="desc" value="{{$cargo->desc}}">
                </div>
                
                <div class="form-group col-md-3">
                  <label for="qty">Qty</label>
                  <input type="number" class="form-control" name="qty" id="qty" value="{{$cargo->qty}}">
                </div>
                <div class="form-group col-md-3">
                  <label for="unit">Unit</label>
                  <input type="text" class="form-control" name="unit" id="unit" value="{{$cargo->unit}}">
                </div>
                <div class="form-group col-md-6">
                  <label for="weight">Weight</label>
                  <input type="text" class="form-control" name="weight" id="weight" value="{{$cargo->weight}}">
                </div>
              </div>
              
            </div>
            <div class="modal-footer bg-whitesmoke">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="modal fade" id="cargo-delete-{{$cargo->id}}" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Delete Confirmation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Delete {{$cargo->desc}} data of the list?
          </div>
          <div class="modal-footer bg-whitesmoke">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <a href="{{route('cargo.delete', enkripRambo($cargo->id))}}" class="btn btn-danger">Delete</a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  @endforeach
    
@endsection