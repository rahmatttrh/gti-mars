{{-- @extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden')) --}}


<html lang="en">
   <head>
      <meta charset="utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
      <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
      <title>DSP PHE - 404</title>
      <!-- CSS files -->
      <link href="{{asset('css/tabler.min.css')}}" rel="stylesheet"/>
      <link href="{{asset('css/tabler-flags.min.css')}}" rel="stylesheet"/>
      <link href="{{asset('css/tabler-payments.min.css')}}" rel="stylesheet"/>
      <link href="{{asset('css/tabler-vendors.min.css')}}" rel="stylesheet"/>
   </head>
   <body  class=" border-top-wide border-primary d-flex flex-column">
      <div class="page page-center">
         <div class="container-tight py-4">
            <div class="empty">
               <div class="empty-header">403</div>
               <p class="empty-title">User Is Not Logged In</p>
               <p class="empty-subtitle text-muted">
                  Your session is expired
               </p>
               <div class="empty-action">
                  <a href="/" class="btn btn-primary">
                  <!-- Download SVG icon from http://tabler-icons.io/i/arrow-left -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="5" y1="12" x2="19" y2="12" /><line x1="5" y1="12" x2="11" y2="18" /><line x1="5" y1="12" x2="11" y2="6" /></svg>
                  Sign In
                  </a>
               </div>
            </div>
         </div>
      </div>
      <!-- Libs JS -->
      <!-- Tabler Core -->
      <script src="{{asset('js/tabler.min.js')}}"></script>
         <script src="{{asset('js/demo.min.js')}}"></script>
   </body>
</html>
