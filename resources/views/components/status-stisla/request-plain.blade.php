<div>
   @if ($request->status == 0)
      <small>Draft</small>
      @elseif($request->status == 1)
      <small>Validasi Marine</small>
      @elseif($request->status == 2)
      <small>Schedule on Set</small>
      @elseif($request->status == 3)
      <small>Waiting Vessel</small>
      @elseif($request->status == 4)
      <small>  {{$request->getStatus()->status->name}} {{$request->getStatus()->port_id == null ? '' : 'at ' . $request->getStatus()->port->name}}</small>
      @elseif($request->status == 5)
      <small>Validasi Fleet Control</small>
      @elseif($request->status == 10)
      <small>10 : User Confirmation</small>
      @elseif($request->status == 12)
      <small>Complete</small>
      @elseif($request->status == 101)
      <small>Validasi FM</small>
      @elseif($request->status == 202)
      <div class="badge bg-light border text-dark"><span class="badge bg-danger me-1"></span>202 : Canceling Proccess</div>
      @elseif($request->status == 505)
      <div class="badge bg-light border text-dark"><span class="badge bg-danger me-1"></span>505 : Rejected</div>
   @endif
   @if ($request->status == 505)
      <div class="badge bg-light border text-dark">Reason : {{$request->rejects->first()->reason}}</div>
   @endif
</div>