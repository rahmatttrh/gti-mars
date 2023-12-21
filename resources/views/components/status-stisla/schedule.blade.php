<div>
   @if ($schedule->status == 0)
   {{-- <small>Draft</small> --}}
      <div class="badge badge-light border"><small>Draft</small></div>
      {{-- <button type="button" class="btn btn-light btn-icon icon-left">
         <i class="fas fa-edit"></i>Draft 
      </button> --}}
      @elseif($schedule->status == 1)
      <div class="badge badge-warning border"><small>Waiting Vessel</small></div>
      {{-- <button type="button" class="btn btn-light btn-icon icon-left">
         <i class="fas fa-edit"></i>Waiting Vessel 
      </button> --}}
      @elseif($schedule->status == 2)
      <div class="badge badge-primary "><span class="badge bg-primary me-1"></span><small>{{$schedule->getStatus()->status->name}}</small> </div>
      {{-- <div class="badge bg-light border text-dark"><span class="badge bg-primary me-1"></span>02 : {{$schedule->getStatus()->status->name}} {{$schedule->getStatus()->port_id == null ? '' : 'at ' . $schedule->getStatus()->port->name}}</div> --}}
      {{-- <button type="button" class="btn btn-primary btn-icon icon-left">
         <i class="fas fa-user"></i>{{$schedule->getStatus()->status->name}} {{$schedule->getStatus()->port_id == null ? '' : 'at ' . $schedule->getStatus()->port->name}}
      </button> --}}
      @elseif($schedule->status == 3)
      {{-- <button type="button" class="btn btn-danger btn-icon icon-left">
         <i class="fas fa-user"></i>User Confirmation 
      </button> --}}
      <div class="badge badge-primary "><span class="badge bg-primary me-1"></span><small>User Confirmation</small></div>
      @elseif($schedule->status == 4)
      <div class="badge bg-light border text-dark"><span class="badge bg-success me-1"></span>04 : Approval Additional Request</div>
      @elseif($schedule->status == 101)
      <div class="badge badge-info"><span class="badge bg-info me-1"></span><small>Validasi FM</small></div>
      @elseif($schedule->status == 11)
      <div class="badge badge-success"><span class="badge bg-success me-1"></span><small>Complete</small></div>
      {{-- @elseif($schedule->status == 303)
      <div class="badge bg-light border text-dark"><span class="badge bg-success me-1"></span>303 : Postpone</div> --}}
   @endif
  
   @if ($schedule->requests->where('class', 'additional')->where('status', 5)->count() > 0)
   <div class="badge bg-danger">Additional</div>
   @endif
   @if ($schedule->requests->where('class', 'deviation')->where('status', 3)->count() > 0)
   <div class="badge bg-danger">Deviation</div>
   @endif
   @if ($schedule->postpones->where('status', 0)->count() > 0)
   <div class="badge bg-warning">Postpone</div>
   @endif
</div>