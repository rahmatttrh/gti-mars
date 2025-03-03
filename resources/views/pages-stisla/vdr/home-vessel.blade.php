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
      @if ($vdr)
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
                           <td style="width: 250px"><x-status-stisla.vdr :vdr="$vdr" /></td>
                           <td>{{$vdr->times->where('type', 'reject')->where('status', 1)->first()->desc ?? '-'}}</td>
                        </tr>
                        <tr>
                           <td>Contract No.</td>
                           <td>{{$vdr->contract ?? '-'}}</td>
                        </tr>
                        <tr>
                           <td>Contract Period</td>
                           <td>{{formatDate($vdr->contract_start) ?? '-'}} - {{formatDate($vdr->contract_end) ?? '-'}}</td>
                        </tr>
                        <tr>
                           <td>Location</td>
                           <td>{{$vdr->location_midnight ?? '-'}}</td>
                        </tr>
                        <tr>
                           <td>Owner</td>
                           <td> {{$vdr->owner }}</td>
                        </tr>
                        
                        <tr>
                           <td>Num of Crew</td>
                           <td>{{$vdr->crew_onduty}} / {{$vdr->crew_max}} Person</td>
                        </tr>
                        <tr>
                           <td></td>
                        </tr>
                        <tr>
                           <td>Master</td>
                           <td>{{$vdr->master ?? '-'}}</td>
                        </tr>
                        <tr>
                           <td>Chief Engineer</td>
                           <td>{{$vdr->ce ?? '-'}}</td>
                        </tr>
                     </tbody>
                  </table>
                 
               </div>
                 
               
               <div class="col-md-4">
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
      @endif
      
   </section>

   @if ($vdr)
   <x-vdr.crew-modal :crews="$crews" :user="$user" :vdr="$vdr" :vessel="$vessel"/>
   <x-vdr.activity-modal :activities="$activities" :user="$user" :vdr="$vdr" :vessel="$vessel"/>
   @endif
   


   
@endsection




