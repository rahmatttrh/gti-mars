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
         <div class="card mb-2">
            <div class="card-header border-0 bg-secondary text-white">
               <div class="card-title">
                  
                  RECENT REQUEST ACTIVITY</div>
            </div>
            <div class="card-table table-responsive ">
               <table class="table table-vcenter">
                  <thead class="bg-primary">
                     <tr>
                        {{-- <th>Code</th> --}}
                        <th>Created</th>
                        <th>Func</th>
                        <th>Activity</th>
                        <th>Route</th>
                        <th>Status</th>
                        {{-- <th></th> --}}
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($requests as $r)
                        <tr>
                           {{-- <td class="text-muted">{{$r->code}}</td> --}}
                           <td class="text-muted">{{$r->date}}</td>
                           <td class="text-muted">{{$r->department->code}}</td>
                           <td class="text-muted"><a href="{{route('request.detail', enkripRambo($r->id))}}">{{$r->activity->name}}</a></td>
                           <td class="text-muted">{{$r->schedule->origin->name}} - {{$r->schedule->destination->name}}</td>
                           <td>
                              <div class="badge bg-light border text-dark"><span class="badge bg-info me-1"></span>01</div>
                           </td>
                        </tr>
                        
                        {{-- <x-modal.schedule.select-vessel :vessels="$vessels" :schedule="$schedule" /> --}}
                     @endforeach
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
         <div class="card">
            <div class="card-header">
               <h4 class="card-title">SBU</h4>
            </div>
            <div class="card-body">
               <div class="mb-2">
                  <div>Prisai</div>
                  <div>PM6</div>
               </div>
            </div>
         </div>
         <div class="card mt-2">
            <div class="card-header">
               <h4 class="card-title">CBU</h4>
            </div>
            <div class="card-body">
               <div class="mb-2">
                  <div>Clarisa</div>
                  <div>Clara 58</div>
               </div>
            </div>
         </div>
         <div class="card mt-2">
            <div class="card-header">
               <h4 class="card-title">NBU</h4>
            </div>
            <div class="card-body">
               <div class="mb-2">
                  <div>Salatiga</div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>