@extends('layouts.app')
@section('title')
   Vessel Detail
@endsection
@section('content')
   <div class="container-xl">
      <!-- Page title -->
      <div class="page-header d-print-none">
         <div class="row align-items-center">
            <div class="col">
               {{-- <h2 class="page-title">
               Vessel
               </h2>
               <div class="text-muted mt-1">Detail</div> --}}
               <div class="page-pretitle">
                  Overview
               </div>
               <h2 class="page-title">
                  Vessel Detail
               </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
               <div class="d-flex">
               {{-- <input type="search" class="form-control d-inline-block w-9 me-3" placeholder="Search user…"/> --}}
               {{-- <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-add-vessel">
                  <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                  New vessel
               </a> --}}
                  <div class="dropdown">
                     <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                     Options
                     </button>
                     <div class="dropdown-menu dropdown-menu-end">
                     {{-- <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-edit-vessel">
                        Edit
                     </a> --}}
                     <a class="dropdown-item" href="{{route('vessel.edit', enkripRambo($vessel->id))}}" >
                        Edit
                     </a>
                     <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-delete-vessel">
                        Delete
                     </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="page-body">
      <div class="container-xl">
         <div class="card" href="#">
            <div class="card-cover text-center bg-azure" >
               <span class="avatar avatar-xl avatar-thumb avatar-rounded" > 
                  {{-- <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M2 20a2.4 2.4 0 0 0 2 1a2.4 2.4 0 0 0 2 -1a2.4 2.4 0 0 1 2 -1a2.4 2.4 0 0 1 2 1a2.4 2.4 0 0 0 2 1a2.4 2.4 0 0 0 2 -1a2.4 2.4 0 0 1 2 -1a2.4 2.4 0 0 1 2 1a2.4 2.4 0 0 0 2 1a2.4 2.4 0 0 0 2 -1" /><path d="M4 18l-1 -5h18l-2 4" /><path d="M5 13v-6h8l4 6" /><path d="M7 7v-4h-1" /></svg> --}}
                  @if ($vessel->status == 1)
                     <img src="{{asset('img/vessel/docking.png')}}" alt="">
                     @elseif($vessel->status == 2)
                     <img src="{{asset('img/vessel/ship.png')}}" alt="">
                  @endif
               </span>
            </div>
            <div class="card-body text-center">
              <div class="card-title mb-1">{{$vessel->name}}</div>
              <div class="text-muted">{{$vessel->type}}</div>
              {{-- <hr>
               <x-status.vessel :vessel="$vessel" /> --}}
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-md-8">
               <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">
                      Detail
                    </h3>
                    
                  </div>
                  <div class="card-body">
                     <dl class="row">
                        <dt class="col-5">Name</dt>
                        <dd class="col-7">: {{$vessel->name}}</dd>
                        <dt class="col-5">Prev Name</dt>
                        <dd class="col-7">: {{$vessel->prev_name ?? '-'}}   </dd>
                        <dt class="col-5">IMO Number</dt>
                        <dd class="col-7">: {{$vessel->imo}}</dd>
                        <dt class="col-5">Type of Vessel</dt>
                        <dd class="col-7">: {{$vessel->type}}</dd>
                        <dt class="col-5">Vessel Owner</dt>
                        <dd class="col-7">: {{$vessel->owner}}</dd>
                        <dt class="col-5">Vessel Operator</dt>
                        <dd class="col-7">: {{$vessel->operator}}</dd>
                        <dt class="col-5">Flag</dt>
                        <dd class="col-7">: {{$vessel->flag}}</dd>
                        <dt class="col-5">Call Sign</dt>
                        <dd class="col-7">: {{$vessel->call_sign}}</dd>
                        <dt class="col-5">Port of Registry</dt>
                        <dd class="col-7">: {{$vessel->port}}</dd>
                        <dt class="col-5">Year of Build</dt>
                        <dd class="col-7">: {{$vessel->build}}</dd>
                        <dt class="col-5">Vessel Classed by</dt>
                        <dd class="col-7">: {{$vessel->classed_by}}</dd>
                        <dt class="col-5">Class Notation</dt>
                        <dd class="col-7">: {{$vessel->class_notation}}</dd>
                        <dt class="col-5">LOA / Length Registered</dt>
                        <dd class="col-7">: {{$vessel->loa}}</dd>
                        <dt class="col-5">Beam</dt>
                        <dd class="col-7">: {{$vessel->beam}}</dd>
                        <dt class="col-5">Depth</dt>
                        <dd class="col-7">: {{$vessel->depth}}</dd>
                        <dt class="col-5">Maximum Draft</dt>
                        <dd class="col-7">: {{$vessel->max_draft}}</dd>
                        <dt class="col-5">Deadweight Tonnage</dt>
                        <dd class="col-7">: {{$vessel->deadweight}}</dd>
                        <dt class="col-5">Gross Tonnage / Net Tonnage</dt>
                        <dd class="col-7">: {{$vessel->gross}}</dd>
                        <dt class="col-5">Clear Deck Space</dt>
                        <dd class="col-7">: {{$vessel->deck_space}}</dd>
                        <dt class="col-5">Deck Strength</dt>
                        <dd class="col-7">: {{$vessel->deck_strength}}</dd>
                        <dt class="col-5">Deck Cargo Capacity</dt>
                        <dd class="col-7">: {{$vessel->deck_cargo_capacity}}</dd>
                        
                     </dl>
                  </div>
               </div>

               <div class="card mt-3">
                  <div class="card-header">
                    <h3 class="card-title">
                      More Detail
                    </h3>
                    
                  </div>
                  <div class="card-body">
                     <dl class="row">
                        <dt class="col-5">Main Engine HP and Manufacture</dt>
                        <dd class="col-7">: {{$vessel->main_engine}}</dd>
                        <dt class="col-5">Number of Engine</dt>
                        <dd class="col-7">: {{$vessel->no_engine}}   </dd>
                        <dt class="col-5">Number and Type of Main Propellers</dt>
                        <dd class="col-7">: {{$vessel->no_main_propeller}}</dd>
                        <dt class="col-5">Number of Rudders</dt>
                        <dd class="col-7">: {{$vessel->no_rudder}}</dd>
                        <dt class="col-5">Generator and Manufacture</dt>
                        <dd class="col-7">: {{$vessel->generator}}</dd>
                        <dt class="col-5">Number of Generator</dt>
                        <dd class="col-7">: {{$vessel->no_generator}}</dd>
                        <dt class="col-5">Specified Detail</dt>
                        <dd class="col-7">: {{$vessel->generator_detail}}</dd>
                        <dt class="col-5">Kort Nozzles Fitted</dt>
                        <dd class="col-7">: {{$vessel->kort_nozzle}}</dd>
                        <dt class="col-5">Bow Thruster Fitted</dt>
                        <dd class="col-7">: {{$vessel->bow_thruster}}</dd>
                        <dt class="col-5">Stern Thruster Fitted</dt>
                        <dd class="col-7">: {{$vessel->stern_thruster}}</dd>
                        <dt class="col-5">Other Propulsors Fitted</dt>
                        <dd class="col-7">: {{$vessel->other_propulsors}}</dd>
                        <dt class="col-5">Speed Maximum</dt>
                        <dd class="col-7">: {{$vessel->speed_max}}</dd>
                        <dt class="col-5">Speed Economical</dt>
                        <dd class="col-7">: {{$vessel->speed_eco}}</dd>
                        <dt class="col-5">Speed Towing</dt>
                        <dd class="col-7">: {{$vessel->speed_towing}}</dd>
                        <dt class="col-5">No of Birth or Pax</dt>
                        <dd class="col-7">: {{$vessel->no_birth}}</dd>
                        <dt class="col-5">Birth Detail</dt>
                        <dd class="col-7">: {{$vessel->birth_detail}}</dd>
                        <dt class="col-5">Crane</dt>
                        <dd class="col-7">: {{$vessel->crane}}</dd>
                        <dt class="col-5">Communication System</dt>
                        <dd class="col-7">: {{$vessel->comm_system}}</dd>
                        <dt class="col-5">Type of Bunkers</dt>
                        <dd class="col-7">: {{$vessel->bunker_type}}</dd>
                        <dt class="col-5">Bunker Capacity</dt>
                        <dd class="col-7">: {{$vessel->bunker_capacity}}</dd>
                        <dt class="col-5">Daily Fuel Consumption</dt>
                        <dd class="col-7">: {{$vessel->daily_fuel_consumption}}</dd>
                        <dt class="col-5">Potable Water Capacity</dt>
                        <dd class="col-7">: {{$vessel->daily_fuel_consumption}}</dd>
                        <dt class="col-5">Potable Water Capacity</dt>
                        <dd class="col-7">: {{$vessel->potable_water}}</dd>
                        <dt class="col-5">Fifi Pump / Fire Pump Capacity</dt>
                        <dd class="col-7">: {{$vessel->fifi_pump_capacity}}</dd>
                        <dt class="col-5">Immarsat Number</dt>
                        <dd class="col-7">: {{$vessel->no_immarsat}}</dd>
                        <dt class="col-5">V-Sat Number</dt>
                        <dd class="col-7">: {{$vessel->vsat_number}}</dd>
                        
                     </dl>
                  </div>
               </div>
               
            </div>
            <div class="col-md-4">
               <div class="card">
                  <div class="card-body">
                    <div class="card-title">Contact</div>
                    <div class="mb-2">
                      <!-- Download SVG icon from http://tabler-icons.io/i/book -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0" /><path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0" /><line x1="3" y1="6" x2="3" y2="19" /><line x1="12" y1="6" x2="12" y2="19" /><line x1="21" y1="6" x2="21" y2="19" /></svg>
                      Telp: <strong>{{$vessel->telp}}</strong>
                    </div>
                    <div class="mb-2">
                      <!-- Download SVG icon from http://tabler-icons.io/i/briefcase -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="3" y="7" width="18" height="13" rx="2" /><path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2" /><line x1="12" y1="12" x2="12" y2="12.01" /><path d="M3 13a20 20 0 0 0 18 0" /></svg>
                      Email: <strong>{{$vessel->email}}</strong>
                    </div>
                    <div class="mb-2">
                      <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                      DPA Name: <strong>{{$vessel->dpa_name}}</strong>
                    </div>
                    <div class="mb-2">
                      <!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="11" r="3" /><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" /></svg>
                      DPA No. Telp: <strong>{{$vessel->dpa_telp}}</strong>
                    </div>
                    
                  </div>
               </div>
               <div class="card mt-3">
                  <div class="card-body">
                     <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi perspiciatis animi quibusdam quisquam fugiat, aliquam laudantium, ratione ullam minima ipsam pariatur, mollitia inventore at iusto!</small>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <x-modal.edit-vessel :vessel="$vessel" />
   <x-modal.delete-vessel :vessel="$vessel" />
@endsection