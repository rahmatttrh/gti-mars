@extends('layouts.stisla.app')
@section('title')
   DSP Detail Sailing Order
@endsection
@section('content')
<section class="section">
   <div class="section-body">
      <div class="row">
         <div class="col-md-3">
            {{-- {{$schedule->status}} --}}
            

            

          
            

            <div class="card shadow-lg">
              
               <div class="card-body">
                  
                  <h5><b>{{$vessel->name ?? 'Vessel Empty'}}</b></h5>
                  <small>{{$vessel->type}}</small>
                  
                  
                  
                  
                  <hr>
                  <div class="badge badge-info mb-2">VDR Overview</div>
               
                  <table class="">
                     <tbody>
                        <tr>
                           <td class="border-bottom">Total</td>
                           <td class="border-bottom">{{count($vessel->getVdrs())}}</td>
                           
                           
                           
                           
                        </tr>
                        <tr>
                            <td class="border-bottom">Draft</td>
                            <td class="border-bottom">{{count($vessel->getVdrs()->where('status', 0))}}</td>
                         </tr>
                        <tr>
                           <td class="border-bottom">PET</td>
                           <td class="border-bottom">{{count($vessel->getPetVdrs())}}</td>
                        </tr>
                        <tr>
                           <td class="border-bottom">Marine</td>
                           <td class="border-bottom">{{count($vessel->getMarineVdrs())}}</td>
                        </tr>
                        <tr>
                           <td class="border-bottom">Suptent</td>
                           <td class="border-bottom">{{count($vessel->getSuptentVdrs())}}</td>
                        </tr>
                        <tr>
                           <td class="border-bottom">Rejected</td>
                           <td class="border-bottom">{{count($vessel->getRejectVdrs())}}</td>
                        </tr>
                        <tr>
                            <td class="border-bottom">Complete</td>
                            <td class="border-bottom">{{count($vessel->getCompleteVdrs())}}</td>
                         </tr>
                     </tbody>
                  </table>
                  {{-- <div class="d-flex justify-content-between">
                     <span>Total</span>
                     <span>{{count($vessel->getVdrs())}}</span>
                  </div>
                  <div class="d-flex justify-content-between">
                     <span>PET</span>
                     <span>{{count($vessel->getPetVdrs())}}</span>
                  </div>
                  <div class="d-flex justify-content-between">
                     <span>Marine</span>
                     <span>{{count($vessel->getMarineVdrs())}}</span>
                  </div>
                  <div class="d-flex justify-content-between">
                     <span>Suptent</span>
                     <span>{{count($vessel->getSuptentVdrs())}}</span>
                  </div>
                  <div class="d-flex justify-content-between">
                     <span>Rejected</span>
                     <span>{{count($vessel->getRejectVdrs())}}</span>
                  </div> --}}
                  
                  
                  
                 
                  
                  
               </div>
               
            </div>
           
            
         </div>
         <div class="col-md-9">
            
            <div class="card shadow-lg">
               <div class="card-body">
                  {{-- <b>ALL VDR</b>
                  <hr> --}}
                  <div class="table-responsive">
                     <table class="datatables-vdr-b">
                           
                        <thead>
                           
                           <tr>
                              <th>ID</th>
                              <th>Vessel</th>
                              <th>Date</th>
                              <th>Release at</th>
                              <th>Release Gap</th>
                              {{-- <th></th> --}}
                              {{-- <th>Date</th> --}}
                              <th class="">Status</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($vessel->getVdrs() as $vdr)
                              <tr >
                                 <td>{{$vdr->id}}</td>
                                 <td class="text-truncate" ><a href="{{route('vdr.show.spa', [enkripRambo($vdr->id), enkripRambo('index')])}}">{{$vdr->code}}</a></td>
                                 <td>
                                    {{$vdr->date}}
                                 </td>
                                 <td>
                                    @if ($vdr->status == 0)
                                    -
                                        @else
                                        {{$vdr->release_date}}
                                    @endif
                                    
                                 </td>
                                 <td>{{$vdr->getDistance()}}</td>
                                 {{-- <td>{{formatDate($sche->date)}}</td> --}}
                                 {{-- <td>{{formatRibuan(round($totaldaily))}}</td> --}}
                                 <td class=" text-truncate">
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
</section>


  
  
  
    
@endsection




