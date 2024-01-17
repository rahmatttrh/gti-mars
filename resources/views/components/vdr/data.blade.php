

<form action="{{route('vdr.update.operating')}}" method="POST">
   @csrf
   @method('PUT')
   <input type="hidden" name="vdr_id" value="{{$vdr->id}}">
   
         <table class="table table-striped table-sm">
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
                  @if($operating->heading->daily == '1')
                     
                        <input type="text" hidden readonly disabled name="daily[]"  value="{{round($operating->daily)}}">
                        
                     
                  @else
                     <input type="hidden" hidden readonly disabled name="daily[]"  value="{{$operating->daily}}">
                  @endif
                  <tr id="baris-{{$operating->id}}">
                     <!-- <td> -->
                     <input type="hidden" name="id[]" value="{{$operating->id}}">
                     <input type="text" hidden name="time[]"  value="{{$operating->time}}">
                     <!-- </td> -->
                     <td> {{$operating->heading->description}} </td>
                     <td class="text-center">
                        {{$operating->time}}
                     </td>
                     <td class="text-center">
                           @if($operating->heading->speed == '1')
                           <input type="number" name="speed[]"  value="{{$operating->speed}}">
                           @else
                           <input type="hidden" name="speed[]"  value="{{$operating->speed}}">
                           @endif
                     </td>

                     <td class="text-center">
                           @if($operating->heading->contractual == '1')
                           <div class="input-group">
                              <input  type="number" name="contractual_fuel[]"  value="{{$operating->contractual_fuel}}">
                              
                           </div>
                           @else
                           <input type="hidden" name="contractual_fuel[]"  value="{{$operating->contractual_fuel}}">
                           @endif
                     </td>
                     <td class="text-center">


                           @if($operating->heading->daily == '1')
                           {{round($operating->daily)}}
                           {{-- <div class="input-group ">
                              <input type="text" readonly disabled name="daily[]"  value="{{round($operating->daily)}}">
                              
                           </div> --}}
                           @else
                           {{$operating->daily}}
                           @endif
                     </td>
                  </tr>
                  @endforeach
                  <tr>
                     <th>Total Daily</th>
                     <th>
                           {{$totaljam}}
                     </th>
                     <th colspan="2"></th>
                     <th>
                           {{round($totaldaily)}} Ltrs
                     </th>
                  </tr>

               
            </tbody>
         </table>
         <button type="submit" class="btn btn-primary btn-sm"> <i class="fa fa-save"></i> Save</button>
</form>