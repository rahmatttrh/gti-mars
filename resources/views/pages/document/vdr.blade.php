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
   font-size: 7px;
}

table td {
  font-size: 6px
}

.title {
  font-size: 6px;
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
            {{-- {{$vdr->status}} --}}
            @if ($vdr->status == 3 && auth()->user()->username == 'lutfi')
               <a href="#" class="btn btn-block btn-primary  shadow-none" data-toggle="modal" data-target="#vdr-approve-suptent">Approve </a>
            @endif
            @if ($vdr->status == 4 && auth()->user()->username == 'lutfi')
               <a href="/" class="btn btn-block btn-light border  shadow-none" >Back </a>
            @endif
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
               <dd class="col-9">:  {{$vdr->contract}}</dd>
               <dd class="col-3">Contract Period</dd>
               <dd class="col-9">:  {{\Carbon\Carbon::parse($vdr->contract_start)->format('d/m/Y')}} - {{\Carbon\Carbon::parse($vdr->contract_end)->format('d/m/Y')}}</dd>
               
            </dl>
         </div>
         <div class="col-6">
            <dl class="row">
               <dd class="col-4">Location</dd>
               <dd class="col-8">: {{$vdr->location_midnight}}</dd>
               <dd class="col-4">Owner</dd>
               <dd class="col-8">: {{$vdr->owner}}</dd>
               <dd class="col-4">Master</dd>
               <dd class="col-8">:  {{$vdr->master}}</dd>
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
                     <td class="bg-yellow"><small>{{$vdr->owner ?? '-'}}</small></td>
                  </tr>
                  <tr>
                     <td><small>Contract No.</small></td>
                     <td class="bg-yellow"><small>{{$vdr->contract ?? '-'}}</small></td>
                     <td><small>Master Name</small></td>
                     <td class="bg-yellow"><small>{{$vdr->master ?? '-'}}</small></td>
                  </tr>
                  <tr>
                     <td><small>Contract Periode</small></td>
                     <td class="bg-yellow"><small>{{\Carbon\Carbon::parse($vdr->contract_start)->format('d/m/Y')}} - {{\Carbon\Carbon::parse($vdr->contract_end)->format('d/m/Y')}}</small></td>
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
                     <td class="text-center title">00 - 06 hrs</td>
                     <td class="text-center title">06 - 12 hrs</td>
                     <td class="text-center title">12 - 18 hrs</td>
                     <td class="text-center title">18 - 24 hrs</td>
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
                           <td class="text-center ">
                                 <small>
                                    @if ($hse->header->description == 'Lost Time Injury' || $hse->header->description == 'Medical Treatment Case' || $hse->header->description == 'First Aid Case' || $hse->header->description == 'Others')
                                        @else
                                        {{ $no++}}
                                    @endif
                                 
                              </small>
                           </td>
                           <td><small>{{$hse->header->description}} </small></td>
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
                           
                           <td colspan="3" class="text-center" style="background-color: rgb(186, 186, 186)"></td>
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
                     <td class="text-center bg-yellow"><small>{{substr($vdrActivity->start, 0, 5)}} </small></td>
                     <td class="text-center bg-yellow"><small>{{substr($vdrActivity->finish, 0, 5)}}</small></td>
                     <td class="text-center bg-yellow">
                        <small>
                           @if ($vdrActivity->high == 0.00)
   
                           @else
                           {{getTotalHours($vdrActivity->high)}}
                           @endif
                        
                        </small>
                     </td>
                     <td class="text-center bg-yellow">
                        <small>
                           @if ($vdrActivity->normal == 0.00)
                               @else
                               {{getTotalHours($vdrActivity->normal)}}
                           @endif
                        </small>
                     </td>
                     <td class="text-center bg-yellow">
                        <small>
                           @if ($vdrActivity->slow == 0.00)
                           @else
                           {{getTotalHours($vdrActivity->slow)}}
                           @endif
                        </small>
                     </td>
                     <td class="text-center bg-yellow">
                        <small>
                           @if ($vdrActivity->manu == 0.00)
                           @else
                           {{getTotalHours($vdrActivity->manu)}}
                           @endif
                        </small>
                     </td>
                     <td class="text-center bg-yellow">
                        <small>
                           @if ($vdrActivity->idle == 0.00)
                           @else
                           {{getTotalHours($vdrActivity->idle)}}
                           @endif
                        </small>
                     </td>
                     <td class="text-center bg-yellow">
                        <small>
                           @if ($vdrActivity->tow == 0.00)
                           @else
                           {{getTotalHours($vdrActivity->tow)}}
                           @endif
                        </small>
                     </td>
                     <td class="text-center bg-yellow">
                        <small>
                           @if ($vdrActivity->ah == 0.00)
                           @else
                           {{getTotalHours($vdrActivity->ah)}}
                           @endif
                        </small>
                     </td>
                     <td class="text-center bg-yellow">
                        <small>
                           @if ($vdrActivity->sb == 0.00)
                           @else
                           {{getTotalHours($vdrActivity->sb)}}
                           @endif
                        </small>
                     </td>
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
                           <td class="bg-yellow"> &nbsp;</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 1)
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
                           <td class="bg-yellow"> &nbsp;</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 2)
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
                           <td class="bg-yellow"> &nbsp;</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 3)
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
                           <td class="bg-yellow"> &nbsp;</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 4)
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
                           <td class="bg-yellow"> &nbsp;</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 5)
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
                           <td class="bg-yellow"> &nbsp;</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 6)
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
                           <td class="bg-yellow"> &nbsp;</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 7)
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
                           <td class="bg-yellow"> &nbsp;</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 8)
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
                           <td class="bg-yellow"> &nbsp;</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 9)
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
                           <td class="bg-yellow"> &nbsp;</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 10)
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
                           <td class="bg-yellow"> &nbsp;</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 11)
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
                           <td class="bg-yellow"> &nbsp;</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 12)
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
                           <td class="bg-yellow"> &nbsp;</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 13)
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
                           <td class="bg-yellow"> &nbsp;</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 14)
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
                           <td class="bg-yellow"> &nbsp;</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 15)
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
                           <td class="bg-yellow"> &nbsp;</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 16)
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
                           <td class="bg-yellow"> &nbsp;</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 17)
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
                           <td class="bg-yellow"> &nbsp;</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 18)
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
                           <td class="bg-yellow"> &nbsp;</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 19)
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
                           <td class="bg-yellow"> &nbsp;</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 20)
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
                           <td class="bg-yellow"> &nbsp;</td>
                        </tr>
                     @endfor
                  @endif
                  @if (count($vdrActivities) == 21)
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
                           <td class="bg-yellow"> &nbsp;</td>
                        </tr>
                     @endfor
                  @endif
                  <tr>
                     <td class=" text-center" colspan="2">Total</td>
                     @foreach ($operatings->where('heading_id', '<', 9) as $operating)
                     
                     <td class=" text-center">{{getTotalHours($operating->time)}} </td>
                     @endforeach
                     
                     {{-- <td class="bg-yellow"></td>
                     <td class="bg-yellow"></td>
                     <td class="bg-yellow"></td>
                     <td class="bg-yellow"></td>
                     <td class="bg-yellow"></td>
                     <td class="bg-yellow"></td>
                     <td class="bg-yellow"></td> --}}
                     <td class="" style="background-color: rgb(186, 186, 186)"></td>
                  </tr>
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
                     <td class="title">Total Time hh:mm</td>
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
                           <small>{{getTotalHours($operating->time)}}</small>
                        </td>
                        @if ($operating->heading_id > 3)
                           <td class="text-center" style="background-color: rgb(186, 186, 186)">
                           </td>
                           @else
                           
                           <td class="text-center bg-yellow">
                              @if($operating->heading->speed == '1')
                              <small>{{$operating->speed ?? '0.00'}}</small>
                              
                              @else
                              <small>{{$operating->speed ?? '0.00'}}</small>
                              @endif
                           </td>
                        @endif
   
                        @if ($operating->heading_id > 8)
                           <td class="text-center" style="background-color: rgb(186, 186, 186)">
                           </td>
                           @else
                           <td class="text-center bg-yellow">
                              {{-- @if($operating->heading->contractual == '1')
                              <small>{{$operating->contractual_fuel ?? '0'}}</small>
                              @else --}}
                              <small>
                                 @if ($operating->contractual_fuel)
                                     {{round($operating->contractual_fuel)}}
                                     @else
                                     0
                                 @endif
                                 {{-- {{$operating->contractual_fuel ?? '0'}}</small> --}}
                              {{-- @endif --}}
                              L/H
                        </td>
                        @endif
                        
                        @if ($operating->heading_id > 8)
                           <td class="text-center" style="background-color: rgb(186, 186, 186)">
                           </td>
                           @else
                           <td class="text-center">
      
      
                                 @if($operating->heading->daily == '1')
                                 <small>{{number_format($operating->daily, 2, ',' , '.')}}</small>
                                 {{-- <div class="input-group ">
                                    <input type="text" readonly disabled name="daily[]"  value="{{round($operating->daily)}}">
                                    
                                 </div> --}}
                                 @else
                                 <small>{{$operating->daily}}</small>
                                 @endif
                                 Ltrs
                           </td>
                           @endif
                     </tr>
                     @endforeach
                     <tr>
                        <td>Total Daily</td>
                        <td class="text-center">
                              <small>{{$totaljam ?? '00:00'}}</small>
                        </td>
                        <td colspan="2"></td>
                        <td class="text-center">
                              <small>{{formatRibuan(round($totaldaily))}} Ltrs</small>
                        </td>
                     </tr>
   
                  
               </tbody>
            </table>
            <div class="row ttd">
               <div class="col">
                  <small>Prepared by,</small><br>
                  <small>Name : <span class="text-primary px-2"><u>{{$vdr->ce ?? '-'}}</u></span></small><br>
                  <small>Title : Chief Engineer</small>
               </div>
               <div class="col">
                  <br>
                  <small>Name : <span class="text-primary px-2"><u>{{$vdr->master ?? '-'}}</u></span></small><br>
                  <small>Title : Master</small>
               </div>
               
               
               
               
            </div>
         </div>
         <div class="col">
            <div class="d-flex">
               <div>
                  <small class="title">SUMMARY OF DAILY FUEL, WATER and CARGOES REMAINING ONBOARD</small>
                  <table class="mb-1" style="width: 100%">
                     <thead>
                        {{-- <tr>
                           <th colspan="2" class="text-center">TIME</th>
                           <th colspan="8" class="text-center">Operation Mode Duration (hh::mm)- <br> Except Maintenance & Downtime</th>
                           <th rowspan="2" class="text-center align-middle">ACTIVITIES</th>
                        </tr> --}}
                        <tr>
                           <td class="title">Type</td>
                           <td class="text-truncate text-center "><b>Opening</b> <br> <small>(ROB from Previous Day)</small> </td>
                           <td class="text-center "><b>Actual Consumption</b> <br> <small>(Sounding)</small> </td>
                           <td class="text-center "><b>Received</b></td>
                           <td class="text-center "><b>Transferred</b></td>
                           <td class="text-center "><b>Closing MN</b> <br> <small>(Based on Actual Sounding)</small> </td>
                           <td class="text-center "><b>Remarks</b> <br> <small>(Related ro receiving and tranferring activities)</small> </td>
                           <td class="text-center " colspan="2"><b>Special Calculation</b>  </td>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($vdrCargos as $vdrCargo)
                        @php
                              if ($vdrCargo->heading_id <= 3) {
                              $satuan = 'Ltrs';
                              } else {
                              $satuan = 'cuft';
                              }
                        @endphp
                        <tr>
                           <td>{{$vdrCargo->heading->description}}</td>
                           <td class="text-center bg-yellow text-truncate">{{formatRibuan($vdrCargo->opening)}} {{$satuan}}</td>
                           @if ($vdrCargo->heading_id > 2)
                              <td class="text-center" style="background-color: rgb(186, 186, 186)">
                              </td>
                              @else
                              <td class="text-center bg-yellow">{{formatRibuan($vdrCargo->consumption)}} {{$satuan}}</td>
                           @endif
                           
                           <td class="text-center bg-yellow">{{formatRibuan($vdrCargo->received)}} {{$satuan}}</td>
                           <td class="text-center bg-yellow">{{formatRibuan($vdrCargo->transferred)}} {{$satuan}}</td>
                           <td class="text-center">{{formatRibuan($vdrCargo->closing)}} {{$satuan}}</td>
                           <td class="bg-yellow">{{$vdrCargo->remark}}</td>
                           @if ($vdrCargo->heading_id == 1)
                           <td rowspan="2">
                              Fuel Cons. by Remuneration or Actual, from 00:00 hours to Check Time (manual input based on joint calculation by all parties)
                           </td>
                           <td rowspan="2" class="text-truncate px-3">{{formatRibuan($vdrPeriodic->fuel_cons_remu)}} Ltrs</td>
                           @endif
                           @if ($vdrCargo->heading_id == 3)
                           <td rowspan="3">
                              Part 1: Corrected Fuel Cons. from 00:00  hours to Check Time (based on calculation by applying ROB Different)
                           </td>
                           <td rowspan="3" class="text-truncate px-3">{{formatRibuan($vdrPeriodic->fuel_cons_correct)}} Ltrs</td>
                           @endif
                           @if ($vdrCargo->heading_id == 6)
                           <td rowspan="2">
                              Part 2: Actual Fuel Cons. from Check Time to 24:00  hours (manual input based on actual sounding)
                           </td>
                           <td rowspan="2" class="text-truncate px-3">{{formatRibuan($vdrPeriodic->fuel_cons_actual)}} Ltrs</td>
                           @endif

                           @if ($vdrCargo->heading_id == 8)
                           <td rowspan="2">
                              Total Actual Daily Fuel Cons. = (Part 1 + Part 2)
                           </td>
                           <td rowspan="2" class="text-truncate px-3">{{formatRibuan($vdrPeriodic->fuel_cons_total)}} Ltrs</td>
                           @endif
                           @if ($vdrCargo->heading_id == 10)
                           <td rowspan="2">
                              ROB Correction Rule <br>
                              <small>* Positive Diff -> Correction Applied</small><br>
                              <small>* Negative Diff -> Correction Not-Applied</small>
                           </td>
                           @endif
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
                           <td rowspan="2">
                              ROB Correction Rule <br>
                              <small>* Positive Diff -> Correction Applied</small><br>
                              <small>* Negative Diff -> Correction Not-Applied</small>
                           </td>
                        </tr>
                        <tr>
                           <td colspan="2" class="text-center">{{$vdrPeriodic->activity ?? ''}} </td>
                           <td class="text-center bg-yellow">{{$vdrPeriodic->rob_time ?? '0'}}</td>
                           <td class="text-center bg-yellow">{{formatRibuan($vdrPeriodic->rob_value)}}</td>
                           <td class="text-center bg-yellow">{{formatRibuan($vdrPeriodic->rob_actual)}}</td>
                           <td class="text-center" colspan="">{{formatRibuan($vdrPeriodic->rob_diff)}}</td>
                           
                        </tr>
                     </tbody>
                     
                  </table>
               </div>
               {{-- <div>
                  <small class="title"> &nbsp;</small>
                  <table class=" ml--4">
                     <thead>
                        <tr>
                           <td colspan="2">SPECIAL CALCULATION</td>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>Fuel Cons. by Remuneration or Actual, from 00:00 hours to Check Time (manual input based on joint calculation by all parties)</td>
                           <td class="text-truncate px-3">{{formatRibuan($vdrPeriodic->fuel_cons_remu)}} Ltrs</td>
                        </tr>
                        <tr>
                           <td>Part 1: Corrected Fuel Cons. from 00:00  hours to Check Time (based on calculation by applying ROB Different)</td>
                           <td class="text-truncate px-3">{{formatRibuan($vdrPeriodic->fuel_cons_correct)}} Ltrs</td>
                        </tr>
                        <tr>
                           <td>Part 2: Actual Fuel Cons. from Check Time to 24:00  hours (manual input based on actual sounding)</td>
                           <td class="text-truncate px-3">{{formatRibuan($vdrPeriodic->fuel_cons_actual)}} Ltrs</td>
                        </tr>
                        <tr>
                           <td>Total Actual Daily Fuel Cons. = (Part 1 + Part 2)</td>
                           <td class="text-truncate px-3">{{formatRibuan($vdrPeriodic->fuel_cons_total)}} Ltrs</td>
                        </tr>
                        <tr>
                           <td rowspan="3" colspan="2">
                              ROB Correction Rule <br>
                              <small>* Positive Diff -> Correction Applied</small><br>
                              <small>* Negative Diff -> Correction Not-Applied</small>
                           </td>
                           
                        </tr>
                     </tbody>
                  </table>
               </div> --}}
               
            </div>
            
            
            <div class="row ttd">
               {{-- <div class="col pt-1">
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
                  
               </div> --}}

               {{-- {{$vdr->title1}} --}}

               @if ($vdr->title1 != null)
                  <div class="col pt-1">
                     <small>Acknowledged by,</small>
                     <br>
                     <small>{{$vdr->title1 ?? '-'}} : {{$vdr->name1 ?? '-'}}</small><br>
                     @if ($vdr->title1 != null)
                     <small >Status : <span style="color:rgb(44, 133, 251)"><i>APPROVED</i></span></small><br>
                     {{-- <small class="text-muted">{{formatDateTime($vdr->times->where('status', 2)->first()->created_at)}}</small><br> --}}
                     @else
                     <small>Status : ____________</small>
                     @endif
                     
                     
                  </div>
               
                   
               @endif


               @if ($vdr->title2 != null)
                  <div class="col pt-1">
                     <br>
                     <small>{{$vdr->title2 ?? '-'}} : {{$vdr->name2 ?? '-'}}</small><br>
                     @if ($vdr->title2 != null)
                     <small >Status : <span style="color:rgb(44, 133, 251)"><i>APPROVED</i></span></small><br>
                     {{-- <small class="text-muted">{{formatDateTime($vdr->times->where('status', 3)->first()->created_at)}}</small><br> --}}
                     @else
                     <small>Status : ____________</small>
                     @endif
                     
                  </div>
               @endif
              

               @if ($vdr->title3 != null)
                  <div class="col pt-1">
                     <br>
                     <small>{{$vdr->title3 ?? '-'}} : {{$vdr->name3 ?? '-'}}</small><br>
                     @if ($vdr->title3 != null)
                     <small >Status : <span style="color:rgb(44, 133, 251)"><i>APPROVED</i></span></small><br>
                     {{-- <small class="text-muted">{{formatDateTime($vdr->times->where('status', 4)->first()->created_at)}}</small><br> --}}
                     @else
                     <small>Status : ____________</small>
                     @endif
                     
                  </div>
               @endif
               
               <div class="col text-end pt-1">
                  {!! QrCode::size(65)->generate(Request::url()); !!}
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

     
      
      

      
      

      {{-- <p class="text-muted text-center mt-5">Thank you very much for doing business with us. We look forward to working with
      you again!</p> --}}
   </div>

   
</div>



@endsection