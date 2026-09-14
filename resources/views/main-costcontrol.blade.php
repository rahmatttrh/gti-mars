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



