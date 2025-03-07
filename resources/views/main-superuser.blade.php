@extends('layouts.stisla.app-main')
@section('title')
   Home Page
@endsection

@section('content')
   <section class="section">
      <div class="section-body">
         <div class="row"> 
            <div class="col-md-7">
               <div class="row">
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
               </div>
               {{-- <span class="btn btn-light border">Sailing Order</span> --}}
               <div class="row">
                  <div class="col-6">
                     
                  </div>
               </div>
               <table class="display  border">
                  <tbody>
                     <tr>
                        <th>All Vessel Daily Report</th>
                     </tr>
                  </tbody>
               </table>
               <div class="table-responsive overflow-auto" style="height: 120px">
                  <table class="display  border">
                     
                     <thead>
                        
                        <tr>
                           <th>Vessel</th>
                           <th>Date</th>
                           {{-- <th>Date</th> --}}
                           <th>Status</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($allVdrs as $vdr)
                           <tr class="border" style="border: 1px black">
                              <td><a href="{{route('schedule.detail', enkripRambo($vdr->id))}}">{{$vdr->vessel->name}}</a></td>
                              <td>{{formatDate($vdr->date)}}</td>
                              {{-- <td>{{formatDate($sche->date)}}</td> --}}
                              <td>
                                 <x-status-stisla.vdr :vdr="$vdr" />
                              </td>
                           </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
               <table class="display  border">
                  <tbody>
                     <tr>
                        <th>All Sailing Order</th>
                     </tr>
                  </tbody>
               </table>
               <div class="table-responsive overflow-auto" style="height: 120px">
                  <table class="display  border">
                     
                     <thead>
                        
                        <tr>
                           <th>Vessel</th>
                           <th>Code</th>
                           {{-- <th>Date</th> --}}
                           <th>Status</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($allSchedules as $sche)
                           <tr class="border" style="border: 1px black">
                              <td><a href="{{route('schedule.detail', enkripRambo($sche->id))}}">{{$sche->vessel->name}}</a></td>
                              <td>{{$sche->code}}</td>
                              {{-- <td>{{formatDate($sche->date)}}</td> --}}
                              <td>
                                 <x-status-stisla.schedule-plain :schedule="$sche"/>
                              </td>
                           </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
               <hr>
               
               @if ($itemRejects)
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
                   
               @endif
      
            </div>
            <div class="col-md-5">
               <table class="display  border">
                  <tbody>
                     <tr>
                        <th>Log Activity</th>
                     </tr>
                  </tbody>
               </table>
               <div class="table-responsive overflow-auto" style="height: 320px">
                <table class="border display "   >
                  <thead>
                     <tr>
                        <th>Time</th>
                        <th>User</th>
                        <th>Action</th>
                        {{-- <th>Desc</th> --}}
                        {{-- <th>Table</th> --}}
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($logs as $log)
                        <tr class="border">
                           <td class="text-truncate">{{formatDateTime($log->created_at)}}</td>
                           <td class="text-truncate" style="max-width: 100px">{{$log->user->name}}</td>
                           <td>{{$log->action}}</td>
                           {{-- <td>{{$log->desc}}</td> --}}
                           {{-- <td>{{$log->table}}</td> --}}
                        </tr>
                     @endforeach
                  </tbody>
               </table>
               </div>
            </div>
         </div>
      </div>
   </section>

@endsection



