@if ($doc->status == 1)
   <div class="badge badge-success">{{$doc->name}}</div>
   @elseif($doc->status == 2)
   <div class="badge badge-warning">{{$doc->name}}</div>
   @elseif($doc->status == 3)
   <div class="badge badge-danger">{{$doc->name}}</div>
@endif
