<div class="card">
   <div class="card-header d-flex justify-content-between">
      <b>SUMMARY OF DAILY FUEL, WATER and CARGOS REMAINING ONBOARD     </b>
   </div>
   <form action="{{route('vdr.update.cargo')}}" method="POST">
      @csrf
      @method('PUT')
      <input type="hidden" name="vdr_id" value="{{$vdr->id}}">
   <div class="card-body py-0">
      {{-- <div class="table-responsive"> --}}
         <table class="table table-striped table-sm">
            <thead>
               <tr class="text-center align-middle">
                   <th>TYPE</th>
                   <th>Opening <br> (ROB from Previous Day)</th>
                   <th>Consumption <br> (Based on Actual Sounding)</th>
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
                       <td class="text-right align-middle">
                           <input type="number" name="opening[]" class="form-control" value="{{$cargo->opening}}">
                       </td>
                       <td class="text-left align-middle">
                           @if($cargo->heading->is_consumption == '1')
                           <input type="number" name="consumption[]" class="form-control" value="{{$cargo->consumption}}">
                           @else
                           <input type="hidden" name="consumption[]" class="form-control" value="{{$cargo->consumption}}">
                           @endif
                       </td>
                       <td class="text-left align-middle">
                           <input type="number" name="received[]" class="form-control" value="{{$cargo->received}}">
                       </td>
                       <td class="text-left align-middle">
                           <input type="number" name="transferred[]" class="form-control" value="{{$cargo->transferred}}">
                       </td>
                       <td class="text-left align-middle">
                           <input type="text" name="closing[]" readonly class="form-control" value="{{$cargo->closing}}">
                       </td>
                       <td class="text-left align-middle">
                           <input type="text" name="remarks[]" class="form-control" value="{{$cargo->remarks}}">
                       </td>
                   </tr>



                   @endforeach

           </tbody>
         </table>
     {{-- </div> --}}
   </div>
   <div class="card-footer">
      <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Save</button>
   </div>
   </form>
</div>