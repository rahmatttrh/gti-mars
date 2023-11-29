<span>
   @if ($schedule->status == 1 )
      <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#schedule-accept">
         Accept
      </button>
      @elseif($schedule->status == 2 || $schedule->status == 10)
      {{-- @foreach ($deviations as $dev)
         @if (auth()->user()->hasRole('vessel'))
            @if ($dev->status == 1)
               <button class="btn mt-2 btn-small btn-info" data-bs-toggle="modal" data-bs-target="#modal-deviation-arrive-{{$dev->id}}">Arrive</button>
               @elseif($dev->status == 2)
               <button class="btn mt-2 btn-small btn-info" data-bs-toggle="modal" data-bs-target="#modal-deviation-complete-{{$dev->id}}">Complete</button>
            @endif
         @endif
      @endforeach --}}
      <button {{$schedule->status == 10 ? 'disabled' : ''}} class="btn {{$schedule->status == 10 ? 'btn-muted' : ''}} btn-primary" data-bs-toggle="modal" data-bs-target="#schedule-update-status">
         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-exchange" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M5 18m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
            <path d="M19 6m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
            <path d="M19 8v5a5 5 0 0 1 -5 5h-3l3 -3m0 6l-3 -3"></path>
            <path d="M5 16v-5a5 5 0 0 1 5 -5h3l-3 -3m0 6l3 -3"></path>
         </svg>
         Update Status
      </button>

      {{-- @elseif($schedule->status == 2)
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-loading">
         Loading
      </button>
      @elseif($schedule->status == 3)
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-loading-complete">
         Complete Loading
      </button>
      @elseif($schedule->status == 4)
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-castoff">  
         Cast Off
      </button>
      @elseif($schedule->status == 5)
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-fullaway">Full Away</button>
      @elseif($schedule->status == 6)
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-arrive">Arrive</button>
      @elseif($schedule->status == 7)
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-standby-dest">Waiting</button>
      @elseif($schedule->status == 8)
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-unloading">Unloading</button>
      @elseif($schedule->status == 9)
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-unloading-complete">Complete Unloading</button>
      @elseif($schedule->status == 10)
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-complete">Complete</button> --}}
   @endif
</span>