@extends('layouts.stisla.app')
@section('title')
    VDR Create
@endsection
@section('content')
<section class="section">
    <div class="section-header">
      <h1 class="section-title">VDR Create</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item "><a href="/">Dashboard</a></div>
        <div class="breadcrumb-item active">VDR Create</div>
      </div>
    </div>

    <div class="section-body">
        {{-- <h2 class="section-title">Schedule Plan</h2>
        <p class="section-lead">
            We use 'DataTables' made by @SpryMedia. You can check the full documentation <a href="https://datatables.net/">here</a>.
        </p> --}}
    
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header">
                        
                    </div> --}}

                    <div class="card-body">
                        <h4>{{$user->name}} - {{formatDate($vdr->date)}}</h4>
                        <small>Location {{$vdr->location_midnight ?? '-'}}</small> <br>
                        <small>Crew {{$vdr->crew_onduty}}/{{$vdr->crew_max}}</small>
                      {{-- <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          Date
                          <span class="badge badge-primary badge-pill">{{formatDate($vdr->date)}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Location
                            <span class="badge badge-primary badge-pill">{{$vessel->location_midnight ?? '-'}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Owner
                            <span class="badge badge-primary badge-pill">{{$vessel->owner ?? '-'}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Master
                            <span class="badge badge-primary badge-pill">{{$vessel->master ?? '-'}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Number of Crew
                            <span class="badge badge-primary badge-pill"></span>
                        </li>
                      </ul> --}}
                    </div>
                    <div class="card-footer bg-whitesmoke">
                        Contract No. {{$vessel->contract_no ?? '-'}} <br>
                        @if ($vessel->contract_no)
                        [{{$formatDate($vessel->contract_start)}} - {{formatDate($vessel->contract_finish)}}]
                        @endif
                        
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>DETAIL OF DAILY OPERATIONAL ACTIVITIES</h4>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#vdr-add-activity">Add</button>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th colspan="2" class="text-center">TIME</th>
                                        <th colspan="8" class="text-center">Operation Mode Duration (hh::mm)- <br> Except Maintenance & Downtime </th>
                                        <th rowspan="2" class="text-center align-middle">ACTIVITIES</th>
                                        <th rowspan="2" class="text-center align-middle">Action</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Start</th>
                                        <th>Finish</th>
                                        <th>High</th>
                                        <th>Normal</th>
                                        <th>Slow</th>
                                        <th>Manu</th>
                                        <th>Idle</th>
                                        <th>Tow</th>
                                        <th>A/H</th>
                                        <th>S/B</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($activities as $activity)
                                        <tr>
                                            <td>{{substr($activity->start, 0, 5)}}</td>
                                            <td>{{substr($activity->finish, 0, 5)}}</td>
                                            <td>{{floatToTime($activity->high)}}</td>
                                            <td>{{floatToTime($activity->normal)}}</td>
                                            <td>{{floatToTime($activity->slow)}}</td>
                                            <td>{{floatToTime($activity->manu)}}</td>
                                            <td>{{floatToTime($activity->idle)}}</td>
                                            <td>{{floatToTime($activity->Tow)}}</td>
                                            <td>{{floatToTime($activity->ah)}}</td>
                                            <td>{{floatToTime($activity->ab)}}</td>
                                            <td>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#editAct-{{$activity->id}}"> {{$activity->activity}} </a>
                                            </td>
                                            <td>
                                                <a href="#" class="text-danger" data-bs-toggle="modal" data-bs-target="#deleteAct-{{$activity->id}}"> Delete </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                      <h4>SUMMARY OF DAILY FUEL, WATER and CARGOES REMAINING ONBOARD</h4>
                    </div>
                    <div class="card-body">
                      {{-- <div class="alert alert-info">
                        <b>Note!</b> Not all browsers support HTML5 type input.
                      </div> --}}

                        @php
                            $no = 0
                        @endphp
                        @foreach ($cargos as $cargo)
                        <form id="form-{{++$no}}" action="{{route('vdr.update.cargo')}}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{$cargo->id}}" id="">
                            <input type="hidden" name="vdr_id" value="{{$vdr->id}}" id="">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Type</label>
                                    <input type="text" class="form-control" value="{{$cargo->heading->description}}">
                                </div>
                                <div class="form-group col-md-1">
                                    <label>Opening</label>
                                    <input type="text" class="form-control" oninput="calculateClosing({{$cargo->id}})" name="opening" id="opening-{{$cargo->id}}" value="{{$cargo->opening}}">
                                </div>
                                <div class="form-group col-md-1">
                                    <label class="">Consumption</label>
                                    <input type="text" class="form-control" oninput="calculateClosing({{$cargo->id}})" name="consumption" id="consumption-{{$cargo->id}}" value="{{$cargo->consumption}}">
                                </div>
                                <div class="form-group col-md-1">
                                    <label>Received</label>
                                    <input type="text" class="form-control" oninput="calculateClosing({{$cargo->id}})" name="received" id="received-{{$cargo->id}}" value="{{$cargo->received}}">
                                </div>
                                <div class="form-group col-md-1">
                                    <label>Transferred</label>
                                    <input type="text" class="form-control" oninput="calculateClosing({{$cargo->id}})" name="transferred" id="transferred-{{$cargo->id}}" value="{{$cargo->transferred}}">
                                </div>
                                <div class="form-group col-md-1">
                                    <label>Closing</label>
                                    <input type="text" class="form-control" oninput="calculateClosing({{$cargo->id}})" name="closing" id="closing-{{$cargo->id}}" value="{{$cargo->closing}}">
                                </div>
                                <div class="form-group col-md-1">
                                    <label>Remark</label>
                                    <input type="text" class="form-control" oninput="calculateClosing({{$cargo->id}})" name="remark" id="remark-{{$cargo->id}}" value="{{$cargo->remark}}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label></label>
                                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                                    {{-- <a href="" >Save</a> --}}
                                </div>
                            </div>
                        </form>

                        
                        @endforeach
                      
                      
                      
                    </div>
                    <div class="card-footer text-right">
                      <button id="submit-all" class="btn btn-primary mr-1" >Submit</button>
                      <button  class="btn btn-secondary" type="reset">Reset</button>
                    </div>
                  </div>
            </div>
        </div>
    </div>
  </section>




  <div class="modal fade" id="vdr-add-activity" tabindex="1" role="dialog" aria-labelledby="vdr-add-activity" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form action="{{route('vdr.store.activity')}}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$vdr->id}}" id="id">
        <input type="hidden" name="vessel_id" value="{{$vessel->id}}" id="vessel_id">
        <input type="hidden" name="created_by" value="{{$user->name}}" id="created_by">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="vdr-add-activity">Add Daily Operational Activity</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            @if ($errors->any())
                        <div class="alert alert-danger text-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li><small>{{ $error }}</small></li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
            <hr>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="activity">Activity</label>
                    <input type="text" class="form-control" id="activity" name="activity" >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="start">Start</label>
                    <input type="time" class="form-control" id="start" name="start" >
                </div>
                <div class="form-group col-md-6">
                    <label for="finish">Finish</label>
                    <input type="time" class="form-control" id="finish" name="finish" >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="high">High</label>
                    <input type="number" class="form-control" id="high" name="high" >
                </div>
                <div class="form-group col-md-3">
                    <label for="normal">Normal</label>
                    <input type="number" class="form-control" id="normal" name="normal" >
                </div>
                <div class="form-group col-md-3">
                    <label for="slow">Slow</label>
                    <input type="number" class="form-control" id="slow" name="slow" >
                </div>
                <div class="form-group col-md-3">
                    <label for="manu">Manu</label>
                    <input type="number" class="form-control" id="manu" name="manu" >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="idle">Idle</label>
                    <input type="number" class="form-control" id="idle" name="idle" >
                </div>
                <div class="form-group col-md-3">
                    <label for="tow">Tow</label>
                    <input type="number" class="form-control" id="tow" name="tow" >
                </div>
                <div class="form-group col-md-3">
                    <label for="ah">A/H</label>
                    <input type="number" class="form-control" id="ah" name="ah" >
                </div>
                <div class="form-group col-md-3">
                    <label for="sb">S/B</label>
                    <input type="number" class="form-control" id="sb" name="sb" >
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
    
@endsection

@push('vdr-submit')
    <script>
        $(document).ready(function() {
            $('#submit-all').on('click', function () {
                console.log('submit all')
                document.getElementById("form-1").submit();
                document.getElementById("form-2").submit();
                document.getElementById("form-3").submit();
            });

        });
        
    </script>
@endpush

