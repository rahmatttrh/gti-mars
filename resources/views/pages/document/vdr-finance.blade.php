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
    font-size: 10px
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
  
  .bg-lgray{
     background-color: rgb(236, 237, 238)
  }
  
  table th tr td {
     background-color: rgb(236, 237, 238)
  }
  </style>
{{-- <div class="px-4">
   <!-- Page title -->
   <div class="page-header bg-white d-print-none">
      
      <div class="row align-items-center">
         <div class="col">
            <h2 class="page-title">
            Vessel Daily Report
            </h2>
         </div>
         <!-- Page title actions -->
         <div class="col-auto ms-auto d-print-none">
            
            
            
            
            <button type="button" class="btn btn-light shadow" onclick="javascript:window.print();">
           
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" /><path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" /><rect x="7" y="13" width="10" height="8" rx="2" /></svg>
            Print VDR
            </button>
         </div>
      </div>
      
   </div>
</div> --}}
<div class="page-body bg-white" >

   {{-- <div class="d-flex justify-content-center">
      <div class="card bg-danger shadow" style="width: 200px">
         <div class="card-body">
            <h2>OKE</h2>
         </div>
      </div>
   </div> --}}

   <div class=" px-4 bg-white rounded pb-4 pt-1 ">
      <div class="row  pt-1 mb-2 ">
         <div class="col-12">
            <div class="card">
               <div class="card-body">
                  <div class="d-flex justify-content-between">
                     <div>
                        <img src="{{asset('img/logo/danantara.png')}}" width="100px" alt="DSP-PHE" class="mt-1">
                        
                     </div>
                     <div class="text-center" style="width: 100px">
                        {{-- <small><b>VDR</b></small><br>
                        <i>VALID</i> --}}
                        
                     </div>
                     <div>
                        <img src="{{asset('img/logo/phe-oses.png')}}" width="100px"  alt="DSP-PHE" class="">
                        
                     </div>
                  </div>
                  <br>
                  <b>Menyatakan bahwa dokumen berikut telah dilakukan pengesahan (Sign Document) dengan detail:</b>
                  
                  <table class=" mt-2">
                     <tbody>
                        <tr>
                           {{-- <td>VDR </td> --}}
                           <td class="bg-yellow" colspan="2"> {{$vdr->code}}</td>
                           
                        </tr>
                        <tr>
                           <td>Date</td>
                           <td class="bg-yellow"> {{\Carbon\Carbon::parse($vdr->date)->format('d/m/Y')}}</td>
                        </tr>
                        <tr>
                           <td>Vessel Name</td>
                           <td class="bg-yellow"> {{$vdr->vessel->name}}</td>
                           
                        </tr>
                        <tr>
                           <td>Owner Opt</td>
                           <td class="bg-yellow"> {{$vdr->owner ?? '-'}}</td>
                        </tr>
                        <tr>
                           <td>Contract No.</td>
                           <td class="bg-yellow"> {{$vdr->contract ?? '-'}}</td>
                           {{-- <td><small>Master Name</small></td>
                           <td class="bg-yellow"><small>{{$vdr->master ?? '-'}}</small></td> --}}
                        </tr>
                        {{-- <tr>
                           <td><small>Contract Periode</small></td>
                           <td class="bg-yellow"><small>{{\Carbon\Carbon::parse($vdr->contract_start)->format('d/m/Y')}} - {{\Carbon\Carbon::parse($vdr->contract_end)->format('d/m/Y')}}</small></td>
                           <td><small>Number of Crew/Pax</small></td>
                           <td class="bg-yellow"><small>{{$vdr->crew_onduty}} / {{$vdr->crew_max}}</small></td>
                        </tr> --}}
                     </tbody>
                     
                  </table>
               

                  <table class=" mt-1">
                     <tbody>
                        <tr>
                           <td colspan="2"><i>Prepared by</i></td>
                        </tr>
                        <tr>
                           <td>Name</td>
                           <td> {{$vdr->master ?? '-'}}</td>
                     
                           
                        </tr>

                        <tr>
                           <td>Title</td>
                           <td> Master</td>
                        </tr>
                        <tr>
                           <td>Timestamp</td>
                           <td> {{formatDateTimeB($vdr->release_date)}}</td>
                        </tr>

                        <tr>
                           
                           <td>Name</td>
                           <td> {{$vdr->ce ?? '-'}}</td>
                        </tr>
                        <tr>
                           
                           <td>Title</td>
                           <td> Chief Engineer</td>
                        </tr>
                        <tr>
                           
                           <td>Timestamp</td>
                           <td> {{formatDateTimeB($vdr->release_date)}}</td>
                        </tr>


                        <tr>
                           <td colspan="2"></td>
                        </tr>
                        <tr>
                           <td colspan="2"><i>Checked by</i></td>
                        </tr>
                        <tr>
                           <td>Name</td>
                           <td> {{$vdr->name1 ?? '-'}}</td>
                           
                        </tr>
                        <tr>
                           <td>Title</td>
                           <td> Fuel Monitoring Team</td>
                           
                        </tr>
                        <tr>
                           <td>Timestamp</td>
                           <td> 
                              {{-- @if ()
                                  
                              @endif --}}
                              {{formatDateTimeB($vdr->timestamp1)}}
                           </td>
                        </tr>

                        <tr>
                           <td>Name</td>
                           <td> {{$vdr->name2 ?? '-'}}
                              @if ($vdr->name2 == 'DDP' || $vdr->name2 == 'JPG' || $vdr->name2 == 'MH' ||$vdr->name2 == 'YRF')
                              <i>(on behalf of port captain)</i>
                               @endif
                           </td>
                        </tr>
                        <tr>
                           <td>Title</td>
                           <td> 
                                {{-- Marine Department --}}
                                @if ($vdr->name2 == 'DDP' || $vdr->name2 == 'JPG' || $vdr->name2 == 'MH' ||$vdr->name2 == 'YRF')
                                Fleet Controller
                                @else
                                Port Captain
                               @endif
                            </td>
                        </tr>
                        <tr>
                           
                           <td>Timestamp</td>
                           <td> {{formatDateTimeB($vdr->timestamp2)}}</td>
                        </tr>



                        <tr>
                           <td colspan="2"></td>
                        </tr>
                        <tr>
                           <td colspan="2"><i>Acknowledge by</i></td>
                        </tr>
                        <tr>
                           <td>Name</td>
                           <td> Lutfi Aryanto</td>
                           
                        </tr>
                        <tr>
                           <td>Title</td>
                           <td> Analyst Marine Fleet</td>
                           
                        </tr>
                        <tr>
                           <td>Timestamp</td>
                           <td> 
                              {{-- @if ()
                                  
                              @endif --}}
                              {{formatDateTimeB($vdr->timestamp3)}}
                           </td>
                           
                        </tr>
                     </tbody>
                  </table>
                  
                  @if ($vdr->status == 4)
                  <br>
                    {{-- <small class="text-muted" style="font-size: 10px"><i>"Dokumen ini telah disetujui melalui system dan sah tanpa memerlukan tanda tangan basah"</i></small> --}}
                  <b>Adalah benar dan tercatat pada Database Kami</b>
                    @endif


                  
               </div>
            </div>
            
         </div>
         {{-- <table class="table border">
            <tbody>
               <tr>
                  <td class="border">
                     <img src="{{asset('img/logo/phe-oses.png')}}"  alt="DSP-PHE" class="navbar-brand-image">
                  </td>
                  <td class="text-center border">
                     <img src="{{asset('img/logo/phe-oses.png')}}" width="200px"  alt="DSP-PHE" class="navbar-brand-image">
                  </td>
               </tr>
            </tbody>

         </table> --}}
         
        
        


         
      </div>

      

     


      
      

      
      

      {{-- <p class="text-muted text-center mt-5">Thank you very much for doing business with us. We look forward to working with
      you again!</p> --}}
   </div>

   
</div>





@endsection