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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
      {{-- <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet"/> --}}
      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap4.min.css" rel="stylesheet">
      <link href='https://api.mapbox.com/mapbox-gl-js/v2.0.0/mapbox-gl.css' rel='stylesheet' />
      <link rel="stylesheet" href="{{asset('stisla/modules/izitoast/css/iziToast.min.css')}}">

      <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
      <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

      <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="{{asset('stisla/modules/fontawesome/css/all.min.css')}}">
   </head>
   <body class="bg-white">
      <div class="wrapper py-2" >
         
         

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

      

      

      <script src="{{asset('stisla/modules/jquery.min.js')}}"></script>
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
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

      <!-- JS Libraies -->
      <script src="{{asset('stisla/modules/chart.min.js')}}"></script>

      

      @stack('chart')
      @stack('get_schedules')
      @stack('ports')
      @stack('capacity')
      @stack('map')
      @stack('autorefresh')

      
      {{-- <script>
         
         $(document).ready( function () {
            
            document.addEventListener('contextmenu', function(event) {
               event.preventDefault();
            });
         } );
         
         </script> --}}
      

      <script>
         $(document).ready(function() {
            $('.example').DataTable();
            $('.select2').select2({});
         });
      </script>

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