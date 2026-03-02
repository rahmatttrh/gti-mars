<div >
   @if ($vessel->status == 0)
      <div class="badge badge-light"><small>Off Hire</small>  </div>
      @elseif($vessel->status == 1)
      <div class="badge badge-info"><small> On Hire</small> </div>
   @endif
 </div>