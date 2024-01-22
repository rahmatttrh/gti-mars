<div class="modal modal-blur fade" id="modal-add-doc" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog  modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Add Alert</h5>
         </div>
         <form action="{{route('document.add')}}" method="POST">
            @csrf
            <input type="number" name="vessel" id="vessel" value="{{$vessel->id}}" hidden>
            <div class="modal-body">
               <div class="form-row">
                  <div class="form-group col-md-8">
                     <label for="name">Document*</label>
                     <input class="form-control" {{old('name')}} id="name"  type="text" required name="name">
                  </div>
                  <div class="form-group col-md-4">
                     <label for="date">Date*</label>
                     <input class="form-control" {{old('date')}} id="date"  type="date" required name="date">
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-link link-secondary me-auto" data-dismiss="modal">Cancel</button>
               {{-- <a href="" class="btn btn-primary" >Add</a> --}}
               <button class="btn btn-primary" type="submit">Add</button>
               {{-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Yes, delete all my data</button> --}}
            </div>
         </form>
      </div>
   </div>
</div>