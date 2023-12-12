<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>DSP PHE - @yield('title')</title>

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
<!-- /END GA --></head>



<body class="">
  {{-- <body class="sidebar-mini"> --}}
  <div id="app ">
    <div class="main-wrapper main-wrapper-1 ">
      <div class="navbar-bg " style="background-color: #0b4e99"></div>
      
      @if (auth()->user()->hasRole('marine'))
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li>
                <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
            </li>
            <li>
              <div class="bg-white py-1 px-3 rounded">
                <img src="{{asset('img/logo/phe-oses.png')}}" width="110" height="32" alt="DSP-PHE" class="navbar-brand-image">
              </div>
            </li>
            {{-- <li>
              <a href="/" style="text-decoration: none" class="bg-white py-1 px-4 rounded ml-2" data-toggle="tooltip" data-placement="bottom" title="Home Page">
                <b>HOME</b>
              </a>
            </li>
            <li>
              <a href="{{route('dsp.marine')}}" style="text-decoration: none" class="bg-white py-1 px-4 rounded ml-2" data-toggle="tooltip" data-placement="bottom" title="Digital Smart Port">
                <b>DSP</b>
              </a>
            </li>
            <li>
              <a href="#" style="text-decoration: none" class="bg-white py-1 px-4 rounded ml-2" data-toggle="tooltip" data-placement="bottom" title="Vessel Daily Report">
                <b>VDR</b>
              </a>
            </li> 
            <li>
              <a href="#" style="text-decoration: none" class="bg-white py-1 px-4 rounded ml-2" data-toggle="tooltip" data-placement="bottom" title="Under Development">
                <b>AIMS</b>
              </a>
            </li>--}}
            {{-- <li><h5 class="nav-link nav-link-lg">DIGITAL SMART PORT - PHE</h5></li> --}}
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          
        </form>
        <ul class="navbar-nav navbar-right">
        
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg {{$notif == 'true'  ? 'beep' : ''}}"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              {{-- <div class="dropdown-header">Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div> --}}
              <div class="dropdown-list-content dropdown-list-icons">
                @foreach ($allSchedules as $schedule)
                  @if ($schedule->requests->where('status', 1)->count() > 0)
                 
                  <a href="{{route('schedule.detail', enkripRambo($schedule->id))}}" class="dropdown-item dropdown-item-unread">
                    <div class="dropdown-item-icon bg-primary text-white">
                      <i class="fas fa-code"></i>
                    </div>
                    <div class="dropdown-item-desc">
                      You have Request Activity on Schedule {{$schedule->vessel->name ?? 'Vessel : Not Available'}}
                      <div class="time text-primary">{{$schedule->updated_at->diffForHumans()}}</div>
                    </div>
                  </a>
                  @endif
                @endforeach
                {{-- <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-icon bg-primary text-white">
                    <i class="fas fa-code"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Template update is available now!
                    <div class="time text-primary">2 Min Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                    <div class="time">10 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-success text-white">
                    <i class="fas fa-check"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-danger text-white">
                    <i class="fas fa-exclamation-triangle"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Low disk space. Let's clean it!
                    <div class="time">17 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="fas fa-bell"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Welcome to Stisla template!
                    <div class="time">Yesterday</div>
                  </div>
                </a> --}}
              </div>
              <div class="dropdown-footer text-center">
                {{-- <a href="#">View All <i class="fas fa-chevron-right"></i></a> --}}
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{asset('stisla/img/avatar/avatar-1.png')}}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, Marine</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              {{-- <div class="dropdown-title">Logged in 5 min ago</div> --}}
              <a href="/" class="dropdown-item has-icon">
                <i class="fa fa-home"></i> Back to Home Page
              </a>
              {{-- <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a> --}}
              <div class="dropdown-divider"></div>
              {{-- <a href="#" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a> --}}
              <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                           
                
                              {{ __('Logout') }}
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                              </form>
                        </a>
            </div>
          </li>
        </ul>
      </nav>
      @elseif(auth()->user()->hasRole('department'))
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li>
              <div class="bg-white py-1 px-3 rounded">
                <img src="{{asset('img/logo/phe-oses.png')}}" width="110" height="32" alt="DSP-PHE" class="navbar-brand-image">
              </div>
              
            </li>
            {{-- <li><h5 class="nav-link nav-link-lg">DIGITAL SMART PORT - PHE</h5></li> --}}
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          
        </form>
        <ul class="navbar-nav navbar-right">
          
          {{-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-icon bg-primary text-white">
                    <i class="fas fa-code"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Template update is available now!
                    <div class="time text-primary">2 Min Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                    <div class="time">10 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-success text-white">
                    <i class="fas fa-check"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-danger text-white">
                    <i class="fas fa-exclamation-triangle"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Low disk space. Let's clean it!
                    <div class="time">17 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="fas fa-bell"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Welcome to Stisla template!
                    <div class="time">Yesterday</div>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li> --}}
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{asset('stisla/img/avatar/avatar-1.png')}}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, {{auth()->user()->name}}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged in 5 min ago</div>
              <a href="/" class="dropdown-item has-icon">
                <i class="fa fa-home"></i> Back to Home Page
              </a>
              {{-- <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a> --}}
              <div class="dropdown-divider"></div>
              {{-- <a href="#" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a> --}}
              <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                           
                
                              {{ __('Logout') }}
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                              </form>
                        </a>
            </div>
          </li>
        </ul>
      </nav>
      @elseif(auth()->user()->hasRole('vessel'))
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li>
              <div class="bg-white py-1 px-3 rounded">
                <img src="{{asset('img/logo/phe-oses.png')}}" width="110" height="32" alt="DSP-PHE" class="navbar-brand-image">
              </div>
              
            </li>
            {{-- <li><h5 class="nav-link nav-link-lg">DIGITAL SMART PORT - PHE</h5></li> --}}
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          
        </form>
        <ul class="navbar-nav navbar-right">
          
          {{-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications
                
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-icon bg-primary text-white">
                    <i class="fas fa-code"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Template update is available now!
                    <div class="time text-primary">2 Min Ago</div>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li> --}}
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{asset('stisla/img/avatar/avatar-1.png')}}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, {{auth()->user()->name}}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged in 5 min ago</div>
              <a href="/" class="dropdown-item has-icon">
                <i class="fa fa-home"></i> Back to Home Page
              </a>
              {{-- <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a> --}}
              <div class="dropdown-divider"></div>
              {{-- <a href="#" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a> --}}
              <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                           
                
                              {{ __('Logout') }}
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                              </form>
                        </a>
            </div>
          </li>
        </ul>
      </nav>
      @endif




      {{-- Siedbar --}}
      @if (auth()->user()->hasRole('marine'))
        <div class="main-sidebar sidebar-style-2 ">
            <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
                <a href="{{route('dsp.marine')}}" class="fw-bold">DIGITAL SMART PORT </a>
            
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
                <a href="{{route('dsp.marine')}}">DSP</a>
            </div>
            <hr>
            <ul class="sidebar-menu">
                <li class="menu-header">Dashboard</li>
                <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Master Data</span></a>
                <ul class="dropdown-menu">
                    {{-- <li><a class="nav-link" href="{{route('activity')}}">Activity</a></li>
                    <li><a class="nav-link" href="{{route('crew')}}">Crew</a></li> --}}
                    <li><a class="nav-link" href="{{route('port')}}">Port</a></li>
                    <li><a class="nav-link" href="{{route('user')}}">User</a></li>
                    <li><a class="nav-link" href="{{route('vessel')}}">Vessel</a></li>
                </ul>
                </li>
                <li class="menu-header">Menu</li>
                <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Request Activity</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('request')}}">Inbox</a></li>                
                    <li><a class="nav-link beep beep-sidebar" href="{{route('request.progress.marine')}}">Progress</a></li>      
                </ul>
                </li>
                <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Schedule</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('schedule.plan', enkripRambo(auth()->user()->getMonth()))}}">Plan</a></li>
                    <li><a class="nav-link" href="{{route('schedule.order', enkripRambo(auth()->user()->getMonth()))}}">Progress</a></li>
                    <li><a class="nav-link" href="forms-validation.html">History</a></li>
                </ul>
                </li>
                
            </ul>

          </aside>
        </div>
        @elseif(auth()->user()->hasRole('department'))
        <div class="main-sidebar sidebar-style-2 ">
            <aside id="sidebar-wrapper">
              <div class="sidebar-brand">
                <a href="{{route('dsp.user')}}" class="fw-bold">DIGITAL SMART PORT </a>
            
              </div>
              <div class="sidebar-brand sidebar-brand-sm">
                <a href="{{route('dsp.user')}}">DSP</a>
              </div>
              <hr>
              <ul class="sidebar-menu">
                {{-- <li class="menu-header">Dashboard</li> --}}
                
                <li class="menu-header">Menu</li>
                <li class="dropdown">
                  <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Request Activity</span></a>
                  <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('request.create')}}">Create</a></li> 
                    <li><a class="nav-link" href="{{route('request.draft')}}">Draft</a></li>    
                    <li><a class="nav-link" href="{{route('request.progress')}}">Progress</a></li> 
                    <li><a class="nav-link" href="{{route('request.history')}}">History</a></li> 
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="nav-link has-dropdown"><i class="fas fa-infinity"></i> <span>Surveillance Activity</span></a>
                  <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('surveillance.create')}}">Create</a></li> 
                    <li><a class="nav-link" href="{{route('request.draft')}}">Draft</a></li>    
                    <li><a class="nav-link" href="{{route('request.progress')}}">Progress</a></li> 
                    <li><a class="nav-link" href="{{route('request.history')}}">History</a></li> 
                  </ul>
                </li>
                
                
              </ul>
    
                  
            </aside>
        </div>
        @elseif(auth()->user()->hasRole('vessel'))
        <div class="main-sidebar sidebar-style-2 ">
            <aside id="sidebar-wrapper">
              <div class="sidebar-brand">
                <a href="{{route('dsp.vessel')}}" class="fw-bold">DIGITAL SMART PORT </a>
            
              </div>
              <div class="sidebar-brand sidebar-brand-sm">
                <a href="{{route('dsp.vessel')}}">DSP</a>
              </div>
              <hr>
              <ul class="sidebar-menu">
                {{-- <li class="menu-header">Dashboard</li> --}}
                
                <li class="menu-header">Menu</li>
                <li><a class="nav-link" href="{{route('vdr.create')}}"><i class="fas fa-pencil-ruler"></i> <span>Create VDR</span></a></li>
                {{-- <li class="dropdown">
                  <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Request Activity</span></a>
                  <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('request.create')}}">Create</a></li> 
                    <li><a class="nav-link" href="{{route('request.draft')}}">Draft</a></li>    
                    <li><a class="nav-link" href="{{route('request.progress')}}">Progress</a></li> 
                    <li><a class="nav-link" href="{{route('request.history')}}">History</a></li> 
                  </ul>
                </li> --}}
                
                
              </ul>
    
              {{-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                <a href="https://getstisla.com/docs" class="btn btn-success btn-lg btn-block btn-icon-split">
                  <i class="fas fa-rocket"></i> Documentation
                </a>
              </div>         --}}
            </aside>
        </div>
      @endif
      

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2023 <div class="bullet"></div> Ekanuri Development</a>
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

  <!-- Page Specific JS File -->
  <script src="{{asset('stisla/js/page/modules-toastr.js')}}"></script>

  <!-- Page Specific JS File -->
  <script src="{{asset('stisla/js/page/index.js')}}"></script>
  
  <!-- Template JS File -->
  <script src="{{asset('stisla/js/scripts.js')}}"></script>
  <script src="{{asset('stisla/js/custom.js')}}"></script>
  <script src="{{asset('stisla/js/page/modules-datatables.js')}}"></script>

  {{-- MYJS --}}
  @stack('map')
  @stack('get_schedules')
  @stack('autorefresh')

  {{-- <script>
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

  </script> --}}


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