@if ($vessel->contract_type != 'Non PO')
             
         
    @if ($vessel->type == 'Tug Boat' || $vessel->ipb == 'IPB')
         IPB / Tug Boat
    @else
        Regular
    
    @endif
@else
    @if ($vessel->username == 'bestlink88')
        Patrol Boat
                
        @else
        
         Non PO
    
    @endif

@endif