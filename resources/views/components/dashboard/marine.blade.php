<div>
   <div class="row mt--1 row-cards">
      <div class="col-lg-8">
         <div class="card mb-2">
            <div class="card-header border-0 bg-secondary text-white">
               <div class="card-title">
                  
                  BOAT PLANNING <span class="text-uppercase text-azure">{{$monthname}}</span></div>
            </div>
            <div class="card-table table-responsive ">
               <table class="table table-vcenter">
                  <thead class="bg-primary">
                     <tr>
                        <th>Date</th>
                        <th>Vessel</th>
                        <th>Location</th>
                        <th >Status</th>
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($schedules as $schedule)
                        <tr>
                           <td>{{ \Carbon\Carbon::parse($schedule->date)->format('d/m/Y') }}</td>
                           <td class="">
                              <div class=" text-nowrap text-muted ">
                                 @if ($schedule->status == 1)
                                 -
                                    @else
                                    {{$schedule->vessel->name}}
                                 @endif
                              </div>
                           </td>
                           <td class="text-muted">
                              {{$schedule->origin->name}} - {{$schedule->destination->name}}
                           </td>
                           <td>
                              <x-status.schedule :schedule="$schedule" />
                           </td>
                           <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                 @if ($schedule->status == 1 && auth()->user()->hasRole('marine'))
                                 <a href="" class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#modal-select-vessel-{{$schedule->id}}">Boat</a>
                                 @else
                                 
                                 @endif
                                 
                                 <a href="{{route('schedule.detail', enkripRambo($schedule->id))}}" class="btn btn-sm btn-secondary">Detail</a>
                              </div>
                           </td>
                        </tr>
                        <x-modal.select-vessel :vessels="$vessels" :schedule="$schedule" />
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <div class="col-md-4">
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
      </div>
   </div>
</div>