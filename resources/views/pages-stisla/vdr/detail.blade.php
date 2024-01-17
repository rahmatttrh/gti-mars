@extends('layouts.stisla.app-vdr')
@section('title')
    Detail VDR
@endsection
@section('content')
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
      <div class="card">
         {{-- <div class="card-header">
           <h4>Accordion</h4>
         </div> --}}
         <div class="card-body">
            {{-- <hr> --}}
            <div id="accordion">
               <div class="accordion">
                  <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-head" aria-expanded="true">
                  <h4>Vessel Daily Report {{$vessel->name}}  | {{dayDate($vdr->date)}}</h4>
                  </div>
                  <div class="accordion-body collapse show" id="panel-head" data-parent="#accordion">
                     
                     {{-- <h5 class="mt-2">{{$vessel->name}}</h5> --}}
                     <a href="#" class="mb-2" data-toggle="modal" data-target="#modalEdit">Edit...</a>
                     <div class="row">
                        <div class="col">
                           <dl class="row">
                     
                              <dt class="col-5">Contract No.</dt>
                              <dd class="col-7">{{$vessel->contract_no ?? '-'}}</dd>
                              <dt class="col-5">Contract Period</dt>
                              <dd class="col-7">{{$vessel->contract_start ?? '-'}} - {{$vessel->contract_end ?? '-'}}</dd>
                              <dt class="col-5">Location</dt>
                              <dd class="col-7">{{$vdr->location_midnight ?? '-'}}</dd>
                              
                           </dl>
                        </div>
                        <div class="col">
                           <dl class="row">
                     
                              <dt class="col-5">Owner</dt>
                              <dd class="col-7"> {{$vessel->owner ?? '-'}} / {{$vessel->operator ?? '-'}}</dd>
                              <dt class="col-5">Master Name</dt>
                              <dd class="col-7"> {{$vessel->master ?? '-'}}</dd>
                              <dt class="col-5">Num of Crew / Pax</dt>
                              <dd class="col-7">{{$vdr->crew_onduty}} / {{$vdr->crew_max}} Person</dd>
                           </dl>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="accordion">
                  <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-1" >
                  <h4>Crew & Passenger List</h4>
                  </div>
                  <div class="accordion-body collapse" id="panel-body-1" data-parent="#accordion">
                     <x-vdr.crew :crews="$crews" :vdr="$vdr" />
                  </div>
               </div>
               <div class="accordion">
                  <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-2">
                     <h4>Wheater Condition</h4>
                  </div>
                  <div class="accordion-body collapse" id="panel-body-2" data-parent="#accordion">
                     <x-vdr.weather :weathers="$weathers" :vdr="$vdr" />
                  </div>
               </div>
               <div class="accordion">
                  <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-3">
                     <h4>Detail of Daily Operational Activities</h4>
                  </div>
                  <div class="accordion-body collapse" id="panel-body-3" data-parent="#accordion">
                     <x-vdr.activity :activities="$activities" :operatings="$operatings" :vdr="$vdr"/>
                  </div>
               </div>
               <div class="accordion">
                  <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-4">
                     <h4>Summary of Daily Operating Data</h4>
                  </div>
                  <div class="accordion-body collapse" id="panel-body-4" data-parent="#accordion">
                     <x-vdr.data :operatings="$operatings" :totaljam="$totalJam" :totaldaily="$totalDaily" :vdr="$vdr"/>
                  </div>
               </div>
               <div class="accordion">
                  <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-5">
                     <h4>Summary of Daily Fuel, Water and Cargos Remaining Onboard</h4>
                  </div>
                  <div class="accordion-body collapse" id="panel-body-5" data-parent="#accordion">
                     <x-vdr.fuel :cargos="$cargos" :vdr="$vdr" />
                  </div>
               </div>
               <div class="accordion">
                  <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-6">
                     <h4>HSSE</h4>
                  </div>
                  <div class="accordion-body collapse" id="panel-body-6" data-parent="#accordion">
                     <x-vdr.hsse :hses="$hses" :vdr="$vdr" />
                  </div>
               </div>
               <div class="accordion">
                  <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-7">
                     <h4>Vessel Daily Engine Parameter Log</h4>
                  </div>
                  <div class="accordion-body collapse" id="panel-body-7" data-parent="#accordion">
                     <x-vdr.engine :engines="$engines" :vdr="$vdr" />
                  </div>
               </div>
            </div>
         </div>
      </div>
      
   </div>
</section>


<x-vdr.crew-modal :crews="$crews" :user="$user" :vdr="$vdr" :vessel="$vessel"/>
   <x-vdr.activity-modal :activities="$activities" :user="$user" :vdr="$vdr" :vessel="$vessel"/>
@endsection



