@extends('layouts.stisla.app-main')
@section('title')
   Home Page
@endsection

@section('content')
   <section class="section">
      <div class="section-body">
         <div class="row">
            <div class="col-md-3">

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
                     Superintendent & Marine Representative
                     

                  </div>

               </div>
               {{-- <div class="card bg-primary shadow">
                  <div class="card-body ">
                     
                     <i class="fas fa-user"></i> Welcome back, <h4> {{auth()->user()->name}}</h4>
                     <hr>
                      <b>Superintendent & Marine Representative</b>
                      
                  </div>
               </div> --}}
               <div class="card shadow">
                  
                  <div class="card-body">
                     <div class="badge badge-info">
                        Intermilan
                     </div>

                     <table class="mt-2">
                        <tbody>
                           <tr>
                              <td class="border-bottom"><a href="{{route('intermilan.marine.detail', enkripRambo($intermilan->id))}}">{{$intermilan->code}}</a></td>
                              <td class="border-bottom">{{formatDate($intermilan->date)}}</td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
                  <div class="card-body">
                     <div class="badge badge-info">
                        Daily Report
                     </div>

                     <table class="mt-2">
                        <tbody>
                           @foreach ($dailyReports as $daily)
                           <tr>
                              <td class="border-bottom"><a href="{{route('daily.report.detail', enkripRambo($daily->id))}}">{{formatDateName($daily->date)}}</a></td>
                              {{-- <td class="border-bottom">{{formatDate($intermilan->date)}}</td> --}}
                           </tr>
                           @endforeach
                           
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            <div class="col-md-9">
               <div class="row ">
                  <div class="col-md-4">
                     <div class="card card-statistic-1 shadow-lg">
                        <a href="{{route('vdr.marine.validation')}}">
                           <div class="card-icon bg-info">
                           <i class="fas fa-user"></i>
                           </div>
                           <div class="card-wrap">
                           <div class="card-header">
                              
                              <h4>VDR Waiting</h4>
                           </div>
                           <div class="card-body">
                              {{count($allVdrs->where('status', 3))}}
                           </div>
                           </div>
                        </a>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="card card-statistic-1 shadow-lg">
                        <a href="{{route('vdr.reject.list')}}">
                        <div class="card-icon bg-danger">
                        <i class="fas fa-bolt"></i>
                        </div>
                        <div class="card-wrap">
                        <div class="card-header">
                           
                           <h4>VDR Rejected</h4>
                        </div>
                        <div class="card-body">
                           {{count($allVdrs->whereIn('status', [101,202,303]))}}
                        </div>
                        </div>
                     </a>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="card card-statistic-1 shadow-lg">
                        <a href="{{route('vdr.history.list')}}">
                        <div class="card-icon bg-success">
                        <i class="fas fa-user"></i>
                        </div>
                        <div class="card-wrap">
                        <div class="card-header">
                           
                           <h4>VDR History</h4>
                        </div>
                        <div class="card-body">
                           {{count($allVdrs->where('status', 4))}}
                        </div>
                        </div>
                     </a>
                     </div>
                  </div>
                  
               </div>
      
               <div class="card shadow">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-md-12">
                           {{-- <h4></h4> --}}
                           {{-- <div class="badge badge-info">VDR Validation</div> --}}
                           <div class="d-flex align-items-center gap-2 mb-2">
                              <i class="fa fa-check-circle text-primary mr-3"></i>
                              <div>
                                 <div class="fw-bold">Daftar VDR yang Memerlukan Persetujuan Anda</div>
                                 <small class="text-muted">
                                       Silahkan tinjau dan lakukan persetujuan untuk memastikan proses berjalan sesuai prosedur.
                                 </small>
                              </div>
                           </div>
                           <div class="table-responsive mt-2" >
                              <table class="datatables">
                                 
                                 <thead>
                                    {{-- <tr>
                                       <th colspan="3" style="color: #1f4481 !important">VDR yang membutuhkan approval anda</th>
                                    </tr> --}}
                                    <tr>
                                       <th>No</th>
                                       <th>Vessel</th>

                                       <th>Number</th>
                                       <th>Last Update</th>
                                       <th class="text-center">Status</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($vdrValidations as $vdr)
                                       <tr >
                                          <td class="border-bottom">{{++$i}}</td>
                                          <td class="border-bottom">
                                             <a href="{{route('document.vdr', enkripRambo($vdr->id))}}">{{$vdr->vessel->name ?? ''}}</a>
                                             {{-- <a href="{{route('vdr.show', [enkripRambo( $vdr->id), enkripRambo('index')])}}">{{$vdr->vessel->name}}</a> --}}
                                          </td>
                                          <td class="border-bottom">
                                             <a href="{{route('document.vdr', enkripRambo($vdr->id))}}">{{$vdr->code}}</a>
                                             {{-- <a href="{{route('vdr.show', [enkripRambo( $vdr->id), enkripRambo('index')])}}">{{$vdr->vessel->name}}</a> --}}
                                          </td>
                                          {{-- <td>{{$vdr->code}}</td> --}}
                                          <td class="border-bottom">{{formatDate($vdr->updated_at)}}</td>
                                          <td class="text-right border-bottom">
                                             <x-status-stisla.vdr :vdr="$vdr" />
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
         </div>

      
      </div>
   </section>

  
@endsection



