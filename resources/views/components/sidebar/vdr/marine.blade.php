<div class="main-sidebar sidebar-style-2 ">
   <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
      <a href="{{route('dsp.marine')}}" class="fw-bold">VESSEL DAILY REPORT</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{route('dsp.marine')}}">VDR</a>
      </div>
      <hr>
      <ul class="sidebar-menu">
         
         <li class="menu-header">Menu</li>
         
         <li class="dropdown">
         <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Vessel Daily Report</span></a>
         <ul class="dropdown-menu">
            {{-- <li><a class="nav-link" href="{{route('vdr.marine')}}">Chart</a></li> --}}
            <li><a class="nav-link" href="{{route('vdr.marine.validation')}}">Validation</a></li>
            <li><a class="nav-link" href="{{route('vdr.marine.table')}}">History</a></li>
            
         </ul>
         </li>
         <li><a class="nav-link" href="{{route('log.vdr')}}"><i class="fas fa-book"></i> <span> Log System Activity</span></a></li>
         
         
      </ul>

   </aside>
</div>