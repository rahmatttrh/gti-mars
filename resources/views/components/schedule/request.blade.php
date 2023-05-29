<span>
   @foreach ($requests as $request)
      <div class="accordion mb-2 bg-white" id="accordion-example_{{$request->id}} ">
         <div class="accordion-item">
            <h2 class="accordion-header" id="heading-{{$request->id}}">
               <button class="accordion-button " type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapse-{{$request->id}}" aria-expanded="true">
                  @if ($request->status == 12)
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
                   <span class="ml-4"> &nbsp; &nbsp;{{$request->origin->name}} - {{$request->destination->name}}</span> 
                  
               </button>
            </h2>
            <div id="collapse-{{$request->id}}" class="accordion-collapse collapse"
               data-bs-parent="#accordion-example_{{$request->id}}">
               <div class="accordion-body pt-0">
                  {{-- <hr> --}}
                  <dl class="row border-top pt-2">
                     {{-- <dt class="col-2">Date</dt>
                     <dd class="col-10">: {{\Carbon\Carbon::parse($request->date)->format('d/m/Y')}}</dd> --}}
                     {{-- <dt class="col-12 mb-2"><x-status.request :request="$request" /></dt> --}}
                     <dd class="col-2">User</dd>
                     <dd class="col-10">: {{$request->department->name}} / {{$request->employee->name ?? ''}}</dd>
                     <dd class="col-2">Activity</dd>
                     <dd class="col-10">: {{$request->activity->name ?? ''}} - {{$request->description}}</dd>
                     <dd class="col-12"><x-status.request :request="$request" :lastreport="$request->schedule->lastreport()"/></dd>
                  </dl>
                  <x-requests.cargo :request="$request" :cargos="$request->cargoItems" :passengers="$request->passengerItems" :i="0" />
                  {{-- @if (auth()->user()->hasRole('marine') && $schedule->status == 0)
                  <div class="mt-2 mb-2">
                     <a class="" href="#" data-bs-toggle="modal" data-bs-target="#remove-request-{{$request->id}}">
                        <small>Remove from list</small> 
                     </a>
                  </div>
                  @endif --}}
                  
               </div>
            </div>
         </div>
      </div>
      <x-modal.schedule.remove-request :request="$request" />
   @endforeach
</span>