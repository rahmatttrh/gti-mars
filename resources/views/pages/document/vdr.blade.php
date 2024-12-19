@extends('layouts.app-doc')
@section('title')
   VDR - Preview {{$vdr->code}}
@endsection
@section('content')
<style>

 html { -webkit-print-color-adjust: exact; }
   table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}

.ttd {
   font-size: 9px;
}

table td {
  font-size: 7px
}

.title {
  font-size: 7px;
  font-weight: bold;
}

table th {
   font-weight: bold;
}

table {
   width: 100%;
}

.bg-yellow {
   background-color: rgb(247, 247, 183)
}

</style>
<div class="container-xl">
   <!-- Page title -->
   <div class="page-header d-print-none">
      <div class="row align-items-center">
         <div class="col">
            <h2 class="page-title">
            Vessel Daily Report [{{$vdr->code}}]
            </h2>
         </div>
         <!-- Page title actions -->
         <div class="col-auto ms-auto d-print-none">
            <button type="button" class="btn btn-light" onclick="javascript:window.print();">
            <!-- Download SVG icon from http://tabler-icons.io/i/printer -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" /><path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" /><rect x="7" y="13" width="10" height="8" rx="2" /></svg>
            Print VDR
            </button>
         </div>
      </div>
   </div>
</div>
<div class="page-body" >
   <div class="container-xl bg-white rounded">
      <div class="row border-bottom pt-1 mb-2">
         <div class="col-12">
            <div class="d-flex justify-content-between">
               <div class="">
                  <small ><b>PERTAMINA HULU ENERGI OSES</b></small><br>
                  <small><b>PRODUCTION & OPERATION - MARINE TEAM</b></small>
               </div>
               <div class="text-center">
                  <small><b>VESSEL DAILY REPORT</b></small><br>
                  <small>(Every Midnight)</small>
               </div>
               <div>
                  <img src="{{asset('img/logo/phe-oses.png')}}"  alt="DSP-PHE" class="navbar-brand-image">
               </div>
            </div>
         </div>
        
         {{-- <div class="col-6">

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
            <dl class="row">
               <dd class="col-4">Location</dd>
               <dd class="col-8">: {{$vdr->location_midnight}}</dd>
               <dd class="col-4">Owner</dd>
               <dd class="col-8">: {{$vdr->vessel->owner}}</dd>
               <dd class="col-4">Master</dd>
               <dd class="col-8">:  {{$vdr->vessel->master}}</dd>
               <dd class="col-4 text-truncate">Number of Crew</dd>
               <dd class="col-8">:  {{$vdr->crew_onduty}} / {{$vdr->crew_max}}</dd>
               
            </dl>
         </div> --}}


         
      </div>

      <div class="row">
         <div class="col-5">
            <small class="title mt-4">GENERAL INFORMATION</small>
            <table class="">
               <tbody>
                  <tr>
                     <td><small>Date</small></td>
                     <td class="bg-yellow"><small>{{\Carbon\Carbon::parse($vdr->date)->format('d/m/Y')}}</small></td>
                     <td><small>Location</small></td>
                     <td class="bg-yellow"><small>{{$vdr->location_midnight}}</small></td>
                  </tr>
                  <tr>
                     <td><small>Vessel Name</small></td>
                     <td class="bg-yellow"><small>{{$vdr->vessel->name}}</small></td>
                     <td><small>Owner Opt</small></td>
                     <td class="bg-yellow"><small>{{$vdr->vessel->owner ?? '-'}}</small></td>
                  </tr>
                  <tr>
                     <td><small>Contract No.</small></td>
                     <td class="bg-yellow"><small>{{$vdr->vessel->contract_no ?? '-'}}</small></td>
                     <td><small>Master Name</small></td>
                     <td class="bg-yellow"><small>{{$vdr->vessel->master ?? '-'}}</small></td>
                  </tr>
                  <tr>
                     <td><small>Contract Periode</small></td>
                     <td class="bg-yellow"><small>{{\Carbon\Carbon::parse($vdr->vessel->contract_start)->format('d/m/Y')}} - {{\Carbon\Carbon::parse($vdr->vessel->contract_end)->format('d/m/Y')}}</small></td>
                     <td><small>Number of Crew/Pax</small></td>
                     <td class="bg-yellow"><small>{{$vdr->crew_onduty}} / {{$vdr->crew_max}}</small></td>
                  </tr>
               </tbody>
               
            </table>
            
            <small class="title">WEATHER CONDITION</small>
            <table class="mb-1">
               <thead>
                  <tr>
                     <td class="title">Wheather</td>
                     <td class="text-center title">00 - 06</td>
                     <td class="text-center title">06 - 12</td>
                     <td class="text-center title">12 - 18</td>
                     <td class="text-center title">18 - 24</td>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($vdrWheathers as $vdrWheather)
                  <tr>
                     <td><small>{{$vdrWheather->heading->description}}</small></td>
                     <td class="text-center bg-yellow"><small>{{$vdrWheather->t_0006}}</small></td>
                     <td class="text-center bg-yellow"><small>{{ $vdrWheather->t_0612  }}</small></td>
                     <td class="text-center bg-yellow"><small>{{$vdrWheather->t_1218}}</small></td>
                     <td class="text-center bg-yellow"><small>{{$vdrWheather->t_1824}}</small></td>
                  </tr>
                  @endforeach
               </tbody>
               
            </table>

            <small class="title">HSSE</small>
            <table class="">
               <thead>
                  <tr>
                     <td class="text-center title">A</td>
                     <td class="title">HSSE STATISTICS (INPUT)</td>
                     <td class="text-center title">Previous</td>
                     <td class="text-center title">Today</td>
                     <td class="text-center title">Monthly</td>
                  </tr>
               </thead>
               <tbody>
                  @php
                  $groupHeader = 'A';
                  $no = 1;
                  @endphp
         
                        @foreach ($hses as $hse)
                        <input type="hidden" name="id[]" value="{{$hse->id}}">
                        @if($hse->header->group_header != $groupHeader)
                        <thead>
                           <tr>
                                 <td class="text-center title">B</td>
                                 <td class="title">HSSE STATISTICS (Output)</td>
                                 <td class="text-center title">Previous</td>
                                 <td class="text-center title">Today</td>
                                 <td class="text-center title">Monthly</td>
                           </tr>
                        </thead>
         
                        @php
                        $no = 1;
                        @endphp
         
                        @endif
                        <tr>
                           <td class="text-center "><small>{{ $no++}}</small></td>
                           <td><small>{{$hse->header->description}}</small></td>
                           @if($hse->header_id != 8)
                           <td class="text-center bg-yellow">
                              <small>{{$hse->previous}}</small>
                           </td>
                           <td class="text-center bg-yellow">
                              <small>{{$hse->today}}</small>
                           </td>
                           <td class="text-center bg-yellow">
                              <small>{{$hse->previous + $hse->today}}</small>
                           </td>
                           @else
                           
                           <td colspan="3"></td>
                           @endif
                        </tr>
         
                        @php
                        $groupHeader = $hse->header->group_header
                        @endphp
                        @endforeach
         
               
                     
               </tbody>
            </table>

            
         </div>
         <div class="col-7">
            <small class="title">DETAIL OF DAILY OPERATIONAL ACTIVITY</small>
            <table class="" style="width: 100%">
               <thead>
                  <tr>
                     <td colspan="2" class="text-center title">TIME</td>
                     <td colspan="8" class="text-center title">Operation Mode Duration (hh::mm)- <br> Except Maintenance & Downtime</td>
                     <td rowspan="2" class="text-center align-middle title">ACTIVITIES</td>
                  </tr>
                  <tr>
                     <td class="text-center">Start 
                        {{-- @if (count($vdrActivities) <= 22)
                        Kurang dari 22
                           @else
                           lebih dari 22
                        @endif --}}
                     </td>
                     <td class="text-center">Finish</td>
                     <td class="text-center">High</td>
                     <td class="text-center">Normal</td>
                     <td class="text-center">Slow</td>
                     <td class="text-center">Manu</td>
                     <td class="text-center">Idle</td>
                     <td class="text-center">Tow</td>
                     <td class="text-center">A/H</td>
                     <td class="text-center">S/B</td>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($vdrActivities as $vdrActivity)
                  <tr>
                     <td class="text-center bg-yellow"><small>{{$vdrActivity->start}}</small></td>
                     <td class="text-center bg-yellow"><small>{{$vdrActivity->finish}}</small></td>
                     <td class="text-center bg-yellow"><small>{{$vdrActivity->high}}</small></td>
                     <td class="text-center bg-yellow"><small>{{$vdrActivity->normal}}</small></td>
                     <td class="text-center bg-yellow"><small>{{$vdrActivity->slow}}</small></td>
                     <td class="text-center bg-yellow"><small>{{$vdrActivity->manu}}</small></td>
                     <td class="text-center bg-yellow"><small>{{$vdrActivity->idle}}</small></td>
                     <td class="text-center bg-yellow"><small>{{$vdrActivity->tow}}</small></td>
                     <td class="text-center bg-yellow"><small>{{$vdrActivity->ah}}</small></td>
                     <td class="text-center bg-yellow"><small>{{$vdrActivity->sb}}</small></td>
                     <td class="bg-yellow"><small>{{$vdrActivity->activity}}</small></td>
                  </tr>
                  
                  

                  
                  @endforeach
                  @if (count($vdrActivities) == 0)
                     @for ($i = 0; $i < 23; $i++)
                        <tr>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow">-</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 1)
                     @for ($i = 0; $i < 22; $i++)
                        <tr>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow">-</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 2)
                     @for ($i = 0; $i < 21; $i++)
                        <tr>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow">-</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 3)
                     @for ($i = 0; $i < 20; $i++)
                        <tr>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow">-</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 4)
                     @for ($i = 0; $i < 19; $i++)
                        <tr>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow">-</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 5)
                     @for ($i = 0; $i < 18; $i++)
                        <tr>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow">-</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 6)
                     @for ($i = 0; $i < 17; $i++)
                        <tr>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow">-</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 7)
                     @for ($i = 0; $i < 16; $i++)
                        <tr>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow">-</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 8)
                     @for ($i = 0; $i < 15; $i++)
                        <tr>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow">-</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 9)
                     @for ($i = 0; $i < 14; $i++)
                        <tr>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow">-</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 10)
                     @for ($i = 0; $i < 13; $i++)
                        <tr>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow">-</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 11)
                     @for ($i = 0; $i < 12; $i++)
                        <tr>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow">-</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 12)
                     @for ($i = 0; $i < 11; $i++)
                        <tr>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow">-</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 13)
                     @for ($i = 0; $i < 10; $i++)
                        <tr>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow">-</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 14)
                     @for ($i = 0; $i < 9; $i++)
                        <tr>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow">-</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 15)
                     @for ($i = 0; $i < 8; $i++)
                        <tr>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow">-</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 16)
                     @for ($i = 0; $i < 7; $i++)
                        <tr>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow">-</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 17)
                     @for ($i = 0; $i < 6; $i++)
                        <tr>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow">-</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 18)
                     @for ($i = 0; $i < 5; $i++)
                        <tr>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow">-</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 19)
                     @for ($i = 0; $i < 4; $i++)
                        <tr>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow">-</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 20)
                     @for ($i = 0; $i < 3; $i++)
                        <tr>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow">-</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 21)
                     @for ($i = 0; $i < 2; $i++)
                        <tr>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow">-</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 22)
                     @for ($i = 0; $i < 1; $i++)
                        <tr>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow"></td>
                           <td class="bg-yellow">-</td>
                        </tr>
                     @endfor
                  @endif
               </tbody>
               
            </table>
         </div>
      </div>

      <div class="row">
         <div class="col-4">
            <small class="title">SUMMARY OF DAILY OPERATING DATA</small>
            <table class="mb-1">
               <thead>
                  <tr class="text-center ">
                     <td class="title">Operating Mode</td>
                     <td class="title">Total Time</td>
                     <td class="title">Min. Speed as Contract (Knots) <br> </td>
                     <td class="title">Contractual Fuel Cons. </td>
                     <td class="title">Daily Fuel Cons. </td>
                  </tr>
               </thead>
               <tbody>
                  
                     @foreach ($operatings as $operating)
                     @if($operating->heading->daily == '1')
                        
                           <input type="text" hidden readonly disabled name="daily[]"  value="{{round($operating->daily)}}">
                           
                        
                     @else
                        <input type="hidden" hidden readonly disabled name="daily[]"  value="{{$operating->daily}}">
                     @endif
                     <tr id="baris-{{$operating->id}}">
                       
                        <td> <small>{{$operating->heading->description}} </small></td>
                        <td class="text-center">
                           <small>{{$operating->time}}</small>
                        </td>
                        <td class="text-center bg-yellow">
                           @if($operating->heading->speed == '1')
                           <small>{{$operating->speed}}</small>
                           @else
                           <small>{{$operating->speed}}</small>
                           @endif
                        </td>
   
                        <td class="text-center bg-yellow">
                              @if($operating->heading->contractual == '1')
                              <small>{{$operating->contractual_fuel}}</small>
                              @else
                              <small>{{$operating->contractual_fuel}}</small>
                              @endif
                        </td>
                        <td class="text-center">
   
   
                              @if($operating->heading->daily == '1')
                              <small>{{round($operating->daily)}}</small>
                              {{-- <div class="input-group ">
                                 <input type="text" readonly disabled name="daily[]"  value="{{round($operating->daily)}}">
                                 
                              </div> --}}
                              @else
                              <small>{{$operating->daily}}</small>
                              @endif
                        </td>
                     </tr>
                     @endforeach
                     <tr>
                        <td>Total Daily</td>
                        <td>
                              <small>{{$totaljam}}</small>
                        </td>
                        <td colspan="2"></td>
                        <td>
                              <small>{{round($totaldaily)}} Ltrs</small>
                        </td>
                     </tr>
   
                  
               </tbody>
            </table>
            <div class="row ttd">
               <div class="col">
                  <small>Prepared by,</small><br>
                  <small>Name : <span class="text-primary px-2"><u>{{$vessel->co}}</u></span></small><br>
                  <small>Title : Chief Engineer</small>
               </div>
               <div class="col">
                  <br>
                  <small>Name : <span class="text-primary px-2"><u>{{$vessel->master}}</u></span></small><br>
                  <small>Title : Master</small>
               </div>
               
               
               
               
            </div>
         </div>
         <div class="col">
            <div class="d-flex">
               <div>
                  <small class="title">SUMMARY OF DAILY FUEL, WATER and CARGOES REMAINING ONBOARD</small>
                     <table class="mb-1" style="width: 500px">
                        <thead>
                           {{-- <tr>
                              <th colspan="2" class="text-center">TIME</th>
                              <th colspan="8" class="text-center">Operation Mode Duration (hh::mm)- <br> Except Maintenance & Downtime</th>
                              <th rowspan="2" class="text-center align-middle">ACTIVITIES</th>
                           </tr> --}}
                           <tr>
                              <td class="title">Type</td>
                              <td class="text-truncate text-center title">OPENING</td>
                              <td class="text-center title">CONSUMPTION</td>
                              <td class="text-center title">RECEIVED</td>
                              <td class="text-center title">TRANSFERRED</td>
                              <td class="text-center title">CLOSING</td>
                              <td>REMARKS</td>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($vdrCargos as $vdrCargo)
                           <tr>
                              <td>{{$vdrCargo->heading->description}}</td>
                              <td class="text-center bg-yellow">{{$vdrCargo->opening}} Ltrs</td>
                              <td class="text-center bg-yellow">{{$vdrCargo->consumption}} Ltrs</td>
                              <td class="text-center bg-yellow">{{$vdrCargo->received}} Ltrs</td>
                              <td class="text-center bg-yellow">{{$vdrCargo->transferred}} Ltrs</td>
                              <td class="text-center">{{$vdrCargo->closing}} Ltrs</td>
                              <td class="bg-yellow">{{$vdrCargo->remark}}</td>
                              
                           </tr>
                           @endforeach
                           <tr>
                              <td rowspan="3"><b>Periodical Fuel ROB Check/ Control by Company Reps. and Surveyor</b></td>
                              {{-- <td><small><b></b></small></td> --}}
                           </tr>
                           <tr>
                              <td class="text-center" colspan="2"><b>Activity</b></td>
                              <td class="text-center"><b>ROB Check Time</b></td>
                              <td class="text-center"><b>ROB by VDR at Check Time</b></td>
                              <td class="text-center"><b>Actual ROB at Check Time</b></td>
                              <td class="text-center"><b>ROB Different</b></td>
                              
                           </tr>
                           <tr>
                              <td colspan="2">{{$vdrPeriodic->activity ?? ''}} </td>
                              <td class="text-center bg-yellow">{{$vdrPeriodic->rob_time ?? '0'}}</td>
                              <td class="text-center bg-yellow">{{$vdrPeriodic->rob_value ?? '0'}}</td>
                              <td class="text-center bg-yellow">{{$vdrPeriodic->rob_actual ?? '0'}}</td>
                              <td class="text-center" colspan="">{{$vdrPeriodic->rob_diff ?? '0'}}</td>
                              
                           </tr>
                        </tbody>
                        
                     </table>
               </div>
               <div>
                  <small class="title">-</small>
                  <table class=" ml--4">
                     <thead>
                        <tr>
                           <td colspan="2">SPECIAL CALCULATION</td>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>Fuel Cons. by Remuneration or Actual, from 00:00 hours to Check Time (manual input based on joint calculation by all parties)</td>
                           <td class="text-truncate px-3">{{$vdrPeriodic->fuel_cons_remu}} Ltrs</td>
                        </tr>
                        <tr>
                           <td>Part 1: Corrected Fuel Cons. from 00:00  hours to Check Time (based on calculation by applying ROB Different)</td>
                           <td class="text-truncate px-3">{{$vdrPeriodic->fuel_cons_correct}} Ltrs</td>
                        </tr>
                        <tr>
                           <td>Part 2: Actual Fuel Cons. from Check Time to 24:00  hours (manual input based on actual sounding)</td>
                           <td class="text-truncate px-3">{{$vdrPeriodic->fuel_cons_actual}} Ltrs</td>
                        </tr>
                        <tr>
                           <td>Total Actual Daily Fuel Cons. = (Part 1 + Part 2)</td>
                           <td class="text-truncate px-3">{{$vdrPeriodic->fuel_cons_total}} Ltrs</td>
                        </tr>
                        <tr>
                           <td rowspan="3" colspan="">
                              ROB Correction Rule <br>
                              <small>* Positive Diff -> Correction Applied</small><br>
                              <small>* Negative Diff -> Correction Not-Applied</small>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               
            </div>
            
            
            <div class="row ttd">
               <div class="col pt-1">
                  <small>Acknowledged by,</small>
                  <br>
                  <small>Name : PHE OSES Representative</small><br>
                  @if ($vdr->status >= 2)
                  <small >Status : <span style="color:rgb(44, 133, 251)"><i>APPROVED</i></span></small><br>
                  <small class="text-muted">{{formatDateTime($vdr->times->where('status', 2)->first()->created_at)}}</small><br>
                  @else
                  <small>Status : ____________</small>
                  @endif
                  
                  
               </div>
               <div class="col pt-1">
                  <br>
                  <small>Name : Superintendent</small><br>
                  @if ($vdr->status >= 3)
                  <small >Status : <span style="color:rgb(44, 133, 251)"><i>APPROVED</i></span></small><br>
                  <small class="text-muted">{{formatDateTime($vdr->times->where('status', 3)->first()->created_at)}}</small><br>
                  @else
                  <small>Status : ____________</small>
                  @endif
                  
               </div>
               <div class="col pt-1">
                  <br>
                  <small>Name : Mr. Lutfi</small><br>
                  @if ($vdr->status >= 4)
                  <small >Status : <span style="color:rgb(44, 133, 251)"><i>APPROVED</i></span></small><br>
                  <small class="text-muted">{{formatDateTime($vdr->times->where('status', 4)->first()->created_at)}}</small><br>
                  @else
                  <small>Status : ____________</small>
                  @endif
                  
               </div>
               <div class="col text-end pt-1">
                  {!! QrCode::size(100)->generate(Request::url()); !!}
               </div>
               
            </div>
         </div>
         
         {{-- <div class="col-2">
            <small class="title">QRCODE</small>
            <table>
               <tbody>
                  <tr>
                     <td class="text-center p-1">{!! QrCode::size(120)->generate(Request::url()); !!}</td>
                  </tr>
               </tbody>
            </table>
            
         </div> --}}
      </div>

     
      
      <hr>

      
      

      {{-- <p class="text-muted text-center mt-5">Thank you very much for doing business with us. We look forward to working with
      you again!</p> --}}
   </div>
</div>
@endsection