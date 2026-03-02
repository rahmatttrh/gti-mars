@if ($vdr->status == 0)
   
      Draft
   
   
   @elseif($vdr->status == 1)
   
      Menunggu Validasi PET
  
   
   @elseif($vdr->status == 2)
   
      Menunggu Validasi Marine
   
   
   @elseif($vdr->status == 3)
      @if ($vdr->area != null || $vdr->func != null)
         
            Menunggu Validasi Marine Representative
         
          @else
          
            Menunggu Validasi Superintendent
         
      @endif
   

   @elseif($vdr->status == 5)
   
      Menunggu Validasi Suptent On Location
   
   
   @elseif($vdr->status == 4)
   
      Complete
   
   

   @elseif($vdr->status == 101)
   
   Reject by PET
   @elseif($vdr->status == 202)
   
   Reject by Marine
   @elseif($vdr->status == 303)
   
   Reject by Suptent
   @elseif($vdr->status == 505)
   
   Reject by Suptent on Location
@endif