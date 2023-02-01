<div>
   @if ($schedule->status == 1)
      <div class="badge bg-light border text-dark"><span class="badge bg-warning me-1"></span>Waiting Boat</div>
      @elseif($schedule->status == 2)
      <div class="badge bg-light border text-dark"><span class="badge bg-info me-1"></span>Docking Proccess</div>
   @endif
</div>