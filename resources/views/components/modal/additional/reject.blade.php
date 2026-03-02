<div class="modal modal-blur fade" id="modal-additional-reject-{{$request->id}}" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content">
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         <div class="modal-status bg-danger"></div>
         <form action="{{route('schedule.reject.additional')}}" method="POST">
            @csrf
            <input type="number" name="requestId" id="requestId" value="{{$request->id}}" hidden>
            <div class="modal-body text-center py-4">
               <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
               <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9v2m0 4v.01" /><path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" /></svg>
               <h3>Are you sure?</h3>
               <div class="text-muted">Reject this Additional Request</div>
               <hr>
               <div class="form-floating">
                  <input type="text"  class="form-control"  id="reason" name="reason" >
                  <label for="reason">Reason</label>
               </div>
            </div>
            <div class="modal-footer">
               <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
               Cancel
               </a>
               <button type="submit" class="btn btn-danger ms-auto">
                
                  Reject
               </button>
            </div>
         </form>
      </div>
   </div>
</div>