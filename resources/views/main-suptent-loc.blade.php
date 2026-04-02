@extends('layouts.stisla.app-main')
@section('title')
   Home Page
@endsection

@section('content')
   <section class="section">
      <div class="section-body">
         <div class="row">
            <div class="col-md-3">
               <div class="card bg-primary shadow">
                  <div class="card-body ">
                     
                     Welcome back, <br> <b> {{auth()->user()->name}}</b>
                     <hr>
                     Superintendent <h4>{{auth()->user()->getArea()}}</h4>
                     {{-- <hr>
                     Location Company Representative/Suptent Area --}}
                  </div>
               </div>

               <div class="card">
                  <div class="card-body">
                     <b>Email</b>
                     <hr>
                     @if (auth()->user()->getArea() == 'SBU' )
                     erry.brillyanto@pertamina.com <br>
                     oka.prasetya@pertamina.com
                     @elseif(auth()->user()->getArea() == 'CBU' )
                     suroso.williem@pertamina.com <br>
                     janudin@pertamina.com
                     @elseif(auth()->user()->getArea() == 'NBU' )
                     hendra.hadi@pertamina.com <br>
                     sindhu.hadi@pertamina.com
                     @elseif(auth()->user()->getArea() == 'Cinta-T' )
                     norman.sasongko@pertamina.com <br>
                     erin.busrian@pertamina.com
                     @elseif(auth()->user()->getArea() == 'Widuri-T' )
                     muhamad.mujiburichman@pertamina.com <br>
                     rezza.suhanda@pertamina.com
                     {{-- asril1@pertamina.com --}}
                     @endif
                     

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
                           
                           <h4>Waiting</h4>
                        </div>
                        <div class="card-body">
                           {{count($allVdrs->where('status', 5))}}
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
                           
                           <h4>Rejected</h4>
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
                           
                           <h4>History</h4>
                        </div>
                        <div class="card-body">
                           {{count($allVdrs->whereIn('status', [3,4]))}}
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
                           <div class="badge badge-info">VDR Monitoring ({{auth()->user()->getArea()}})</div>
                           <div class="table-responsive " >
                              <table class="datatables-vdr">
                                 
                                 <thead>
                                    {{-- <tr>
                                       <th colspan="3" style="color: #1f4481 !important">VDR yang membutuhkan approval anda</th>
                                    </tr> --}}
                                    <tr>
                                       {{-- <th>No</th> --}}
                                       <th>Vessel</th>

                                       <th>Number</th>
                                       <th>Date</th>
                                       <th class="text-center">Status</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($allVdrs as $vdr)
                                       <tr class="border" style="border: 1px black">
                                          {{-- <td>{{++$i}}</td> --}}
                                          <td>
                                             <a href="{{route('vdr.show.spa', [enkripRambo( $vdr->id), enkripRambo('index')])}}">{{$vdr->vessel->name}}</a>
                                             {{-- <a href="{{route('vdr.show', [enkripRambo( $vdr->id), enkripRambo('index')])}}">{{$vdr->vessel->name}}</a> --}}
                                          </td>
                                          <td>
                                             <a href="{{route('vdr.show.spa', [enkripRambo( $vdr->id), enkripRambo('index')])}}">{{$vdr->code}}</a>
                                             {{-- <a href="{{route('vdr.show', [enkripRambo( $vdr->id), enkripRambo('index')])}}">{{$vdr->vessel->name}}</a> --}}
                                          </td>
                                          {{-- <td>{{$vdr->code}}</td> --}}
                                          <td>{{$vdr->date}}</td>
                                          <td class="text-right">
                                             <x-status-stisla.vdr :vdr="$vdr" />
                                          </td>
                                       </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
                        </div>
                        {{-- <div class="col-md-12">
                           <div class="table-responsive overflow-auto " style="height: 310px">
                              <table class="display  border">
                                 
                                 <thead>
                                    <tr>
                                       <th colspan="3" style="color: #1f4481 !important">VDR History</th>
                                    </tr>
                                    <tr>
                                      
                                       <th>Number</th>
                                      
                                       <th>Status</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($vdrs->where('status', '>', 1) as $vdr)
                                       <tr class="border" style="border: 1px black">
                                          <td><a href="{{route('vdr.show.spa', [enkripRambo( $vdr->id), enkripRambo('index')])}}">{{$vdr->code}}</a></td>
                                         
                                          <td>
                                             <x-status-stisla.vdr :vdr="$vdr" />
                                          </td>
                                       </tr>
                                    @endforeach
                                 </tbody>
                              </table>
                           </div>
                        </div> --}}
                     </div>
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>

  
@endsection



