{{-- <dl class="row">
   @foreach ($reports as $report)
      <dd class="col-10">{{$report->status->name}} {{$report->port_id == null ? '' : 'at ' . $report->port->name}}</dd>
      <dd class="col-2 text-end"> {{  \Carbon\Carbon::parse($report->created_at)->format('H:i ')}}</dd>
   @endforeach
</dl> --}}

<div class="card mt-2" style="height: calc(25rem + 10px)">
   <div class="card-header">
      <div class="badge bg-info">Offloading Update</div>
   </div>
   <div class="card-body card-body-scrollable card-body-scrollable-shadow">
      <div class="divide-y">
         @foreach ($offloadings as $offloading)
            <div>
               <div class="row">
                  <div class="col">
                     <div class="">
                       Drop  <b> {{$offloading->offloading}}  {{$offloading->cargoitem->desc}}</b> of {{$offloading->cargoitem->qty}}  at {{$offloading->request->destination->name}},
                        {{-- {{$offloading->deflection->id}} --}}
                        @if ($offloading->deflection)
                        Remain <b> {{$offloading->deflection->qty}} {{$offloading->cargoitem->unit}} </b>send to  {{$offloading->deflection->port->name}}
                        @endif
                        
                     </div>
                     <div class="text-muted"><small>{{$offloading->updated_at->format('d-m-y H:i ')}}</small></div>
                  </div>
               </div>
            </div>
         @endforeach
      </div>
   </div>
   {{-- <div class="card-footer">
      <small>Scroll down to see more</small>
   </div> --}}
</div>