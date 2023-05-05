<span>
   @if ($schedule->status == 0 )
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-send">
         <!-- Download SVG icon from http://tabler-icons.io/i/send -->
         <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="10" y1="14" x2="21" y2="3" /><path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5" /></svg>
         Send
      </button>
      @elseif($schedule->status >= 1 && $schedule->status <= 10)
      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-add-deviation">
         Add Deviation
      </button>
   @endif
</span>