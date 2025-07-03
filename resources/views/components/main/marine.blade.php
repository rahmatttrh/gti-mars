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
      <div class="col-md-3">
         <div class="card card-statistic-1 border">
            <a href="{{route('vdr.pet.validation')}}">
               <div class="card-icon bg-info">
               <i class="fas fa-user"></i>
               </div>
               <div class="card-wrap">
               <div class="card-header">
                  
                  <h4>VDR PET Validation</h4>
               </div>
               <div class="card-body">
                  {{count($allvdrs->where('status', 1))}}
               </div>
               </div>
            </a>
         </div>
      </div>
      
      
      <div class="col-md-3">
         <div class="card card-statistic-1 border">
            <a href="{{route('vdr.marine.validation')}}">
               <div class="card-icon bg-info">
               <i class="fas fa-user"></i>
               </div>
               <div class="card-wrap">
               <div class="card-header">
                  
                  <h4>VDR Marine Validation</h4>
               </div>
               <div class="card-body">
                  {{count($allvdrs->where('status', 2))}}
               </div>
               </div>
            </a>
         </div>
      </div>
      <div class="col-md-3">
         <div class="card card-statistic-1 border">
            <a href="{{route('vdr.suptent.validation')}}">
               <div class="card-icon bg-primary">
               <i class="fas fa-user"></i>
               </div>
               <div class="card-wrap">
               <div class="card-header">
                  
                  <h4>VDR Suptent Validation</h4>
               </div>
               <div class="card-body">
                  {{count($vdrvalids)}}
               </div>
               </div>
            </a>
         </div>
      </div>
      <div class="col-md-3">
         <div class="card card-statistic-1 border">
            <a href="{{route('vdr.complete.validation')}}">
               <div class="card-icon bg-success">
               <i class="fas fa-check"></i>
               </div>
               <div class="card-wrap">
               <div class="card-header">
                  
                  <h4>VDR Complete</h4>
               </div>
               <div class="card-body">
                  {{count($allvdrs->where('status', 4))}}
               </div>
               </div>
            </a>
         </div>
      </div>
   </div>
   <div class="row"> 
      <div class="col-md-7   ">
         
         {{-- <span class="btn btn-light border">Sailing Order</span> --}}
         {{-- <table class="display  border">
            <tbody>
               <tr>
                  <th>VDR yang membutuhkan Approval anda</th>
               </tr>
            </tbody>
         </table> --}}
         <div class="table-responsive overflow-auto p-1" style="max-height: 180px">
            <table class="  border">
               
               <thead>
                  <tr>
                     <th colspan="4">VDR yang membutuhkan Approval anda</th>
                  </tr>
                  <tr>
                     {{-- <th>ID</th> --}}
                     <th>Vessel</th>
                     <th>Code</th>
                     <th>Date</th>
                     {{-- <th>Date</th> --}}
                     <th>Status</th>
                  </tr>
               </thead>
               <tbody>
                  @if (count($vdrvalids) > 0)
                  @foreach ($vdrvalids as $vdr)
                     <tr class="border" style="border: 1px black">
                        {{-- <td>{{$vdr->id}}</td> --}}
                        <td class="text-truncate" >
                        @if (auth()->user()->username == 'lutfi')
                        
                        <a href="{{route('document.vdr', enkripRambo($vdr->id))}}">{{$vdr->vessel->name}}</a>
                           @else
                           <a href="{{route('vdr.show.spa', [enkripRambo($vdr->id), enkripRambo('index')])}}">{{$vdr->vessel->name}}</a>
                           {{-- <a href="{{route('vdr.show', [enkripRambo($vdr->id), enkripRambo('index')])}}">{{$vdr->vessel->name}}</a> --}}

                           @endif
                        </td>
                        <td>{{$vdr->code}}</td>
                        <td>{{formatDate($vdr->date)}}</td>
                        {{-- <td>{{formatDate($sche->date)}}</td> --}}
                        <td class="text-truncate" >
                           <x-status-stisla.vdr :vdr="$vdr" />
                        </td>
                     </tr>
                  @endforeach
                      @else
                      <tr>
                        <td colspan="3" class="text-center py-3">Empty</td>
                      </tr>
                  @endif
                  
               </tbody>
            </table>
         </div>
         <hr>
         {{-- <table class="display  border">
            <tbody>
               <tr>
                  <th>Sailing Order</th>
               </tr>
            </tbody>
         </table> --}}
         <div class="table-responsive overflow-auto p-1" style="height: 120px">
            <table class="display  border">
               
               <thead>
                  <tr>
                     <th colspan="4">Sailing Order</th>
                  </tr>
                  <tr>
                     <th>Vessel</th>
                     <th>Code</th>
                     <th>Date</th>
                     <th>Status</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($schedules->where('status', '>', 0) as $sche)
                     <tr class="border" style="border: 1px black">
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
         </div>
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
      @if (auth()->user()->username == 'marine')
      <div class="col-md-5">
         
         <table class="border display table-sm"  id="table-5" >
            <thead>
               <tr>
                  <th>BCM</th>
                  <th>MTD</th>
                  <th>Desc</th>
                 
                  <th>Status</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($items as $item)
                   <tr class="border">
                     <td>{{$item->cargo->code}}</td>
                     <td>{{$item->mtd}}</td>
                     <td>{{$item->description}}</td>
                    
                     <td>
                        <x-status-stisla.request-plain :request="$item->request"/>
                     </td>
                   </tr>
               @endforeach
            </tbody>
         </table>
      </div> 
      @else
      <div class="col-md-5">
         <div class="badge badge-info">Monitoring VDR</div>
         <hr>
         <div class="table-responsive">
         <table class="border display table-sm"  id="table-5" >
            <thead>
                  
               <tr>
                  <th>ID</th>
                  <th>Vessel</th>
                  <th>Date</th>
                  {{-- <th>Date</th> --}}
                  <th>Status</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($allvdrs->where('status', '!=', 0) as $vdr)
                  <tr class="border" style="border: 1px black">
                     <td>{{$vdr->code}}</td>
                     <td class="text-truncate" >
                     @if (auth()->user()->username == 'lutfi')
                     
                     <a href="{{route('document.vdr', enkripRambo($vdr->id))}}">{{$vdr->vessel->name}}</a>
                        @else
                        <a href="{{route('vdr.show.spa', [enkripRambo($vdr->id), enkripRambo('index')])}}">{{$vdr->vessel->name}}</a>
                        {{-- <a href="{{route('vdr.show', [enkripRambo($vdr->id), enkripRambo('index')])}}">{{$vdr->vessel->name}}</a> --}}

                        @endif
                     </td>
                    
                     <td>{{formatDate($vdr->date)}}</td>
                     {{-- <td>{{formatDate($sche->date)}}</td> --}}
                     <td class="text-truncate" >
                        <x-status-stisla.vdr :vdr="$vdr" />
                     </td>
                  </tr>
               @endforeach
            </tbody>
         </table>
      </div>
      </div>
      @endif
      
   </div>
   @push('chart')
         {{-- <script src="{{asset('modules/jquery.sparkline.min.js')}}"></script>
         <script src="{{asset('modules/chart.min.js')}}"></script>
         <script src="{{asset('modules/owlcarousel2/dist/owl.carousel.min.js')}}"></script>
         <script src="{{asset('modules/summernote/summernote-bs4.js')}}"></script>
         <script src="{{asset('modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>

         <script src="{{asset('js/page/index.js')}}"></script> --}}


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


