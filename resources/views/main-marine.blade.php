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

                     <div class="alert alert-light border-0 py-2 px-3 mb-3">
                        <div class="d-flex align-items-start">
                           <i class="fas fa-clipboard-check text-primary mr-2 mt-1"></i>
                           <div>
                              <strong class="text-dark">Your Responsibility</strong>
                              <div class="small text-muted">
                                 <b>Reviewer Vessel Operation and Compliance</b> <br>
                                    Melakukan review terhadap Genaral Information | Weather Condition | HSSE | Vessel Daily Engine Parameter Log | Crew & Passenger List
                              </div>
                           </div>
                        </div>
                  </div>
                  <div class="divider"></div>

                     <!-- PIC -->
                     <div>
                           {{-- <small class="text-light">PIC of Fleet Control</small> --}}
                           <div class="pic-list mt-2">
                              <span value="YFH">Umar Agam</span>
                              {{-- <span value="RPR">Raditya Perdana Rachmansyah</span> --}}
                              <span value="ESN">Rezky Hardanto</span>
                              <span value="BJ">Muhammad Misbakhul Hasan</span>
                              
                           </div>
                     </div>

                     <div class="divider"></div>
                     <small>
                     On behalf of Port Captain : <br>
                      Joy Pranata Ginting,
                     Mochamad Harris,
                     Yusuf Revy Fadillah,
                     Dicky Dandi Permana
                  </small>
                  </div>

               </div>

               <div class="card shadow ">
                  <div class="card-body ">
                     <div class="badge badge-secondary">Recent Intermilan</div>
                     <div class=" table-responsive mt-2 overflow-auto" style="height: 50px">
                        <table class=" display  "   >
                          
                          <tbody>
                             @foreach ($intermilans as $inter)
                              <tr>
                                 <td class="border-bottom">
                                    <a href="{{route('intermilan.marine.detail', enkripRambo($inter->id))}}">{{$inter->code}}</a>
                                    
                                 </td>
                                 <td class="text-right border-bottom">
                                    {{formatDate($inter->from)}}
                                 </td>
                              </tr>
                             @endforeach
                             

                              

                              

                            
                          </tbody>
                       </table>
                     </div>
                  </div>
               </div>
               
               <div class="card shadow ">
                  <div class="card-body">
                     <div class="d-flex justify-content-between">
                        <span class="badge badge-primary"><a href="{{route('daily.report')}}" style="color: aliceblue">Daily Report</a> </span>
                        {{-- <a href="">See All...</a> --}}
                     </div>
                     
                     

                     <div class=" table-responsive mt-2 overflow-auto" style="height: 60px">
                        <table class=" table table-sm   "   >
                          {{-- <thead>
                             <tr>
                                <th>Time</th>
                                <th>User</th>
                                <th>Action</th>
                             </tr>
                          </thead> --}}
                          <tbody>
                             
                            
                          </tbody>
                       </table>
                     </div>
                  </div>
               </div>
               {{-- <div class="card bg-primary shadow">
                  <div class="card-body ">
                     
                     <i class="fas fa-user"></i> Welcome back, <h4> {{auth()->user()->name}}</h4>
                     <hr class="bg-light">
                      <b class="mb-3">PIC of Marine :</b> <br>

                     Umar Agam <br>
                      Rezky Hardanto <br>
                      Muhammad Misbakhul Hasan
                      <hr>
                      <i>On behalf of Port Captain</i> : <br>
                      <i>Joy Pranata Ginting</i>,
                     <i>Mochamad Harris</i>,
                     <i>Yusuf Revy Fadillah</i>,
                     <i>Dicky Dandi Permana</i>
                     
                      
                  </div>
                  
               </div> --}}


               {{-- @if ($dailyReportAlert == true)
               <div class="alert alert-danger" role="alert">
                  <b class="alert-heading">Alert!</b>
                  <p>Anda belum membuat Daily Report hari ini. <a href="{{route('daily.report')}}">Klik disini untuk membuat Daily Report</a></p>
                  
                  
               </div>
               @endif --}}
               
      
               
               
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
                              
                              <h4>VDR Marine</h4>
                           </div>
                           <div class="card-body">
                              {{count($vdrValidations)}}
                           </div>
                           </div>
                        </a>
                     </div> --}}
                  </div>
                  <div class="col-md-4">
                     <div class="card card-statistic-1 shadow">
                        <a href="{{route('vdr.suptent.validation')}}">
                           <div class="card-icon bg-primary">
                           <i class="fas fa-user"></i>
                           </div>
                           <div class="card-wrap">
                           <div class="card-header">
                              
                              <h4>VDR Suptent </h4>
                           </div>
                           <div class="card-body">
                              {{count($allVdrs->where('status', 3)) + count($allVdrs->where('status', 5))}}
                           </div>
                           </div>
                        </a>
                     </div>
                  </div>
            
                  <div class="col-md-4">
                     <div class="card card-statistic-1 shadow">
                        <a href="{{route('vdr.reject.list')}}">
                           <div class="card-icon bg-danger">
                           <i class="fas fa-bolt"></i>
                           </div>
                           <div class="card-wrap">
                           <div class="card-header">
                              
                              <h4>VDR Reject</h4>
                           </div>
                           <div class="card-body">
                              {{count($allVdrs->whereIn('status', [101,202,303]))}}
                           </div>
                           </div>
                        </a>
                     </div>
                  </div>
                  {{-- <div class="col-md-4">
                     <div class="card card-statistic-1 shadow-lg">
                        <a href="{{route('intermilan.marine')}}">
                        <div class="card-icon bg-primary">
                        <i class="fas fa-envelope"></i>
                        </div>
                        <div class="card-wrap">
                        <div class="card-header">
                           
                           <h4>Inbox Request Material</h4>
                        </div>
                        <div class="card-body">
                           {{count($vdrs->where('status', 101))}}
                        </div>
                        </div>
                     </a>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="card card-statistic-1 shadow-lg">
                        <a href="{{route('intermilan.marine')}}">
                        <div class="card-icon bg-secondary">
                        <i class="fas fa-user"></i>
                        </div>
                        <div class="card-wrap">
                        <div class="card-header">
                           
                           <h4>Inbox Crew Change</h4>
                        </div>
                        <div class="card-body">
                           {{count($vdrs->where('status', '>', 1))}}
                        </div>
                        </div>
                     </a>
                     </div>
                  </div> --}}
                  
               </div>

               <div class="card">
                  <div class="card-body">
                     {{-- <div class="d-flex justify-content-between">
                        <div class="badge badge-info"><a href="{{route('intermilan.marine')}}" style="color: aliceblue">VDR Marine</a></div>
                        
                        <span><i>Approval Marine</i></span>
                     </div> --}}
                     <div class="d-flex align-items-center gap-2 mb-2">
                        <i class="fa fa-check-circle text-primary mr-3"></i>
                        <div>
                           <div class="fw-bold">Daftar VDR yang Memerlukan Persetujuan Anda</div>
                           <small class="text-muted">
                                 Silahkan tinjau dan lakukan persetujuan untuk memastikan proses berjalan sesuai prosedur.
                           </small>
                        </div>
                     </div>
                     
                     <div class="table-responsive ">
                        <table class="datatables ">
                           
                           <thead>
                              
                              <tr class="border-bCottom">
                                 <th>No</th>
                                 <th>Vessel</th>
                                 <th>VDR ID</th>
                                 {{-- <th>Date</th> --}}
                                 {{-- <th>Date</th> --}}
                                 <th class="text-right">Status</th>
                              </tr>
                           </thead>
                           <tbody>
                              @if (count($vdrValidations) > 0)
                              @foreach ($vdrValidations as $vdr)
                                 <tr class="border-bottom" style="border: 1px black">
                                    {{-- <td>{{$vdr->id}}</td> --}}
                                    <td class="border-bottom">{{++$i}}</td>
                                    <td class="border-bottom">{{$vdr->vessel->name}}</td>
                                    <td class="border-bottom">
                                       <a href="{{route('vdr.show.spa', [enkripRambo($vdr->id), enkripRambo('index')])}}">{{$vdr->code}}</a>
                                       </td>
                                    {{-- <td>{{formatDate($vdr->date)}}</td> --}}
                                    {{-- <td>{{formatDate($sche->date)}}</td> --}}
                                    <td class="text-truncate text-right border-bottom" >
                                       <x-status-stisla.vdr :vdr="$vdr" />
                                    </td>
                                 </tr>
                              @endforeach
                                  @else
                                  <tr>
                                    <td colspan="3" class="text-center py-3">Empty</td>
                                  </tr>
                              @endif
                              
                           </tbody>
                        </table>
                     </div>
                     
                  </div>
               </div>

               <div class="card ">
                  <div class="card-body">
                     <!-- Header -->
               <div class="d-flex align-items-center mb-2">
                  <div class="mr-2">
                     <i class="fas fa-route text-primary fs-4"></i>
                  </div>
                  <div>
                     {{-- <h6 class="mb-0 fw-bold">VDR Approval Flow</h6> --}}
                     <small class="text-muted">VDR Approval Flow</small>
                  </div>
            </div>

         
               <!-- Flow Normal -->
               <div class="flow-row mb-2">
                     <span class="badge bg-light text-dark mr-2 px-2 py-2">
                        <i class="fas fa-file-alt text-primary mr-1"></i> Regular
                     </span>

                     <div class="d-flex align-items-center flex-wrap gap-2">
                        <span class="flow-badge bg-info">
                           <i class="fas fa-user-edit mr-1"></i> PET
                        </span>

                        <i class="fas fa-chevron-right text-muted mx-1"></i>

                        <span class="flow-badge bg-warning">
                           <i class="fas fa-ship mr-1"></i> Marine
                        </span>

                        <i class="fas fa-chevron-right text-muted mx-1"></i>

                        <span class="flow-badge bg-primary ">
                           <i class="fas fa-user-tie mr-1"></i> Marine Rep
                        </span>

                        <i class="fas fa-chevron-right text-success mx-1"></i>

                        <span class="flow-badge bg-success">
                           <i class="fas fa-check-circle mr-1"></i> Complete
                        </span>
                     </div>
               </div>
               <!-- Flow Tug Boat -->
               <div class="flow-row mb-2">
                     <span class="badge bg-light text-dark mr-2 px-2 py-2">
                        <i class="fas fa-anchor text-warning mr-1"></i> IPB / Tug Boat
                     </span>

                     <div class="d-flex align-items-center flex-wrap gap-2">
                        <span class="flow-badge bg-info">
                           <i class="fas fa-user-edit mr-1"></i> PET
                        </span>

                        <i class="fas fa-chevron-right text-muted mx-1"></i>

                        <span class="flow-badge bg-warning">
                           <i class="fas fa-broadcast-tower mr-1"></i> Radop
                        </span>

                        <i class="fas fa-chevron-right text-muted mx-1"></i>

                        <span class="flow-badge bg-warning ">
                           <i class="fas fa-user-tie mr-1"></i> Suptent
                        </span>

                        <i class="fas fa-chevron-right text-muted mx-1"></i>

                        <span class="flow-badge bg-primary">
                           <i class="fas fa-user-shield mr-1"></i> Marine Rep
                        </span>

                        <i class="fas fa-chevron-right text-success mx-1"></i>

                        <span class="flow-badge bg-success">
                           <i class="fas fa-check-circle mr-1"></i> Complete
                        </span>
                     </div>
               </div>
         
               <!-- Flow Patrol Boat -->
               <div class="flow-row mb-2">
                     <span class="badge bg-light text-dark mr-2 px-2 py-2">
                        <i class="fas fa-ship text-primary mr-1"></i> Non PO
                     </span>

                     <div class="d-flex align-items-center flex-wrap gap-2">
                        <span class="flow-badge bg-info">
                           <i class="fas fa-user-edit mr-1"></i> FM
                        </span>
                           <i class="fas fa-chevron-right text-muted mx-1"></i>
                        <span class="flow-badge bg-info">
                           <i class="fas fa-user-edit mr-1"></i> PET
                        </span>

                           <i class="fas fa-chevron-right text-muted mx-1"></i>

                        <span class="flow-badge bg-warning">
                           <i class="fas fa-ship mr-1"></i> Suptent
                        </span>

                        <i class="fas fa-chevron-right text-muted mx-1"></i>

                        <span class="flow-badge bg-warning">
                     <i class="fas fa-ship mr-1"></i> Marine
                  </span>

                  <i class="fas fa-chevron-right text-muted mx-1"></i>

                  <span class="flow-badge bg-primary ">
                     <i class="fas fa-user-tie mr-1"></i> Marine Rep
                  </span>

                        

                        <i class="fas fa-chevron-right text-success mx-1"></i>

                        <span class="flow-badge bg-success">
                           <i class="fas fa-check-circle mr-1"></i> Complete
                        </span>
                     </div>
               </div>
         
                  <!-- Flow Patrol Boat -->
               <div class="flow-row mb-2">
                     <span class="badge bg-light text-dark mr-2 px-2 py-2">
                        <i class="fas fa-shield-alt text-primary mr-1"></i> Patrol Boat
                     </span>

                     <div class="d-flex align-items-center flex-wrap gap-2">
                        <span class="flow-badge bg-info">
                           <i class="fas fa-user-edit mr-1"></i> FM
                        </span>
                           <i class="fas fa-chevron-right text-muted mx-1"></i>
                        <span class="flow-badge bg-info">
                           <i class="fas fa-user-edit mr-1"></i> PET
                        </span>

                           <i class="fas fa-chevron-right text-muted mx-1"></i>

                        <span class="flow-badge bg-warning">
                           <i class="fas fa-ship mr-1"></i> Lead Command
                        </span>

                        <i class="fas fa-chevron-right text-muted mx-1"></i>

                        <span class="flow-badge bg-primary">
                           <i class="fas fa-user-tie mr-1"></i> Suptent Security
                        </span>

                        

                        {{-- <i class="fas fa-chevron-right text-muted mx-1"></i>

                        <span class="flow-badge bg-primary ">
                           <i class="fas fa-user-tie mr-1"></i> Marine Rep
                        </span> --}}

                        <i class="fas fa-chevron-right text-success mx-1"></i>

                        <span class="flow-badge bg-success">
                           <i class="fas fa-check-circle mr-1"></i> Complete
                        </span>
                     </div>
               </div>
                   
                    
               



                     <hr>
                     <span class="badge badge-info mb-2">
                        MONITORING VDR
                     </span>
                     <span class="badge badge-info mb-2">
                       16/09/2025 -  {{\Carbon\Carbon::now()->format('d/m/Y')}}
                     </span>
                     <table class="datatables-vdr-monitoring">
                           
                        <thead>
                           
                           <tr>
                              
                              <th>Vessel</th>
                              <th class="text-center">Total</th>
                              <th class="">Last VDR</th>
                              <th class="">Release at</th>
                              <th class="">Gap</th>
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
                                 <td class="border-bottom"><a href="{{route('vdr.statistic.vessel', enkripRambo($vessel->id))}}">{{$vessel->name}}</a></td>
                                 <td class="text-center border-bottom">{{count($vessel->getVdrs())}}</td>
                                 <td class="border-bottom">{{$vessel->getVdrLast()->date}}</td>
                                 <td class="border-bottom">{{$vessel->getVdrLast()->release_date}}</td>
                                 <td class="border-bottom">{{$vessel->getVdrLast()->getDistance()}} Hari</td>
                                 <td class="text-center border-bottom">{{count($vessel->getVdrs()->where('status', 0))}}</td>
                                 <td class="text-center border-bottom">{{count($vessel->getRejectVdrs())}}</td>
                                 <td class="text-center border-bottom">{{count($vessel->getPetVdrs())}}</td>
                                 <td class="text-center border-bottom">{{count($vessel->getMarineVdrs())}}</td>
                                 <td class="text-center border-bottom">{{count($vessel->getSuptentVdrs())}}</td>
                                 {{-- <td>{{count($vessel->getProgressVdrs())}}</td> --}}
                                 <td class="text-center border-bottom">{{count($vessel->getCompleteVdrs())}}</td>
      
                              </tr>
      
                              
                              @endif
      
                              
                              
                           @endforeach
                           
                          
                        </tbody>
                     </table>
                  </div>
               </div>
      
               
            </div>
         </div>

         

      
      </div>
   </section>

  
@endsection



