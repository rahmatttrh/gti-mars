{{-- <dl class="row">
   @foreach ($reports as $report)
      <dd class="col-10">{{$report->status->name}} {{$report->port_id == null ? '' : 'at ' . $report->port->name}}</dd>
      <dd class="col-2 text-end"> {{  \Carbon\Carbon::parse($report->created_at)->format('H:i ')}}</dd>
   @endforeach
</dl> --}}

<div class="card" style="height: calc(11rem + 10px)">
   <div class="card-header">
      <div class="badge bg-primary">Timeline</div>
   </div>
   <div class="card-body card-body-scrollable card-body-scrollable-shadow">
      {{-- <div class="divide-y"> --}}
         @if ($reports->count() > 0)
            @foreach ($reports as $report)
            <dl class="row border-bottom">
               
               <dd class="col-10"> {{$report->status->name}} [{{$report->port_id == null ? '' :  $report->port->name}}]</dd>
               <dd class="col-2 text-end"><small> {{  \Carbon\Carbon::parse($report->created_at)->format('H:i ')}}</small></dd>
            </dl>
            @endforeach
            @else
            <div class="row">
               <div class="col">
                  <small class="text-center text-muted">Empty</small>
               </div>
            </div>
         @endif
      {{-- </div> --}}
   </div>
   {{-- <div class="card-footer">
      <small>Scroll down to see more</small>
   </div> --}}
</div>