
   @if ($schedule->status == 1 )
   <div class="btn-group " role="group" aria-label="Basic example">
      <button type="button" class="btn btn-info btn-block " data-toggle="modal" data-target="#schedule-accept">Accept</button>
      <button type="button" class="btn btn-light border" data-toggle="modal" data-target="#schedule-revision">Revision</button>
    </div>
    <hr>
      {{-- <button class="btn btn-info btn-block " data-toggle="modal" data-target="#schedule-accept">
         Accept
      </button>
      <button class="btn btn-info btn-block " data-toggle="modal" data-target="#schedule-accept">
         Revision
      </button> --}}
      @elseif($schedule->status == 2 || $schedule->status == 10)
      <form action="{{route('schedule.update.status')}}" method="POST" enctype="multipart/form-data">
         @csrf
         <input type="number" name="schedule" id="schedule" value="{{$schedule->id}}" hidden>
         <div class="row">
            <div class="col-md-7">
               <div class="form-row">
                  <div class="form-group col-md-12">
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <div class="input-group-text">Activity</div>
                        </div>
                        <select class="form-control status" required name="status" id="status">
                           <option selected disabled>Choose Activity</option>
                           @foreach ($statuses as $status)
                           {{-- <option value="{{$status->id}}">{{$status->name}} </option> --}}
                              @if ($status->id == 1 || $status->id == 13)
                              @else
                                 @if ($status->code == '09' || $status->code == '11' || $status->code == '12')
                                    <option value="{{$status->id}}">{{$status->name}}</option>
                                    @else
                                    <option value="{{$status->id}}">{{$status->name}} </option>
                                 @endif
                              @endif
                           @endforeach
                        </select>
                     </div>
                  </div>
                  
                  <div class="form-group col-md-6">
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <div class="input-group-text">From</div>
                        </div>
                        @if ($schedule->class == 'Cargo' || $schedule->class == 'Cargo')
                        <select class="form-control" name="port" id="port">
                           <option selected disabled>Location</option>
                           @foreach ($fixroutes as $route)
                              <option value="{{$route->port->id}}">{{$route->port->code}}</option>  
                           @endforeach
                        </select>
                        @endif
                     </div>
                  </div>
                  <div class="form-group col-md-6">
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                        <input type="datetime-local"  name="date" id="date" class="form-control">
                     </div>
                  </div>
                  <div class="form-group col-md-6 eta">
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <div class="input-group-text">To</div>
                        </div>
                        <select class="form-control " name="destination" id="destination">
                           <option selected disabled>Destination...</option>
                           @foreach ($fixroutes as $route)
                              <option value="{{$route->port->id}}">{{$route->port->name}}</option>  
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="form-group col-md-6 eta">
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <div class="input-group-text">ETA</div>
                        </div>
                        <input style="width: 70px" type="datetime-local" class="form-control " name="eta" id="eta">
                     </div>
                  </div>
                  <div class="form-group col-md-12 anchor">
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <div class="input-group-text">Anchor</div>
                        </div>
                        <select class="form-control " name="anchor" id="anchor">
                           <option selected disabled>Anchor...</option>
                           <option value="1">1</option> 
                           <option value="2">2</option>  
                           <option value="3">3</option>  
                           <option value="4">4</option>  
                           <option value="5">5</option>  
                           <option value="6">6</option>  
                           <option value="7">7</option>  
                           <option value="8">8</option>   
                        </select>
                     </div>
                  </div>
                  <div class="form-group col-md-12">
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <div class="input-group-text">Desc</div>
                        </div>
                        <input type="text" class="form-control" name="desc" id="desc" placeholder="Description">
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-5">
               <div class="form-row">
                  <div class="form-group col-md-12">
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <div class="input-group-text">Foto</div>
                        </div>
                        <input type="file" name="foto" id="foto" class="form-control" >
                     </div>
                  </div>
                  <div class="form-group col-md-12">
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <div class="input-group-text">Doc</div>
                        </div>
                        <input type="file" class="form-control" name="doc" id="doc" >
                     </div>
                  </div>
                  <div class="form-group col-md-6">
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <div class="input-group-text">COB</div>
                        </div>
                        <input type="number" class="form-control" name="cob" id="cob" >
                     </div>
                  </div>
                  <div class="form-group col-md-6">
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <div class="input-group-text">POB</div>
                        </div>
                        <input type="number" class="form-control" name="pob" id="pob" >
                     </div>
                  </div>
               </div>
               
            </div>
         </div>
         <div class="row">
            <div class="col-md-7">
               <hr>
               <button type="submit" class="btn btn-info">Submit</button>
               @if ($schedule->status > 1 && $schedule->status < 11 )
                  <span class="btn btn-light" data-toggle="modal" data-target="#schedule-vessel-complete">Complete</span>
               @endif
            </div>
         </div>
      </form>
      
   @endif

