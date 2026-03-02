@extends('layouts.stisla.app')
@section('title')
   DSP Detail Sailing Order
@endsection
@section('content')
<section class="section">
   <div class="section-body">
      <div class="row">
         <div class="col-md-3">
            {{-- {{$schedule->status}} --}}
            

            @if (auth()->user()->hasRole('admin-logistic'))
               <a href="" class="btn btn-primary btn-block mb-2" >Send to Marine</a>
            @endif

          
            

            <div class="card shadow-lg">
              
               <div class="card-body">
                  
                  <h5><b>{{$vessel->name ?? 'Vessel Empty'}}</b></h5>
                  
                  
                  
                  
                  <hr>
                  <div class="badge badge-info mb-2">Activity</div>
                  <div class="d-flex justify-content-between">
                     <span>Pending</span>
                     <span>{{count($pendingRequests)}}</span>
                  </div>
                  <div class="d-flex justify-content-between">
                     <span>Progress</span>
                     <span>{{count($progressRequests)}}</span>
                  </div>
                  <div class="d-flex justify-content-between">
                     <span>Drop Confrimation</span>
                     <span>{{count($confirmationRequests)}}</span>
                  </div>
                  
                  
                  
                 
                  
                  
               </div>
               
            </div>
           
            
         </div>
         <div class="col-md-9">
            
            <div class="card shadow-lg">
               <div class="card-body">
                  <b>Manifest Plan</b>
                  <hr>
                  <table class="table table-sm border">
                     
                     <tbody>
                        <tr>
                           <th class="border">Date</th>
                           <th class="border">Material</th>
                           <th class="border">Description</th>
                           <th class="border">Route</th>
                           <th class="border"></th>
                        </tr>
                        @foreach ($progressCargos as $item)
                            <tr>
                              <td class="border">{{formatDate($item->date)}}</td>
                              <td class="border">{{$item->description}}</td>
                              <td class="border">{{$item->qty}} {{$item->unit}}</td>
                              <td class="border">{{$item->request->origin->name}} - {{$item->request->destination->name}}</td>
                              <td class="border">
                                 <a href="">Drop</a>
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
</section>


  
  
  
    
@endsection




