@extends('layouts.stisla.app')
@section('title')
   DSP Report
@endsection

@section('content')
   <div class="section">
      <div class="section-body">
         <div class="row">
            <div class="col-md-9">
               <h5>ACTIVITY</h5>
               <hr>
               <div class="table-responsive">
                  <table class="table-sm table-striped" id="table-17">
                     <thead>     
                                                   
                     <tr>
                        {{-- <th class="text-center">
                           #
                        </th> --}}
                        <th>ID</th>
                        <th>Vessel</th>
                        <th>Date</th>
                        <th>Type</th>
                        <th>Route</th>
                        <th>Status</th>
                        {{-- <th></th> --}}
                     </tr>
                     </thead>
                     <tbody>     

                     @foreach ($requests as $req)
                        
                        <tr>
                           <td>
                              {{-- @if ($req->schedule_id) --}}
                              <a href="{{route('request.detail.new', enkripRambo($req->id))}}">{{$req->code}}</a> 
                              {{-- @else
                              -
                              @endif --}}
                              
                              
                           </td>
                           <td>
                              @if ($req->schedule_id)
                              <a href="{{route('schedule.detail', enkripRambo($req->schedule_id))}}">{{$req->schedule->vessel->name ?? 'Vessel Empty'}} </a>
                              
                              @else
                              -
                              @endif
                           </td>
                           <td>
                              {{-- @if ($req->schedule_id) --}}
                              {{\Carbon\Carbon::parse($req->date)->format('d/m/Y')}}
                              {{-- @else
                              -
                              @endif --}}
                           </td>
                           <td>{{$req->desc}}</td>
                           <td>{{$req->origin->code}} - {{$req->destination->code}}</td>
                           
                           <td>
                              <x-status-stisla.request-plain :request="$req" />
                           </td>
                        </tr>
                     @endforeach   
                     </tbody>
                  </table>
               </div>
            </div>
            <div class="col-md-3">
               <div class="badge badge-info mb-2">Form Filter</div>
               <form action="{{route('schedule.progress.filter')}}" method="POST">
                  @csrf
                  {{-- <div class="form-group"> --}}
                     {{-- <input type="date" name="start" id="start" value="{{$start}}" hidden> --}}
                     {{-- <input type="date" name="end" id="end" value="{{$end}}" hidden> --}}
                     <select name="vessel" id="vessel" required class="form-control mb-2">
                        <option value="" selected disabled>Select Vessel</option>
                        @foreach ($vessels as $vessel)
                              <option value="{{$vessel->id}}">{{$vessel->name}}</option>
                        @endforeach
                     </select>
                  {{-- </div> --}}
                  {{-- <div class="form-group"> --}}
                     {{-- <div class="form-group"> --}}
                        <div class="input-group mb-2">
                           <input type="date" required class="form-control" name="start" id="start" value="">
                           {{-- <span class="mx-2 mt-3">To</span> --}}
                           <input type="date" required class="form-control" name="end" id="end" value="">
                           
                        </div>
                     {{-- </div> --}}
                     <div class="input-group mb-3">
                        <select name="activity" id="activity" required class="form-control">
                           <option value="" selected disabled>Select Activity</option>
                           @foreach ($activities as $act)
                                 <option value="{{$act->id}}">{{$act->name}}</option>
                           @endforeach
                        </select>
                        <div class="input-group-append">
                           <button class="btn btn-light border btn-block " type="submit">Create</button>
                        </div>
                     </div>
                  {{-- </div> --}}
               </form>

               <hr>
               <table>
                  <tbody>
                     <tr>
                        <th colspan="2">Result</th>
                     </tr>
                     <tr>
                        <td class="">Vessel</td>
                        <td>{{$vesselName}}</td>
                     </tr>
                     <tr>
                        <td class="">Date</td>
                        <td>{{$date}}</td>
                     </tr>
                     <tr>
                        <td class="">Activity</td>
                        <td>{{$activity}}</td>
                     </tr>
                     <tr>
                        <td class="">Qty</td>
                        <td>{{$qty}} Activity</td>
                     </tr>
                     
                  </tbody>
               </table>
               <hr>
               {{-- <a href="" class="btn btn-light shadow-none border btn-sm">
                  <i class="fa fa-print"></i> Export PDF
               </a> --}}
            </div>
         </div>
      </div>
   </div>
   
   
   
@endsection