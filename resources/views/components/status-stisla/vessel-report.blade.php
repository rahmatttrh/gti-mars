<div class="">
   @if ($report->status == 0)
      <div class="badge bg-light border text-dark">Standby {{$report->port->name ?? ''}}</div>
      @elseif($report->status == 1)
      <div class="badge bg-light border text-dark">Schedule On Set</div>
      @elseif($report->status == 9)
      <div class="badge bg-light border text-dark">Standby at {{$report->port->name}}</div>
      @elseif($report->status == 2 )
      <div class="badge bg-light border text-dark">Docking at {{$report->port->name}}</div>
      @elseif($report->status == 3)
      <div class="badge bg-light border text-dark">Fullaway</div>
      @elseif($report->status == 6)
      <div class="badge bg-light border text-dark">Docking at {{$report->port->name}}</div>
   @endif
 </div>