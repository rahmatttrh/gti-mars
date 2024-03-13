<div>
   @if ($schedule->status == 0)
      Draft
      
      @elseif($schedule->status == 1)
      Waiting Vessel
      @elseif($schedule->status == 2)
      {{$schedule->getStatus()->status->name}}
      @elseif($schedule->status == 3)
      User Confirmation
      @elseif($schedule->status == 4)
      Approval Additional Request
      @elseif($schedule->status == 101)
      Validasi FM
      @elseif($schedule->status == 11)
      Complete
   @endif
  
   @if ($schedule->requests->where('class', 'additional')->where('status', 5)->count() > 0)
   <div class="badge bg-danger">Additional</div>
   @endif
   @if ($schedule->requests->where('class', 'deviation')->where('status', 3)->count() > 0)
   <div class="badge bg-danger">Deviation</div>
   @endif
   @if ($schedule->postpones->where('status', 0)->count() > 0)
   <div class="badge bg-warning">Postpone</div>
   @endif
</div>