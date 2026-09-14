@extends('layouts.stisla.app-main')
@section('title')
   Home Page
@endsection

@section('content')
<style>
   .admin-card {
       border-radius: 16px;
       overflow: hidden;
       transition: 0.3s;
   }
   
   .admin-card:hover {
       transform: translateY(-6px);
       box-shadow: 0 15px 30px rgba(0,0,0,0.08);
   }
   
   /* HEADER */
   .admin-header {
       height: 65px;
       background: linear-gradient(135deg, #4e73df, #294aae);
       position: relative;
   }
   
   /* AVATAR */
   .admin-avatar {
       width: 60px;
       height: 60px;
       background: white;
       color: #224abe;
       border-radius: 50%;
       display: flex;
       align-items: center;
       justify-content: center;
       font-size: 28px;
       position: absolute;
       bottom: -35px;
       left: 50%;
       transform: translateX(-50%);
       box-shadow: 0 8px 20px rgba(0,0,0,0.15);
   }
   
   /* BODY SPACING */
   .card-body {
       padding-top: 50px;
   }
   
   /* INFO BOX */
   .info-admin {
       background: #f8f9fa;
       padding: 10px;
       border-radius: 10px;
   }
   
   /* BUTTON */
   .btn {
       border-radius: 10px;
       font-weight: 500;
   }
   </style>
   
   
   
   <style>
   .activity-wrapper {
       border-radius: 12px;
   }
   
   /* HEADER */
   .activity-header h6 {
       font-size: 14px;
   }
   
   /* BOX */
   .activity-box {
       max-height: 320px;
       overflow-y: auto;
       padding-right: 5px;
   }
   
   /* ITEM */
   .activity-item {
       display: flex;
       gap: 10px;
       padding: 10px 5px;
       border-bottom: 1px solid #f1f1f1;
       transition: 0.2s;
   }
   
   .activity-item:hover {
       background: #f9fafc;
   }
   
   /* ICON */
   .activity-icon {
       width: 35px;
       height: 35px;
       border-radius: 50%;
       color: white;
       display: flex;
       align-items: center;
       justify-content: center;
       font-size: 14px;
   }
   
   /* CONTENT */
   .activity-content {
       flex: 1;
   }
   
   /* SCROLL STYLE */
   .activity-box::-webkit-scrollbar {
       width: 5px;
   }
   
   .activity-box::-webkit-scrollbar-thumb {
       background: #ccc;
       border-radius: 10px;
   }
   </style>

<style>
   .note-vdr {
       background: #f8f9fa;
       border-left: 4px solid #0d6efd;
       padding: 10px 12px;
       border-radius: 8px;
   }
   
   .note-icon {
       width: 35px;
       height: 35px;
       background: #0d6efd;
       color: white;
       border-radius: 50%;
       display: flex;
       align-items: center;
       justify-content: center;
   }
   
   .note-content strong {
       font-size: 13px;
   }
   </style>

   <section class="section">
      <div class="section-body">
         <div class="row"> 
            <div class="col-md-3">
               <div class="card admin-card shadow-lg">

                     <!-- HEADER -->
                     <div class="admin-header">
                           <div class="admin-avatar">
                              <i class="fa fa-user-shield"></i>
                           </div>
                     </div>

                     <!-- BODY -->
                     <div class="card-body text-center">

                           

                           <h4 class="fw-bold text-primary mb-1 mt-4">
                              Administrator
                           </h4>

                           <small class="text-muted d-block mb-3">
                              System Control & Management
                           </small>

                           <!-- DESKRIPSI -->
                           {{-- <p class="text-muted small mb-3">
                              Anda memiliki akses penuh untuk mengelola sistem MARS, 
                              termasuk monitoring data, validasi, dan pengaturan user.
                           </p> --}}

                           <!-- INFO BOX -->
                           <div class="info-admin mb-3">
                              <div class="d-flex align-items-center justify-content-center">
                                 <i class="fa fa-users text-primary mr-2"></i>
                                 <small><b>GTI</b> Development Team</small>
                              </div>
                           </div>

                           <!-- ACTION -->
                           <div class="d-flex justify-content-center gap-2">
                              <a href="#" class="btn btn-sm btn-primary px-3 mr-1">
                                 <i class="fa fa-cog me-1"></i> Kelola Sistem
                              </a>
                              <a href="#" class="btn btn-sm btn-outline-secondary px-3">
                                 <i class="fa fa-chart-bar"></i>
                              </a>
                           </div>

                     </div>
                  </div>


                  <div class="card">
                     <div class="card-body">

                    
                     <div class="activity-wrapper">

                        <!-- HEADER -->
                        <div class="activity-header d-flex justify-content-between align-items-center mb-2">
                           <div>
                                 <h6 class="mb-0 fw-bold">
                                    <i class="fa fa-history text-primary me-1"></i> Log Activity System
                                 </h6>
                                 <small class="text-muted">Riwayat aktivitas terbaru pengguna</small>
                           </div>

                           <span class="badge bg-light text-dark border">
                                 {{ count($logs) }} Activity
                           </span>
                        </div>

                        <!-- CONTENT -->
                        <div class="activity-box">

                           @foreach ($logs as $log)
                           <div class="activity-item">

                                 <!-- ICON -->
                                 <div class="activity-icon bg-primary">
                                    <i class="fa fa-user"></i>
                                 </div>

                                 <!-- CONTENT -->
                                 <div class="activity-content">

                                    <div class="d-flex justify-content-between">
                                       <strong class="small">
                                             {{ $log->user->name ?? '-' }}
                                       </strong>
                                       <small class="text-muted">
                                             {{ formatDateTime($log->created_at) }}
                                       </small>
                                    </div>

                                    
                                    <div class="small text-muted" style="">
                                       {{ $log->action }}
                                       @if ($log->vdr_id)
                                             <span class="">
                                                {{ $log->vdr->code ?? '' }}
                                             </span>
                                       @endif
                                    </div>

                                 </div>
                           </div>
                           @endforeach

                        </div>
                     </div>
                   </div>
                  </div>
            </div>
            <div class="col-md-9">
               {{-- <div class="row">
                  <div class="col-md-6">
                     <div class="card card-statistic-1 border">
                        <a href="{{route('vdr.marine.validation')}}">
                        <div class="card-icon bg-primary">
                          <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                          <div class="card-header">
                           
                            <h4>VDR Validation</h4>
                          </div>
                          <div class="card-body">
                            {{count($vdrValidations)}}
                          </div>
                        </div>
                     </a>
                      </div>
                  </div>
                  <div class="col-md-6">
                     <div class="card card-statistic-1 border">
                        <a href="{{route('marine.request.list')}}">
                           <div class="card-icon bg-info">
                           <i class="far fa-user"></i>
                           </div>
                           <div class="card-wrap">
                           <div class="card-header">
                              <h4>Cargo Validation</h4>
                           </div>
                           <div class="card-body">
                              {{count($cargoValidations)}}
                           </div>
                           </div>
                        </a>
                      </div>
                  </div>
               </div> --}}
               {{-- <span class="btn btn-light border">Sailing Order</span> --}}
               <div class="card shadow-lg">
                  {{-- <div class="card-header">
                     
                  </div> --}}
                  <div class="card-body">
                     {{-- <div class="badge badge-info mb-2">
                        ALL VDR
                     </div> --}}
                     <div class="note-vdr d-flex align-items-start mb-3">
    
                        <!-- ICON -->
                        <div class="note-icon mr-2">
                           <i class="fa fa-folder-open"></i>
                        </div>

                        <!-- CONTENT -->
                        <div class="note-content">
                           <strong>Informasi Data VDR</strong>
                           <div class="text-muted small">
                                 Semua <b>VDR (Vessel Daily Report)</b> yang telah masuk ke dalam sistem akan ditampilkan pada tabel di bawah ini. 
                                 Pastikan data telah diverifikasi sebelum dilakukan proses lanjutan.
                           </div>
                        </div>

                     </div>
                     
                     
                     <table class="datatables-vdr">
                        
                        <thead>
                           
                           <tr>
                              <th>ID</th>
                              <th>Vessel</th>
                              
                              {{-- <th>Release</th> --}}
                              <th>Flow</th>
                              <th>Func</th>
                              <th>Area</th>
                              <th class="text-right">Status</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($allVdrs as $vdr)
                              <tr>
                                 <td>{{$vdr->id}}</td>
                                 <td class="text-truncate" ><a href="{{route('vdr.show.spa', [enkripRambo($vdr->id), enkripRambo('index')])}}">{{$vdr->code}}</a></td>
                                 
                                 {{-- <td>
                                    
                                    {{$vdr->release_date}}
                                 </td> --}}
                                 {{-- <td>
                                    @if ($vdr->vessel->type == 'Tug Boat')
                                    {{$vdr->vessel->type}}
                                    @endif
                                     {{$vdr->vessel->ipb ?? ''}}
                                 </td> --}}
                                 <td class="">
                                
                                    <x-status-stisla.vdr-flow :vessel="$vdr->vessel" />
                                 </td>
                                 <td>
                                    @if ($vdr->func != null)
                                           {{$vdr->func}}
                                           @else
                                           Null
                                       @endif
                                 </td>
                                 <td>
                                    {{-- @if ($vdr->vessel->type == 'Tug Boat' || $vdr->vessel->ipb == 'IPB') --}}
                                       @if ($vdr->area != null)
                                           {{$vdr->area}}
                                           @else
                                           Empty
                                       @endif
                                       {{-- @else --}}
                                       
                                    {{-- @endif --}}
                                 </td>
                                <td class="text-right text-truncate">
                                    <x-status-stisla.vdr :vdr="$vdr" /> 
                                    {{-- {{$vdr->status}} --}}
                                 </td>
                              </tr>
                           @endforeach
                        </tbody>
                     </table>

                     
                     
                     
                  </div>
               </div>
               
               
               <hr>
               
               {{-- @if ($itemRejects)
                  <table>
                     <tbody>
                        <tr class="bg-danger text-white">
                           <th colspan="3">Cargo takeout by OPS</th>
                        </tr>
                        @foreach ($itemRejects as $rej)
                           <tr>
                              <td>{{$rej->description}}</td>
                              <td>{{formatDate($rej->undo)}}</td>
                              <td>{{$rej->reason}}</td>
                           </tr>
                        @endforeach
                        <tr>
                           <td>
                              <a href="{{route('marine.request.list')}}">Open Intermilan</a>
                           </td>
                        </tr>
                     </tbody>
                  </table>
                   
               @endif --}}
      
            </div>
            <div class="col-md-4">
               
              
               
              
            </div>
            
         </div>

         <div class="row">
            <div class="col-md-12">
               <div class="card shadow-lg">
                  {{-- <div class="card-header">
                     
                  </div> --}}
                  <div class="card-body">
                     <span class="badge badge-info mb-2">
                        MONITORING VDR
                     </span>
                     <span class="badge badge-info mb-2">
                       16/09/2025 -  {{\Carbon\Carbon::now()->format('d/m/Y')}}
                     </span>
                     
                     {{-- <table class="display  border">
                        <tbody>
                           <tr>
                              <th>All Vessel Daily Report</th>
                           </tr>
                        </tbody>
                     </table> --}}
                     
                        <table class="datatables-vdr-monitoring text-dark">
                           
                           <thead>
                           
                              <tr>
                                 
                                 <th>Vessel</th>
                                 
                                 <th class="">Last VDR</th>
                                 <th class="">Release at</th>
                                 <th>Release Gap</th>
                                 <th>Status</th>
                                 <th class="text-center">Total</th>
                                 <th class="text-center">Draft</th>
                                 <th class="text-center">Rejected</th>
                                 <th class="text-center">PET</th>
                                 <th class="text-center">Marine</th>
                                 <th class="text-center">Suptent</th>
                                 <th class="text-center">Complete</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($vessels as $vessel)
                             
                                 @if (count($vessel->getVdrs()) > 0)
                                 <tr >
                                    <td><a href="{{route('vdr.statistic.vessel', enkripRambo($vessel->id))}}">{{$vessel->name}}</a></td>
                                    
                                    <td class="">{{formatDate($vessel->getVdrLast()->date)}}</td>
                                    <td class="">
                                       @if ($vessel->getVdrLast()->release_date != null)
                                       {{formatDateTimeB($vessel->getVdrLast()->release_date)}}
                                       @endif
                                       
                                    </td>
                                    <td class="">{{$vessel->getVdrLast()->getDistance()}}</td>
                                    <td>
                                       <x-status-stisla.vdr-plain :vdr="$vessel->getVdrLast()" />
                                    </td>
                                    <td class="text-center">{{count($vessel->getVdrs())}}</td>
                                    <td class="text-center">{{count($vessel->getVdrs()->where('status', 0))}}</td>
                                    <td class="text-center">{{count($vessel->getRejectVdrs())}}</td>
                                    <td class="text-center">{{count($vessel->getPetVdrs())}}</td>
                                    <td class="text-center">{{count($vessel->getMarineVdrs())}}</td>
                                    <td class="text-center">{{count($vessel->getSuptentVdrs())}}</td>
                                    {{-- <td>{{count($vessel->getProgressVdrs())}}</td> --}}
                                    <td class="text-center">{{count($vessel->getCompleteVdrs())}}</td>
      
                                 </tr>
      
                                 
                                 @endif
   
                                 
                                 
                              @endforeach
                              
                             
                           </tbody>
                        </table>
                     
                  </div>
               </div>
            </div>
            <div class="col-md-4">
               <div class="card shadow-lg">
                  {{-- <div class="card-header">
                     
                  </div> --}}
                  <div class="card-body">
                     <span class="badge badge-info mb-2">
                        MONITORING VDR
                     </span>
                     <span class="badge badge-info mb-2">
                       16/09/2025 -  {{\Carbon\Carbon::now()->format('d/m/Y')}}
                     </span>
                     
                     {{-- <table class="display  border">
                        <tbody>
                           <tr>
                              <th>All Vessel Daily Report</th>
                           </tr>
                        </tbody>
                     </table> --}}
                     
                        <table class="datatables-vdr-monitoring text-dark">
                           
                           
                           <tbody>
                              <tr>
                                 <td>Draft</td>
                                 <td>{{$totalDraft}}</td>
                              </tr>
                              <tr>
                                 <td>Waiting PET</td>
                                 <td>{{$totalPet}}</td>
                              </tr>
                              <tr>
                                 <td>Waiting Marine</td>
                                 <td>{{$totalMarine}}</td>
                              </tr>
                              <tr>
                                 <td>Waiting Suptent</td>
                                 <td>{{$totalSuptent}}</td>
                              </tr>
                              <tr>
                                 <td>Complete</td>
                                 <td>{{$totalComplete}}</td>
                              </tr>
                           </tbody>
                        </table>
                     
                  </div>
               </div>
            </div>
         </div>
         
      </div>
   </section>

@endsection



