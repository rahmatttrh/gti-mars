@if ($vdr->status == 0)
   Draft
   @elseif($vdr->status == 1)
   Validasi PET
   @elseif($vdr->status == 2)
   Validasi Marine
   @elseif($vdr->status == 3)
   Validasi Superintendent
   @elseif($vdr->status == 4)
   Approved

   @elseif($vdr->status == 101)
   
   <div class="" data-toggle="tooltip" data-placement="top" title="{{$vdr->times->where('type', 'reject')->where('status', 1)->first()->desc}}">Reject by PET</div>
@endif