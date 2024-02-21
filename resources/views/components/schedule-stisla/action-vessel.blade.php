<span >
   @if ($schedule->status == 1 )
   <div class="btn-group " role="group" aria-label="Basic example">
      <button type="button" class="btn btn-info " data-toggle="modal" data-target="#schedule-accept">Approve</button>
      <button type="button" class="btn btn-light border" data-toggle="modal" data-target="#schedule-revision">Revision</button>
    </div>
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
         <div class="form-group">
            <div class="input-group">
               <select class="form-control status" required name="status" id="status">
                  <option selected disabled>Activity</option>
                  @foreach ($statuses as $status)
                  {{-- <option value="{{$status->id}}">{{$status->name}} </option> --}}
                     @if ($status->id == 1)
                     @else
                        @if ($status->code == '09' || $status->code == '11' || $status->code == '12')
                           <option value="{{$status->id}}">{{$status->name}}</option>
                           @else
                           <option value="{{$status->id}}">{{$status->name}} </option>
                        @endif
                    @endif
                 @endforeach
               </select>
               @if ($schedule->class == 'Cargo/Crew')
               <select class="form-control" name="port" id="port">
                  <option selected disabled>Location</option>
                  @foreach ($fixroutes as $route)
                     <option value="{{$route->port->id}}">{{$route->port->name}}</option>  
                  @endforeach
               </select>
               @endif
               
               <input type="file" class="form-control foto" name="foto" id="foto">
               
               <select class="form-control eta" name="destination" id="destination">
                  <option selected disabled>Destination...</option>
                  @foreach ($fixroutes as $route)
                     <option value="{{$route->port->id}}">{{$route->port->name}}</option>  
                  @endforeach
               </select>
               <input type="datetime-local" class="form-control eta" name="eta" id="eta">
               <select class="form-control anchor" name="anchor" id="anchor">
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
              <div class="input-group-append">
                <button class="btn btn-info  px-4" type="submit">Add Report</button>
                @if ($schedule->status > 1 && $schedule->status < 11 )
                <span class="btn btn-info  pt-2" data-toggle="modal" data-target="#schedule-vessel-complete">Complete</span>
                @endif
              </div>
              
            </div>
            
         </div>
         
      </form>
      
   @endif
</span>