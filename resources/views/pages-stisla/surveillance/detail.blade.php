@extends('layouts.stisla.app')
@section('title')
    Surveillance Detail
@endsection
@section('content')
<section class="section">
    <div class="section-header">
      <h1 class="section-title">Surveillance Detail</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item "><a href="{{route('dsp.user')}}">Dashboard</a></div>
        <div class="breadcrumb-item active">Surveillance Detail</div>
      </div>
    </div>

    <div class="section-body">
      {{-- <h2 class="section-title">Detail Surveillance Activity</h2> --}}
            {{-- <p class="section-lead">Select vessel.</p> --}}

      <div class="row">
        @if (auth()->user()->hasRole('vessel') && $surveillance->status == 0)
          <div class="col-md-4">
            <div class="card border">
              <div class="card-body">
                <form action="{{route('surveillance.report.store')}}" method="POST">
                  @csrf
                  <input type="number" name="surveillance" id="surveillance" value="{{$surveillance->id}}" hidden>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Status</label>
                      <select style="background-color: lightgrey" class="custom-select" id="status" name="status">
                          <option  disabled selected>Choose one</option>
                          @foreach ($statuses as $status)
                              <option {{ old('status') == $status->id ? 'selected' : ''}} value="{{$status->id}}">{{$status->name}}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Location</label>
                      <select style="background-color: lightgrey" class="custom-select" id="port" name="port">
                          <option  disabled selected>Choose one</option>
                          @foreach ($ports as $port)
                              <option {{ old('port') == $port->id ? 'selected' : ''}} value="{{$port->id}}">{{$port->name}}</option>
                          @endforeach
                      </select>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
              </div>
              <div class="card-footer bg-whitesmoke">
                <a href="{{route('surveillance.complete', enkripRambo($surveillance->id))}}" class="btn btn-success btn-block">Complete</a>
              </div>
            </div>
            
            
          </div>
        @endif
        <div class="col">
          <div class="pricing pricing-highlight border">
            <div class="pricing-title">
              {{$report->status->name ?? '-'}} {{$report->port->name ?? '-'}}
            </div>
            <div class="pricing-padding">
              <div class="">
                <h4>{{$surveillance->vessel->name}}</h4>
                {{-- <div>{{$surveillance->vessel->type}}</div> --}}
                <div>{{formatDateName($surveillance->date)}}</div>
                
              </div>
              <hr>
              {{-- <div class="d-flex">
                <div class="browser browser-safari mr-3"></div>
                <div>
                  <div class="mt-2 font-weight-bold">Deadweight {{$surveillance->vessel->deadweight}} (Ton)</div>
                  <div class=" text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 48%</div>
                </div>
              </div> --}}
              <div class="row">
                <div class="col">
                  <div class="mt-2 font-weight-bold">Deadweight {{$surveillance->vessel->deadweight}} (Ton)</div>
                  <div class=" text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> {{$persenWeight}}%</div>
                </div>
                
              </div>
            </div>
            
          </div>
        </div>

        @if ($surveillance->status == 2)
        <div class="col-md-4">
          {{-- <div class="badge badge-info">
            Timeline Activity
          </div>
          <hr> --}}
          <div class="activities" style="height: 250px; overflow-y: scroll">
            @if ($reports->count() > 0)
              @foreach ($reports as $report)
              <div class="activity">
                <div class="activity-icon bg-primary text-white shadow-primary">
                  <i class="fas fa-comment-alt"></i>
                </div>
                <div class="activity-detail">
                  <div class="mb-2">
                    <span class="text-job text-primary">{{  \Carbon\Carbon::parse($report->created_at)->format('d-m-y H:i ')}}</span>
                    <span class="bullet"></span>
                  
                  </div>
                  <p>{{$report->status->name}}  {{$report->port_id == null ? '' :  'at ' .$report->port->name}}.</p>
                  
                </div>
              </div>
               
                @endforeach
                @else
                <div class="row">
                  <div class="col">
                      <small class="text-center text-muted">Empty</small>
                  </div>
                </div>
            @endif
            
          </div>
        </div>
        @endif


        <div class="col-md-12">
          <div class="card shadow-none border">
            <div class="card-header">
              <h4>Cargo</h4>
              {{-- {{$request->cargoItems->sum('weight')}} --}}
            </div>
            @if (auth()->user()->hasRole('department') && $surveillance->status == 0)
            <div class="card-body">
              <form action="{{route('surveillance.cargo.store')}}" method="POST">
                @csrf
                <input type="number" name="surveillance" id="surveillance" value="{{$surveillance->id}}" hidden>
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label>Destination</label>
                    <select style="background-color: lightgrey" class="custom-select" id="destination" name="destination">
                        <option  disabled selected>Choose one</option>
                        @foreach ($ports as $port)
                            <option {{ old('port') == $port->id ? 'selected' : ''}} value="{{$port->id}}">{{$port->name}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-5">
                    <label for="desc">Desc</label>
                    <input style="background-color: lightgrey" type="text" class="form-control " id="desc" name="desc" >
                  </div>
                  
                  
                  <div class="form-group col-md-1">
                    <label for="qty">Qty</label>
                    <input style="background-color: lightgrey" type="text" class="form-control" id="qty" name="qty" >
                  </div>
                  <div class="form-group col-md-2">
                    <label for="unit">Unit</label>
                    <input style="background-color: lightgrey" type="text" class="form-control" id="unit" name="unit" >
                  </div>
                  <div class="form-group col-md-2">
                    <label for="weight">Weight</label>
                    <input style="background-color: lightgrey" type="text" class="form-control" id="weight" name="weight" >
                  </div>
                  {{-- <div class="form-group col-md-2">
                    <label for="date">Action</label>
                    <button type="submit" class="form-control btn btn-primary">Submit</button>
                  </div> --}}
                </div>
                <button type="submit" class=" btn btn-primary">Submit</button>
                
              </form>
            </div>
            @endif
            
            <div class="card-body p-3">
              <div class="table-responsive">
                <table class="table table-striped " id="table-4">
                  <thead>
                    <tr>
                      <th class="text-center">#</th>
                      <th>From</th>
                      <th>Destination</th>
                      <th>Descriptive</th>
                      <th class="text-center">Qty</th>
                      <th class="text-center">Unit</th>
                      
                      <th class="text-center">Weight (ton)</th>
                      <th class="text-center">Status</th>
                      <th></th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($cargos as $cargo)
                    <tr>
                        <td class="text-center">{{++$i}}</td>
                        <td>{{$cargo->origin->name}}</td>
                        <td>{{$cargo->destination->name}}</td>
                        <td>{{$cargo->desc}}</td>
                        <td class="text-center">{{$cargo->qty}}</td>
                        <td class="text-center">{{$cargo->unit}}</td>
                        <td class="text-center">{{$cargo->weight}}</td>
                        <td class="text-center"><x-status-stisla.surveillance-cargo :cargo="$cargo" /> </td>
                        <td>
                          @if (auth()->user()->hasRole('department'))
                            @if ($cargo->status == 0 && $cargo->origin->email == auth()->user()->email )
                            <div class="btn-group mb-3 btn-group-sm" role="group" aria-label="Basic example">
                              {{-- <button type="button" class="btn btn-primary"><i class="fa fa-edit"></i></button> --}}
                              <a href="{{route('surveillance.cargo.send', enkripRambo($cargo->id))}}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="klik untuk mengirim data ke Vessel"><i class="fa fa-check"></i></a>
                              <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                            </div>
                            @endif
                          @endif
                          @if (auth()->user()->hasRole('vessel'))
                            @if ($cargo->status == 1 )
                            <div class="btn-group mb-3 btn-group-sm" role="group" aria-label="Basic example">
                              {{-- <button type="button" class="btn btn-primary"><i class="fa fa-edit"></i></button> --}}
                              <a href="{{route('surveillance.cargo.drop', enkripRambo($cargo->id))}}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Drop cargo"><i class="fa fa-check"></i></a>
                              {{-- <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button> --}}
                            </div>
                            @endif
                          @endif
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="card shadow-none border">
            <div class="card-header">
              <h4>Passenger</h4>
              {{-- {{$request->cargoItems->sum('weight')}} --}}
            </div>
            @if (auth()->user()->hasRole('department') && $surveillance->status == 0)
            <div class="card-body">
              <form action="">
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label>Destination</label>
                    <select style="background-color: lightgrey" class="custom-select" id="activity" name="activity">
                        <option  disabled selected>Choose one</option>
                        {{-- @foreach ($activities as $activity)
                            <option {{ old('activity') == $activity->id ? 'selected' : ''}} value="{{$activity->id}}">{{$activity->name}}</option>
                        @endforeach --}}
                    </select>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="date">Name</label>
                    <input style="background-color: lightgrey" type="text" class="form-control date origin input" id="date" name="date" >
                  </div>
                  
                  
                  <div class="form-group col-md-2">
                    <label for="date">Barcode</label>
                    <input style="background-color: lightgrey" type="text" class="form-control date origin input" id="date" name="date" >
                  </div>
                  <div class="form-group col-md-2">
                    <label for="date">Department</label>
                    <input style="background-color: lightgrey" type="text" class="form-control date origin input" id="date" name="date" >
                  </div>
                  <div class="form-group col-md-2">
                    <label for="date">Company</label>
                    <input style="background-color: lightgrey" type="text" class="form-control date origin input" id="date" name="date" >
                  </div>
                  <div class="form-group col-md-1">
                    <label for="date">Desc</label>
                    <input style="background-color: lightgrey" type="text" class="form-control date origin input" id="date" name="date" >
                  </div>
                  {{-- <div class="form-group col-md-2">
                    <label for="date">Action</label>
                    <button type="submit" class="form-control btn btn-primary">Submit</button>
                  </div> --}}
                </div>
                <button type="submit" class=" btn btn-primary">Submit</button>
                
              </form>
            </div>
            @endif
            <div class="card-body p-3">
              <div class="table-responsive">
                <table class="table table-striped" id="table-4">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Destination</th>
                      <th>Name</th>
                      <th class="text-center">Barcode</th>
                      <th >Department</th>
                      <th >Company</th>
                      <th></th>
                  </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>


        </div>


        @if ($surveillance->status == 0)
            

        <div class="col-md-4">
          <div class="badge badge-info">
            Timeline Activity
          </div>
          <hr>
          <div class="activities" style="height: 350px; overflow-y: scroll">
            @if ($reports->count() > 0)
              @foreach ($reports as $report)
              <div class="activity">
                <div class="activity-icon bg-primary text-white shadow-primary">
                  <i class="fas fa-comment-alt"></i>
                </div>
                <div class="activity-detail">
                  <div class="mb-2">
                    <span class="text-job text-primary">{{  \Carbon\Carbon::parse($report->created_at)->format('d-m-y H:i ')}}</span>
                    <span class="bullet"></span>
                  
                  </div>
                  <p>{{$report->status->name}}  {{$report->port_id == null ? '' :  'at ' .$report->port->name}}.</p>
                  
                </div>
              </div>
               
                @endforeach
                @else
                <div class="row">
                  <div class="col">
                      <small class="text-center text-muted">Empty</small>
                  </div>
                </div>
            @endif
            
          </div>
        </div>
        @endif
      </div>
        
    </div>
  </section>
    
@endsection

