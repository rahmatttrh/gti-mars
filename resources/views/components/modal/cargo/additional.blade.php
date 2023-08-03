<div class="modal modal-blur fade" id="additionalCargo" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Add Additional Cargo</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="{{route('request.additional.store')}}" method="POST">
            @csrf

            <input type="number" name="schedule" id="schedule" value="{{$schedule->id}}" hidden>
            {{-- <input type="date" name="date" id="date" value="NOW()" hidden> --}}
            <div class="modal-body">
               <div class="form-floating mb-3">
                  <select required name="destination" id="destination" class="form-select">
                     <option  disabled selected>Choose</option>
                     <option value="{{$schedule->origin_id}}">{{$schedule->origin->name}}</option>  
                     @foreach ($routes as $route)
                        <option value="{{$route->port->id}}">{{$route->port->name}}</option>  
                     @endforeach
                  </select>
                  <label for="destination">Destination</label>
               </div>
               <div class="form-floating mb-3">
                  <select name="activity" id="activity" class="form-select">
                     <option value="" selected disabled >Choose Activity</option>
                     @foreach ($activities as $activity)
                        <option {{ old('activity') == $activity->id ? 'selected' : ''}} value="{{$activity->id}}">{{$activity->name}}</option>
                     @endforeach
                  </select>
                  <label for="activity">Activity</label>
               </div>
               <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="desc" name="desc">
                  <label for="desc">Description</label>
               </div>

            </div>

            <div class="modal-footer">
               <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                  Cancel
               </a>
               <button type="submit" class="btn btn-primary ms-auto">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                     <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" />
                     <circle cx="12" cy="14" r="2" />
                     <polyline points="14 4 14 8 8 8 8 4" />
                  </svg>
                  Add
               </button>
            </div>
         </form>
      </div>
   </div>
</div>