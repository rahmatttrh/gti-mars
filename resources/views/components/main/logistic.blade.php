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


      <div class="row">
         
         <div class="col-md-6">
            <div class="card">
               
               <div class="card-body p-0">
                  <div class="table-responsive">
                     <table class="" id="">
                        <thead >
                           <tr class="bg-info text-white">
                              <th colspan="4" class="py-1">CREATE BCM</th>
                           </tr>
                           <tr>
                              {{-- <th class="text-center">No</th> --}}
                              <th>Vessel</th>
                              <th>ID</th>
                              <th>Date</th>
                              <th style="width: 120px">Status</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($schedules as $sche)
                               <tr>
                                 <td><a href="{{route('schedule.detail', enkripRambo($sche->id))}}"> {{$sche->vessel->name ?? ' Vessel Empty'}}</a></td>
                                 <td>{{$sche->code}}</td>
                                 <td>{{formatDate($sche->date)}}</td>
                                 <td><x-status-stisla.schedule-plain :schedule="$sche" /></td>
                               </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            
            
         </div>
         <div class="col-md-6">
            {{-- <div class="card border">
               <div class="card-body p-2"> --}}
                  {{-- <b>Tracking</b> --}}
                  
                  <div class="table-responsive">
                     <table class="table-sm table-striped " id="table-12">
                        <thead>
                           <tr>
                              <th>BCM</th>
                              <th>MTD</th>
                              <th>Desc</th>
                              {{-- <th>Weight</th> --}}
                              <th>Qty</th>
                              <th>Status</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($items as $item)
                               <tr>
                                 <td>{{$item->cargo->code ?? '-'}}</td>
                                 <td>{{$item->mtd}}</td>
                                 <td>{{$item->desc}}</td>
                                 {{-- <td>{{$item->weight}}</td> --}}
                                 <td>{{$item->qty}} {{$item->unit}}</td>
                                 <td>
                                    <x-status-stisla.request-plain :request="$item->request" />
                                 </td>
                               </tr>
                           @endforeach
                           
                        </tbody>
                     </table>
                  </div>
               {{-- </div>
            </div> --}}
            
         </div>
      </div>
   <hr>
   <small>Please pay attention to the alert table on the right</small>


