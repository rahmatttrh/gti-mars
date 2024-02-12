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
         <li class="nav-item text-dark"><a href="{{route('dsp.vessel')}}" class="nav-link text-dark">DSP</a></li>
         <li class="nav-item text-dark active"><a href="{{route('vdr.create')}}" class="nav-link bgb-1 rounded px-2 py-1">DVR</a></li>
         <li class="nav-item text-dark"><a href="{{route('proact')}}" class="nav-link text-dark">PROACT</a></li>
         <li class="nav-item text-dark"><a href="{{route('map')}}" class="nav-link text-dark">MAP</a></li>
      </ul>
   </div>
   
   <ul class="navbar-nav navbar-right ml-auto">
      
      <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell text-info"></i></a>
       <div class="dropdown-menu dropdown-list dropdown-menu-right">
         <div class="dropdown-header">Notifications
           <div class="float-right ">
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
      </li>
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
         <li class="nav-item {{ (request()->is('vdr/v/dashboard')) ? 'active' : '' }}">
            <a href="{{route('vdr.create')}}" class="nav-link {{ (request()->is('vdr/v/dashboard')) ? 'text-dark' : 'text-white' }}">
               @if (request()->is('vdr/v/dashboard'))
               <i class="fas fa-fire ml-3"></i>
               @endif
               
               <span class="">Dashboard</span>
            </a>
         </li>
         <li class="nav-item {{ (request()->is('vdr/v/act/create')) ? 'active' : '' }}">
            <a href="{{route('vdr.vessel.create')}}" class="nav-link {{ (request()->is('vdr/v/act/create')) ? 'text-dark' : 'text-white' }}">
               @if (request()->is('vdr/v/act/create'))
               <i class="fas fa-fire ml-3"></i>
               @endif
               
               <span class="">Create</span>
            </a>
         </li>
         <li class="nav-item pr-3 {{ (request()->is('vdr/v/act/history')) ? 'active' : '' }}">
            <a href="{{route('vdr.history')}}" class="nav-link {{ (request()->is('vdr/v/act/history')) ? 'text-dark' : 'text-white' }}">
               @if (request()->is('vdr/v/act/history'))
               <i class="fas fa-fire ml-3"></i>
               @endif
               
               <span class="">History</span>
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