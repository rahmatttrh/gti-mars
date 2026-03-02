{{-- <div class="card shadow-sm border">
                  
   <div class="card-body"> --}}
      <ul class="nav nav-tabs" id="myTab" role="tablist">
         
         <li class="nav-item">
            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Depart </a>
         </li>
         <li class="nav-item">
            <a class="nav-link " id="return-tab" data-toggle="tab" href="#return" role="tab" aria-controls="return" aria-selected="false">Return </a>
         </li>
         @if (auth()->user()->hasRole('marine') && $schedule->status != 11)
            @if ($recents->where('schedule_id', $schedule->id)->count() > 0)
            <li class="nav-item">
               <a class="nav-link" id="incoming-tab" data-toggle="tab" href="#incoming" role="tab" aria-controls="incoming" aria-selected="false">Incoming Request <span class="bg-danger px-2 text-white rounded">!</span></a>
            </li>
            @else
            <li class="nav-item">
               <a class="nav-link" id="incoming-tab" data-toggle="tab" href="#incoming" role="tab" aria-controls="incoming" aria-selected="false">Incoming Request </a>
            </li>
            @endif
            
         @endif
      </ul>
      <div class="tab-content" id="myTabContent">
         
         <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="table-responsive ">
               <table class="" id="table-1">
               <thead>
                  
                  <tr>
                     
                     <th>Route</th>
                     <th>Name</th>
                     <th>Barcode</th>
                     <th>Department</th>
                     <th>Company</th>
                     <th>Desc</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($schedule->requests->where('status', '>=', 2)->where('activity_id', 7) as $requests)
                     {{-- <tr>
                     <td colspan="7">{{$requests->origin->name}} - {{$requests->destination->name}}</td>
                     </tr> --}}
                     @foreach ($requests->passengerItems->where('type', 'Departure') as $passenger)
                     <tr>
                        {{-- <td>{{$passenger->type}}</td> --}}
                        <td class="text-truncate">{{$passenger->request->origin->code}} - {{$passenger->request->destination->code}}</td>
                        <td class="text-truncate">{{$passenger->name}}</td>
                        <td class="text-truncate">{{$passenger->barcode}}</td>
                        <td class="text-truncate">{{$passenger->department}}</td>
                        <td class="text-truncate">{{$passenger->company}}</td>
                        <td class="text-truncate">{{$passenger->desc}}</td>
                        
                     </tr>
                  @endforeach
                  @endforeach
                  
               </tbody>
               </table>
            </div>
         </div>
         <div class="tab-pane fade" id="return" role="tabpanel" aria-labelledby="return-tab">
            <div class="table-responsive ">
               <table class="" id="table-4">
               <thead>
                  
                  <tr>
                     <th>Route</th>
                     <th>Name</th>
                     <th>Barcode</th>
                     <th>Department</th>
                     <th>Company</th>
                     <th>Desc</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($schedule->requests->where('status','>=', 2)->where('activity_id', 7) as $requests)
                     {{-- <tr>
                     <td colspan="7">{{$requests->origin->name}} - {{$requests->destination->name}}</td>
                     </tr> --}}
                     @foreach ($requests->passengerItems->where('type', 'Return') as $passenger)
                     <tr>
                        {{-- <td>{{$passenger->type}}</td> --}}
                        <td class="text-truncate">{{$passenger->request->destination->code}} - {{$passenger->request->origin->code}}</td>
                        <td class="text-truncate">{{$passenger->name}}</td>
                        <td class="text-truncate">{{$passenger->barcode}}</td>
                        <td class="text-truncate">{{$passenger->department}}</td>
                        <td class="text-truncate">{{$passenger->company}}</td>
                        <td class="text-truncate">{{$passenger->desc}}</td>
                        
                     </tr>
                  @endforeach
                  @endforeach
                  
               </tbody>
               </table>
            </div>
         </div>
         @if (auth()->user()->hasRole('marine') && $schedule->status != 11)
            @if ($recents->count() > 0)
            <div class="tab-pane fade" id="incoming" role="tabpanel" aria-labelledby="incoming-tab">
               
               <div class="table-responsive">
                  <table class="  " >
                     <thead>
                        <tr>
                           {{-- <th>ID</th> --}}
                           <th>Date</th>
                           {{-- <th>Type</th> --}}
                           <th>Route</th>
                           <th>Depart</th>
                           <th>Return</th>
                           {{-- <th>User</th> --}}
                           <th class="text-center">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @if ($recents->count() > 0)
                           @foreach ($recents as $req)
                           <tr>
                              <td>
                                 <a href="{{route('request.detail.new', enkripRambo($req->id))}}">{{formatDayName($req->date)}}, {{formatDate($req->date)}}</a>
                                 
                              </td>
                              {{-- <td>{{formatDate($req->date)}} </td> --}}
                              {{-- <td><span >{{$req->desc}}</span></td> --}}
                              <td>{{$req->origin->name}} - {{$req->destination->name}}</td>
                              <td>{{count($req->passengerItems->where('type', 'Departure'))}}</td>
                              <td>{{count($req->passengerItems->where('type', 'Return'))}}</td>
                             
                              <td>
            
                                 <a href="#" class="" data-toggle="modal" data-target="#req-app-{{$req->id}}">Approve</a> |
                                 <a href="#" class="" data-toggle="modal" data-target="#req-change-{{$req->id}}">Change Vessel</a> 
                                 
                                    
                              </td>
                           </tr>
                           @endforeach
                        @endif
                     </tbody>
                  </table>
               </div>
               <hr>
               
               <small class="text-muted">Tab ini berisi data Request Activity dari User yang otomatis masuk ke Schedule {{$schedule->vessel->name ?? ''}} {{formatDate($schedule->date)}}</small><br>
               <small class="text-muted">Hanya bisa di lihat oleh pihak Fleet Control</small>
            </div>

            {{-- <div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="other-tab">
               
               <x-schedule-stisla.other :recents="$recents" :schedule="$schedule" />
               <hr>
               <small class="text-muted">Tab ini berisi data Request Activity dari User yang otomatis masuk ke Schedule lain</small><br>
               <small class="text-muted">Hanya bisa di lihat oleh pihak Fleet Control</small>
            </div> --}}
            @endif
         @endif
      </div>
   {{-- </div>
</div> --}}