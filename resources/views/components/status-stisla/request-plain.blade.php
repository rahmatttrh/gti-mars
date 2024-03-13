<div>
   @if ($request->status == 0)
      Draft
      @elseif($request->status == 1)
      Validasi Marine
      @elseif($request->status == 2)
      Schedule on Set
      @elseif($request->status == 3)
      Waiting Vessel
      @elseif($request->status == 4)
        {{$request->getStatus()->status->name}} {{$request->getStatus()->port_id == null ? '' : 'at ' . $request->getStatus()->port->name}}
      @elseif($request->status == 5)
      Validasi Fleet Control
      @elseif($request->status == 10)
      10 : User Confirmation
      @elseif($request->status == 12)
      Complete
      @elseif($request->status == 101)
      Validasi FM
      @elseif($request->status == 202)
      <div class="badge bg-light border text-dark"><span class="badge bg-danger me-1"></span>202 : Canceling Proccess</div>
      @elseif($request->status == 505)
      <div class="badge bg-light border text-dark"><span class="badge bg-danger me-1"></span>505 : Rejected</div>
   @endif
   @if ($request->status == 505)
      <div class="badge bg-light border text-dark">Reason : {{$request->rejects->first()->reason}}</div>
   @endif
</div>