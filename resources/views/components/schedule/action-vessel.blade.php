<span>
   @if ($schedule->status == 1 )
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-standby">
         Standby
      </button>
      @elseif($schedule->status == 2)
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
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-complete">Complete</button>
   @endif
</span>