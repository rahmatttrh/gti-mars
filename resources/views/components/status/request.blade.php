<div>
   @if ($request->status == 0)
      <div class="badge bg-light border text-dark"><span class="badge bg-warning me-1"></span>00 : Draft</div>
      @elseif($request->status == 1)
      <div class="badge bg-light border text-dark"><span class="badge bg-info me-1"></span>01 : Waiting</div>
      @elseif($request->status == 2)
      <div class="badge bg-light border text-dark"><span class="badge bg-primary me-1"></span>02 : Schedule Set</div>
      @elseif($request->status == 3)
      <div class="badge bg-light border text-dark"><span class="badge bg-primary me-1"></span>03 : Loading at {{$request->schedule->origin->name}}</div>
      @elseif($request->status == 4)
      <div class="badge bg-light border text-dark"><span class="badge bg-primary me-1"></span>04 : Loading Complete at {{$request->schedule->origin->name}}</div>
      @elseif($request->status == 5)
      <div class="badge bg-light border text-dark"><span class="badge bg-primary me-1"></span>04 : Cast Off</div>
      @elseif($request->status == 6)
      <div class="badge bg-light border text-dark"><span class="badge bg-primary me-1"></span>05 : Full Away</div>
      @elseif($request->status == 7)
      <div class="badge bg-light border text-dark"><span class="badge bg-primary me-1"></span>06 : Arrive at {{$request->schedule->destination->name}}</div>
      @elseif($request->status == 8)
      <div class="badge bg-light border text-dark"><span class="badge bg-primary me-1"></span>07 : Unloading</div>
      @elseif($request->status == 9)
      <div class="badge bg-light border text-dark"><span class="badge bg-primary me-1"></span>08 : Complete</div>

      @elseif($request->status == 202)
      <div class="badge bg-light border text-dark"><span class="badge bg-danger me-1"></span>202 : Canceling Proccess</div>
   @endif
</div>