@extends('layouts.stisla.app-vdr')
@section('title')
    Dashboard
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
      @if ($vdr)
         <div class="row">
            
            <div class="col-md-12">
               <x-vdr.detail :vessel="$vessel" :vdr="$vdr" :crews="$crews" :weathers="$weathers" :activities="$activities" :operatings="$operatings" :totaljam="$totalJam" :totaldaily="$totalDaily" :cargos="$cargos" :hses="$hses" :engines="$engines" />
               
            </div>
         </div>
         
         
         {{-- <div class="row">
            <div class="col-md-6">
               <x-vdr.crew :crews="$crews" :vdr="$vdr" />
            </div>
            <div class="col-md-6">
               <x-vdr.weather :weathers="$weathers" :vdr="$vdr" />
            </div>
         </div> --}}
         
         {{-- <x-vdr.activity :activities="$activities" :operatings="$operatings" :vdr="$vdr"/>
         <div class="row">
            <div class="col-md-12">
               <x-vdr.data :operatings="$operatings" :totaljam="$totalJam" :totaldaily="$totalDaily" :vdr="$vdr"/>
            </div>
            <div class="col-md-12">
               <x-vdr.fuel :cargos="$cargos" :vdr="$vdr" />
            </div>
         </div> --}}

         {{-- <x-vdr.hsse :hses="$hses" :vdr="$vdr" />
         <x-vdr.engine :engines="$engines" :vdr="$vdr" /> --}}
         
         @else

         {{-- FORM CREATE VDR --}}
         <div class="row">
            <div class="col-md-4">
               <div class="card shadow-sm border">
                  <div class="card-header">Form Create VDR</div>
                  <div class="card-body">
                     <form action="{{route('vdr.store')}}" method="POST" class="inline-form">
                        @csrf
                        @if ($errors->any())
                        <div class="alert alert-danger text-danger">
                              <ul>
                                 @foreach ($errors->all() as $error)
                                 <li><small>{{ $error }}</small></li>
                                 @endforeach
                              </ul>
                        </div>
                        @endif
                        <input type="hidden" name="vessel_id" value="{{$vessel->id}}" id="">
                        <input type="hidden" name="created_by" value="{{$user->name}}">
   
                        <div class="form-group">
                           <label for="vessel">Vessel Name</label>
                           <input class="form-control" id="vessel" name="vessel" type="text" value="{{$user->name}}" readonly>
                           @error('vessel')
                              <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                           @enderror
                        </div>
                        
                        <div class="form-row">
                           <div class="form-group col-md-6">
                              <label for="date">Date</label>
                              <input class="form-control" id="date" name="date" required type="date" value="{{ old('date') ?: date('Y-m-d') }}" >
                              @error('date')
                                 <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                              @enderror
                           </div>
                           <div class="form-group col-md-6">
                              <label for="location_midnight">Location</label>
                              <input class="form-control" id="location_midnight" name="location_midnight" required type="text"  >
                              @error('location_midnight')
                                 <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                              @enderror
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="form-group col-md-6">
                              <label for="onduty">Number of Crew</label>
                              <input class="form-control" id="onduty" name="onduty" type="number" value="1" >
                              @error('onduty')
                                 <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                              @enderror
                           </div>
                           <div class="form-group col-md-6">
                              <label for="max">Max</label>
                              <input class="form-control" id="max" name="max" type="text" value="20" >
                              @error('max')
                                 <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                              @enderror
                           </div>
                        </div>
   
                        <button type="submit" class="btn btn-info">Submit</button>
                     </form>
                  </div>
               </div>
            </div>
   
            <div class="col-md-8">
               <div class="card border shadow-sm">
                  {{-- <div class="card-header">
                     WEATHER CONDITION
                  </div> --}}
                  <div class="card-body text-center">
                     <h1>Data VDR</h1>
                     <hr>
                     Data akan muncul setelah klik Submit pada Form Create VDR
                  </div>
               </div>
               {{-- <div class="card border shadow-sm">
                  <div class="card-header d-flex justify-content-between">
                     DETAIL OF DAILY OPERATIONAL ACTIVITIES
                     <a href="#" class="card-btn " data-bs-toggle="modal" data-bs-target="#modalAdd">
                        Add Activites
                    </a>
                  </div>
                  <div class="card-body">
                     Empty
                  </div>
               </div>
   
               <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     SUMMARY OF DAILY OPERATING DATA
                     
                  </div>
                  <div class="card-body">
                     Empty
                  </div>
               </div>
   
               <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     SUMMARY OF DAILY FUEL, WATER and CARGOES REMAINING ONBOARD
                     
                  </div>
                  <div class="card-body">
                     Empty
                  </div>
               </div> --}}
            </div>
         </div>
      @endif
      
   </section>

   @if ($vdr)
   <x-vdr.crew-modal :crews="$crews" :user="$user" :vdr="$vdr" :vessel="$vessel"/>
   <x-vdr.activity-modal :activities="$activities" :user="$user" :vdr="$vdr" :vessel="$vessel"/>
   @endif
   


   
@endsection




