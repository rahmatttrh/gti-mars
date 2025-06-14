@extends('layouts.urbix.app')
@section('title')
    Dashboard
@endsection

@section('content')
        <div class="container-fluid">

            <div class="main-breadcrumb d-flex align-items-center my-3 position-relative">
                {{-- <h2 class="breadcrumb-title mb-0 flex-grow-1 fs-14">June</h2> --}}
                <div class="dropdown breadcrumb-title mb-0 flex-grow-1 fs-14">
                  <a href="#" class=" dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    June
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="javascript:void(0)">May</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0)">April</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0)">March</a></li>
                  </ul>
                </div>
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
                                 <h4>Monthly Fuel Consumption</h4>
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

                  <div id="productCarousel" class="card carousel-custom carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
                     <div class="card-header d-flex justify-content-between align-items-center">
                         <h5 class="card-title mb-0">Vessels</h5>
                         <div class="carousel-indicators carousel-indicators-primary carousel-indicators-dots">
                             <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                             <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                             <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                         </div>
                     </div>
                     <div class="card-body"><div id="carouselExample" class="carousel-inner">
                             <div class="carousel-item active">
                                 <div class="card card-primary">
                                    <div class="card-header text-white"><b>Logindo Overcomer</b></div>
                                    <div class="card-body">
                                       Fuel Cons : 7000
                                    </div>
                                 </div>
                                 {{-- <img src="{{asset('urbix/images/small/img-13.jpg')}}" class="d-block w-100" alt="Product Image"> --}}
                             </div>
                             <div class="carousel-item">
                              <div class="card card-primary">
                                 <div class="card-header text-white"><b>Sigap Jaya</b></div>
                                 <div class="card-body">
                                    Fuel Cons : 14000
                                 </div>
                              </div>
                                 {{-- <img src="{{asset('urbix/images/small/img-14.jpg')}}" class="d-block w-100" alt="Product Image"> --}}
                             </div>
                             <div class="carousel-item">
                              <div class="card card-primary">
                                 <div class="card-header text-white"><b>Parakan</b></div>
                                 <div class="card-body">
                                    Fuel Cons : 5000
                                 </div>
                              </div>
                                 {{-- <img src="{{asset('urbix/images/small/img-1.jpg')}}" class="d-block w-100" alt="Product Image"> --}}
                             </div>
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
@endsection