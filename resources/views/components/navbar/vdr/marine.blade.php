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
<nav class="navbar navbar-expand-lg main-navbar text-dark fixed-top"  >
   <form class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
        <li>
          <a href="#" data-toggle="sidebar" class="d-block d-sm-none nav-link nav-link-lg text-dark"
            ><i class="fas fa-bars"></i
          ></a>
          
        </li>
        <li>
          <a href="https://app.mars-phe.com" class="navbar-brand sidebar-gone-hide">
             <img src="{{asset('img/logo/phe-oses.png')}}" width="110" height="32" alt="DSP-PHE" class="navbar-brand-image mr-4"> 
          </a>
        </li>
 
        
      </ul>
       <div class="nav-collapse d-none d-sm-block">
          <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
             <i class="fas fa-ellipsis-v"></i>
          </a>
          <ul class="navbar-nav ">
             <li class="nav-item  text-dark"><a href="https://app.mars-phe.com" class="nav-link text-dark" >HOME</a></li>
             @if (auth()->user()->username == 'pet')
                <li class="nav-item text-dark"><a href="#" class="nav-link text-dark">DSP</a></li>
                @else
                <li class="nav-item text-dark"><a href="{{route('dsp.marine')}}" class="nav-link text-dark">DSP</a></li>
             @endif
             
             <li class="nav-item active text-dark"><a href="{{route('vdr.marine')}}" class="nav-link rounded px-2 py-1 text-white" style="background-color: #1f4481">VDR</a></li>
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
   
   <ul class="navbar-nav navbar-right ml-auto">
      <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg {{count($notifvdrs) > 0  ? 'beep' : ''}}"><i class="far fa-bell text-primary"></i></a>
         <div class="dropdown-menu shadow dropdown-list dropdown-menu-right">
            <div class="dropdown-header">NOTIFICATIONS
            
            </div>
            <div class="dropdown-list-content dropdown-list-icons">
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
            {{-- <a href="{{route('marine.request')}}">View Intermilan <i class="fas fa-chevron-right"></i></a> --}}
            {{-- <a href="#">View Crew Change <i class="fas fa-chevron-right"></i></a> --}}
            </div>
         </div>
      </li>
      
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


<div class="d-none d-md-block">
<nav class="navbar navbar-dark  navbar-secondary navbar-expand-lg " style="background-color: #252e47" >
   <div class="px-2">
      <ul class="navbar-nav">
         
         <li class="nav-item nav-item-b {{ (request()->is('vdr/m/dashboard/*')) ? 'active' : '' }} {{ (request()->is('vdr/m/act/filter')) ? 'active' : '' }}">
            <a href="{{route('vdr.marine')}}" class="nav-link {{ (request()->is('vdr/m/dashboard/*')) ? 'text-dark' : 'text-white' }} {{ (request()->is('vdr/m/act/filter')) ? 'text-dark' : 'text-white' }}">
               @if (request()->is('vdr/m/dashboard/*'))
               <i class="fas fa-fire ml-3"></i>
               @endif
               @if (request()->is('vdr/m/act/filter'))
               <i class="fas fa-fire ml-3"></i>
               @endif
               
               <span class="mx-3">Dashboard</span>
            </a>
         </li>

         <li class="nav-item  nav-item-b {{ (request()->is('vdr/m/act/validation/*')) ? 'active' : '' }}">
            <a href="{{route('vdr.marine.validation')}}" class="nav-link {{ (request()->is('vdr/m/act/validation/*')) ? 'text-dark' : 'text-white' }}">
               @if (request()->is('vdr/m/act/validation/*'))
               <i class="fas fa-fire ml-3"></i>
               @endif
               
               <span class="mx-3">Validation</span>
            </a>
         </li>

         <li class="nav-item nav-item-b {{ (request()->is('vdr/m/act/reject/*')) ? 'active' : '' }}">
            <a href="{{route('vdr.reject.list')}}" class="nav-link {{ (request()->is('vdr/m/act/reject/*')) ? 'text-dark' : 'text-white' }}">
               @if (request()->is('vdr/m/act/reject/*'))
               <i class="fas fa-fire ml-3"></i>
               @endif
               
               <span class="mx-3">Reject</span>
            </a>
         </li>

         <li class="nav-item nav-item-b {{ (request()->is('vdr/m/act/history/*')) ? 'active' : '' }}">
            <a href="{{route('vdr.history.list')}}" class="nav-link {{ (request()->is('vdr/m/act/history/*')) ? 'text-dark' : 'text-white' }}">
               @if (request()->is('vdr/m/act/history/*'))
               <i class="fas fa-fire"></i>
               @endif
               
               <span class="mx-3">History</span>
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

         {{-- <li class="nav-item dropdown {{ (request()->is('vdr/m/act/*')) ? 'active' : '' }}">
            <a href="#" data-toggle="dropdown" class="nav-link has-dropdown {{ (request()->is('vdr/m/act/*')) ? 'text-dark' : 'text-white' }} ">
               @if (request()->is('vdr/m/act/*'))
               <i class="fas fa-fire ml-3"></i>
               @endif
               
               <span >Daily Report </span>
            </a>
            
            <ul class="dropdown-menu">
            <li class="nav-item"><a href="{{route('vdr.marine.validation')}}" class="nav-link">Validation VDR</a></li>
            <li class="nav-item"><a href="{{route('vdr.marine.table')}}" class="nav-link">History VDR</a></li>
            </ul>
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