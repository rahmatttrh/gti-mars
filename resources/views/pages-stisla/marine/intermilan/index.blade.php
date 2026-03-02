@extends('layouts.stisla.app')
@section('title')
   Intermilan Management 
@endsection
@section('content')
<section class="section">

   <style>
      td {
  border-right: solid 1px rgb(255, 255, 255); 
  border-left: solid 1px rgb(255, 255, 255);
}
   </style>
   
   <div class="section-body">
      <div class="row">
         <div class="col-md-7">
            <div class="card shadow">
               {{-- <div class="card-header">
                  
               </div> --}}
               <div class="card-body px-3">
                  <div class="d-flex justify-content-between" >
                     <h4>INTERMILAN</h4>
                     <a  data-toggle="collapse" href="#collapseExample">Add ...</a>
                  </div>
                  <div class="collapse" id="collapseExample">
                     <form action="{{route('intermilan.marine.store')}}" method="POST">
                        @csrf
                        
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group form-group-default">
                                 <label>From</label>
                                 <input type="date" name="from" id="from" class="form-control" required value="{{$start}}">
                                 
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group form-group-default">
                                 <label>To</label>
                                 <input type="date" name="to" id="to" class="form-control" required value="{{$end}}">
                                 
                              </div>
                           </div>
                        </div>
                        <div class="form-group form-group-default">
                           {{-- <label>Title</label> --}}
                           <input type="text" name="title" id="title" class="form-control" required placeholder="Title...">
                        </div>
                        
                        <button class="btn btn-primary mb-4" type="submit" > Add</button> 
                        
                       
                        
                        
                        
                     </form>  
                  </div>
                  
                  <hr>
                  <div class="table-responsive">
                     <table class="border  "   id="table-19" class="datatables" >
                        <thead>
                           <tr>
                              <th class="border">ID</th>
                              <th class="border">Periode</th>
                              <th class="border">Title</th>
                              <th class="border">Status</th>
                           </tr>
                        </thead>
                        <tbody>

                           @foreach ($intermilans as $inter)
                               <tr>
                                 <td class="border"><a href="{{route('intermilan.marine.detail', enkripRambo($inter->id))}}">{{$inter->code}}</a> </td>
                                 <td class="border">{{formatDate($inter->from)}} - {{formatDate($inter->to)}}</td>
                                 <td class="border">{{$inter->title}}</td>
                                 <td class="border">-</td>
                               </tr>
                           @endforeach
                           
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-5">
            <div class="card shadow-lg">
               <div class="card-body p-1">
                  <span class="ml-1 mt-4 mb-3"><b >INBOX ({{count($requests)}})</b></span> 
                  
                  {{-- <h5 class="ml-2 mt-3"> </h5> --}}
                  {{-- <div class="badge badge-info mb-2">Log Activity</div> --}}
                  <div  class="table-responsive mt-2 overflow-auto " style="height: 550px" >
                  <table class=""   >
                     
                     <tbody>
                        @foreach ($requests as $r)
                           <tr class="border">
                           
                              <td class="">
                                 <a href="" >
                                    <div class="d-flex justify-content-between">
                                       <div class="">From : <span class="text-uppercase">{{$r->user->username ?? ''}}</span></div>
                                       <div class=""><small>{{formatDate($r->created_at)}}</small></div>
                                    </div>
                     
   
                                     {{$r->description}}
                                     <span class="text-muted">
                                       @foreach ($r->cargoItems  as $item)
                                           {{$item->description}}, 
                                       @endforeach
                                     </span>
                                     {{-- @if ($log->vdr_id)
                                     {{$vdr->code}}
                                         
                                     @endif --}}

                                
                                 
                                    </a>
                              </td>
                           
                              
                              
                           </tr>
                           
                        @endforeach
                     </tbody>
                  </table>
                  </div>
                  {{-- {{ $logs->links() }} --}}
               </div>
            </div>
         </div>
         
      </div>
   </div>
</section>
    
@endsection