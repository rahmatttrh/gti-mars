@extends('layouts.app')
@section('title')
    Schedule Detail
@endsection
@section('content')
   <div class="container-xl">
      <!-- Page title -->
      <div class="page-header d-print-none">
         <div class="row align-items-center">
            <div class="col">
            <!-- Page pre-title -->
               <div class="page-pretitle">
                  Overview
               </div>
               <h2 class="page-title">
                  Vessel Schedule Detail
               </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
            <div class="btn-list">
               {{-- <span class="d-none d-sm-inline">
                  <a href="#" class="btn btn-white">
                  New view
                  </a>
               </span> --}}
               @if ($schedule->status == 1)
                  <div class="dropdown">
                     <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                     Option
                     </button>
                     <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="{{route('schedule.edit', enkripRambo($schedule->id))}}">
                           Edit
                        </a>
                        <a class="dropdown-item" href="#">
                           Delete
                        </a>
                        
                     </div>
                  </div>
               @endif
               
               <div class="dropdown">
                  <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                  Actions
                  </button>
                  <div class="dropdown-menu dropdown-menu-end">
                     @if ($schedule->status == 1 && auth()->user()->hasRole('marine'))
                     <a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#modal-select-vessel-{{$schedule->id}}">
                        Select Boat
                     </a>
                     @endif
                     
                     <a class="dropdown-item" href="#">
                        Update
                     </a>
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item" href="#">
                        Timeline
                     </a>
                     <a class="dropdown-item" href="#">
                        Print Preview
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
         <div class="row row-deck">
            <div class="col-md-7">
               <div class="card mb-3">
                  <div class="card-body">
                    <div class="row g-2 align-items-center">
                      <div class="col-auto">
                        <span class="avatar avatar-lg bg-info text-white"><!-- Download SVG icon from http://tabler-icons.io/i/calendar-event -->
                           <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><rect x="8" y="15" width="2" height="2" /></svg></span>
                      </div>
                      <div class="col ms-2">
                        <div class="text-muted">
                           Vessel
                         </div>
                        <h4 class="card-title m-0">
                           @if ($schedule->status == 1)
                           [Please select boat by click Action button]
                           @else
                           <a href="#">{{$schedule->vessel->name}}</a>
                           @endif
                          
                        </h4>
                        <small>{{$schedule->activity}}</small>
                        <div class="mt-1">
                          <x-status.schedule :schedule="$schedule" />
                        </div>
                        
                      </div>
                      
                      
                    </div>
                    <div class="row">
                     <div class="col-md-12">
                      
                     </div>
                    </div>
                  </div>
               </div>
            </div>
            <div class="col-md-5">
               <div class="card mb-3">
                  <div class="card-body">
                     @if ($schedule->status == 1)
                     [Please select boat by click Action button]
                        @else
                        <div class="mt-2 mb-2">
                           <div class="row g-2 align-items-center mb-2">
                             <div class="col-4">
                              Capacity Pax [105]
                             </div>
                             <div class="col-8">
                               <div class="progress progress-lg">
                                 <div class="progress-bar" style="width: 100%" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                   <span class="visually-hidden">25% Complete</span>
                                 </div>
                               </div>
                             </div>
                           </div>
   
                           <div class="row g-2 align-items-center mb-2">
                              <div class="col-4">
                               Pax Onduty [103]
                              </div>
                              <div class="col-8">
                                <div class="progress progress-lg">
                                  <div class="progress-bar" style="width: 25%" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                    <span class="visually-hidden">25% Complete</span>
                                  </div>
                                </div>
                              </div>
                           </div>
   
                           <div class="row g-2 align-items-center">
                              <div class="col-4">
                               Pax Offduty [120]
                              </div>
                              <div class="col-8">
                                <div class="progress progress-lg">
                                  <div class="progress-bar" style="width: 40%" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                    <span class="visually-hidden">25% Complete</span>
                                  </div>
                                </div>
                              </div>
                           </div>
                        </div>
                     @endif
                  </div>
               </div>
            </div>
         </div>
         
         <div class="card card-lg">
            <div class="card-body">
               {{-- <div class="row mt--4 mb-2">
                  <div class="col-6">
                     <p class="h3">Origin</p>
                     <address>
                        {{$schedule->origin->name}} - {{$schedule->jetty->name}} <br>
                        {{ \Carbon\Carbon::parse($schedule->departure)->format('d/m/Y') }} <br>
                        Docking : {{$schedule->docking}} WIB<br>
                        Departure : {{$schedule->departure}} WIB
                     </address>
                  </div>
                  <div class="col-6 text-end">
                     <p class="h3">Destination</p>
                     <address>
                        {{$schedule->destination->name}}<br>
                        {{ \Carbon\Carbon::parse($schedule->arrival)->format('l d/m/Y h:m') }} 
                     </address>
                  </div>
               </div> --}}
               <div class="accordion" id="accordion-example ">
                  <div class="accordion-item">
                     <h2 class="accordion-header" id="heading-1">
                        <button class="accordion-button " type="button" data-bs-toggle="collapse"
                           data-bs-target="#collapse-1" aria-expanded="true">
                           Detail
                        </button>
                     </h2>
                     <div id="collapse-1" class="accordion-collapse collapse show"
                        data-bs-parent="#accordion-example">
                        <div class="accordion-body pt-0">
                           <hr>
                           <dl class="row">
                              <dt class="col-2">Date</dt>
                              <dd class="col-10">: {{\Carbon\Carbon::parse($schedule->date)->format('d/m/Y')}}</dd>
                              
                              <dt class="col-2">From</dt>
                              <dd class="col-10">: {{$schedule->origin->name}}</dd>

                              <dt class="col-2">Destination</dt>
                              <dd class="col-10">: {{$schedule->destination->name}}</dd>
                             
                              <dt class="col-2">Function</dt>
                              <dd class="col-10">: {{$schedule->func}}</dd>

                              <dt class="col-2">Station</dt>
                              <dd class="col-10">: {{$schedule->station}}</dd>

                              <dt class="col-2">Activity</dt>
                              <dd class="col-10">: {{$schedule->activity}}</dd>

                              <dt class="col-2">Depart</dt>
                              <dd class="col-10">: {{$schedule->departure}}</dd>
                              <dt class="col-2">Arrived</dt>
                              <dd class="col-10">: {{$schedule->departure}}</dd>
                              <dt class="col-2">Return to Base</dt>
                              <dd class="col-10">: {{$schedule->departure}}</dd>
                           </dl>
                        </div>
                     </div>
                  </div>
               </div>
      <hr>
               <div class="accordion" id="accordion-example ">
                  <div class="accordion-item">
                     <h2 class="accordion-header" id="heading-1">
                        <button class="accordion-button " type="button" data-bs-toggle="collapse"
                           data-bs-target="#collapse-2" aria-expanded="true">
                           Cargo
                        </button>
                     </h2>
                     <div id="collapse-2" class="accordion-collapse collapse show"
                        data-bs-parent="#accordion-example">
                        <div class="accordion-body pt-0">
                           <h1 class="mt-4 mb-2">Detail Cargo</h1>
                           <table class="table table-transparent table-responsive">
                              <thead>
                              <tr>
                                 <th class="text-center" style="width: 1%"></th>
                                 <th>Product</th>
                                 <th class="text-center" style="width: 1%">Qnt</th>
                                 <th class="text-end" style="width: 1%">Unit</th>
                                 <th class="text-end" style="width: 1%">Amount</th>
                              </tr>
                              </thead>
                              <tr>
                              <td class="text-center">1</td>
                              <td>
                                 <p class="strong mb-1">Logo Creation</p>
                                 <div class="text-muted">Logo and business cards design</div>
                              </td>
                              <td class="text-center">
                                 1
                              </td>
                              <td class="text-end">$1.800,00</td>
                              <td class="text-end">$1.800,00</td>
                              </tr>
                              <tr>
                              <td class="text-center">2</td>
                              <td>
                                 <p class="strong mb-1">Online Store Design &amp; Development</p>
                                 <div class="text-muted">Design/Development for all popular modern browsers</div>
                              </td>
                              <td class="text-center">
                                 1
                              </td>
                              <td class="text-end">$20.000,00</td>
                              <td class="text-end">$20.000,00</td>
                              </tr>
                              <tr>
                              <td class="text-center">3</td>
                              <td>
                                 <p class="strong mb-1">App Design</p>
                                 <div class="text-muted">Promotional mobile application</div>
                              </td>
                              <td class="text-center">
                                 1
                              </td>
                              <td class="text-end">$3.200,00</td>
                              <td class="text-end">$3.200,00</td>
                              </tr>
                              <tr>
                              <td colspan="4" class="strong text-end">Subtotal</td>
                              <td class="text-end">$25.000,00</td>
                              </tr>
                              <tr>
                              <td colspan="4" class="strong text-end">Vat Rate</td>
                              <td class="text-end">20%</td>
                              </tr>
                              <tr>
                              <td colspan="4" class="strong text-end">Vat Due</td>
                              <td class="text-end">$5.000,00</td>
                              </tr>
                              <tr>
                              <td colspan="4" class="font-weight-bold text-uppercase text-end">Total Due</td>
                              <td class="font-weight-bold text-end">$30.000,00</td>
                              </tr>
                           </table>
                           <p class="text-muted text-center mt-5">Thank you very much for doing business with us. We look forward to working with
                              you again!</p>
                        </div>
                     </div>
                  </div>
               </div>

               
            </div>
         </div>
       </div>
   </div>

   <x-modal.select-vessel :schedule="$schedule" :vessels="$vessels" />

@endsection