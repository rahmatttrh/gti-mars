<div >
   @if ($vessel->status == 0)
      <div class="badge badge-light"><small><i class="fa fa-ship"></i></small>  </div>
      @elseif($vessel->status == 1)
      <div class="badge badge-primary"><small> <i class="fa fa-ship"></i></small> </div>
   @endif
 </div>