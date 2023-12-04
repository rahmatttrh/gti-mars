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
      <h2 class="section-title">Detail Surveillance Activity</h2>
            {{-- <p class="section-lead">Select vessel.</p> --}}

      <div class="row">
        <div class="col-md-12">
          <div class="pricing pricing-highlight border">
            <div class="pricing-title">
              Intan-B
            </div>
            <div class="pricing-padding">
              <div class="pricing-price">
                <div>{{$surveillance->vessel->name}}</div>
                {{-- <div>{{$surveillance->vessel->type}}</div> --}}
                <div>{{formatDateName($surveillance->date)}}</div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="card shadow-none border">
            <div class="card-header">
              <h4>Cargo</h4>
              {{-- {{$request->cargoItems->sum('weight')}} --}}
            </div>
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
            <div class="card-body p-3">
              <div class="table-responsive">
                <table class="table table-striped" id="table-4">
                  <thead>
                    <tr>
                      <th>#</th>
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
                        <td>{{++$i}}</td>
                        <td>{{$cargo->origin->name}}</td>
                        <td>{{$cargo->destination->name}}</td>
                        <td>{{$cargo->desc}}</td>
                        <td class="text-center">{{$cargo->qty}}</td>
                        <td class="text-center">{{$cargo->unit}}</td>
                        <td class="text-center">{{$cargo->weight}}</td>
                        <td class="text-center"><x-status-stisla.surveillance-cargo :cargo="$cargo" /> </td>
                        <td>
                          @if ($cargo->status == 0 && $cargo->origin_id == auth()->user()->getPort() )
                          <div class="btn-group mb-3 btn-group-sm" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary"><i class="fa fa-edit"></i></button>
                            <a href="{{route('surveillance.cargo.send', enkripRambo($cargo->id))}}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="klik untuk mengirim data ke Vessel"><i class="fa fa-check"></i></a>
                            <button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                          </div>
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
      </div>
        
    </div>
  </section>
    
@endsection

