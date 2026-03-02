@extends('layouts.app')
@section('title')
    Cargo Detail
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
                  Cargo Detail
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
                     <a class="dropdown-item" href="">
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
            <div class="col-md-12">
               <div class="card mb-3">
                  <div class="card-body">
                     <div class="row g-2 ">
                        
                        <div class="col ms-2">
                           <h1>ID Cargo</h1>
                           <h4>Indofood</h4>
                           <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, perspiciatis, sunt nulla natus ab voluptate reiciendis, rem dolor harum minima totam iure id?</small>
                        </div>
                        <div class="col">
                           <div class="card">
                              <div class="card-body">
                                 <div class="card-title">Schedule</div>
                                    <div class="mb-2">
                                       Date: <strong>12/03/2023</strong>
                                    </div>
                                    <div class="mb-2">
                                       Route: <strong>KJ4</strong> - <strong>Pabelokan</strong>
                                    </div>
                                 <div>
                                  <!-- Download SVG icon from http://tabler-icons.io/i/clock -->
                                  
                                
                              </div>
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
         </div>
         <div class="card card-lg">
            <div class="card-body">
              
              <h5 class="mb-4">Cargo List</h5>
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