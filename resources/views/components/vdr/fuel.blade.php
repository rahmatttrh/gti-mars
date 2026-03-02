<form action="{{route('vdr.update.cargo')}}" method="POST">
   @csrf
   @method('PUT')
   <input type="hidden" name="vdr_id" value="{{$vdr->id}}">
      <table class=" table-striped ">
         <thead>
            <tr class="text-center align-middle">
               <th style="width: 120px">TYPE</th>
               <th style="width: 100px">Opening <br> <small>(ROB from Previous Day)</small></th>
               <th style="width: 100px" >Actual Consumption <br> <small>(Based on Actual Sounding)</small></th>
               <th style="width: 100px">Received</th>
               <th style="width: 100px">Transferred</th>
               <th style="width: 100px">Closing</th>
               <th style="width: 180px">Remarks</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($cargos as $cargo)
               <tr>
                  <!-- <td> -->
                  <input type="hidden" name="id[]" value="{{$cargo->id}}">
                  <!-- </td> -->
                  <td> {{$cargo->heading->description}} </td>
                  <td class="text-center align-middle" >
                        <input type="number" name="opening[]" style="width: 100px"  value="{{$cargo->opening}}">
                  </td>
                  
                        @if($cargo->heading->is_consumption == '1')
                        <td class="text-center align-middle">
                           <input type="hidden" style="width: 100px" readonly name="consumption[]"  value="{{$cargo->consumption}}">
                           <span class="my-2">{{$cargo->consumption}}</span>
                        </td>
                        @else
                        <td class="" style="background-color: rgb(167, 171, 170)">
                        <input type="hidden" style="width: 100px" readonly name="consumption[]"  value="{{$cargo->consumption}}">
                        </td>
                        @endif
                  
                  <td class="text-center align-middle">
                        <input type="number" name="received[]" style="width: 100px"  value="{{$cargo->received}}">
                  </td>
                  <td class="text-center align-middle">
                        <input type="number" name="transferred[]" style="width: 100px"  value="{{$cargo->transferred}}">
                  </td>
                  <td class="text-center align-middle">
                     @if($cargo->heading->is_consumption == '1')
                        <input type="text" name="closing[]" style="width: 100px"   value="{{$cargo->closing}}">
                        @else
                        <span class="my-2">{{ $cargo->closing}}</span>
                        <input type="text" hidden name="closing[]" style="width: 100px"   value="{{$cargo->closing}}">
                     @endif
                  </td>
                  <td class="text-center align-middle"  >
                        <input type="text" name="remarks[]" style="min-width: 300px"  value="{{$cargo->remarks}}">
                  </td>
               </tr>
            @endforeach
         </tbody>
      </table>
      <small>*Value <b>Actual Consumption Fuel Oil</b> akan terisi otomatis setelah data <b>Special Calculation</b> terisi</small>
      @if (auth()->user()->hasRole('vessel'))
         @if ($vdr->status == 0 || $vdr->status == 101 || $vdr->status == 202 || $vdr->status == 303) 
         <hr>
         <button type="submit" class="btn btn-info "> <i class="fa fa-save"></i> Save</button>
         @endif
      @endif

      @if (auth()->user()->hasRole('superuser'))
      <hr>
         <button type="submit" class="btn btn-info "> <i class="fa fa-save"></i> Save</button>
      @endif
   
</form>