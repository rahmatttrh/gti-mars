<span>
   @foreach ($requests->where('activity_id', 2) as $request)
      <div class="accordion mb-2 bg-white" id="accordion-example_{{$request->id}} ">
         <div class="accordion-item">
            <h2 class="accordion-header" id="heading-{{$request->id}}">
               <button class="accordion-button " type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapse-{{$request->id}}" aria-expanded="true">
                  {{-- <div class="badge bg-muted">{{$request->rank}}</div> --}}
                  
                  @if ($request->status == 12)
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check-filled text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                     <path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" stroke-width="0" fill="currentColor"></path>
                  </svg>
                  @elseif ($request->status == 77)
                  <!-- Download SVG icon from http://tabler-icons.io/i/clock -->
	               <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><polyline points="12 7 12 12 15 15" /></svg>
                  @else
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check-filled text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                     <path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" stroke-width="0" fill="currentColor"></path>
                  </svg>
                  @endif
                   <span class="ml-4"> &nbsp; &nbsp;{{$request->origin->name}} - {{$request->destination->name}}</span> 
                  @if ($request->class == 'additional')
                  &nbsp;&nbsp;<div class="badge bg-cyan">Additional</div>
                  @elseif($request->class == 'deviation')
                  &nbsp;&nbsp;<div class="badge bg-green">Deviation</div>
                  @endif

                  @if ($request->status == 505)
                  &nbsp;&nbsp;<div class="badge bg-danger">Rejected</div>
                  @endif
                  <br>

                   
               </button>
            </h2>
            <div id="collapse-{{$request->id}}" class="accordion-collapse collapse"
               data-bs-parent="#accordion-example_{{$request->id}}">
               <div class="accordion-body pt-0">
                  {{-- <hr> --}}
                  <dl class="row border-top pt-2">
                     <dd class="col-12"><x-status.request :request="$request" :lastreport="$request->schedule->lastreport()"/></dd>
                     {{-- <dt class="col-2">Date</dt>
                     <dd class="col-10">: {{\Carbon\Carbon::parse($request->date)->format('d/m/Y')}}</dd> --}}
                     {{-- <dt class="col-12 mb-2"><x-status.request :request="$request" /></dt> --}}
                     {{-- <dd class="col-2">User</dd>
                     <dd class="col-10">: {{$request->department->name}} / {{$request->employee->name ?? ''}}</dd>
                     <dd class="col-2">Activity</dd>
                     <dd class="col-10">: {{$request->activity->name ?? ''}} - {{$request->description}}</dd> --}}
                     
                  </dl>
                  @if ( $request->class == 'deviation' ||  $request->class == 'additional')
                     @if ($request->status == 2)
                     <button class="btn btn-light btn-sm  mb-2" data-bs-toggle="modal" data-bs-target="#addCargoItem-{{$request->id}}">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                        Add Cargo
                     </button>
                     {{-- <a href="#"  data-bs-toggle="modal" data-bs-target="#addCargoItem-{{$request->id}}">Add Cargo</a> --}}
                     @endif
                  @endif
                 
                  @if ($request->class == 'deviation' && $request->status == 2)
                     <button class="btn btn-light btn-sm  mb-2" data-bs-toggle="modal" data-bs-target="#modal-deviation-send-{{$request->id}}">
                        <<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-send" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M10 14l11 -11"></path>
                           <path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5"></path>
                        </svg>
                        Send
                     </button>
                     {{-- <a href="#"  data-bs-toggle="modal" data-bs-target="#modal-deviation-send-{{$request->id}}">Send</a> --}}
                  @endif

                  @if ($request->class == 'additional' && $request->status == 2)
                     <button class="btn btn-light btn-sm  mb-2" data-bs-toggle="modal" data-bs-target="#modal-additional-send-{{$request->id}}">
                        <<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-send" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M10 14l11 -11"></path>
                           <path d="M21 3l-6.5 18a.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a.55 .55 0 0 1 0 -1l18 -6.5"></path>
                        </svg>
                        Send
                     </button>
                     {{-- <a href="#"  data-bs-toggle="modal" data-bs-target="#modal-deviation-send-{{$request->id}}">Send</a> --}}
                  @endif

                  @if ($request->class == 'additional' && $request->status == 5 && auth()->user()->hasRole('marine'))
                     <button class="btn btn-light btn-sm  mb-2" data-bs-toggle="modal" data-bs-target="#modal-additional-approve-{{$request->id}}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-route" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                           <path d="M18 5m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                           <path d="M12 19h4.5a3.5 3.5 0 0 0 0 -7h-8a3.5 3.5 0 0 1 0 -7h3.5"></path>
                        </svg>
                        Approve
                     </button>
                     <button class="btn btn-light btn-sm  mb-2" data-bs-toggle="modal" data-bs-target="#modal-additional-reject-{{$request->id}}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-ban" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                           <path d="M5.7 5.7l12.6 12.6"></path>
                        </svg>
                        Reject
                     </button>
                     {{-- <a href="#"  data-bs-toggle="modal" data-bs-target="#modal-deviation-send-{{$request->id}}">Send</a> --}}
                  @endif

                  @if ($request->class == 'main' && $request->status == 5 && auth()->user()->hasRole('marine'))
                     <button class="btn btn-light btn-sm  mb-2" data-bs-toggle="modal" data-bs-target="#modal-additional-approve-{{$request->id}}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-route" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                           <path d="M18 5m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                           <path d="M12 19h4.5a3.5 3.5 0 0 0 0 -7h-8a3.5 3.5 0 0 1 0 -7h3.5"></path>
                        </svg>
                        Approve
                     </button>
                     <button class="btn btn-light btn-sm  mb-2" data-bs-toggle="modal" data-bs-target="#modal-additional-reject-{{$request->id}}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-ban" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                           <path d="M5.7 5.7l12.6 12.6"></path>
                        </svg>
                        Reject
                     </button>
                  {{-- <a href="#"  data-bs-toggle="modal" data-bs-target="#modal-deviation-send-{{$request->id}}">Send</a> --}}
                  @endif

                  
                  
                  <div class="table-responsive mt-2">
                     
                  </div>
                  @if ($request->activity->type_id == 1)
                  <x-requests.cargo :request="$request" :routes="$routes" :cargos="$request->cargoItems"  :i="0" />
                  @elseif($request->activity->type_id == 2 )
                  <x-requests.crew :request="$request" :departs="$request->passengerItems->where('type', 'Depart')"  :returns="$request->passengerItems->where('type', 'Return')" :i="0" />
                  @elseif($request->activity->type_id == 3 || $request->activity->type_id == 4)
                  <x-requests.moving :request="$request" :departs="$request->passengerItems->where('type', 'Depart')"  :returns="$request->passengerItems->where('type', 'Return')" :i="0" />
                  @endif
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
      <x-modal.additional.reject :request="$request"/>
      <x-modal.additional.approve :request="$request" :routes="$routes" :fixroutes="$fixroutes"/>
      <x-modal.additional.send :request="$request" />
      <x-modal.deviation.send :request="$request" />
      <x-modal.schedule.remove-request :request="$request" />
      <x-modal.schedule.send-deviation :request="$request" />
      <x-modal.cargo.add :request="$request" />
   @endforeach
</span>