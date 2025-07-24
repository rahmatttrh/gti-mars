<style>
   .active {
      background-color: white;
      color: black
   }
</style>
<nav class="navbar navbar-expand-lg main-navbar bg-white text-dark" >
   <form class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
        <li>
          <a href="#" data-toggle="sidebar" class="d-block d-sm-none nav-link nav-link-lg text-dark"
            ><i class="fas fa-bars"></i
          ></a>
          
        </li>
        <li>
          <a href="/" class="navbar-brand sidebar-gone-hide">
             <img src="{{asset('img/logo/phe-oses.png')}}" width="110" height="32" alt="DSP-PHE" class="navbar-brand-image mr-4"> 
          </a>
        </li>
 
        
      </ul>
       <div class="nav-collapse d-none d-sm-block">
          <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
             <i class="fas fa-ellipsis-v"></i>
          </a>
          <ul class="navbar-nav ">
            <li class="nav-item text-dark"><a href="/" class="nav-link text-dark" data-toggle="tooltip" data-placement="bottom" title="Homepage">HOME</a></li>
            <li class="nav-item active text-dark"><a href="{{route('dsp.vessel')}}" class="nav-link  bgb-1 rounded px-2 py-1" data-toggle="tooltip" data-placement="bottom" style="background-color: #1f4481" title="Digital Smart Port">DSP</a></li>
            <li class="nav-item text-dark"><a href="{{route('vdr.create')}}" class="nav-link text-dark" data-toggle="tooltip" data-placement="bottom"  title="Vessel Daily Report">VDR</a></li>
            <li class="nav-item text-dark"><a href="{{route('proact')}}" class="nav-link text-dark" data-toggle="tooltip" data-placement="bottom" title="Progress Tracking and Operation Control Tool">PROACT</a></li>
            <li class="nav-item text-dark"><a href="{{route('map')}}" class="nav-link text-dark" data-toggle="tooltip" data-placement="bottom" title="Marine Assurance Programs">MAP</a></li>
            <li class="nav-item text-dark"><a href="{{route('fms')}}" class="nav-link text-dark" data-toggle="tooltip" data-placement="bottom" title="Fuel Management System">FMS</a></li>
            <li class="nav-item text-dark"><a href="{{route('hse')}}" class="nav-link text-dark" data-toggle="tooltip" data-placement="bottom" title="Health, Security, and Environment">HSE</a></li>
          </ul>
       </div>
       {{-- <ul class="navbar-nav d-none d-sm-block">
          
       </ul> --}}
       <h4 class="d-block d-sm-none text-dark mt-2"><b><i>MARS</i></b></h4>
   </form>
   
   {{-- <a href="/" class="navbar-brand sidebar-gone-hide">
      <img src="{{asset('img/logo/phe-oses.png')}}" width="110" height="32" alt="DSP-PHE" class="navbar-brand-image mr-4"> 
   </a>
   <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
   <div class="nav-collapse">
      <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
         <i class="fas fa-ellipsis-v"></i>
      </a>
      <ul class="navbar-nav ">
         
      </ul>
   </div> --}}
   
   <ul class="navbar-nav navbar-right ml-auto">
      
      <li class="dropdown dropdown-list-toggle">
         <a href="#" data-toggle="dropdown" class="nav-link notification-toggle  nav-link-lg {{count($notifvesselschedules) > 0  ? 'beep' : ''}}"><i class="far fa-bell text-primary"></i>
         </a>
         <div class="dropdown-menu shadow dropdown-list dropdown-menu-right">
            <div class="dropdown-header">NOTIFICATIONS
            
            </div>
            <div class="dropdown-list-content dropdown-list-icons">
               @if (count($notifvesselschedules) > 0)
                  @foreach ($notifvesselschedules as $sche)
                     <a href="{{route('schedule.detail', enkripRambo($sche->id))}}" class="dropdown-item dropdown-item-unread">
                        
                        <div class="dropdown-item-desc">
                           Sailing Order {{$sche->class }} on {{formatDate($sche->date)}} 
                           <div class="time text-primary">{{$sche->updated_at->diffForHumans()}}</div>
                        </div>
                     </a>
                  @endforeach
                  @else
                  <small class="dropdown-item dropdown-item-unread text-muted">Tidak ada Sailing Order dari Fleet Control</small>
               @endif
               {{-- <span class="dropdown-item dropdown-item-unread">
                  
                  <div class="dropdown-item-desc text-muted">
                     Tidak ada Request dari User Field
                  </div>
               </span> --}}
              
            </div>
            <div class="dropdown-footer text-center">
               {{-- <a href="{{route('marine.request')}}">View Intermilan <i class="fas fa-chevron-right"></i></a> --}}
            </div>
         </div>
      </li>
     <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
       <img alt="image" src="{{asset('stisla/img/avatar/avatar-1.png')}}" class="rounded-circle mr-1">
       <div class="d-sm-none d-lg-inline-block text-dark">{{auth()->user()->name}}</div></a>
       <div class="dropdown-menu shadow dropdown-menu-right">
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


<div class="d-none d-md-block">
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
         <li class="nav-item {{ (request()->is('dsp/v/dash/*')) ? 'active' : '' }}">
            <a href="{{route('dsp.vessel')}}" class="nav-link {{ (request()->is('dsp/v/dash/*')) ? 'text-dark' : 'text-white' }}">
               @if (request()->is('dsp/v/dash/*'))
               <i class="fas fa-fire ml-3"></i>
               @endif
               
               <span class="">Dashboard</span>
            </a>
         </li>
         
         <li class="nav-item {{ (request()->is('dsp/v/schedule/*')) ? 'active' : '' }}">
            <a href="{{route('schedule.vessel.all')}}" class="nav-link {{ (request()->is('dsp/v/schedule/*')) ? 'text-dark' : 'text-white' }}">
               @if (request()->is('dsp/v/schedule/*'))
               <i class="fas fa-fire ml-3"></i>
               @endif
               
               <span class="">Sailing Order</span>
            </a>
         </li>

         <li class="nav-item dropdown {{ (request()->is('dsp/v/request/*')) ? 'active' : '' }}">
            <a href="#" data-toggle="dropdown" class="nav-link has-dropdown {{ (request()->is('dsp/v/request/*')) ? 'text-dark' : 'text-white' }} ">
               @if (request()->is('dsp/v/request/*'))
               <i class="fas fa-fire ml-3"></i>
               @endif
               
               <span>Request Activity</span>
            </a>
            
            <ul class="dropdown-menu">
               <li class="nav-item"><a href="{{route('request.vessel.create')}}" class="nav-link">Create Request Activity</a></li>
               <li class="nav-item"><a href="{{route('request.vessel.index')}}" class="nav-link">Progress Request Activity</a></li>
            </ul>
         </li>

         
      </ul>
   </div>
</nav>
</div>


<div class="d-block d-sm-none">
   <nav class="navbar navbar-dark  navbar-secondary navbar-expand-lg "  >
      <div class="px-2">
         <ul class="navbar-nav">
            
            <li class="nav-item nav-item-b  ">
               <a href="/" class="nav-link">
                 
                  <i class="fas text-primary ml-3 fa-fire"></i>
               
                  
                  <span class="mx-3">Home Page</span>
               </a>
            </li>
            
            <hr>
            <small class="ml-2"><b>- VDR</b></small>
            <li class="nav-item nav-item-b ">
               <a href="{{route('vdr.create')}}" class="nav-link ">
                  <span class="mx-3">Dashboard</span>
               </a>
            </li>
            <li class="nav-item nav-item-b ">
               <a href="{{route('vdr.vessel.create')}}" class="nav-link ">
                  <span class="mx-3">Create</span>
               </a>
            </li>
            <li class="nav-item nav-item-b ">
               <a href="{{route('vdr.vessel.create.spa')}}" class="nav-link ">
                  <span class="mx-3">Create by OnePageForm</span>
               </a>
            </li>
            <li class="nav-item nav-item-b ">
               <a href="{{route('vdr.history')}}" class="nav-link ">
                  <span class="mx-3">History</span>
               </a>
            </li>


            <hr>
            <small class="ml-2"><b>- DSP</b></small>
            <li class="nav-item nav-item-b ">
               <a href="{{route('dsp.vessel')}}" class="nav-link ">
                  <span class="mx-3">Dashboard</span>
               </a>
            </li>
            <li class="nav-item nav-item-b ">
               <a href="{{route('schedule.vessel.all')}}" class="nav-link ">
                  <span class="mx-3">Sailing Order</span>
               </a>
            </li>
            <li class="nav-item nav-item-b ">
               <a href="{{route('request.vessel.create')}}" class="nav-link ">
                  <span class="mx-3">Request Activity</span>
               </a>
            </li>
            

         </ul>
      </div>
   </nav>
</div>