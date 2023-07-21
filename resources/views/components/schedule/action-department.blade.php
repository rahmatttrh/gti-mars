<span>
   @if ($schedule->status == 3 )
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#additionalCargo">
         Add Additional Cargo
      </button>
      <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-complete-schedule">
         Complete
      </button>
   @endif

   <x-modal.schedule.complete :schedule="$schedule" />
</span>