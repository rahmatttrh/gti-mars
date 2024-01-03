<div class="modal fade" id="modalAddCrew" tabindex="1" role="dialog"  aria-hidden="true">
   <div class="modal-dialog" role="document">
      <form action="{{route('vdr.store.crew')}}" method="POST">
         @csrf
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

@foreach ($crews as $crew)
   <div class="modal fade" id="deleteAct-{{$crew->id}}" tabindex="1" role="dialog"  aria-hidden="true">
      <div class="modal-dialog" role="document">
         <form action="{{route('vdr.delete.crew')}}" method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" name="id" value="{{$crew->id}}" id="">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Delete Crew </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <span>Anda yakin ingin menghapus crew <span class="text-danger">{{$crew->name}} </span> ?</span>
               </div>
               <div class="modal-footer bg-whitesmoke">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Delete</button>
               </div>
            </div>
         </form>
      </div>
   </div>

   <div class="modal fade" id="editCrew-{{$crew->id}}" tabindex="1" role="dialog"  aria-hidden="true">
      <div class="modal-dialog" role="document">
         <form action="{{route('vdr.update.crew')}}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$crew->id}}" id="">
            <input type="hidden" name="vdr_id" value="{{$vdr->id}}" id="">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Delete Crew </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <div class="form-group">
                     <label for="name">Name</label>
                     <input class="form-control" id="name" name="name" type="text" value="{{$crew->name}}" >
                     @error('name')
                        <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                     @enderror
                  </div>

                  <div class="row">
                     <div class="col-md-6">
                        <div class="form mb-3">
                           <input type="radio" id="is_crew" {{$crew->is_crew == 1 ? 'checked' : ''}} value="1" class="crew" name="is_crew"> Crew
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form mb-3">
                           <input type="radio" id="is_crew" {{$crew->is_crew == 0 ? 'checked' : ''}} class="passenger" name="is_crew"> Passenger
                        </div>
                     </div>
                  </div>
                  <div class="form-row">
                     <div class="form-group col-md-3">
                        <label for="rank">Rank</label>
                        <input class="form-control" id="rank" name="rank" type="number" value="{{$crew->rank}}">
                        @error('rank')
                           <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                        @enderror
                     </div>
                     <div class="form-group col-md-9">
                        <label for="company">Company</label>
                        <input class="form-control" id="company" name="company" type="text" value="{{$crew->company}}">
                        @error('company')
                           <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                        @enderror
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
@endforeach