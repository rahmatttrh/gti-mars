<div class="navbar-expand-md">
   <div class="collapse navbar-collapse" id="navbar-menu">
      <div class="navbar navbar-light">
         <div class="container-xl">
         <ul class="navbar-nav">
            <li class="nav-item {{request()->is('/') ? 'active' : ''}}">
               <a class="nav-link" href="/" >
               <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
               </span>
               <span class="nav-link-title">
                  Dashboard
               </span>
               </a>
            </li>
            @if (auth()->user()->hasRole('superuser'))
            <li class="nav-item dropdown {{request()->is('vessel/index') ? 'active' : ''}} {{request()->is('port/index') ? 'active' : ''}}">
               <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                  </span>
                  <span class="nav-link-title">
                     Master Data
                  </span>
               </a>
               <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{route('logistic')}}" >
                     Logistic
                  </a>
                  <a class="dropdown-item" href="{{route('vessel')}}" >
                     Vessel
                  </a>
                  <a class="dropdown-item" href="{{route('port')}}" >
                     Port
                  </a>
                  <a class="dropdown-item" href="{{route('user')}}" >
                     User
                  </a>
                  <div class="dropend">
                     <a class="dropdown-item dropdown-toggle" href="#sidebar-error" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                       Error pages
                     </a>
                     <div class="dropdown-menu">
                       <a href="./error-404.html" class="dropdown-item">404 page</a>
                       <a href="./error-500.html" class="dropdown-item">500 page</a>
                       <a href="./error-maintenance.html" class="dropdown-item">Maintenance page</a>
                     </div>
                   </div>
               </div>
            </li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                  </span>
                  <span class="nav-link-title">
                     Cargo
                  </span>
               </a>
               <div class="dropdown-menu">
                  <a class="dropdown-item" href="#" >
                     Cargo Plan
                  </a>
                  <a class="dropdown-item" href="#" >
                     Cargo Manifest
                  </a>
                  <a class="dropdown-item" href="#" >
                     Cargo Tracking
                  </a>
               </div>
            </li>
            @endif
            
            
            
            <li class="nav-item dropdown {{request()->is('schedule/index') ? 'active' : ''}}">
               <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                  </span>
                  <span class="nav-link-title">
                     Schedule
                  </span>
               </a>
               <div class="dropdown-menu">
                  {{-- <a class="dropdown-item" href="{{route('schedule.fixed')}}" >
                     Fixed
                  </a> --}}
                  @if (auth()->user()->hasRole('superuser'))
                     <a class="dropdown-item" href="{{route('schedule.request')}}" >
                        Plan
                     </a>
                     @elseif(auth()->user()->hasRole('marine'))
                     <a class="dropdown-item" href="{{route('schedule.request.marine')}}" >
                        Plan
                     </a>
                  @endif
                  
                  <a class="dropdown-item" href="#" >
                     History
                  </a>
               </div>
            </li>
            {{-- <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
               <span class="nav-link-icon d-md-none d-lg-inline-block">
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="4" width="6" height="5" rx="2" /><rect x="4" y="13" width="6" height="7" rx="2" /><rect x="14" y="4" width="6" height="7" rx="2" /><rect x="14" y="15" width="6" height="5" rx="2" /></svg>
               </span>
               <span class="nav-link-title">
                  Layout
               </span>
               </a>
               <div class="dropdown-menu">
               <div class="dropdown-menu-columns">
                  <div class="dropdown-menu-column">
                     <a class="dropdown-item" href="./layout-horizontal.html" >
                     Horizontal
                     </a>
                     <a class="dropdown-item" href="./layout-vertical.html" >
                     Vertical
                     </a>
                     <a class="dropdown-item" href="./layout-vertical-transparent.html" >
                     Vertical transparent
                     </a>
                     <a class="dropdown-item" href="./layout-vertical-right.html" >
                     Right vertical
                     </a>
                     <a class="dropdown-item" href="./layout-condensed.html" >
                     Condensed
                     </a>
                     <a class="dropdown-item" href="./layout-combo.html" >
                     Combined
                     </a>
                  </div>
                  <div class="dropdown-menu-column">
                     <a class="dropdown-item" href="./layout-navbar-dark.html" >
                     Navbar dark
                     </a>
                     <a class="dropdown-item" href="./layout-navbar-sticky.html" >
                     Navbar sticky
                     </a>
                     <a class="dropdown-item" href="./layout-navbar-overlap.html" >
                     Navbar overlap
                     </a>
                     <a class="dropdown-item" href="./layout-rtl.html" >
                     RTL mode
                     </a>
                     <a class="dropdown-item" href="./layout-fluid.html" >
                     Fluid
                     </a>
                     <a class="dropdown-item" href="./layout-fluid-vertical.html" >
                     Fluid vertical
                     </a>
                  </div>
               </div>
               </div>
            </li> --}}
{{--             
            <li class="nav-item {{request()->is('schedule/index') ? 'active' : ''}}">
               <a class="nav-link" href="{{route('schedule')}}" >
               <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/file-text -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><line x1="9" y1="9" x2="10" y2="9" /><line x1="9" y1="13" x2="15" y2="13" /><line x1="9" y1="17" x2="15" y2="17" /></svg>
               </span>
               <span class="nav-link-title">
                  Vessel Schedule
               </span>
               </a>
            </li> --}}
         </ul>
         <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
            <form action="." method="get">
               <div class="input-icon">
               <span class="input-icon-addon">
                  <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="10" cy="10" r="7" /><line x1="21" y1="21" x2="15" y2="15" /></svg>
               </span>
               <input type="text" class="form-control" placeholder="Search…" aria-label="Search in website">
               </div>
            </form>
         </div>
         </div>
      </div>
   </div>
</div>