<style>
   table {
      width: 100%;
      background-color: white;
      border-radius: 5px;
      /* box-shadow: 1px 1px 5px rgb(159, 158, 158); */
   }

   table, th, td {
      /* border: 1px solid rgb(226, 218, 218); */
      /* border-collapse: collapse; */
   }
   th, td {
      padding-left: 5px
   }

   
</style>

      
      <div class="row">
         {{-- <h1>ok</h1> --}}
         <div class="col-md-8">
            
            
            {{-- <div class="alert bg-info">
               Announcement from PET
               <hr>
               Segera lakukan update nilai VDR pada tab <b>Operating Data</b> bagian <b>Contractual Fuel Consumption</b>, diisi ulang dengan nilai Decimal lengkap dengan angka dibelakang koma(.) jika ada.
               <br>
               Langkah ini hanya dilakukan sekali, abaikan pesan ini jika anda telah merubah nilai tersebut. Terimakasih.
            </div> --}}
            {{-- <div class="badge badge-info">DSP</div> --}}
            
            
           

            <div class="card shadow">
               
               <div class="card-body ">
                  <h4>Welcome back, {{$vessel->name}} !</h4>
                  <div>Jika anda ingin membuat Vessel Daily Report silahkan 
                     {{-- @if (auth()->user()->username == 'logindo' || auth()->user()->username == 'tegasjaya') --}}
                     <a href="{{route('vdr.vessel.create.spa')}}">Klik disini</a>
                     {{-- @else
                     <a href="{{route('vdr.vessel.create')}}">Klik disini</a>
                     @endif --}}
                     , atau klik VDR pada menu utama</div>
                  <hr>
                  {{-- <div class="mb-2" style="color: #1f4481 !important">
                     <b></b>
                  </div> --}}
                  @if (count($rejectvdrs) > 0)
                  <div class="card shadow-none border">
                     <div class="card-header py-1 bg-danger text-white">
                        <b>VDR REJECT ALERT! </b>
                     </div>
                     <div class="card-body">
                        @foreach ($rejectvdrs as $rejectvdr)
                        
                           VDR <b>{{$rejectvdr->code}}</b>  <b>Rejected</b> by <b>{{$rejectvdr->rejectBy->name}}</b>  karena pada : <br>
                           {{$rejectvdr->reject_data}} <br>
                            {{$rejectvdr->reject_desc}}
                          <br><br>
                           <a class="btn btn-sm btn-primary" href="{{route('vdr.revisi.store', enkripRambo($rejectvdr->id))}}" >Klik disini untuk melakukan Revisi</a> <br> <br>

                           @endforeach
                     </div>
                  </div>
                  @endif
                  <div  class="table-responsive overflow-auto " style="height: 210px" >
                     <table class="table table-sm" >
                        <thead>
                           <tr>
                              <th colspan="4" style="color: #1f4481 !important">Recent Vessel Daily Report</th>
                           </tr>
                           <tr>
                              {{-- <th class="text-center">No</th> --}}
                              <th>ID</th>
                              {{-- <th>Date</th>
                              <th>Crew</th> --}}
                              <th style="width: 120px">Status</th>
                              <th></th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($myrecentvdrs as $myvdr)
                           <tr>

                              <td>
                                 {{-- @if (auth()->user()->username == 'logindo' || auth()->user()->username == 'tegasjaya') --}}
                                    <a href="{{route('vdr.show.spa', [enkripRambo($myvdr->id), enkripRambo('index')])}}">{{$myvdr->code}}</a>
                                     {{-- @else
                                     <a href="{{route('vdr.show', [enkripRambo($myvdr->id), enkripRambo('index')])}}">{{$myvdr->code}}</a>
                                 @endif --}}
                                 {{-- <a href="{{route('vdr.show', [enkripRambo($myvdr->id), enkripRambo('index')])}}">{{$myvdr->code}}</a> --}}
                              </td>
                              {{-- <td>{{formatDate($myvdr->date)}}</td>
                              <td>{{$myvdr->crew_onduty}} / {{$myvdr->crew_max}}</td> --}}
                              <td class="text-truncate">
                                 {{-- @if(date('Y-m-d', strtotime($myvdr->date)) == date('Y-m-d'))
                                 <small>Draft</small>
                                 @else
                                 <small>Release</small>
                                 @endif --}}
                                 <x-status-stisla.vdr :vdr="$myvdr" />
                              </td>
                              <td><a href="{{route('vdr.show.spa', [enkripRambo($myvdr->id), enkripRambo('index')])}}">Detail SPA</a> </td>
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
                              {{-- <th>Date</th> --}}
                              {{-- <th>Type</th> --}}
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
         <div class="col-md-4">
            
            <marquee  class="px-4  shadow rounded text-white py-2 px-2 mb-2"  style="background-color: #1f4481">
               <i class="fa fa-bell"></i> Welcome to MARS (Marine Advanced Reporting System) Klik 'VDR' pada Menu Utama dibagian atas untuk mengakses data VDR secara lengkap | Email Vessel & Email Office digunakan untuk menerima notifikasi terkait VDR
            </marquee>
            
            @if ($vessel->email == null || $vessel->email_office == null)
                  <div class="card card-danger shadow ">
                     <div class="card-body">
                        (!) Anda belum mengatur 
                        {{-- {{$vessel->email}} --}}
                        @if ($vessel->email == null)
                            Email Vessel
                        @endif
                        @if ($vessel->email_vessel == null)
                            Email Vessel
                        @endif
                     </div>
                  </div>
            @endif
            <div class="card shadow">
               <div class="card-body">
                  {{-- @if ($vessel->email == null || $vessel->email_office == null)
                  <div class="alert bg-danger">
                     oke
                  </div>
                  @endif --}}
                  
                  <form action="{{route('vessel.update.email')}}" method="POST">
                     @csrf
                     @method('PUT')
                     <input type="text" name="vessel" id="vessel" value="{{$vessel->id}}" hidden>
                     <div class="form-floating mb-3">
                        
                        <label for="name">Email Kapal</label>
                        <input type="text" required class="form-control" id="email_vessel" name="email_vessel" value="{{$vessel->email}}"  >
                        
                     </div>
                     <div class="form-floating mb-3">
                        
                        <label for="name">Email Office</label>
                        <input type="text" required class="form-control" id="email_office" name="email_office"  value="{{$vessel->email_office}}">
                        
                     </div>
                     <button class="btn btn-primary" type="submit">Update</button>
                  </form>
               </div>
            </div>
            
            <div class="card shadow">
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


