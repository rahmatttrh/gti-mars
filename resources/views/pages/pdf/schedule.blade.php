<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="icon" href="" type="image/x-icon"/>
      <title>E Fleet - PMS Deck</title>
      {{-- <link rel="stylesheet" href="{{host()}}public/css/custom.css"> --}}
      <style>
         .tablesm {
            font-family: 'Courier New', Courier;
            border-collapse: collapse;
            width: 100%;

         }

         .tablesm th,
         .tablesm td {
            border: 1px solid rgb(94, 92, 92);
            
            font-size: 12px;
         }

         .tablesm th {
            padding: 10px;
            background-color: rgb(135, 238, 252);
         }

         .tablesm td {
            padding: 3px;
         }

         .header {
            font-family: 'Courier New', Courier;
            margin-bottom: 10px;
         }

         .header td {
            font-size: 24px;
            text-transform: uppercase;
            font-style: bold
            /* color: white; */
            /* background-color: rgb(98, 162, 245); */
         }
         
      </style>
   </head>
   <body class="body">
      <table class="header">
         <thead>
            <tr>
               <td>MONTHLY INTEGRATED BOAT PLANNING {{$month}}</td>
               
            </tr>
            
         </thead>
      </table>

      <table class="tablesm">
         <thead>
            <tr>
               <th>No</th>
               <th>Function</th>
               <th>Station</th>
               <th>Activity</th>
               <th>Location</th>
               <th>Required Boat</th>
               <th>Boat Assignment</th>
               <th>Date</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($schedules as $schedule)
               <tr>
                  <td style="text-align: center;">{{++$i}}</td>
                  <td>{{$schedule->func}}</td>
                  <td>{{$schedule->station}}</td>
                  <td>{{$schedule->activity}}</td>
                  <td>{{$schedule->origin->name}} - {{$schedule->destination->name}}</td>
                  <td>{{$schedule->req_boat}}</td>
                  <td>{{$schedule->vessel->name}}</td>
                  <td>{{$schedule->date}}</td>
               </tr>
            @endforeach
         </tbody>
      </table>
   </body>
</html>