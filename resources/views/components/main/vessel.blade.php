<style>
   table {
      width: 100%;
      background-color: white;
      border-radius: 5px;
      /* box-shadow: 1px 1px 5px rgb(159, 158, 158); */
   }

   table, th, td {
      border: 1px solid rgb(226, 218, 218);
      border-collapse: collapse;
   }
   th, td {
      padding-left: 5px
   }

   
</style>


      <div class="row">
         {{-- <h1>ok</h1> --}}
         <div class="col-md-7">
            {{-- <div class="alert bg-info">
               Announcement from PET
               <hr>
               Segera lakukan update nilai VDR pada tab <b>Operating Data</b> bagian <b>Contractual Fuel Consumption</b>, diisi ulang dengan nilai Decimal lengkap dengan angka dibelakang koma(.) jika ada.
               <br>
               Langkah ini hanya dilakukan sekali, abaikan pesan ini jika anda telah merubah nilai tersebut. Terimakasih.
            </div> --}}
            {{-- <div class="badge badge-info">DSP</div> --}}
            @if (count($rejectvdrs) > 0)
            <div class="card shadow">
               <div class="card-header bg-danger text-white">
                  <b>VDR REJECT ALERT! </b>
               </div>
               <div class="card-body">
                  @foreach ($rejectvdrs as $rejectvdr)
                  
                     VDR dengan Number  <b>{{$rejectvdr->code}}</b> telah di <b>Reject</b> oleh <b>{{$rejectvdr->rejectBy->name}}</b>  dengan alasan <b>{{$rejectvdr->reject_desc}}</b> <br>
                     
                      <br>
                     <a href="{{route('vdr.show.spa', [enkripRambo($rejectvdr->id), enkripRambo('index')])}}" >Klik disini untuk melakukan Revisi</a>
                     @endforeach
               </div>
            </div>
            @endif
            
           

            <div class="card shadow">
               
               <div class="card-body ">
                  <div class="mb-2" style="color: #1f4481 !important">
                     <b>Vessel Daily Report</b>
                  </div>
                  <div  class="table-responsive overflow-auto " style="height: 150px" >
                     <table class="basic-datatables" >
                        <thead >
                           {{-- <tr>
                              <th colspan="4" style="color: #1f4481 !important">Vessel Daily Report</th>
                           </tr> --}}
                           <tr>
                              {{-- <th class="text-center">No</th> --}}
                              <th>ID</th>
                              <th>Date</th>
                              <th>Crew</th>
                              <th style="width: 120px">Status</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($myrecentvdrs as $myvdr)
                           <tr>
                              <td><a href="{{route('vdr.show', [enkripRambo($myvdr->id), enkripRambo('index')])}}">{{$myvdr->code}}</a> </td>
                              <td>{{formatDate($myvdr->date)}}</td>
                              <td>{{$myvdr->crew_onduty}} / {{$myvdr->crew_max}}</td>
                              <td class="text-truncate">
                                 {{-- @if(date('Y-m-d', strtotime($myvdr->date)) == date('Y-m-d'))
                                 <small>Draft</small>
                                 @else
                                 <small>Release</small>
                                 @endif --}}
                                 <x-status-stisla.vdr :vdr="$myvdr" />
                              </td>
                           </tr>
                           @endforeach
                           {{-- @if ($myvdr)
                              
                              
                              @else
                              <tr><td colspan="4" class="text-center py-3">Anda belum membuat VDR hari ini</td></tr>
                           @endif --}}
                           
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>

            <div class="card shadow">
               <div class="card-body">
                  <div class="mb-2" style="color: #1f4481 !important">
                     <b>Sailing Order</b>
                  </div>
                  <div class="table-responsive overflow-auto " style="height: 120px">
                     <table class="" >
                        <thead >
                           {{-- <tr>
                              <th colspan="4" style="color: #1f4481 !important">Sailing Order</th>
                           </tr> --}}
                           <tr>
                              {{-- <th class="text-center">No</th> --}}
                              
                              <th>ID</th>
                              <th>Date</th>
                              <th>Type</th>
                              <th style="width: 120px">Status</th>
                           </tr>
                        </thead>
                        <tbody>
                           @if (count($schedules) > 0)
                              @foreach ($schedules as $sche)
                              <tr>
                                 <td><a href="{{route('schedule.detail', enkripRambo($sche->id))}}">{{$sche->code}}</a> </td>
                                 <td>{{formatDate($sche->date)}}</td>
                                 <td>{{$sche->class}}</td>
                                 <td><x-status-stisla.schedule-plain :schedule="$sche" /></td>
                              </tr>
                              @endforeach
                              @else
                              <tr><td colspan="4" class="text-center py-3">Tidak ada Sailing Order</td></tr>
                           @endif
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            
            
            
            
            
            
            <div class="table-responsive mt-4">
               <table class="" id="table-6">
                  <thead >
                     <tr>
                        <th colspan="4" class="py-1" style="color: #1f4481 !important">My Request</th>
                     </tr>
                     <tr>
                        {{-- <th class="text-center">No</th> --}}
                        <th>ID</th>
                        <th>Date</th>
                        <th>Type</th>
                        <th class="text-center">Qty (KL)</th>
                        <th style="width: 120px">Status</th>
                     </tr>
                  </thead>
                  <tbody>
                     @if (count($requests) > 0)
                        @foreach ($requests as $req)
                            <tr>
                              <td><a href="{{route('request.detail', enkripRambo($req->id))}}">{{$req->code}}</a></td>
                              <td>{{formatDate($req->date)}}</td>
                              <td>{{$req->activity->name}}</td>
                              <td class="text-center">{{$req->qty}}</td>
                              <td><x-status-stisla.request-plain :request="$req" /></td>
                            </tr>
                        @endforeach
                        @else
                        <tr><td colspan="5" class="text-center py-3">Anda belum membuat Request Activity</td></tr>
                     @endif
                     
                  </tbody>
               </table>
            </div>
         </div>
         <div class="col-md-5">
            
            <marquee  class="px-4 bgb-2 shadow rounded text-white py-2 px-2 mb-2" >
               <i class="fa fa-bell"></i> Welcome to MARS, This main page contains summary data from several systems (Digital Smart Port, Vessel Daily Report) and Document Alert on the right side. 
            </marquee>
            <div class="card">
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table-sm" id="table-6">
                        <thead >
                           <tr>
                              <th  class="py-2">Alert</th>
                              <th  class="text-center"><a href="#" data-toggle="modal" data-target="#modal-add-doc">Add New</a></th>
                           </tr>
                           
                        </thead>
                        <tbody>
                           @if (count($docs) > 0)
                              @foreach ($docs as $doc)
                                 <tr>
                                    <td class="py-2"><x-status-stisla.doc :doc="$doc" /> </td>
                                    <td class="text-center"><a href="#" data-toggle="modal" data-target="#modal-edit-doc-{{$doc->id}}">{{formatDate($doc->date)}}</a> </td>
                                 </tr>
                              @endforeach
                              @else
                              <tr><td colspan="2" class="py-3 text-center">Empty</td></tr>
                           @endif
                           
                           
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            <hr>
            @if ($vessel->email_office == null)
            <div class="card card-danger">
               <div class="card-body">
                  Anda belum mengatur Email Kantor
               </div>
            </div>
            @endif
            
            {{-- <form action="{{route('vessel.stowage.update')}}" method="POST" enctype="multipart/form-data">
               @csrf
               @method('PUT')
               <input type="number" name="vessel" id="vessel" value="{{$vessel->id}}" hidden>
               <div class="form-group">
                  
                  <input type="file" class="form-control" id="stowage_plan" required name="stowage_plan" >
               </div>
               <button type="submit" class="btn btn-primary">Update Stowage Plan</button>
            </form>
            
            <hr>
            @if ($vessel->stowage_plan)
               <embed  style="width: 100%; height:500px;overflow:hidden" class="text-center" id="preview-pdf" src="{{asset('storage/' . $vessel->stowage_plan)}}" frameborder="0"></embed>
                @else
                <p>Stowage Plan Document Empty</p>
            @endif --}}
         </div>
      </div>
   <hr>
   <small>Please pay attention to the alert table on the right</small>


