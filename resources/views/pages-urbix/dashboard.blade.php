@extends('layouts.urbix.app')
@section('title')
    Dashboard
@endsection

@section('content')
        <div class="container-fluid">

            <div class="main-breadcrumb d-flex align-items-center my-3 position-relative">
                <h2 class="breadcrumb-title mb-0 flex-grow-1 fs-14">Analytics</h2>
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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Analytics</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
               <div class="col-md-8">
                  <div class="row">
                     <div class="col-xxl-9">
                         <div class="card">
                             <div class="card-header">
                                 <h4>Monthly Fuel & Fresh Water Consumption</h4>
                             </div>
                             <div class="card-body" id="engagement"></div>
                         </div>
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
                  {{-- <div class="card">
                     <div class="card-body">
                         <div class="d-flex justify-content-between align-items-center">
                             <div class="d-flex align-items-center">
                                 <img src="{{asset('urbix/flaticon/ship.png')}}" class="h-32px w-32px me-3" alt="Instagram">
                                 <p class="mb-0 fw-semibold">Vessel Overview</p>
                             </div>
                             
                         </div>
                         <div class="row mt-6 g-0">
                             <div class="col-xxl-6">
                                 <div class="border-end-xxl border-bottom border-bottom-xxl-0 pb-4 pb-xxl-0">
                                     <h2 class="mb-0">17</h2>
                                     <p class="mb-0 fw-semibold">On Hire</p>
                                 </div>
                             </div>
                             <div class="col-xxl-6">
                                 <div class="text-xxl-end mb-0 pt-4 pt-xxl-0">
                                     <h4 class="mb-0">2</h4>
                                     <p class="mb-0">Maintenance</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                  </div> --}}
                  @php
                        $no = 0;
                  @endphp
                  <div id="productCarousel" class="card carousel-custom carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
                     <div class="card-header d-flex justify-content-between align-items-center">
                         <h5 class="card-title mb-0">Last Activity Vessel</h5>
                         {{-- <div class="carousel-indicators carousel-indicators-primary carousel-indicators-dots">
                           @foreach ($lastActivity as $lAct)
                           @php
                                 $no += 1;
                           @endphp
                           @endforeach
                             <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                             <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                             <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                         </div> --}}
                     </div>
                     <div class="card-body"><div id="carouselExample" class="carousel-inner">
                        
                    
                        @foreach ($lastActivity as $lAct)
                           @php
                               $no += 1;
                           @endphp

                           @if ($no == 1)
                           <div class="carousel-item active">
                              @else
                              <div class="carousel-item ">
                           @endif
                          
                              <div class="card card-primary">
                                 {{-- <div class="card-header text-white"><b>{{$lAct->vdr->vessel->name}}</b> </div> --}}
                                 <div class="card-body">
                                    <b>{{$lAct->vdr->vessel->name}}</b> <br>
                                    {{$lAct->activity}} <br>
                                    <small class=""> {{formatDate($lAct->vdr->date)}} {{$lAct->finish}}</small>
                                 </div>
                              </div>
                              {{-- <img src="{{asset('urbix/images/small/img-13.jpg')}}" class="d-block w-100" alt="Product Image"> --}}
                        </div>
                        @endforeach
                             
                             {{-- <div class="carousel-item">
                                 <div class="card card-primary">
                                    <div class="card-header text-white"><b>Sigap Jaya</b></div>
                                    <div class="card-body">
                                       Fuel Cons : 14000
                                    </div>
                                 </div>
                              </div>
                             <div class="carousel-item">
                                 <div class="card card-primary">
                                    <div class="card-header text-white"><b>Parakan</b></div>
                                    <div class="card-body">
                                       Fuel Cons : 5000
                                    </div>
                                 </div>
                                 
                             </div> --}}
                         </div>
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
         height: 230,
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