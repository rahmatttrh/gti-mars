<span>
   @foreach ($requests as $request)
      <div class="accordion mb-2 bg-white" id="accordion-example_{{$request->id}} ">
         <div class="accordion-item">
            <h2 class="accordion-header" id="heading-{{$request->id}}">
               <button class="accordion-button " type="button" data-bs-toggle="collapse"
                  data-bs-target="#collapse-{{$request->id}}" aria-expanded="true">
                  {{$request->code}}
               </button>
            </h2>
            <div id="collapse-{{$request->id}}" class="accordion-collapse collapse show"
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
                  </dl>
                  <x-requests.cargo :request="$request" :cargos="$request->cargoItems" :passengers="$request->passengerItems" :i="0" />
                  <div class="mt-2 mb-2">
                     <a class="" href="#" data-bs-toggle="modal" data-bs-target="#remove-request-{{$request->id}}">
                        <small>Remove from list</small> 
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <x-modal.schedule.remove-request :request="$request" />
   @endforeach
</span>