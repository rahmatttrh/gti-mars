@extends('layouts.stisla.app')
@section('title')
   Intermilan Management 
@endsection
@section('content')
<style>
      td {
  border-right: solid 1px rgb(255, 255, 255); 
  border-left: solid 1px rgb(255, 255, 255);
}
   </style>



<style id="x3h2op">
.inbox-wrapper {
    max-height: 300px;
    overflow-y: auto;
    padding-right: 5px;
}

/* Scrollbar biar keliatan */
.inbox-wrapper::-webkit-scrollbar {
    width: 6px;
}
.inbox-wrapper::-webkit-scrollbar-thumb {
    background: #adb5bd;
    border-radius: 10px;
}

.inbox-item {
    display: flex;
    gap: 12px;
    padding: 12px;
    border-bottom: 1px solid #eee;
    transition: 0.2s;
    cursor: pointer;
}

.inbox-item:hover {
    background: #f8f9fa;
}

.inbox-icon {
    min-width: 40px;
    height: 40px;
    background: #e7f1ff;
    color: #0d6efd;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
}

.inbox-content {
    flex: 1;
}

.inbox-title {
    font-weight: 600;
}

.inbox-desc {
    font-size: 13px;
    color: #6c757d;
}

.inbox-time {
    font-size: 12px;
    color: #adb5bd;
}

.unread-dot {
    width: 8px;
    height: 8px;
    background: #0d6efd;
    border-radius: 50%;
    margin-top: 6px;
}
</style>







<section class="section">

   
   
   <div class="section-body">
      <div class="row">
         <div class="col-md-7">
            <div class="card">
               {{-- <div class="card-header">
                  
               </div> --}}
               <div class="card-body">
                  <div class="d-flex justify-content-between border-bottom mb-2" >
                     <h4> <i class="fa fa-calendar-alt text-primary"></i> INTERMILAN</h4>
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
                  
                  {{-- <hr> --}}
                  <div class="table-responsive">
                     <table class="border table table-sm table-striped  datatables"   id="table-19"  >
                        <thead style="display:none">
                           <tr>
                              {{-- <th class="border">ID</th> --}}
                              <th class="border">Title</th>
                              <th class="border">Periode</th>
                              
                              {{-- <th class="border">Status</th> --}}
                           </tr>
                        </thead>
                        <tbody>

                           @foreach ($intermilans as $inter)
                               <tr>
                                 <td class="border"><a href="{{route('intermilan.marine.detail', enkripRambo($inter->id))}}">{{$inter->title}}</a> </td>
                                 <td class="border">{{formatDate($inter->from)}} - {{formatDate($inter->to)}}</td>
                                 
                               </tr>
                           @endforeach
                           
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-5">

            <div class="card" id="b9k3qs">
               <div class="card-header d-flex justify-content-between align-items-center">
                  <div class="">
                  <strong><i class="fa fa-inbox"></i> Inbox Request</strong>
                  <div class="">
                     <small><b>Note: </b> Daftar Activity Plan dari User yang belum masuk kedalam Intermilan</small>
                  </div>
                  </div>
                  <span class="badge badge-danger">{{count($requests)}}</span>
               </div>

               <!-- SCROLL AREA -->
               <div class="card-body inbox-wrapper">

                  

                  <!-- ulangin item biar keliatan scroll -->
                  @foreach ($requests as $r)
                  <div class="inbox-item">
                        <div class="inbox-icon"><i class="fa fa-ship"></i></div>
                        <div class="inbox-content">
                           <div class="d-flex justify-content-between">
                              <div class="inbox-title">{{ $r->user->name }}</div>
                              <div class="inbox-time"><span class="text-primary">Pending</span></div>
                           </div>
                           <div class="inbox-desc">
                              {{ $r->description }}
                           </div>
                           <small class="">{{ formatDate($r->date) }}</small>
                        </div>
                  </div>
                  @endforeach

                 

                 

               </div>
            </div>

            
            
         </div>
         
      </div>
   </div>
</section>
    
@endsection