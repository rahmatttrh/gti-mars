@extends('layouts.stisla.app')
@section('title')
   DSP Progress Request
@endsection
@section('content')
<style>
    .vessel-card {
        border: none;
        border-radius: 15px;
        transition: 0.3s;
        overflow: hidden;
    }
    
    .vessel-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }
    
    .vessel-header {
        background: linear-gradient(135deg, #0d6efd, #0dcaf0);
        color: white;
        padding: 15px;
    }
    
    .vessel-icon {
        font-size: 30px;
    }
    
    .vessel-body {
        padding: 15px;
    }
    
    .vessel-item {
        display: flex;
        justify-content: space-between;
        margin-bottom: 8px;
        font-size: 14px;
    }
    
    .vessel-label {
        color: #6c757d;
    }
    
    .vessel-value {
        font-weight: 600;
    }
    
    .vessel-footer {
        padding: 12px 15px;
        background: #f8f9fa;
        display: flex;
        justify-content: space-between;
    }
    </style>
<section class="section">
    {{-- <div class="section-header">
      <h1 class="section-title">All Request</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item "><a href="{{route('dsp.vessel')}}">Dashboard</a></div>
        <div class="breadcrumb-item active">All Request</div>
      </div>
    </div> --}}

    <div class="section-body">
      <div class="row">
        <div class="col-md-3">
            <div class="card vessel-card">

                <!-- HEADER -->
                <div class="vessel-header d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-0">{{ $vessel->name }}</h5>
                        <small>{{ $vessel->office->name ?? 'Company' }}</small>
                    </div>
                    <div class="vessel-icon">
                        <i class="fa fa-ship"></i>
                    </div>
                </div>
    
                <!-- BODY -->
                <div class="vessel-body">
    
                    <div class="vessel-item">
                        <span class="vessel-label">Tipe Kapal</span>
                        <span class="vessel-value">{{ $vessel->type }}</span>
                    </div>
                    <div class="vessel-item">
                        <span class="vessel-label">Tipe Kontrak</span>
                        <span class="vessel-value">{{ $vessel->contract_type }} {{$vessel->ipb}}</span>
                    </div>
    
                    <div class="vessel-item">
                        <span class="vessel-label">Kapasitas</span>
                        <span class="vessel-value">{{ $vessel->capacity ?? 'N/A' }}</span>
                    </div>
    
                    <div class="vessel-item">
                        <span class="vessel-label">Status</span>
                        @if ($vessel->status == 1)
                        <span class="badge bg-success">On Hire</span>
                            @else
                            <span class="badge bg-danger">Off Hire</span>
                        @endif
                        
                    </div>
    
                </div>
    
                <!-- FOOTER -->
                <div class="vessel-footer">
                  <a href="{{ route('vessel.detail', enkripRambo($vessel->id)) }}"  class="btn btn-sm btn-outline-primary"><i class="fa fa-eye"></i> Detail</a>
                    {{-- <button class="btn btn-sm btn-outline-primary">
                        
                    </button> --}}
    
                    <button class="btn btn-sm btn-primary">
                        <i class="fa fa-plus"></i> Assign
                    </button>
                </div>
    
              </div>

          
        </div>



        <div class="col-md-9">
            <div class="card">
              <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Activity Progress</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">History</a>
                    </li>
                    

                    
                </ul>

                    <div class="tab-content" id="myTabContent">
                     <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="table-responsive">
                          
                            <table class="table table-sm table-striped border " >
                                <thead>
                                  <tr>
                                    <th class="border">Route</th>
                                      <th class="border">Item</th>
                                      <th class="border">Qty</th>
                                      
                                      <th class="border">Unit</th>
                                      <th class="border">Weight</th>
                                      
                                      <th class="border">Estimasi</th>
                                      <th class="border">Status</th>
                                      <th class="border">Option</th>
                                    
                                  </tr>
                                </thead>
                                <tbody class="" id="myAccordion">

                                  
                                      @foreach ($requestVessels as $item)
                                          


                                          @if (count($item->cargoItems) > 0)
                                            
                                            @foreach ($item->cargoItems as $cargo)
                                            <tr>
                                              <td class="border">{{$cargo->request->origin->code}} - {{$cargo->request->destination->code}}</td>
                                                <td class="border" >{{ $cargo->request->description }} {{$cargo->description}}</td>
                                                <td class="border">{{$cargo->qty}}</td>
                                                
                                                <td class="border">{{$cargo->unit}}</td>
                                                <td class="border">{{$cargo->weight}}</td>
                                                
                                                <td class="border">
                                                  @foreach ($cargo->request->vessels as $v)
                                                      <span class="btn btn-sm btn-light shadow-none">{{formatDate($v->date)}}</span>
                                                  @endforeach
                                                </td>
                                                <td class="border">
                                                  <x-status-stisla.request-plain :request="$cargo->request" />
                                                </td>
                                                <td class="border">
                                                    <div class="btn-group">
                                                      <a href="" class="btn btn-sm btn-primary shadow-none"><i class="fas fa-edit"></i> Update</a>
                                                      {{-- <a href="" class="btn btn-sm btn-success shadow-none"><i class="fas fa-check"></i> Complete</a> --}}
                                                    </div>
                                                </td>
                                              
                                            </tr>
                                                {{-- <a data-toggle="collapse" href="#formItemEdit-{{$cargo->id}}">{{$cargo->description}}</a>, --}}
                                            @endforeach
                                              
                                          @endif

                                          @if (count($item->cargoItems) == 0)
                                            
                                            <tr>
                                              <td class="border">{{$item->origin->code}} - {{$item->destination->code}}</td>
                                                <td class="border" colspan="4" >{{$item->description}}</td>
                                                
                                                
                                                <td class="border">
                                                  @foreach ($item->vessels as $v)
                                                      <span class="btn btn-sm btn-light shadow-none">{{formatDate($v->date)}}</span>
                                                  @endforeach
                                                </td>
                                                <td class="border">
                                                  <x-status-stisla.request-plain :request="$item" />
                                                </td>
                                                <td class="border">
                                                    <div class="btn-group">
                                                      <a href="" class="btn btn-sm btn-primary shadow-none"><i class="fas fa-edit"></i> Update</a>
                                                      {{-- <a href="" class="btn btn-sm btn-success shadow-none"><i class="fas fa-check"></i> Complete</a> --}}
                                                    </div>
                                                </td>
                                              
                                            </tr>
                                                {{-- <a data-toggle="collapse" href="#formItemEdit-{{$cargo->id}}">{{$cargo->description}}</a>, --}}
                                           
                                              
                                          @endif
                                          
                                      @endforeach

                                  </tbody>
                            </table>
                        </div>

                        <div class="my-2">
                                 <small><b>Note: </b> Klik "Update" untuk melakukan report kegiatan atas activity</small>
                              </div>
                                              
                        
                        
                     </div>

                     <div class="tab-pane fade " id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        
                     </div>


                     
                     
                  </div>
                </ul>


              </div>
            </div>
          </div>
      </div>
      
      
    </div>
  </section>
    
@endsection