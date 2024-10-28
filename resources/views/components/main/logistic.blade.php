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
         
         <div class="col-md-7">
            <div class="card">
               
               <div class="card-body p-0">
                  <div class="table-responsive">
                     <table class="border" id="">
                        <thead >
                           <tr class="bg-info text-white">
                              <th colspan="5" class="py-1">CREATE BCM</th>
                           </tr>
                           <tr class="border">
                              {{-- <th class="text-center">No</th> --}}
                              <th>Vessel</th>
                              <th>ID</th>
                              <th>Date</th>
                              
                              <th style="width: 120px">Status</th>
                              <th></th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($schedules as $sche)
                               <tr class="border-bottom">
                                 <td><a href="{{route('schedule.detail', enkripRambo($sche->id))}}"> {{$sche->vessel->name ?? ' Vessel Empty'}}</a></td>
                                 <td>{{$sche->code}}</td>
                                 <td>{{formatDate($sche->date)}}</td>
                                 {{-- <td><x-status-stisla.schedule-plain :schedule="$sche" /></td> --}}
                                 <td class="text-truncate">
                                    @if (count($sche->items->where('status', 0)) > 0)
                                        Waiting Validation
                                        @else
                                        Validated
                                    @endif
                                 </td>
                               </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            
            
         </div>
         <div class="col-md-5">
            {{-- <div class="card border">
               <div class="card-body p-2"> --}}
                  {{-- <b>Tracking</b> --}}
                  
                  <div class="table-responsive">
                     <table class="table table-sm border " id="table-12">
                        <thead>
                           <tr>
                              <th>BCM</th>
                              <th>MTD</th>
                              <th>Desc</th>
                              {{-- <th>Weight</th> --}}
                              {{-- <th>Qty</th> --}}
                              <th>Status</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($items as $item)
                               <tr class="border">
                                 <td>{{$item->cargo->code ?? '-'}}</td>
                                 <td>{{$item->mtd}}</td>
                                 <td>{{$item->description}}</td>
                                 {{-- <td>{{$item->weight}}</td> --}}
                                 {{-- <td>{{$item->qty}} {{$item->unit}}</td> --}}
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


