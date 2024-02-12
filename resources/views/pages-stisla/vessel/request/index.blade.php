@extends('layouts.stisla.app')
@section('title')
   All Request
@endsection
@section('content')
<section class="section">
    {{-- <div class="section-header">
      <h1 class="section-title">All Request</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item "><a href="{{route('dsp.vessel')}}">Dashboard</a></div>
        <div class="breadcrumb-item active">All Request</div>
      </div>
    </div> --}}

    <div class="section-body">
      {{-- <h2 class="section-title">Schedule Plan</h2>
      <p class="section-lead">
        We use 'DataTables' made by @SpryMedia. You can check the full documentation <a href="https://datatables.net/">here</a>.
      </p> --}}

      <div class="row">
        <div class="col-12">
          <div class="card shadow-sm border">
            {{-- <div class="card-header">
              <h4>Basic DataTables</h4>
            </div> --}}
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-sm" id="table-1">
                    <thead>
                        <tr>
                           <th class="text-center">No.</th>
                           <th>ID</th>
                           <th>Activity</th>
                           <th>Date</th>
                           <th>QTY</th>
                           
                           <th>Schedule ID</th>
                           <th>Status</th>
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>
                        @if ($requests->count() > 0)
                           @foreach ($requests as $request)
                              <tr>
                                 <td class="text-center">{{++$i}}</td>
                                 <td>{{$request->code}}</td>
                                 <td>{{$request->activity->name ?? ''}} {{$request->description}}</td>
                                 <td>{{formatDateName($request->date)}}</td>
                                 <td>{{$request->qty}} KL</td>
                                 <td>{{$request->schedule->code}}</td>
                                 <td>
                                    {{-- <x-status.request :request="$request" :lastreport="$request->schedule->lastreport()" /> --}}
                                       @if ($request->status < 3)
                                          <x-status-stisla.request :request="$request" :lastreport="null"/>
                                          @else
                                          <x-status-stisla.request :request="$request" :lastreport="$request->schedule->lastreport()"/>
                                       @endif
                                 </td>
                                 
                                 <td>
                                    <a href="{{route('request.detail', enkripRambo($request->id))}}" class="btn btn-sm btn-primary">Detail</a>
                                 </td>
                              </tr>
                           @endforeach
                           @else
                           <tr>
                              <td colspan="8" style="text-align: center"><small>Emtpy</small></td>
                           </tr>
                        @endif
                        
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