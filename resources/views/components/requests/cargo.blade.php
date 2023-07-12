<div class="card card-lg">
   <div class="table-responsive">
      <table class="table table-vcenter card-table">
         <thead>
            <tr>
               <th>No</th>
               <th>Desc</th>
               <th class="text-center">Qty</th>
               <th class="text-center">Drop</th>
               <th class="text-center">Onboard</th>
               <th class="text-end">Unit</th>
               <th class="text-center">Size (m<sup>2</sup>)</th>
               <th class="text-center">Weight (ton)</th>
               @if ($request->status == 10 && auth()->user()->hasRole('department'))
                  <th>Action</th>
               @endif
            </tr>
         </thead>
         <tbody>
            @if ($cargos->count() > 0)
               @foreach ($cargos as $item)   
                  <tr>
                     <td class="text-muted">
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
                     <td class="text-muted  text-nowrap">
                        {{$item->desc}} <br>
                        <small>#{{$item->remark}}Testing</small>
                     </td>
                     <td class="text-muted text-center">{{$item->qty}}</td>
                     <td class="text-muted text-center">{{$item->offloading ? $item->offloading->offloading : '-'}}</td>
                     <td class="text-muted">
                        {{$item->offloading ? $item->offloading->onboard : '-'}} <br>
                        # {{$item->offloading->desc ?? '-'}}
                     </td>
                     <td class="text-muted text-end">{{$item->unit}}</td>
                     <td class="text-muted text-center">{{$item->size}}</td>
                     <td class="text-muted text-center">{{$item->weight}}</td>
                     
                     {{-- <td>
                        @if ($request->status == 0)
                        <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCargoItem_{{$item->id}}">Delete</a>
                        @endif
                     </td> --}}
                     @if ($request->status == 10 && auth()->user()->hasRole('department'))
                        <td>
                           @if ($item->status == 1)
                              <a href="#" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#confirmCargo_{{$item->id}}">Confirm</a>
                              @else
                              -
                           @endif
                        </td>
                     @endif
                  </tr>
                  <x-modal.cargo.delete :item="$item" />
                  <x-modal.cargo.confirm :cargo="$item" />
               @endforeach
               <tr>
                  @if ($request->status >= 10 && auth()->user()->hasRole('department'))
                     <td colspan="7" class="text-muted text-end">Total</td>
                     @else
                     <td colspan="6" class="text-muted text-end">Total</td>
                  @endif
                  <td class="text-muted text-center">{{$request->total_size}}</td>
                  <td class="text-muted text-center">{{$request->total_weight}}</td>
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
  