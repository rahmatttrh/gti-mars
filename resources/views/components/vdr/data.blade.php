

<form action="{{route('vdr.update.operating')}}" method="POST">
   @csrf
   @method('PUT')
   <input type="hidden" name="vdr_id" value="{{$vdr->id}}">
   
         <table class=" table-striped ">
            <thead>
               <tr class="text-center ">
                  <th class="">Operating Mode</th>
                  <th>Total Time</th>
                  <th>Min. Speed as Contract (Knots) <br> </th>
                  <th >Contractual Fuel Cons. </th>
                  <th>Daily Fuel Cons. </th>
               </tr>
            </thead>
            <tbody>
               
                  @foreach ($operatings as $operating)
                  <tr id="baris-{{$operating->id}}">
                     <!-- <td> -->
                     <input type="hidden" name="id[]" value="{{$operating->id}}">
                     <!-- </td> -->
                     <td> {{$operating->heading->description}} </td>
                     <td class="text-center align-middle">
                        {{getTotalHours($operating->time)}}
                           <input type="text" name="time[]" readonly hidden  value="{{$operating->time}}">
                     </td>
                     <td class="text-center align-middle">
                           @if($operating->heading->speed == '1')
                           <input type="number" name="speed[]"  value="{{$operating->speed}}">
                           @else
                           <input type="hidden" name="speed[]"  value="{{$operating->speed}}">
                           @endif
                     </td>

                     <td class="text-center align-middle">
                           @if($operating->heading->contractual == '1')
                           <input type="number" name="contractual_fuel[]"  value="{{$operating->contractual_fuel}}">
                           @else
                           <input type="hidden" name="contractual_fuel[]"  value="{{$operating->contractual_fuel}}">
                           @endif
                     </td>
                     <td class="text-center align-middle">


                           @if($operating->heading->daily == '1')
                           <input type="text" readonly name="daily[]"  value="{{$operating->daily}}">
                           @else
                           <input type="hidden" readonly name="daily[]"  value="{{$operating->daily}}">
                           @endif
                     </td>
                  </tr>
                  @endforeach
                  <tr>
                     <th>Total Daily</th>
                     <th class="text-center">
                           {{$totaljam}}
                     </th>
                     <th colspan="2"></th>
                     <th>
                           {{$totaldaily}} Ltrs
                     </th>
                  </tr>

               
            </tbody>
         </table>
         @if (auth()->user()->hasRole('vessel'))
            @if ($vdr->status == 0 || $vdr->status == 101 || $vdr->status == 202 || $vdr->status == 303) 
            <hr>
            <button type="submit" class="btn btn-info"> <i class="fa fa-save"></i> Save</button>
            @endif
         @endif


         @if (auth()->user()->hasRole('administrator'))
         <hr>
            <button type="submit" class="btn btn-info"> <i class="fa fa-save"></i> Save</button>
         @endif


         
</form>