<div class="">
   @if (auth()->user()->hasRole('marine'))
      @if ($deviations->where('status', '>=', 0)->count() > 0)       
         @foreach ($deviations as $dev)
            <div class="accordion mb-2 bg-white" id="accordion-deviation_{{$dev->id}} ">
               <div class="accordion-item">
                  <h2 class="accordion-header" id="heading-deviation-{{$dev->id}}">
                     <button class="accordion-button " type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse-deviation-{{$dev->id}}" aria-expanded="true">
                        {{$dev->port->name}} 
                     </button>
                  </h2>
                  <div id="collapse-deviation-{{$dev->id}}" class="accordion-collapse collapse"
                     data-bs-parent="#accordion-deviation_{{$dev->id}}">
                     <div class="accordion-body pt-0">
                        <dl class="row">
                           <dd class="col-12"><x-status.deviation :deviation="$dev" /> </dd>
                           <dt class="col-4">Destination</dt>
                           <dd class="col-8">: {{$dev->port->name}}</dd>
                           <dt class="col-4">Activity</dt>
                           <dd class="col-8">: {{$dev->desc}}</dd>
                           @if ($dev->report)
                           <dt class="col-4">Confirm</dt>
                           <dd class="col-8">: {{ $dev->report->confirm ? \Carbon\Carbon::parse($dev->report->confirm)->format('H:i ') : ''}}</dd>
                           <dt class="col-4">Arrive</dt>
                           <dd class="col-8">: {{ $dev->report->arrive ? \Carbon\Carbon::parse($dev->report->arrive)->format('H:i ') : ''}}</dd>
                           <dt class="col-4">Complete</dt>
                           <dd class="col-8">: {{$dev->report->complete ? \Carbon\Carbon::parse($dev->report->complete)->format('H:i ') : ''}}</dd>
                           @endif
                           
                              @if ($dev->status == 0)
                                 <button class="btn mt-2 btn-small btn-danger" data-bs-toggle="modal" data-bs-target="#modal-deviation-delete-{{$dev->id}}">Delete</button>
                                 
                              @endif
                        </dl>
                     </div>
                  </div>
               </div>
            </div>
            <x-modal.deviation.arrive :deviation="$dev" />
            <x-modal.deviation.complete :deviation="$dev" />
            <x-modal.deviation.delete :deviation="$dev" />
         @endforeach
      @else
      <div class="card">
         <div class="card-body">
            <small class="text-muted">Empty</small>
         </div>
      </div>
      
      @endif
      @else
      @if ($deviations->where('status', '>', 0)->count() > 0)       
         @foreach ($deviations as $dev)
            <div class="accordion mb-2 bg-white" id="accordion-deviation_{{$dev->id}} ">
               <div class="accordion-item">
                  <h2 class="accordion-header" id="heading-deviation-{{$dev->id}}">
                     <button class="accordion-button " type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse-deviation-{{$dev->id}}" aria-expanded="true">
                        {{$dev->port->name}} 
                     </button>
                  </h2>
                  <div id="collapse-deviation-{{$dev->id}}" class="accordion-collapse collapse"
                     data-bs-parent="#accordion-deviation_{{$dev->id}}">
                     <div class="accordion-body pt-0">
                        <dl class="row">
                           <dd class="col-12"><x-status.deviation :deviation="$dev" /> </dd>
                           <dt class="col-4">Destination</dt>
                           <dd class="col-8">: {{$dev->port->name}}</dd>
                           <dt class="col-4">Activity</dt>
                           <dd class="col-8">: {{$dev->desc}}</dd>
                           @if ($dev->report)
                           <dt class="col-4">Confirm</dt>
                           <dd class="col-8">: {{ $dev->report->confirm ? \Carbon\Carbon::parse($dev->report->confirm)->format('H:i ') : ''}}</dd>
                           <dt class="col-4">Arrive</dt>
                           <dd class="col-8">: {{ $dev->report->arrive ? \Carbon\Carbon::parse($dev->report->arrive)->format('H:i ') : ''}}</dd>
                           <dt class="col-4">Complete</dt>
                           <dd class="col-8">: {{$dev->report->complete ? \Carbon\Carbon::parse($dev->report->complete)->format('H:i ') : ''}}</dd>
                           @endif
                           @if (auth()->user()->hasRole('vessel'))
                              @if ($dev->status == 1)
                                 <button class="btn mt-2 btn-small btn-info" data-bs-toggle="modal" data-bs-target="#modal-deviation-arrive-{{$dev->id}}">Arrive</button>
                                 @elseif($dev->status == 2)
                                 <button class="btn mt-2 btn-small btn-info" data-bs-toggle="modal" data-bs-target="#modal-deviation-complete-{{$dev->id}}">Complete</button>
                              @endif
                           @endif
                        </dl>
                     </div>
                  </div>
               </div>
            </div>
            <x-modal.deviation.arrive :deviation="$dev" />
            <x-modal.deviation.complete :deviation="$dev" />
         @endforeach
      @else
      <div class="card">
         <div class="card-body">
            <small class="text-muted">Empty</small>
         </div>
      </div>
      
      @endif
   @endif
   
</div>