@extends('layouts.stisla.app-main')
@section('title')
   Home Page
@endsection

@section('content')
   <section class="section">
      <div class="section-body">
         <div class="row">
            <div class="col-md-3">

               <div class="card welcome-card shadow">

                  <div class="card-body position-relative">

                     <!-- ICON BESAR -->
                     <i class="fas fa-user welcome-icon"></i>

                     <!-- HEADER -->
                     <div class="mb-2">
                           <small class="text-light">Welcome back 👋</small>
                           <h4 class="mb-0 fw-bold">
                              {{ auth()->user()->name }}
                           </h4>
                     </div>

                     <!-- DIVIDER -->
                     <div class="divider"></div>

                     <!-- PIC -->
                     <div>
                           {{-- <small class="text-light">PIC of Fleet Control</small> --}}
                           <div class="pic-list mt-2">
                              <span value="YFH">Yusuf Falah Hibatullah</span>
                              {{-- <span value="RPR">Raditya Perdana Rachmansyah</span> --}}
                              <span value="ESN">Eka Satria Nugroho</span>
                              <span value="BJ">Bryan Jhon</span>
                              <span value="LAJ">Lutfa Alprimas Jasworo</span>
                              <span value="SW">Setyo Wiyono</span>
                              <span value="LA">Luthfi Alhafiizh</span>
                              <span value="ARK">Akhmad Rizki Kurniawan</span>
                           </div>
                     </div>

                  </div>

               </div>


               {{-- <div class="card bg-primary shadow">
                  <div class="card-body ">
                     
                     <i class="fas fa-user"></i> Welcome back, <h4> {{auth()->user()->name}}</h4>
                     <hr>
                     <b class="mb-3">PIC of Fuel Monitoring Team :</b> <br>

                     <option value="YFH">Yusuf Falah Hibatullah</option>
                      <option value="ESN">Eka Satria Nugroho</option>
                     <option value="BJ">Bryan Jhon</option>
                     <option value="LAJ">Lutfa Alprimas Jasworo</option>
                     <option value="SW">Setyo Wiyono</option>
                     <option value="LA">Luthfi Alhafiizh</option>
                     <option value="ARK">Akhmad Rizki Kurniawan</option>
                      
                  </div>
               </div> --}}
      
               {{-- <div class="card shadow d-none d-md-block">
                  <div class="card-body px-1">
                     <div class=" table-responsive  overflow-auto" style="height: 250px">
                        <table class=" display  "   >
                         
                          <tbody>
                             <tr>
                                <th style="color: #1f4481 !important">Log Activity</th>
                             </tr>
                             @foreach ($logs as $log)
                                <tr class="border-bottom">
                                   <td class="text-truncate"><small> {{formatDateTime($log->created_at)}} {{$log->user->name ?? ''}}
                                      <br>
                                      {{$log->action}} </small>
                                   </td>
                                   
                                   
                                </tr>
                             @endforeach
                          </tbody>
                       </table>
                     </div>
                  </div>
               </div> --}}

               <div class="timeline-wrapper mb-3">

                  <div class="timeline">
                     @foreach ($logs as $log)
                     
                     <div class="timeline-item ">
                           <div class="timeline-content">
                              <small class="mb-1">
                                    <b> <i class="fa fa-check-circle text-success"></i> {{$log->user->name ?? ''}}</b>
                              </small> <br>
                              <small class="text-muted">{{formatDateTime($log->created_at)}}</small>
                              <br>
                                 <small>
                                {{$log->action}} 
                                {{-- {{$log->desc}} --}}
                                @if ($log->vdr_id != null)
                                        <small>{{$log->vdr->code ?? ''}}</small>
                                            
                                        @endif
                                {{-- @if ($log->vdr_id != null)
                                           {{$log->vdr->code}}
                                      @endif --}}
                                          </small>
                                       
                           </div>
                        </div>
                  @endforeach

                       

                        

                  </div>

               </div>
               
            </div>
            <div class="col-md-9">
               <div class="row ">
                  <div class="col-md-4">
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
                                          {{count($vdrs->where('status', 1))}}
                                    </h4>
                                 </div>

                              </div>

                        </div>
                     </a>
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
                                       
                                       <th>Vessel</th>

                                       <th>Number</th>
                                       <th>Date</th>
                                       <th>Release at</th>
                                       
                                       
                                       {{-- <th>Last Update</th> --}}
                                       <th class="text-center">Status</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($vdrValidations as $vdr)
                                       <tr class="border" style="border: 1px black">
                                        
                                          <td class="border-bottom">
                                             <a href="{{route('vdr.show.spa', [enkripRambo( $vdr->id), enkripRambo('index')])}}">{{$vdr->vessel->name ?? ''}}</a>
                                          </td>
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
            </div>
         </div>


         <div class="card shadow-lg">
            {{-- <div class="card-header">
               
            </div> --}}
            <div class="card-body">
               <span class="badge badge-info mb-2">
                  MONITORING VDR
               </span>
               <span class="badge badge-info mb-2">
                 16/09/2025 -  {{\Carbon\Carbon::now()->format('d/m/Y')}}
               </span>
               
               {{-- <table class="display  border">
                  <tbody>
                     <tr>
                        <th>All Vessel Daily Report</th>
                     </tr>
                  </tbody>
               </table> --}}
               
                  <table class="datatables-vdr-monitoring text-dark">
                     
                     <thead>
                     
                        <tr>
                           
                           <th>Vessel</th>
                           <th class="text-center">Total</th>
                           <th class="">Last VDR</th>
                           <th class="">Release at</th>
                           <th>Release Gap</th>
                           <th class="text-center">Draft</th>
                           <th class="text-center">Rejected</th>
                           <th class="text-center">PET</th>
                           <th class="text-center">Marine</th>
                           <th class="text-center">Suptent</th>
                           <th class="text-center">Complete</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($vessels as $vessel)
                       
                           @if (count($vessel->getVdrs()) > 0)
                           <tr >
                              <td><a href="{{route('vdr.statistic.vessel', enkripRambo($vessel->id))}}">{{$vessel->name}}</a></td>
                              <td class="text-center">{{count($vessel->getVdrs())}}</td>
                              <td class="">{{formatDate($vessel->getVdrLast()->date)}}</td>
                              <td class="">
                                 @if ($vessel->getVdrLast()->release_date != null)
                                 {{formatDateTimeB($vessel->getVdrLast()->release_date)}}
                                 @endif
                                 
                              </td>
                              <td class="">{{$vessel->getVdrLast()->getDistance()}}</td>
                              <td class="text-center">{{count($vessel->getVdrs()->where('status', 0))}}</td>
                              <td class="text-center">{{count($vessel->getRejectVdrs())}}</td>
                              <td class="text-center">{{count($vessel->getPetVdrs())}}</td>
                              <td class="text-center">{{count($vessel->getMarineVdrs())}}</td>
                              <td class="text-center">{{count($vessel->getSuptentVdrs())}}</td>
                              {{-- <td>{{count($vessel->getProgressVdrs())}}</td> --}}
                              <td class="text-center">{{count($vessel->getCompleteVdrs())}}</td>

                           </tr>

                           
                           @endif

                           
                           
                        @endforeach
                        
                       
                     </tbody>
                  </table>
               
            </div>
         </div>

      
      </div>
   </section>

  
@endsection



