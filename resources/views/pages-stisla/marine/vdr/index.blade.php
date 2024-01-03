@extends('layouts.stisla.app-vdr')
@section('title')
    VDR History
@endsection
@section('content')
<section class="section">
   <div class="section-header">
      <h1 class="section-title">VDR History</h1>
      <div class="section-header-breadcrumb">
         <div class="breadcrumb-item "><a href="{{route('dsp.user')}}">Dashboard</a></div>
         <div class="breadcrumb-item active">VDR History</div>
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
            <div class="card-header">
              <h4>Basic DataTables</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-sm" id="table-1">
                    <thead>
                        <tr>
                           <th class="text-center">No.</th>
                           <th>ID</th>
                           <th>Picup Point</th>
                           <th>Date</th>
                           <th>Activity</th>
                           <th>Route</th>
                           <th>Status</th>
                        </tr>
                     </thead>
                     <tbody>
                       
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