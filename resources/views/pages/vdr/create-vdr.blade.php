@extends('layouts.app')
@section('title')
VDR
@endsection
@section('content')
<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Create
                </div>
                <h2 class="page-title">
                    Vessel Daily Report
                </h2>
            </div>
            <!-- Page title actions -->
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-md-4">
                @if($vdr)
                <div class="card">
                    <div class="card-body text-center">
                        <div class="mb-3">
                            <span class="avatar avatar-xl avatar-rounded" style="background-image: url({{asset('img/vessel/ship.png')}})"></span>
                        </div>
                        <div class="card-title mb-1"> {{$vessel->name}}
                        </div>
                        {{-- <div class="text-muted">{{$employee->department->name ?? '-'}}
                    </div> --}}

                </div>
                <div class="card-footer">
                    <dl class="row">
                        <dt class="col-5">Date</dt>
                        <dd class="col-7">{{$vdr->date}}</dd>
                        <dt class="col-5">Vessel</dt>
                        <dd class="col-7">{{$vessel->name}}</dd>
                        <dt class="col-5">Contract No.</dt>
                        <dd class="col-7">{{$vessel->contract_no ?? '-'}}</dd>
                        <dt class="col-5">Contract Period</dt>
                        <dd class="col-7">{{$vessel->contract_start ?? '-'}} - {{$vessel->contract_end ?? '-'}}</dd>
                        <dt class="col-5">Location (Midnight)</dt>
                        <dd class="col-7">{{$vdr->location_midnight ?? '-'}}</dd>
                        <dt class="col-5">Owner/Operator</dt>
                        <dd class="col-7"> {{$vessel->owner ?? '-'}} / {{$vessel->operator ?? '-'}}</dd>
                        <dt class="col-5">Master Name</dt>
                        <dd class="col-7"> {{$vessel->master ?? '-'}}</dd>
                        <dt class="col-5">Number of Crew / Pax</dt>
                        <dd class="col-7">{{$vdr->crew_onduty}} / {{$vdr->crew_max}} Person</dd>
                    </dl>
                </div>
                <!-- <a type="button" class="card-btn" data-toggle="modal" data-target="#exampleModal"> Edit</a> -->
                <a href="#" class="card-btn" data-bs-toggle="modal" data-bs-target="#modalEdit"> Edit </a>

                <!-- Modal Edit -->
                <div class="modal modal-blur fade" id="modalEdit" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <form action="{{route('vdr.update')}}" method="POST">
                                <div class="modal-body">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{$vdr->id}}" id="">
                                    <input type="hidden" name="vessel_id" value="{{$vessel->id}}" id="">
                                    <input type="hidden" name="created_by" value="{{$user->name}}">
                                    <div class="card-body">
                                        @if ($errors->any())
                                        <div class="alert alert-danger text-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li><small>{{ $error }}</small></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                        <div class="form-floating mb-3">
                                            <input type="text" required class="form-control" id="vessel" name="vessel" value="{{$user->name}}" readonly>
                                            <label for="vessel">Vessel</label>
                                            @error('vessel')
                                            <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="date" required class="form-control" id="date" name="date" value="{{$vdr->date }}" readonly>
                                            <label for="date">Date</label>
                                            @error('date')
                                            <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <label for="email">Number of Crew / Pax</label>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input type="number" required class="form-control" id="onduty" name="onduty" value="{{$vdr->crew_onduty}}" value="1">
                                                    <label for="onduty">On Duty</label>
                                                    @error('onduty')
                                                    <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input type="number" required class="form-control" id="max" name="max" value="{{$vdr->crew_max}}">
                                                    <label for="max">Max</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" required class="form-control" id="location_midnight" name="location_midnight" value="{{$vdr->location_midnight}}">
                                            <label for="location_midnight">Location (Midnight)</label>
                                            @error('location_midnight')
                                            <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            @else
            <div class="card">
                <div class="card-header">
                    Form Create VDR
                </div>
                <form action="{{route('vdr.store')}}" method="POST">
                    @csrf
                    <input type="hidden" name="vessel_id" value="{{$vessel->id}}" id="">
                    <input type="hidden" name="created_by" value="{{$user->name}}">
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger text-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li><small>{{ $error }}</small></li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="form-floating mb-3">
                            <input type="text" required class="form-control" id="vessel" name="vessel" value="{{$user->name}}" readonly>
                            <label for="vessel">Vessel</label>
                            @error('vessel')
                            <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" required class="form-control" id="date" name="date" value="{{ old('date') ?: date('Y-m-d') }}" readonly>
                            <label for="date">Date</label>
                            @error('date')
                            <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="row">
                            <label for="email">Number of Crew / Pax</label>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="number" required class="form-control" id="onduty" name="onduty" value="1">
                                    <label for="onduty">On Duty</label>
                                    @error('onduty')
                                    <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="number" required class="form-control" id="max" name="max" value="20">
                                    <label for="max">Max</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" required class="form-control" id="location_midnight" name="location_midnight" value="">
                            <label for=" location_midnight">Location (Midnight)</label>
                            @error('location_midnight')
                            <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                                <circle cx="12" cy="14" r="2" />
                                <polyline points="14 4 14 8 8 8 8 4" />
                            </svg>
                            Save
                        </button>
                    </div>


                    <div class="card-footer">
                        <!-- <small>Hint : after the data is stored, the user will receive a notification email containing instructions to Sign In into system</small> -->
                    </div>

                </form>
            </div>
            @endif
        </div>
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="page-title">
                                DETAIL OF DAILY OPERATIONAL ACTIVITIES
                            </h2>
                        </div>
                        <!-- Page title actions -->
                        <div class="mr-auto ms-auto d-print-none">
                            <div class="d-flex">
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                                        Options
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end">

                                        <a href="#" class="card-btn" data-bs-toggle="modal" data-bs-target="#modalAdd">
                                            Add Activites
                                        </a>


                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- End modal -->
                    </div>
                </div>
                @if($vdr)
                <div class="table-responsive">
                    <table class="table ">
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

                            <!-- Modal Delete -->

                            <div class="modal modal-blur fade" id="deleteAct-{{$activity->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                    <div class="modal-content">

                                        <form action="{{route('vdr.delete.activity')}}" method="POST">
                                            <div class="modal-body">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{$activity->id}}" id="">
                                                <div class="card-body">
                                                    @if ($errors->any())
                                                    <div class="alert alert-danger text-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                            <li><small>{{ $error }}</small></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    @endif
                                                    <h4 class="text-center"> Anda yakin ingin menghapus activity {{$activity->activity}} ?</h4>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-danger">Ya, Saya yakin </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- End Modal  -->


                            <!-- Modal Edit -->

                            <div class="modal modal-blur fade" id="editAct-{{$activity->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                    <div class="modal-content">

                                        <form action="{{route('vdr.update.activity')}}" method="POST">
                                            <div class="modal-body">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="id" value="{{$activity->id}}" id="">
                                                <div class="card-body">
                                                    @if ($errors->any())
                                                    <div class="alert alert-danger text-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                            <li><small>{{ $error }}</small></li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    @endif

                                                    <div class="form-floating mb-3">
                                                        <textarea type="text" rows="50" required class="form-control" id="activity" name="activity" value="{{$activity->activity}}">{{$activity->activity}}</textarea>
                                                        <label for="activity">Activities</label>
                                                        @error('activity')
                                                        <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="row">
                                                        <label for="email">Time</label>
                                                        <div class="col-md-6">
                                                            <div class="form-floating mb-3">
                                                                <input type="time" required class="form-control jam24" id="start" name="start" value="{{$activity->start}}" value="1">
                                                                <label for="start">Start</label>
                                                                @error('start')
                                                                <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-floating mb-3">
                                                                <input type="time" required class="form-control jam24" id="finish" name="finish" value="{{$activity->finish}}" value="1">
                                                                <label for="finish">Finish</label>
                                                                @error('finish')
                                                                <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form- mb-3">
                                                                <label for="high">High</label>
                                                                <input type="text" placeholder="HH.mm" class="form-control waktu" id="high" name="high" value="{{$activity->high}}">
                                                                @error('high')
                                                                <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form- mb-3">
                                                                <label for="normal">Normal</label>
                                                                <input type="text" placeholder="HH.mm" class="form-control waktu" id="normal" name="normal" value="{{$activity->normal}}">
                                                                @error('normal')
                                                                <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form mb-3">
                                                                <label for="slow">Slow</label>
                                                                <input type="text" placeholder="HH.mm" class="form-control waktu" id="slow" name="slow" value="{{$activity->slow}}">
                                                                @error('slow')
                                                                <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form mb-3">
                                                                <label for="manu">Manu</label>
                                                                <input type="text" placeholder="HH.mm" class="form-control waktu" id="manu" name="manu" value="{{$activity->manu}}">
                                                                @error('manu')
                                                                <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form mb-3">
                                                                <label for="idle">Idle</label>
                                                                <input type="text" placeholder="HH.mm" class="form-control waktu" id="idle" name="idle" value="{{$activity->idle}}">
                                                                @error('idle')
                                                                <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form mb-3">
                                                                <label for="tow">Tow</label>
                                                                <input type="text" placeholder="HH.mm" class="form-control waktu" id="tow" name="tow" value="{{$activity->tow}}">
                                                                @error('tow')
                                                                <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form mb-3">
                                                                <label for="ah">A/H</label>
                                                                <input type="text" placeholder="HH.mm" class="form-control waktu" id="ah" name="ah" value="{{$activity->ah}}">
                                                                @error('ah')
                                                                <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form mb-3">
                                                                <label for="sb">S/B</label>
                                                                <input type="text" placeholder="HH.mm" class="form-control waktu" id="sb" name="sb" value="{{$activity->sb}}">
                                                                @error('sb')
                                                                <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-success">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- End Modal  -->
                            @endforeach

                            <tr>
                                <td></td>
                            </tr>



                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
</div>


@if($vdr)
<!-- Modal Add -->

<div class="modal modal-blur fade" id="modalAdd" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{route('vdr.store.activity')}}" method="POST">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="id" value="{{$vdr->id}}" id="">
                    <input type="hidden" name="vessel_id" value="{{$vessel->id}}" id="">
                    <input type="hidden" name="created_by" value="{{$user->name}}">
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger text-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li><small>{{ $error }}</small></li>
                                @endforeach
                            </ul>
                        </div>
                        @endif


                        <div class="form-floating mb-3">
                            <textarea type="text" rows="50" required class="form-control" id="activity" name="activity" value="{{$vdr->activity}}"></textarea>
                            <label for="activity">Activities</label>
                            @error('activity')
                            <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="row">
                            <label for="email">Time</label>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="time" required class="form-control jam24" id="start" name="start" value="{{$vdr->crew_start}}">
                                    <label for="start">Start</label>
                                    @error('start')
                                    <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="time" required class="form-control jam24" id="finish" name="finish" value="{{$vdr->crew_finish}}">
                                    <label for="finish">Finish</label>
                                    @error('finish')
                                    <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form- mb-3">
                                    <label for="high">High</label>
                                    <input type="text" placeholder="HH.mm" value="0" class="form-control waktu" id="high" name="high">
                                    @error('high')
                                    <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form- mb-3">
                                    <label for="normal">Normal</label>
                                    <input type="text" placeholder="HH.mm" value="0" class="form-control waktu" id="normal" name="normal">
                                    @error('normal')
                                    <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form mb-3">
                                    <label for="slow">Slow</label>
                                    <input type="text" placeholder="HH.mm" value="0" class="form-control waktu" id="slow" name="slow">
                                    @error('slow')
                                    <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form mb-3">
                                    <label for="manu">Manu</label>
                                    <input type="text" placeholder="HH.mm" value="0" class="form-control waktu" id="manu" name="manu">
                                    @error('manu')
                                    <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form mb-3">
                                    <label for="idle">Idle</label>
                                    <input type="text" placeholder="HH.mm" value="0" class="form-control waktu" id="idle" name="idle">
                                    @error('idle')
                                    <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form mb-3">
                                    <label for="tow">Tow</label>
                                    <input type="text" placeholder="HH.mm" value="0" class="form-control waktu" id="tow" name="tow">
                                    @error('tow')
                                    <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form mb-3">
                                    <label for="ah">A/H</label>
                                    <input type="text" placeholder="HH.mm" value="0" class="form-control waktu" id="ah" name="ah">
                                    @error('ah')
                                    <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form mb-3">
                                    <label for="sb">S/B</label>
                                    <input type="text" placeholder="HH.mm" value="0" class="form-control waktu" id="sb" name="sb">
                                    @error('sb')
                                    <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- End Modal  -->
@endif
@endsection

@push('get_schedules')
<script>
    $(".waktu").on("input", function() {
        // Mengambil nilai dari input
        var inputValue = $(this).val();

        // Validasi hanya angka dan maksimal dua digit di belakang koma
        var regex = /^\d{0,2}(\.\d{0,2})?$/;

        if (!regex.test(inputValue)) {
            alert("Input tidak valid. Hanya angka dengan maksimal dua digit di belakang koma.");
            // Mengosongkan nilai input jika tidak valid
            $(this).val("");
            return;
        }

        // Konversi nilai input menjadi float
        var floatValue = parseFloat(inputValue);

        // Paksa nilai desimal menjadi 59 jika lebih besar dari 59
        if (floatValue > 59) {
            floatValue = 59;
        }

        //  Mengambil nilai di belakang koma
        var nilaiDiBelakangKoma = (floatValue % 1).toFixed(2);

        if (nilaiDiBelakangKoma > 0.59) {
            alert("Input tidak valid. Maksimal desimal 59.");
            // Mengosongkan nilai input jika tidak valid
            $(this).val("");
        }

        // Validasi maksimal 24.00
        if (floatValue > 24) {
            alert("Input tidak valid. Maksimal 24.00.");
            // Mengosongkan nilai input jika tidak valid
            $(this).val("");
        }
    });
</script>
@endpush