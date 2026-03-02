<form action="{{route('vdr.update.engine')}}" method="POST">
   @csrf
   @method('PUT')
   <input type="hidden" name="vdr_id" value="{{$vdr->id}}">
   <div class="table-responsive">
      <table class="table table-striped table-sm">
         <thead>
            <tr>
               <th rowspan="2" class="text-center align-middle">No</th>
               <th rowspan="2" class="text-center align-middle">Observed Data / Indicators </th>
               <th rowspan="2" class="text-center align-middle">Unit</th>
               <th colspan="6" class="text-center">Main Engines Data</th>
               <th colspan="6" class="text-center">Aux. Engines Data</th>
            </tr>
            <tr>
               <th style="width: 10px" >Ref. Value</th>
               <th>Port</th>
               <th>Stbd</th>
               <th>Center</th>
               <th>Other</th>
               <th>Ref. Value</th>
               <th>Port</th>
               <th>Stbd</th>
               <th>Other</th>
            </tr>
         </thead>
         <tbody>  
            @foreach ($engines as $key => $engine)
            <input type="hidden" name="id[]" value="{{$engine->id}}">
            <tr>
               <td>{{$key+1}}</td>
               <td class="col-md-3">{{$engine->heading->description}}</td>
               <td>{{$engine->heading->unit}}</td>
               <td>
                  <input style="width: 70px" type="number" min="0" name="m_ref[]" value="{{$engine->m_ref}}">
               </td>
               <td>
                  <input style="width: 70px" type="number" min="0" name="m_port[]" value="{{$engine->m_port}}">
               </td>
               <td>
                  <input style="width: 70px" type="number" min="0" name="m_stbd[]" value="{{$engine->m_stbd}}">
               </td>
               <td>
                  <input style="width: 70px" type="number" min="0" name="m_center[]" value="{{$engine->m_center}}">
               </td>
               <td>
                  <input style="width: 70px" type="number" min="0" name="m_other[]" value="{{$engine->m_other}}">
               </td>
               <td>
                  <input style="width: 70px" type="number" min="0" name="a_ref[]" value="{{$engine->a_ref}}">
               </td>
               <td>
                  <input style="width: 70px" type="number" min="0" name="a_port[]" value="{{$engine->a_port}}">
               </td>
               <td>
                  <input style="width: 70px" type="number" min="0" name="a_stbd[]" value="{{$engine->a_stbd}}">
               </td>
               <td>
                  <input style="width: 70px" type="number" min="0" name="a_other[]" value="{{$engine->a_other}}">
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </div>
   @if (auth()->user()->hasRole('vessel'))
         @if ($vdr->status == 0 || $vdr->status == 101 || $vdr->status == 202 || $vdr->status == 303) 
         <button type="submit" class="btn btn-info btn-sm"> <i class="fa fa-save"></i> Save</button>
         @endif
      @endif
</form>