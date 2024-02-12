<style>
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
</style>

<div class="card shadow-lg">
   <div class="card-body">
      <div class="row">
         
         <div class="col-md-8">
            {{-- <div class="badge badge-info">DSP</div> --}}
            <div class="table-responsive">
               <table class="" id="table-6">
                  <thead >
                     <tr>
                        <th colspan="4" class="py-1">Digital Smart Port</th>
                     </tr>
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
            
            <div class="table-responsive mt-4">
               <table class="" id="table-6">
                  <thead >
                     <tr>
                        <th colspan="4" class="py-1">Vessel Daily Report</th>
                     </tr>
                     <tr>
                        {{-- <th class="text-center">No</th> --}}
                        <th>ID</th>
                        <th>Date</th>
                        <th>Crew</th>
                        <th style="width: 120px">Status</th>
                     </tr>
                  </thead>
                  <tbody>
                     @if ($vdr)
                        <tr>
                           <td><a href="{{route('vdr.show', $vdr->id)}}">{{$vdr->code}}</a> </td>
                           <td>{{formatDate($vdr->date)}}</td>
                           <td>{{$vdr->crew_onduty}} / {{$vdr->crew_max}}</td>
                           <td>
                              @if(date('Y-m-d', strtotime($vdr->date)) == date('Y-m-d'))
                              <small>Draft</small>
                              @else
                              <small>Release</small>
                              @endif
                           </td>
                        </tr>
                        @else
                        <tr><td colspan="4" class="text-center py-3">Anda belum membuat VDR hari ini</td></tr>
                     @endif
                     
                  </tbody>
               </table>
            </div>
            
            <div class="table-responsive mt-4">
               <table class="" id="table-6">
                  <thead >
                     <tr>
                        <th colspan="4" class="py-1">My Request</th>
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
            <marquee  class="px-4 bgb-2  rounded text-white py-2 px-2 mb-2" >
               <i class="fa fa-bell"></i> Welcome to MARS, This main page contains summary data from several systems (Digital Smart Port, Vessel Daily Report) and Document Alert on the right side. 
            </marquee>
            <div class="table-responsive">
               <table class="table-striped" id="table-6">
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
   </div>
   <div class="card-footer bg-whitesmoke">
      Please pay attention to the alert table on the right
   </div>
</div>

