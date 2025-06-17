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
            <div class="col-md-5">
               <table>
                  <thead>
                     <tr>
                        <td colspan="4">General Information</td>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td class="px-1">Date</td>
                        <td><input class="w-100" id="date" name="date" required type="date" value="{{ old('date') ?: date('Y-m-d') }}" ></td>
                        <td class="px-1">Loc</td>
                        <td><input class="w-100" id="location_midnight" name="location_midnight" required type="text"  ></td>
                     </tr>
                     <tr>
                        <td class="px-1">Crew</td>
                        <td><input class="w-100" id="onduty" name="onduty" type="number" value="10" ></td>
                        <td class="px-1">Pax</td>
                        <td><input class="w-100" id="max" name="max" type="text" value="0" ></td>
                     </tr>
                  </tbody>
               </table>
               
               <table>
                  <thead>
                     <tr>
                        <td colspan="4">Weather Condition</td>
                     </tr>
                     <tr>
                        <td>Weather/Time</td>
                        <td>00:00 - 06:00 hrs</td>
                        <td>06:00 - 12:00 hrs</td>
                        <td>12:00 - 18:00 hrs</td>
                        <td>18:00 - 24:00 hrs</td>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($wHeadings as $w)
                        <tr>
                           <td class="px-1">{{$w->heading}}</td>
                           <td class="">
                              <input type="text" class="w-100"  name="t_0006[]" value="">
                           </td>
                           <td class="">
                              <input type="text" class="w-100"  name="t_0612[]" value="">
                           </td>
                           <td class="">
                              <input type="text" class="w-100"  name="t_1218[]" value="">
                           </td>
                           <td class="">
                              <input type="text" class="w-100"  name="t_1824[]" value="">
                           </td>
                        </tr>
                     @endforeach
                     
                  </tbody>
               </table>
               <table>
                  <thead>
                     <tr>
                        <td>HSSE</td>
                     </tr>
                     <tr>
                        <td>HSSE Statistic</td>
                        <td>Previous</td>
                        <td>Today</td>
                        <td>Monthly</td>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($hseHeadings as $hse)
                         <tr>
                           <td class="" style="max-width: 500px">{{$hse->description}}</td>
                           <td><input class="w-100" id="max" name="max" type="text" value="0" ></td>
                           <td><input class="w-100" id="max" name="max" type="text" value="0" ></td>
                           <td><input class="w-100" id="max" name="max" type="text" value="0" ></td>
                         </tr>
                     @endforeach
                  </tbody>
               </table>
               <hr>
               {{-- <div class="badge badge-info mb-2">GENERAL INFORMATION</div>
               
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
                           <label for="vessel">Vessel Name</label><br>
                           <input class="w-100" id="vessel" name="vessel" type="text" value="{{$user->name}}" readonly>
                           @error('vessel')
                              <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                           @enderror
                        </div>
                        
                        <div class="form-row">
                           <div class="form-group col-md-6">
                              <label for="date">Date</label><br>
                              <input class="w-100" id="date" name="date" required type="date" value="{{ old('date') ?: date('Y-m-d') }}" >
                              @error('date')
                                 <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                              @enderror
                           </div>
                           <div class="form-group col-md-6">
                              <label for="location_midnight">Location</label><br>
                              <input class="w-100" id="location_midnight" name="location_midnight" required type="text"  >
                              @error('location_midnight')
                                 <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                              @enderror
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="form-group col-md-6">
                              <label for="onduty">Number of Crew</label><br>
                              <input class="w-100" id="onduty" name="onduty" type="number" value="10" >
                              @error('onduty')
                                 <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                              @enderror
                           </div>
                           <div class="form-group col-md-6">
                              <label for="max">Pax</label><br>
                              <input class="w-100" id="max" name="max" type="text" value="0" >
                              @error('max')
                                 <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                              @enderror
                           </div>
                        </div>
   
                        <button type="submit" class="btn btn-info">Create</button>
                     </form> --}}
                 
            </div>
   
            <div class="col-md-7">
               <table>
                  <thead>
                     <tr>
                        <td colspan="13">Detail of Daily Operational Activity </td>
                     </tr>
                     <tr>
                        <td colspan="2" class="text-center">Time</td>
                        <td colspan="8" class="text-center">Operating Mode Duration (hh:mm) - 
                           Except Maintenance & Downtime </td>
                        <td rowspan="2" class="text-center">Activities</td>
                     </tr>
                     <tr>
                        <td class="text-center">Start</td>
                        <td class="text-center">Finish</td>
                        <td class="text-center">High</td>
                        <td class="text-center">Normal</td>
                        <td class="text-center">Slow</td>
                        <td class="text-center">Manu</td>
                        <td class="text-center">Idle</td>
                        <td class="text-center">Tow</td>
                        <td class="text-center">A/H</td>
                        <td class="text-center">S/B</td>
                        
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td><input class="w-100" id="start" name="start" required type="text"  ></td>
                        <td><input class="w-100" id="finish" name="finish" required type="text"  ></td>
                        <td><input class="w-100" id="high" name="high" required type="text"  ></td>
                        <td><input class="w-100" id="normal" name="normal" required type="text"  ></td>
                        <td><input class="w-100" id="slow" name="slow" required type="text"  ></td>
                        <td><input class="w-100" id="manu" name="manu" required type="text"  ></td>
                        <td><input class="w-100" id="idle" name="idle" required type="text"  ></td>
                        <td><input class="w-100" id="tow" name="tow" required type="text"  ></td>
                        <td><input class="w-100" id="ah" name="ah" required type="text"  ></td>
                        <td><input class="w-100" id="bs" name="bs" required type="text"  ></td>
                        <td><input class="w-100" id="activity" name="activity" required type="text"  ></td>
                     </tr>
                     <tr>
                        <td><input class="w-100" id="start" name="start" required type="text"  ></td>
                        <td><input class="w-100" id="finish" name="finish" required type="text"  ></td>
                        <td><input class="w-100" id="high" name="high" required type="text"  ></td>
                        <td><input class="w-100" id="normal" name="normal" required type="text"  ></td>
                        <td><input class="w-100" id="slow" name="slow" required type="text"  ></td>
                        <td><input class="w-100" id="manu" name="manu" required type="text"  ></td>
                        <td><input class="w-100" id="idle" name="idle" required type="text"  ></td>
                        <td><input class="w-100" id="tow" name="tow" required type="text"  ></td>
                        <td><input class="w-100" id="ah" name="ah" required type="text"  ></td>
                        <td><input class="w-100" id="bs" name="bs" required type="text"  ></td>
                        <td><input class="w-100" id="activity" name="activity" required type="text"  ></td>
                     </tr>
                     <tr>
                        <td><input class="w-100" id="start" name="start" required type="text"  ></td>
                        <td><input class="w-100" id="finish" name="finish" required type="text"  ></td>
                        <td><input class="w-100" id="high" name="high" required type="text"  ></td>
                        <td><input class="w-100" id="normal" name="normal" required type="text"  ></td>
                        <td><input class="w-100" id="slow" name="slow" required type="text"  ></td>
                        <td><input class="w-100" id="manu" name="manu" required type="text"  ></td>
                        <td><input class="w-100" id="idle" name="idle" required type="text"  ></td>
                        <td><input class="w-100" id="tow" name="tow" required type="text"  ></td>
                        <td><input class="w-100" id="ah" name="ah" required type="text"  ></td>
                        <td><input class="w-100" id="bs" name="bs" required type="text"  ></td>
                        <td><input class="w-100" id="activity" name="activity" required type="text"  ></td>
                     </tr>
                     <tr>
                        <td><input class="w-100" id="start" name="start" required type="text"  ></td>
                        <td><input class="w-100" id="finish" name="finish" required type="text"  ></td>
                        <td><input class="w-100" id="high" name="high" required type="text"  ></td>
                        <td><input class="w-100" id="normal" name="normal" required type="text"  ></td>
                        <td><input class="w-100" id="slow" name="slow" required type="text"  ></td>
                        <td><input class="w-100" id="manu" name="manu" required type="text"  ></td>
                        <td><input class="w-100" id="idle" name="idle" required type="text"  ></td>
                        <td><input class="w-100" id="tow" name="tow" required type="text"  ></td>
                        <td><input class="w-100" id="ah" name="ah" required type="text"  ></td>
                        <td><input class="w-100" id="bs" name="bs" required type="text"  ></td>
                        <td><input class="w-100" id="activity" name="activity" required type="text"  ></td>
                     </tr>
                     <tr>
                        <td><input class="w-100" id="start" name="start" required type="text"  ></td>
                        <td><input class="w-100" id="finish" name="finish" required type="text"  ></td>
                        <td><input class="w-100" id="high" name="high" required type="text"  ></td>
                        <td><input class="w-100" id="normal" name="normal" required type="text"  ></td>
                        <td><input class="w-100" id="slow" name="slow" required type="text"  ></td>
                        <td><input class="w-100" id="manu" name="manu" required type="text"  ></td>
                        <td><input class="w-100" id="idle" name="idle" required type="text"  ></td>
                        <td><input class="w-100" id="tow" name="tow" required type="text"  ></td>
                        <td><input class="w-100" id="ah" name="ah" required type="text"  ></td>
                        <td><input class="w-100" id="bs" name="bs" required type="text"  ></td>
                        <td><input class="w-100" id="activity" name="activity" required type="text"  ></td>
                     </tr>
                     <tr>
                        <td><input class="w-100" id="start" name="start" required type="text"  ></td>
                        <td><input class="w-100" id="finish" name="finish" required type="text"  ></td>
                        <td><input class="w-100" id="high" name="high" required type="text"  ></td>
                        <td><input class="w-100" id="normal" name="normal" required type="text"  ></td>
                        <td><input class="w-100" id="slow" name="slow" required type="text"  ></td>
                        <td><input class="w-100" id="manu" name="manu" required type="text"  ></td>
                        <td><input class="w-100" id="idle" name="idle" required type="text"  ></td>
                        <td><input class="w-100" id="tow" name="tow" required type="text"  ></td>
                        <td><input class="w-100" id="ah" name="ah" required type="text"  ></td>
                        <td><input class="w-100" id="bs" name="bs" required type="text"  ></td>
                        <td><input class="w-100" id="activity" name="activity" required type="text"  ></td>
                     </tr>
                     
                  </tbody>
               </table>
               <table>
                  <thead>
                     <tr>
                        <td colspan="5">Summary of Daily Operating Data</td>
                     </tr>
                     <tr>
                        <td>Operating Mode</td>
                        <td>Total Time (hh:mm)</td>
                        <td>Min. Speed as Contract
                           (Knots)</td>
                        <td>Contractual Fuel Cons. Remuneration Figures</td>
                        <td>Daily Fuel Cons. by Remuneration Figure</td>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($operatingHeadings as $op)
                     <tr>
                        <td>{{$op->field}}</td>
                        <td><input class="w-100" id="max" name="max" type="text" value="0" ></td>
                        <td><input class="w-100" id="max" name="max" type="text" value="0" ></td>
                        <td><input class="w-100" id="max" name="max" type="text" value="0" ></td>
                        <td><input class="w-100" id="max" name="max" type="text" value="0" ></td>
                     </tr>
                         
                     @endforeach
                  </tbody>
               </table>
               {{-- <div class="card border-none shadow-none">
                  
                  <div class="card-body text-center">
                     <h1>Data VDR</h1>
                     <hr>
                     Data akan muncul setelah klik Submit pada Form Create VDR
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




