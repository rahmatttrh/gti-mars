<div>
   @if ($schedule->status == 0)
      <div class="badge bg-light border text-dark"><span class="badge bg-yellow me-1"></span>00 : Waiting</div>
      @elseif($schedule->status == 1)
      <div class="badge bg-light border text-dark"><span class="badge bg-orange me-1"></span>01 : Loading at {{$schedule->origin->name}}</div>
      @elseif($schedule->status == 2)
      <div class="badge bg-light border text-dark"><span class="badge bg-info me-1"></span>02 : Cast Off</div>
      @elseif($schedule->status == 3)
      <div class="badge bg-light border text-dark"><span class="badge bg-info me-1"></span>03 : Full Away</div>
      @elseif($schedule->status == 4)
      <div class="badge bg-light border text-dark"><span class="badge bg-info me-1"></span>04 : Arrive at {{$schedule->destination->name}}</div>
      @elseif($schedule->status == 5)
      <div class="badge bg-light border text-dark"><span class="badge bg-info me-1"></span>04 : Unloading</div>
      @elseif($schedule->status == 6)
      <div class="badge bg-light border text-dark"><span class="badge bg-info me-1"></span>05 : Complete</div>
   @endif
</div>