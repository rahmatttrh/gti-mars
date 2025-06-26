@if ($vdr->status == 0)
   <div class="badge badge-light">
      Draft
   </div>
   
   @elseif($vdr->status == 1)
   <div class="badge badge-info">
      Menunggu Validasi PET
   </div>
   
   @elseif($vdr->status == 2)
   <div class="badge badge-info">
      Menunggu Validasi Marine
   </div>
   
   @elseif($vdr->status == 3)
   <div class="badge badge-primary">
      Menunggu Validasi Superintendent
   </div>
   
   @elseif($vdr->status == 4)
   <div class="badge badge-success">
      Complete
   </div>
   

   @elseif($vdr->status == 101)
   
   <div class="" data-toggle="tooltip" data-placement="top" title="{{$vdr->times->where('type', 'reject')->where('status', 1)->first()->desc}}">Reject by PET</div>
@endif