{{-- <style>
   table {
      width: 100%;
   }

   table, th, td {
      border: 1px solid rgb(226, 218, 218);
      border-collapse: collapse;
   }
   th, td {
      padding-left: 5px
   }

   
</style> --}}

<style>
   table {
      width: 100%;
      background-color: white;
      border-radius: 5px;
      /* box-shadow: 1px 5px 10px rgb(159, 158, 158); */
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
      <div class="col-md-3">
         <div class="card bg-primary shadow">
            <div class="card-body ">
               
               Welcome back, <h4> {{auth()->user()->name}}</h4>
               <hr>
               Superintendent {{auth()->user()->getArea()}}
            </div>
         </div>
      </div>
      <div class="col-md-9">
         <div class="row ">
            <div class="col-md-4">
               <div class="card card-statistic-1 shadow-lg">
                  <a href="{{route('vdr.pet.validation')}}">
                  <div class="card-icon bg-info">
                  <i class="fas fa-user"></i>
                  </div>
                  <div class="card-wrap">
                  <div class="card-header">
                     
                     <h4>Waiting</h4>
                  </div>
                  <div class="card-body">
                     {{count($vdrs->where('status', 5))}}
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
                     {{count($vdrs->where('status', 101))}}
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
                     {{count($vdrs->where('status', '>', 1))}}
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
                     <h4>VDR Validation</h4>
                     <div class="table-responsive overflow-auto" style="height: 320px">
                        <table class="basic-datatables">
                           
                           <thead>
                              {{-- <tr>
                                 <th colspan="3" style="color: #1f4481 !important">VDR yang membutuhkan approval anda</th>
                              </tr> --}}
                              <tr>
                                 {{-- <th>Vessel</th> --}}
                                 <th>No</th>
                                 <th>Number</th>
                                 {{-- <th>Date</th> --}}
                                 <th>Status</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($vdrvalids as $vdr)
                                 <tr class="border" style="border: 1px black">
                                    <td>{{++$i}}</td>
                                    <td>
                                       <a href="{{route('vdr.show.spa', [enkripRambo( $vdr->id), enkripRambo('index')])}}">{{$vdr->code}}</a>
                                       {{-- <a href="{{route('vdr.show', [enkripRambo( $vdr->id), enkripRambo('index')])}}">{{$vdr->vessel->name}}</a> --}}
                                    </td>
                                    {{-- <td>{{$vdr->code}}</td> --}}
                                    {{-- <td>{{formatDate($vdr->date)}}</td> --}}
                                    <td>
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
   
   <div class="row"> 
      <div class="col-md-9">

         
         
         {{-- <span class="btn btn-light border">Sailing Order</span> --}}
         
         <div class="row">
            <div class="col-12">
               {{-- <table class="display  ">
                  <tbody>
                     
                  </tbody>
               </table> --}}
               
               
            </div>
            
         </div>
         <hr>
         
         

      </div>
      <div class="col-md-3">
         
            {{-- <table class="display  border">
               <tbody>
                  <tr>
                     <th>Log Activity</th>
                  </tr>
               </tbody>
            </table> --}}
            
            
        
      </div>
   </div>
   


