<div class="card">
   <div class="card-header">
      <b>WEATHER CONDITION</b>
   </div>
   <form action="{{route('vdr.update.weather')}}" method="post">
      @csrf
      @method('PUT')
      <div class="card-body p-0">
         {{-- <div class="table-responsive"> --}}
            <table class="table table-striped">
               <thead>
                  <tr>
                        <th class="text-center col-md-3">Weather / Time</th>
                        <th>00:00 - 06:00 hrs</th>
                        <th>06:00 - 12:00 hrs</th>
                        <th>12:00 - 18:00 hrs</th>
                        <th>18:00 - 24:00 hrs</th>
                  </tr>
               </thead>
               <tbody>
                  
                        @foreach ($weathers as $weather)
                        <input type="hidden" name="vdr_id" value="{{$vdr->id}}">
                        <input type="hidden" name="id[]" value="{{$weather->id}}">
                        <tr>
                           <td>{{$weather->heading->description}}</td>
                           <td>
                              <input type="text" class="form-control" name="t_0006[]" value="{{ $weather->t_0006  }}">
                           </td>
                           <td>
                              <input type="text" class="form-control" name="t_0612[]" value="{{ $weather->t_0612  }}">
                           </td>
                           <td>
                              <input type="text" class="form-control" name="t_1218[]" value="{{ $weather->t_1218  }}">
                           </td>
                           <td>
                              <input type="text" class="form-control" name="t_1824[]" value="{{ $weather->t_1824  }}">
                           </td>
                        </tr>

                        @endforeach
                        
                  
               </tbody>
            </table>
      {{-- </div> --}}
      </div>
      <div class="card-footer">
         <button class="btn btn-primary" type="submit">Save</button>
      </div>
   </form>
</div>