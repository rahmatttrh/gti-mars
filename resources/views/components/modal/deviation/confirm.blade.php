<div class="modal modal-blur fade" id="modal-deviation-confirm-{{$deviation->id}}" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content">
         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         {{-- <div class="modal-status"></div> --}}
         <div class="modal-body py-4">
            <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-primary icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9v2m0 4v.01" /><path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" /></svg>
            {{-- <h3>Are you sure?</h3> --}}
            <div class="text-start">
               <div class="text-muted border-bottom pb-1 mb-2">Confirmation Deviation</div>
               <small class="text-muted">Destination</small>
               <div class="mb-2">{{$deviation->destination->name}}</div>
               <small class="text-muted">Description</small>
               <div class="mb-2">{{$deviation->activity->name}}</div>
               {{-- <small class="text-muted">Reason</small>
               <div class="mb-2">{{$deviation->reason}}</div> --}}
            </div>
            
         </div>
         <div class="modal-footer">
            <div class="w-100">
               <div class="row">
                  <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                     Cancel
                     </a></div>
                  <div class="col"><a href="{{route('schedule.confirm.deviation', enkripRambo($deviation->id))}}" class="btn btn-primary w-100" >
                     Yes
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>