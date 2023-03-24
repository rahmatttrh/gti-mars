<div>
   @if ($request->status == 0)
      <div class="badge bg-light border text-dark"><span class="badge bg-warning me-1"></span>00</div>
      @elseif($request->status == 1)
      <div class="badge bg-light border text-dark"><span class="badge bg-info me-1"></span>01</div>
      @elseif($request->status == 2)
      <div class="badge bg-light border text-dark"><span class="badge bg-primary me-1"></span>02</div>
   @endif
</div>