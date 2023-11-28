@extends('layouts.stisla.app')
@section('title')
    Request Create
@endsection
@section('content')
<section class="section">
    <div class="section-header">
      <h1 class="section-title">Request Create</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item "><a href="/">Dashboard</a></div>
        <div class="breadcrumb-item active">Request Create</div>
      </div>
    </div>

    <div class="section-body">
        {{-- <h2 class="section-title">Schedule Plan</h2>
        <p class="section-lead">
            We use 'DataTables' made by @SpryMedia. You can check the full documentation <a href="https://datatables.net/">here</a>.
        </p> --}}

        <div class="row">
            <div class="col-md-5">
                {{-- @if ($errors->any())
                <div class="alert alert-danger text-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li><small>{{ $error->message }}</small></li>
                        @endforeach
                    </ul>
                </div>
                @endif --}}
                <div class="card">
                    <form action="{{route('request.store')}}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4>Form Add Request Activity</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Type</label>
                                    <select class="custom-select" id="activity" name="activity">
                                        <option  disabled selected>Choose one</option>
                                        @foreach ($activities as $activity)
                                            <option {{ old('activity') == $activity->id ? 'selected' : ''}} value="{{$activity->id}}">{{$activity->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="date">Date</label>
                                    <input type="date" class="form-control date origin" id="date" name="date" >
                                </div>
                                
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>From</label>
                                    <select class="custom-select origin" id="origin" name="origin">
                                        <option  disabled selected>Choose one</option>
                                        @foreach ($ports as $port)
                                            <option {{ old('origin') == $port->id ? 'selected' : ''}} value="{{$port->id}}">{{$port->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Destination</label>
                                    <select class="custom-select" id="destination" name="destination">
                                        <option  disabled selected>Choose one</option>
                                        @foreach ($ports as $port)
                                            <option {{ old('destination') == $port->id ? 'selected' : ''}} value="{{$port->id}}">{{$port->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="bcm">BCM (*optional)</label>
                                    <input type="text" value="{{old('bcm')}}" class="form-control " id="bcm" name="bcm" >
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="desc">Description</label>
                                    <input type="text" value="{{old('desc')}}" class="form-control " id="desc" name="desc" >
                                </div>
                            </div>
                            
                        </div>
                        <div class="card-footer bg-whitesmoke">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                      <h4>Nearest Vessel</h4>
                    </div>
                    <div class="card-body p-0">
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Vessel</th>
                          </tr>
                        </thead>
                        <tbody id="near" class="near">
                          
                        </tbody>
                      </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                      <h4>Available Schedule</h4>
                    </div>
                    <div class="card-body p-0">
                      <table class="table">
                        <thead>
                            <tr>
                               <th>Vessel</th>
                               <th>Date</th>
                               <th>From</th>
                               <th>Space</th>
                            </tr>
                         </thead>
                         <tbody id="result" class="result">
                           
                          
                         </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
  </section>
    
@endsection



@push('get_schedules')
   <script>
      console.log('get_schedules function');
   
      $(document).ready(function() {
         $('.origin').change(function() {
            $('.result').empty()
            $('.near').empty()
            var origin = $('#origin').val();
            var date = $('#date').val();
            var _token = $('meta[name="csrf-token"]').attr('content');

               console.log('origin:' + origin + ' date:' +date);

               $.ajax({
                  url: "/fetch/schedule/" + date + "/" + origin ,
                  method: "GET",
                  dataType: 'json',

                  success: function(result) {

                     console.log('near :' + result.near);
                     console.log('result :' + result.result);
                     $.each(result.result, function(i, index) {
                        $('.result').html(result.result);

                     });
                     $.each(result.near, function(i, index) {
                        
                        $('.near').html(result.near);
                     });
                  },
                  error: function(error) {
                     console.log(error)
                  }

               })
         })

         
      })
   </script>
@endpush