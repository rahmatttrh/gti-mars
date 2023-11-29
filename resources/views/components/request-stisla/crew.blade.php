<div class="row">
   @if ($request->status == 0)
   <div class="col-md-3">
      <div class="card">
         <div class="card-header">
            Form Add
         </div>
         <div class="card-body">
            <form action="{{route('passenger.item.store')}}" method="POST">
               @csrf
               
               <input type="number" name="request_id" id="request_id" value="{{$request->id}}" hidden>
                  <div class="form-floating mb-3">
                     <select name="type" id="type" required class="form-select">
                        <option value="" selected disabled >Choose Type</option>
                        <option {{ old('type') == $request->type ? 'Depart' : ''}} value="Depart">Depart</option>
                        <option {{ old('type') == $request->type ? 'Return' : ''}} value="Return">Return</option>
                     </select>
                     <label for="type">Type</label>
                  </div>
                  <div class="mb-3">
                     <div class="form-label text-muted"><small>Select Crew</small></div>
                     <select  name="crew" id="crew" required class="form-select select2 p-3">
                        <option  disabled selected>Choose</option>
                        @foreach ($crews as $crew)
                           <option  {{old('crew') == $crew->id ? 'selected' : ''}} value="{{$crew->id}}">{{$crew->name}}</option>
                        @endforeach
                     </select>
                  </div>
                  
                  
                  {{-- <div class="form-group mb-3">
                     <select required name="crew" id="crew" class="form-select select2">
                        <option  disabled selected>Choose</option>
                        @foreach ($crews as $crew)
                           <option  {{old('crew') == $crew->id ? 'selected' : ''}} value="{{$crew->id}}">{{$crew->name}}</option>
                        @endforeach
                     </select>
                     <label for="crew">Crew</label>
                  </div> --}}
                  
                  
                  <div class="form-floating mb-3 ">
                     <input type="text"  class="form-control" id="desc" name="desc" >
                     <label for="desc">Description</label>
                  </div>
                  {{-- <a href="#" class="" data-bs-toggle="modal" data-bs-target="#modalAddCrew_{{$request->id}}">
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-rounded-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M9 12h6"></path>
                        <path d="M12 9v6"></path>
                        <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z"></path>
                     </svg>
                     Add new ...
                  </a>
                  <br> --}}
              
                  <button type="submit" class="btn btn-primary ms-auto" >
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><circle cx="12" cy="14" r="2" /><polyline points="14 4 14 8 8 8 8 4" /></svg>
                     Add
                  </button>
            </form>
         </div>
         <div class="card-footer">
            
               or <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddCrew_{{$request->id}}">Click here</a> to add new crew that is not in the selection list
            
         </div>
      </div>
   </div>
   @endif
   
   @if ($request->status == 0)
   <div class="col-md-9">
       @else
       <div class="col-md-12">
   @endif
   
      <div class="card">
         <div class="card-header">
           <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs">
             <li class="nav-item">
               <a href="#tabs-home-ex1" class="nav-link active" data-bs-toggle="tab">Depart</a>
             </li>
             <li class="nav-item">
               <a href="#tabs-profile-ex1" class="nav-link" data-bs-toggle="tab">Return</a>
             </li>
           </ul>
         </div>
         <div class="card-body">
            <div class="tab-content">
               <div class="tab-pane active show" id="tabs-home-ex1">
                  {{-- <h4>Home tab</h4> --}}
                  <div class="card card-lg">
                     <div class="table-responsive">
                        <table class="table table-vcenter card-table">
                           <thead>
                              <tr>
                                 <th>{{$request->code}}</th>
                              </tr>
                           </thead>
                           <thead>
                              <tr>
                                 <th>Name</th>
                                 <th>Barcode</th>
                                 <th>Department</th>
                                 <th>Company</th>
                                 <th>Desc</th>
                                 <th></th>
                              </tr>
                           </thead>
                           <tbody>
                              @if ($departs->count() > 0)
                                 @foreach ($departs as $item)
                                    <tr>
                                       
                                       <td class="text-muted">{{$item->crew->name}}</td>
                                       <td class="text-muted">{{$item->crew->barcode}}</td>
                                       <td class="text-muted">{{$item->crew->department}}</td>
                                       <td class="text-muted">{{$item->crew->company}}</td>
                                       <td class="text-muted">{{$item->desc}}</td>
                                       <td class="text-end">
                                          @if ($request->status == 0)
                                          <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deletePassengerItem_{{$item->id}}">Delete</a>
                                          @endif
                                       </td>
                                    </tr>
                                    <x-modal.passenger.delete :item="$item" />
                                 @endforeach
                  
                                 @else
                                 <tr>
                                    <td colspan="9" style="text-align: center"><small>Empty</small></td>
                                 </tr>
                              @endif
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
               <div class="tab-pane" id="tabs-profile-ex1">
                  {{-- <h4>Profile tab</h4> --}}
                  <div class="card card-lg">
                     <div class="table-responsive">
                        <table class="table table-vcenter card-table">
                           <thead>
                              <tr>
                                 <th>Name</th>
                                 <th>Barcode</th>
                                 <th>Department</th>
                                 <th>Company</th>
                                 <th>Desc</th>
                                 <th></th>
                              </tr>
                           </thead>
                           <tbody>
                              @if ($returns->count() > 0)
                                 @foreach ($returns as $item)
                                    <tr>
                                       
                                       <td class="text-muted">{{$item->crew->name}}</td>
                                       <td class="text-muted">{{$item->crew->barcode}}</td>
                                       <td class="text-muted">{{$item->crew->department}}</td>
                                       <td class="text-muted">{{$item->crew->company}}</td>
                                       <td class="text-muted">{{$item->desc}}</td>
                                       <td class="text-end">
                                          @if ($request->status == 0)
                                          <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deletePassengerItem_{{$item->id}}">Delete</a>
                                          @endif
                                       </td>
                                    </tr>
                                    <x-modal.passenger.delete :item="$item" />
                                 @endforeach
                  
                                 @else
                                 <tr>
                                    <td colspan="9" style="text-align: center"><small>Empty</small></td>
                                 </tr>
                              @endif
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="card-footer"></div>
      </div>
   </div>
</div>



