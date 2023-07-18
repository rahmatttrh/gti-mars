<div class="modal modal-blur fade" id="modalEditPort_{{$port->id}}" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Create new port</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="{{route('port.update')}}" method="POST">
            @csrf
            @method('PUT')
            <input type="number" name="port" id="port" value="{{$port->id}}" hidden>
            <div class="modal-body">
               <div class="form-floating mb-3">
                  <input type="text" value="{{$port->name}}" required class="form-control" id="name" name="name" >
                  <label for="name">Name</label>
               </div>
               <div class="row">
                  <div class="col">
                     <div class="form-floating mb-3">
                        <input type="text" value="{{$port->email}}" required class="form-control" id="email" name="email" >
                        <label for="email">Email</label>
                     </div>
                  </div>
                  <div class="col">
                     <div class="form-floating mb-3">
                        <input type="text" value="{{$port->type}}" required class="form-control" id="type" name="type" >
                        <label for="type">Type</label>
                     </div>
                  </div>
               </div>
               
               {{-- <div class="row">
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label class="form-label">Latitude</label>
                        <input type="text" class="form-control" value="{{$port->latitude}}" name="latitude" id="latitude" placeholder="Your vessel type">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label class="form-label">Longitude</label>
                        <input type="text" class="form-control" value="{{$port->longitude}}" name="longitude" id="longitude" placeholder="Your vessel flag">
                     </div>
                  </div>
               </div> --}}
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