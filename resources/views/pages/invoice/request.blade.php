@extends('layouts.app')
@section('title')
   Invoice Request Acivity
@endsection
@section('content')
<div class="container-xl">
   <!-- Page title -->
   <div class="page-header d-print-none">
     <div class="row align-items-center">
       <div class="col">
         <h2 class="page-title">
           Invoice
         </h2>
       </div>
       <!-- Page title actions -->
       <div class="col-auto ms-auto d-print-none">
         <button type="button" class="btn btn-primary" onclick="javascript:window.print();">
           <!-- Download SVG icon from http://tabler-icons.io/i/printer -->
           <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" /><path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" /><rect x="7" y="13" width="10" height="8" rx="2" /></svg>
           Print Invoice
         </button>
       </div>
     </div>
   </div>
 </div>
<div class="page-body" >
   <div class="container-xl">
      <div class="card card-lg">
         <div class="card-body">
            <div class="row">
               <div class="col-12">
                  <h1 class="text-primary border-bottom pb-2">INVOICE REQUEST</h1>
               </div>
               <div class="col-6">
                  <p class="h3">User</p>
                  <dl class="row">
                     <dd class="col-4">Department</dd>
                     <dd class="col-8">: {{$request->department->name}}</dd>
                     <dd class="col-4">Name</dd>
                     <dd class="col-8">: {{$request->employee->name}}</dd>
                     <dd class="col-4">Contact</dd>
                     <dd class="col-8">: {{$request->employee->ekstensi}} / {{$request->employee->email}}</dd>
                     <dd class="col-4">Request Date</dd>
                     <dd class="col-8">:  {{\Carbon\Carbon::parse($request->created_at)->format('d/m/Y')}}</dd>
                  
                  </dl>
               </div>
               <div class="col-6 text-end">
                  <p class="h3">Status</p>
                  <x-status.request :request="$request" />
                  {{-- <address>
                     Street Address<br>
                     State, City<br>
                     Region, Postal Code<br>
                     ctr@example.com
                  </address> --}}
               </div>
               <div class="col-12 my-4">
                  <h1>{{$request->activity->name}} {{$request->description}} </h1>
                  <h1>{{$request->origin->name}} - {{$request->destination->name}}</h1>
                  <h1>{{\Carbon\Carbon::parse($request->date)->format('d/m/Y')}}</h1>
               </div>
            </div>
            @if ($request->activity->type_id == 1)
            <table class="table table-transparent table-responsive">
               <thead>
                  <tr>
                     <th class="text-center" style="width: 1%"></th>
                     
                     <th>Description</th>
                     <th>Doc Number</th>
                     
                     <th class="text-center" style="width: 1%">Qnt</th>
                     <th class="text-end" style="width: 1%">Unit</th>
                     <th class="text-center" style="width: 10%">Size (m<sup>2</sup>)</th>
                     <th class="text-center" style="width: 10%">Weight (ton)</th>
                     
                  </tr>
               </thead>
               @foreach ($cargoItems as $cargo)
               <tr>
                  <td class="text-center">{{++$i}}</td>
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
                  <td colspan="5" class="text-end strong">Total</td>
                  <td class="text-center">
                     {{$cargoItems->sum('size')}}
                  </td>
                  <td class="text-center">
                     {{$cargoItems->sum('weight')}}
                  </td>
               </tr>
            </table>
            @elseif($request->activity->type_id == 2 || $request->activity->type_id == 4 )
            <table class="table table-transparent table-responsive">
               <thead>
                  <tr>
                     <th class="text-center" style="width: 1%"></th>
                     
                     <th>Name</th>
                     <th>ID Number</th>
                     <th class="text-center">Qty</th>
                     {{-- <th class="text-center" style="width: 1%">Qnt</th>
                     <th class="text-end" style="width: 1%">Unit</th>
                     <th class="text-center" style="width: 10%">Size (m<sup>2</sup>)</th>
                     <th class="text-center" style="width: 10%">Weight (ton)</th> --}}
                     
                  </tr>
               </thead>
               @foreach ($passengerItems as $passenger)
               <tr>
                  <td class="text-center">{{++$i}}</td>
                  <td>
                     <p class="strong mb-1">{{$passenger->name}}</p>
                     {{-- <small>{{$cargo->remark}}</small> --}}
                  </td>
                  <td>
                     <p class="strong mb-1">{{$passenger->number}}</p>
                  </td>
                  <td class="text-center">1</td>
                  {{-- <td class="text-center">
                     {{$cargo->qty}}
                  </td>
                  <td class="text-end">{{$cargo->unit}}</td>
                  <td class="text-center">
                     {{$cargo->size}}
                  </td>
                  <td class="text-center">
                     {{$cargo->weight}}
                  </td> --}}
               </tr>
               @endforeach
               <tr>
                  <td colspan="3" class="text-end strong">Total Person</td>
                  <td class="text-center">
                     {{$passengerItems->count()}}
                  </td>
                  {{-- <td class="text-center">
                     {{$cargoItems->sum('weight')}}
                  </td> --}}
               </tr>
            </table>
            @endif
            
            <p class="text-muted text-center mt-5">Thank you very much for doing business with us. We look forward to working with
               you again!</p>
         </div>
      </div>
   </div>
</div>
@endsection