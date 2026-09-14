@extends('layouts.stisla.app-main')
@section('title')
   Home Page
@endsection

@section('content')

<style>
   .flow-badge{
    padding: 6px 12px;
    border-radius: 20px;
    color: white;
    font-size: 12px;
    font-weight: 500;
    white-space: nowrap;
}

.flow-row{
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 8px;
}
</style>

<style>
   .summary-mini{
   display:flex;
   align-items:center;
   padding:8px 12px;
   border-radius:12px;
   min-width:110px;
   transition:.2s;
   margin-bottom: 2px;
}

.summary-mini:hover{
   transform:translateY(-2px);
}

.summary-icon{
   width:34px;
   height:34px;
   border-radius:10px;
   display:flex;
   align-items:center;
   justify-content:center;
   margin-right:8px;
}

.summary-number{
   font-size:18px;
   font-weight:700;
   line-height:1;
}

.summary-draft{
   background:#fff8e1;
}

.summary-draft .summary-icon{
   background:#fff3cd;
   color:#f39c12;
}

.summary-waiting{
   background:#ebf1fd;
}

.summary-waiting .summary-icon{
   background:#d4e1fa;
   color:#3562dc;
}

.summary-reject{
   background:#fff1f0;
}


.summary-reject .summary-icon{
   background:#f8d7da;
   color:#dc3545;
}

.summary-done{
   background:#edfdf3;
}

.summary-done .summary-icon{
   background:#d4edda;
   color:#28a745;
}


.welcome-card {
    border: none;
    border-radius: 10px;
    background: linear-gradient(135deg, #135cca, #0f60c3);
    color: white;
    overflow: hidden;
    position: relative;
}



</style>
   <section class="section">
      <div class="section-body">
         <div class="row">
            <div class="col-md-3">
               {{-- <div class="card bg-primary shadow">
                  <div class="card-body ">
                     
                     Welcome back, <br> <b> {{auth()->user()->name}}</b>
                     <hr>
                     Superintendent <h4>{{auth()->user()->getArea()}}</h4>
                     
                  </div>
               </div> --}}

               <div class="card welcome-card shadow">

                  <div class="card-body position-relative">

                     <!-- ICON BESAR -->
                     <i class="fas fa-users welcome-icon"></i>

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
                                 <b>Reviewer VDR</b> <br>
                                    Melakukan review dan approval terhadap data VDR kapal Non PO
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="divider"></div>
                     <span class="badge badge-light px-3 py-2 shadow-sm">
                        <i class="fas fa-shield-alt mr-1"></i>
                        COMAN
                     </span>

                     <!-- PIC -->
                     <div>
                        {{-- <small class="text-light">PIC of Fleet Control</small> --}}
                        <div class="pic-list mt-2">
                           @if (auth()->user()->getArea() == 'SBU' )
                     <span>erry.brillyanto@pertamina.com </span>
                     <span>oka.prasetya@pertamina.com </span>
                     @elseif(auth()->user()->getArea() == 'CBU' )
                     <span>suroso.williem@pertamina.com </span>
                     <span>janudin@pertamina.com</span>
                     @elseif(auth()->user()->getArea() == 'NBU' )
                     <span>hendra.hadi@pertamina.com </span>
                     <span>sindhu.hadi@pertamina.com</span>
                     @elseif(auth()->user()->getArea() == 'Cinta-T' )
                     <span>norman.sasongko@pertamina.com </span>
                     <span>erin.busrian@pertamina.com</span>
                     @elseif(auth()->user()->getArea() == 'Widuri-T' )
                     <span>muhamad.mujiburichman@pertamina.com </span>
                     <span>rezza.suhanda@pertamina.com</span>
                     {{-- asril1@pertamina.com --}}
                     @endif
                        </div>
                  </div>

                  </div>

               </div>

               <div class="card">
                  <div class="card-body">
                  <div class="d-flex align-items-start">

                     <div class="mr-3">
                        <i class="fas fa-users fa-lg text-info"></i>
                     </div>

                     <div>

                        <div class="font-weight-bold mb-1 text-info">
                           Shared Approval Account
                        </div>

                        <small>
                           Akun ini digunakan bersama oleh beberapa <strong>Company Man (Coman)</strong>.
                           Saat melakukan proses approval VDR, pastikan Anda memilih PIC Coman yang sesuai untuk menjaga keakuratan riwayat persetujuan.
                        </small>

                     </div>

                  </div>
                  </div>

               </div>

              
            </div>
            <div class="col-md-9">
               {{-- <div class="row ">
                  <div class="col-md-4">
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
                                 {{count($allVdrs->where('status', 5))}}
                              </h3>
                           </div>

                        </div>
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
                           
                           <h4>Rejected</h4>
                        </div>
                        <div class="card-body">
                           {{count($allVdrs->whereIn('status', [101,202,303]))}}
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
                           
                           <h4>History</h4>
                        </div>
                        <div class="card-body">
                           {{count($allVdrs->where('status', 4))}}
                        </div>
                        </div>
                     </a>
                     </div>
                  </div>
                  
               </div> --}}
      
               <div class="card">
                  <div class="card-body">

                     {{-- <div class="d-flex justify-content-between border-bottom pb-2 align-items-center mb-2">

                        <div class=" d-flex align-items-center justify-content-between">

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
                                 {{count($allVdrs->where('status', 5))}}
                              </h3>
                           </div>

                        </div>

                        <div class="d-flex">
                           <div class="summary-mini summary-waiting mr-2">
                              
                              <div class="summary-icon">
                                 <i class="fa fa-hourglass-half"></i>
                              </div>

                              <a href="/">
                              <div>
                                 <div class="summary-number">
                                       {{count($allVdrs->where('status', 5))}}
                                 </div>
                                 <small>VDR Waiting</small>
                              </div>
                              </a>

                           </div>
                           

                           <div class="summary-mini summary-reject mr-2">
                              
                              <div class="summary-icon">
                                 <i class="fas fa-times-circle"></i>
                              </div>

                              <a href="{{route('vdr.reject.list')}}">
                              <div>
                                 <div class="summary-number">
                                       {{count($allVdrs->whereIn('status', [101,202,303]))}}
                                 </div>
                                 <small>VDR Rejected</small>
                              </div>
                              </a>

                           </div>

                           <div class="summary-mini summary-done">
                              
                              <div class="summary-icon">
                                 <i class="fas fa-check-circle"></i>
                              </div>

                              <a href="{{route('vdr.history.list')}}">
                              <div>
                                 <div class="summary-number">
                                    {{count($allVdrs->where('status', 4))}}
                                 </div>
                                 <small>VDR History</small>
                              </div>
                              </a>

                           </div>

                        </div>

                     </div> --}}

                     <div class="row border-bottom pb-3 mb-3 align-items-center">

                        <!-- LEFT SIDE -->
                        <div class="col-lg-5 mb-3 mb-lg-0">
                           @if ($title == 'waiting')
                              <div class="d-flex align-items-center">

                                 
                                 <i class="fas fa-exclamation-circle text-danger"></i>

                                 <div class="ml-3">

                                    <a href="{{route('vdr.marine.validation')}}"
                                       class="text-decoration-none">

                                       <div class="text-muted small">
                                          Approval Queue
                                       </div>

                                       <h6 class="mb-0 font-weight-bold text-dark">
                                       
                                             
                                 
                                 VDR Waiting
                                       </h6>

                                    </a>

                                    <small class="text-muted">
                                       Menunggu persetujuan Coman
                                    </small>

                                 </div>

                              </div>
                              @elseif($title == 'reject') 
                              <div class="d-flex align-items-center">

                                 <i class="fas fa-times-circle text-danger"></i>

                                 <div class="ml-3">

                                    <div class="text-muted small">
                                       Rejected Reports
                                    </div>

                                    <h6 class="mb-0 font-weight-bold text-dark">
                                       VDR Rejected
                                    </h6>

                                    <small class="text-muted">
                                       Laporan yang memerlukan revisi atau pengajuan ulang
                                    </small>

                                 </div>

                              </div>
                              @elseif($title == 'history')
                              <div class="d-flex align-items-center">

                                 <i class="fas fa-history text-success"></i>

                                 <div class="ml-3">

                                    <div class="text-muted small">
                                       Vessel Daily Reports
                                    </div>

                                    <h6 class="mb-0 font-weight-bold text-dark">
                                       VDR History
                                    </h6>

                                    <small class="text-muted">
                                       Riwayat laporan VDR yang telah selesai diproses
                                    </small>

                                 </div>

                              </div>
                           @endif
                           

                        </div>

                        <!-- RIGHT SIDE -->
                        <div class="col-lg-7">

                           <div class="row">

                              <div class="col-md-4">

                                 <a href="/" class="text-decoration-none mb-">

                                    <div class="summary-mini summary-waiting h-100">

                                       <div class="summary-icon">
                                          <i class="fa fa-hourglass-half"></i>
                                       </div>

                                       <div>
                                          <div class="summary-number">
                                             {{count($vdrComans)}}
                                          </div>

                                          <small>Waiting</small>
                                       </div>

                                    </div>

                                 </a>

                              </div>

                              <div class="col-md-4">

                                 <a href="{{route('vdr.coman.reject.list')}}"
                                    class="text-decoration-none mb-1">

                                    <div class="summary-mini summary-reject h-100">

                                       <div class="summary-icon">
                                          <i class="fas fa-times-circle"></i>
                                       </div>

                                       <div>
                                          <div class="summary-number">
                                             {{count($vdrRejects)}}
                                          </div>

                                          <small>Rejected</small>
                                       </div>

                                    </div>

                                 </a>

                              </div>

                              <div class="col-md-4">

                                 <a href="{{route('vdr.coman.history.list')}}"
                                    class="text-decoration-none mb-1">

                                    <div class="summary-mini summary-done h-100">

                                       <div class="summary-icon">
                                          <i class="fas fa-check-circle"></i>
                                       </div>

                                       <div>
                                          <div class="summary-number">
                                             {{count($vdrHistories)}}
                                          </div>

                                          <small>History</small>
                                       </div>

                                    </div>

                                 </a>

                              </div>

                           </div>

                        </div>

                     </div>
                     <div class="row">
                        <div class="col-md-12">

                           @if ($title == 'waiting')
                           <div class="d-flex align-items-center bg-light border rounded px-3 py-2 mb-3">

                              <i class="fas fa-user-shield text-primary mr-2"></i>

                              <small class="mb-0">
                                 <strong>Approval Notice:</strong>
                                 Pilih dan proses hanya VDR yang sesuai dengan area tanggung jawab atau yurisdiksi Anda.
                              </small>

                           </div>
                           @endif
                           {{-- <div class="d-flex align-items-center gap-2 mb-3">
                              <i class="fa fa-chart-line text-primary mr-3"></i>
                              <div>
                                 <div class="fw-bold">Monitoring VDR Area {{auth()->user()->getArea()}}</div>
                                 <small class="text-muted">
                                    Pantau status VDR Area {{auth()->user()->getArea()}} secara realtime untuk memastikan seluruh proses berjalan dengan baik.
                                 </small>
                              </div>
                           </div> --}}
                           {{-- <div class="badge badge-info">VDR Monitoring ({{auth()->user()->getArea()}})</div> --}}
                           <div class="table-responsive " >
                              <table class="datatables-vdr">
                                 
                                 <thead>
                                    {{-- <tr>
                                       <th colspan="3" style="color: #1f4481 !important">VDR yang membutuhkan approval anda</th>
                                    </tr> --}}
                                    <tr>
                                       {{-- <th>No</th> --}}
                                       {{-- <th>Vessel</th> --}}

                                       <th>VDR Number</th>
                                       <th style="display: none" >Date</th>
                                       <th>VDR Date</th>
                                       <th>Coman</th>
                                       <th>Dikirim pada</th>
                                       <th class="text-center">Status</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    {{-- @php
                                        $no = 0;
                                    @endphp --}}
                                    @foreach ($vdrs as $vdr)
                                       <tr class="border" style="border: 1px black">
                                          {{-- <td class="border-bottom">{{++$no}}</td> --}}
                                          {{-- <td class="border-bottom">
                                             <a href="{{route('vdr.show.spa', [enkripRambo( $vdr->id), enkripRambo('index')])}}">{{$vdr->vessel->name}}</a>
                                            
                                          </td> --}}
                                          <td class="border-bottom">
                                             <a href="{{route('vdr.show.spa', [enkripRambo( $vdr->id), enkripRambo('index')])}}">{{$vdr->code}}</a>
                                             {{-- <a href="{{route('vdr.show', [enkripRambo( $vdr->id), enkripRambo('index')])}}">{{$vdr->vessel->name}}</a> --}}
                                          </td>
                                          {{-- <td>{{$vdr->code}}</td> --}}
                                          <td class="border-bottom" style="display: none">{{$vdr->date}}</td>
                                          <td class="border-bottom">{{formatDateB($vdr->date)}}</td>
                                          <td class="border-bottom">
                                             {{ $vdr->area ?? 'Empty' }}
                                          </td>
                                          <td class="border-bottom">
                                             {{ formatDateTimeCompact($vdr->release_date) }}
                                          </td>
                                          <td class="text-right border-bottom">
                                             <x-status-stisla.vdr :vdr="$vdr" />
                                          </td>
                                       </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
                        </div>
                        {{-- <div class="col-md-12">
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
            </div>
         </div>
      </div>
   </section>

  
@endsection



