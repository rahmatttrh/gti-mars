<div class="main-sidebar sidebar-style-2 ">
   <aside id="sidebar-wrapper">
   <div class="sidebar-brand">
      <a href="{{route('vdr.vessel')}}" class="fw-bold">VESSEL DAILY REPORT</a>
   
   </div>
   <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{route('vdr.vessel')}}">VDR</a>
   </div>
   <hr>
   <ul class="sidebar-menu">
      {{-- <li class="menu-header">Dashboard</li> --}}
      
      <li class="menu-header">Menu</li>
      {{-- <li><a class="nav-link" href="{{route('vdr.create')}}"><i class="fas fa-pencil-ruler"></i> <span>Create VDR</span></a></li> --}}

      <li class="dropdown">
         <a href="#" class="nav-link has-dropdown"><i class="fas fa-pencil-ruler"></i> <span>Vessel Daily Report</span></a>
         <ul class="dropdown-menu">
         <li><a class="nav-link" href="{{route('vdr.vessel.create')}}">Create</a></li> 
         <li><a class="nav-link" href="{{route('vdr.history')}}">History</a></li>   
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