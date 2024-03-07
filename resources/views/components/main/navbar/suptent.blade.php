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
         <li class="nav-item text-dark"><a href="{{route('forbidden')}}" class="nav-link text-dark">DSP</a></li>
         <li class="nav-item text-dark"><a href="{{route('vdr.marine')}}" class="nav-link text-dark">VDR</a></li>
         <li class="nav-item text-dark"><a href="{{route('proact')}}" class="nav-link text-dark">PROACT</a></li>
         <li class="nav-item text-dark"><a href="{{route('map')}}" class="nav-link text-dark">MAP</a></li>
         <li class="nav-item text-dark"><a href="{{route('fms')}}" class="nav-link text-dark">FMS</a></li>
         <li class="nav-item text-dark"><a href="{{route('hse')}}" class="nav-link text-dark">HSE</a></li>
      </ul>
   </div>
   
   <ul class="navbar-nav navbar-right ml-auto">
      <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg {{count($vdrs->where('status', 2)) > 0  ? 'beep' : ''}}"><i class="far fa-bell text-primary"></i></a>
         <div class="dropdown-menu shadow dropdown-list dropdown-menu-right">
            <div class="dropdown-header">NOTIFICATIONS
            
            </div>
            <div class="dropdown-list-content dropdown-list-icons">
               @if (count($vdrs->where('status', 2)) > 0)
                  @foreach ($vdrs->where('status', 2) as $vdr)
                  <a href="{{route('vdr.show', enkripRambo($vdr->id))}}" class="dropdown-item dropdown-item-unread">
                    
                     <div class="dropdown-item-desc">
                        Validate VDR {{$vdr->vessel->name }} {{formatDate($vdr->date)}} 
                        <div class="time text-primary">{{$vdr->created_at->diffForHumans()}}</div>
                     </div>
                  </a>
                  @endforeach
                  @else
                  <small class="dropdown-item dropdown-item-unread text-muted">Tidak ada VDR dari vessel </small>
               @endif
              
            </div>
            <div class="dropdown-footer text-center"></div>
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
         
         <li class="nav-item {{ (request()->is('/')) ? 'active' : '' }}">
            <a href="/" class="nav-link {{ (request()->is('/')) ? 'text-dark' : 'text-white' }}">
               @if (request()->is('/'))
               <i class="fas fa-fire ml-3"></i>
               @endif
               
               <span class="">Home Page</span>
            </a>
         </li>
         
         <li class="nav-item">
            <a href="#" class="nav-link text-white">
               <span class="">Marine Advanced Reporting System</span>
            </a>
         </li>
      </ul>
   </div>
</nav>