@extends('layouts.stisla.app-vdr')
@section('title')
    VDR Create
@endsection
@section('content')
<section class="section">
   

    <div class="section-body">
      <div class="row">
         <div class="col-md-2">
            
            {{-- <div class="btn-group"> --}}
               <a href="" class="btn btn-block btn-primary">Release</a>
               {{-- <a href="" class="btn btn-block btn-light border">Delete</a> --}}
            {{-- </div> --}}
            <hr>
            <table>
               <tbody>
                  <tr>
                     <td>DETAIL VDR</td>
                  </tr>
                  <tr>
                     <td>ENC ONE</td>
                  </tr>
                  <tr>
                     <td>{{$vdr->code}}</td>
                  </tr>
                  <tr>
                     <td>15 June 2025</td>
                  </tr>
                  <tr>
                     <td> <span>Status : Draft</span></td>
                  </tr>
                  <tr>
                     <td></td>
                  </tr>
                  <tr>
                     <td><a href="">Update</a> | <a href="">Delete</a> </td>
                  </tr>
                  <tr>
                     <td><a href="">Export to PDF</a></td>
                  </tr>
               </tbody>
            </table>
            {{-- <h4>Detail VDR</h4>
            <span>ENC ONE</span> <br>
            <span>Status : Draft</span> --}}
               
         </div>

         <div class="col-md-10">
            <div class="table-responsive overflow-auto" style="height: 100vh"> 
               <div class="row">
                  <div class="col-md-5">
                     
                     {{-- <div class="table-responsive overflow-auto" style="height: 75vh"> --}}
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
                           @foreach ($weathers as $weather)
                              <input type="hidden" name="vdr_id" value="{{$vdr->id}}">
                              <input type="hidden" name="id[]" value="{{$weather->id}}">
                              <tr>
                                 <td>{{$weather->heading->description}}</td>
                                 <td class="text-center">
                                    <input class="w-100" type="text"  name="t_0006[]" value="{{ $weather->t_0006  }}">
                                 </td>
                                 <td class="text-center">
                                    <input class="w-100" type="text"  name="t_0612[]" value="{{ $weather->t_0612  }}">
                                 </td>
                                 <td class="text-center">
                                    <input class="w-100" type="text"  name="t_1218[]" value="{{ $weather->t_1218  }}">
                                 </td>
                                 <td class="text-center">
                                    <input class="w-100" type="text"  name="t_1824[]" value="{{ $weather->t_1824  }}">
                                 </td>
                              </tr>

                              @endforeach
                           
                        </tbody>
                     </table>
                     <table>
                        <thead>
                           <tr>
                              <td colspan="5">HSSE</td>
                           </tr>
                           <tr>
                              <th class="text-center">A</th>
                              <th>HSSE STATISTICS (INPUT)</th>
                              <th>Previous</th>
                              <th>Today</th>
                              <th>Monthly</th>
                           </tr>
                        </thead>
                        <tbody>
                              
                  
                                 <input type="hidden" name="vdr_id" value="{{$vdr->id}}">
                                 @php
                                 $groupHeader = 'A';
                                 $no = 1;
                                 @endphp
                  
                                 @foreach ($hses as $hse)
                                 <input type="hidden" name="id[]" value="{{$hse->id}}">
                                 @if($hse->header->group_header != $groupHeader)
                                 <thead>
                                    <tr>
                                          <th class="text-center">B</th>
                                          <th>HSSE STATISTICS (Output)</th>
                                          <th>Previous</th>
                                          <th>Today</th>
                                          <th>Monthly</th>
                                    </tr>
                                 </thead>
                  
                                 @php
                                 $no = 1;
                                 @endphp
                  
                                 @endif
                                 <tr>
                                    <td>{{ $no++}}</td>
                                    <td>{{$hse->header->description}}</td>
                                    @if($hse->header_id != 8)
                                    <td>
                                          <input class="w-100" type="number" name="previous[]"  value="{{$hse->previous}}">
                                    </td>
                                    <td>
                                          <input class="w-100" type="number" name="today[]"  value="{{$hse->today}}">
                                    </td>
                                    <td>
                                          <input class="w-100" type="text" name="monthly[]"  value="{{$hse->previous + $hse->today}}" readonly>
                                    </td>
                                    @else
                                    <input type="hidden" name="previous[]"  value="{{$hse->previous}}">
                                    <input type="hidden" name="today[]"  value="{{$hse->today}}">
                                    <input type="hidden" name="monthly[]"  value="{{$hse->today}}" readonly>
                                    <td colspan="3"></td>
                                    @endif
                                 </tr>
                  
                                 @php
                                 $groupHeader = $hse->header->group_header
                                 @endphp
                                 @endforeach
                  
                        
                              
                        </tbody>
                     </table>
                     {{-- </div> --}}
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
                     {{-- <div class="table-responsive overflow-auto" style="height: 100vh"> --}}
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
      
      
                           <tr>
                              <td colspan="2" class="text-center">Total</td>
                              <td><input class="w-100" id="start" name="start" required type="text"  ></td>
                              <td><input class="w-100" id="start" name="start" required type="text"  ></td>
                              <td><input class="w-100" id="start" name="start" required type="text"  ></td>
                              <td><input class="w-100" id="start" name="start" required type="text"  ></td>
                              <td><input class="w-100" id="start" name="start" required type="text"  ></td>
                              <td><input class="w-100" id="start" name="start" required type="text"  ></td>
                              <td><input class="w-100" id="start" name="start" required type="text"  ></td>
                              <td><input class="w-100" id="start" name="start" required type="text"  ></td>
                              <td></td>
                           </tr>
                           
                        </tbody>
                     </table>
                     <table>
                       
                        <thead>
                           <tr>
                              <td colspan="5">Summary of Daily Operating Data</td>
                           </tr>
                           <tr class="text-center ">
                              <th class="">Operating Mode</th>
                              <th>Total Time</th>
                              <th>Min. Speed as Contract (Knots) <br> </th>
                              <th >Contractual Fuel Cons. </th>
                              <th>Daily Fuel Cons. </th>
                           </tr>
                        </thead>
                        <tbody>
                           
                              @foreach ($operatings as $operating)
                              <tr id="baris-{{$operating->id}}">
                                 <!-- <td> -->
                                 <input type="hidden" name="id[]" value="{{$operating->id}}">
                                 <!-- </td> -->
                                 <td> {{$operating->heading->description}} </td>
                                 <td class="text-center align-middle">
                                    {{getTotalHours($operating->time)}}
                                       <input type="text" name="time[]" readonly hidden  value="{{$operating->time}}">
                                 </td>
                                 <td class="text-center align-middle">
                                       @if($operating->heading->speed == '1')
                                       <input class="w-100" type="number" name="speed[]"  value="{{$operating->speed}}">
                                       @else
                                       <input class="w-100" type="hidden" name="speed[]"  value="{{$operating->speed}}">
                                       @endif
                                 </td>
            
                                 <td class="text-center align-middle">
                                    <!-- {{$operating->contractual_fuel}} -->
                                       @if($operating->heading->contractual == '1')
                                       <input class="w-100" type="text" name="contractual_fuel[]"  value="{{$operating->contractual_fuel}}">
                                       @else
                                       <input class="w-100" type="hidden" name="contractual_fuel[]"  value="{{$operating->contractual_fuel}}">
                                       @endif
                                 </td>
                                 <td class="text-center align-middle">
            
            
                                       @if($operating->heading->daily == '1')
                                       <input class="w-100" type="text" readonly name="daily[]"  value="{{$operating->daily}}">
                                       @else
                                       <input class="w-100" type="hidden" readonly name="daily[]"  value="{{$operating->daily}}">
                                       @endif
                                 </td>
                              </tr>
                              @endforeach
                              <tr>
                                 <th>Total Daily</th>
                                 <th class="text-center">
                                       {{$totalJam}}
                                 </th>
                                 <th colspan="2"></th>
                                 <td class="text-center">
                                       <b>{{round($totalDaily)}} Ltrs</b> 
                                       @if (auth()->user()->hasRole('vessel'))
                                           @else
                                           {{-- ({{$vdr->operatings->sum('daily')}}) --}}
                                       @endif
                                       
                                       {{-- {{$totaldaily}} Ltrs --}}
                                 </td>
                              </tr>
            
                           
                        </tbody>
                     </table>
      
                     
                     {{-- </div> --}}
                     
                  
                  </div>
                  <div class="col">
                     {{-- <div class="table-responsive overflow-auto" style="height: 100vh"> --}}
                     <table>
                        
                        <thead>
                           <tr>
                              <td colspan="7">Summary of Daily Fuel, Water, and Cargoes Remaining Onboard</td>
                           </tr>
                           <tr class="text-center align-middle">
                              <th style="width: 120px">TYPE</th>
                              <th style="width: 100px">Opening <br> <small>(ROB from Previous Day)</small></th>
                              <th style="width: 100px" >Actual Consumption <br> <small>(Based on Actual Sounding)</small></th>
                              <th style="width: 100px">Received</th>
                              <th style="width: 100px">Transferred</th>
                              <th style="width: 100px">Closing</th>
                              <th style="width: 180px">Remarks</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($cargos as $cargo)
                              <tr>
                                 <!-- <td> -->
                                 <input type="hidden" name="id[]" value="{{$cargo->id}}">
                                 <!-- </td> -->
                                 <td> {{$cargo->heading->description}} </td>
                                 <td class="text-center align-middle" >
                                       <input type="number" name="opening[]" style="width: 100px"  value="{{$cargo->opening}}">
                                 </td>
                                 
                                       @if($cargo->heading->is_consumption == '1')
                                       <td class="text-center align-middle">
                                          <input type="hidden" style="width: 100px" readonly name="consumption[]"  value="{{$cargo->consumption}}">
                                          <span class="my-2">{{$cargo->consumption}}</span>
                                       </td>
                                       @else
                                       <td class="" style="background-color: rgb(167, 171, 170)">
                                       <input type="hidden" style="width: 100px" readonly name="consumption[]"  value="{{$cargo->consumption}}">
                                       </td>
                                       @endif
                                 
                                 <td class="text-center align-middle">
                                       <input type="number" name="received[]" style="width: 100px"  value="{{$cargo->received}}">
                                 </td>
                                 <td class="text-center align-middle">
                                       <input type="number" name="transferred[]" style="width: 100px"  value="{{$cargo->transferred}}">
                                 </td>
                                 <td class="text-center align-middle">
                                    @if($cargo->heading->is_consumption == '1')
                                       <input type="text" name="closing[]" style="width: 100px"   value="{{$cargo->closing}}">
                                       @else
                                       <span class="my-2">{{ $cargo->closing}}</span>
                                       <input type="text" hidden name="closing[]" style="width: 100px"   value="{{$cargo->closing}}">
                                    @endif
                                 </td>
                                 <td class="text-center align-middle"  >
                                       <input type="text" name="remarks[]" style="min-width: 300px"  value="{{$cargo->remarks}}">
                                 </td>
                              </tr>
                           @endforeach
                        </tbody>
                     </table>
                     {{-- </div> --}}
                  </div>
               </div>
            </div>
         </div>
      </div>
    </div>
  </section>
    
@endsection