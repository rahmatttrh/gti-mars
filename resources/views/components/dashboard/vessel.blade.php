<div>
   @if ($recentschedules->count() > 0)
      @foreach ($recentschedules as $recent)
         <div class="alert alert-primary" role="alert">
            You have a Schedule for {{\Carbon\Carbon::parse($recent->date)->format('d/m/Y')}}. Click <a href="{{route('schedule.detail', enkripRambo($recent->id))}}" class="alert-link">here</a> to see detail.
         </div>
      @endforeach
   @endif
   <div class="row mt--1 row-cards">
      <div class="col-lg-8">
         @if ($vessel->schedule_id != null)
         <div class="card mb-3">
            <div class="card-body">
               <div class="d-flex align-items-center">
                  <div class="subheader">Now Sailing Order</div>
                  <div class="ms-auto lh-1">
                     <small>Example</small>
                     {{-- <div class="dropdown">
                        <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                        <div class="dropdown-menu dropdown-menu-end">
                           <a class="dropdown-item active" href="#">Last 7 days</a>
                           <a class="dropdown-item" href="#">Last 30 days</a>
                           <a class="dropdown-item" href="#">Last 3 months</a>
                        </div>
                     </div> --}}
                  </div>
               </div>
               
               <div class="h1 mb-3">
                  <a href="{{route('schedule.detail', enkripRambo($now->id))}}">
                  {{-- <span class="text-info">{{$now->origin->name}}</span> --}}
                              @foreach ($routes as  $route)
                              @if ($route->rank > 1)
                                        -
                                    @endif 
                                    {{$route->port->name}}
                              {{-- @if ($route->request->status == 12)
                              <span class="text-info">- {{$route->port->name}} </span>
                              @else
                              - {{$route->port->name}} 
                           @endif --}}
                              @endforeach
                           </a>
               </div>
               <div class="d-flex mb-2">
                  <div>{{\Carbon\Carbon::parse($now->date)->format('d/m/Y')}}</div>
                  
               </div>
               {{-- <div class="progress progress-sm">
                  <div class="progress-bar bg-blue" style="width: 100%" role="progressbar" aria-valuenow="75"
                     aria-valuemin="0" aria-valuemax="100">
                  </div>
               </div> --}}
            </div>
         </div>
         @endif
         
         <div class="card mb-2">
            <div class="card-header border-0 bg-secondary text-white">
               <div class="card-title">
                  SAILING ORDERS 
               </div>
            </div>
            <div class="card-table table-responsive ">
               <table class="table table-vcenter">
                  <thead class="bg-primary">
                     <tr>
                        {{-- <th class="text-center">No.</th> --}}
                        <th>Date</th>
                        {{-- <th>Route</th> --}}
                        <th>Activity</th>
                        <th>Status</th>
                        {{-- <th></th> --}}
                     </tr>
                  </thead>
                  <tbody>
                     @if ($schedules->count() > 0 )
                        @foreach ($schedules as $schedule)
                           <tr>
                              {{-- <td class="text-muted text-center">{{++$i}}</td> --}}
                              <td><a href="{{route('schedule.detail', enkripRambo($schedule->id))}}">{{ \Carbon\Carbon::parse($schedule->date)->format('d/m/Y') }}</a></td>
                              
                              {{-- <td class="text-muted">
                                 From {{$schedule->origin->name}} 
                              </td> --}}
                              <td class="text-muted"><a href="#" data-bs-toggle="modal" data-bs-target="#modal-request-list-{{$schedule->id}}">{{$schedule->requests->count()}} Activity</a></td>
                              <td>
                                 <x-status.schedule :schedule="$schedule" :lastreport="$schedule->lastreport()" />
                                 {{-- @if ($schedule->deviations->where('status', 0)->count() == 0)
                                 <div class="badge bg-danger">Deviation Alert</div>
                                 @endif --}}
                              </td>
                           </tr>
                           <x-modal.schedule.request :schedule="$schedule" />
                        @endforeach
                        @else
                        <tr>
                           <td colspan="5" class="text-center text-muted"><small>Empty</small></td>
                        </tr>
                     @endif
                     
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <div class="col-md-4">
         <div class="card mb-3" style="height: calc(18rem + 10px)">
            <div class="card-header">
               <div class="badge bg-primary">Timeline</div>
            </div>
            <div class="card-body card-body-scrollable card-body-scrollable-shadow">
               {{-- <div class="divide-y"> --}}
                  @if ($reports->count() > 0)
                     @foreach ($reports as $report)
                     <dl class="row border-bottom">
                        
                        <dd class="col-10"> {{$report->status->name}} [{{$report->port_id == null ? '' :  $report->port->name}}]</dd>
                        <dd class="col-2 text-end"><small> {{  \Carbon\Carbon::parse($report->created_at)->format('H:i ')}}</small></dd>
                     </dl>
                     @endforeach
                     @else
                     <div class="row">
                        <div class="col">
                           <small class="text-center text-muted">Empty</small>
                        </div>
                     </div>
                  @endif
               {{-- </div> --}}
            </div>
            {{-- <div class="card-footer">
               <small>Scroll down to see more</small>
            </div> --}}
         </div>
         <div class="card bg-info text-white">
            <div class="card-body p-4 text-center">
               
               <div class="h1 m-0">{{$schedules->where('status', 11)->count()}}</div>
               <div class="text-muted mb-3 text-white">Schedule Complete</div>
            </div>
         </div>
      </div>
   </div>
</div>