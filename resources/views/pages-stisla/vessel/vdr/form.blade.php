@extends('layouts.stisla.app-vdr')
@section('title')
    VDR Create
@endsection
@section('content')
<section class="section">
   

    <div class="section-body">
      <div class="row">
         <div class="col-md-4">
            <div class="card shadow-none border">
               <div class="card-header"><b>Form Create VDR</b></div>
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
                           <input class="form-control" id="onduty" name="onduty" type="number" value="10" >
                           @error('onduty')
                              <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                           @enderror
                        </div>
                        <div class="form-group col-md-6">
                           <label for="max">Pax</label>
                           <input class="form-control" id="max" name="max" type="text" value="0" >
                           @error('max')
                              <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                           @enderror
                        </div>
                     </div>

                     <button type="submit" class="btn btn-info">Create</button>
                  </form>
               </div>
            </div>
         </div>

         <div class="col-md-8">
            <div class="card border-none shadow-none">
               {{-- <div class="card-header">
                  WEATHER CONDITION
               </div> --}}
               <div class="card-body text-center">
                  <h1>Data VDR</h1>
                  <hr>
                  Data akan muncul setelah klik Submit pada Form Create VDR
               </div>
            </div>
           
         </div>
      </div>
    </div>
  </section>
    
@endsection