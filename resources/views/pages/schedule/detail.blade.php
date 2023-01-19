@extends('layouts.app')
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
               <div class="dropdown">
                  <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                  Actions
                  </button>
                  <div class="dropdown-menu dropdown-menu-end">
                     
                     <a class="dropdown-item" href="#">
                        Update
                     </a>
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
                          <a href="#">{{$schedule->vessel->name}}</a>
                        </h4>
                        
                        <div class="small mt-1">
                          <span class="badge bg-green"></span> Docking
                        </div>
                        
                      </div>
                      
                      
                    </div>
                    <div class="row">
                     <div class="col-md-12">
                        {{-- <div class="mt-3">
                           <div class="row g-2 align-items-center">
                             <div class="col-2">
                              Cargo 25%
                             </div>
                             <div class="col-10">
                               <div class="progress progress-sm">
                                 <div class="progress-bar" style="width: 25%" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                   <span class="visually-hidden">25% Complete</span>
                                 </div>
                               </div>
                             </div>
                           </div>
                        </div>
                        <div class="mt-3">
                           <div class="row g-2 align-items-center">
                             <div class="col-2">
                              Boarding 70%
                             </div>
                             <div class="col-10 ">
                               <div class="progress progress-sm">
                                 <div class="progress-bar" style="width: 70%" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                   <span class="visually-hidden">25% Complete</span>
                                 </div>
                               </div>
                             </div>
                           </div>
                        </div> --}}
                     </div>
                    </div>
                  </div>
               </div>
            </div>
            <div class="col-md-5">
               <div class="card mb-3">
                  <div class="card-body">
                     <div class="mt-2 mb-2">
                        <div class="row g-2 align-items-center">
                          <div class="col-3">
                           Cargo 25%
                          </div>
                          <div class="col-9">
                            <div class="progress progress-lg">
                              <div class="progress-bar" style="width: 25%" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                <span class="visually-hidden">25% Complete</span>
                              </div>
                            </div>
                          </div>
                        </div>
                     </div>
                     <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dicta molestiae tenetur est similique suscipit?</p>
                  </div>
               </div>
            </div>
         </div>
         
         <div class="card card-lg">
           <div class="card-body">
             <div class="row mt--4">
               <div class="col-6">
                  <p class="h3">Origin</p>
                  <address>
                     {{$schedule->origin->name}} - {{$schedule->jetty->name}} <br>
                     {{ \Carbon\Carbon::parse($schedule->departure)->format('d/m/Y') }} <br>
                     Docking : {{$schedule->docking}} WIB<br>
                     Departure : {{$schedule->departure}} WIB
                     {{-- {{$schedule->departure}}<br> --}}
                  </address>
               </div>
               <div class="col-6 text-end">
                 <p class="h3">Destination</p>
                 <address>
                   {{$schedule->destination->name}}<br>
                   {{ \Carbon\Carbon::parse($schedule->arrival)->format('l d/m/Y h:m') }} 
                   {{-- {{$schedule->arrival}}<br> --}}
                 </address>
               </div>
               <div class="col-12 mt-4 mb-2">
                 <h1>Detail Cargo</h1>
               </div>
             </div>
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

@endsection