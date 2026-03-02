@extends('layouts.stisla.app')
@section('title')
    Request Draft
@endsection
@section('content')
<section class="section">
    <div class="section-header">
      <h1 class="section-title">Request Draft</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item "><a href="{{route('dsp.user')}}">Dashboard</a></div>
        <div class="breadcrumb-item active">Request Draft</div>
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
                        @if ($requests->count() > 0)
                           @foreach ($requests as $request)
                              <tr>
                                 <td class="text-center">{{++$i}}</td>
                                 <td><a href="{{route('request.detail', enkripRambo($request->id))}}">{{$request->code}}</a></td>
                                 {{-- <td><a href="{{route('request.detail.parent', enkripRambo($request->parent_id))}}"> {{$request->parent->origin->name}}</a></td> --}}
                                 <td>
                                  <a href="{{route('request.detail.parent', enkripRambo($request->parent_id))}}">{{$request->origin->name}}</a>
                                 </td>
                                 
                                 <td>{{$request->date}}</td>
                                 <td>{{$request->activity->name ?? ''}} {{$request->description}}</td>
                                 <td>{{$request->origin->name}} - {{$request->destination->name}}</td>
                                 <td>
                                    {{-- <x-status.request :request="$request" :lastreport="$request->schedule->lastreport()" /> --}}
                                       @if ($request->status < 3)
                                          <x-status-stisla.request :request="$request" :lastreport="null"/>
                                          @else
                                          <x-status-stisla.request :request="$request" :lastreport="$request->schedule->lastreport()"/>
                                       @endif
                                 </td>
                              </tr>
                           @endforeach
                           @else
                           <tr>
                              <td colspan="7" style="text-align: center"><small>Emtpy</small></td>
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