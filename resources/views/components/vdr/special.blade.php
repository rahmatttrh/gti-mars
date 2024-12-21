<form action="{{route('vdr.update.special')}}" method="POST">
   @csrf
   @method('PUT')
   <input type="hidden" name="vdr_id" value="{{$vdr->id}}">
   <input type="integer" name="periodic" id="periodic" value="{{$periodic->id}}" hidden>
      <table class=" table-striped ">
         <thead>
            <tr>
               <td colspan="4" class="py-3">
                  <b>Special Calculation</b> <br>
                  Applicable only for Periodical Fuel ROB Check/Control by Company Reps. and Surveyor
               </td>
            </tr>
            <tr class="align-middle">
               {{-- <th rowspan="2" style="min-width: 100px">
                  
               </th> --}}
               <th>Description</th>
               <th>Value</th>
            </tr>
            <tr>
               <td>Fuel Cons. by Remuneration or Actual, from 00:00 hours to Check Time (Manual input based on joint calculation by all parties)</td>
               <td ><input style="width: 100px"  type="number" name="fuel_cons_remu" id="fuel_cons_remu" value="{{$periodic->fuel_cons_remu}}"></td>
            </tr>
            <tr>
               <td>Part 1: Corrected Fuel Cons. from 00:00 hours to Check Time (based on calculation by applying ROB Difference) <br>
                  <i>Note: Refer to ROB COrrection Rules</i>
               </td>
               <td >
                  <input style="width: 100px" hidden type="number" name="fuel_cons_correct" id="fuel_cons_correct" value="{{$periodic->fuel_cons_correct}}">
                  <span class="my-2">{{$periodic->fuel_cons_correct}}</span>
               </td>
               
            </tr>
            <tr>
               <td>Part 2: Actual Fuel Cons. from Check Time to 24:00 hours (manual input based on actual sounding)</td>
               <td ><input style="width: 100px"  type="number" name="fuel_cons_actual" id="fuel_cons_actual" value="{{$periodic->fuel_cons_actual}}"></td>
            </tr>
            <tr>
               <th>Total Actual Daily Fuel Consumption = (Part 1 + Part 2)</th>
               <th class=" py-2">
                  <span >{{$periodic->fuel_cons_total}}</span>
               </th>
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