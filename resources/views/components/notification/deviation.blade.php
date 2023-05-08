<span>
   @if (auth()->user()->hasRole('vessel'))
      @if ($deviations->where('status', 0)->count() > 0)
         @foreach ($deviations as $dev)
            <div class="alert alert-primary" role="alert">
               You have Deviation Activity to {{$dev->port->name}}. Click <a href="#" data-bs-toggle="modal" data-bs-target="#modal-deviation-confirm-{{$dev->id}}" class="alert-link">here</a> to confirm.
            </div> 
            <x-modal.deviation.confirm :deviation="$dev" />
         @endforeach
      @endif
   @endif
</span>