@extends('layouts.stisla.app')
@section('title')
    Detail Sailing Order
@endsection
@section('content')
<section class="section">
    <div class="section-header">
      <h1 class="section-title">Detail Sailing Order</h1>
      <div class="section-header-breadcrumb">
        @if (auth()->user()->hasRole('marine'))
          <div class="breadcrumb-item "><a href="{{route('dsp.marine')}}">Dashboard</a></div>
          @elseif(auth()->user()->hasRole('vessel'))
          <div class="breadcrumb-item "><a href="{{route('dsp.vessel')}}">Dashboard</a></div>
          @elseif(auth()->user()->hasRole('user'))
          <div class="breadcrumb-item "><a href="{{route('dsp.user')}}">Dashboard</a></div>
        @endif
        
        {{-- <div class="breadcrumb-item">Schedule Plan</div> --}}
        <div class="breadcrumb-item active">Schedule Detail {{$recentRequests->count()}}</div>
      </div>
    </div>

    <div class="section-body">
      {{-- <h2 class="section-title">Schedule Plan</h2>
      <p class="section-lead">
        We use 'DataTables' made by @SpryMedia. You can check the full documentation <a href="https://datatables.net/">here</a>.
      </p> --}}

      <div class="row">
        @if (auth()->user()->hasRole('vessel') || auth()->user()->hasRole('department'))
          <div class="col-md-12">
            @else
            @if (auth()->user()->hasRole('marine'))
                @if ($recentRequests->count() > 0)
                  <div class="col-md-9">
                    
                  @else
                  
                  <div class="col-md-12">
                @endif
            @endif
        @endif
        
          <div class="d-flex">
            @if (auth()->user()->hasRole('marine'))
                <x-schedule-stisla.action-marine :schedule="$schedule" />
            @endif

            @if (auth()->user()->hasRole('vessel'))
                <x-schedule-stisla.action-vessel :schedule="$schedule" :statuses="$statuses" :fixroutes="$fixRoutes" />
            @endif

            @if (auth()->user()->hasRole('department'))
                <x-schedule-stisla.action-department :schedule="$schedule" />
            @endif

            <div class="btn-group ml-2 mb-4">
              <a href="{{route('document.manifest', enkripRambo($schedule->id))}}" class="btn btn-light border btn-lg">Preview PDF</a>
            
              @if (auth()->user()->hasRole('marine') && $schedule->status == 0)
                <button type="button" class="btn btn-light border btn-lg dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">Postpone</a>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#schedule-edit">Edit</a>
                  
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#schedule-delete">Delete</a>
                  {{-- <a class="dropdown-item" href="{{route('document.manifest', enkripRambo($schedule->id))}}">Preview Manifest</a> --}}
                </div>
              @endif
              
            </div>
          </div>
          
          {{-- <hr> --}}
          <div class="card">
            <div class="card-header ">
             
              
              <x-status-stisla.schedule :schedule="$schedule" :lastreport="$lastreport" />
            </div>
            <div class="card-body">
              {{-- <x-status-stisla.schedule :schedule="$schedule" :lastreport="$lastreport" /> --}}
              <div class="row">
                <div class="col-md-8">
                  <h4 class="">{{$schedule->vessel->name ?? 'Vessel Not Avalaible'}} </h4>
                  {{-- <small>{{$schedule->vessel->type ?? 'Vessel Not Avalaible'}} </small> --}}
                  <h3> {{\Carbon\Carbon::parse($schedule->date)->format('l')}}, {{\Carbon\Carbon::parse($schedule->date)->format('d F Y')}}</h1>
                  {{-- @if ($schedule->type == 1)
                  <div class="badge badge-pill badge-primary">Routine</div>
                  @else
                  <div class="badge badge-pill badge-warning">Request</div>
                  @endif --}}
                  {{-- <div class="badge badge-pill badge-info">{{$schedule->class}}</div>   --}}
                  <hr>
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      {{-- <li class="breadcrumb-item">
                        <a href="#"><i class="fas fa-tachometer-alt"></i></a>
                      </li> --}}
                      @foreach ($fixRoutes as  $route)
                        <li class="breadcrumb-item">
                          @if (auth()->user()->hasRole('marine'))
                          <a href="#" data-toggle="modal" data-target="#reorder-route-{{$route->id}}">
                            @if ($route->rank > 1)
                      
                            @endif 
                            {{$route->port->name}} <b>&nbsp;&nbsp;</b>
                          </a>
                          @else
                          @if ($route->rank > 1)
                      
                            @endif 
                            {{$route->port->name}} <b>/&nbsp;&nbsp;</b>
                          @endif
                          <br>
                          <small>
                            @if ($route->date)
                            {{\Carbon\Carbon::parse($route->date)->format('l')}}
                            @else
                            -
                            @endif
                          </small>
                        </li>
                        
                      
                      @endforeach
                     
                      
                      {{-- <li class="breadcrumb-item"><a href="#"><i class="far fa-file"></i> Library</a></li>
                      <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-list"></i> Data</li> --}}
                    </ol>
                  </nav>
                </div>
                <div class="col-md-4">
                  <div class="card shadow-none border">
                    {{-- <div class="card-header">
                      <h4>Referral URL</h4>
                    </div> --}}
                    <div class="card-body">
                      <div class="mb-4">
                        <div class="text-small float-right font-weight-bold text-muted">{{$persenSize}}%</div>
                        <div class="font-weight-bold mb-1">Deckspace</div>
                        <div class="progress" data-height="4">
                          <div class="progress-bar" role="progressbar" data-width="{{$persenSize}}%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>                          
                      </div>
    
                      <div class="mb-4">
                        <div class="text-small float-right font-weight-bold text-muted">{{$persenWeight}}%</div>
                        <div class="font-weight-bold mb-1">Deadweight</div>
                        <div class="progress" data-height="4">
                          <div class="progress-bar" role="progressbar" data-width="{{$persenWeight}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer bg-whitesmoke">
              
            </div>
          </div>
          
          @if ($schedule->class != 'Moving')
            <div class="card">
              <div class="card-header">
                <h4>Manifest </h4>
              </div>
              <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Cargo</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Crew </a>
                  </li>
                  
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="table-responsive">
                      <table class="table table-striped " id="table-1">
                        <thead>
                          <tr>
                            <th>MTD</th>
                            <th>Destination</th>
                            <th>Descriptive</th>
                            <th>Contract</th>
                            <th class="text-center">Qty</th>
                            <th class="text-center">Weight</th>
                            <th class="text-center">Drop</th>
                            <th class="text-center">Size (m<sup>2</sup>)</th>
                            
                            @if ( auth()->user()->hasRole('department'))
                              <th>Action</th>
                              @else
                              <th>-</th>
                            @endif
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($requests->where('activity_id', 1) as $request)
                            @foreach ($request->cargoItems as $item)
                                <tr>
                                  <td class=" text-truncate">
                                    <div class="dropdown">
                                      {{$item->mtd}}
                                    </div>
                                  </td>
                                  <td>{{$item->request->destination->name}}</td>
                                  <td class=" text-truncate ">
                                    {{$item->desc}} 
                                  </td>
                                  <td class=" text-truncate">{{$item->contract}}</td>
                                  <td class=" text-center text-truncate" >{{$item->qty}} {{$item->unit}}</td>
                                  <td class=" text-center">{{$item->weight}}</td>
                                  <td class=" text-center">{{$item->offloading ? $item->offloading->offloading : '-'}}</td>
                                  <td class=" text-center">{{$item->size}}</td>
                                 
                                  @if ($request->status == 10 && auth()->user()->hasRole('department'))
                                    <td>
                                        @if ($item->status == 0)
                                          <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#confirmCargo_{{$item->id}}">Confirm</a>
                                          {{-- <x-modal.cargo.confirm :cargo="$item" :routes="$routes" :schedule="$request->schedule" /> --}}
                                          @else
                                          -
                                        @endif
                                        
                                      {{-- <form action="">
                                        <div class="form-group">
                                          <div class="input-group">
                                             <input type="number" class="form-control" name="drop" id="drop">
                                             <select class="form-control" name="port" id="port">
                                                <option selected>Port...</option>
                                                @foreach ($routes as $route)
                                                   <option value="{{$route->port->id}}">{{$route->port->name}}</option>  
                                                @endforeach
                                             </select>
                                            <div class="input-group-append">
                                              <button class="btn btn-primary" type="submit">OK</button>
                                            </div>
                                          </div>
                                       </div>
                                      </form> --}}
                                    </td>
                                    @else
                                    <td>0</td>
                                  @endif
                              </tr>
                            @endforeach
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <hr>
                    <div class="table-responsive">
                      <table class="table table-striped card-table">
                        <thead>
                            <tr>
                              <th colspan="7" class="text-info">Deflection</th>
                            </tr>
                            <tr>
                              <th>MTD</th>
                              <th>Descriptive</th>
                              <th>Destination</th>
                              <th class="text-center">Qty</th>
                              
                              <th class="">Desc</th>
                              {{-- <th class="text-center">Size (m<sup>2</sup>)</th>
                              <th class="text-center">Weight (ton)</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($requests->where('activity_id', '!=', 2) as $request)
                            @if ($request->class == 'main' && $request->deflections->count() > 0)
                              @foreach ($request->deflections as $deflection)
                                <tr>
                                    <td class="">{{$deflection->cargoitem->mtd}}</td>
                                    
                                    <td class="  text-nowrap">
                                      {{$deflection->cargoitem->desc}}
                                    </td>
                                    <td class="">{{$deflection->port->name}}</td>
                                    <td class=" text-center">{{$deflection->qty}} {{$deflection->cargoitem->unit}}</td>
                                    <td class="  text-nowrap">
                                      {{$deflection->desc}} 
                                    </td>
                                    {{-- <td class="text-muted text-center">{{$deflection->size}}</td>
                                    <td class="text-muted text-center">{{$deflection->weight}}</td> --}}
                                    
                                
                                </tr>
                              @endforeach
                            @endif
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="table-responsive ">
                      <table class="table table-striped table-1" id="table-3">
                        <thead>
                          
                          <tr>
                            <th>Type</th>
                            <th>Route</th>
                            <th>Name</th>
                            <th>Barcode</th>
                            <th>Department</th>
                            <th>Company</th>
                            <th>Desc</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($requests->where('activity_id', 2) as $requests)
                            {{-- <tr>
                              <td colspan="7">{{$requests->origin->name}} - {{$requests->destination->name}}</td>
                            </tr> --}}
                            @foreach ($requests->passengerItems as $passenger)
                              <tr>
                                <td>{{$passenger->type}}</td>
                                <td class="text-truncate">{{$passenger->request->origin->name}} - {{$passenger->request->destination->name}}</td>
                                <td>{{$passenger->name}}</td>
                                <td>{{$passenger->barcode}}</td>
                                <td class="text-truncate">{{$passenger->department}}</td>
                                <td class="text-truncate">{{$passenger->company}}</td>
                                <td>{{$passenger->desc}}</td>
                               
                              </tr>
                          @endforeach
                          @endforeach
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
            @else 
            <div class="card">
              <div class="card-body">
                <div class="summary-item">
                  <h6>Barge </h6>
                  <ul class="list-unstyled list-unstyled-border">
                    
                    <li class="media">
                      <a href="#">
                        <img class="mr-3 rounded" width="50" src="{{asset('stisla/img/products/product-1-50.png')}}" alt="product">
                      </a>
                      <div class="media-body">
                        {{-- <div class="media-right">$405</div> --}}
                        <div class="media-title h2"><a href="#">{{$schedule->requests()->first()->bargeItem->barge->name}}</a></div>
                        <div class="text-muted text-small">Moving</div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          @endif
          
          
        </div>
        @if (auth()->user()->hasRole('marine'))
          @if ($recentRequests->count() > 0)
            <div class="col-md-3">
              <div class="card" >
                <div class="card-header">
                  <h4>Recent Request</h4>
                </div>
                <div class="card-body ">
                  <div class="summary " >
                    @if ($recentRequests->count() > 0)
                      @foreach ($recentRequests as $req)
                      {{-- @if ($req->activity_id != 3) --}}
                          
                    
                      {{-- <div class="card">
                        <div class="card-body"> --}}
                          <div class="summary-item">
                            {{-- <h6>Item List <span class="text-muted">(3 Items)</span></h6> --}}
                            <ul class="list-unstyled list-unstyled-border">
                              <li class="media">
                                {{-- <a href="#">
                                  <img class="mr-3 rounded" width="50" src="{{asset('stisla/img/products/product-2-50.png')}}" alt="product">
                                </a> --}}
                                <div class="media-body">
                                  <div class="media-right text-right">
                                    {{-- <button class="btn btn-primary" id="modal-4">Footer Background</button> --}}
                                    <a class="" href="#" data-toggle="modal" data-target="#req-app-{{$req->id}}"><small>Approve</small></a><br>
                                    <a href="#" data-toggle="modal" data-target="#req-change-{{$req->id}}"><small>Change</small></a>
                                    {{-- <button type="button" class="btn btn-primary" >
                                      Launch demo modal
                                    </button> --}}
                                    
                                  </div>
                                  <div class="media-title"><a href="{{route('request.detail', enkripRambo($req->id))}}">{{$req->activity->name}} {{$req->description}}</a></div>
                                  <div class="text-muted text-small"> <a href="#">{{$req->origin->name}} - {{$req->destination->name}}</a> <br> by {{$req->employee->name}}</div>
                                </div>
                              </li>
                              
                            </ul>
                          </div>
                        {{-- </div>
                      </div> --}}
                          <hr>
                          
                          {{-- @endif --}}
                      @endforeach
                      @else
                      <div class="row">
                          <div class="col">
                            <small class="text-center text-muted">Empty</small>
                          </div>
                      </div>
                    @endif
                  </div>
                </div>
              </div>

              {{-- Activity --}}

              
            </div>
          @endif
        @endif

        <div class="col-md-12">
          <div class="badge badge-info">
            Timeline Activity
          </div>
          <hr>
          <div class="activities">
            @if ($reports->count() > 0)
              @foreach ($reports as $report)
              <div class="activity">
                <div class="activity-icon bg-primary text-white shadow-primary">
                  <i class="fas fa-comment-alt"></i>
                </div>
                <div class="activity-detail">
                  <div class="mb-2">
                    <span class="text-job text-primary">{{  \Carbon\Carbon::parse($report->created_at)->format('d-m-y H:i ')}}</span>
                    <span class="bullet"></span>
                    {{-- <a class="text-job" href="#">View</a> --}}
                    {{-- <div class="float-right dropdown">
                      <a href="#" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                      <div class="dropdown-menu">
                        <div class="dropdown-title">Options</div>
                        <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                        <a href="#" class="dropdown-item has-icon"><i class="fas fa-list"></i> Detail</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item has-icon text-danger" data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?" data-confirm-text-yes="Yes, IDC"><i class="fas fa-trash-alt"></i> Archive</a>
                      </div>
                    </div> --}}
                  </div>
                  <p>{{$report->vessel->name}} {{$report->status->name}}  {{$report->port_id == null ? '' :  'at ' .$report->port->name}}.</p>
                </div>
              </div>
                {{-- <div class="row">
                  <div class="col">
                      <div class="">
                        {{$report->status->name}} [{{$report->port_id == null ? '' :  $report->port->name}}]
                      </div>
                      <div class="text-muted"><small>{{  \Carbon\Carbon::parse($report->created_at)->format('d-m-y H:i ')}}</small></div>
                  </div>
                </div> --}}
                @endforeach
                @else
                <div class="row">
                  <div class="col">
                      <small class="text-center text-muted">Empty</small>
                  </div>
                </div>
            @endif
            
          </div>
        </div>
      </div>
    </div>
  </section>


  {{-- Modal Send Schedule --}}
  @if ($schedule->vessel)
  <div class="modal fade" id="schedule-send" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirm Send Schedule</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Send this schedule to {{$schedule->vessel->name}}?
        </div>
        <div class="modal-footer bg-whitesmoke">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a href="{{route('schedule.send', enkripRambo($schedule->id))}}" class="btn btn-primary">Send</a>
        </div>
      </div>
    </div>
  </div>
  @endif

  {{-- Modal Accept Schedule --}}
  <div class="modal fade" id="schedule-accept" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
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
          <a href="{{route('schedule.accept', enkripRambo($schedule->id))}}" class="btn btn-primary">Accept</a>
        </div>
      </div>
    </div>
  </div>

  {{-- Modal delete Schedule --}}
  <div class="modal fade" id="schedule-delete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
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
            <button type="submit" class="btn btn-primary">Approve</button>
          </div>
        </div>
      </form>
    </div>
  </div>


  {{-- Modal Select Vessel --}}
  <div class="modal fade" id="schedule-select-vessel" tabindex="7" role="dialog"  aria-hidden="true">
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
            <button type="submit" class="btn btn-primary">Save</button>
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
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  

  {{-- Modal Approve & Change Request Activity --}}
  @foreach ($recentRequests as $req)
    

    <div class="modal fade" id="req-app-{{$req->id}}" tabindex="1" role="dialog"  aria-hidden="true">
      <div class="modal-dialog" role="document">
        <form action="{{route('request.select.schedule')}}" method="POST">
          @csrf
          @method('PUT')
          <input type="number" name="request_id" id="request_id" value="{{$req->id}}" hidden>
          <input type="number" name="schedule" id="schedule" value="{{$req->schedule->id}}" hidden>
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" ">Confirm Approve </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Add {{$req->activity->name}} {{$req->description}} {{$req->id}} to {{$req->schedule->vessel->name ?? '-'}} ?
              
            </div>
            <div class="modal-footer bg-whitesmoke">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Approve</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="modal fade" id="req-change-{{$req->id}}" tabindex="1" role="dialog" aria-labelledby="req-change-{{$req->id}}" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <form action="{{route('request.change.schedule')}}" method="POST">
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
              Change {{$req->activity->name}} {{$req->description}} {{$req->id}} to  ...
              <hr>
              <div class="form-row">
                <div class="form-group col-md-12">
                  {{-- <label for="inputState">State</label> --}}
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
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  @endforeach
  


  {{-- Modal reorder route --}}
  @foreach ($fixRoutes as $route)
    <div class="modal fade" id="reorder-route-{{$route->id}}" tabindex="1" role="dialog"  aria-hidden="true">
      <div class="modal-dialog" role="document">
        <form action="{{route('schedule.reorder.route')}}" method="POST">
          @csrf
          <input type="number" name="schedule" id="schedule" value="{{$schedule->id}}" hidden>
          <input type="number" name="route" id="route" value="{{$route->id}}" hidden>
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Reorder Route </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              {{-- Change {{$req->activity->name}} {{$req->description}} to  ...
              <hr> --}}
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="after">Move {{$route->port->name}} After</label>
                  <select id="after" name="after" class="form-control">
                    {{-- <option selected>Choose...</option>
                    <option>...</option> --}}
                    @foreach ($fixRoutes as $fr)
                      @if ($fr->id != $route->id )
                      <option  value="{{$fr->id}}"> {{$fr->port->name}}</option>
                      @endif
                      
                    @endforeach
                  </select>
                </div>
              </div>
              
            </div>
            <div class="modal-footer bg-whitesmoke">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
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
                <h5 class="modal-title">Confirm Arrival Cargo </h5>
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
                      @foreach ($routes as $route)
                        <option value="{{$route->port->id}}">{{$route->port->name}}</option>  
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="desc">Description</label>
                    <input type="text"  class="form-control" id="desc" name="desc" >
                  </div>
                </div>
                
              </div>
              <div class="modal-footer bg-whitesmoke">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
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
          <a href="{{route('schedule.complete', enkripRambo($schedule->id))}}" class="btn btn-primary">Complete</a>
        </div>
      </div>
    </div>
  </div>
    
@endsection



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