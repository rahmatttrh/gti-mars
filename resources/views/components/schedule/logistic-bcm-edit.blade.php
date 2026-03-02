<div class="row">
   <div class="col-md-6">
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
                     <th colspan="2" class="py-2 bg-grey text-white" >EDIT BCM</th>
                     {{-- <th><a href="{{route('schedule.detail', enkripRambo($schedule->id))}}">BACK</a></th> --}}
                  </tr>
               </thead>
               
               <thead>
                  <tr class="">
                     <th colspan="">BCM No. {{$cargo->code}}</th>
                     <th>{{$cargo->origin->code}} - {{$cargo->destination->code}}</th>
                     {{-- <th colspan="4">{{$cargo->origin->code}} - {{$cargo->destination->code}}</th> --}}
                     
                     
                  </tr>
               </thead>
               <tbody>
                  @foreach ($cargo->items as $item)
                  <tr>
                     
                     <td>MTD No. {{$item->mtd}}</td>
                     <td>{{$item->desc}}</td>
                  </tr>
                  @endforeach
                  
               </tbody>
               
            </table>
         </div>
      </div>
   </div>
   <div class="col-md-6">
      <form action="{{route('cargo.update')}}" method="POST">
         @method('PUT')
         @csrf
         <input type="number" name="cargo" id="cargo" value="" hidden>
         <input type="text" name="mtd" id="mtd" value="" hidden>
         <div class="form-row">
            <div class="form-group col-md-12">
               <div class="input-group">
               <div class="input-group-prepend">
                  <div class="input-group-text">Along Side at</div>
               </div>
               <input type="datetime-local" class="form-control" id="desc" name="desc" value="{{$cargo->along}}">
               </div>
            </div>
            <div class="form-group col-md-12">
               <div class="input-group">
               <div class="input-group-prepend">
                  <div class="input-group-text">Start Loading</div>
               </div>
               <input type="datetime-local" class="form-control" id="desc" name="desc" value="{{$cargo->start}}">
               </div>
            </div>
         </div>
         <div class="form-row">
            <div class="form-group col-md-12">
               <div class="input-group">
               <div class="input-group-prepend">
                  <div class="input-group-text">Finish Loading</div>
               </div>
               <input type="datetime-local" class="form-control" id="desc" name="desc" value="{{$cargo->finish}}">
               </div>
            </div>
            <div class="form-group col-md-12">
               <div class="input-group">
               <div class="input-group-prepend">
                  <div class="input-group-text">Departed to Field</div>
               </div>
               <input type="datetime-local" class="form-control" id="desc" name="desc" value="{{$cargo->depart}}">
               </div>
            </div>
         </div>
     

      <div class="form-row">
         <div class="form-group col-md-12">
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">Remark</div>
              </div>
              <input type="text" class="form-control" id="contract" name="contract" value="{{$cargo->remark}}">
            </div>
         </div>
         {{-- <div class="form-group col-md-12">
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">Notes</div>
              </div>
              <input type="text" class="form-control" id="note" name="note" value="" >
            </div>
         </div> --}}
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










