@extends('layouts.stisla.app')
@section('title')
    Log DSP Activity
@endsection
@section('content')
<section class="section">
   <div class="section-header">
      <h1 class="section-title">Log DSP Activity</h1>
      <div class="section-header-breadcrumb">
         <div class="breadcrumb-item "><a href="#">Dashboard</a></div>
         <div class="breadcrumb-item active">Log DSP Activity</div>
      </div>
   </div>

   <div class="section-body">
      {{-- <h2 class="section-title">Schedule Plan</h2>
      <p class="section-lead">
         We use 'DataTables' made by @SpryMedia. You can check the full documentation <a href="https://datatables.net/">here</a>.
      </p> --}}

      <div class="row">
         <div class="col-12">
            <div class="card">
            {{-- <div class="card-header">
               <h4>Basic DataTables</h4>
            </div> --}}
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-striped " id="table-1">
                  <thead>                                 
                     <tr>
                        <th class="text-center">
                        #
                        </th>
                        <th>User</th>
                        <th>Action</th>
                        <th>Desc</th>
                        <th>Time</th>
                        {{-- <th class="text-center">Weight</th> --}}
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>     
                     @foreach ($logs as $log)
                        <tr>
                           <td class="text-center">{{++$i}}</td>
                           <td>{{$log->user->name}}</td>
                           <td>{{$log->action}}</td>
                           <td>{{$log->desc}}</td>
                           <td>{{formatDateTime($log->created_at)}}</td>
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