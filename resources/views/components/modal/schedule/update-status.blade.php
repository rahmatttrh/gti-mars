<div class="modal modal-blur fade" id="schedule-update-status" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Update Status</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="{{route('schedule.update.status')}}" method="POST">
            @csrf
            {{-- @method('PUT') --}}
            <input type="number" name="schedule" id="schedule" value="{{$schedule->id}}" hidden>
            <div class="modal-body">
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-floating mb-3">
                        <select required name="status" id="status" class="form-select">
                           <option  disabled selected>Choose</option>
                       
                           @foreach ($statuses as $status)
                              @if ($status->id == 1)
                                  @else
                                    @if ($status->code == '09' || $status->code == '11' || $status->code == '12')
                                       <option value="{{$status->id}}">{{$status->name}} *</option>
                                       @else
                                       <option value="{{$status->id}}">{{$status->name}} </option>
                                       @endif
                                   
                              @endif
                               
                           @endforeach
                           
                        </select>
                        <label for="status">Status</label>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-floating">
                        <select required name="port" id="port" class="form-select">
                           <option  disabled selected>Choose</option>
                       
                           {{-- @foreach ($ports as $port)
                              <option value="{{$port->id}}">{{$port->name}}</option>  
                           @endforeach --}}
                           <option value="{{$schedule->origin_id}}">{{$schedule->origin->name}}</option>  
                           @foreach ($routes as $route)
                              <option value="{{$route->port->id}}">{{$route->port->name}}</option>  
                           @endforeach
                           
                        </select>
                        <label for="port">Port</label>
                     </div>
                  </div>
               </div>
               {{-- <hr> --}}
               <small>
                  <span class="text-info">Waiting</span> to Handover sailing order to user on location  <br>
                  <span class="text-info">Unloading</span> to Finish activity on location <br>
                  <span class="text-info">Task Complete</span> to Finish all activity in this Sailing Order
               </small>
               
               
            </div>
            
            <div class="modal-footer">
               <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
               Cancel
               </a>
               <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><circle cx="12" cy="14" r="2" /><polyline points="14 4 14 8 8 8 8 4" /></svg>
                  Update
               </button>
            </div>
         </form>
      </div>
   </div>
 </div>