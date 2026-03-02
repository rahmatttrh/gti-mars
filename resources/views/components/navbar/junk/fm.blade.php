<nav class="navbar navbar-expand-lg main-navbar">
   <form class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
         <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
         <li>
            <a href="/" data-toggle="tooltip" data-placement="bottom" title="Home Page">
               <div class="bg-white py-1 px-3 rounded">
                  <img src="{{asset('img/logo/phe-oses.png')}}" width="110" height="32" alt="DSP-PHE" class="navbar-brand-image">
               </div>
            </a>
         </li>
         <li>
            <a href="{{route('dsp.fm')}}" class="nav-link nav-link-lg ml-4" data-toggle="tooltip" data-placement="bottom" title="Digital Smart Port">DSP</a>
         </li>
         <li>
            <a href="#" class="nav-link nav-link-lg" data-toggle="tooltip" data-placement="bottom" title="Vessel Daily Report">VDR</a>
         </li>
         <li>
            <a href="{{route('proact')}}" class="nav-link nav-link-lg" data-toggle="tooltip" data-placement="bottom" title="Progress Tracking and Operation Control Tool">PROACT</a>
         </li>
         <li>
            <a href="{{route('map')}}" class="nav-link nav-link-lg" data-toggle="tooltip" data-placement="bottom" title="Marine Assurance Program">MAP</a>
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