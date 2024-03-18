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
      <div class="col-md-9">
         <div class="card border shadow-none">
            <div class="card-header">
               <h4>Activity</h4>
            </div>
            <div class="card-body" style="height: 150px">
               <canvas id="myChart2"></canvas>
            </div>
         </div>
      </div>
      <div class="col-md-3">
         <div class="card bg-primary card-info border shadow-none">
            <div class="card-body">
               <h3>12</h3>
               <br>
               Acitivity
            </div>
         </div>
      </div>
      <div class="col-md-4">
         <div class="card border shadow-none">
            <div class="card-header">
              <h4>Fuel Consumption</h4>
            </div>
            <div class="card-body">
              <canvas id="myChart"></canvas>
            </div>
         </div>
         <div class="card bg-info border card-success shadow-none">
            <div class="card-body ">
               <h3>230</h3> <br>
               Fuel Consumption
            </div>
         </div>
      </div>
      <div class="col-md-4">
         <form action="{{route('vdr.filter')}}" method="POST">
            @csrf
           
            <div class="form-group">
               <div class="input-group">
                  
                  <select class="form-control " required name="vessel" id="vessel">
                     <option value="all">All Vessel</option>
                     @foreach ($vessels as $vess)
                        <option  value="{{$vess->id}}">{{$vess->name}}</option> 
                     @endforeach
                     
                  </select>
                  <div class="input-group-append">
                     <button class="btn btn-light border px-4" type="submit">Filter</button>
                     
                   </div>
               </div>
            </div>
            {{-- <button class="btn btn-primary btn-block" type="submit">Filter</button> --}}
         </form>
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
                  <tr>
                     <td>-</td>
                     <td>-</td>
                     <td>-</td>
                     <td>-</td>
                  </tr>
                  <tr>
                     <td>-</td>
                     <td>-</td>
                     <td>-</td>
                     <td>-</td>
                  </tr>
                  <tr>
                     <td>-</td>
                     <td>-</td>
                     <td>-</td>
                     <td>-</td>
                  </tr>
                  <tr>
                     <td>-</td>
                     <td>-</td>
                     <td>-</td>
                     <td>-</td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
      <div class="col-md-8">
         
         {{-- <div class="badge badge-info">DSP</div> --}}
         
         
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
                  
                  
               </tbody>
            </table>
         </div>
      </div>
      
   </div>
   <hr>
   <small>Please pay attention to the alert table on the right</small>

   @push('chart')
      <script>
         var ctx = document.getElementById("myChart2").getContext('2d');
         var myChart = new Chart(ctx, {
         type: 'bar',
            data: {
               labels: ["1", "2", "3", "4", "5", "6", "7","8","9", "10", "11", "12", "13", "14", "15","16", "17", "18", "19", "20", "21", "22","23","24", "25", "26", "27", "28", "29", "30"],
               datasets: [{
                  label: 'Statistics',
                  data: [1, 3, 2, 1, 4, 2, 1, 1, 3, 2, 1, 4, 2, 1, 2, 1, 3, 2, 1, 4, 2, 1, 1, 3, 2, 1, 4, 2, 1, 2],
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
    labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
    datasets: [{
      label: 'Statistics',
      data: [460, 458, 330, 502, 430, 610, 488],
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
    scales: {
      yAxes: [{
        gridLines: {
          drawBorder: false,
          color: '#f2f2f2',
        },
        ticks: {
          beginAtZero: true,
          stepSize: 150
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


