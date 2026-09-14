@php
$vdrDate = \Carbon\Carbon::parse($vdr->date);
$release = \Carbon\Carbon::parse($vdr->release_date);


$gap = $vdrDate->diffForHumans($release, [
'parts' => 2,
'short' => true,
'syntax' => \Carbon\CarbonInterface::DIFF_ABSOLUTE
]);




@endphp

<span class="badge badge-white border">

        {{-- <i class="fas fa-stopwatch text-primary mr-1"></i> --}}
        <small>
         @if ($vdr->release_date != null)
             <strong>{{$gap}}</strong>
             @else
             -
         @endif
        </small>
        

    </span>