<div class="main-sidebar sidebar-style-2 ">
   <aside id="sidebar-wrapper">
   <div class="sidebar-brand">
      <a href="{{route('dsp.user')}}" class="fw-bold">DIGITAL SMART PORT </a>
   
   </div>
   <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{route('dsp.user')}}">DSP</a>
   </div>
   <hr>
   <ul class="sidebar-menu">
      {{-- <li class="menu-header">Dashboard</li> --}}
      
      <li class="menu-header">Menu</li>
      <li class="dropdown">
         <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Request Activity</span></a>
         <ul class="dropdown-menu">
         <li><a class="nav-link" href="{{route('request.create')}}">Create</a></li> 
         <li><a class="nav-link" href="{{route('request.draft')}}">Draft</a></li>    
         <li><a class="nav-link" href="{{route('request.progress')}}">Progress</a></li> 
         <li><a class="nav-link" href="{{route('request.history')}}">History</a></li> 
         </ul>
      </li>

      @if (auth()->user()->isPlatform() == true)
      <li class="dropdown">
         <a href="#" class="nav-link has-dropdown"><i class="fas fa-infinity"></i> <span>Surveillance Activity</span></a>
         <ul class="dropdown-menu">
         <li><a class="nav-link" href="{{route('surveillance.create')}}">Today</a></li> 
         <li><a class="nav-link" href="{{route('surveillance.history.user')}}">History</a></li> 
         </ul>
      </li>
      @endif
      
      
      
   </ul>

         
   </aside>
</div>