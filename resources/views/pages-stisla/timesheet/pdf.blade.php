@extends('layouts.app-docb')

@section('title')
    Timesheet Detail
@endsection

@section('content')


<style>
    html {
        -webkit-print-color-adjust: exact;
    }

    body {
        font-family: Arial, sans-serif;
        font-size: 12px;
        color: #333;
    }

    .header-box {
        border-bottom: 2px solid #000;
        padding-bottom: 15px;
        margin-bottom: 20px;
    }

    .company-logo {
        width: 220px;
    }

    .report-title {
        font-size: 22px;
        font-weight: bold;
    }

    .report-subtitle {
        font-size: 12px;
        color: #666;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th {
        background: #f4f6f9;
        border: 1px solid #ddd;
        font-size: 9px;
        text-align: center;
    }

    table td {
        border: 1px solid #ddd;
        font-size: 9px;
    }

    .summary-box {
        background: #f8f9fa;
        padding: 10px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .print-btn {
        margin-bottom: 20px;
    }

    @media print {
        .no-print {
            display: none;
        }
        .print-full {
         width: 100% !important;
         max-width: 100% !important;
         padding: 0 !important;
         margin: 0 !important;
      }
    }
</style>

<div class=" px-2 py-0 my-0">

    <!-- Print Button -->
    <div class="text-right no-print print-btn">
        <button onclick="window.print()" class="btn btn-primary">
            <i class="fas fa-print me-2"></i> Print / Save PDF
        </button>
    </div>

    <!-- Header -->
    {{-- <div class="header-box d-flex justify-content-between align-items-center">
        <div>
            <img src="{{asset('img/flaticon/mars-logo.png')}}" style="width: 100px" class="company-logo">
        </div>

        <div class="text-right">
            <div class="report-title">User Account List</div>
            <div class="report-subtitle text-end">
                Generated on {{date('d M Y H:i')}}
            </div>
        </div>
    </div> --}}

    <table width="100%" cellpadding="0" cellspacing="0"  class="mb-1"
       style="border-collapse: collapse;  font-family:Arial, sans-serif;">

   <!-- TITLE -->
   <tr>
      <td colspan="2" class="py-1 px-2" style=" solid #000;">

         <h4 style="margin:0; ">
            TIMESHEET
         </h4>

         {{-- <small style="color:#555;">
            Monthly Vessel Report
         </small> --}}

      </td>
   </tr>

   <!-- CONTENT -->
   <tr>
      <td class="py-1 px-2" style="width: 90px">
         Nama Kapal
      </td>

      <td class="py-1 px-2" >
          {{ $vessel->name }}
      </td>
   </tr>

   <tr>
      <td class="py-1 px-2">
         Bulan/Tahun
      </td>

      <td class="py-1 px-2">
          {{ $current->format('F') }} / {{ $current->format('Y') }}
      </td>
   </tr>

   

</table>

    
    

    <!-- User Table -->
    <table class="">

                  <thead class="">
                     <tr>
                        <th rowspan="2" class="border text-center align-middle">No</th>
                        {{-- <th>VDR</th> --}}
                        <th rowspan="2" class="border text-center align-middle">Tanggal</th>
                        <th rowspan="2" class="border text-center align-middle">Waktu</th>
                        <th colspan="9" class="border text-center">Operating Mode</th>
                        <th rowspan="2" class="border text-center align-middle">Remark</th>
                     </tr>
                     <tr>
                        <th  class="border text-center">High</th>
                        <th  class="border text-center">Normal</th>
                        <th  class="border text-center">Slow</th>
                        <th  class="border text-center">Manu</th>
                        <th  class="border text-center">Idle</th>
                        <th  class="border text-center">Tow</th>
                        <th  class="border text-center">A/H</th>
                        <th  class="border text-center">S/B</th>
                        <th  class="border text-center">S/P</th>
                     </tr>
                  </thead>

                  <tbody>

                  @foreach ($vdrVessels as $vdr)
                        <tr>
                           <td class="text-center border">{{++$i}}</td>
                           {{-- <td>{{$vdr->code}}</td> --}}
                           <td class="text-center border">
                              {{formatDate($vdr->date)}}
                              {{-- <a href="{{route('vdr.show.spa', [enkripRambo($vdr->id), enkripRambo('index')])}}">{{formatDate($vdr->date)}}</a> --}}
                           
                           </td>
                           <td class="text-center border">
                              00:00 - 24:00
                           </td>
                           <td class="text-center border">
                              {{ $vdr->getTotalHigh() }}
                           </td>
                           <td class="text-center border">
                              {{ $vdr->getTotalNormal() }}
                           </td>
                           <td class="text-center border">
                              {{ $vdr->getTotalSlow() }}
                           </td>
                           <td class="text-center border">
                              {{ $vdr->getTotalManu() }}
                           </td>
                           <td class="text-center border">
                              {{ $vdr->getTotalIdle() }}
                           </td>
                           <td class="text-center border">
                              {{ $vdr->getTotalTow() }}
                           </td>
                           <td class="text-center border">
                              {{ $vdr->getTotalAh() }}
                           </td>
                           <td class="text-center border">
                              {{ $vdr->getTotalSb() }}
                           </td>
                           <td class="text-center border">
                              {{ $vdr->getTotalSp() }}
                           </td>
                           <td class=" border px-1" style="max-width: 100px">
                              {{ $vdr->getFuelRemark() }}
                           </td>
                        </tr>
                  @endforeach

                  </tbody>

               </table>



                <table class=" mt-1">

                    <thead class="table-light">

                        <tr>
                            <th width="50%" class="py-1">Ownership</th>
                            <th width="50%" class="py-1">Marine Representative</th>
                        </tr>

                    </thead>

                    <tbody>

                        <!-- LEVEL -->
                       

                        <!-- NOTE -->
                        <tr>

                            <td class="text-center py-2">
                                @if ($lastVdr != null)
                                <b><i>SUBMITTED</i></b>
                                @endif
                            {{-- <small class="text-muted d-block">
                                Note Approved
                            </small>

                            Approved & verified by vessel master. --}}
                            </td>

                            <td class="text-center py-2">
                                @if ($lastVdr != null)
                                <b><i>APPROVED</i></b>
                                @endif
                            {{-- <small class="text-muted d-block">
                                Note Approved
                            </small>

                            Reviewed and validated by superintendent. --}}
                            </td>

                        </tr>

                        <!-- APPROVER -->
                        <tr>

                            <td class="px-1">
                            {{-- <small class="text-muted d-block">
                                Created By
                            </small> --}}

                            <b>{{$vessel->office->name ?? $vessel->name . ' Owner'}}</b> <br>
                            @if ($lastVdr != null)
                                {{ formatDateTimeB($lastVdr->release_date) }}
                            @endif
                             
                            </td>

                            <td class="px-1" >
                            {{-- <small class="text-muted d-block">
                                Approved By
                            </small> --}}

                            <b>Lutfi Aryanto</b> <br>
                            @if ($lastVdr != null)
                            {{ formatDateTimeB($lastVdr->timestamp3) }}
                            @endif
                            </td>

                        </tr>

                       

                    </tbody>

                </table>


    <!-- Footer -->
    <div class="mt-2 text-muted" style="font-size:8px;">
        <i>
            This document is generated by Marine Advanced Reporting System.
        </i>
    </div>

</div>

@endsection