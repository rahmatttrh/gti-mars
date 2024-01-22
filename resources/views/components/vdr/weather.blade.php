<form action="{{route('vdr.update.weather')}}" method="post">
   @csrf
   @method('PUT')
      {{-- <div class="table-responsive"> --}}
         <table class="table table-striped table-sm">
            <thead>
               <tr>
                     <th class="text-center col-md-3">Weather / Time</th>
                     <th class="text-center">00:00 - 06:00 hrs</th>
                     <th class="text-center">06:00 - 12:00 hrs</th>
                     <th class="text-center">12:00 - 18:00 hrs</th>
                     <th class="text-center">18:00 - 24:00 hrs</th>
               </tr>
            </thead>
            <tbody>
               
                     @foreach ($weathers as $weather)
                     <input type="hidden" name="vdr_id" value="{{$vdr->id}}">
                     <input type="hidden" name="id[]" value="{{$weather->id}}">
                     <tr>
                        <td>{{$weather->heading->description}}</td>
                        <td class="text-center">
                           <input type="text"  name="t_0006[]" value="{{ $weather->t_0006  }}">
                        </td>
                        <td class="text-center">
                           <input type="text"  name="t_0612[]" value="{{ $weather->t_0612  }}">
                        </td>
                        <td class="text-center">
                           <input type="text"  name="t_1218[]" value="{{ $weather->t_1218  }}">
                        </td>
                        <td class="text-center">
                           <input type="text"  name="t_1824[]" value="{{ $weather->t_1824  }}">
                        </td>
                     </tr>

                     @endforeach
                     
               
            </tbody>
         </table>
   {{-- </div> --}}
   <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-save"></i> Save</button>
</form>