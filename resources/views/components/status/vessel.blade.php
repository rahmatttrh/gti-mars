<div class="">
   @if ($vessel->status == 0)
      <div class="badge bg-light border text-dark"><span class="badge bg-info me-1"></span>Ready</div>
      @elseif($vessel->status == 1)
      <div class="badge bg-light border text-dark"><span class="badge bg-info me-1"></span>Schedule On Set</div>
      {{-- @elseif($vessel->status == 2)
      <div class="badge bg-light border text-dark"><span class="badge bg-info me-1"></span>Standby at {{$vessel->port->name}}</div> --}}
      @elseif($vessel->status == 2 )
      <div class="badge bg-light border text-dark"><span class="badge bg-info me-1"></span>Docking at {{$vessel->port->name}}</div>
      @elseif($vessel->status == 3)
      <div class="badge bg-light border text-dark"><span class="badge bg-info me-1"></span>Sailing</div>
      @elseif($vessel->status == 6)
      <div class="badge bg-light border text-dark"><span class="badge bg-info me-1"></span>Docking at {{$vessel->port->name}}</div>
   @endif
 </div>