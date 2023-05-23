@if ($errors->any())
   <div class="alert alert-danger text-danger">
      <ul>
            @foreach ($errors->all() as $error)
               <li><small>{{ $error }}</small></li>
            @endforeach
      </ul>
   </div>
@endif