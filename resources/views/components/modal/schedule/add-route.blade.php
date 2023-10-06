<div class="modal modal-blur fade" id="add-route" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-sm modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Add Route</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="{{route('schedule.add.route')}}" method="POST">
            @csrf
            <input type="number" name="schedule" id="schedule" value="{{$schedule->id}}" hidden>
            <div class="modal-body">
               
               {{-- <div class="mt-2 border-top pt-2">Total Weight {{$request->total_weight}} ton</div>
               <div>Total Size {{$request->total_size}} m<sup>2</sup></div> --}}
               {{-- <div class="form-floating mb-3">
                  <input type="text" required class="form-control" id="date" name="date" value="{{$request->date}}" >
                  <label for="station">Date</label>
               </div> --}}
               
               {{-- <div class="form-floating mb-3">
                  <select required name="from" id="from" class="form-select">
                     <option value="{{$request->schedule->origin_id}}">{{$request->schedule->origin->name}}</option>
                     @foreach ($routes as $route)

                        <option value="{{$route->port_id}}">{{$route->port->name}}</option>
                     @endforeach
                  </select>
                  <label for="from">After From</label>
               </div> --}}
               <div class="form-floating mb-2">
                  <select required name="destination" id="destination" class="form-select">
                     <option  disabled selected>Choose Destination</option>
                     @foreach ($routes as $route)
                        <option  value="{{$route->id}}"> {{$route->port->name}}</option>
                     @endforeach
                     
                  </select>
                  <label for="destination">Route</label>
               </div>
            </div>
            
            <div class="modal-footer">
               <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
               Cancel
               </a>
               <button type="submit" class="btn btn-primary ms-auto" >
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><circle cx="12" cy="14" r="2" /><polyline points="14 4 14 8 8 8 8 4" /></svg>
                  Add
               </button>
            </div>
         </form>
      </div>
   </div>
 </div>