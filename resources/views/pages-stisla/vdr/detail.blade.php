@extends('layouts.stisla.app-vdr')
@section('title')
    Detail VDR
@endsection
@section('content')
<section class="section">
   <div class="section-header">
      <h1 class="section-title">Detail VDR </h1>
      <div class="section-header-breadcrumb">
         @if (auth()->user()->hasRole('marine'))
            <div class="breadcrumb-item "><a href="{{route('vdr.marine')}}">Dashboard</a></div>
            @elseif(auth()->user()->hasRole('vessel'))
            <div class="breadcrumb-item "><a href="{{route('vdr.vessel')}}">Dashboard</a></div>
            
         @endif
         
         {{-- <div class="breadcrumb-item">Schedule Plan</div> --}}
         <div class="breadcrumb-item active">Detail VDR</div>
      </div>
   </div>

   <div class="section-body">
      <div class="card">
         <div class="card-header d-flex justify-content-between">
            <b><span class="text-primary">VDR</span> {{$vessel->name}} | {{dayDate($vdr->date)}}</b>
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit">Edit</a>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-md-6">
                  <dl class="row">
                     
                     <dt class="col-5">Contract No.</dt>
                     <dd class="col-7">{{$vessel->contract_no ?? '-'}}</dd>
                     <dt class="col-5">Contract Period</dt>
                     <dd class="col-7">{{$vessel->contract_start ?? '-'}} - {{$vessel->contract_end ?? '-'}}</dd>
                     <dt class="col-5">Location (Midnight)</dt>
                     <dd class="col-7">{{$vdr->location_midnight ?? '-'}}</dd>
                     
               </dl>
               </div>
               <div class="col-md-6">
                  <dl class="row">
                     
                     <dt class="col-5">Owner/Operator</dt>
                     <dd class="col-7"> {{$vessel->owner ?? '-'}} / {{$vessel->operator ?? '-'}}</dd>
                     <dt class="col-5">Master Name</dt>
                     <dd class="col-7"> {{$vessel->master ?? '-'}}</dd>
                     <dt class="col-5">Number of Crew / Pax</dt>
                     <dd class="col-7">{{$vdr->crew_onduty}} / {{$vdr->crew_max}} Person</dd>
               </dl>
               </div>
            </div>
         </div>
      </div>
      
      <div class="row">
         <div class="col-md-6">
            <x-vdr.crew :crews="$crews" :vdr="$vdr" />
         </div>
         <div class="col-md-6">
            <x-vdr.weather :weathers="$weathers" :vdr="$vdr" />
         </div>
      </div>
      
      <x-vdr.activity :activities="$activities" :operatings="$operatings" :vdr="$vdr"/>
      <div class="row">
         <div class="col-md-12">
            <x-vdr.data :operatings="$operatings" :totaljam="$totalJam" :totaldaily="$totalDaily" :vdr="$vdr"/>
         </div>
         <div class="col-md-12">
            <x-vdr.fuel :cargos="$cargos" :vdr="$vdr" />
         </div>
      </div>

      <x-vdr.hsse :hses="$hses" :vdr="$vdr" />
      <x-vdr.engine :engines="$engines" :vdr="$vdr" />
      
   </div>
</section>


<x-vdr.crew-modal :crews="$crews" :user="$user" :vdr="$vdr" :vessel="$vessel"/>
   <x-vdr.activity-modal :activities="$activities" :user="$user" :vdr="$vdr" :vessel="$vessel"/>
@endsection



