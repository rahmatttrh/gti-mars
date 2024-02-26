@if ($vdr->status == 0)
   <div class="badge badge-light">Draft</div>
   @elseif($vdr->status == 1)
   <div class="badge badge-info">Validasi Fleet Control</div>
   @elseif($vdr->status == 2)
   <div class="badge badge-info">Validasi Superintendent</div>
   @elseif($vdr->status == 3)
   <div class="badge badge-info">Validasi Mr. Luthfi</div>
   @elseif($vdr->status == 4)
   <div class="badge badge-info">Approved</div>

   @elseif($vdr->status == 101)
   
   <div class="badge badge-danger" data-toggle="tooltip" data-placement="top" title="{{$vdr->times->where('type', 'reject')->where('status', 1)->first()->desc}}">Reject Marine</div>
@endif