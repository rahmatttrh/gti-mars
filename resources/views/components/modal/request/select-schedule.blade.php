<div class="modal modal-blur fade" id="modal-select-vessel-{{$request->id}}" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Select Schedule</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="{{route('request.select.schedule')}}" method="POST">
            @csrf
            @method('PUT')
            <input type="number" name="request_id" id="request_id" value="{{$request->id}}" hidden>
            <div class="modal-body">
               <div class="">{{$request->activity->name}} {{$request->description}}</div>
               
               <div class="">{{\Carbon\Carbon::parse($request->date)->format('d/m/Y')}} - {{$request->origin->name}} to {{$request->destination->name}}</div>
               <dl class="row mt-3 border-top pt-2">
                  <dd class="col-2">Weight</dd>
                  <dd class="col-10">: {{$request->total_weight}} ton</dd>
                  <dd class="col-2">Size</dd>
                  <dd class="col-10">: {{$request->total_size}} m<sup>2</sup></dd>
               </dl>
               {{-- <div class="mt-2 border-top pt-2">Total Weight {{$request->total_weight}} ton</div>
               <div>Total Size {{$request->total_size}} m<sup>2</sup></div> --}}
               {{-- <div class="form-floating mb-3">
                  <input type="text" required class="form-control" id="date" name="date" value="{{$request->date}}" >
                  <label for="station">Date</label>
               </div> --}}
               
               <div class="form-floating mt-2 mb-3">
                  <select required name="schedule" id="schedule" class="form-select">
                     <option  disabled selected>Choose</option>
                     {{-- @foreach ($vessels as $vessel)
                        @if ($vessel->schedules()->first() != null)
                              @if ($vessel->schedules()->first()->date == $request->date )
                                    @if ($vessel->schedules()->first()->origin_id != $request->origin_id && $vessel->schedules()->first()->destination_id != $request->destination_id)
                                       <option disabled value="{{$vessel->id}}">{{$vessel->name}} - {{\Carbon\Carbon::parse($vessel->schedules()->first()->date)->format('d/m/Y')}}</option>
                                       @else
                                       <option  value="{{$vessel->id}}">{{$vessel->name}} - {{\Carbon\Carbon::parse($vessel->schedules()->first()->date)->format('d/m/Y')}}</option>
                                    @endif
                                 @else
                                 <option value="{{$vessel->id}}">{{$vessel->name}} diab - {{$vessel->schedules()->first()->date}}</option>
                              @endif
                           @else
                           <option value="{{$vessel->id}}">{{$vessel->name}}</option>
                        @endif
                     @endforeach --}}
                     @foreach ($schedules as $schedule)
                        {{-- @if ($schedule->date == $request->date)
                           @if ($schedule->origin_id != $request->origin_id && $schedule->destination_id !=  $request->destination_id)
                              <option disabled value="{{$schedule->id}}">{{$schedule->vessel->name}}</option>
                              @else
                              <option  value="{{$schedule->id}}">{{$schedule->vessel->name}}</option>
                           @endif
                        @endif --}}
                        <option value="{{$schedule->id}}">{{$schedule->vessel->name}} - {{\Carbon\Carbon::parse($schedule->date)->format('d/m/Y')}}</option>  
                     @endforeach
                     
                  </select>
                  <label for="origin">Boat</label>
               </div>
               <div class="form-floating mb-3">
                  <input type="text" required class="form-control" id="remark" name="remark" >
                  <label for="remark">Remark (Optional)</label>
               </div>
            </div>
            
            <div class="modal-footer">
               <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
               Cancel
               </a>
               <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><circle cx="12" cy="14" r="2" /><polyline points="14 4 14 8 8 8 8 4" /></svg>
                  Select
               </button>
            </div>
         </form>
      </div>
   </div>
 </div>