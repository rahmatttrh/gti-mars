<style>
   .active {
      background-color: white;
      color: black
   }

   .nav-item-b a:hover {
      /* text-color: #d5dcee; */
   background-color: rgb(255, 255, 255);
   font-size: 18px;
   }
</style>
<nav class="navbar navbar-expand-lg main-navbar  text-dark" style="background-color: #d5dcee">
   <a href="/" class="navbar-brand sidebar-gone-hide">
      <img src="{{asset('img/logo/phe-oses.png')}}" width="110" height="32" alt="DSP-PHE" class="navbar-brand-image mr-4"> 
   </a>
   <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
   <div class="nav-collapse">
      <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
         <i class="fas fa-ellipsis-v"></i>
      </a>
      <ul class="navbar-nav ">
         <li class="nav-item text-dark"><a href="/" class="nav-link text-dark" data-toggle="tooltip" data-placement="bottom" title="Homepage">HOME</a></li>
         <li class="nav-item text-dark"><a href="{{route('dsp.vessel')}}" class="nav-link text-dark" data-toggle="tooltip" data-placement="bottom" title="Digital Smart Port">DSP</a></li>
         <li class="nav-item text-dark active" ><a href="{{route('vdr.create')}}" class="nav-link  rounded px-2 py-1" style="background-color: #1f4481" data-toggle="tooltip" data-placement="bottom" title="Vessel Daily Report">VDR</a></li>
         <li class="nav-item text-dark"><a href="{{route('proact')}}" class="nav-link text-dark" data-toggle="tooltip" data-placement="bottom" title="Progress Tracking and Operation Control Tool">PROACT</a></li>
         <li class="nav-item text-dark"><a href="{{route('map')}}" class="nav-link text-dark" data-toggle="tooltip" data-placement="bottom" title="Marine Assurance Programs">MAP</a></li>
         <li class="nav-item text-dark"><a href="{{route('fms')}}" class="nav-link text-dark" data-toggle="tooltip" data-placement="bottom" title="Fuel Management System">FMS</a></li>
         <li class="nav-item text-dark"><a href="{{route('hse')}}" class="nav-link text-dark" data-toggle="tooltip" data-placement="bottom" title="Health, Security, and Environment">HSE</a></li>
      </ul>
   </div>
   
   <ul class="navbar-nav navbar-right ml-auto">
      
     
     <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
       <img alt="image" src="{{asset('stisla/img/avatar/avatar-1.png')}}" class="rounded-circle mr-1">
       <div class="d-sm-none d-lg-inline-block text-dark">{{auth()->user()->name}}</div></a>
       <div class="dropdown-menu dropdown-menu-right">
         {{-- <div class="dropdown-title">Logged in 5 min ago</div>
         <a href="features-profile.html" class="dropdown-item has-icon">
           <i class="far fa-user"></i> Profile
         </a>
         <a href="features-activities.html" class="dropdown-item has-icon">
           <i class="fas fa-bolt"></i> Activities
         </a>
         <a href="features-settings.html" class="dropdown-item has-icon">
           <i class="fas fa-cog"></i> Settings
         </a> --}}
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

<nav class="navbar navbar-dark  navbar-secondary navbar-expand-lg " style="background-color: #252e47" >
   <div class="">
      <ul class="navbar-nav">
         {{-- <li class="nav-item dropdown {{ (request()->is('dsp/u/dash/*')) ? 'active' : '' }}">
            <a href="#" data-toggle="dropdown" class="nav-link has-dropdown {{ (request()->is('dsp/u/dash/*')) ? 'text-dark' : 'text-white' }}">
               @if (request()->is('dsp/u/dash/*'))
               <i class="fas fa-fire ml-3"></i>
               @endif
               <span >Dashboard </span>
            </a>
            
            <ul class="dropdown-menu">
            <li class="nav-item"><a href="{{route('dsp.marine')}}" class="nav-link">General Dashboard</a></li>
            <li class="nav-item"><a href="index.html" class="nav-link">Intermilan Dashboard</a></li>
            <li class="nav-item"><a href="{{route('map.full')}}" class="nav-link">Map Dashboard</a></li>
            </ul>
         </li> --}}
         <li class="nav-item nav-item-b {{ (request()->is('vdr/v/dashboard')) ? 'active' : '' }}">
            <a href="{{route('vdr.create')}}" class="nav-link {{ (request()->is('vdr/v/dashboard')) ? 'text-dark' : 'text-white' }}">
               @if (request()->is('vdr/v/dashboard'))
               <i class="fas fa-fire ml-3"></i>
               @endif
               
               <span class="mx-3">Dashboard</span>
            </a>
         </li>
         <li class="nav-item nav-item-b {{ (request()->is('vdr/v/act/create')) ? 'active' : '' }}">
            <a href="{{route('vdr.vessel.create')}}" class="nav-link {{ (request()->is('vdr/v/act/create')) ? 'text-dark' : 'text-white' }}">
               @if (request()->is('vdr/v/act/create'))
               <i class="fas fa-fire ml-3"></i>
               @endif
               
               <span class="mx-3">Create</span>
            </a>
         </li>
         <li class="nav-item nav-item-b {{ (request()->is('vdr/v/act/create/spa')) ? 'active' : '' }}">
            <a href="{{route('vdr.vessel.create.spa')}}" class="nav-link {{ (request()->is('vdr/v/act/create/spa')) ? 'text-dark' : 'text-white' }}">
               @if (request()->is('vdr/v/act/create/spa'))
               <i class="fas fa-fire ml-3"></i>
               @endif
               
               <span class="mx-3">Create by OnePageForm</span>
            </a>
         </li>
         
         <li class="nav-item nav-item-b pr-3 {{ (request()->is('vdr/v/act/history')) ? 'active' : '' }}">
            <a href="{{route('vdr.history')}}" class="nav-link {{ (request()->is('vdr/v/act/history')) ? 'text-dark' : 'text-white' }}">
               @if (request()->is('vdr/v/act/history'))
               <i class="fas fa-fire ml-3"></i>
               @endif
               
               <span class="mx-3">History</span>
            </a>
         </li>
         
         

         {{-- <li class="nav-item dropdown {{ (request()->is('vdr/v/act/*')) ? 'active' : '' }} {{ (request()->is('vdr/detail/*')) ? 'active' : '' }}">
            <a href="#" data-toggle="dropdown" class="nav-link has-dropdown {{ (request()->is('vdr/v/act/*')) ? 'text-dark' : 'text-white' }} {{ (request()->is('vdr/detail/*')) ? 'text-dark' : 'text-white' }}">
               @if (request()->is('vdr/v/act/*'))
               <i class="fas fa-fire ml-3"></i>
               @endif
               @if (request()->is('vdr/detail/*'))
               <i class="fas fa-fire ml-3"></i>
               @endif
               
               <span>VDR</span>
            </a>
            
            <ul class="dropdown-menu">
               <li class="nav-item"><a href="{{route('vdr.vessel.create')}}" class="nav-link">Create VDR</a></li>
               <li class="nav-item"><a href="{{route('vdr.history')}}" class="nav-link">Progress VDR</a></li>
            </ul>
         </li> --}}

         
      </ul>
   </div>
</nav>