<div class="modal modal-blur fade" id="reorder-route-{{$route->id}}" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-sm  modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Reorder Route {{$route->port->name}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="{{route('schedule.reorder.route')}}" method="POST">
            @csrf
            <input type="number" name="schedule" id="schedule" value="{{$schedule->id}}" hidden>
            <input type="number" name="route" id="route" value="{{$route->id}}" hidden>
            <div class="modal-body">
         
               <div class="form-floating mb-2">
                  <select required name="after" id="after" class="form-select">
                     {{-- <option  disabled selected>Choose after</option> --}}
                     @foreach ($fixroutes as $fr)
                        @if ($fr->id != $route->id )
                        <option  value="{{$fr->id}}"> {{$fr->port->name}}</option>
                        @endif
                        
                     @endforeach
                     
                  </select>
                  <label for="after">Move After</label>
               </div>
            </div>
            
            <div class="modal-footer">
               <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
               Cancel
               </a>
               <button type="submit" class="btn btn-primary ms-auto" >
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><circle cx="12" cy="14" r="2" /><polyline points="14 4 14 8 8 8 8 4" /></svg>
                  Move
               </button>
            </div>
         </form>
      </div>
   </div>
 </div>