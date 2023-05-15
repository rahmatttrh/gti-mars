<span>
   @if ($schedule->status == 0)
      Draft
      @elseif($schedule->status == 1)
      Assigned to {{$schedule->vessel->name}}
      @elseif($schedule->status == 2)
      Standby at {{$schedule->origin->name}}
      @elseif($schedule->status == 3)
      Loading Start at {{$schedule->origin->name}}
      @elseif($schedule->status == 4)
      Loading Complete at {{$schedule->origin->name}}
      @elseif($schedule->status == 5)
      Cast Off
      @elseif($schedule->status == 6)
      Full Away
      @elseif($schedule->status == 7)
      Arrive at {{$schedule->destination->name}}
      @elseif($schedule->status == 8)
      Waiting at {{$schedule->destination->name}}
      @elseif($schedule->status == 9)
      Unloading Start at {{$schedule->destination->name}}
      @elseif($schedule->status == 10)
      Unloading Complete at {{$schedule->destination->name}}
      @elseif($schedule->status == 11)
      Complete
   @endif
</span>