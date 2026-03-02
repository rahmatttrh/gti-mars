<style>
   .active {
      background-color: white;
      color: black
   }
</style>
<nav class="navbar navbar-expand-lg main-navbar bg-white text-dark">
   <a href="/" class="navbar-brand sidebar-gone-hide">
      <img src="{{asset('img/logo/phe-oses.png')}}" width="110" height="32" alt="DSP-PHE" class="navbar-brand-image mr-4"> 
   </a>
   <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
   <div class="nav-collapse">
      <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
         <i class="fas fa-ellipsis-v"></i>
      </a>
      <ul class="navbar-nav ">
         <li class="nav-item text-dark"><a href="{{route('dsp.user', [enkripRambo(auth()->user()->getMonth()), enkripRambo(auth()->user()->getYear())])}}" class="nav-link text-dark">DSP</a></li>
         <li class="nav-item text-dark"><a href="{{route('forbidden')}}" class="nav-link text-dark">VDR</a></li>
         <li class="nav-item text-dark"><a href="{{route('proact')}}" class="nav-link text-dark">PROACT</a></li>
         <li class="nav-item active text-dark"><a href="{{route('map')}}" class="nav-link bgb-1 rounded px-2 py-1">MAP</a></li>
         <li class="nav-item text-dark"><a href="{{route('fms')}}" class="nav-link text-dark">FMS</a></li>
         <li class="nav-item text-dark"><a href="{{route('hse')}}" class="nav-link text-dark">HSE</a></li>
      </ul>
   </div>
   
   <ul class="navbar-nav navbar-right ml-auto">
      
      
     <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
       <img alt="image" src="{{asset('stisla/img/avatar/avatar-1.png')}}" class="rounded-circle mr-1">
       <div class="d-sm-none d-lg-inline-block text-dark">{{auth()->user()->name}}</div></a>
       <div class="dropdown-menu dropdown-menu-right">
         <div class="dropdown-title">Logged in 5 min ago</div>
         <a href="features-profile.html" class="dropdown-item has-icon">
           <i class="far fa-user"></i> Profile
         </a>
         <a href="features-activities.html" class="dropdown-item has-icon">
           <i class="fas fa-bolt"></i> Activities
         </a>
         <a href="features-settings.html" class="dropdown-item has-icon">
           <i class="fas fa-cog"></i> Settings
         </a>
         <div class="dropdown-divider"></div>
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

<nav class="navbar navbar-dark  navbar-secondary navbar-expand-lg " style="background-color: #00A9FF" >
   <div class="container">
      <ul class="navbar-nav">
         <li class="nav-item pr-3 {{ (request()->is('map/*')) ? 'active' : '' }}">
            <a href="{{route('dsp.fm')}}" class="nav-link {{ (request()->is('map/*')) ? 'text-dark' : 'text-white' }}">
               @if (request()->is('map/*'))
               <i class="fas fa-fire ml-3"></i>
               @endif
               
               <span class="">Dashboard</span>
            </a>
         </li>
         
         {{-- <li class="nav-item {{ (request()->is('schedule/*')) ? 'active' : '' }}">
            <a href="{{route('schedule.all', enkripRambo(auth()->user()->getMonth()))}}" class="nav-link {{ (request()->is('schedule/*')) ? 'text-dark' : 'text-white' }}">
               @if (request()->is('schedule/*'))
               <i class="fas fa-fire ml-3"></i>
               @endif
               
               <span class="">Sailing Order</span>
            </a>
         </li> --}}

         {{-- <li class="nav-item dropdown {{ (request()->is('dsp/u/request/*')) ? 'active' : '' }}">
            <a href="#" data-toggle="dropdown" class="nav-link has-dropdown {{ (request()->is('dsp/u/request/*')) ? 'text-dark' : 'text-white' }} ">
               @if (request()->is('dsp/u/request/*'))
               <i class="fas fa-fire ml-3"></i>
               @endif
               
               <span>Request Activity</span>
            </a>
            
            <ul class="dropdown-menu">
               <li class="nav-item"><a href="{{route('request.create')}}" class="nav-link">Create Request Activity</a></li>
               <li class="nav-item"><a href="{{route('request.progress', enkripRambo(auth()->user()->getMonth()))}}" class="nav-link">Progress Request Activity</a></li>
            </ul>
         </li> --}}

         
      </ul>
   </div>
</nav>