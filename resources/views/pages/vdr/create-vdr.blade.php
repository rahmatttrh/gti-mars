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
                <div class="table-responsive">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th>Name</th>
                                <th>Loc</th>
                                <th>Ekstensi</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{--
                                @foreach ($employees as $employee)
                                @if ($employee->id > 1)
                                <tr>
                                    <td class="text-center">{{++$i}}</td>
                            <td>
                                {{$employee->name}}
                            </td>
                            <td>{{$employee->port->name}}</td>
                            <td>{{$employee->ekstensi}}</td>
                            <td>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle btn btn-sm align-text-top" data-bs-toggle="dropdown">
                                        Option
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="{{route('employee.profile', enkripRambo($employee->id))}}">
                                            Detail
                                        </a>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalEditEmployee_{{$employee->id}}">
                                            Edit
                                        </a>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#deleteEmployee_{{$employee->id}}">
                                            Delete
                                        </a>
                                    </div>
                                </div>
                            </td>
                            </tr>
                            @endif


                            <x-modal.employee.delete :employee="$employee" />
                            <x-modal.employee.edit :employee="$employee" :departments="$departments" :ports="$ports" />
                            @endforeach
                            <tr>
                                <td colspan="6" class="p-4"></td>
                            </tr>
                            <tr>
                                <td colspan="6" class="p-4"></td>
                            </tr>
                            --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection