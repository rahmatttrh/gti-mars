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
                        <dd class="col-7">{{dayDate($vdr->date)}}</dd>
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



            </div>

            <!-- Tabel Detail of Daily Operating Activies -->
            <div class="card mt-3">
                <div class="card-header bg-primary ">
                    <div class="row align-items-center">
                        <div class="col">
                            <h2 class="page-title text-white">
                                CREW & PASSENGER LIST
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
                                <th colspan="4" class="text-center">CREW</th>
                            </tr>
                            <tr>
                                <th>No</th>
                                <th class="col-md-">Name</th>
                                <th class="text-center">Ranks</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $thisC = 1;
                            @endphp

                            @foreach ($crews as $key => $crew)

                            @if($thisC != $crew->is_crew)
                            <thead>
                                <tr>
                                    <th colspan="4" class="text-center">PASSENGER</th>
                                </tr>
                                <tr>
                                    <th>No</th>
                                    <th class="col-md-">Name</th>
                                    <th class="text-center">Company</th>
                                </tr>
                            </thead>
                            @endif


                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$crew->name}}</td>
                                @if($crew->is_crew == '1')
                                <td class="text-center">{{$crew->rank}}</td>
                                @else
                                <td>{{$crew->company}}</td>
                                @endif
                            </tr>

                            @php
                            $thisC = $crew->is_crew;
                            @endphp



                            @endforeach

                            @if($crews->count() < 10) @for($i=0; $i <=20 - $crews->count(); $i++ )
                                <tr>
                                    <td colspan="4"></td>
                                </tr>
                                @endfor
                                @endif



                        </tbody>
                    </table>
                </div>
                @endif
            </div>
            <!-- End Tabel  -->
            @else
            <div class="card">
                <div class="card-header">
                    Form Create VDR
                </div>
                <form action="{{route('vdr.store')}}" method="POST">
                    @csrf
                    <input readonly type="hidden" name="vessel_id" value="{{$vessel->id}}" id="">
                    <input readonly type="hidden" name="created_by" value="{{$user->name}}">
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
                            <input readonly type="text" required class="form-control" id="vessel" name="vessel" value="{{$user->name}}" readonly>
                            <label for="vessel">Vessel</label>
                            @error('vessel')
                            <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input readonly type="date" required class="form-control" id="date" name="date" value="{{ old('date') ?: date('Y-m-d') }}" readonly>
                            <label for="date">Date</label>
                            @error('date')
                            <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="row">
                            <label for="email">Number of Crew / Pax</label>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input readonly type="number" required class="form-control" id="onduty" name="onduty" value="1">
                                    <label for="onduty">On Duty</label>
                                    @error('onduty')
                                    <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input readonly type="number" required class="form-control" id="max" name="max" value="20">
                                    <label for="max">Max</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input readonly type="text" required class="form-control" id="location_midnight" name="location_midnight" value="">
                            <label for=" location_midnight">Location (Midnight)</label>
                            @error('location_midnight')
                            <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>


                    <div class="card-footer">
                        <!-- <small>Hint : after the data is stored, the user will receive a notification email containing instructions to Sign In into system</small> -->
                    </div>

                </form>
            </div>
            @endif


        </div>
        <div class="col-md-8 ">
            <!-- Tabel Weathers-->
            <div class="card ">
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
                                <th class="text-center col-md-4">Weather / Time</th>
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
                                <input readonly type="hidden" name="vdr_id" value="{{$vdr->id}}">
                                <input readonly type="hidden" name="id[]" value="{{$weather->id}}">
                                <tr>
                                    <td>{{$weather->heading->description}}</td>
                                    <td>
                                        <input readonly type="text" class="form-control" name="t_0006[]" value="{{ $weather->t_0006  }}">
                                    </td>
                                    <td>
                                        <input readonly type="text" class="form-control" name="t_0612[]" value="{{ $weather->t_0612  }}">
                                    </td>
                                    <td>
                                        <input readonly type="text" class="form-control" name="t_1218[]" value="{{ $weather->t_1218  }}">
                                    </td>
                                    <td>
                                        <input readonly type="text" class="form-control" name="t_1824[]" value="{{ $weather->t_1824  }}">
                                    </td>
                                </tr>

                                @endforeach
                            </form>
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
            <!-- End Tabel  -->
            <!-- Tabel Detail of Daily Operating Activies -->
            <div class="card mt-3">
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
                                <input readonly type="hidden" name="vdr_id" value="{{$vdr->id}}">
                                @foreach ($cargos as $cargo)
                                <tr>
                                    <!-- <td> -->
                                    <input readonly type="hidden" name="id[]" value="{{$cargo->id}}">
                                    <!-- </td> -->
                                    <td> {{$cargo->heading->description}} </td>
                                    <td class="text-right align-middle">
                                        <input readonly type="number" name="opening[]" class="form-control" value="{{$cargo->opening}}">
                                    </td>
                                    <td class="text-left align-middle">
                                        <input readonly type="number" name="consumption[]" class="form-control" value="{{$cargo->consumption}}">
                                    </td>
                                    <td class="text-left align-middle">
                                        <input readonly type="number" name="received[]" class="form-control" value="{{$cargo->received}}">
                                    </td>
                                    <td class="text-left align-middle">
                                        <input readonly type="number" name="transferred[]" class="form-control" value="{{$cargo->transferred}}">
                                    </td>
                                    <td class="text-left align-middle">
                                        <input readonly type="text" name="closing[]" readonly class="form-control" value="{{$cargo->closing}}">
                                    </td>
                                    <td class="text-left align-middle">
                                        <input readonly type="text" name="remarks[]" class="form-control" value="{{$cargo->remarks}}">
                                    </td>
                                </tr>



                                @endforeach

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

                                <input readonly type="hidden" name="vdr_id" value="{{$vdr->id}}">
                                @php
                                $groupHeader = 'A';
                                $no = 1;
                                @endphp

                                @foreach ($hses as $hse)
                                <input readonly type="hidden" name="id[]" value="{{$hse->id}}">
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
                                        <input readonly type="number" name="previous[]" class="form-control" value="{{$hse->previous}}">
                                    </td>
                                    <td>
                                        <input readonly type="number" name="today[]" class="form-control" value="{{$hse->today}}">
                                    </td>
                                    <td>
                                        <input readonly type="text" name="monthly[]" class="form-control" value="{{$hse->previous + $hse->today}}" readonly>
                                    </td>
                                    @else
                                    <input readonly type="hidden" name="previous[]" class="form-control" value="{{$hse->previous}}">
                                    <input readonly type="hidden" name="today[]" class="form-control" value="{{$hse->today}}">
                                    <input readonly type="hidden" name="monthly[]" class="form-control" value="{{$hse->today}}" readonly>
                                    <td colspan="3"></td>
                                    @endif
                                </tr>

                                @php
                                $groupHeader = $hse->header->group_header
                                @endphp
                                @endforeach

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
                                <input readonly type="hidden" name="vdr_id" value="{{$vdr->id}}">
                                @foreach ($engines as $key => $engine)
                                <input readonly type="hidden" name="id[]" value="{{$engine->id}}">
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td class="col-md-3">{{$engine->heading->description}}</td>
                                    <td>{{$engine->heading->unit}}</td>
                                    <td>
                                        <input readonly class="form-control" type="number" min="0" name="m_ref[]" value="{{$engine->m_ref}}">
                                    </td>
                                    <td>
                                        <input readonly class="form-control" type="number" min="0" name="m_port[]" value="{{$engine->m_port}}">
                                    </td>
                                    <td>
                                        <input readonly class="form-control" type="number" min="0" name="m_stbd[]" value="{{$engine->m_stbd}}">
                                    </td>
                                    <td>
                                        <input readonly class="form-control" type="number" min="0" name="m_center[]" value="{{$engine->m_center}}">
                                    </td>
                                    <td>
                                        <input readonly class="form-control" type="number" min="0" name="m_other[]" value="{{$engine->m_other}}">
                                    </td>
                                    <td>
                                        <input readonly class="form-control" type="number" min="0" name="a_ref[]" value="{{$engine->a_ref}}">
                                    </td>
                                    <td>
                                        <input readonly class="form-control" type="number" min="0" name="a_port[]" value="{{$engine->a_port}}">
                                    </td>
                                    <td>
                                        <input readonly class="form-control" type="number" min="0" name="a_stbd[]" value="{{$engine->a_stbd}}">
                                    </td>
                                    <td>
                                        <input readonly class="form-control" type="number" min="0" name="a_other[]" value="{{$engine->a_other}}">
                                    </td>
                                </tr>
                                @endforeach

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


@endsection

@push('get_schedules')
<script>
    $('.box-rank').hide();
    $('.box-company').hide();


    $(".waktu").on("input readonly", function() {
        // Mengambil nilai dari input readonly
        var input readonlyValue = $(this).val();

        // Validasi hanya angka dan maksimal dua digit di belakang koma
        var regex = /^\d{0,2}(\.\d{0,2})?$/;

        if (!regex.test(input readonlyValue)) {
            alert("Input tidak valid. Hanya angka dengan maksimal dua digit di belakang koma.");
            // Mengosongkan nilai input readonly jika tidak valid
            $(this).val("");
            return;
        }

        // Konversi nilai input readonly menjadi float
        var floatValue = parseFloat(input readonlyValue);

        // Paksa nilai desimal menjadi 59 jika lebih besar dari 59
        if (floatValue > 59) {
            floatValue = 59;
        }

        //  Mengambil nilai di belakang koma
        var nilaiDiBelakangKoma = (floatValue % 1).toFixed(2);

        if (nilaiDiBelakangKoma > 0.59) {
            alert("Input tidak valid. Maksimal desimal 59.");
            // Mengosongkan nilai input readonly jika tidak valid
            $(this).val("");
        }

        // Validasi maksimal 24.00
        if (floatValue > 24) {
            alert("Input tidak valid. Maksimal 24.00.");
            // Mengosongkan nilai input readonly jika tidak valid
            $(this).val("");
        }
    });


    // Fungsi untuk menghitung dan menampilkan nilai di kolom Closing
    function calculateClosing(id) {

        // Ambil nilai dari masing-masing input readonly
        var opening = parseInt($("#opening-" + id).val()) || 0;
        var consumption = parseInt($("#consumption-" + id).val()) || 0;
        var received = parseInt($("#received-" + id).val()) || 0;
        var transferred = parseInt($("#transferred-" + id).val()) || 0;

        // Hitung nilai Closing berdasarkan rumus
        var closing = (opening + received) - (consumption + transferred);

        // Tampilkan hasil perhitungan di kolom Closing
        $(".closing").val(closing);
    }

    // Panggil fungsi ketika nilai input readonly berubah
    // $(".hitung-closing").on("input readonly", function() {
    //     var cargoId = $(".hitung-closing ").data("id");
    //     console.log(cargoId);
    //     calculateClosing();
    // });

    // function myFunction(id) {
    //     console.log("Nilai Input: " + input readonlyValue); 
    // }

    // Panggil fungsi saat halaman dimuat
    // calculateClosing();
    $("input readonly[name='is_crew']").change(function() {
        if ($(this).is(":checked")) {
            // Radio button dicentang
            var selectedValue = $(this).val();
            console.log("Selected Option: " + selectedValue);

            visibilityBox(selectedValue);
            // if (selectedValue == '1') {
            //     $('#box-rank').show();
            //     $('#box-company').hide();
            // } else {
            //     $('#box-rank').hide();
            //     $('#box-company').show();
            // }
        }
    });

    function visibilityBox(value) {
        if (value == '1') {
            $('.box-rank').show();
            $('.box-company').hide();

            $(".crew").prop("checked", true);
            $(".passenger").prop("checked", false);
        } else {
            $('.box-rank').hide();
            $('.box-company').show();

            $(".crew").prop("checked", false);
            $(".passenger").prop("checked", true);
        }
    }
</script>
@endpush