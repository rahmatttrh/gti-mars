<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>MARS - Home Page</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('stisla/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('stisla/modules/fontawesome/css/all.min.css')}}">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('stisla/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('stisla/css/components.css')}}">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body class="sidebar-mini">
  <div id="app">
    <div class="main-wrapper container">
      <div class="navbar-bg " style="background-color: #0b4e99"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        
        <a href="/" class="navbar-brand sidebar-gone-hide">
          <div class="bg-white py-1 px-3 rounded">
            <img src="{{asset('img/logo/phe-oses.png')}}" width="110" height="32" alt="DSP-PHE" class="navbar-brand-image">
          </div>
        </a>
        <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
        <div class="nav-collapse">
          <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
            <i class="fas fa-ellipsis-v"></i>
          </a>
          @if (auth()->user()->hasRole('marine') || auth()->user()->hasRole('admin-dsp') || auth()->user()->hasRole('superadmin-dsp') || auth()->user()->hasRole('admin-vdr') || auth()->user()->hasRole('superadmin-vdr'))
            <ul class="navbar-nav">
              <li class="nav-item "><a href="{{route('dsp.marine')}}" class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Digital Smart Port">DSP</a></li>
              <li class="nav-item"><a href="{{route('vdr.marine')}}" class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Vessel Daily Report">VDR</a></li>
              <li>
               <a href="{{route('proact')}}" class="nav-link nav-link-lg" data-toggle="tooltip" data-placement="bottom" title="Progress Tracking and Operation Control Tool">PROACT</a>
            </li>
            <li>
               <a href="{{route('map')}}" class="nav-link nav-link-lg" data-toggle="tooltip" data-placement="bottom" title="Marine Assurance Program">MAP</a>
            </li>
            </ul>
            @elseif (auth()->user()->hasRole('vessel'))
            <ul class="navbar-nav">
              <li class="nav-item "><a href="{{route('dsp.vessel')}}" class=" nav-link" data-toggle="tooltip" data-placement="bottom" title="Digital Smart Port">DSP</a></li>
              <li class="nav-item"><a href="{{route('vdr.vessel')}}" class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Vessel Daily Report">VDR</a></li>
              <li>
               <a href="{{route('proact')}}" class="nav-link nav-link-lg" data-toggle="tooltip" data-placement="bottom" title="Progress Tracking and Operation Control Tool">PROACT</a>
            </li>
            <li>
               <a href="{{route('map')}}" class="nav-link nav-link-lg" data-toggle="tooltip" data-placement="bottom" title="Marine Assurance Program">MAP</a>
            </li>
            </ul>
            @elseif (auth()->user()->hasRole('fm'))
            <ul class="navbar-nav">
              <li class="nav-item "><a href="{{route('dsp.fm')}}" class=" nav-link" data-toggle="tooltip" data-placement="bottom" title="Digital Smart Port">DSP</a></li>
              <li class="nav-item"><a href="#" class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Vessel Daily Report">VDR</a></li>
              <li>
               <a href="{{route('proact')}}" class="nav-link nav-link-lg" data-toggle="tooltip" data-placement="bottom" title="Progress Tracking and Operation Control Tool">PROACT</a>
            </li>
            <li>
               <a href="{{route('map')}}" class="nav-link nav-link-lg" data-toggle="tooltip" data-placement="bottom" title="Marine Assurance Program">MAP</a>
            </li>
            </ul>
            @elseif (auth()->user()->hasRole('department'))
            <ul class="navbar-nav">
              <li class="nav-item "><a href="{{route('dsp.user')}}" class=" nav-link" data-toggle="tooltip" data-placement="bottom" title="Digital Smart Port">DSP</a></li>
              <li class="nav-item"><a href="#" class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Vessel Daily Report">VDR</a></li>
              <li>
               <a href="{{route('proact')}}" class="nav-link nav-link-lg" data-toggle="tooltip" data-placement="bottom" title="Progress Tracking and Operation Control Tool">PROACT</a>
            </li>
            <li>
               <a href="{{route('map')}}" class="nav-link nav-link-lg" data-toggle="tooltip" data-placement="bottom" title="Marine Assurance Program">MAP</a>
            </li>
            </ul>
          @endif
          
        </div>
        <form class="form-inline ml-auto">
          <ul class="navbar-nav">
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          
        </form>
        <ul class="navbar-nav navbar-right">
          
          
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{asset('stisla/img/avatar/avatar-1.png')}}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, {{auth()->user()->name}}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
               @if (auth()->user()->hasRole('marine'))
               <a href="{{route('user')}}" class="dropdown-item has-icon">
                  <i class="fa fa-users"></i> User Management
               </a>
               @endif
               
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                  
      
                {{ __('Logout') }}
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
              </a>
            </div>
          </li>
        </ul>
      </nav>

      

      <!-- Main Content -->
      <div class="main-content">
         <section class="section">
            <div class="section-body">
               @if (auth()->user()->hasRole('vessel'))
                  <x-main.vessel :nowschedule="$nowSchedule" :schedules="$schedules" :vdr="$vdr" :requests="$requests" :vessel="$currentVessel" :docs="$docs" />
                  @else
                  {{-- <div class="bg-white py-3 px-3 rounded">
               <img src="{{asset('img/logo/phe-oses.png')}}" width="130" height="32" alt="DSP-PHE" class="navbar-brand-image">
               </div> --}}
               {{-- <h2 class="section-title">This is Example Page</h2>
               <p class="section-lead">This page is just an example for you to create your own page.</p> --}}
                  <div class="card">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-md-7">
                              <div class="hero text-white hero-bg-image hero-bg-parallax" style="background-image: url('{{asset('img/bg/rig3.jpg')}}');">
                                 <div class="hero-inner">
                                 <h2>Welcome, {{auth()->user()->name}}!</h2>
                                 <p class="lead">This is home page of Pertamina OSES Integrated Technology App</p>
                                 {{-- <div class="row">
                                    <div class="col-md-4">
                                       
                                    </div>
                                 </div> --}}
                                 {{-- <br><br><br><br> --}}
                                 </div>
                              </div>
                           
                           </div>
                           <div class="col-md-5">
                                 <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                       <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                                       <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                                       <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
                                       <li data-target="#carouselExampleIndicators2" data-slide-to="3"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                       <div class="carousel-item active" style="max-height: 180px">
                                          <img class="d-block w-100 rounded"  src="{{asset('img/bg/port.jpg')}}" alt="First slide">
                                          <div class="carousel-caption d-none text-dark d-md-block rounded" style="background-color:rgba(255, 255, 255, 0.7);">
                                             <h5>DSP - PHE</h5>
                                             <p>Digital Smart Port PHE </p>
                                          </div>
                                       </div>
                                       <div class="carousel-item" style="max-height: 180px">
                                          <img class="d-block w-100 rounded" src="{{asset('img/bg/barge.jpg')}}" alt="Second slide">
                                          <div class="carousel-caption d-none text-dark d-md-block rounded" style="background-color:rgba(255, 255, 255, 0.7);">
                                             <h5>VDR</h5>
                                             <p>Vessel Daily Report</p>
                                          </div>
                                       </div>
                                       <div class="carousel-item" style="max-height: 180px">
                                          <img class="d-block w-100 rounded" src="{{asset('img/bg/rig.jpg')}}" alt="Third slide">
                                          <div class="carousel-caption d-none text-dark d-md-block rounded" style="background-color:rgba(255, 255, 255, 0.7);">
                                             <h5>PROACT</h5>
                                             <p>- Under Development -</p>
                                          </div>
                                       </div>
                                       <div class="carousel-item" style="max-height: 180px">
                                          <img class="d-block w-100 rounded" src="{{asset('img/bg/barge.jpg')}}" alt="Third slide">
                                          <div class="carousel-caption d-none text-dark d-md-block rounded" style="background-color:rgba(255, 255, 255, 0.7);">
                                             <h5>MAP</h5>
                                             <p>- Under Development -</p>
                                          </div>
                                       </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                                       <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                       <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                                       <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                       <span class="sr-only">Next</span>
                                    </a>
                                 </div>
                                 {{-- </div>
                              </div> --}}
                           </div>
                        </div>
                        {{-- <hr> --}}
                        <div class="row mt-3">
                           <div class="col">
                              <div class="card border">
                                 <div class="card-header">
                                    <marquee  class="px-4 bg-info  rounded text-white py-2 px-2 mb-2" >
                                       <i class="fa fa-bell"></i> Welcome to MARS App, This app contains several systems (Digital Smart Port, Vessel Daily Report, PROACT and Map)  
                                    </marquee>
                                 </div>
                                 <div class="card-body">
                                 <p>The purpose of the Marine Operation Information System is to assess and improve Marine assurance, technical and operational to the managing safe work procedures to assure marine work activities are completed without incident and poor reliability. These activities include Digital Smart Port, Vessel Daily Report, Preventive maintenance System, Contractor Safety Management System, Service performance Report, Leadership Engagement, Leadership Safeguard Verification, General Inspection. , Fuel Monitoring System. The Marine Operation Team conduct field engagements and written assessments to evaluate knowledge and conformance to safe work procedures. During the field engagement, the team uses a protocol specific to the safe work procedure being observed that is aligned with IMO and industry standards, regulations, and managing safe work procedures. Results of the assessments are shared immediately with the employee or contractor. If an assessment identifies significant opportunities for improvement, the Marine Operation Team will conduct a follow up observation with the employee of contractor to validate the coaching was effective. On a routine basis, the data from the assessments is gathered and analyzed to identify systemic gaps and remedial actions for improvement. </p>
                                 </div>
                                 <div class="card-footer bg-whitesmoke">
                                 Development
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  
               @endif
               
               
            </div>
            
         </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2023 <div class="bullet"></div> Ekanuri Development
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

  @if (auth()->user()->hasRole('vessel'))
   <x-modal.main.add :vessel="$currentVessel" />
   @foreach ($docs as $doc)
      <div class="modal modal-blur fade" id="modal-edit-doc-{{$doc->id}}" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog  modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Edit Alert</h5>
               </div>
               <form action="{{route('document.update')}}" method="POST">
                  @csrf
                  @method('PUT')
                  <input type="number" name="doc" id="doc" value="{{$doc->id}}" hidden>
                  <input type="number" name="vessel" id="vessel" value="{{$currentVessel->id}}" hidden>
                  <div class="modal-body">
                     <div class="form-row">
                        <div class="form-group col-md-8">
                           <label for="name">Document*</label>
                           <input class="form-control" {{old('name')}} id="name" value="{{$doc->name}}"  type="text" required name="name">
                        </div>
                        <div class="form-group col-md-4">
                           <label for="date">Date*</label>
                           <input class="form-control" {{old('date')}} id="date" value="{{$doc->date}}"  type="date" required name="date">
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-link link-secondary me-auto" data-dismiss="modal">Cancel</button>
                     {{-- <a href="" class="btn btn-primary" >Add</a> --}}
                     <button class="btn btn-primary" type="submit">Add</button>
                     {{-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Yes, delete all my data</button> --}}
                  </div>
               </form>
            </div>
         </div>
      </div>
   @endforeach
  @endif

  <!-- General JS Scripts -->
  <script src="{{asset('stisla/modules/jquery.min.js')}}"></script>
  <script src="{{asset('stisla/modules/popper.js')}}"></script>
  <script src="{{asset('stisla/modules/tooltip.js')}}"></script>
  <script src="{{asset('stisla/modules/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('stisla/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
  <script src="{{asset('stisla/modules/moment.min.js')}}"></script>
  <script src="{{asset('stisla/js/stisla.js')}}"></script>
  <script src="{{asset('stisla/js/page/bootstrap-modal.js')}}"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="{{asset('stisla/js/scripts.js')}}"></script>
  <script src="{{asset('stisla/js/custom.js')}}"></script>
</body>
</html>