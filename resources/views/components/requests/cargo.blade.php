<div class="card card-lg mb-4">
   <div class="table-responsive">
      <table class="table table-vcenter card-table">
         <thead>
            <tr>
               <th>{{$request->bcm ?? '-'}} / {{$request->department->name}} / {{$request->employee->name ?? ''}} </th>
            </tr>
            <tr>
               <th>{{$request->activity->name ?? ''}} - {{$request->description}}</th>
            </tr>
         </thead>
      </table>
      <table class="table table-vcenter card-table">
         <thead>
            <tr>
               <th>MTD</th>
               <th>Descriptive</th>
               {{-- <th>Remark</th> --}}
               <th>Contract</th>
               <th class="text-center">Qty</th>
               <th class="text-center">Drop</th>
               {{-- <th class="text-center">Onboard</th> --}}
               {{-- <th class="">Desc</th> --}}
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
                     <td class="text-muted  ">
                        {{$item->desc}} 
                     </td>
                     {{-- <td class="text-muted ">{{$item->remark ?? '-'}}</td> --}}
                     <td class="text-muted">{{$item->contract}}</td>
                     <td class="text-muted text-truncate" style="max-width: 75px">{{$item->qty}} {{$item->unit}}</td>
                     <td class="text-muted text-center">{{$item->offloading ? $item->offloading->offloading : '-'}}</td>
                     {{-- <td class="text-muted text-center">
                        {{$item->offloading ? $item->offloading->onboard : '-'}} # {{$item->offloading->desc ?? '-'}}
                       
                     </td> --}}
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
                              <x-modal.cargo.confirm :cargo="$item" :routes="$routes" :schedule="$request->schedule" />
                              @else
                              -
                           @endif
                        </td>
                     @endif
                  </tr>
                  <x-modal.cargo.delete :item="$item" />
                  
               @endforeach
               <tr>
                  @if ($request->status >= 10 && auth()->user()->hasRole('department'))
                     <td colspan="5" class="text-muted text-end">Total</td>
                     @else
                     <td colspan="5" class="text-muted text-end">Total</td>
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
      @if ($request->class == 'main' && $request->deflections->count() > 0)
      <table class="table table-vcenter card-table">
         <thead>
            <tr>
               <th colspan="7" class="text-info">Deflection</th>
            </tr>
            <tr>
               <th>MTD</th>
               <th>Descriptive</th>
               <th>Destination</th>
               <th class="text-center">Qty</th>
               
               <th class="">Desc</th>
               {{-- <th class="text-center">Size (m<sup>2</sup>)</th>
               <th class="text-center">Weight (ton)</th> --}}
            </tr>
         </thead>
         <tbody>
            @foreach ($request->deflections as $deflection)
               <tr>
                  <td class="text-muted">{{$deflection->cargoitem->no_doc}}</td>
                  
                  <td class="text-muted  text-nowrap">
                     {{$deflection->cargoitem->desc}}
                  </td>
                  <td class="text-muted">{{$deflection->port->name}}</td>
                  <td class="text-muted text-center">{{$deflection->qty}} {{$deflection->cargoitem->unit}}</td>
                  <td class="text-muted  text-nowrap">
                     {{$deflection->desc}} 
                  </td>
                  {{-- <td class="text-muted text-center">{{$deflection->size}}</td>
                  <td class="text-muted text-center">{{$deflection->weight}}</td> --}}
                  
               
               </tr>
            @endforeach
         </tbody>
      </table>
      @endif
   </div>
</div> 
  