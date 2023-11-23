<div class="">
   @if ($vessel->status == 0)
      <div class="badge bg-light border text-dark">Standby {{$vessel->port->name ?? ''}}</div>
      @elseif($vessel->status == 1)
      <div class="badge bg-light border text-dark">Schedule On Set</div>
      @elseif($vessel->status == 9)
      <div class="badge bg-light border text-dark">Standby at {{$vessel->port->name}}</div>
      @elseif($vessel->status == 2 )
      <div class="badge bg-light border text-dark">Docking at {{$vessel->port->name}}</div>
      @elseif($vessel->status == 3)
      <div class="badge bg-light border text-dark">Fullaway</div>
      @elseif($vessel->status == 6)
      <div class="badge bg-light border text-dark">Docking at {{$vessel->port->name}}</div>
   @endif
 </div>