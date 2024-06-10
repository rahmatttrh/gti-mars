@extends('layouts.app-doc')
@section('title')
   BCM
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
<div class="container px-0">
   <!-- Page title -->
   <div class="page-header d-print-none">
     <div class="row align-items-center">
       <div class="col">
         <h2 class="page-title">
           Preview Boat Cargo Manifest
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
   <div class="container-xl bg-white rounded px-0">
      <table>
         <tbody>
            <tr>
               <td style="border-right: none">
                  <img src="{{asset('img/logo/phe-oses.png')}}" width="400px" alt="DSP-PHE" class="navbar-brand-image">
               </td>
               <td style="border-left: none" class="pt-3"><h3>BOAT CARGO MANIFEST</h3></td>
            </tr>
         </tbody>
      </table>
      <table>
         <tbody>
            <tr>
               <td colspan="2" class="text-center"><b>Boat Cargo Manifest Number</b></td>
               <td colspan="2" class="text-center">{{$cargo->code}}</td>
               <td colspan="2" class="text-center">Boat Officer</td>
            </tr>
            <tr>
               <td style="width: 100px">Vessel</td>
               <td></td>
               <td colspan="" class="text-center"><b>{{$cargo->schedule->vessel->name}}</b></td>
               <td></td>
               <td>Material Operation Officer I</td>
               <td><b>PSN</b></td>
            </tr>
            <tr>
               <td>Date</td>
               <td></td>
               <td colspan="" class="text-center"><b>{{formatDate($cargo->schedule->date)}}</b></td>
               <td></td>
               <td>Material Operation Officer II</td>
               <td><b></b></td>
            </tr>
            <tr>
               <td>Along Side At</td>
               <td>:</td>
               <td>{{$cargo->along ?  formatDateTime($cargo->along) : '-'}}</td>
               <td>HRS</td>
               <td></td>
               <td></td>
            </tr>
            <tr>
               <td>Started Loading</td>
               <td>:</td>
               <td>{{$cargo->start ? formatDateTime($cargo->start) : '-'}}</td>
               <td>HRS</td>
               <td>Security Officer</td>
               <td><b>SECURITY ON DUTY</b></td>
            </tr>
            <tr>
               <td>Finished Loading</td>
               <td>:</td>
               <td>{{$cargo->finish ? formatDateTime($cargo->finish) : '-'}}</td>
               <td>HRS</td>
               <td></td>
               <td></td>
            </tr>
            <tr>
               <td>Departed to Field</td>
               <td>:</td>
               <td>{{$cargo->depart ? formatDateTime($cargo->depart) : '-'}}</td>
               <td>HRS</td>
               <td>Boat Officer</td>
               <td><b>CAPT ON DUTY</b></td>
            </tr>
            <tr>
               <td></td>
               <td></td>
               <td colspan="2" class="text-center"><b>{{$cargo->origin->name}}</b></td>
               {{-- <td></td> --}}
               <td>Location to</td>
               <td><b>{{$cargo->destination->name}}</b></td>
            </tr>

            
         </tbody>
         
      </table>
      <table>
         <tbody>
            <tr>
               <td class="text-center">No</td>
               <td>PO/Contractor</td>
               <td>Description</td>
               <td>Package</td>
               <td>Weight(KG)</td>
               <td>MTD No.</td>
               <td>M3</td>
               <td>PO</td>
            </tr>

            @foreach ($cargoItems as $item)
                <tr>
                  <td class="text-center">{{++$i}}</td>
                  <td>{{$item->contract}}</td>
                  <td>{{$item->desc}}</td>
                  <td>{{$item->qty}} {{$item->unit}}</td>
                  <td>{{$item->weight}}</td>
                  <td>{{$item->mtd}}</td>
                  <td>-</td>
                  <td>-</td>
                </tr>
            @endforeach
            
            <tr>
               <td><b></b></td>
               <td><b></b></td>
               <td><b></b></td>
               <td><b></b></td>
               <td><b></b></td>
               <td><b></b></td>
               <td></td>
               <td></td>
            </tr>
            <tr>
               <td><b></b></td>
               <td><b></b></td>
               <td><b></b></td>
               <td><b></b></td>
               <td><b></b></td>
               <td><b></b></td>
               <td></td>
               <td></td>
            </tr>
            <tr>
               <td><b></b></td>
               <td><b></b></td>
               <td><b></b></td>
               <td><b></b></td>
               <td><b></b></td>
               <td><b></b></td>
               <td></td>
               <td></td>
            </tr>
         </tbody>
      </table>

      <table>
         <tbody>
            <tr>
               <td colspan="6" class="text-center">PACKAGE IN GOOD CONDITION</td>
            </tr>
            <tr>
               <td colspan="2"></td>
               <td colspan="2">Security</td>
               <td colspan="2">Chief Officer Vessel</td>
            </tr>
            <tr>
               <td>Date</td>
               <td>: {{formatDate($cargo->date)}}</td>
               <td>Date</td>
               <td>: {{formatDate($cargo->date)}}</td>
               <td>Date</td>
               <td>: {{formatDate($cargo->date)}}</td>
            </tr>
            <tr>
               <td>Name</td>
               <td>: PSN</td>
               <td>Name</td>
               <td>: </td>
               <td>Name</td>
               <td>: </td>
            </tr>
            <tr>
               <td>Signature</td>
               <td>: </td>
               <td>Signature</td>
               <td>: </td>
               <td>Signature</td>
               <td>: </td>
            </tr>
            <tr>
               <td colspan="6">Remarks : </td>
            </tr>
         </tbody>
      </table>
      
   </div>
</div>
@endsection