<div class="modal modal-blur fade" id="schedule-create" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Create Schedule</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="{{route('schedule.store')}}" method="POST">
            @csrf
            <div class="modal-body">
               <div class="form-floating mb-3">
                  <select  required name="vessel" id="vessel" class="form-select">
                     <option  disabled selected>Choose</option>
                     @foreach ($vessels as $vessel)
                        <option {{ old('vessel') == $vessel->id ? 'selected' : ''}} value="{{$vessel->id}}">   {{$vessel->name}} [{{$vessel->type}}]</option>
                     @endforeach
                  </select>   
                  <label for="vessel">Vessel</label>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-floating mb-3">
                        <input type="date" required value="{{old('date')}}" class="form-control" id="date" name="date" >
                        <label for="date">Date</label>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-floating mb-3">
                        <input type="datetime-local" value="{{old('etd')}}" required class="form-control" id="etd" name="etd" >
                        <label for="etd">ETD</label>
                     </div>
                  </div>
               </div>
               <div class="form-floating mb-3">
                  <input type="text" value="{{old('remark')}}"  class="form-control" id="remark" name="remark" >
                  <label for="remark">Remark for Vessel</label>
               </div>
            </div>
            <div class="modal-footer">
               <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
               Cancel
               </a>
               <button type="submit" class="btn btn-primary ms-auto" >
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><circle cx="12" cy="14" r="2" /><polyline points="14 4 14 8 8 8 8 4" /></svg>
                  Create
               </button>
            </div>
         </form>
      </div>
   </div>
 </div>