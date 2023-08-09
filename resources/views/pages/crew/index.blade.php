@extends('layouts.app')
@section('title')
   Employee
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
                  Crew List
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
                  <div class="card-header">Form Add Crew</div>
                  <form action="{{route('crew.store')}}" method="POST">
                     @csrf
                  <div class="card-body">
                     @if ($errors->any())
                        <div class="alert alert-danger text-danger">
                           <ul>
                              @foreach ($errors->all() as $error)
                                 <li><small>{{ $error }}</small></li>
                              @endforeach
                           </ul>
                        </div>
                     @endif
                     <div class="form-floating mb-3">
                        <input type="text" required class="form-control" id="name" name="name" value="{{old('name')}}" >
                        <label for="name">Name</label>
                        @error('name')
                           <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                        @enderror
                     </div>
                     <div class="row">
                        <div class="col-md-5">
                           <div class="form-floating mb-3">
                              <input type="text" required class="form-control" id="barcode" name="barcode" value="{{old('barcode')}}">
                              <label for="barcode">Barcode</label>
                           </div>
                        </div>
                        <div class="col-md-7">
                           <div class="form-floating mb-3">
                              <input type="text" required class="form-control" id="department" name="department" value="{{old('department')}}">
                              <label for="department">Department</label>
                           </div>
                        </div>
                     </div>
                     <div class="form-floating mb-3">
                        <input type="text" required class="form-control" id="company" name="company" value="{{old('company')}}">
                        <label for="company">Company</label>
                        @error('company')
                           <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                        @enderror
                     </div>
                     {{-- <div class="form-floating mb-3">
                        <input type="text" required class="form-control" id="desc" name="desc" value="{{old('desc')}}">
                        <label for="desc">Description</label>
                        @error('desc')
                           <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                        @enderror
                     </div> --}}
                     
                     <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><circle cx="12" cy="14" r="2" /><polyline points="14 4 14 8 8 8 8 4" /></svg>
                        Add
                     </button>
                  </div>
                  
                  
                  <div class="card-footer">
                     {{-- <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><circle cx="12" cy="14" r="2" /><polyline points="14 4 14 8 8 8 8 4" /></svg>
                        Save
                     </button> --}}
                     {{-- <small>Hint : after the data is stored, the user will receive a notification email containing instructions to Sign In into system</small> --}}
                  </div>

               </form>
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
                              <th>Barcode</th>
                              <th>Department</th>
                              <th>Company</th>
                              {{-- <th>Desc</th> --}}
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($crews as $crew)
                              <tr>
                                 <td class="text-center">{{++$i}}</td>
                                 <td>
                                    
                                    <div class="dropdown">
                                       <a href="#" class="dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                                          {{$crew->name}}
                                       </a>
                                       <div class="dropdown-menu dropdown-menu-end">
                                          {{-- <a class="dropdown-item" href="{{route('employee.profile', enkripRambo($crew->id))}}">
                                             Profile
                                          </a> --}}
                                          <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modalEditCrew_{{$crew->id}}">
                                             Edit
                                          </a>
                                          <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#deleteCrew_{{$crew->id}}">
                                             Delete
                                          </a>
                                       </div>
                                    </div>
                                 </td>
                                 <td>{{$crew->barcode}}</td>
                                 <td>{{$crew->department}}</td>
                                 <td>{{$crew->company}}</td>
                                 {{-- <td>{{$crew->desc}}</td> --}}
                              </tr>

                              <x-modal.crew.delete :crew="$crew" />
                              <x-modal.crew.edit :crew="$crew" />
                           @endforeach
                           <tr>
                              <td colspan="6" class="p-4"></td>
                           </tr>
                           <tr>
                              <td colspan="6" class="p-4"></td>
                           </tr>
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