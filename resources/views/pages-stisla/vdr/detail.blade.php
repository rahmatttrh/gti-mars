@extends('layouts.stisla.app-vdr')
@section('title')
    Detail VDR
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


   {{-- <div class="section-header">
      <h1 class="section-title">Detail VDR </h1>
      <div class="section-header-breadcrumb">
         @if (auth()->user()->hasRole('marine'))
            <div class="breadcrumb-item "><a href="{{route('vdr.marine')}}">Dashboard</a></div>
            @elseif(auth()->user()->hasRole('vessel'))
            <div class="breadcrumb-item "><a href="{{route('vdr.vessel')}}">Dashboard</a></div>
            
         @endif
         
         <div class="breadcrumb-item active">Detail VDR</div>
      </div>
   </div> --}}

   <div class="section-body">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
         <li class="nav-item">
            <a class="nav-link active" id="progress-tab" data-toggle="tab" href="#progress" role="tab" aria-controls="progress" aria-selected="true">VDR {{$vessel->name}}  {{formatDate($vdr->date)}}</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" id="weather-tab" data-toggle="tab" href="#weather" role="tab" aria-controls="weather" aria-selected="false">Weather Condition</a>
         </li>
         
         <li class="nav-item">
            <a class="nav-link" id="hse-tab" data-toggle="tab" href="#hse" role="tab" aria-controls="hse" aria-selected="false">HSE </a>
         </li>
         
         <li class="nav-item">
            <a class="nav-link" id="activity-tab" data-toggle="tab" href="#activity" role="tab" aria-controls="activity" aria-selected="false">Operational Activities </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" id="operating-tab" data-toggle="tab" href="#operating" role="tab" aria-controls="operating" aria-selected="false">Operating Data </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" id="cargo-tab" data-toggle="tab" href="#cargo" role="tab" aria-controls="cargo" aria-selected="false">Fuel, Water and Cargoes </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" id="periodic-tab" data-toggle="tab" href="#periodic" role="tab" aria-controls="periodic" aria-selected="false">Periodical Fuel </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" id="crew-tab" data-toggle="tab" href="#crew" role="tab" aria-controls="crew" aria-selected="false">Crew & Passanger </a>
         </li>
         <li class="nav-item">
            <a class="nav-link" id="engine-tab" data-toggle="tab" href="#engine" role="tab" aria-controls="engine" aria-selected="false">Engine Parameter Log </a>
         </li>
      </ul>
      <div class="tab-content" id="myTabContent">
         <div class="tab-pane fade show active" id="progress" role="tabpanel" aria-labelledby="progress-tab">
            <div class="row mt-2">
               <div class="col-md-8">
                 
               

                  @if ($vdr->status == 1 && auth()->user()->hasRole('marine'))
                  <div class="btn-group mr-2">
                     <a href="{{route('vdr.approve.marine', enkripRambo($vdr->id))}}" class="btn btn-sm btn-info">Approve </a>
                     <a href="" class="btn btn-sm btn-danger shadow-none" data-toggle="modal" data-target="#vdr-reject-marine">Reject</a>
                  </div>
                  
                  @endif
   
                  @if ($vdr->status == 2 && auth()->user()->hasRole('suptent'))
                  <a href="{{route('vdr.approve.suptent', enkripRambo($vdr->id))}}" class="btn btn-sm btn-light text-primary border shadow-none">Approve Superintendent</a>
                  @endif
   
                  @if ($vdr->status == 3 && auth()->user()->hasRole('chief'))
                  <a href="{{route('vdr.approve.luthfi', enkripRambo($vdr->id))}}" class="btn btn-sm btn-light text-primary border shadow-none">Approve Mr. Luthfi</a>
                  @endif
                  
                  
                  
                  <table>
                     <tbody>
                        <tr>
                           <td><x-status-stisla.vdr :vdr="$vdr" /></td>
                           <td>{{$vdr->times->where('type', 'reject')->where('status', 1)->first()->desc ?? '-'}}</td>
                        </tr>
                        <tr>
                           <td>Contract No.</td>
                           <td>{{$vessel->contract_no ?? '-'}}</td>
                        </tr>
                        <tr>
                           <td>Contract Period</td>
                           <td>{{$vessel->contract_start ?? '-'}} - {{$vessel->contract_end ?? '-'}}</td>
                        </tr>
                        <tr>
                           <td>Location</td>
                           <td>{{$vdr->location_midnight ?? '-'}}</td>
                        </tr>
                        <tr>
                           <td>Owner</td>
                           <td> {{$vessel->owner ?? '-'}} / {{$vessel->operator ?? '-'}}</td>
                        </tr>
                        <tr>
                           <td>Master name</td>
                           <td>{{$vessel->master ?? '-'}}</td>
                        </tr>
                        <tr>
                           <td>Num of Crew</td>
                           <td>{{$vdr->crew_onduty}} / {{$vdr->crew_max}} Person</td>
                        </tr>
                     </tbody>
                  </table>
                 
               </div>
               <div class="col">
                  @if (auth()->user()->hasRole('vessel'))
                     @if ($vdr->status == 0 || $vdr->status == 101 || $vdr->status == 202 || $vdr->status == 303) 
                        <a href="{{route('vdr.release', enkripRambo($vdr->id))}}" class="btn btn-block btn-info border shadow-none">Release</a>
                        <a href="#" class="btn  btn-block btn-light border shadow-none" data-toggle="modal" data-target="#modalEdit">Edit</a>
                     @endif
                  @endif
                  <a href="{{route('document.vdr', enkripRambo($vdr->id))}}" target="_blank" class="btn btn-block btn-light border shadow-none">Export PDF</a>
                  
               </div>
            </div>
         </div>
         <div class="tab-pane fade" id="weather" role="tabpanel" aria-labelledby="weather-tab">
            {{-- <b>Inbox</b> --}}
            <x-vdr.weather :weathers="$weathers" :vdr="$vdr" />
         </div>
         <div class="tab-pane fade" id="hse" role="tabpanel" aria-labelledby="hse-tab">
            <x-vdr.hsse :hses="$hses" :vdr="$vdr" />
         </div>
         <div class="tab-pane fade" id="activity" role="tabpanel" aria-labelledby="activity-tab">
            <x-vdr.activity :activities="$activities" :operatings="$operatings" :vdr="$vdr" />
         </div>
         <div class="tab-pane fade" id="operating" role="tabpanel" aria-labelledby="operating-tab">
            <x-vdr.data :operatings="$operatings" :totaljam="$totalJam" :totaldaily="$totalDaily" :vdr="$vdr"/>
         </div>
         <div class="tab-pane fade" id="cargo" role="tabpanel" aria-labelledby="cargo-tab">
            <x-vdr.fuel :cargos="$cargos" :vdr="$vdr" />
         </div>
         <div class="tab-pane fade" id="periodic" role="tabpanel" aria-labelledby="periodic-tab">
            <x-vdr.periodic :periodic="$periodic" :vdr="$vdr" />
         </div>
         <div class="tab-pane fade" id="crew" role="tabpanel" aria-labelledby="crew-tab">
            <x-vdr.crew :crews="$crews" :vdr="$vdr" />
         </div>
         <div class="tab-pane fade" id="engine" role="tabpanel" aria-labelledby="engine-tab">
            <x-vdr.engine :engines="$engines" :vdr="$vdr" />
         </div>
         
      </div>



      {{-- <x-vdr.detail :vessel="$vessel" :vdr="$vdr" :crews="$crews" :weathers="$weathers" :activities="$activities" :operatings="$operatings" :totaljam="$totalJam" :totaldaily="$totalDaily" :cargos="$cargos" :hses="$hses" :engines="$engines" /> --}}
      
   </div>
</section>


<x-vdr.crew-modal :crews="$crews" :user="$user" :vdr="$vdr" :vessel="$vessel"/>
<x-vdr.activity-modal :activities="$activities" :user="$user" :vdr="$vdr" :vessel="$vessel"/>

{{-- Modal Revision Schedule --}}
<div class="modal fade" id="vdr-reject-marine" tabindex="1" role="dialog" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <form action="{{route('vdr.reject.marine')}}" method="POST">
      @csrf
      <input type="number" name="vdr" id="vdr" value="{{$vdr->id}}" hidden>
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Form Reject VDR</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div class="form-row">
               <div class="form-group col-md-12">
                  <label for="desc">Description</label>
                  <input type="text" class="form-control" id="desc" name="desc" >
               </div>
               
            </div>
         </div>
         <div class="modal-footer bg-whitesmoke">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">Reject</button>
         </div>
      </div>
      </form>
   </div>
</div>
@endsection



