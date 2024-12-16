<style>
   /* table {
      width: 100%;
   }

   table, th, td {
      border: 1px solid rgb(226, 218, 218);
      border-collapse: collapse;
   }
   th, td {
      padding-left: 5px
   } */

   
</style>
   <div class="row"> 
      <div class="col-md-6">
         <table class="border">
            <thead>
               <tr>
                  <th>Vessel</th>
                  <th>Code</th>
                  <th>Date</th>
                  <th>Status</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($schedules as $sche)
                   <tr class="border">
                     <td><a href="{{route('schedule.detail', enkripRambo($sche->id))}}">{{$sche->vessel->name}}</a></td>
                     <td>{{$sche->code}}</td>
                     <td>{{formatDate($sche->date)}}</td>
                     <td>
                        <x-status-stisla.schedule-plain :schedule="$sche"/>
                     </td>
                   </tr>
               @endforeach
            </tbody>
         </table>
         <hr>
         {{ $schedules->links() }}
         <hr>
         @if ($itemrejects)
            <table>
               <tbody>
                  <tr class="bg-danger text-white">
                     <th colspan="3">Cargo takeout by OPS</th>
                  </tr>
                  @foreach ($itemrejects as $rej)
                     <tr>
                        <td>{{$rej->description}}</td>
                        <td>{{formatDate($rej->undo)}}</td>
                        <td>{{$rej->reason}}</td>
                     </tr>
                  @endforeach
                  <tr>
                     <td>
                        <a href="{{route('marine.request.list')}}">Open Intermilan</a>
                     </td>
                  </tr>
               </tbody>
            </table>
             
         @endif

      </div>
      <div class="col-md-6">
         
         <table class="border"  id="table-5" >
            <thead>
               <tr>
                  <th>BCM</th>
                  <th>MTD</th>
                  <th>Desc</th>
                  {{-- <th>Qty</th> --}}
                  {{-- <th>Vessel</th> --}}
                  <th>Status</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($items as $item)
                   <tr class="border">
                     <td>{{$item->cargo->code}}</td>
                     <td>{{$item->mtd}}</td>
                     <td>{{$item->description}}</td>
                     {{-- <td>{{$item->qty}} {{$item->unit}}</td> --}}
                     {{-- <td>{{$item->schedule->vessel->name}}</td> --}}
                     <td>
                        <x-status-stisla.request-plain :request="$item->request"/>
                     </td>
                   </tr>
               @endforeach
            </tbody>
         </table>
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


