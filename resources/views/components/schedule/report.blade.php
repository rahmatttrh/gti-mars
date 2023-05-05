<dl class="row">
   <dt class="col-4">Standby</dt>
   <dd class="col-8">: {{ $report->standby ? \Carbon\Carbon::parse($report->standby)->format('H:i') : ''}} </dd>
   <dt class="col-4">Loading</dt>
   <dd class="col-8">: {{ $report->loading_start ? \Carbon\Carbon::parse($report->loading_start)->format('H:i') : ''}} - {{ $report->loading_end ? \Carbon\Carbon::parse($report->loading_end)->format(' H:i') : ''}}</dd>
 
   <dt class="col-4">Cast Off</dt>
   <dd class="col-8">: {{ $report->castoff ? \Carbon\Carbon::parse($report->castoff)->format('H:i ') : ''}}</dd>
   <dt class="col-4">Full Away</dt>
   <dd class="col-8">: {{ $report->fullaway ? \Carbon\Carbon::parse($report->fullaway)->format('H:i ') : ''}}</dd>
   <dt class="col-4">Arrive</dt>
   <dd class="col-8">: {{ $report->arrive ? \Carbon\Carbon::parse($report->arrive)->format('H:i ') : ''}}</dd>
   <dt class="col-4">Waiting</dt>
   <dd class="col-8">: {{ $report->standby_dest ? \Carbon\Carbon::parse($report->standby_dest)->format('H:i') : ''}}  </dd>
   <dt class="col-4">Unloading</dt>
   <dd class="col-8">: {{ $report->unloading_start ? \Carbon\Carbon::parse($report->unloading_start)->format('H:i ') : ''}} - {{ $report->unloading_end ? \Carbon\Carbon::parse($report->unloading_end)->format('H:i ') : ''}}</dd>
   {{-- <dt class="col-4">Unloading End</dt>
   <dd class="col-8">: </dd> --}}
   
   <dt class="col-4">Complete</dt>
   <dd class="col-8">: {{ $report->complete ? \Carbon\Carbon::parse($report->complete)->format('H:i ') : ''}}</dd>
</dl>