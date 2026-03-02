<div class="modal fade" id="modalAddCrew" tabindex="1" role="dialog"  aria-hidden="true">
   <div class="modal-dialog" role="document">
      <form action="{{route('vdr.store.crew')}}" method="POST">
         @csrf
         <input type="hidden" name="id" value="{{$vdr->id}}" id="">
         <input type="hidden" name="vessel_id" value="{{$vessel->id}}" id="">
         <input type="hidden" name="created_by" value="{{$user->name}}">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Add Crew </h5>
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
                  <div class="form-group col-md-12">
                     <label for="rank">Rank</label>
                     <input class="form-control" id="rank" name="rank" type="text" >
                     @error('rank')
                        <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                     @enderror
                  </div>
                  <div class="form-group col-md-12">
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


<div class="modal fade" id="modalReleaseVdr" tabindex="1" role="dialog"  aria-hidden="true">
   <div class="modal-dialog" role="document">
      
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Release VDR ?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            {{$vdr->code}} <br>
            <span>Tanggal {{formatDate($vdr->date)}} </span>
            <hr>
            <span>Pastikan semua data sudah terisi dengan benar. Data akan terkirim ke Marine Department PHE OSES untuk dilakukan validasi.</span>
         </div>
         <div class="modal-footer bg-whitesmoke">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <a href="{{route('vdr.release', enkripRambo($vdr->id))}}" type="submit" class="btn btn-info">Release</a>
            {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}
         </div>
      </div>
      
   </div>
</div>

<div class="modal fade" id="modalDeleteVdr" tabindex="1" role="dialog"  aria-hidden="true">
   <div class="modal-dialog" role="document">
      <form action="{{route('vdr.delete')}}" method="POST">
         @csrf
         <input type="hidden" name="id" value="{{$vdr->id}}" id="">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Delete VDR {{formatDate($vdr->date)}} ?</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <hr>
               <span>Data akan dihapus secara permanen dari sistem.</span>
            </div>
            <div class="modal-footer bg-whitesmoke">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-danger">Delete</button>
            </div>
         </div>
      </form>
   </div>
</div>


<div class="modal fade" id="modalImport" tabindex="1" role="dialog"  aria-hidden="true">
   <div class="modal-dialog" role="document">
      <form action="{{route('vdr.import.crew')}}" method="POST" enctype="multipart/form-data">
         @csrf
         <input type="hidden" name="vdr_id" value="{{$vdr->id}}" >
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Import Crew </h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="form-group">
                  <label for="file_upload">File</label>
                  <input class="form-control" accept=".xls, .xlsx"  id="file_upload" name="file_upload" type="file" >
                  @error('file_upload')
                     <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                  @enderror
               </div>
            </div>
            <div class="modal-footer bg-whitesmoke">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary">Import</button>
            </div>
         </div>
      </form>
   </div>
</div>

<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog"  aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
   <div class="modal-dialog modal-lg" role="document">
      <form action="{{route('vdr.update')}}" method="POST" enctype="multipart/form-data">
         @csrf
         @method('PUT')
         <input type="hidden" name="id" value="{{$vdr->id}}" id="">
         <input type="hidden" name="vessel_id" value="{{$vessel->id}}" id="">
         <input type="hidden" name="created_by" value="{{$user->name}}">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Form Edit VDR</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <!-- <div class="modal-body">
               <div class="form-group">
                  <label for="vessel">Vessel Name</label>
                  <input class="form-control" id="vessel" name="vessel" type="text" value="{{$user->name}}" readonly>
                  @error('vessel')
                     <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                  @enderror
               </div>
               
               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label for="date">Date</label>
                     <input class="form-control" id="date" name="date" required type="date" value="{{$vdr->date }}" readonly>
                     @error('date')
                        <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                     @enderror
                  </div>
                  <div class="form-group col-md-6">
                     <label for="location_midnight">Location</label>
                     <input class="form-control" id="location_midnight" name="location_midnight" required type="text"  value="{{$vdr->location_midnight}}" >
                     @error('location_midnight')
                        <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                     @enderror
                  </div>
               </div>
               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label for="onduty">Number of Crew</label>
                     <input class="form-control" id="onduty" name="onduty" type="number" value="{{$vdr->crew_onduty}}">
                     @error('onduty')
                        <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                     @enderror
                  </div>
                  <div class="form-group col-md-6">
                     <label for="max">Max</label>
                     <input class="form-control" id="max" name="max" type="text" value="{{$vdr->crew_max}}" >
                     @error('max')
                        <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                     @enderror
                  </div>
               </div>
            </div> -->
            <div class="modal-body">
               <div class="row">
                  <div class="col-md-8">
                     <div class="form-group">
                        <label for="vessel">Vessel Name</label>
                        <input class="form-control" id="vessel" name="vessel" type="text" value="{{$user->name}}" readonly>
                        @error('vessel')
                           <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                        @enderror
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="form-group">
                        <label for="date">Date</label>
                        <input class="form-control" id="date" name="date" required type="date" value="{{$vdr->date }}" >
                        @error('date')
                           <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                        @enderror
                     </div>
                  </div>
               </div>

               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="contract">Contract No.</label>
                        <input class="form-control" id="contract" name="contract" type="text" value="{{$vdr->contract}}">
                        @error('contract')
                           <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                        @enderror
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="form-group">
                        <label for="contract_start">Contract Start</label>
                        <input class="form-control" id="contract_start" name="contract_start" required type="date" value="{{$vdr->contract_start }}" >
                        @error('contract_start')
                           <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                        @enderror
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="form-group">
                        <label for="contract_end">Contract End</label>
                        <input class="form-control" id="contract_end" name="contract_end" required type="date" value="{{$vdr->contract_end }}" >
                        @error('contract_end')
                           <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                        @enderror
                     </div>
                  </div>
               </div>

               <div class="form-group">
                  <label for="owner">Owner</label>
                  <input class="form-control" id="owner" name="owner" type="text" value="{{$vdr->owner}}">
                  @error('owner')
                     <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                  @enderror
               </div>

               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="location_midnight">Location</label>
                        <input class="form-control" id="location_midnight" name="location_midnight" required type="text"  value="{{$vdr->location_midnight}}" >
                        @error('location_midnight')
                           <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                        @enderror
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="form-group">
                        <label for="max">Pax</label>
                        <input class="form-control" id="max" name="max" type="text" value="{{$vdr->crew_max}}" >
                        @error('max')
                           <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                        @enderror
                     </div>
                  </div>
                  <div class="col-md-3">
                     <div class="form-group">
                        <label for="onduty">Crew</label>
                        <input class="form-control" id="onduty" name="onduty" type="number" value="{{$vdr->crew_onduty}}">
                        @error('onduty')
                           <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                        @enderror
                     </div>
                  </div>
                  
               </div>
               <hr>

               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="master">Master</label>
                        <input class="form-control" id="master" name="master" type="text" value="{{$vdr->master}}" >
                        @error('master')
                           <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                        @enderror
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="ce">Chief Engineer</label>
                        <input class="form-control" id="ce" name="ce" type="text" value="{{$vdr->ce}}" >
                        @error('ce')
                           <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                        @enderror
                     </div>
                  </div>
               </div>
               
               
            </div>
            <div class="modal-footer bg-whitesmoke">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary">Update</button>
            </div>
         </div>
      </form>
   </div>
</div>



{{-- <div class="modal modal-blur fade" id="modalEdit2" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
       <div class="modal-content">
           <form action="{{route('vdr.update')}}" method="POST">
               <div class="modal-body">
                   @csrf
                   @method('PUT')
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
                           <input type="text" required class="form-control" id="vessel" name="vessel" value="{{$user->name}}" readonly>
                           <label for="vessel">Vessel</label>
                           @error('vessel')
                           <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                           @enderror
                       </div>
                       <div class="form-floating mb-3">
                           <input type="date" required class="form-control" id="date" name="date" value="{{$vdr->date }}" readonly>
                           <label for="date">Date</label>
                           @error('date')
                           <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                           @enderror
                       </div>
                       <div class="row">
                           <label for="email">Number of Crew / Pax</label>
                           <div class="col-md-6">
                               <div class="form-floating mb-3">
                                   <input type="number" required class="form-control" id="onduty" name="onduty" value="{{$vdr->crew_onduty}}" value="1">
                                   <label for="onduty">On Duty</label>
                                   @error('onduty')
                                   <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                                   @enderror
                               </div>
                           </div>
                           <div class="col-md-6">
                               <div class="form-floating mb-3">
                                   <input type="number" required class="form-control" id="max" name="max" value="{{$vdr->crew_max}}">
                                   <label for="max">Max</label>
                               </div>
                           </div>
                       </div>
                       <div class="form-floating mb-3">
                           <input type="text" required class="form-control" id="location_midnight" name="location_midnight" value="{{$vdr->location_midnight}}">
                           <label for="location_midnight">Location (Midnight)</label>
                           @error('location_midnight')
                           <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                           @enderror
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
</div> --}}



