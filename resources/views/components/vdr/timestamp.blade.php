


@if ($vdr->vessel->contract_type != 'Non PO')
             
         
        @if ($vdr->vessel->type == 'Tug Boat' || $vdr->vessel->ipb == 'IPB')
        {{-- TIMESTAMP FLOW IPB --}}
        <div class="d-flex align-items-center flex-nowrap overflow-auto pt-2 mt-2 border-top small">

            {{-- RELEASE --}}
            <div class="mr-3 text-nowrap">

                @if ($vdr->status == 0)
                    <div class="text-muted fw-bold">
                        <i class="fas fa-paper-plane mr-1"></i>
                        RELEASE
                    </div>

                    <div class="text-muted pl-2" style="font-size:11px;">
                         • Empty
                    </div>
                    @else
                    <div class="text-success fw-bold">
                        <i class="fas fa-paper-plane mr-1"></i>
                        RELEASE
                    </div>

                    <div class="text-muted" style="font-size:11px;">
                        {{ formatDateTimeCompact($vdr->release_date) }}
                    </div>
                @endif
                

            </div>

            {{-- APPROVED PET --}}
            {{-- <div class="mr-3 text-nowrap">

                @if ($vdr->title1 != null)

                    <div class="text-primary fw-bold">
                        <i class="fas fa-check-circle mr-1"></i>
                        PET
                    </div>

                    <div class="text-muted" style="font-size:11px;">
                        @if ($vdr->timestamp1 != null)
                        {{ formatDateTimeCompact($vdr->timestamp1) }}        
                        @endif
                    </div>


                    @else
                    <div class="text-muted fw-bold">
                        <i class="fas fa-check-circle mr-1"></i>
                        PET
                    </div>

                    <div class="text-muted pl-2" style="font-size:11px;">
                        • Empty
                    </div>


                @endif

            </div> --}}

            {{-- APPROVED FM --}}
            <div class="mr-3 text-nowrap">

                @if ($vdr->title11 != null)

                    <div class="text-primary fw-bold">
                        <i class="fas fa-check-circle mr-1"></i>
                        FM
                    </div>

                    <div class="text-muted" style="font-size:11px;">
                        @if ($vdr->timestamp11 != null)
                        {{ formatDateTimeCompact($vdr->timestamp11) }}        
                        @endif
                    </div>


                    @else
                    <div class="text-muted fw-bold">
                        <i class="fas fa-check-circle mr-1"></i>
                        FM
                    </div>

                    <div class="text-muted pl-2" style="font-size:11px;">
                        • Empty
                    </div>


                @endif

            </div>

            {{-- APPROVED Radop --}}
            <div class="mr-3 text-nowrap">

                @if ($vdr->title2 != null)

                    <div class="text-primary fw-bold">
                        <i class="fas fa-check-circle mr-1"></i>
                        RADOP
                    </div>

                    <div class="text-muted" style="font-size:11px;">
                        @if ($vdr->timestamp2 != null)
                        {{ formatDateTimeCompact($vdr->timestamp2) }}        
                        @endif
                    </div>


                    @else
                    <div class="text-muted fw-bold">
                        <i class="fas fa-check-circle mr-1"></i>
                        RADOP
                    </div>

                    <div class="text-muted pl-2" style="font-size:11px;">
                        • Empty
                    </div>


                @endif

            </div>

            {{-- APPROVED Suptent --}}
            <div class="mr-3 text-nowrap">

                @if ($vdr->title4 != null)

                    <div class="text-primary fw-bold">
                        <i class="fas fa-check-circle mr-1"></i>
                        SUPTENT
                    </div>

                    <div class="text-muted" style="font-size:11px;">
                        @if ($vdr->timestamp4 != null)
                        {{ formatDateTimeCompact($vdr->timestamp4) }}     
                        @else
                        {{-- <i>Approved</i>    --}}
                        {{ formatDateTimeCompact(\Carbon\Carbon::parse($vdr->timestamp3)->subDay()) }}
                        @endif
                    </div>


                    @else
                    <div class="text-muted fw-bold">
                        <i class="fas fa-check-circle mr-1"></i>
                        SUPTENT
                    </div>

                    <div class="text-muted pl-2" style="font-size:11px;">
                        • Empty
                    </div>


                @endif

            </div>

            {{-- APPROVED Marine Rep --}}
            <div class="mr-2 text-nowrap">

                @if ($vdr->title3 != null)

                    <div class="text-primary fw-bold">
                        <i class="fas fa-check-circle mr-1"></i>
                        MARINE REP
                    </div>

                    <div class="text-muted" style="font-size:11px;">
                        @if ($vdr->timestamp3 != null)
                        {{ formatDateTimeCompact($vdr->timestamp3) }}        
                        @endif
                    </div>


                    @else
                    <div class="text-muted fw-bold">
                        <i class="fas fa-check-circle mr-1"></i>
                        MARINE REP
                    </div>

                    <div class="text-muted pl-2" style="font-size:11px;">
                        • Empty
                    </div>


                @endif

            </div>

                

        </div>
        @else
        {{-- TIMESTAMP FLOW REGULER --}}
        <div class="d-flex align-items-center flex-nowrap overflow-auto pt-2 mt-2 border-top small">

            {{-- RELEASE --}}
            <div class="mr-3 text-nowrap">

                @if ($vdr->status == 0)
                    <div class="text-success fw-bold">
                        <i class="fas fa-paper-plane mr-1"></i>
                        RELEASE
                    </div>

                    <div class="text-muted pl-2" style="font-size:11px;">
                        • Empty
                    </div>
                    @else
                    <div class="text-success fw-bold">
                        <i class="fas fa-paper-plane mr-1"></i>
                        RELEASE
                    </div>

                    <div class="text-muted" style="font-size:11px;">
                        {{ formatDateTimeCompact($vdr->release_date) }}
                    </div>
                @endif
                

            </div>

            {{-- APPROVED PET --}}
            {{-- <div class="mr-3 text-nowrap">

                @if ($vdr->title1 != null)

                    <div class="text-primary fw-bold">
                        <i class="fas fa-check-circle mr-1"></i>
                        PET
                    </div>

                    <div class="text-muted" style="font-size:11px;">
                        @if ($vdr->timestamp1 != null)
                        {{ formatDateTimeCompact($vdr->timestamp1) }}        
                        @endif
                    </div>


                    @else
                    <div class="text-muted fw-bold">
                        <i class="fas fa-check-circle mr-1"></i>
                        PET
                    </div>

                    <div class="text-muted pl-2" style="font-size:11px;">
                        • Empty
                    </div>


                @endif

            </div> --}}
            {{-- APPROVED FM --}}
            <div class="mr-3 text-nowrap">

                @if ($vdr->title11 != null)

                    <div class="text-primary fw-bold">
                        <i class="fas fa-check-circle mr-1"></i>
                        FM
                    </div>

                    <div class="text-muted" style="font-size:11px;">
                        @if ($vdr->timestamp11 != null)
                        {{ formatDateTimeCompact($vdr->timestamp11) }}        
                        @endif
                    </div>


                    @else
                    <div class="text-muted fw-bold">
                        <i class="fas fa-check-circle mr-1"></i>
                        FM
                    </div>

                    <div class="text-muted pl-2" style="font-size:11px;">
                        • Empty
                    </div>


                @endif

            </div>

            {{-- APPROVED Radop --}}
            <div class="mr-3 text-nowrap">

                @if ($vdr->title2 != null)

                    <div class="text-primary fw-bold">
                        <i class="fas fa-check-circle mr-1"></i>
                        MARINE
                    </div>

                    <div class="text-muted" style="font-size:11px;">
                        @if ($vdr->timestamp2 != null)
                        {{ formatDateTimeCompact($vdr->timestamp2) }}        
                        @endif
                    </div>


                    @else
                    <div class="text-muted fw-bold">
                        <i class="fas fa-check-circle mr-1"></i>
                        MARINE
                    </div>

                    <div class="text-muted pl-2" style="font-size:11px;">
                        • Empty
                    </div>


                @endif

            </div>

            

            {{-- APPROVED Marine Rep --}}
            <div class="mr-2 text-nowrap">

                @if ($vdr->title3 != null)

                    <div class="text-primary fw-bold">
                        <i class="fas fa-check-circle mr-1"></i>
                        MARINE REP
                    </div>

                    <div class="text-muted" style="font-size:11px;">
                        @if ($vdr->timestamp3 != null)
                        {{ formatDateTimeCompact($vdr->timestamp3) }}        
                        @endif
                    </div>


                    @else
                    <div class="text-muted fw-bold">
                        <i class="fas fa-check-circle mr-1"></i>
                        MARINE REP
                    </div>

                    <div class="text-muted pl-2" style="font-size:11px;">
                        • Empty
                    </div>


                @endif

            </div>

                

        </div>
        @endif
    @else
        @if ($vdr->vessel->username == 'bestlink88')
            {{-- TIMESTAMP FLOW PATROL --}}
            <div class="d-flex align-items-center flex-nowrap overflow-auto pt-2 mt-2 border-top small">

                {{-- RELEASE --}}
                <div class="mr-3 text-nowrap">

                    @if ($vdr->status == 0)
                        <div class="text-success fw-bold">
                            <i class="fas fa-paper-plane mr-1"></i>
                            RELEASE
                        </div>

                        <div class="text-muted pl-2" style="font-size:11px;">
                            • Empty
                        </div>
                        @else
                        <div class="text-success fw-bold">
                            <i class="fas fa-paper-plane mr-1"></i>
                            RELEASE
                        </div>

                        <div class="text-muted" style="font-size:11px;">
                            {{ formatDateTimeCompact($vdr->release_date) }}
                        </div>
                    @endif
                    

                </div>


                {{-- APPROVED FM --}}
                <div class="mr-3 text-nowrap">

                    @if ($vdr->title11 != null)

                        <div class="text-primary fw-bold">
                            <i class="fas fa-check-circle mr-1"></i>
                            FM
                        </div>

                        <div class="text-muted" style="font-size:11px;">
                            @if ($vdr->timestamp11 != null)
                            {{ formatDateTimeCompact($vdr->timestamp11) }}        
                            @endif
                        </div>


                        @else
                        <div class="text-muted fw-bold">
                            <i class="fas fa-check-circle mr-1"></i>
                            FM
                        </div>

                        <div class="text-muted pl-2" style="font-size:11px;">
                            • Empty
                        </div>


                    @endif

                </div>

                {{-- APPROVED PET --}}
                <div class="mr-3 text-nowrap">

                    @if ($vdr->title1 != null)

                        <div class="text-primary fw-bold">
                            <i class="fas fa-check-circle mr-1"></i>
                            PET
                        </div>

                        <div class="text-muted" style="font-size:11px;">
                            @if ($vdr->timestamp1 != null)
                            {{ formatDateTimeCompact($vdr->timestamp1) }}        
                            @endif
                        </div>


                        @else
                        <div class="text-muted fw-bold">
                            <i class="fas fa-check-circle mr-1"></i>
                            PET
                        </div>

                        <div class="text-muted pl-2" style="font-size:11px;">
                            • Empty
                        </div>


                    @endif

                </div>

                {{-- APPROVED Radop --}}
                <div class="mr-3 text-nowrap">

                    @if ($vdr->title22 != null)

                        <div class="text-primary fw-bold">
                            <i class="fas fa-check-circle mr-1"></i>
                            LEAD COMMAND
                        </div>

                        <div class="text-muted" style="font-size:11px;">
                            @if ($vdr->timestamp22 != null)
                            {{ formatDateTimeCompact($vdr->timestamp22) }}        
                            @endif
                        </div>


                        @else
                        <div class="text-muted fw-bold">
                            <i class="fas fa-check-circle mr-1"></i>
                            LEAD COMMAND
                        </div>

                        <div class="text-muted pl-2" style="font-size:11px;">
                            • Empty
                        </div>


                    @endif

                </div>

                {{-- APPROVED Suptent --}}
                <div class="mr-2 text-nowrap">

                    @if ($vdr->title4 != null)

                        <div class="text-primary fw-bold">
                            <i class="fas fa-check-circle mr-1"></i>
                            SUPTENT SEC
                        </div>

                        <div class="text-muted" style="font-size:11px;">
                            @if ($vdr->timestamp4 != null)
                            {{ formatDateTimeCompact($vdr->timestamp4) }}        
                            @endif
                        </div>


                        @else
                        <div class="text-muted fw-bold">
                            <i class="fas fa-check-circle mr-1"></i>
                            SUPTENT SEC
                        </div>

                        <div class="text-muted pl-2" style="font-size:11px;">
                            • Empty
                        </div>


                    @endif

                </div>

               

                    

            </div>
            @else
            {{-- TIMESTAMP FLOW NON PO --}}
            <div class="d-flex align-items-center flex-nowrap overflow-auto pt-2 mt-2 border-top small">

                {{-- RELEASE --}}
                <div class="mr-3 text-nowrap">

                    @if ($vdr->status == 0)
                        <div class="text-success fw-bold">
                            <i class="fas fa-paper-plane mr-1"></i>
                            RELEASE
                        </div>

                        <div class="text-muted pl-2" style="font-size:11px;">
                            • Empty
                        </div>
                        @else
                        <div class="text-success fw-bold">
                            <i class="fas fa-paper-plane mr-1"></i>
                            RELEASE
                        </div>

                        <div class="text-muted" style="font-size:11px;">
                            {{ formatDateTimeCompact($vdr->release_date) }}
                        </div>
                    @endif
                    

                </div>

                {{-- APPROVED FM --}}
                <div class="mr-3 text-nowrap">

                    @if ($vdr->title11 != null)

                        <div class="text-primary fw-bold">
                            <i class="fas fa-check-circle mr-1"></i>
                            FM
                        </div>

                        <div class="text-muted" style="font-size:11px;">
                            @if ($vdr->timestamp11 != null)
                            {{ formatDateTimeCompact($vdr->timestamp11) }}        
                            @endif
                        </div>


                        @else
                        <div class="text-muted fw-bold">
                            <i class="fas fa-check-circle mr-1"></i>
                            FM
                        </div>

                        <div class="text-muted pl-2" style="font-size:11px;">
                            • Empty
                        </div>


                    @endif

                </div>

                {{-- APPROVED PET --}}
                {{-- <div class="mr-3 text-nowrap">

                    @if ($vdr->title1 != null)

                        <div class="text-primary fw-bold">
                            <i class="fas fa-check-circle mr-1"></i>
                            PET
                        </div>

                        <div class="text-muted" style="font-size:11px;">
                            @if ($vdr->timestamp1 != null)
                            {{ formatDateTimeCompact($vdr->timestamp1) }}        
                            @endif
                        </div>


                        @else
                        <div class="text-muted fw-bold">
                            <i class="fas fa-check-circle mr-1"></i>
                            PET
                        </div>

                        <div class="text-muted pl-2" style="font-size:11px;">
                            • Empty
                        </div>


                    @endif

                </div> --}}

                {{-- APPROVED Radop --}}
                <div class="mr-3 text-nowrap">

                    @if ($vdr->title4 != null)

                        <div class="text-primary fw-bold">
                            <i class="fas fa-check-circle mr-1"></i>
                            COMAN
                        </div>

                        <div class="text-muted" style="font-size:11px;">
                            @if ($vdr->timestamp4 != null)
                            {{ formatDateTimeCompact($vdr->timestamp4) }}        
                            @endif
                        </div>


                        @else
                        <div class="text-muted fw-bold">
                            <i class="fas fa-check-circle mr-1"></i>
                            COMAN
                        </div>

                        <div class="text-muted pl-2" style="font-size:11px;">
                            • Empty
                        </div>


                    @endif

                </div>

                {{-- APPROVED Suptent --}}
                <div class="mr-3 text-nowrap">

                    @if ($vdr->title2 != null)

                        <div class="text-primary fw-bold">
                            <i class="fas fa-check-circle mr-1"></i>
                            MARINE
                        </div>

                        <div class="text-muted" style="font-size:11px;">
                            @if ($vdr->timestamp2 != null)
                            {{ formatDateTimeCompact($vdr->timestamp2) }}        
                            @endif
                        </div>


                        @else
                        <div class="text-muted fw-bold">
                            <i class="fas fa-check-circle mr-1"></i>
                            MARINE
                        </div>

                        <div class="text-muted pl-2" style="font-size:11px;">
                            • Empty
                        </div>


                    @endif

                </div>

                {{-- APPROVED Marine Rep --}}
                <div class="mr-2 text-nowrap">

                    @if ($vdr->title3 != null)

                        <div class="text-primary fw-bold">
                            <i class="fas fa-check-circle mr-1"></i>
                            MARINE REP
                        </div>

                        <div class="text-muted" style="font-size:11px;">
                            @if ($vdr->timestamp3 != null)
                            {{ formatDateTimeCompact($vdr->timestamp3) }}        
                            @endif
                        </div>


                        @else
                        <div class="text-muted fw-bold">
                            <i class="fas fa-check-circle mr-1"></i>
                            MARINE REP
                        </div>

                        <div class="text-muted pl-2" style="font-size:11px;">
                            • Empty
                        </div>


                    @endif

                </div>

                    

            </div>
        @endif

@endif