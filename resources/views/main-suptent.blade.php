@extends('layouts.stisla.app-sup')
@section('title')
   Home Page
@endsection

@section('content')
<style>
   .stat-card-manager {
    border-radius: 18px;
    background: #fff;
    transition: 0.3s;
    position: relative;
    overflow: hidden;
}

/* aksen garis atas */
.stat-card-manager::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
}

.stat-card-manager:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 30px rgba(0,0,0,0.12);
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
</style>
   <section class="section">
      <div class="section-body">
         <div class="row">
            <div class="col-md-3">

               <div class="card welcome-card shadow">

                  <div class="card-body position-relative">

                     <!-- ICON BESAR -->
                     <i class="fas fa-user-tie welcome-icon"></i>

                     <!-- HEADER -->
                     <div class="mb-2">
                           <small class="text-light">Welcome back 👋</small>
                           <h4 class="mb-0 fw-bold">
                              {{ auth()->user()->name }}
                           </h4>
                     </div>

                     <!-- DIVIDER -->
                     <div class="divider"></div>
                     Marine Representative

                     <div class="alert alert-light border-0 py-2 px-3 mb-3 mt-3">
                        <div class="d-flex align-items-start">
                           <i class="fas fa-clipboard-check text-primary mr-2 mt-1"></i>
                           <div>
                              <strong class="text-dark">Your Responsibility</strong>
                              <div class="small text-muted">
                                 <b>Final Approver</b> <br>
                                    Melakukan review dan verifikasi atas seluruh bagian yang telah direview oleh tim PET dan tim MARINE
                              </div>
                           </div>
                        </div>
                  </div>
                     

                  </div>

               </div>
               {{-- <div class="card bg-primary shadow">
                  <div class="card-body ">
                     
                     <i class="fas fa-user"></i> Welcome back, <h4> {{auth()->user()->name}}</h4>
                     <hr>
                      <b>Superintendent & Marine Representative</b>
                      
                  </div>
               </div> --}}
               {{-- <div class="card shadow">
                  
                  <div class="card-body">
                     <div class="badge badge-info">
                        Intermilan
                     </div>

                     <table class="mt-2">
                        <tbody>
                           <tr>
                              <td class="border-bottom"><a href="{{route('intermilan.marine.detail', enkripRambo($intermilan->id))}}">{{$intermilan->code}}</a></td>
                              <td class="border-bottom">{{formatDate($intermilan->date)}}</td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
                  <div class="card-body">
                     <div class="badge badge-info">
                        Daily Report
                     </div>

                     <table class="mt-2">
                        <tbody>
                           @foreach ($dailyReports as $daily)
                           <tr>
                              <td class="border-bottom"><a href="{{route('daily.report.detail', enkripRambo($daily->id))}}">{{formatDateName($daily->date)}}</a></td>
                              
                           </tr>
                           @endforeach
                           
                        </tbody>
                     </table>
                  </div>
               </div> --}}
            </div>
            <div class="col-md-9">
               <div class="row ">
                  <div class="col-md-4">
                     {{-- <div class="card card-statistic-1 shadow-lg">
                        <a href="{{route('vdr.marine.validation')}}">
                           <div class="card-icon bg-info">
                           <i class="fas fa-user"></i>
                           </div>
                           <div class="card-wrap">
                           <div class="card-header">
                              
                              <h4>VDR Waiting</h4>
                           </div>
                           <div class="card-body">
                              {{count($allVdrs->where('status', 3))}}
                           </div>
                           </div>
                        </a>
                     </div> --}}
                     <div class="card stat-card-manager border-0 shadow-lg">

                                 <div class="card-body d-flex align-items-center justify-content-between">

                                    <!-- ICON -->
                                    <div class="stat-icon bg-info-subtle text-info">
                                       <i class="fa fa-hourglass-half"></i>
                                    </div>

                                    <!-- TEXT -->
                                    <div class="flex-grow-1 px-2">
                                       <a href="{{route('vdr.marine.validation')}}" class="text-decoration-none">
                                       <div class="text-muted small">Approval Queue</div>
                                       <h6 class="mb-1 fw-bold text-dark">VDR Waiting</h6>
                                       </a>

                                       <!-- SUB INFO -->
                                       <small class="text-muted">
                                             Menunggu persetujuan Anda
                                       </small>
                                    </div>

                                    <!-- ANGKA -->
                                    <div class="text-end">
                                       <h3 class="mb-0 fw-bold text-info">
                                             {{$totalPendingVdr}}
                                       </h3>
                                    </div>

                                 </div>

                                 <!-- FOOTER INFO -->
                                 {{-- <div class="card-footer bg-transparent border-0 pt-0 pb-3 px-3">
                                    <div class="row text-center align-items-center">

                                       <!-- REJECT -->
                                       <div class="col-6 border-end">
                                          <a href="{{route('vdr.reject.list')}}">
                                             <div class="small text-muted">Rejected</div>
                                             <div class="fw-bold text-danger">
                                                <i class="fa fa-exclamation-triangle me-1"></i>
                                                {{count($vdrs->where('status', 101))}}
                                             </div>
                                          </a>
                                       </div>

                                       <!-- HISTORY -->
                                       <div class="col-6">
                                          <a href="{{route('vdr.history.list')}}">
                                             <div class="small text-muted">History</div>
                                             <div class="fw-bold text-success">
                                                <i class="fa fa-history me-1"></i>
                                                {{count($vdrs->where('status', '>', 1))}}
                                             </div>
                                          </a>
                                       </div>

                                    </div>
                                 </div> --}}

                           </div>
                  </div>
                  <div class="col-md-4">
                     <div class="card card-statistic-1 shadow-lg">
                        <a href="{{route('vdr.reject.list')}}">
                        <div class="card-icon bg-danger">
                        <i class="fas fa-bolt"></i>
                        </div>
                        <div class="card-wrap">
                        <div class="card-header">
                           
                           <h4>VDR Rejected</h4>
                        </div>
                        <div class="card-body">
                           {{$totalRejectVdr}}
                        </div>
                        </div>
                     </a>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="card card-statistic-1 shadow-lg">
                        <a href="{{route('vdr.history.list')}}">
                        <div class="card-icon bg-success">
                        <i class="fas fa-folder-open"></i>
                        </div>
                        <div class="card-wrap">
                        <div class="card-header">
                           
                           <h4>VDR History</h4>
                        </div>
                        <div class="card-body">
                           {{$totalHistoryVdr}}
                        </div>
                        </div>
                     </a>
                     </div>
                  </div>
                  
               </div>
      
               <div class="card shadow">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-12">
                           {{-- <h4></h4> --}}
                           {{-- <div class="badge badge-info">VDR Validation</div> --}}
                           <div class="d-flex align-items-center gap-2 mb-2">
                              <i class="fa fa-check-circle text-primary mr-3"></i>
                              <div>
                                 <div class="fw-bold">Daftar VDR yang Memerlukan Persetujuan Anda</div>
                                 <small class="text-muted">
                                       Silahkan tinjau dan lakukan persetujuan untuk memastikan proses berjalan sesuai prosedur.
                                 </small>
                              </div>
                           </div>
                           <div class="table-responsive mt-2" >
                              <table class="datatables">
                                 
                                 <thead>
                                    {{-- <tr>
                                       <th colspan="3" style="color: #1f4481 !important">VDR yang membutuhkan approval anda</th>
                                    </tr> --}}
                                    <tr>
                                       <th>No</th>
                                       <th>Vessel</th>

                                       <th>VDR ID</th>
                                       {{-- <th>Last Update</th> --}}
                                       <th class="text-center">Status</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($vdrValidations as $vdr)
                                       <tr >
                                          <td class="border-bottom">{{++$i}}</td>
                                          <td class="border-bottom">
                                             <a href="{{route('document.vdr', enkripRambo($vdr->id))}}">{{$vdr->vessel->name ?? ''}}</a>
                                             {{-- <a href="{{route('vdr.show', [enkripRambo( $vdr->id), enkripRambo('index')])}}">{{$vdr->vessel->name}}</a> --}}
                                          </td>
                                          <td class="border-bottom">
                                             <a href="{{route('document.vdr', enkripRambo($vdr->id))}}">{{$vdr->code}}</a>
                                             {{-- <a href="{{route('vdr.show', [enkripRambo( $vdr->id), enkripRambo('index')])}}">{{$vdr->vessel->name}}</a> --}}
                                          </td>
                                          {{-- <td>{{$vdr->code}}</td> --}}
                                          {{-- <td class="border-bottom">{{formatDate($vdr->updated_at)}}</td> --}}
                                          <td class="text-right border-bottom">
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
            </div>
         </div>

      
      </div>
   </section>

  
@endsection



