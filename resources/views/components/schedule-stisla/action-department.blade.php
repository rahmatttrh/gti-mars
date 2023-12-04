<span>
   @if ($schedule->status == 3 )
      {{-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#additionalCargo">
         Add Additional Cargo
      </button> --}}
      {{-- <button class="btn btn-primary btn-lg"  data-toggle="modal" data-target="#modal-add-additional">
         
         Add Additional
      </button> --}}
      <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#schedule-confirm-complete">
         
         Complete
      </button>
   @endif

   {{-- <x-modal.schedule.complete :schedule="$schedule" /> --}}
</span>