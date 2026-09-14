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
   <section class="section">
      <div class="section-body">
         <div class="row">
            <div class="col-md-3">

               <div class="card welcome-card shadow">

                  <div class="card-body position-relative">

                     <!-- ICON BESAR -->
                     {{-- <i class="fas fa-user welcome-icon"></i> --}}
                     <i class="fas fa-broadcast-tower welcome-icon"></i>

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
                                    Melakukan review dan approval terhadap data VDR kapal yang berada di area {{auth()->user()->getArea()}}
                              </div>
                           </div>
                        </div>
                     </div>

                     <!-- PIC -->
                     <!-- PIC -->
                     <div>
                        {{-- <small class="text-light">PIC of Fleet Control</small> --}}
                        <div class="pic-list mt-2">
                           @if (auth()->user()->getArea() == 'SBU' )
                                 <span>pheoses.sbu.operator@pertamina.com</span>
                              <span>system.ekanuri@gmail.com</span>
                                    @elseif(auth()->user()->getArea() == 'CBU' )
                                 <span>gpheoses.cbu.radio-room@pertamina.com</span>
                              <span>ms.jemmy.pentury@pertamina.com</span>
                              <span>ms.wahyu.nugraha@pertamina.com</span>
                              <span>ms.mochamad.syawali@pertamina.com</span>
                                    @elseif(auth()->user()->getArea() == 'NBU' )
                                    <span>gpheoses.nbu.radioroom@pertamina.com</span>
                              <span>ms.rachmat.hidayat@pertamina.com</span>
                              <span>ms.sunaryo@pertamina.com</span>
                              <span>ms.marzuki.muslim@pertamina.com</span>
                              <span>ms.chlorid.latifoso@pertamina.com</span>
                              <span>ms.aji.catur@pertamina.com</span>
                              <span>mk.ridwan.alviyanto@pertamina.com</span>
                                    @elseif(auth()->user()->getArea() == 'Cinta-T' )
                                 <span>mk.yudha.bakti@pertamina.com</span>
                              <span>mk.supriadi2@pertamina.com</span>
                              <span>mk.khamsani@pertamina.com</span>
                              <span>mk.ali.nurdin1@pertamina.com</span>
                                    @elseif(auth()->user()->getArea() == 'Widuri-T' )
                                    <span>mk.rizandri@pertamina.com</span>
                              <span>mk.budi.sulistia@pertamina.com</span>
                              <span>mk.gunawan.wibisono1@pertamina.com</span>
                              <span>mk.wianto@pertamina.com</span>
                           @endif
                        </div>
                  </div>
                     

                  </div>

               </div>
               {{-- <div class="card bg-primary shadow">
                  <div class="card-body ">
                     
                     Welcome back, <br> <h4 class="text-uppercase"> {{auth()->user()->name}}</h4>
                     <hr>
                     Level User <br> <b>Radop</b>
                     <br>
                     Area <br>
                     <b>{{auth()->user()->getArea()}}</b>
                  </div>
               </div> --}}

               <div class="card">
                  <div class="card-body">
                     <div class="d-flex align-items-center mb-2">
                           <div class="mr-2">
                              <i class="fas fa-route text-primary fs-4"></i>
                           </div>
                           <div>
                              {{-- <h6 class="mb-0 fw-bold">VDR Approval Flow</h6> --}}
                              <small class="text-muted">VDR Approval Flow</small>
                           </div>
                     </div>
                        <div class="flow-row">
                           

                        <div class="d-flex align-items-center flex-wrap gap-2">
                           
                           <span class="flow-badge bg-info mb-2">
                              <i class="fas fa-user-edit mr-1"></i> PET
                           </span>

                           <i class="fas fa-chevron-right text-muted mx-1 mb-2"></i>

                           <span class="flow-badge bg-warning mb-2">
                              <i class="fas fa-broadcast-tower mr-1"></i> Radop
                           </span>

                           <i class="fas fa-chevron-right text-muted mx-1 mb-2"></i>

                           <span class="flow-badge bg-warning mb-2">
                              <i class="fas fa-user-tie mr-1"></i> Suptent
                           </span>

                           <i class="fas fa-chevron-right text-muted mx-1 mb-2"></i>

                           <span class="flow-badge bg-primary mb-2">
                              <i class="fas fa-user-shield mr-1"></i> Marine Rep
                           </span>

                           <i class="fas fa-chevron-right text-success mx-1 mb-2"></i>

                           <span class="flow-badge bg-success mb-2">
                              <i class="fas fa-check-circle mr-1"></i> Complete
                           </span>
                        </div>
                  </div>
                  </div>
               </div>
            </div>
            <div class="col-md-9">
               <div class="row ">
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
                                 {{count($vdrValidations)}}
                              </h3>
                           </div>

                        </div>
                     </div>
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
                              {{count($vdrValidations)}}
                           </div>
                           </div>
                        </a>
                     </div> --}}
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
                           {{count($allVdrs->whereIn('status', [3,4,5]))}}
                        </div>
                        </div>
                     </a>
                     </div>
                  </div>
                  
               </div>
      
               <div class="card">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="d-flex align-items-center gap-2 mb-2">
                              <i class="fa fa-chart-line text-primary mr-3"></i>
                              <div>
                                 <div class="fw-bold">Monitoring VDR Area {{auth()->user()->getArea()}}</div>
                                 <small class="text-muted">
                                    Pantau status VDR Area {{auth()->user()->getArea()}} secara realtime untuk memastikan seluruh proses berjalan dengan baik.
                                 </small>
                              </div>
                           </div>
                           {{-- <div class="badge badge-info">VDR Monitoring ({{auth()->user()->getArea()}})</div> --}}
                           {{-- <b></b> --}}
                           <div class="table-responsive mt-2" >
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
                                       <th>Date</th>
                                       <th class="text-center">Status</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($allVdrs as $vdr)
                                       <tr class="border" style="border: 1px black">
                                          {{-- <td>{{++$i}}</td> --}}
                                          {{-- <td class="border-bottom">
                                             <a href="{{route('vdr.show.spa', [enkripRambo( $vdr->id), enkripRambo('index')])}}">{{$vdr->vessel->name}}</a>

                                             <a href="{{route('vdr.show', [enkripRambo( $vdr->id), enkripRambo('index')])}}">{{$vdr->vessel->name}}</a>
                                          </td> --}}
                                          <td class="border-bottom">
                                             <a href="{{route('vdr.show.spa', [enkripRambo( $vdr->id), enkripRambo('index')])}}">{{$vdr->code}}</a>
                                             {{-- <a href="{{route('vdr.show', [enkripRambo( $vdr->id), enkripRambo('index')])}}">{{$vdr->vessel->name}}</a> --}}
                                             {{-- @if ($vdr->area != null && $vdr->status == 2 && $vdr->vessel->loan == 1)
                                                 <span class="text-danger"><i>Approval Not Required</i></span>
                                             @endif --}}
                                             @if ($vdr->area != null && $vdr->status == 2 && $vdr->vessel->loan == 1)
                                             <small class="">
                                                <i class="fas fa-info-circle"></i>
                                                Approval Not Required
                                          </small>   
                                             {{-- <div>
                                                   <small class="badge badge-info">
                                                         <i class="fas fa-info-circle"></i>
                                                         Approval Not Required
                                                   </small>
                                                </div>
                                                <small class="text-muted d-block mt-1">
                                                   VDR ini tidak memerlukan persetujuan Co-Man dan dapat langsung diproses.
                                                </small> --}}
                                             @endif
                                          </td>
                                          <td class="border-bottom" style="display: none">{{$vdr->date}}</td>
                                          {{-- <td>{{$vdr->code}}</td> --}}
                                          <td class="border-bottom">{{$vdr->date}}</td>
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



