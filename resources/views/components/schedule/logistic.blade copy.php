<div class="card ">
   {{-- <div class="card-header px-2"><h4>CARGO BOAT MANIFEST</h4></div> --}}
   <div class="card-body p-0">
      <div class="table-responsive">
      <table>
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
            @foreach ($items->where('cargo_id', $cargo->id) as $item)
            <tr>
               <td></td>
               <td>MTD No. {{$item->mtd}}</td>
               <td>{{$item->desc}}</td>
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
<hr>
<table class="" id="">
   <thead>
      <tr>
         <th colspan="2" class="text-center">Action</th>
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
@foreach ($requests->where('activity_id', 1) as $request)

      @if ($request->cargoItems->first()->cargo_id == null)
      <tr>
         <td rowspan="{{count($request->cargoItems) + 1}}">
            <a href="#" data-toggle="modal" data-target="#cargo-takeout-{{$request->id}}" class="">REJECT</a> 
            
            {{-- <a href="{{route('document.bcm')}}" class="">BCM</a> --}}
         </td>
         <td rowspan="{{count($request->cargoItems) + 1}}">
            <a href="{{route('request.logistic.approve', enkripRambo($request->id))}}" class="">APPROVE</a>
         </td>
         <td rowspan="{{count($request->cargoItems) + 1}}">{{$request->origin->code}} - {{$request->destination->code}} {{$request->code}}</td>
         
      </tr>
      @foreach ($request->cargoItems as $item)
         <tr>
            
            <td class="">{{$item->mtd}}
            </td>
            {{-- <td>{{$item->request->origin->name}} - {{$item->request->destination->name}}</td> --}}
            <td class=" text-truncate ">
            {{$item->desc}}
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
         @else
      @endif
   
      
   
@endforeach
</tbody>
</table>





