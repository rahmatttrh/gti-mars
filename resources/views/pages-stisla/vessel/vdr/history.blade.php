@extends('layouts.stisla.app-vdr')
@section('title')
   History
@endsection
@section('content')
<section class="section">
   {{-- <div class="section-header">
      <h1 class="section-title">VDR History</h1>
      <div class="section-header-breadcrumb">
         <div class="breadcrumb-item "><a href="{{route('vdr.vessel')}}">Dashboard</a></div>
         <div class="breadcrumb-item active">VDR History</div>
      </div>
   </div> --}}

   <div class="section-body">
      <div class="row">
         <div class="col-md-3">
            <div class="card shadow">
               <div class="card-header"><h5>VDR History</h5></div>
               <div class="card-body">
                  Daftar VDR yang sudah anda buat didalam sistem</span>
                  <hr>
                  <div class="card bg-success">
                     <div class="card-body">
                        <h5>{{count($vdrs)}} VDR</h5>
                     </div>
                  </div>
                  <hr>
                  Klik pada VDR number untuk melihat detail
                  
               </div>
            </div>
           
            
         </div>
         <div class="col-md-9">
            <div class="card shadow">
             
               <div class="card-body">
                  
                  {{-- <div class="table-responsive"> --}}
                     <table class="datatables-vdr " id="datatable">
                        <thead>
                           <tr>
                            
                              <th rowspan="2">Vessel</th>
                              <th rowspan="2">VDR Number</th>
                            
                              <th rowspan="2">Date</th>
                             
                              <th rowspan="2" class="text-center">Status</th>
                            
                            
                              <th colspan="2" class="text-center">Total</th>
                              <th rowspan="2"></th>
                           </tr>
                           <tr>
                             
                              <th class="text-center">Time</th>
                              <th class="text-center">Daily Fuel</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach($vdrs as $vdr)
                           <tr>
                             
                              <td>{{$vdr->vessel->name}}</td>
                              <td>
                                 @if (auth()->user()->username == 'logindo' || auth()->user()->username == 'tegasjaya')
                                    <a href="{{route('vdr.show.spa', [enkripRambo($vdr->id), enkripRambo('index')])}}">{{$vdr->code}}</a>
                                     @else
                                     <a href="{{route('vdr.show', [enkripRambo($vdr->id), enkripRambo('index')])}}">{{$vdr->code}}</a>
                                 @endif
                              
                              </td>
                             
                              <td class="text-truncate">
                                 {{$vdr->date}} <br>
                                
                              </td>
                              <td>
                            
                                 <x-status-stisla.vdr :vdr="$vdr" />
                              </td>
                             
                           
                              <td class="text-center">{{$vdr->getTotalHours()}}</td>
                              <td class="text-center">{{ceil($vdr->operatings->sum('daily'))}}</td>
                              <td>
                                 <a href="{{route('vdr.show.spa', [enkripRambo($vdr->id), enkripRambo('index')])}}">Detail SPA</a>
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  {{-- </div> --}}
               </div>
            </div>
         </div>
      </div>
     
      {{-- <div class="table-responsive">
         <table class="table table-striped table-sm" id="table-1">
            <thead>
               <tr>
                  <th rowspan="2" class="text-center">No.</th>
                  <th rowspan="2">VDR Number</th>
                 
                  <th rowspan="2">Date</th>
                  <th rowspan="2">Crew</th>
                 
                  <th rowspan="2" class="text-center">Status</th>
                  <th colspan="2" class="text-center">High Speed Contract</th>
                  <th colspan="2" class="text-center">Normal Speed Contract</th>
                  <th colspan="2" class="text-center">Slow Speed Contract</th>
                  <th colspan="2" class="text-center">Total</th>
               </tr>
               <tr>
                  <th>Speed</th>
                  <th>Fuel</th>
                  <th>Speed</th>
                  <th>Fuel</th>
                  <th>Speed</th>
                  <th>Fuel</th>
                  <th>Time</th>
                  <th>Daily Fuel</th>
               </tr>
            </thead>
            <tbody>

               @foreach($vdrs as $vdr)
               <tr>
                  <td class="text-muted text-center"><small>{{++$i}}</small></td>
                  <td>
                     <a href="{{route('vdr.show', [enkripRambo($vdr->id), enkripRambo('index')])}}">{{vdrId($vdr->id)}}</a> <br>
                     <small>{{$vdr->vessel->name}}</small>
                  </td>
                 
                  <td>
                     {{formatDate($vdr->date)}} <br>
                     <small>{{formatDayName($vdr->date)}}</small>
                  </td>
                  <td>{{$vdr->crew_onduty}} / {{$vdr->crew_max}}</td>
                
                  <td class="text-center">
                   
                     <x-status-stisla.vdr :vdr="$vdr" />
                  </td>
                  
                  <td>{{$vdr->operatings->where('heading_id', 1)->first()->speed}}</td>
                  <td>{{$vdr->operatings->where('heading_id', 1)->first()->contractual_fuel}}</td>
                  <td>{{$vdr->operatings->where('heading_id', 2)->first()->speed}}</td>
                  <td>{{$vdr->operatings->where('heading_id', 2)->first()->contractual_fuel}}</td>
                  <td>{{$vdr->operatings->where('heading_id', 3)->first()->speed}}</td>
                  <td>{{$vdr->operatings->where('heading_id', 3)->first()->contractual_fuel}}</td>
                  <td>{{$vdr->getTotalHours()}}</td>
                  <td>{{$vdr->customRound($vdr->operatings->sum('daily'))}}</td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div> --}}
   </div>
</section>
    
@endsection