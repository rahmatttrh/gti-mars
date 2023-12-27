<div class="invoice">
   <div class="invoice-print">
     <div class="row">
       <div class="col-lg-12">
         <div class="invoice-title">
            
           <h2>{{$request->activity->name}} for
            {{$request->user->name ?? ''}} {{$request->employee->name ?? ''}}
            </h2>
           <div class="invoice-number">Order #{{$request->id}}</div>
         </div>
         <hr>
         <div class="row">
            
           <div class="col-md-6">
             <address>
               <strong>Detail:</strong><br>
                  {{-- @if ()
                      
                  @endif --}}
                 Quantity {{$request->fuel->qty ?? ''}} {{$request->water->qty ?? ''}} KL<br>
                 Request on {{formatDate($request->date)}}
                 by <b>{{$request->user->name}}</b>
                 
             </address>
             <address>
               <strong>Schedule:</strong><br>
               {{$request->schedule->code ?? '-'}}<br>
               {{$request->schedule->vessel->name ?? 'Vessel : Waiting Fleet Control'}}
             </address>
           </div>
           <div class="col-md-6 text-md-right">
             <address>
               {{-- <strong>Status:</strong><br> --}}
               <x-status-stisla.request :request="$request" /><br>
               
               <img width="85" src="{{asset('img/flaticon/crude.png')}}" alt="" class="img-thumbnail">
             </address>
           </div>
         </div>
         
         {{-- <div class="row">
            <div class="col-md-6 ">
               <address>
                 <strong>Schedule:</strong><br>
                 {{$request->schedule->code ?? '-'}}<br>
                 {{$request->schedule->vessel->name ?? 'Vessel : Waiting Fleet Control'}}
               </address>
             </div>
         </div> --}}
       </div>
     </div>
     
     
   </div>
   {{-- <hr>
   <div class="text-md-right">
     <div class="float-lg-left mb-lg-0 mb-3">
       <button class="btn btn-primary btn-icon icon-left"><i class="fas fa-credit-card"></i> Process Payment</button>
       <button class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i> Cancel</button>
     </div>
     <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button>
   </div> --}}
 </div>