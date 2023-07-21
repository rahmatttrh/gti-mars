<div>
   @if ($schedule->status == 0)
      <div class="badge bg-light border text-dark"><span class="badge bg-yellow me-1"></span>00 : Draft</div>
      @elseif($schedule->status == 1)
      <div class="badge bg-light border text-dark"><span class="badge bg-primary me-1"></span>01 : Waiting Vessel</div>
      @elseif($schedule->status == 2)
      <div class="badge bg-light border text-dark"><span class="badge bg-primary me-1"></span>02 : {{$schedule->getStatus()->status->name}} {{$schedule->getStatus()->port_id == null ? '' : 'at ' . $schedule->getStatus()->port->name}}</div>
      @elseif($schedule->status == 3)
      <div class="badge bg-light border text-dark"><span class="badge bg-success me-1"></span>03 : User Confirmation</div>
      @elseif($schedule->status == 4)
      <div class="badge bg-light border text-dark"><span class="badge bg-success me-1"></span>04 : Approval Additional Request</div>
      @elseif($schedule->status == 11)
      <div class="badge bg-light border text-dark"><span class="badge bg-success me-1"></span>11 : Complete</div>
      {{-- @elseif($schedule->status == 303)
      <div class="badge bg-light border text-dark"><span class="badge bg-success me-1"></span>303 : Postpone</div> --}}
   @endif
  

   @if ($schedule->deviations->where('status', 0)->count() > 0)
   <div class="badge bg-danger">Deviation Alert!</div>
   @endif
   @if ($schedule->postpones->where('status', 0)->count() > 0)
   <div class="badge bg-warning">Postpone</div>
   @endif
</div>