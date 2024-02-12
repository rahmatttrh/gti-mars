<div class="main-sidebar sidebar-style-2 ">
   <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
      <a href="{{route('dsp.marine')}}" class="fw-bold">DIGITAL SMART PORT </a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{route('dsp.marine')}}">DSP</a>
      </div>
      <hr>
      <ul class="sidebar-menu">
         <li class="menu-header">Dashboard</li>
         <li class="dropdown">
         <a href="#" class="nav-link has-dropdown"><i class="fas fa-database"></i> <span>Master Data</span></a>
         <ul class="dropdown-menu">
            {{-- <li><a class="nav-link" href="{{route('activity')}}">Activity</a></li>
            <li><a class="nav-link" href="{{route('crew')}}">Crew</a></li> --}}
            <li><a class="nav-link" href="{{route('port')}}">Port</a></li>
            {{-- <li><a class="nav-link" href="{{route('user')}}">User</a></li> --}}
            <li><a class="nav-link" href="{{route('vessel')}}">Vessel</a></li>
         </ul>
         </li>
         <li class="menu-header">Menu</li>
         <li class="dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-info"></i> <span>Request Activity</span></a>
            <ul class="dropdown-menu">
               <li><a class="nav-link" href="{{route('request.inbox.marine')}}">Inbox</a></li>                
               <li><a class="nav-link" href="{{route('request.progress.marine')}}">Progress</a></li>  
               <li><a class="nav-link" href="{{route('request.history.marine')}}">History</a></li>     
            </ul>
         </li>
         <li class="dropdown">
         <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Sailing Order</span></a>
         <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{route('schedule.inbox')}}">Inbox</a></li>
            <li><a class="nav-link" href="{{route('schedule.plan', enkripRambo(auth()->user()->getMonth()))}}">Plan</a></li>
            <li><a class="nav-link" href="{{route('schedule.order', enkripRambo(auth()->user()->getMonth()))}}">Progress</a></li>
            <li><a class="nav-link" href="{{route('schedule.history')}}">History</a></li>
         </ul>
         </li>
         <li><a class="nav-link" href="{{route('surveillance.marine')}}"><i class="fas fa-table"></i> <span> Surveillance Activity</span></a></li>
         <li><a class="nav-link" href="{{route('log.dsp')}}"><i class="fas fa-book"></i> <span> Log System Activity</span></a></li>
         
      </ul>

   </aside>
</div>