@extends('layouts.stisla.app-proact')
@section('title')
   PROACT - PHE
@endsection
@section('content')
<section class="section">
   <div class="section-body">
      <div class="card shadow-lg">
         <div class="card-body text-center">
            {{-- <div class="d-flex align-items-center">
               <img class="mr-4" width="250px" src="{{asset('img/flaticon/web.png')}}" alt="" class="">
               <div class="text-left ml-4">
                  <h1>PROACT</h1>
                  <h4>UNDER DEVELOPMENT</h4>
               </div>
            </div> --}}
            {{-- <div class="row">
               <div class="col-md-4">
                  
                  
               </div>
               <div class="col-md-8 text-left align-middle">
                  
               </div>
            </div> --}}

            <img width="140" src="{{asset('img/flaticon/web.png')}}" alt="" class="">
            <hr>
            <h1><b>PROACT</b></h1>
                  <h4>UNDER DEVELOPMENT</h4>
            
         </div>
         <div class="card-footer bg-whitesmoke text-center">
            <span>This system is not available yet</span>
         </div>
      </div>
   </div>
</section>
    
@endsection