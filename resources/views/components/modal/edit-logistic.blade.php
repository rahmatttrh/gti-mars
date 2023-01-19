<div class="modal modal-blur fade" id="modal-edit-logistic-{{$logistic->id}}" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Edit logistic</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="{{route('logistic.update')}}" method="POST">
            @csrf
            @method('PUT')
            <input type="number" name="logistic" id="logistic" value="{{$logistic->id}}" hidden>
            <div class="modal-body">
               <div class="mb-3">
                  <label class="form-label">Name</label>
                  <input type="text" class="form-control" value="{{$logistic->name}}" name="name" id="name" placeholder="Your logistic name">
               </div>
               
               <div class="row">
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label class="form-label">Weight (ton)</label>
                        <input type="number" class="form-control" value="{{$logistic->weight}}" name="weight" id="weight" placeholder="Your logistic type">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label class="form-label">Size (m)</label>
                        <input type="number" class="form-control" value="{{$logistic->size}}" name="size" id="size" placeholder="Your logistic flag">
                     </div>
                  </div>
               </div>
            </div>
            
            <div class="modal-footer">
               <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
               Cancel
               </a>
               <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><circle cx="12" cy="14" r="2" /><polyline points="14 4 14 8 8 8 8 4" /></svg>
                  Update
               </button>
            </div>
         </form>
      </div>
   </div>
 </div>