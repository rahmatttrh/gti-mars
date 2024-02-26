<form action="{{route('vdr.update.cargo')}}" method="POST">
   @csrf
   @method('PUT')
   <input type="hidden" name="vdr_id" value="{{$vdr->id}}">
      <table class=" table-striped ">
         <thead>
            <tr class="text-center align-middle">
               <th>TYPE</th>
               <th>Opening <br> <small>(ROB from Previous Day)</small></th>
               <th>Consumption <br> <small>(Based on Actual Sounding)</small></th>
               <th>Received</th>
               <th>Transferred</th>
               <th>Closing</th>
               <th>Remarks</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($cargos as $cargo)
               <tr>
                  <!-- <td> -->
                  <input type="hidden" name="id[]" value="{{$cargo->id}}">
                  <!-- </td> -->
                  <td> {{$cargo->heading->description}} </td>
                  <td class="text-center align-middle">
                        <input type="number" name="opening[]"  value="{{$cargo->opening}}">
                  </td>
                  <td class="text-center align-middle">
                        @if($cargo->heading->is_consumption == '1')
                        <input type="number" name="consumption[]"  value="{{$cargo->consumption}}">
                        @else
                        <input type="hidden" name="consumption[]"  value="{{$cargo->consumption}}">
                        @endif
                  </td>
                  <td class="text-center align-middle">
                        <input type="number" name="received[]"  value="{{$cargo->received}}">
                  </td>
                  <td class="text-center align-middle">
                        <input type="number" name="transferred[]"  value="{{$cargo->transferred}}">
                  </td>
                  <td class="text-center align-middle">
                        <input type="text" name="closing[]" readonly  value="{{$cargo->closing}}">
                  </td>
                  <td class="text-center align-middle">
                        <input type="text" name="remarks[]"  value="{{$cargo->remarks}}">
                  </td>
               </tr>
            @endforeach
         </tbody>
      </table>
      @if (auth()->user()->hasRole('vessel'))
         @if ($vdr->status == 0 || $vdr->status == 101 || $vdr->status == 202 || $vdr->status == 303) 
         <hr>
         <button type="submit" class="btn btn-info "> <i class="fa fa-save"></i> Save</button>
         @endif
      @endif
   
</form>