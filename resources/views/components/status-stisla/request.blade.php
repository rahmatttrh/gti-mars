<div>
   @if ($request->status == 0)
      {{-- <button type="button" class="btn btn-light btn-icon icon-left">
         <i class="fas fa-edit"></i>Draft
      </button> --}}
      <div class="badge bg-light border text-dark"><span class="badge bg-warning me-1"></span><small>00 : Draft</small></div>
      @elseif($request->status == 1)
      <div class="badge bg-light border text-dark"><span class="badge bg-info me-1"></span><small>01 : Validasi Fleet Control</small></div>
      @elseif($request->status == 2)
      <div class="badge bg-light border text-dark"><span class="badge bg-info me-1"></span>02 : Schedule on Set</div>
      @elseif($request->status == 3)
      <div class="badge bg-light border text-dark"><span class="badge bg-info me-1"></span><small>03 : Waiting Vessel</small></div>
      @elseif($request->status == 4)
      {{-- <button type="button" class="btn btn-info btn-icon icon-left">
         <i class="fas fa-edit"></i>{{$request->getStatus()->status->name}} 
      </button> --}}
      <div class="badge badge-info "><small> 04 : {{$request->getStatus()->status->name}} {{$request->getStatus()->port_id == null ? '' : 'at ' . $request->getStatus()->port->name}}</small></div>
      @elseif($request->status == 5)
      <div class="badge bg-light border text-dark"><span class="badge bg-info me-1"></span>05 : Validasi Fleet Control</div>
      @elseif($request->status == 10)
      <div class="badge bg-light border text-dark"><span class="badge bg-info me-1"></span>10 : User Confirmation</div>
      @elseif($request->status == 12)
      <div class="badge bg-light border text-dark"><span class="badge bg-success me-1"></span>Complete</div>
      @elseif($request->status == 202)
      <div class="badge bg-light border text-dark"><span class="badge bg-danger me-1"></span>202 : Canceling Proccess</div>
      @elseif($request->status == 505)
      <div class="badge bg-light border text-dark"><span class="badge bg-danger me-1"></span>505 : Rejected</div>
   @endif
   @if ($request->status == 505)
      <div class="badge bg-light border text-dark">Reason : {{$request->rejects->first()->reason}}</div>
   @endif
</div>