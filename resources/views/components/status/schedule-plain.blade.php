<small>
   @if ($schedule->status == 0)
      Draft
      @elseif($schedule->status == 1)
      Standby
      @elseif($schedule->status == 2)
      Start Loading at {{$schedule->origin->name}}
      @elseif($schedule->status == 3)
      Complete Loading at {{$schedule->origin->name}}
      @elseif($schedule->status == 4)
      Cast Off
      @elseif($schedule->status == 5)
      Full Away
      @elseif($schedule->status == 6)
      Arrive at {{$schedule->destination->name}}
      @elseif($schedule->status == 7)
      Start Unloading at {{$schedule->destination->name}}
      @elseif($schedule->status == 8)
      Complete Unloading at {{$schedule->destination->name}}
      @elseif($schedule->status == 9)
      Complete
   @endif
</small>