@extends('layouts.stisla.app-main')
@section('title')
   Home Page
@endsection

@section('content')
   <section class="section">
      <div class="section-body">
         <div class="row"> 
            <div class="col-md-7">
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
                     {{-- <table class="display  border">
                        <tbody>
                           <tr>
                              <th>All Vessel Daily Report</th>
                           </tr>
                        </tbody>
                     </table> --}}
                     
                        <table class="datatables-vdr">
                           
                           <thead>
                              
                              <tr>
                                 <th>ID</th>
                                 <th>Vessel</th>
                                 <th>Date</th>
                                 {{-- <th>Date</th> --}}
                                 <th>Status</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($allVdrs as $vdr)
                                 <tr >
                                    <td>{{$vdr->id}}</td>
                                    <td class="text-truncate" ><a href="{{route('vdr.show.spa', [enkripRambo($vdr->id), enkripRambo('index')])}}">{{$vdr->code}}</a></td>
                                    <td>{{$vdr->date}}</td>
                                    {{-- <td>{{formatDate($sche->date)}}</td> --}}
                                    <td class="text-truncate">
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
            <div class="col-md-5">
               <div class="card shadow-lg">
                  <div class="card-body">
                     <div class="badge badge-info mb-2">Log Activity</div>
                     <div  class="table-responsive overflow-auto " style="height: 450px" >
                     <table class=""   >
                        <thead>
                           <tr class="border">
                              <th>Time</th>
                              {{-- <th>User</th> --}}
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($logs as $log)
                              <tr class="border">
                                 <td class="text-truncate">
                                    {{-- <div class="badge badge-light"> --}}
                                       {{-- {{$log->created_at}}  --}}
                                       {{$log->created_at}} <br>
                                       {{$log->user->name ?? ''}}
                                    {{-- </div> --}}
                                   
                                    
                                     
                                 </td>
                                 {{-- <td class="text-truncate" style="width: 90px"></td> --}}
                                 <td>{{$log->action}}</td>
                                 {{-- <td class="text-truncate" style="max-width: 100px"></td> --}}
                                 {{-- <td></td> --}}
                                 
                              </tr>
                           @endforeach
                        </tbody>
                     </table>
                     </div>
                     {{-- {{ $logs->links() }} --}}
                  </div>
               </div>
               <table class="display  border">
                  <tbody>
                     <tr>
                        <th>Log Activity</th>
                     </tr>
                  </tbody>
               </table>
               <div class="table-responsive overflow-auto" style="height: 460px">
                
               </div>
            </div>
         </div>
      </div>
   </section>

@endsection



