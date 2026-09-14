<style>
   /* table {
      width: 100%;
   }

   table, th, td {
      border: 1px solid rgb(226, 218, 218);
      /* border-collapse: collapse; */
   }
   th, td {
      padding-left: 5px
   } */
</style>

<style>
.vessel-card {
   transition: all 0.2s ease;
}
.vessel-card:hover {
   transform: translateY(-3px);
   box-shadow: 0 8px 20px rgba(0,0,0,0.08);
}
</style>


<div class="row"> 
   <div class="col-md-3">
      {{-- <div class="card">
         <div class="card-body">
            <h2>Welcome back, <br> {{$office->name}}</h2>
            <hr>
            <table class="border">
               <thead>
                  <tr class="bg-primary text-white">
                     <th>Daftar Kapal</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($vessels as $vessel)
                  <tr class="border">
                     <td>{{$vessel->name}}</td>
                  </tr>
                  @endforeach
                  
               </tbody>
            </table>
         </div>
      </div> --}}

      <div class="card shadow-lg border-0">
         <div class="card-body">

            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-3">
               <div>
                  <h5 class="mb-1 fw-bold">
                     <i class="fa fa-anchor text-primary"></i> 
                     Welcome back 
                  </h5> 
                  <h4>{{$office->description}}</h4>
                  <h5 class="text-muted mb-0">
                     {{$office->name}}
                     
                     {{-- Pelayaran Ekanuri Indra Pratama --}}
                  </h5>
                  
                  
               </div>

               <!-- Badge total kapal -->
               <div class="text-end">
                  <span class="badge badge-primary fs-6 px-3 py-2">
                     <i class="fa fa-building"></i> Office
                  </span>
               </div>
            </div>
            

            <!-- Divider -->
            <hr>

            <!-- Sub Title -->
            <div class="mb-3">
               <h6 class="fw-semibold ">
                  <i class="fa fa-list text-secondary"></i> Daftar Kapal
               </h6>
               <small class="text-muted">
                  Berikut adalah kapal yang berada di bawah pengelolaan kantor Anda
               </small>
            </div>

            <!-- List Kapal -->
            <div class="row">
               @foreach ($vessels as $vessel)
               <div class="col-12 mb-3">
                  <div class="card shadow-none border vessel-card">
                     <div class="card-body d-flex align-items-center">
                        
                        <!-- Icon -->
                        <div class="mr-3">
                           <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" style="width:50px; height:50px;">
                              <i class="fa fa-ship text-primary fs-5"></i>
                           </div>
                        </div>

                        <!-- Info -->
                        <div>
                           <h6 class="mb-0 fw-semibold">{{$vessel->name}}</h6>
                           <small class="text-muted">Operational Vessel</small>
                        </div>

                     </div>
                  </div>
               </div>
               @endforeach
            </div>

         </div>
      </div>

      <!-- Optional Styling -->



     
   </div>
   <div class="col-md-9">
      <div class="card">
         {{-- <div class="card-header">
            <h3>VDR LIST</h3>
         </div> --}}
         <div class="card-body">
            {{-- <span class="badge badge-info"><b>VDR LIST</b></span> --}}
            <div class="mb-3">
               <h6 class="fw-bold mb-1">
                  <i class="fa fa-ship text-primary"></i> Daftar VDR Kapal Anda
               </h6>
               <small class="text-muted">
                  Pantau dan kelola rekaman aktivitas pelayaran kapal Anda secara terpusat dan real-time.
               </small>
            </div>
            
            <div class="table-responsive">
               <table class="datatables-vdr" >
                  <thead>
                     <tr>
                        {{-- <th class="text-center">No.</th> --}}
                        <th>ID</th>
                        <th>Vessel</th>
                        <th>Date</th>
                        <th>Crew</th>
                        <th>Loc</th>
                        <th>Status</th>
                     </tr>
                  </thead>
                  <tbody>
      
                        @foreach($vdrs as $vdr)
                        <tr class="boder">
                           {{-- <td class="text-muted text-center"><small>{{++$i}}</small></td> --}}
                           <td class="border-bottom">
                              <a href="{{route('vdr.show', [enkripRambo($vdr->id), enkripRambo('index')])}}">{{vdrId($vdr->id)}}</a>
      
                           </td>
                           <td class="border-bottom">{{$vdr->vessel->name}}</td>
                           <td class="border-bottom">{{$vdr->date}}</td>
                           <td class="border-bottom">{{$vdr->crew_onduty}} / {{$vdr->crew_max}}</td>
                           <td class="border-bottom">{{$vdr->location_midnight}}</td>
                           <td class="border-bottom">
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
<hr>
<small>Please pay attention to the alert table on the right</small>


