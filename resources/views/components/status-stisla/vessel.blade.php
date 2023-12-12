<div class="mt-1">
   @if ($vessel->status == 0)
      <div class="badge badge-light">Off Hire</div>
      @elseif($vessel->status == 1)
      <div class="badge badge-primary">On Hire</div>
   @endif
 </div>