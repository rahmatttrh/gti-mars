@extends('layouts.app')
@section('title')
   Manifest
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
                  <h1 class="text-primary border-bottom pb-2">MANIFEST VESSEL</h1>
               </div>
               <div class="col-6">
                  <p class="h3">Detail</p>
                  <dl class="row">
                     <dd class="col-3">Date</dd>
                     <dd class="col-9">: {{\Carbon\Carbon::parse($schedule->date)->format('d/m/Y')}}</dd>
                     <dd class="col-3">Vessel</dd>
                     <dd class="col-9">: {{$schedule->vessel->name}}</dd>
                     <dd class="col-3">Route</dd>
                     <dd class="col-9">: {{$schedule->origin->name}} - {{$schedule->destination->name}}</dd>
                     <dd class="col-3">ETD</dd>
                     <dd class="col-9">:  {{\Carbon\Carbon::parse($schedule->etd)->format('d/m/Y')}}</dd>
                     <dd class="col-3">ETA</dd>
                     <dd class="col-9">:  {{\Carbon\Carbon::parse($schedule->eta)->format('d/m/Y')}}</dd>
                  </dl>
               </div>
               <div class="col-6 text-end">
                  <p class="h3">Status</p>
                  <x-status.schedule :schedule="$schedule" />
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
            
            @foreach ($schedule->requests as $req)
               <h3>{{$req->activity->name}} {{$req->description}}</h3>
               <table class="table table-transparent table-responsive">
                  <thead>
                     <tr>
                        {{-- <th class="text-center" style="width: 1%"></th> --}}
                        
                        <th>Description</th>
                        <th>Doc Number</th>
                        
                        <th class="text-center" style="width: 1%">Qnt</th>
                        <th class="text-end" style="width: 1%">Unit</th>
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
                        <p class="strong mb-1">{{$cargo->no_doc}}</p>
                     </td>
                     <td class="text-center">
                        {{$cargo->qty}}
                     </td>
                     <td class="text-end">{{$cargo->unit}}</td>
                     <td class="text-center">
                        {{$cargo->size}}
                     </td>
                     <td class="text-center">
                        {{$cargo->weight}}
                     </td>
                  </tr>
                  @endforeach
                  <tr>
                     <td colspan="4" class="text-end strong">Total</td>
                     <td class="text-center">
                        {{$req->cargoItems->sum('size')}}
                     </td>
                     <td class="text-center">
                        {{$req->cargoItems->sum('weight')}}
                     </td>
                  </tr>
               </table>
            @endforeach
            
            <table class="table table-transparent table-responsive">
               <thead>
                  <tr>
                     {{-- <th class="text-center" style="width: 1%"></th> --}}
                     
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
            </table>
            
            
            <p class="text-muted text-center mt-5">Thank you very much for doing business with us. We look forward to working with
               you again!</p>
         </div>
      </div>
   </div>
</div>
@endsection