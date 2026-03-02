<div class="modal modal-blur fade" id="modal-delete-parent" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-body">
         <div class="modal-title">Are you sure?</div>
         <div>If you proceed, you will lose data of <b>{{$parent->code}}</b> and the data in it</div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
         <a href="{{route('request.delete.parent', enkripRambo($parent->id))}}" class="btn btn-danger" >Yes, delete this data</a>
         {{-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Yes, delete all my data</button> --}}
       </div>
     </div>
   </div>
</div>