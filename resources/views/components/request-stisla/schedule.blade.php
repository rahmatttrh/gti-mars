<div class="accordion mb-2 bg-white" id="accordion-schedule_{{$schedule->id}} ">
   <div class="accordion-item">
      <h2 class="accordion-header" id="heading-schedule-{{$schedule->id}}">
         <button class="accordion-button " type="button" data-bs-toggle="collapse"
            data-bs-target="#collapse-schedule-{{$schedule->id}}" aria-expanded="true">
            {{$schedule->vessel->name ?? 'Vessel : Not Available'}}
         </button>
      </h2>
      <div id="collapse-schedule-{{$schedule->id}}" class="accordion-collapse collapse show"
         data-bs-parent="#accordion-schedule_{{$schedule->id}}">
         <div class="accordion-body pt-0">
            @if ($schedule)
               <dl class="row">
                  
                  
                  <dt class="col-3">Date</dt>
                  <dd class="col-9">{{\Carbon\Carbon::parse($schedule->date)->format('d/m/Y')}}</dd>
                  <dt class="col-3">Route</dt>
                  <dd class="col-9">
                  @foreach ($schedule->routes as  $route)
                     {{$route->port->name}} -
                  @endforeach</dd>
               </dl>
               <small>
                  @if (auth()->user()->hasRole('Marine'))
                  <a href="{{route('schedule.detail', enkripRambo($schedule->id))}}">More detail...</a>
                  @else
                     @if ($schedule->status > 0)
                     <a href="{{route('schedule.detail', enkripRambo($schedule->id))}}">More Detail</a>
                     @else
                     
                     @endif
                  @endif
               </small>
               
               @else
               <small>Not Available</small>
            @endif
            {{-- @if ($histories->count() > 0)
            <hr>
               @foreach ($histories as $history)
                  <small>Cancel : {{$history->approve}} [{{$history->reason}}]</small>
               @endforeach
            @endif --}}
         </div>
      </div>
   </div>
</div>