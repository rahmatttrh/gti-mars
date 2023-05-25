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
               <div class="btn-list">
                  {{-- <div class="dropdown">
                     <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                     Month
                     </button>
                        <div class="dropdown-menu dropdown-menu-end">
                           <a class="dropdown-item" href="{{route('request.month.progress', enkripRambo(01))}}">
                              Januari
                           </a>
                           <a class="dropdown-item" href="{{route('request.month.progress', enkripRambo(02))}}">
                              Februari
                           </a>
                           <a class="dropdown-item" href="{{route('request.month.progress', enkripRambo(03))}}">
                              Maret
                           </a>
                           <a class="dropdown-item" href="{{route('request.month.progress', enkripRambo(04))}}">
                              April
                           </a>
                           <a class="dropdown-item" href="{{route('request.month.progress', enkripRambo(05))}}">
                              Mei
                           </a>
                           <a class="dropdown-item" href="{{route('request.month.progress', enkripRambo(06))}}">
                              Juni
                           </a>
                           <a class="dropdown-item" href="{{route('request.month.progress', enkripRambo(07))}}">
                              Juli
                           </a>
                           <a class="dropdown-item" href="{{route('request.month.progress', enkripRambo(8))}}">
                              Agustus
                           </a>
                           <a class="dropdown-item" href="{{route('request.month.progress', enkripRambo(9))}}">
                              September
                           </a>
                           <a class="dropdown-item" href="{{route('request.month.progress', enkripRambo(10))}}">
                              Oktober
                           </a>
                           <a class="dropdown-item" href="{{route('request.month.progress', enkripRambo(11))}}">
                              November
                           </a>
                           <a class="dropdown-item" href="{{route('request.month.progress', enkripRambo(12))}}">
                              Desember
                           </a>
                        </div>
                  </div> --}}
                  @if (auth()->user()->hasRole('marine'))
                  <div class="dropdown">
                     <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                     Option
                     </button>
                     <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="/">
                           Chart
                        </a>
                        <a class="dropdown-item" href="{{route('dashboard.table')}}">
                           Table
                        </a>
                        
                     </div>
                  </div>
                  @endif
                  
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="page-body">
      <div class="container-xl">
         @if (auth()->user()->hasRole('superuser'))
            <x-dashboard.superuser :schedules="$schedules" :monthname="$monthName"/>
            @elseif(auth()->user()->hasRole('marine'))
            <x-dashboard.marine :requestrecents="$requestRecents" :requestprogress="$requestProgress" :schedules="$schedules" :monthname="$monthName" />
            @elseif(auth()->user()->hasRole('department'))
            <x-dashboard.logistic :requests="$requests" :monthname="$monthName"/>
            @elseif(auth()->user()->hasRole('logistic'))
            <x-dashboard.logistic :requests="$requests" :monthname="$monthName"/>
            @elseif(auth()->user()->hasRole('drilling'))
            <x-dashboard.drilling :requests="$requests" :monthname="$monthName"/>
            @elseif(auth()->user()->hasRole('vessel'))
            <x-dashboard.vessel :schedules="$schedules"   :recentschedules="$recentSchedules" :vessel="$vessel" i="0"/>


            @elseif(auth()->user()->hasRole('supplier'))
            <x-dashboard.supplier :schedules="$schedules" :monthname="$monthName" :vessels="$vessels"/>
            @elseif(auth()->user()->hasRole('retail'))
            <x-dashboard.retail :schedules="$schedules" :monthname="$monthName" :vessels="$vessels"/>
            @elseif(auth()->user()->hasRole('receiving'))
            <x-dashboard.receiving :schedules="$schedules" :monthname="$monthName" :vessels="$vessels"/>
            
         @endif
         
      </div>
   </div>

   
   
@endsection

      


    