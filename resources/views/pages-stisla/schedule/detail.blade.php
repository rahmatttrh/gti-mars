@extends('layouts.stisla.app')
@section('title')
   DSP Detail Sailing Order
@endsection
@section('content')
<section class="section">
   {{-- <div class="section-header">
      <h1 class="section-title">Detail Sailing Order {{$schedule->code}}</h1>
      <div class="section-header-breadcrumb">
         @if (auth()->user()->hasRole('marine'))
            <div class="breadcrumb-item "><a href="{{route('dsp.marine')}}">Dashboard</a></div>
            @elseif(auth()->user()->hasRole('vessel'))
            <div class="breadcrumb-item "><a href="{{route('dsp.vessel')}}">Dashboard</a></div>
            @elseif(auth()->user()->hasRole('user'))
            <div class="breadcrumb-item "><a href="{{route('dsp.user')}}">Dashboard</a></div>
         @endif
         
         <div class="breadcrumb-item active">Schedule Detail</div>
      </div>
   </div> --}}

   <div class="section-body">
   {{-- <h2 class="section-title">Schedule Plan</h2>
   <p class="section-lead">
      We use 'DataTables' made by @SpryMedia. You can check the full documentation <a href="https://datatables.net/">here</a>.
   </p> --}}

      
      <div class="row">
         <div class="col-md-3">
            @if (auth()->user()->hasRole('marine'))
               <x-schedule-stisla.action-marine :schedule="$schedule" class="" />
               
            @endif
            @if (auth()->user()->hasRole('vessel') && $schedule->status == 1)
               <x-schedule-stisla.action-vessel :schedule="$schedule" />
               {{-- <div class="mb-3"></div> --}}
            @endif
            @if (auth()->user()->hasRole('department'))
               <x-schedule-stisla.action-department :schedule="$schedule" />
            @endif
            {{-- @if (auth()->user()->hasRole('vessel') && $schedule->status > 1 && $schedule->status < 11 )
               <a href="" class="btn  btn-info btn-block" data-toggle="modal" data-target="#schedule-vessel-complete">Complete</a>
               <div class="mb-3"></div>
            @endif --}}
            
            {{-- <div class="table-responsive">
               <table class="table-sm">
                  <thead>
                     <tr>
                        <th>{{$schedule->code}}ee</th>
                        <th><x-status-stisla.schedule-plain :schedule="$schedule" :lastreport="$lastreport" /></th>
                     </tr>
                  </thead>
                  <tbody>
                     
                     <tr>
                        <td colspan="2">{{formatDate($schedule->date)}}</td>
                        
                     </tr>
                     <tr>
                        <td colspan="2" class="text-uppercase">{{$schedule->class}}</td>
                     </tr>
                     <tr>
                        <td colspan="2">{{$schedule->vessel->name ?? 'Vessel Empty'}}</td>
                     </tr>
                     <tr>
                        <td>
                           @if ($schedule->class == 'Cargo' || $schedule->class == 'Crew' || $schedule->class == 'Crew Change')
                              <span>
                              @foreach ($fixRoutes as  $route)
                                    
                                 @if (auth()->user()->hasRole('marine'))
                                    <a href="#" data-toggle="modal" data-target="#reorder-route-{{$route->id}}">
                                    @if ($route->rank > 1)
                                       -
                                       @else
                                       
                                    @endif 
                                    {{$route->port->code}} 
                                    </a>
                                 @else
                                    @if ($route->rank > 1)
                                    -
                                    @else
                                    @endif 
                                    {{$route->port->code}} 
                                 @endif
                                 
                              
                                    
                                    @endforeach
                                 </span>  
                           @endif
                        </td>

                        <td>
                           @if (auth()->user()->hasRole('marine'))
                           <a href="#" data-toggle="modal" data-target="#add-schedule-route" class="" add-schedule-route>Add route</a>
                           @endif
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <hr> --}}
            <div class="card shadow- border">
               
               <div class="card-body">
                  <div class="mb-2">
                     <div class="d-flex">
                        <x-status-stisla.schedule :schedule="$schedule" :lastreport="$lastreport" />
                     </div>
                  </div>
                  
                  <span>{{formatDate($schedule->date)}} </span><br>
                  <span>{{$schedule->code}}</span> - <span class="text-uppercase">{{$schedule->class }}</span> <br>
                   
                  <h5><b>{{$schedule->vessel->name ?? 'Vessel Empty'}}</b></h5>
                  
                  
                  @if ($schedule->class == 'Cargo' || $schedule->class == 'Crew' || $schedule->class == 'Crew Change')
                     <span>
                        @foreach ($fixRoutes as  $route)
                              
                           @if (auth()->user()->hasRole('marine'))
                              <a href="#" data-toggle="modal" data-target="#reorder-route-{{$route->id}}">
                              @if ($route->rank > 1)
                                 -
                                 @else
                                 
                              @endif 
                              {{$route->port->code}} 
                              </a>
                           @else
                              @if ($route->rank > 1)
                              -
                              @else
                              @endif 
                              {{$route->port->code}} 
                           @endif
                           
                          
                              
                        @endforeach
                        <br>
                        @if (auth()->user()->hasRole('marine'))
                        <a href="#" data-toggle="modal" data-target="#add-schedule-route" class="" add-schedule-route>add more</a>
                        @endif
                        @if (auth()->user()->hasRole('marine'))
                                 {{$schedule->remark}}
                              @else
                              {{$schedule->remark}}
                              @endif
                     </span>  
                  @endif
                  @if ($schedule->class == 'Moving' || $schedule->class == 'Lifting' || $schedule->class == 'Fuel Oil' || $schedule->class == 'Fresh Water')
                      <span><b>{{$schedule->requests()->first()->origin->name}}</b> to <b>{{$schedule->requests()->first()->destination->name}}</b></span>
                  @endif
                  
                  @if ($schedule->class != 'Crew Change')
                  <br>
                  <small>Deadweight {{$persenWeight}}%</small>
                  @endif
                  
                  <br>
                  <a href="{{route('document.manifest', enkripRambo($schedule->id))}}" target="_blank" class=""><small>Export PDF</small></a> 
                  @if ($schedule->status == 0)
                  <a href="{{route('schedule.delete', enkripRambo($schedule->id))}}"><small>Delete</small></a>
                  @endif
                  
                  {{-- <hr> --}}
                  {{-- <div class="row">
                     <div class="col"><a href="{{route('document.manifest', enkripRambo($schedule->id))}}" class=" ">Preview PDF</a></div>
                     <div class="col">
                        <a href="{{route('schedule.timeline', enkripRambo($schedule->id))}}" class=" ">Timeline</a>
                     </div>
                  </div> --}}
                  
               </div>
               <div class="card-footer bg-whitesmoke">
                  @if ($report)
                     <small class="text-primary"><b>{{formatDateTime($report->created_at)}}</b></small><br>
                     <small>{{$report->status->name}}  {{$report->port->name ?? ''}} {{$report->anchor ?? ''}}</small><br>
                     @if ($report->status_id == 6)
                        <small >ETA : {{formatDateTime($report->eta)}} at {{$report->destination->name}}</small> <br>
                     @endif
                     @if ($report->status_id == 9)
                        <a href=""  data-toggle="modal" data-target="#report-evidance-{{$report->id}}"><small>Evidance</small></a> <br>
                     @endif
                     <hr>
                     <a href="{{route('schedule.timeline', enkripRambo($schedule->id))}}"><small>See all report..</small></a>
                  @endif
               </div>
            </div>
            @if ($schedule->class == 'Crew Change')
               {{-- <form action="{{route('marine.crew.change.import')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="text" name="schedule" id="schedule" value="{{$schedule->id}}" hidden>
                  <input type="file" class="form-control mb-2" id="file-crew" name="file-crew">
                  <input type="file" class="form-control" id="file-crew" name="file-crew">
                  <hr>
                  <button class="btn btn-light border btn-block" type="submit">Import</button>
               </form> --}}
               <div class="row">
                  <div class="col-md-6">
                     <div class="card card-info">
                        <div class="card-body">
                           {{$totalDeparture}}
                           <br>
                           Depart
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="card card-success">
                        <div class="card-body">
                           {{$totalReturn}} <br>
                           Return
                        </div>
                     </div>
                  </div>
               </div>
                     
            @endif
            {{-- <div class="card border">
               <div class="card-body">
                  <small class="text-primary"><b>{{formatDateTime($report->created_at)}}</b></small><br>
                  <small>{{$report->status->name}} at {{$report->port->name}}</small><br>
                  <a href=""><small>See all..</small></a>
               </div>
            </div>
            <x-schedule-stisla.timeline :reports="$reports" /> --}}
         </div>
         <div class="col-md-9">
            @if (auth()->user()->hasRole('vessel') && $schedule->status > 1)
               <x-schedule-stisla.action-vessel :schedule="$schedule" :statuses="$statuses" :fixroutes="$fixRoutes" />
            @endif

            
  
            {{-- @if (auth()->user()->hasRole('marine') && $schedule->status != 11)
               @if ($schedule->class == 'Cargo' || $schedule->class == 'Crew')
                  @if ($recentRequests->count() > 0)
                     <div id="accordion shadow">
                        <div class="accordion">
                        <div class="accordion-header " role="button" data-toggle="collapse" data-target="#panel-body-1">
                           <h4>Incoming Request from User <i class="fa fa-exclamation"></i></h4>
                        </div>
                        <div class="accordion-body collapse" id="panel-body-1" data-parent="#accordion">
                           <x-schedule-stisla.incoming :recents="$recentRequests" />
                        </div>
                        </div>
                     </div>
                  
                  @endif
               @endif
            @endif --}}

            @if ($schedule->class == 'Cargo' || $schedule->class == 'Crew' )
               <x-schedule.cargo-crew :requests="$requests" :schedule="$schedule" :recents="$recentRequests" :incomings="$schedule->requests->where('status', 1)" />
            @elseif($schedule->class == 'Moving')
            <div class="card border">
               <div class="card-header">
                  <b>Moving Barge</b>
               </div>
               <div class="card-body">
                  <div class="d-flex align-items-center">
                     <img width="70" src="{{asset('img/flaticon/oil-platform.png')}}" alt="" class="img-thumbnail mr-4">
                     <div>
                        <h5>{{$schedule->requests()->first()->bargeItem->barge->name}}</h5>
                        <span>{{$schedule->requests()->first()->code}}</span>
                     </div>
                  </div>
                  <br>
                  Requested by {{$schedule->requests()->first()->user->name}}
               </div>
            </div>
            @elseif($schedule->class == 'Lifting')
            <div class="card border">
               <div class="card-header">
                  <b>Lifting Tanker</b>
               </div>
               <div class="card-body">
                  <div class="d-flex align-items-center">
                     <img width="70" src="{{asset('img/flaticon/oil-platform.png')}}" alt="" class="img-thumbnail mr-4">
                     <div>
                        <h5>{{$schedule->requests()->first()->desc}}</h5>
                        <span>{{$schedule->requests()->first()->code}}</span>
                     </div>
                  </div>
                  <br>
                  Requested by {{$schedule->requests()->first()->user->name}}
               </div>
            </div>
            
            @elseif($schedule->class == 'Fuel Oil' )
            <div class="card border">
               <div class="card-header">
                  <b>Fuel Oil</b>
               </div>
               <div class="card-body">
                  <div class="d-flex align-items-center">
                     <img width="100" src="{{asset('img/flaticon/oil-barrel.png')}}" alt="" class="img-thumbnail mr-4">
                     <div>
                        <h5>{{$schedule->requests()->first()->qty}} / {{$schedule->requests()->first()->qty_approve ?? '0'}} Approved (KL)</h5>
                        
                        Requested by {{$schedule->requests()->first()->user->name}}
                     </div>
                  </div>
               </div>
               <div class="card-footer bg-whitesmoke">
                  @if (auth()->user()->hasRole('marine'))
                     @if ($schedule->status == 0)
                     <form action="{{route('schedule.jetty.update')}}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="number" name="schedule" id="schedule" value="{{$schedule->id}}" hidden>

                        <div class="form-row">
                           <div class="form-group col-md-4">
                              <div class="input-group">
                                 <select id="jetty" class="form-control" name="jetty" id="jetty">
                                    <option selected disabled>Choose one...</option>
                                    <option {{$schedule->remark == 'Jetty 1' ? 'selected' : ''}} value="Jetty 1">Jetty 1</option>
                                    <option {{$schedule->remark == 'Jetty 2' ? 'selected' : ''}}  value="Jetty 2">Jetty 2</option>
                                    <option {{$schedule->remark == 'Jetty 3' ? 'selected' : ''}}  value="Jetty 3">Jetty 3</option>
                                    <option {{$schedule->remark == 'Jetty 4' ? 'selected' : ''}}  value="Jetty 4">Jetty 4</option>
                                 </select>
                                 <div class="input-group-append">
                                    <button class="btn btn-info" type="submit">Submit</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </form>
                     @else
                     <span>{{$schedule->remark}}</span>
                     @endif
                     
                     @elseif(auth()->user()->hasRole('vessel'))
                     <span>{{$schedule->remark}}</span>
                  @endif
               </div>
            </div>
            @elseif($schedule->class == 'Fresh Water')
            <div class="card border">
               <div class="card-header">
                  <b>Fresh Water</b>
               </div>
               <div class="card-body">
                  <div class="d-flex align-items-center">
                     <img width="100" src="{{asset('img/flaticon/crude.png')}}" alt="" class="img-thumbnail mr-4">
                     <div>
                        <h5>{{$schedule->requests()->first()->qty}} / {{$schedule->requests()->first()->qty_approve ?? '0'}} Approved (KL)</h5>
                        
                        Requested by {{$schedule->requests()->first()->user->name}}
                     </div>
                  </div>
               </div>
               <div class="card-footer bg-whitesmoke">
                  @if (auth()->user()->hasRole('marine'))
                     @if ($schedule->status == 0)
                     <form action="{{route('schedule.jetty.update')}}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="number" name="schedule" id="schedule" value="{{$schedule->id}}" hidden>

                        <div class="form-row">
                           <div class="form-group col-md-4">
                              <div class="input-group">
                                 <select id="jetty" class="form-control" name="jetty" id="jetty">
                                    <option selected disabled>Choose one...</option>
                                    <option {{$schedule->remark == 'Jetty 1' ? 'selected' : ''}} value="Jetty 1">Jetty 1</option>
                                    <option {{$schedule->remark == 'Jetty 2' ? 'selected' : ''}}  value="Jetty 2">Jetty 2</option>
                                    <option {{$schedule->remark == 'Jetty 3' ? 'selected' : ''}}  value="Jetty 3">Jetty 3</option>
                                    <option {{$schedule->remark == 'Jetty 4' ? 'selected' : ''}}  value="Jetty 4">Jetty 4</option>
                                 </select>
                                 <div class="input-group-append">
                                    <button class="btn btn-info" type="submit">Submit</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </form>
                     @else
                     <span>{{$schedule->remark}}</span>
                     @endif
                     
                     @elseif(auth()->user()->hasRole('vessel'))
                     <span>{{$schedule->remark}}</span>
                  @endif
               </div>
            </div>
            @elseif($schedule->class == 'Crew Change')
            {{-- <h1>OK</h1> --}}
               {{-- {{count($recentCrewChangeRequests)}} --}}
               <x-schedule.crew-change :requests="$requests" :schedule="$schedule" :recents="$recentCrewChangeRequests"/>
            @endif
         </div>
      </div>
   </div>
</section>
   <div class="modal fade" id="schedule-vessel-complete" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Confirm Complete</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               Complete this Sailing Order? 
            </div>
            <div class="modal-footer bg-whitesmoke">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <a href="{{route('schedule.vessel.complete', enkripRambo($schedule->id))}}" class="btn btn-success">Complete</a>
            </div>
         </div>
      </div>
   </div>

  {{-- Modal Send Schedule --}}
   @if ($schedule->vessel)
   <div class="modal fade" id="schedule-send" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Send Schedule</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               Send this schedule to {{$schedule->vessel->name}}?
            </div>
            <div class="modal-footer bg-whitesmoke">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <a href="{{route('schedule.send', enkripRambo($schedule->id))}}" class="btn btn-info">Send</a>
            </div>
         </div>
      </div>
   </div>
   @endif

   {{-- Modal Accept Schedule --}}
   <div class="modal fade" id="schedule-accept" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Confirm Accept</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               Accept this Sailing Order?
            </div>
            <div class="modal-footer bg-whitesmoke">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <a href="{{route('schedule.accept', enkripRambo($schedule->id))}}" class="btn btn-info">Accept</a>
            </div>
         </div>
      </div>
   </div>

   {{-- Modal Revision Schedule --}}
   <div class="modal fade" id="schedule-revision" tabindex="1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <form action="{{route('schedule.revision')}}" method="POST">
         @csrf
         @method('PUT')
         <input type="number" name="schedule" id="schedule" value="{{$schedule->id}}" hidden>
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Form Revision Schedule</h5>
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
               <button type="submit" class="btn btn-info">Revision</button>
            </div>
         </div>
         </form>
      </div>
   </div>

  

  {{-- Modal delete Schedule --}}
  <div class="modal fade" id="schedule-delete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirm Delete</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Delete this Schedule?
        </div>
        <div class="modal-footer bg-whitesmoke">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a href="{{route('schedule.delete', enkripRambo($schedule->id))}}" class="btn btn-danger">Delete</a>
        </div>
      </div>
    </div>
  </div>

  {{-- Modal Edit Schedule --}}
   <div class="modal fade" id="schedule-edit" tabindex="1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <form action="{{route('schedule.update')}}" method="POST">
         @csrf
         @method('PUT')
         <input type="number" name="schedule" id="schedule" value="{{$schedule->id}}" hidden>
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Form Edit Schedule</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="form-row">
               <div class="form-group col-md-4">
                  <label for="date">Date</label>
                  <input type="date" class="form-control" id="date" name="date" value="{{$schedule->date}}">
               </div>
               <div class="form-group col-md-8">
                  <label>Vessel</label>
                  <select class="custom-select" id="vessel" name="vessel">
                     @foreach ($vessels as $vessel)
                        <option {{ $schedule->vessel_id == $vessel->id ? 'selected' : ''}} value="{{$vessel->id}}">{{$vessel->name}} [{{$vessel->type}}]</option>
                     @endforeach
                  </select>
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


  {{-- Modal Select Vessel --}}
  <div class="modal fade" id="schedule-select-vessel" tabindex="7" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <form action="{{route('schedule.select.vessel2')}}" method="POST">
        @csrf
        @method('PUT')
        <input type="number" name="schedule" id="schedule" value="{{$schedule->id}}" hidden>
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Select Vessel</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <hr>
            <div class="form-row">
              <div class="form-group col-md-12">
                {{-- <label for="vessel">Vessel</label> --}}
                <select id="vessel" class="form-control" name="vessel" id="vessel">
                  <option selected>Choose Vessel...</option>
                  @foreach ($vessels as $vessel)
                    <option  value="{{$vessel->id}}">{{$vessel->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            
          </div>
          <div class="modal-footer bg-whitesmoke">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info">Save</button>
          </div>
        </div>
      </form>
    </div>
 </div>


 {{-- Modal Report Add --}}
  <div class="modal fade" id="schedule-report-add" tabindex="7" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form action="{{route('schedule.select.vessel2')}}" method="POST">
        @csrf
        @method('PUT')
        <input type="number" name="schedule" id="schedule" value="{{$schedule->id}}" hidden>
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Select Vessel</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <hr>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="vessel">Vessel</label>
                <select id="vessel" class="form-control" name="vessel" id="vessel">
                  <option selected>Choose...</option>
                  @foreach ($vessels as $vessel)
                    <option  value="{{$vessel->id}}">{{$vessel->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            
          </div>
          <div class="modal-footer bg-whitesmoke">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info">Save</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  

  {{-- Modal Approve & Change Request Activity --}}
  @php
      $thisSchedule = $schedule
  @endphp
  @foreach ($recentRequests as $req)
    

    <div class="modal fade" id="req-app-{{$req->id}}" tabindex="1" role="dialog"  aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <form action="{{route('request.select.schedule')}}" method="POST">
          @csrf
          @method('PUT')
          <input type="number" name="request_id" id="request_id" value="{{$req->id}}" hidden>
          <input type="number" name="schedule" id="schedule" value="{{$thisSchedule->id}}" hidden>
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" ">Approve </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Add {{$req->activity->name}} {{$req->description}} {{$req->origin->name}} - {{$req->destination->name}} into {{$thisSchedule->vessel->name ?? '-'}} Schedule ?
              
            </div>
            <div class="modal-footer bg-whitesmoke">
              <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-info">Approve</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="modal fade" id="req-change-{{$req->id}}" tabindex="1" role="dialog" aria-labelledby="req-change-{{$req->id}}" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <form action="{{route('request.change.schedule')}}" method="POST" onsubmit="setTimeout(function(){window.location.reload();},10);" target="_blank">
          @csrf
          @method('PUT')
          <input type="number" name="request_id" id="request_id" value="{{$req->id}}" hidden>
          {{-- <input type="number" name="request_id" id="request_id" value="{{$request->id}}" hidden> --}}
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="req-change-{{$req->id}}">Change Confirmation</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               {{$req->code}} {{$req->activity->name}} {{$req->description}} <br>
               @foreach ($req->cargoItems as $item)
                   {{$item->desc}}
               @endforeach 
               [{{$req->total_weight}} ton]
               <hr>
               @if ($req->schedule_id != null)
                   From {{$req->schedule->code}} {{$req->schedule->vessel->name ?? ''}} {{formatDate($req->schedule->date)}}
                   @else
                   -
               @endif
               
               
              <hr>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="inputState">Change to</label>
                  <select id="schedule" name="schedule" class="form-control">
                    {{-- <option selected>Choose...</option>
                    <option>...</option> --}}
                    @foreach ($schedules as $schedule)
                      @if ($schedule->date >= $req->date)
                      <option  value="{{$schedule->id}}"> {{\Carbon\Carbon::parse($schedule->date)->format('d/m/Y')}} - {{$schedule->vessel->name ?? 'Not Available'}}</option>
                      @endif
                      
                    @endforeach
                  </select>
                </div>
              </div>
              
            </div>
            <div class="modal-footer bg-whitesmoke">
              <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-info">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="modal fade" id="req-change-destination-{{$req->id}}" tabindex="1" role="dialog" aria-labelledby="req-change-{{$req->id}}" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <form action="{{route('request.change.destination')}}" method="POST" >
          @csrf
          <input type="number" name="request_id" id="request_id" value="{{$req->id}}" hidden>
          {{-- <input type="number" name="request_id" id="request_id" value="{{$request->id}}" hidden> --}}
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="req-change-{{$req->id}}">Change Destination</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                  {{$req->code}} {{$req->activity->name}} {{$req->description}} <br>
                  @foreach ($req->cargoItems as $item)
                     {{$item->desc}}
                  @endforeach 
                  [{{$req->total_weight}} ton]
                  {{-- <hr> --}}
                  {{-- @if ($req->schedule_id != null)
                     From {{$req->schedule->code}} {{$req->schedule->vessel->name ?? ''}} {{formatDate($req->schedule->date)}}
                     @else
                     -
                  @endif --}}
                  
                  
               <hr>
               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label for="origin">From</label>
                     <select id="origin" name="origin" class="form-control">
                     {{-- <option selected>Choose...</option>
                     <option>...</option> --}}
                     @foreach ($ports as $port)
                        <option {{$req->origin_id == $port->id ? 'selected' : ''}} value="{{$port->id}}">{{$port->code}}</option>
                        
                     @endforeach
                     </select>
                  </div>
                  <div class="form-group col-md-6">
                     <label for="destination">To</label>
                     <select id="destination" name="destination" class="form-control">
                     @foreach ($ports as $port)
                        <option {{$req->destination_id == $port->id ? 'selected' : ''}} value="{{$port->id}}">{{$port->code}}</option>
                        
                     @endforeach
                     </select>
                  </div>
                  <div class="form-group col-md-12">
                     <textarea class="form-control" name="desc" id="desc" cols="30" rows="10" placeholder="Remarks..."></textarea>
                  </div>
                  
               </div>
              
            </div>
            <div class="modal-footer bg-whitesmoke">
              <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-info">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  @endforeach

  @foreach ($recentCrewChangeRequests as $req)
    

    <div class="modal fade" id="req-app-{{$req->id}}" tabindex="1" role="dialog"  aria-hidden="true">
      <div class="modal-dialog" role="document">
        <form action="{{route('request.select.schedule')}}" method="POST">
          @csrf
          @method('PUT')
          <input type="number" name="request_id" id="request_id" value="{{$req->id}}" hidden>
          <input type="number" name="schedule" id="schedule" value="{{$thisSchedule->id}}" hidden>
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" ">Confirm Approve </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Add {{$req->activity->name}} {{$req->description}} {{$req->origin->name}} - {{$req->destination->name}} into {{$thisSchedule->vessel->name ?? '-'}} Schedule ?
              
            </div>
            <div class="modal-footer bg-whitesmoke">
              <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-info">Approve</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="modal fade" id="req-change-{{$req->id}}" tabindex="1" role="dialog" aria-labelledby="req-change-{{$req->id}}" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <form action="{{route('request.change.schedule')}}" method="POST" onsubmit="setTimeout(function(){window.location.reload();},10);" target="_blank">
          @csrf
          @method('PUT')
          <input type="number" name="request_id" id="request_id" value="{{$req->id}}" hidden>
          {{-- <input type="number" name="request_id" id="request_id" value="{{$request->id}}" hidden> --}}
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="req-change-{{$req->id}}">Change Confirmation</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               {{$req->code}} {{$req->activity->name}} {{$req->description}} <br>
               @foreach ($req->cargoItems as $item)
                   {{$item->desc}}
               @endforeach 
               [{{$req->total_weight}} ton]
               <hr>
               @if ($req->schedule_id != null)
                   From {{$req->schedule->code}} {{$req->schedule->vessel->name ?? ''}} {{formatDate($req->schedule->date)}}
                   @else
                   -
               @endif
               
               
              <hr>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="inputState">Change to</label>
                  <select id="schedule" name="schedule" class="form-control">
                    {{-- <option selected>Choose...</option>
                    <option>...</option> --}}
                    @foreach ($schedules as $schedule)
                      @if ($schedule->date >= $req->date)
                      <option  value="{{$schedule->id}}"> {{\Carbon\Carbon::parse($schedule->date)->format('d/m/Y')}} - {{$schedule->vessel->name ?? 'Not Available'}}</option>
                      @endif
                      
                    @endforeach
                  </select>
                </div>
              </div>
              
            </div>
            <div class="modal-footer bg-whitesmoke">
              <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-info">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  @endforeach
  
   <div class="modal fade" id="add-schedule-route" tabindex="1" role="dialog"  aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
         <form action="{{route('schedule.add.route')}}" method="POST">
            @csrf
            <input type="number" name="schedule" id="schedule" value="{{$thisSchedule->id}}" hidden>
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Add Route </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
               {{-- Change {{$req->activity->name}} {{$req->description}} to  ...
               <hr> --}}
                  <div class="form-row">
                     <div class="form-group col-md-12">
                        <label for="destination">Destination</label>
                        <select id="destination"  name="destination" class="form-control">
                        {{-- <option selected>Choose...</option>
                        <option>...</option> --}}
                        @foreach ($ports as $port)
                        
                           <option   value="{{$port->id}}"> {{$port->name}}</option>
                        
                           
                        @endforeach
                        </select>
                     </div>
                     
                  </div>
                  
               
               </div>
               <div class="modal-footer bg-whitesmoke">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-info">Save</button>
               </div>
            </div>
         </form>
      </div>
   </div>

  {{-- Modal reorder route --}}
   @foreach ($fixRoutes as $route)
      <div class="modal fade" id="reorder-route-{{$route->id}}" tabindex="1" role="dialog"  aria-hidden="true">
         <div class="modal-dialog modal-sm" role="document">
            <form action="{{route('schedule.reorder.route')}}" method="POST">
               @csrf
               <input type="number" name="schedule" id="schedule" value="{{$schedule->id}}" hidden>
               <input type="number" name="route" id="route" value="{{$route->id}}" hidden>
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Edit Route </h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                  {{-- Change {{$req->activity->name}} {{$req->description}} to  ...
                  <hr> --}}
                     <div class="form-row">
                        <div class="form-group col-md-12">
                           <label for="after">Destination</label>
                           <select id="after" disabled name="after" class="form-control">
                           {{-- <option selected>Choose...</option>
                           <option>...</option> --}}
                           @foreach ($fixRoutes as $fr)
                             
                              <option {{$fr->id == $route->id ? 'selected' : ''}}  value="{{$fr->id}}"> {{$fr->port->name}}</option>
                           
                              
                           @endforeach
                           </select>
                        </div>
                        <div class="form-group col-md-12">
                           <label for="after">Move {{$route->port->name}} After</label>
                           <select id="after" name="after" class="form-control">
                              <option selected disabled>Choose...</option>
                           @foreach ($fixRoutes as $fr)
                              @if ($fr->id != $route->id )
                              
                           
                              <option  value="{{$fr->id}}"> {{$fr->port->name}}</option>
                              @endif
                              
                           @endforeach
                           </select>
                        </div>
                        {{-- <div class="form-group col-md-4">
                           <label for="after">Date</label>
                           <input type="date" name="date" id="date" value="{{$route->date}}" class="form-control">
                        </div> --}}
                     </div>
                     

                     <a href="{{route('schedule.delete.route', enkripRambo($route->id))}}">Delete</a>
                  
                  </div>
                  <div class="modal-footer bg-whitesmoke">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-info">Save</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   @endforeach


  {{-- Modal Cofirm Arrival Cargo --}}
  @foreach ($schedule->requests->where('activity_id', '!=', 2) as $request)
    @foreach ($request->cargoItems as $item)
      <div class="modal fade" id="confirmCargo_{{$item->id}}" tabindex="1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog" role="document">
          <form action="{{route('cargo.item.offloading')}}" method="POST">
            @csrf
            <input type="number" name="cargoItem" id="cargoItem" value="{{$item->id}}" hidden>
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Confirm Arrival Cargo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                {{-- Change {{$req->activity->name}} {{$req->description}} to  ...
                <hr> --}}
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="after">Qty</label>
                    <input type="text" required class="form-control" id="qty" value="{{$item->qty}}" readonly name="qty" value="{{$item->qty}}" >
                  </div>
                  <div class="form-group col-md-6">
                    <label for="offloading">Drop</label>
                    <input type="text" required class="form-control" id="offloading" name="offloading" >
                  </div>
                  <div class="form-group col-md-12">
                    <label for="destination">Deflection to</label>
                    <select id="destination" name="destination" class="form-control">
                     <option selected disabled>Choose</option>
                      @foreach ($routes as $route)
                        <option value="{{$route->port->id}}">{{$route->port->name}}</option>  
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-12">
                    <label for="desc">Description</label>
                    <input type="text"  class="form-control" id="desc" name="desc" >
                  </div>
                </div>
                
              </div>
              <div class="modal-footer bg-whitesmoke">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info">Save</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    @endforeach
  @endforeach
  
  {{-- Modal Complete Arrival Cargo --}}
  <div class="modal fade" id="schedule-confirm-complete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirm Complete</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Confirm Arrival Cargo Complete ?
        </div>
        <div class="modal-footer bg-whitesmoke">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a href="{{route('schedule.complete', enkripRambo($schedule->id))}}" class="btn btn-info">Complete</a>
        </div>
      </div>
    </div>
  </div>

  {{-- Evidance Report --}}
  @if ($reports->count() > 0)
    @foreach ($reports as $report)
    <div class="modal fade" id="report-evidance-{{$report->id}}" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <span class="modal-title">Evidance Anchored at Secure Area</span>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <img src="{{asset('storage/' .$report->foto)}}" class="img-fluid" alt="Responsive image">
            {{-- <img width="100vh" src="" alt=""> --}}
            {{-- {{$report->foto}} --}}
          </div>
          <div class="modal-footer bg-whitesmoke">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            
          </div>
        </div>
      </div>
    </div>
    @endforeach
  @endif
  
  
    
@endsection

@push('report')
   <script>

      $(document).ready(function() {
         // console.log('report function');
         $('#foto').hide();
         $('.eta').hide();
         $('.anchor').hide();

         $('.status').change(function() {
            // console.log('okeee');
            var status = $(this).val();
            if (status == 9) {
              $('#foto').show();
              $('.eta').hide();
              $('.anchor').hide();
            } else if(status == 6) {
              $('#foto').hide();
              $('.anchor').hide();
              $('.eta').show();
            } else if (status > 27 && status < 32) {
              $('#foto').hide();
              $('.anchor').show();
              $('.eta').hide();
            } else {
              $('#foto').hide();
              $('.eta').hide();
              $('.anchor').hide();
            }
         })

         
      })
   </script>
@endpush

@if ($schedule->vessel)
    

@push('map')
<script>
    $("#modal-4").fireModal({
    footerClass: 'bg-whitesmoke',
    body: 'Add the <code>bg-whitesmoke</code> class to the <code>footerClass</code> option.',
    buttons: [
      {
        text: 'No Action!',
        class: 'btn btn-primary btn-shadow',
        handler: function(modal) {
        }
      }
    ]
  });

    mapboxgl.accessToken = 'pk.eyJ1IjoicmFobWF0cmgiLCJhIjoiY2xwNml3MzJ0MjBpNjJscXl6am9mc21sayJ9.BHym8QvhGHWK1QC3qDX4sg';
    const map = new mapboxgl.Map({
    container: 'map2', // container ID
    // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
    style: 'mapbox://styles/mapbox/streets-v12', // style URL
    center: [{!! $schedule->vessel->longitude !!}, {!! $schedule->vessel->latitude !!}], // starting position [lng, lat]
    zoom: 7.4 // starting zoom
    });
    
    const marker1 = new mapboxgl.Marker()
    .setLngLat([{!! $schedule->vessel->longitude !!}, {!! $schedule->vessel->latitude !!}])
    .addTo(map);

    map.setStyle('mapbox://styles/mapbox/outdoors-v11')
    map.addControl(new mapboxgl.NavigationControl())


    for (const feature of geojson.features) {
    // create a HTML element for each feature
    const el = document.createElement('div');
    el.className = 'marker';

    // make a marker for each feature and add to the map
    new mapboxgl.Marker(el).setLngLat(feature.geometry.coordinates).addTo(map);
  }
  </script>

@endpush
@endif


