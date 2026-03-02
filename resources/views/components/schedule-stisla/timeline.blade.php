{{-- <div class="activities" > --}}
<div class="activities" style="height: 265px; overflow-y: scroll">
   @if ($reports->count() > 0)
     @foreach ($reports as $report)
     <div class="activity">
       {{-- <div class="activity-icon bg-primary text-white shadow-primary">
         <i class="fas fa-comment-alt"></i>
       </div> --}}
       <div class="activity-detail border">
         <div class="mb-2">
           <span class="text-job text-primary">{{  \Carbon\Carbon::parse($report->created_at)->format('d-m-y H:i ')}}</span>
           <span class="bullet"></span>
         
         </div>
         <p><small>{{$report->vessel->name}} {{$report->status->name}}  {{$report->port_id == null ? '' :  'at ' .$report->port->name}}.</small></p>
         @if ($report->status_id == 9)
         oke
             <a href="" class="btn btn-sm btn-primary shadow-none" data-toggle="modal" data-target="#report-evidance-{{$report->id}}">Evidance</a>
         @endif

         @if ($report->status_id == 6)
             <span class="btn btn-primary btn-sm shadow-none">ETA : {{formatDateTime($report->eta)}} at {{$report->destination->name}}</span>
         @endif

         @if ($report->status_id > 24 && $report->status_id < 29)
             <span class="btn btn-primary btn-sm shadow-none">Anchor {{$report->anchor}}</span>
         @endif
       </div>
     </div>
      
       @endforeach
       @else
       <div class="row">
         <div class="col">
             <small class="text-center text-muted">Empty</small>
         </div>
       </div>
   @endif
   
</div>