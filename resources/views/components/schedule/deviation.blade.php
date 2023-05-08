<div class="">
   @if ($deviations->count() > 0)       
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
                        <dt class="col-3">Destination</dt>
                        <dd class="col-9">: {{$dev->port->name}}</dd>
                        <dt class="col-3">Activity</dt>
                        <dd class="col-9">: {{$dev->desc}}</dd>
                        @if (auth()->user()->hasRole('vessel'))
                           @if ($dev->status == 0)
                              <button class="btn mt-2 btn-small btn-info">Arrive</button>
                           @endif
                        @endif
                     </dl>
                  </div>
               </div>
            </div>
         </div>
      @endforeach
   @else
   <div class="card">
      <div class="card-body">
         <small class="text-muted">Empty</small>
      </div>
   </div>
   
   @endif
</div>