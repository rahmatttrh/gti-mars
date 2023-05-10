@if ($request->activity->type_id == 1)
   <div class="card card-lg">
      <div class="table-responsive">
         <table class="table table-vcenter card-table">
            <thead>
               <tr>
                  {{-- <th>No.</th> --}}
                  <th>No Document</th>
                  <th>Desc</th>
                   <th>Remarks</th>
                  <th class="text-center">Qty</th>
                  <th class="text-end">Unit</th>
                  <th class="text-center">Size (m<sup>2</sup>)</th>
                  <th class="text-center">Weight (ton)</th>
                 
                  {{-- <th></th> --}}
               </tr>
            </thead>
            <tbody>
               @if ($cargos->count() > 0)
                  @foreach ($cargos as $item)
                     <tr>
                        {{-- <td class="text-muted">{{++$i}}</td> --}}
                        <td class="text-muted">
                           {{-- {{$item->no_doc}} --}}
                           <div class="dropdown">
                              @if ($request->status ==0)
                                 <a href="#" class="dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                                    {{$item->no_doc}}
                                 </a>
                                 <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#deleteCargoItem_{{$item->id}}">
                                       Delete
                                    </a>
                                 </div>
                                 @else
                                 {{$item->no_doc}} 
                              @endif
                           </div>
                        </td>
                        <td class="text-muted">
                           {{$item->desc}} 
                           {{-- <small>{{$item->remark}}</small> --}}
                        </td>
                        <td class="text-muted">{{$item->remark}}</td>
                        <td class="text-muted text-center">{{$item->qty}}</td>
                        <td class="text-muted text-end">{{$item->unit}}</td>
                        <td class="text-muted text-center">{{$item->size}}</td>
                        <td class="text-muted text-center">{{$item->weight}}</td>
                        
                        {{-- <td>
                           @if ($request->status == 0)
                           <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCargoItem_{{$item->id}}">Delete</a>
                           @endif
                        </td> --}}
                     </tr>
                     <x-modal.cargo.delete :item="$item" />
                  @endforeach
                  <tr>
                     <td colspan="5" class="text-muted text-end">Total</td>
                     <td class="text-muted text-center">{{$request->total_size}}</td>
                     <td class="text-muted text-center">{{$request->total_weight}}</td>
                     {{-- <td></td> --}}
                  </tr>
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
                        <td class="text-muted">{{$item->number}}</td>
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