<style>
   .active {
      background-color: white;
      color: black
   }
</style>
<nav class="navbar navbar-expand-lg main-navbar bg-white text-dark" style="background-color: #d5dcee">
   <a href="/" class="navbar-brand sidebar-gone-hide">
      <img src="{{asset('img/logo/phe-oses.png')}}" width="110" height="32" alt="DSP-PHE" class="navbar-brand-image mr-4"> 
   </a>
   <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
   <div class="nav-collapse">
      <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
         <i class="fas fa-ellipsis-v"></i>
      </a>
      <ul class="navbar-nav ">
         @if (auth()->user()->username == 'pet')
            <li class="nav-item text-dark"><a href="#" class="nav-link text-dark">DSP</a></li>
             @else
             <li class="nav-item text-dark"><a href="{{route('dsp.marine')}}" class="nav-link text-dark">DSP</a></li>
         @endif
         
         <li class="nav-item text-dark"><a href="{{route('vdr.marine')}}" class="nav-link text-dark">VDR</a></li>
         <li class="nav-item text-dark"><a href="{{route('proact')}}" class="nav-link text-dark">PROACT</a></li>
         <li class="nav-item text-dark"><a href="{{route('map')}}" class="nav-link text-dark">MAP</a></li>
         <li class="nav-item text-dark"><a href="{{route('fms')}}" class="nav-link text-dark">FMS</a></li>
         <li class="nav-item text-dark"><a href="{{route('hse')}}" class="nav-link text-dark">HSE</a></li>
      </ul>
   </div>
   
   <ul class="navbar-nav navbar-right ml-auto">
      
      @if (auth()->user()->username == 'pet')
      @else
      <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg {{count($notifrequests) > 0  ? 'beep' : ''}} {{count($notifvdrs) > 0  ? 'beep' : ''}}"><i class="far fa-bell text-primary"></i></a>
         <div class="dropdown-menu shadow dropdown-list dropdown-menu-right">
            <div class="dropdown-header">NOTIFICATIONS
            
            </div>
            <div class="dropdown-list-content dropdown-list-icons">
               @if (count($notifrequests) > 0)
                  @foreach ($notifrequests as $req)
                     <a href="#" class="dropdown-item dropdown-item-unread">
                        {{-- <a href="{{route('schedule.detail', enkripRambo($req->schedule->id))}}" class="dropdown-item dropdown-item-unread"> --}}
                        
                        <div class="dropdown-item-desc">
                           {{$req->description }}
                           
                           on {{formatDate($req->date)}} from {{$req->user->name}}
                           <div class="time text-primary">{{$req->created_at->diffForHumans()}}</div>
                        </div>
                     </a>
                  @endforeach
                  @else
                  {{-- <a href="#" class="dropdown-item dropdown-item-unread text-center">Tidak ada Request dari User Field</a> --}}
                  <small class="dropdown-item dropdown-item-unread text-muted">Tidak ada Request dari User Field </small>
               @endif
               @if (count($notifvdrs) > 0)
                  @foreach ($notifvdrs as $vdr)
                     <a href="{{route('vdr.show', [enkripRambo($vdr->id), enkripRambo('index')])}}" class="dropdown-item dropdown-item-unread">
                        {{-- <div class="dropdown-item-icon bg-danger text-white">
                           <i class="fas fa-exclamation"></i>
                        </div> --}}
                        <div class="dropdown-item-desc">
                           Validate VDR {{$vdr->vessel->name }} {{formatDate($vdr->date)}} 
                           <div class="time text-primary">{{$vdr->created_at->diffForHumans()}}</div>
                        </div>
                     </a>
                  @endforeach
                  @else
                  <small class="dropdown-item dropdown-item-unread text-muted">Tidak ada VDR dari vessel </small>
                  
                  
               @endif
               {{-- <span class="dropdown-item dropdown-item-unread">
                  
                  <div class="dropdown-item-desc text-muted">
                     Tidak ada Request dari User Field
                  </div>
               </span> --}}
              
            </div>
            <div class="dropdown-footer text-center">
            <a href="{{route('marine.request.list')}}">View Intermilan <i class="fas fa-chevron-right"></i></a>
            {{-- <a href="#">View Crew Change <i class="fas fa-chevron-right"></i></a> --}}
            </div>
         </div>
      </li>
      @endif
      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
         <img alt="image" src="{{asset('stisla/img/avatar/avatar-1.png')}}" class="rounded-circle mr-1">
         <div class="d-sm-none d-lg-inline-block text-dark">{{auth()->user()->name}}</div></a>
         <div class="dropdown-menu dropdown-menu-right shadow">
            <div class="dropdown-title">Logged in 5 min ago</div>
            <a href="{{route('user')}}" class="dropdown-item has-icon">
               <i class="fa fa-users"></i> User Management
            </a>
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

<nav class="navbar navbar-dark  navbar-secondary navbar-expand-lg " style="background-color: #252e47" >
   <div class="">
      <ul class="navbar-nav">
         
         <li class="nav-item pl-2 {{ (request()->is('/')) ? 'active' : '' }}">
            <a href="/" class="nav-link {{ (request()->is('/')) ? 'text-dark' : 'text-white' }}">
               @if (request()->is('/'))
               <i class="fas fa-fire"></i>
               @endif
               
               <span class="">Home Page</span>
            </a>
         </li>
        
         @if (auth()->user()->username == 'pet')
         <li class="nav-item {{ (request()->is('news/*')) ? 'active' : '' }}">
            <div class="nav-link text-white">
               
               <span class="mr-3">Pertamina Energy Terminal</span>
            </div>
         </li>
         @else
         <li class="nav-item {{ (request()->is('news/*')) ? 'active' : '' }}">
            <a href="{{route('news.edit')}}" class="nav-link {{ (request()->is('news/*')) ? 'text-dark' : 'text-white' }}">
               @if (request()->is('news/*'))
               <i class="fas fa-fire "></i>
               @endif
               <span class="mr-3">News Feed</span>
            </a>
         </li>
         <li class="nav-item pr-3 {{ (request()->is('images/m/*')) ? 'active' : '' }}">
            <a href="{{route('images')}}" class="nav-link {{ (request()->is('images/m/*')) ? 'text-dark' : 'text-white' }}">
               @if (request()->is('images/m/*'))
               <i class="fas fa-fire "></i>
               @endif
               <span class="mr-3">Images Feed</span>
            </a>
         </li>
         <li class="nav-item pr-3 {{ (request()->is('marine/daily/*')) ? 'active' : '' }}">
            <a href="#" data-toggle="tooltip" data-placement="top" title="Fitur ini masih dalam tahap pengembangan" class="nav-link {{ (request()->is('marine/daily/*')) ? 'text-dark' : 'text-white' }}">
               @if (request()->is('marine/daily/*'))
               <i class="fas fa-fire "></i>
               @endif
               <span class="mr-3">Daily Activity</span>
            </a>
         </li>
         @endif
        
      </ul>
   </div>
</nav>