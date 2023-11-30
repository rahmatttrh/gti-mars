<span>
   @if ($schedule->status == 1 )
      <button class="btn btn-primary btn-lg mb-4" data-toggle="modal" data-target="#schedule-accept">
         Accept
      </button>
      @elseif($schedule->status == 2 || $schedule->status == 10)
      <form action="{{route('schedule.update.status')}}" method="POST">
         @csrf
         <input type="number" name="schedule" id="schedule" value="{{$schedule->id}}" hidden>
         <div class="form-group">
            <div class="input-group">
               <select class="form-control" name="status" id="status">
                  <option selected>Activity...</option>
                  @foreach ($statuses as $status)
                  {{-- <option value="{{$status->id}}">{{$status->name}} </option> --}}
                     @if ($status->id == 1)
                     @else
                        @if ($status->code == '09' || $status->code == '11' || $status->code == '12')
                           <option value="{{$status->id}}">{{$status->name}} *</option>
                           @else
                           <option value="{{$status->id}}">{{$status->name}} </option>
                        @endif
                    @endif
                 @endforeach
               </select>
               <select class="form-control" name="port" id="port">
                  <option selected>Port...</option>
                  @foreach ($fixroutes as $route)
                     <option value="{{$route->port->id}}">{{$route->port->name}}</option>  
                  @endforeach
               </select>
              <div class="input-group-append">
                <button class="btn btn-primary px-4" type="submit">Add Report</button>
              </div>
            </div>
          </div>
         {{-- <div class="form-row">
            <div class="form-group col-md-12">
              <label for="status">Vessel</label>
              
            </div>
         </div>
         <button class="btn btn-primary btn-lg">Report Status</button> --}}
      </form>
      {{-- @foreach ($deviations as $dev)
         @if (auth()->user()->hasRole('vessel'))
            @if ($dev->status == 1)
               <button class="btn mt-2 btn-small btn-info" data-bs-toggle="modal" data-bs-target="#modal-deviation-arrive-{{$dev->id}}">Arrive</button>
               @elseif($dev->status == 2)
               <button class="btn mt-2 btn-small btn-info" data-bs-toggle="modal" data-bs-target="#modal-deviation-complete-{{$dev->id}}">Complete</button>
            @endif
         @endif
      @endforeach --}}
      {{-- <button {{$schedule->status == 10 ? 'disabled' : ''}} class="btn {{$schedule->status == 10 ? 'btn-muted' : ''}} btn-primary btn-lg" data-toggle="modal" data-target="#schedule-report-add">
         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-exchange" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M5 18m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
            <path d="M19 6m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
            <path d="M19 8v5a5 5 0 0 1 -5 5h-3l3 -3m0 6l-3 -3"></path>
            <path d="M5 16v-5a5 5 0 0 1 5 -5h3l-3 -3m0 6l3 -3"></path>
         </svg>
         Report Activity
      </button> --}}

      {{-- @elseif($schedule->status == 2)
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-loading">
         Loading
      </button>
      @elseif($schedule->status == 3)
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-loading-complete">
         Complete Loading
      </button>
      @elseif($schedule->status == 4)
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-castoff">  
         Cast Off
      </button>
      @elseif($schedule->status == 5)
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-fullaway">Full Away</button>
      @elseif($schedule->status == 6)
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-arrive">Arrive</button>
      @elseif($schedule->status == 7)
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-standby-dest">Waiting</button>
      @elseif($schedule->status == 8)
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-unloading">Unloading</button>
      @elseif($schedule->status == 9)
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-unloading-complete">Complete Unloading</button>
      @elseif($schedule->status == 10)
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-complete">Complete</button> --}}
   @endif
</span>