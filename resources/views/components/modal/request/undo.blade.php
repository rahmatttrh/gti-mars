<div class="modal modal-blur fade" id="undoRequest" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content">
         <form action="{{route('request.undo')}}" method="POST">
            @csrf
            <input type="number" id="requestId" name="requestId" value="{{$request->id}}" hidden>
            <div class="modal-body">
               <div class="modal-title">Are you sure?</div>
               <div>If you proceed, you will Cancel this Request (Need approval from Marine)</div>
               <hr>
               <div class="form-floating mb-3">
                  <input type="text" required class="form-control" id="reason" name="reason" >
                  <label for="reason">Reason</label>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
               {{-- <a href="{{route('request.undo', enkripRambo($request->id))}}" class="btn btn-danger" >Yes, Undo this data</a> --}}
               {{-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Yes, delete all my data</button> --}}
               <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><circle cx="12" cy="14" r="2" /><polyline points="14 4 14 8 8 8 8 4" /></svg>
                  Yes, Cancel
               </button>
            </div>
         </form>
      </div>
   </div>
</div>