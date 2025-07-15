@extends('layouts.stisla.app-main')
@section('title')
   Vessel
@endsection

@section('content')
<section class="section">
    {{-- <div class="section-header">
      <h1 class="section-title">Vessel</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item ">Dashboard</div>
        <div class="breadcrumb-item active">Vessel</div>
      </div>
    </div> --}}

    <div class="section-body">
      {{-- <h2 class="section-title">Schedule Plan</h2>
      <p class="section-lead">
        We use 'DataTables' made by @SpryMedia. You can check the full documentation <a href="https://datatables.net/">here</a>.
      </p> --}}

      <div class="row">
         <div class="col-md-3">
            
             <div class="section-header">
               
               <div class="breadcrumb-item ">Master Data</div>
               <div class="breadcrumb-item active">Vessel</div>
              
            </div>
            <a href="{{route('vessel.create')}}" class="btn btn-primary btn-block"><i class=" fas fa-plus"></i> Add New Vessel</a>
            <hr>
            <div class="card card-statistic-1 shadow-lg">
               <a href="{{route('vdr.marine.validation')}}">
                  <div class="card-icon bg-info">
                  <i class="fas fa-ship"></i>
                  </div>
                  <div class="card-wrap">
                     <div class="card-header">
                        
                        <h4>Under PO</h4>
                     </div>
                     <div class="card-body">
                        {{count($vessels->where('contract_type', 'Under PO'))}}
                     </div>
                  </div>
               </a>
            </div>
            <div class="card card-statistic-1 shadow-lg">
               <a href="{{route('vdr.marine.validation')}}">
                  <div class="card-icon bg-warning">
                  <i class="fas fa-ship"></i>
                  </div>
                  <div class="card-wrap">
                  <div class="card-header">
                     
                     <h4>Non PO</h4>
                  </div>
                  <div class="card-body">
                     {{count($vessels->where('contract_type', 'Non PO'))}}
                  </div>
                  </div>
               </a>
            </div>
            {{-- <div class="card shadow">
               <div class="card-body">
                  <b>Form Add Vessel</b>
               <hr>
            
               <form action="{{route('vessel.store')}}" method="POST">
                  @csrf
                  <input type="text" name="name" id="name" class="form-control mb-2" placeholder="Vessel name...">
                  <input type="text" name="type" id="type" class="form-control mb-2" placeholder="Vessel type...">
                  <input type="email" name="email" id="email" class="form-control mb-2" placeholder="Email...">
                  <input type="text" name="username" id="username" class="form-control" placeholder="Username...">
                  <hr>
                  <button type="submit" class="btn btn-info">Create New</button>
               </form>
               </div>
            </div> --}}
         </div>
         <div class="col-md-9">
            <div class="card shadow">
               {{-- <div class="card-header">
                  <h3>Vessel List</h3>
               </div> --}}
               <div class="card-body">
                  <div class="d-flex justify-content-between">
                     <h3><span class="text-uppercase">{{$data}}</span> Vessel List</h3>
                     @if ($data == 'onhire')
                        <a href="{{route('vessel.offhire.list')}}"> Off Hire Vessel</a>
                         @else
                         <a href="{{route('vessel')}}"> On Hire Vessel</a>
                     @endif
                     
                  </div>
                  
                  <hr>
                  <div class="table-responsive">
                     <table class=" table-striped " id="table-4">
                     <thead>
                        <tr>
                           {{-- <th class="text-center">No.</th> --}}
                           <th>Name</th>
                           <th>Username</th>
                           <th>Email</th>
                           <th>Type</th>
                           <th>PO</th>
                           <th>Status</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($vessels as $vessel)
                        <tr>
                           {{-- <td class="text-center">{{++$i}}</td> --}}
                           <td><a href="{{route('vessel.detail', enkripRambo($vessel->id))}}">{{$vessel->name}}</a> </td>
                           <td>{{$vessel->username }}</td>
                           <td>{{$vessel->email}}</td>
                           <td>{{$vessel->type}}</td>
                           <td>
                              {{$vessel->contract_type}}
                           </td>
                           <td>
                              {{-- @if ($vessel->status == 0)
                                 <span class="badge badge-light">Off Hire</span>
                                 @elseif($vessel->status == 1)
                                 <span class="badge badge-primary" >On Hire</span>
                                 @elseif($vessel->status == 2)
                                 <span class="badge badge-warning" >Maintenance</span>
                              @endif --}}
      
                              @if ($vessel->status == 0)
                                 <a href="#" class="badge badge-light" data-toggle="modal" data-target="#vessel-onhire-{{$vessel->id}}">Off Hire</a>
                                 @elseif($vessel->status == 1)
                                 <a href="#" class="badge badge-primary" data-toggle="modal" data-target="#vessel-offhire-{{$vessel->id}}">On Hire</a>
                              @endif
                           </td>
                        </tr>
                        @endforeach
                        
                     </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
    </div>
  </section>


  @foreach ($vessels as $vessel)
  <div class="modal fade" id="vessel-onhire-{{$vessel->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirm On Hire</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Change Status of {{$vessel->name}} to On Hire?
        </div>
        <div class="modal-footer bg-whitesmoke">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a href="{{route('vessel.onhire', enkripRambo($vessel->id))}}" class="btn btn-primary">On</a>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="vessel-offhire-{{$vessel->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirm Off Hire</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Change Status of {{$vessel->name}} to Off Hire?
        </div>
        <div class="modal-footer bg-whitesmoke">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a href="{{route('vessel.offhire', enkripRambo($vessel->id))}}" class="btn btn-primary">Off</a>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  
    
@endsection