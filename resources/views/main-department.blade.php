@extends('layouts.stisla.app-main')
@section('title')
   Home Page
@endsection

@section('content')
<style>
  table.no-border {
    border-collapse: collapse;
    border: none !important;
  }

  table.no-border th,
  table.no-border td {
    border: none !important;
  }

  table.no-border tr {
    border-bottom: 1px solid #ddd; /* garis horizontal */
  }

  table.no-border tr:last-child {
    border-bottom: none;
  }
</style>
<style>
   table {
      width: 100%;
   }

   table, th, td {
      border: 1px solid rgb(226, 218, 218);
      border-collapse: collapse;
   }
   th, td {
      padding-left: 5px
   }

   .scrolling-body {
        max-height: 500px;
        overflow: hidden;
        position: relative;
      }

      .scrolling-body table {
        animation: scrollUp 15s linear infinite;
      }

      @keyframes scrollUp {
        0% {
          transform: translateY(0);
        }

        100% {
          transform: translateY(-50%);
        }
      }
      thead th {
        position: sticky;
        top: 0;
        
        z-index: 10;
      }
</style>

<style id="x9m2qa">
   .timeline-wrapper {
       max-height: 250px; /* tinggi area scroll */
       overflow-y: auto;
       padding-right: 10px;
   }
   
   .timeline {
       position: relative;
       padding-left: 30px;
       border-left: 2px solid #dee2e6;
   }
   
   .timeline-item {
       position: relative;
       margin-bottom: 7px;
   }
   
   .timeline-item::before {
       content: "";
       position: absolute;
       left: -10px;
       top: 5px;
       width: 15px;
       height: 15px;
       background: #0d6efd;
       border-radius: 50%;
   }
   
   .timeline-content {
       padding: 10px;
       background: #f8f9fa;
       border-radius: 10px;
   }
   </style>


   <section class="section">
      <div class="section-body">
         <div class="px-1">
            <div class="row">
               <div class="col-md-3">
                  {{-- <div class="card bg-primary shadow">
                     <div class="card-body ">
                        
                        <i class="fa fa-user"></i> Welcome back, <br> <b> <h2>{{auth()->user()->name}}</h2></b>
                       
                     </div>
                  </div> --}}

                  <div class="card welcome-card shadow">

                     <div class="card-body position-relative">

                        <!-- ICON BESAR -->
                        <i class="fas fa-user welcome-icon"></i>

                        <!-- HEADER -->
                        <div class="mb-2">
                              <small class="text-light">Welcome back 👋</small>
                              <h4 class="mb-0 fw-bold">
                                 {{ auth()->user()->name }}
                              </h4>
                        </div>

                        <!-- DIVIDER -->
                        <div class="divider"></div>

                        <!-- PIC -->
                        

                     </div>

                  </div>

                  


                  <div class="card">
                     
                     <div class="card-body  ">
                        <div class=" mb-2">
                           <div class="badge badge-info">RECENT INTERMILAN</div>
                        </div>
                        
                        
                        <div class="table-responsive ">
                           <table class="no-border">
                              <thead>
                                 <tr>
                                    {{-- <th>#</th> --}}
                                    {{-- <th>ID</th> --}}
                                    {{-- <th>Title</th> --}}
                                    <th style="display: none">Periode</th>
                                    <th style="display: none">Time</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach ($intermilans as $int)
                                     <tr>
                                       {{-- <td style="width: 30" >{{++$i}}</td> --}}
                                       {{-- <td><a href="{{route('intermilan.user.detail', enkripRambo($int->id))}}">{{$int->code}}</a> </td> --}}
                                       {{-- <td>{{$int->title}}</td> --}}
                                       <td>
                                          <a href="{{route('intermilan.marine.detail', enkripRambo($int->id))}}">{{formatDate($int->from)}} - {{formatDate($int->to)}}</a>
                                          
                                       </td>
                                       <td style="display: none">{{$int->created_at}}</td>
                                     </tr>
                                 @endforeach
                              </tbody>
                           </table>
                        </div>
                        

                     </div>
                  </div>

                  <div class="timeline-wrapper mb-3">

                     <div class="timeline">

                         @foreach ($timelines as $time)
                           <div class="timeline-item ">
                              <div class="timeline-content">
                                 <small class="mb-1">
                                      <b> <i class="fa fa-check-circle text-success"></i> {{ $time->activity }}</b>
                                 </small> <br>
                                 <small class="text-muted">{{ formatDateTime($time->created_at) }} {{$time->user->name}}</small>
                                 <br>
                                    <small>
                                    {{ $time->request->description }}

                                             @if (count($time->request->cargoItems) > 0)
                                             (
                                                @foreach ($time->request->cargoItems as $cargo)
                                                   {{$cargo->description}},
                                                @endforeach
                                             )
                                             @endif
                                             </small>
                                          
                              </div>
                           </div>
                           @endforeach

                          

                     </div>

                  </div>

                  
                  {{-- <div class="card">
                     <div class="card-body">
                        <a  data-toggle="collapse" href="#collapseFormIntermilan">Klik Disini</a> untuk membuat Intermilan baru
                     </div>
                  </div> --}}
                  {{-- <a href="" class="btn btn-block  bg-white border btn-lg">Create Intermilan</a> --}}
               </div>

               <div class="col-md-9">

                  <div class="card ">
               
                     <div class="card-body">
                        <div class="d-flex border-bottom pb-2  align-items-center">
                           <div class="">
                              <span class="btn btn-white border"><i class="fa fa-calendar-alt"></i> <b>MONTHLY ACTIVITY PLAN</b></span>
                              
                              <div class="btn-group dropright ">
                                 <button type="button" class="btn btn-light border shadow-none dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 {{$monthName}}
                                 </button>
                                 <div class="dropdown-menu dropright">
                                    <a class="dropdown-item" href="{{route('intermilan.user.detail.month', [enkripRambo(01), enkripRambo($year)])}}">
                                       Januari
                                    </a>
                                    <a class="dropdown-item" href="{{route('intermilan.user.detail.month', [enkripRambo(02), enkripRambo($year)])}}">
                                       Februari
                                    </a>
                                    <a class="dropdown-item" href="{{route('intermilan.user.detail.month', [enkripRambo(03), enkripRambo($year)])}}">
                                       Maret
                                    </a>
                                    <a class="dropdown-item" href="{{route('intermilan.user.detail.month', [enkripRambo(04), enkripRambo($year)])}}">
                                       April
                                    </a>
                                    <a class="dropdown-item" href="{{route('intermilan.user.detail.month', [enkripRambo(05), enkripRambo($year)])}}">
                                       Mei
                                    </a>
                                    <a class="dropdown-item" href="{{route('intermilan.user.detail.month', [enkripRambo(06), enkripRambo($year)])}}">
                                       Juni
                                    </a>
                                    <a class="dropdown-item" href="{{route('intermilan.user.detail.month', [enkripRambo(07), enkripRambo($year)])}}">
                                       Juli
                                    </a>
                                    <a class="dropdown-item" href="{{route('intermilan.user.detail.month', [enkripRambo(8), enkripRambo($year)])}}">
                                       Agustus
                                    </a>
                                    <a class="dropdown-item" href="{{route('intermilan.user.detail.month', [enkripRambo(9), enkripRambo($year)])}}">
                                       September
                                    </a>
                                    <a class="dropdown-item" href="{{route('intermilan.user.detail.month', [enkripRambo(10), enkripRambo($year)])}}">
                                       Oktober
                                    </a>
                                    <a class="dropdown-item" href="{{route('intermilan.user.detail.month', [enkripRambo(11), enkripRambo($year)])}}">
                                       November
                                    </a>
                                    <a class="dropdown-item" href="{{route('intermilan.user.detail.month', [enkripRambo(12), enkripRambo($year)])}}">
                                       Desember
                                    </a>
                                 </div>
                              </div>
                              <div class="btn-group dropright">
                                 <button type="button" class="btn btn-light border shadow-none dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 {{$year}}
                                 </button>
                                 <div class="dropdown-menu dropright">
                                    <a class="dropdown-item" href="{{route('dsp.user', [enkripRambo($month), enkripRambo(2024)])}}">
                                       2024
                                    </a>
                                    <a class="dropdown-item" href="{{route('dsp.user', [enkripRambo($month), enkripRambo(2023)])}}">
                                       2023
                                    </a>
                                    <a class="dropdown-item" href="{{route('dsp.user', [enkripRambo($month), enkripRambo(2022)])}}">
                                       2022
                                    </a>
                                 </div>
                              </div>
                              <a href="{{route('dsp.user', [enkripRambo(auth()->user()->getMonth()), enkripRambo(auth()->user()->getYear())])}}" class="btn text-white " style="background-color: rgb(76, 76, 122) !important"><i class="fa fa-route"></i> Tracking Material</a>
                 
                           </div>
                           
                           
                        </div>

                        {{-- <table>
                           <tbody>
                              @foreach ($dates as $date)
                                 <tr>
                                    <td>{{$date->format('Y-m-d')}}</td>
                                    <td></td>
                                 </tr>
                                  
                              @endforeach
                           </tbody>
                        </table> --}}
                        
                        
                        {{-- <ul class="nav nav-tabs pb-3" id="myTab" role="tablist">
                           @foreach ($dates as $date)
                           <li class="nav-item">
                              @if ($allRequests->where('date', $date->format('Y-m-d'))->first() != null)
                              <a class="nav-link btn btn-sm btn-danger text-white mx-1 my-1" style="width: 100px !important"  id="date-{{$date->format('d')}}-tab" data-toggle="tab" href="#date-{{$date->format('d')}}" role="tab" aria-controls="date-{{$date->format('d')}}" aria-selected="true">
                                
                                    {{$date->format('d')}}
                              </a>
                              @else 
                              <a class="nav-link btn btn-sm btn-info text-white mx-1 my-1"  id="date-{{$date->format('d')}}-tab" data-toggle="tab" href="#date-{{$date->format('d')}}" role="tab" aria-controls="date-{{$date->format('d')}}" aria-selected="true">
                                 
                                    {{$date->format('d')}}
                              </a>

                               <a class="nav-link btn btn-sm btn-info text-white mx-1 my-1"   href="{{ route('intermilan.user.detail.date', [enkripRambo($date->format('Y-m-d')),enkripRambo($month), enkripRambo($year)]) }}" role="tab"  aria-selected="true">
                                 
                                    {{$date->format('d')}}
                              </a>
                              @endif
                           </li>
                           @endforeach
                           
                        </ul> --}}
                        <div class="mb-2">
                            <small > <b>Note: </b> Klik pada tanggal di bawah ini untuk melihat detail Activity Plan pada tanggal tersebut. Tanggal yang ditandai dengan ikon <b>Bintang</b> (<i class="fa fa-star"></i>) menunjukkan bahwa sudah terdapat Activity Plan yang telah dibuat atau dijadwalkan pada tanggal tersebut.</small>
                        </div>
                        
                       
                        @foreach ($dates as $d)
                           
                              

                               <a class="btn mb-1 btn-info {{ $date->format('d') == $d->format('d') ? 'active' : '' }}"   href="{{ route('intermilan.user.detail.date', [enkripRambo($d->format('Y-m-d')),enkripRambo($month), enkripRambo($year)]) }}" role="tab"  aria-selected="true">
                                 
                                    {{$d->format('d')}}
                                    <x-intermilan.user-date :date="$d->format('Y-m-d')" />
                              </a>
                              {{-- @endif --}}
                           
                           @endforeach
                           <div class="mb-3"></div>

                        @if ($date != null)

                        <div class="badge badge-primary" style="background-color: rgb(33, 77, 165)134, 134, 226) !important">
                           <i class="fas fa-clock"></i>
                           {{$date->format('l, d F Y')}}
                        </div>
                        <div class="my-1">
                            <small > <b>Note: </b> Form Pengajuan Activity Plan </small>
                        </div>
                        <form action="{{route('intermilan.user.request.store')}}" method="POST">
                              @csrf
                              <input type="date" name="date" id="date" value="{{$date->format('Y-m-d')}}" hidden>
                              <div class="row mt-2">
                                 <div class="col-md-4">
                                    {{-- <input type="text" name="desc" id="desc" class="form-control"  required placeholder="Activity..."> --}}
                                    <textarea class="form-control"  name="desc" id="desc" rows="2" placeholder="Activity..."></textarea>
                                 </div>
                                 <div class="col-md-4">
                                       <div class="row">
                                          <div class="col-md-6">
                                             <select  class="form-control" id="origin"  name="origin">
                                                <option value="" selected disabled>Origin</option>
                                                @foreach ($ports as $port)
                                                   <option {{ old('origin') == $port->id ? 'selected' : '' }} value="{{ $port->id }}">{{ $port->code }}</option>
                                                @endforeach
                                                
                                             </select>
                                          </div>
                                          <div class="col-md-6">
                                             <select  class="form-control" id="destination"  name="destination">
                                                <option value="" selected disabled>Destination</option>
                                                @foreach ($ports as $port)
                                                   <option {{ old('origin') == $port->id ? 'selected' : '' }} value="{{ $port->id }}">{{ $port->code }}</option>
                                                @endforeach
                                                
                                             </select>
                                          </div>
                                       </div>
                                    
                                 </div>
                                 <div class="col-md-2">
                                    {{-- <input type="text" name="desc" id="desc" class="form-control"  required placeholder="Activity..."> --}}
                                       <select  class="form-control" id="req_boat" required  name="req_boat">
                                          <option value="" selected disabled>Required Boat</option>
                                          <option value="AHTS">AHTS</option>
                                          <option value="Cargo">Cargo</option>
                                          <option value="Supply Boat">Supply Boat</option>
                                          <option value="AHTS / Cargo">AHTS / Cargo</option>
                                          <option value="AHTS / Supply Boat">AHTS / Supply Boat</option>
                                          <option value="Crew Boat">Crew Boat</option>
                                          <option value="CC 114">CC 114</option>
                                          
                                       </select>
                                 </div>
                                 <div class="col-md-2">
                                    <button class="btn btn-lg btn-primary btn-block" type="submit" ><i class="fa fa-plus"></i>  Add</button> 
                                 </div>
                              </div>
                              {{-- <hr> --}}
                        </form>


                           <div class="table-responsive mt-3">
                             

                              <table class=" table-striped border table-sm" >
                                 <thead>
                                  
                                    <tr>
                                       <th>Activity Plan</th>
                                       {{-- <th>Material</th> --}}
                                       <th>Location</th>
                                       <th>Req Boat</th>
                                       <th>Status</th>
                                       <th class="text-right">Option</th>
                                    
                                    </tr>
                                 </thead>
                                 <tbody id="myAccordion2">
                                    
                                       @if ($userRequests->count() > 0)
                                          @foreach ($userRequests as $item)
                                             
                                             <tr style="">
                                             {{-- <td  class="text-uppercase bg-light">
                                             <a data-toggle="collapse" href="#formItem-{{$item->id}}">{{$item->user->username}}</a> 
                                             </td> --}}
                                          
                                                <td class="text-truncate">
                                                    <a data-toggle="collapse" href="#formItem-{{$item->id}}"> {{$item->description}}</a> 
                                                    
                                                      @if (count($item->cargoItems) > 0)
                                                   (
                                                      @foreach ($item->cargoItems as $cargo)
                                                         <a data-toggle="collapse" href="#formItemEdit-{{$cargo->id}}">{{$cargo->description}}</a>,
                                                      @endforeach
                                                    )
                                                   @endif
                                                   
                                                   
                                                   
                                                   
                                                </td>
                                                {{-- <td>
                                                   @if (count($item->cargoItems) > 0)
                                                   
                                                      @foreach ($item->cargoItems as $cargo)
                                                         <a data-toggle="collapse" href="#formItemEdit-{{$cargo->id}}">{{$cargo->description}}</a>,
                                                      @endforeach
                                                   
                                                   @endif
                                                </td> --}}
                                                <td class="text-truncate">
                                                   {{-- @if ($request->activity_id < 5)
                                                   {{$request->origin->code}} to {{$request->destination->code}}
                                                   @else
                                                   
                                                   @endif --}}
                                                   {{$item->origin->code}}
                                                   {{-- @if ($request->origin->port_id != null)
                                                      ({{$request->origin->port->code}})
                                                      
                                                   @endif --}}
                                                   - {{$item->destination->code}}
                                                </td>
                                                {{-- <td>{{formatDateB($item->date)}}</td> --}}
                                                <td>{{$item->req_boat}}</td>
                                                <td>
                                                   <x-status-stisla.request-plain :request="$item" />
                                                </td>
                                                <td class="text-right">
                                                   <div class="btn-group shadow-none">
                                                      @if ($item->status == 0)
                                                      <a href="{{route('intermilan.user.request.release', enkripRambo($item->id))}}" class="btn btn-sm btn-primary shadow-none"><i class="fa fa-paper-plane"></i> Submit</a>
                                                      @elseif($item->status == 1)
                                                      <a href="{{route('intermilan.user.request.cancel',  enkripRambo($item->id))}}" class="btn btn-sm btn-dark shadow-none"><i class="fa fa-times"></i> Cancel</a>
                                                      @endif
                                                      <a href="#"  data-toggle="modal" data-target="#modalRequestUserEdit-{{$item->id}}" class="btn btn-sm btn-dark shadow-none"><i class="fa fa-edit"></i>Edit</a>
                                                   <a href="#" data-toggle="modal" data-target="#modalRequestUserDelete-{{$item->id}}" class="btn btn-sm btn-danger shadow-none"><i class="fa fa-trash"></i>Delete</a>
                                                      </div>
                                                   
                                                   
                                                   
                                                   
                                                </td>
                                                
                                             </tr>


                                                <form action="{{route('intermilan.user.cargo.store')}}" method="POST">
                                                   @csrf
                                                   <input type="number" name="requestId" id="requestId" value="{{$item->id}}" hidden>
                                                   <tr class="collapse" id="formItem-{{$item->id}}" data-parent="#myAccordion2">

                                                         <td class="border">Add Item</td>
                                                         <td colspan="12" class="border" >
                                                            <table class="table-sm">
                                                               <tbody>
                                                                  <tr>
                                                                     <th class="border">Matreial Name</th>
                                                                     <th class="border">Qty</th>
                                                                     <th class="border">Unit/Satuan</th>
                                                                     <th class="border"></th>
                                                                  </tr>
                                                                  <tr>
                                                                     <td class="border">
                                                                        <input type="text" name="desc" id="desc" class="form-control" required placeholder="Item Name">
                                                                     </td>
                                                                     <td class="border">
                                                                        <input type="text" name="qty" id="qty" class="form-control" required placeholder="Qty">
                                                                     </td>
                                                                     <td class="border">
                                                                        <input type="text" name="unit" id="unit" class="form-control" required placeholder="Container/Pallet/Box">
                                                                     </td>
                                                                     <td class="border">
                                                                        <button class="btn btn-sm btn-primary shadow-none" style="height: 30px" type="submit">Add material</button>
                                                                        {{-- <a data-toggle="collapse" href="#formImport-{{$item->id}}">Form Import</a>  --}}
                                                                     </td>
                                                                  </tr>

                                                                  <tr>
                                                                     <th class="border">PO/Contract</th>
                                                                     <th class="border">Weight</th>
                                                                     <th class="border">Remark</th>
                                                                     <th class="border">
                                                                        

                                                                     </th>
                                                                  </tr>
                                                                  <tr>
                                                                     <td class="border">
                                                                        <input type="text" name="contract" id="contract" class="form-control" required placeholder="PO/Contract">
                                                                     </td>
                                                                     <td class="border">
                                                                        <input type="text" name="weight" id="weight" class="form-control" required placeholder="Weight">
                                                                     </td>
                                                                     <td class="border">
                                                                        <input type="text" name="remark" id="remark" class="form-control" required placeholder="Remarks">
                                                                     </td>

                                                                     <td class="border">
                                                                        <a data-toggle="collapse" href="#formImport-{{$item->id}}">Form Import</a> 
                                                                     </td>
                                                                  </tr>
                                                               </tbody>
                                                            </table>

                                                            {{-- <input type="text" name="desc" id="desc" style="width: 250px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Item Name">
                                                            <input type="text" name="qty" id="qty" style="width: 80px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Qty">
                                                            <input type="text" name="unit" id="unit" style=" text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Container/Pallet/Box">
                                                            
                                                            <input type="text" name="qty_package" id="qty_package" style="width: 80px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Satuan">
                                                            <input type="text" name="weight" id="weight" style="width: 50px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Weight">

                                                            <input type="text" name="contract" id="contract" style="width: 250px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="PO/Contract">
                                                            <input type="text" name="remark" id="remark" style="width: 250px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required placeholder="Remarks">
                                                            <button class="btn btn-sm btn-primary shadow-none" style="height: 30px" type="submit">Submit</button>
                                                            <a data-toggle="collapse" href="#formImport-{{$item->id}}">Form Import</a>  --}}
                                                         </td>
                                                      {{-- </div> --}}
                                                   </tr>
                                                </form>

                                                <form action="{{route('intermilan.marine.request.material.import')}}" method="POST" enctype="multipart/form-data">
                                                   @csrf
                                                   <input type="text" name="requestId" id="requestId" value="{{$item->id}}" hidden>
                                                   <tr class="collapse" id="formImport-{{$item->id}}" data-parent="#myAccordion2">
                                                      <td></td>
                                                      <td colspan="2">
                                                         <div class="form-group">
                                                            <div class="input-group mb-3">
                                                               <input type="file" class="form-control" id="file" name="file">
                                                               <div class="input-group-append">
                                                                  <button class="btn btn-light border" type="submit">Import Item</button>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </td>
                                                   </tr>
                                                   
                                                </form>

                                                @foreach ($item->cargoItems as $cargo)

                                                <form action="{{route('intermilan.user.cargo.update')}}" method="POST">
                                                   @csrf
                                                   @method('PUT')
                                                   <input type="number" name="requestId" id="requestId" value="{{$item->id}}" hidden>
                                                   <input type="number" name="cargoId" id="cargoId" value="{{$cargo->id}}" hidden>

                                                   <tr class="collapse" id="formItemEdit-{{$cargo->id}}" data-parent="#myAccordion2">
                                                      {{-- <div > --}}
                                                         <td>Edit Item</td>
                                                         <td colspan="12" >
                                                            <table>
                                                               <tbody>
                                                                  <tr>
                                                                     <th class="border">Material Name</th>
                                                                     <th class="border">Qty</th>
                                                                     <th class="border">Unit/Satuan</th>
                                                                     <th class="border"></th>
                                                                  </tr>
                                                                  <tr>
                                                                     <td class="border">
                                                                        <input type="text" name="desc" id="desc" style="width: 250px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required value="{{$cargo->description}}">
                                                                     </td>
                                                                     <td class="border">
                                                                        <input type="text" name="qty" id="qty" style="width: 80px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required value="{{$cargo->qty}}">
                                                                     </td>
                                                                     <td class="border">
                                                                        <input type="text" name="unit" id="unit" style=" text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required value="{{$cargo->unit}}">
                                                                     </td>
                                                                     <td class="border">
                                                                        <button class="btn btn-sm btn-light shadow-none" style="height: 30px" type="submit">Update</button>
                                                                     </td>
                                                                  </tr>

                                                                  <tr>
                                                                     <th class="border">PO/Contract</th>
                                                                     <th class="border">Weight</th>
                                                                     <th class="border">Remark</th>
                                                                     <th class="border"></th>
                                                                  </tr>
                                                                  <tr>
                                                                     <td class="border">
                                                                        <input type="text" name="contract" id="contract" style=" text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required value="{{$cargo->contract}}">
                                                                     </td>
                                                                     <td class="border">
                                                                        <input type="text" name="weight" id="weight" style="width: 50px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required value="{{$cargo->weight}}">
                                                                     </td>
                                                                     <td class="border">
                                                                        <input type="text" name="remark" id="remark" style="width: 250px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required value="{{$cargo->remark}}">
                                                                     </td>
                                                                     <td class="border">
                                                                        <a class="" style="height: 30px" href="{{route('cargo.delete', enkripRambo($cargo->id))}}"  >Delete</a>
                                                                     </td>
                                                                  </tr>
                                                               </tbody>
                                                            </table>

                                                            {{-- <input type="text" name="desc" id="desc" style="width: 250px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required value="{{$cargo->description}}">
                                                            <input type="text" name="qty" id="qty" style="width: 80px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required value="{{$cargo->qty}}">
                                                            <input type="text" name="unit" id="unit" style=" text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required value="{{$cargo->unit}}">
                                                            <input type="text" name="qty_package" id="qty_package" style="width: 80px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required value="{{$cargo->qty_package}}">
                                                            <input type="text" name="weight" id="weight" style="width: 50px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required value="{{$cargo->weight}}">

                                                            <input type="text" name="contract" id="contract" style=" text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required value="{{$cargo->contract}}">
                                                            <input type="text" name="remark" id="remark" style="width: 250px; text-align: left !important;padding-top: 7px;padding-bottom: 7px;" required value="{{$cargo->remark}}">
                                                            <button class="btn btn-sm btn-light shadow-none" style="height: 30px" type="submit">Update</button>
                                                            <a class="btn btn-sm btn-danger shadow-none" style="height: 30px" href="{{route('cargo.delete', enkripRambo($cargo->id))}}"  >Delete</a> --}}
                                                         </td>
                                                      {{-- </div> --}}
                                                   </tr>
                                                </form>

                                                
                                                @endforeach
                                             

                                             
                                          @endforeach
                                       @endif
                                    
                                    
                                    
                                 </tbody>
                              </table>
                           </div>
                           <hr>
                           <div class="my-1">   
                              <small > <b>Note: </b> Klik data pada kolom Activity Plan untuk menambahkan daftar Detail Material (Optional), Klik Nama Material untuk melihat detail Material </small>
                              <br>
                              <small > <b>Note: </b> Klik "Submit" untuk mengirim Activity Plan ke Marine/Fleet Control</small>
                           </div>
                           @endif
                        
                     </div>
                  </div>


                  
               </div>

               
            </div>
      
      
      
      
      
            <div class="card">
               <div class="card-body">
                  <div class="badge badge-info">Daily Report (Data Dummy)</div>
                  <hr>
                  <div class="row">
                     <div class="col-md-3">
                        <div class="card">
                           <div class="card-body p-2 text-center" style="background-color: rgb(208, 238, 118)">
                              <b>Barge/Rig/Tanker Location</b>
                           </div>
                           <div class="card-body p-0">
                              <div class="scrolling-body overflow-auto" style="height: 200px">
                                 <table>
                                    <thead>
                                       <tr>
                                          <th colspan="2" class="py-2" >Barge/Rig/Tanker Loc</th>
                                          <th class="py-2" >Area</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td>AWB COSL 222</td>
                                          <td>Rama - P C/A</td>
                                          <td>SBU</td>
                                       </tr>
                                       <tr>
                                          <td>AWB COSL 225</td>
                                          <td>Widuri - B</td>
                                          <td>NBU</td>
                                       </tr>
                                       <tr>
                                          <td>AWB COSL 222</td>
                                          <td>Rama - P C/A</td>
                                          <td>SBU</td>
                                       </tr>
                                       <tr>
                                          <td>AWB COSL 225</td>
                                          <td>Widuri - B</td>
                                          <td>NBU</td>
                                       </tr>
                                       <tr>
                                          <td>AWB COSL 222</td>
                                          <td>Rama - P C/A</td>
                                          <td>SBU</td>
                                       </tr>
                                       <tr>
                                          <td>AWB COSL 225</td>
                                          <td>Widuri - B</td>
                                          <td>NBU</td>
                                       </tr>
                                       <tr>
                                          <td>AWB COSL 222</td>
                                          <td>Rama - P C/A</td>
                                          <td>SBU</td>
                                       </tr>
                                       <tr>
                                          <td>AWB COSL 225</td>
                                          <td>Widuri - B</td>
                                          <td>NBU</td>
                                       </tr>
                                    </tbody>
                                 </table>
                                 </div>
                           </div>
                           <div class="card-body p-2 text-center" style="background-color: rgb(208, 238, 118)">
                              <b>Barge/Rig Move</b>
                           </div>
                           <div class="card-body p-0">
                              <div class="scrolling-body table-responsive overflow-auto" style="height: 200px">
                                 <table>
                                    <thead>
                                       <tr>
                                          <th colspan="" class="py-2" >Barge/Rig</th>
                                          <th class="py-2" >Route</th>
                                          <th class="py-2" >Vessel</th>
                                          <th class="py-2" >Date</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td>AWB Star Onyx</td>
                                          <td class="text-truncate">RAMD - SELA</td>
                                          <td>AHTS Peteka5402</td>
                                          <td>6/20/2025</td>
                                       </tr>
                                       <tr>
                                          <td>COSL.223</td>
                                          <td class="text-truncate">BWA - KARA</td>
                                          <td>AHTS Triton Jawara</td>
                                          <td></td>
                                       </tr>
                                       <tr>
                                          <td>AWB Star Onyx</td>
                                          <td class="text-truncate">RAMD - SELA</td>
                                          <td>AHTS Peteka5402</td>
                                          <td></td>
                                       </tr>
                                       <tr>
                                          <td>COSL.223</td>
                                          <td class="text-truncate">BWA - KARA</td>
                                          <td>AHTS Triton Jawara</td>
                                          <td></td>
                                       </tr>
                                       
                                    </tbody>
                                 </table>
                                 </div>
                           </div>
                        </div>
            
                        
                        
                     </div>
                     <div class="col-md-6">
                        <div class="card">
                           
                           <div class="card-body p-2 text-center" style="background-color: rgb(208, 238, 118)">
                              <b>Vessel Daily Activity</b>
                           </div>
                           <div class="card-body p-0 " >
                              <div class="scrolling-body overflow-auto" style="height: 250px">
                                 <table>
                                    <thead>
                                       {{-- <tr>
                                          <th colspan="3" class="py-2" style="background-color: rgb(208, 238, 118)">Vessel Daily Activity</th>
                                          
                                       </tr> --}}
                                       <tr>
                                          <th>Vessel Name</th>
                                          <th>Program</th>
                                          <th>Remarks/Note</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td>AHTS Peteka 5402</td>
                                          <td>COSL.223 (Deploy Anchor 4/6) - COSL.223 ( Backload Cargo) - Pab (Offload Backload Cargo)</td>
                                          <td>Proses Pick up anchor</td>
                                       </tr>
                                       <tr>
                                          <td>AHTS Kittiwake</td>
                                          <td>RIG EMD (Support Rig Operation)</td>
                                          <td>Support Rig Operation</td>
                                       </tr>
                                       <tr>
                                          <td>AHTS Petroleum Pioneer</td>
                                          <td>KJ4 (Cargo Operation) - Rig EMD (Support Rig Operation)</td>
                                          <td>Cargo Operation</td>
                                       </tr>
                                       <tr>
                                          <td>AHTS Peteka 5402</td>
                                          <td>COSL.223 (Deploy Anchor 4/6) - COSL.223 ( Backload Cargo) - Pab (Offload Backload Cargo)</td>
                                          <td>Proses Pick up anchor</td>
                                       </tr>
                                       <tr>
                                          <td>AHTS Kittiwake</td>
                                          <td>RIG EMD (Support Rig Operation)</td>
                                          <td>Support Rig Operation</td>
                                       </tr>
                                       <tr>
                                          <td>AHTS Petroleum Pioneer</td>
                                          <td>KJ4 (Cargo Operation) - Rig EMD (Support Rig Operation)</td>
                                          <td>Cargo Operation</td>
                                       </tr>
                                       <tr>
                                          <td>AHTS Peteka 5402</td>
                                          <td>COSL.223 (Deploy Anchor 4/6) - COSL.223 ( Backload Cargo) - Pab (Offload Backload Cargo)</td>
                                          <td>Proses Pick up anchor</td>
                                       </tr>
                                       <tr>
                                          <td>AHTS Kittiwake</td>
                                          <td>RIG EMD (Support Rig Operation)</td>
                                          <td>Support Rig Operation</td>
                                       </tr>
                                       <tr>
                                          <td>AHTS Petroleum Pioneer</td>
                                          <td>KJ4 (Cargo Operation) - Rig EMD (Support Rig Operation)</td>
                                          <td>Cargo Operation</td>
                                       </tr>
                                       <tr>
                                          <td>AHTS Peteka 5402</td>
                                          <td>COSL.223 (Deploy Anchor 4/6) - COSL.223 ( Backload Cargo) - Pab (Offload Backload Cargo)</td>
                                          <td>Proses Pick up anchor</td>
                                       </tr>
                                       <tr>
                                          <td>AHTS Kittiwake</td>
                                          <td>RIG EMD (Support Rig Operation)</td>
                                          <td>Support Rig Operation</td>
                                       </tr>
                                       <tr>
                                          <td>AHTS Petroleum Pioneer</td>
                                          <td>KJ4 (Cargo Operation) - Rig EMD (Support Rig Operation)</td>
                                          <td>Cargo Operation</td>
                                       </tr>
                                       <tr>
                                          <td>AHTS Peteka 5402</td>
                                          <td>COSL.223 (Deploy Anchor 4/6) - COSL.223 ( Backload Cargo) - Pab (Offload Backload Cargo)</td>
                                          <td>Proses Pick up anchor</td>
                                       </tr>
                                       <tr>
                                          <td>AHTS Kittiwake</td>
                                          <td>RIG EMD (Support Rig Operation)</td>
                                          <td>Support Rig Operation</td>
                                       </tr>
                                       <tr>
                                          <td>AHTS Petroleum Pioneer</td>
                                          <td>KJ4 (Cargo Operation) - Rig EMD (Support Rig Operation)</td>
                                          <td>Cargo Operation</td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                           <div class="card-body p-2 text-center" style="background-color: rgb(208, 238, 118)">
                              <b>Crewchange Boat & Others</b>
                           </div>
                           <div class="card-body p-0">
                              <div class="scrolling-body overflow-auto" style="height: 80px">
                                 <table>
                                    {{-- <thead>
                                       <tr>
                                          <th colspan="" class="py-2" >Barge/Rig</th>
                                          <th class="py-2" >Route</th>
                                          <th class="py-2" >Vessel</th>
                                          <th class="py-2" >Date</th>
                                       </tr>
                                    </thead> --}}
                                    <tbody>
                                       <tr>
                                          <td>CB. Tegas Jaya</td>
                                          <td >JKT  -->  S.Onyx (SELATAN-A)  -->  P.Winner (RAMA-I)  -->  G.Jati (RAMA-B)  -->  JKT</td>
                                          <td>CC WI</td>
                                          
                                       </tr>
                                       <tr>
                                          <td>CB. Sigap Jaya</td>
                                          <td >Docking</td>
                                          <td>Offhire</td>
                                          
                                       </tr>
                                       
                                       
                                    </tbody>
                                 </table>
                                 </div>
                           </div>
                           <div class="card-body p-2 text-center" style="background-color: rgb(208, 238, 118)">
                              <b>Interplatform Boat</b>
                           </div>
                           <div class="card-body p-0">
                              <div class="scrolling-body overflow-auto" style="height: 80px">
                                 <table>
                                    <thead>
                                       <tr>
                                          <th colspan="" class="py-2" >Barge/Rig</th>
                                          <th class="py-2" >Route</th>
                                          <th class="py-2" >Vessel</th>
                                          <th class="py-2" >Date</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td>AWB Star Onyx</td>
                                          <td class="text-truncate">RAMD - SELA</td>
                                          <td>AHTS Peteka5402</td>
                                          <td>6/20/2025</td>
                                       </tr>
                                       <tr>
                                          <td>COSL.223</td>
                                          <td class="text-truncate">BWA - KARA</td>
                                          <td>AHTS Triton Jawara</td>
                                          <td></td>
                                       </tr>
                                       <tr>
                                          <td>AWB Star Onyx</td>
                                          <td class="text-truncate">RAMD - SELA</td>
                                          <td>AHTS Peteka5402</td>
                                          <td></td>
                                       </tr>
                                       <tr>
                                          <td>COSL.223</td>
                                          <td class="text-truncate">BWA - KARA</td>
                                          <td>AHTS Triton Jawara</td>
                                          <td></td>
                                       </tr>
                                       
                                    </tbody>
                                 </table>
                                 </div>
                           </div>
                        </div>
                        
                        
                     </div>
                     <div class="col-md-3">
                        
            
                        <div class="card">
                           {{-- <div class="card-body p-2 text-center" style="background-color: rgb(208, 238, 118)">
                              <b>Schedule Lifting Tanker</b>
                           </div> --}}
                           <div class="card-body p-0">
                              <table>
                                 <thead>
                                    <tr>
                                       <th colspan="2" class="py-2" style="background-color: rgb(208, 238, 118)">Schedule Lifting Tanker</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td rowspan="4">Cinta Terminal</td>
                                       
                                    </tr>
                                    <tr>
                                       <td>12 - 13 Jun 2025 (Overcomer & Parakan)</td>
                                    </tr>
                                    <tr>
                                       <td>19 - 20 Jun 2025  (Peteka5402 & Petroleum Pioneer)</td>
                                    </tr>
                                    <tr>
                                       <td>30 Jun - 01 Jul 2025  (TBA)</td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                           <div class="card-body p-2 text-center" style="background-color: rgb(208, 238, 118)">
                              <b>Reminder Notes</b>
                           </div>
                           <div class="card-body p-0">
                              <div class="scrolling-body table-responsive overflow-auto" style="height: 300px">
                                 <table>
                                    {{-- <thead>
                                       <tr>
                                          <th colspan="" class="py-2" >Barge/Rig</th>
                                          <th class="py-2" >Route</th>
                                          <th class="py-2" >Vessel</th>
                                          <th class="py-2" >Date</th>
                                       </tr>
                                    </thead> --}}
                                    <tbody>
                                       <tr>
                                          <td>Zelda Comp. Project support by CB. Pan Marine 6 (60 Pax) 
                                             19 Jun - 3 Jul 
                                          </td>
                                          
                                          
                                       </tr>
                                       <tr>
                                          <td>
                                             Refurbish P/F S. Wanda-A duration 6-8 Week - Plan UV Singgasana Laut
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>
                                             Project Rejuvenation 10 P/F Support by COSL 222 & AHTS Logindo Overcomer
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>
                                             CB. Salatiga On Hire Call Out - Support Project/Operation PHE OSES
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>
                                             CB. NMS Accomplish renewal certificate - Plan W2 Jun
                                             Due date 26 Jun
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>
                                             Project Rejuvenation 10 P/F Support by COSL 222 & AHTS Logindo Overcomer
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>
                                             CB. Salatiga On Hire Call Out - Support Project/Operation PHE OSES
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>
                                             CB. NMS Accomplish renewal certificate - Plan W2 Jun
                                             Due date 26 Jun
                                          </td>
                                       </tr>
                                       
                                    </tbody>
                                 </table>
                                 </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
      
      
         </div>



      
      </div>
   </section>




   @if ($userRequests->count() > 0)
      @foreach ($userRequests as $item)

         <div class="modal fade" id="modalRequestUserEdit-{{$item->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog" role="document">
               <form action="{{route('intermilan.user.request.update')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')

                  <input type="number" name="requestId" id="requestId" value="{{ $item->id }}" hidden>

                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title border-bottom"> 
                           
                           Form Edit Activity Plan</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                        
                     </div>
                     <div class="modal-body">

                        <div class="form-group">
                           <label for="desc" class="label">Activity Plan</label>
                           <textarea class="form-control"  name="desc" id="desc" rows="2" placeholder="Activity...">{{$item->description}}</textarea>
                        </div>


                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="desc" class="label">Origin</label>
                                 <select  class="form-control" id="origin"  name="origin">
                                    <option value="" selected disabled>Origin</option>
                                    @foreach ($ports as $port)
                                       <option {{ $item->origin_id == $port->id ? 'selected' : '' }} value="{{ $port->id }}">{{ $port->code }}</option>
                                    @endforeach
                                    
                                 </select>
                              </div>
                              
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="desc" class="label">Destination</label>
                                 <select  class="form-control" id="destination"  name="destination">
                                    <option value="" selected disabled>Destination</option>
                                    @foreach ($ports as $port)
                                       <option {{ $item->destination_id == $port->id ? 'selected' : '' }} value="{{ $port->id }}">{{ $port->code }}</option>
                                    @endforeach
                                    
                                 </select>
                              </div>
                              
                           </div>
                        </div>
                        
                        <div class="form-group">
                           <label for="desc" class="label">Required Boat</label>
                           <select  class="form-control" id="req_boat" required  name="req_boat">
                              <option value="" selected disabled>Required Boat</option>
                              <option {{ $item->req_boat == 'AHTS' ? 'selected' : '' }} value="AHTS">AHTS</option>
                              <option {{ $item->req_boat == 'Cargo' ? 'selected' : '' }} value="Cargo">Cargo</option>
                              <option {{ $item->req_boat == 'Supply Boat' ? 'selected' : '' }} value="Supply Boat">Supply Boat</option>
                              <option {{ $item->req_boat == 'AHTS / Cargo' ? 'selected' : '' }} value="AHTS / Cargo">AHTS / Cargo</option>
                              <option {{ $item->req_boat == 'AHTS / Supply Boat' ? 'selected' : '' }} value="AHTS / Supply Boat">AHTS / Supply Boat</option>
                              <option {{ $item->req_boat == 'Crew Boat' ? 'selected' : '' }} value="Crew Boat">Crew Boat</option>
                              <option {{ $item->req_boat == 'CC 114' ? 'selected' : '' }} value="CC 114">CC 114</option>
                              
                           </select>
                        </div>

                           {{-- <small> <b>Note:</b> Setelah submit, data akan ditampilkan pada akun Kapal. </small> --}}
                        


                        
                        
                     </div>
                     <div class="modal-footer bg-whitesmoke">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info" onclick="handleClick(this)">Update</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>


         <div class="modal fade" id="modalRequestUserDelete-{{$item->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog" role="document">
               <form action="{{route('intermilan.user.request.delete')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')

                  <input type="number" name="requestId" id="requestId" value="{{ $item->id }}" hidden>

                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title border-bottom"> 
                            <i class="fas fa-exclamation-triangle text-warning"></i>
                           Delete Confirmation</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                        
                     </div>
                     <div class="modal-body">
                        <b>Apakah Anda yakin ingin menghapus data ini?</b> 

                        <div class="table-responsive mt-3">
                           <table class="table table-sm border">
                              <tbody>
                                 
                                    <tr>
                                       <td class="">Activity</td>
                                       <td class="">{{$item->description}}</td>
                                    </tr>
                                    <tr>
                                       <td class="">Req Date</td>
                                       <td class="">{{formatDate($item->date)}}</td>
                                    </tr>
                                    <tr>
                                       <td class="">Location</td>
                                       <td class="">{{$item->origin->code}} - {{$item->destination->code}}</td>
                                    </tr>
                                    <tr>
                                       <td class="">Required Boat</td>
                                       <td class="">{{$item->req_boat}} </td>
                                    </tr>
                                 
                              </tbody>
                           </table>
                        </div>

                           <small> <b>Note:</b> Setelah klik "Delete", data akan dihapus dari daftar Activity Plan. </small>
                        


                        
                        
                     </div>
                     <div class="modal-footer bg-whitesmoke">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" onclick="handleClick(this)">Delete</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>

      @endforeach
   @endif

  
@endsection



