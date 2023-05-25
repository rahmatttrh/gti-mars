<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta5
* @link https://tabler.io
* Copyright 2018-2022 The Tabler Authors
* Copyright 2018-2022 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
   <head>
      <meta charset="utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
      <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
      <title>Sign in - DSP</title>
      <link rel="icon" href="{{asset('img/logo/harbour.png')}}" type="image/x-icon"/>
      <!-- CSS files -->
      <link href="{{asset('css/tabler.min.css')}}" rel="stylesheet"/>
      <link href="{{asset('css/tabler-flags.min.css')}}" rel="stylesheet"/>
      <link href="{{asset('css/tabler-payments.min.css')}}" rel="stylesheet"/>
      <link href="{{asset('css/tabler-vendors.min.css')}}" rel="stylesheet"/>
      <link href="{{asset('css/demo.min.css')}}" rel="stylesheet"/>
   </head>
   <body  class=" border-top-wide border-primary d-flex flex-column">
      <div class="page page-center">
         <div class="container-tight ">
            <div class="text-center mb-3">
               <div  class=" ">
                  <img class="mb-4 bg-light p-2 rounded" src="{{asset('img/logo/phe-oses.png')}}" height="80" alt=""> 
                  <h1 class="ml-2" style="font-weight: 900">DIGITAL SMART <span class="text-primary">PORT</span></h1>
               </div>
            </div>
            
            <div class="card">
               
               <form  method="POST" action="{{ route('login') }}" autocomplete="off">
                  @csrf
                  <div class="card-body">
                     <small class="card-title text-center mb-4">Login to your account</small>
                     @error('email')
                     <div class="alert alert-danger" role="alert">
                        {{ $message }}
                     </div>
                     @enderror

                     @error('password')
                     <div class="alert alert-danger" role="alert">
                        {{ $message }}
                     </div>
                     @enderror
                     <div class="form-floating mb-3">
                        <input type="email" value="{{old('email')}}" required class="form-control @error('email') is-invalid @enderror" id="email" name="email" >
                        <label for="email">Email</label>
                        {{-- @error('email')
                           <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                        @enderror --}}
                     </div>
                     <div class="form-floating mb-3">
                        <input type="password" required class="form-control @error('password') is-invalid @enderror" id="password" name="password" >
                        <label for="password">Password</label>
                        {{-- @error('password')
                           <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                        @enderror --}}
                     </div>
                     {{-- <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email">
                        
                     </div> --}}
                     {{-- <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password">
                        @error('password')
                        <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                        @enderror
                     </div> --}}

                     
                     <div class="form-footer">
                     <button type="submit" class="btn btn-primary w-100">Sign in</button>
                     </div>
                  </div>
                  <div class="hr-text">GTI</div>
                  
               </form>
            </div>
         </div>
      </div>
      <!-- Libs JS -->
      <!-- Tabler Core -->
      <script src="{{asset('js/tabler.min.js')}}"></script>
      <script src="{{asset('js/demo.min.js')}}"></script>
   </body>
</html>