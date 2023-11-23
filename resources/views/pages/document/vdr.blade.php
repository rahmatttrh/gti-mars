@extends('layouts.app')
@section('title')
   Preview VDR
@endsection
@section('content')
<div class="container-xl">
   <!-- Page title -->
   <div class="page-header d-print-none">
     <div class="row align-items-center">
       <div class="col">
         <h2 class="page-title">
           VDR
         </h2>
       </div>
       <!-- Page title actions -->
       <div class="col-auto ms-auto d-print-none">
         <button type="button" class="btn btn-primary" onclick="javascript:window.print();">
           <!-- Download SVG icon from http://tabler-icons.io/i/printer -->
           <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" /><path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" /><rect x="7" y="13" width="10" height="8" rx="2" /></svg>
           Print VDR
         </button>
       </div>
     </div>
   </div>
 </div>
<div class="page-body" >
   <div class="container-xl">
      <div class="card card-lg">
         <div class="card-body">
            <div class="row border-bottom mb-4">
               <div class="col-md-12">
                  <small>PERTAMINA HULU ENERGI OSES</small><br>
                  <small>PRODUCTION & OPERATION - MARINE TEAM</small>
               </div>
               <div class="col-12">
                  <h1 class="text-primary border-bottom pb-2 mt-2">VESSEL DAILY REPORT                   <span>(Every Midnight)</spann></h1>

                  <p class="h3 mt-4">GENERAL INFORMATION</p>
               </div>
               <div class="col-6">

                  <dl class="row">
                     <dd class="col-3">Date</dd>
                     <dd class="col-9">: {{\Carbon\Carbon::parse($vdr->date)->format('d/m/Y')}}</dd>
                     <dd class="col-3">Vessel</dd>
                     <dd class="col-9">: {{$vdr->vessel->name}}</dd>
                     <dd class="col-3">Contract</dd>
                     <dd class="col-9">:  {{$vdr->vessel->contract_no}}</dd>
                     <dd class="col-3">Contract Period</dd>
                     <dd class="col-9">:  {{\Carbon\Carbon::parse($vdr->vessel->contract_start)->format('d/m/Y')}} - {{\Carbon\Carbon::parse($vdr->vessel->contract_end)->format('d/m/Y')}}</dd>
                     
                  </dl>
               </div>
               <div class="col-6">
                  {{-- <p class="h3">DETAIL</p> --}}
                  <dl class="row">
                     <dd class="col-4">Location</dd>
                     <dd class="col-8">: {{$vdr->loc->name}}</dd>
                     <dd class="col-4">Owner</dd>
                     <dd class="col-8">: {{$vdr->vessel->owner}}</dd>
                     <dd class="col-4">Master</dd>
                     <dd class="col-8">:  {{$vdr->vessel->master}}</dd>
                     <dd class="col-4 text-truncate">Number of Crew</dd>
                     <dd class="col-8">:  {{$vdr->crew_onduty}} / {{$vdr->crew_max}}</dd>
                     
                  </dl>
               </div>

               <p class="h3 mt-4">DETAIL OF DAILY OPERATIONAL ACTIVITY</p>
               <table class="table table-transparent table-responsive">
                  <thead>
                     <tr>
                        <th colspan="2" class="text-center">TIME</th>
                        <th colspan="8" class="text-center">Operation Mode Duration (hh::mm)- <br> Except Maintenance & Downtime</th>
                        <th rowspan="2" class="text-center align-middle">ACTIVITIES</th>
                     </tr>
                     <tr>
                        <th>Start</th>
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
                     @foreach ($vdrActivities as $vdrActivity)
                     <tr>
                        <td>{{$vdrActivity->start}}</td>
                        <td>{{$vdrActivity->finish}}</td>
                        <td>{{$vdrActivity->high}}</td>
                        <td>{{$vdrActivity->normal}}</td>
                        <td>{{$vdrActivity->slow}}</td>
                        <td>{{$vdrActivity->manu}}</td>
                        <td>{{$vdrActivity->idle}}</td>
                        <td>{{$vdrActivity->tow}}</td>
                        <td>{{$vdrActivity->ah}}</td>
                        <td>{{$vdrActivity->sb}}</td>
                        <td>{{$vdrActivity->activity}}</td>
                     </tr>
                     @endforeach
                  </tbody>
                  
               </table>
               

               <p class="h3 mt-4">SUMMARY OF DAILY FUEL, WATER and CARGOES REMAINING ONBOARD</p>
               <table class="table table-transparent table-responsive">
                  <thead>
                     {{-- <tr>
                        <th colspan="2" class="text-center">TIME</th>
                        <th colspan="8" class="text-center">Operation Mode Duration (hh::mm)- <br> Except Maintenance & Downtime</th>
                        <th rowspan="2" class="text-center align-middle">ACTIVITIES</th>
                     </tr> --}}
                     <tr>
                        <th>Type</th>
                        <th class="text-truncate">OPENING 
                           (ROB FROM PREVIOUS DAY)</th>
                        <th>CONSUMPTION 
                           (BASED ON ACTUAL SOUNDING)</th>
                        <th>RECEIVED</th>
                        <th>TRANSFERRED</th>
                        <th>CLOSING</th>
                        <th>REMARKS</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($vdrCargos as $vdrCargo)
                     <tr>
                        <td>{{$vdrCargo->heading->description}}</td>
                        <td>{{$vdrCargo->opening}}</td>
                        <td>{{$vdrCargo->consumption}}</td>
                        <td>{{$vdrCargo->received}}</td>
                        <td>{{$vdrCargo->transferred}}</td>
                        <td>{{$vdrCargo->closing}}</td>
                        <td>{{$vdrCargo->remark}}</td>
                     </tr>
                     @endforeach
                  </tbody>
                  
               </table>

              
            
            
               <p class="text-muted text-center mt-5">Thank you very much for doing business with us. We look forward to working with
               you again!</p>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection