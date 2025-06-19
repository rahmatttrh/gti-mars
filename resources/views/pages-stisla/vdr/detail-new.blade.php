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
      
      <div class="row">
         <div class="col-md-2">
            
            {{-- <div class="btn-group"> --}}
               @if (auth()->user()->hasRole('vessel'))
                  @if ($vdr->status == 0 || $vdr->status == 101 || $vdr->status == 202 || $vdr->status == 303) 
                  <a href="" class="btn btn-block btn-primary" data-toggle="modal" data-target="#modalReleaseVdr">Release</a>
                  @endif
               @endif
            <hr>
            <table>
               <tbody>
                  <tr>
                     <td colspan="2">{{$vdr->code}}</td>
                  </tr>
                  <tr>
                     <td colspan="2">ENC ONE</td>
                  </tr>
                  <tr>
                     <td colspan="2"> <span>Status : <x-status-stisla.vdr :vdr="$vdr" /> </span></td>
                  </tr>
                  <tr>
                     <td>Contract</td>
                     <td><input class="w-100 input_general" id="contract" name="contract" type="text" value="{{$vdr->contract}}" ></td>
                  </tr>
                  <tr>
                     <td>Period</td>
                     <td>
                        <input class="w-100 input_general" id="contract_start" name="contract_start" type="date" value="{{$vdr->contract_start}}" >
                        <input class="w-100 input_general" id="contract_end" name="contract_end" type="date" value="{{$vdr->contract_end}}" >
                     </td>
                  </tr>
                  <tr>
                     <td>Owner</td>
                     <td><input class="w-100 input_general" id="owner" name="owner" type="text" value="{{$vdr->owner}}" ></td>
                  </tr>
                  <tr>
                     <td>Master</td>
                     <td><input class="w-100 input_general" id="master" name="master" type="text" value="{{$vdr->master}}" ></td>
                  </tr>
                  <tr>
                     <td>CE</td>
                     <td><input class="w-100 input_general" id="ce" name="ce" type="text" value="{{$vdr->ce}}" ></td>
                  </tr>
                  {{-- <tr>
                     <td>{{$vdr->code}}</td>
                  </tr>
                  <tr>
                     <td>15 June 2025</td>
                  </tr>
                  <tr>
                     <td> <span>Status : <x-status-stisla.vdr :vdr="$vdr" /> </span></td>
                  </tr>
                  <tr>
                     <td class="text-muted"> Data VDR ini hanya bisa dilihat oleh kapal</td>
                  </tr> --}}
                  <tr>
                     <td></td>
                  </tr>
                  <tr>
                     <td colspan="2"><a href="">Update</a> | <a href="">Delete</a> </td>
                  </tr>
                  <tr>
                     <td colspan="2"><a href="">Export to PDF</a></td>
                  </tr>
               </tbody>
            </table>
            {{-- <h4>Detail VDR</h4>
            <span>ENC ONE</span> <br>
            <span>Status : Draft</span> --}}
               
         </div>

         <div class="col-md-10">
            <div class="table-responsive overflow-auto" style="height: 75vh"> 
               <div class="row">
                  <div class="col-md-5">
                     
                     {{-- <div class="table-responsive overflow-auto" style="height: 75vh"> --}}
                     {{-- General  --}}
                     <table>
                        <thead>
                           <tr>
                              <td colspan="4">General Information</td>
                           </tr>
                        </thead>
                        <tbody>
                           <form id="form_general"  method="POST">
                              @csrf
                              <input type="text" name="vdr" id="vdr" value="{{$vdr->id}}" hidden>
                              <tr>
                                 <td class="px-1">Date</td>
                                 <td><input class="w-100 input_general" id="date" name="date" required type="date" value="{{ old('date') ?: date('Y-m-d') }}" ></td>
                                 <td class="px-1">Loc</td>
                                 <td><input class="w-100 input_general" id="location_midnight" name="location_midnight" required type="text" value="{{$vdr->location_midnight}}"  ></td>
                              </tr>
                              <tr>
                                 <td class="px-1">Crew</td>
                                 <td><input class="w-100 input_general" id="onduty" name="onduty" type="text" value="{{$vdr->crew_onduty ?? '0'}}" ></td>
                                 <td class="px-1">Pax</td>
                                 <td><input class="w-100 input_general" id="pax" name="pax" type="text" value="{{$vdr->crew_max ?? '0'}}" ></td>
                              </tr>
                           </form>
                        </tbody>
                     </table>
                     
                     {{-- Weather --}}
                     <div class="table-responsive overflow-auto" style="height: 400px"> 
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
                                 <td class="text-truncate">{{$weather->heading->description}}</td>
                                 <input type="text" name="weatherId" id="weatherId" value="{{$weather->id}}" hidden>
                                 <td class="text-center">
                                    <input class="w-100 input_weather_{{$weather->id}}" type="text"  id="t_0006_{{$weather->id}}" name="t_0006_{{$weather->id}}" value="{{$weather->t_0006}} ">
                                 </td>
                                 <td class="text-center">
                                    <input class="w-100 input_weather_{{$weather->id}}" type="text" id="t_0612_{{$weather->id}}"  name="t_0612_{{$weather->id}}" value="{{$weather->t_0612}}">
                                 </td>
                                 <td class="text-center">
                                    <input class="w-100 input_weather_{{$weather->id}}" type="text" id="t_1218_{{$weather->id}}"  name="t_1218_{{$weather->id}}" value="{{$weather->t_1218}}">
                                 </td>
                                 <td class="text-center">
                                    <input class="w-100 input_weather_{{$weather->id}}" type="text" id="t_1824_{{$weather->id}}"  name="t_1824_{{$weather->id}}" value="{{$weather->t_1824}}">
                                 </td>
                              </tr>

                              @endforeach
                           
                        </tbody>
                     </table>

                     {{-- HSSE --}}
                     
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
                                    <input type="hidden" id="hsse" value="{{$hse->id}}">
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
                                             <input class="w-100 input_hsse_{{$hse->id}}" type="number" id="previous_{{$hse->id}}" name="previous[]"  value="{{$hse->previous}}">
                                       </td>
                                       <td>
                                             <input class="w-100 input_hsse_{{$hse->id}}" type="number" id="today_{{$hse->id}}" name="today[]"  value="{{$hse->today}}">
                                       </td>
                                       <td>
                                          {{-- <span class="hse_month"></span> --}}
                                          <input class="w-100 hse_month_{{$hse->id}}" readonly type="text" name="" id="hse_month_{{$hse->id}}">
                                             {{-- <input class="w-100 hse_month" type="text" name="monthly[]" id="monthly_{{$hse->id}}"  value="{{$hse->previous + $hse->today}}" readonly> --}}
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
                     </div>
                     
                     
                  </div>
         
                  <div class="col-md-7">
                     {{-- <div class="table-responsive overflow-auto" style="height: 100vh"> --}}
                     <table class="w-100">
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
                           @php
                              $totalHigh = 0;
                              $totalNormal = 0;
                              $totalSlow = 0;
                              $totalManu = 0;
                              $totalIdle = 0;
                              $totalTow = 0;
                              $totalAh = 0;
                              $totalAb = 0;
                              @endphp
                              @foreach ($activities as $activity)
                              <tr>
                                    <td class="text-info">
                                       {{-- {{substr($activity->start, 0, 5)}}   --}}
                                       <input style="width: 75px"  class=" input_activity"  type="time" name="activity_start" id="activity_start" value="{{$activity->start}}">
                                    </td>
                                    <td class="text-danger">
                                       {{-- {{substr($activity->finish, 0, 5)}} --}}
                                       <input  style="width: 75px" class=" input_activity"  type="time" name="activity_finish" id="activity_finish" value="{{$activity->finish}}">
                                    </td>
                                    <td>
                                       {{-- {{getTotalHours($activity->high)}} --}}
                                       <input class="" style="width: 70px" placeholder="HH.mm" id="high" name="high" value="{{getTotalHours($activity->high)}}" type="text" >
                                    </td>
                                    <td>
                                       {{-- {{getTotalHours($activity->normal)}} --}}
                                       <input class="" style="width: 70px" placeholder="HH.mm" id="normal" name="normal" value="{{getTotalHours($activity->normal)}}" type="text" >
                                    </td>
                                    <td>
                                       {{-- {{getTotalHours($activity->slow)}} --}}
                                       <input class="" style="width: 70px" placeholder="HH.mm" id="slow" name="slow" value="{{getTotalHours($activity->slow)}}" type="text" >
                                    </td>
                                    <td>
                                       {{-- {{getTotalHours($activity->manu)}} --}}
                                       <input class="" style="width: 70px" placeholder="HH.mm" id="manu" name="manu" value="{{getTotalHours($activity->manu)}}" type="text" >
                                    </td>
                                    <td>
                                       {{-- {{getTotalHours($activity->idle)}} --}}
                                       <input class="" style="width: 70px" placeholder="HH.mm" id="idle" name="idle" value="{{getTotalHours($activity->idle)}}" type="text" >
                                    </td>
                                    <td>
                                       {{-- {{getTotalHours($activity->tow)}} --}}
                                       <input class="" style="width: 70px" placeholder="HH.mm" id="tow" name="tow" value="{{getTotalHours($activity->tow)}}" type="text" >
                                    </td>
                                    <td>
                                       {{-- {{getTotalHours($activity->ah)}} --}}
                                       <input class="" style="width: 70px" placeholder="HH.mm" id="ah" name="ah" value="{{getTotalHours($activity->ah)}}" type="text" >
                                    </td>
                                    <td>
                                       {{-- {{getTotalHours($activity->sb)}} --}}
                                       <input class="" style="width: 70px" placeholder="HH.mm" id="sb" name="sb" value="{{getTotalHours($activity->sb)}}" type="text" >
                                    </td>
                                    <td>
                                       <input class="" style="width: 160px"  id="sb" name="sb" value="{{$activity->activity}}" type="text" >
                                       {{-- <textarea class="" style="width: 160px" name="" id=""  rows="1">
                                          {{$activity->activity}}
                                       </textarea> --}}
                                       
                                    </td>
                                    <td>
                                       @if ($vdr->status == 0 || $vdr->status == 101 || $vdr->status == 202 || $vdr->status == 303) 
                                       {{-- <a href="#" data-toggle="modal" data-target="#editActivity-{{$activity->id}}"> Edit </a> --}}
                                       <a href="#" class="text-danger" data-toggle="modal" data-target="#deleteActivity-{{$activity->id}}"> Delete </a>
                                       @endif
                                       
                                    </td>
                              </tr>

                              <!-- Modal Delete -->

                              <div class="modal modal-blur fade" id="deleteAct-{{$activity->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                       <div class="modal-content">

                                          <form action="{{route('vdr.delete.activity')}}" method="POST">
                                                <div class="modal-body">
                                                   @csrf
                                                   @method('DELETE')
                                                   <input type="hidden" name="id" value="{{$activity->id}}" id="">
                                                   <div class="card-body">
                                                      @if ($errors->any())
                                                      <div class="alert alert-danger text-danger">
                                                            <ul>
                                                               @foreach ($errors->all() as $error)
                                                               <li><small>{{ $error }}</small></li>
                                                               @endforeach
                                                            </ul>
                                                      </div>
                                                      @endif
                                                      <h4 class="text-center"> Anda yakin ingin menghapussss activity {{$activity->activity}} ?</h4>
                                                   </div>
                                                   <div class="modal-footer">
                                                      <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
                                                      <button type="submit" class="btn btn-danger">Ya, Saya yakin </button>
                                                   </div>
                                                </div>
                                          </form>
                                       </div>
                                    </div>
                              </div>

                              <!-- End Modal  -->


                              <!-- Modal Edit -->

                              <div class="modal modal-blur fade" id="editAct-{{$activity->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                       <div class="modal-content">

                                          <form action="{{route('vdr.update.activity')}}" method="POST">
                                                <div class="modal-body">
                                                   @csrf
                                                   @method('PUT')
                                                   <input type="hidden" name="vdr_id" value="{{$vdr->id}}">
                                                   <input type="hidden" name="id" value="{{$activity->id}}" id="">
                                                   <div class="card-body">
                                                      @if ($errors->any())
                                                      <div class="alert alert-danger text-danger">
                                                            <ul>
                                                               @foreach ($errors->all() as $error)
                                                               <li><small>{{ $error }}</small></li>
                                                               @endforeach
                                                            </ul>
                                                      </div>
                                                      @endif

                                                      <div class="form-floating mb-3">
                                                            <textarea type="text" rows="50" required class="form-control" id="activity" name="activity" value="{{$activity->activity}}">{{$activity->activity}}</textarea>
                                                            <label for="activity">Activities</label>
                                                            @error('activity')
                                                            <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                                            @enderror
                                                      </div>
                                                      <div class="row">
                                                            <label for="email">Time</label>
                                                            <div class="col-md-6">
                                                               <div class="form-floating mb-3">
                                                                  <input type="time" required class="form-control jam24" id="start" name="start" value="{{$activity->start}}" value="1">
                                                                  <label for="start">Start</label>
                                                                  @error('start')
                                                                  <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                                                  @enderror
                                                               </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                               <div class="form-floating mb-3">
                                                                  <input type="time" required class="form-control jam24" id="finish" name="finish" value="{{$activity->finish}}" value="1">
                                                                  <label for="finish">Finish</label>
                                                                  @error('finish')
                                                                  <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                                                  @enderror
                                                               </div>
                                                            </div>
                                                      </div>
                                                      <div class="row">
                                                            <div class="col-md-6">
                                                               <div class="form- mb-3">
                                                                  <label for="high">High</label>
                                                                  <input type="text" placeholder="HH.mm" class="form-control waktu" id="high" name="high" value="{{$activity->high}}">
                                                                  @error('high')
                                                                  <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                                                  @enderror
                                                               </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                               <div class="form- mb-3">
                                                                  <label for="normal">Normal</label>
                                                                  <input type="text" placeholder="HH.mm" class="form-control waktu" id="normal" name="normal" value="{{$activity->normal}}">
                                                                  @error('normal')
                                                                  <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                                                  @enderror
                                                               </div>
                                                            </div>
                                                      </div>
                                                      <div class="row">
                                                            <div class="col-md-6">
                                                               <div class="form mb-3">
                                                                  <label for="slow">Slow</label>
                                                                  <input type="text" placeholder="HH.mm" class="form-control waktu" id="slow" name="slow" value="{{$activity->slow}}">
                                                                  @error('slow')
                                                                  <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                                                  @enderror
                                                               </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                               <div class="form mb-3">
                                                                  <label for="manu">Manu</label>
                                                                  <input type="text" placeholder="HH.mm" class="form-control waktu" id="manu" name="manu" value="{{$activity->manu}}">
                                                                  @error('manu')
                                                                  <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                                                  @enderror
                                                               </div>
                                                            </div>
                                                      </div>
                                                      <div class="row">
                                                            <div class="col-md-6">
                                                               <div class="form mb-3">
                                                                  <label for="idle">Idle</label>
                                                                  <input type="text" placeholder="HH.mm" class="form-control waktu" id="idle" name="idle" value="{{$activity->idle}}">
                                                                  @error('idle')
                                                                  <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                                                  @enderror
                                                               </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                               <div class="form mb-3">
                                                                  <label for="tow">Tow</label>
                                                                  <input type="text" placeholder="HH.mm" class="form-control waktu" id="tow" name="tow" value="{{$activity->tow}}">
                                                                  @error('tow')
                                                                  <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                                                  @enderror
                                                               </div>
                                                            </div>
                                                      </div>
                                                      <div class="row">
                                                            <div class="col-md-6">
                                                               <div class="form mb-3">
                                                                  <label for="ah">A/H</label>
                                                                  <input type="text" placeholder="HH.mm" class="form-control waktu" id="ah" name="ah" value="{{$activity->ah}}">
                                                                  @error('ah')
                                                                  <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                                                  @enderror
                                                               </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                               <div class="form mb-3">
                                                                  <label for="sb">S/B</label>
                                                                  <input type="text" placeholder="HH.mm" class="form-control waktu" id="sb" name="sb" value="{{$activity->sb}}">
                                                                  @error('sb')
                                                                  <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                                                  @enderror
                                                               </div>
                                                            </div>
                                                      </div>
                                                   </div>
                                                   <div class="modal-footer">
                                                      <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
                                                      <button type="submit" class="btn btn-success">Update</button>
                                                   </div>
                                                </div>
                                          </form>
                                       </div>
                                    </div>
                              </div>

                              <!-- End Modal  -->
                              @endforeach

                              <tr>
                                    <td colspan="2" class="text-center">Total</td>
                                    @foreach ($operatings as $operating)
                                    @if($operating->heading->field)
                                    <td>{{getTotalHours($operating->time)}}</td>
                                    @endif
                                    @endforeach
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
                     
      
                     
                     {{-- </div> --}}
                     
                  
                  </div>
                  <div class="col-md-12">
                     <table class="w-100">
                       
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
                                 <input type="hidden" id="operating_{{$operating->id}}" value="{{$operating->id}}">
                                 <!-- </td> -->
                                 <td> {{$operating->heading->description}} </td>
                                 <td class="text-center align-middle">
                                    {{getTotalHours($operating->time)}}
                                       <input type="text" id="time_{{$operating->id}}" name="time[]" readonly hidden  value="{{$operating->time}}">
                                 </td>
                                 <td class="text-center align-middle">
                                       @if($operating->heading->speed == '1')
                                       <input class="w-100 input_operating_{{$operating->id}}" type="number" id="speed_{{$operating->id}}" name="speed[]"  value="{{$operating->speed}}">
                                       @else
                                       <input class="w-100 input_operating_{{$operating->id}}" type="hidden" id="speed_{{$operating->id}}" name="speed[]"  value="{{$operating->speed}}">
                                       @endif
                                 </td>
            
                                 <td class="text-center align-middle">
                                    <!-- {{$operating->contractual_fuel}} -->
                                       @if($operating->heading->contractual == '1')
                                       <input class="w-100 input_operating_{{$operating->id}}" type="text" id="fuel_{{$operating->id}}" name="contractual_fuel[]"  value="{{$operating->contractual_fuel}}">
                                       @else
                                       <input class="w-100 input_operating_{{$operating->id}}" type="hidden" id="fuel_{{$operating->id}}" name="contractual_fuel[]"  value="{{$operating->contractual_fuel}}">
                                       @endif
                                 </td>
                                 <td class="text-center ">
            
            
                                       @if($operating->heading->daily == '1')
                                       <input class="w-100 input_operating_{{$operating->id}}" type="text" readonly hidden id="dailyhidden_{{$operating->id}}" name="daily[]"  value="{{$operating->daily}}">
                                       <input class="w-100 input_operating_{{$operating->id}}" type="text" readonly id="daily_{{$operating->id}}" name="daily[]"  value="{{$operating->daily}}">
                                       @else
                                       <input class="w-100 input_operating_{{$operating->id}}" type="hidden" readonly id="daily_{{$operating->id}}" name="daily[]"  value="{{$operating->daily}}">
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
                                    <input class="w-100 "  readonly id="totalDaily"  value="{{round($totalDaily)}}">
                                       {{-- <b > <span class="totalDaily"></span> Ltrs</b>  --}}
                                       
                                 </td>
                              </tr>
            
                           
                        </tbody>
                     </table>
                  </div>
                  <div class="col-md-8">
                     {{-- <div class="table-responsive overflow-auto" style="height: 100vh"> --}}
                     <table class="w-100">
                        
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
                                 <input type="hidden" id="cargo" value="{{$cargo->id}}">
                                 <!-- </td> -->
                                 <td> {{$cargo->heading->description}} </td>
                                 <td class="text-center align-middle" >
                                       <input class="w-100 input_cargo_{{$cargo->id}}" type="number" id="opening_{{$cargo->id}}" name="opening[]"   value="{{$cargo->opening}}">
                                 </td>
                                 
                                       @if($cargo->heading->is_consumption == '1')
                                       <td class="text-center align-middle">
                                          <input type="text" class="w-100 input_cargo_{{$cargo->id}}"  readonly id="consumption_{{$cargo->id}}" name="consumption[]"  value="{{$cargo->consumption}}">
                                          {{-- <span class="my-2 consumption">{{$cargo->consumption}}</span> --}}
                                       </td>
                                       @else
                                       <td class="" style="background-color: rgb(167, 171, 170)">
                                       <input type="hidden" style="width: 100px" readonly name="consumption[]"  value="{{$cargo->consumption}}">
                                       </td>
                                       @endif
                                 
                                 <td class="text-center align-middle">
                                       <input type="number" class="w-100 input_cargo_{{$cargo->id}}" id="received_{{$cargo->id}}" name="received[]"   value="{{$cargo->received}}">
                                 </td>
                                 <td class="text-center align-middle">
                                       <input type="number" class="w-100 input_cargo_{{$cargo->id}}" id="transferred_{{$cargo->id}}" name="transferred[]" style="width: 100px"  value="{{$cargo->transferred}}">
                                 </td>
                                 <td class="text-center align-middle">
                                    @if($cargo->heading->is_consumption == '1')
                                       <input type="text" class="w-100 input_cargo_{{$cargo->id}}" id="closing_{{$cargo->id}}" name="closing[]" style="width: 100px"   value="{{$cargo->closing}}">
                                       @else
                                       <span class="my-2">{{ $cargo->closing}}</span>
                                       <input type="text" hidden name="closing[]" style="width: 100px"   value="{{$cargo->closing}}">
                                    @endif
                                 </td>
                                 <td class="text-center align-middle"  >
                                       <input class="w-100 input_cargo_{{$cargo->id}}" type="text" id="remark_{{$cargo->id}}" name="remarks[]"  value="{{$cargo->remarks}}">
                                 </td>
                              </tr>
                           @endforeach

                           
                        </tbody>
                     </table>


                     <table class="w-100">
                        <tbody>
                           <tr>
                              <td rowspan="2">Periodical Fuel ROB Check/Control by Company Reps. and Surveyor</td>
                              <td class="text-truncate">Activity (Select Below)</td>
                              <td>ROB Check Time</td>
                              <td>ROB by VDR at Check Time</td>
                              <td>Actual ROB at Check Time</td>
                              <td>ROB Difference</td>
                           </tr>
                           <input type="number" name="periodic" id="periodic" value="{{$periodic->id}}" hidden>
                           <tr>
                              <td>
                                 <select  class="w-100 input_periodic_b" name="period_activity" style="height: 30px; width:100px" id="period_activity" >
                                    <option {{$periodic->activity == 'Spot Check' ? 'selected' : '-'}} value="Spot Check">Spot Check</option>
                                    <option {{$periodic->activity == 'Pre-Bunker Check' ? 'selected' : '-'}} value="Pre-Bunker Check">Pre-Bunker Check</option>
                                    <option {{$periodic->activity == 'Not Applicable' ? 'selected' : '-'}} value="Not Applicable">Not Applicable</option>
                                 </select>
                              </td>
                              <td>
                                 <input  class="w-100 input_periodic_b"  type="time" name="rob_time" id="period_rob_time" value="{{$periodic->rob_time}}">
                              </td>
                              
                              <td><input class="w-100 input_periodic"  type="number" name="rob_value" id="period_rob_value" value="{{$periodic->rob_value}}" ></td>
                           
                              <td>
                                 <input class="w-100 input_periodic"  type="number" name="rob_actual" id="period_rob_actual" value="{{$periodic->rob_actual}}">
                              </td>
                           
                              <td>
                                 <span class="my-3 periodDiff">{{$periodic->rob_diff}}</span>
                                 <input class="w-100 " hidden  type="number" id="period_rob_diff" readonly value="{{$periodic->rob_diff}}">
                              </td>
                             
                           </tr>

                        </tbody>
                     </table>
                     <hr>
                     {{-- </div> --}}
                  </div>
                  <div class="col-md-4">
                     <table>
                        <thead>
                           <tr>
                              <td colspan="3">Special Calculation 
                                 Applicable only for Periodical Fuel ROB Check/Control by Company Reps. and Surveyor </td>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td style="width: 400px">Fuel Cons. by Remuneration or Actual, from 00:00 hours to Check Time (Manual input based on joint calculation by all parties)</td>
                              <td ><input style="width: 70px" class="input_special"  type="number" name="fuel_cons_remu" id="fuel_cons_remu" value="{{$periodic->fuel_cons_remu}}"></td>
                           </tr>
                           <tr>
                              <td>Part 1: Corrected Fuel Cons. from 00:00 hours to Check Time (based on calculation by applying ROB Difference) <br>
                                 <i>Note: Refer to ROB COrrection Rules</i>
                              </td>
                              <td >
                                 <input class="input_special" hidden type="number" name="fuel_cons_correct" id="fuel_cons_correct" value="{{$periodic->fuel_cons_correct}}">
                                 <span class="my-2 fuel_cons_correct">{{$periodic->fuel_cons_correct}}</span>
                              </td>
                              
                           </tr>
                           <tr>
                              <td>Part 2: Actual Fuel Cons. from Check Time to 24:00 hours (manual input based on actual sounding)</td>
                              <td ><input style="width: 70px" class="input_special"  type="number" name="fuel_cons_actual" id="fuel_cons_actual" value="{{$periodic->fuel_cons_actual}}"></td>
                           </tr>
                           <tr>
                              <th>Total Actual Daily Fuel Consumption = (Part 1 + Part 2)</th>
                              <th class=" py-2">
                                 <span class="specialTotal">{{$periodic->fuel_cons_total}}</span>
                              </th>
                           </tr>
                        </tbody>

                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>

   </div>
</section>

@if (auth()->user()->hasRole('marine') || auth()->user()->hasRole('pet') || auth()->user()->hasRole('suptent')|| auth()->user()->hasRole('chief'))
   <div class="modal fade" id="modalEditApproval" tabindex="-1" role="dialog"  aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
         <form action="{{route('vdr.update.approval')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$vdr->id}}" id="">
            <input type="hidden" name="vessel_id" value="{{$vessel->id}}" id="">
            <input type="hidden" name="created_by" value="{{$user->name}}">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Form Edit VDR Approval</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  

                  {{-- <div class="badge badge-info">Approval 1</div> --}}
                  <div class="row mb-2">
                     <div class="col-md-2">
                        
                        <div class="form-group">
                           <label for="level1">Level </label>
                           <input class="form-control" id="level1" name="level1" type="text" value="1" readonly >
                           
                        </div>
                     </div>
                     <div class="col-md-4">
                        
                        <div class="form-group">
                           <label for="title1">Title </label>
                           <input class="form-control" id="title1" name="title1" type="text" value="{{$vdr->title1}}" >
                           @error('title1')
                              <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="name1">Name </label>
                           <input class="form-control" id="name1" name="name1" type="text" value="{{$vdr->name1}}" >
                           @error('name1')
                              <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                           @enderror
                        </div>
                     </div>
                  </div>

                  {{-- <div class="badge badge-info">Approval 2</div> --}}
                  <div class="row mb-2">
                     <div class="col-md-2">
                        
                        <div class="form-group">
                           <label for="level2">Level </label>
                           <input class="form-control" id="level2" name="level2" type="text" value="2" readonly >
                           
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="title2">Title </label>
                           <input class="form-control" id="title2" name="title2" type="text" value="{{$vdr->title2}}" >
                           @error('title2')
                              <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="name2">Name </label>
                           <input class="form-control" id="name2" name="name2" type="text" value="{{$vdr->name2}}" >
                           @error('name2')
                              <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                           @enderror
                        </div>
                     </div>
                  </div>

                  {{-- <div class="badge badge-info">Approval 3</div> --}}
                  <div class="row">
                     <div class="col-md-2">
                        
                        <div class="form-group">
                           <label for="level3">Level </label>
                           <input class="form-control" id="level3" name="level3" type="text" value="3" readonly >
                           
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="title3">Title </label>
                           <input class="form-control" id="title3" name="title3" type="text" value="{{$vdr->title3}}" >
                           @error('title3')
                              <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="name3">Name </label>
                           <input class="form-control" id="name3" name="name3" type="text" value="{{$vdr->name3}}" >
                           @error('name3')
                              <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                           @enderror
                        </div>
                     </div>
                  </div>
                  <hr>

                  
                  
               </div>
               <div class="modal-footer bg-whitesmoke">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Update</button>
               </div>
            </div>
         </form>
      </div>
   </div>
   <div class="modal fade" id="modalAppPet" tabindex="-1" role="dialog"  aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
         <form action="{{route('vdr.approve.pet')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$vdr->id}}" id="">
            <input type="hidden" name="vessel_id" value="{{$vessel->id}}" id="">
            <input type="hidden" name="created_by" value="{{$user->name}}">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Approve VDR</h5>

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
                  
               </div>
               <div class="modal-body">
                  

                  {{-- <div class="badge badge-info">Approval 1</div> --}}
                  <div class="row mb-2">
                     
                     <div class="col-12">
                        
                        <div class="form-group">
                           <label for="title1">Title </label>
                           <input class="form-control" id="title1" required name="title1" type="text" value="{{$vdr->title1}}" placeholder="Jabatan/Posisi">
                           @error('title1')
                              <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                           @enderror
                        </div>
                     </div>
                     <div class="col-12">
                        <div class="form-group">
                           <label for="name1">Name </label>
                           <input class="form-control" id="name1" name="name1" required type="text" value="{{$vdr->name1}}" >
                           @error('name1')
                              <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                           @enderror
                        </div>
                     </div>
                  </div>


                  
                  
               </div>
               <div class="modal-footer bg-whitesmoke">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-info">Approve</button>
               </div>
            </div>
         </form>
      </div>
   </div>
   <div class="modal fade" id="vdr-reject-marine" tabindex="1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <form action="{{route('vdr.reject.marine')}}" method="POST">
         @csrf
         <input type="number" name="vdr" id="vdr" value="{{$vdr->id}}" hidden>
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Form Reject VDR</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="form-row">
                  <div class="form-group col-md-12">
                     <label for="desc">Description</label>
                     <input type="text" class="form-control" id="desc" name="desc" >
                  </div>
                  
               </div>
            </div>
            <div class="modal-footer bg-whitesmoke">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-danger">Reject</button>
            </div>
         </div>
         </form>
      </div>
   </div>
   <div class="modal fade" id="vdr-approve-marine" tabindex="1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
         
         
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Approve this VDR ?</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <hr>
            </div>
            <div class="modal-footer bg-whitesmoke">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <a href="{{route('vdr.approve.marine', enkripRambo($vdr->id))}}"  class="btn btn-info">Approve</a>
            </div>
         </div>
      </div>
   </div>
   <div class="modal fade" id="vdr-approve-marine" tabindex="1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
         
         
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Approve this VDR ?</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <hr>
            </div>
            <div class="modal-footer bg-whitesmoke">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <a href="{{route('vdr.approve.luthfi', enkripRambo($vdr->id))}}"  class="btn btn-info">Approve</a>
            </div>
         </div>
      </div>
   </div>
   
    @else
      @foreach ($crews as $crew)
         <div class="modal fade" id="deleteAct-{{$crew->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog" role="document">
               <form action="{{route('vdr.delete.crew')}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <input type="hidden" name="id" value="{{$crew->id}}" id="">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title">Delete Crew </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <div class="modal-body">
                        <span>Anda yakin ingin menghapus crew <span class="text-danger">{{$crew->name}} </span> ?</span>
                     </div>
                     <div class="modal-footer bg-whitesmoke">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>

         <div class="modal fade" id="editCrew-{{$crew->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog" role="document">
               <form action="{{route('vdr.update.crew')}}" method="POST">
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="id" value="{{$crew->id}}" id="">
                  <input type="hidden" name="vdr_id" value="{{$vdr->id}}" id="">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title">Delete Crew </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <div class="modal-body">
                        <div class="form-group">
                           <label for="name">Name</label>
                           <input class="form-control" id="name" name="name" type="text" value="{{$crew->name}}" >
                           @error('name')
                              <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                           @enderror
                        </div>

                        <div class="row">
                           <div class="col-md-6">
                              <div class="form mb-3">
                                 <input type="radio" id="is_crew" {{$crew->is_crew == 1 ? 'checked' : ''}} value="1" class="crew" name="is_crew"> Crew
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form mb-3">
                                 <input type="radio" id="is_crew" {{$crew->is_crew == 0 ? 'checked' : ''}} class="passenger" name="is_crew"> Passenger
                              </div>
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="form-group col-md-12">
                              <label for="rank">Rank</label>
                              <input class="form-control" id="rank" name="rank" type="text" value="{{$crew->rank}}">
                              @error('rank')
                                 <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                              @enderror
                           </div>
                           <div class="form-group col-md-12">
                              <label for="company">Company</label>
                              <input class="form-control" id="company" name="company" type="text" value="{{$crew->company}}">
                              @error('company')
                                 <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                              @enderror
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer bg-whitesmoke">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      @endforeach
      <x-vdr.activity-modal :activities="$activities" :user="$user" :vdr="$vdr" :vessel="$vessel"/>

    
@endif


<x-vdr.crew-modal :crews="$crews" :user="$user" :vdr="$vdr" :vessel="$vessel"/>

@push('weather')
    @foreach ($weathers as $w)
        <script>
            $(document).ready(function() {
               $(".input_weather_" + '{!! $w->id !!}').keyup(function () {
                  console.log('weather');
                  var vdr = $('#vdr').val();
                  var weather = '{!! $w->id !!}';
                  var t6 = $('#t_0006_' + '{!! $w->id !!}').val();
                  var t12 = $('#t_0612_' + '{!! $w->id !!}').val();
                  var t18 = $('#t_1218_' + '{!! $w->id !!}').val();
                  var t24 = $('#t_1824_' + '{!! $w->id !!}').val();
                  
                  // console.log(weather);

                  var _token = $('meta[name="csrf-token"]').attr('content');
                  $.ajax({
                     url: "/fetch/vdr/update/weather/" + vdr + "/" + weather +  "/"  + t6 + "/" + t12 +  "/"  + t18 + "/" + t24 ,
                     method: "GET",
                     dataType: 'json',

                     success: function(result) {
                        console.log('result :' + result.result);
                        
                     },
                     error: function(error) {
                        console.log(error)
                     }

                  })
               });
            });
        </script>
    @endforeach
@endpush  

@push('hsse')
   @foreach ($hses as $hse)
   <script>
      $(document).ready(function() {
         var prev = $('#previous_' + '{!! $hse->id !!}').val();
         var today = $('#today_' + '{!! $hse->id !!}').val();
         
         $(".input_hsse_" + '{!! $hse->id !!}').keyup(function () {
            console.log('hsse');
            var vdr = $('#vdr').val();
            var hsse = '{!! $hse->id !!}';
            var prev = $('#previous_' + '{!! $hse->id !!}').val();
            var today = $('#today_' + '{!! $hse->id !!}').val();
            
            
            console.log(hsse);

            var _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
               url: "/fetch/vdr/update/hsse/" + vdr + "/" + hsse +  "/"  + prev + "/" + today,
               method: "GET",
               dataType: 'json',

               success: function(result) {
                  $("#hse_month_" + '{!! $hse->id !!}').val(result.month);
                  console.log('result :' + result.result);
                  
               },
               error: function(error) {
                  console.log(error)
               }

            })
         });

         $("#hse_month_" + '{!! $hse->id !!}').val(parseInt(prev)+parseInt(today));
      });
  </script>
   @endforeach
@endpush

@push('operating')
   @foreach ($operatings as $op)
      <script>
         $(document).ready(function() {
         // var prev = $('#previous_' + '{!! $hse->id !!}').val();
         // var today = $('#today_' + '{!! $hse->id !!}').val();
         
         $(".input_operating_" + '{!! $op->id !!}').keyup(function () {
            console.log('operating');
            var vdr = $('#vdr').val();
            var op = '{!! $op->id !!}';
            var time = $('#time_' + '{!! $op->id !!}').val();
            var minspeed = $('#speed_' + '{!! $op->id !!}').val();
            var contractfuel = $('#fuel_' + '{!! $op->id !!}').val();
            
            
            console.log(time);

            
            var timeValue = parseFloat(time) || 0;
            let bulat = Math.floor(timeValue);
            let desimal = timeValue - bulat;

            // console.log((desimal * 100) / 60);

            // Dapatkan nilai dari input contractual_fuel[]
            var contractualFuelValue = parseFloat(contractfuel) || 0;

            // console.log(contractualFuelValue);
            let a = bulat * contractualFuelValue;
            let b = ((desimal * 100) / 60) * contractualFuelValue;
            // Hitung hasil perkalian
            var result = a + b;
            console.log(result);
            

            // Set hasil perkalian ke input daily[]
            $('#dailyhidden_' + '{!! $op->id !!}').val(result);


            var daily = $('#daily_' + '{!! $op->id !!}').val();
            var dailyhidden = $('#dailyhidden_' + '{!! $op->id !!}').val();


            var _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
               url: "/fetch/vdr/update/operating/" + vdr + "/" + op +  "/"  + minspeed + "/" + contractfuel + "/" + dailyhidden,
               method: "GET",
               dataType: 'json',

               success: function(result) {
                  $('#daily_' + '{!! $op->id !!}').val(result.daily);

                  $("#totalDaily").val(result.totalDaily);
                  console.log('result :' + result.totalDaily);
                  
               },
               error: function(error) {
                  console.log(error)
               }

            })
         });

         // $("#hse_month_" + '{!! $hse->id !!}').val(parseInt(prev)+parseInt(today));
      });
      </script>
   @endforeach
@endpush

@push('cargo')
    @foreach ($cargos as $cargo)
    <script>
      $(document).ready(function() {
      
      $(".input_cargo_" + '{!! $cargo->id !!}').keyup(function () {
         console.log('operating');
         var vdr = $('#vdr').val();
         var cargo = '{!! $cargo->id !!}';
         var opening = $('#opening_' + '{!! $cargo->id !!}').val();
         var consumption = $('#consumption_' + '{!! $cargo->id !!}').val();
         var received = $('#received_' + '{!! $cargo->id !!}').val();
         var transferred = $('#transferred_' + '{!! $cargo->id !!}').val();
         var closing = $('#closing_' + '{!! $cargo->id !!}').val();
         var remark = $('#remark_' + '{!! $cargo->id !!}').val();
         
         
         
         console.log(remark);

         // var closing = (opening + received) - (consumption + transferred);
         // // Tampilkan hasil perhitungan di kolom Closing
         // $(".closing_" + '{!! $cargo->id !!}').val(closing);

        



         var _token = $('meta[name="csrf-token"]').attr('content');
         $.ajax({
            url: "/fetch/vdr/update/cargo/" + vdr + "/" + cargo +  "/"  + opening + "/" + consumption + "/" + received + "/" + transferred + "/" + closing + "/" + remark,
            method: "GET",
            dataType: 'json',

            success: function(result) {
               $('#consumption_' + '{!! $cargo->id !!}').val(result.consumption);
               console.log('result :' + result.consumption);
               
            },
            error: function(error) {
               console.log(error)
            }

         })
      });

      // $("#hse_month_" + '{!! $hse->id !!}').val(parseInt(prev)+parseInt(today));
   });
   </script>
    @endforeach
@endpush

@push('periodic')
   <script>
      $(document).ready(function() {
      
      $(".input_periodic").keyup(function () {
         console.log('periodic');
         var vdr = $('#vdr').val();
         var periodic = $('#periodic').val();
         var periodActivity = $('#period_activity').val();
         var periodTime = $('#period_rob_time').val();
         var periodValue = $('#period_rob_value').val();
         var periodActual = $('#period_rob_actual').val();
        
         if (periodValue === '' ) {
            // $('.specialTotal').html(0);
            console.log('value kosong');
            periodValue = 0;
            $('#period_rob_diff').val(0)
         } 

         if (periodActual === '' ) {
            // $('.specialTotal').html(0);
            // console.log('kosong');
            periodActual = 0;
            $('#period_rob_diff').val(0)
         } 
         
         
         console.log(periodTime);
         var periodDiff = parseInt(periodActual) - parseInt(periodValue);
         $('#period_rob_diff').val(periodDiff)
         // $('.period_rob_diff').val(periodDiff)

         

         // var closing = (opening + received) - (consumption + transferred);
         // // Tampilkan hasil perhitungan di kolom Closing
         // $(".closing_" + '{!! $cargo->id !!}').val(closing);

      



         var _token = $('meta[name="csrf-token"]').attr('content');
         $.ajax({
            url: "/fetch/vdr/update/periodic/" + vdr + "/" + periodic +  "/"  + periodActivity + "/" + periodTime + "/" + periodValue + "/" + periodActual + "/" + periodDiff,
            method: "GET",
            dataType: 'json',

            success: function(result) {
               $('.periodDiff').html(periodDiff);
               console.log('result :' + periodDiff);
               
            },
            error: function(error) {
               console.log(error)
            }

         })
      });

      $(".input_periodic_b").change(function () {
         console.log('periodic');
         var vdr = $('#vdr').val();
         var periodic = $('#periodic').val();
         var periodActivity = $('#period_activity').val();
         var periodTime = $('#period_rob_time').val();
         var periodValue = $('#period_rob_value').val();
         var periodActual = $('#period_rob_actual').val();
        
         


         
         
         
         
         console.log(periodTime);
         var periodDiff = parseInt(periodActual) - parseInt(periodValue);
         $('#period_rob_diff').val(periodDiff)
         // $('.period_rob_diff').val(periodDiff)

         
         if (periodValue === '' ) {
            // $('.specialTotal').html(0);
            console.log('value kosong');
            periodValue = 0;
            periodDiff = 0
         } 

         if (periodActual === '' ) {
            // $('.specialTotal').html(0);
            // console.log('kosong');
            periodActual = 0;
            periodDiff = 0
         } 

         if (periodActivity === 'Not Applicable' ) {
            // $('.specialTotal').html(0);
            console.log(periodActivity);
            $('#period_rob_time').val('00:00:00');
            // console.log($('#period_rob_time').val())
         } 

         // if ($('#period_rob_time').val() === '') {
         //    $periodTime = '';
         // }
         

      



         var _token = $('meta[name="csrf-token"]').attr('content');
         $.ajax({
            url: "/fetch/vdr/update/periodic/" + vdr + "/" + periodic +  "/"  + periodActivity + "/" + periodTime + "/" + periodValue + "/" + periodActual + "/" + periodDiff,
            method: "GET",
            dataType: 'json',

            success: function(result) {
               $('.periodDiff').html(periodDiff);
               console.log('time :' + result.result);
               
            },
            error: function(error) {
               console.log(error)
            }

         })
      });

      // $("#hse_month_" + '{!! $hse->id !!}').val(parseInt(prev)+parseInt(today));
   });
   </script>
    
@endpush

@push('special')
   <script>
      $(document).ready(function() {
      
      $(".input_special").keyup(function () {
         console.log('special');
         var vdr = $('#vdr').val();
         var periodic = $('#periodic').val();
         var remu = $('#fuel_cons_remu').val();
         var correct = $('#fuel_cons_correct').val();
         var actual = $('#fuel_cons_actual').val();
         // var periodActual = $('#period_rob_actual').val();

         var periodDiff = $('#period_rob_diff').val()

        
         // $('#period').val(periodDiff)
        
         
         
         
         // console.log(periodTime);
         var correctValue = parseInt(remu) - parseInt(periodDiff);
         $('#fuel_cons_correct').val(correctValue)
         $('.fuel_cons_correct').html(correctValue)


         var specialTotal = parseInt(correctValue) + parseInt(actual);

         // var closing = (opening + received) - (consumption + transferred);
         // // Tampilkan hasil perhitungan di kolom Closing
         // $(".closing_" + '{!! $cargo->id !!}').val(closing);
         // console.log(remu);
         if (remu === '' ) {
            // $('.specialTotal').html(0);
            console.log('kosong');
            remu = 0;
            $('#fuel_cons_correct').val(0);
            specialTotal = 0;
         } 

         if (actual === '' ) {
            // $('.specialTotal').html(0);
            console.log('kosong');
            actual = 0;
            specialTotal = 0;
         } 



         var _token = $('meta[name="csrf-token"]').attr('content');
         $.ajax({
            url: "/fetch/vdr/update/special/" + vdr + "/" + periodic +  "/"  + remu + "/" + correct + "/" + actual + "/" + specialTotal ,
            method: "GET",
            dataType: 'json',

            success: function(result) {
               $('.specialTotal').html(specialTotal);
               console.log('result :' + specialTotal);
               
            },
            error: function(error) {
               console.log(error);
               $('.specialTotal').html(0);
            }

         })
      });

      // $("#hse_month_" + '{!! $hse->id !!}').val(parseInt(prev)+parseInt(today));
   });
   </script>
    
@endpush




@push('general')
<script>
   $(document).ready(function() {
      $(".input_general").keyup(function () {
      console.log('general')

         var vdr = $('#vdr').val();
         var loc = $('#location_midnight').val();
         var onduty = $('#onduty').val() ;
         var pax = $('#pax').val() ;
         var contract = $('#contract').val();
         var contract_end = $('#contract_end').val();
         var contract_start = $('#contract_start').val();
         var owner = $('#owner').val();
         var master = $('#master').val();
         var ce = $('#ce').val();

         // let form = document.getElementById("form_general");
         // form.submit();


         // $("#form_general").submit(function(e) {
         //    console.log('form submit');

         //    e.preventDefault(); // avoid to execute the actual submit of the form.
         //    var form = $(this);
         //    var actionUrl = form.attr('action');

         //    $.ajax({
         //       type: "POST",
         //       url: actionUrl,
         //       data: form.serialize(), // serializes the form's elements.
         //       success: function(data)
         //       {
         //          alert(data); // show response from the php script.
         //       }
         //    });

         // });



         var _token = $('meta[name="csrf-token"]').attr('content');

         console.log('vdr:' + vdr + ' loc:' + loc);

         $.ajax({
            url: "/fetch/vdr/update/general/" + vdr + "/" + loc +  "/"  + onduty + "/" + pax +  "/"  + contract + "/" + contract_start +  "/"  + contract_end + "/" + owner +  "/"  + master + "/" + ce,
            method: "GET",
            dataType: 'json',

            success: function(result) {
               console.log('result :' + result.result);
               
            },
            error: function(error) {
               console.log(error)
            }

         })





      
      })
   });
</script>
@endpush
@endsection



