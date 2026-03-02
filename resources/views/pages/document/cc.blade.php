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
  font-size: 10px
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
           Crew Change
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
   <div class="container-xl bg-white rounded">
      <div class="row border-bottom py-2 mb-2">
         <div class="col-12">
            <div class="d-flex justify-content-between">
               <div class="">
                  <small ><b>PERTAMINA HULU ENERGI OSES</b></small><br>
                  <small><b>PRODUCTION & OPERATION - MARINE TEAM</b></small>
               </div>
               <div class="text-center">
                  <h3>CREW CHANGE <span class="text-uppercase">{{$monthName}}</span> {{$year}}</h3>
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
            
            <table class="mt-2">
               <thead>
                  <tr>
                     <th rowspan="2">Day</th>
                     <th rowspan="2" class="">Date</th>
                     <th rowspan="2">Destination</th>
                     <th rowspan="2">Func</th>
                     <th rowspan="2" class="text-center">Pax <br> Onduty</th>
                     <th rowspan="2" class="text-center">Pax <br> Offduty</th>
                     <th rowspan="2">Boat</th>
                     <th rowspan="2" class="text-center">Cap. Pax</th>
                     <th colspan="2" class="text-center">Time of Movement</th>
                     <th rowspan="2">Remark</th>

                  </tr>
                  <tr>
                     <th class="text-center">Depart KJ4</th>
                     <th class="text-center">Arrived KJ4</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($schedules as $sche)
                     <tr>
                     <td><a href="{{route('schedule.detail', enkripRambo($sche->id))}}">{{formatDate($sche->date)}}</a></td>
                     <td>{{formatDayName($sche->date)}}</td>
                     <td>{{$sche->requests->first()->origin->name ?? ''}} -  {{$sche->requests->first()->destination->name ?? ''}}</td>
                     <td>{{$sche->description}}</td>
                     <td class="text-center">{{$sche->total_depart}}</td>
                     <td class="text-center">{{$sche->total_return}}</td>
                     <td>{{$sche->vessel->name ?? '-'}}</td>
                     <td class="text-center">150</td>
                     <td class="text-center">-</td>
                     <td class="text-center">-</td>
                     <td>-</td>
                     </tr>
               @endforeach
               </tbody>

            </table>
         </div>
      </div>
      
   </div>
</div>
@endsection