<div>
   @if ($recentschedules->count() > 0)
      @foreach ($recentschedules as $recent)
         <div class="alert alert-primary" role="alert">
            You have a Schedule from {{$recent->origin->name}}. Click <a href="{{route('schedule.detail', enkripRambo($recent->id))}}" class="alert-link">here</a> to see detail.
         </div>
      @endforeach
   @endif
   <div class="row mt--1 row-cards">
      <div class="col-lg-9">
         <div class="card mb-2">
            <div class="card-header border-0 bg-secondary text-white">
               <div class="card-title">
                  SCHEDULE VESSEL 
               </div>
            </div>
            <div class="card-table table-responsive ">
               <table class="table table-vcenter">
                  <thead class="bg-primary">
                     <tr>
                        <th class="text-center">No.</th>
                        <th>Date</th>
                        <th>Location</th>
                        <th>Activity</th>
                        <th>Status</th>
                        {{-- <th></th> --}}
                     </tr>
                  </thead>
                  <tbody>
                     @if ($schedules->count() > 0 )
                        @foreach ($schedules as $schedule)
                           <tr>
                              <td class="text-muted text-center">{{++$i}}</td>
                              <td><a href="{{route('schedule.detail', enkripRambo($schedule->id))}}">{{ \Carbon\Carbon::parse($schedule->date)->format('d/m/Y') }}</a></td>
                              
                              <td class="text-muted">
                                 {{$schedule->origin->name}} 
                              </td>
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
      <div class="col-md-3">
         {{-- <div class="card">
            <div class="card-body">
               <x-status.vessel :vessel="$vessel" />
            </div>
         </div> --}}
         <div class="card bg-info text-white">
            <div class="card-body p-2 text-center">
               <div class="text-end text-green">
                  <span class="text-white d-inline-flex align-items-center  lh-1">
                     {{$vessel->name}}
                     <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <polyline points="3 17 9 11 13 15 21 7" />
                        <polyline points="14 7 21 7 21 14" />
                     </svg>
                  </span>
               </div>
               <div class="h1 m-0">{{$schedules->where('status', 11)->count()}}</div>
               <div class="text-muted mb-3 text-white">Schedule Complete</div>
            </div>
         </div>
      </div>
   </div>
</div>