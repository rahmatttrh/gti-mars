@if ($vessel->contract_type != 'Non PO')
             
         
@if ($vessel->type == 'Tug Boat' || $vessel->ipb == 'IPB')
    <span class="">
        <i class="fas fa-anchor text-warning mr-1"></i> IPB / Tug Boat
    </span>
@else
    <span class="">
        <i class="fas fa-file-alt text-primary mr-1"></i> Regular
    </span>
@endif
@else
@if ($vessel->username == 'bestlink88')
    <span class="">
                <i class="fas fa-file-alt text-primary mr-1"></i> Patrol Boat
            </span>
    @else
    
    <span class="">
            <i class="fas fa-ship text-primary mr-1"></i> Non PO
        </span>
@endif

@endif