<div class="modal modal-blur fade" id="modal-additional-approve-{{$request->id}}" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Approve & Set Route</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="{{route('schedule.approve.additional')}}" method="POST">
            @csrf
            {{-- <input type="number" name="schedule" id="schedule" value="{{$schedule->id}}" hidden> --}}
            <input type="number" name="requestId" id="requestId" value="{{$request->id}}" hidden>
            <div class="modal-body">
               <div class="row">
                  <div class="col">
                     <div class="form-floating mb-3">
                        <input type="text"  class="form-control" disabled id="desc" name="desc" value="{{$request->destination->name}}">
                        <label for="desc">Destination</label>
                     </div>
                  </div>
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
               </div>
               <small>This action will change the order of the existing routes</small>
            </div>
            
            <div class="modal-footer">
               <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
               Cancel
               </a>
               <button type="submit" class="btn btn-primary ms-auto">
                
                  Set
               </button>
            </div>
         </form>
      </div>
   </div>
 </div>