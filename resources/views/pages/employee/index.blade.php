@extends('layouts.app')
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
               Employee
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
                  <form action="{{route('employee.store')}}" method="POST">
                     @csrf
                  <div class="card-body">
                     <div class="row">
                        <div class="col">
                           <div class="form-floating mb-3">
                              <select required name="department" id="department" class="form-select">
                                 <option  disabled selected>Choose</option>
                                 @foreach ($departments as $department)
                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                 @endforeach
                              </select>
                              <label for="department">Department</label>
                           </div>
                        </div>
                        <div class="col">
                           <div class="form-floating mb-3">
                              <select required name="port" id="port" class="form-select">
                                 <option  disabled selected>Choose</option>
                                 @foreach ($ports as $port)
                                    <option value="{{$port->id}}">{{$port->name}}</option>
                                 @endforeach
                              </select>
                              <label for="port">Location</label>
                           </div>
                        </div>
                     </div>
                     <div class="form-floating mb-3">
                        <input type="text" required class="form-control" id="name" name="name" >
                        <label for="name">Name</label>
                     </div>
                     <div class="form-floating mb-3">
                        <input type="email" required class="form-control" id="email" name="email" >
                        <label for="email">Email</label>
                     </div>
                     <div class="form-floating mb-3">
                        <input type="string" required class="form-control" id="ekstensi" name="ekstensi" >
                        <label for="ekstensi">Ekstensi</label>
                     </div>
                  </div>
                  
                  <div class="card-footer">
                     <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><circle cx="12" cy="14" r="2" /><polyline points="14 4 14 8 8 8 8 4" /></svg>
                        Save
                     </button>
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
                              <th>Department</th>
                              <th>Loc</th>
                              <th>Email</th>
                              <th>Ekstensi</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($employees as $employee)
                              <tr>
                                 <td class="text-center">{{++$i}}</td>
                                 <td>
                                    <div class="dropdown">
                                       <a href="#" class="dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                                          {{$employee->name}}
                                       </a>
                                       <div class="dropdown-menu dropdown-menu-end">
                                          <a class="dropdown-item" href="#">
                                             Edit
                                          </a>
                                          <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#deleteEmployee_{{$employee->id}}">
                                             Delete
                                          </a>
                                       </div>
                                    </div>
                                 </td>
                                 <td>{{$employee->department->name}}</td>
                                 <td>{{$employee->port->name}}</td>
                                 <td>{{$employee->email}}</td>
                                 <td>{{$employee->ekstensi}}</td>
                              </tr>

                              <x-modal.employee.delete :employee="$employee" />
                           @endforeach
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
   <x-modal.add-port />
@endsection