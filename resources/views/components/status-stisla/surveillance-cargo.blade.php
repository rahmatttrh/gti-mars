<div>
   @if ($cargo->status == 0)
      <div class="badge badge-dark">Draft</div>
      @elseif($cargo->status == 1)
      <div class="badge badge-info">Proccess</div>
   @endif
</div>