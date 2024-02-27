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
   <table class="  " >
      <thead>
         <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Type</th>
            <th>Route</th>
            {{-- <th>Date</th> --}}
            <th>Vessel</th>
            {{-- <th>User</th> --}}
            <th class="text-center">Action</th>
         </tr>
      </thead>
      <tbody>
         @if ($recents->count() > 0)
            @foreach ($recents as $req)
               @if ($req->schedule_id == $schedule->id)
               <tr>
                  <td>
                     <a href="{{route('request.detail', enkripRambo($req->id))}}">{{$req->code}}</a>
                     
                  </td>
                  <td>{{formatDate($req->date)}} </td>
                  <td><span >{{$req->activity->name}} [{{$req->desc}}]</span></td>
                  <td>{{$req->origin->name}} - {{$req->destination->name}}</td>
                  
                  
                  <td>
                     @if ($req->schedule_id != null)
                         <a href={{route('schedule.detail', enkripRambo($req->schedule_id))}}"">{{$req->schedule->vessel->name ?? 'Vessel Empty'}} </a>
                         @else
                         -
                     @endif
                  </td>
                 
                  <td>

                     <a href="#" class="" data-toggle="modal" data-target="#req-app-{{$req->id}}">Approve</a> |
                     <a href="#" class="" data-toggle="modal" data-target="#req-change-{{$req->id}}">Change Vessel</a> 
                     {{-- <a href="{{route('request.detail', enkripRambo($req->id))}}" >Detail</a> --}}
                     {{-- <div class="btn-group btn-sm">
                        <a href="#" class="" data-toggle="modal" data-target="#req-app-{{$req->id}}">Approve</a>
                        <a href="#" class="" data-toggle="modal" data-target="#req-change-{{$req->id}}">Change Vessel</a>
                        <a href="{{route('request.detail', enkripRambo($req->id))}}" class="btn btn-sm btn-light border">Detail</a>
                     </div> --}}
                        
                  </td>
               </tr>
               <tr>
                  <td></td>
                  <td colspan="3">
                     @foreach ($req->cargoItems as $item)
                        {{$item->desc}} ,
                     @endforeach
                  </td>
                  <td>{{$req->total_weight}} ton</td>
               </tr>
               @endif
               
            @endforeach
         @endif
      </tbody>
   </table>
</div>