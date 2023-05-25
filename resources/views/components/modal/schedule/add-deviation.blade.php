<div class="modal modal-blur fade" id="modal-add-deviation" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Add Deviation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="{{route('schedule.add.deviation')}}" method="POST">
            @csrf
            <input type="number" name="schedule" id="schedule" value="{{$schedule->id}}" hidden>
            <div class="modal-body">
               <div class="form-floating mb-3">
                  <select required name="port" id="port" class="form-select">
                     @foreach ($ports as $port)
                        <option value="{{$port->id}}">{{$port->name}}</option>
                     @endforeach
                  </select>
                  <label for="port">Destination</label>
               </div>
               <div class="form-floating mb-3">
                  <input type="text"  class="form-control" id="desc" name="desc">
                  <label for="desc">Description</label>
               </div>
               <div class="form-floating mb-3">
                  <input type="text"  class="form-control" id="reason" name="reason">
                  <label for="reason">Reason</label>
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