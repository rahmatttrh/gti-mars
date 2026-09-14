@extends('layouts.stisla.app-vdr')
@section('title')
   VDR Validation
@endsection
@section('content')
<style>
    table {
      width: 100%;
      /* background-color: white;
      border-radius: 5px;
      box-shadow: 1px 1px 5px rgb(159, 158, 158); */
   }
</style>
<section class="section">
   {{-- <div class="section-header">
      <h1 class="section-title">VDR History</h1>
      <div class="section-header-breadcrumb">
         <div class="breadcrumb-item "><a href="{{route('vdr.marine')}}">Dashboard</a></div>
         <div class="breadcrumb-item active">VDR History</div>
      </div>
   </div> --}}

   <div class="section-body">
      {{-- <h2 class="section-title">Schedule Plan</h2>
      <p class="section-lead">
         We use 'DataTables' made by @SpryMedia. You can check the full documentation <a href="https://datatables.net/">here</a>.
      </p> --}}

      <div class="row">
         <div class="col-md-3">
            @if ($title == 'Validation')
               
               <div class="card shadow">
                  <div class="card-body">
                     <h5>VDR  Validation </h5>
                     Daftar VDR yang membutuhkan Approval <span class="text-uppercase"><b>{{$level}}</b></span>
                     <hr>
                     <div class="row text-center">

                        <div class="col-12">
                            <div class="card bg-info text-white border-0 mb-3">
                                <div class="card-body py-3">
            
                                    <i class="fas fa-file-alt fa-2x mb-2"></i>
            
                                    <h2 class="mb-0">
                                        {{ count($vdrs) }}
                                    </h2>
            
                                    <small>Pending VDR Approval</small>
            
                                </div>
                            </div>
                        </div>
            
                     </div>
                    <div class="border-top pt-3">

                     <div class="d-flex align-items-center">
         
                         <i class="fas fa-mouse-pointer text-primary mr-2"></i>
         
                         <small class="text-muted">
                             Click the <b>VDR Number</b> to review and approve the report.
                         </small>
         
                     </div>
         
                 </div>
                     
                  </div>
               </div>
                @elseif($title == 'Reject')

                <div class="card">
                  <div class="card-body">
                     <h5>VDR Reject</h5>
                     Daftar VDR yang sudah di Reject </span>
                     <hr>
                     {{-- <div class="card bg-danger">
                        <div class="card-body">
                           <h5>{{count($vdrs)}} VDR</h5>
                        </div>
                     </div> --}}
                     <div class="row text-center">

                        <div class="col-12">
                            <div class="card bg-danger text-white border-0 mb-3">
                                <div class="card-body py-3">
            
                                    <i class="fas fa-file-alt fa-2x mb-2"></i>
            
                                    <h2 class="mb-0">
                                        {{ count($vdrs) }}
                                    </h2>
            
                                    <small>VDR Rejected</small>
            
                                </div>
                            </div>
                        </div>
            
                     </div>
                     <hr>
                     <div class="border-top pt-3">

                        <div class="d-flex align-items-center">
            
                            <i class="fas fa-mouse-pointer text-primary mr-2"></i>
            
                            <small class="text-muted">
                                Click the <b>VDR Number</b> to review and approve the report.
                            </small>
            
                        </div>
            
                    </div>
                     
                  </div>
               </div>
            @endif
            
         </div>
         <div class="col-md-9">
            <div class="card shadow">
               {{-- <div class="card-header">
                  <b>VDR Validation</b>
               </div> --}}
               <div class="card-body">
                  
                  <div class="table-responsive">
                     <table class="datatables-vdr" id="datatable">
                        <thead>
                           <tr>
                              {{-- <th rowspan="2" class="text-center">No.</th> --}}
                              {{-- <th rowspan="2">Vessel</th> --}}
                              <th rowspan="2">VDR Number</th>
                              {{-- <th rowspan="2">Vessel</th> --}}
                              {{-- <th rowspan="2">Day</th> --}}
                              <th rowspan="2">Date</th>
                              {{-- <th rowspan="2">Crew</th> --}}
                              {{-- <th>Created</th> --}}
                              <th rowspan="2" class="text-center">Status</th>
                              @if ($title == 'Reject')
                                  <th rowspan="2">Note</th>
                              @endif
                              {{-- <th colspan="2" class="text-center">High Speed Contract</th>
                              <th colspan="2" class="text-center">Normal Speed Contract</th>
                              <th colspan="2" class="text-center">Slow Speed Contract</th> --}}
                              <th colspan="2" class="text-center">Total</th>
                           </tr>
                           <tr>
                              {{-- <th>Speed</th>
                              <th>Fuel</th>
                              <th>Speed</th>
                              <th>Fuel</th>
                              <th>Speed</th>
                              <th>Fuel</th> --}}
                              <th class="text-center">Time</th>
                              <th class="text-center">Daily Fuel</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($vdrs as $vdr)
                           <tr>
                              {{-- <td class="text-muted text-center"><small>{{++$i}}</small></td> --}}
                              {{-- <td>{{$vdr->vessel->name}} </td> --}}
                              <td>
                                 @if (auth()->user()->username == 'lutfiaryanto')
                              
                                 <a href="{{route('document.vdr', enkripRambo($vdr->id))}}">{{$vdr->code}}</a>
                                 @else
                                 <a href="{{route('vdr.show.spa', [enkripRambo($vdr->id), enkripRambo('index')])}}">{{$vdr->code}}</a>
                                 {{-- <a href="{{route('vdr.show', [enkripRambo($vdr->id), enkripRambo('index')])}}">{{$vdr->vessel->name}}</a> --}}
                                 @if ($level == 'Radop' && $vdr->area != null && $vdr->status == 2 && $vdr->vessel->loan == 1)
                                 <small class="">
                                    <i class="fas fa-info-circle"></i>
                                    Approval Not Required
                                 </small>   
                                 
                                 @endif
                                 @endif
                                 {{-- <a href="{{route('vdr.show.spa', [enkripRambo( $vdr->id), enkripRambo('index')])}}">{{vdrId($vdr->id)}}</a> <br> --}}
                                 {{-- <small>{{$vdr->vessel->name}}</small> --}}
                              </td>
                             
                              {{-- <td>{{formatDayName($vdr->date)}}</td> --}}
                              <td class="text-truncate px-2">
                                 {{$vdr->date}}
                                 {{-- <small>{{formatDayName($vdr->date)}}</small> --}}
                              </td>
                              {{-- <td>{{$vdr->crew_onduty}} / {{$vdr->crew_max}}</td> --}}
                              {{-- <td>{{$vdr->created_by}}</td> --}}
                              <td class="text-center">
                                 {{-- @if(date('Y-m-d', strtotime($vdr->date)) == date('Y-m-d'))
                                 <span class="badge badge-warning">Draft</span>
                                 @else
                                 <span class="badge badge-success">Release</span>
                                 @endif --}}
                                 <x-status-stisla.vdr :vdr="$vdr" />
                                 <div class="badge badge-light">{{$vdr->area}}</div>
                              </td>
                              @if ($title == 'Reject')
                                 <td class="text-truncate" style="max-width: 150px" data-toggle="tooltip" data-placement="bottom" title="{{$vdr->reject_desc}}">
                                    {{$vdr->reject_desc}}
                                 </td>
                              @endif
                              
                              {{-- <td>{{$vdr->operatings->where('heading_id', 1)->first()->speed}}</td>
                              <td>{{$vdr->operatings->where('heading_id', 1)->first()->contractual_fuel}}</td>
                              <td>{{$vdr->operatings->where('heading_id', 2)->first()->speed}}</td>
                              <td>{{$vdr->operatings->where('heading_id', 2)->first()->contractual_fuel}}</td>
                              <td>{{$vdr->operatings->where('heading_id', 3)->first()->speed}}</td>
                              <td>{{$vdr->operatings->where('heading_id', 3)->first()->contractual_fuel}}</td> --}}
                              <td class="text-center">{{$vdr->getTotalHours()}}</td>
                              {{-- <td class="text-center">{{ceil($vdr->operatings->sum('daily'))}}</td>  --}}

                              <td class="text-center">{{round($vdr->operatings->sum('daily'))}}</td>
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
</section>
    
@endsection