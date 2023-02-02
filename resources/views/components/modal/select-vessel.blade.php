<div class="modal modal-blur fade" id="modal-select-vessel-{{$schedule->id}}" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Select Boat</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="{{route('schedule.select.vessel')}}" method="POST">
            @csrf
            @method('PUT')
            <input type="number" name="schedule" id="schedule" value="{{$schedule->id}}" hidden>
            <div class="modal-body">
               <div class="form-floating">
                  <select required name="vessel" id="vessel" class="form-select">
                     <option  disabled selected>Choose boat</option>
                     @foreach ($vessels as $vessel)
                        <option value="{{$vessel->id}}">{{$vessel->name}}</option>
                     @endforeach
                     
                  </select>
                  <label for="origin">Boat</label>
               </div>
            </div>
            
            <div class="modal-footer">
               <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
               Cancel
               </a>
               <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><circle cx="12" cy="14" r="2" /><polyline points="14 4 14 8 8 8 8 4" /></svg>
                  Select
               </button>
            </div>
         </form>
      </div>
   </div>
 </div>