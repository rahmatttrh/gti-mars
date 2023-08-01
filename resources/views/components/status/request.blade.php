<div>
   @if ($request->status == 0)
      <div class="badge bg-light border text-dark"><span class="badge bg-warning me-1"></span>00 : Draft</div>
      
       @elseif($request->status == 1 || $request->status == 2)
      <div class="badge bg-light border text-dark"><span class="badge bg-info me-1"></span>01 : Waiting</div>
      {{-- @elseif($request->status == 2)
      <div class="badge bg-light border text-dark"><span class="badge bg-primary me-1"></span>02 : Schedule Set</div> --}}
      @elseif($request->status == 3)
      <div class="badge bg-light border text-dark"><span class="badge bg-primary me-1"></span>03 : {{$request->getStatus()->status->name}} {{$request->getStatus()->port_id == null ? '' : 'at ' . $request->getStatus()->port->name}}</div>
      {{--@elseif($request->status == 3)
      <div class="badge bg-light border text-dark"><span class="badge bg-primary me-1"></span>03 : Assign to {{$request->schedule->vessel->name}}</div>
      @elseif($request->status == 4)
      <div class="badge bg-light border text-dark"><span class="badge bg-primary me-1"></span>04 : Loading Start at {{$request->schedule->origin->name}}</div>
      @elseif($request->status == 5)
      <div class="badge bg-light border text-dark"><span class="badge bg-primary me-1"></span>05 : Loading Complete at {{$request->schedule->origin->name}}</div>
      @elseif($request->status == 6)
      <div class="badge bg-light border text-dark"><span class="badge bg-primary me-1"></span>06 : Cast Off</div>
      @elseif($request->status == 7)
      <div class="badge bg-light border text-dark"><span class="badge bg-primary me-1"></span>07 : Full Away</div>
      @elseif($request->status == 8)
      <div class="badge bg-light border text-dark"><span class="badge bg-primary me-1"></span>08 : Arrive at {{$request->schedule->destination->name}}</div>
      @elseif($request->status == 9)
      <div class="badge bg-light border text-dark"><span class="badge bg-primary me-1"></span>09 : Waiting at {{$request->schedule->destination->name}}</div>
      @elseif($request->status == 10)
      <div class="badge bg-light border text-dark"><span class="badge bg-primary me-1"></span>10 : Unloading Start {{$request->schedule->destination->name}}</div>
      @elseif($request->status == 11)
      <div class="badge bg-light border text-dark"><span class="badge bg-primary me-1"></span>11 : Unloading Complete at {{$request->schedule->destination->name}}</div>
      @elseif($request->status == 12)
      <div class="badge bg-light border text-dark"><span class="badge bg-primary me-1"></span>12 : Complete</div> --}}
      @elseif($request->status == 10)
      <div class="badge bg-light border text-dark"><span class="badge bg-primary me-1"></span>10 : User Confirmation</div>
      @elseif($request->status == 12)
      <div class="badge bg-light border text-dark"><span class="badge bg-primary me-1"></span>12 : Complete</div>
      @elseif($request->status == 20)
      <div class="badge bg-light border text-dark"><span class="badge bg-danger me-1"></span>20 : Draft</div>
      @elseif($request->status == 21)
      <div class="badge bg-light border text-dark"><span class="badge bg-danger me-1"></span>21 : Waiting Marine Approval</div>
      @elseif($request->status == 22)
      <div class="badge bg-light border text-dark"><span class="badge bg-danger me-1"></span>22 : Proccess</div>
      @elseif($request->status == 202)
      <div class="badge bg-light border text-dark"><span class="badge bg-danger me-1"></span>202 : Canceling Proccess</div>
   @endif
</div>