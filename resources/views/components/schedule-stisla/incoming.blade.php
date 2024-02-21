{{-- <div id="accordion" class="bg-white rounded">
   <div class="accordion">
      <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="true">
         <h4>Incoming Request from User</h4>
      </div>
      <div class="accordion-body collapse" id="panel-body-1" data-parent="#accordion">
         <div class="table-responsive">
            <table class=" table-striped " >
               <thead>
                  <tr>
                     <th>ID</th>
                     <th>Type</th>
                     <th>Route</th>
                     <th>Date</th>
                     <th>Vessel</th>
                     <th>User</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  @if ($recents->count() > 0)
                     @foreach ($recents as $req)
                        <tr>
                           <td>
                              {{$req->code}} 
                           </td>
                           <td>{{$req->activity->name}} {{$req->description}}</td>
                           <td>{{$req->origin->name}} - {{$req->destination->name}}</td>
                           <td>{{formatDate($req->date)}}</td>
                           
                           <td>
                              {{$req->schedule->vessel->name ?? '-'}} 
                           </td>
                           <td>
                              {{$req->employee->name}}
                           </td>
                           <td>
                              <a href="#" class="" data-toggle="modal" data-target="#req-app-{{$req->id}}">Approve</a>
                                 <a href="#" class="" data-toggle="modal" data-target="#req-change-{{$req->id}}">Change</a>
                                 <a href="{{route('request.detail', enkripRambo($req->id))}}" class="">Detail</a>
                           </td>
                        </tr>
                     @endforeach
                  @endif
               </tbody>
            </table>
         </div>
      </div>
   </div>
   
   
</div> --}}

<div class="table-responsive">
   <table class=" table-striped " >
      <thead>
         <tr>
            <th>ID</th>
            <th>Type</th>
            <th>Route</th>
            <th>Date</th>
            <th>Vessel</th>
            <th>User</th>
            <th>Action</th>
         </tr>
      </thead>
      <tbody>
         @if ($recents->count() > 0)
            @foreach ($recents as $req)
               <tr>
                  <td>
                     {{$req->code}} 
                  </td>
                  <td>{{$req->activity->name}} {{$req->description}}</td>
                  <td>{{$req->origin->name}} - {{$req->destination->name}}</td>
                  <td>{{formatDate($req->date)}}</td>
                  
                  <td>
                     {{$req->schedule->vessel->name ?? '-'}} 
                  </td>
                  <td>
                     {{$req->employee->name}}
                  </td>
                  <td>
                     <a href="#" class="" data-toggle="modal" data-target="#req-app-{{$req->id}}">Approve</a>
                        <a href="#" class="" data-toggle="modal" data-target="#req-change-{{$req->id}}">Change</a>
                        <a href="{{route('request.detail', enkripRambo($req->id))}}" class="">Detail</a>
                  </td>
               </tr>
            @endforeach
         @endif
      </tbody>
   </table>
</div>