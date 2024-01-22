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
      <x-vdr.detail :vessel="$vessel" :vdr="$vdr" :crews="$crews" :weathers="$weathers" :activities="$activities" :operatings="$operatings" :totaljam="$totalJam" :totaldaily="$totalDaily" :cargos="$cargos" :hses="$hses" :engines="$engines" />
      
   </div>
</section>


<x-vdr.crew-modal :crews="$crews" :user="$user" :vdr="$vdr" :vessel="$vessel"/>
   <x-vdr.activity-modal :activities="$activities" :user="$user" :vdr="$vdr" :vessel="$vessel"/>
@endsection



