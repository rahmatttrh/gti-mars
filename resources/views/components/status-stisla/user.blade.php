@if (auth()->user()->hasRole('marine'))
   <span>SUPER USER</span>
   @elseif(auth()->user()->hasRole('department'))
   <span>FIELD USER</span>
   @elseif(auth()->user()->hasRole('admin-dsp'))
   <span>ADMIN DSP</span>
   @elseif(auth()->user()->hasRole('admin-vdr'))
   <span>ADMIN VDR</span>
   @elseif(auth()->user()->hasRole('suptent'))
   <span>SUPER INTENDENT</span>
   @elseif(auth()->user()->hasRole('chief'))
   <span>Mr. Luthfi</span>
   @else
@endif