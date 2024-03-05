@if ($request->schedule->vessel_id == 7)
   {{-- Triton Jawara --}}
   <td class="text-center" style="background-color: rgb(255, 231, 16)">A</td>
   @elseif($request->schedule->vessel_id == 2)
   {{-- Transko Balihe --}}
   <td class="text-white text-center" style="background-color: rgb(244, 66, 66)">B</td>
   {{-- @elseif($request->schedule->vessel_id == 7)
   SK Canopus
   <td class="text-center" style="background-color: rgb(184, 152, 46)">C</td> --}}
   @elseif($request->schedule->vessel_id == 3)
   {{-- Logindo Overcomer --}}
   <td class="text-center" style="background-color: rgb(89, 192, 51)">D</td>
   @elseif($request->schedule->vessel_id == 9)
   {{-- Elok Jaya --}}
   <td class="text-center text-white" style="background-color: rgb(41, 95, 134)">E</td>
   @elseif($request->schedule->vessel_id == 4)
   {{-- Indoliziz Satu --}}
   <td class="text-center" style="background-color: rgb(172, 236, 149)">F</td>
   @elseif($request->schedule->vessel_id == 11)
   {{-- Giat Jaya --}}
   <td class="text-center" style="background-color: rgb(129, 181, 245)">G</td>
   @elseif($request->schedule->vessel_id == 6 || $request->schedule->vessel_id == 36)
   {{-- Sigap Jaya --}}
   <td class="text-center" style="background-color: rgb(241, 156, 38)">L</td>
   @elseif($request->schedule->vessel_id == 1)
   {{-- Transko Moloko --}}
   <td class="text-center" style="background-color: rgb(213, 226, 131)">G</td>
   @else
   <td>-</td>
@endif