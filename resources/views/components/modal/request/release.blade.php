<div class="modal modal-blur fade" id="release-parent-request" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-body">
         <div class="modal-title">Are you sure?</div>
         <div>This All Request Activity will send to Marine</b>.</div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
         <a href="{{route('request.release.parent', enkripRambo($parent->id))}}" class="btn btn-primary" >Yes, release</a>
         {{-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Yes, delete all my data</button> --}}
       </div>
     </div>
   </div>
</div>