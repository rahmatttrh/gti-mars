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
                      <b class="mb-3">PIC of Super Admin :</b> <br>

                      Joy Pranata Ginting <br>
                      Yusuf Revy Fadillah <br>
                      Mochamad Harris
                     
                      
                  </div>
               </div>

               <div class="card">
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
               </div>


               
               
      
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
                           {{count($vdrValidations)}}
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
                           <div class="badge badge-info">VDR</div>
                           <table class="mt-2">
                              <tbody>
                                 <tr>
                                    <td class="border-bottom border-top">Draft</td>
                                    <td class="border-bottom border-top">{{count($allVdrs->where('status', 0))}}</td>
                                 </tr>
                                 <tr>
                                    <td class="border-bottom"><a href="{{route('vdr.pet.validation')}}">Validasi PET</a></td>
                                    <td class="border-bottom">{{count($allVdrs->where('status', 1))}}</td>
                                 </tr>
                                 <tr>
                                    <td class="border-bottom"><a href="{{route('vdr.marine.validation')}}">Validasi Marine</a> </td>
                                    <td class="border-bottom">{{count($allVdrs->where('status', 2))}}</td>
                                 </tr>
                                 <tr>
                                    <td class="border-bottom"><a href="{{route('vdr.suptent.validation')}}">Validasi Suptent</a> </td>
                                    <td class="border-bottom">{{count($allVdrs->where('status', 3))}}</td>
                                 </tr>
                                 <tr>
                                    <td class="border-bottom"><a href="{{route('vdr.reject.list')}}">Rejected</a> </td>
                                    <td class="border-bottom">{{count($allVdrs->whereIn('status', [101,202,303]))}}</td>
                                 </tr>
                                 <tr>
                                    <td class="border-bottom"><a href="{{route('vdr.history.list')}}">Complete</a> </td>
                                    <td class="border-bottom">{{count($allVdrs->where('status', 4))}}</td>
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
                  <div class="col-md-8">
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
                  <div class="col-md-4">
                     <div class="card ">
                        <div class="card-body p-0">
                           {{-- <div class="badge badge-info mb-2">Log Activity</div> --}}
                           <div  class="table-responsive overflow-auto " style="height: 250px" >
                           <table class=""   >
                              <thead>
                                 <tr class="border">
                                    <th colspan="2">Log Activity</th>
                                    {{-- <th>User</th> --}}
                                    {{-- <th>Action</th> --}}
                                 </tr>
                              </thead>

                              {{-- https://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@github.com/rahmatttrh/wims.git --}}
                              <tbody>
                                 @foreach ($logs as $log)
                                    <tr class="border">
                                       <td class="">
                                          {{-- <div class="badge badge-light"> --}}
                                             {{-- {{$log->created_at}}  --}}
                                             
                                             <small>{{$log->created_at}}</small> <small>{{$log->user->name ?? ''}}
                                              </small> <br>
                                             
                                              <small>{{$log->action}}</small>
                                              @if ($log->vdr_id != null)
                                              <small>{{$log->vdr->code ?? ''}}</small>
                                                  
                                              @endif

                                          {{-- </div> --}}
                                         
                                          
                                           
                                       </td>
                                       
                                       
                                    </tr>
                                    
                                 @endforeach
                              </tbody>
                           </table>
                           </div>
                           {{-- {{ $logs->links() }} --}}
                        </div>
                     </div>
                  </div>

                  <div class="col-md-12">
                     
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



