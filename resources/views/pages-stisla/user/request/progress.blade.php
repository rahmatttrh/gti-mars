@extends('layouts.stisla.app')
@section('title')
    Request Progress
@endsection
@section('content')
<section class="section">
    <div class="section-header">
      <h1 class="section-title">Request Progress</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item "><a href="{{route('dsp.user')}}">Dashboard</a></div>
        <div class="breadcrumb-item active">Request Progress</div>
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
                           <th>Class</th>
                           <th>Route</th>
                           <th>Vessel</th>
                           <th>Date</th>
                           <th>Created at</th>
                           <th>Status</th>
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>
                        @if ($progress->count() > 0)
                           @foreach ($progress as $request)
                              <tr>
                                 <td class="text-center">{{++$i}}</td>
                                 <td>
                                    {{$request->code}}
                                    {{-- <br>
                                    <small>{{$request->activity->name}}</small> --}}
                                 </td>
                                 <td>{{$request->activity->name}}</td>
                                 <td>
                                  {{-- @if ($request->parent_id)
                                  <a href="{{route('request.detail.parent', enkripRambo($request->parent_id))}}"> {{$request->parent->origin->name}}</a>
                                  @else --}}
                                  {{-- {{$request->origin->name}} to {{$request->destination->name}} --}}
                                  {{-- @endif --}}
                                  @if ($request->activity_id < 5)
                                  {{$request->origin->name}} to {{$request->destination->name}}
                                  @else
                                  -
                                  @endif
                                  
                                </td>
                                 {{-- <td><a href="{{route('request.detail', enkripRambo($request->id))}}">{{$request->code}}</a></td> --}}
                                 <td><a href="{{route('schedule.detail', enkripRambo($request->schedule_id))}}">{{$request->schedule->vessel->name ?? 'Empty'}}</a></td>
                                 <td>{{formatDate($request->date)}}</td>
                                 <td>{{formatDateTime($request->created_at)}}</td>
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
                              <td colspan="6" style="text-align: center"><small>Emtpy</small></td>
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