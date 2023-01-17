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
               Dashboard
            </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
               <div class="btn-list">
                  <span class="d-none d-sm-inline">
                     <a href="#" class="btn btn-white">
                     New view
                     </a>
                  </span>
                  {{-- <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report">
                     
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                     Create new report
                  </a> --}}
                  <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="page-body">
      <div class="container-xl">
         {{-- <div class="row row-deck row-cards">
            <div class="col-sm-6 col-lg-3">
               <div class="card">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                     <div class="subheader">Sales</div>
                     <div class="ms-auto lh-1">
                        <div class="dropdown">
                           <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                           <div class="dropdown-menu dropdown-menu-end">
                           <a class="dropdown-item active" href="#">Last 7 days</a>
                           <a class="dropdown-item" href="#">Last 30 days</a>
                           <a class="dropdown-item" href="#">Last 3 months</a>
                           </div>
                        </div>
                     </div>
                     </div>
                     <div class="h1 mb-3">75%</div>
                     <div class="d-flex mb-2">
                     <div>Conversion rate</div>
                     <div class="ms-auto">
                        <span class="text-green d-inline-flex align-items-center lh-1">
                           7% <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                           <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="3 17 9 11 13 15 21 7" /><polyline points="14 7 21 7 21 14" /></svg>
                        </span>
                     </div>
                     </div>
                     <div class="progress progress-sm">
                     <div class="progress-bar bg-blue" style="width: 75%" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                        <span class="visually-hidden">75% Complete</span>
                     </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-sm-6 col-lg-3">
               <div class="card">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                     <div class="subheader">Revenue</div>
                     <div class="ms-auto lh-1">
                        <div class="dropdown">
                           <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                           <div class="dropdown-menu dropdown-menu-end">
                           <a class="dropdown-item active" href="#">Last 7 days</a>
                           <a class="dropdown-item" href="#">Last 30 days</a>
                           <a class="dropdown-item" href="#">Last 3 months</a>
                           </div>
                        </div>
                     </div>
                     </div>
                     <div class="d-flex align-items-baseline">
                     <div class="h1 mb-0 me-2">$4,300</div>
                     <div class="me-auto">
                        <span class="text-green d-inline-flex align-items-center lh-1">
                           8% <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                           <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="3 17 9 11 13 15 21 7" /><polyline points="14 7 21 7 21 14" /></svg>
                        </span>
                     </div>
                     </div>
                  </div>
                  <div id="chart-revenue-bg" class="chart-sm"></div>
               </div>
            </div>
            <div class="col-sm-6 col-lg-3">
               <div class="card">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                     <div class="subheader">New clients</div>
                     <div class="ms-auto lh-1">
                        <div class="dropdown">
                           <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                           <div class="dropdown-menu dropdown-menu-end">
                           <a class="dropdown-item active" href="#">Last 7 days</a>
                           <a class="dropdown-item" href="#">Last 30 days</a>
                           <a class="dropdown-item" href="#">Last 3 months</a>
                           </div>
                        </div>
                     </div>
                     </div>
                     <div class="d-flex align-items-baseline">
                     <div class="h1 mb-3 me-2">6,782</div>
                     <div class="me-auto">
                        <span class="text-yellow d-inline-flex align-items-center lh-1">
                           0% <!-- Download SVG icon from http://tabler-icons.io/i/minus -->
                           <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="5" y1="12" x2="19" y2="12" /></svg>
                        </span>
                     </div>
                     </div>
                     <div id="chart-new-clients" class="chart-sm"></div>
                  </div>
               </div>
            </div>
            <div class="col-sm-6 col-lg-3">
               <div class="card">
                  <div class="card-body">
                     <div class="d-flex align-items-center">
                     <div class="subheader">Active users</div>
                     <div class="ms-auto lh-1">
                        <div class="dropdown">
                           <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                           <div class="dropdown-menu dropdown-menu-end">
                           <a class="dropdown-item active" href="#">Last 7 days</a>
                           <a class="dropdown-item" href="#">Last 30 days</a>
                           <a class="dropdown-item" href="#">Last 3 months</a>
                           </div>
                        </div>
                     </div>
                     </div>
                     <div class="d-flex align-items-baseline">
                     <div class="h1 mb-3 me-2">2,986</div>
                     <div class="me-auto">
                        <span class="text-green d-inline-flex align-items-center lh-1">
                           4% <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                           <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="3 17 9 11 13 15 21 7" /><polyline points="14 7 21 7 21 14" /></svg>
                        </span>
                     </div>
                     </div>
                     <div id="chart-active-users" class="chart-sm"></div>
                  </div>
               </div>
            </div>
         </div> --}}
         <div class="row mt-1 row-cards">
            <div class="col-lg-7">
               <div class="card mb-2">
                  <div class="card-header border-0 bg-info">
                     {{-- <div class="card-title">Vessel Schedule</div> --}}
                     <div class="btn btn-sm btn-light">Create new schedule</div>
                  </div>
                  {{-- <div class="card-body border-bottom py-3">
                     <div class="d-flex">
                       <div class="text-muted">
                         Show
                         <div class="mx-2 d-inline-block">
                           <input type="text" disabled class="form-control form-control-sm" value="8" size="3" aria-label="Invoices count">
                         </div>
                         entries
                       </div>
                       <div class="ms-auto text-muted">
                         Search:
                         <div class="ms-2 d-inline-block">
                           <input type="text" class="form-control form-control-sm" aria-label="Search invoice">
                         </div>
                       </div>
                     </div>
                  </div> --}}
                  <div class="card-table table-responsive ">
                     <table class="table table-vcenter">
                        <thead class="bg-primary">
                           <tr>
                              <th>Vessel</th>
                              <th class="text-center">Destination</th>
                              <th class="text-center">Date</th>
                              <th class="text-center">Time</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($vessels as $vessel)
                              <tr>
                                 <td class="td-truncate ">
                                    <div class=" text-nowrap text-muted text-truncate">
                                       {{$vessel->name}}
                                    </div>
                                 </td>
                                 <td class="text-nowrap text-muted text-center">Cinta-T</td>
                                 <td class="text-nowrap text-muted text-center">28 Nov 2019</td>
                                 <td class="text-nowrap text-muted text-center">08:30 WIB</td>
                              </tr>
                           @endforeach
                           {{-- <tr>
                              <td class="td-truncate ">
                                 <div class=" text-nowrap text-muted text-truncate">
                                    Elok Jaya
                                 </div>
                              </td>
                              <td class="text-nowrap text-muted text-center">Cinta-T</td>
                              <td class="text-nowrap text-muted text-center">28 Nov 2019</td>
                              <td class="text-nowrap text-muted text-center">08:30 WIB</td>
                           </tr>
                           <tr>
                              <td class="td-truncate ">
                                 <div class=" text-nowrap text-muted text-truncate">
                                    Triton Jawara
                                 </div>
                              </td>
                              <td class="text-nowrap text-muted text-center">Widuri-T</td>
                              <td class="text-nowrap text-muted text-center">28 Nov 2019</td>
                              <td class="text-nowrap text-muted text-center">10:30 WIB</td>
                           </tr>
                           <tr>
                              <td class="td-truncate ">
                                 <div class=" text-nowrap text-muted text-truncate">
                                    Hafar Jupiter
                                 </div>
                              </td>
                              <td class="text-nowrap text-muted text-center">Cinta-T</td>
                              <td class="text-nowrap text-muted text-center">28 Nov 2019</td>
                              <td class="text-nowrap text-muted text-center">09:00 WIB</td>
                           </tr>
                           <tr>
                              <td class="td-truncate ">
                                 <div class=" text-nowrap text-muted text-truncate">
                                    Triton Jawara
                                 </div>
                              </td>
                              <td class="text-nowrap text-muted text-center">Widuri-T</td>
                              <td class="text-nowrap text-muted text-center">28 Nov 2019</td>
                              <td class="text-nowrap text-muted text-center">10:30 WIB</td>
                           </tr>
                           <tr>
                              <td class="td-truncate ">
                                 <div class=" text-nowrap text-muted text-truncate">
                                    Hafar Jupiter
                                 </div>
                              </td>
                              <td class="text-nowrap text-muted text-center">Cinta-T</td>
                              <td class="text-nowrap text-muted text-center">28 Nov 2019</td>
                              <td class="text-nowrap text-muted text-center">09:00 WIB</td>
                           </tr>
                           <tr>
                              <td class="td-truncate ">
                                 <div class=" text-nowrap text-muted text-truncate">
                                    Triton Jawara
                                 </div>
                              </td>
                              <td class="text-nowrap text-muted text-center">Widuri-T</td>
                              <td class="text-nowrap text-muted text-center">28 Nov 2019</td>
                              <td class="text-nowrap text-muted text-center">10:30 WIB</td>
                           </tr>
                           <tr>
                              <td class="td-truncate ">
                                 <div class=" text-nowrap text-muted text-truncate">
                                    Hafar Jupiter
                                 </div>
                              </td>
                              <td class="text-nowrap text-muted text-center">Cinta-T</td>
                              <td class="text-nowrap text-muted text-center">28 Nov 2019</td>
                              <td class="text-nowrap text-muted text-center">09:00 WIB</td>
                           </tr> --}}
                           
                        </tbody>
                     </table>
                     
                  </div>
                  {{-- <div class="card-footer d-flex align-items-center py-3">
                     {{$vessels->links()}}
                  </div> --}}
               </div>

               <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Invoices</h3>
                  </div>
                  <div class="card-body border-bottom py-3">
                    <div class="d-flex">
                      <div class="text-muted">
                        Show
                        <div class="mx-2 d-inline-block">
                          <input type="text" class="form-control form-control-sm" value="8" size="3" aria-label="Invoices count">
                        </div>
                        entries
                      </div>
                      <div class="ms-auto text-muted">
                        Search:
                        <div class="ms-2 d-inline-block">
                          <input type="text" class="form-control form-control-sm" aria-label="Search invoice">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable">
                      <thead>
                        <tr>
                          <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all invoices"></th>
                          <th class="w-1">No. <!-- Download SVG icon from http://tabler-icons.io/i/chevron-up -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm text-dark icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="6 15 12 9 18 15" /></svg>
                          </th>
                          <th>Invoice Subject</th>
                          <th>Client</th>
                          <th>VAT No.</th>
                          <th>Created</th>
                          <th>Status</th>
                          <th>Price</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                          <td><span class="text-muted">001401</span></td>
                          <td><a href="invoice.html" class="text-reset" tabindex="-1">Design Works</a></td>
                          <td>
                            <span class="flag flag-country-us"></span>
                            Carlson Limited
                          </td>
                          <td>
                            87956621
                          </td>
                          <td>
                            15 Dec 2017
                          </td>
                          <td>
                            <span class="badge bg-success me-1"></span> Paid
                          </td>
                          <td>$887</td>
                          <td class="text-end">
                            <span class="dropdown">
                              <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                              <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">
                                  Action
                                </a>
                                <a class="dropdown-item" href="#">
                                  Another action
                                </a>
                              </div>
                            </span>
                          </td>
                        </tr>
                        <tr>
                          <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                          <td><span class="text-muted">001402</span></td>
                          <td><a href="invoice.html" class="text-reset" tabindex="-1">UX Wireframes</a></td>
                          <td>
                            <span class="flag flag-country-gb"></span>
                            Adobe
                          </td>
                          <td>
                            87956421
                          </td>
                          <td>
                            12 Apr 2017
                          </td>
                          <td>
                            <span class="badge bg-warning me-1"></span> Pending
                          </td>
                          <td>$1200</td>
                          <td class="text-end">
                            <span class="dropdown">
                              <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                              <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">
                                  Action
                                </a>
                                <a class="dropdown-item" href="#">
                                  Another action
                                </a>
                              </div>
                            </span>
                          </td>
                        </tr>
                        <tr>
                          <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                          <td><span class="text-muted">001403</span></td>
                          <td><a href="invoice.html" class="text-reset" tabindex="-1">New Dashboard</a></td>
                          <td>
                            <span class="flag flag-country-de"></span>
                            Bluewolf
                          </td>
                          <td>
                            87952621
                          </td>
                          <td>
                            23 Oct 2017
                          </td>
                          <td>
                            <span class="badge bg-warning me-1"></span> Pending
                          </td>
                          <td>$534</td>
                          <td class="text-end">
                            <span class="dropdown">
                              <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                              <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">
                                  Action
                                </a>
                                <a class="dropdown-item" href="#">
                                  Another action
                                </a>
                              </div>
                            </span>
                          </td>
                        </tr>
                        <tr>
                          <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                          <td><span class="text-muted">001404</span></td>
                          <td><a href="invoice.html" class="text-reset" tabindex="-1">Landing Page</a></td>
                          <td>
                            <span class="flag flag-country-br"></span>
                            Salesforce
                          </td>
                          <td>
                            87953421
                          </td>
                          <td>
                            2 Sep 2017
                          </td>
                          <td>
                            <span class="badge bg-secondary me-1"></span> Due in 2 Weeks
                          </td>
                          <td>$1500</td>
                          <td class="text-end">
                            <span class="dropdown">
                              <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                              <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">
                                  Action
                                </a>
                                <a class="dropdown-item" href="#">
                                  Another action
                                </a>
                              </div>
                            </span>
                          </td>
                        </tr>
                        <tr>
                          <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                          <td><span class="text-muted">001405</span></td>
                          <td><a href="invoice.html" class="text-reset" tabindex="-1">Marketing Templates</a></td>
                          <td>
                            <span class="flag flag-country-pl"></span>
                            Printic
                          </td>
                          <td>
                            87956621
                          </td>
                          <td>
                            29 Jan 2018
                          </td>
                          <td>
                            <span class="badge bg-danger me-1"></span> Paid Today
                          </td>
                          <td>$648</td>
                          <td class="text-end">
                            <span class="dropdown">
                              <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                              <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">
                                  Action
                                </a>
                                <a class="dropdown-item" href="#">
                                  Another action
                                </a>
                              </div>
                            </span>
                          </td>
                        </tr>
                        <tr>
                          <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                          <td><span class="text-muted">001406</span></td>
                          <td><a href="invoice.html" class="text-reset" tabindex="-1">Sales Presentation</a></td>
                          <td>
                            <span class="flag flag-country-br"></span>
                            Tabdaq
                          </td>
                          <td>
                            87956621
                          </td>
                          <td>
                            4 Feb 2018
                          </td>
                          <td>
                            <span class="badge bg-secondary me-1"></span> Due in 3 Weeks
                          </td>
                          <td>$300</td>
                          <td class="text-end">
                            <span class="dropdown">
                              <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                              <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">
                                  Action
                                </a>
                                <a class="dropdown-item" href="#">
                                  Another action
                                </a>
                              </div>
                            </span>
                          </td>
                        </tr>
                        <tr>
                          <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                          <td><span class="text-muted">001407</span></td>
                          <td><a href="invoice.html" class="text-reset" tabindex="-1">Logo & Print</a></td>
                          <td>
                            <span class="flag flag-country-us"></span>
                            Apple
                          </td>
                          <td>
                            87956621
                          </td>
                          <td>
                            22 Mar 2018
                          </td>
                          <td>
                            <span class="badge bg-success me-1"></span> Paid Today
                          </td>
                          <td>$2500</td>
                          <td class="text-end">
                            <span class="dropdown">
                              <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                              <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">
                                  Action
                                </a>
                                <a class="dropdown-item" href="#">
                                  Another action
                                </a>
                              </div>
                            </span>
                          </td>
                        </tr>
                        <tr>
                          <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
                          <td><span class="text-muted">001408</span></td>
                          <td><a href="invoice.html" class="text-reset" tabindex="-1">Icons</a></td>
                          <td>
                            <span class="flag flag-country-pl"></span>
                            Tookapic
                          </td>
                          <td>
                            87956621
                          </td>
                          <td>
                            13 May 2018
                          </td>
                          <td>
                            <span class="badge bg-success me-1"></span> Paid Today
                          </td>
                          <td>$940</td>
                          <td class="text-end">
                            <span class="dropdown">
                              <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown">Actions</button>
                              <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">
                                  Action
                                </a>
                                <a class="dropdown-item" href="#">
                                  Another action
                                </a>
                              </div>
                            </span>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="card-footer d-flex align-items-center">
                    <p class="m-0 text-muted">Showing <span>1</span> to <span>8</span> of <span>16</span> entries</p>
                    <ul class="pagination m-0 ms-auto">
                      <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                          <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="15 6 9 12 15 18" /></svg>
                          prev
                        </a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item active"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">4</a></li>
                      <li class="page-item"><a class="page-link" href="#">5</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#">
                          next <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="9 6 15 12 9 18" /></svg>
                        </a>
                      </li>
                    </ul>
                  </div>
               </div>
            </div>
            <div class="col-md-5">
               <div class="card mb-2">
                  {{-- <div class="card-header border-0">
                     <div class="card-title">Vessel Schedule Fix</div>
                  </div> --}}
                  
                  <div class="card-table table-responsive ">
                     <table class="table table-vcenter">
                        <thead class="bg-primary">
                           <tr>
                              <th>Vessel</th>
                              <th class="text-center">Destination</th>
                              <th class="text-center">Day</th>
                              <th class="text-center">Time</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($vessel3 as $vessel)
                              <tr>
                                 <td class="td-truncate ">
                                    <div class=" text-nowrap text-muted text-truncate">
                                       {{$vessel->name}}
                                    </div>
                                 </td>
                                 <td class="text-nowrap text-muted text-center">Cinta-T</td>
                                 <td class="text-nowrap text-muted text-center">Senin</td>
                                 <td class="text-nowrap text-muted text-center">08:30 WIB</td>
                              </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
                  {{-- <div class="card-footer d-flex align-items-center py-3">
                     {{$vessels->links()}}
                  </div> --}}
               </div>
               <div class="row row-cards">
                 <div class="col-12">
                   <div class="card card-sm">
                     <div class="card-body">
                       <div class="row align-items-center">
                         <div class="col-auto">
                           <span class="bg-blue text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                             <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" /><path d="M12 3v3m0 12v3" /></svg>
                           </span>
                         </div>
                         <div class="col">
                           <div class="font-weight-medium">
                             132 Logistic
                           </div>
                           <div class="text-muted">
                             12 waiting
                           </div>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
                 
                 <div class="col-12">
                   <div class="card card-sm">
                     <div class="card-body">
                       <div class="row align-items-center">
                         <div class="col-auto">
                           <span class="bg-yellow text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/users -->
                             <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="9" cy="7" r="4" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /><path d="M21 21v-2a4 4 0 0 0 -3 -3.85" /></svg>
                           </span>
                         </div>
                         <div class="col">
                           <div class="font-weight-medium">
                             13 Vessel
                           </div>
                           <div class="text-muted">
                             163 today
                           </div>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
                 <div class="col-12">
                   <div class="card card-sm">
                     <div class="card-body">
                       <div class="row align-items-center">
                         <div class="col-auto">
                           <span class="bg-twitter text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/brand-twitter -->
                             <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c-.002 -.249 1.51 -2.772 1.818 -4.013z" /></svg>
                           </span>
                         </div>
                         <div class="col">
                           <div class="font-weight-medium">
                             8 Port
                           </div>
                           <div class="text-muted">
                             16 today
                           </div>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
            
         </div>
      </div>
   </div>

   <x-modal.add-vessel />
   
   
@endsection

      


    