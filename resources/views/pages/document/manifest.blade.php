@extends('layouts.app-doc')
@section('title')
   Manifest {{$schedule->code}}
@endsection
@section('content')
<div class="container-xl">
   <!-- Page title -->
   <div class="page-header d-print-none">
     <div class="row align-items-center">
       <div class="col">
         <h2 class="page-title">
           Manifest
         </h2>
       </div>
       <!-- Page title actions -->
       <div class="col-auto ms-auto d-print-none">
         <button type="button" class="btn btn-primary" onclick="javascript:window.print();">
           <!-- Download SVG icon from http://tabler-icons.io/i/printer -->
           <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" /><path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" /><rect x="7" y="13" width="10" height="8" rx="2" /></svg>
           Print Manifest
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
                  <h1 class="text-primary border-bottom pb-2">MANIFEST {{$schedule->code}}</h1>
               </div>
               <div class="col-6">
                  <p class="h3">DETAIL</p>
                  <dl class="row">
                     <dd class="col-3">Date</dd>
                     <dd class="col-9">: {{\Carbon\Carbon::parse($schedule->date)->format('d/m/Y')}}</dd>
                     <dd class="col-3">Vessel</dd>
                     <dd class="col-9">: {{$schedule->vessel->name}}</dd>
                     <dd class="col-3">Route</dd>
                     <dd class="col-9">: 
                        @foreach ($routes as  $route)
                           @if ($route->rank > 1)
                           - 
                           @endif
                           {{$route->port->name}} 
                        @endforeach</dd>
                     {{-- <dd class="col-3">ETD</dd>
                     <dd class="col-9">:  {{\Carbon\Carbon::parse($schedule->etd)->format('H:i')}}</dd> --}}
                     {{-- <dd class="col-3">ETA</dd>
                     <dd class="col-9">:  {{\Carbon\Carbon::parse($schedule->eta)->format('H:i')}}</dd> --}}
                  </dl>
               </div>
               <div class="col-6 text-end">
                  <p class="h3">Status</p>
                  <x-status.schedule :schedule="$schedule" :lastreport="$schedule->lastreport()"/>
                  {{-- <address>
                     Street Address<br>
                     State, City<br>
                     Region, Postal Code<br>
                     ctr@example.com
                  </address> --}}
               </div>
               {{-- <div class="col-12 my-4">
                  <h1>{{$schedule->vessel->name}} </h1>
                  <h1>{{$schedule->origin->name}} - {{$schedule->destination->name}}</h1>
               </div> --}}
            </div>
            <h4 class="">ACTIVITIES</h4>
            @if ($schedule->class == 'Cargo/Crew')
               @else
               <div class="mb-2">
                  {{-- @if ($schedule->status == 12)
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check-filled text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                     <path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" stroke-width="0" fill="currentColor"></path>
                  </svg>
                  @else
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check-filled text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                     <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                     <path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" stroke-width="0" fill="currentColor"></path>
                  </svg>
                  @endif --}}
                  <h1>{{$schedule->class}}</h1>
                  
                  {{-- <h5>{{$schedule->requests()->first()->qty}} / {{$schedule->requests()->first()->qty_approve ?? '0'}} Approved (KL)</h5> --}}

               </div>
               <table class="table table-transparent table-responsive  mb-4">
                  <thead>
                     <tr>
                        {{-- <th class="text-center" style="width: 1%"></th> --}}
                        
                        <th>User</th>
                        <th>Desc</th>
                        <th>Request Date</th>
                        <th class="text-center" style="width: 10%">Qty Req</th>
                        <th class="text-center" style="width: 10%">Qty Approved</th>
                        <th class="text-center" style="width: 10%">Jetty</th>
                        
                     </tr>
                  </thead>
                  <tr>
                     {{-- <td class="text-center">{{++$i}}</td> --}}
                     <td>
                        <p class="strong mb-1">{{$schedule->requests()->first()->user->name}} </p>
                        <small></small>
                     </td>
                     <td>{{$schedule->requests()->first()->desc}}</td>
                     <td>{{formatDate($schedule->requests()->first()->created_at)}}</td>
                     <td class="text-center">
                        <p class="strong mb-1">{{$schedule->requests()->first()->qty}}</p>
                     </td>
                     <td class="text-center">
                        <p class="strong mb-1">{{$schedule->requests()->first()->qty_approve ?? '0'}}</p>
                     </td>
                     <td class="text-center">
                        {{$schedule->remark}}
                     </td>
                     
                     
                  </tr>
                  {{-- <tr>
                     <td colspan="5" class="text-end strong">Total</td>
                     <td class="text-center">
                        10
                     </td>
                     <td class="text-center">
                        10
                     </td>
                  </tr> --}}
               </table>
            @endif
            @foreach ($schedule->requests as $req)
               @if ($req->activity_id == 1)
                  <div class="mb-2">
                     @if ($req->status == 12)
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check-filled text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" stroke-width="0" fill="currentColor"></path>
                     </svg>
                     @else
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check-filled text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" stroke-width="0" fill="currentColor"></path>
                     </svg>
                     @endif
                     
                     {{$req->activity->name}} {{$req->origin->name}} - {{$req->destination->name}}

                  </div>
                  <table class="table table-transparent table-responsive  mb-4">
                     <thead>
                        <tr>
                           {{-- <th class="text-center" style="width: 1%"></th> --}}
                           
                           <th>Description</th>
                           <th>Doc Number</th>
                           <th>Contract</th>
                           <th class="text-center" style="width: 1%">Qnt</th>
                           <th class="text-center" style="width: 1%">Unit</th>
                           <th class="text-center" style="width: 10%">Size (m<sup>2</sup>)</th>
                           <th class="text-center" style="width: 10%">Weight (ton)</th>
                           
                        </tr>
                     </thead>
                     @foreach ($req->cargoItems as $cargo)
                     <tr>
                        {{-- <td class="text-center">{{++$i}}</td> --}}
                        <td>
                           <p class="strong mb-1">{{$cargo->desc}}</p>
                           <small>{{$cargo->remark}}</small>
                        </td>
                        <td>
                           <p class="strong mb-1">{{$cargo->mtd}}</p>
                        </td>
                        <td>
                           <p class="strong mb-1">{{$cargo->contract}}</p>
                        </td>
                        <td class="text-center">
                           {{$cargo->qty}}
                        </td>
                        <td class="text-center">{{$cargo->unit}}</td>
                        <td class="text-center">
                           {{$cargo->size}}
                        </td>
                        <td class="text-center">
                           {{$cargo->weight}}
                        </td>
                     </tr>
                     @endforeach
                     <tr>
                        <td colspan="5" class="text-end strong">Total</td>
                        <td class="text-center">
                           {{$req->cargoItems->sum('size')}}
                        </td>
                        <td class="text-center">
                           {{$req->cargoItems->sum('weight')}}
                        </td>
                     </tr>
                  </table>
                  <hr>
                  @elseif($req->activity_id == 2)

                     <div class="mt-4">
                        @if ($req->status == 12)
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check-filled text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" stroke-width="0" fill="currentColor"></path>
                        </svg>
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check-filled text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                           <path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-1.293 5.953a1 1 0 0 0 -1.32 -.083l-.094 .083l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.403 1.403l.083 .094l2 2l.094 .083a1 1 0 0 0 1.226 0l.094 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" stroke-width="0" fill="currentColor"></path>
                        </svg>
                        @endif
                        
                        {{$req->activity->name}} {{$req->origin->name}} - {{$req->destination->name}}
      
                     </div>
                     
                     {{-- <small class="badge badge-info mt-4">Depart</small> --}}
                     <table class="table table-transparent table-responsive mt-2">
                        <thead>
                           <tr>
                              <th>Type</th>
                              <th>Name</th>
                              <th>Barcode</th>
                              <th>Department</th>
                              <th>Company</th>
                              <th>Desc</th>
                           </tr>
                        </thead>
                        @foreach ($req->passengerItems as $item)
                        <tr>
                           <td>{{$item->type}}</td>
                           <td>
                              <p class="strong mb-1">{{$item->name}}</p>
                           </td>
                           <td>{{$item->barcode}}</td>
                           <td>{{$item->department}}</td>
                           <td>{{$item->company}}</td>
                           <td>{{$item->desc}}</td>
                        </tr>
                        @endforeach
                        
                     </table>
                     {{-- <small class="badge bg-danger mt-3">Return</small>
                     <table class="table table-transparent table-responsive">
                        <thead>
                           <tr>
                              <th>Name</th>
                              <th>Barcode</th>
                              <th>Department</th>
                              <th>Company</th>
                              <th>Desc</th>
                           </tr>
                        </thead>
                        @foreach ($req->passengerItems->where('type', 'Return') as $item)
                        <tr>
                           <td>
                              <p class="strong mb-1">{{$item->name}}</p>
                           </td>
                           <td>{{$item->barcode}}</td>
                           <td>{{$item->department}}</td>
                           <td>{{$item->company}}</td>
                           <td>{{$item->desc}}</td>
                        </tr>
                        @endforeach
                        
                     </table> --}}
               @endif
            @endforeach
            

            
            {{-- <table class="table table-transparent table-responsive">
               <thead>
                  <tr>
                     <th></th>
                     <th></th>
                     
                     <th class="text-center" style="width: 1%"></th>
                     <th class="text-end" style="width: 1%"></th>
                     <th class="text-center" style="width: 10%"></th>
                     <th class="text-center" style="width: 10%"></th>
                     
                  </tr>
               </thead>
               <tr>
                  <td colspan="4" class="text-end strong">Grand Total</td>
                  <td class="text-center">
                     {{$schedule->total_size}}
                  </td>
                  <td class="text-center">
                     {{$schedule->total_weight}}
                  </td>
               </tr>
            </table> --}}
            
            
            <p class="text-muted text-center mt-5">Thank you very much for doing business with us. We look forward to working with
               you again!</p>
         </div>
      </div>
   </div>
</div>
@endsection