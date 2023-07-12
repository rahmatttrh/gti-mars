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
                        @if ($dev->status == 3)
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check-filled text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" stroke-width="0" fill="currentColor"></path>
                        </svg>
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check-filled text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" stroke-width="0" fill="currentColor"></path>
                        </svg>
                        @endif
                        &nbsp; &nbsp;{{$dev->port->name}} &nbsp; &nbsp; <div class="badge bg-warning">Deviation</div>
                     </button>
                  </h2>
                  <div id="collapse-deviation-{{$dev->id}}" class="accordion-collapse collapse"
                     data-bs-parent="#accordion-deviation_{{$dev->id}}">
                     <div class="accordion-body pt-0">
                        <dl class="row">
                           <dd class="col-12"><x-status.deviation :deviation="$dev" /> </dd>
                           {{-- <dt class="col-4">Destination</dt>
                           <dd class="col-8">: {{$dev->port->name}}</dd> --}}
                           <dt class="col-2">Activity</dt>
                           <dd class="col-10">: {{$dev->desc}}</dd>
                           <dt class="col-2">Reason</dt>
                           <dd class="col-10">: {{$dev->reason}}</dd>
                           <hr>
                           @if ($dev->report)
                           <dt class="col-2">Confirm</dt>
                           <dd class="col-10">: {{ $dev->report->confirm ? \Carbon\Carbon::parse($dev->report->confirm)->format('H:i ') : ''}}</dd>
                           <dt class="col-2">Arrive</dt>
                           <dd class="col-10">: {{ $dev->report->arrive ? \Carbon\Carbon::parse($dev->report->arrive)->format('H:i ') : ''}}</dd>
                           <dt class="col-2">Complete</dt>
                           <dd class="col-10">: {{$dev->report->complete ? \Carbon\Carbon::parse($dev->report->complete)->format('H:i ') : ''}}</dd>
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