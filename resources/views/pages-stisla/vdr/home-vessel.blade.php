@extends('layouts.stisla.app')
@section('title')
    Dashboard
@endsection
@section('content')
   <section class="section">
      @if ($vdr)
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
         
         <x-vdr.activity :activities="$activities" :operatings="$operatings"/>
         @else

         {{-- FORM CREATE VDR --}}
         <div class="row">
            <div class="col-md-4">
               <div class="card">
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
   
                        <button type="submit" class="btn btn-primary">Submit</button>
                     </form>
                  </div>
               </div>
            </div>
   
            <div class="col-md-8">
               <div class="card">
                  <div class="card-header">
                     WEATHER CONDITION
                  </div>
                  <div class="card-body">
                     Empty
                  </div>
               </div>
               <div class="card">
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
               </div>
            </div>
         </div>
      @endif
      
   </section>

   @if ($vdr)
   <x-vdr.crew-modal :crews="$crews" :user="$user" :vdr="$vdr" :vessel="$vessel"/>
   <x-vdr.activity-modal :activities="$activities" :user="$user" :vdr="$vdr" :vessel="$vessel"/>
   @endif
   


   
@endsection




