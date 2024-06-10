@extends('layouts.app-doc')
@section('title')
   MTD
@endsection
@section('content')
<style>
   html { -webkit-print-color-adjust: exact; }
   table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding-left: 5px;
}

table td, table th {
  font-size: 10px
}

table td {
  padding-top: 5px;
  padding-bottom: 5px;
  height: 20px;
}

/* .ttd {
   font-size: 10px;
}

table td {
  font-size: 10px
}

.title {
  font-size: 11px
} */

table {
   width: 100%;
}

</style>
<div class="container-xl p-0">
   <!-- Page title -->
   <div class="page-header d-print-none">
     <div class="row align-items-center">
       <div class="col">
         <h2 class="page-title">
           Preview Material Tracking Document
         </h2>
       </div>
       <!-- Page title actions -->
       <div class="col-auto ms-auto d-print-none">
         <button type="button" class="btn btn-primary" onclick="javascript:window.print();">
           <!-- Download SVG icon from http://tabler-icons.io/i/printer -->
           <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" /><path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" /><rect x="7" y="13" width="10" height="8" rx="2" /></svg>
           Print
         </button>
       </div>
     </div>
   </div>
 </div>
 <div class="page-body" >
   <div class="container-xl bg-white rounded p-0">
      <table>
         <tbody>
            <tr>
               <td style="border-right: none">
                  <img src="{{asset('img/logo/phe-oses.png')}}" width="400px" alt="DSP-PHE" class="navbar-brand-image">
               </td>
               <td style="border-left: none" class="pt-3"><h3>MATERIAL TRACKING DOCUMENT</h3></td>
            </tr>
         </tbody>
      </table>
      <table>
         <tbody>
            <tr>
               <td class="text-center py-2" colspan="2"><b>FORM</b></td>
               <td class="text-center py-2" colspan="2"><b>TO</b></td>
            </tr>
            <tr>
               <td>Location : </td>
               <td><b>{{$cargo->request->origin->name}}</b></td>
               <td>Location : </td>
               <td><b>{{$cargo->request->destination->name}}</b></td>
            </tr>
            <tr>
               <td>MTD Number : </td>
               <td><b>T{{$cargo->mtd}}</b></td>
               <td>Dept : </td>
               <td><b></b></td>
            </tr>
            <tr>
               <td>Sent By- Name : </td>
               <td><b>SANTY PUSPASARI</b></td>
               <td>Received By- Name : </td>
               <td><b></b></td>
            </tr>
            <tr>
               <td>Sign : </td>
               <td><b></b></td>
               <td>Sign : </td>
               <td><b></b></td>
            </tr>
            <tr>
               <td>Date : </td>
               <td><b></b></td>
               <td>Date : </td>
               <td><b></b></td>
            </tr>
            <tr>
               <td style="height: 15px" colspan="4"></td>
            </tr>
         </tbody>
      </table>
      <table>
         <tbody>
            <tr>
               <th style="width: 80px">Item</th>
               <th style="width: 50px">Qty</th>
               <th style="width: 50px">Unit</th>
               <th>Description</th>
               <th style="width: 150px">Remark</th>
            </tr>

            <tr>
               <td>{{$cargo->desc}}</td>
               <td>{{$cargo->qty}}</td>
               <td>{{$cargo->unit}}</td>
               <td>-</td>
               <td>-</td>
            </tr>
            <tr>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
            </tr>
            <tr>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
            </tr>
            <tr>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
            </tr>
            <tr>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
            </tr>
            <tr>
               <th class="text-center" colspan="5">Check by</th>
            </tr>
         </tbody>
      </table>

      <table>
         <tbody>
            <tr>
               <td class="text-center">Materials</td>
               <td class="text-center">Security</td>
               <td class="text-center">Actual Received</td>
            </tr>
            <tr>
               <td>Date : </td>
               <td>Date : </td>
               <td>Date : </td>
            </tr>
            <tr>
               <td>Name : </td>
               <td>Name : </td>
               <td>Name : </td>
            </tr>
            <tr>
               <td>Signature : </td>
               <td> </td>
               <td> </td>
            </tr>
            <tr>
               <td colspan="3">Notes / References :</td>
            </tr>
            <tr>
               <td colspan="3" style="height: 30px"></td>
            </tr>
            <tr>
               <td colspan="3" style="height: 20px">Reservation :</td>
            </tr>
         </tbody>
      </table>

      <table>
         <tbody>
            <tr>
               <td rowspan="2">Total Package :</td>
               <td>Approx Weight : </td>
               <td>{{$cargo->weight}} Kg</td>
            </tr>
            <tr>
               <td>Approx Dimension</td>
               <td>{{$cargo->size}} M3</td>
            </tr>

            <tr>
               <td>Shipped Via :</td>
               <td colspan="2">On Date : </td>
            </tr>
            <tr>
               <td colspan="3">Attention</td>
            </tr>
            <tr>
               <td colspan="2"></td>
               <td>
                  Page 1 of 1
               </td>
            </tr>
         </tbody>
      </table>
   </div>
</div>
@endsection