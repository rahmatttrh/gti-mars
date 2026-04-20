@extends('layouts.stisla.app-main')
@section('title')
   Home Page
@endsection

@section('content')
<style id="x3h2op">
   .inbox-wrapper {
       max-height: 300px;
       overflow-y: auto;
       padding-right: 5px;
   }
   
   /* Scrollbar biar keliatan */
   .inbox-wrapper::-webkit-scrollbar {
       width: 6px;
   }
   .inbox-wrapper::-webkit-scrollbar-thumb {
       background: #adb5bd;
       border-radius: 10px;
   }
   
   .inbox-item {
       display: flex;
       gap: 12px;
       padding: 12px;
       border-bottom: 1px solid #eee;
       transition: 0.2s;
       cursor: pointer;
   }
   
   .inbox-item:hover {
       background: #f8f9fa;
   }
   
   .inbox-icon {
       min-width: 40px;
       height: 40px;
       background: #e7f1ff;
       color: #0d6efd;
       display: flex;
       align-items: center;
       justify-content: center;
       border-radius: 50%;
   }
   
   .inbox-content {
       flex: 1;
   }
   
   .inbox-title {
       font-weight: 600;
   }
   
   .inbox-desc {
       font-size: 13px;
       color: #6c757d;
   }
   
   .inbox-time {
       font-size: 12px;
       color: #adb5bd;
   }
   
   .unread-dot {
       width: 8px;
       height: 8px;
       background: #0d6efd;
       border-radius: 50%;
       margin-top: 6px;
   }
   </style>



<style>
   .welcome-card {
       border: none;
       border-radius: 20px;
       background: linear-gradient(135deg, #0d6efd, #0dcaf0);
       color: white;
       overflow: hidden;
       position: relative;
   }
   
   .welcome-card:hover {
       transform: translateY(-3px);
       box-shadow: 0 10px 25px rgba(0,0,0,0.15);
       transition: 0.3s;
   }
   
   .welcome-icon {
       font-size: 50px;
       opacity: 0.2;
       position: absolute;
       right: 20px;
       top: 20px;
   }
   
   .pic-list span {
       display: inline-block;
       background: rgba(255,255,255,0.2);
       padding: 5px 10px;
       border-radius: 20px;
       margin: 3px;
       font-size: 12px;
   }
   
   .divider {
       border-top: 1px solid rgba(255,255,255,0.3);
       margin: 15px 0;
   }
   </style>

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
                              <span>Joy Pranata Ginting</span>
                              <span>Yusuf Revy Fadillah</span>
                              <span>Mochamad Harris</span>
                           </div>
                     </div>

                  </div>

               </div>
               {{-- <div class="card bg-primary shadow">
                  <div class="card-body ">
                     
                     <i class="fas fa-user"></i> Welcome back, <h4> {{auth()->user()->name}}</h4>
                     <hr class="bg-light">
                      <b class="mb-3">PIC of Fleet Control :</b> <br>

                     Joy Pranata Ginting <br>
                     Yusuf Revy Fadillah <br>
                     Mochamad Harris
                     
                      
                  </div>
               </div> --}}

               <div class="card shadow">
                  <div class="card-body">
                     <div class="d-flex justify-content-between">
                        <div class="badge badge-info"><a href="{{route('intermilan.marine')}}" style="color: aliceblue">Recent Intermilan</a></div>
                        {{-- <a href="">See All..</a> --}}
                        {{-- <span><i>Recent Intermilan</i></span> --}}
                        <a href="{{ route('intermilan.marine') }}">Manage</a>
                     </div>
                     
                     <div class="row mt-1">
                        <div class="col-md-12">
                           <div class="table-responsive " >
                              <table class="table table-sm">
                                 
                                 <thead>
                                    {{-- <tr>
                                       <th colspan="3" style="color: #1f4481 !important">VDR yang membutuhkan approval anda</th>
                                    </tr> --}}
                                    <tr>
                                       {{-- <th>No</th> --}}
                                       
                                       {{-- <th>ID</th> --}}

                                       
                                       <th class="border-bottom">Title</th>
                                       <th class="text-right border-bottom">Periode</th>

                                       {{-- <th>Last Update</th> --}}
                                       {{-- <th class="text-center">Status</th> --}}
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($intermilans as $inter)
                                        <tr>
                                          <td class="border-bottom"><a href="{{route('intermilan.marine.detail', enkripRambo($inter->id))}}">{{$inter->title}}</a></td>
                                          <td class="text-right border-bottom">{{formatDate($inter->from)}} - {{formatDate($inter->to)}}</td>
                                        </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
                        </div>
                       
                     </div>
                     
                  </div>
               </div>


               {{-- @if ($dailyReportAlert == true)
               <div class="alert alert-danger" role="alert">
                  <b class="alert-heading">Alert!</b>
                  <p>Anda belum membuat Daily Report hari ini. <a href="{{route('daily.report')}}">Klik disini untuk membuat Daily Report</a></p>
                  
                  
               </div>
               @endif --}}
               
      
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
                           {{count($allVdrs->where('status', 2))}}
                           {{-- {{count($vdrs->where('status', 1))}} --}}
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
                           0
                        </div>
                        </div>
                     </a>
                     </div>
                  </div>
                  
               </div>

               <div class="row">
                  <div class="col-md-6">
                     <div class="card">
                        <div class="card-body">
                           <div class="badge badge-info">Monitoring Manifest</div>
                           <div class="table-responsive mt-2">
                              <table class="table table-sm  datatables">
                                 <thead>
                                    <tr>
                                       <th class="border-bottom">Vessel</th>
                                       <th class="border-bottom">Type</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($vessels as $vessel)
                                        <tr>
                                          <td class="border-bottom"><a href="{{ route('intermilan.vessel.detail', enkripRambo($vessel->id)) }}">{{ $vessel->name }}</a></td>
                                          <td class="border-bottom">{{$vessel->type}}</td>
                                        </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="card" id="b9k3qs">
                        <div class="card-header d-flex justify-content-between align-items-center">
                           <div class="">
                           <strong><i class="fa fa-inbox"></i> Inbox Request</strong>
                           <div class="">
                              <small><b>Note: </b> Daftar Activity Plan dari User yang belum masuk kedalam Intermilan</small>
                           </div>
                           </div>
                           <span class="badge badge-danger">{{count($inboxRequests)}}</span>
                        </div>

                        <!-- SCROLL AREA -->
                        <div class="card-body inbox-wrapper">

                           

                           <!-- ulangin item biar keliatan scroll -->
                           @foreach ($inboxRequests as $r)
                           <div class="inbox-item">
                                 <div class="inbox-icon"><i class="fa fa-ship"></i></div>
                                 <div class="inbox-content">
                                    <div class="d-flex justify-content-between">
                                       <div class="inbox-title">{{ $r->user->name }}</div>
                                       <div class="inbox-time"><span class="text-primary">Pending</span></div>
                                    </div>
                                    <div class="inbox-desc">
                                       {{ $r->description }}
                                    </div>
                                    <small class="">{{ formatDate($r->date) }}</small>
                                 </div>
                           </div>
                           @endforeach

                        

                        

                        </div>
                     </div>
                  </div>
               </div>
      
               
            </div>
         </div>

      
      </div>
   </section>

  
@endsection



