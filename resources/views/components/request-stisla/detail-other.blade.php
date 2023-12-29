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
                     <strong>Desc:</strong><br>
                     {{$request->desc ?? '-'}}
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
                     
                     <img width="150" src="{{asset('img/flaticon/crude.png')}}" alt="" class="img-thumbnail">
                  </address>
               </div>
            </div>
         </div>
      </div>

   </div>
 </div>