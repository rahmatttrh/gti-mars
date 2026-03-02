<div>
    @if ($daily->status == 0)
       <i>Draft</i>
       @elseif($daily->status == 1)
       <i class="text-info">Published</i>
       
       
    @endif
    
 </div>