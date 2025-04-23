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


<div class="row"> 
   <div class="col-md-4">
      <div class="card">
         <div class="card-body">
            <h2>{{$office->name}}</h2>
            <hr>
            <table class="border">
               <thead>
                  <tr class="bg-dark text-white">
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
      </div>
   </div>
   <div class="col-md-8">
      <div class="card">
         {{-- <div class="card-header">
            <h3>VDR LIST</h3>
         </div> --}}
         <div class="card-body">
            <span class="badge badge-info"><b>VDR LIST</b></span>
            
            <hr>
            <div class="table-responsive">
               <table class=" table-striped display " id="table-1">
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
                        <tr class="">
                           {{-- <td class="text-muted text-center"><small>{{++$i}}</small></td> --}}
                           <td>
                              <a href="{{route('vdr.show', [enkripRambo($vdr->id), enkripRambo('index')])}}">{{vdrId($vdr->id)}}</a>
      
                           </td>
                           <td>{{$vdr->vessel->name}}</td>
                           <td>{{formatDate($vdr->date)}}</td>
                           <td>{{$vdr->crew_onduty}} / {{$vdr->crew_max}}</td>
                           <td>{{$vdr->location_midnight}}</td>
                           <td>
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


