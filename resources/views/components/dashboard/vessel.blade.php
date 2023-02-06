<div>
   <div class="row mt--1 row-cards">
      <div class="col-lg-9">
         <div class="card mb-2">
            <div class="card-header border-0 bg-secondary text-white">
               <div class="card-title">
                  BOAT PLANNING VESSEL <span class="text-uppercase text-azure">{{$monthname}}</span>
               </div>
            </div>
            <div class="card-table table-responsive ">
               <table class="table table-vcenter">
                  <thead class="bg-primary">
                     <tr>
                        <th>Date</th>
                        <th>Activity</th>
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
                                 {{$schedule->activity}}
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
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <div class="col-md-3">
         <div class="card">
            {{-- <div class="card-header bg-yellow text-white">
               <div class="card-title">Boat Status</div>
            </div> --}}
            <div class="card-body">
               <x-status.vessel :vessel="$vessel" />
            </div>
         </div>
      </div>
   </div>
</div>