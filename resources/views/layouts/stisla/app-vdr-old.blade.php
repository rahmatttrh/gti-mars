<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>VDR PHE - @yield('title')</title>

  <!-- General CSS Files -->

  <link rel="stylesheet" href="{{asset('stisla/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('stisla/modules/fontawesome/css/all.min.css')}}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{asset('stisla/modules/jqvmap/dist/jqvmap.min.css')}}">
  <link rel="stylesheet" href="{{asset('stisla/modules/summernote/summernote-bs4.css')}}">
  <link rel="stylesheet" href="{{asset('stisla/modules/owlcarousel2/dist/assets/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('modules/owlcarousel2/dist/assets/owl.theme.default.min.css')}}">

  <link rel="stylesheet" href="{{asset('stisla/modules/datatables/datatables.min.css')}}">
  <link rel="stylesheet" href="{{asset('stisla/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('stisla/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('stisla/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('stisla/css/components.css')}}">
  <link rel="stylesheet" href="{{asset('stisla/modules/izitoast/css/iziToast.min.css')}}">

  {{-- <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
   <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
   <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
   <script src="https://cdn.amcharts.com/lib/5/locales/de_DE.js"></script>
   <script src="https://cdn.amcharts.com/lib/5/geodata/germanyLow.js"></script>
   <script src="https://cdn.amcharts.com/lib/5/fonts/notosans-sc.js"></script>

   <script src="https://cdn.amcharts.com/lib/5/percent.js"></script> --}}


  
<!-- Start GA -->

<style>
   table {
      width: 100%;
   }

   table, th, td {
      border: 1px solid rgb(226, 218, 218);
      border-collapse: collapse;
   }
   th, td {
      padding-left: 5px
   }

   
</style>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA -->

<style>
   .bga-1 {
      background-color: #365486
   }
   .bga-2 {
      background-color: #7FC7D9
   }

   .bgb-1{
      background-color: #2E4374
   }
   .bgb-2 {
      background-color: #4B527E
   }
   .bgb-3 {
      background-color: #7C81AD
   }
   .bgb-4 {
      background-color: #E5C3A6
   }
</style>

</head>



   {{-- <body class=""> --}}
   <body class="sidebar-mini">
      <div id="app ">
         <div class="main-wrapper main-wrapper-1 ">
            <div class="navbar-bg bgb-1"></div>

            



            
            {{-- NAVBAR --}}
            @if (auth()->user()->hasRole('marine') || auth()->user()->hasRole('admin-dsp') || auth()->user()->hasRole('superadmin-dsp'))
            <x-navbar.vdr.marine  />
            @elseif(auth()->user()->hasRole('department'))
            <x-navbar.department />
            @elseif(auth()->user()->hasRole('vessel'))
            <x-navbar.vessel />
            @elseif(auth()->user()->hasRole('fm'))
            <x-navbar.fm />
            @elseif(auth()->user()->hasRole('admin-vdr'))
            <x-navbar.admin-vdr />
            @elseif(auth()->user()->hasRole('admin-dsp'))
            <x-navbar.admin-dsp />
            @elseif(auth()->user()->hasRole('suptent'))
            <x-navbar.suptent />
            @elseif(auth()->user()->hasRole('chief'))
            <x-navbar.chief />
            @endif




            {{-- Siedbar --}}
            @if (auth()->user()->hasRole('marine') || auth()->user()->hasRole('admin-dsp') || auth()->user()->hasRole('superadmin-dsp') || auth()->user()->hasRole('admin-vdr') || auth()->user()->hasRole('superadmin-vdr'))
            <x-sidebar.vdr.marine />
            @elseif(auth()->user()->hasRole('vessel'))
            <x-sidebar.vdr.vessel />
            @elseif(auth()->user()->hasRole('suptent'))
            <x-sidebar.vdr.marine />
            @elseif(auth()->user()->hasRole('chief'))
            <x-sidebar.vdr.marine />
            @endif
            

            <!-- Main Content -->
            <div class="main-content">
            @yield('content')
            </div>
            <footer class="main-footer">
            <div class="footer-left">
               Copyright &copy; 2023 <div class="bullet"></div> ENC Development</a>
            </div>
            <div class="footer-right">
               
            </div>
            </footer>
         </div>
      </div>

      <!-- General JS Scripts -->
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

      <!-- Page Specific JS File -->
      {{-- <script src="{{asset('stisla/js/page/modules-chartjs.js')}}"></script> --}}

      <!-- Page Specific JS File -->
      <script src="{{asset('stisla/js/page/modules-toastr.js')}}"></script>

      <!-- Page Specific JS File -->
      {{-- <script src="{{asset('stisla/js/page/index.js')}}"></script> --}}
      
      <!-- Template JS File -->
      <script src="{{asset('stisla/js/scripts.js')}}"></script>
      <script src="{{asset('stisla/js/custom.js')}}"></script>
      <script src="{{asset('stisla/js/page/modules-datatables.js')}}"></script>
      <script src="{{asset('libs/apexcharts/dist/apexcharts.min.js')}}"></script>

      {{-- MYJS --}}
      @stack('map')
      @stack('chart')
      @stack('autorefresh')
      @stack('report')

      <script>
         $(document).ready(function () {
            var body = $('body');
            $(".main-sidebar .sidebar-menu > li").each(function() {
               let me = $(this);

               if(me.find('> .dropdown-menu').length) {
               me.find('> .dropdown-menu').hide();
               me.find('> .dropdown-menu').prepend('<li class="dropdown-title pt-3">'+ me.find('> a').text() +'</li>');
               }else{
               me.find('> a').attr('data-toggle', 'tooltip');
               me.find('> a').attr('data-original-title', me.find('> a').text());
               $("[data-toggle='tooltip']").tooltip({
                     placement: 'right'
               });
               }
            });

         
         });

      </script>


      @if (session('success'))
         <script>
               $(document).ready(function() {
                  iziToast.success({
                  title: 'Success!',
                  message: "{{ Session::get('success') }}",
                  position: 'topRight'
               });
                  
               });
         </script>
      @endif
      @if (session('warning'))
         <script>
               $(document).ready(function() {
                  iziToast.warning({
                  title: 'Fail!',
                  message: "{{ Session::get('warning') }}",
                  position: 'topRight'
               });
                  
               });
         </script>
      @endif
      @if ($errors->any())  
         @foreach ($errors->all() as $error)
         <script>
               $(document).ready(function() {
                  iziToast.info({
                     title: 'Failed!',
                     message: '{{ $error }}',
                     position: 'topRight'
                  });
               });
         </script>
         @endforeach     
      @endif
   </body>
</html>