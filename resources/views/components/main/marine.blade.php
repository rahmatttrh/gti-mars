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
      <div class="col-lg-8">
        <div class="card">
          <div class="card-header">
            <h4>Budget vs Sales</h4>
          </div>
          <div class="card-body">
            <canvas id="myChart" height="158"></canvas>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card gradient-bottom">
          <div class="card-header">
            <h4>Top 5 Products</h4>
            <div class="card-header-action dropdown">
              <a
                href="#"
                data-toggle="dropdown"
                class="btn btn-danger dropdown-toggle"
                >Month</a
              >
              <ul
                class="dropdown-menu dropdown-menu-sm dropdown-menu-right"
              >
                <li class="dropdown-title">Select Period</li>
                <li><a href="#" class="dropdown-item">Today</a></li>
                <li><a href="#" class="dropdown-item">Week</a></li>
                <li>
                  <a href="#" class="dropdown-item active">Month</a>
                </li>
                <li><a href="#" class="dropdown-item">This Year</a></li>
              </ul>
            </div>
          </div>
          <div class="card-body" id="top-5-scroll">
            <ul class="list-unstyled list-unstyled-border">
              <li class="media">
                <img
                  class="mr-3 rounded"
                  width="55"
                  src="assets/img/products/product-3-50.png"
                  alt="product"
                />
                <div class="media-body">
                  <div class="float-right">
                    <div class="font-weight-600 text-muted text-small">
                      86 Sales
                    </div>
                  </div>
                  <div class="media-title">oPhone S9 Limited</div>
                  <div class="mt-1">
                    <div class="budget-price">
                      <div
                        class="budget-price-square bg-primary"
                        data-width="64%"
                      ></div>
                      <div class="budget-price-label">$68,714</div>
                    </div>
                    <div class="budget-price">
                      <div
                        class="budget-price-square bg-danger"
                        data-width="43%"
                      ></div>
                      <div class="budget-price-label">$38,700</div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="media">
                <img
                  class="mr-3 rounded"
                  width="55"
                  src="assets/img/products/product-4-50.png"
                  alt="product"
                />
                <div class="media-body">
                  <div class="float-right">
                    <div class="font-weight-600 text-muted text-small">
                      67 Sales
                    </div>
                  </div>
                  <div class="media-title">iBook Pro 2018</div>
                  <div class="mt-1">
                    <div class="budget-price">
                      <div
                        class="budget-price-square bg-primary"
                        data-width="84%"
                      ></div>
                      <div class="budget-price-label">$107,133</div>
                    </div>
                    <div class="budget-price">
                      <div
                        class="budget-price-square bg-danger"
                        data-width="60%"
                      ></div>
                      <div class="budget-price-label">$91,455</div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="media">
                <img
                  class="mr-3 rounded"
                  width="55"
                  src="assets/img/products/product-1-50.png"
                  alt="product"
                />
                <div class="media-body">
                  <div class="float-right">
                    <div class="font-weight-600 text-muted text-small">
                      63 Sales
                    </div>
                  </div>
                  <div class="media-title">Headphone Blitz</div>
                  <div class="mt-1">
                    <div class="budget-price">
                      <div
                        class="budget-price-square bg-primary"
                        data-width="34%"
                      ></div>
                      <div class="budget-price-label">$3,717</div>
                    </div>
                    <div class="budget-price">
                      <div
                        class="budget-price-square bg-danger"
                        data-width="28%"
                      ></div>
                      <div class="budget-price-label">$2,835</div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="media">
                <img
                  class="mr-3 rounded"
                  width="55"
                  src="assets/img/products/product-3-50.png"
                  alt="product"
                />
                <div class="media-body">
                  <div class="float-right">
                    <div class="font-weight-600 text-muted text-small">
                      28 Sales
                    </div>
                  </div>
                  <div class="media-title">oPhone X Lite</div>
                  <div class="mt-1">
                    <div class="budget-price">
                      <div
                        class="budget-price-square bg-primary"
                        data-width="45%"
                      ></div>
                      <div class="budget-price-label">$13,972</div>
                    </div>
                    <div class="budget-price">
                      <div
                        class="budget-price-square bg-danger"
                        data-width="30%"
                      ></div>
                      <div class="budget-price-label">$9,660</div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="media">
                <img
                  class="mr-3 rounded"
                  width="55"
                  src="assets/img/products/product-5-50.png"
                  alt="product"
                />
                <div class="media-body">
                  <div class="float-right">
                    <div class="font-weight-600 text-muted text-small">
                      19 Sales
                    </div>
                  </div>
                  <div class="media-title">Old Camera</div>
                  <div class="mt-1">
                    <div class="budget-price">
                      <div
                        class="budget-price-square bg-primary"
                        data-width="35%"
                      ></div>
                      <div class="budget-price-label">$7,391</div>
                    </div>
                    <div class="budget-price">
                      <div
                        class="budget-price-square bg-danger"
                        data-width="28%"
                      ></div>
                      <div class="budget-price-label">$5,472</div>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
          <div class="card-footer pt-3 d-flex justify-content-center">
            <div class="budget-price justify-content-center">
              <div
                class="budget-price-square bg-primary"
                data-width="20"
              ></div>
              <div class="budget-price-label">Selling Price</div>
            </div>
            <div class="budget-price justify-content-center">
              <div
                class="budget-price-square bg-danger"
                data-width="20"
              ></div>
              <div class="budget-price-label">Budget Price</div>
            </div>
          </div>
        </div>
      </div>
    </div>


   <div class="row"> 
      <div class="col-md-6">
         <div class="row">
            <div class="col-md-6">
               <div class="card card-statistic-1 border">
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
            <div class="col-md-6">
               <div class="card card-statistic-1 border">
                  <a href="{{route('marine.request.list')}}">
                     <div class="card-icon bg-info">
                     <i class="far fa-user"></i>
                     </div>
                     <div class="card-wrap">
                     <div class="card-header">
                        <h4>Cargo Validation</h4>
                     </div>
                     <div class="card-body">
                        {{count($cargovalids)}}
                     </div>
                     </div>
                  </a>
                </div>
            </div>
         </div>
         {{-- <span class="btn btn-light border">Sailing Order</span> --}}
         <table class="display  border">
            <tbody>
               <tr>
                  <th>Sailing Order</th>
               </tr>
            </tbody>
         </table>
         <div class="table-responsive overflow-auto" style="height: 120px">
            <table class="display  border">
               
               <thead>
                  
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
         <table class="display  border">
            <tbody>
               <tr>
                  <th>All Vessel Daily Report</th>
               </tr>
            </tbody>
         </table>
         <div class="table-responsive overflow-auto" style="height: 340px">
            <table class="display  border">
               
               <thead>
                  
                  <tr>
                     {{-- <th>ID</th> --}}
                     <th>Vessel</th>
                     <th>Date</th>
                     {{-- <th>Date</th> --}}
                     <th>Status</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($allvdrs as $vdr)
                     <tr class="border" style="border: 1px black">
                        {{-- <td>{{$vdr->id}}</td> --}}
                        <td class="text-truncate" style="max-width: 120px"><a href="{{route('vdr.show', [enkripRambo($vdr->id), enkripRambo('index')])}}">{{$vdr->vessel->name}}</a></td>
                        <td>{{formatDate($vdr->date)}}</td>
                        {{-- <td>{{formatDate($sche->date)}}</td> --}}
                        <td class="text-truncate" style="max-width: 100px">
                           <x-status-stisla.vdr :vdr="$vdr" />
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
      <div class="col-md-6">
         
         <table class="border display table-sm"  id="table-5" >
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


