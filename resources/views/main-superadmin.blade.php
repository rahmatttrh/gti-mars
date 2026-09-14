@extends('layouts.stisla.app-main')
@section('title')
   Home Page
@endsection

@section('content')
<style>
   .summary-mini{
   display:flex;
   align-items:center;
   padding:8px 12px;
   border-radius:12px;
   min-width:110px;
   transition:.2s;
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
</style>

<style>
.activity-wrapper {
    border-radius: 12px;
}

/* HEADER */
.activity-header h6 {
    font-size: 14px;
}

/* BOX */
.activity-box {
    max-height: 300px;
    overflow-y: auto;
    padding-right: 5px;
}

/* ITEM */
.activity-item {
    display: flex;
    gap: 10px;
    padding: 10px 5px;
    border-bottom: 1px solid #f1f1f1;
    transition: 0.2s;
}

.activity-item:hover {
    background: #f9fafc;
}

/* ICON */
.activity-icon {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
}

/* CONTENT */
.activity-content {
    flex: 1;
}

/* SCROLL STYLE */
.activity-box::-webkit-scrollbar {
    width: 5px;
}

.activity-box::-webkit-scrollbar-thumb {
    background: #ccc;
    border-radius: 10px;
}
</style>


   <section class="section">
      <div class="section-body">
         <div class="row">
            <div class="col-md-3">
               {{-- <div class="card bg-primary shadow">
                  <div class="card-body ">
                     
                     <i class="fas fa-user"></i> Welcome back, <h4> {{auth()->user()->name}}</h4>
                     <hr class="bg-light">
                      <b class="mb-3">PIC of Super Admin :</b> <br>

                      Joy Pranata Ginting <br>
                      Yusuf Revy Fadillah <br>
                      Mochamad Harris
                     
                      
                  </div>
               </div> --}}


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

                     <span class="badge badge-danger px-3 py-2 shadow-sm">
                        <i class="fas fa-shield-alt mr-1"></i>
                        FULL ACCESS
                     </span>
                  <div class="divider"></div>

                     <!-- PIC -->
                     <div>
                           {{-- <small class="text-light">PIC of Fleet Control</small> --}}
                           <div class="pic-list mt-2">
                              <span value="YFH">Joy Pranata Ginting</span>
                              {{-- <span value="RPR">Raditya Perdana Rachmansyah</span> --}}
                              <span value="ESN">Yusuf Revy Fadillah</span>
                              <span value="BJ">Mochamad Harris</span>
                              
                           </div>
                     </div>

                     
                  </div>

               </div>

                <div class="card">
                     <div class="card-body">

                    
                        <div class="activity-wrapper">

                           <!-- HEADER -->
                           <div class="activity-header d-flex justify-content-between align-items-center mb-2">
                              <div>
                                    <h6 class="mb-0 fw-bold">
                                       <i class="fa fa-history text-primary me-1"></i> Log Activity System
                                    </h6>
                                    <small class="text-muted">Riwayat aktivitas terbaru pengguna</small>
                              </div>

                              <span class="badge bg-light text-dark border">
                                    {{ count($logs) }} Activity
                              </span>
                           </div>

                           <!-- CONTENT -->
                           <div class="activity-box">

                              @foreach ($logs as $log)
                              <div class="activity-item">

                                    <!-- ICON -->
                                    <div class="activity-icon bg-primary">
                                       <i class="fa fa-user"></i>
                                    </div>

                                    <!-- CONTENT -->
                                    <div class="activity-content">

                                       <div class="d-flex justify-content-between">
                                          <strong class="small">
                                                {{ $log->user->name ?? '-' }}
                                          </strong>
                                          <small class="text-muted">
                                                {{ formatDateTime($log->created_at) }}
                                          </small>
                                       </div>

                                       
                                       <div class="small text-muted" style="">
                                          {{ $log->action }}
                                          @if ($log->vdr_id)
                                                <span class="">
                                                   {{ $log->vdr->code ?? '' }}
                                                </span>
                                          @endif
                                       </div>

                                    </div>
                              </div>
                              @endforeach

                           </div>
                        </div>
                     </div>
                  </div>

               {{-- <div class="card">
                  <div class="card-body">
                     
                     
                     <table class="mt-1">
                        <tbody>
                           <tr>
                              <td class="border-bottom" colspan=""><span class="badge badge-info mb-2">Daily Report</span></td>
                              <td class="border-bottom"><a href="">Create</a></td>
                           </tr>
                           @if ($dailyReportAlert == true)
                           <tr>
                              <td colspan="2" class="border-bottom"><span class="text-danger">Warning, Anda belum membuat Daily Report hari ini !</span></td>
                           </tr>
                              
                           
                           @endif
                           @foreach ($dailyReports as $daily)
                              <tr>
                              <td class="border-bottom"><a href="{{route('daily.report.detail', enkripRambo($daily->id))}}">{{formatDate($daily->date)}}</a></td>
                              <td class="border-bottom">
                                 @if ($daily->status == 1)
                                 <i class="fas fa-check text-success"></i>
                                 @else
                                 <i>Draft</i>
                                 @endif
                              </td>
                              </tr>
                              @endforeach
                        </tbody>
                     </table>
                     
                  </div>
               </div> --}}


               
               
      
               {{-- <div class="card shadow d-none d-md-block">
                  <div class="card-body ">
                     <div class="badge badge-secondary">Aktifitas kapal</div>
                     <div class=" table-responsive mt-2 overflow-auto" style="height: 250px">
                        <table class=" display  "   >
                          
                          <tbody>
                             
                             <tr>
                                 <td class="border-bottom">
                                    ENC ONE <br>
                                    Cast Away from PAB
                                    
                                 </td>
                                 <td class="text-right border-bottom">10/10/25 <br> 18:23</td>
                             </tr>

                              <tr>
                                 <td class="border-bottom">
                                    Transko Balihe <br>
                                    Loading at KJ4
                                    
                                 </td>
                                 <td class="text-right border-bottom">10/10/25 <br> 17:20</td>
                              </tr>

                              <tr>
                                 <td class="border-bottom">
                                    Magelang <br>
                                    Standby at PAB
                                    
                                 </td>
                                 <td class="text-right border-bottom">10/10/25 <br> 17:50</td>
                              </tr>
                              <tr>
                                 <td class="border-bottom">
                                    Transko Balihe <br>
                                    Loading at KJ4
                                    
                                 </td>
                                 <td class="text-right border-bottom">10/10/25 <br> 17:20</td>
                              </tr>

                              <tr>
                                 <td class="border-bottom">
                                    Magelang <br>
                                    Standby at PAB
                                    
                                 </td>
                                 <td class="text-right border-bottom">10/10/25 <br> 17:50</td>
                              </tr>

                              <tr>
                                 <td class="border-bottom">
                                    ENC ONE <br>
                                    Cast Away from PAB
                                    
                                 </td>
                                 <td class="text-right border-bottom">10/10/25 <br> 18:23</td>
                             </tr>

                            
                          </tbody>
                       </table>
                     </div>
                  </div>
               </div> --}}
               
            </div>
            <div class="col-md-9">

               

               <div class="row ">
                  <div class="col-md-4">
                     <div class="card card-statistic-1 shadow-lg">
                        <a href="{{route('vdr.marine.validation')}}">
                        <div class="card-icon bg-info">
                        <i class="fas fa-user"></i>
                        </div>
                        <div class="card-wrap">
                        <div class="card-header">
                           
                           <h4>VDR Marine</h4>
                        </div>
                        <div class="card-body">
                           {{count($vdrMarine)}}
                           {{-- {{count($vdrs->where('status', 1))}} --}}
                        </div>
                        </div>
                     </a>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="card card-statistic-1 shadow-lg">
                        <a href="{{route('vdr.marine.loan')}}">
                           <div class="card-icon bg-secondary">
                           <i class="fas fa-exchange-alt"></i>
                           </div>
                           <div class="card-wrap">
                              <div class="card-header">
                                 
                                 <h4>Temporarily Assigned</h4>
                              </div>
                              <div class="card-body">
                                 {{ count($vdrLoans) }}
                              </div>
                           </div>
                        </a>
                     </div>
                  </div>
                  <div class="col-md-4">
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
                           {{count($inboxRequests)}}
                        </div>
                        </div>
                     </a>
                     </div>
                  </div>
                  {{-- <div class="col-md-4">
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
                           0
                        </div>
                        </div>
                     </a>
                     </div>
                  </div> --}}
                  
               </div>

               <div class="row">
                  <div class="col-md-12">
                     
                     <div class="card border-0 shadow-sm">

                        <div class="card-body">

                           <div class="d-flex justify-content-between align-items-center mb-4">

                              <div class="d-flex align-items-center">

                                 <div class="vdr-icon mr-3">
                                    <i class="fas fa-ship"></i>
                                 </div>

                                 <div>
                                    <h6 class="mb-0 font-weight-bold">
                                       VDR Management
                                    </h6>

                                    <small class="text-muted">
                                       Approval & Validation Overview
                                    </small>
                                 </div>

                              </div>

                              <div class="d-flex">

                                 <div class="summary-mini summary-draft mr-2">

                                    <div class="summary-icon">
                                       <i class="fas fa-pencil-alt"></i>
                                    </div>

                                    <div>
                                       <div class="summary-number">
                                          {{count($allVdrs->where('status',0))}}
                                       </div>
                                       <small>Draft</small>
                                    </div>

                                 </div>

                                 <div class="summary-mini summary-reject mr-2">

                                    <div class="summary-icon">
                                       <i class="fas fa-times-circle"></i>
                                    </div>

                                    <div>
                                       <div class="summary-number">
                                          {{count($allVdrs->whereIn('status',[101,202,303]))}}
                                       </div>
                                       <small>Rejected</small>
                                    </div>

                                 </div>

                                 <div class="summary-mini summary-done">

                                    <div class="summary-icon">
                                       <i class="fas fa-check-circle"></i>
                                    </div>

                                    <div>
                                       <div class="summary-number">
                                          {{$totalCompleteVdr}}
                                       </div>
                                       <small>Complete</small>
                                    </div>

                                 </div>

                              </div>

                           </div>

                           <div class="row text-center">

                              {{-- <div class="col">
                                 <a href="#" class="status-box">
                                    <i class="fas fa-pencil-alt text-warning"></i>
                                    <h5>{{count($allVdrs->where('status',0))}}</h5>
                                    <small>Draft</small>
                                 </a>
                              </div> --}}

                              <div class="col">
                                 <a href="#" class="status-box">
                                    <i class="fas fa-user-check text-warning"></i>
                                    <h5>{{$vdrFm ?? 0}}</h5>
                                    <small>FM</small>
                                 </a>
                              </div>

                              <div class="col">
                                 <a href="#" class="status-box">
                                    <i class="fas fa-user-check text-warning"></i>
                                    <h5>{{$vdrPet ?? 0}}</h5>
                                    <small>PET</small>
                                 </a>
                              </div>

                              <div class="col">
                                 <a href="#" class="status-box">
                                    <i class="fas fa-user-check text-info"></i>
                                    <h5>{{$vdrRadop ?? 0}}</h5>
                                    <small>Radop</small>
                                 </a>
                              </div>

                              <div class="col">
                                 <a href="#" class="status-box">
                                    <i class="fas fa-user-check text-info"></i>
                                    <h5>{{$vdrSuptent ?? 0}}</h5>
                                    <small>Suptent/Coman</small>
                                 </a>
                              </div>

                              

                              <div class="col">
                                 <a href="#" class="status-box">
                                    <i class="fas fa-anchor text-primary"></i>
                                    <h5>{{count($vdrValidations)}}</h5>
                                    <small>Marine</small>
                                 </a>
                              </div>

                              

                              <div class="col">
                                 <a href="#" class="status-box">
                                    <i class="fas fa-user-tie text-success"></i>
                                    <h5>{{$vdrMarineRep ?? 0}}</h5>
                                    <small>Marine Rep.</small>
                                 </a>
                              </div>

                              {{-- <div class="col">
                                 <a href="{{route('vdr.reject.list')}}" class="status-box">
                                    <i class="fas fa-times-circle text-danger"></i>
                                    <h5>{{count($allVdrs->whereIn('status',[101,202,303]))}}</h5>
                                    <small>Reject</small>
                                 </a>
                              </div>

                              <div class="col">
                                 <a href="{{route('vdr.history.list')}}" class="status-box">
                                    <i class="fas fa-check-circle text-success"></i>
                                    <h5>{{count($allVdrs->where('status',4))}}</h5>
                                    <small>Done</small>
                                 </a>
                              </div> --}}

                           </div>




                          
                           <hr>
                           <div class="note-vdr d-flex align-items-start mb-3">
         
                              <!-- ICON -->
                              <div class="note-icon mr-2">
                                 <i class="fa fa-folder-open"></i>
                              </div>

                              <!-- CONTENT -->
                              <div class="note-content">
                                 <strong>Recent VDR</strong>
                                 <div class="text-muted small">
                                        <b>1000 VDR (Vessel Daily Report)</b> terkini yang telah masuk ke dalam sistem
                                 </div>
                              </div>

                           </div>
                           
                           <div class="table-responsive">
                           <table class="datatables-vdr-management">
                              
                              <thead>
                                 
                                 <tr>
                                    <th>VDR Number</th>
                                    {{-- style="display: none" --}}
                                    <th style="display: none" >updated at</th>
                                    <th>Release</th>
                                    <th>Approval</th>
                                    {{-- <th>Type</th> --}}
                                    {{-- <th>Area</th> --}}
                                    {{-- <th></th> --}}
                                    {{-- <th>Date</th> --}}
                                    <th class="text-right">Status</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach ($vdrRecents as $vdr)
                                    <tr >
                                       {{-- <td>{{$vdr->id}}</td> --}}
                                       <td class="text-truncate border-bottom" ><a href="{{route('vdr.show.spa', [enkripRambo($vdr->id), enkripRambo('index')])}}">{{$vdr->code}}</a></td>
                                       <td style="display: none" >
                                          {{ $vdr->updated_at }}
                                       </td>
                                       <td class="border-bottom">
                                       <x-vdr.release-gap :vdr="$vdr" />
                                      </td>
                                      <td class="border-bottom text-truncate">
                                       <x-vdr.approval-gap :vdr="$vdr" />
                                      </td>
                                       {{-- <td class="border-bottom">
                                          @if ($vdr->vessel->type == 'Tug Boat' || $vdr->vessel->ipb == 'IPB')
                                             @if ($vdr->area != null)
                                                {{$vdr->area}}
                                                @else
                                                Empty
                                             @endif
                                          @endif
                                       </td> --}}
                                       {{-- <td>{{formatDate($sche->date)}}</td> --}}
                                       {{-- <td>{{formatRibuan(round($totaldaily))}}</td> --}}
                                       <td class="text-right text-truncate border-bottom">
                                          <x-status-stisla.vdr :vdr="$vdr" />
                                       </td>
                                    </tr>
                                 @endforeach
                              </tbody>
                           </table>
                        </div>

                        <hr>
                           <span class="badge badge-info p-1 mr-1">
                              <span class="bg-white text-info px-2 py-1 rounded font-weight-bold">FM</span>
                              <span class="px-2">Fuel Management</span>
                           </span>

                           <span class="badge badge-info p-1 mr-1">
                              <span class="bg-white text-info px-2 py-1 rounded font-weight-bold">P</span>
                              <span class="px-2">PET</span>
                           </span>

                           <span class="badge badge-warning p-1 mr-1">
                              <span class="bg-white text-warning px-2 py-1 rounded font-weight-bold">R</span>
                              <span class="px-2">Radop</span>
                           </span>

                           <span class="badge badge-warning p-1 mr-1">
                              <span class="bg-white text-warning px-2 py-1 rounded font-weight-bold">S</span>
                              <span class="px-2">Suptent</span>
                           </span>

                           <span class="badge badge-danger p-1 mr-1">
                              <span class="bg-white text-danger px-2 py-1 rounded font-weight-bold">C</span>
                              <span class="px-2">Company Man</span>
                           </span>

                           <span class="badge badge-primary p-1 mr-1">
                              <span class="bg-white text-primary px-2 py-1 rounded font-weight-bold">M</span>
                              <span class="px-2">Marine</span>
                           </span>

                           <span class="badge badge-secondary p-1 mr-1">
                              <span class="bg-white text-secondary px-2 py-1 rounded font-weight-bold">MR</span>
                              <span class="px-2">Marine Representative</span>
                           </span>
                     
                     
                  

                        </div>

                     </div>
                  </div>





                  <div class="col-md-4">
                     <div class="card">
                        <div class="card-body">
                           <div class="badge badge-info">Vessel Data</div>
                           <table class="mt-2">
                              <tbody>
                                 <tr>
                                    <td class="border-bottom border-top" colspan="2">Total</td>
                                    <td class="border-bottom border-top">{{count($allVessels)}}</td>
                                 </tr>
                                 <tr>
                                    <td class="border-bottom" colspan="2">On Hire</td>
                                    <td class="border-bottom">{{count($onHireVessels)}}</td>
                                 </tr>
                                 <tr>
                                    <td>-</td>
                                    <td>Under PO</td>
                                    <td>{{count($onHireVessels->where('contract_type', 'Under PO'))}}</td>
                                 </tr>
                                 <tr>
                                    <td>-</td>
                                    <td>Non PO</td>
                                    <td>{{count($onHireVessels->where('contract_type', 'Non PO'))}}</td>
                                 </tr>
                                 <tr>
                                    <td>-</td>
                                    <td>Others</td>
                                    <td>{{count($onHireVessels->where('contract_type', null))}}</td>
                                 </tr>
                                 <tr>
                                    <td class="border-bottom border-top" colspan="2">Off Hire</td>
                                    <td class="border-bottom border-top">{{count($offHireVessels)}}</td>
                                 </tr>
                                 
                              </tbody>
                           </table>
                        </div>
                     </div>
                     
                     
                  </div>

                  <div class="col-md-4">
                     <div class="card">
                        <div class="card-body">
                           <div class="badge badge-info">DSP</div>
                           <table class="mt-2">
                              <tbody>
                                 <tr>
                                    <td class="border-bottom border-top">Waiting Vessel</td>
                                    <td class="border-bottom border-top">0</td>
                                 </tr>
                                 <tr>
                                    <td class="border-bottom">Progress</td>
                                    <td class="border-bottom">0</td>
                                 </tr>
                                 <tr>
                                    <td class="border-bottom">Complete </td>
                                    <td class="border-bottom">0</td>
                                 </tr>
                                 
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="card" style="min-height: 250px">
                        <div class="card-body">
                           <div class="d-flex justify-content-between">
                              <div class="badge badge-info"><a href="{{route('intermilan.marine')}}" style="color: aliceblue">Intermilan</a></div>
                              {{-- <a href="">See All..</a> --}}
                              <span><i>Recent Intermilan</i></span>
                           </div>
                           
                           <div class="row mt-1">
                              <div class="col-md-12">
                                 <div class="table-responsive " >
                                    <table class="table mt-1 table-sm border">
                                       
                                       <thead>
                                          {{-- <tr>
                                             <th colspan="3" style="color: #1f4481 !important">VDR yang membutuhkan approval anda</th>
                                          </tr> --}}
                                          
                                       </thead>
                                       <tbody>
                                          @foreach ($intermilans as $inter)
                                              <tr>
                                                <td class="border"><a href="{{route('intermilan.marine.detail', enkripRambo($inter->id))}}">{{$inter->code}}</a></td>
                                                <td class="border">{{formatDate($inter->from)}}</td>
                                                <td class="border">{{$inter->title}}</td>
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
         </div>
         <div class="card ">
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



