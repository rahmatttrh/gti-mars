@extends('layouts.stisla.app-vdr')
@section('title')
    VDR History
@endsection
@section('content')
<section class="section">
    <div class="section-header">
      <h1 class="section-title">VDR History</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item "><a href="{{route('vdr.vessel')}}">Dashboard</a></div>
        <div class="breadcrumb-item active">VDR History</div>
      </div>
    </div>

    <div class="section-body">
      {{-- <h2 class="section-title">Schedule Plan</h2>
      <p class="section-lead">
        We use 'DataTables' made by @SpryMedia. You can check the full documentation <a href="https://datatables.net/">here</a>.
      </p> --}}

      <div class="row">
        <div class="col-12">
          <div class="card">
            {{-- <div class="card-header">
              <h4>Basic DataTables</h4>
            </div> --}}
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-striped table-sm" id="table-1">
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
      </div>
    </div>
  </section>
    
@endsection