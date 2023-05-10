<div class="modal modal-blur fade" id="modalEditEmployee_{{$employee->id}}" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Edit Employee</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="{{route('employee.update')}}" method="POST">
            @csrf
            @method('PUT')
            <input type="number" name="employee" id="employee" value="{{$employee->id}}" hidden>
            <div class="modal-body">
               <div class="row">
                  <div class="col">
                     <div class="form-floating mb-3">
                        <select required name="department" id="department" class="form-select">
                           <option  disabled selected>Choose</option>
                           @foreach ($departments as $department)
                              <option  {{$employee->department_id == $department->id ? 'selected' : '' }} value="{{$department->id}}">{{$department->name}}</option>
                           @endforeach
                        </select>
                        <label for="department">Department</label>
                     </div>
                  </div>
                  <div class="col">
                     <div class="form-floating mb-3">
                        <select required name="port" id="port" class="form-select">
                           <option  disabled selected>Choose</option>
                           @foreach ($ports as $port)
                              <option {{$employee->port_id == $port->id ? 'selected' : '' }} value="{{$port->id}}">{{$port->name}}</option>
                           @endforeach
                        </select>
                        <label for="port">Location</label>
                     </div>
                  </div>
               </div>
               <div class="form-floating mb-3">
                  <input type="text" required class="form-control" id="name" name="name" value="{{$employee->name}}" >
                  <label for="name">Name</label>
               </div>
               <div class="form-floating mb-3">
                  <input type="email" required class="form-control" id="email" disabled name="email" value="{{$employee->email}}" >
                  <label for="email">Email</label>
                  <small>#Need administrator permission</small>
               </div>
               <div class="form-floating mb-3">
                  <input type="string" required class="form-control" id="ekstensi" name="ekstensi" value="{{$employee->ekstensi}}">
                  <label for="ekstensi">Ekstensi</label>
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