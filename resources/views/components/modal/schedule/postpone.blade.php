<div class="modal modal-blur fade" id="modal-postpone-schedule" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Postpone</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="{{route('schedule.postpone')}}" method="POST">
            @csrf
            {{-- @method('PUT') --}}
            <input type="number" name="schedule" id="schedule" value="{{$schedule->id}}" hidden>
            <div class="modal-body">
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-floating mb-3">
                        <input type="date" value="{{$schedule->date}}" required class="form-control" readonly id="from" name="from" >
                        <label for="from">Current</label>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-floating mb-3">
                        <input type="date" value="{{$schedule->date}}" required class="form-control" id="to" name="to" >
                        <label for="to">Postpone</label>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-floating mb-3">
                        <input type="text" required  class="form-control" id="reason" name="reason">
                        <label for="reason">Reason</label>
                     </div>
                  </div>
               </div>
               
               
            </div>
            
            <div class="modal-footer">
               <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
               Cancel
               </a>
               <button type="submit" class="btn btn-primary ms-auto">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><circle cx="12" cy="14" r="2" /><polyline points="14 4 14 8 8 8 8 4" /></svg>
                  Postpone
               </button>
            </div>
         </form>
      </div>
   </div>
 </div>