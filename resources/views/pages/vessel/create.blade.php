@extends('layouts.app')
@section('title')
    Create Vessel
@endsection
@section('content')
   <div class="container-xl">
      <!-- Page title -->
      <div class="page-header d-print-none">
         <div class="row align-items-center">
            <div class="col">
            <!-- Page pre-title -->
               <div class="page-pretitle">
                  Form
               </div>
               <h2 class="page-title">
                  Create Vessel
               </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
               <div class="btn-list">
               
                  <div class="dropdown">
                     <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                     Option
                     </button>
                     <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">
                           Edit
                        </a>
                        <a class="dropdown-item" href="#">
                           Delete
                        </a>
                        
                     </div>
                  </div>
                  
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="page-body" >
      <div class="container-xl">
         <div class="card">
            <form action="{{route('vessel.store')}}" method="POST">
               @csrf
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                        @if ($errors->any())
                           <div class="alert alert-danger">
                              <ul>
                                    @foreach ($errors->all() as $error)
                                       <li>{{ $error }}</li>
                                    @endforeach
                              </ul>
                           </div>
                        @endif
                     </div>
                     <div class="col-md-8">
                        <div class="row">
                           <div class="col-md-12">
                              
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
                                 <label for="name">Vessel Name</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" name="prev_name" id="prev_name" value="{{old('prev_name')}}">
                                 <label for="prev_name">Previous Name</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" name="imo" id="imo" value="{{old('imo')}}">
                                 <label for="imo">IMO Number</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" name="type" id="type" value="{{old('type')}}">
                                 <label for="type">Type</label>
                              </div>
                           </div><div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" name="call_sign" id="call_sign" value="{{old('call_sign')}}">
                                 <label for="call_sign">Call Sign</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" name="flag" id="flag" value="{{old('flag')}}">
                                 <label for="flag">Flag</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" name="owner" id="owner" value="{{old('owner')}}">
                                 <label for="owner">Owner</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" name="operator" id="operator" value="{{old('operator')}}">
                                 <label for="operator">Operator</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating">
                                 <input type="text" class="form-control" name="port" id="port" value="{{old('port')}}">
                                 <label for="port">Port of Registry</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating">
                                 <input type="text" class="form-control" name="build" id="build" value="{{old('build')}}">
                                 <label for="build">Year of Build</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating">
                                 <input type="text" class="form-control" name="classed_by" id="classed_by" value="{{old('classed_by')}}">
                                 <label for="classed_by">Vessel Classed by</label>
                              </div>
                           </div>
                        </div>
                        <hr>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" name="class_notation" id="class_notation" value="{{old('class_notation')}}">
                                 <label for="class_notation">Class Notation</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="number" class="form-control" name="loa" id="loa" value="{{old('loa')}}">
                                 <label for="loa">LOA / Length Registered (meter)</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="number" class="form-control" name="beam" id="beam" value="{{old('beam')}}">
                                 <label for="beam">Beam (meter)</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="number" class="form-control" name="beam" id="beam" value="{{old('beam')}}">
                                 <label for="beam">Beam (meter)</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="number" class="form-control" name="depth" id="depth" value="{{old('depth')}}">
                                 <label for="depth">Depth (meter)</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="number" class="form-control" name="maxdraft" id="maxdraft" value="{{old('maxdraft')}}">
                                 <label for="maxdraft">Maximum Draft (meter)</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" name="deadweight" id="deadweight" value="{{old('deadweight')}}">
                                 <label for="deadweight">Deadweight Tonnage (meter)</label>
                              </div>
                           </div>
                           
                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="number" class="form-control" name="deckspace" id="deckspace" value="{{old('deckspace')}}">
                                 <label for="deckspace">Clear Deck Space (m2)</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" name="gross" id="gross" value="{{old('gross')}}">
                                 <label for="gross">Gross Tonnage / Net Tonnage (ton)</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="number" class="form-control" name="deckstrength" id="deckstrength" value="{{old('deckstrength')}}">
                                 <label for="deckstrength">Deck Strength (t/m2)</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="number" class="form-control" name="deckstrength" id="deckstrength" value="{{old('deckstrength')}}">
                                 <label for="deckstrength">Deck Strength (t/m2)</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="number" class="form-control" name="deckcapacity" id="deckcapacity" value="{{old('deckcapacity')}}">
                                 <label for="deckcapacity">Deck Cargo Capacity (ton)</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" name="main_engine" id="main_engine" value="{{old('main_engine')}}">
                                 <label for="main_engine">Main Engine Horsepower and Manufacture</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" name="no_engine" id="no_engine" value="{{old('no_engine')}}">
                                 <label for="no_engine">Number of Engines</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" name="no_main_propeller" id="no_main_propeller" value="{{old('no_main_propeller')}}">
                                 <label for="no_main_propeller">Number and Type of Main Propellers</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" name="no_rudder" id="no_rudder" value="{{old('no_rudder')}}">
                                 <label for="no_rudder">Number of Rudders</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" name="generator" id="generator" value="{{old('generator')}}">
                                 <label for="generator">Generator and Manufacturer</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" name="no_generator" id="no_generator" value="{{old('no_generator')}}">
                                 <label for="no_generator">Number of Generator</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" name="generator_detail" id="generator_detail" value="{{old('generator_detail')}}">
                                 <label for="generator_detail">Specified Detail Generator (Kw/Kva/Voltage/Hz)</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" name="kort_nozzle" id="kort_nozzle" value="{{old('kort_nozzle')}}">
                                 <label for="kort_nozzle">Kort Nozzles Fitted</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" name="bow_thruster" id="bow_thruster" value="{{old('bow_thruster')}}">
                                 <label for="bow_thruster">Bow Thruster Fitted (Number and Type)</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" name="stern_thruster" id="stern_thruster" value="{{old('stern_thruster')}}">
                                 <label for="stern_thruster">Stern Thruster Fitted (Number and Type)</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" name="other_propulsor" id="other_propulsor" value="{{old('other_propulsor')}}">
                                 <label for="other_propulsor">Other Propulsors Fitted (Number and Type)</label>
                              </div>
                           </div>

                           <div class="col-md-12">
                              <div class="row">
                                 <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                       <input type="text" class="form-control" name="speed_max" id="speed_max" value="{{old('speed_max')}}">
                                       <label for="speed_max">Speed Maximum</label>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                       <input type="text" class="form-control" name="speed_eco" id="speed_eco" value="{{old('speed_eco')}}">
                                       <label for="speed_eco">Speed Economical</label>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                       <input type="text" class="form-control" name="speed_towing" id="speed_towing" value="{{old('speed_towing')}}">
                                       <label for="speed_towing   ">Speed Towing</label>
                                    </div>
                                 </div>
                              </div>
                           </div>


                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" name="no_berth" id="no_berth" value="{{old('no_berth')}}">
                                 <label for="no_berth">No. of Berth or Pax</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" name="berth_detail" id="berth_detail" value="{{old('berth_detail')}}">
                                 <label for="berth_detail">Berth Detail</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" name="crane" id="crane" value="{{old('crane')}}">
                                 <label for="crane">Crane</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" name="com_system" id="com_system" value="{{old('com_system')}}">
                                 <label for="com_system">Communication System</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" name="bunker_type" id="bunker_type" value="{{old('bunker_type')}}">
                                 <label for="bunker_type">Bunker Type</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" name="bunker_capacity" id="bunker_capacity" value="{{old('bunker_capacity')}}">
                                 <label for="bunker_capacity">Bunker Capacity</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" name="daily_fuel_consumption" id="daily_fuel_consumption" value="{{old('daily_fuel_consumption')}}">
                                 <label for="daily_fuel_consumption">Daily Fuel Consumption</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" name="potable_water_capacity" id="potable_water_capacity" value="{{old('potable_water_capacity')}}">
                                 <label for="potable_water_capacity">Potable Water Capacity</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" name="potable_water" id="potable_water" value="{{old('potable_water')}}">
                                 <label for="potable_water">Vessel Can Potable Water</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" name="fifi_pump" id="fifi_pump" value="{{old('fifi_pump')}}">
                                 <label for="fifi_pump">Fifi Pump / Fire Pump Capacity</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" name="no_immarsat" id="no_immarsat" value="{{old('no_immarsat')}}">
                                 <label for="no_immarsat">No. Immarsat</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" name="no_vsat" id="no_vsat" value="{{old('no_vsat')}}">
                                 <label for="no_vsat">No. V-Sat</label>
                              </div>
                           </div>
                           
                        </div>
                     </div>
                     
                     <div class="col-md-4">  
                        <button type="submit" class="btn btn-primary py-3 mb-3 btn-block" style="width: 100%" data-bs-dismiss="modal">
                           <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><circle cx="12" cy="14" r="2" /><polyline points="14 4 14 8 8 8 8 4" /></svg>
                           Save
                        </button>
                        <div class="card mb-3">
                           <div class="card-header bg-secondary text-light">
                              Contact
                           </div>
                           <div class="card-body">
                              <div class="form-floating mb-3">
                                 <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}">
                                 <label for="email">Vessel Email</label>
                              </div>
                              <div class="form-floating mb-3">
                                 <input type="number" class="form-control" name="telp" id="telp" value="{{old('telp')}}">
                                 <label for="telp">Vessel Telp Number</label>
                              </div>
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" name="dpa_name" id="dpa_name" value="{{old('dpa_name')}}">
                                 <label for="dpa_name">DPA Name</label>
                              </div>
                              <div class="form-floating mb-3">
                                 <input type="number" class="form-control" name="dpa_telp" id="dpa_telp" value="{{old('dpa_telp')}}">
                                 <label for="dpa_telp">DPA Telp Number</label>
                              </div>
                           </div>
                        </div>
                        <div class="card">
                           <div class="card-header">
                           <small class="">Info</small>
                           </div>
                           <div class="list-group list-group-flush overflow-auto" id="reserved" style="max-height: 12rem">
                              
                              <div class="list-group-item">
                                 <div class="row">
                                    <div class="col text-muted">
                                       <small>
                                          Make sure the email is active, because after the data is saved the ship will receive a welcome email containing further instructions to enter the system
                                       </small>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="card-footer">
                              <small class="text-muted">Make sure the size and weight data match the actual data, because these data will be used as validation references when Set Schedule</small>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card-footer">
                  <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><circle cx="12" cy="14" r="2" /><polyline points="14 4 14 8 8 8 8 4" /></svg>
                     Save
                  </button>
               </div>
            </form>
         </div>
       </div>
   </div>

@endsection
