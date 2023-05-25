<!doctype html>

<html lang="en">
   <head>
      <meta charset="utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
      <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
      <title>DSP PHE - @yield('title')</title>
      <link rel="icon" href="{{asset('img/logo/harbour.png')}}" type="image/x-icon"/>
      <!-- CSS files -->
      <link href="{{asset('css/tabler.min.css')}}" rel="stylesheet"/>
      <link href="{{asset('css/tabler-flags.min.css')}}" rel="stylesheet"/>
      <link href="{{asset('css/tabler-payments.min.css')}}" rel="stylesheet"/>
      <link href="{{asset('css/tabler-vendors.min.css')}}" rel="stylesheet"/>
      <link href="{{asset('css/demo.min.css')}}" rel="stylesheet"/>

      {{-- <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet"/> --}}
      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap4.min.css" rel="stylesheet">
      
   </head>
   <body>
      <div class="wrapper" >
         <div class="sticky-top">
            <header class="navbar navbar-expand-md navbar-light sticky-top d-print-none">
               <div class="container-xl">
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                     <span class="navbar-toggler-icon"></span>
                  </button>
                  {{-- navbar-brand-autodark  --}}
                  <h1 class="navbar-brand  d-none-navbar-horizontal pe-0 pe-md-3">
                     <a href="/" class="d-flex align-items-center">
                     @if (auth()->user()->hasRole('superuser') || auth()->user()->hasRole('logistic') || auth()->user()->hasRole('drilling') || auth()->user()->hasRole('marine') || auth()->user()->hasRole('vessel') || auth()->user()->hasRole('port') || auth()->user()->hasRole('department'))
                        <img src="{{asset('img/logo/phe-oses.png')}}"  alt="DSP-PHE" class="navbar-brand-image">
                        {{-- <div class="ml-4" style="margin-left: 10px; font-weight: 900">DSP <span class="text-primary">SYSTEM</span></div> --}}
                        
                     @elseif(auth()->user()->hasRole('platform'))
                        @if (auth()->user()->getLogo())
                        <img src="{{asset('storage/' . auth()->user()->getLogo())}}" width="110" height="32" alt="DSP-PHE" class="navbar-brand-image">
                        @else
                        <img src="{{asset('img/logo/logo.png')}}" width="110" height="32" alt="DSP-PHE" class="navbar-brand-image">
                        @endif
                     
                        <div class="ml-2" style="margin-left: 10px; font-weight: 900">{{auth()->user()->getSystem()}}  <span class="text-primary">SYSTEM</span></div>
                     @elseif(auth()->user()->hasRole('retail'))
                        {{-- <img src="{{asset('storage/' . auth()->user()->getPlatformLogo())}}" width="110" height="32" alt="DSP-PHE" class="navbar-brand-image"> --}}
                        @if (auth()->user()->getPartyLogo())
                           <img src="{{asset('storage/' . auth()->user()->getPlatformLogo())}}" width="110" height="32" alt="DSP-PHE" class="navbar-brand-image">
                           @else
                           <img src="{{asset('img/logo/logo.png')}}" width="110" height="32" alt="DSP-PHE" class="navbar-brand-image">
                           @endif 
                        <div class="ml-2" style="margin-left: 10px; font-weight: 900">{{auth()->user()->getPlatformSystem()}}  <span class="text-primary">SYSTEM</span></div>
                     @elseif(auth()->user()->hasRole('supplier'))
                        @if (auth()->user()->getPartyLogo())
                           <img src="{{asset('storage/' . auth()->user()->getPartyLogo())}}" width="110" height="32" alt="DSP-PHE" class="navbar-brand-image">
                           @else
                           <img src="{{asset('img/logo/logo.png')}}" width="110" height="32" alt="DSP-PHE" class="navbar-brand-image">
                           @endif   
                        <div class="ml-2" style="margin-left: 10px; font-weight: 900">{{auth()->user()->getPlatformSystem()}}  <span class="text-primary">SYSTEM</span></div>

                     @elseif(auth()->user()->hasRole('receiving'))
                        <img src="{{asset('img/logo/logo.png')}}" width="110" height="32" alt="DSP-PHE" class="navbar-brand-image">
                        <div class="ml-2" style="margin-left: 10px; font-weight: 900">DSP  <span class="text-primary">SYSTEM</span></div>
                        @elseif(auth()->user()->hasRole('marine'))
                        <img src="{{asset('img/logo/logo.png')}}" width="110" height="32" alt="DSP-PHE" class="navbar-brand-image">
                        <div class="ml-2" style="margin-left: 10px; font-weight: 900">DSP  <span class="text-primary">SYSTEM</span></div>
                     @endif
                     
                     
                     </a>
                  </h1>
                  <div class="navbar-nav flex-row order-md-last">
                     <a href="?theme=dark" class="nav-link px-0 hide-theme-dark me-3" title="Enable dark mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                        <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" /></svg>
                        </a>
                        <a href="?theme=light" class="nav-link px-0 hide-theme-light me-3" title="Enable light mode" data-bs-toggle="tooltip" data-bs-placement="bottom">
                        <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="4" /><path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" /></svg>
                        </a>
                     <div class="nav-item d-none d-md-flex me-3">
                        <div class="btn-list">
                           <div class="btn">
                              @if (auth()->user()->hasRole('superuser'))
                                 SUPERUSER
                                 @elseif(auth()->user()->hasRole('department'))
                                 {{auth()->user()->getDepartment()->name}}
                                 @elseif(auth()->user()->hasRole('logistic'))
                                 LOGISTIC
                                 @elseif(auth()->user()->hasRole('drilling'))
                                 DRILLING
                                 @elseif(auth()->user()->hasRole('platform'))
                                 PLATFORM
                                 @elseif(auth()->user()->hasRole('supplier'))
                                 SUPPLIER
                                 @elseif(auth()->user()->hasRole('tenant'))
                                 TENANT
                                 @elseif(auth()->user()->hasRole('retail'))
                                 RETAIL
                                 @elseif(auth()->user()->hasRole('receiving'))
                                 RECEIVING
                                 @elseif(auth()->user()->hasRole('marine'))
                                 MARINE
                                 @elseif(auth()->user()->hasRole('vessel'))
                                 MASTER
                              @endif
                           </div>
                        </div>
                     </div>
                   
                     <div class="nav-item dropdown">
                     @if (auth()->user()->hasRole('superuser'))
                     <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                        <span class="avatar avatar-sm" style="background-image: url({{asset('img/flaticon/hacker.png')}});"></span>
                        <div class="d-none d-xl-block ps-2">
                           <div>Developer </div>
                           <div class="mt-1 small text-muted">Super User</div>
                        </div>
                     </a>
                     @elseif(auth()->user()->hasRole('department'))
                     <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                        <span class="avatar avatar-sm" style="background-image: url({{asset('img/flaticon/businessman.png')}})"></span>
                        <div class="d-none d-xl-block ps-2">
                           <div>{{auth()->user()->name}}</div>
                           <div class="mt-1 small text-muted">{{auth()->user()->getDepartment()->name}}</div>
                        </div>
                     </a>
                     @elseif(auth()->user()->hasRole('logistic'))
                     <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                        <span class="avatar avatar-sm" style="background-image: url({{asset('img/flaticon/businessman.png')}})"></span>
                        <div class="d-none d-xl-block ps-2">
                           <div>{{auth()->user()->name}}</div>
                           <div class="mt-1 small text-muted">Logistic</div>
                        </div>
                     </a>
                     @elseif(auth()->user()->hasRole('drilling'))
                     <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                        <span class="avatar avatar-sm" style="background-image: url({{asset('img/flaticon/businessman.png')}})"></span>
                        <div class="d-none d-xl-block ps-2">
                           <div>{{auth()->user()->name}}</div>
                           <div class="mt-1 small text-muted">Drilling</div>
                        </div>
                     </a>
                     @elseif(auth()->user()->hasRole('platform'))
                     <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                        <span class="avatar avatar-sm" style="background-image: url({{asset('img/flaticon/businessman.png')}})"></span>
                        <div class="d-none d-xl-block ps-2">
                           <div>{{auth()->user()->name}}</div>
                           <div class="mt-1 small text-muted">Platform</div>
                        </div>
                     </a>
                     @elseif(auth()->user()->hasRole('retail'))
                     <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                        <span class="avatar avatar-sm" style="background-image: url({{asset('img/flaticon/worker.png')}})"></span>
                        <div class="d-none d-xl-block ps-2">
                           <div>{{auth()->user()->name}}</div>
                           <div class="mt-1 small text-muted">Retail</div>
                        </div>
                     </a>
                     @elseif(auth()->user()->hasRole('supplier'))
                     <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                        <span class="avatar avatar-sm" style="background-image: url({{asset('img/flaticon/worker.png')}})"></span>
                        <div class="d-none d-xl-block ps-2">
                           <div>{{auth()->user()->name}}</div>
                           <div class="mt-1 small text-muted">Supplier</div>
                        </div>
                     </a>
                     @elseif(auth()->user()->hasRole('receiving'))
                     <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                        <span class="avatar avatar-sm" style="background-image: url({{asset('img/flaticon/worker.png')}})"></span>
                        <div class="d-none d-xl-block ps-2">
                           <div>{{auth()->user()->name}}</div>
                           <div class="mt-1 small text-muted">Receiving</div>
                        </div>
                     </a>
                     @elseif(auth()->user()->hasRole('marine'))
                     <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                        <span class="avatar avatar-sm" style="background-image: url({{asset('img/flaticon/worker.png')}})"></span>
                        <div class="d-none d-xl-block ps-2">
                           <div>{{auth()->user()->name}}</div>
                           <div class="mt-1 small text-muted">Marine</div>
                        </div>
                     </a>
                     @elseif(auth()->user()->hasRole('vessel'))
                     <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                        <span class="avatar avatar-sm" style="background-image: url({{asset('img/avatar/captain.png')}})"></span>
                        <div class="d-none d-xl-block ps-2">
                           <div>{{auth()->user()->name}}</div>
                           <div class="mt-1 small text-muted">Master</div>
                        </div>
                     </a>
                     @endif
                     
                     <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        @if (auth()->user()->hasRole('superuser'))
                        <a href="{{route('user')}}" class="dropdown-item">User Management</a>
                        @elseif(auth()->user()->hasRole('platform'))
                        <a href="{{route('platform.detail', enkripRambo(auth()->user()->getPlatformId()))}}" class="dropdown-item">Profile & account</a>
                        @elseif(auth()->user()->hasRole('department'))
                        <a href="{{route('employee.profile', enkripRambo(auth()->user()->getEmployeeId()))}}" class="dropdown-item">Profile & account</a>
                        <a href="{{route('password.request')}}" class="dropdown-item">Reset Password</a>
                        @elseif(auth()->user()->hasRole('vessel'))
                        <a href="{{route('vessel.detail', enkripRambo(auth()->user()->getVesselId()))}}" class="dropdown-item">Profile & account</a>
                        <a href="{{route('password.request')}}" class="dropdown-item">Reset Password</a>
                        @endif
                        
                        <div class="dropdown-divider"></div>
                        {{-- <a href="#" class="dropdown-item">Settings</a> --}}
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                           
                              {{-- <a class="dropdown-item" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                 {{ __('Logout') }}
                              </a> --}}
                              {{ __('Logout') }}
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                              </form>
                        </a>
                     </div>
                     </div>
                  </div>
               </div>
            </header>
            @include('layouts.navbar')
         </div>
         

         <div class="page-wrapper" style="min-height: 100vh">
            @yield('content')
            <footer class="footer footer-transparent d-print-none">
               <div class="container-xl">
                  <div class="row text-center align-items-center flex-row-reverse">
                     <div class="col-lg-auto ms-lg-auto">
                     <ul class="list-inline list-inline-dots mb-0">
                        <li class="list-inline-item"><a href="./docs/index.html" class="link-secondary">DSP-PHE v1.0.0-beta</a></li>
                        
                     </ul>
                     </div>
                     <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                     <ul class="list-inline list-inline-dots mb-0">
                        <li class="list-inline-item">
                           Copyright &copy; 2023
                           <a href="." class="link-secondary">GTI</a>.
                           All rights reserved.
                        </li>
                        
                     </ul>
                     </div>
                  </div>
               </div>
            </footer>
         </div>
      </div>

      <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
               <div class="modal-header">
               <h5 class="modal-title">New report</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
               <div class="mb-3">
                  <label class="form-label">Name</label>
                  <input type="text" class="form-control" name="example-text-input" placeholder="Your report name">
               </div>
               <label class="form-label">Report type</label>
               <div class="form-selectgroup-boxes row mb-3">
                  <div class="col-lg-6">
                     <label class="form-selectgroup-item">
                     <input type="radio" name="report-type" value="1" class="form-selectgroup-input" checked>
                     <span class="form-selectgroup-label d-flex align-items-center p-3">
                        <span class="me-3">
                           <span class="form-selectgroup-check"></span>
                        </span>
                        <span class="form-selectgroup-label-content">
                           <span class="form-selectgroup-title strong mb-1">Simple</span>
                           <span class="d-block text-muted">Provide only basic data needed for the report</span>
                        </span>
                     </span>
                     </label>
                  </div>
                  <div class="col-lg-6">
                     <label class="form-selectgroup-item">
                     <input type="radio" name="report-type" value="1" class="form-selectgroup-input">
                     <span class="form-selectgroup-label d-flex align-items-center p-3">
                        <span class="me-3">
                           <span class="form-selectgroup-check"></span>
                        </span>
                        <span class="form-selectgroup-label-content">
                           <span class="form-selectgroup-title strong mb-1">Advanced</span>
                           <span class="d-block text-muted">Insert charts and additional advanced analyses to be inserted in the report</span>
                        </span>
                     </span>
                     </label>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-8">
                     <div class="mb-3">
                     <label class="form-label">Report url</label>
                     <div class="input-group input-group-flat">
                        <span class="input-group-text">
                           https://tabler.io/reports/
                        </span>
                        <input type="text" class="form-control ps-0"  value="report-01" autocomplete="off">
                     </div>
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div class="mb-3">
                     <label class="form-label">Visibility</label>
                     <select class="form-select">
                        <option value="1" selected>Private</option>
                        <option value="2">Public</option>
                        <option value="3">Hidden</option>
                     </select>
                     </div>
                  </div>
               </div>
               </div>
               <div class="modal-body">
               <div class="row">
                  <div class="col-lg-6">
                     <div class="mb-3">
                     <label class="form-label">Client name</label>
                     <input type="text" class="form-control">
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="mb-3">
                     <label class="form-label">Reporting period</label>
                     <input type="date" class="form-control">
                     </div>
                  </div>
                  <div class="col-lg-12">
                     <div>
                     <label class="form-label">Additional information</label>
                     <textarea class="form-control" rows="3"></textarea>
                     </div>
                  </div>
               </div>
               </div>
               <div class="modal-footer">
               <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                  Cancel
               </a>
               <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                  <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                  Create new report
               </a>
               </div>
            </div>
         </div>
      </div>
      <script src="{{asset('js/core/jquery.3.2.1.min.js')}}"></script>
      <script src="{{asset('js/datatables/datatables.min.js')}}"></script>

      
      <!-- Libs JS -->
      <script src="{{asset('libs/apexcharts/dist/apexcharts.min.js')}}"></script>
      <!-- Tabler Core -->
      <script src="{{asset('js/tabler.min.js')}}"></script>
      <script src="{{asset('js/demo.min.js')}}"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script>
         $(document).ready(function() {
            $('#example').DataTable();
         });
      </script>

      @stack('chart')

      @stack('ports')

      @stack('capacity')

      @if (session('success'))
         <script>
            $(document).ready(function() {
              

               let timerInterval
               Swal.fire({
               title: 'Success',
               html: '{{ Session::get('success') }}',
               timer: 2000,
               timerProgressBar: false,
               didOpen: () => {
                  Swal.showLoading()
                  const b = Swal.getHtmlContainer().querySelector('b')
                  timerInterval = setInterval(() => {
                     b.textContent = Swal.getTimerLeft()
                  }, 100)
               },
               willClose: () => {
                  clearInterval(timerInterval)
               }
               }).then((result) => {
               /* Read more about handling dismissals below */
               if (result.dismiss === Swal.DismissReason.timer) {
                  console.log('I was closed by the timer')
               }
               })
            });


            
         </script>
         @elseif(session('warning'))
         <script>
            $(document).ready(function() {
               Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: '{{ Session::get('warning') }}',
                  confirmButtonColor: '#9e9e9e',
                  // footer: '<a href="">Why do I have this issue?</a>'
               })
            });
         </script>
      @endif


   </body>
</html>