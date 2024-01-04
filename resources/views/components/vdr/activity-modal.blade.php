<div class="modal fade" id="modalAddActivity" tabindex="1" role="dialog"  aria-hidden="true">
   <div class="modal-dialog" role="document">
      <form action="{{route('vdr.store.activity')}}" method="POST">
         @csrf
         <input type="hidden" name="vdr_id" value="{{$vdr->id}}" id="">
         <input type="hidden" name="id" value="{{$vdr->id}}" id="">
         <input type="hidden" name="vessel_id" value="{{$vessel->id}}" id="">
         <input type="hidden" name="created_by" value="{{$user->name}}">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" ">Add Crew </h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="form-group">
                  <label for="name">Name</label>
                  <input class="form-control" id="name" name="name" type="text" >
                  @error('name')
                     <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                  @enderror
               </div>

               <div class="row">
                  <div class="col-md-6">
                     <div class="form mb-3">
                        <input type="radio" id="is_crew" value="1" class="crew" name="is_crew"> Crew
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form mb-3">
                        <input type="radio" id="is_crew" value="0" class="passenger" name="is_crew"> Passenger
                     </div>
                  </div>
               </div>
               <div class="form-row">
                  <div class="form-group col-md-3">
                     <label for="rank">Rank</label>
                     <input class="form-control" id="rank" name="rank" type="number" >
                     @error('rank')
                        <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                     @enderror
                  </div>
                  <div class="form-group col-md-9">
                     <label for="company">Company</label>
                     <input class="form-control" id="company" name="company" type="text" >
                     @error('company')
                        <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                     @enderror
                  </div>
               </div>
               
               
            
            </div>
            <div class="modal-footer bg-whitesmoke">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary">Add</button>
            </div>
         </div>
      </form>
   </div>
</div>

<div class="modal modal-blur fade" id="modalAdd" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
       <div class="modal-content">
           <form action="{{route('vdr.store.activity')}}" method="POST">
               <div class="modal-body">
                   @csrf
                   <input type="hidden" name="vdr_id" value="{{$vdr->id}}" id="">
                   <input type="hidden" name="id" value="{{$vdr->id}}" id="">
                   <input type="hidden" name="vessel_id" value="{{$vessel->id}}" id="">
                   <input type="hidden" name="created_by" value="{{$user->name}}">
                   <div class="card-body">
                       @if ($errors->any())
                       <div class="alert alert-danger text-danger">
                           <ul>
                               @foreach ($errors->all() as $error)
                               <li><small>{{ $error }}</small></li>
                               @endforeach
                           </ul>
                       </div>
                       @endif


                       <div class="form-floating mb-3">
                           <textarea type="text" rows="50" required class="form-control" id="activity" name="activity" value="{{$vdr->activity}}"></textarea>
                           <label for="activity">Activities</label>
                           @error('activity')
                           <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                           @enderror
                       </div>
                       <div class="row">
                           <label for="email">Time</label>
                           <div class="col-md-6">
                               <div class="form-floating mb-3">
                                   <input type="time" required class="form-control jam24" id="start" name="start" value="{{$vdr->crew_start}}">
                                   <label for="start">Start</label>
                                   @error('start')
                                   <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                   @enderror
                               </div>
                           </div>
                           <div class="col-md-6">
                               <div class="form-floating mb-3">
                                   <input type="time" required class="form-control jam24" id="finish" name="finish" value="{{$vdr->crew_finish}}">
                                   <label for="finish">Finish</label>
                                   @error('finish')
                                   <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                   @enderror
                               </div>
                           </div>
                       </div>
                       <div class="row">
                           <div class="col-md-6">
                               <div class="form- mb-3">
                                   <label for="high">High</label>
                                   <input type="text" placeholder="HH.mm" value="0" class="form-control waktu" id="high" name="high">
                                   @error('high')
                                   <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                   @enderror
                               </div>
                           </div>
                           <div class="col-md-6">
                               <div class="form- mb-3">
                                   <label for="normal">Normal</label>
                                   <input type="text" placeholder="HH.mm" value="0" class="form-control waktu" id="normal" name="normal">
                                   @error('normal')
                                   <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                   @enderror
                               </div>
                           </div>
                       </div>
                       <div class="row">
                           <div class="col-md-6">
                               <div class="form mb-3">
                                   <label for="slow">Slow</label>
                                   <input type="text" placeholder="HH.mm" value="0" class="form-control waktu" id="slow" name="slow">
                                   @error('slow')
                                   <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                   @enderror
                               </div>
                           </div>
                           <div class="col-md-6">
                               <div class="form mb-3">
                                   <label for="manu">Manu</label>
                                   <input type="text" placeholder="HH.mm" value="0" class="form-control waktu" id="manu" name="manu">
                                   @error('manu')
                                   <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                   @enderror
                               </div>
                           </div>
                       </div>
                       <div class="row">
                           <div class="col-md-6">
                               <div class="form mb-3">
                                   <label for="idle">Idle</label>
                                   <input type="text" placeholder="HH.mm" value="0" class="form-control waktu" id="idle" name="idle">
                                   @error('idle')
                                   <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                   @enderror
                               </div>
                           </div>
                           <div class="col-md-6">
                               <div class="form mb-3">
                                   <label for="tow">Tow</label>
                                   <input type="text" placeholder="HH.mm" value="0" class="form-control waktu" id="tow" name="tow">
                                   @error('tow')
                                   <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                   @enderror
                               </div>
                           </div>
                       </div>
                       <div class="row">
                           <div class="col-md-6">
                               <div class="form mb-3">
                                   <label for="ah">A/H</label>
                                   <input type="text" placeholder="HH.mm" value="0" class="form-control waktu" id="ah" name="ah">
                                   @error('ah')
                                   <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                   @enderror
                               </div>
                           </div>
                           <div class="col-md-6">
                               <div class="form mb-3">
                                   <label for="sb">S/B</label>
                                   <input type="text" placeholder="HH.mm" value="0" class="form-control waktu" id="sb" name="sb">
                                   @error('sb')
                                   <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                   @enderror
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
                   <button type="submit" class="btn btn-success">Update</button>
               </div>
           </form>
       </div>
   </div>
</div>