<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="icon" href="" type="image/x-icon"/>
      <title>DSP - PHE Schedule</title>
      {{-- <link rel="stylesheet" href="{{host()}}public/css/custom.css"> --}}
      <style>
         body{
            font-family: 'Courier New', Courier;
         }

         .cargo {
            border-collapse: collapse;
            width: 100%;
         }

         .cargo th {
            padding: 10px;
            background-color: rgb(255, 255, 255);
         }

         .cargo td {
            background-color: rgb(255, 255, 255);
            padding: 8px;
         }

         .tablesm {
            border-collapse: collapse;
            width: 40%;
            border: none;
            font-size: 14px;
         }



         .cargo th,
         .cargo td {
            border: 0.5px solid rgb(231, 231, 231);
            
            font-size: 14px;
         }

   
         .tablesm td {
            background-color: rgb(255, 255, 255);
            padding: 8px;
            border: none
         }

         .header {
            
            margin-bottom: 10px;
         }

         .header thead td {
            font-size: 24px;
            text-transform: uppercase;
            font-style: bold
            /* color: white; */
            /* background-color: rgb(98, 162, 245); */
         }

         .head {
            margin-top: 10px;
            /* font-family: Arial, sans-serif; */
            border-collapse: collapse;
            width: 100%;
         }

         .head th,
         .head td {
            border: none;
            padding: 1px;
         }

         .title{
            font-size: 28px;
            font-style: bold
         }
         
      </style>
   </head>
   <body class="body">
      <table  class="head">
         <tr>
             <td colspan="5" style="border: none;text-align:left;" rowspan="2">
                <img style="height: 100px; width:auto;" src="{{host()}}public/img/logo/wolf.png" alt="">
             </td>
             <td colspan="4" rowspan="2" style="padding-left:5px;border: none;">
                 {{-- <span id="brand"><b>DSP</b></span><br>
                 <span class="subhead">Jl.Timor Raya No 1 Koja </span><br>
                 <span class="subhead">(021)4390 4903 </span> --}}
             </td>
             {{-- <td rowspan="2" style="height: 100px"><img style="height: 100px; width:auto;" src="{{host()}}public/img/peip.png" alt=""></td> --}}
 
             <td colspan="4" rowspan="2" style="border: none;text-align:right;">
 
                 <span class="title">RECEIPT</span><br>
                 <small>Number : 32142333424</small><br>
                 <small>Date : 13/04/2023</small>
                 {{-- <span id="title">REQUEST</span> --}}
                 
                 {{-- <span class="subtitle">{{$materialRequest->code}}</span><br> --}}
             </td>
         </tr>
 
     </table>
      <br>
      <br>

      <table class="tablesm" border="none">
         <thead>
            <tr>
               <td>ID Cargo</td>
               <td colspan="">: 13342424</td>
            </tr>
            <tr>
               <td>Supplier</td>
               <td>: Indofood</td>
            </tr>
            <tr>
               <td>Date</td>
               <td>: 13/03/2023</td>
            </tr>
            <tr>
               <td>Route</td>
               <td>: KJ4 - Cinta-T</td>
            </tr>
         </thead>
         
      </table>
      <h4>Cargo Detail</h4>
      <table class="cargo">
         <thead>
            <tr>
               <td>No. Document</td>
               <td>Description</td>
               <td>Qty</td>
               <td>Unit</td>
               <td>M</td>
               <td>Ton</td>
               <td>Remarks</td>
            </tr>
         </thead>
         <tbody>
            <tr>
               <td>35456</td>
               <td>Barang 1</td>
               <td>1</td>
               <td>Unit</td>
               <td>5.3</td>
               <td>8.2</td>
               <td>Lorem ipsum dolor sit.</td>
            </tr>
            <tr>
               <td>22134</td>
               <td>Barang 2</td>
               <td>1</td>
               <td>Unit</td>
               <td>6.5</td>
               <td>8.3</td>
               <td>Lorem ipsum dolor sit.</td>
            </tr>
            <tr>
               <td>887734</td>
               <td>Barang 3</td>
               <td>1</td>
               <td>Unit</td>
               <td>2.1</td>
               <td>3.0</td>
               <td>Lorem ipsum dolor sit.</td>
            </tr>
         </tbody>
      </table>
   </body>
</html>