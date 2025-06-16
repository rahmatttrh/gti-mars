@extends('layouts.stisla.app-vdr')
@section('title')
   VDR Validation
@endsection
@section('content')
<section class="section">
   {{-- <div class="section-header">
      <h1 class="section-title">VDR History</h1>
      <div class="section-header-breadcrumb">
         <div class="breadcrumb-item "><a href="{{route('vdr.marine')}}">Dashboard</a></div>
         <div class="breadcrumb-item active">VDR History</div>
      </div>
   </div> --}}

   <div class="section-body">
      {{-- <h2 class="section-title">Schedule Plan</h2>
      <p class="section-lead">
         We use 'DataTables' made by @SpryMedia. You can check the full documentation <a href="https://datatables.net/">here</a>.
      </p> --}}

      <div class="table-responsive">
         <table class="table table-striped table-sm" id="table-1">
            <thead>
               <tr>
                  <th rowspan="2" class="text-center">No.</th>
                  <th rowspan="2">VDR Number</th>
                  {{-- <th rowspan="2">Vessel</th> --}}
                  <th rowspan="2">Date</th>
                  <th rowspan="2">Crew</th>
                  {{-- <th>Created</th> --}}
                  <th rowspan="2">Status</th>
                  <th colspan="2" class="text-center">High Speed Contract</th>
                  <th colspan="2" class="text-center">Normal Speed Contract</th>
                  <th colspan="2" class="text-center">Slow Speed Contract</th>
                  <th colspan="2" class="text-center">Total</th>
               </tr>
               <tr>
                  <th>Speed</th>
                  <th>Fuel</th>
                  <th>Speed</th>
                  <th>Fuel</th>
                  <th>Speed</th>
                  <th>Fuel</th>
                  <th>Time</th>
                  <th>Daily Fuel</th>
               </tr>
            </thead>
            <tbody>
               @foreach($vdrs as $vdr)
               <tr>
                  <td class="text-muted text-center"><small>{{++$i}}</small></td>
                  <td>
                     <a href="{{route('vdr.show', [enkripRambo( $vdr->id), enkripRambo('index')])}}">{{vdrId($vdr->id)}}</a> <br>
                     <small>{{$vdr->vessel->name}}</small>
                  </td>
                  {{-- <td>{{$vdr->vessel->name}}</td> --}}
                  <td>
                     {{formatDate($vdr->date)}} <br>
                     <small>{{formatDayName($vdr->date)}}</small>
                  </td>
                  <td>{{$vdr->crew_onduty}} / {{$vdr->crew_max}}</td>
                  {{-- <td>{{$vdr->created_by}}</td> --}}
                  <td>
                     {{-- @if(date('Y-m-d', strtotime($vdr->date)) == date('Y-m-d'))
                     <span class="badge badge-warning">Draft</span>
                     @else
                     <span class="badge badge-success">Release</span>
                     @endif --}}
                     <x-status-stisla.vdr :vdr="$vdr" />
                  </td>
                  
                  <td>{{$vdr->operatings->where('heading_id', 1)->first()->speed}}</td>
                  <td>{{$vdr->operatings->where('heading_id', 1)->first()->contractual_fuel}}</td>
                  <td>{{$vdr->operatings->where('heading_id', 2)->first()->speed}}</td>
                  <td>{{$vdr->operatings->where('heading_id', 2)->first()->contractual_fuel}}</td>
                  <td>{{$vdr->operatings->where('heading_id', 3)->first()->speed}}</td>
                  <td>{{$vdr->operatings->where('heading_id', 3)->first()->contractual_fuel}}</td>
                  <td>{{$vdr->getTotalHours()}}</td>
                  <td>{{ceil($vdr->operatings->sum('daily'))}}</td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</section>
    
@endsection