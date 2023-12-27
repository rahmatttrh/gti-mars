@extends('layouts.stisla.app')
@section('title')
			Request Create
@endsection
@section('content')
   <section class="section">
      <div class="section-header">
         <h1 class="section-title">Create Request Activity</h1>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item "><a href="{{ route('dsp.user') }}">Dashboard</a></div>
            <div class="breadcrumb-item active">Request Create</div>
         </div>
      </div>

      <div class="section-body">
         <div class="row">
            <div class="col-md-5">
               @if ($errors->any())
                  <div class="alert alert-danger">
                     @foreach ($errors->all() as $err)
                        {{ $err }}
                     @endforeach
                  </div>
               @endif
               <div class="card border">
                  <form action="{{ route('request.store') }}" method="POST" enctype="multipart/form-data">
                     @csrf

                     <div class="card-body">
                        <div class="form-row">
                           <div class="form-group col-md-6">
                              <label>Type*</label>
                              <select class="custom-select" id="activity" style="background-color: lightgrey" required name="activity">
                                 <option disabled selected>Choose one</option>
                                 @foreach ($activities as $activity)
                                    <option {{ old('activity') == $activity->id ? 'selected' : '' }} value="{{ $activity->id }}">{{ $activity->name }}</option>
                                 @endforeach
                              </select>
                           </div>
                           <div class="form-group col-md-6">
                              <label for="date">Date*</label>
                              <input class="form-control date origin input" id="date" style="background-color: lightgrey" type="date" required name="date">
                           </div>
                        </div>
                        <div class="form-row port">
                           <div class="form-group col-md-6">
                              <label>Origin/From</label>
                              <select class="custom-select origin" id="origin" style="background-color: lightgrey" name="origin">
                                 <option disabled selected>Choose one</option>
                                 @foreach ($ports as $port)
                                    <option {{ old('origin') == $port->id ? 'selected' : '' }} value="{{ $port->id }}">{{ $port->name }}</option>
                                 @endforeach
                              </select>
                           </div>
                           <div class="form-group col-md-6 destination">
                              <label>Destination</label>
                              <select class="custom-select " id="destination" style="background-color: lightgrey" name="destination">
                                 <option disabled selected>Choose one</option>
                                 @foreach ($ports as $port)
                                    <option {{ old('destination') == $port->id ? 'selected' : '' }} value="{{ $port->id }}">{{ $port->name }}</option>
                                 @endforeach
                              </select>
                           </div>
                           <div class="form-group col-md-12 file-cargo">
                              <label for="file-cargo">File Excel Cargo</label>
                              <input class="form-control mb-2" id="file-cargo" type="file" style="background-color: lightgrey" value="{{ old('file') }}" name="file-cargo">
                              <a class="file-cargo mt-3" href="{{ asset('template/dsp-template-cargo.xlsx') }}">Download Template ...</a>
                           </div>
                        </div>
                        <div class="form-row platform route">
                           <div class="form-group col-md-6">
                              <label>From Platform</label>
                              <select class="custom-select origin" id="origin" style="background-color: lightgrey" name="origin">
                                 <option disabled selected>Choose one</option>
                                 @foreach ($platforms as $platform)
                                    <option {{ old('origin') == $platform->id ? 'selected' : '' }} value="{{ $platform->id }}">{{ $platform->name }}</option>
                                 @endforeach
                              </select>
                           </div>
                           <div class="form-group col-md-6 destination">
                              <label>Destination Platform</label>
                              <select class="custom-select " id="destination" style="background-color: lightgrey" name="destination">
                                 <option disabled selected>Choose one</option>
                                 @foreach ($platforms as $platform)
                                    <option {{ old('destination') == $platform->id ? 'selected' : '' }} value="{{ $platform->id }}">{{ $platform->name }}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="form-row file-crew">
                           <div class="form-group col-md-12">
                              <label for="file-passenger">File Excel Crew</label>
                              <input class="form-control mb-1" id="file-passenger" type="file" style="background-color: lightgrey" value="{{ old('file') }}" name="file-passenger">
                              <a class="file-crew mt-3" href="{{ asset('template/dsp-template-cre.xlsx') }}">Download Template ...</a>
                           </div>
                        </div>

                        <div class="form-row qty">
                           <div class="form-group col-md-12">
                              <label for="qty">Quantity (KL)</label>
                              <input class="form-control mb-1" id="qty" type="text" style="background-color: lightgrey" value="{{ old('qty') }}" name="qty">
                           </div>
                        </div>

                        <div class="form-row barge">
                           <div class="form-group col-md-12">
                              <label>Barge</label>
                              <select class="custom-select" id="barge" style="background-color: lightgrey" name="barge">
                                 <option disabled selected>Choose one</option>
                                 @foreach ($barges as $barge)
                                    <option {{ old('barge') == $barge->id ? 'selected' : '' }} value="{{ $barge->id }}">{{ $barge->name }}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="form-group col-md-12">
                              <label for="desc">Description</label>
                              <input class="form-control " id="desc" type="text" style="background-color:lightgrey" value="{{ old('desc') }}" name="desc">
                           </div>
                        </div>
                        <button class="btn btn-primary btn-lg" type="submit">Submit</button>
                     </div>
                     
                     <div class="card-footer bg-whitesmoke">
                        
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
                        <tbody class="near" id="near">

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
                        <tbody class="result" id="result">

                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>

         <hr>
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
               @foreach ($scheduleRoutes as $route)
                  <tr>
                     <td>{{ $route->port->name }}</td>
                     <td>{{ formatDateName($route->date) }}</td>
                     <td>{{ $route->schedule->vessel->name }}</td>
                  </tr>
               @endforeach
               </tbody>
            </table>
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
      $(".qty").hide();
      $('#activity').change(function() {
         var activity = $(this).val();
         console.log(activity)
         if (activity == 1) {
            $(".file-cargo").show();
            $(".file-crew").hide();
            $(".barge").hide();
            $(".destination").hide();
            $(".qty").hide();
         } else if (activity == 2) {
            $(".barge").hide();
            $(".file-cargo").hide();
            $(".file-crew").show();
            $(".destination").show();
            $(".platform").hide();
            $(".port").show();
            $(".qty").hide();
         } else if (activity == 3) {
            $(".file-cargo").hide();
            $(".file-crew").hide();
            $(".barge").show();
            $(".destination").show();
            $(".platform").show();
            $(".port").hide();
            $(".qty").hide();
         } else if (activity == 5 || activity == 6) {
            $(".file-cargo").hide();
            $(".file-crew").hide();
            $(".barge").hide();
            $(".route").hide();
            $(".platform").hide();
            $(".port").hide();
            $(".qty").show();
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

            console.log('origin:' + origin + ' date:' + date);

            $.ajax({
               url: "/fetch/schedule/" + date + "/" + origin,
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
