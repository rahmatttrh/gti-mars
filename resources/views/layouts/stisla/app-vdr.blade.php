<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title> @yield('title')</title>

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

  <style>
    .input {
        background-color: lightgrey
    }
    html {
  scroll-behavior: smooth;
}

</style>

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

  <link href='https://api.mapbox.com/mapbox-gl-js/v2.0.0/mapbox-gl.css' rel='stylesheet' />
<!-- Start GA -->
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
      background-color: #00A9FF
   }
   .bgb-2 {
      background-color: #89CFF3
   }
   .bgb-3 {
      background-color: #A0E9FF
   }
   .bgb-4 {
      background-color: #CDF5FD
   }
   
   .secnav a:hover {
      color: #7C81AD
   }

   table td {
      font-size: 11px
   }
   .badge {
      font-size: 11px
   }
</style>


</head>
   <body class="layout-3 bg-white">
     
      <div id="app ">
         
         <div class="main-wrapper container ">
            {{-- <div class="main-wrapper main-wrapper-1 "> --}}
               
            <div class="navbar-bg bgb-1"></div>
            
            {{-- NAVBAR --}}
            @if (auth()->user()->hasRole('marine') || auth()->user()->hasRole('admin-dsp') || auth()->user()->hasRole('superadmin-dsp'))
            <x-navbar.vdr.marine  />
            @elseif(auth()->user()->hasRole('department'))
            <x-navbar.vdr.department />
            @elseif(auth()->user()->hasRole('vessel'))
            <x-navbar.vdr.vessel />
            {{-- @elseif(auth()->user()->hasRole('fm'))
            <x-navbar.vdr.fm /> --}}
            @elseif(auth()->user()->hasRole('suptent'))
            <x-navbar.vdr.suptent  />
            @elseif(auth()->user()->hasRole('chief'))
            <x-navbar.vdr.chief  />
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
      @stack('get_schedules')
      @stack('autorefresh')
      @stack('report')
      @stack('chart')

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