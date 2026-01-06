@if ($vdr->status == 0)
   <div class="badge badge-light">
      Draft
   </div>
   
   @elseif($vdr->status == 1)
   <div class="badge badge-info">
      Menunggu Validasi PET
   </div>
   
   @elseif($vdr->status == 2)
      @if ($vdr->vessel->ipb == 'IPB')
         <div class="badge badge-primary">
            Menunggu Validasi Radop
         </div>
          @else
          <div class="badge badge-info">
            Menunggu Validasi Marine
         </div>
      @endif
   
   
   @elseif($vdr->status == 3)
      @if ($vdr->area != null || $vdr->func != null)
         <div class="badge badge-primary">
            Menunggu Validasi Marine Representative
         </div>
          @else
          <div class="badge badge-primary">
            Menunggu Validasi Superintendent
         </div>
      @endif
   

   @elseif($vdr->status == 5)
   <div class="badge badge-primary">
      Menunggu Validasi Suptent Area
   </div>
   
   @elseif($vdr->status == 4)
   <div class="badge badge-success">
      Complete
   </div>
   

   @elseif($vdr->status == 101)
   
   <div class="badge badge-danger" >Reject by PET</div>
   @elseif($vdr->status == 202)
   
   <div class="badge badge-danger" >Reject by Marine</div>
   @elseif($vdr->status == 303)
   
   <div class="badge badge-danger" >Reject by Suptent</div>
   @elseif($vdr->status == 505)
   
   <div class="badge badge-danger" >Reject by Suptent Area</div>
@endif