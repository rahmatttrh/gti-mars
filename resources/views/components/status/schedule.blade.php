<div>
   @if ($schedule->status == 0)
      <div class="badge bg-light border text-dark"><span class="badge bg-yellow me-1"></span>00 : Draft</div>
      @elseif($schedule->status == 1)
      <div class="badge bg-light border text-dark"><span class="badge bg-primary me-1"></span>01 : Waiting Vessel</div>
      @elseif($schedule->status == 2)
      <div class="badge bg-light border text-dark"><span class="badge bg-primary me-1"></span>02 : {{$lastreport->status->name}} {{$lastreport->port_id == null ? '' : 'at ' . $lastreport->port->name}}</div>
      @elseif($schedule->status == 11)
      <div class="badge bg-light border text-dark"><span class="badge bg-success me-1"></span>11 : Complete</div>
      {{-- @elseif($schedule->status == 303)
      <div class="badge bg-light border text-dark"><span class="badge bg-success me-1"></span>303 : Postpone</div> --}}
   @endif
   {{-- @if ($schedule->status == 0)
      <div class="badge bg-light border text-dark"><span class="badge bg-yellow me-1"></span>00 : Draft</div>
      @elseif($schedule->status == 1)
      <div class="badge bg-light border text-dark"><span class="badge bg-yellow me-1"></span>01 : Assigned to {{$schedule->vessel->name}}</div>
      @elseif($schedule->status == 2)
      <div class="badge bg-light border text-dark"><span class="badge bg-yellow me-1"></span>02 : Standby at {{$schedule->origin->name}}</div>
      @elseif($schedule->status == 3)
      <div class="badge bg-light border text-dark"><span class="badge bg-info me-1"></span>03 : Loading Start at {{$schedule->origin->name}}</div>
      @elseif($schedule->status == 4)
      <div class="badge bg-light border text-dark"><span class="badge bg-info me-1"></span>04 : Loading Complete at {{$schedule->origin->name}}</div>
      @elseif($schedule->status == 5)
      <div class="badge bg-light border text-dark"><span class="badge bg-info me-1"></span>05 : Cast Off</div>
      @elseif($schedule->status == 6)
      <div class="badge bg-light border text-dark"><span class="badge bg-info me-1"></span>06 : Full Away</div>
      @elseif($schedule->status == 7)
      <div class="badge bg-light border text-dark"><span class="badge bg-info me-1"></span>07 : Arrive at {{$schedule->destination->name}}</div>
      @elseif($schedule->status == 8)
      <div class="badge bg-light border text-dark"><span class="badge bg-info me-1"></span>08 : Waiting at {{$schedule->destination->name}}</div>
      @elseif($schedule->status == 9)
      <div class="badge bg-light border text-dark"><span class="badge bg-info me-1"></span>09 : Unloading Start at {{$schedule->destination->name}}</div>
      @elseif($schedule->status == 10)
      <div class="badge bg-light border text-dark"><span class="badge bg-info me-1"></span>10 : Unloading Complete at {{$schedule->destination->name}}</div>
      @elseif($schedule->status == 11)
      <div class="badge bg-light border text-dark"><span class="badge bg-success me-1"></span>11 : Complete</div>
   @endif --}}

   @if ($schedule->deviations->where('status', 0)->count() > 0)
   <div class="badge bg-danger">Deviation Alert!</div>
   @endif
   @if ($schedule->postpones->where('status', 0)->count() > 0)
   <div class="badge bg-warning">Postpone</div>
   @endif
</div>