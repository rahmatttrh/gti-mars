<nav class="navbar navbar-expand-lg main-navbar">
   <form class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
         <li>
            <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
         </li>
         <li>
            <a href="/" data-toggle="tooltip" data-placement="bottom" title="Home Page">
               <div class="bg-white py-1 px-3 rounded">
                  <img src="{{asset('img/logo/phe-oses.png')}}" width="110" height="32" alt="DSP-PHE" class="navbar-brand-image">
               </div>
            </a>
         </li>
         <li>
            <a href="{{route('dsp.marine')}}" class="nav-link nav-link-lg ml-4" data-toggle="tooltip" data-placement="bottom" title="Digital Smart Port"><b>DSP</b></a>
         </li>
         <li>
            <a href="{{route('vdr.marine')}}" class="nav-link nav-link-lg" data-toggle="tooltip" data-placement="bottom" title="Vessel Daily Report">VDR</a>
         </li>
         <li>
            <a href="{{route('proact')}}" class="nav-link nav-link-lg" data-toggle="tooltip" data-placement="bottom" title="Progress Tracking and Operation Control Tool">PROACT</a>
         </li>
         <li>
            <a href="{{route('map')}}" class="nav-link nav-link-lg" data-toggle="tooltip" data-placement="bottom" title="Marine Assurance Program">MAP</a>
         </li>
         <li>
            <a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a>
         </li>
      </ul>
   </form>
   <ul class="navbar-nav navbar-right">
      
      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
         <img alt="image" src="{{asset('stisla/img/avatar/avatar-1.png')}}" class="rounded-circle mr-1">
         <div class="d-sm-none d-lg-inline-block">Hi, {{auth()->user()->name}}</div></a>
         <div class="dropdown-menu dropdown-menu-right">
         <div class="dropdown-title"><x-status-stisla.user /></div>
         <div class="dropdown-divider"></div>
         <a href="{{route('user')}}" class="dropdown-item has-icon">
            <i class="fa fa-users"></i> User Management
         </a>
         
         {{-- <div class="dropdown-divider"></div> --}}
         
         <a class="dropdown-item has-icon" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="fa fa-lock "></i>
               {{ __('Logout') }}
               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
               </form>
            </a>
         </div>
      </li>
   </ul>
</nav>