<div>
   @if ($item->status == 0)
      <div class="badge bg-light border text-dark"><span class="badge bg-warning me-1"></span>Draft</div>
      @elseif($item->status == 1)
      <div class="badge bg-light border text-dark"><span class="badge bg-info me-1"></span>Assigned</div>
      @elseif($item->status == 2)
      <div class="badge bg-light border text-dark"><span class="badge bg-info me-1"></span>Progress</div>
      @elseif($item->status == 3)
      <div class="badge badge-warning "><span class="badge bg-info me-1"></span><small>Arrived</small></div>
      
   @endif
   @if ($item->status == 505)
      <div class="badge bg-light border text-dark">Reason : {{$request->rejects->first()->reason}}</div>
   @endif
</div>