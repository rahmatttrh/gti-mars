@extends('layouts.stisla.app-vdr')
@section('title')
   VDR Dashboard
@endsection
@section('content')
<style>
   table {
      width: 100%;
   }

   table, th, td {
      border: 1px solid rgb(226, 218, 218);
      border-collapse: collapse;
   }
   th, td {
      padding-left: 5px
   }
</style>
   <section class="section">

      <div class="row">
         <div class="col-md-2">
            <h4>OVERVIEW VDR</h4>
            <hr>
            <table>
               <tbody>
                  <tr>
                     <td>Total</td>
                     <td>{{count($vdrs)}}</td>
                  </tr>
                  <tr>
                     <td>Draft</td>
                     <td>4</td>
                  </tr>
                  <tr>
                     <td>PET</td>
                     <td>2</td>
                  </tr>
                  <tr>
                     <td>Marine</td>
                     <td>2</td>
                  </tr>
                  <tr>
                     <td>Suptend</td>
                     <td>2</td>
                  </tr>
                  <tr>
                     <td>Done</td>
                     <td>6</td>
                  </tr>
               </tbody>
            </table>
            {{-- Lorem ipsum dolor sit amet consectetur, adipisicing elit. Est libero deserunt autem consectetur ea nihil, iusto distinctio corrupti harum. At debitis ipsum est. --}}
         </div>
         <div class="col-md-10">
            <div class="table-responsive">
               <table class="table table-striped table-sm" id="table-1">
                  <thead>
                     <tr>
                        <th rowspan="2" class="text-center">No.</th>
                        <th rowspan="2">VDR Number</th>
                        {{-- <th rowspan="2">Vessel</th> --}}
                        <th rowspan="2">Date</th>
                        <th rowspan="2">Crew</th>
                        {{-- <th>Created</th> --}}
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
                        {{-- <td>{{$vdr->vessel->name}}</td> --}}
                        <td>
                           {{formatDate($vdr->date)}} <br>
                           <small>{{formatDayName($vdr->date)}}</small>
                        </td>
                        <td>{{$vdr->crew_onduty}} / {{$vdr->crew_max}}</td>
                        {{-- <td>{{$vdr->created_by}}</td> --}}
                        <td class="text-center">
                           {{-- @if(date('Y-m-d', strtotime($vdr->date)) == date('Y-m-d'))
                           <span class="badge badge-warning">Draft</span>
                           @else
                           <span class="badge badge-success">Release</span>
                           @endif --}}
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
            </div>
         </div>
      </div>
      
      
      
      
      
      
      
      
      
      
   </section>

  
   


   
@endsection




