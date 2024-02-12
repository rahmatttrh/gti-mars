<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>MARS - Home Page</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('stisla/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('stisla/modules/fontawesome/css/all.min.css')}}">

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

<body class="sidebar-mini">
   <div id="app">
      <div class="main-wrapper container">
         <div class="navbar-bg bgb-1" ></div>
         <nav class="navbar navbar-expand-lg main-navbar">
         
         <a href="/" class="navbar-brand sidebar-gone-hide">
            <div class="bg-white py-1 px-3 rounded">
               <img src="{{asset('img/logo/phe-oses.png')}}" width="110" height="32" alt="DSP-PHE" class="navbar-brand-image">
            </div>
         </a>
         <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
         <div class="nav-collapse">
            <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
               <i class="fas fa-ellipsis-v"></i>
            </a>
            @if (auth()->user()->hasRole('marine') || auth()->user()->hasRole('admin-dsp') || auth()->user()->hasRole('superadmin-dsp') || auth()->user()->hasRole('admin-vdr') || auth()->user()->hasRole('superadmin-vdr') )
               <x-main.navbar.marine />
               @elseif (auth()->user()->hasRole('vessel'))
               <x-main.navbar.vessel />
               @elseif (auth()->user()->hasRole('fm'))
               <x-main.navbar.fm />
               @elseif (auth()->user()->hasRole('department'))
               <x-main.navbar.department />
               @elseif(auth()->user()->hasRole('suptent'))
               <x-main.navbar.suptent />
            @endif
            
         </div>
         <form class="form-inline ml-auto">
            <ul class="navbar-nav">
               <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
            </ul>
            
         </form>
         <ul class="navbar-nav navbar-right">
            
            
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
               <img alt="image" src="{{asset('stisla/img/avatar/avatar-1.png')}}" class="rounded-circle mr-1">
               <div class="d-sm-none d-lg-inline-block">Hi, {{auth()->user()->name}}</div></a>
               <div class="dropdown-menu dropdown-menu-right">
                  <div class="dropdown-title"><x-status-stisla.user /></div>
                  <div class="dropdown-divider"></div>
                  @if (auth()->user()->hasRole('marine'))
                  <a href="{{route('user')}}" class="dropdown-item has-icon">
                     <i class="fa fa-users"></i> User Management
                  </a>
                  @endif
                  
               
               <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                     <i class="fa fa-lock"></i>
         
                  {{ __('Logout') }}
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                  </form>
               </a>
               </div>
            </li>
         </ul>
         </nav>

         

         <!-- Main Content -->
         <div class="main-content">
            <section class="section">
               <div class="section-body">
                  <div class="card shadow-lg">
                     <div class="card-body text-center">
                        <br>
                        <img width="200px" src="{{asset('img/flaticon/tools.png')}}" alt="" class="">
                        <hr>
                        <h1>Under Development</h1>
                        
                     </div>
                     <div class="card-footer bg-whitesmoke text-center">
                        <span>This system is not available yet</span>
                     </div>
                  </div>
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
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="{{asset('stisla/js/scripts.js')}}"></script>
  <script src="{{asset('stisla/js/custom.js')}}"></script>
</body>
</html>