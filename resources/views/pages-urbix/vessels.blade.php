@extends('layouts.urbix.app')
@section('title')
    Dashboard
@endsection

@section('content')
   <div class="container-fluid">

         <div class="main-breadcrumb d-flex align-items-center my-3 position-relative">
            <h2 class="breadcrumb-title mb-0 flex-grow-1 fs-14">Vessel List</h2>
            {{-- <div class="dropdown breadcrumb-title mb-0 flex-grow-1 fs-14">
               <a href="#" class=" dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
               June
               </a>
               <ul class="dropdown-menu">
               <li><a class="dropdown-item" href="javascript:void(0)">May</a></li>
               <li><a class="dropdown-item" href="javascript:void(0)">April</a></li>
               <li><a class="dropdown-item" href="javascript:void(0)">March</a></li>
               </ul>
            </div> --}}
            <div class="flex-shrink-0">
               <nav aria-label="breadcrumb">
                     <ol class="breadcrumb justify-content-end mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Vessel List</li>
                     </ol>
               </nav>
            </div>
         </div>


         <div class="card">
            <!--start::card-->
            {{-- <div class="card-header">
                <h5 class="card-title mb-0"> Buttons Datatables </h5>
            </div> --}}
            <div class="card-body">
                {{-- <p class="text-muted mb-4">Create a modal view using Bootstrap by adding a <code>&lt;div class="modal"&gt;</code> container. Use <code>.modal-dialog</code> and <code>.modal-content</code> to structure the modal, and trigger it with buttons or links using <code>data-bs-toggle="modal"</code>.</p> --}}
                <!-- start:: Buttons Datatables -->
                <table id="buttons-datatables" class="table table-nowrap table-sm table-striped table-bordered w-100">
                    <thead>
                        <tr>
                            <th>Vessel Name</th>
                            <th>Type</th>
                            <th>Status</th>
                            {{-- <th>Phone</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vessels as $vessel)
                            <tr>
                              <td><a href="/">{{$vessel->name}}</a></td>
                              <td>{{$vessel->type}}</td>
                              <td>
                                 @if ($vessel->status == 0)
                                    <span class="badge bg-light">Off Hire</span>
                                    @elseif($vessel->status == 1)
                                    <span class="badge bg-primary" >On Hire</span>
                                    @elseif($vessel->status == 2)
                                    <span class="badge bg-warning" >Maintenance</span>
                                 @endif
                              </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- end:: Buttons Datatables -->
            </div>
        </div>
         
      
   </div><!--End container-fluid-->


       
@endsection