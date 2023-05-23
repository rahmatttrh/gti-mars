<div class="accordion mb-2 bg-white" id="accordion-schedule_{{$schedule->id}} ">
   <div class="accordion-item">
      <h2 class="accordion-header" id="heading-schedule-{{$schedule->id}}">
         <button class="accordion-button " type="button" data-bs-toggle="collapse"
            data-bs-target="#collapse-schedule-{{$schedule->id}}" aria-expanded="true">
            Schedule
         </button>
      </h2>
      <div id="collapse-schedule-{{$schedule->id}}" class="accordion-collapse collapse show"
         data-bs-parent="#accordion-schedule_{{$schedule->id}}">
         <div class="accordion-body pt-0">
            @if ($schedule)
               <dl class="row">
                  <dt class="col-3">Boat</dt>
                  <dd class="col-9">: <a href="{{route('schedule.detail', enkripRambo($schedule->id))}}">{{$schedule->vessel->name}}</a></dd>
                  <dt class="col-3">Date</dt>
                  <dd class="col-9">: <a href="{{route('schedule.detail', enkripRambo($schedule->id))}}">{{\Carbon\Carbon::parse($schedule->date)->format('d/m/Y')}}</a></dd>
                  <dt class="col-3">ETD</dt>
                  <dd class="col-9">: {{\Carbon\Carbon::parse($schedule->etd)->format('H:i')}}</dd>
                  <dt class="col-3">ETA</dt>
                  <dd class="col-9">: {{\Carbon\Carbon::parse($schedule->eta)->format('H:i')}}</dd>
                  <small># {{$request->remark}}</small>
               </dl>
               @else
               <small>Not Available</small>
            @endif
            @if ($histories->count() > 0)
            <hr>
               @foreach ($histories as $history)
                  <small>Cancel : {{$history->approve}} [{{$history->reason}}]</small>
               @endforeach
            @endif
         </div>
      </div>
   </div>
</div>