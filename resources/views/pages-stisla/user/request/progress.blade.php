@extends('layouts.stisla.app')
@section('title')
   Progress Request Activity
@endsection

@section('content')

<div class="card shadow-sm border">
               
   <div class="card-body">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
         <li class="nav-item">
            <a class="nav-link active" id="progress-tab" data-toggle="tab" href="#progress" role="tab" aria-controls="progress" aria-selected="true">Porgress</a>
         </li>
         <li class="nav-item">
            <a class="nav-link" id="draft-tab" data-toggle="tab" href="#draft" role="tab" aria-controls="draft" aria-selected="false">Draft</a>
         </li>
         
         <li class="nav-item">
            <a class="nav-link" id="history-tab" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="false">History </a>
         </li>

      </ul>
      <div class="tab-content" id="myTabContent">
         <div class="tab-pane fade show active" id="progress" role="tabpanel" aria-labelledby="progress-tab">
            <div class="table-responsive">
               <table class=" table-striped " id="table-1">
                   <thead>
                       {{-- <tr><th colspan="8" class="py-1">Request Progress</th></tr> --}}
                       <tr>
                          {{-- <th class="text-center" style="width: 15px">No.</th> --}}
                          <th>ID</th>
                          <th>Desc</th>
                          <th>Route</th>
                          <th>Vessel</th>
                          <th>Date</th>
                          <th>Created at</th>
                          <th>Status</th>
                          {{-- <th></th> --}}
                       </tr>
                    </thead>
                    <tbody>
                       @if ($progress->count() > 0)
                          @foreach ($progress as $request)
                             <tr>
                                {{-- <td class="text-center">{{++$i}}</td> --}}
                                <td>
                                   <a href="{{route('request.detail', enkripRambo($request->id))}}">{{$request->code}}</a> 
                                   {{-- <br>
                                   <small>{{$request->activity->name}}</small> --}}
                                </td>
                                <td>{{$request->activity->name}} - {{$request->desc}}</td>
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
                                {{-- <td>
                                 <a href="{{route('request.detail', enkripRambo($request->id))}}" class="btn btn-sm btn-primary">Detail</a>
                                </td> --}}
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

         <div class="tab-pane fade" id="draft" role="tabpanel" aria-labelledby="draft-tab">
            <div class="table-responsive">
               <table class=" table-striped " id="table-3">
                   <thead>
                       <tr>
                          {{-- <th class="text-center">No.</th> --}}
                          <th>ID</th>
                          <th>Picup Point</th>
                          <th>Date</th>
                          <th>Activity</th>
                          <th>Route</th>
                          <th>Status</th>
                       </tr>
                    </thead>
                    <tbody>
                       @if ($drafts->count() > 0)
                          @foreach ($drafts as $request)
                             <tr>
                                {{-- <td class="text-center">{{++$i}}</td> --}}
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
         
         <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
            <b>history</b>
            <div class="table-responsive ">
               <table class="" id="table-3">
               <thead>
                  
                  <tr>
                     <th>Type</th>
                     <th>Route</th>
                     <th>Name</th>
                     <th>Barcode</th>
                     <th>Department</th>
                     <th>Company</th>
                     <th>Desc</th>
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
 @endsection