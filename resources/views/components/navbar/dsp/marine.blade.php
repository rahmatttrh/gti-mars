<style>
   .active {
      background-color: white;
      color: black
   }
</style>
<nav class="navbar navbar-expand-lg main-navbar text-dark" >
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
             <li class="nav-item  text-dark"><a href="/" class="nav-link text-dark" >HOME</a></li>
             @if (auth()->user()->username == 'pet')
                <li class="nav-item active text-dark"><a href="#" class="nav-link bgb-1 rounded px-2 py-1" style="background-color: #1f4481">DSP</a></li>
                @else
                <li class="nav-item active text-dark"><a href="{{route('dsp.marine')}}" class="nav-link bgb-1 rounded px-2 py-1" style="background-color: #1f4481">DSP</a></li>
             @endif
             
             <li class="nav-item text-dark"><a href="{{route('vdr.marine')}}" class="nav-link text-dark">VDR</a></li>
             <li class="nav-item text-dark"><a href="{{route('proact')}}" class="nav-link text-dark">PROACT</a></li>
             <li class="nav-item text-dark"><a href="{{route('map')}}" class="nav-link text-dark">MAP</a></li>
             <li class="nav-item text-dark"><a href="{{route('fms')}}" class="nav-link text-dark">FMS</a></li>
             <li class="nav-item text-dark"><a href="{{route('hse')}}" class="nav-link text-dark">HSE</a></li>
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
         <li class="nav-item text-dark"><a href="/" class="nav-link text-dark" data-toggle="tooltip" data-placement="bottom" title="Homepage">HOME</a></li>
         <li class="nav-item active text-dark"><a href="{{route('dsp.marine')}}" class="nav-link  bgb-1 rounded px-2 py-1" data-toggle="tooltip" data-placement="bottom" title="Digital Smart Port">DSP</a></li>
         <li class="nav-item text-dark"><a href="{{route('vdr.marine')}}" class="nav-link text-dark" data-toggle="tooltip" data-placement="bottom" title="Vessel Daily Report">VDR</a></li>
         <li class="nav-item text-dark"><a href="{{route('proact')}}" class="nav-link text-dark" data-toggle="tooltip" data-placement="bottom" title="Progress Tracking and Operation Control Tool">PROACT</a></li>
         <li class="nav-item text-dark"><a href="{{route('map')}}" class="nav-link text-dark" data-toggle="tooltip" data-placement="bottom" title="Marine Assurance Programs">MAP</a></li>
         <li class="nav-item text-dark"><a href="{{route('fms')}}" class="nav-link text-dark" data-toggle="tooltip" data-placement="bottom" title="Fuel Management System">FMS</a></li>
         <li class="nav-item text-dark"><a href="{{route('hse')}}" class="nav-link text-dark" data-toggle="tooltip" data-placement="bottom" title="Health, Security, and Environment">HSE</a></li>
      </ul>
   </div> --}}
   
   <ul class="navbar-nav navbar-right ml-auto">
      
      <li class="dropdown dropdown-list-toggle">
         <a href="#" data-toggle="dropdown" class="nav-link notification-toggle  nav-link-lg {{count($notifrequests) > 0  ? 'beep' : ''}}"><i class="far fa-bell text-primary"></i>
         </a>
         <div class="dropdown-menu shadow dropdown-list dropdown-menu-right">
            <div class="dropdown-header">NOTIFICATIONS
            
            </div>
            <div class="dropdown-list-content dropdown-list-icons">
               @if (count($notifrequests) > 0)
                  @foreach ($notifrequests as $req)
                     @if ($req->activity_id == 5)
                       
                           <a href="{{route('schedule.detail', enkripRambo($req->schedule->id))}}" class="dropdown-item dropdown-item-unread">
                         
                           <div class="dropdown-item-desc">
                              {{$req->activity->name }}
                              
                              on {{formatDate($req->date)}} from {{$req->user->name}} 
                              <div class="time text-primary">{{$req->created_at->diffForHumans()}}</div>
                           </div>
                        </a> 
                        @else
                        <a href="#" class="dropdown-item dropdown-item-unread">
                         
                           <div class="dropdown-item-desc">
                              {{$req->description }}
                              
                              on {{formatDate($req->date)}} from {{$req->user->name}} 
                              <div class="time text-primary">{{$req->created_at->diffForHumans()}}</div>
                           </div>
                        </a>
                     @endif
                    
                  @endforeach
                  @else
                  <small class="dropdown-item dropdown-item-unread text-muted">Tidak ada Request dari User Field </small>
               @endif
             
              
            </div>
            <div class="dropdown-footer text-center">
               <a href="{{route('marine.request.list')}}">View Intermilan <i class="fas fa-chevron-right"></i></a>
              
            </div>
         </div>
      </li>
     <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
       <img alt="image" src="{{asset('stisla/img/avatar/avatar-1.png')}}" class="rounded-circle mr-1">
       <div class="d-sm-none d-lg-inline-block text-dark">
         {{auth()->user()->name}} 
         {{-- <small>{{getRoleName(auth()->user())}}</small> --}}
      </div></a>
       <div class="dropdown-menu shadow dropdown-menu-right">
         <div class="dropdown-title">{{getRoleName(auth()->user())}}</div>
         @if (auth()->user()->hasRole('marine'))
         <a href="{{route('user')}}" class="dropdown-item has-icon">
            <i class="fa fa-users"></i> User Management
         </a>
         @endif
         
         {{-- <a href="features-profile.html" class="dropdown-item has-icon">
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
         <li class="nav-item dropdown {{ (request()->is('dsp/m/dash/*')) ? 'active' : '' }}">
            <a href="#" data-toggle="dropdown" class="nav-link has-dropdown {{ (request()->is('dsp/m/dash/*')) ? 'text-dark' : 'text-white' }} ">
               @if (request()->is('dsp/m/dash/*'))
               <i class="text-primary fas fa-fire ml-3"></i>
               @endif
               
               <span >Dashboard </span>
            </a>
            
            <ul class="dropdown-menu">
            <li class="nav-item"><a href="{{route('dsp.marine')}}" class="nav-link">General Dashboard</a></li>
            {{-- <li class="nav-item"><a href="{{route('dsp.marine.intermilan', [enkripRambo(auth()->user()->getMonth()), enkripRambo(auth()->user()->getYear())])}}" class="nav-link">Intermilan Dashboard</a></li> --}}
            <li class="nav-item"><a href="{{route('map.full')}}" class="nav-link">Map Dashboard</a></li>
            </ul>
         </li>
         <li class="nav-item {{ (request()->is('intermilan/*')) ? 'active' : '' }}">
            <a href="{{route('intermilan.marine')}}" class="nav-link {{ (request()->is('intermilan/*')) ? 'text-dark' : 'text-white' }}">
               @if (request()->is('intermilan/*'))
               <i class="text-primary fas fa-calendar ml-3"></i>
               @endif
               <span>Intermilan</span>
            </a>
         </li>
         {{-- <li class="nav-item {{ (request()->is('dsp/m/request/*')) ? 'active' : '' }}">
            <a href="{{route('marine.request.list')}}" class="nav-link {{ (request()->is('dsp/m/request/*')) ? 'text-dark' : 'text-white' }}">
               @if (request()->is('dsp/m/request/*'))
               <i class="text-primary fas fa-calendar ml-3"></i>
               @endif
               <span>Intermilan</span>
            </a>
         </li> --}}
         <li class="nav-item {{ (request()->is('dsp/m/crew/change/*')) ? 'active' : '' }}">
            <a href="{{route('marine.crew.change', [enkripRambo(auth()->user()->getMonth()), enkripRambo(auth()->user()->getYear())])}}" class="nav-link {{ (request()->is('dsp/m/crew/change/*')) ? 'text-dark' : 'text-white' }}">
               @if (request()->is('dsp/m/crew/change/*'))
               <i class="text-primary fas fa-users ml-3"></i>
               @endif
               <span>Crew Change</span>
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

         {{-- <li class="nav-item dropdown {{ (request()->is('dsp/m/schedule/*')) ? 'active' : '' }}">
            <a href="#" data-toggle="dropdown" class="nav-link has-dropdown {{ (request()->is('dsp/m/schedule/*')) ? 'text-dark' : 'text-white' }} ">
               @if (request()->is('dsp/m/schedule/*'))
               <i class="text-primary fas fa-fire ml-3"></i>
               @endif
               
               <span >Sailing Order </span>
            </a>
            
            <ul class="dropdown-menu">
            <li class="nav-item"><a href="{{route('schedule.progress')}}" class="nav-link">Progress Sailing Order</a></li>
            <li class="nav-item"><a href="{{route('schedule.plan', enkripRambo(auth()->user()->getMonth()))}}" class="nav-link">Plan Sailing Order</a></li>
            </ul>
         </li> --}}

         {{-- <li class="nav-item pr-2 {{ (request()->is('dsp/m/schedule/*')) ? 'active' : '' }}">
            <a href="{{route('schedule.progress')}}" class="nav-link {{ (request()->is('dsp/m/schedule/*')) ? 'text-dark' : 'text-white' }}">
               @if (request()->is('dsp/m/schedule/*'))
               <i class="text-primary fas fa-fire ml-3"></i>
               @endif
               <span>Report</span>
            </a>
         </li>

         <li class="nav-item pr-2 {{ (request()->is('dsp/m/tracking/*')) ? 'active' : '' }}">
            <a href="{{route('tracking')}}" class="nav-link {{ (request()->is('dsp/m/tracking/*')) ? 'text-dark' : 'text-white' }}">
               @if (request()->is('dsp/m/tracking/*'))
               <i class="text-primary fas fa-fire ml-3"></i>
               @endif
               <span>Tracking</span>
            </a>
         </li> --}}
         

         {{-- <li class="nav-item {{ (request()->is('dsp/m/surveillance')) ? 'active' : '' }}">
            <a href="{{route('surveillance.marine')}}" class="nav-link {{ (request()->is('dsp/m/surveillance')) ? 'text-dark' : 'text-white' }}">
               @if (request()->is('dsp/m/surveillance'))
               <i class="text-primary fas fa-fire ml-3"></i>
               @endif
               <span>Surveillance</span>
            </a>
         </li>
         <li class="nav-item">
            <a href="{{route('log.dsp')}}" class="nav-link text-white">
               <span>Log</span>
            </a>
         </li> --}}
         {{-- <li class="nav-item {{ (request()->is('dsp/m/report')) ? 'active' : '' }}">
            <a href="{{route('report')}}" class="nav-link {{ (request()->is('dsp/m/report')) ? 'text-dark' : 'text-white' }}">
               @if (request()->is('dsp/m/report'))
               <i class="text-primary fas fa-fire ml-3"></i>
               @endif
               <span>Report</span>
            </a>
         </li> --}}

         
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
            <small class="ml-2"><b>- Master Data</b></small>
            <li class="nav-item nav-item-b ">
               <a href="{{route('vessel')}}" class="nav-link ">
                  <span class="mx-3">Vessel</span>
               </a>
            </li>
            <li class="nav-item nav-item-b ">
               <a href="{{route('user')}}" class="nav-link ">
                  <span class="mx-3">User</span>
               </a>
            </li>
            <hr>
            <small class="ml-2"><b>- VDR</b></small>
            <li class="nav-item nav-item-b ">
               <a href="{{route('vdr.marine')}}" class="nav-link ">
                  <span class="mx-3">Dashboard</span>
               </a>
            </li>
            <li class="nav-item nav-item-b ">
               <a href="{{route('vdr.pet.validation')}}" class="nav-link ">
                  <span class="mx-3">Waiting</span>
               </a>
            </li>
            <li class="nav-item nav-item-b ">
               <a href="{{route('vdr.reject.list')}}" class="nav-link ">
                  <span class="mx-3">Reject</span>
               </a>
            </li>
            <li class="nav-item nav-item-b ">
               <a href="{{route('vdr.history.list')}}" class="nav-link ">
                  <span class="mx-3">History</span>
               </a>
            </li>


            <hr>
            <small class="ml-2"><b>- DSP</b></small>
            <li class="nav-item nav-item-b ">
               <a href="{{route('dsp.marine')}}" class="nav-link ">
                  <span class="mx-3">Main Dashboard</span>
               </a>
            </li>
            <li class="nav-item nav-item-b ">
               <a href="{{route('map.full')}}" class="nav-link ">
                  <span class="mx-3">Map Dashboard</span>
               </a>
            </li>
            <li class="nav-item nav-item-b ">
               <a href="{{route('marine.request.list')}}" class="nav-link ">
                  <span class="mx-3">Intermilan</span>
               </a>
            </li>
            <li class="nav-item nav-item-b ">
               <a href="{{route('marine.crew.change', [enkripRambo(auth()->user()->getMonth()), enkripRambo(auth()->user()->getYear())])}}" class="nav-link ">
                  <span class="mx-3">Crew Change</span>
               </a>
            </li>

           

            
         
            
         
         </ul>
      </div>
   </nav>
</div>