<div class="">
   @if (!$schedule->vessel)
      <button class="btn btn-info  btn-block " data-toggle="modal" data-target="#schedule-select-vessel">
         Select Vessel
      </button>
      <hr>
      @else
      @if ($schedule->status == 0 || $schedule->status == 5 )
      {{-- @if ($schedule->requests()->count() > 0) --}}
      <div class="d-flex">
         <button class="btn btn-info mr-1" data-toggle="modal" data-target="#schedule-send">
            Send to vessel
         </button>
         <button class="btn btn-info btn-block " data-toggle="modal" data-target="#schedule-select-vessel">
            Select Vessel
         </button>
      </div>
      
      
      <hr>
      @elseif($schedule->status == 2 || $schedule->status == 3)
      {{-- <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#schedule-add-deviation">
        
         Add Deviation
      </button> --}}
      {{-- @elseif($schedule->status == 11)
      <button class="btn btn-success btn-sm">
         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check-filled text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" stroke-width="0" fill="currentColor"></path>
         </svg>
         Done
      </button> --}}
   @endif
   @endif




   
   
   </div>