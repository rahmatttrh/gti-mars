@extends('layouts.urbix.app')
@section('title')
    Vessel Data
@endsection

@section('content')
   <div class="container-fluid">
      <div class="main-breadcrumb d-flex align-items-center my-3 position-relative">
            <h2 class="breadcrumb-title mb-0 flex-grow-1 fs-14">Vessel Detail</h2>
            {{-- <div class="dropdown breadcrumb-title mb-0 flex-grow-1 fs-14">
            <a href="#" class=" dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
               June
            </a>
            <ul class="dropdown-menu">
               <li><a class="dropdown-item" href="javascript:void(0)">May</a></li>
               <li><a class="dropdown-item" href="javascript:void(0)">April</a></li>
               <li><a class="dropdown-item" href="javascript:void(0)">March</a></li>
            </ul>
            </div> --}}
            <div class="flex-shrink-0">
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-end mb-0">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{route('bod.vessels')}}">Vessel</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail</li>
                  </ol>
               </nav>
            </div>
      </div>
      <div class="d-flex">
         <img src="{{asset('urbix/flaticon/ship-side.png')}}" class="h-32px w-32px mt-1 me-2" alt=""> <h1>{{$vessel->name}}</h1>
      </div>

      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-header">
                   <h4>{{$monthName}} Fuel & Fresh Water Consumption</h4>
               </div>
               <div class="card-body" id="engagement_month"></div>
            </div>
         </div>
      </div>
      
      <div class="row">
         <div class="col-md-8">
            <div class="row">
               
               <div class="col-xxl-3">
                  <div class="card">
                     <div class="card-body">
         
                       <div id="spline_area_chart" class="apexcharts-container"></div>
         
                     </div>
                     <!-- end card-body -->
                   </div>
                   <div class="card">
                     <div class="card-header">
                        <h4>Monthly Fuel & Fresh Water Consumption</h4>
                     </div>
                     <div class="card-body" id="engagement"></div>
                  </div>
                  {{-- <div class="card card-h-100">
                     <div class="card-body">
         
                       <div id="basic_bar_chart" class="apexcharts-container"></div>
         
                     </div>
                     <!-- end card-body -->
                   </div> --}}
               </div>
               
               <div class="col-xxl-3">
                     <div class="row">
                        <div class="col-xxl-12 col-md-6">
                           <div class="card">
                                 <div class="card-body text-center">
                                    <p class="mb-1 fs-18">Cargo Moving</p>
                                    <h3 class="fw-semibold">12.2k</h3>
                                    <div id="spark1"></div>
                                    <p class="mb-4"><span class="fw-medium text-success"><i class="ri-arrow-up-fill"></i> </span>19%</p>
                                 </div>
                           </div>
                        </div>
                        <div class="col-xxl-12 col-md-6">
                           <div class="card">
                                 <div class="card-body text-center">
                                    <p class="mb-2 fs-18">Passenger Moving</p>
                                    <h3 class="fw-semibold">48</h3>
                                    <div id="spark2"></div>
                                    <p class="mb-0"><span class="fw-medium text-danger"><i class="ri-arrow-down-fill"></i> </span>8%</p>
                                 </div>
                           </div>
                        </div>
                     </div>
               </div>
            </div>
         </div>
         <div class="col-md-4">
            <div class="card ">
               <!--start::card-->
               <div class="card-header">
                   <h5 class="card-title mb-0">Current Contract</h5>
               </div>
               <div class="card-body">
                  @if ($lastVdr)
                     {{-- <div class="table-responsive"> --}}
                        <table class="table  table-sm  mb-0">
                           {{-- <thead>
                              <tr>
                                    <th scope="col">Vessel Type</th>
                                    <th scope="col">Qty</th>
                                    
                              </tr>
                           </thead> --}}
                           <tbody>
                              <tr>
                                 <td>Number</td>
                                 <td class="text-end">{{$lastVdr->contract}}</td>
                              </tr>
                              <tr>
                                 <td>Period</td>
                                 <td class="text-end">{{formatDate($lastVdr->contract_start)}} - {{formatDate($lastVdr->contract_end)}}</td>
                              </tr>

                              <tr>
                                 <td>Loc</td>
                                 <td class="text-end">{{$lastVdr->location_midnight}}</td>
                              </tr>
                              <tr>
                                 <td>Owner</td>
                                 <td class="text-end">{{$lastVdr->owner}}</td>
                              </tr>
                           </tbody>
                        </table>

                     {{-- </div> --}}
                     @else
                     <span>Empty</span>
                  @endif
                  
                   <!-- end:: Bordered Table -->
               </div>
           </div>
            <div class="card">
               <!--start::card-->
               <div class="card-header">
                   <h5 class="card-title mb-0">Recent Activity </h5>
               </div>
               <div class="card-body">
                  <div id="existinglist">
                       {{-- <div class="input-group">
                           <input class="search form-control" placeholder="Search" />
                           <button class="sort btn btn-light" data-sort="name">
                               <i class="ri-search-2-line"></i>
                           </button>
                       </div> --}}
                       <div class=" overflow-auto" style="height: 180px">
                       

                        @if (count($activities) > 0)
                           @foreach ($activities as $act)
                           <ul class="list-group list fs-13 fw-medium">
                              <li class="list-group-item">
                                 <p class="m-0 name fw-semibold">{{$act->activity}}</p>
                                 <p class="m-0 email text-muted">{{formatDate($act->vdr->date)}} | {{formatTime($act->start)}} -  {{formatTime($act->finish)}}</p>
                              </li>
                           </ul>
                           @endforeach
                           @else
                           
                           <ul class="list-group list no-results " >
                              <li class="list-group-item text-muted">No data found</li>
                           </ul>
                        @endif
                           
                           
                         
                       
                       </div>
                       
                   </div>
                   <!-- end:: Default Navbar -->
               </div>
           </div>
            
            
            
            <div class="row">
               <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header">
                           <h4>Lifting</h4>
                        </div>
                        <div class="card-body">
                           <div id="overall"></div>
                        </div>
                     </div>
               </div>
               {{-- <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header">
                           <h4>Revenue Updates</h4>
                        </div>
                        <div class="card-body">
                           <div id="revenue"></div>
                        </div>
                     </div>
               </div>
               <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header pb-0">
                           <h4>Monthly Earnings</h4>
                           <div class="h-36px w-36px d-flex justify-content-center align-items-center rounded bg-info-subtle text-info fs-5">
                                 <i class="bi bi-transparency"></i>
                           </div>
                        </div>
                        <div class="card-body">
                           <h3 class="mb-2">$8,320<span class="text-success"><i class="ri-arrow-right-up-line mx-2"></i></span>
                                 <span class="fs-6">+12%</span>
                           </h3>
                           <div id="spark1" class="apexcharts-container"></div>
                        </div>
                     </div>
               </div> --}}
            </div>
            
         </div>
      </div>
      
   </div><!--End container-fluid-->


      @push('myjs')
         <script>
            
            function renderCharts() {

               // var options = {
               //    series: [70],
               //    chart: {
               //      height: 295,
               //      type: 'radialBar',
               //    },
               //    colors: ['#5b66eb'],
               //    plotOptions: {
               //      radialBar: {
               //        hollow: {
               //          size: '70%',
               //        }
               //      },
               //    },
               //    labels: ['$500.45'],
               //  };

               //  var chart = new ApexCharts(document.querySelector("#overview"), options);
               //  chart.render();
               var options = {
    series: [{
        name: 'Fuel Consumption',
        type: 'column',
        data: {!! json_encode($fuelDateArray) !!}
    }, {
        name: 'Fresh Water Consumption',
        type: 'line',
        data: {!! json_encode($waterDateArray) !!}
    }],
    chart: {
        height: 200,
        type: 'line',
        toolbar: {
            show: false
        }
    },
    colors: ['#5b66eb', '#68d3f8'],
    legend: {
        show: false
    },
    stroke: {
        width: [0, 4]
    },
    dataLabels: {
        enabled: true,
        enabledOnSeries: [1],
        formatter: function (value) {
            return value.toLocaleString('id-ID');
        }
    },
    labels: {!! json_encode($dateArray) !!},
    yaxis: [{
        title: {
            text: '',
        },
        labels: {
            formatter: function (value) {
                return value.toLocaleString('id-ID');
            }
        }
    },
    {
        opposite: true,
        title: {
            text: ''
        },
        labels: {
            formatter: function (value) {
                return value.toLocaleString('id-ID');
            }
        }
    }],
    tooltip: {
        y: {
            formatter: function (value) {
                return value.toLocaleString('id-ID');
            }
        }
    }
};


 var chart = new ApexCharts(document.querySelector("#engagement_month"), options);
 chart.render();




               var spline_area_chart = {
            series: [{
               name: 'High',
               data: {!! json_encode($highArray) !!}
            },{
               name: 'Normal',
               data: {!! json_encode($normalArray) !!}
            }, {
               name: 'Slow',
               data: {!! json_encode($slowArray) !!}
            }, {
               name: 'Manu',
               data: {!! json_encode($manuArray) !!}
            }, {
               name: 'Idle',
               data: {!! json_encode($idleArray) !!}
            }, {
               name: 'Towing',
               data: {!! json_encode($towArray) !!}
            }, {
               name: 'Anchor Handling',
               data: {!! json_encode($ahArray) !!}
            }, {
               name: 'Standby',
               data: {!! json_encode($sbArray) !!}
            }, {
               name: 'Maintenance',
               data: {!! json_encode($maintenanceArray) !!}
            }, {
               name: 'Down Time',
               data: {!! json_encode($dtArray) !!}
            }],
            chart: {
               height: 220,
               type: 'area'
            },
            dataLabels: {
               enabled: false
            },
            stroke: {
               curve: 'smooth'
            },
            title: {
               text: 'Operating Data',
               align: 'left'
            },
            xaxis: {
               type: 'month',
               categories: {!! json_encode($monthArray) !!}
            },
            tooltip: {
               x: {
                     format: 'MM'
               },
            },
         };
         var chart = new ApexCharts(document.querySelector("#spline_area_chart"), spline_area_chart);
         chart.render();




               // Lifting
               var options = {
                  series: [{
                  name: 'series1',
                  data: [0, 60, 50, 65, 55, 75, 35, 70, 85, 65, 85, 85, 20, 90, 100]
                  }],
                  chart: {
                  height: 252,
                  type: 'area',
                  toolbar: {
                     show: false
                  },
                  },
                  colors: ['#5b66eb'],
                  dataLabels: {
                  enabled: false
                  },
                  stroke: {
                  curve: 'straight'
                  },
                  xaxis: {
                  tooltip: {
                     enabled: false
                  }
                  },
                  tooltip: {
                  x: {
                     format: 'dd/MM/yy HH:mm'
                  },
                  },
               };

               var chart = new ApexCharts(document.querySelector("#overall"), options);
               chart.render();


               // Engagement
               var options = {
                  series: [{
                        name: 'Fuel Consumption',
                        type: 'column',
                        data: {!! json_encode($fuelArray) !!}
                  }, {
                        name: 'Fresh Water Consumption',
                        type: 'line',
                        data: {!! json_encode($waterArray) !!}
                  }],
                  chart: {
                        height: 150,
                        type: 'line',
                        toolbar: {
                           show: false
                        }
                  },
                  colors: ['#5b66eb', '#18a538'],
                  legend: {
                        show: false
                  },
                  stroke: {
                        width: [0, 4]
                  },
                  dataLabels: {
                        enabled: true,
                        enabledOnSeries: [1]
                  },
                  labels: {!! json_encode($monthArray) !!},
                  yaxis: [{
                        title: {
                           text: '',
                        },
                  },
                  {
                        opposite: true,
                        title: {
                           text: ''
                        }
                  }]
               };

               var chart = new ApexCharts(document.querySelector("#engagement"), options);
               chart.render();


               // spark
               var spark1 = {
                  chart: {
                     id: 'sparkline1',
                     type: 'line',
                     height: 40,
                     sparkline: {
                        enabled: true
                     },
                     group: 'sparklines1'
                  },
                  series: [{
                     name: 'teal',
                     data: [2, 0, 5, 7, 6, 8, 9]
                  }],
                  stroke: {
                     curve: 'smooth',
                     width: 2,
                  },
                  markers: {
                     size: 0
                  },
                  tooltip: {
                     fixed: {
                        enabled: true,
                        position: 'right'
                     },
                     x: {
                        show: false
                     }
                  },
                  colors: ['#18a538'], // Solid color applied
                  fill: {
                     opacity: 1 // No gradient, just solid fill
                  },
                  xaxis: {
                     crosshairs: {
                        width: 1
                     },
                  }
               };

               var spark2 = {
                  chart: {
                     id: 'sparkline2',
                     type: 'line',
                     height: 60,
                     sparkline: {
                        enabled: true
                     },
                     group: 'sparklines2'
                  },
                  series: [{
                     name: 'teal',
                     data: [8, 0, 8, 0]
                  }],
                  stroke: {
                     curve: 'smooth',
                     width: 2,
                  },
                  markers: {
                     size: 0
                  },
                  tooltip: {
                     fixed: {
                        enabled: true,
                        position: 'right'
                     },
                     x: {
                        show: false
                     }
                  },
                  colors: ['#dc3545'], // Solid color applied
                  fill: {
                     opacity: 1 // No gradient, just solid fill
                  },
                  xaxis: {
                     crosshairs: {
                        width: 1
                     },
                  }
               };

               new ApexCharts(document.querySelector("#spark1"), spark1).render();
               new ApexCharts(document.querySelector("#spark2"), spark2).render();



            }

            setTimeout(() => {
               renderCharts();
            }, 250);

            // Post Activity
            // Define the data structure for the calendar
            const calendarData = [
            // Week 1
            2, 9, 35, 9, 9, 9, 2,
            // Week 2
            1, 9, 35, 35, 35, 9, 35,
            // Week 3
            9, 35, 9, 9, 35, 35, 9,
            // Week 4 (partial)
            35, 9, 35, 3, 9
            ];

            const grid = document.getElementById('calendar-grid');

            // Populate the calendar grid
            calendarData.forEach(value => {
            const day = document.createElement('div');
            day.className = `calendar-day value-${value}`;
            day.textContent = value;
            grid.appendChild(day);
            });

            // Add event listeners
            document.querySelectorAll('.calendar-day').forEach(day => {
            day.addEventListener('click', () => {
               alert(`You clicked on value: ${day.textContent}`);
            });
            });
         </script>
      @endpush
@endsection