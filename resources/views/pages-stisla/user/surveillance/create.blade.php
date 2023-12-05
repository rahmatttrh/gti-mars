@extends('layouts.stisla.app')
@section('title')
    Surveillance Create
@endsection
@section('content')
<section class="section">
    <div class="section-header">
      <h1 class="section-title">Surveillance Create</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item "><a href="{{route('dsp.user')}}">Dashboard</a></div>
        <div class="breadcrumb-item active">Surveillance Create</div>
      </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Surveillance Activity</h2>
            <p class="section-lead">Select vessel for today activity.</p>

            <div class="row">
                @foreach ($todaySurveillances as $surv)
                <div class="col-md-6">
                    <div class="pricing pricing-highlight border">
                      <div class="pricing-title">
                        Intan-B
                      </div>
                      <div class="pricing-padding">
                        
                        <div class="pricing-price">
                          <div>{{$surv->vessel->name}}</div>
                          <div>{{formatDate($surv->date)}}</div>
                        </div>
                        
    
                      </div>
                      <div class="pricing-cta">
                        <a href="{{route('surveillance.detail', enkripRambo($surv->id))}}">Choose <i class="fas fa-arrow-right"></i></a>
                      </div>
                    </div>
                </div>
                @endforeach
              
              {{-- <div class="col-md-6">
                <div class="pricing pricing-highlight border">
                  <div class="pricing-title">
                    Aida-A
                  </div>
                  <div class="pricing-padding">
                    <div class="pricing-price">
                      <div>{{$marvela->name}}</div>
                      <div>{{$marvela->type}}</div>
                    </div>
                  </div>
                  <div class="pricing-cta">
                    <a href="#">Choose <i class="fas fa-arrow-right"></i></a>
                  </div>
                </div>
              </div> --}}
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Other day
                        </div>
                        <div class="form">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="date">Date</label>
                                        <input style="background-color: lightgrey" type="date" class="form-control date origin input" id="date" name="date" >
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label>Vessel</label>
                                        <select style="background-color: lightgrey" class="custom-select" id="vessel" name="vessel">
                                            <option  value="17" >OPS AVIOR</option>
                                            <option  value="8" >MARVELA 08</option>
                                            {{-- @foreach ($activities as $activity)
                                                <option {{ old('activity') == $activity->id ? 'selected' : ''}} value="{{$activity->id}}">{{$activity->name}}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-whitesmoke">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
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