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
{{-- style="background-color: #d5dcee" --}}
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
             <li class="nav-item active text-dark"><a href="/" class="nav-link bgb-1 rounded px-2 py-1" style="background-color: #1f4481">HOME</a></li>
             
             @if (auth()->user()->username == 'marine' || auth()->user()->username == 'lutfiaryanto' || auth()->user()->username == 'superadmin')
                
                <li class="nav-item text-dark"><a href="{{route('dsp.marine')}}" class="nav-link text-dark">DSP</a></li>
                <li class="nav-item text-dark"><a href="{{route('vdr.marine')}}" class="nav-link text-dark">VDR</a></li>
               <li class="nav-item text-dark"><a href="{{route('proact')}}" class="nav-link text-dark">PROACT</a></li>
               <li class="nav-item text-dark"><a href="{{route('map')}}" class="nav-link text-dark">MAP</a></li>
               <li class="nav-item text-dark"><a href="{{route('fms')}}" class="nav-link text-dark">FMS</a></li>
               <li class="nav-item text-dark"><a href="{{route('hse')}}" class="nav-link text-dark">HSE</a></li>
               @elseif(auth()->user()->username == 'pet')
               <li class="nav-item text-dark"><a href="#" class="nav-link text-dark">DSP</a></li>
                <li class="nav-item text-dark"><a href="{{route('vdr.marine')}}" class="nav-link text-dark">VDR</a></li>
               <li class="nav-item text-dark"><a href="{{route('proact')}}" class="nav-link text-dark">PROACT</a></li>
               <li class="nav-item text-dark"><a href="{{route('map')}}" class="nav-link text-dark">MAP</a></li>
               <li class="nav-item text-dark"><a href="{{route('fms')}}" class="nav-link text-dark">FMS</a></li>
               <li class="nav-item text-dark"><a href="{{route('hse')}}" class="nav-link text-dark">HSE</a></li>
               @else
               <li class="nav-item text-dark"><a href="#" class="nav-link text-dark">DSP</a></li>
                <li class="nav-item text-dark"><a href="#" class="nav-link text-dark">VDR</a></li>
               <li class="nav-item text-dark"><a href="{{route('proact')}}" class="nav-link text-dark">PROACT</a></li>
               <li class="nav-item text-dark"><a href="{{route('map')}}" class="nav-link text-dark">MAP</a></li>
               <li class="nav-item text-dark"><a href="{{route('fms')}}" class="nav-link text-dark">FMS</a></li>
               <li class="nav-item text-dark"><a href="{{route('hse')}}" class="nav-link text-dark">HSE</a></li>
             @endif
             {{-- @if (auth()->user()->username == 'pet')
                <li class="nav-item text-dark"><a href="#" class="nav-link text-dark">DSP</a></li>
                @else
                <li class="nav-item text-dark"><a href="{{route('dsp.marine')}}" class="nav-link text-dark">DSP</a></li>
             @endif
             
             <li class="nav-item text-dark"><a href="{{route('vdr.marine')}}" class="nav-link text-dark">VDR</a></li>
             <li class="nav-item text-dark"><a href="{{route('proact')}}" class="nav-link text-dark">PROACT</a></li>
             <li class="nav-item text-dark"><a href="{{route('map')}}" class="nav-link text-dark">MAP</a></li>
             <li class="nav-item text-dark"><a href="{{route('fms')}}" class="nav-link text-dark">FMS</a></li>
             <li class="nav-item text-dark"><a href="{{route('hse')}}" class="nav-link text-dark">HSE</a></li> --}}
          </ul>
       </div>
       {{-- <ul class="navbar-nav d-none d-sm-block">
          
       </ul> --}}
       <h4 class="d-block d-sm-none text-dark mt-2"><b><i>MARS</i></b></h4>
   </form>
   {{-- <a href="/" class="navbar-brand sidebar-gone-hide">
      <img src="{{asset('img/logo/phe-oses.png')}}" width="110" height="32" alt="DSP-PHE" class="navbar-brand-image mr-4"> 
   </a>
   <a href="#" class="nav-link sidebar-gone-show text-dark" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
   <div class="nav-collapse d-none d-sm-block">
      <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
         <i class="fas fa-ellipsis-v"></i>
      </a>
      <ul class="navbar-nav ">
         <li class="nav-item active text-dark"><a href="/" class="nav-link bgb-1 rounded px-2 py-1" style="background-color: #1f4481">HOME</a></li>
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
   </div> --}}
   
   <ul class="navbar-nav navbar-right ml-auto">
      
      @if (auth()->user()->username == 'marine' || auth()->user()->username == 'lutfiaryanto' || auth()->user()->username == 'superadmin')
      
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

      {{-- @if (auth()->user()->username == 'superadmin') --}}
      
      
      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
         <img alt="image" src="{{asset('stisla/img/avatar/avatar-1.png')}}" class="rounded-circle mr-1">
         <div class="d-sm-none d-lg-inline-block text-dark">{{auth()->user()->name}}</div></a>
         <div class="dropdown-menu dropdown-menu-right shadow">
            <div class="dropdown-title">Logged in 5 min ago</div>

            @if (auth()->user()->username == 'superadmin')
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
      {{-- @endif --}}
   </ul>
</nav>


<div class="d-none d-md-block">
<nav class="navbar navbar-dark  navbar-secondary navbar-expand-lg px-3" style="background-color: #252e47" >
   <div class="px-2">
      <ul class="navbar-nav">
         
         <li class="nav-item nav-item-b  {{ (request()->is('/')) ? 'active' : '' }}">
            <a href="/" class="nav-link {{ (request()->is('/')) ? 'text-dark' : 'text-white' }}">
               @if (request()->is('/'))
               <i class="fas text-primary ml-3 fa-fire"></i>
               @endif
               
               <span class="mx-3">Home Page</span>
            </a>
         </li>


         @if (auth()->user()->username == 'marine' || auth()->user()->username == 'lutfiaryanto' || auth()->user()->username == 'superadmin' || auth()->user()->username == 'admin')
         
         <li class="nav-item nav-item-b pr-3 {{ (request()->is('marine/daily/*')) ? 'active' : '' }}">
            <a href="{{route('daily.report')}}" data-toggle="tooltip" data-placement="top" title="Fitur ini masih dalam tahap pengembangan" class="nav-link {{ (request()->is('marine/daily/*')) ? 'text-dark' : 'text-white' }}">
               @if (request()->is('daily/report/*'))
               <i class="fas fa-fire "></i>
               @endif
               <span class="mx-3">Daily Report</span>
            </a>
         </li>
         <li class="nav-item nav-item-b pr-3 {{ (request()->is('marine/daily/*')) ? 'active' : '' }}">
            <a href="{{route('intermilan.marine')}}" data-toggle="tooltip" data-placement="top" title="Fitur ini masih dalam tahap pengembangan" class="nav-link {{ (request()->is('marine/daily/*')) ? 'text-dark' : 'text-white' }}">
               @if (request()->is('intermilan/*'))
               <i class="fas fa-fire "></i>
               @endif
               <span class="mx-3">Intermilan</span>
            </a>
         </li>
         <li class="nav-item nav-item-b  {{ (request()->is('vdr/report/*')) ? 'active' : '' }}">
            <a href="{{route('vdr.export.marine')}}" class="nav-link {{ (request()->is('vdr/report/*')) ? 'text-dark' : 'text-white' }}">
               @if (request()->is('vdr/report/*'))
               <i class="fas text-primary ml-3 fa-fire"></i>
               @endif
               
               <span class="mx-3">VDR Export</span>
            </a>
         </li>

         <li class="nav-item d-block d-sm-none nav-item-b dropdown {{ (request()->is('master/data/*')) ? 'active' : '' }}">
            <a href="#" data-toggle="dropdown"  class="nav-link has-dropdown {{ (request()->is('master/data/*')) ? 'text-dark' : 'text-white' }} ">
               @if (request()->is('master/data/*'))
               <i class="text-primary fas fa-fire ml-3"></i>
               @endif
               
               <span class="mx-3" >Master Data </span>
            </a>
            
            <ul class="dropdown-menu">
            {{-- <li class="nav-item "><a href="{{route('port')}}" class="nav-link">Port</a></li> --}}
            <li class="nav-item "><a href="{{route('vessel')}}" class="nav-link">Vessel</a></li>
            <li class="nav-item "><a href="{{route('user')}}" class="nav-link">User</a></li>
            </ul>
         </li>
         @endif

         
        
         @if (auth()->user()->username == 'pet')
         {{-- <li class="nav-item {{ (request()->is('news/*')) ? 'active' : '' }}" style="text-decoration: none !important; ">
            <div class="nav-link text-white" >
               
               <span class="mr-3">Welcome back, Fuel Monitoring Team</span>
            </div>
         </li> --}}
         @else
         {{-- <li class="nav-item  {{ (request()->is('news/*')) ? 'active' : '' }}">
            <a  href="{{route('news.edit')}}" class="nav-link pl-3  {{ (request()->is('news/*')) ? 'text-dark' : 'text-white' }}">
               @if (request()->is('news/*'))
               <i class="fas fa-fire "></i>
               @endif
               <span class="mx-3">News Feed</span>
            </a>
         </li>
         <li class="nav-item px-2 {{ (request()->is('images/m/*')) ? 'active' : '' }}">
            <a href="{{route('images')}}" class="nav-link {{ (request()->is('images/m/*')) ? 'text-dark' : 'text-white' }}">
               @if (request()->is('images/m/*'))
               <i class="fas fa-fire "></i>
               @endif
               <span class="mx-3">Images Feed</span>
            </a>
         </li> --}}
         {{-- <li class="nav-item nav-item-b pr-3 {{ (request()->is('marine/daily/*')) ? 'active' : '' }}">
            <a href="#" data-toggle="tooltip" data-placement="top" title="Fitur ini masih dalam tahap pengembangan" class="nav-link {{ (request()->is('marine/daily/*')) ? 'text-dark' : 'text-white' }}">
               @if (request()->is('marine/daily/*'))
               <i class="fas fa-fire "></i>
               @endif
               <span class="mx-3">Daily Activity</span>
            </a>
         </li> --}}
         @if (auth()->user()->username == 'superadmin' || auth()->user()->username == 'admin')
         <li class="nav-item nav-item-b dropdown {{ (request()->is('master/data/*')) ? 'active' : '' }}">
            <a href="#" data-toggle="dropdown"  class="nav-link has-dropdown {{ (request()->is('master/data/*')) ? 'text-dark' : 'text-white' }} ">
               @if (request()->is('master/data/*'))
               <i class="text-primary fas fa-fire ml-3"></i>
               @endif
               
               <span class="mx-3" >Master Data </span>
            </a>
            
            <ul class="dropdown-menu">
            {{-- <li class="nav-item "><a href="{{route('port')}}" class="nav-link">Port</a></li> --}}
            <li class="nav-item "><a href="{{route('vessel')}}" class="nav-link">Vessel</a></li>
            <li class="nav-item "><a href="{{route('user')}}" class="nav-link">User</a></li>
            </ul>
         </li>
         @endif
         @endif
        
      </ul>
   </div>
</nav>
</div>



<div class="d-block d-sm-none">
   <nav class="navbar navbar-dark sidebar  navbar-secondary navbar-expand-lg "  >
      <div class="px-2">
         <ul class="navbar-nav">
            @if (auth()->user()->username == 'marine' )
            <li class="nav-item nav-item-b  ">
               <a href="/" class="nav-link">
                 
                  <i class="fas text-primary ml-3 fa-fire"></i>
               
                  
                  <span class="mx-3">Home Page</span>
               </a>
            </li>
            <hr>
            <small class="ml-2"><b>- VDR</b></small>
            {{-- <li class="nav-item nav-item-b ">
               <a href="{{route('vdr.marine')}}" class="nav-link ">
                  <span class="mx-3">Dashboard</span>
               </a>
            </li> --}}
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
            @else
            @endif
            

           

            
         
            
         
         </ul>
      </div>
   </nav>
</div>

{{-- <div class="d-block d-sm-none">
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
</div> --}}