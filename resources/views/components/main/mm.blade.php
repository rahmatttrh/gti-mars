<style>
   /* table {
      width: 100%;
   }

   table, th, td {
      border: 1px solid rgb(226, 218, 218);
      /* border-collapse: collapse; */
   /* } */
   th, td {
      padding-left: 5px
   } */

   table th td {
   border-right: solid 1px rgb(186, 185, 185); 
   border-left: solid 1px rgb(186, 185, 185);
   }
</style>

<div class="row">
   <div class="col-md-3">
      <div class="card shadow-none border">
         <div class="card-body">
            <h4>Material Man</h4>
            {{-- <span>{{$mm->port->name}}</span> --}}
            <hr>
            <span>{{$mm->name}}</span> <br>
            {{$mm->port->name}}
         </div>
         
      </div>
      
      {{-- <div class="dropdown">
         <button class="btn btn-info btn-block btn-lg dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Create Request
         </button>
         <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
           <a class="dropdown-item" href="{{route('request.create.single', enkripRambo(auth()->user()->getMonth()))}}">Single Destination</a>
           <a class="dropdown-item" href="{{route('request.create', enkripRambo(auth()->user()->getMonth()))}}">Multiple Destination</a>
           
         </div>
       </div>
       <a href="{{route('request.progress')}}">Request List</a> --}}

   </div>
   <div class="col-md-9">
      <div class="card">
         <div class="card-body p-0">
            <div class="table-responsive">

               
               <table class="border" id="">
                  <thead >
                     <tr class="bg-info text-white">
                        <th colspan="8" class="py-1">ARRIVAL CARGO CONFIRMATION </th>
                     </tr>
                     <tr class="border">
                        {{-- <th class="text-center">No</th> --}}
                        <th>Vessel</th>
                        <th>BCM</th>
                        <th>MTD</th>
                        <th>Desc</th>
                        <th>Qty</th>
                        <th>Route</th>
                        <th style="width: 120px">Action</th>
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>
                     @if (count($cargos) > 0)
                        @foreach ($cargos as $cargo)
                              @foreach ($cargo->items->where('status', '<', 4 ) as $item)
                                 <tr class="border">
                                    <td>{{$item->schedule->vessel->name}}</td>
                                    <td >{{$item->cargo->code}}</td>
                                    <td>{{$item->mtd}}</td>
                                    <td>{{$item->description}}</td>
                                    <td>{{$item->qty}} {{$item->unit}}</td>
                                    <td>{{$item->cargo->origin->code}} - {{$item->cargo->destination->code}}</td>
                                    <td><a href="{{route('cargo.drop', enkripRambo($item->id))}}">Drop</a></td>
                                 </tr>
                              @endforeach
                        @endforeach
                        @else
                        <tr>
                           <td colspan="8" class="text-center">Empty</td>
                        </tr>

                     @endif
                     
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <hr>
      <div class="table-responsive">
         <table class="table table-sm border " id="table-12">
            <thead>
               <tr>
                  <th>Vessel</th>
                  <th>BCM</th>
                  <th>MTD</th>
                  <th>Desc</th>
                  <th>Weight</th>
                  <th>Qty</th>
                  <th>Route</th>
                  <th>Status</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($items as $item)
                     <tr class="border">
                        <td>{{$item->schedule->vessel->name ?? ''}}</td>
                     <td>{{$item->cargo->code ?? '-'}}</td>
                     <td>{{$item->mtd}}</td>
                     <td>{{$item->description}}</td>
                     <td>{{$item->weight}}</td>
                     <td>{{$item->qty}} {{$item->unit}}</td>
                     <td>{{$item->cargo->origin->code}} - {{$item->cargo->destination->code}}</td>
                     <td>
                        @if ($item->status == 4)
                            <span class="text-info">Arrived</span>
                            @else
                            <x-status-stisla.request-plain :request="$item->request" />
                        @endif
                        
                     </td>
                     </tr>
               @endforeach
               
            </tbody>
         </table>
      </div>
      
      
   </div>
   
</div>
 <hr>
<small>Please pay attention to the alert table on the right</small>


