{{-- <style>
   table{
      'border' : 1px solid;
      ''
   }
</style> --}}

<div class="card">
   {{-- <div class="card-header px-2"><h4>CARGO BOAT MANIFEST</h4></div> --}}
   <div class="card-body p-0 pb-0">
      <div class="table-responsive">
         <table class="table table-sm border">
            <thead>
               <tr>
                  <tr>
                     <th colspan="8" class="py-2">BOAT CARGO MANIFEST</th>
                  </tr>
               </tr>
            </thead>
            @foreach ($cargos as $cargo)
            <thead>
               
               <tr class="bg-info text-white">
                  <th colspan="2">BCM No. {{$cargo->code}}</th>
                  <th colspan="4">{{$cargo->origin->code}} - {{$cargo->destination->code}}</th>
                  <th class="bg-white">
                     <a href="{{route('logistic.edit.bcm', enkripRambo($cargo->id))}}">Edit</a>
                  </th>
                  <th class="bg-white">
                     <a href="{{route('document.bcm', enkripRambo($cargo->id))}}">Export BCM</a>
                  </th>
               </tr>
            </thead>
            <tbody>
               @foreach ($items->where('cargo_id', $cargo->id)->where('status', 1) as $item)
               <tr class="border-bottom">
                  <td></td>
                  <td>MTD No. {{$item->mtd}}</td>
                  <td>{{$item->description}}</td>
                  <td>{{$item->contract ?? '-'}}</td>
                  <td>{{$item->qty}} {{$item->unit}}</td>
                  <td>{{$item->weight}} KG</td>
                  <td>
                     <a href="{{route('logistic.edit.mtd', enkripRambo($item->id))}}">Edit</a>
                  </td>
                  <td>
                     <a href="{{route('document.mtd', enkripRambo($item->id))}}" target="_blank">Export MTD</a>
                  </td>
               </tr>
               @endforeach
               
            </tbody>
            @endforeach
            
         </table>
      </div>
   </div>
   
</div>

@if (count($schedule->items->where('status', 0)) > 0)
    

<hr>
<table class="table table-sm border"  id="">
   <thead>
      <tr>
         <th colspan="" >Action</th>
         {{-- <td></td> --}}
         <th>Route</th>
         
         <th>MTD</th>
         <th>Desc</th>
         <th>PO</th>
         <th class="text-center">Qty</th>
         <th>Unit</th>
         <th>Weight</th>
         {{-- <th></th> --}}
      </tr>
   </thead>
   <tbody>
      {{-- @foreach ($requests->where('activity_id', 1) as $request) --}}

      
      @foreach ($schedule->items->where('status', 0) as $item)
         <tr class="border-bottom">
            <td >
               <a href="#" data-toggle="modal" data-target="#cargo-takeout-{{$item->id}}" class="text-danger">REJECT</a> | 
               <a href="{{route('item.logistic.approve', enkripRambo($item->id))}}" class="text-primary">APPROVE</a>
               
            </td>
            <td>{{$item->request->origin->code}} - {{$item->request->destination->code}}</td>
            <td class="">{{$item->mtd}}</td>
            
            <td class=" text-truncate ">
            {{$item->description}}
            </td>
            <td class=" text-truncate">
               {{$item->contract}}
            </td>
            <td class=" text-center text-truncate" >{{$item->qty}} </td>
            <td class="">{{$item->unit}}</td>
            <td class=" ">{{$item->weight}}</td>
            {{-- <td>
               <a href="{{route('document.mtd', enkripRambo($item->id))}}">Export MTD</a>
            </td> --}}
           
   
            
         </tr>
      @endforeach
         
   
      
   
   {{-- @endforeach --}}
   </tbody>
</table>
@endif
<h4>STOWAGE PLAN</h4>
{{-- doc/stowage-plan.pdf --}}
@if ($schedule->vessel->stowage_plan)
   <embed  style="width: 100%; height:700px;overflow:hidden" class="text-center" id="preview-pdf" src="{{asset('storage/' . $schedule->vessel->stowage_plan)}}" frameborder="0"></embed>
      @else
      <p>Data Empty</p>
@endif




