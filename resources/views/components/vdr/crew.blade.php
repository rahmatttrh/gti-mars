{{-- <div class="dropdown d-inline mr-2">
   <button class=" dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     Option...
   </button>
   <a href="#" class="mb-2" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Option</a>
   <div class="dropdown-menu">
     <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalAddCrew">Add</a>
     <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalImport">Import Data</a>
     <a class="dropdown-item" href="/template/template-passenger-vdr.xlsx">Download Template Import</a>
   </div>
</div> --}}

<a href="#" class="btn btn-sm btn-light border shadow-none" data-toggle="modal" data-target="#modalAddCrew">Add</a>
<a href="#" data-toggle="modal" data-target="#modalImport" class="btn btn-sm btn-light border shadow-none">Import</a>
<a href="/template/template-passenger-vdr.xlsx" class="btn btn-sm btn-light border shadow-none">Download Template Import</a>
{{-- <hr> --}}
<div class="row mt-2">
   <div class="col">
      <div class="badge badge-info">Crew</div>
      <div class="table-responsive">
         <table class="table table-striped table-sm" id="table-14">
            <thead>
               {{-- <tr>
                   <th colspan="6" class="text-center">CREW</th>
               </tr> --}}
               <tr>
                   <th class="text-center">No</th>
                   {{-- <th>Crew/Passenger</th> --}}
                   <th >Name</th>
                   <th>Ranks</th>
                   {{-- <th>Company</th> --}}
                   <th>Action</th>
               </tr>
           </thead>
           <tbody>
               @php
               $thisC = 1;
               $number = 1;
               @endphp
      
               @foreach ($crews as $key => $crew)
                  @if ($crew->is_crew == '1')
                  <tr>
                     <td class="text-center">{{$number++}}</td>
                     {{-- <td>
                        @if($crew->is_crew == '1')
                        Crew
                        @else
                        Passenger
                        @endif
                     </td> --}}
                     
         
                     <td>{{$crew->name}}</td>
                     <td >{{$crew->rank}}</td>
                     
                     {{-- <td>{{$crew->company}}</td> --}}
                  
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
                  @endif
               @endforeach
           </tbody>
         </table>
      </div>
   </div>
   <div class="col">
      <div class="badge badge-info">Passenger</div>
      <div class="table-responsive">
         <table class="table table-striped table-sm" id="table-15">
            <thead>
               {{-- <tr>
                  <th colspan="6" class="text-center">CREW</th>
               </tr> --}}
               <tr>
                  <th class="text-center">No</th>
                  {{-- <th>Crew/Passenger</th> --}}
                  <th >Name</th>
                  {{-- <th>Ranks</th> --}}
                  <th>Company</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
                  @php
                  $thisC = 1;
                  $no = 1
                  @endphp
         
                  @foreach ($crews as $key => $crew)
                  @if ($crew->is_crew == '1')
                      @else
                      <tr>
                        <td class="text-center">{{$no++}}</td>
                        {{-- <td>
                           @if($crew->is_crew == '1')
                           Crew
                           @else
                           Passenger
                           @endif
                        </td> --}}
                        
            
                        <td>{{$crew->name}}</td>
                        {{-- <td >{{$crew->rank}}</td> --}}
                        
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
                  @endif
                  @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>


