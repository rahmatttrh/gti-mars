@extends('layouts.stisla.app')
@section('title')
    DSP Dashboard
@endsection
@section('content')

<style>
   table {
      font-size: 11px;
   }

   td {
border-right: solid 1px rgb(255, 255, 255); 
border-left: solid 1px rgb(255, 255, 255);
line-height: 1.2 !important;
}

input {
   border:0;
   outline:0;
   text-align: center; 
   /* background-color: rgb(226, 236, 151) */
   
}
</style>
   <section class="section">
      <div class="row">
         {{-- <div class="col-md-3">
            <div class="card border shadow-lg">
               <div class="card-body">

                  
                  <h4 class="text-dark">{{$user->name ?? ''}}</h4>
                  
                  <hr>
                  <div class="row">
                     <div class="col-md-6">
                        <small>Progress Request</small><br>
                        <b>{{$requests->where('status', '>', 0)->count()}} </b>
                     </div>
                     <div class="col-md-6">
                        <small>Complete Request</small><br>
                        <b>{{$requests->where('status', 12)->count()}} </b>
                     </div>
                  </div>
                  
                  <hr>
                  <a href="{{asset('template/template-import-material.xlsx')}}">Download Template Import Material</a>
                  
               </div>
               
            </div>

            <div class="card shadow-lg">
               <div class="card-body">
                  <div class="badge badge-info">Intermilan List</div>
                  
               </div>
            </div>

           
               

            
            
         </div> --}}
         <div class="col-md-4">

            <div class="card ">
               {{-- <div class="card-header">
                  
               </div> --}}
               <div class="card-body px-3">
                  <div class="d-flex justify-content-between" >
                     <div>
                        <h4>INTERMILAN USER</h4>
                        <small><b>Note:</b> Klik 'Title' untuk melihat detail</small>
                     </div>
                     
                     <a  data-toggle="collapse" href="#collapseExample">Add New</a>
                  </div>
                  <div class="collapse" id="collapseExample">
                     <form action="{{route('intermilan.user.store')}}" method="POST">
                        @csrf
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group form-group-default">
                                 <label>From</label>
                                 <input type="date" name="from" id="from" class="form-control" required>
                                 
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group form-group-default">
                                 <label>To</label>
                                 <input type="date" name="to" id="to" class="form-control" required>
                                 
                              </div>
                           </div>
                        </div>
                        <div class="form-group form-group-default">
                           <label>Title</label>
                           <input type="text" name="title" id="title" class="form-control" required>
                        </div>
                        
                        <button class="btn btn-primary mb-4" type="submit" > Add</button> 
                        
                       
                        
                        
                        
                     </form>  
                  </div>
                  
                  <hr>

                 

                  <div class="table-responsive mt-1">
                     <table class="table border table-striped table-sm datatables-3">
                        <thead>
                           <tr>
                              {{-- <th>#</th> --}}
                              <th style="display: none" class="border">ID</th>
                              <th class="border" >Title</th>
                              <th class="border">Periode</th>
                              <th  style="display: none">Time</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($intermilans as $int)
                               <tr>
                                 {{-- <td style="width: 30" >{{++$i}}</td> --}}
                                 <td style="display: none" class="border"><a href="{{route('intermilan.user.detail', enkripRambo($int->id))}}">{{$int->code}}</a> </td>
                                 <td class="border"><a href="{{route('intermilan.user.detail', enkripRambo($int->id))}}"> {{$int->title}}</a> </td>
                                 <td class="border">{{formatDate($int->from)}} - {{formatDate($int->to)}}</td>
                                 <td style="display: none">{{$int->created_at}}</td>
                               </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
                  <hr>
                  
               </div>
            </div>


            

            {{-- <div class="card">
               <div class="card-body">
                  <div class="table-responsive">
                     <table class=" table-striped " id="table-1">
                           <thead>
                             
                              <tr>
                                 <th>ID</th>
                                 <th>Desc</th>
                                 <th>Route</th>
                                 <th>Vessel</th>
                                 <th>Date</th>
                                
                                 <th>Status</th>
                                
                              </tr>
                           </thead>
                           <tbody>
                              @if ($userRequests->count() > 0)
                              
                                 @foreach ($userRequests as $request)
                                    <tr>
                                      
                                       <td><a href="{{route('request.detail.new', enkripRambo($request->id))}}">{{$request->code}}</a></td>
                                       <td>
                                       {{$request->desc}} 
                                       @if ($request->activity_id == 1)
                                         ( @foreach ($request->cargoItems as $cargo)
                                             {{$cargo->description}}
                                          @endforeach
                                         )
                                       @endif
                                       
                                       </td>
                                       <td class="text-truncate">
                                      
                                       @if ($request->activity_id < 5)
                                       {{$request->origin->code ?? ''}} to {{$request->destination->code ?? ''}}
                                       @if ($request->titip_id)
                                             ({{$request->titip->name}})
                                       @endif
                                       @else
                                       -
                                       @endif
                                       
                                       </td>
                                       
                                       <td><a href="{{route('schedule.detail', enkripRambo($request->schedule_id))}}">{{$request->schedule->vessel->name ?? 'Empty'}}</a></td>
                                       <td>{{formatDate($request->date)}}</td>
                                      
                                       <td>
                                         
                                             <div class="badge badge-info">Waiting Vessel</div>
                                       </td>
                                       
                                    </tr>
                                 @endforeach
                                 @else
                                 <tr>
                                    <td colspan="6" style="text-align: center"><small>Emtpy</small></td>
                                 </tr>
                              @endif
                              
                           </tbody>
                     </table>
                  </div>
               </div>
            </div> --}}


            @if (count($titipRequests) > 0)
               
               @foreach ($titipRequests as $titip)
                  Request anda untuk <b> {{$titip->desc}}
                  @foreach ($titip->cargoItems as $item)
                      {{$item->desc}}
                  @endforeach
                  Tgl {{formatDate($titip->date)}} </b> tujuan {{$titip->request->origin->name}} - {{$titip->request->destination->name}} telah dititipkan di <b>{{$titip->request->destination->name}}</b> oleh Fleet Control.
                  Silahkan <b>Release Request Ulang</b> dengan rute baru {{$titip->origin->name}} - {{$titip->destination->name}}
                  <br>
                  <hr>
               @endforeach
               
            @endif
            @if ($confirms->count() > 0)
               @foreach ($confirms as $confirm)
                  <div class="alert alert-info" role="alert">
                     You have a Arrival Cargo from {{$confirm->origin->name}}. Click <a href="{{route('schedule.detail', enkripRambo($confirm->schedule_id))}}" class="alert-link">here</a> to see detail.
                  </div>
               @endforeach
            @endif
            
            
            
            
        
         </div>
         <div class="col-md-8">

            <div class="card ">
               {{-- <div class="card-header">
                  
               </div> --}}
               <div class="card-body px-3">
                  <div class="badge badge-info">
                     Monitoring Material
                  </div>
                  
                  <hr>

                 

                  <div class="table-responsive mt-1">
                     <table class="table border table-striped table-sm datatables-3">
                        <thead>
                           <tr>
                              {{-- <th>#</th> --}}
                              <th class="border">ID Intermilan Marine</th>
                              <th class="border" >Material</th>
                              <th class="border">Qty/Satuan</th>
                              <th class="border">Route</th>
                              <th class="border">Date</th>
                              <th class="border">Status</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($cargoItems as $cItem)
                               <tr>
                                 {{-- <td style="width: 30" >{{++$i}}</td> --}}
                                 <td class="border">
                                    @if ($cItem->request->intermilan_id == null)
                                        <i>Menunggu Antrian</i>
                                        @else
                                        <a href="{{route('intermilan.user.detail', enkripRambo($cItem->id))}}">{{$cItem->request->code}}</a> 
                                    @endif
                                    
                                 </td>
                                 <td class="border">{{$cItem->description}}</td>
                                 <td class="border">{{$cItem->qty}} / {{$cItem->unit}}</td>
                                 <td class="border">{{$cItem->request->origin->code}} - {{$cItem->request->destination->code}}</td>
                                 <td class="border">{{formatDate($cItem->request->date)}}</td>
                                 <td class="border">
                                    <x-status-stisla.request-plain :request="$cItem->request" />
                                 </td>
                              </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
                  <hr>
                  
               </div>
            </div>


            

            {{-- <div class="card">
               <div class="card-body">
                  <div class="table-responsive">
                     <table class=" table-striped " id="table-1">
                           <thead>
                             
                              <tr>
                                 <th>ID</th>
                                 <th>Desc</th>
                                 <th>Route</th>
                                 <th>Vessel</th>
                                 <th>Date</th>
                                
                                 <th>Status</th>
                                
                              </tr>
                           </thead>
                           <tbody>
                              @if ($userRequests->count() > 0)
                              
                                 @foreach ($userRequests as $request)
                                    <tr>
                                      
                                       <td><a href="{{route('request.detail.new', enkripRambo($request->id))}}">{{$request->code}}</a></td>
                                       <td>
                                       {{$request->desc}} 
                                       @if ($request->activity_id == 1)
                                         ( @foreach ($request->cargoItems as $cargo)
                                             {{$cargo->description}}
                                          @endforeach
                                         )
                                       @endif
                                       
                                       </td>
                                       <td class="text-truncate">
                                      
                                       @if ($request->activity_id < 5)
                                       {{$request->origin->code ?? ''}} to {{$request->destination->code ?? ''}}
                                       @if ($request->titip_id)
                                             ({{$request->titip->name}})
                                       @endif
                                       @else
                                       -
                                       @endif
                                       
                                       </td>
                                       
                                       <td><a href="{{route('schedule.detail', enkripRambo($request->schedule_id))}}">{{$request->schedule->vessel->name ?? 'Empty'}}</a></td>
                                       <td>{{formatDate($request->date)}}</td>
                                      
                                       <td>
                                         
                                             <div class="badge badge-info">Waiting Vessel</div>
                                       </td>
                                       
                                    </tr>
                                 @endforeach
                                 @else
                                 <tr>
                                    <td colspan="6" style="text-align: center"><small>Emtpy</small></td>
                                 </tr>
                              @endif
                              
                           </tbody>
                     </table>
                  </div>
               </div>
            </div> --}}


            @if (count($titipRequests) > 0)
               
               @foreach ($titipRequests as $titip)
                  Request anda untuk <b> {{$titip->desc}}
                  @foreach ($titip->cargoItems as $item)
                      {{$item->desc}}
                  @endforeach
                  Tgl {{formatDate($titip->date)}} </b> tujuan {{$titip->request->origin->name}} - {{$titip->request->destination->name}} telah dititipkan di <b>{{$titip->request->destination->name}}</b> oleh Fleet Control.
                  Silahkan <b>Release Request Ulang</b> dengan rute baru {{$titip->origin->name}} - {{$titip->destination->name}}
                  <br>
                  <hr>
               @endforeach
               
            @endif
            @if ($confirms->count() > 0)
               @foreach ($confirms as $confirm)
                  <div class="alert alert-info" role="alert">
                     You have a Arrival Cargo from {{$confirm->origin->name}}. Click <a href="{{route('schedule.detail', enkripRambo($confirm->schedule_id))}}" class="alert-link">here</a> to see detail.
                  </div>
               @endforeach
            @endif
            
            
            
            
        
         </div>

         
      </div>
   </section>
@endsection

