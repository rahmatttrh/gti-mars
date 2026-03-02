<div class="modal modal-blur fade" id="approveRequest_{{$request->id}}" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-body">
         <div class="modal-title">Are you sure?</div>
         <div>If you proceed, this Request ({{$request->activity->name ?? ''}} {{$request->description}}) will add to the Schedule</b>.</div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
         <a href="{{route('request.approve', enkripRambo($request->id))}}" class="btn btn-success" >Yes, Approve data</a>
         {{-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Yes, delete all my data</button> --}}
       </div>
     </div>
   </div>
</div>