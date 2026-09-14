@extends('layouts.stisla.app-vdr')
@section('title')
   VDR Dashboard
@endsection
@section('content')
<style>
   table {
      width: 100%;
      background-color: white !important;
      border-radius: 5px !important
   }

   table, th, td {
      border: 1px solid rgba(226, 218, 218, 0);
      border-collapse: collapse;
   }
   th, td {
      padding-left: 5px
   }
</style>
  

{{-- <div class="card shadow-sm border-0 mb-3">
   <div class="card-body py-2">

      <div class="d-flex justify-content-between align-items-center flex-wrap">

         <div>
            <h5 class="mb-0">
               <i class="fas fa-ship text-primary mr-2"></i>
               Vessel Daily Report
            </h5>
            <small class="text-muted">
               Monitor & Manage Vessel Operations
            </small>
         </div>

         <div class="d-flex flex-wrap">

            <span class="badge badge-light border mr-2 p-2">
               <i class="fas fa-file-alt text-primary"></i>
               {{count($vdrs)}} Total
            </span>

            <span class="badge badge-light border mr-2 p-2">
               <i class="fas fa-pencil-alt text-warning"></i>
               {{count($vdrs->where('status',0))}} Draft
            </span>

            <span class="badge badge-light border mr-2 p-2">
               <i class="fas fa-user-check text-info"></i>
               {{count($vdrs->where('status',1))}} PET
            </span>

            <span class="badge badge-light border mr-2 p-2">
               <i class="fas fa-anchor text-primary"></i>
               {{count($vdrs->where('status',2))}} Marine
            </span>

            <span class="badge badge-light border mr-2 p-2">
               <i class="fas fa-user-tie text-danger"></i>
               {{count($vdrs->where('status',3))}} Chief
            </span>

            <span class="badge badge-success p-2">
               <i class="fas fa-check-circle"></i>
               {{count($vdrs->where('status',4))}} Done
            </span>

         </div>

      </div>

   </div>
</div> --}}



<div class="section">
   <div class="section-body">

   

<div class="card border-0 shadow-sm">

   {{-- HEADER --}}
   <div class="card-body border-bottom">

      <div class="d-flex justify-content-between align-items-center flex-wrap">

         <div>

            <div class="d-flex align-items-center">

               {{-- <div class="mr-3">

                 <div class="vdr-avatar">

                              <i class="fas fa-ship"></i>

                           </div>

               </div> --}}

               <div>

                  <div class="text-primary font-weight-bold text-uppercase small">
                     VDR Management
                  </div>

                  <h6 class="mb-1 font-weight-bold">

                     {{$vessel->name}}

                     

                  </h6>

                  <div class="text-muted text-sm">

                     <small>
                     <i class="fas fa-route mr-1"></i>
                     Operations Monitoring

                     <span class="mx-2">•</span>

                     <i class="fas fa-user-check mr-1"></i>
                     Approval Tracking
                     </small>

                  </div>

                  <div class="mt-1">

                     <div class="d-flex align-items-center">

                        <i class="fas fa-info-circle text-primary mr-2"></i>

                        <small class="mb-0">

                           Untuk membuat <strong>Vessel Daily Report (VDR)</strong> baru, silakan kembali ke
                           <strong><a href="/">Homepage</a></strong> dan klik tombol "Buat VDR Baru".
                           

                        </small>

                     </div>

                  </div>
               </div>

            </div>

         </div>

         <div class="d-flex flex-wrap mt-2 mt-md-0">

            {{-- <span class="badge badge-light border px-3 py-2 mr-2">
               <i class="fas fa-file-alt text-primary mr-1"></i>
               {{count($vdrs)}} Reports
            </span> --}}

            <span class="badge badge-light border px-3 py-2 mr-2">
               <i class="fas fa-pencil-alt text-warning mr-1"></i>
               {{count($vdrs->where('status',0))}} Draft
            </span>

            <span class="badge badge-light border px-3 py-2 mr-2">
               <i class="fas fa-user-check text-info mr-1"></i>
               {{count($vdrs->where('status',1))}} PET
            </span>

            <span class="badge badge-light border px-3 py-2 mr-2">
               <i class="fas fa-user-tie text-danger mr-1"></i>
               {{ $vdrProgress }} Progress Approval
            </span>

            {{-- <span class="badge badge-light border px-3 py-2 mr-2">
               <i class="fas fa-anchor text-primary mr-1"></i>
               {{count($vdrs->where('status',2))}} Marine
            </span>

            <span class="badge badge-light border px-3 py-2 mr-2">
               <i class="fas fa-user-tie text-danger mr-1"></i>
               {{count($vdrs->where('status',3))}} Chief
            </span> --}}

            <span class="badge badge-success px-3 py-2">
               <i class="fas fa-check-circle mr-1"></i>
               {{count($vdrs->where('status',4))}} Done
            </span>

         </div>

      </div>

   </div>

   {{-- TOOLBAR --}}
   {{-- <div class="card-body py-2 border-bottom">

      <div class="row align-items-center">

         <div class="col-md-4">

            <div class="input-group input-group-sm">

               <div class="input-group-prepend">
                  <span class="input-group-text bg-white">
                     <i class="fas fa-search"></i>
                  </span>
               </div>

               <input
                  type="text"
                  class="form-control"
                  placeholder="Search VDR Number...">

            </div>

         </div>

         <div class="col-md-8 text-md-right mt-2 mt-md-0">

            <button class="btn btn-light btn-sm border">
               <i class="fas fa-filter mr-1"></i>
               Filter
            </button>

            <button class="btn btn-light btn-sm border">
               <i class="fas fa-sync-alt"></i>
            </button>

         </div>

      </div>

   </div> --}}

   {{-- CONTENT --}}
   <div class="card-body">

      <div class="card border shadow-none  mb-3">

         <div class="card-body py-2 px-3">

            <div class="d-flex justify-content-between align-items-center flex-wrap">

               <div>

                  <span class="font-weight-bold">
                     <i class="fas fa-clipboard-list text-primary mr-1"></i>
                     VDR Repository
                  </span>

                  <small class="text-muted ml-2">
                     Menampilkan seluruh Vessel Daily Report yang telah tercatat dalam sistem.
                  </small>

               </div>

               <div class="mt-1 mt-md-0">

                  <span class="badge badge-primary px-3 py-2">
                     <i class="fas fa-file-alt mr-1"></i>
                     {{count($vdrs)}} Reports
                  </span>

               </div>

            </div>

         </div>

      </div>

      <div class="table-responsive">

         <table class="table table-sm table-hover mb-0" id="table-1">

            <thead class="bg-light">

               <tr>
                  <th>VDR Number</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Fuel Daily</th>
                  <th>Area</th>
                  <th width="180">Status</th>
                  {{-- <th width="130">Action</th> --}}
               </tr>

            </thead>

            <tbody>

               @foreach($vdrs as $vdr)

               @php
                  $crewPercent = $vdr->crew_max > 0
                     ? ($vdr->crew_onduty / $vdr->crew_max) * 100
                     : 0;

                  $totalDaily = round($vdr->operatings->sum('daily'));
               @endphp

               <tr class="border-bottom">

                  <td class="border-bottom">

                     <i class="fas fa-ship mr-1"></i>

                    
                              <a href="{{route('vdr.show.spa',[enkripRambo($vdr->id),enkripRambo('index')])}}">
                                 {{$vdr->code}}
                              </a>

                           

                  </td>

                  <td class="border-bottom">
                     <i class="far fa-calendar-alt mr-1"></i>
                              {{formatDate($vdr->date)}}
                  </td>

                  <td class="border-bottom">
                     <i class="fas fa-clock mr-1"></i>
                              {{$vdr->getTotalHours()}}
                  </td>


                  <td class="border-bottom">
                     <i class="fas fa-gas-pump mr-1"></i>
                              {{$totalDaily}} L
                  </td>


                  <td class="border-bottom">
                     {{ $vdr->area ?? '-' }}
                  </td>
                  

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

<style>

.vdr-avatar{
   width:42px;
   height:42px;
   border-radius:12px;
   background:#e8f2ff;
   color:#0d6efd;
   display:flex;
   align-items:center;
   justify-content:center;
   font-size:16px;
}

.table tbody tr{
   transition:.2s;
}

.table tbody tr:hover{
   background:#f8fafc;
}

.badge{
   font-weight:500;
}

.progress{
   border-radius:20px;
}

.card{
   border-radius:18px;
}

</style>

  
   


   
@endsection




