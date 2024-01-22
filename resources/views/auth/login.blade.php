
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>MARS - Login</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{asset('/img/anchor.png')}}" type="image/x-icon"/>

	<script src="{{asset('js/plugin/webfont/webfont.min.js')}}"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Open+Sans:300,400,600,700"]
			},
			custom: {
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
				urls: ['{{asset('
					css / fonts.css ')}}'
				]
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/atlantis.min.css')}}">

</head>

<body class="login">
	
	
	<div class="container">
      <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
         <div class="card o-hidden border shadow-lg my-5">
            <div class="card-body p-0">
               <div class="row">
                  <div class="col-lg-6 d-none d-lg-block " style="background-image: url({{asset('img/bg/barge-com.jpeg')}});background-repeat: no-repeat;background-size: cover;border-radius: 5px;">
                     <img width="120px" class="mt-3" src="{{asset('img/logo/phe-oses.png')}}" alt="">
                  </div>
                  <div class="col-lg-6">
                     <div class="p-5">
                        <div class="text-center">
                           <h1 class="font-weight-bold"><i>MAR<span class="text-primary">S</span></i></h1>
                           <h5>Pertamina OSES Integrated Technology</h5>
                        </div>
                        <hr>
                        <form class="user" method="POST" action="{{ route('login') }}">
                           @csrf


                           
                           <div class="form-group form-group-default">
                              <label for="username" class="placeholder"><small>Username</small></label>
                              <input id="username" name="username" type="text" class="form-control @error('username') is-invalid @enderror" required>
                              @error('username')
                              <span class="invalid-feedback bg-danger p-2 rounded mb-2 text-light" role="alert">
                                 <strong>Fail! {{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                           <div class="form-group form-group-default">
                              <label for="password" class="placeholder"><small>Password</small></label>
                              <div class="position-relative">
                                 <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" required>
                                 <div class="show-password">
                                    <i class="far fa-eye-slash"></i>
                                 </div>
                              </div>
                              @error('email')
                              <span class="invalid-feedback bg-danger p-2 rounded mb-2 text-light" role="alert">
                                 <strong>Fail! {{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                           
                           <button type="submit" class="btn btn-primary btn-block">Login</button>
                        
                           <hr>
                        </form>
                        <div class="login-account">
                           <small class="msg text-muted">Copyright &copy; 2021 ENC IT Development</small>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
   </div>
	
	<script src="{{asset('js/core/jquery.3.2.1.min.js')}}"></script>
	<script src="{{asset('js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
	<script src="{{asset('js/core/popper.min.js')}}"></script>
	<script src="{{asset('js/core/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/ready.js')}}"></script>
</body>

</html>