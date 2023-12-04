@extends('layouts.stisla.app')
@section('title')
    Request Create
@endsection
@section('content')
<section class="section">
    <div class="section-header">
      <h1 class="section-title">Request Create</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item "><a href="{{route('dsp.user')}}">Dashboard</a></div>
        <div class="breadcrumb-item active">Request Create</div>
      </div>
    </div>

    <div class="section-body">
        <ul class="nav nav-pills" id="myTab3" role="tablist">
            <li class="nav-item">
              <a class="nav-link active bg-primary text-light" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">Create Request</a>
            </li>
            <li class="nav-item">
              <a class="nav-link bg-primary text-light ml-2" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false">Marine Schedule Plan</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent2">
            <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
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
                        @if ($errors->any())
                                    <div class="alert alert-danger">
                                        @foreach ($errors->all() as $err)
                                            {{$err}}
                                        @endforeach
                                    </div>
                                @endif
                        <div class="card border" >
                            <form action="{{route('request.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="card-header bg-primary text-white">
                                    <h4>Form Add Request Activity</h4>
                                </div>
                                <div class="card-body">
                                    
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Type</label>
                                            <select style="background-color: lightgrey" class="custom-select" id="activity" name="activity">
                                                <option  disabled selected>Choose one</option>
                                                @foreach ($activities as $activity)
                                                    <option {{ old('activity') == $activity->id ? 'selected' : ''}} value="{{$activity->id}}">{{$activity->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="date">Date</label>
                                            <input style="background-color: lightgrey" type="date" class="form-control date origin input" id="date" name="date" >
                                        </div>
                                        
                                    </div>
                                    <div class="form-row port">
                                        <div class="form-group col-md-6">
                                            <label>From</label>
                                            <select style="background-color: lightgrey" class="custom-select origin" id="origin" name="origin">
                                                <option  disabled selected>Choose one</option>
                                                @foreach ($ports as $port)
                                                    <option {{ old('origin') == $port->id ? 'selected' : ''}} value="{{$port->id}}">{{$port->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6 destination">
                                            <label>Destination</label>
                                            <select style="background-color: lightgrey" class="custom-select " id="destination" name="destination">
                                                <option  disabled selected>Choose one</option>
                                                @foreach ($ports as $port)
                                                    <option {{ old('destination') == $port->id ? 'selected' : ''}} value="{{$port->id}}">{{$port->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12 file-cargo">
                                            <label for="file-cargo">File Excel Cargo</label>
                                            <input type="file" style="background-color: lightgrey" value="{{old('file')}}" class="form-control mb-2" id="file-cargo" name="file-cargo" >
                                            <a class="file-cargo mt-3" href="{{asset('template/dsp-template-cargo.xlsx')}}">Download Template ...</a>
                                        </div>
                                    </div>
        
                                    <div class="form-row platform">
                                        <div class="form-group col-md-6">
                                            <label>From Platform</label>
                                            <select style="background-color: lightgrey" class="custom-select origin" id="origin" name="origin">
                                                <option  disabled selected>Choose one</option>
                                                @foreach ($platforms as $platform)
                                                    <option {{ old('origin') == $platform->id ? 'selected' : ''}} value="{{$platform->id}}">{{$platform->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6 destination">
                                            <label>Destination Platform</label>
                                            <select style="background-color: lightgrey" class="custom-select " id="destination" name="destination">
                                                <option  disabled selected>Choose one</option>
                                                @foreach ($platforms as $platform)
                                                    <option {{ old('destination') == $platform->id ? 'selected' : ''}} value="{{$platform->id}}">{{$platform->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                    </div>
                                    {{-- <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="bcm">BCM (*optional)</label>
                                            <input type="text" value="{{old('bcm')}}" class="form-control " id="bcm" name="bcm" >
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label for="desc">Description</label>
                                            <input type="text" value="{{old('desc')}}" class="form-control " id="desc" name="desc" >
                                        </div>
                                    </div> --}}
                                    {{-- <hr> --}}
                                    
                                    
                                    
                                    <div class="form-row file-crew">
                                        <div class="form-group col-md-12">
                                            <label for="file-passenger">File Excel Crew</label>
                                            <input type="file" style="background-color: lightgrey" value="{{old('file')}}" class="form-control mb-2" id="file-passenger" name="file-passenger" >
                                            <a class="file-crew mt-3" href="{{asset('template/dsp-template-cre.xlsx')}}">Download Template ...</a>
                                        </div>
                                    </div>
                        
        
                                    <div class="form-row barge">
                                        <div class="form-group col-md-12">
                                            <label>Barge</label>
                                            <select style="background-color: lightgrey" class="custom-select" id="barge" name="barge">
                                                <option  disabled selected>Choose one</option>
                                                @foreach ($barges as $barge)
                                                    <option {{ old('barge') == $barge->id ? 'selected' : ''}} value="{{$barge->id}}">{{$barge->name}}</option>
                                                @endforeach
                                            </select>
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
            <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
              <div class="table-responsive">
                <table class="table table-striped" id="table-11">
                    <thead>
                        <tr>
                            <th>Location</th>
                            <th>Date</th>
                            <th>Vessel</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        
                        {{-- @foreach ($scheduleRoutes as $item)
                            <tr>
                                <td></td>
                            </tr>
                        @endforeach --}}







                        @foreach($scheduleRoutes as $route)
                            <tr>
                                <td>{{$route->port->name}}</td>
                                <td>{{formatDateName($route->date)}}</td>
                                <td>{{$route->schedule->vessel->name}}</td>
                            </tr>
                        @endforeach
                        {{-- @foreach ($schedules as $schedule)

                            <tr>
                                <td>{{formatDateName($schedule->date)}}</td>
                                <td>{{$schedule->vessel->name}}</td>
                                <td class="d-flex">
                                    @foreach ($schedule->routes as $route)
                                    <div class="border rounded px-2 my-1 mr-1">
                                            {{$route->port->name}} <br>
                                            <small>
                                                @if ($route->date)
                                                {{formatDate($route->date)}}
                                                @else
                                                -
                                                @endif
                                                
                                            </small>
                                    </div>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
              </div>
            </div>
          </div>

        
        
    </div>
  </section>
    
@endsection



@push('get_schedules')
    <script>
        console.log('get_schedules function');
        $(".file-cargo").hide();
        $(".file-crew").hide();
        $(".barge").hide();
        $(".platform").hide();
        $('#activity').change(function() {
            var activity = $(this).val();
            console.log(activity)
            if(activity == 1){
                $(".file-cargo").show();
                $(".file-crew").hide();
                $(".barge").hide();
                $(".destination").hide();
            } else if(activity == 2){
                $(".barge").hide();
                $(".file-cargo").hide();
                $(".file-crew").show();
                $(".destination").show();
                $(".platform").hide();
                $(".port").show();
            } else if(activity == 3){
                $(".file-cargo").hide();
                $(".file-crew").hide();
                $(".barge").show();
                $(".destination").show();
                $(".platform").show();
                $(".port").hide();
            }else {
                $(".file-cargo").hide();
                $(".file-crew").hide();
                $(".barge").hide();
                $(".destination").show();
            }
        })


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