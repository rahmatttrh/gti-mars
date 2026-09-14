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

   <section class="section">
      <div class="section-body">
         <div class="row"> 
   <div class="col-md-3">
      {{-- <div class="card">
         <div class="card-body">
            <h2>Welcome back, <br> {{$office->name}}</h2>
            <hr>
            <table class="border">
               <thead>
                  <tr class="bg-primary text-white">
                     <th>Daftar Kapal</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($vessels as $vessel)
                  <tr class="border">
                     <td>{{$vessel->name}}</td>
                  </tr>
                  @endforeach
                  
               </tbody>
            </table>
         </div>
      </div> --}}

      <div class="card shadow-lg border-0">
         <div class="card-body">

            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-3">
               <div>
                  <h5 class="mb-1 fw-bold">
                     <i class="fa fa-anchor text-primary"></i> 
                     Welcome back 
                  </h5> 
                   <h4>{{$office->description}}</h4>
                  <h5 class="text-muted mb-0">
                     {{$office->name}}
                     
                     {{-- Pelayaran Ekanuri Indra Pratama --}}
                  </h5>
                  
                  
               </div>

               <!-- Badge total kapal -->
               <div class="text-end">
                  <span class="badge badge-primary fs-6 px-3 py-2">
                     <i class="fa fa-building"></i> Office
                  </span>
               </div>
            </div>
           

            <!-- Divider -->
            <hr>

            <!-- Sub Title -->
            <div class="mb-3">
               <h6 class="fw-semibold ">
                  <i class="fa fa-list text-secondary"></i> Daftar Kapal
               </h6>
               <small class="text-muted">
                  Berikut adalah kapal yang berada di bawah pengelolaan kantor Anda
               </small>
            </div>

            <!-- List Kapal -->
            {{-- <div class="row">
               @foreach ($vessels as $vessel)
               <div class="col-12 mb-3">
                  <div class="card shadow-none border vessel-card">
                     <div class="card-body d-flex align-items-center">
                        
                        <div class="mr-3">
                           <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" style="width:50px; height:50px;">
                              <i class="fa fa-ship text-primary fs-5"></i>
                           </div>
                        </div>

                        <div>
                           <h6 class="mb-0 fw-semibold">{{$vessel->name}}</h6>
                           <small class="text-muted">Operational Vessel</small>
                        </div>

                     </div>
                  </div>
               </div>
               @endforeach
            </div> --}}

            <div class="list-group">
               @foreach ($vessels as $vessel)
               <a href="#" class="list-group-item list-group-item-action py-2 px-3 border-0 border-bottom mb-4">

                  <div class="d-flex align-items-center">

                        <div class="bg-light rounded-circle d-flex align-items-center justify-content-center mr-2"
                           style="width:34px;height:34px;">
                           <i class="fa fa-ship text-primary"></i>
                        </div>

                        <div class="flex-grow-1">
                           <div class="fw-semibold small">
                              {{ $vessel->name }}
                           </div>
                           <small class="text-muted">
                              Operational Vessel
                           </small>
                        </div>

                        <span class="badge bg-light text-primary">
                           <i class="fa fa-chevron-right"></i>
                        </span>

                  </div>

               </a>
               @endforeach
            </div>

         </div>
      </div>

      <!-- Optional Styling -->



     
   </div>
   <div class="col-md-9">
      
      <div class="card">

         <!-- HEADER -->
         <div class="card-body ">
            <div class="alert alert-ligt border shadow-none">
               <div class="d-flex align-items-center">
                   <i class="fas fa-tools text-warning mr-2 fa-lg"></i>
                   
                   <div>
                       <strong class="text-dark">Feature Under Development</strong>
                       <div class="small text-muted">
                           Fitur ini masih dalam tahap pengembangan dan akan segera tersedia pada update berikutnya.
                       </div>
                   </div>
               </div>
           </div>
            <div class="row">
               <div class="col-md-3">
                  <h6 class="fw-bold mb-1">
                     <i class="fa fa-calendar-alt text-primary"></i> Monthly Cost Summary 
                  </h6>
                  <small class="text-muted">
                     Ringkasan biaya operasional kapal per bulan
                  </small>
                  <hr>
                  <button class="btn btn-primary btn-lg shadow-sm" data-toggle="modal" data-target="#generateCostSummary">
                     <i class="fa fa-plus-circle"></i> Generate New Data
                  </button>
               </div>

               <div class="col-md-9">
                     
                  <table class="table table-sm align-middle mb-2">

                     <thead class="table-light">
                        <tr>
                           {{-- <th class="px-3">Code</th> --}}
                           <th>Bulan</th>
                           <th>Tahun</th>
                           <th>VDR</th>
                           <th colspan="2" class="text-center">Status Approval</th>
                           {{-- <th>Monthly VDR</th> --}}
                           {{-- <th class="text-end px-3">Action</th> --}}
                        </tr>
                     </thead>

                     <tbody>

                        <tr>
                           {{-- <td class="fw-semibold px-3 border-bottom">VDR-001</td> --}}
                           <td class="border-bottom">
                              
                              <a href="{{ route('costsummary.detail', enkripRambo(1)) }}">Januari</a>
                           </td>
                           <td class="border-bottom">2026</td>
                           <td class="border-bottom">30/30</td>
                           <td class="border-bottom">
                              {{-- <span class="badge badge-success bg-opacity-10 ">
                                 <i class="fa fa-check-circle"></i> Approved
                              </span> --}}
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
                           {{-- <td class="text-end px-3 border-bottom">
                              <button class="btn btn-light btn-sm">
                                 <i class="fa fa-eye"></i>
                              </button>
                           </td> --}}
                        </tr>

                        

                     </tbody>

                  </table>

                  <a href="#">Kelola semua data</a>

               </div>
            </div>
         
         </div>

      
      </div>




      <div class="card">
         {{-- <div class="card-header">
            <h3>VDR LIST</h3>
         </div> --}}
         <div class="card-body">
            {{-- <span class="badge badge-info"><b>VDR LIST</b></span> --}}
            <div class="mb-3">
               <h6 class="fw-bold mb-1">
                  <i class="fa fa-ship text-primary"></i> Daftar VDR Kapal Anda
               </h6>
               <small class="text-muted">
                  Pantau dan kelola rekaman aktivitas pelayaran kapal Anda secara terpusat dan real-time.
               </small>
            </div>
            
            <div class="table-responsive">
               <table class="datatables-vdr" >
                  <thead>
                     <tr>
                        {{-- <th class="text-center">No.</th> --}}
                        <th>ID</th>
                        <th>Vessel</th>
                        <th>Date</th>
                        <th>Crew</th>
                        <th>Loc</th>
                        <th>Status</th>
                     </tr>
                  </thead>
                  <tbody>
      
                        @foreach($vdrs as $vdr)
                        <tr class="boder">
                           {{-- <td class="text-muted text-center"><small>{{++$i}}</small></td> --}}
                           <td class="border-bottom">
                              <a href="{{route('vdr.show.spa', [enkripRambo($vdr->id), enkripRambo('index')])}}">{{$vdr->code}}</a>
      
                           </td>
                           <td class="border-bottom">{{$vdr->vessel->name}}</td>
                           <td class="border-bottom">{{$vdr->date}}</td>
                           <td class="border-bottom">{{$vdr->crew_onduty}} / {{$vdr->crew_max}}</td>
                           <td class="border-bottom">{{$vdr->location_midnight}}</td>
                           <td class="border-bottom">
                              <x-status-stisla.vdr :vdr="$vdr" />
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

               <button type="submit" disabled class="btn btn-primary">
                  <i class="fa fa-play-circle"></i> Generate
               </button>
            </div>

         </div>
      </form>
   </div>
</div>

  
@endsection



