@extends('layouts.stisla.app')
@section('title')
   Daily Report Management 
@endsection
@section('content')
<section class="section">

   <style>
      td {
  border-right: solid 1px rgb(255, 255, 255); 
  border-left: solid 1px rgb(255, 255, 255);
}
   </style>
   
   <div class="section-body">
      <div class="row">
         <div class="col-md-4">
            <div class="card shadow">
               {{-- <div class="card-header"><h5>VDR {{$level}}</h5></div> --}}
               <div class="card-body">
                  <h5>Daily Report</h5>
                  
                 
                  
                  
                     
                  <hr>
                  Daily Report brestatus Published akan ditampilkan di semua Dashboard User
                  <hr>
                  <form action="{{route('daily.report.store')}}" method="POST">
                     @csrf
                     <div class="input-group mb-3">
                        <input type="date" name="date" id="date" required class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                          <button class="btn btn-primary" type="submit" type="button">Create</button>
                        </div>
                      </div>
                  </form>
                  {{-- <a href="{{route('daily.report.create')}}" class="btn btn-primary">Create New</a> --}}
                  
               </div>
            </div>
         </div>

         <div class="col-md-8">
            <div class="card shadow-lg">
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="border  "   id="table-19" class="datatables" >
                        <thead>
                           <tr>
                              
                              
                              <th class="border py-2">Date</th>
                              <th class="border">Day</th>
                              <th class="border">Status</th>
                              <th class="border text-center">Option</th>
                           </tr>
                        </thead>
                        <tbody>
      
                           @foreach ($dailyReports as $daily)
                               <tr>
                                 <td class="border">{{formatDateName($daily->date)}}</td>
                                 <td class="border">{{formatDayName($daily->date)}}</td>
                                 <td class="border">
                                    <x-status-stisla.daily-report :daily="$daily" />
                                 </td>
                                 <td class="text-center border">
                                    <div class="btn-group">
                                       <a href="{{route('daily.report.detail', enkripRambo($daily->id))}}" class="btn btn-sm btn-light border">Detail</a>
                                       <a href="#" class="btn btn-sm btn-light border">Edit</a>
                                       <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                    </div>
                                 </td>
                               </tr>
                           @endforeach
                           
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            
         </div>
         
      </div>
   </div>
</section>
    
@endsection