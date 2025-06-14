@extends('layouts.urbix.app')
@section('title')
    Dashboard
@endsection

@section('content')
        <div class="container-fluid">

            <div class="main-breadcrumb d-flex align-items-center my-3 position-relative">
                <h2 class="breadcrumb-title mb-0 flex-grow-1 fs-14">Analytics</h2>
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
                                         <p class="mb-0"><span class="fw-medium text-success"><i class="ri-arrow-up-fill"></i> </span>19%</p>
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
                  <div class="card">
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