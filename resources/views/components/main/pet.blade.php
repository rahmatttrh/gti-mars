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
   

   
</style>

   <div class="row">
      <div class="col-md-3">
         <div class="card bg-primary shadow">
            <div class="card-body ">
               
               <i class="fas fa-user"></i> Welcome back, <h4> {{auth()->user()->name}}</h4>
               <hr>
                <h4>Fuel Monitoring Team</h4>
                
            </div>
         </div>

         <div class="d-none d-md-block">
            <div class="mb-2 table-responsive shadow overflow-auto" style="height: 200px">
               <table class="border display "   >
                 {{-- <thead>
                    <tr>
                       <th>Time</th>
                       <th>User</th>
                       <th>Action</th>
                    </tr>
                 </thead> --}}
                 <tbody>
                    <tr>
                       <th style="color: #1f4481 !important">Log Activity</th>
                    </tr>
                    @foreach ($logs as $log)
                       <tr class="border">
                          <td class="text-truncate"><small> {{formatDateTime($log->created_at)}} {{$log->user->name ?? ''}}
                             <br>
                             {{$log->action}} </small>
                          </td>
                          
                          
                       </tr>
                    @endforeach
                 </tbody>
              </table>

            </div>
         </div>
         <hr>
         
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
                     {{count($vdrs->where('status', 1))}}
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
                     <div class="table-responsive " >
                        <table class="datatables">
                           
                           <thead>
                              {{-- <tr>
                                 <th colspan="3" style="color: #1f4481 !important">VDR Validation</th>
                              </tr> --}}
                              <tr>
                                 {{-- <th>Vessel</th> --}}
                                 <th>Numberr</th>
                                 {{-- <th>Date</th> --}}
                                 <th>Last Update</th>
                                 <th class="text-right">Status</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($vdrvalids as $vdr)
                                 <tr >
                                    <td>
                                       <a href="{{route('vdr.show.spa', [enkripRambo( $vdr->id), enkripRambo('index')])}}">{{$vdr->code}}</a>
                                       {{-- <a href="{{route('vdr.show', [enkripRambo( $vdr->id), enkripRambo('index')])}}">{{$vdr->vessel->name}}</a> --}}
                                    </td>
                                    {{-- <td>{{$vdr->code}}</td> --}}
                                    <td>{{formatDate($vdr->updated_at)}}</td>
                                    <td class="text-right">
                                       <x-status-stisla.vdr :vdr="$vdr" />
                                    </td>
                                 </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                  </div>
                  {{-- <div class="col-md-6">
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
   
   @push('chart')
      <script>
         

         var ctx = document.getElementById("myChart2").getContext('2d');
         var myChart = new Chart(ctx, {
         type: 'bar',
            data: {
               labels: {!! json_encode($dates) !!},
               datasets: [{
                  label: 'Activity',
                  data: {!! json_encode($values) !!},
                  borderWidth: 2,
                  backgroundColor: '#6777ef',
                  borderColor: '#6777ef',
                  borderWidth: 2.5,
                  pointBackgroundColor: '#6777ef',
                  pointRadius: 4
               }]
            },
            options: {
               legend: {
                  display: false
               },
               responsive: true,
               maintainAspectRatio: false,
               scales: {
                  yAxes: [{
                  gridLines: {
                     drawBorder: false,
                     color: '#f2f2f2',
                  },
                  ticks: {
                     beginAtZero: true,
                     stepSize: 1
                  }
                  }],
                  xAxes: [{
                  ticks: {
                     display: false
                  },
                  gridLines: {
                     display: false
                  }
                  }]
               },
            }
         });


         var ctx = document.getElementById("myChart").getContext('2d');
         var myChart = new Chart(ctx, {
         type: 'line',
         data: {
            labels: {!! json_encode($dates) !!},
            datasets: [{
               label: 'Statistics',
               data: {!! json_encode($fuel) !!},
               borderWidth: 2,
               backgroundColor: '#6777ef',
               borderColor: '#6777ef',
               borderWidth: 2.5,
               pointBackgroundColor: '#ffffff',
               pointRadius: 4
            }]
         },
         options: {
            legend: {
               display: false
            },
            responsive: true,
            maintainAspectRatio: false,
            scales: {
               yAxes: [{
               gridLines: {
                  drawBorder: false,
                  color: '#f2f2f2',
               },
               ticks: {
                  beginAtZero: true,
                  stepSize: 1500
               }
               }],
               xAxes: [{
               ticks: {
                  display: false
               },
               gridLines: {
                  display: false
               }
               }]
            },
         }
         });
       </script>
   @endpush


