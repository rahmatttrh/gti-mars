<div>
   <div class="row mt--1 row-cards">
      {{-- <div class="col-4">
         <div class="card">
            <div class="card-header">
               <h4 class="card-title">CBU</h4>
            </div>
            <div class="card-body">
               
               <div class="mb-2">
                  <div>Giat Jaya</div>
                  <div>Triton Jawara</div>
               </div>
               
            </div>
         </div>
      </div>
      <div class="col-4">
         <div class="card">
            <div class="card-header">
               <h4 class="card-title">CBU</h4>
            </div>
            <div class="card-body">
               
               <div class="mb-2">
                  <div>Giat Jaya</div>
                  <div>Triton Jawara</div>
               </div>
               
            </div>
         </div>
      </div>
      <div class="col-4">
         <div class="card">
            <div class="card-header">
               <h4 class="card-title">CBU</h4>
            </div>
            <div class="card-body">
               
               <div class="mb-2">
                  <div>Giat Jaya</div>
                  <div>Triton Jawara</div>
               </div>
               
            </div>
         </div>
      </div> --}}
      <div class="col-md-9">
         <div class="card mb-3">
            <div class="card-header border-0 bg-secondary text-white">
               <div class="card-title">
                  RECENT REQUEST ACTIVITY
               </div>
            </div>
            <div class="card-table table-responsive ">
               <table class="table table-vcenter">
                  <thead class="bg-primary">
                     <tr>
                        {{-- <th>Code</th> --}}
                        <th>Date</th>
                        <th>Func</th>
                        <th>Route</th>
                        <th>Activity</th>
                        
                        {{-- <th>Boat</th> --}}
                        <th>Status</th>
                        {{-- <th></th> --}}
                     </tr>
                  </thead>
                  <tbody>
                     @if ($requests->where('status', 1)->count() > 0 )
                        @foreach ($requests->where('status', 1) as $r)
                           <tr>
                              {{-- <td class="text-muted">{{$r->code}}</td> --}}
                              <td class="text-muted">{{$r->date}}</td>
                              <td class="text-muted">{{$r->department->code}}</td>
                              <td class="text-muted">{{$r->origin->name}} - {{$r->destination->name}}</td>
                              <td class="text-muted"><a href="{{route('request.detail', enkripRambo($r->id))}}">{{$r->activity->name ?? ''}} {{$r->description}}</a></td>
                              
                              {{-- <td class="text-muted">{{$r->schedule->vessel->name ?? '-'}}</td> --}}
                              <td>
                                 <x-status.request :request="$r" />
                              </td>
                              {{-- <td>
                                 <a href="" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#approveRequest_{{$r->id}}">Approve</a>
                              </td> --}}
                           </tr>
                           <x-modal.activity.approve :request="$r" />
                           {{-- <x-modal.schedule.select-vessel :vessels="$vessels" :schedule="$schedule" /> --}}
                        @endforeach
                        @else
                        <tr>
                           <td colspan="7" style="text-align: center"><small>Empty</small></td>
                        </tr>
                     @endif
                  </tbody>
               </table>
            </div>
         </div>
         <div class="card mb-2">
            <div class="card-header ">
               <div  class="card-title">
                  
                  REQUEST ACTIVITY</div>
            </div>
            <div class="card-table table-responsive py-2">
               <table id="example" class="table table-vcenter">
                  <thead class="bg-primary">
                     <tr>
                        {{-- <th>Code</th> --}}
                        <th>Date</th>
                        <th>Func</th>
                        <th>Activity</th>
                        <th>Route</th>
                        <th>Boat</th>
                        <th>Status</th>
                     </tr>
                  </thead>
                  <tbody>
                     {{-- @if ($requests->where('status', '==', 202))
                        @elseif($requests->where('status', '!=', 202))
                     @endif --}}
                     @if ($requests->where('status', '>', 1)->where('status', '!=', 202)->count() > 0)
                        @foreach ($requests->where('status', '>', 1) as $r)
                           <tr>
                              {{-- <td class="text-muted">{{$r->code}}</td> --}}
                              <td class="text-muted">{{$r->date}}</td>
                              <td class="text-muted">{{$r->department->code}}</td>
                              <td class="text-muted"><a href="{{route('request.detail', enkripRambo($r->id))}}">{{$r->activity->name ?? '-'}} {{$r->description}}</a></td>
                              <td class="text-muted">{{$r->schedule->origin->name ?? '-'}} - {{$r->schedule->destination->name ?? '-'}}</td>
                              <td class="text-muted">{{$r->schedule->vessel->name ?? '-'}}</td>
                              <td>
                                 <x-status.request :request="$r" />
                              </td>
                           </tr>
                           
                           {{-- <x-modal.schedule.select-vessel :vessels="$vessels" :schedule="$schedule" /> --}}
                        @endforeach
                        @else
                        <tr>
                           <td colspan="7" style="text-align: center"><small>Empty</small></td>
                        </tr>
                     @endif
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      {{-- <div class="col-md-6">
         <div class="card mb-2">
            <div class="card-header border-0 bg-danger text-white">
               <div class="card-title">
                  
                  REQUEST ACTIVITY PENDING</div>
            </div>
            <div class="card-table table-responsive ">
               <table class="table table-vcenter">
                  <thead class="bg-primary">
                     <tr>
                        <th>Date</th>
                        <th>Func</th>
                        <th>Activity</th>
                        <th>Route</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td class="text-muted">14/03/23</td>
                        <td class="text-muted">Logistic</td>
                        <td class="text-muted">Material Cargo</td>
                        <td class="text-muted">KJ4 - PAB</td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div> --}}
      <div class="col-md-3">
         @foreach ($requestundos as $undo)
            <a class="card" href="#">
               <div class="card-body">
                  <div class="row">
                     <div class="col">
                        <div class="font-weight-medium mb-1">{{$undo->code}}</div>
                        <div class="text-muted">{{$undo->activity->name}}</div>
                     </div>
                  </div>
               </div>
            </a>
         @endforeach
         
      </div>
   </div>
</div>