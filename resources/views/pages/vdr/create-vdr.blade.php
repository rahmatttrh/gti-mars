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
            @if ($vdr)
            <div class="col-auto ms-auto d-print-none">
                <a href="{{route('document.vdr', enkripRambo($vdr->id))}}" class="btn btn-primary">Export PDF</a>
            </div>
            @endif

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

            <!-- Tabel Weathers-->
            <div class="card mt-3">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="page-title">
                                WEATHER CONDITION
                            </h2>
                        </div>


                        <!-- End modal -->
                    </div>
                </div>
                @if($vdr)
                <div class="table-responsive">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th class="text-center">Weather / Time</th>
                                <th>00:00 - 06:00 hrs</th>
                                <th>06:00 - 12:00 hrs</th>
                                <th>12:00 - 18:00 hrs</th>
                                <th>18:00 - 24:00 hrs</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="{{route('vdr.update.weather')}}" method="post">
                                @csrf
                                @method('PUT')
                                @foreach ($weathers as $weather)
                                <input type="hidden" name="vdr_id" value="{{$vdr->id}}">
                                <input type="hidden" name="id[]" value="{{$weather->id}}">
                                <tr>
                                    <td>{{$weather->heading->description}}</td>
                                    <td>
                                        <input type="text" class="form-control" name="t_0006[]" value="{{ $weather->t_0006  }}">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="t_0612[]" value="{{ $weather->t_0612  }}">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="t_1218[]" value="{{ $weather->t_1218  }}">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="t_1824[]" value="{{ $weather->t_1824  }}">
                                    </td>
                                </tr>

                                @endforeach
                                <tr>
                                    <td colspan="4"></td>
                                    <td><button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Save</button></td>
                                </tr>
                            </form>
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
            <!-- End Tabel  -->
        </div>
        <div class="col-md-8 ">
            <!-- Tabel Detail of Daily Operating Activies -->
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

                            @php
                            $totalHigh = 0;
                            $totalNormal = 0;
                            $totalSlow = 0;
                            $totalManu = 0;
                            $totalIdle = 0;
                            $totalTow = 0;
                            $totalAh = 0;
                            $totalAb = 0;
                            @endphp
                            @foreach ($activities as $activity)
                            <tr>
                                <td class="text-success">{{substr($activity->start, 0, 5)}}</td>
                                <td class="text-danger">{{substr($activity->finish, 0, 5)}}</td>
                                <td>{{floatToTime($activity->high)}}</td>
                                <td>{{floatToTime($activity->normal)}}</td>
                                <td>{{floatToTime($activity->slow)}}</td>
                                <td>{{floatToTime($activity->manu)}}</td>
                                <td>{{floatToTime($activity->idle)}}</td>
                                <td>{{floatToTime($activity->tow)}}</td>
                                <td>{{floatToTime($activity->ah)}}</td>
                                <td>{{floatToTime($activity->sb)}}</td>
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

                            @php
                            $totalHigh += $activity->high;

                            $totalNormal += $activity->normal;
                            $totalSlow += $activity->slow;
                            $totalManu += $activity->manu;
                            $totalIdle += $activity->idle;
                            $totalTow += $activity->tow;
                            $totalAh += $activity->ah;
                            $totalAb += $activity->sb;
                            @endphp
                            <!-- End Modal  -->
                            @endforeach

                            <tr>
                                <td colspan="2" class="text-center">Total</td>
                                <td>{{floatToTime($totalHigh)}}</td>
                                <td>{{floatToTime($totalNormal)}}</td>
                                <td>{{floatToTime($totalSlow)}}</td>
                                <td>{{floatToTime($totalManu)}}</td>
                                <td>{{floatToTime($totalIdle)}}</td>
                                <td>{{floatToTime($totalTow)}}</td>
                                <td>{{floatToTime($totalAh)}}</td>
                                <td>{{floatToTime($totalAb)}}</td>
                            </tr>



                        </tbody>
                    </table>
                </div>
                @endif
            </div>
            <!-- End Tabel  -->
            <!-- Tabel Detail Fuel-->
            <div class="card mt-3">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="page-title">
                                SUMMARY OF DAILY FUEL, WATER and CARGOES REMAINING ONBOARD
                            </h2>
                        </div>


                        <!-- End modal -->
                    </div>
                </div>
                @if($vdr)
                <div class="table-responsive">
                    <table class="table ">
                        <thead>
                            <tr class="text-center align-middle">
                                <th>TYPE</th>
                                <th>Opening <br> (ROB from Previous Day)</th>
                                <th>Consumption <br> (Based on Actual Sounding)</th>
                                <th>Received</th>
                                <th>Transferred</th>
                                <th>Closing</th>
                                <th>Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="{{route('vdr.update.cargo')}}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="vdr_id" value="{{$vdr->id}}">
                                @foreach ($cargos as $cargo)
                                <tr>
                                    <!-- <td> -->
                                    <input type="hidden" name="id[]" value="{{$cargo->id}}">
                                    <!-- </td> -->
                                    <td> {{$cargo->heading->description}} </td>
                                    <td class="text-right align-middle">
                                        <input type="number" name="opening[]" class="form-control" value="{{$cargo->opening}}">
                                    </td>
                                    <td class="text-left align-middle">
                                        <input type="number" name="consumption[]" class="form-control" value="{{$cargo->consumption}}">
                                    </td>
                                    <td class="text-left align-middle">
                                        <input type="number" name="received[]" class="form-control" value="{{$cargo->received}}">
                                    </td>
                                    <td class="text-left align-middle">
                                        <input type="number" name="transferred[]" class="form-control" value="{{$cargo->transferred}}">
                                    </td>
                                    <td class="text-left align-middle">
                                        <input type="text" name="closing[]" readonly class="form-control" value="{{$cargo->closing}}">
                                    </td>
                                    <td class="text-left align-middle">
                                        <input type="text" name="remarks[]" class="form-control" value="{{$cargo->remarks}}">
                                    </td>
                                </tr>



                                @endforeach


                                <tr>
                                    <td colspan="6"></td>
                                    <td>
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Save</button>
                                    </td>
                                </tr>
                            </form>
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
            <!-- End Table  -->


        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- Tabel HSE-->
            <div class="card mt-3">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="page-title">
                                HSSE
                            </h2>
                        </div>


                        <!-- End modal -->
                    </div>
                </div>
                @if($vdr)
                <div class="table-responsive">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th class="text-center">A</th>
                                <th>HSSE STATISTICS (INPUT)</th>
                                <th>Previous</th>
                                <th>Today</th>
                                <th>Monthly</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="{{route('vdr.update.hse')}}" method="post">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="vdr_id" value="{{$vdr->id}}">
                                @php
                                $groupHeader = 'A';
                                $no = 1;
                                @endphp

                                @foreach ($hses as $hse)
                                <input type="hidden" name="id[]" value="{{$hse->id}}">
                                @if($hse->header->group_header != $groupHeader)
                                <thead>
                                    <tr>
                                        <th class="text-center">B</th>
                                        <th>HSSE STATISTICS (Output)</th>
                                        <th>Previous</th>
                                        <th>Today</th>
                                        <th>Monthly</th>
                                    </tr>
                                </thead>

                                @php
                                $no = 1;
                                @endphp

                                @endif
                                <tr>
                                    <td>{{ $no++}}</td>
                                    <td>{{$hse->header->description}}</td>
                                    @if($hse->header_id != 8)
                                    <td>
                                        <input type="number" name="previous[]" class="form-control" value="{{$hse->previous}}">
                                    </td>
                                    <td>
                                        <input type="number" name="today[]" class="form-control" value="{{$hse->today}}">
                                    </td>
                                    <td>
                                        <input type="text" name="monthly[]" class="form-control" value="{{$hse->previous + $hse->today}}" readonly>
                                    </td>
                                    @else
                                    <input type="hidden" name="previous[]" class="form-control" value="{{$hse->previous}}">
                                    <input type="hidden" name="today[]" class="form-control" value="{{$hse->today}}">
                                    <input type="hidden" name="monthly[]" class="form-control" value="{{$hse->today}}" readonly>
                                    <td colspan="3"></td>
                                    @endif
                                </tr>

                                @php
                                $groupHeader = $hse->header->group_header
                                @endphp
                                @endforeach

                                <tr>
                                    <td colspan="4"></td>
                                    <td>
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Save</button>
                                    </td>
                                </tr>
                            </form>
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
            <!-- End Tabel  -->
        </div>

        <div class="col-md-12">
            <!-- Tabel Detail of Daily Operating Activies -->
            <div class="card mt-3">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="page-title">
                                Vessel Daily Engine Paramater Log
                            </h2>
                        </div>
                        <!-- End modal -->
                    </div>
                </div>
                @if($vdr)
                <div class="table-responsive">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th rowspan="2" class="text-center align-middle">No</th>
                                <th rowspan="2" class="text-center align-middle">Observed Data / Indicators </th>
                                <th rowspan="2" class="text-center align-middle">Unit</th>
                                <th colspan="6" class="text-center">Main Engines Data</th>
                                <th colspan="6" class="text-center">Aux. Engines Data</th>
                            </tr>
                            <tr>
                                <th>Ref. Value</th>
                                <th>Port</th>
                                <th>Stbd</th>
                                <th>Center</th>
                                <th>Other</th>
                                <th>Ref. Value</th>
                                <th>Port</th>
                                <th>Stbd</th>
                                <th>Other</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="{{route('vdr.update.engine')}}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="vdr_id" value="{{$vdr->id}}">
                                @foreach ($engines as $key => $engine)
                                <input type="hidden" name="id[]" value="{{$engine->id}}">
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td class="col-md-3">{{$engine->heading->description}}</td>
                                    <td>{{$engine->heading->unit}}</td>
                                    <td>
                                        <input class="form-control" type="number" min="0" name="m_ref[]" value="{{$engine->m_ref}}">
                                    </td>
                                    <td>
                                        <input class="form-control" type="number" min="0" name="m_port[]" value="{{$engine->m_port}}">
                                    </td>
                                    <td>
                                        <input class="form-control" type="number" min="0" name="m_stbd[]" value="{{$engine->m_stbd}}">
                                    </td>
                                    <td>
                                        <input class="form-control" type="number" min="0" name="m_center[]" value="{{$engine->m_center}}">
                                    </td>
                                    <td>
                                        <input class="form-control" type="number" min="0" name="m_other[]" value="{{$engine->m_other}}">
                                    </td>
                                    <td>
                                        <input class="form-control" type="number" min="0" name="a_ref[]" value="{{$engine->a_ref}}">
                                    </td>
                                    <td>
                                        <input class="form-control" type="number" min="0" name="a_port[]" value="{{$engine->a_port}}">
                                    </td>
                                    <td>
                                        <input class="form-control" type="number" min="0" name="a_stbd[]" value="{{$engine->a_stbd}}">
                                    </td>
                                    <td>
                                        <input class="form-control" type="number" min="0" name="a_other[]" value="{{$engine->a_other}}">
                                    </td>
                                </tr>
                                @endforeach

                                <tr>
                                    <td colspan="11"></td>
                                    <td>
                                        <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Save</button>
                                    </td>
                                </tr>
                            </form>
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
            <!-- End Tabel  -->
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


    // Fungsi untuk menghitung dan menampilkan nilai di kolom Closing
    function calculateClosing(id) {

        // Ambil nilai dari masing-masing input
        var opening = parseInt($("#opening-" + id).val()) || 0;
        var consumption = parseInt($("#consumption-" + id).val()) || 0;
        var received = parseInt($("#received-" + id).val()) || 0;
        var transferred = parseInt($("#transferred-" + id).val()) || 0;

        // Hitung nilai Closing berdasarkan rumus
        var closing = (opening + received) - (consumption + transferred);

        // Tampilkan hasil perhitungan di kolom Closing
        $(".closing").val(closing);
    }

    // Panggil fungsi ketika nilai input berubah
    // $(".hitung-closing").on("input", function() {
    //     var cargoId = $(".hitung-closing ").data("id");
    //     console.log(cargoId);
    //     calculateClosing();
    // });

    // function myFunction(id) {
    //     console.log("Nilai Input: " + inputValue); 
    // }

    // Panggil fungsi saat halaman dimuat
    // calculateClosing();
</script>
@endpush