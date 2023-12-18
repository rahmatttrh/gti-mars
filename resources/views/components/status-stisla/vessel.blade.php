<div >
   @if ($vessel->status == 0)
      <div class="badge badge-light"><i class="fa fa-ship"></i> Off Hire</div>
      @elseif($vessel->status == 1)
      <div class="badge badge-primary"><i class="fa fa-ship"></i> On Hire</div>
   @endif
 </div>