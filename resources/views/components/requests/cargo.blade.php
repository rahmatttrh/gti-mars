@if ($request->activity->type_id == 1)
   <div class="card card-lg">
      <div class="table-responsive">
         <table class="table table-vcenter card-table">
            <thead>
               <tr>
                  {{-- <th>No.</th> --}}
                  <th>No Document</th>
                  <th>Desc</th>
                  <th>Qty</th>
                  <th>Unit</th>
                  <th>Size</th>
                  <th>Weight</th>
                  <th>Remarks</th>
                  <th></th>
               </tr>
            </thead>
            <tbody>
               @if ($cargos->count() > 0)
                  @foreach ($cargos as $item)
                     <tr>
                        {{-- <td class="text-muted">{{++$i}}</td> --}}
                        <td class="text-muted">
                           {{$item->no_doc}}
                        </td>
                        <td class="text-muted">{{$item->desc}}</td>
                        <td class="text-muted">{{$item->qty}}</td>
                        <td class="text-muted">{{$item->unit}}</td>
                        <td class="text-muted">{{$item->size}} m<sup>2</sup></td>
                        <td class="text-muted">{{$item->weight}} ton</td>
                        <td class="text-muted">{{$item->remark}}</td>
                        <td>
                           @if ($request->status == 0)
                           <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCargoItem_{{$item->id}}">Delete</a>
                           @endif
                        </td>
                     </tr>
                     <x-modal.cargo.delete :item="$item" />
                  @endforeach
                  @else
                  <tr>
                     <td colspan="9" style="text-align: center"><small>Empty</small></td>
                  </tr>
               @endif
            </tbody>
         </table>
      </div>
   </div> 
   @elseif($request->activity->type_id == 2 || $request->activity->type_id == 4 )
   <div class="card card-lg">
      <div class="table-responsive">
         <table class="table table-vcenter card-table">
            <thead>
               <tr>
                  {{-- <th>No.</th> --}}
                  <th>Number</th>
                  <th>Name</th>
                  
                  <th></th>
               </tr>
            </thead>
            <tbody>
               @if ($passengers->count() > 0)
                  @foreach ($passengers as $item)
                     <tr>
                        {{-- <td class="text-muted">{{++$i}}</td> --}}
                        <td class="text-muted">
                           {{$item->number}}
                        </td>
                        <td class="text-muted">{{$item->name}}</td>
                        
                        <td class="text-end">
                           @if ($request->status == 0)
                           <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deletePassengerItem_{{$item->id}}">Delete</a>
                           @endif
                        </td>
                     </tr>
                     <x-modal.passenger.delete :item="$item" />
                  @endforeach
                  @else
                  <tr>
                     <td colspan="9" style="text-align: center"><small>Empty</small></td>
                  </tr>
               @endif
            </tbody>
         </table>
      </div>
   </div> 
@endif