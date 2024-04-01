@extends('layouts.app-doc')
@section('title')
   Intermilan
@endsection
@section('content')
<style>
   html { -webkit-print-color-adjust: exact; }
   table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding-left: 5px;
}

table td, table th {
  font-size: 11px
}

/* .ttd {
   font-size: 10px;
}

table td {
  font-size: 10px
}

.title {
  font-size: 11px
} */

table {
   width: 100%;
}

</style>
<div class="container-xl">
   <!-- Page title -->
   <div class="page-header d-print-none">
     <div class="row align-items-center">
       <div class="col">
         <h2 class="page-title">
           Timeline
         </h2>
       </div>
       <!-- Page title actions -->
       <div class="col-auto ms-auto d-print-none">
         <button type="button" class="btn btn-primary" onclick="javascript:window.print();">
           <!-- Download SVG icon from http://tabler-icons.io/i/printer -->
           <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" /><path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" /><rect x="7" y="13" width="10" height="8" rx="2" /></svg>
           Print
         </button>
       </div>
     </div>
   </div>
 </div>
 <div class="page-body" >
   <div class="container-xl">
      <div class="card">
         <div class="card-body">
            <div class="col-12">
               <div class="d-flex justify-content-between">
                  {{-- <div class="">
                     <small ><b>PERTAMINA HULU ENERGI OSES</b></small><br>
                     <small><b>PRODUCTION & OPERATION - MARINE TEAM</b></small>
                  </div> --}}
                  <div class="">
                     <span>TIMELINE ACTIVITY<span class="text-uppercase"></span></span>
                     <h1>{{$schedule->vessel->name}}</h1>
                  </div>
                  <div>
                     <img src="{{asset('img/logo/phe-oses.png')}}"  alt="DSP-PHE" class="navbar-brand-image">
                  </div>
               </div>
            </div>
            <div class="col-12">
               {{-- <div class="text-center border-bottom mb-2">
                  <h3>MONTHLY INTEGRATED BOAT PLANNING <span class="text-uppercase">{{$monthName}}</span></h3>
               </div> --}}
               
               <table class="table mt-2">
                  <thead>
                     <tr>
                        <th colspan="5">{{formatDate($schedule->date)}}</th>
                     </tr>
                     <tr>
                        <th colspan="5">{{$schedule->code}}</th>
                     </tr>
                     <tr>
                        <th class="">Activity</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Time</th>
                        <th class="text-center">ETA</th>
                        <th>Destination</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($reports as $report)
                         <tr>
                           <td>
                              {{$report->status->name}}
                              @if ($report->status_id == 6)
                                  / Departure
                              @endif

                              {{$report->port->name ?? ''}}
                           </td>
                           <td class="text-center">{{formatDayname($report->created_at)}}, {{formatDate($report->created_at)}}</td>
                           <td class="text-center"> {{formatTime($report->created_at)}}</td>
                           <td class="text-center">
                              @if ($report->status_id == 6)
                                 {{formatDateTime($report->eta)}}
                              @endif
                           </td>
                           <td>
                              @if ($report->status_id == 6)
                              {{$report->destination->name}}
                              @endif
                           </td>
                         </tr>
                     @endforeach
                  </tbody>
   
               </table>

               {{-- <table class="table mt-2">
                  <thead>
                     
                     <tr>
                        <th class="">Activity</th>
                        <th class="text-center">Time</th>
                        <th>Description</th>
                        
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($requests as $req)
                         <tr>
                           <td>{{$req->desc}}</td>
                         </tr>
                     @endforeach
                  </tbody>
   
               </table> --}}
            </div>
         </div>
      </div>
   </div>
</div>
@endsection