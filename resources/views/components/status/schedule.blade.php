<div>
   @if ($schedule->status == 0)
      <div class="badge bg-light border text-dark"><span class="badge bg-yellow me-1"></span>00 : Draft</div>
      @elseif($schedule->status == 1)
      <div class="badge bg-light border text-dark"><span class="badge bg-yellow me-1"></span>00 : Standby</div>
      @elseif($schedule->status == 2)
      <div class="badge bg-light border text-dark"><span class="badge bg-orange me-1"></span>01 : Start Loading at {{$schedule->origin->name}}</div>
      @elseif($schedule->status == 3)
      <div class="badge bg-light border text-dark"><span class="badge bg-info me-1"></span>02 : Complete Loading at {{$schedule->origin->name}}</div>
      @elseif($schedule->status == 4)
      <div class="badge bg-light border text-dark"><span class="badge bg-info me-1"></span>03 : Cast Off</div>
      @elseif($schedule->status == 5)
      <div class="badge bg-light border text-dark"><span class="badge bg-info me-1"></span>04 : Full Away</div>
      @elseif($schedule->status == 6)
      <div class="badge bg-light border text-dark"><span class="badge bg-info me-1"></span>05 : Arrive at {{$schedule->destination->name}}</div>
      @elseif($schedule->status == 7)
      <div class="badge bg-light border text-dark"><span class="badge bg-info me-1"></span>06 : Start Unloading at {{$schedule->destination->name}}</div>
      @elseif($schedule->status == 8)
      <div class="badge bg-light border text-dark"><span class="badge bg-info me-1"></span>06 : Complete Unloading at {{$schedule->destination->name}}</div>
      @elseif($schedule->status == 9)
      <div class="badge bg-light border text-dark"><span class="badge bg-info me-1"></span>07 : Complete</div>
   @endif
</div>