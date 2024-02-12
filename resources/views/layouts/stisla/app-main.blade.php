<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>MARS - @yield('title')</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('stisla/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('stisla/modules/fontawesome/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('stisla/modules/datatables/datatables.min.css')}}">
  <link rel="stylesheet" href="{{asset('stisla/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('stisla/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('stisla/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('stisla/css/components.css')}}">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
<script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
<!-- /END GA -->
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

   .bgc-1 {
      background-color: #176B87
   }
   .bgc-2 {
      background-color: #86B6F6
   }
</style>
</head>

<body class="layout-3 bg-white">
   <div id="app">
      <div class="main-wrapper container">
         {{-- <div class="navbar-bg " style="background-color: #0b4e99"></div> --}}
         <div class="navbar-bg bgb-1" ></div>
            @if (auth()->user()->hasRole('marine') || auth()->user()->hasRole('superadmin-dsp') || auth()->user()->hasRole('superadmin-vdr') )
               <x-main.navbar.top.marine />
               @elseif (auth()->user()->hasRole('vessel'))
               <x-main.navbar.vessel />
               @elseif (auth()->user()->hasRole('fm'))
               <x-main.navbar.fm />
               @elseif (auth()->user()->hasRole('department'))
               <x-main.navbar.department />
               @elseif(auth()->user()->hasRole('suptent'))
               <x-main.navbar.suptent />
               @elseif(auth()->user()->hasRole('admin-dsp'))
               <x-main.navbar.admin-dsp />
               @elseif(auth()->user()->hasRole('admin-vdr'))
               <x-main.navbar.admin-vdr />
            @endif
        

         

         <!-- Main Content -->
         <div class="main-content">
            <section class="section">
               <div class="section-body">
                  @yield('content')
               </div>
            </section>
         </div>
         <footer class="main-footer">
         <div class="footer-left">
            Copyright &copy; 2023 <div class="bullet"></div> Ekanuri Development
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
  <script src="{{asset('stisla/js/page/bootstrap-modal.js')}}"></script>
  <script src="{{asset('stisla/modules/datatables/datatables.min.js')}}"></script>
  <script src="{{asset('stisla/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
   <script src="{{asset('stisla/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script>
   <script src="{{asset('stisla/js/page/modules-datatables.js')}}"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="{{asset('stisla/js/scripts.js')}}"></script>
  <script src="{{asset('stisla/js/custom.js')}}"></script>
</body>
</html>