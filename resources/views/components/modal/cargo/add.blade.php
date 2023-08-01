<div class="modal modal-blur fade" id="addCargoItem-{{$request->id}}" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Add Cargo Item</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="{{route('cargo.item.store')}}" method="POST">
            @csrf
            
            <input type="number" name="req" id="req" value="{{$request->id}}" hidden>
            <div class="modal-body">
               <div class="row">
                  <div class="col-md-4">
                     <div class="form-floating mb-3">
                        <input type="text" required class="form-control" id="no_document" name="no_document" >
                        <label for="no_document">MTD</label>
                     </div>
                  </div>
                  <div class="col-md-8">
                     <div class="form-floating mb-3">
                        <input type="text" required class="form-control" id="contract" name="contract" >
                        <label for="contract">Contract Name</label>
                     </div>
                  </div>
               </div>
              
               <div class="form-floating mb-3">
                  <input type="text" required class="form-control" id="desc" name="desc" >
                  <label for="desc">Description</label>
               </div>
               <div class="row">
                  <div class="col-md-3">
                     <div class="form-floating mb-3">
                        <input type="number" required class="form-control" id="qty" name="qty" >
                        <label for="qty">Qty</label>
                     </div>
                  </div>
                  <div class="col-md-9">
                     {{-- <div class="form-floating mb-3">
                        <input type="text"  class="form-control" id="unit" name="unit">
                        <label for="unit">Unit</label>
                        <small class="text-muted">example : Unit/Pallete/..</small>
                     </div> --}}
                     <div class="form-floating mb-3">
                        <select required name="unit" id="unit" class="form-select">
                           <option value="" selected disabled >Choose</option>
                           <option value="Container">Container</option>
                           <option value="Pallet">Pallet</option>
                           <option value="Box">Box</option>
                           <option value="Rack">Rack</option>
                           <option value="Bundle">Bundle</option>
                           <option value="Lot">Lot</option>
                           <option value="Trafo">Trafo</option>
                        </select>
                        <label for="unit">Destination</label>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-floating">
                        <input type="text"  class="form-control" id="size" name="size" >
                        <label for="size">Size (m<sup>2</sup>)</label>
                        <small class="text-muted mb-3">example : 3 or 3.5</small>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-floating ">
                        <input type="text"  class="form-control" id="weight" name="weight" >
                        <label for="weight">Weight (ton)</label>
                        <small class="text-muted mb-3">example : 1 or 0.4</small>
                     </div>
                  </div>
               </div>
               <div class="form-floating mb-3 mt-3">
                  <input type="text"  class="form-control" id="remark" name="remark" >
                  <label for="remark">Remark</label>
               </div>
               
            </div>
            
            <div class="modal-footer">
               <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
               Cancel
               </a>
               <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><circle cx="12" cy="14" r="2" /><polyline points="14 4 14 8 8 8 8 4" /></svg>
                  Add
               </button>
            </div>
         </form>
      </div>
   </div>
 </div>