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
<nav class="navbar navbar-expand-lg main-navbar  text-dark">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li>
                <a href="#" data-toggle="sidebar" class="d-block d-sm-none nav-link nav-link-lg text-dark"><i
                        class="fas fa-bars"></i></a>

            </li>
            <li>
                <a href="https://app.mars-phe.com" class="navbar-brand sidebar-gone-hide">
                    <img src="{{ asset('img/flaticon/mars-logo.png') }}" width="110" height="" alt="DSP-PHE"
                        class="navbar-brand-image mr-4">
                </a>
            </li>


        </ul>
        <div class="nav-collapse d-none d-sm-block">
            <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
                <i class="fas fa-ellipsis-v"></i>
            </a>
            <ul class="navbar-nav ">
                <li class="nav-item text-dark"><a href="/" class="nav-link bgb-1 rounded px-2 py-1"
                        style="background-color: #1f4481">HOME</a></li>
                <li class="nav-item text-dark"><a href="{{ route('dsp.vessel') }}" class="nav-link text-dark">DSP</a>
                </li>
                <li class="nav-item text-dark"><a href="{{ route('vdr.create') }}" class="nav-link text-dark">VDR</a>
                </li>
                <li class="nav-item text-dark"><a href="#" class="nav-link text-dark">PROACT</a></li>
                <li class="nav-item text-dark"><a href="#" class="nav-link text-dark">MAP</a></li>
                <li class="nav-item text-dark"><a href="#" class="nav-link text-dark">FMS</a></li>
                <li class="nav-item text-dark"><a href="#" class="nav-link text-dark">HSE</a></li>
            </ul>
        </div>
        {{-- <ul class="navbar-nav d-none d-sm-block">
          
       </ul> --}}
        <h4 class="d-block d-sm-none text-dark mt-2"><b><i>MARS</i></b></h4>
    </form>

    {{-- <a href="/" class="navbar-brand sidebar-gone-hide">
      <img src="{{asset('img/logo/phe-oses.png')}}" width="110" height="32" alt="DSP-PHE" class="navbar-brand-image mr-4"> 
   </a>
   <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
   <div class="nav-collapse">
      <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
         <i class="fas fa-ellipsis-v"></i>
      </a>
      <ul class="navbar-nav ">
         <li class="nav-item text-dark"><a href="/" class="nav-link bgb-1 rounded px-2 py-1" style="background-color: #1f4481">HOME</a></li>
         <li class="nav-item text-dark"><a href="{{route('dsp.vessel')}}" class="nav-link text-dark">DSP</a></li>
         <li class="nav-item text-dark"><a href="{{route('vdr.create')}}" class="nav-link text-dark">VDR</a></li>
         <li class="nav-item text-dark"><a href="/" class="nav-link text-dark">PROACT</a></li>
         <li class="nav-item text-dark"><a href="/" class="nav-link text-dark">MAP</a></li>
         <li class="nav-item text-dark"><a href="/" class="nav-link text-dark">FMS</a></li>
         <li class="nav-item text-dark"><a href="/" class="nav-link text-dark">HSE</a></li>

        
      </ul>
   </div> --}}

    <ul class="navbar-nav navbar-right ml-auto">


        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset('stisla/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block text-dark">{{ auth()->user()->name }}</div>
            </a>
            <div class="dropdown-menu shadow dropdown-menu-right">
                {{-- <div class="dropdown-title">Logged in 5 min ago</div>
         <a href="features-profile.html" class="dropdown-item has-icon">
           <i class="far fa-user"></i> Profile
         </a>
         <a href="features-activities.html" class="dropdown-item has-icon">
           <i class="fas fa-bolt"></i> Activities
         </a> --}}
                {{-- <a href="{{route('user.setting')}}" class="dropdown-item has-icon">
           <i class="fas fa-cog"></i> Settings
         </a>  --}}
                @if (auth()->user()->hasRole('Administrator'))
                @else
                    <a class="dropdown-item" href="{{ route('pass.reset') }}">
                        Change Password
                    </a>
                @endif
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
    <nav class="navbar navbar-dark  navbar-secondary navbar-expand-lg " style="background-color: #252e47">
        <div class="px-2">
            <ul class="navbar-nav">

                <li class="nav-item nav-item-b {{ request()->is('/') ? 'active' : '' }}">
                    <a href="/"
                        class="nav-link {{ request()->is('/') ? 'text-dark' : 'text-white' }}">
                        @if (request()->is('/'))
                            <i class="fas fa-fire ml-3"></i>
                        @endif

                        <span class="mx-3">Home Page</span>
                    </a>
                </li>

                <li class="nav-item nav-item-b pr-3 {{ request()->is('vdr/report/*') ? 'active' : '' }}">
                    <a href="{{ route('vdr.export') }}"
                        class="nav-link {{ request()->is('vdr/report/*') ? 'text-dark' : 'text-white' }}">
                        @if (request()->is('vdr/report/*'))
                            <i class="fas fa-fire ml-3"></i>
                        @endif

                        <span class=" mx-3">Export VDR</span>
                    </a>
                </li>

                {{-- <li class="nav-item nav-item-b pr-3 {{ (request()->is('master/data/vessel/crew')) ? 'active' : '' }}">
            <a href="{{route('vessel.crew')}}" class="nav-link {{ (request()->is('master/data/vessel/crew')) ? 'text-dark' : 'text-white' }}">
               @if (request()->is('master/data/vessel/crew'))
               <i class="fas fa-fire ml-3"></i>
               @endif
               
               <span class=" mx-3">Crew List</span>
            </a>
         </li> --}}
                {{-- <li class="nav-item pr-3 {{ (request()->is('v/newsfeed')) ? 'active' : '' }}">
            <a href="{{route('vessel.newsfeed')}}" class="nav-link {{ (request()->is('v/newsfeed')) ? 'text-dark' : 'text-white' }}">
               @if (request()->is('v/newsfeed'))
               <i class="fas fa-fire ml-3"></i>
               @endif
               
               <span class=" mx-3">News Feed</span>
            </a>
         </li> --}}
                {{-- <li class="nav-item">
            <a href="#" class="nav-link text-white">
               <span class="">Marine Advanced Reporting System</span>
            </a>
         </li> --}}
            </ul>
        </div>
    </nav>
</div>


<div class="d-block d-sm-none">
    <nav class="navbar navbar-dark  navbar-secondary navbar-expand-lg ">
        <div class="px-2">
            <ul class="navbar-nav">

                <li class="nav-item nav-item-b  ">
                    <a href="/" class="nav-link">

                        <i class="fas text-primary ml-3 fa-fire"></i>


                        <span class="mx-3">Home Page</span>
                    </a>
                </li>

                <hr>
                <small class="ml-2"><b>- VDR</b></small>
                <li class="nav-item nav-item-b ">
                    <a href="{{ route('vdr.create') }}" class="nav-link ">
                        <span class="mx-3">Dashboard</span>
                    </a>
                </li>
                {{-- <li class="nav-item nav-item-b ">
               <a href="{{route('vdr.vessel.create')}}" class="nav-link ">
                  <span class="mx-3">Create</span>
               </a>
            </li> --}}
                <li class="nav-item nav-item-b ">
                    <a href="{{ route('vdr.vessel.create.spa') }}" class="nav-link ">
                        <span class="mx-3">Create by OnePageForm</span>
                    </a>
                </li>
                <li class="nav-item nav-item-b ">
                    <a href="{{ route('vdr.history') }}" class="nav-link ">
                        <span class="mx-3">History</span>
                    </a>
                </li>


                <hr>
                <small class="ml-2"><b>- DSP</b></small>
                <li class="nav-item nav-item-b ">
                    <a href="{{ route('dsp.vessel') }}" class="nav-link ">
                        <span class="mx-3">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item nav-item-b ">
                    <a href="{{ route('schedule.vessel.all') }}" class="nav-link ">
                        <span class="mx-3">Sailing Order</span>
                    </a>
                </li>
                <li class="nav-item nav-item-b ">
                    <a href="{{ route('request.vessel.create') }}" class="nav-link ">
                        <span class="mx-3">Request Activity</span>
                    </a>
                </li>


            </ul>
        </div>
    </nav>
</div>
