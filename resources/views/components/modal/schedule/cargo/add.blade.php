<div class="modal modal-blur fade" id="modal-add-cargo" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Add Cargo</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="{{route('schedule.add.cargo')}}" method="POST">
            @csrf
            <input type="number" name="schedule" id="schedule" value="{{$schedule->id}}" hidden>
            <div class="modal-body">
               <div class="row">
                  <div class="col">
                     <div class="form-floating mb-3">
                        <select required name="from" id="from" class="form-select">
                           @foreach ($routes as $route)
                              <option value="{{$route->port_id}}">{{$route->port->name}}</option>
                           @endforeach
                        </select>
                        <label for="from">After From</label>
                     </div>
                  </div>
                  <div class="col">
                     <div class="form-floating mb-3">
                        <select required name="port" id="port" class="form-select">
                           @foreach ($ports as $port)
                              <option value="{{$port->id}}">{{$port->name}}</option>
                           @endforeach
                        </select>
                        <label for="port">To</label>
                     </div>
                  </div>
               </div>
               {{-- <div class="form-floating mb-3">
                  <select required name="port" id="port" class="form-select">
                     @foreach ($ports as $port)
                        <option value="{{$port->id}}">{{$port->name}}</option>
                     @endforeach
                  </select>
                  <label for="port">Destination</label>
               </div> --}}
               {{-- <div class="form-floating mb-3">
                  <select name="activity" required id="activity" class="form-select">
                     <option value="" selected disabled >Choose Activity</option>
                     @foreach ($activities as $activity)
                        <option {{ old('activity') == $activity->id ? 'selected' : ''}} value="{{$activity->id}}">{{$activity->name}}</option>
                     @endforeach
                  </select>
                  <label for="activity">Activity</label>
               </div> --}}
               <div class="form-floating mb-3">
                  <input type="text"  class="form-control" id="desc" name="desc">
                  <label for="desc">Description</label>
               </div>
               
            </div>
            
            <div class="modal-footer">
               <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
               Cancel
               </a>
               <button type="submit" class="btn btn-primary ms-auto">
                
                  Add
               </button>
            </div>
         </form>
      </div>
   </div>
 </div>