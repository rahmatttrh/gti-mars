@extends('layouts.stisla.app-main')
@section('title')
    Detail Cost Summary
@endsection
@section('content')
<style>
/* Highlight seperti warna kuning */
.input-highlight {
   background-color: #fff3cd;
   border-color: #ffe69c;
}

/* Lebih clean */
.table td {
   border-top: none;
   padding-top: 6px;
   padding-bottom: 6px;
   font-size: 18px !important;
}

table td {
   font-size: 10px !important;
}
</style>
<style>
/* SUPER COMPACT TABLE */
.compact-table td {
   padding: 2px 4px;
   vertical-align: middle;
}

/* Label lebih kecil */
.label {
   width: 42%;
   font-size: 12px;
}

/* Titik dua */
.colon {
   width: 10px;
   text-align: center;
   font-size: 12px;
}

/* Input lebih pendek */
.input-compact {
   height: 28px;
   font-size: 12px;
   padding: 2px 6px;
}

/* Highlight */
.input-highlight {
   background-color: #fff3cd;
   border-color: #ffe69c;
}
</style>


<style>
   /* table {
      width: 100%;
      background-color: white;
      
   }

   /* table, th, td {
      border: 1px solid rgba(226, 218, 218, 0);
      border-collapse: collapse;
   } */

   td {
      border: 1px solid rgba(240, 235, 235, 0.932);
      border-collapse: collapse;
   }
  
   input {
      border:0;
      outline:0;
      /* text-align: center;  */
      /* background-color: rgb(226, 236, 151) */
      
   }

   .bg-y {
      background-color: rgb(226, 236, 151)
   }

   .border-g {
      border: 1px solid rgb(156, 152, 152);
      border-collapse: collapse;
   } */

   .input-bg-y {
      background-color: rgb(226, 236, 151)
   }

   .button {
      cursor: pointer;
    border: none;
    
    outline: inherit;
}

.bg-lgray{
   background-color: rgb(245, 245, 240);
   color: black
}


#messageBox {
      display: none;
      position: fixed;
      top: 20px;
      left: 50%;
      transform: translateX(-50%);
      background: #2c2d2c; /* hijau default sukses */
      color: white;
      padding: 10px 15px;
      border-radius: 50px;
      font-family: sans-serif;
      font-size: 12px;
      font-weight: normal;
      
      z-index: 9999;
    }

    .input-yellow {
        background-color: rgb(226, 236, 151);
    }


</style>


<style>
.table-scroll-top {
    overflow-x: auto;
    overflow-y: hidden;
    height: 10px;
}

.table-scroll-top div {
    height: 1px;
}
</style>
    <section class="section">
        <div class="section-body">
            <div class="card border-0 shadow-sm">

                <!-- HEADER SUMMARY -->
                <div class="card-body border-bottom">
                    <div class="row">
                        <div class="col-md-10">
                            <!-- MINI INFO -->
                            <h5 class="fw-bold mb-1">
                                <i class="fa fa-chart-line text-primary"></i> MONTHLY VESSEL COST SUMMARY - JANUARI 2026
                                </h5>
                                <small class="text-muted">
                                Ringkasan biaya operasional kapal untuk periode terpilih
                                </small>
                            <div class="mt-3 d-flex flex-wrap gap-3">

                                <div class="badge bg-light text-dark border mr-4">
                                    <i class="fa fa-ship text-primary"></i> MV. Nusantara
                                </div>
                                <div class="d-grid gap-2">

                                    <button class="btn btn-outline-primary btn-sm">
                                    <i class="fa fa-clock"></i> Timeshift
                                    </button>

                                    <button class="btn btn-danger btn-sm">
                                    <i class="fa fa-file-pdf"></i> Export PDF
                                    </button>

                                </div>

                                {{-- <div class="badge bg-success bg-opacity-10 text-success">
                                    <i class="fa fa-check-circle"></i> Approved
                                </div>

                                <div class="badge bg-warning bg-opacity-10 text-warning">
                                    <i class="fa fa-clock"></i> Waiting Review
                                </div> --}}

                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="d-flex mb-2 justify-content-between align-items-center p-1 rounded bg-light">

                                <!-- LEFT -->
                                <div class="d-flex align-items-center">
                                
                                <!-- Rounded Indicator -->
                                <div class="mr-2" style="width:6px; height:24px; border-radius:10px; background:#6c757d;"></div>

                                <!-- Title -->
                                <span class="fw-semibold">
                                    Timeshift
                                </span>

                                </div>

                                <!-- RIGHT -->
                                <span class="badge badge-secondary bg-opacity-10 ">
                                <i class="fa fa-edit"></i> Draft
                                </span>

                            </div>
                            <div class="d-flex justify-content-between align-items-center p-1 rounded bg-light">

                                <!-- LEFT -->
                                <div class="d-flex align-items-center">
                                
                                <!-- Rounded Indicator -->
                                <div class="mr-2" style="width:6px; height:24px; border-radius:10px; background:#6c757d;"></div>

                                <!-- Title -->
                                <span class="fw-semibold">
                                    Cost Summary
                                </span>

                                </div>

                                <!-- RIGHT -->
                                <span class="badge badge-warning bg-opacity-10 ">
                                    <i class="fa fa-clock"></i> Waiting
                                </span>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-md-6">
                            <table class="">
                                <tbody>

                                    <tr>
                                        <td class="px-1" style="font-size: 10px">Vendor Name</td>
                                        <td class="bg-y"><input  class="w-100 input_general"  type="text" style="background-color: rgb(226, 236, 151); text-align: left !important;"></td>
                                        <td class="px-1 text-truncate">Proforma Invoice Number</td>
                                        <td class="bg-y"><input  style="background-color: rgb(226, 236, 151); text-align: left !important;" class="w-100 input_general" id="owner" name="owner" type="text"  ></td>
                                    </tr>
                                    <tr>
                                        <td class="px-1">Contract Code</td>
                                        <td class="bg-y"><input  style="background-color: rgb(226, 236, 151); text-align: left !important;" class="w-100 input_general" id="contract" name="contract" type="text"  ></td>
                                        <td class="px-1">Proforma Invoice Date</td>
                                        <td class="bg-y"><input  style="background-color: rgb(226, 236, 151); text-align: left !important;" class="w-100 input_general" id="master" name="master" type="text"  ></td>
                                    </tr>
                                    
                                    <tr>
                                        <td class="px-1">SPK Code</td>
                                        <td class="bg-y">
                                            <input  style="background-color: rgb(226, 236, 151); text-align: left !important;" class="w-100 input_general input_general_date" id="contract_start" name="contract_start" type="text"  >
                                            
                                        </td>
                                        <td class="px-1 text-truncate">Proforma Invoice Submitted Date</td>
                                        <td class="bg-y">
                                            <input  style="background-color: rgb(226, 236, 151); text-align: left !important;" class="w-100 input_general onduty" id="onduty" name="onduty" type="text"  >
                                            
                                        </td>
                                    </tr>


                                    <tr>
                                        <td class="px-1">RO Code</td>
                                        <td class="bg-y"><input  style="background-color: rgb(226, 236, 151); text-align: left !important;" class="w-100 input_general" id="contract" name="contract" type="text"  ></td>
                                        <td class="px-1">Work Periode From</td>
                                        <td class="bg-y"><input  style="background-color: rgb(226, 236, 151); text-align: left !important;" class="w-100 input_general" id="master" name="master" type="text"  ></td>
                                    </tr>

                                    <tr>
                                        <td class="px-1">Vessel</td>
                                        <td class="bg-y"><input  style="background-color: rgb(226, 236, 151); text-align: left !important;" class="w-100 input_general" id="contract" name="contract" type="text"  ></td>
                                        <td class="px-1">Work Periode To</td>
                                        <td class="bg-y"><input  style="background-color: rgb(226, 236, 151); text-align: left !important;" class="w-100 input_general" id="master" name="master" type="text"  ></td>
                                    </tr>

                                    <tr>
                                        <td class="px-1">Vessel Name</td>
                                        <td class="bg-y"><input  style="background-color: rgb(226, 236, 151); text-align: left !important;" class="w-100 input_general" id="contract" name="contract" type="text"  ></td>
                                        <td class="px-1">Value</td>
                                        <td class="bg-y"><input  style="background-color: rgb(226, 236, 151); text-align: left !important;" class="w-100 input_general" id="master" name="master" type="text"  ></td>
                                    </tr>

                                    <tr>
                                        <td class="px-1">Subtitute Vessel Name</td>
                                        <td class="bg-y"><input  style="background-color: rgb(226, 236, 151); text-align: left !important;" class="w-100 input_general" id="contract" name="contract" type="text"  ></td>
                                        <td class="px-1">Dedcution</td>
                                        <td class="bg-y"><input  style="background-color: rgb(226, 236, 151); text-align: left !important;" class="w-100 input_general" id="master" name="master" type="text"  ></td>
                                    </tr>

                                    <tr>
                                        <td class="px-1">Call Out Vessel Name</td>
                                        <td class="bg-y"><input  style="background-color: rgb(226, 236, 151); text-align: left !important;" class="w-100 input_general" id="contract" name="contract" type="text"  ></td>
                                        <td class="px-1">Fuel Consumption (Liter)</td>
                                        <td class="bg-y"><input  style="background-color: rgb(226, 236, 151); text-align: left !important;" class="w-100 input_general" id="master" name="master" type="text"  ></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>


                    <div class="table-scroll-top mt-2" id="scrollTop">
                        <div></div>
                    </div>
                    <div class="table-responsive" id="scrollBottom">
                        <div class="row">
                            
                            <div class="col-md-12">
                                <table class="mt-2">
                                    <thead>
                                        <tr class="">
                                        
                                        <td colspan="9" class="text-center bg-lgray">Operating Mode Duration (hh:mm) - 
                                        Except Maintenance & Downtime </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td rowspan="2" class="bg-lgray">FDR (Rp)</td>

                                        <td colspan="2" class="text-center">Call Fee (Rp) </td>
                                            <td colspan="5" class="text-center">Accomodation (Rp) </td>

                                            <td colspan="2" class="text-center">Fuel Price / Liter </td>
                                        
                                    </tr>
                                    <tr>
                                        
                                        <td class="text-center">High</td>
                                        <td class="text-center">Normal</td>
                                        <td class="text-center">Slow</td>
                                        <td class="text-center">Manu</td>
                                        <td class="text-center">Idle</td>
                                        <td class="text-center">Tow</td>
                                        <td class="text-center">A/H</td>
                                        <td class="text-center">S/B</td>
                                        <td class="text-center">
                                        
                                        S/P
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                        <td class="text-center">P.Seribu</td>
                                        <td class="text-center">T. Priuk</td>

                                        <td class="text-center">Breakfast</td>
                                        <td class="text-center">Lunch</td>
                                        <td class="text-center">Dinner</td>
                                        <td class="text-center">Supper</td>
                                        <td class="text-center">Laundry</td>

                                        <td class="text-center">Periode 1</td>
                                        <td class="text-center">Periode 2</td>
                                        
                                    </tr>
                                    </thead>

                                    <tbody>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="bg-y"></td>

                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>

                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>

                                        {{-- Fuel Price --}}
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                    </tbody>

                                    <thead>
                                        <tr class="bg-lgray">
                                        
                                        <td colspan="12" class="text-center">Operating Hours</td>
                                        <td colspan="" class="text-center">FDR</td>

                                        <td colspan="2" class="text-center">Call Fee</td>
                                        <td colspan="5" class="text-center">Accomodation</td>

                                        <td rowspan="2" class="text-center">Refuelling/ <br> Transferring</td>
                                        <td rowspan="2" class="text-center">Remarks</td>

                                        <td colspan="3" class="text-center">Fuel Consumption</td>
                                        <td colspan="" class="text-center">Manual <br> Sounding</td>


                                    </tr>
                                    <tr>
                                        
                                        <td class="text-center">High</td>
                                        <td class="text-center">Normal</td>
                                        <td class="text-center">Slow</td>
                                        <td class="text-center">Manu</td>
                                        <td class="text-center">Idle</td>
                                        <td class="text-center">Tow</td>
                                        <td class="text-center">A/H</td>
                                        <td class="text-center">S/B</td>
                                        <td class="text-center">
                                        S/P
                                        </td>
                                        <td class="text-center">Maintenance</td>
                                        <td class="text-center">Down Time</td>
                                        <td class="text-center"><b>Total</b>   </td>

                                        <td class="text-center">(in Rp)</td>



                                        <td class="text-center">P.Seribu</td>
                                        <td class="text-center">T. Priuk</td>

                                        <td class="text-center">Breakfast</td>
                                        <td class="text-center">Lunch</td>
                                        <td class="text-center">Dinner</td>
                                        <td class="text-center">Supper</td>
                                        <td class="text-center">Laundry</td>


                                        <td class="text-center">By Formula</td>
                                        <td class="text-center">By Log Book</td>
                                        <td class="text-center">Diff</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 1; $i <= 30; $i++)
                                        <tr>

                                        
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class=" text-center">
                                            00:00:00
                                        </td>
                                        <td class=" text-center text-truncate">
                                            Rp. 0000000
                                        </td>




                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>

                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>


                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>





                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        </tr>
                                        @endfor

                                        {{-- <tr>

                                        
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                00:00:00
                                            </td>
                                            <td class=" text-center text-truncate">
                                                Rp. 0000000
                                            </td>




                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>

                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>


                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                Refuelling/Transferring
                                            </td>





                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                        </tr> --}}
                                        {{-- <tr>

                                        
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                00:00:00
                                            </td>
                                            <td class=" text-center text-truncate">
                                                Rp. 0000000
                                            </td>




                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>

                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>


                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                Selisih Fuel Offhire
                                            </td>





                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                        </tr> --}}

                                        {{-- <tr>

                                        
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                Total <br> Operating Hour
                                            </td>
                                            <td class=" text-center">
                                                Total <br> Operating Day
                                            </td>
                                            <td class=" text-center">
                                                Rounding <br> Factor Operating Day
                                            </td>
                                            <td class=" text-center text-truncate">
                                                Total FDR
                                            </td>




                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>

                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>


                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>





                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                            <td class=" text-center">
                                                <input       name="high"  type="text" >
                                            </td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>



                    <hr>
                    <div class="row">
                        <div class="col-3">
                            <div class="card shadow-none border">
                                <div class="card-body py-4">
                                    Diagram Operating Hours
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="card shadow-none border">
                                <div class="card-body py-4">
                                    Diagram Fuel Consumption
                                </div>
                            </div>
                        </div>
                        <div class="col-7">
                            <table>
                                <thead>
                                    <tr>
                                        <td colspan="7">Remarks</td>
                                        <td colspan="">Fuel Status</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7">Fuel Settlement</td>
                                        <td colspan="" rowspan="3">Desc</td>
                                    </tr>
                                    <tr>
                                        
                                        <td rowspan="2">On Hire Date</td>
                                        <td rowspan="2">Off Hire Date</td>
                                        <td>On Hire (L)</td>
                                        <td>Off Hire (L)</td>
                                        <td>Difference</td>
                                        <td>Price</td>
                                        <td>Cost</td>

                                        <td colspan="2">Fuel</td>
                                        <td rowspan="2">Fuel to be Charged</td>
                                        <td rowspan="2">ROB Date</td>
                                    </tr>
                                    <tr>
                                        <td>(a)</td>
                                        <td>(b)</td>
                                        <td>(c = b-a)</td>
                                        <td>(d)</td>
                                        <td>(e = c x d)</td>



                                        <td>By Formula</td>
                                        <td>By Log Book</td>
                                    </tr>
                                </thead>

                                <tbody>
                                     @for ($i = 1; $i <= 7; $i++)
                                        <tr>

                                        
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class=" text-center">
                                            -
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class=" text-center">
                                            -
                                        </td>


                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        
                                    </tr>
                                    @endfor


                                    <tr>
                                        <td colspan="2">Total Fuel Settlement</td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Note</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7">
                                            <textarea name="" id="" class="w-100" style="border: none" cols="30" rows="3"></textarea>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="4">Kesepakatan Deduction Periode ini jika terdapat split deduction</td>
                                        <td colspan="2"></td>
                                        <td>Rp. -</td>
                                    </tr>

                                    <tr>
                                        <td colspan="4">Total Fuel Deduction</td>
                                        <td colspan="2">0 Liter</td>
                                        <td>Rp. -</td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>



                    <div class="row mt-4">
                        <div class="col-9">
                            <div class="table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <td class="bg-dark text-white" colspan="2">Invoice Component</td>
                                        </tr>
                                        <tr>
                                            <td rowspan="3">
                                                Prof. Invoice Date
                                            </td>
                                            <td rowspan="3">Proforma Invoice #</td>
                                            <td rowspan="3">FDR (Rp.)</td>
                                            <td rowspan="3">Call Fee</td>
                                            <td rowspan="3">Mobilization (Rp.)</td>
                                            <td rowspan="3">Accomodation (Rp.)</td>

                                            <td class="bg-y text-center">
                                                <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                            </td>
                                            <td class="bg-y text-center">
                                                <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                            </td>
                                            <td class="bg-y text-center">
                                                <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                            </td>
                                            <td class="bg-y text-center">
                                                <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                            </td>
                                            <td class="bg-y text-center">
                                                <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                            </td>
                                            <td colspan="2">Other Cost</td>
                                            <td rowspan="3">Total</td>
                                            <td rowspan="3">Remark</td>
                                        </tr>

                                        <tr>
                                            <td>Surat Izin Olah Gerak</td>
                                            <td>Surat Izin Fuel Transfer</td>
                                            <td>Surat Izin Angkut Explosive Carrying</td>
                                            <td>Surat Izin Angkut B3</td>
                                            <td>Surat Izin (Other)</td>

                                            <td rowspan="2">(Rp)</td>
                                            <td rowspan="2">(Rp)</td>
                                        </tr>

                                        <tr>
                                            <td class="bg-y text-center">
                                                <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                            </td>
                                            <td class="bg-y text-center">
                                                <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                            </td>
                                            <td class="bg-y text-center">
                                                <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                            </td>
                                            <td class="bg-y text-center">
                                                <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                            </td>
                                            <td class="bg-y text-center">
                                                <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                            </td>
                                        </tr>
                                    </thead>


                                    <tbody>
                                         @for ($i = 1; $i <= 7; $i++)
                                        <tr>

                                        
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class=" text-center">
                                            -
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class=" text-center">
                                            -
                                        </td>


                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>


                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        <td class="bg-y text-center">
                                            <input  style="background-color: rgb(226, 236, 151); width: 55px"     name="high"  type="text" >
                                        </td>
                                        
                                    </tr>
                                    @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-3">
                            <table>
                                <thead>
                                    <tr>
                                        <td colspan="2" class="text-center">0</td>
                                        <td rowspan="2" class="text-center">PHE OSES Representatif</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">Prepared By</td>
                                        <td class="text-center">Approved By</td>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td style="height: 80px"></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td class="text-center">( Admin PEIP )</td>
                                        <td class="text-center">( Manager PEIP )</td>
                                        <td class="text-center">( - )</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                        

        

                </div>

                {{-- <!-- TABS -->
                <div class="card-body pb-0">

                    <ul class="nav nav-tabs border-0" id="costTab" role="tablist">

                        <li class="nav-item">
                            <button class="nav-link active" data-toggle="tab" data-target="#cost-detail">
                            <i class="fa fa-list"></i> Detail Cost
                            </button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link" data-toggle="tab" data-target="#timeshift">
                            <i class="fa fa-clock"></i> Timeshift
                            </button>
                        </li>

                    </ul>

                </div>

                <!-- TAB CONTENT -->
                <div class="card-body">

                    <div class="tab-content">

                        <!-- TAB 1: DETAIL COST -->
                        <div class="tab-pane fade show active" id="cost-detail">

                            

                        </div>

                        <!-- TAB 2: TIMESHIFT -->
                        <div class="tab-pane fade" id="timeshift">

                            <div class="table-responsive">
                            <table class="table table-sm align-middle">

                                <thead class="table-light">
                                    <tr>
                                        <th class="px-3">Date</th>
                                        <th>Activity</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <tr>
                                        <td class="px-3 border-bottom">01 Jan 2026</td>
                                        <td class="border-bottom">Loading Cargo</td>
                                        <td class="border-bottom">
                                        <span class="badge bg-success bg-opacity-10 text-success">
                                            Approved
                                        </span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="px-3 border-bottom">05 Jan 2026</td>
                                        <td class="border-bottom">Docking</td>
                                        <td class="border-bottom">
                                        <span class="badge bg-warning bg-opacity-10 text-warning">
                                            Pending
                                        </span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="px-3 border-bottom">10 Jan 2026</td>
                                        <td class="border-bottom">Unloading</td>
                                        <td class="border-bottom">
                                        <span class="badge bg-danger bg-opacity-10 text-danger">
                                            Rejected
                                        </span>
                                        </td>
                                    </tr>

                                </tbody>

                            </table>
                            </div>

                        </div>

                    </div>

                </div> --}}

            </div>
        </div>
    </section>
@endsection