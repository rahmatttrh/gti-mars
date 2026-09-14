@extends('layouts.stisla.app-main')
@section('title')
   Home Page
@endsection

@section('content')
<style>
   .stat-card {
    border-radius: 16px;
    transition: 0.3s;
    background: #fff;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
}

/* ICON */
.stat-icon {
    width: 55px;
    height: 55px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
}

/* ANGKA */
.stat-number h4 {
    font-size: 24px;
}


.welcome-card {
    border: none;
    border-radius: 10px;
    background: linear-gradient(135deg, #fd0d0d, #dc7b47);
    color: white;
    overflow: hidden;
    position: relative;
}
</style>

<style>
   .activity-wrapper {
       border-radius: 12px;
   }
   
   /* HEADER */
   .activity-header h6 {
       font-size: 14px;
   }
   
   /* BOX */
   .activity-box {
       max-height: 350px;
       overflow-y: auto;
       padding-right: 5px;
   }
   
   /* ITEM */
   .activity-item {
       display: flex;
       gap: 10px;
       padding: 10px 5px;
       border-bottom: 1px solid #f1f1f1;
       transition: 0.2s;
   }
   
   .activity-item:hover {
       background: #f9fafc;
   }
   
   /* ICON */
   .activity-icon {
       width: 35px;
       height: 35px;
       border-radius: 50%;
       color: white;
       display: flex;
       align-items: center;
       justify-content: center;
       font-size: 14px;
   }
   
   /* CONTENT */
   .activity-content {
       flex: 1;
   }
   
   /* SCROLL STYLE */
   .activity-box::-webkit-scrollbar {
       width: 5px;
   }
   
   .activity-box::-webkit-scrollbar-thumb {
       background: #ccc;
       border-radius: 10px;
   }
   </style>
   <section class="section">
      <div class="section-body">
         <div class="row">
            <div class="col-md-3">
               <div class="card welcome-card shadow">

                  <div class="card-body position-relative">

                     <!-- ICON BESAR -->
                     <i class="fas fa-gas-pump welcome-icon"></i>

                     <!-- HEADER -->
                     <div class="mb-2">
                           <small class="text-light">Welcome back 👋</small>
                           <h4 class="mb-0 fw-bold">
                              {{ auth()->user()->name }}
                           </h4>
                     </div>

                     <!-- DIVIDER -->
                     <div class="divider"></div>

                     <!-- JOBDESK NOTE -->
                     <div class="alert alert-light border-0 py-2 px-3 mb-3">
                        <div class="d-flex align-items-start">
                           <i class="fas fa-clipboard-check text-primary mr-2 mt-1"></i>
                           <div>
                              <strong class="text-dark">Your Responsibility</strong>
                              <div class="small text-muted">
                                 <b>Reviewer Daily Operation Performance</b> <br>
                                    Melakukan review terhadap Summary Daily Operating Data | Summary of Daily Fuel, Water, and Cargoes Remaining | Detail Operational Activity
                              </div>
                           </div>
                        </div>
                  </div>

                     <!-- PIC -->
                     <div>
                           {{-- <small class="text-light">PIC of Fleet Control</small> --}}
                           <div class="pic-list mt-2">
                              <span value="YFH">Ridwan Gunawan</span>
                              <span value="ESN">David Thompson</span>
                           </div>
                     </div>

                  </div>

               </div>

               <div class="card shadow-lg">
                  <div class="card-body">

                 
                  <div class="activity-wrapper">

                     <!-- HEADER -->
                     <div class="activity-header d-flex justify-content-between align-items-center mb-2">
                        <div>
                              <h6 class="mb-0 fw-bold">
                                 <i class="fa fa-history text-primary me-1"></i> Log Activity System
                              </h6>
                              <small class="text-muted">Riwayat aktivitas terbaru pengguna</small>
                        </div>

                        <span class="badge bg-light text-dark border">
                              {{ count($logs) }} Activity
                        </span>
                     </div>

                     <!-- CONTENT -->
                     <div class="activity-box">

                        @foreach ($logs as $log)
                        <div class="activity-item">

                              <!-- ICON -->
                              <div class="activity-icon bg-primary">
                                 <i class="fa fa-user"></i>
                              </div>

                              <!-- CONTENT -->
                              <div class="activity-content">

                                 <div class="d-flex justify-content-between">
                                    <strong class="small">
                                          {{ $log->user->name ?? '-' }}
                                    </strong>
                                    <small class="text-muted">
                                          {{ formatDateTime($log->created_at) }}
                                    </small>
                                 </div>

                                 
                                 <div class="small text-muted" style="">
                                    {{ $log->action }}
                                    @if ($log->vdr_id)
                                          <span class="">
                                             {{ $log->vdr->code ?? '' }}
                                          </span>
                                    @endif
                                 </div>

                              </div>
                        </div>
                        @endforeach

                     </div>
                  </div>
                </div>
               </div>

               
               
            </div>
            <div class="col-md-9">
               <div class="row ">
                  <div class="col-md-4">
                        <a href="{{route('vdr.pet.validation')}}" class="text-decoration-none">
                           <div class="card stat-card border-0 shadow-lg">

                                 <div class="card-body d-flex align-items-center justify-content-between">

                                    <!-- KIRI: ICON -->
                                    <div class="stat-icon bg-info-subtle text-info">
                                       <i class="fa fa-hourglass-half"></i>
                                    </div>

                                    <!-- TENGAH: TEXT -->
                                    <div class="text-center flex-grow-1">
                                       <div class="text-muted small">VDR Status</div>
                                       <h5 class="mb-0 fw-bold">Waiting</h5>
                                    </div>

                                    <!-- KANAN: ANGKA -->
                                    <div class="stat-number text-end">
                                       <h4 class="mb-0 fw-bold text-info">
                                             {{count($vdrs->where('status', 11))}}
                                       </h4>
                                    </div>

                                 </div>

                           </div>
                        </a>
                     {{-- <div class="card card-statistic-1 shadow-lg">
                        <a href="{{route('vdr.pet.validation')}}">
                           <div class="card-icon bg-info">
                           <i class="fas fa-user"></i>
                           </div>
                           <div class="card-wrap">
                           <div class="card-header">
                              
                              <h4>Waiting</h4>
                           </div>
                           <div class="card-body">
                              {{count($vdrs->where('status', 1))}}
                           </div>
                           </div>
                        </a>
                     </div> --}}
                  </div>
                  <div class="col-md-4">
                     {{-- <div class="card card-statistic-1 shadow-lg">
                        <a href="{{route('vdr.reject.list')}}">
                           <div class="card-icon bg-danger">
                           <i class="fas fa-bolt"></i>
                           </div>
                           <div class="card-wrap">
                           <div class="card-header">
                              
                              <h4>Rejected</h4>
                           </div>
                           <div class="card-body">
                              {{count($vdrs->where('status', 101))}}
                           </div>
                           </div>
                        </a>
                     </div> --}}
                        <a href="{{route('vdr.reject.list')}}" class="text-decoration-none">
                           <div class="card stat-card border-0 shadow-lg">

                                 <div class="card-body d-flex align-items-center justify-content-between">

                                    <!-- ICON -->
                                    <div class="stat-icon bg-danger-subtle text-danger">
                                       <i class="fa fa-exclamation-triangle"></i>
                                    </div>

                                    <!-- TEXT -->
                                    <div class="text-center flex-grow-1">
                                       <div class="text-muted small">VDR Status</div>
                                       <h6 class="mb-0 fw-bold text-danger">Rejected</h6>
                                    </div>

                                    <!-- ANGKA -->
                                    <div class="text-end">
                                       <h4 class="mb-0 fw-bold text-danger">
                                             {{count($vdrs->where('status', 101))}}
                                       </h4>
                                    </div>

                                 </div>

                           </div>
                        </a>
                  </div>
                  <div class="col-md-4">
                     {{-- <div class="card card-statistic-1 shadow-lg">
                        <a href="{{route('vdr.history.list')}}">
                           <div class="card-icon bg-success">
                           <i class="fas fa-user"></i>
                           </div>
                           <div class="card-wrap">
                           <div class="card-header">
                              
                              <h4>History</h4>
                           </div>
                           <div class="card-body">
                              {{count($vdrs->where('status', '>', 1))}}
                           </div>
                           </div>
                        </a>
                     </div> --}}
                        <a href="{{route('vdr.history.list')}}" class="text-decoration-none">
                           <div class="card stat-card border-0 shadow-lg">

                                 <div class="card-body d-flex align-items-center justify-content-between">

                                    <!-- ICON -->
                                    <div class="stat-icon bg-success-subtle text-success">
                                       <i class="fa fa-history"></i>
                                    </div>

                                    <!-- TEXT -->
                                    <div class="text-center flex-grow-1">
                                       <div class="text-muted small">VDR Data</div>
                                       <h6 class="mb-0 fw-bold text-success">History</h6>
                                    </div>

                                    <!-- ANGKA -->
                                    <div class="text-end">
                                       <h4 class="mb-0 fw-bold text-success">
                                             {{count($vdrs->where('status', '>', 1))}}
                                       </h4>
                                    </div>

                                 </div>

                           </div>
                        </a>
                  </div>
                  
               </div>
      
               <div class="card shadow">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="d-flex align-items-center gap-2 mb-2">
                              <i class="fa fa-check-circle text-primary mr-3"></i>
                              <div>
                                 <div class="fw-bold">Daftar VDR yang Memerlukan Persetujuan Anda</div>
                                 <small class="text-muted">
                                       Silahkan tinjau dan lakukan persetujuan untuk memastikan proses berjalan sesuai prosedur.
                                 </small>
                              </div>
                           </div>
                           <div class="table-responsive " >
                              <table class="datatables-3">
                                 
                                 <thead>
                                    {{-- <tr>
                                       <th colspan="3" style="color: #1f4481 !important">VDR yang membutuhkan approval anda</th>
                                    </tr> --}}
                                    <tr>
                                       {{-- <th>No</th> --}}
                                       
                                       {{-- <th>Vessel</th> --}}

                                       <th>VDR Number</th>
                                       <th>Date</th>
                                       <th>Dikirim pada</th>
                                       
                                       
                                       {{-- <th>Last Update</th> --}}
                                       <th class="text-center">Status</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($vdrValidations as $vdr)
                                       <tr>
                                        
                                          {{-- <td class="border-bottom">
                                             <a href="{{route('vdr.show.spa', [enkripRambo( $vdr->id), enkripRambo('index')])}}">{{$vdr->vessel->name ?? ''}}</a>
                                          </td> --}}
                                          <td class="border-bottom">
                                             <a href="{{route('vdr.show.spa', [enkripRambo( $vdr->id), enkripRambo('index')])}}">{{$vdr->code}}</a>
                                           </td>
                                          <td class="border-bottom">{{$vdr->date}}</td>
                                          <td class="border-bottom">{{$vdr->release_date}}</td>
                                          
                                          
                                          <td class="text-right border-bottom">
                                             <x-status-stisla.vdr :vdr="$vdr" />
                                          </td>
                                       </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
                        </div>
                        {{-- <div class="col-md-6">
                           <div class="table-responsive overflow-auto " style="height: 310px">
                              <table class="display  border">
                                 
                                 <thead>
                                    <tr>
                                       <th colspan="3" style="color: #1f4481 !important">VDR History</th>
                                    </tr>
                                    <tr>
                                      
                                       <th>Number</th>
                                      
                                       <th>Status</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($vdrs->where('status', '>', 1) as $vdr)
                                       <tr class="border" style="border: 1px black">
                                          <td><a href="{{route('vdr.show.spa', [enkripRambo( $vdr->id), enkripRambo('index')])}}">{{$vdr->code}}</a></td>
                                         
                                          <td>
                                             <x-status-stisla.vdr :vdr="$vdr" />
                                          </td>
                                       </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
                        </div> --}}
                     </div>
                     
                  </div>
               </div>


               <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                  <!-- Header Monitoring Modern -->
                  <div class="card-header bg-white py-2 px-3 border-bottom d-flex align-items-center justify-content-between">
                     <div class="d-flex align-items-center gap-2">
                           <div class="rounded-2 p-2 text-center me-2 mr-2" style="width: 36px; height: 36px; background-color: rgba(13, 110, 253, 0.1);">
                              <i class="fas fa-ship text-primary fs-6"></i>
                           </div>
                           <div>
                              <h6 class="fw-bold text-dark mb-0 fs-6">Monitoring VDR (Vessel Daily Report)</h6>
                              <small class="text-muted d-block" style="font-size: 0.7rem;">Pemantauan status laporan harian seluruh armada kapal</small>
                           </div>
                     </div>

                     <!-- Range Tanggal Badge -->
                     <span class="badge bg-light text-primary border border-primary-subtle px-2 py-1 font-weight-medium" style="font-size: 0.72rem;">
                           <i class="far fa-calendar-alt me-1 mr-1"></i> 16/09/2025 - {{ \Carbon\Carbon::now()->format('d/m/Y') }}
                     </span>
                  </div>

                  <!-- Table Body Compact -->
                  <div class="card-body ">
                     <div class="d-flex align-items-center mb-2">
                        <span class="fw-bold text-dark me-2 mr-2" style="font-size: 0.75rem;">
                              <i class="fas fa-project-diagram text-primary me-1 mr-1"></i> Flow Approval VDR:
                        </span>
                     </div>
                     <div class="d-flex flex-column gap-2">

                           <!-- 1. FLOW REGULAR -->
                           <div class=" d-flex flex-wrap align-items-center gap-2 mb-2">
                              <div class="d-flex align-items-center me-2 mr-2" style="min-width: 140px;">
                                 <span class="badge bg-primary-soft text-primary border border-primary-subtle px-2 py-1 rounded-2 w-100 text-start" style="font-size: 0.72rem; background-color: rgba(13, 110, 253, 0.08);">
                                       <i class="fas fa-file-alt me-1 mr-1"></i> Regular
                                 </span>
                              </div>
                              <div class="d-flex align-items-center flex-wrap gap-1">
                                 <span class="badge bg-info-soft text-info border px-2 py-1 rounded-pill" style="font-size: 0.72rem; background-color: rgba(13, 202, 240, 0.1);">
                                       <i class="fas fa-user-cog me-1 mr-1"></i> FM
                                 </span>
                                 <i class="fas fa-chevron-right text-muted mx-1" style="font-size: 0.65rem;"></i>
                                 <span class="badge bg-warning-soft text-warning border px-2 py-1 rounded-pill" style="font-size: 0.72rem; background-color: rgba(255, 193, 7, 0.15);">
                                       <i class="fas fa-ship me-1 mr-1"></i> Marine
                                 </span>
                                 <i class="fas fa-chevron-right text-muted mx-1" style="font-size: 0.65rem;"></i>
                                 <span class="badge bg-primary-soft text-primary border px-2 py-1 rounded-pill" style="font-size: 0.72rem; background-color: rgba(13, 110, 253, 0.1);">
                                       <i class="fas fa-user-tie me-1 mr-1"></i> Marine Rep
                                 </span>
                                 <i class="fas fa-chevron-right text-success mx-1" style="font-size: 0.65rem;"></i>
                                 <span class="badge bg-success text-white px-2 py-1 rounded-pill shadow-2xs" style="font-size: 0.72rem;">
                                       <i class="fas fa-check-circle me-1 mr-1"></i> Complete
                                 </span>
                              </div>
                           </div>

                           <!-- 2. FLOW IPB / TUG BOAT -->
                           <div class=" d-flex flex-wrap align-items-center gap-2 mb-2">
                              <div class="d-flex align-items-center me-2 mr-2" style="min-width: 140px;">
                                 <span class="badge bg-warning-soft text-dark border border-warning-subtle px-2 py-1 rounded-2 w-100 text-start" style="font-size: 0.72rem; background-color: rgba(255, 193, 7, 0.12);">
                                       <i class="fas fa-anchor me-1 mr-1 text-warning"></i> IPB / Tug Boat
                                 </span>
                              </div>
                              <div class="d-flex align-items-center flex-wrap gap-1">
                                 <span class="badge bg-info-soft text-info border px-2 py-1 rounded-pill" style="font-size: 0.72rem; background-color: rgba(13, 202, 240, 0.1);">
                                       <i class="fas fa-user-cog me-1 mr-1"></i> FM
                                 </span>
                                 <i class="fas fa-chevron-right text-muted mx-1" style="font-size: 0.65rem;"></i>
                                 <span class="badge bg-warning-soft text-warning border px-2 py-1 rounded-pill" style="font-size: 0.72rem; background-color: rgba(255, 193, 7, 0.15);">
                                       <i class="fas fa-broadcast-tower me-1 mr-1"></i> Radop
                                 </span>
                                 <i class="fas fa-chevron-right text-muted mx-1" style="font-size: 0.65rem;"></i>
                                 <span class="badge bg-warning-soft text-warning border px-2 py-1 rounded-pill" style="font-size: 0.72rem; background-color: rgba(255, 193, 7, 0.15);">
                                       <i class="fas fa-user-tie me-1 mr-1"></i> Suptent
                                 </span>
                                 <i class="fas fa-chevron-right text-muted mx-1" style="font-size: 0.65rem;"></i>
                                 <span class="badge bg-primary-soft text-primary border px-2 py-1 rounded-pill" style="font-size: 0.72rem; background-color: rgba(13, 110, 253, 0.1);">
                                       <i class="fas fa-user-shield me-1 mr-1"></i> Marine Rep
                                 </span>
                                 <i class="fas fa-chevron-right text-success mx-1" style="font-size: 0.65rem;"></i>
                                 <span class="badge bg-success text-white px-2 py-1 rounded-pill shadow-2xs" style="font-size: 0.72rem;">
                                       <i class="fas fa-check-circle me-1 mr-1"></i> Complete
                                 </span>
                              </div>
                           </div>

                           <!-- 3. FLOW NON PO -->
                           <div class=" d-flex flex-wrap align-items-center gap-2 mb-2">
                              <div class="d-flex align-items-center me-2 mr-2" style="min-width: 140px;">
                                 <span class="badge bg-secondary-soft text-dark border px-2 py-1 rounded-2 w-100 text-start" style="font-size: 0.72rem; background-color: rgba(108, 117, 125, 0.1);">
                                       <i class="fas fa-ship me-1 mr-1 text-secondary"></i> Non PO
                                 </span>
                              </div>
                              <div class="d-flex align-items-center flex-wrap gap-1">
                                 <span class="badge bg-info-soft text-info border px-2 py-1 rounded-pill" style="font-size: 0.72rem; background-color: rgba(13, 202, 240, 0.1);">
                                       <i class="fas fa-user-cog me-1 mr-1"></i> FM
                                 </span>
                                 
                                 <i class="fas fa-chevron-right text-muted mx-1" style="font-size: 0.65rem;"></i>
                                 <span class="badge bg-warning-soft text-warning border px-2 py-1 rounded-pill" style="font-size: 0.72rem; background-color: rgba(255, 193, 7, 0.15);">
                                       <i class="fas fa-user-tie me-1 mr-1"></i> Suptent
                                 </span>
                                 <i class="fas fa-chevron-right text-muted mx-1" style="font-size: 0.65rem;"></i>
                                 <span class="badge bg-warning-soft text-warning border px-2 py-1 rounded-pill" style="font-size: 0.72rem; background-color: rgba(255, 193, 7, 0.15);">
                                       <i class="fas fa-ship me-1 mr-1"></i> Marine
                                 </span>
                                 <i class="fas fa-chevron-right text-muted mx-1" style="font-size: 0.65rem;"></i>
                                 <span class="badge bg-primary-soft text-primary border px-2 py-1 rounded-pill" style="font-size: 0.72rem; background-color: rgba(13, 110, 253, 0.1);">
                                       <i class="fas fa-user-tie me-1 mr-1"></i> Marine Rep
                                 </span>
                                 <i class="fas fa-chevron-right text-success mx-1" style="font-size: 0.65rem;"></i>
                                 <span class="badge bg-success text-white px-2 py-1 rounded-pill shadow-2xs" style="font-size: 0.72rem;">
                                       <i class="fas fa-check-circle me-1 mr-1"></i> Complete
                                 </span>
                              </div>
                           </div>

                           <!-- 4. FLOW PATROL BOAT -->
                           <div class=" d-flex flex-wrap align-items-center gap-2 mb-2">
                              <div class="d-flex align-items-center me-2 mr-2" style="min-width: 140px;">
                                 <span class="badge bg-danger-soft text-danger border border-danger-subtle px-2 py-1 rounded-2 w-100 text-start" style="font-size: 0.72rem; background-color: rgba(220, 53, 69, 0.08);">
                                       <i class="fas fa-shield-alt me-1 mr-1"></i> Patrol Boat
                                 </span>
                              </div>
                              <div class="d-flex align-items-center flex-wrap gap-1">
                                 <span class="badge bg-info-soft text-info border px-2 py-1 rounded-pill" style="font-size: 0.72rem; background-color: rgba(13, 202, 240, 0.1);">
                                       <i class="fas fa-user-cog me-1 mr-1"></i> FM
                                 </span>
                                 
                                 <i class="fas fa-chevron-right text-muted mx-1" style="font-size: 0.65rem;"></i>
                                 <span class="badge bg-warning-soft text-warning border px-2 py-1 rounded-pill" style="font-size: 0.72rem; background-color: rgba(255, 193, 7, 0.15);">
                                       <i class="fas fa-users-cog me-1 mr-1"></i> Lead Command
                                 </span>
                                 <i class="fas fa-chevron-right text-muted mx-1" style="font-size: 0.65rem;"></i>
                                 <span class="badge bg-primary-soft text-primary border px-2 py-1 rounded-pill" style="font-size: 0.72rem; background-color: rgba(13, 110, 253, 0.1);">
                                       <i class="fas fa-user-shield me-1 mr-1"></i> Suptent Security
                                 </span>
                                 <i class="fas fa-chevron-right text-success mx-1" style="font-size: 0.65rem;"></i>
                                 <span class="badge bg-success text-white px-2 py-1 rounded-pill shadow-2xs" style="font-size: 0.72rem;">
                                       <i class="fas fa-check-circle me-1 mr-1"></i> Complete
                                 </span>
                              </div>
                           </div>

                     </div>
                     <div class="table-responsive">
                           <table class="table table-sm table-hover align-middle mb-0 datatables-vdr-monitoring">
                              <thead class="bg-light text-muted border-bottom">
                                 <tr>
                                       <th class="py-2 px-3 text-uppercase fw-bold" style="font-size: 0.7rem; letter-spacing: 0.5px;">VESSEL / KAPAL</th>
                                       <th class="py-2 text-uppercase fw-bold text-center" style="font-size: 0.7rem; letter-spacing: 0.5px;">TOTAL</th>
                                       <th class="py-2 text-uppercase fw-bold" style="font-size: 0.7rem; letter-spacing: 0.5px;">LAST VDR</th>
                                       <th class="py-2 text-uppercase fw-bold" style="font-size: 0.7rem; letter-spacing: 0.5px;">RELEASE AT</th>
                                       <th class="py-2 text-uppercase fw-bold" style="font-size: 0.7rem; letter-spacing: 0.5px;">GAP</th>
                                       <th class="py-2 text-uppercase fw-bold text-center text-secondary" style="font-size: 0.68rem;">DRAFT</th>
                                       <th class="py-2 text-uppercase fw-bold text-center text-danger" style="font-size: 0.68rem;">REJECTED</th>
                                       <th class="py-2 text-uppercase fw-bold text-center text-warning" style="font-size: 0.68rem;">PET</th>
                                       <th class="py-2 text-uppercase fw-bold text-center text-info" style="font-size: 0.68rem;">MARINE</th>
                                       <th class="py-2 text-uppercase fw-bold text-center text-primary" style="font-size: 0.68rem;">SUPTENT</th>
                                       <th class="py-2 text-uppercase fw-bold text-center text-success" style="font-size: 0.68rem;">COMPLETE</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach ($vessels as $vessel)
                                       @php
                                          $vdrs = $vessel->getVdrs();
                                          $lastVdr = $vessel->getVdrLast();
                                          $draftCount = count($vdrs->where('status', 0));
                                          $rejectCount = count($vessel->getRejectVdrs());
                                          $petCount = count($vessel->getPetVdrs());
                                          $marineCount = count($vessel->getMarineVdrs());
                                          $suptentCount = count($vessel->getSuptentVdrs());
                                          $completeCount = count($vessel->getCompleteVdrs());
                                       @endphp

                                       <tr class="align-middle" style="font-size: 0.8rem;">
                                          <!-- Nama Kapal -->
                                          <td class="px-3 py-1">
                                             <a href="{{ route('vdr.statistic.vessel', enkripRambo($vessel->id)) }}" class="fw-bold text-primary text-decoration-none">
                                                   <i class="fas fa-ship text-secondary me-1 mr-1 opacity-50" style="font-size: 0.72rem;"></i>
                                                   {{ $vessel->name }}
                                             </a>
                                          </td>

                                          <!-- Total VDR -->
                                          <td class="text-center py-1">
                                             <span class="badge bg-light text-dark border px-2 py-1 fw-bold" style="font-size: 0.72rem;">
                                                   {{ count($vdrs) }}
                                             </span>
                                          </td>

                                          <!-- Last VDR Date -->
                                          <td class="py-1 text-nowrap">
                                             @if ($lastVdr?->date)
                                                   <span class="text-dark fw-medium">{{ formatDate($lastVdr->date) }}</span>
                                             @else
                                                   <span class="text-muted" style="font-size: 0.72rem;">-</span>
                                             @endif
                                          </td>

                                          <!-- Release Date -->
                                          <td class="py-1 text-nowrap">
                                             @if ($lastVdr?->release_date)
                                                   <span class="text-muted" style="font-size: 0.75rem;">{{ formatDateTimeB($lastVdr->release_date) }}</span>
                                             @else
                                                   <span class="text-muted" style="font-size: 0.72rem;">-</span>
                                             @endif
                                          </td>

                                          <!-- Release Gap -->
                                          <td class="py-1 text-nowrap">
                                             @if ($lastVdr)
                                                   <span class="badge bg-light text-dark border px-1 py-1 font-weight-normal" style="font-size: 0.7rem;">
                                                      <i class="far fa-clock text-secondary me-1 mr-1"></i>{{ $lastVdr->getDistance() }}
                                                   </span>
                                             @else
                                                   <span class="text-muted" style="font-size: 0.72rem;">-</span>
                                             @endif
                                          </td>

                                          <!-- Draft Status -->
                                          <td class="text-center py-1">
                                             <span class="badge {{ $draftCount > 0 ? 'bg-secondary text-white' : 'bg-light text-muted' }} px-2 py-1" style="font-size: 0.72rem;">
                                                   {{ $draftCount }}
                                             </span>
                                          </td>

                                          <!-- Rejected Status -->
                                          <td class="text-center py-1">
                                             <span class="badge {{ $rejectCount > 0 ? 'bg-danger text-white' : 'bg-light text-muted' }} px-2 py-1" style="font-size: 0.72rem;">
                                                   {{ $rejectCount }}
                                             </span>
                                          </td>

                                          <!-- PET Status -->
                                          <td class="text-center py-1">
                                             <span class="badge {{ $petCount > 0 ? 'bg-warning-soft text-dark border border-warning' : 'bg-light text-muted' }} px-2 py-1" style="font-size: 0.72rem; {{ $petCount > 0 ? 'background-color: rgba(255, 193, 7, 0.2);' : '' }}">
                                                   {{ $petCount }}
                                             </span>
                                          </td>

                                          <!-- Marine Status -->
                                          <td class="text-center py-1">
                                             <span class="badge {{ $marineCount > 0 ? 'bg-info-soft text-info border border-info' : 'bg-light text-muted' }} px-2 py-1" style="font-size: 0.72rem; {{ $marineCount > 0 ? 'background-color: rgba(13, 202, 240, 0.15);' : '' }}">
                                                   {{ $marineCount }}
                                             </span>
                                          </td>

                                          <!-- Suptent Status -->
                                          <td class="text-center py-1">
                                             <span class="badge {{ $suptentCount > 0 ? 'bg-primary-soft text-primary border border-primary' : 'bg-light text-muted' }} px-2 py-1" style="font-size: 0.72rem; {{ $suptentCount > 0 ? 'background-color: rgba(13, 110, 253, 0.15);' : '' }}">
                                                   {{ $suptentCount }}
                                             </span>
                                          </td>

                                          <!-- Complete Status -->
                                          <td class="text-center py-1">
                                             <span class="badge {{ $completeCount > 0 ? 'bg-success text-white' : 'bg-light text-muted' }} px-2 py-1" style="font-size: 0.72rem;">
                                                   {{ $completeCount }}
                                             </span>
                                          </td>
                                       </tr>
                                 @endforeach
                              </tbody>
                           </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>


         

      
      </div>
   </section>

  
@endsection



