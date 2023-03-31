<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="icon" href="" type="image/x-icon"/>
      <title>DSP - PHE Request</title>
      {{-- <link rel="stylesheet" href="{{host()}}public/css/custom.css"> --}}
      <style>
         .tablesm {
            font-family: 'Courier New', Courier;
            border-collapse: collapse;
            width: 100%;

         }

         .tablesm th,
         .tablesm td {
            border: 1px solid rgb(68, 68, 68);
            
            font-size: 12px;
         }

         .tablesm th {
            padding: 10px;
            background-color: rgb(66, 66, 66);
            color: white;
         }

         .tablesm td {
            padding: 4px;
         }

         .header {
            font-family: 'Courier New', Courier;
            margin-bottom: 10px;
         }

         .header .title {
            font-size: 22px;
            
            text-transform: uppercase;
            font-weight: 500
            /* font-style: bold */
            /* color: white; */
            /* background-color: rgb(98, 162, 245); */
         }
         
      </style>
   </head>
   <body class="body">
      <table class="header">
         <thead>
            <tr>
               <td colspan="5" style="border: none;text-align:left;" rowspan="2">
                  <img style="height: 50px; width:auto;" src="{{host()}}public/img/logo/phe2.png" alt=""><br>
               </td>
            </tr>
         </thead>
      </table>
      <table class="header">
         <thead>
            <tr>
               <td class="title">MONTHLY INTEGRATED BOAT PLANNING</td>
            </tr>
            <tr>
               <td style="text-transform: uppercase"><small>{{$month}}</small></td>
            </tr>
         </thead>
      </table>

      <table class="tablesm">
         <thead>
            <tr>
               <th>Function</th>
               <th>Station</th>
               <th>Activity</th>
               <th>Location</th>
               <th>Req. Boat</th>
               <th>Boat</th>
               <th>Date</th>
               <th>Status</th>
            </tr>
         </thead>
         <tbody>
            {{-- <tr>
               <td rowspan="4" colspan="1">test</td>
            </tr>
            <tr>
               <td>tests</td>
               <td>tests</td>
               <td>tests</td>
               <td>tests</td>
               <td>tests</td>
               <td>tests</td>
               <td>tests</td>
            </tr>
            <tr>
               <td>tests</td>
               <td>tests</td>
               <td>tests</td>
               <td>tests</td>
               <td>tests</td>
               <td>tests</td>
               <td>tests</td>
            </tr>
            <tr>
               <td>tests</td>
               <td>tests</td>
               <td>tests</td>
               <td>tests</td>
               <td>tests</td>
               <td>tests</td>
               <td>tests</td>
            </tr> --}}
            @foreach ($departs as $depart => $reqs)
               <tr>
                  <td style="text-align: center" rowspan="{{count($reqs)+1}}">{{$depart}}</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
               </tr>
               @foreach ($reqs as $req)
                  <tr>
                     <td>{{$req->schedule->destination->name}}</td>
                     <td>{{$req->activity->name}} {{$req->desc}}</td>
                     <td>{{$req->schedule->origin->name}} - {{$req->schedule->destination->name}}</td>
                     <td>{{$req->schedule->req_boat}}</td>
                     <td>{{$req->schedule->vessel->name ?? '-'}}</td>
                     <td>{{$req->date}}</td>
                     <td style="text-align: center">
                        <x-status.request :request="$req" />
                     </td>
                  </tr>   
               @endforeach
            @endforeach
            
         </tbody>
      </table>
   </body>
</html>