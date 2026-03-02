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
                  
               </div>


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
                           {{count($vdrValidations)}}
                           {{-- {{count($vdrs->where('status', 1))}} --}}
                        </div>
                        </div>
                     </a>
                     </div>
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

               <div class="row">
                  <div class="col-md-8">
                     <div class="card shadow">
                        <div class="card-body">
                           <div class="d-flex justify-content-between">
                              <div class="badge badge-info"><a href="{{route('intermilan.marine')}}" style="color: aliceblue">VDR Marine</a></div>
                              {{-- <a href="">See All..</a> --}}
                              <span><i>Approval Marine</i></span>
                           </div>
                           
                           <div class="row mt-1">
                              <div class="col-md-12">
                                 <div class="table-responsive overflow-auto p-1" style="max-height: 200px">
                                    <table class=" ">
                                       
                                       <thead>
                                          
                                          <tr class="border-bottom">
                                             
                                             <th>Code</th>
                                             {{-- <th>Date</th> --}}
                                             {{-- <th>Date</th> --}}
                                             <th>Status</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          @if (count($vdrValidations) > 0)
                                          @foreach ($vdrValidations as $vdr)
                                             <tr class="border-bottom" style="border: 1px black">
                                                {{-- <td>{{$vdr->id}}</td> --}}
                                                
                                                <td>
                                                   <a href="{{route('vdr.show.spa', [enkripRambo($vdr->id), enkripRambo('index')])}}">{{$vdr->code}}</a>
                                                   </td>
                                                {{-- <td>{{formatDate($vdr->date)}}</td> --}}
                                                {{-- <td>{{formatDate($sche->date)}}</td> --}}
                                                <td class="text-truncate" >
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
                           
                        </div>
                     </div>
                  </div>

                  <div class="col-md-4">
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
                  </div>
               </div>
      
               
            </div>
         </div>

         <div class="card shadow-lg">
            <div class="card-body">
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
                           <td><a href="{{route('vdr.statistic.vessel', enkripRambo($vessel->id))}}">{{$vessel->name}}</a></td>
                           <td class="text-center">{{count($vessel->getVdrs())}}</td>
                           <td class="">{{$vessel->getVdrLast()->date}}</td>
                           <td class="">{{$vessel->getVdrLast()->release_date}}</td>
                           <td class="">{{$vessel->getVdrLast()->getDistance()}} Hari</td>
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



