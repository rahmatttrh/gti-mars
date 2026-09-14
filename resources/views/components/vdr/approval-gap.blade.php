@php
$release = \Carbon\Carbon::parse($vdr->release_date);
$approveFm = \Carbon\Carbon::parse($vdr->timestamp11);
$approvePet = \Carbon\Carbon::parse($vdr->timestamp1);
$approveMarine = \Carbon\Carbon::parse($vdr->timestamp2);
if ($vdr->timestamp3 != null && $vdr->timestamp4 == null) {
    $approveSuptent = \Carbon\Carbon::parse($vdr->timestamp3)->subHours(9);
} else {
    $approveSuptent = \Carbon\Carbon::parse($vdr->timestamp4);
}

$approveMarineRep = \Carbon\Carbon::parse($vdr->timestamp3);

$gap = $release->diffForHumans($approvePet, [
'parts' => 2,
'short' => true,
'syntax' => \Carbon\CarbonInterface::DIFF_ABSOLUTE
]);

$gapFm = $release->diffForHumans($approveFm, [
'parts' => 2,
'short' => true,
'syntax' => \Carbon\CarbonInterface::DIFF_ABSOLUTE
]);

$gapPet = $approveFm->diffForHumans($approvePet, [
'parts' => 2,
'short' => true,
'syntax' => \Carbon\CarbonInterface::DIFF_ABSOLUTE
]);

$gapPetMarine = $approvePet->diffForHumans($approveMarine, [
'parts' => 2,
'short' => true,
'syntax' => \Carbon\CarbonInterface::DIFF_ABSOLUTE
]);

$gapPetSuptent = $approvePet->diffForHumans($approveSuptent, [
'parts' => 2,
'short' => true,
'syntax' => \Carbon\CarbonInterface::DIFF_ABSOLUTE
]);

$gapMarineMarineRep = $approveMarine->diffForHumans($approveMarineRep, [
'parts' => 2,
'short' => true,
'syntax' => \Carbon\CarbonInterface::DIFF_ABSOLUTE
]);


$gapMarineSuptent = $approveMarine->diffForHumans($approveSuptent, [
'parts' => 2,
'short' => true,
'syntax' => \Carbon\CarbonInterface::DIFF_ABSOLUTE
]);

$gapSuptentMarineRep = $approveSuptent->diffForHumans($approveMarineRep, [
'parts' => 2,
'short' => true,
'syntax' => \Carbon\CarbonInterface::DIFF_ABSOLUTE
]);


$gapSuptentMarine = $approveSuptent->diffForHumans($approveMarine, [
'parts' => 2,
'short' => true,
'syntax' => \Carbon\CarbonInterface::DIFF_ABSOLUTE
]);


$gapFinal = $release->diffForHumans($approveMarineRep, [
'parts' => 2,
'short' => true,
'syntax' => \Carbon\CarbonInterface::DIFF_ABSOLUTE
]);


@endphp









@if ($vdr->vessel->contract_type != 'Non PO')
             
         
        @if ($vdr->vessel->type == 'Tug Boat' || $vdr->vessel->ipb == 'IPB')
        {{-- TIMESTAMP FLOW IPB --}}
        <span class="badge badge-white border">

            {{-- <i class="fas fa-stopwatch text-primary mr-1"></i> --}}

            → P :
            @if ($vdr->timestamp1 != null)
                <strong>{{$gap}}</strong>
                @else
                -
            @endif
        </span>

        <span class="badge badge-white border">

            {{-- <i class="fas fa-stopwatch text-primary mr-1"></i> --}}

            → R :
            @if ($vdr->timestamp2 != null)
                <strong>{{$gapPetMarine}}</strong>
                @else
                -
            @endif
        </span>

        <span class="badge badge-white border">

            → S :
            @if ($vdr->timestamp4 != null)
                <strong>{{$gapMarineSuptent}}</strong>
                @else
                @if ($vdr->timestamp3 != null)
                    <strong>{{$gapMarineSuptent}}</strong>
                    {{-- {{ $approveSuptent }} --}}
                    @else
                    -
                @endif
            @endif
        </span>

        <span class="badge badge-white border">

            → MR :
            @if ($vdr->timestamp3 != null)
                <strong>{{$gapSuptentMarineRep}}</strong>
                {{-- {{ $approveMarineRep }} --}}
                @else
                -
            @endif
        </span>
        
        @else
            {{-- TIMESTAMP FLOW REGULER --}}
            <span class="badge badge-white border">

                {{-- <i class="fas fa-stopwatch text-primary mr-1"></i> --}}

                → P :
                @if ($vdr->timestamp1 != null)
                    <strong>{{$gap}}</strong>
                    @else
                    -
                @endif
                

            </span>
            <span class="badge badge-white border">
        
                {{-- <i class="fas fa-stopwatch text-primary mr-1"></i> --}}
        
                → M :
                @if ($vdr->timestamp2 != null)
                    <strong>{{$gapPetMarine}}</strong>
                    @else
                    -
                @endif
                
            </span>
            <span class="badge badge-white border">
        
                → MR :
                @if ($vdr->timestamp3 != null)
                    <strong>{{$gapMarineMarineRep}}</strong>
                    @else
                    -
                @endif
                
            </span>
        @endif
    @else
        @if ($vdr->vessel->username == 'bestlink88')
            {{-- TIMESTAMP FLOW PATROL --}}
            
            @else
            {{-- TIMESTAMP FLOW NON PO --}}
            <span class="badge badge-white border">

                {{-- <i class="fas fa-stopwatch text-primary mr-1"></i> --}}

                → FM :
                <strong>{{$gapFm}}</strong>

            </span>

            @if ($vdr->timestamp1 != null)
                
            
            <span class="badge badge-white border">

                {{-- <i class="fas fa-stopwatch text-primary mr-1"></i> --}}

                → P :
                <strong>{{$gapPet}}</strong>

            </span>
            @endif

            @if ($vdr->timestamp4 != null)
                
            
            <span class="badge badge-white border">

                {{-- <i class="fas fa-stopwatch text-primary mr-1"></i> --}}

                → C :
                <strong>{{$gapPetSuptent}}</strong>

            </span>
            @endif

            @if ($vdr->timestamp2 != null)
                
            
            <span class="badge badge-white border">

                {{-- <i class="fas fa-stopwatch text-primary mr-1"></i> --}}

                → M :
                <strong>{{$gapSuptentMarine}}</strong>

            </span>
            @endif

            @if ($vdr->timestamp3 != null)
                
            
            <span class="badge badge-white border">

                {{-- <i class="fas fa-stopwatch text-primary mr-1"></i> --}}

                → MR :
                <strong>{{$gapMarineMarineRep}}</strong>

            </span>
            @endif
        @endif

@endif


@if ($vdr->timestamp3 != null)
 <span class="badge badge-success border">

            {{-- <i class="fas fa-stopwatch text-primary mr-1"></i> --}}

           
            @if ($vdr->timestamp3 != null)
                <strong>{{$gapFinal}}</strong>
                @else
                -
            @endif
        </span>
        @endif