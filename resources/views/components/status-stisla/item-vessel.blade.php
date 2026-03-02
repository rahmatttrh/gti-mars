@if ($item->schedule_id != null)
   @if ($item->schedule->vessel_id == 7)
   {{-- Triton Jawara --}}
   <td class="text-center" style="background-color: rgb(255, 231, 16)">A</td>
   @elseif($item->schedule->vessel_id == 2)
   {{-- Transko Balihe --}}
   <td class="text-white text-center" style="background-color: rgb(244, 66, 66)">B</td>
   {{-- @elseif($item->schedule->vessel_id == 7)
   SK Canopus
   <td class="text-center" style="background-color: rgb(184, 152, 46)">C</td> --}}
   @elseif($item->schedule->vessel_id == 3)
   {{-- Logindo Overcomer --}}
   <td class="text-center" style="background-color: rgb(89, 192, 51)">D</td>
   @elseif($item->schedule->vessel_id == 9)
   {{-- Elok Jaya --}}
   <td class="text-center text-white" style="background-color: rgb(41, 95, 134)">E</td>
   @elseif($item->schedule->vessel_id == 4)
   {{-- Indoliziz Satu --}}
   <td class="text-center" style="background-color: rgb(172, 236, 149)">F</td>
   @elseif($item->schedule->vessel_id == 11)
   {{-- Giat Jaya --}}
   <td class="text-center" style="background-color: rgb(129, 181, 245)">G</td>
   @elseif($item->schedule->vessel_id == 6 || $item->schedule->vessel_id == 36)
   {{-- Sigap Jaya --}}
   <td class="text-center" style="background-color: rgb(241, 156, 38)">L</td>
   @elseif($item->schedule->vessel_id == 1)
   {{-- Transko Moloko --}}
   <td class="text-center" style="background-color: rgb(213, 226, 131)">G</td>
   @else
   <td class="text-center" style="background-color: rgb(248, 154, 87)"></td>
   @endif

   @else
   <td class="text-center" style="background-color: rgb(248, 154, 87)"></td>
@endif
