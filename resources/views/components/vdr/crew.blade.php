<div class="card">
   <div class="card-header d-flex justify-content-between">
      CREW & PASSENGER LIST
      <div class="dropdown d-inline mr-2">
         <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Option
         </button>
         <div class="dropdown-menu">
           <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalAddCrew">Add</a>
           <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalImport">Import Data</a>
           <a class="dropdown-item" href="/template/template-passenger-vdr.xlsx">Download Template Import</a>
         </div>
       </div>
      
   </div>
   <div class="card-body py-0">
      <div class="table-responsive">
         <table class="table table-striped table-sm" id="table-1">
            <thead>
               {{-- <tr>
                   <th colspan="6" class="text-center">CREW</th>
               </tr> --}}
               <tr>
                   <th>No</th>
                   <th></th>
                   <th >Name</th>
                   <th class="text-center">Ranks</th>
                   <th>Company</th>
                   <th>Action</th>
               </tr>
           </thead>
           <tbody>
               @php
               $thisC = 1;
               @endphp

               @foreach ($crews as $key => $crew)
               <tr>
                  <td>{{$key+1}}</td>
                  <td>
                     @if($crew->is_crew == '1')
                     C
                     @else
                     P
                     @endif
                  </td>
                  

                  <td>{{$crew->name}}</td>
                  <td class="text-center">{{$crew->rank}}</td>
                  
                  <td>{{$crew->company}}</td>
               
                  <td>
                      <a href="#" data-toggle="modal" data-target="#editCrew-{{$crew->id}}" onclick="visibilityBox('{{$crew->is_crew}}' )"> Edit</a>
                      <a href="#" class="text-danger" data-toggle="modal" data-target="#deleteAct-{{$crew->id}}"> Delete </a>
                  </td>
              </tr>
               {{-- @if($thisC != $crew->is_crew)
               <thead>
                   <tr>
                       <th colspan="4" class="text-center">PASSENGER</th>
                   </tr>
                   <tr>
                       <th>No</th>
                       <th class="col-md-">Name</th>
                       <th class="text-center">Company</th>
                       <th>Action</th>
                   </tr>
               </thead>
               @endif


               <tr>
                   <td>{{$key+1}}</td>
                   <td>{{$crew->name}}</td>
                   @if($crew->is_crew == '1')
                   <td class="text-center">{{$crew->rank}}</td>
                   @else
                   <td>{{$crew->company}}</td>
                   @endif
                   <td>
                       <a href="#" data-toggle="modal" data-target="#editCrew-{{$crew->id}}" onclick="visibilityBox('{{$crew->is_crew}}' )"> Edit</a>
                       <a href="#" class="text-danger" data-toggle="modal" data-target="#deleteAct-{{$crew->id}}"> Delete </a>
                   </td>
               </tr>

               @php
               $thisC = $crew->is_crew;
               @endphp --}}


               @endforeach
           </tbody>
         </table>
      </div>
   </div>
   
</div>

