<div class="card">
   <div class="card-header d-flex justify-content-between">
      <b>SUMMARY OF DAILY OPERATING DATA      </b>
   </div>
   <form action="{{route('vdr.update.operating')}}" method="POST">
      @csrf
      @method('PUT')
      <input type="hidden" name="vdr_id" value="{{$vdr->id}}">
      <div class="card-body py-0">
         {{-- <div class="table-responsive"> --}}
            <table class="table table-striped table-sm">
               <thead>
                  <tr class="text-center align-middle">
                     <th class="">Operating Mode</th>
                     <th>Total Time <br> (hh:mm)</th>
                     <th>Min. Speed as Contract (Knots) <br> </th>
                     <th>Contractual Fuel Cons. Remuneration Figures</th>
                     <th>Daily Fuel Cons. by Remuneration Figure</th>
                  </tr>
            </thead>
            <tbody>
                  
                     @foreach ($operatings as $operating)
                     <tr id="baris-{{$operating->id}}">
                        <!-- <td> -->
                        <input type="hidden" name="id[]" value="{{$operating->id}}">
                        <!-- </td> -->
                        <td> {{$operating->heading->description}} </td>
                        <td class="text-left align-middle">
                              <input type="text" name="time[]" readonly class="form-control" value="{{$operating->time}}">
                        </td>
                        <td class="text-right align-middle">
                              @if($operating->heading->speed == '1')
                              <input type="number" name="speed[]" class="form-control" value="{{$operating->speed}}">
                              @else
                              <input type="hidden" name="speed[]" class="form-control" value="{{$operating->speed}}">
                              @endif
                        </td>

                        <td class="text-left align-middle">
                              @if($operating->heading->contractual == '1')
                              <div class="input-group mb-3">
                                 <input type="number" name="contractual_fuel[]" class="form-control" value="{{$operating->contractual_fuel}}">
                                 <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">L/H</span>
                                 </div>
                              </div>
                              @else
                              <input type="hidden" name="contractual_fuel[]" class="form-control" value="{{$operating->contractual_fuel}}">
                              @endif
                        </td>
                        <td class="text-left align-middle">


                              @if($operating->heading->daily == '1')
                              <div class="input-group mb-3">
                                 <input type="text" readonly name="daily[]" class="form-control" value="{{round($operating->daily)}}">
                                 <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">Ltrs</span>
                                 </div>
                              </div>
                              @else
                              <input type="hidden" readonly name="daily[]" class="form-control" value="{{$operating->daily}}">
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
      {{-- </div> --}}
      </div>
      <div class="card-footer">
         <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Save</button>
      </div>
   </form>
</div>