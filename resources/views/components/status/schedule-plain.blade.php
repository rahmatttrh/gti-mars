<div>
   @if ($schedule->status == 0)
      <div class=""><span class=""></span>Draft</div>
      @elseif($schedule->status == 1)
      <div class=""><span class=""></span>Waiting Vessel</div>
      @elseif($schedule->status == 2)
      <div class=""><span class=""></span>{{$lastreport->status->name}} {{$lastreport->port_id == null ? '' : 'at ' . $lastreport->port->name}}</div>
      @elseif($schedule->status == 10)
      <div class=""><span class=""></span>Waiting Confirmation</div>
      @elseif($schedule->status == 11)
      <div class=""><span class=""></span>Complete</div>
   @endif

   @if ($schedule->deviations->where('status', 0)->count() > 0)
   <div class="">Deviation Alert!</div>
   @endif
   @if ($schedule->postpones->where('status', 0)->count() > 0)
   <div class="">Postpone</div>
   @endif
</div>