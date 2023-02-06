<div>
   @if ($schedule->status == 1)
      <div class="badge bg-light border text-dark"><span class="badge bg-yellow me-1"></span>Waiting Boat</div>
      @elseif($schedule->status == 2)
      <div class="badge bg-light border text-dark"><span class="badge bg-orange me-1"></span>Docking Proccess</div>
      @elseif($schedule->status == 3)
      <div class="badge bg-light border text-dark"><span class="badge bg-info me-1"></span>Sailing</div>
   @endif
</div>