<span>
   @if ($schedule->status == 0)
      Draft
      @elseif($schedule->status == 1)
      Assigned
      @elseif($schedule->status == 2)
      Standby at {{$schedule->origin->name}}
      @elseif($schedule->status == 3)
      Start Loading at {{$schedule->origin->name}}
      @elseif($schedule->status == 4)
      Complete Loading at {{$schedule->origin->name}}
      @elseif($schedule->status == 5)
      Cast Off
      @elseif($schedule->status == 6)
      Full Away
      @elseif($schedule->status == 7)
      Arrive at {{$schedule->destination->name}}
      @elseif($schedule->status == 8)
      Start Unloading at {{$schedule->destination->name}}
      @elseif($schedule->status == 9)
      Complete Unloading at {{$schedule->destination->name}}
      @elseif($schedule->status == 10)
      Complete
   @endif
</span>