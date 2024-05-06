@extends('layouts.stisla.app')
@section('title')
   Report
@endsection
@section('content')
<section class="section">
    

    <div class="section-body">
      
      
      <div class="row ">
        <div class="col-md-12">
          
         <div class="table-responsive">
            <table class="table table-striped table-sm" id="table-8">
               <thead>     
                  <tr>
                     <th colspan="8" >Tracking</th>
                  
                  
                  </tr>                            
               <tr>
                  <th class="text-center">
                     #
                  </th>
                  <th>MTD</th>
                  <th>Desc</th>
                  <th>Contract</th>
                  <th>Unit</th>
                  <th>Weight</th>
                  <th>Qty</th>
                  <th>Status</th>
                  {{-- <th></th> --}}
               </tr>
               </thead>
               <tbody>     
                  @foreach ($cargos as $cargo)
                     <th>{{$cargo->mtd}}</th>
                  @endforeach
               </tbody>
            </table>
         </div>
            
        </div>
      </div>
      
    </div>
  </section>
    
@endsection