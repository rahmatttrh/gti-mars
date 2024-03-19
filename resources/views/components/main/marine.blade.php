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
      <div class="col-md-8">
         <div class="badge badge-info mb-3">12 Activity</div>
         <div class="" style="height: 150px">
            <canvas id="myChart2"></canvas>
         </div>
         <hr>
         <div class="badge badge-info mb-3">230 Lt Fuel Consumption</div>
         <div class="c" style="height: 150px">
            <canvas id="myChart"></canvas>
          </div>
          <div class="statistic-details mt-sm-4">
            
            <div class="statistic-details-item">
              {{-- <span class="text-muted"><span class="text-danger"><i class="fas fa-caret-down"></i></span> 23%</span> --}}
              <div class="detail-value">35</div>
              <div class="detail-name">Total Activity</div>
            </div>
            <div class="statistic-details-item">
               {{-- <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 7%</span> --}}
               <div class="detail-value">24</div>
               <div class="detail-name">Total Sailing Order</div>
             </div>
            <div class="statistic-details-item">
              {{-- <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span>9%</span> --}}
              <div class="detail-value">4</div>
              <div class="detail-name">Active Sailing Order</div>
            </div>
            
          </div>
      </div>
      <div class="col-md-4">
         <form action="{{route('statistic.filter')}}" method="POST">
            @csrf
           <div class="form-group">
            <div class="input-group">
               <input type="date" class="form-control" name="start" id="start" >
               <span class="mx-2 mt-3">To</span>
               <input type="date" class="form-control" name="end" id="end" >
               
            </div>
           </div>
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
         <div class="table-responsive mb-3">
            <table class="" id="table-14">
               <thead >
                  {{-- <tr>
                     <th colspan="4" class="py-1">Activity</th>
                  </tr> --}}
                  <tr>
                     {{-- <th class="text-center">No</th> --}}
                     {{-- <th>#</th> --}}
                     <th>Date</th>
                     <th>Vessel</th>
                     <th>Loc</th>
                     {{-- <th>Desc</th> --}}
                  </tr>
               </thead>
               <tbody>
                  @foreach ($allreqs as $req)
                      <tr>
                        {{-- <td>{{++$i}}</td> --}}
                        <td>{{formatDate($req->date)}}</td>
                        <td>{{$req->schedule->vessel->name ?? '-'}}</td>
                        <td>{{$req->destination->code}}</td>
                        {{-- <td>{{$req->desc}}</td> --}}
                      </tr>
                  @endforeach

                  
               </tbody>
            </table>
            
         </div>
         {!! $allreqs->links() !!}
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


