@extends('layouts.stisla.app')
@section('title')
    Surveillance History
@endsection
@section('content')
<section class="section">
    <div class="section-header">
      <h1 class="section-title">Surveillance History</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item "><a href="{{route('dsp.user')}}">Dashboard</a></div>
        <div class="breadcrumb-item active">Surveillance History</div>
      </div>
    </div>

    <div class="section-body">
      {{-- <h2 class="section-title">Schedule Plan</h2>
      <p class="section-lead">
        We use 'DataTables' made by @SpryMedia. You can check the full documentation <a href="https://datatables.net/">here</a>.
      </p> --}}

      <div class="row">
        <div class="col-12">
          <div class="card">
            {{-- <div class="card-header">
              <h4>Basic DataTables</h4>
            </div> --}}
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-sm" id="table-1">
                  <thead>                                 
                    <tr>
                      <th class="text-center">
                        #
                      </th>

                      <th>Vessel</th>
                      <th>Destination</th>
                      <th>Desc</th>
                      <th>Unit</th>
                      <th>Weight</th>
                      <th>Date</th>
                      {{-- <th class="text-center">Weight</th> --}}
                      {{-- <th></th> --}}
                    </tr>
                  </thead>
                  <tbody>     
                    @foreach ($cargoHistories as $cargo)
                        <tr>
                          <td class="text-center">{{++$i}}</td>
                          <td><a href="{{route('surveillance.detail', enkripRambo($cargo->surveillance->id))}}">{{$cargo->surveillance->vessel->name}}</a> </td>
                          <td >{{$cargo->destination->name}}</td>
                          <td>{{$cargo->desc}}</td>
                          <td>{{$cargo->qty}} {{$cargo->unit}}</td>
                          <td>{{$cargo->weight}}</td>
                          <td >{{formatDate($cargo->date)}}</td>
                          {{-- <td class="text-center">{{$surv->total_weight}}</td> --}}
                          {{-- <td><a class="btn btn-sm btn-primary" href="{{route('surveillance.detail', enkripRambo($surv->id))}}"><i class="fa fa-eye"></i></a></td> --}}
                        </tr>
                    @endforeach
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