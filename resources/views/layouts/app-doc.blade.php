<!doctype html>

<html lang="en">
   <head>
      <meta charset="utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
      <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
      <title>PDF @yield('title')</title>
      <link rel="icon" href="{{asset('img/flaticon/neptune.png')}}" type="image/x-icon" />
      <!-- CSS files -->
      <link href="{{asset('css/tabler.min.css')}}" rel="stylesheet"/>
      <link href="{{asset('css/tabler-flags.min.css')}}" rel="stylesheet"/>
      <link href="{{asset('css/tabler-payments.min.css')}}" rel="stylesheet"/>
      <link href="{{asset('css/tabler-vendors.min.css')}}" rel="stylesheet"/>
      <link href="{{asset('css/demo.min.css')}}" rel="stylesheet"/>
      <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

      {{-- <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet"/> --}}
      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap4.min.css" rel="stylesheet">
      <link href='https://api.mapbox.com/mapbox-gl-js/v2.0.0/mapbox-gl.css' rel='stylesheet' />
      <link rel="stylesheet" href="{{asset('stisla/modules/izitoast/css/iziToast.min.css')}}">
      
   </head>
   <body class="bg-white">
      <div class="wrapper" >
         <div class="sticky-top">
            <header class="navbar navbar-expand-md navbar-light sticky-top d-print-none">
               <div class="px-4">
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                     <span class="navbar-toggler-icon"></span>
                  </button>
                  {{-- navbar-brand-autodark  --}}
                  <h1 class="navbar-brand  d-none-navbar-horizontal pe-0 pe-md-3">
                     <a href="/" class="navbar-brand sidebar-gone-hide">
                        @if (auth()->user() != null)
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

                           @else
                           <img src="{{asset('img/logo/phe-oses.png')}}"  alt="DSP-PHE" class="navbar-brand-image">
                        @endif
                     
                     </a>
                     
                     
                  </h1>
                  
               </div>
            </header>
         </div>
         

         <div class="page-wrapper" style="min-height: 100vh">
            @yield('content')
            
            <footer class="footer footer-transparent d-print-none">
               <div class="px-4">
                  <div class="row text-center align-items-center flex-row-reverse">
                     <div class="col-lg-auto ms-lg-auto">
                     <ul class="list-inline list-inline-dots mb-0">
                        <li class="list-inline-item"><a href="./docs/index.html" class="link-secondary">MARS v1.0.0-beta</a></li>
                        
                     </ul>
                     </div>
                     <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                     <ul class="list-inline list-inline-dots mb-0">
                        <li class="list-inline-item">
                           Copyright &copy; 2023
                           <a href="." class="link-secondary">PHE OSES</a>.
                           All rights reserved.
                        </li>
                        
                     </ul>
                     </div>
                  </div>
               </div>
            </footer>
         </div>
      </div>

      <div class="modal fade" id="vdr-approve-suptent" tabindex="1" role="dialog" aria-hidden="true">
         <div class="modal-dialog modal-sm" role="document">
            
            
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Approve this VDR ???</h5>
                  {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button> --}}
               </div>
               <div class="modal-body">
                  {{$vdr->code}}
               </div>
               <div class="modal-footer bg-whitesmoke">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <a href="{{route('vdr.approve.suptent', enkripRambo($vdr->id))}}"  class="btn btn-info">Approve</a>
               </div>
            </div>
         </div>
      </div>

      @if (session('succedeed'))
      <div class="modal modal-blur fade" id="succedeed" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
           <div class="modal-content">
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             <div class="modal-status bg-success"></div>
             <div class="modal-body text-center py-4">
               <!-- Download SVG icon from http://tabler-icons.io/i/circle-check -->
               <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-green icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><path d="M9 12l2 2l4 -4" /></svg>
               <h3>Request succedeed</h3>
               <div class="text-muted">{{ Session::get('succedeed') }}</div>
             </div>
             <div class="modal-footer">
               <div class="w-100">
                 <div class="row">
                   <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                       Close
                     </a></div>
                   {{-- <div class="col"><a href="#" class="btn btn-success w-100" data-bs-dismiss="modal">
                       View invoice
                     </a></div> --}}
                 </div>
               </div>
             </div>
           </div>
         </div>
      </div>
      @endif

      @if (session('error'))
      <div class="modal modal-blur fade" id="error" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               <div class="modal-status bg-danger"></div>
               <div class="modal-body text-center py-4">
                  <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9v2m0 4v.01" /><path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" /></svg>
                  <h3>Failed</h3>
                  <div class="text-muted">{{ Session::get('error') }}</div>
               </div>
               <div class="modal-footer">
                  <div class="w-100">
                  <div class="row">
                     <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                        Close
                        </a></div>
                    
                  </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      @endif

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
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

      <script src='https://api.mapbox.com/mapbox-gl-js/v2.0.0/mapbox-gl.js'></script>
      <script src="https://unpkg.com/supercluster@7.1.2/dist/supercluster.min.js"></script>
      <script>
         $(document).ready(function() {
            $('.example').DataTable();
            $('.select2').select2({});
         });
      </script>


<script src="{{asset('stisla/modules/jquery.min.js')}}"></script>
      <script src="{{asset('stisla/modules/popper.js')}}"></script>
      <script src="{{asset('stisla/modules/tooltip.js')}}"></script>
      <script src="{{asset('stisla/modules/bootstrap/js/bootstrap.min.js')}}"></script>
      <script src="{{asset('stisla/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
      <script src="{{asset('stisla/modules/moment.min.js')}}"></script>
      <script src="{{asset('stisla/js/stisla.js')}}"></script>
      
      <!-- JS Libraies -->
      <script src="{{asset('stisla/modules/jquery.sparkline.min.js')}}"></script>
      <script src="{{asset('stisla/modules/chart.min.js')}}"></script>
      <script src="{{asset('stisla/modules/owlcarousel2/dist/owl.carousel.min.js')}}"></script>
      <script src="{{asset('stisla/modules/summernote/summernote-bs4.js')}}"></script>
      <script src="{{asset('stisla/modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>

      <script src="{{asset('stisla/modules/datatables/datatables.min.js')}}"></script>
      <script src="{{asset('stisla/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
      <script src="{{asset('stisla/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script>
      <script src="{{asset('stisla/modules/jquery-ui/jquery-ui.min.js')}}"></script>

      <script src='https://api.mapbox.com/mapbox-gl-js/v2.0.0/mapbox-gl.js'></script>
      <script src="https://unpkg.com/supercluster@7.1.2/dist/supercluster.min.js"></script>

      <script src="{{asset('stisla/modules/izitoast/js/iziToast.min.js')}}"></script>

      <!-- JS Libraies -->
      <script src="{{asset('stisla/modules/chart.min.js')}}"></script>

      

      @stack('chart')
      @stack('get_schedules')
      @stack('ports')
      @stack('capacity')
      @stack('map')
      @stack('autorefresh')

      @if (session('succedeed'))
         <script>
            $(document).ready(function() {
               $('#succedeed').modal('show');
            });
         </script>
      @endif

      @if (session('error'))
         <script>
            $(document).ready(function() {
               $('#error').modal('show');
            });
         </script>
      @endif

      @if (session('success'))
         <script>
            $(document).ready(function() {
              

               let timerInterval
               Swal.fire({
               title: 'Success',
               html: '{{ Session::get('success') }}',
               timer: 4000,
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