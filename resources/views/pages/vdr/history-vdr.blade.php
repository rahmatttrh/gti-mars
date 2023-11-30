@extends('layouts.app')
@section('title')
History Sailing Order
@endsection
@section('content')
<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">
                    Overview
                </div>
                <h2 class="page-title">
                    HISTORY VESSEL DAILY REPORT &nbsp; <span class="text-uppercase text-info"> </span>
                </h2>
            </div>

        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="table-responsive">
                <table id="" class="table ">
                    <thead>
                        <tr>
                            <th class="text-center">No.</th>
                            <th>VDR Number</th>
                            <th>Vessel</th>
                            <th>Date</th>
                            <th>Crew</th>
                            <th>Created</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($vdrs as $vdr)
                        <tr>
                            <td class="text-muted text-center"><small>{{++$i}}</small></td>
                            <td>
                                <a href="{{route('vdr.show', $vdr->id)}}">{{vdrId($vdr->id)}}</a>

                            </td>
                            <td>{{$vdr->vessel->name}}</td>
                            <td>{{dayDate($vdr->date)}}</td>
                            <td>{{$vdr->crew_onduty}} / {{$vdr->crew_max}}</td>
                            <td>{{$vdr->created_by}}</td>
                            <td>
                                @if(date('Y-m-d', strtotime($vdr->date)) == date('Y-m-d'))
                                <span class="badge badge-warning">Draft</span>
                                @else
                                <span class="badge badge-success">Release</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- <x-modal.add-schedule :vessels="$vessels" :ports="$ports" :type="$type" /> --}}
{{-- <x-modal.select-month /> --}}
@endsection