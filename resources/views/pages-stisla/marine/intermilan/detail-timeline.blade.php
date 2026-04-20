@extends('layouts.stisla.app')
@section('title')
    DSP Intermilan Management 
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
      /* text-align: center;  */
      /* background-color: rgb(226, 236, 151) */
      
   }
   </style>
<section class="section">

 
   
   <div class="section-body">
      <div class="row">
         <div class="col-md-12">
            
            <div class="card ">
               
              
               <div class="card-body">
                  
                 
                  {{-- <div class="d-flex justify-content-between">
                     <div class="">
                        <span>{{$intermilan->code}} </span> <br>
                        <span>{{$intermilan->title}}</span>
                        <h5 class="mb--2">
                        
                           INTERMILAN {{formatDate($start)}} - {{formatDate($end)}}</h5>
                        
                     </div>
                     
                     
                  
                  </div> --}}

                 <div class="row">
                     <div class="col-md-6">
                        
                        <table class="table table-sm border">
                           <tbody>
                              <tr>
                                 <td colspan="2" class="border">
                                    <h4>INTERMILAN</h4>
                                 </td>
                              </tr>
                              <tr>
                                 <td class="border">ID</td>
                                 <td class="border">{{$intermilan->code}}</td>
                              </tr>
                              <tr>
                                 <td class="border">Periode</td>
                                 <td class="border">{{formatDate($start)}} - {{formatDate($end)}}</td>
                              </tr><tr>
                                 <td class="border">Title</td>
                                 <td class="border">{{$intermilan->title}}</td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                     <div class="col-md-6">

                        <div class="btn-group">
                           <button onclick="location.reload()" class="btn mb-2 btn-info">
                              <i class="fa fa-refresh"></i>
                              Refresh Data
                            </button>
                           
                           
                           <a class="btn  btn-light border mb-2" href="{{route('document.intermilan.export', [enkripRambo($start),enkripRambo($end)])}}" target="_blank" class="" data-toggle="tooltip" data-placement="top" title="Export PDF">
                              <i class="fa fa-file"></i>
                              Export PDF 
                           </a>
                        </div>

                        
                     </div>
                  </div>

                  
                  
                  {{-- <hr> --}}
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link " id="home-tab"  href="{{route('intermilan.marine.detail', enkripRambo($intermilan->id))}}"  aria-controls="home" aria-selected="true">Intermilan</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Crew</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="contact-tab"  href="{{route('intermilan.marine.risalah', enkripRambo($intermilan->id))}}"  aria-controls="contact" aria-selected="false">Risalah</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link active"  href="#"  aria-controls="ok" aria-selected="false">Timeline</a>
                     </li>

                     {{-- <li class="nav-item">
                        <a class="nav-link" id="ok-tab" data-toggle="tab" href="#ok" role="tab" aria-controls="ok" aria-selected="false">Schedule</a>
                     </li> --}}
                  </ul>
                  <div class="tab-content" id="myTabContent">
                     <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <table class="table table-striped  border datatables-3">
                           <thead>
                              <tr>
                                 <th class=" border" >User</th>
                                 <th class="border">Activity Plan</th>
                                 <th class="border">Description</th>
                                 <th class="border">Timestamp</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($timelines as $time)
                                  <tr>
                                    <td class="border">{{ $time->user->name }}</td>
                                    <td class="border">
                                        {{ $time->request->user->name }} -
                                       {{ $time->request->description }}

                                       @if (count($time->request->cargoItems) > 0)
                                       (
                                          @foreach ($time->request->cargoItems as $cargo)
                                             <a data-toggle="collapse" href="#formItemEdit-{{$cargo->id}}">{{$cargo->description}}</a>,
                                          @endforeach
                                       )
                                       @endif
                                    </td>
                                    <td class="border">{{ $time->activity }}</td>
                                    <td class="border">{{ $time->created_at->format('d-m-Y H:i:s') }}</td>
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
</section>


<div class="modal fade" id="modalSubmitIntermilan" tabindex="-1" role="dialog"  aria-hidden="true">
   <div class="modal-dialog" role="document">
      <form action="{{ route('intermilan.marine.submit') }}" method="POST" enctype="multipart/form-data">
         @csrf
         @method('PUT')

         <input type="number" name="intermilanId" id="intermilanId" value="{{ $intermilan->id }}" hidden>

         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title"> 
                  <i class="fas fa-exclamation-triangle text-warning"></i>
                  {{-- <i class="fas fa-exclamation-circle text-warning fa-bounce"></i>  --}}
                  Konfirmasi Submit Intermilan</h5>

               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
               
            </div>
            <div class="modal-body">
               
               {{-- <i class="fas fa-times-circle text-danger"></i> --}}
               <b>Apakah Anda yakin ingin mengirim data ini?</b> <br>
                <small>Activity Plan dengan status "Vessel Assigned" akan ditampilkan di akun Kapal. <br><br></small>
              
                
               
               <div class="table-responsive">
                  <table class="table table-sm border">
                     <tbody>
                        
                        <tr>
                              <td class="">ID</td>
                              <td class="">{{$intermilan->code}}</td>
                           </tr>
                           <tr>
                              <td class="">Periode</td>
                              <td class="">{{formatDate($start)}} - {{formatDate($end)}}</td>
                           </tr><tr>
                              <td class="">Title</td>
                              <td class="">{{$intermilan->title}}</td>
                           </tr>
                        
                     </tbody>
                  </table>
               </div>

               

                  <small> <b>Note:</b> Setelah submit, data akan ditampilkan pada akun Kapal. </small>
               


               
               
            </div>
            <div class="modal-footer bg-whitesmoke">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-info" onclick="handleClick(this)">Submit</button>
            </div>
         </div>
      </form>
   </div>
</div>

 

  



    
@endsection