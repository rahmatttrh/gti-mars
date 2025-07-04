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
      box-shadow: 1px 1px 5px rgb(159, 158, 158);
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
      <div class="col-md-12">
         <div class="card card-statistic-1 ">
            <a href="{{route('vdr.marine.validation')}}">
            <div class="card-icon bg-primary">
            <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
            <div class="card-header">
               
               <h4>VDR Validation</h4>
            </div>
            <div class="card-body">
               {{count($vdrvalids)}}
            </div>
            </div>
         </a>
         </div>
      </div>
      
   </div>
   <div class="row"> 
      <div class="col-md-9">
         
         {{-- <span class="btn btn-light border">Sailing Order</span> --}}
         
         <div class="row">
            <div class="col-6">
               {{-- <table class="display  ">
                  <tbody>
                     
                  </tbody>
               </table> --}}
               <div class="table-responsive overflow-auto p-2" style="height: 310px">
                  <table class="">
                     
                     <thead>
                        <tr>
                           <th colspan="3" style="color: #1f4481 !important">VDR Validation</th>
                        </tr>
                        <tr>
                           <th>Vessel</th>
                           {{-- <th>Code</th> --}}
                           <th>Date</th>
                           <th>Status</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($vdrvalids as $vdr)
                           <tr class="border" style="border: 1px black">
                              <td>
                                 <a href="{{route('vdr.show.spa', [enkripRambo( $vdr->id), enkripRambo('index')])}}">{{$vdr->vessel->name}}</a>
                                 {{-- <a href="{{route('vdr.show', [enkripRambo( $vdr->id), enkripRambo('index')])}}">{{$vdr->vessel->name}}</a> --}}
                              </td>
                              {{-- <td>{{$vdr->code}}</td> --}}
                              <td>{{formatDate($vdr->date)}}</td>
                              <td>
                                 <x-status-stisla.vdr :vdr="$vdr" />
                              </td>
                           </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
            <div class="col-6">
               {{-- <table class="">
                  <tbody>
                     
                  </tbody>
               </table> --}}
               <div class="table-responsive overflow-auto p-2" style="height: 310px">
                  <table class="display  border">
                     
                     <thead>
                        <tr>
                           <th colspan="3" style="color: #1f4481 !important">VDR History</th>
                        </tr>
                        <tr>
                           <th>Vessel</th>
                           {{-- <th>Code</th> --}}
                           <th>Date</th>
                           <th>Status</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($vdrs->where('status', '>', 1) as $vdr)
                           <tr class="border" style="border: 1px black">
                              <td><a href="{{route('vdr.show.spa', [enkripRambo( $vdr->id), enkripRambo('index')])}}">{{$vdr->vessel->name}}</a></td>
                              {{-- <td>{{$vdr->code}}</td> --}}
                              <td>{{formatDate($vdr->date)}}</td>
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
         <hr>
         
         

      </div>
      <div class="col-md-3">
         
            <table class="display  border">
               <tbody>
                  <tr>
                     <th>Log Activity</th>
                  </tr>
               </tbody>
            </table>
            <div class="table-responsive overflow-auto" style="height: 320px">
             <table class="border display "   >
               {{-- <thead>
                  <tr>
                     <th>Time</th>
                     <th>User</th>
                     <th>Action</th>
                  </tr>
               </thead> --}}
               <tbody>
                  @foreach ($logs as $log)
                     <tr class="border">
                        <td class="text-truncate"><small> {{formatDateTime($log->created_at)}} {{$log->user->name}}
                           <br>
                           {{$log->action}} </small>
                        </td>
                        {{-- <td class="text-truncate" style="max-width: 100px"></td> --}}
                        {{-- <td></td> --}}
                        
                     </tr>
                  @endforeach
               </tbody>
            </table>
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


