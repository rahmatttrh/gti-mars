<div class="modal modal-blur fade" id="modal-request-list-{{$schedule->id}}" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">{{$schedule->vessel->name ?? '-'}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <dl class="row border-bottom pb-3">
               <dt class="col-12">{{$schedule->date}}</dt>
               {{-- <dt class="col-12">{{$schedule->origin->name}}</dt> --}}
            </dl>
            @foreach ($schedule->requests as $request)
            <div class="card mb-2 shadow-none">
               <div class="card-body">
                   <div>{{$request->activity->name ?? ''}} {{$request->description}}</div>
                  <small class="text-muted">{{$request->department->name}}/{{$request->employee->name ?? ''}}</small>
               </div>
            </div>
            @endforeach
         </div>
         <div class="modal-footer">
            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
            {{-- <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button> --}}
         </div>
      </div>
   </div>
 </div>