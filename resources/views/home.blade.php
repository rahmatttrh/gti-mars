@extends('layouts.app')
@section('title')
    Dashboard
@endsection

@section('content')

   <div class="container-xl">
      <!-- Page title -->
      <div class="page-header d-print-none">
         <div class="row align-items-center">
            <div class="col">
            <!-- Page pre-title -->
            <div class="page-pretitle">
               Overview
            </div>
            <h2 class="page-title">
               Dashboard
            </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
               {{$today->format('l, d/m/Y')}}
               {{-- <div class="btn-list">
                  <span class="d-none d-sm-inline">
                     <a href="#" class="btn btn-white">
                     New view
                     </a>
                  </span>
                  <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                  </a>
               </div> --}}
            </div>
         </div>
      </div>
   </div>
   <div class="page-body">
      <div class="container-xl">
         @if (auth()->user()->hasRole('superuser'))
            <x-dashboard.superuser :schedules="$schedules" :monthname="$monthName"/>
            @elseif(auth()->user()->hasRole('marine'))
            <x-dashboard.marine :schedules="$schedules" :monthname="$monthName" :vessels="$vessels"/>
            @elseif(auth()->user()->hasRole('logistic'))
            <x-dashboard.logistic  :monthname="$monthName"/>
            
            @elseif(auth()->user()->hasRole('supplier'))
            <x-dashboard.supplier :schedules="$schedules" :monthname="$monthName" :vessels="$vessels"/>
            @elseif(auth()->user()->hasRole('retail'))
            <x-dashboard.retail :schedules="$schedules" :monthname="$monthName" :vessels="$vessels"/>
            @elseif(auth()->user()->hasRole('receiving'))
            <x-dashboard.receiving :schedules="$schedules" :monthname="$monthName" :vessels="$vessels"/>
            @elseif(auth()->user()->hasRole('vessel'))
            <x-dashboard.vessel :schedules="$schedules" :monthname="$monthName"  :vessels="$vessels" :vessel="$vessel"/>
         @endif
         
      </div>
   </div>

   <x-modal.add-vessel />
   
   
@endsection

      


    