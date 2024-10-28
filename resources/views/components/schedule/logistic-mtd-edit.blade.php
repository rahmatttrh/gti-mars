<div class="row">
   <div class="col-md-4">
      <div class="card ">
         {{-- <div class="card-header p-2 "><h4><a href="{{route('schedule.detail', enkripRambo($schedule->id))}}">< BACK</a> | EDIT MTD </h4></div> --}}
         <div class="card-body p-0">
            <a href="{{route('schedule.detail', enkripRambo($schedule->id))}}" class="btn btn-light border  mb-2">
               <i class="fa fa-backward"></i>
               Back
            </a>
            <table>
               <thead>
                  <tr>
                     <th colspan="2" class="py-2 bg-grey text-white">EDIT MTD</th>
                     {{-- <th><a href="{{route('schedule.detail', enkripRambo($schedule->id))}}">BACK</a></th> --}}
                  </tr>
               </thead>
               @foreach ($cargos as $cargo)
               <thead>
                  <tr class="">
                     <th colspan="2">BCM No. {{$cargo->code}}</th>
                     {{-- <th colspan="4">{{$cargo->origin->code}} - {{$cargo->destination->code}}</th> --}}
                     
                     
                  </tr>
               </thead>
               <tbody>
                  @foreach ($items->where('cargo_id', $cargo->id) as $citem)
                  <tr>
                     {{-- <td></td> --}}
                     @if ($item->mtd == $citem->mtd)
                        <td colspan="2" class="bg-info text-white">MTD No. {{$citem->mtd}}</td>
                        @else
                        <td colspan="2">
                           <a href="{{route('logistic.edit.mtd', enkripRambo($citem->id))}}">MTD No. {{$citem->mtd}}</a>
                        </td>
                     @endif
                     
                     {{-- <td>{{$item->desc}}</td> --}}
                     
                     
                  </tr>
                  @endforeach
                  
               </tbody>
               @endforeach
               
            </table>
         </div>
      </div>
   </div>
   <div class="col-md-8">
      <form action="{{route('cargo.update')}}" method="POST">
         @method('PUT')
         @csrf
         <input type="number" name="cargo" id="cargo" value="{{$item->id}}" hidden>
         <input type="text" name="mtd" id="mtd" value="{{$item->mtd}}" hidden>
      <div class="form-row">
         <div class="form-group col-md-12">
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">Desc</div>
              </div>
              <input type="text" class="form-control" id="desc" name="desc" value="{{$item->description}}">
            </div>
         </div>
      </div>
      <div class="form-row">
         <div class="form-group col-md-3">
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">Kg</div>
              </div>
              <input type="number" class="form-control" id="weight" name="weight" value="{{$item->weight}}">
            </div>
         </div>
         <div class="form-group col-md-3">
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">Qty</div>
              </div>
              <input type="text" class="form-control" id="qty" name="qty" value="{{$item->qty}}" >
            </div>
         </div>
         <div class="form-group col-md-6">
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">Unit</div>
              </div>
              <input type="text" class="form-control" id="unit" name="unit" value="{{$item->unit}}" >
            </div>
         </div>
      </div>

      <div class="form-row">
         <div class="form-group col-md-12">
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">PO/Contract</div>
              </div>
              <input type="text" class="form-control" id="contract" name="contract" value="{{$item->contract}}">
            </div>
         </div>
         <div class="form-group col-md-12">
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">Notes</div>
              </div>
              <input type="text" class="form-control" id="note" name="note" value="{{$item->remark}}" >
            </div>
         </div>
         {{-- <div class="form-group col-md-12">
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">Attention</div>
              </div>
              <input type="text" class="form-control" id="unit" name="unit" >
            </div>
         </div> --}}
         
      </div>
      <hr>
      <button type="submit" class="btn btn-light border">Update</button>
      </form>
      
   </div>
</div>










