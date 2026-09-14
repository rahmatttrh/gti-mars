@extends('layouts.stisla.app-main')
@section('title')
   Timesheet Detail
@endsection

@section('content')




  <style>
   .timesheet-vessel-card{
      border:none;
      border-radius:10px;
      overflow:hidden;
      background:#fff;
      box-shadow:0 10px 30px rgba(0,0,0,0.06);
   }

   .vessel-header{
      background:linear-gradient(135deg,#0f172a,#1e3a8a);
      padding:28px;
      color:white;
   }

   .vessel-icon{
      width:70px;
      height:70px;
      border-radius:20px;
      background:rgba(255,255,255,0.12);
      display:flex;
      align-items:center;
      justify-content:center;
      font-size:28px;
   }

   .info-chip{
      padding:8px 14px;
      border-radius:30px;
      font-size:12px;
      font-weight:600;
      background:rgba(255,255,255,0.12);
      color:white;
      display:inline-flex;
      align-items:center;
   }

   .summary-box{
      border-radius:18px;
      background:#f8fafc;
      padding:18px;
      border:1px solid #edf2f7;
      height:100%;
      transition:.2s;
   }

   .summary-box:hover{
      transform:translateY(-2px);
   }

   .summary-icon{
      width:45px;
      height:45px;
      border-radius:14px;
      display:flex;
      align-items:center;
      justify-content:center;
      font-size:18px;
      margin-bottom:10px;
   }

   .progress-modern{
      height:14px;
      border-radius:20px;
      background:#e2e8f0;
      overflow:hidden;
   }

   .progress-modern .progress-bar{
      border-radius:20px;
   }

   .vdr-table thead th{
      border:none;
      font-size:13px;
      color:#64748b;
      text-transform:uppercase;
      letter-spacing:.5px;
   }

   .vdr-table tbody tr{
      border-bottom:1px solid #edf2f7;
   }

   .vdr-table tbody tr:hover{
      background:#f8fbff;
   }

   .vdr-code{
      font-weight:700;
      color:#1e293b;
   }

   .status-badge{
      border-radius:30px;
      padding:7px 12px;
      font-size:12px;
      font-weight:600;
   }

   .filter-select{
      border-radius:12px;
      min-width:140px;
   }
</style>

<section class="section">
   <div class="section-body">

      <div class="card timesheet-vessel-card">

         <!-- HEADER -->
         <div class="vessel-header">

            <!-- TOP ACTION -->
            <div class="d-flex justify-content-between align-items-start flex-wrap mb-4">

               <!-- BACK -->
               <div>
                  <a href="/" 
                     class="btn btn-light btn-sm rounded-pill shadow-sm ">

                     <i class="fa fa-arrow-left mr-2"></i>
                     Back to Vessel List

                  </a>
               </div>

               <!-- ACTION BUTTON -->
               <div class="d-flex flex-wrap mt-3 mt-md-0">

                  <a href="{{ route('timesheet.vessel.pdf', [enkripRambo($vessel->id), enkripRambo($month), enkripRambo($year)]) }}" target="_blank" class="btn btn-danger btn-sm rounded-pill shadow-sm  mr-2">

                     <i class="fa fa-file-pdf mr-2"></i>
                     Export PDF

                  </a>

                  <button 
                     class="btn btn-success btn-sm rounded-pill shadow-sm"
                     data-toggle="tooltip"
                     data-placement="top"
                     title="Fitur masih dalam tahap pengembangan">

                     <i class="fa fa-file-excel mr-2"></i>
                     Export Excel

                  </button>

               </div>

            </div>

            <!-- MAIN CONTENT -->
            <div class="row align-items-center">

               <!-- LEFT INFO -->
               <div class="col-lg-8">

                  <div class="d-flex align-items-center flex-wrap">

                     <!-- ICON -->
                     <div class="vessel-icon mr-4">
                        <i class="fa fa-ship"></i>
                     </div>

                     <!-- TEXT -->
                     <div>

                        <small class="text-light d-block mb-1" style="opacity:.8;">
                           Vessel Monthly Timesheet
                        </small>

                        <h3 class="fw-bold text-white mb-2">
                           {{ $vessel->name }}
                        </h3>

                        <div class="d-flex flex-wrap align-items-center">

                           <div class="info-chip mr-2 mb-2">
                              <i class="fa fa-calendar-alt mr-2"></i>
                              {{ $current->format('F Y') }}
                           </div>

                           <div class="info-chip mr-2 mb-2">
                              <i class="fa fa-building mr-2"></i>
                           {{$vessel->office->name ?? '-'}}
                           </div>

                           <div class="info-chip mb-2">
                              <i class="fa fa-file-alt mr-2"></i>
                              {{ $totalVdrs }} VDR Submitted
                           </div>

                        </div>

                     </div>

                  </div>

               </div>

               <!-- RIGHT FILTER -->
               <div class="col-lg-4">
                   <form action="{{ route('timesheet.vessel.filter') }}" method="POST">
                           @csrf
                           @method('PUT')
                  <div class="d-flex justify-content-lg-end mt-4 mt-lg-0">

                     <div class="filter-box d-flex align-items-center flex-wrap">

                        <!-- LABEL -->
                        <div class="filter-label mr-3">

                           <div class="d-flex align-items-center">

                              <div class="filter-icon mr-2">
                                 <i class="fa fa-filter"></i>
                              </div>

                              <div>
                                 <small class="d-block text-muted" style="font-size:11px;">
                                    FILTER
                                 </small>

                                 <span class="fw-bold">
                                    Timesheet
                                 </span>
                              </div>

                           </div>

                        </div>


                       
                           <input type="number" value="{{ $vessel->id }}" name="vesselId" id="vesselId" hidden>
                           <!-- MONTH -->

                           <div class="mr-2">

                              <select class="form-select form-select-sm modern-filter-select" name="month">

                                 <option {{ $month == 1 ? 'selected' : '' }} value="1">📅 Januari</option>
                                 <option {{ $month == 2 ? 'selected' : '' }} value="2">📅 Februari</option>
                                 <option {{ $month == 3 ? 'selected' : '' }} value="3">📅 Maret</option>
                                 <option {{ $month == 4 ? 'selected' : '' }} value="4">📅 April</option>
                                 <option {{ $month == 5 ? 'selected' : '' }} value="5">📅 Mei</option>
                                 <option {{ $month == 6 ? 'selected' : '' }} value="6">📅 Juni</option>
                                 <option {{ $month == 7 ? 'selected' : '' }} value="7">📅 Juli</option>
                                 <option {{ $month == 8 ? 'selected' : '' }} value="8">📅 Agustus</option>
                                 <option {{ $month == 9 ? 'selected' : '' }} value="9">📅 September</option>
                                 <option {{ $month == 10 ? 'selected' : '' }} value="10">📅 Oktober</option>
                                 <option {{ $month == 11 ? 'selected' : '' }} value="11">📅 November</option>
                                 <option {{ $month == 12 ? 'selected' : '' }} value="12">📅 Desember</option>

                              </select>

                           </div>

                           <!-- YEAR -->
                           <div class="mr-2">

                              <select class="form-select form-select-sm modern-filter-select" name="year">
                                 <option {{ $year == 2026 ? 'selected' : '' }} value="2026">📅 2026</option>
                              </select>

                           </div>

                           <!-- BUTTON -->
                           <button class="btn btn-primary btn-sm rounded-pill px-3 mt-2 shadow-sm" type="submit">

                              <i class="fa fa-search mr-1"></i>
                              Apply

                           </button>
                        

                     </div>

                  </div>
                  </form>

                  <style>
                     .filter-box{
                        background: rgba(255,255,255,0.12);
                        padding: 10px 14px;
                        border-radius: 18px;
                        backdrop-filter: blur(10px);
                        border: 1px solid rgba(255,255,255,0.12);
                     }

                     .filter-label{
                        border-right: 1px solid rgba(255,255,255,0.15);
                        padding-right: 14px;
                     }

                     .filter-icon{
                        width: 38px;
                        height: 38px;
                        border-radius: 12px;
                        background: rgba(255,255,255,0.15);
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        color:white;
                     }

                     .modern-filter-select{
                        min-width: 120px;
                        border-radius: 12px;
                        border: none;
                        box-shadow: none !important;
                        font-weight: 600;
                        height: 38px;
                     }

                     .modern-filter-select:focus{
                        border:none;
                        box-shadow:none;
                     }
                  </style>

               </div>

            </div>

         </div>

         <!-- BODY -->
         <div class="card-body p-4">

            <!-- SUMMARY -->
            {{-- <div class="row mb-4">

               <div class="col-md-4 mb-3">

                  <div class="summary-box">

                     <div class="summary-icon bg-primary bg-opacity-10 text-primary">
                        <i class="fa fa-file-alt"></i>
                     </div>

                     <small class="text-muted">
                        Total VDR
                     </small>

                     <h3 class="fw-bold mb-0 mt-1">
                        25 / 30
                     </h3>

                  </div>

               </div>

               <div class="col-md-4 mb-3">

                  <div class="summary-box">

                     <div class="summary-icon bg-success bg-opacity-10 text-success">
                        <i class="fa fa-check-circle"></i>
                     </div>

                     <small class="text-muted">
                        Approved
                     </small>

                     <h3 class="fw-bold mb-0 mt-1">
                        18 VDR
                     </h3>

                  </div>

               </div>

               <div class="col-md-4 mb-3">

                  <div class="summary-box">

                     <div class="summary-icon bg-warning bg-opacity-10 text-warning">
                        <i class="fa fa-clock"></i>
                     </div>

                     <small class="text-muted">
                        Waiting Review
                     </small>

                     <h3 class="fw-bold mb-0 mt-1">
                        7 VDR
                     </h3>

                  </div>

               </div>

            </div> --}}

            <!-- PROGRESS -->

            <div class="row">
               <div class="col-md-6">
                  <div class="mb-4">

                     <div class="d-flex flex-wrap justify-content-between align-items-center">

                        <!-- LEFT -->
                        <div class="d-flex align-items-center">

                           <!-- ICON -->
                           <div class="progress-mini-icon mr-3">
                              <i class="fa fa-chart-line"></i>
                           </div>

                           <!-- INFO -->
                           <div>
                              <small>Total VDR</small>
                              <h3>{{$totalVdrs}} / {{$totalDays}}</h3>
                              {{-- <h6 class="fw-bold mb-1">
                                 Progress Timesheet Bulanan
                              </h6>

                              <div class="d-flex flex-wrap align-items-center">

                                 <span class="mini-stat mr-2">

                                    <i class="fa fa-file-alt text-primary mr-1"></i>
                                    <b>{{$totalVdrs}}</b> VDR

                                 </span>

                                 <span class="mini-stat">

                                    <i class="fa fa-calendar-alt text-success mr-1"></i>
                                    <b>{{$totalDays}}</b> Hari

                                 </span>

                              </div> --}}

                           </div>

                        </div>

                        @php
                              if($percent == 100){
                                 $bg = 'primary';
                              } else {
                                 $bg = 'info';
                              }
                           @endphp

                        <!-- RIGHT -->
                        <div class="text-right mt-2 mt-md-0">

                           <div class="progress-value text-{{ $bg }}">
                              {{$percent}}%
                           </div>

                           <small class="text-muted">
                              Completion
                           </small>

                        </div>

                     </div>

                     <!-- PROGRESS -->
                     <div class="mt-3">

                        <div class="progress progress-modern">
                        

                           <div 
                              class="progress-bar progress-bar-striped progress-bar-animated bg-{{ $bg }}"
                              style="width:{{$percent}}%">
                           </div>

                        </div>

                     </div>

                  </div>
               </div>

               <div class="col-md-6">
                  <div class="note-box">

                     <div class="d-flex align-items-center">

                        <!-- ICON -->
                        <div class="note-icon mr-2">
                           <i class="fa fa-info-circle"></i>
                        </div>

                        <!-- TEXT -->
                        <small class="text-muted mb-0">
                           VDR yang ditampilkan telah melewati seluruh proses validasi dan approval.
                        </small>

                     </div>

                  </div>

                  <style>
                     .note-box{
                        background:#f8fafc;
                        border:1px solid #e2e8f0;
                        border-radius:14px;
                        padding:12px 14px;
                     }

                     .note-icon{
                        width:34px;
                        height:34px;
                        border-radius:10px;
                        background:#e0f2fe;
                        color:#0284c7;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        font-size:15px;
                        flex-shrink:0;
                     }
                  </style>
               </div>
            </div>
            
            

            

            <style>
               .timesheet-progress-box{
                  background:#fff;
                  border-radius:18px;
                  padding:18px 20px;
                  border:1px solid #edf2f7;
                  box-shadow:0 4px 15px rgba(0,0,0,0.04);
               }

               .progress-mini-icon{
                  width:50px;
                  height:50px;
                  border-radius:14px;
                  background:rgba(13,110,253,0.1);
                  color:#0d6efd;
                  display:flex;
                  align-items:center;
                  justify-content:center;
                  font-size:20px;
               }

               .mini-stat{
                  background:#f8fafc;
                  border-radius:30px;
                  padding:5px 12px;
                  font-size:13px;
                  color:#475569;
                  border:1px solid #edf2f7;
               }

               .progress-value{
                  font-size:28px;
                  font-weight:800;
                  line-height:1;
                  color:#0d6efd;
               }

               .progress-modern{
                  height:12px;
                  border-radius:30px;
                  background:#e2e8f0;
                  overflow:hidden;
               }

               .progress-modern .progress-bar{
                  border-radius:30px;
               }
            </style>

            <!-- TABLE -->
            <div class="table-responsive">

               <table class="table border table-striped table-sm align-middle vdr-table">

                  <thead class="table-light">
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
                              <a href="{{route('document.vdr', enkripRambo($vdr->id))}}" target="_blank">{{formatDate($vdr->date)}}</a>
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
                           <td class=" border">
                              {{ $vdr->getFuelRemark() }}
                           </td>
                        </tr>
                  @endforeach

                  </tbody>

               </table>

            </div>

         </div>

      </div>

   </div>
</section>



  
@endsection



