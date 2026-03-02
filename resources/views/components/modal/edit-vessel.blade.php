<div class="modal modal-blur fade" id="modal-edit-vessel" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Edit vessel</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="{{route('vessel.update')}}" method="POST">
            @csrf
            @method('PUT')
            <input type="number" name="vessel" id="vessel" value="{{$vessel->id}}" hidden>
            <div class="modal-body">
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-floating mb-3">
                        <input type="text" class="form-control" value="{{$vessel->name}}" name="name" id="name" placeholder="Your vessel name">
                        <label for="name">Name</label>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-floating mb-3">
                        <input type="datetime-local" class="form-control" required id="arrival" name="arrival" >
                        <label for="arrival">Arrival</label>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-floating mb-3">
                        <input type="text" class="form-control" value="{{$vessel->imo}}" name="imo" id="imo" placeholder="Your IMO number">
                        <label for="imo">IMO Number</label>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-floating mb-3">
                        <input type="text" class="form-control" value="{{$vessel->type}}" name="type" id="type" placeholder="Your vessel type">  
                        <label for="type">Type</label>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-floating mb-3">
                        <input type="text" class="form-control" value="{{$vessel->flag}}" name="flag" id="flag" placeholder="Your vessel flag">
                        <label for="flag">Flag</label>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-floating mb-3">
                        <input type="text" class="form-control" value="{{$vessel->owner}}" name="owner" id="owner" placeholder="Your vessel owner">
                        <label for="flag">Owner</label>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-floating mb-3">
                        <input type="text" class="form-control" value="{{$vessel->operator}}" name="operator" id="operator" placeholder="Your vessel operator">
                        <label for="operator">Operator</label>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-floating mb-3">
                        <input type="text" class="form-control" value="{{$vessel->deck_cargo_capacity}}" name="deck_cargo_capacity" id="deck_cargo_capacity" placeholder="Your vessel limit cargo">
                        <label for="deck_cargo_capacity">Deck Cargo Capacity</label>
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