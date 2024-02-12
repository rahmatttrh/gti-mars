<div class="main-sidebar sidebar-style-2 ">
   <aside id="sidebar-wrapper">
   <div class="sidebar-brand">
      <a href="{{route('dsp.vessel')}}" class="fw-bold">DIGITAL SMART PORT </a>
   
   </div>
   <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{route('dsp.vessel')}}">DSP</a>
   </div>
   <hr>
   <ul class="sidebar-menu">
      {{-- <li class="menu-header">Dashboard</li> --}}
      
      <li class="menu-header">Menu</li>
      {{-- <li><a class="nav-link" href="{{route('vdr.create')}}"><i class="fas fa-pencil-ruler"></i> <span>Create VDR</span></a></li> --}}

      <li class="dropdown">
         <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Request Activity</span></a>
         <ul class="dropdown-menu">
         <li><a class="nav-link" href="{{route('request.vessel.create')}}">Create</a></li> 
         <li><a class="nav-link" href="{{route('request.vessel.index')}}">All</a></li>   
         </ul>
      </li>

      <li class="dropdown">
         <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Schedules</span></a>
         <ul class="dropdown-menu">
         <li><a class="nav-link" href="{{route('schedule.progress.vessel')}}">Progress</a></li> 
         <li><a class="nav-link" href="{{route('schedule.history.vessel')}}">History</a></li>   
         </ul>
      </li>

      <li class="dropdown">
         <a href="#" class="nav-link has-dropdown"><i class="fas fa-pencil-ruler"></i> <span>Surveillance</span></a>
         <ul class="dropdown-menu">
         <li><a class="nav-link" href="{{route('surveillance.today')}}">Today</a></li> 
         <li><a class="nav-link" href="{{route('surveillance.history.vessel')}}">History</a></li>   
         </ul>
      </li>
      
      
   </ul>

   {{-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
      <a href="https://getstisla.com/docs" class="btn btn-success btn-lg btn-block btn-icon-split">
         <i class="fas fa-rocket"></i> Documentation
      </a>
   </div>         --}}
   </aside>
</div>