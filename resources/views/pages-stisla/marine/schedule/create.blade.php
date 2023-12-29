@extends('layouts.stisla.app')
@section('title')
    Schedule Create
@endsection
@section('content')
<section class="section">
    <div class="section-header">
      <h1 class="section-title">Schedule Create</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item "><a href="{{route('dsp.marine')}}">Dashboard</a></div>
        <div class="breadcrumb-item active">Schedule Create</div>
      </div>
    </div>

    <div class="section-body">
      
      <div class="row mt-3">
        <div class="col-6">
          <div class="card">
            <form action="{{route('schedule.store')}}" method="POST">
              @csrf
              <div class="card-header">
                <h4>Form Create Schedule</h4>
              </div>
              <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-8">
                      <label>On Hire Vessel</label>
                      <select style="background-color: lightgrey" required class="custom-select" id="vessel" name="vessel">
                          <option  disabled selected>Choose one</option>
                          @foreach ($vessels as $vessel)
                              <option {{ old('vessel') == $vessel->id ? 'selected' : ''}} value="{{$vessel->id}}">{{$vessel->name}}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group col-md-4">
                      <label for="date">Date</label>
                      <input style="background-color: lightgrey" type="date" required class="form-control date origin input" id="date" name="date" >
                  </div>
                </div>
                <div class="form-group">
                  <label>From/Origin</label>
                  <select style="background-color: lightgrey" required class="custom-select" id="port" name="port">
                      <option  disabled selected>Choose one</option>
                      @foreach ($ports as $port)
                          <option {{ old('port') == $port->id ? 'selected' : ''}} value="{{$port->id}}">{{$port->name}}</option>
                      @endforeach
                  </select>
              </div>
              </div>
              <div class="card-footer bg-whitesmoke">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>

        {{-- <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <b>Off Hire Vessel</b>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-sm" id="table-1">
                  <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($offhireVessels as $vessel)
                    <tr>
                      <td><a href="{{route('vessel.detail', enkripRambo($vessel->id))}}">{{$vessel->name}}</a> </td>
                      <td>{{$vessel->type}}</td>
                      <td>
                          @if ($vessel->status == 0)
                             <a href="#" class="badge badge-light" data-toggle="modal" data-target="#vessel-onhire-{{$vessel->id}}">Off Hire</a>
                             @elseif($vessel->status == 1)
                             <a href="#" class="badge badge-primary" data-toggle="modal" data-target="#vessel-offhire-{{$vessel->id}}">On Hire</a>
                          @endif
                      </td>
                    </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div> --}}
      </div>
    </div>
  </section>
    
@endsection