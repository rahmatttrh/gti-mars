@extends('layouts.app')
@section('title')
   Employee Detail
@endsection
@section('content')
   <div class="container-xl">
      <!-- Page title -->
      <div class="page-header d-print-none">
         <div class="row align-items-center">
            <div class="col">
               <!-- Page pre-title -->
               <div class="page-pretitle">
                  Overview
               </div>
               <h2 class="page-title">
                  Employee Detail
               </h2>
            </div>
            <!-- Page title actions -->
            {{-- <div class="col-auto ms-auto d-print-none">
               <div class="btn-list">
                  <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-add-port">
                     <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                     Create new port
                  </a>
                  <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
                     <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                  </a>
               </div>
            </div> --}}
         </div>
      </div>
   </div>
   <div class="page-body">
      <div class="container-xl">
         <div class="row">
            <div class="col-md-4">
               <div class="card">
                  <div class="card-body text-center">
                    <div class="mb-3">
                      <span class="avatar avatar-xl avatar-rounded" style="background-image: url({{asset('img/flaticon/worker.png')}})"></span>
                    </div>
                    <div class="card-title mb-1">{{$employee->name}}</div>
                    <div class="text-muted">{{$employee->department->name}}</div>
                    
                  </div>
                  {{-- <a href="#" class="card-btn">View full profile</a> --}}
                  <div class="card-footer">
                     <dl class="row">
                        <dt class="col-4">Location</dt>
                        <dd class="col-8">{{$employee->port->name}}</dd>
                        <dt class="col-4">Email</dt>
                        <dd class="col-8">{{$employee->email}}</dd>
                        <dt class="col-4">Extension</dt>
                        <dd class="col-8">{{$employee->ekstensi}}</dd>
                     </dl>
                  </div>
               </div>
            </div>
            <div class="col-md-8 ">
               <div class="card">
                  <div class="table-responsive">
                     <table  class="table " >
                        <thead>
                           <tr>
                              <th class="text-center">No.</th>
                              <th>Name</th>
                              <th>Department</th>
                              <th>Loc</th>
                              <th>Email</th>
                              <th>Ekstensi</th>
                           </tr>
                        </thead>
                        <tbody>

                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
         
         {{-- <div class="card">
            <div class="list-group list-group-flush ">
               @foreach ($ports as $port)
                  <div class="list-group-item">
                     <div class="row">
                        <div class="col-auto">
                           <a href="{{route('port.detail', enkripRambo($port->id))}}">
                              <span class="avatar" style="background-image: url(./static/avatars/023f.jpg)"><!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                                 <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="11" r="3" /><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" /></svg></span>
                           </a>
                           </div>
                           <div class="col text-truncate">
                           <a href="{{route('port.detail', enkripRambo($port->id))}}" class="text-body d-block">{{$port->name}}</a>
                           <div class="text-muted text-truncate mt-n1"><small>{{$port->type}}</small></div>
                        </div>
                     </div>
                  </div>
               @endforeach
            </div>
         </div> --}}
      </div>
   </div>
@endsection