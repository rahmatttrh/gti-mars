@if ($vdr->status == 0)
   <div class="badge badge-light">
      Draft
   </div>
   
   @elseif($vdr->status == 1)
   <div class="badge badge-info">
      Menunggu Validasi PET
   </div>

   @elseif($vdr->status == 11)
   <div class="badge badge-info">
      Menunggu Validasi FM
   </div>
   
   @elseif($vdr->status == 2)
      @if ($vdr->vessel->ipb == 'IPB' || $vdr->vessel->type == 'Tug Boat')
         <div class="badge badge-warning">
            Menunggu Validasi Radop
         </div>
               @if (auth()->user()->hasRole('superuser'))
                  @if ($vdr->area == null)
                     Null
                  @endif
               @endif
          @else
          <div class="badge badge-warning" style="background-color: #342074; color: white">
            Menunggu Validasi Marine
         </div>
      @endif

   @elseif($vdr->status == 22)
      <div class="badge badge-warning" style="background-color: #0a8c91; color: white">
         Menunggu Validasi Lead Command
      </div>
   
   
   @elseif($vdr->status == 3)
      @if ($vdr->area != null || $vdr->func != null)
         <div class="badge badge-primary">
            Menunggu Validasi Marine Rep.
         </div>
          @else
          <div class="badge badge-primary">
            Menunggu Validasi Marine Rep.
         </div>
      @endif
   

   @elseif($vdr->status == 5)
   @if ($vdr->vessel->contract_type == 'Non PO')
      <div class="badge badge-warning" style="background-color: #92640f; color: white">
         Menunggu Validasi Coman
          {{-- {{ $vdr->area }} --}}
      </div>
      
       @else
        <div class="badge badge-warning" style="background-color: #920f66; color: white">
         Menunggu Validasi Suptent
      </div>
      
   @endif
   
   @elseif($vdr->status == 4)
   <div class="badge badge-success">
      <i class="fa fa-check-circle"></i>
      Complete
   </div>
   

   @elseif($vdr->status == 101)
   
   <div class="badge badge-danger" >Reject by PET/FM</div>
   @elseif($vdr->status == 202)
   
   <div class="badge badge-danger" >Reject by Marine</div>
   @elseif($vdr->status == 303)
   
   <div class="badge badge-danger" >Reject by Marine Rep.</div>
   @elseif($vdr->status == 505)
   
   <div class="badge badge-danger" >Reject by Suptent</div>
@endif