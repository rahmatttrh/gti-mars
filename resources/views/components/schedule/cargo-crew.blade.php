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
         @if (auth()->user()->hasRole('marine'))
         <li class="nav-item">
            <a class="nav-link" id="add-tab" data-toggle="tab" href="#add" role="tab" aria-controls="add" aria-selected="false">Add Activity </a>
         </li>
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
                     <th class="text-center">Weight(ton)</th>
                     <th class="text-center">Drop</th>
                     {{-- <th class="text-center">Size (m<sup>2</sup>)</th> --}}
                     @if ($schedule->status == 3 && auth()->user()->hasRole('department'))
                     <th>Confirmation Action</th>
                     @else
                     <th></th>
                     @endif
                  </tr>
               </thead>
               <tbody>
                  @foreach ($requests->where('activity_id', 1) as $request)
                     <tr>
                        <td colspan="1">
                           <a href="{{route('request.detail.new', enkripRambo($request->id))}}">
                              <b> {{$request->origin->code}} - {{$request->destination->code}} </b> 
                           </a>
                        </td>
                        <td colspan="5">
                           <a href="{{route('request.detail.new', enkripRambo($request->id))}}">
                              <b>{{formatDayName($request->date)}},{{formatDate($request->date)}} - {{$request->desc}}</b> 
                           </a>
                        </td>
                        
                        {{-- <td>{{$request->code}}</td> --}}
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
                           </td>
                           <td class=" text-truncate">{{$item->contract}}</td>
                           <td class=" text-center text-truncate" >{{$item->qty}} {{$item->unit}}</td>
                           <td class=" text-center">{{$item->weight}}</td>
                           <td class=" text-center">{{$item->offloading ? $item->offloading->offloading : '-'}}</td>
                        
                           @if ($request->status == 10 && auth()->user()->hasRole('department'))
                           <td class="text-center">
                                 @if ($item->status == 0)
                                 <form action="{{route('cargo.item.offloading')}}" method="POST" class="d-flex">
                                    @csrf
                                    <input type="number" name="cargoItem" id="cargoItem" value="{{$item->id}}" hidden>
                                    <input style="width: 70px" required type="number" name="offloading" id="offloading">
                                    <select style="width: 120px" required class="form-control" name="destination" id="destination">
                                       <option selected disabled>Choose</option>
                                       @foreach ($routes as $route)
                                          <option value="{{$route->port->id}}">{{$route->port->code}}</option>  
                                       @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-info">Confirm</button>
                                 </form>
                                 {{-- <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#confirmCargo">Confirm</a> --}}
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
                     <tr>
                        <td colspan="6"></td>
                     </tr>
                  @endforeach
                  <tr>
                     <td colspan="4" class="text-right pr-2">Total Weight</td>
                     <td class="text-center">{{$schedule->total_weight}}</td>
                  </tr>
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
                     <th>Type </th>
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
                        <td>{{$requests->id}}</td>
                     </tr> --}}
                     <tr>
                     <td colspan="7"><a href="{{route('request.detail.new', enkripRambo($requests->id))}}"><b>{{$requests->origin->name}} - {{$requests->destination->name}}</b></a></td>
                     </tr>
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
            @else
            <div class="tab-pane fade" id="incoming" role="tabpanel" aria-labelledby="incoming-tab">
               
               
               
               <small class="text-muted">Empty</small><br>
               <small class="text-muted"></small>
            </div>

            <div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="other-tab">
               <small class="text-muted">Empty</small>
            </div>
            @endif
         @endif

         @if (auth()->user()->hasRole('marine'))
         <div class="tab-pane fade " id="add" role="tabpanel" aria-labelledby="add-tab">
            <div class="row">
               <div class="col-md-5">
                  <form action="{{route('marine.request.store')}}" method="POST">
                     @csrf
                     <input type="number" name="schedule" id="schedule" value="{{$schedule->id}}" hidden>
                     <div class="form-row">
                        <div class="form-group col-md-6">
                           <label>Type*</label>
                           {{-- style="background-color: lightgrey" --}}
                           <select class="custom-select" id="activity"  required name="activity">
                              <option disabled selected>Choose one</option>
                              <option value="1">Cargo</option>
                              <option value="2">Crew</option>
                           </select>
                        </div>
                        <div class="form-group col-md-6">
                           <label>User</label>
                           <select class="custom-select " id="user"  name="user">
                              <option disabled selected>Choose one</option>
                              @foreach ($ports as $port)
                                 <option {{ old('user') == $port->id ? 'selected' : '' }} value="{{ $port->id }}">{{ $port->name }}</option>
                              @endforeach
                           </select>
                        </div>
                     </div>
                     
                     <div class="form-row port">
                        <div class="form-group col-md-6">
                           <label>Origin/From</label>
                           <select class="custom-select origin" id="origin"  name="origin">
                              <option disabled selected>Choose one</option>
                              @foreach ($ports as $port)
                                 <option {{ old('origin') == $port->id ? 'selected' : '' }} value="{{ $port->id }}">{{ $port->name }}</option>
                              @endforeach
                           </select>
                        </div>
                        <div class="form-group col-md-6 destination">
                           <label>Destination</label>
                           <select class="custom-select " id="destination"  name="destination">
                              <option disabled selected>Choose one</option>
                              @foreach ($ports as $port)
                                 <option {{ old('destination') == $port->id ? 'selected' : '' }} value="{{ $port->id }}">{{ $port->name }}</option>
                              @endforeach
                           </select>
                        </div>
                        <div class="form-group col-md-6 file-cargo">
                           <label for="file-cargo">File Excel Cargo</label>
                           <input class="form-control mb-2" id="file-cargo" type="file"  value="{{ old('file') }}" name="file-cargo">
                           
                        </div>
                     </div>
                     <div class="form-row file-crew">
                        <div class="form-group col-md-12">
                           <label for="file-passenger">File Excel Crew</label>
                           <input class="form-control mb-1" id="file-passenger" type="file"  value="{{ old('file') }}" name="file-passenger">
                           
                        </div>
                     </div>

                     <div class="form-group">
                        <label for="desc">Description</label>
                        <input class="form-control " id="desc" type="text"  value="{{ old('desc') }}" name="desc">
                     </div>
                     <button type="submit" class="btn btn-info">Submit</button>
                  </form>
               </div>
            </div>
            
         </div>
         @endif
      </div>
   {{-- </div>
</div> --}}


@push('get_schedules')
   <script>
      console.log('get_schedules function');
      $(".file-cargo").hide();
      $(".file-crew").hide();
      $(".barge").hide();
      $(".platform").hide();
      $(".qty").hide();
      $('#activity').change(function() {
         var activity = $(this).val();
         console.log(activity)
         if (activity == 1) {
            $(".file-cargo").hide();
            $(".file-crew").hide();
            $(".barge").hide();
            $(".destination").show();
            $(".qty").hide();
         } else if (activity == 2) {
            $(".barge").hide();
            $(".file-cargo").hide();
            $(".file-crew").hide();
            $(".destination").show();
            $(".platform").hide();
            $(".port").show();
            $(".qty").hide();
         } else if (activity == 3) {
            $(".file-cargo").hide();
            $(".file-crew").hide();
            $(".barge").show();
            $(".destination").show();
            $(".platform").show();
            $(".port").hide();
            $(".qty").hide();
         } else if (activity == 5 || activity == 6) {
            $(".file-cargo").hide();
            $(".file-crew").hide();
            $(".barge").hide();
            $(".route").hide();
            $(".platform").hide();
            $(".port").hide();
            $(".qty").show();
         }else {
            $(".file-cargo").hide();
            $(".file-crew").hide();
            $(".barge").hide();
            $(".destination").show();
         }
      })


      $(document).ready(function() {
         $('.origin').change(function() {
            $('.result').empty()
            $('.near').empty()
            var origin = $('#origin').val();
            var date = $('#date').val();
            var _token = $('meta[name="csrf-token"]').attr('content');

            console.log('origin:' + origin + ' date:' + date);

            $.ajax({
               url: "/fetch/schedule/" + date + "/" + origin,
               method: "GET",
               dataType: 'json',

               success: function(result) {
                  console.log('near :' + result.near);
                  console.log('result :' + result.result);
                  console.log('log :' + result.log);
                  $.each(result.result, function(i, index) {
                     $('.result').html(result.result);

                  });
                  $.each(result.near, function(i, index) {

                     $('.near').html(result.near);
                  });
               },
               error: function(error) {
                  console.log(error)
               }

            })
         })
      })
   </script>
@endpush