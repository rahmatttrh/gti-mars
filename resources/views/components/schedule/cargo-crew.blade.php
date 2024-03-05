{{-- <div class="card shadow-sm border">
                  
   <div class="card-body"> --}}
      <ul class="nav nav-tabs" id="myTab" role="tablist">
         <li class="nav-item">
            <a class="nav-link {{$schedule->class == 'Cargo' ? 'active' : ''}}" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Cargo</a>
         </li>
         <li class="nav-item">
            <a class="nav-link  {{$schedule->class == 'Crew' ? 'active' : ''}}" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Crew </a>
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
            @if ($recents->where('schedule_id','!=', $schedule->id)->count() > 0)
            
            <li class="nav-item">
               <a class="nav-link" id="other-tab" data-toggle="tab" href="#other" role="tab" aria-controls="other" aria-selected="false">Other Request <span class="bg-danger px-2 text-white rounded">!</span></a>
            </li>
            @else
            <li class="nav-item">
               <a class="nav-link" id="other-tab" data-toggle="tab" href="#other" role="tab" aria-controls="other" aria-selected="false">Other Request </a>
            </li>
            @endif
         @endif
      </ul>
      <div class="tab-content" id="myTabContent">
         <div class="tab-pane fade {{$schedule->class == 'Cargo' ? 'show active' : ''}}" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="table-responsive">
               <table class="" id="table-1">
               <thead>
                  <tr>
                     <th>MTD</th>
                     {{-- <th>Route</th> --}}
                     <th>Descriptive</th>
                     <th>Contract</th>
                     <th class="text-center">Qty</th>
                     <th class="text-center">Weight</th>
                     <th class="text-center">Drop</th>
                     {{-- <th class="text-center">Size (m<sup>2</sup>)</th> --}}
                     <th></th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($requests->where('activity_id', 1) as $request)
                     <tr>
                        <td colspan="6"><b> {{$request->origin->name}} - {{$request->destination->name}}</b></td>
                        <td class="text-center">
                           @if (auth()->user()->hasRole('marine'))
                              @if ($schedule->status == 0 || $schedule->status == 5)
                                 <a href="{{route('request.undo.approve', enkripRambo($request->id))}}" class="btn btn-sm btn-light border shadow-none">Undo</a>
                              @endif
                           @endif
                        </td>
                     </tr>
                     @foreach ($request->cargoItems as $item)
                        <tr>
                           <td class=" text-truncate">
                           <div class="dropdown">
                              {{$item->mtd}}
                           </div>
                           </td>
                           {{-- <td>{{$item->request->origin->name}} - {{$item->request->destination->name}}</td> --}}
                           <td class=" text-truncate ">
                           {{$item->desc}} <br>
                           {{-- <small>{{$item->contract}}</small> --}}
                           </td>
                           <td class=" text-truncate">{{$item->contract}}</td>
                           <td class=" text-center text-truncate" >{{$item->qty}} {{$item->unit}}</td>
                           <td class=" text-center">{{$item->weight}}</td>
                           <td class=" text-center">{{$item->offloading ? $item->offloading->offloading : '-'}}</td>
                           {{-- <td class=" text-center">{{$item->size}}</td> --}}
                        
                           @if ($request->status == 10 && auth()->user()->hasRole('department'))
                           <td class="text-center">
                                 @if ($item->status == 0)
                                 <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#confirmCargo_{{$item->id}}">Confirm</a>
                                 {{-- <x-modal.cargo.confirm :cargo="$item" :routes="$routes" :schedule="$request->schedule" /> --}}
                                 @else
                                 -
                                 @endif
                                 
                              {{-- <form action="">
                                 <div class="form-group">
                                 <div class="input-group">
                                    <input type="number" class="form-control" name="drop" id="drop">
                                    <select class="form-control" name="port" id="port">
                                       <option selected>Port...</option>
                                       @foreach ($routes as $route)
                                          <option value="{{$route->port->id}}">{{$route->port->name}}</option>  
                                       @endforeach
                                    </select>
                                    <div class="input-group-append">
                                       <button class="btn btn-primary" type="submit">OK</button>
                                    </div>
                                 </div>
                              </div>
                              </form> --}}
                           </td>
                           @else
                           <td></td>
                           @endif
                     </tr>
                     @endforeach
                  @endforeach
               </tbody>
               </table>
            </div>
            <hr>
            <div class="table-responsive">
               <table class="">
               <thead>
                     <tr>
                     <th colspan="7" class="text-info">Deflection</th>
                     </tr>
                     <tr>
                     <th>MTD</th>
                     <th>Descriptive</th>
                     <th>Destination</th>
                     <th class="text-center">Qty</th>
                     
                     <th class="">Desc</th>
                     {{-- <th class="text-center">Size (m<sup>2</sup>)</th>
                     <th class="text-center">Weight (ton)</th> --}}
                     </tr>
               </thead>
               <tbody>
                  @foreach ($requests->where('activity_id', '!=', 2) as $request)
                     @if ($request->class == 'main' && $request->deflections->count() > 0)
                     @foreach ($request->deflections as $deflection)
                        <tr>
                           <td class="">{{$deflection->cargoitem->mtd}}</td>
                           
                           <td class="  text-nowrap">
                              {{$deflection->cargoitem->desc}}
                           </td>
                           <td class="">{{$deflection->port->name}}</td>
                           <td class=" text-center">{{$deflection->qty}} {{$deflection->cargoitem->unit}}</td>
                           <td class="  text-nowrap">
                              {{$deflection->desc}} 
                           </td>
                           {{-- <td class="text-muted text-center">{{$deflection->size}}</td>
                           <td class="text-muted text-center">{{$deflection->weight}}</td> --}}
                           
                        
                        </tr>
                     @endforeach
                     @endif
                  @endforeach
               </tbody>
               </table>
            </div>
         </div>
         <div class="tab-pane fade {{$schedule->class == 'Crew' ? 'show active' : ''}}" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="table-responsive ">
               <table class="" id="table-3">
               <thead>
                  
                  <tr>
                     <th>Type</th>
                     <th>Route</th>
                     <th>Name</th>
                     <th>Barcode</th>
                     <th>Department</th>
                     <th>Company</th>
                     <th>Desc</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($requests->where('activity_id', 2) as $requests)
                     {{-- <tr>
                     <td colspan="7">{{$requests->origin->name}} - {{$requests->destination->name}}</td>
                     </tr> --}}
                     @foreach ($requests->passengerItems as $passenger)
                     <tr>
                        <td>{{$passenger->type}}</td>
                        <td class="text-truncate">{{$passenger->request->origin->name}} - {{$passenger->request->destination->name}}</td>
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
               
               <x-schedule-stisla.incoming :incomings="$schedule->requests->where('status','=', 1)" :schedule="$schedule" />
               <hr>
               
               <small class="text-muted">Tab ini berisi data Request Activity dari User yang otomatis masuk ke Schedule {{$schedule->vessel->name ?? ''}} {{formatDate($schedule->date)}}</small><br>
               <small class="text-muted">Hanya bisa di lihat oleh pihak Fleet Control</small>
            </div>

            <div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="other-tab">
               
               <x-schedule-stisla.other :recents="$recents" :schedule="$schedule" />
               <hr>
               <small class="text-muted">Tab ini berisi data Request Activity dari User yang otomatis masuk ke Schedule lain</small><br>
               <small class="text-muted">Hanya bisa di lihat oleh pihak Fleet Control</small>
            </div>
            @endif
         @endif
      </div>
   {{-- </div>
</div> --}}