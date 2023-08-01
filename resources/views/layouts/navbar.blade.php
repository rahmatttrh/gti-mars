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
                        <a class="dropdown-item" href="{{route('platform')}}" >
                           Platform
                        </a>
                        <a class="dropdown-item" href="{{route('party')}}">
                           Party
                        </a>
                        {{-- <a class="dropdown-item" href="{{route('logistic')}}" >
                           Logistic
                        </a> --}}
                        <a class="dropdown-item" href="{{route('vessel')}}" >
                           Vessel
                        </a>
                        {{-- <a class="dropdown-item" href="{{route('port')}}" >
                           Port
                        </a> --}}
                        <a class="dropdown-item" href="{{route('carrier')}}" >
                           Carrier
                        </a>
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
                  {{-- <li class="nav-item {{request()->is('/platform') ? 'active' : ''}}">
                     <a class="nav-link" href="{{route('platform')}}" >
                     <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                        <!-- Download SVG icon from http://tabler-icons.io/i/users -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="9" cy="7" r="4" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /><path d="M21 21v-2a4 4 0 0 0 -3 -3.85" /></svg>
                     </span>
                     <span class="nav-link-title">
                        Platform
                     </span>
                     </a>
                  </li> --}}
                  @elseif(auth()->user()->hasRole('marine'))
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
                        <a class="dropdown-item" href="{{route('vessel')}}" >
                           Vessel
                        </a>
                        <a class="dropdown-item" href="{{route('port')}}" >
                           Port
                        </a>
                        
                        <a class="dropdown-item" href="{{route('activity')}}" >
                           Activity
                        </a>
                        <a class="dropdown-item" href="{{route('employee')}}" >
                           Employee
                        </a>
                     </div>
                  </li>
                  {{-- <li class="nav-item {{request()->is('/request') ? 'active' : ''}}">
                     <a class="nav-link" href="{{route('request')}}" >
                        <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                           <!-- Download SVG icon from http://tabler-icons.io/i/calendar-event -->
	                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><rect x="8" y="15" width="2" height="2" /></svg>
                        </span>
                        <span class="nav-link-title">
                           Request
                        </span>
                     </a>
                  </li> --}}
                  <li class="nav-item dropdown {{request()->is('request') ? 'active' : ''}}">
                     <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                        <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                           <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><rect x="8" y="15" width="2" height="2" /></svg>
                        </span>
                        <span class="nav-link-title">
                           Request
                        </span>
                     </a>
                     <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('request')}}" >
                           Inbox
                        </a>
                        <a class="dropdown-item" href="{{route('request.progress.marine')}}" >
                           Progress
                        </a>
                     </div>
                  </li>
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
                        <a class="dropdown-item" href="{{route('schedule.create')}}" >
                           Create
                        </a>
                        <a class="dropdown-item" href="{{route('schedule.plan', enkripRambo(auth()->user()->getMonth()))}}" >
                           Schedule Plan
                        </a>
                        <a class="dropdown-item" href="{{route('schedule.order', enkripRambo(auth()->user()->getMonth()))}}" >
                           Sailing Order
                        </a>
                        <a class="dropdown-item" href="{{route('schedule.history', enkripRambo(auth()->user()->getMonth()))}}" >
                           History
                        </a>
                     </div>
                  </li>
                     
                  @elseif(auth()->user()->hasRole('department'))
                  <li class="nav-item dropdown {{request()->is('vessel/index') ? 'active' : ''}} {{request()->is('port/index') ? 'active' : ''}}">
                     <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                        <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                           <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                        </span>
                        <span class="nav-link-title">
                           Request
                        </span>
                     </a>
                     <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('request.create')}}">
                           Create
                        </a>
                        <a class="dropdown-item" href="{{route('request.draft')}}" >
                           Draft
                        </a>
                        <a class="dropdown-item" href="{{route('request.progress')}}" >
                           Progress
                        </a>
                        <a class="dropdown-item" href="{{route('request.history')}}" >
                           History
                        </a>
                     </div>
                  </li>
                  @elseif(auth()->user()->hasRole('logistic'))
                     <li class="nav-item dropdown {{request()->is('vessel/index') ? 'active' : ''}} {{request()->is('port/index') ? 'active' : ''}}">
                        <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                           <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                           </span>
                           <span class="nav-link-title">
                              Request
                           </span>
                        </a>
                        <div class="dropdown-menu">
                           <a class="dropdown-item" href="{{route('request.create')}}">
                              Create
                           </a>
                           <a class="dropdown-item" href="{{route('request.draft')}}" >
                              Draft
                           </a>
                           <a class="dropdown-item" href="{{route('request.progress')}}" >
                              Progress
                           </a>
                           <a class="dropdown-item" href="" >
                              History
                           </a>
                        </div>
                     </li>
                  @elseif(auth()->user()->hasRole('vessel'))
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
                        <a class="dropdown-item" href="{{route('schedule.vessel')}}" >
                           My Schedule
                        </a>
                        <a class="dropdown-item" href="#" >
                           History
                        </a>
                     </div>
                  </li>
                  @elseif(auth()->user()->hasRole('drilling'))
                     <li class="nav-item dropdown {{request()->is('vessel/index') ? 'active' : ''}} {{request()->is('port/index') ? 'active' : ''}}">
                        <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                           <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                           </span>
                           <span class="nav-link-title">
                              Request
                           </span>
                        </a>
                        <div class="dropdown-menu">
                           <a class="dropdown-item" href="{{route('request.create')}}">
                              Create
                           </a>
                           <a class="dropdown-item" href="{{route('request.draft')}}" >
                              Draft
                           </a>
                           <a class="dropdown-item" href="{{route('request.progress')}}" >
                              Progress
                           </a>
                           <a class="dropdown-item" href="" >
                              History
                           </a>
                        </div>
                     </li>
                  @elseif(auth()->user()->hasRole('platform'))
                  {{-- <li class="nav-item {{request()->is('platform/party/' .  enkripRambo(auth()->user()->getPlatformId())) ? 'active' : ''}}">
                     <a class="nav-link" href="{{route('platform.party', enkripRambo(auth()->user()->getPlatformId()))}}" >
                        <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                           <!-- Download SVG icon from http://tabler-icons.io/i/users -->
	                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="9" cy="7" r="4" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /><path d="M21 21v-2a4 4 0 0 0 -3 -3.85" /></svg>
                        </span>
                        <span class="nav-link-title">
                           Party
                        </span>
                     </a>
                  </li> --}}
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
                        <a class="dropdown-item" href="{{route('platform.party', enkripRambo(auth()->user()->getPlatformId()))}}">
                           Party
                        </a>
                        <a class="dropdown-item" href="{{route('carrier')}}" >
                           Carrier
                        </a>
                     </div>
                  </li>
                  @elseif(auth()->user()->hasRole('supplier'))
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
                        <a class="dropdown-item" href="{{route('cargo.create')}}" >
                           Create
                        </a>
                        <a class="dropdown-item" href="#" >
                           Draft
                        </a>
                        <a class="dropdown-item" href="{{route('cargo.progress')}}" >
                           Progress
                        </a>
                     </div>
                  </li>
               @endif
   
               {{-- <li class="nav-item dropdown {{request()->is('schedule/index') ? 'active' : ''}}">
                  <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                     <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                     </span>
                     <span class="nav-link-title">
                        Schedule
                     </span>
                  </a>
                  <div class="dropdown-menu">
                     <a class="dropdown-item" href="{{route('schedule.request')}}" >
                        Plan
                     </a>
                     <a class="dropdown-item" href="#" >
                        History
                     </a>
                  </div>
               </li> --}}
               
               {{-- @if(auth()->user()->hasRole('superuser'))
               <li class="nav-item {{request()->is('/user/index') ? 'active' : ''}}">
                  <a class="nav-link" href="{{route('user')}}" >
                     <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="9" cy="7" r="4" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /><path d="M21 21v-2a4 4 0 0 0 -3 -3.85" /></svg>
                     </span>
                     <span class="nav-link-title">
                        User Management
                     </span>
                  </a>
               </li>
               @endif --}}
            </ul>
         </div>
      </div>
   </div>
</div>