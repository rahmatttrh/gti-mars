<small>
   @if ($schedule->status == 0)
      Waiting
      @elseif($schedule->status == 1)
      Start Loading at {{$schedule->origin->name}}
      @elseif($schedule->status == 2)
      Complete Loading at {{$schedule->origin->name}}
      @elseif($schedule->status == 3)
      Cast Off
      @elseif($schedule->status == 4)
      Full Away
      @elseif($schedule->status == 5)
      Arrive at {{$schedule->destination->name}}
      @elseif($schedule->status == 6)
      Start Unloading at {{$schedule->destination->name}}
      @elseif($schedule->status == 7)
      Complete Unloading at {{$schedule->destination->name}}
      @elseif($schedule->status == 8)
      Complete
   @endif
</small>