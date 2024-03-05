@extends('layouts.stisla.app')
@section('title')
		Detail Request Activity
@endsection
@section('content')
   <section class="section">
      {{-- <div class="section-header">
         <h1 class="section-title">Create Request Activity</h1>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item "><a href="{{ route('dsp.user') }}">Dashboard</a></div>
            <div class="breadcrumb-item active">Request Create</div>
         </div>
      </div> --}}

      <div class="section-body">
         <div class="row">
            <div class="col-md-4">
               <div class="d-flex mb-2">
                  <span class="btn btn-light btn-block border"><x-status-stisla.request :request="$request" /></span>
                  @if ($request->status == 0)
                     @if ($request->activity_id == 7)
                     <a href="{{route('request.get.vessel', enkripRambo($request->id))}}" class="btn btn-info px-4 ml-1">Release</a>
                         @else
                         <a href="{{route('request.get.vessel', enkripRambo($request->id))}}" class="btn btn-info px-4 ml-1">Get Vessel</a>
                     @endif
                  
                  @endif
                  
               </div>
               
               <div class="card border shadow-sm">
                  {{-- @if ($request->activity_id == 1 || $request->activity_id == 2)
                     @if ($request->status >= 1 && $request->status != 404)
                        <div class="card-header text-center">
                        
                        <h4> {{$request->schedule->vessel->name ?? 'Vessel not available'}} {{formatDate($request->schedule->date)}}</h4><br>
                        
                        </div>
                     @endif
                  @endif --}}
                  

                  @if ($request->status == 404)
                  <div class="card-body">
                     <form action="{{route('request.change.vessel')}}" method="POST">
                        @csrf
                        <input type="text" name="requestId" id="requestId" value="{{$request->id}}" hidden>
                        <div class="form-group">
                           <div class="input-group">
                              <select class="custom-select" id="vessel" name="vessel">
                              @if ($request->schedule->vessel_id != null)
                              <option value="{{$request->schedule->vessel_id}}" selected>{{$request->schedule->vessel->name}} / {{$request->schedule->vessel->type}}</option>
                              @else
                              <option value="" selected disabled>Kapal belum tersedia</option>
                              @endif
                              
                              @if (count($nearestVessels) > 0)
                                 @foreach ($nearestVessels  as $vess)
                                    @if ($vess->id == $request->schedule->vessel_id)
                                       @else
                                       <option value="{{$vess->id}}">{{$vess->name}} / {{$vess->type}}</option>
                                    @endif
                                 @endforeach
                              @endif
                              </select>
                              <div class="input-group-append">
                                 <button class="btn btn-info" type="submit">Release</button>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>     
                  @endif
                  <form action="{{ route('request.update') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     @method('PUT')
                     <input type="text" name="requestId" id="requestId" value="{{$request->id}}" hidden>
                     <div class="card-body">
                        @if ($errors->any())
                           <div class="alert alert-danger">
                              @foreach ($errors->all() as $err)
                                 {{ $err }}
                              @endforeach
                           </div>
                        @endif
                        <div class="form-row">
                           <div class="form-group col-md-6">
                              <input class="form-control date origin "  id="date"  type="date" value="{{$request->date}}" required name="date">
                           </div>
                           <div class="form-group col-md-6">
                              <select class="custom-select" id="activity"  required name="activity">
                                 <option value="{{$request->activity->id}}" disabled selected>{{$request->activity->name}}</option>
                                 
                              </select>
                           </div>
                        </div>
                        @if ($request->activity_id == 1 || $request->activity_id == 2 || $request->activity_id == 4 || $request->activity_id == 7)
                           <div class="form-row port">
                              <div class="form-group col-md-6">
                                 <select class="custom-select origin" id="origin"  name="origin">
                                    <option disabled selected>Choose one</option>
                                    @foreach ($ports as $port)
                                       <option {{ $request->origin_id == $port->id ? 'selected' : '' }} value="{{ $port->id }}">{{ $port->name }}</option>
                                    @endforeach
                                 </select>
                              </div>
                              <div class="form-group col-md-6 destination">
                                 <select class="custom-select " id="destination"  name="destination">
                                    <option disabled selected>Choose one</option>
                                    @foreach ($ports as $port)
                                       <option {{ $request->destination_id == $port->id ? 'selected' : '' }} value="{{ $port->id }}">{{ $port->name }}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                        @endif
                        
                        @if ($request->activity_id == 3)
                           <div class="form-row platform route">
                              <div class="form-group col-md-6">
                                 {{-- <label>From</label> --}}
                                 <select class="custom-select origin" id="origin"  name="origin">
                                    <option disabled selected>Choose one</option>
                                    @foreach ($platforms as $platform)
                                       <option {{$request->origin_id == $platform->id ? 'selected' : ''}}  value="{{ $platform->id }}">{{ $platform->name }}</option>
                                    @endforeach
                                 </select>
                              </div>
                              <div class="form-group col-md-6 destination">
                                 {{-- <label>Destination</label> --}}
                                 <select class="custom-select " id="destination"  name="destination">
                                    <option disabled selected>Choose one</option>
                                    @foreach ($platforms as $platform)
                                       <option {{$request->destination_id == $platform->id ? 'selected' : ''}} value="{{ $platform->id }}">{{ $platform->name }}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                           <div class="form-row barge">
                              <div class="form-group col-md-12">
                                 {{-- <label>Barge</label> --}}
                                 <select class="custom-select" id="barge"  name="barge">
                                    <option disabled selected>Choose one</option>
                                    @foreach ($barges as $barge)
                                       <option {{ $request->bargeItem->barge_id == $barge->id ? 'selected' : '' }} value="{{ $barge->id }}">{{ $barge->name }}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                        @endif

                        @if ($request->activity_id == 5 || $request->activity_id == 6)
                        <div class="form-row qty">
                           <div class="form-group col-md-12">
                              {{-- <label for="qty">Quantity (KL)</label> --}}
                              <input class="form-control mb-1" id="qty" type="text"  value="{{ $request->fuel->qty }} KL"  name="qty">
                           </div>
                        </div>
                        @endif
                        
                        

                        

                        
                        <div class="form-row">
                           <div class="form-group col-md-12">
                              {{-- <label for="desc">Description</label> --}}
                              <input class="form-control " id="desc" type="text"  value="{{ $request->desc }}" name="desc">
                           </div>
                        </div>
                        @if ($request->status == 0)
                        <button class="btn btn-light border" type="submit">Update</button>
                        <a href="{{route('request.delete', enkripRambo($request->id))}}" class="btn btn-light border">Delete</a>
                        @endif
                        
                        
                        
                        
                     </div>
                  </form>
                  
                     @if ($request->status == 0)
                        @if ($request->activity_id == 1)
                        <div class="card-footer bg-whitesmoke ">
                           <form action="{{route('cargo.import')}}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <input type="text" name="requestId" id="requestId" value="{{$request->id}}" hidden>
                              <div class="form-group">
                                 <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="file-cargo" name="file-cargo">
                                    <div class="input-group-append">
                                       <button class="btn btn-light border" type="submit">Import Cargo</button>
                                    </div>
                                 </div>
                              </div>
                           </form>
                           
                           <div class="d-flex">
                              {{-- <a class="file-creww mr-3" href="{{ asset('template/dsp-template-crew.xlsx') }}">
                                 <i class="fa fa-download"></i>
                                 Excel Crew
                              </a> <br> --}}
                              <a class="file-cargoo" href="{{ asset('template/dsp-template-cargo.xlsx') }}">
                                 <i class="fa fa-download"></i>
                                 Excel Cargo
                              </a>
                           </div>
                        </div>
                        @endif
                        @if ($request->activity_id == 2 || $request->activity_id == 7)
                        <div class="card-footer bg-whitesmoke ">
                           <form action="{{route('crew.import')}}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <input type="text" name="requestId" id="requestId" value="{{$request->id}}" hidden>
                              <div class="form-group">
                                 <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="file-crew" name="file-crew">
                                    <div class="input-group-append">
                                       <button class="btn btn-light border" type="submit">Import Crew</button>
                                    </div>
                                 </div>
                              </div>
                           </form>
                           
                           <div class="d-flex">
                              <a class="file-creww mr-3" href="{{ asset('template/dsp-template-crew.xlsx') }}">
                                 <i class="fa fa-download"></i>
                                 Excel Crew
                              </a> <br>
                              
                           </div>
                        </div>
                        @endif
                        
                     @endif
                     
                  
                  
               </div>
               @if ($request->activity_id == 2 || $request->activity_id == 7)
               <div class="row">
                  <div class="col-6">
                     <div class="card card-info  shadow-sm">
                        <div class="card-body ">
                           {{count($passengers->where('type', 'Departure'))}} <br>
                           Depart
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="card card-danger shadow-sm">
                        <div class="card-body">
                           {{count($passengers->where('type', 'Return'))}} <br>
                           Return
                        </div>
                     </div>
                  </div>
               </div>
               @endif
               
            </div>
            <div class="col-md-8">
               @if ($request->activity_id == 1 || $request->activity_id == 2 )
              
                     @if ($request->status >= 1 && $request->status != 404)
                        <div class=" text-center">
                        
                        <h4> {{$request->schedule->vessel->name ?? 'Menunggu Kapal'}} </h4>
                        <small>{{formatDate($request->schedule->date)}}</small>
                        
                        </div>
                        <hr>
                     @endif
                     <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                        <a class="nav-link {{$request->activity_id == 1 ? 'active' : ''}}" id="cargo-tab" data-toggle="tab" href="#cargo" role="tab" aria-controls="cargo" aria-selected="true">Cargo</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link {{$request->activity_id == 2 ? 'active' : ''}}" id="passenger-tab" data-toggle="tab" href="#passenger" role="tab" aria-controls="passenger" aria-selected="false">Passenger </a>
                        </li>
                     </ul>
                     <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade {{$request->activity_id == 1 ? 'show active' : ''}}" id="cargo" role="tabpanel" aria-labelledby="cargo-tab">
                           @if ($request->status == 0)
                           <form action="{{route('cargo.item.store')}}" method="POST">
                              @csrf
                              <input type="text" id="requestId" name="requestId" value="{{$request->id}}" hidden>
                              <div class="form-row">
                                 <div class="form-group col-md-3">
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text">MTD</div>
                                      </div>
                                      <input type="text" class="form-control" id="mtd" name="mtd" >
                                    </div>
                                 </div>
                                 <div class="form-group col-md-5">
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text">Desc</div>
                                      </div>
                                      <input type="text" class="form-control" id="desc" name="desc" >
                                    </div>
                                 </div>
                                 <div class="form-group col-md-4">
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text">PO</div>
                                      </div>
                                      <input type="text" class="form-control" id="contract" name="contract" >
                                    </div>
                                 </div>
                                 {{-- <div class="form-group col-md-4 mtd">
                                    <label for="file-cargo">MTD</label>
                                    <input class="form-control " id="mtd" type="text" name="mtd">
                                 </div> --}}
                                 {{-- <div class="form-group col-md-4 mtd">
                                    <label for="file-cargo">Material Name</label>
                                    <input class="form-control " id="mtd" type="text" name="mtd">
                                 </div>
                                 <div class="form-group col-md-4 mtd">
                                    <label for="file-cargo">PO/Contract</label>
                                    <input class="form-control " id="mtd" type="text" name="mtd">
                                 </div> --}}
                              </div>
                              <div class="form-row">
                                 <div class="form-group col-md-3">
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text">QTY</div>
                                      </div>
                                      <input type="text" class="form-control" id="qty" name="qty" >
                                    </div>
                                 </div>
                                 <div class="form-group col-md-3">
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text">Unit</div>
                                      </div>
                                      <input type="text" class="form-control" id="unit" name="unit" >
                                    </div>
                                 </div>
                                 <div class="form-group col-md-3">
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text">Weight</div>
                                      </div>
                                      <input type="text" class="form-control" id="weight" name="weight" >
                                    </div>
                                 </div>
                                 <div class="form-group col-md-3">
                                    <button type="submit" class="btn btn-info btn-block">Add</button>
                                 </div>
                                 
                              </div>
                           </form>
                           @endif
      
                           <div class="table-responsive">
                              <table class="" id="">
                                 <thead>
                                 <tr>
                                    
                                    {{-- <th>Status</th> --}}
                                    <th>MTD</th>
                                    {{-- <th>Destination</th> --}}
                                    <th>Descriptive</th>
                                    <th>Contract</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-center">Unit</th>
                                    <th class="text-center">Weight</th>
                                    
                                    <th></th>
                                    {{-- @if ($request->status == 10 && auth()->user()->hasRole('department'))
                                       <th>Action</th>
                                    @endif --}}
                                 </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($cargos as $cargo)
                                        <tr>
                                          <td>{{$cargo->mtd ?? '-'}}</td>
                                          <td>{{$cargo->desc}}</td>
                                          <td>{{$cargo->contract}}</td>
                                          <td class="text-center">{{$cargo->qty}}</td>
                                          <td class="text-center">{{$cargo->unit}}</td>
                                          <td class="text-center">{{$cargo->weight}}</td>
                                          <td>
                                             @if ($request->status == 0)
                                             <a href="">Edit</a>
                                             <a href="">Delete</a>
                                             @endif
                                          </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                       <td colspan="5" class="text-right pr-2">Total Weight</td>
                                       <td colspan="" class="text-center">{{$request->total_weight}}</td>
                                       <td></td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                        <div class="tab-pane fade {{$request->activity_id == 2 ? 'show active' : ''}}" id="passenger" role="tabpanel" aria-labelledby="passenger-tab">
                           @if ($request->status == 0)
                           <form action="{{route('passenger.item.store')}}" method="POST">
                              @csrf
                              <input type="text" id="requestId" name="requestId" value="{{$request->id}}" hidden>
                              {{-- <input type="text" id="type" name="type" value="Departure" hidden> --}}
                              <div class="form-row">
                                 <div class="form-group col-md-6">
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text">Name </div>
                                      </div>
                                      <input type="text" class="form-control" id="name" name="name" >
                                    </div>
                                 </div>
                                 <div class="form-group col-md-4">
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text">Barcode</div>
                                      </div>
                                      <input type="text" class="form-control" id="barcode" name="barcode" >
                                    </div>
                                 </div>
                                 <div class="form-group col-md-2">
                                    <div class="input-group">
                                      
                                      <select class="custom-select" name="type" id="type">
                                          <option value="Departure">Departure</option>
                                          <option value="Return">Return</option>
                                      </select>
                                      {{-- <input type="text" class="form-control" id="desc" name="desc" > --}}
                                    </div>
                                 </div>
                                 
                                 
                              </div>
                              <div class="form-row">
                                 <div class="form-group col-md-4">
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text">Comp</div>
                                      </div>
                                      <input type="text" class="form-control" id="company" name="company" placeholder="Company">
                                    </div>
                                 </div>
                                 <div class="form-group col-md-4">
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text">Dept</div>
                                      </div>
                                      <input type="text" class="form-control" id="department" name="department" placeholder="Department">
                                    </div>
                                 </div>
                                 <div class="form-group col-md-3">
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text">Desc</div>
                                      </div>
                                      <input type="text" class="form-control" id="desc" name="desc" >
                                    </div>
                                 </div>
                                 
                                 <div class="form-group col-md-1">
                                    <button type="submit" class="btn btn-info btn-block">Add</button>
                                 </div>
                                 
                              </div>
                           </form>
                           @endif
      
                           <div class="table-responsive">
                              <table class="" id="table-5">
                                 <thead>
                                 <tr>
                                    
                                    {{-- <th>Status</th> --}}
                                    <th>Name</th>
                                    {{-- <th>Destination</th> --}}
                                    <th>Barcode</th>
                                    <th>Company</th>
                                    <th>Desc</th>
                                    
                                    <th></th>
                                    {{-- @if ($request->status == 10 && auth()->user()->hasRole('department'))
                                       <th>Action</th>
                                    @endif --}}
                                 </tr>
                                 </thead>
                                 <tbody>
                                    <tr><td colspan="5"><b>Departure</b></td></tr>
                                    @foreach ($passengers as $pass)
                                       
                                       @if ($pass->type == 'Departure')
                                       <tr>
                                          <td>{{$pass->name ?? '-'}}</td>
                                          <td>{{$pass->barcode}}</td>
                                          <td>{{$pass->company}}({{$pass->department}})</td>
                                          <td>{{$pass->desc}}</td>
                                          <td>
                                             @if ($request->status == 0)
                                             <a href="">Edit</a>
                                             <a href="">Delete</a>
                                             @endif
                                             
                                          </td>
                                        </tr>
                                       @endif
                                    @endforeach
                                    <tr><td colspan="5"><b>Return</b></td></tr>
                                    @foreach ($passengers as $pass)
                                       
                                       @if ($pass->type == 'Return')
                                       <tr>
                                          <td>{{$pass->name ?? '-'}}</td>
                                          <td>{{$pass->barcode}}</td>
                                          <td>{{$pass->company}}({{$pass->department}})</td>
                                          <td>{{$pass->desc}}</td>
                                          <td>
                                             @if ($request->status == 0)
                                             <a href="">Edit</a>
                                             <a href="">Delete</a>
                                             @endif
                                             
                                          </td>
                                        </tr>
                                       @endif
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                     
                  
               @endif


               @if ($request->activity_id == 3 || $request->activity_id == 5)
                   <div class="card border shadow-sm">
                     <div class="card-header">
                        SCHEDULE
                     </div>
                     <div class="card-body text-center " style="height: 250px">
                        <h4>{{$request->origin->name}} - {{$request->destination->name}}</h4>
                        <hr>
                        <h4 class="mt-4">{{formatDate($request->schedule->date)}}</h4>
                        <span>{{$request->schedule->vessel->name ?? 'Menunggu Kapal dari Fleet Control'}}</span>
                     </div>
                   </div>
               @endif

               @if ($request->activity_id == 7)
               <ul class="nav nav-tabs" id="myTab" role="tablist">
                  
                  <li class="nav-item">
                  <a class="nav-link active" id="passenger-tab" data-toggle="tab" href="#passenger" role="tab" aria-controls="passenger" aria-selected="false">Depart </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link " id="return-tab" data-toggle="tab" href="#return" role="tab" aria-controls="return" aria-selected="false">Return </a>
                     </li>
                  <li class="nav-item">
                     <a class="nav-link" id="add-tab" data-toggle="tab" href="#add" role="tab" aria-controls="add" aria-selected="false">Add </a>
                  </li>
               </ul>
               <div class="tab-content" id="myTabContent">
                  
                  <div class="tab-pane fade show active" id="passenger" role="tabpanel" aria-labelledby="passenger-tab">
                     <div class="table-responsive">
                        <table class="" id="table-11">
                           <thead>
                           <tr>
                              
                              <th>Name</th>
                              <th>Barcode</th>
                              <th>Company</th>
                              <th>Desc</th>
                              
                              <th></th>
                           </tr>
                           </thead>
                           <tbody>
                              {{-- <tr>
                                 <td colspan=""><b>Departure</b></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                              </tr> --}}
                              @foreach ($passengers as $pass)
                                 
                                 @if ($pass->type == 'Departure')
                                 <tr>
                                    <td>{{$pass->name ?? '-'}}</td>
                                    <td>{{$pass->barcode}}</td>
                                    <td>{{$pass->company}}({{$pass->department}})</td>
                                    <td>{{$pass->desc}}</td>
                                    <td>
                                       @if ($request->status == 0)
                                       <a href="">Edit</a>
                                       <a href="">Delete</a>
                                       @endif
                                       
                                    </td>
                                  </tr>
                                 @endif
                              @endforeach
                              {{-- <tr><td colspan="5"><b>Return</b></td></tr> --}}
                              {{-- @foreach ($passengers as $pass)
                                 
                                 @if ($pass->type == 'Return')
                                 <tr>
                                    <td>{{$pass->name ?? '-'}}</td>
                                    <td>{{$pass->barcode}}</td>
                                    <td>{{$pass->company}}({{$pass->department}})</td>
                                    <td>{{$pass->desc}}</td>
                                    <td>
                                       @if ($request->status == 0)
                                       <a href="">Edit</a>
                                       <a href="">Delete</a>
                                       @endif
                                       
                                    </td>
                                  </tr>
                                 @endif
                              @endforeach --}}
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <div class="tab-pane fade " id="return" role="tabpanel" aria-labelledby="return-tab">
                     
                     <div class="table-responsive">
                        <table class="" id="table-12">
                           <thead>
                           <tr>
                              
                              <th>Name</th>
                              <th>Barcode</th>
                              <th>Company</th>
                              <th>Desc</th>
                              
                              <th></th>
                           </tr>
                           </thead>
                           <tbody>
                              {{-- <tr>
                                 <td colspan=""><b>Departure</b></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                              </tr> --}}
                              @foreach ($passengers as $pass)
                                 
                                 @if ($pass->type == 'Return')
                                 <tr>
                                    <td>{{$pass->name ?? '-'}}</td>
                                    <td>{{$pass->barcode}}</td>
                                    <td>{{$pass->company}}({{$pass->department}})</td>
                                    <td>{{$pass->desc}}</td>
                                    <td>
                                       @if ($request->status == 0)
                                       <a href="">Edit</a>
                                       <a href="">Delete</a>
                                       @endif
                                       
                                    </td>
                                  </tr>
                                 @endif
                              @endforeach
                              {{-- <tr><td colspan="5"><b>Return</b></td></tr> --}}
                              {{-- @foreach ($passengers as $pass)
                                 
                                 @if ($pass->type == 'Return')
                                 <tr>
                                    <td>{{$pass->name ?? '-'}}</td>
                                    <td>{{$pass->barcode}}</td>
                                    <td>{{$pass->company}}({{$pass->department}})</td>
                                    <td>{{$pass->desc}}</td>
                                    <td>
                                       @if ($request->status == 0)
                                       <a href="">Edit</a>
                                       <a href="">Delete</a>
                                       @endif
                                       
                                    </td>
                                  </tr>
                                 @endif
                              @endforeach --}}
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <div class="tab-pane fade " id="add" role="tabpanel" aria-labelledby="add-tab">
                     @if ($request->status == 0)
                     <form action="{{route('passenger.item.store')}}" method="POST">
                        @csrf
                        <input type="text" id="requestId" name="requestId" value="{{$request->id}}" hidden>
                        {{-- <input type="text" id="type" name="type" value="Departure" hidden> --}}
                        <div class="form-row">
                           <div class="form-group col-md-8">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">Name </div>
                                </div>
                                <input type="text" class="form-control" id="name" name="name" >
                              </div>
                           </div>
                           <div class="form-group col-md-4">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">Barcode</div>
                                </div>
                                <input type="text" class="form-control" id="barcode" name="barcode" >
                              </div>
                           </div>
                           
                           
                           
                        </div>
                        <div class="form-row">
                           <div class="form-group col-md-2">
                              <div class="input-group">
                                
                                <select class="custom-select" name="type" id="type">
                                    <option value="Departure">Departure</option>
                                    <option value="Return">Return</option>
                                </select>
                                {{-- <input type="text" class="form-control" id="desc" name="desc" > --}}
                              </div>
                           </div>
                           <div class="form-group col-md-6">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">Comp</div>
                                </div>
                                <input type="text" class="form-control" id="company" name="company" placeholder="Company">
                              </div>
                           </div>
                           <div class="form-group col-md-4">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">Dept</div>
                                </div>
                                <input type="text" class="form-control" id="department" name="department" placeholder="Department">
                              </div>
                           </div>
                           <div class="form-group col-md-6">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">Desc</div>
                                </div>
                                <input type="text" class="form-control" id="desc" name="desc" >
                              </div>
                           </div>
                           
                           <div class="form-group col-md-1">
                              <button type="submit" class="btn btn-info btn-block">Add</button>
                           </div>
                           
                        </div>
                     </form>
                     @endif
                  </div>
               </div>
               @endif
               
               
            
            </div>
         </div>
      </div>
   </section>
@endsection


