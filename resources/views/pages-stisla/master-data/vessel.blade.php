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

      <div class="card shadow">
               {{-- <div class="card-header">
                  <h3>Vessel List</h3>
               </div> --}}
               <div class="card-body">

                  <div class="row">
                     <div class="col-md-3">

    <!-- Master Data Info -->
    <div class="card shadow-none border mb-3">
        <div class="card-body">

            <div class="mb-3">
                <small class="text-muted d-block">Master Data</small>
                <h5 class="mb-0">
                    <i class="fas fa-ship text-primary mr-2"></i>
                    Vessel Management
                </h5>
                <small class="text-muted">
                    Manage vessel data, contracts, and export reports.
                </small>
            </div>

            <hr>

            <!-- Action Buttons -->
            <div class="d-grid gap-2">

                <a href="{{route('vessel.create')}}" class="btn btn-primary btn-block mb-2">
                    <i class="fas fa-plus mr-1"></i>
                    Add New Vessel
                </a>

                <a href="{{ route('vessel.export.pdf') }}" target="_blank" class="btn btn-danger btn-block">
                    <i class="fas fa-file-pdf mr-1"></i>
                    Export PDF
                </a>

            </div>

        </div>
    </div>


    <!-- Summary Stats -->
    <div class="card shadow-none border mb-3">
        <div class="card-body">

            <h6 class="mb-3">
                <i class="fas fa-chart-pie text-info mr-1"></i>
                Vessel Summary
            </h6>

            <!-- Under PO -->
            <div class="d-flex justify-content-between align-items-center mb-3 p-2 bg-light rounded">
                <div>
                    <small class="text-muted d-block">Under PO</small>
                    <strong>{{count($vessels->where('contract_type','Under PO'))}}</strong>
                </div>
                <i class="fas fa-file-contract text-info fa-lg"></i>
            </div>

            <!-- Non PO -->
            <div class="d-flex justify-content-between align-items-center p-2 bg-light rounded">
                <div>
                    <small class="text-muted d-block">Non PO</small>
                    <strong>{{count($vessels->where('contract_type','Non PO'))}}</strong>
                </div>
                <i class="fas fa-anchor text-primary fa-lg"></i>
            </div>

        </div>
    </div>


    <!-- Quick Note -->
    <div class="card shadow-none border">
        <div class="card-body">
            <div class="d-flex">
                <i class="fas fa-info-circle text-warning mr-2 mt-1"></i>
                <small class="text-muted">
                    Ensure vessel contract type and operational status are updated regularly for accurate reporting.
                </small>
            </div>
        </div>
    </div>

</div>
                              <div class="col-md-9">
                         <div class="d-flex justify-content-between">
                     <b><span class="text-uppercase">{{$data}}</span> Vessel List ({{count($vessels)}}) </b>
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
                           <th>Owner</th>
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
                           
                           <td>{{$vessel->office->name ?? ''}}</td>
                           <td>{{$vessel->username }}</td>
                           <td>{{$vessel->email}}</td>
                           <td>{{$vessel->type}}</td>
                           <td>
                              {{$vessel->contract_type}}

                              @if ($vessel->ipb == 'IPB')
                                  (IPB)
                              @endif

                              @if ($vessel->func != null)
                                 ({{$vessel->func}})
                              @endif
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

      <div class="row">
         
         <div class="col-md-9">
            
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