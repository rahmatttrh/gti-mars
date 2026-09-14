@extends('layouts.stisla.app-main')
@section('title')
   Home Page
@endsection

@section('content')

<style>
   .welcome-card {
    background: linear-gradient(135deg, #11223c, #4943ed);
}
</style>
   <section class="section">
      <div class="section-body">
         <div class="row">
            <div class="col-md-3">
               <div class="card welcome-card shadow">

                  <div class="card-body position-relative">

                     <!-- ICON BESAR -->
                     <i class="fas fa-user-shield welcome-icon"></i>

                     <!-- HEADER -->
                     <div class="mb-2">
                           <small class="text-light">Welcome back 👋</small>
                           <h4 class="mb-0 fw-bold">
                              {{ auth()->user()->name }}
                           </h4>
                           <small>Patrol Boat</small>
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
                                    
                                       Melakukan review terhadap data VDR Patrol Boat (Bestlink88)
                                 </div>
                              </div>
                           </div>
                     </div>

                     

                     

                  </div>

               </div>

               <div class="card">
                  <div class="card-body">
                     <b>Email</b>
                     <hr>
                     {{-- @if (auth()->user()->getArea() == 'SBU' )
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
                     asril1@pertamina.com
                     @endif --}}
                     

                  </div>
               </div>
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
                              {{count($vdrValidations)}}
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
                                             {{count($vdrValidations)}}
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
                        <i class="fas fa-user"></i>
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
                              <i class="fa fa-check-circle text-primary mr-3"></i>
                              <div>
                                 <div class="fw-bold">Daftar VDR yang Memerlukan Persetujuan Anda</div>
                                 <small class="text-muted">
                                       Silahkan tinjau dan lakukan persetujuan untuk memastikan proses berjalan sesuai prosedur.
                                 </small>
                              </div>
                           </div>
                           {{-- <div class="badge badge-info">VDR Monitoring ({{auth()->user()->getArea()}})</div> --}}
                           {{-- <b></b> --}}
                           <div class="table-responsive mt-2" >
                              <table class="datatables">
                                 
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
                                    @foreach ($vdrValidations as $vdr)
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



