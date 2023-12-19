<div >
   @if ($vessel->status == 0)
      <div class="badge badge-light"><i class="fa fa-ship"></i> <small>Off Hire</small></div>
      @elseif($vessel->status == 1)
      <div class="badge badge-primary"><i class="fa fa-ship"></i> <small>On Hire</small></div>
   @endif
 </div>