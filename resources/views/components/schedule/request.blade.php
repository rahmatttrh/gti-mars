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
                  <hr>
                  <dl class="row">
                     {{-- <dt class="col-2">Date</dt>
                     <dd class="col-10">: {{\Carbon\Carbon::parse($request->date)->format('d/m/Y')}}</dd> --}}
                     <dt class="col-2">Department</dt>
                     <dd class="col-10">: {{$request->department->name}}</dd>
                     <dt class="col-2">Activity</dt>
                     <dd class="col-10">: {{$request->activity->name ?? ''}} - {{$request->description}}</dd>
                     <dt class="col-2">Request by</dt>
                     <dd class="col-10">: {{$request->employee->name ?? ''}}</dd>
                     <dt class="col-2"><x-status.request :request="$request" /></dt>
                  </dl>
               </div>
            </div>
         </div>
      </div>
   @endforeach
</span>