<div>
   @if ($schedule->status == 0)
      <small>Draft</small>
      
      @elseif($schedule->status == 1)
      <small>Waiting Vessel</small>
      @elseif($schedule->status == 2)
      <small>{{$schedule->getStatus()->status->name}}</small>
      @elseif($schedule->status == 3)
      <small>User Confirmation</small>
      @elseif($schedule->status == 4)
      <small>Approval Additional Request</small>
      @elseif($schedule->status == 101)
      <small>Validasi FM</small>
      @elseif($schedule->status == 11)
      <small>Complete</small>
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