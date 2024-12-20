<form action="{{route('vdr.update.periodic')}}" method="POST">
   @csrf
   @method('PUT')
   <input type="hidden" name="vdr_id" value="{{$vdr->id}}">
   <input type="integer" name="periodic" id="periodic" value="{{$periodic->id}}" hidden>
      <table class=" table-striped ">
         <thead>
            <tr class="text-center align-middle">
               <th rowspan="2" style="min-width: 100px">Periodical Fuel ROB Check/ Control by Company Reps. and Surveyor</th>
               <th>Activity</th>
               <th>ROB <br> <small>Check Time</small>   </th>
               <th>ROB by VDR <br> <small>at Check Time</small></th>
               <th>Actual ROB <br><small>at Check Time</small></th>
               {{-- <th>ROB Different</th> --}}
               <th>Fuel Cons. by Remuneration</th>
               <th>Fuel Cons. Corrected</th>
               <th>Fuel Cons. Actual</th>
            </tr>
            <tr>
               <th class="text-center">
                  <select name="activity" style="width: 150px" id="actitivy">
                     <option {{$periodic->activity == 'Spot Check' ? 'selected' : '-'}} value="Spot Check">Spot Check</option>
                     <option {{$periodic->activity == 'Pre-Bunker Check' ? 'selected' : '-'}} value="Pre-Bunker Check">Pre-Bunker Check</option>
                     <option {{$periodic->activity == 'Not Applicable' ? 'selected' : '-'}} value="Not Applicable">Not Applicable</option>
                  </select>
                  {{-- <input style="width: 110px" type="number" name="opening[]"  > --}}
               </th>
               <th class="text-center"><input   type="time" name="rob_time" id="rob_time" value="{{$periodic->rob_time}}"></th>
               <th class="text-center"><input style="width: 100px"  type="number" name="rob_value" id="rob_value" value="{{$periodic->rob_value}}" ></th>
               <th class="text-center"><input style="width: 100px"  type="number" name="rob_actual" id="rob_actual" value="{{$periodic->rob_actual}}"></th>
               
               <th class="text-center"><input style="width: 100px" type="number" name="fuel_cons_remu" id="fuel_cons_remu" value="{{$periodic->fuel_cons_remu}}"></th>
               <th class="text-center"><input style="width: 100px" type="number" name="fuel_cons_correct" id="fuel_cons_correct" value="{{$periodic->fuel_cons_correct}}"></th>
               <th class="text-center"><input style="width: 100px" type="number" name="fuel_cons_actual" id="fuel_cons_actual" value="{{$periodic->fuel_cons_actual}}"></th>
               
               
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