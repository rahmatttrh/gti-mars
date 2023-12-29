<div id="accordion" class="bg-white rounded">
   <div class="accordion">
     {{-- <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="true">
       <h4>Incoming Request from User</h4>
     </div> --}}
     <div class="accordion-body collapse" id="panel-body-1" data-parent="#accordion">
      <div class="table-responsive p-0">
         <table class="table table-striped table-sm" >
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Route</th>
                  <th>User</th>
                  <th>Vessel</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               @if ($recents->count() > 0)
                  @foreach ($recents as $req)
                     <tr>
                        <td>
                           {{$req->code}} <br>
                           <small>{{$req->activity->name}} {{$req->description}}</small>
                        </td>
                        <td>{{$req->origin->name}} - {{$req->destination->name}}</td>
                        <td>{{$req->employee->name}}</td>
                        <td>
                           {{$req->schedule->vessel->name ?? '-'}} <br>
                           <small>{{$req->schedule->code}}</small>
                        </td>
                        <td>
                           <div class="btn-group btn-sm">
                              <a href="#" class="btn btn-sm btn-light" data-toggle="modal" data-target="#req-app-{{$req->id}}">Approve</a>
                              <a href="#" class="btn btn-sm btn-light" data-toggle="modal" data-target="#req-change-{{$req->id}}">Change</a>
                              <a href="{{route('request.detail', enkripRambo($req->id))}}" class="btn btn-sm btn-primary">Detail</a>
                           </div>
                        </td>
                     </tr>
                  @endforeach
               @endif
            </tbody>
         </table>
      </div>
     </div>
   </div>
   
   
</div>