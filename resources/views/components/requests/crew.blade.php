<div class="card card-lg">
   <div class="table-responsive">
      <table class="table table-vcenter card-table">
         <thead>
            <tr>
               {{-- <th>No.</th> --}}
               <th>Number</th>
               <th>Name</th>
               <th></th>
            </tr>
         </thead>
         <tbody>
            @if ($passengers->count() > 0)
               @foreach ($passengers as $item)
                  <tr>
                     <td class="text-muted">{{$item->number}}</td>
                     <td class="text-muted">{{$item->name}}</td>
                     <td class="text-end">
                        @if ($request->status == 0)
                        <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deletePassengerItem_{{$item->id}}">Delete</a>
                        @endif
                     </td>
                  </tr>
                  <x-modal.passenger.delete :item="$item" />
               @endforeach

               @else
               <tr>
                  <td colspan="9" style="text-align: center"><small>Empty</small></td>
               </tr>
            @endif
         </tbody>
      </table>
   </div>
</div> 