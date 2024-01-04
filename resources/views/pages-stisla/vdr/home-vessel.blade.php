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
               <div class="card">
                  <div class="card-header">
                     <b>WEATHER CONDITION</b>
                  </div>
                  <form action="{{route('vdr.update.weather')}}" method="post">
                     @csrf
                     @method('PUT')
                     <div class="card-body p-0">
                        {{-- <div class="table-responsive"> --}}
                           <table class="table table-striped">
                              <thead>
                                 <tr>
                                       <th class="text-center col-md-3">Weather / Time</th>
                                       <th>00:00 - 06:00 hrs</th>
                                       <th>06:00 - 12:00 hrs</th>
                                       <th>12:00 - 18:00 hrs</th>
                                       <th>18:00 - 24:00 hrs</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 
                                       @foreach ($weathers as $weather)
                                       <input type="hidden" name="vdr_id" value="{{$vdr->id}}">
                                       <input type="hidden" name="id[]" value="{{$weather->id}}">
                                       <tr>
                                          <td>{{$weather->heading->description}}</td>
                                          <td>
                                             <input type="text" class="form-control" name="t_0006[]" value="{{ $weather->t_0006  }}">
                                          </td>
                                          <td>
                                             <input type="text" class="form-control" name="t_0612[]" value="{{ $weather->t_0612  }}">
                                          </td>
                                          <td>
                                             <input type="text" class="form-control" name="t_1218[]" value="{{ $weather->t_1218  }}">
                                          </td>
                                          <td>
                                             <input type="text" class="form-control" name="t_1824[]" value="{{ $weather->t_1824  }}">
                                          </td>
                                       </tr>
      
                                       @endforeach
                                       
                                 
                              </tbody>
                           </table>
                     {{-- </div> --}}
                     </div>
                     <div class="card-footer">
                        <button class="btn btn-primary" type="submit">Save</button>
                     </div>
                  </form>
               </div>
               
            </div>
         </div>
         

         
         <div class="card">
            <div class="card-header d-flex justify-content-between">
               DETAIL OF DAILY OPERATIONAL ACTIVITIES
               <a href="#" class="card-btn " data-bs-toggle="modal" data-bs-target="#modalAdd">
                  Add Activites
              </a>
            </div>
            <div class="card-body py-0">
               {{-- <div class="table-responsive"> --}}
                  <table class="table table-striped table-sm">
                      <thead>
                          <tr>
                              <th colspan="2" class="text-center">TIME</th>
                              <th colspan="8" class="text-center">Operation Mode Duration (hh::mm)- <br> Except Maintenance & Downtime </th>
                              <th rowspan="2" class="text-center align-middle">ACTIVITIES</th>
                              <th rowspan="2" class="text-center align-middle">Action</th>
                          </tr>
                          <tr>
                              <th class="text-center">Start</th>
                              <th>Finish</th>
                              <th>High</th>
                              <th>Normal</th>
                              <th>Slow</th>
                              <th>Manu</th>
                              <th>Idle</th>
                              <th>Tow</th>
                              <th>A/H</th>
                              <th>S/B</th>
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
                              <td class="text-success">{{substr($activity->start, 0, 5)}}</td>
                              <td class="text-danger">{{substr($activity->finish, 0, 5)}}</td>
                              <td>{{floatToTime($activity->high)}}</td>
                              <td>{{floatToTime($activity->normal)}}</td>
                              <td>{{floatToTime($activity->slow)}}</td>
                              <td>{{floatToTime($activity->manu)}}</td>
                              <td>{{floatToTime($activity->idle)}}</td>
                              <td>{{floatToTime($activity->tow)}}</td>
                              <td>{{floatToTime($activity->ah)}}</td>
                              <td>{{floatToTime($activity->sb)}}</td>
                              <td>
                                  <a href="#" data-bs-toggle="modal" data-bs-target="#editAct-{{$activity->id}}"> {{$activity->activity}} </a>
                              </td>
                              <td>
                                  <a href="#" class="text-danger" data-bs-toggle="modal" data-bs-target="#deleteAct-{{$activity->id}}"> Delete </a>
                              </td>
                          </tr>

                          <!-- Modal Delete -->

                          <div class="modal modal-blur fade" id="deleteAct-{{$activity->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                              <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
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
                                                  <h4 class="text-center"> Anda yakin ingin menghapus activity {{$activity->activity}} ?</h4>
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
                              <td>{{floatToTime($operating->time)}}</td>
                              @endif
                              @endforeach
                          </tr>



                      </tbody>
                  </table>
              {{-- </div> --}}
            </div>
         </div>
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
   @endif
   


   
@endsection




