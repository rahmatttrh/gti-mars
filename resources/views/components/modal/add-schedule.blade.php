<div class="modal modal-blur fade" id="modal-add-schedule" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Create new schedule</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="{{route('schedule.store')}}" method="POST">
            @csrf
            <div class="modal-body">
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group mb-3 ">
                        <label class="form-label">Vessel</label>
                        <div >
                           <select name="vessel" id="vessel" class="form-select">
                              @foreach ($vessels as $vessel)
                                 <option value="{{$vessel->id}}">{{$vessel->name}}</option>
                              @endforeach
                              
                           </select>
                        </div>
                     </div>
                  </div>
                  {{-- <div class="col-md-6">
                     <div class="form-group mb-3 ">
                        <label class="form-label">Location</label>
                        <div >
                           <select name="port" id="port" class="form-select">
                              @foreach ($ports as $port)
                                 <option value="{{$port->id}}">{{$port->name}}</option>
                              @endforeach
                           </select>
                        </div>
                     </div>
                  </div> --}}
               </div>

               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group mb-3 ">
                        <label class="form-label">Origin</label>
                        <div >
                           <select name="origin" id="origin" class="form-select">
                              @foreach ($ports as $port)
                                 <option value="{{$port->id}}">{{$port->name}}</option>
                              @endforeach
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group mb-3 ">
                        <label class="form-label">Destination</label>
                        <div >
                           <select name="destination" id="destination" class="form-select">
                              @foreach ($ports as $port)
                                 <option value="{{$port->id}}">{{$port->name}}</option>
                              @endforeach
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label class="form-label">Departure</label>
                        <input type="datetime-local" class="form-control" name="departure" id="departure">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label class="form-label">Arrival</label>
                        <input type="datetime-local" class="form-control" name="arrival" id="arrival">
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
               Cancel
               </a>
               <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
               <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
               <!-- Download SVG icon from http://tabler-icons.io/i/device-floppy -->
               <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><circle cx="12" cy="14" r="2" /><polyline points="14 4 14 8 8 8 8 4" /></svg>
               Save
               </button>
            </div>
         </form>
      </div>
   </div>
 </div>