<div>
   @if ($cargo->status == 0)
      <div class="badge badge-muted border"><small>Draft</small></div>
      @elseif($cargo->status == 1)
      <div class="badge badge-info"><small>Proccess</small></div>
      @elseif($cargo->status == 2)
      <div class="badge badge-success"><small>Droped</small></div>
   @endif
</div>