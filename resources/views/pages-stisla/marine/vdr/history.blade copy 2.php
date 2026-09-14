@extends('layouts.stisla.app-vdr')
@section('title')
   VDR History
@endsection
@section('content')


<section class="section">
   {{-- <div class="section-header">
      <h1 class="section-title">VDR History</h1>
      <div class="section-header-breadcrumb">
         <div class="breadcrumb-item "><a href="{{route('vdr.marine')}}">Dashboard</a></div>
         <div class="breadcrumb-item active">VDR History</div>
      </div>
   </div> --}}

   <div class="section-body">
      {{-- <h2 class="section-title">Schedule Plan</h2>
      <p class="section-lead">
         We use 'DataTables' made by @SpryMedia. You can check the full documentation <a href="https://datatables.net/">here</a>.
      </p> --}}

      <div class="row">
         <div class="col-md-3">
            <div class="card shadow">
               
               <div class="card-body">
                  <h5>VDR History</h5>
                  {{-- Daftar VDR yang sudah melewati Approval <span class="text-uppercase">{{auth()->user()->name}}</span> --}}
                  <hr>
                  <div class="row text-center">

                     <div class="col-12">
                         <div class="card bg-light  border-0 mb-3">
                             <div class="card-body py-3">
         
                                 <i class="fas fa-file-alt fa-2x mb-2"></i>
         
                                 <h2 class="mb-0">
                                     {{ count($vdrs) }}
                                 </h2>
         
                                 <small>Total VDR</small>
         
                             </div>
                         </div>
                     </div>
         
                 </div>
                  
                  <form action="{{ route('vdr.history.filter') }}" method="POST">
                     @csrf
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">From</label>
                              <input type="date" class="form-control" name="start" id="start" value="{{$start}}">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="">To</label>
                              <input type="date" class="form-control" name="to" id="to"  value="{{$to}}">
                           </div>
                        </div>
                     </div>
                     
                     
                     <button class="btn btn-primary btn-block" type="submit">Filter</button>
                  </form>
                  <hr>
                  <div class="border-top pt-3">

                     <div class="d-flex align-items-center">
         
                         <i class="fas fa-mouse-pointer text-primary mr-2"></i>
         
                         <small class="text-muted">
                             Click the <b>VDR Number</b> to review the report.
                         </small>
         
                     </div>
         
                  </div>
                  
               </div>
            </div>
            {{-- <div class="card">
               <div class="card-body">
                  <div class="badge badge-info">Form Filter</div>
                  <hr>
                  <form action="{{route('vdr.filter')}}" method="POST">
                     @csrf
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <select class="form-control " required name="vessel" id="vessel">
                                 <option value="" style="width: 100%" selected disabled>Select Vessel</option>
                                 @foreach ($vessels as $vess)
                                    <option {{$vessel == $vess->id ? 'selected' : ''}} value="{{$vess->id}}">{{$vess->name}}</option> 
                                 @endforeach
                                
                              </select>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <div class="input-group">
                                 
                                 
                                 <input type="date" name="start" id="start" class="form-control">
                                 <span class="mx-2 mt-3">To</span>
                                 <input type="date" name="end" id="end" class="form-control">
                                 <div class="input-group-append">
                                    <button class="btn btn-primary  px-4" type="submit">Filter</button>
                                    
                                  </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     
                     
                  </form>
               </div>
            </div>

            <div class="card">
               <div class="card-body">
                  <table>
                     <tbody>
                        <tr>
                           <td>Vessel</td>
                           <td>ENC ONE</td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div> --}}
            
         </div>
         <div class="col-md-9">
            <div class="card shadow">
               {{-- <div class="card-header">
                  <b>VDR Validation</b>
               </div> --}}
               <div class="card-body">
                  @if ($start == null)
                      <b>Catatan</b> : Sistem menampilkan 800 data terbaru secara default. <br>
                        Untuk pencarian data yang lebih spesifik, silakan gunakan fitur filter.
                        <hr>
                        @else
                     <b>Info</b>: Menampilkan data VDR dari tanggal {{ formatDate($start) }} – {{ formatDate($to) }} berdasarkan filter yang dipilih.
                     <hr>
                  @endif
                  
                  <div class="table-responsive">
                     <table class="datatables-vdr" id="">
                        <thead>
                           <tr>
                              {{-- <th rowspan="2" class="text-center">No.</th> --}}
                              <th class="py-2">Vessel</th>
                              <th>VDR Number</th>
                              {{-- <th>Vessel</th> --}}
                              {{-- <th>Day</th> --}}
                              <th>Date</th>
                              {{-- <th>Crew</th> --}}
                              {{-- <th>Created</th> --}}
                              <th class="text-center">Status</th>
                              {{-- @if ($title == 'Reject')
                                  <th>Note</th>
                              @endif --}}
                              {{-- <th colspan="2" class="text-center">High Speed Contract</th>
                              <th colspan="2" class="text-center">Normal Speed Contract</th>
                              <th colspan="2" class="text-center">Slow Speed Contract</th> --}}
                              {{-- <th colspan="" class="text-center">Total</th> --}}
                           </tr>
                           
                        </thead>
                        <tbody>
                           @foreach($vdrs as $vdr)
                           <tr>
                              {{-- <td class="text-muted text-center"><small>{{++$i}}</small></td> --}}
                              <td>{{$vdr->vessel->name}}</td>
                              <td>
                                 @if (auth()->user()->username == 'lutfiaryanto')
                              
                                 <a href="{{route('document.vdr', enkripRambo($vdr->id))}}">{{$vdr->code}}</a>
                                    @else
                                    <a href="{{route('vdr.show.spa', [enkripRambo($vdr->id), enkripRambo('index')])}}">{{$vdr->code}}</a>
                                    {{-- <a href="{{route('vdr.show', [enkripRambo($vdr->id), enkripRambo('index')])}}">{{$vdr->vessel->name}}</a> --}}
         
                                    @endif
                                 {{-- <a href="{{route('vdr.show.spa', [enkripRambo( $vdr->id), enkripRambo('index')])}}">{{vdrId($vdr->id)}}</a> <br> --}}
                                 {{-- <small>{{$vdr->vessel->name}}</small> --}}
                              </td>
                             
                              {{-- <td>{{formatDayName($vdr->date)}}</td> --}}
                              <td class="text-truncate">
                                 {{$vdr->date}} <br>
                                 {{-- <small>{{formatDayName($vdr->date)}}</small> --}}
                              </td>
                              {{-- <td>{{$vdr->crew_onduty}} / {{$vdr->crew_max}}</td> --}}
                              {{-- <td>{{$vdr->created_by}}</td> --}}
                              <td class="text-center">
                                 {{-- @if(date('Y-m-d', strtotime($vdr->date)) == date('Y-m-d'))
                                 <span class="badge badge-warning">Draft</span>
                                 @else
                                 <span class="badge badge-success">Release</span>
                                 @endif --}}
                                 <x-status-stisla.vdr :vdr="$vdr" />
                              </td>
                              {{-- @if ($title == 'Reject')
                                 <td>
                                    {{$vdr->reject_desc}}
                                 </td>
                              @endif --}}
                              
                              {{-- <td>{{$vdr->operatings->where('heading_id', 1)->first()->speed}}</td>
                              <td>{{$vdr->operatings->where('heading_id', 1)->first()->contractual_fuel}}</td>
                              <td>{{$vdr->operatings->where('heading_id', 2)->first()->speed}}</td>
                              <td>{{$vdr->operatings->where('heading_id', 2)->first()->contractual_fuel}}</td>
                              <td>{{$vdr->operatings->where('heading_id', 3)->first()->speed}}</td>
                              <td>{{$vdr->operatings->where('heading_id', 3)->first()->contractual_fuel}}</td> --}}
                              {{-- <td class="text-center">{{$vdr->getTotalHours()}}</td> --}}
                              {{-- <td class="text-center">{{ceil($vdr->operatings->sum('daily'))}}</td> --}}
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
    
@endsection