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
                     
                     <i class="fas fa-user"></i> Welcome back, <h4> Administrator</h4>
                     <hr class="bg-light">
                      <b class="mb-3">PIC of Super Admin :</b> <br>

                     Tim Development
                     
                      
                  </div>
               </div>
               <div class="card shadow-lg">
                  <div class="card-body p-1">
                     {{-- <div class="badge badge-info mb-2">Log Activity</div> --}}
                     <div  class="table-responsive overflow-auto " style="height: 320px" >
                     <table class=""   >
                        <thead>
                           <tr class="border-bottom">
                              <th colspan="2">Log Activity</th>
                              {{-- <th>User</th> --}}
                              {{-- <th>Action</th> --}}
                           </tr>
                        </thead>

                        {{-- https://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@github.com/rahmatttrh/wims.git --}}
                        <tbody>
                           @foreach ($logs as $log)
                              <tr class="">
                                 <td class="border-bottom">
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
            <div class="col-md-9">
               {{-- <div class="row">
                  <div class="col-md-6">
                     <div class="card card-statistic-1 border">
                        <a href="{{route('vdr.marine.validation')}}">
                        <div class="card-icon bg-primary">
                          <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                           
                            <h4>VDR Validation</h4>
                          </div>
                          <div class="card-body">
                            {{count($vdrValidations)}}
                          </div>
                        </div>
                     </a>
                      </div>
                  </div>
                  <div class="col-md-6">
                     <div class="card card-statistic-1 border">
                        <a href="{{route('marine.request.list')}}">
                           <div class="card-icon bg-info">
                           <i class="far fa-user"></i>
                           </div>
                           <div class="card-wrap">
                           <div class="card-header">
                              <h4>Cargo Validation</h4>
                           </div>
                           <div class="card-body">
                              {{count($cargoValidations)}}
                           </div>
                           </div>
                        </a>
                      </div>
                  </div>
               </div> --}}
               {{-- <span class="btn btn-light border">Sailing Order</span> --}}
               <div class="card shadow-lg">
                  {{-- <div class="card-header">
                     
                  </div> --}}
                  <div class="card-body">
                     <div class="badge badge-info mb-2">
                        ALL VDR
                     </div>
                     
                     
                     <table class="datatables-vdr">
                        
                        <thead>
                           
                           <tr>
                              <th>ID</th>
                              <th>Vessel</th>
                              
                              <th>Release</th>
                              <th>Type</th>
                              <th>Area</th>
                              {{-- <th></th> --}}
                              {{-- <th>Date</th> --}}
                              <th class="text-right">Status</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($allVdrs as $vdr)
                              <tr >
                                 <td>{{$vdr->id}}</td>
                                 <td class="text-truncate" ><a href="{{route('vdr.show.spa', [enkripRambo($vdr->id), enkripRambo('index')])}}">{{$vdr->code}}</a></td>
                                 
                                 <td>
                                    
                                    {{$vdr->release_date}}
                                 </td>
                                 <td>
                                    @if ($vdr->vessel->type == 'Tug Boat')
                                    {{$vdr->vessel->type}}
                                    @endif
                                     {{$vdr->vessel->ipb ?? ''}}
                                 </td>
                                 <td>
                                    @if ($vdr->vessel->type == 'Tug Boat' || $vdr->vessel->ipb == 'IPB')
                                       @if ($vdr->area != null)
                                           {{$vdr->area}}
                                           @else
                                           Empty
                                       @endif
                                    @endif
                                 </td>
                                 {{-- <td>{{formatDate($sche->date)}}</td> --}}
                                 {{-- <td>{{formatRibuan(round($totaldaily))}}</td> --}}
                                 <td class="text-right text-truncate">
                                    <x-status-stisla.vdr :vdr="$vdr" />
                                 </td>
                              </tr>
                           @endforeach
                        </tbody>
                     </table>
                     
                     
                  </div>
               </div>
               
               
               <hr>
               
               {{-- @if ($itemRejects)
                  <table>
                     <tbody>
                        <tr class="bg-danger text-white">
                           <th colspan="3">Cargo takeout by OPS</th>
                        </tr>
                        @foreach ($itemRejects as $rej)
                           <tr>
                              <td>{{$rej->description}}</td>
                              <td>{{formatDate($rej->undo)}}</td>
                              <td>{{$rej->reason}}</td>
                           </tr>
                        @endforeach
                        <tr>
                           <td>
                              <a href="{{route('marine.request.list')}}">Open Intermilan</a>
                           </td>
                        </tr>
                     </tbody>
                  </table>
                   
               @endif --}}
      
            </div>
            <div class="col-md-4">
               
              
               
              
            </div>
            
         </div>

         <div class="row">
            <div class="col-md-12">
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
                                 
                                 <th class="">Last VDR</th>
                                 <th class="">Release at</th>
                                 <th>Release Gap</th>
                                 <th>Status</th>
                                 <th class="text-center">Total</th>
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
                                    
                                    <td class="">{{formatDate($vessel->getVdrLast()->date)}}</td>
                                    <td class="">
                                       @if ($vessel->getVdrLast()->release_date != null)
                                       {{formatDateTimeB($vessel->getVdrLast()->release_date)}}
                                       @endif
                                       
                                    </td>
                                    <td class="">{{$vessel->getVdrLast()->getDistance()}}</td>
                                    <td>
                                       <x-status-stisla.vdr-plain :vdr="$vessel->getVdrLast()" />
                                    </td>
                                    <td class="text-center">{{count($vessel->getVdrs())}}</td>
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
            <div class="col-md-4">
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
                           
                           
                           <tbody>
                              <tr>
                                 <td>Draft</td>
                                 <td>{{$totalDraft}}</td>
                              </tr>
                              <tr>
                                 <td>Waiting PET</td>
                                 <td>{{$totalPet}}</td>
                              </tr>
                              <tr>
                                 <td>Waiting Marine</td>
                                 <td>{{$totalMarine}}</td>
                              </tr>
                              <tr>
                                 <td>Waiting Suptent</td>
                                 <td>{{$totalSuptent}}</td>
                              </tr>
                              <tr>
                                 <td>Complete</td>
                                 <td>{{$totalComplete}}</td>
                              </tr>
                           </tbody>
                        </table>
                     
                  </div>
               </div>
            </div>
         </div>
         
      </div>
   </section>

@endsection



