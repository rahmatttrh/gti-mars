@extends('layouts.stisla.app')
@section('title')
   Report
@endsection
@section('content')
<section class="section">
    

    <div class="section-body">
      
      
      <div class="row ">
        <div class="col-md-8">
          
         <div class="table-responsive">
            <table class="table table-striped table-sm" id="table-8">
               <thead>     
                  <tr>
                     <th colspan="8" >Schedule Plan </th>
                  
                  
                  </tr>                            
               <tr>
                  <th class="text-center">
                     #
                  </th>
                  <th>ID</th>
                  <th>Vessel</th>
                  <th>Route</th>
                  <th>Request</th>
                  <th>Date</th>
                  <th>Capacity</th>
                  <th>Status</th>
                  {{-- <th></th> --}}
               </tr>
               </thead>
               <tbody>     
               
               </tbody>
            </table>
         </div>
            
        </div>
      </div>
      
    </div>
  </section>
    
@endsection