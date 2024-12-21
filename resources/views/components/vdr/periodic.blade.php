<form action="{{route('vdr.update.periodic')}}" method="POST">
   @csrf
   @method('PUT')
   <input type="hidden" name="vdr_id" value="{{$vdr->id}}">
   <input type="integer" name="periodic" id="periodic" value="{{$periodic->id}}" hidden>
      <table class=" table-striped ">
         <thead>
            <tr>
               <th colspan="2" class="py-3">
                  Periodical Fuel ROB Check/ Control by Company Reps. and Surveyor
               </th>
            </tr>
            <tr class=" align-middle">
               {{-- <th rowspan="2" style="min-width: 100px">Periodical Fuel ROB Check/ Control by Company Reps. and Surveyor</th> --}}
               <th>Description</th>
               <th>Value</th>
               
            </tr>
            <tr>
               <td>Activity</td>
               <td>
                  <select name="activity" style="height: 35px" id="actitivy" >
                     <option {{$periodic->activity == 'Spot Check' ? 'selected' : '-'}} value="Spot Check">Spot Check</option>
                     <option {{$periodic->activity == 'Pre-Bunker Check' ? 'selected' : '-'}} value="Pre-Bunker Check">Pre-Bunker Check</option>
                     <option {{$periodic->activity == 'Not Applicable' ? 'selected' : '-'}} value="Not Applicable">Not Applicable</option>
                  </select>
               </td>
            </tr>
            <tr>
               <td>ROB Check Time</td>
               <td>
                  <input   type="time" name="rob_time" id="rob_time" value="{{$periodic->rob_time}}">
               </td>
            </tr>
            <tr>
               <td>ROB by VDR at Check Time</td>
               <td><input style="width: 100px"  type="number" name="rob_value" id="rob_value" value="{{$periodic->rob_value}}" ></td>
            </tr>
            <tr>
               <td>Actual ROB at Check Time</td>
               <td>
                  <input style="width: 100px"  type="number" name="rob_actual" id="rob_actual" value="{{$periodic->rob_actual}}">
               </td>
            </tr>
            <tr>
               <td class="py-2">ROB Difference</td>
               <td>
                  <span class="my-3">{{$periodic->rob_diff}}</span>
                  <input style="width: 100px" hidden  type="number" readonly value="{{$periodic->rob_diff}}">
               </td>
            </tr>
            
         </thead>
         <tbody>
            
         </tbody>
      </table>
      @if (auth()->user()->hasRole('vessel'))
         @if ($vdr->status == 0 || $vdr->status == 101 || $vdr->status == 202 || $vdr->status == 303) 
         <hr>
         <button type="submit" class="btn btn-info "> <i class="fa fa-save"></i> Save</button>
         @endif
      @endif

      @if (auth()->user()->hasRole('marine'))
      <hr>
      <button type="submit" class="btn btn-info "> <i class="fa fa-save"></i> Save</button>
      @endif
   
</form>