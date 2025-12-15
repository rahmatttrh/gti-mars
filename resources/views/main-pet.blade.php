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
                     <hr>
                     <b class="mb-3">PIC of Fuel Monitoring Team :</b> <br>

                     <option value="YFH">Yusuf Falah Hibatullah</option>
                     <option value="RPR">Raditya Perdana Rachmansyah</option>
                     <option value="BJ">Bryan Jhon</option>
                     <option value="LAJ">Lutfa Alprimas Jasworo</option>
                     <option value="SW">Setyo Wiyono</option>
                     <option value="LA">Luthfi Alhafiizh</option>
                     <option value="ARK">Akhmad Rizki Kurniawan</option>
                      
                  </div>
               </div>
      
               <div class="card shadow d-none d-md-block">
                  <div class="card-body px-1">
                     <div class=" table-responsive  overflow-auto" style="height: 250px">
                        <table class=" display  "   >
                          {{-- <thead>
                             <tr>
                                <th>Time</th>
                                <th>User</th>
                                <th>Action</th>
                             </tr>
                          </thead> --}}
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
               </div>
               
            </div>
            <div class="col-md-9">
               <div class="row ">
                  <div class="col-md-4">
                     <div class="card card-statistic-1 shadow-lg">
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
                           {{count($vdrs->where('status', 101))}}
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
                           {{count($vdrs->where('status', '>', 1))}}
                        </div>
                        </div>
                     </a>
                     </div>
                  </div>
                  
               </div>
      
               <div class="card shadow">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-12">
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
                                        
                                          <td>
                                             <a href="{{route('vdr.show.spa', [enkripRambo( $vdr->id), enkripRambo('index')])}}">{{$vdr->vessel->name ?? ''}}</a>
                                          </td>
                                          <td>
                                             <a href="{{route('vdr.show.spa', [enkripRambo( $vdr->id), enkripRambo('index')])}}">{{$vdr->code}}</a>
                                           </td>
                                          <td>{{$vdr->date}}</td>
                                          <td>{{$vdr->release_date}}</td>
                                          
                                          
                                          <td class="text-right">
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



