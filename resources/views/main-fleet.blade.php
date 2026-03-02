@extends('layouts.stisla.app-main')
@section('title')
   Home Page
@endsection

@section('content')
   <section class="section">
      <div class="section-body">
         <div class="row">
            <div class="col-md-3">
               <div class="card bg-primary shadow">
                  <div class="card-body ">
                     
                     <i class="fas fa-user"></i> Welcome back, <h4> {{auth()->user()->name}}</h4>
                     <hr class="bg-light">
                      <b class="mb-3">PIC of Fleet Control :</b> <br>

                     Joy Pranata Ginting <br>
                     Yusuf Revy Fadillah <br>
                     Mochamad Harris
                     
                      
                  </div>
               </div>


               @if ($dailyReportAlert == true)
               <div class="alert alert-danger" role="alert">
                  <b class="alert-heading">Alert!</b>
                  <p>Anda belum membuat Daily Report hari ini. <a href="{{route('daily.report')}}">Klik disini untuk membuat Daily Report</a></p>
                  
                  
               </div>
               @endif
               
      
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
                  <div class="col-md-8">
                     <div class="card shadow">
                        <div class="card-body">
                           <div class="d-flex justify-content-between">
                              <div class="badge badge-info"><a href="{{route('intermilan.marine')}}" style="color: aliceblue">Intermilan</a></div>
                              {{-- <a href="">See All..</a> --}}
                              <span><i>Recent Intermilan</i></span>
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
                                             
                                             <th>ID</th>
      
                                             <th>Date</th>
                                             <th>Title</th>

                                             {{-- <th>Last Update</th> --}}
                                             {{-- <th class="text-center">Status</th> --}}
                                          </tr>
                                       </thead>
                                       <tbody>
                                          @foreach ($intermilans as $inter)
                                              <tr>
                                                <td><a href="{{route('intermilan.marine.detail', enkripRambo($inter->id))}}">{{$inter->code}}</a></td>
                                                <td>{{formatDate($inter->from)}}</td>
                                                <td>{{$inter->title}}</td>
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

                  <div class="col-md-4">
                     
                     <div class="card shadow ">
                        <div class="card-body">
                           <div class="d-flex justify-content-between">
                              <span class="badge badge-primary"><a href="{{route('daily.report')}}" style="color: aliceblue">Daily Report</a> </span>
                              {{-- <a href="">See All...</a> --}}
                           </div>
                           
                           

                           <div class=" table-responsive mt-2 overflow-auto" style="height: 280px">
                              <table class=" table table-sm   "   >
                                {{-- <thead>
                                   <tr>
                                      <th>Time</th>
                                      <th>User</th>
                                      <th>Action</th>
                                   </tr>
                                </thead> --}}
                                <tbody>
                                   
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
                        </div>
                     </div>
                  </div>
               </div>
      
               
            </div>
         </div>

      
      </div>
   </section>

  
@endsection



