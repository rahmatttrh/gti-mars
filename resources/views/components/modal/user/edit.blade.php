<div class="modal modal-blur fade" id="editUser_{{$user->id}}" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Edit User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="{{route('user.update')}}" method="POST">
            @method('PUT')
            @csrf
            <input type="number" name="user" id="user" value="{{$user->id}}" hidden>
            <div class="modal-body">
               <div class="form-floating mb-3">
                  <input type="email" required class="form-control" id="email" name="email" value="{{$user->email}}">
                  <label for="email">Email</label>
               </div>
               <div class="form-floating mb-3">
                  <input type="password" class="form-control" id="password" name="password" >
                  <label for="password">New Password</label>
               </div>
            </div>
            <div class="modal-footer">
               <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
               Cancel
               </a>
               <button type="submit" class="btn btn-primary ms-auto">Update</button>

            </div>
         </form>
      </div>
   </div>
 </div>

