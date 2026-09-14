@extends('layouts.stisla.app-main')
@section('title')
   Home Page
@endsection

@section('content')

<style>
.vessel-card {
   transition: all 0.2s ease;
}
.vessel-card:hover {
   transform: translateY(-3px);
   box-shadow: 0 8px 20px rgba(0,0,0,0.08);
}
</style>


<style>
.table-container {
   max-height: 320px;
   overflow-y: auto;
}

/* Hover lebih halus */
.table-hover tbody tr:hover {
   background-color: rgba(13, 110, 253, 0.04);
}

/* Sticky header lebih clean */
thead.sticky-top th {
   background: #f8f9fa;
   z-index: 2;
}
</style>


<style>
.vdr-row {
   transition: all 0.2s ease;
}

.vdr-row:hover {
   background-color: rgba(13, 110, 253, 0.04);
}

.icon-box {
   width: 40px;
   height: 40px;
   background: rgba(13, 110, 253, 0.1);
   border-radius: 10px;
   display: flex;
   align-items: center;
   justify-content: center;
}
</style>

<style>
.welcome-v2 {
    border-radius: 16px;
    overflow: hidden;
    transition: 0.3s;
}

.welcome-v2:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 25px rgba(0,0,0,0.08);
}

/* TOP */
.top-section {
    padding: 15px;
    background: linear-gradient(135deg, #f8f9fa, #eef2f7);
}

.avatar {
    width: 50px;
    height: 50px;
    background: #2a5298;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* JOBDESK */
.jobdesk-box {
    background: #f8f9fa;
    padding: 12px;
    border-radius: 10px;
}

/* STEP FLOW */
.step-flow {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.step-item {
    display: flex;
    align-items: center;
    gap: 10px;
}

.step-icon {
    width: 35px;
    height: 35px;
    border-radius: 8px;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* ALERT */
.alert-box {
    background: #fff3cd;
    padding: 8px 10px;
    border-radius: 8px;
}

/* BUTTON */
.btn-action {
    border-radius: 10px;
    font-weight: 600;
    transition: 0.3s;
}

.btn-action:hover {
    transform: scale(1.02);
}
</style>


<style>
.table-header {
    border-bottom: 1px solid #eee;
    padding-bottom: 10px;
}

.filter-select {
    min-width: 120px;
    border-radius: 8px;
}

.table-header h5 {
    font-size: 16px;
}

.badge {
    font-weight: 500;
}
</style>


   <section class="section">
      <div class="section-body">
         <div class="row"> 
            <div class="col-md-3">
                  <div class="card welcome-v2 shadow-lg">

        <!-- TOP SECTION -->
        <div class="top-section d-flex align-items-center">
            <div class="avatar">
                <i class="fa fa-user"></i>
            </div>
            <div class="ml-3">
                <span class="mb-0 text-muted">Selamat Datang,</span>
                <h5 class="fw-bold mb-0">{{ Auth::user()->name ?? 'User' }}</h5>
                <small class="text-primary">
                    <i class="fa fa-briefcase"></i> Timesheet Reviewer
                </small>
            </div>
        </div>

        <!-- BODY -->
        <div class="card-body pt-2">

            <!-- JOBDESK -->
            {{-- <div class="jobdesk-box mb-3">
                <div class="d-flex align-items-center mb-2">
                    <i class="fa fa-tasks text-primary me-2"></i>
                    <strong>Jobdesk Anda</strong>
                </div>
                <p class="text-muted small mb-0">
                    Melakukan <b>review</b> dan <b>validasi cost summary</b> dari office kapal, 
                    memastikan kesesuaian antara <b>budget</b> dan <b>realisasi</b>.
                </p>
            </div> --}}

            <!-- STEP / FLOW -->
            <div class="step-flow mb-3">

                <div class="step-item">
                    <div class="step-icon bg-primary">
                        <i class="fa fa-file-alt"></i>
                    </div>
                    <div>
                        <small class="fw-bold">Timesheet</small><br>
                        <small class="text-muted">Menerima laporan timesheet dari office kapal</small>
                    </div>
                </div>

                <div class="step-item">
                    <div class="step-icon bg-success">
                        <i class="fa fa-eye"></i>
                    </div>
                    <div>
                        <small class="fw-bold">Monitoring</small><br>
                        <small class="text-muted">Meninjau progress semua timesheet</small>
                    </div>
                </div>

                {{-- <div class="step-item">
                    <div class="step-icon bg-danger">
                        <i class="fa fa-search"></i>
                    </div>
                    <div>
                        <small class="fw-bold">Validasi</small><br>
                        <small class="text-muted">Cek selisih biaya</small>
                    </div>
                </div> --}}

            </div>

            <!-- ALERT -->
            {{-- <div class="alert-box d-flex align-items-center mb-3">
                <i class="fa fa-clock text-warning mr-2"></i>
                <small class="text-muted">
                    Terdapat <b>5 laporan</b> menunggu review
                </small>
            </div> --}}

            <!-- ACTION -->
            <a href="#" class="btn btn-primary w-100 btn-action">
                <i class="fa fa-check-circle me-2"></i> Mulai Monitoring
            </a>

        </div>
    </div>

               



            
            </div>
   <div class="col-md-9">
      
      




      <div class="card">
         {{-- <div class="card-header">
            <h3>VDR LIST</h3>
         </div> --}}
         <div class="card-body">
            {{-- <span class="badge badge-info"><b>VDR LIST</b></span> --}}
            <div class=" mb-2">

               <style>
                  .timesheet-header-clean{
                     background:#fff;
                     border-radius:22px;
                     padding:22px 24px;
                     border:1px solid #edf2f7;
                     box-shadow:0 6px 20px rgba(0,0,0,0.04);
                  }

                  .header-icon{
                     width:60px;
                     height:60px;
                     border-radius:18px;
                     background:rgba(13,110,253,0.10);
                     color:#0d6efd;
                     display:flex;
                     align-items:center;
                     justify-content:center;
                     font-size:24px;
                  }

                  .header-chip{
                     background:#f8fafc;
                     border:1px solid #edf2f7;
                     border-radius:30px;
                     padding:6px 12px;
                     font-size:12px;
                     font-weight:600;
                     color:#475569;
                     display:inline-flex;
                     align-items:center;
                     margin-right:8px;
                     margin-top:8px;
                  }

                  .filter-wrapper{
                     background:#f8fafc;
                     border:1px solid #edf2f7;
                     border-radius:18px;
                     padding:10px;
                  }

                  .modern-select{
                     border-radius:12px;
                     border:1px solid #e2e8f0;
                     min-width:130px;
                     height:40px;
                     font-weight:600;
                     box-shadow:none !important;
                  }

                  .modern-select:focus{
                     border-color:#0d6efd;
                     box-shadow:none;
                  }

                  .btn-filter{
                     height:40px;
                     border-radius:12px;
                     padding:0 16px;
                     font-weight:600;
                  }
               </style>

               <div class="">

                  <div class="d-flex flex-wrap justify-content-between align-items-center">

                     <!-- LEFT -->
                     <div class="d-flex align-items-center flex-wrap">

                        <!-- ICON -->
                        <div class="header-icon mr-3 mb-2">
                           <i class="fa fa-file-invoice-dollar"></i>
                        </div>

                        <!-- CONTENT -->
                        <div class="mb-2">

                           <h4 class="fw-bold mb-1">
                              Timesheet Monitoring
                           </h4>

                           <small class="text-muted d-block">
                              Monitoring & validasi laporan timesheet kapal
                           </small>

                           <!-- CHIPS -->
                           <div class="d-flex flex-wrap align-items-center mt-2">

                              <div class="header-chip">
                                 <i class="fa fa-calendar-alt mr-2 text-primary"></i>
                                 {{ \Carbon\Carbon::create()->month($month)->translatedFormat('F') }} {{ $year }}
                              </div>

                              <div class="header-chip">
                                 <i class="fa fa-ship mr-2 text-success"></i>
                                 {{ count($vessels) }} Kapal
                              </div>

                           </div>

                        </div>

                     </div>

                     <!-- RIGHT -->
                     <div class="mt-3 mt-md-0">

                        <form action="{{ route('timesheet.filter') }}" method="POST">

                           @csrf
                           @method('PUT')

                           <div class="filter-wrapper d-flex flex-wrap align-items-center">

                              <!-- MONTH -->
                              <select class="form-select modern-select mr-2 mb-2 mb-md-0" name="month">

                                 <option {{ $month == 1 ? 'selected' : '' }} value="1">Januari</option>
                                 <option {{ $month == 2 ? 'selected' : '' }} value="2">Februari</option>
                                 <option {{ $month == 3 ? 'selected' : '' }} value="3">Maret</option>
                                 <option {{ $month == 4 ? 'selected' : '' }} value="4">April</option>
                                 <option {{ $month == 5 ? 'selected' : '' }} value="5">Mei</option>
                                 <option {{ $month == 6 ? 'selected' : '' }} value="6">Juni</option>
                                 <option {{ $month == 7 ? 'selected' : '' }} value="7">Juli</option>
                                 <option {{ $month == 8 ? 'selected' : '' }} value="8">Agustus</option>
                                 <option {{ $month == 9 ? 'selected' : '' }} value="9">September</option>
                                 <option {{ $month == 10 ? 'selected' : '' }} value="10">Oktober</option>
                                 <option {{ $month == 11 ? 'selected' : '' }} value="11">November</option>
                                 <option {{ $month == 12 ? 'selected' : '' }} value="12">Desember</option>

                              </select>

                              <!-- YEAR -->
                              <select class="form-select modern-select mr-2 mb-2 mb-md-0" name="year">

                                 @for($y = date('Y'); $y >= 2020; $y--)
                                    <option {{ $year == $y ? 'selected' : '' }} value="{{ $y }}">
                                       {{ $y }}
                                    </option>
                                 @endfor

                              </select>

                              <!-- BUTTON -->
                              <button class="btn btn-primary btn-filter">

                                 <i class="fa fa-search mr-1"></i>
                                 Filter

                              </button>

                           </div>

                        </form>

                     </div>

                  </div>

               </div>

            </div>
            <hr>


             <div class="table-responsive">
               <table class="datatables-vdr">

                     <thead class="table-light">
                        <tr>
                           <th class="px-3">Nama Kapal</th>
                           <th>Owner</th>
                           <th>Tipe/Kontrak</th>
                           <th>Total VDR</th>
                        </tr>
                     </thead>

                     <tbody>
                        @foreach ($vessels as $v)
                            
                        
                        <tr>
                           <td class="fw-semibold px-3 border-bottom">
                              <a href="{{ route('timesheet.vessel.pdf', [enkripRambo($v->id), enkripRambo($month), enkripRambo($year)]) }}" target="_blank" class="btn btn-light border mr-2 btn-sm rounded-pill shadow-sm">

                                 <i class="fa fa-file-pdf "></i>
                                

                              </a>
                              <a href="{{ route('timesheet.vessel.detail', [enkripRambo($v->id), enkripRambo($month), enkripRambo($year)]) }}"> {{ $v->name }}</a></td>
                           <td class=" border-bottom">{{ $v->office->name ?? '' }}</td>
                           <td class=" border-bottom">
                              {{ $v->contract_type }}
                           </td>
                           <td class="border-bottom py-1" style="min-width: 220px;">
                              @php
                                 $current = $v->getTotalVdrs($month, $year);
                                 $target = $totalDays;
                                 $percent = round(($current / $target) * 100);
                                 if($percent == 100){
                                    $bg = 'primary';
                                 } else  {
                                    $bg = 'info';
                                 }
                              @endphp

                              

                              <div class="d-flex justify-content-between align-items-center mb-1">
                                 <div>
                                    <i class="fas fa-file-alt text-primary me-1"></i>
                                    <span class="fw-bold">{{ $current }}/{{ $target }}</span>
                                    <small class="text-muted">VDR </small>
                                 </div>

                                 <span class="badge badge-{{ $bg }} px-2 py-1">
                                    {{ $percent }}%
                                 </span>
                              </div>

                              <div class="progress" style="height: 10px; border-radius: 20px;">
                                 <div 
                                    class="progress-bar progress-bar-striped progress-bar-animated bg-{{ $bg }}"
                                    role="progressbar"
                                    style="width: {{ $percent }}%;"
                                    aria-valuenow="{{ $percent }}"
                                    aria-valuemin="0"
                                    aria-valuemax="100">
                                 </div>
                              </div>

                              {{-- <small class="text-muted d-block mt-1">
                                 <i class="fas fa-chart-line text-success me-1"></i>
                                 {{ $current }} VDR selesai dari target {{ $target }}
                              </small> --}}
                           </td>
                           
                         
                        </tr>
                        @endforeach

                        

                     </tbody>

                  </table>
            </div>
            
            {{-- <div class="table-responsive">
               <table class="table table-sm align-middle mb-2">

                     <thead class="table-light">
                        <tr>
                           <th class="px-3">Kapal</th>
                           <th>Owner</th>
                           <th>Bulan</th>
                           <th>Tahun</th>
                           <th>VDR</th>
                           <th colspan="2" class="text-center">Status Approval</th>
                        </tr>
                     </thead>

                     <tbody>
                        @foreach ($vessels as $v)
                            
                        
                        <tr>
                           <td class="fw-semibold px-3 border-bottom">{{ $v->name }}</td>
                           <td class=" border-bottom">{{ $v->office->name ?? '' }}</td>
                           <td class="border-bottom">
                              
                              <a href="{{ route('costsummary.detail', enkripRambo(1)) }}">Januari</a>
                           </td>
                           <td class="border-bottom">2026</td>
                           <td class="border-bottom">30/30</td>
                           <td class="border-bottom">
                              <div class="d-flex justify-content-between align-items-center p-1 rounded bg-light">

                                 <!-- LEFT -->
                                 <div class="d-flex align-items-center">
                                    
                                    <!-- Rounded Indicator -->
                                    <div class="mr-2" style="width:6px; height:24px; border-radius:10px; background:#6c757d;"></div>

                                    <!-- Title -->
                                    <span class="fw-semibold">
                                       Timeshift
                                    </span>

                                 </div>

                                 <!-- RIGHT -->
                                 <span class="badge badge-secondary bg-opacity-10 ">
                                    <i class="fa fa-edit"></i> Draft
                                 </span>

                              </div>
                           </td>
                           <td class="border-bottom">
                              
                              <div class="d-flex justify-content-between align-items-center p-1 rounded bg-light">

                                 <!-- LEFT -->
                                 <div class="d-flex align-items-center">
                                    
                                    <!-- Rounded Indicator -->
                                    <div class="mr-2" style="width:6px; height:24px; border-radius:10px; background:#6c757d;"></div>

                                    <!-- Title -->
                                    <span class="fw-semibold">
                                       Cost Summary
                                    </span>

                                 </div>

                                 <!-- RIGHT -->
                                 <span class="badge badge-warning bg-opacity-10 ">
                                 <i class="fa fa-clock"></i> Waiting
                              </span>

                              </div>
                           </td>
                         
                        </tr>
                        @endforeach

                        

                     </tbody>

                  </table>
            </div> --}}
         </div>
      </div>
      
   </div>
   
</div>
<hr>
<small>Please pay attention to the alert table on the right</small>


      
      </div>
   </section>



<div class="modal fade" id="generateCostSummary" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <form action="#" method="POST">
         @csrf

         <div class="modal-content border-0 shadow">

            <!-- HEADER -->
            <div class="modal-header border-0 pb-0">
               <h5 class="modal-title fw-bold">
                  <i class="fa fa-chart-line text-primary"></i> Generate Cost Summary
               </h5>

               <button type="button" class="close" data-dismiss="modal">
                  <span>&times;</span>
               </button>
            </div>

            <!-- SUBTITLE -->
            <div class="px-4">
               <small class="text-muted">
                  Pilih periode bulan dan tahun untuk membuat laporan biaya operasional kapal
               </small>
            </div>

            <!-- BODY -->
            <div class="modal-body pt-3">

               <div class="row">

                  <!-- BULAN -->
                  <div class="col-md-6 mb-3">
                     <label class="form-label fw-semibold">
                        <i class="fa fa-calendar-alt text-primary"></i> Bulan
                     </label>
                     <select class="form-control" name="month" required>
                        <option value="">-- Pilih Bulan --</option>
                        <option>Januari</option>
                        <option>Februari</option>
                        <option>Maret</option>
                        <option>April</option>
                        <option>Mei</option>
                        <option>Juni</option>
                        <option>Juli</option>
                        <option>Agustus</option>
                        <option>September</option>
                        <option>Oktober</option>
                        <option>November</option>
                        <option>Desember</option>
                     </select>
                  </div>

                  <!-- TAHUN -->
                  <div class="col-md-6 mb-3">
                     <label class="form-label fw-semibold">
                        <i class="fa fa-calendar text-primary"></i> Tahun
                     </label>
                     <select class="form-control" name="year" required>
                        <option value="">-- Pilih Tahun --</option>
                        <option>2026</option>
                        <option>2025</option>
                        <option>2024</option>
                     </select>
                  </div>

               </div>

               <!-- INFO BOX -->
               <div class="alert alert-light border mt-2 mb-0">
                  <small class="text-muted">
                     <i class="fa fa-info-circle text-primary"></i>
                     Sistem akan menghasilkan ringkasan biaya kapal dari data VDR berdasarkan periode yang dipilih.
                  </small>
               </div>

            </div>

            <!-- FOOTER -->
            <div class="modal-footer border-0 pt-2">
               <button type="button" class="btn btn-light" data-dismiss="modal">
                  <i class="fa fa-times"></i> Batal
               </button>

               <button type="submit" class="btn btn-primary">
                  <i class="fa fa-play-circle"></i> Generate
               </button>
            </div>

         </div>
      </form>
   </div>
</div>

  
@endsection



