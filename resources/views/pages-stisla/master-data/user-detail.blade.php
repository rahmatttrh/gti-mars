@extends('layouts.stisla.app')
@section('title')
    User Detail
@endsection
@section('content')
<section class="section">
   <div class="section-header">
      <h1 class="section-title">User Detail</h1>
      <div class="section-header-breadcrumb">
         <div class="breadcrumb-item "><a href="#">Dashboard</a></div>
         <div class="breadcrumb-item active">User Detail</div>
      </div>
   </div>

   <div class="section-body">
      <div class="row">
         <div class="col-md-4">
            <div class="card profile-widget">
               <div class="profile-widget-header">                     
                  <img alt="image" src="{{asset('stisla/img/avatar/avatar-1.png')}}" class="rounded-circle profile-widget-picture">
                  <div class="profile-widget-items">
                     <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Name</div>
                        <div class="profile-widget-item-value">{{$employee->name}}</div>
                     </div>
                  </div>
               </div>
               <div class="profile-widget-description">
                 <small>Port</small><br>
                 <b>{{$employee->port->name}} {{$employee->port->region ?? ''}}</b>
                 <hr>
                 <small>Email / Username</small><br>
                 <b>{{$employee->email}} / {{$employee->username}}</b>
                 <hr>
                 <small>Ekstensi</small><br>
                 <b>{{$employee->ekstensi}}</b>
                 <hr>
               </div>
               {{-- <div class="card-footer text-center">
                  <div class="font-weight-bold mb-2">Follow Ujang On</div>
                  <a href="#" class="btn btn-social-icon btn-facebook mr-1">
                     <i class="fab fa-facebook-f"></i>
                  </a>
                  <a href="#" class="btn btn-social-icon btn-twitter mr-1">
                     <i class="fab fa-twitter"></i>
                  </a>
                  <a href="#" class="btn btn-social-icon btn-github mr-1">
                     <i class="fab fa-github"></i>
                  </a>
                  <a href="#" class="btn btn-social-icon btn-instagram">
                     <i class="fab fa-instagram"></i>
                  </a>
               </div> --}}
            </div>
         </div>
         <div class="col-md-8">
            <div class="card">
               <form method="post" class="needs-validation" novalidate="">
               <div class="card-header">
                  <h4>History Request Activity</h4>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table table-striped" id="table-1">
                         <thead>
                             <tr>
                                <th class="text-center">No.</th>
                                <th>ID</th>
                                {{-- <th>Picup Point</th> --}}
                                
                                <th>Date</th>
                                <th>Activity</th>
                                <th>Route</th>
                                <th>Status</th>
                             </tr>
                          </thead>
                          <tbody>
                             @if ($histories->count() > 0)
                                @foreach ($histories as $request)
                                   <tr>
                                      <td class="text-center">{{++$i}}</td>
                                      <td><a href="{{route('request.detail', enkripRambo($request->id))}}">{{$request->code}}</a></td>
                                      {{-- <td><a href="{{route('request.detail.parent', enkripRambo($request->parent_id))}}"> {{$request->parent->origin->name}}</a></td> --}}
                                      {{-- <td> {{$request->parent->origin->name}}</td> --}}
                                      
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
                                   <td colspan="6" style="text-align: center"><small>Emtpy</small></td>
                                </tr>
                             @endif
                             
                          </tbody>
                     </table>
                   </div>
               </div>
               <div class="card-footer text-right">
                  {{-- <button class="btn btn-primary">Save Changes</button> --}}
               </div>
               </form>
            </div>
         </div>
      </div>
    </div>
</section>



 
  
    
@endsection