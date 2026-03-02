<div>
   @if ($confirms->count() > 0)
      @foreach ($confirms as $confirm)
         <div class="alert alert-primary" role="alert">
            You have a Arrival Cargo from {{$confirm->origin->name}}. Click <a href="{{route('schedule.detail', enkripRambo($confirm->schedule_id))}}" class="alert-link">here</a> to see detail.
         </div>
      @endforeach
   @endif
   
   
   <div class="row">
      <div class="col-md-4">
         <div class="card bg-primary text-white" >
            <div class="card-body">
              <h5 class="card-title"></h5>
              <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="card-link">Card link</a>
              <a href="#" class="card-link">Another link</a>
            </div>
          </div>
      </div>
      <div class="col-md-8">
         <div class="row mt--1 row-cards">
            <div class="col-md-4">
               <div class="card bg-dark text-white ">
                  <div class="card-body ">
                     <div class="d-flex align-items-center">
                     <div class="subheader text-white">Draft Request</div>
                     </div>
                     <div class="h2 ">{{$requests->where('status', 0)->count()}} Request Activity</div>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="card bg-info text-white">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                     <div class="subheader text-white">Progress Request</div>
                     </div>
                     <div class="h2 ">{{$requests->where('status', '>', 0)->count()}} Request Activity</div>
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="card bg-primary text-white">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                     <div class="subheader text-white">Complete Request</div>
                     </div>
                     <div class="h2 ">{{$requests->where('status', 3)->count()}} Request Activity</div>
                  </div>
               </div>
            </div>
            <div class="col-lg-12">
               <div class="card mb-2">
                  <div class="card-header border-0 bg-secondary text-white">
                     <div class="card-title">
                        
                        RECENT REQUEST ACTIVITY</div>
                  </div>
                  <div class="card-table table-responsive ">
                     <table class="table table-vcenter">
                        <thead class="bg-primary">
                           <tr>
                              <th>BCM</th>
                              <th>Date</th>
                              <th>Activity</th>
                              <th>Route</th>
                              <th>Status</th>
                           </tr>
                        </thead>
                        <tbody>
                           @if ($requests->count() > 0)
                              @foreach ($requests as $r)
                              <tr>
                                 {{-- <td class="text-muted">
                                    <a href="{{route('request.detail.parent', enkripRambo($r->parent->id))}}">{{$r->parent->code}}</a>
                                 </td> --}}
                                 <td class="text-muted">
                                    <a href="{{route('request.detail', enkripRambo($r->id))}}">{{$r->bcm}}</a>
                                 </td>
                                 <td class="text-muted">{{ \Carbon\Carbon::parse($r->date)->format('d/m/Y') }}</td>
                                 {{-- <td class="text-muted"><a href="{{route('request.detail', enkripRambo($r->id))}}">{{$r->activity->name ?? ''}} {{$r->description}}</a></td> --}}
                                 <td class="text-muted">{{$r->activity->name ?? ''}} {{$r->description}}</td>
                                 <td class="text-muted">{{$r->origin->name}} - {{$r->destination->name}}</td>
                                 <td>
                                    {{-- <x-status.request :request="$r" :lastreport="$r->schedule->lastreport()" /> --}}
                                       @if ($r->status < 3)
                                          <x-status.request :request="$r" :lastreport="null"/>
                                          @else
                                          {{-- {{$r->schedule_id}} --}}
                                          {{-- {{$r->id}} --}}
                                          <x-status.request :request="$r" :lastreport="$r->getStatus()"/>
                                       @endif
                                 </td>
                              </tr>
                              @endforeach
                              @else
                              <tr>
                                 <td colspan="5" style="text-align: center"><small>Empty</small></td>
                              </tr>
                           @endif
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            {{-- <div class="col-md-4">
               <div class="card">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                     <div class="subheader">Sales</div>
                     <div class="ms-auto lh-1">
                        <div class="dropdown">
                           <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                           <div class="dropdown-menu dropdown-menu-end">
                           <a class="dropdown-item active" href="#">Last 7 days</a>
                           <a class="dropdown-item" href="#">Last 30 days</a>
                           <a class="dropdown-item" href="#">Last 3 months</a>
                           </div>
                        </div>
                     </div>
                     </div>
                     <div class="h1 mb-3">75%</div>
                     <div class="d-flex mb-2">
                     <div>Conversion rate</div>
                     <div class="ms-auto">
                        <span class="text-green d-inline-flex align-items-center lh-1">
                           7% <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                           <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="3 17 9 11 13 15 21 7" /><polyline points="14 7 21 7 21 14" /></svg>
                        </span>
                     </div>
                     </div>
                     <div class="progress progress-sm">
                     <div class="progress-bar bg-blue" style="width: 75%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                        <span class="visually-hidden">75% Complete</span>
                     </div>
                     </div>
                  </div>
               </div>
            </div> --}}
         </div>
      </div>
   </div>
   
</div>