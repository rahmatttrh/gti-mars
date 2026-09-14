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
                     <div class="divider"></div>

                     <!-- PIC -->
                     <div>
                        {{-- <small class="text-light">PIC of Fleet Control</small> --}}
                        <div class="pic-list mt-2">
                           @if (auth()->user()->getArea() == 'SBU' )
                     <span>erry.brillyanto@pertamina.com </span>
                     <span>oka.prasetya@pertamina.com </span>
                     @elseif(auth()->user()->getArea() == 'CBU' )
                     {{-- <span>suroso.williem@pertamina.com </span>
                     <span>janudin@pertamina.com</span> --}}
                     <span>gita.dimarsandy@pertamina.com</span>
                     <span>erry.brillyanto@pertamina.com</span>
                     <span>indra.dipanegara@pertamina.com</span>
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
                     @if (auth()->user()->username == 'suptent_security')
                     <div class="flow-row mb-2">
                        <span class="badge bg-light text-dark mr-2 px-2 py-2">
                           <i class="fas fa-shield-alt text-primary mr-1"></i> Patrol Boat
                        </span>

                        <div class="d-flex align-items-center flex-wrap gap-2">
                           <span class="flow-badge bg-info mb-2">
                              <i class="fas fa-user-edit mr-1"></i> FM
                           </span>
                              <i class="fas fa-chevron-right text-muted mx-1 mb-2"></i>
                           <span class="flow-badge bg-info mb-2">
                              <i class="fas fa-user-edit mr-1"></i> PET
                           </span>

                              <i class="fas fa-chevron-right text-muted mx-1 mb-2"></i>

                           <span class="flow-badge bg-warning mb-2">
                              <i class="fas fa-ship mr-1"></i> Lead Command
                           </span>

                           <i class="fas fa-chevron-right text-muted mx-1 mb-2"></i>

                           <span class="flow-badge bg-primary mb-2">
                              <i class="fas fa-user-tie mr-1"></i> Suptent Security
                           </span>

                           

                           {{-- <i class="fas fa-chevron-right text-muted mx-1 mb-2"></i>

                           <span class="flow-badge bg-primary ">
                              <i class="fas fa-user-tie mr-1"></i> Marine Rep
                           </span> --}}

                           <i class="fas fa-chevron-right text-success mx-1 mb-2"></i>

                           <span class="flow-badge bg-success mb-2">
                              <i class="fas fa-check-circle mr-1"></i> Complete
                           </span>
                        </div>
                     </div>
                         @else
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
                                    <i class="fas fa-user-edit mr-1"></i> FM
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
                     @endif
                  </div>
               </div>

               {{-- <div class="card">
                  <div class="card-body">
                     <b>Email</b>
                     <hr>
                     @if (auth()->user()->getArea() == 'SBU' )
                     erry.brillyanto@pertamina.com <br>
                     oka.prasetya@pertamina.com
                     @elseif(auth()->user()->getArea() == 'CBU' )
                     suroso.williem@pertamina.com <br>
                     janudin@pertamina.com
                     @elseif(auth()->user()->getArea() == 'NBU' )
                     hendra.hadi@pertamina.com <br>
                     sindhu.hadi@pertamina.com
                     @elseif(auth()->user()->getArea() == 'Cinta-T' )
                     norman.sasongko@pertamina.com <br>
                     erin.busrian@pertamina.com
                     @elseif(auth()->user()->getArea() == 'Widuri-T' )
                     muhamad.mujiburichman@pertamina.com <br>
                     rezza.suhanda@pertamina.com
                     @endif
                     

                  </div>
               </div> --}}
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
                                 {{count($allVdrs->where('status', 5))}}
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
                              
                              <h4>Waiting</h4>
                           </div>
                           <div class="card-body">
                              {{count($allVdrs->where('status', 5))}}
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
                           {{count($allVdrs->where('status', 4))}}
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
                           <div class="d-flex align-items-center gap-2 mb-3">
                              <i class="fa fa-chart-line text-primary mr-3"></i>
                              <div>
                                 <div class="fw-bold">Monitoring VDR Area {{auth()->user()->getArea()}}</div>
                                 <small class="text-muted">
                                    Pantau status VDR Area {{auth()->user()->getArea()}} secara realtime untuk memastikan seluruh proses berjalan dengan baik.
                                 </small>
                              </div>
                           </div>
                           {{-- <div class="badge badge-info">VDR Monitoring ({{auth()->user()->getArea()}})</div> --}}
                           <div class="table-responsive " >
                              <table class="datatables-vdr">
                                 
                                 <thead>
                                    {{-- <tr>
                                       <th colspan="3" style="color: #1f4481 !important">VDR yang membutuhkan approval anda</th>
                                    </tr> --}}
                                    <tr>
                                       {{-- <th>No</th> --}}
                                       <th>Vessel</th>

                                       <th>Number</th>
                                       <th>Date</th>
                                       <th class="text-center">Status</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($allVdrs as $vdr)
                                       <tr class="border" style="border: 1px black">
                                          {{-- <td>{{++$i}}</td> --}}
                                          <td class="border-bottom">
                                             <a href="{{route('vdr.show.spa', [enkripRambo( $vdr->id), enkripRambo('index')])}}">{{$vdr->vessel->name}}</a>
                                             {{-- <a href="{{route('vdr.show', [enkripRambo( $vdr->id), enkripRambo('index')])}}">{{$vdr->vessel->name}}</a> --}}
                                          </td>
                                          <td class="border-bottom">
                                             <a href="{{route('vdr.show.spa', [enkripRambo( $vdr->id), enkripRambo('index')])}}">{{$vdr->code}}</a>
                                             {{-- <a href="{{route('vdr.show', [enkripRambo( $vdr->id), enkripRambo('index')])}}">{{$vdr->vessel->name}}</a> --}}
                                          </td>
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



