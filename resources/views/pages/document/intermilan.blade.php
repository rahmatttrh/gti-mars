@extends('layouts.app-doc')
@section('title')
   Intermilan
@endsection
@section('content')
<style>
   table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}

.ttd {
   font-size: 10px;
}

table td {
  font-size: 10px
}

.title {
  font-size: 11px
}

table {
   width: 100%;
}

</style>
<div class="container-xl">
   <!-- Page title -->
   <div class="page-header d-print-none">
     <div class="row align-items-center">
       <div class="col">
         <h2 class="page-title">
           Intermilan
         </h2>
       </div>
       <!-- Page title actions -->
       <div class="col-auto ms-auto d-print-none">
         <button type="button" class="btn btn-primary" onclick="javascript:window.print();">
           <!-- Download SVG icon from http://tabler-icons.io/i/printer -->
           <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" /><path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" /><rect x="7" y="13" width="10" height="8" rx="2" /></svg>
           Print
         </button>
       </div>
     </div>
   </div>
 </div>
<div class="page-body" >
   <div class="container-xl">
      <div class="card card-lg">
         <div class="card-body">
            <div class="row border-bottom mb-4">
               <div class="col-12">
                  <h1 class="text-primary  pb-2">MONTHLY INTEGRATED BOAT PLANNING JANUARY 2023</h1>
               </div>
            </div>
            

            <table class="table-sm">
               <thead>
                  <tr>
                     <th class="text-center" style="width: 1%">No.</th>
                     <th>User</th>
                     <th>Activity</th>
                     <th>Location</th>
                     
                     <th >Required Boat</th>
                     <th >Boat Assigned</th>
                     <th>Date</th>
                     
                  </tr>
               </thead>
               @foreach ($requests as $req)
               <tr>
                  <td class="text-center">{{++$i}}</td>
                  <td>{{$req->employee->name}}/{{$req->employee->port->name}}</td>
                  <td>
                     {{$req->activity->name}} {{$req->desc}}
                  </td>
                  <td>
                     @if ($req->activity_id == 5)
                                             {{$req->employee->name}}
                                              @else
                                              {{$req->origin->name ?? '-'}} - {{$req->destination->name ?? '-'}}
                                          @endif
                  </td>
                  <td >
                     {{$req->schedule->vessel->type ?? '-'}}
                  </td>
                  <td >{{$req->schedule->vessel->name ?? '-'}}</td>
                  
                  <td >
                     {{formatDate($req->date)}}
                  </td>
               </tr>
               @endforeach
             
            </table>
            
            
            <p class="text-muted text-center mt-5">Thank you very much for doing business with us. We look forward to working with
               you again!</p>
         </div>
      </div>
   </div>
</div>
@endsection