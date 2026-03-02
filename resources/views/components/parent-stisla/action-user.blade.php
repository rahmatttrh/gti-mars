@if ($parent->status == 0)
    

<span class="d-flex">
   <div class="btn-group">
      <button class="btn btn-info px-4" data-toggle="modal" data-target="#parent-release">
      
         Save
      </button>
      <a href="{{route('request.delete.parent', enkripRambo($parent->id))}}" class="btn btn-danger pt-2" >
         Delete
         
      </a>
   </div>
   
   
</span>
@endif