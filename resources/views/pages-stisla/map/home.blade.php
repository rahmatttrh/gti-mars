@extends('layouts.stisla.app-map')
@section('title')
   MAP - PHE
@endsection
@section('content')
<section class="section">
   <div class="section-header">
      <h1 class="section-title">MAP Dashboard</h1>
      <div class="section-header-breadcrumb">
         <div class="breadcrumb-item "><a href="#">Dashboard</a></div>
         <div class="breadcrumb-item active">MAP Dashboard</div>
      </div>
   </div>

    <div class="section-body text-center">
      {{-- <h2 class="section-title">Under Development</h2>
      <p class="section-lead">
        We use 'DataTables' made by @SpryMedia. You can check the full documentation <a href="https://datatables.net/">here</a>.
      </p> --}}

      <img width="200px" src="{{asset('img/flaticon/tools.png')}}" alt="" class="">
      <hr>
      <h1>Under Development</h1>
      
    </div>
</section>
    
@endsection