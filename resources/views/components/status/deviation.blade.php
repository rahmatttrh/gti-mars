<div class="">
   @if ($deviation->status == 0)
      <small class="text-info">Waiting Confirmation</small>
      @elseif($deviation->status == 1)
      <small>Confirmed</small>
      @endif
 </div>