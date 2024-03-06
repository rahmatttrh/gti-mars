@extends('layouts.stisla.app-vdr')
@section('title')
   VDR Dashboard
@endsection
@section('content')

   <section class="section">
      <div class="row">
         <div class="col-md-4">
            <div class="card shadow-sm border">
               {{-- <div class="card-header">
                  <span class="badge badge-light">Total Operating Mode (Hour)</span>
                  
               </div> --}}
               <div class="card-body">
                  {{-- <b>{{auth()->user()->name}}</b><br> --}}
                  <div class="badge badge-info">
                     {{-- @if (auth()->user()->hasRole('marine'))
                        SUPER USER
                        @elseif(auth()->user()->hasRole('admin-vdr'))
                        ADMIN
                        @elseif(auth()->user()->hasRole('superadmin-vdr'))
                        SUPER ADMIN
                     @endif
                     {{strtoupper(auth()->user()->system)}} --}}
                     <x-status-stisla.user />
                  </div>
                  {{-- <small></small>
                  <small>
                     
                  </small> --}}
               </div>
               
               <div class="card-body">
                  <small class="mb-2">Total Operating Mode (Hour)</small>
                  <canvas class="mt-2" id="myChart"></canvas>
                  {{-- <canvas id="myChart2"></canvas> --}}
                  {{-- <div id="chartdiv"></div> --}}
               </div>
               <div class="card-body">
                  {{-- <div class="badge badge-light mb-4">Fuel Consumption (Liter)</div> --}}

                  <small class="mb-2">Fuel Consumption (Liter)</small>
                  <canvas class="mt-2" id="myChart2"></canvas>
               </div>
               <div class="card-footer bg-whitesmoke">
                  {{-- <span class="badge badge-warning" style="background-color: #f58056">Fresh Water</span>
                  <span class="badge badge-primary">Fuel Oil</span> --}}
                  <small>Nilai <b>Total Hours</b> adalah hasil dari penjumlahan nilai High, Normal, Slow, Maneuvering, Idle, Towing, A/H, S/B, Maintenance dan Downtime  </small>
               </div>
           </div>
         </div>
         <div class="col-md-8">
            
                  {{-- <hr> --}}
                  <form action="{{route('vdr.filter')}}" method="POST">
                     @csrf
                     {{-- <div class="form-group">
                        <div class="input-group">
                           
                           <select class="form-control " required name="month" id="month">
                              <option {{$thisMonth == 1 ? 'selected' : ''}} value="1">Januari</option>  
                              <option {{$thisMonth == 2 ? 'selected' : ''}} value="2">Februari</option> 
                              <option {{$thisMonth == 3 ? 'selected' : ''}} value="3">Maret</option> 
                              <option {{$thisMonth == 4 ? 'selected' : ''}} value="4">April</option> 
                              <option {{$thisMonth == 5 ? 'selected' : ''}} value="5">Mei</option> 
                              <option {{$thisMonth == 6 ? 'selected' : ''}} value="6">Juni</option> 
                              <option {{$thisMonth == 7 ? 'selected' : ''}} value="7">Juli</option> 
                              <option {{$thisMonth == 8 ? 'selected' : ''}} value="8">Agustus</option> 
                              <option {{$thisMonth == 9 ? 'selected' : ''}} value="9">September</option> 
                              <option {{$thisMonth == 10 ? 'selected' : ''}} value="10">Oktober</option> 
                              <option {{$thisMonth == 11 ? 'selected' : ''}} value="11">November</option> 
                              <option {{$thisMonth == 12 ? 'selected' : ''}} value="12">Desember</option> 
                           </select>
                           <select class="form-control " required name="year" id="year">
                              <option {{$thisYear == 2024 ? 'selected' : ''}} value="2024">2024</option>  
                              <option {{$thisYear == 2023 ? 'selected' : ''}} value="2023">2023</option> 
                              <option {{$thisYear == 2022 ? 'selected' : ''}} value="2022">2022</option> 
                           </select>
                        </div>
                     </div> --}}
                     <div class="form-group">
                        <div class="input-group">
                           
                           <select class="form-control " required name="vessel" id="vessel">
                              {{-- <option {{$vessel == 'all' ? 'selected' : ''}} value="all">All Vessel</option> --}}
                              @foreach ($vessels as $vess)
                                 <option {{$vessel == $vess->id ? 'selected' : ''}} value="{{$vess->id}}">{{$vess->name}}</option> 
                              @endforeach
                              
                              {{-- <option value="Maret">Transko Moloko</option> 
                              <option value="April">Elok Jaya</option> 
                              <option value="Mei">ENC One</option>  --}}
                           </select>
                           <input type="date" name="start" id="start" class="form-control">
                           <span class="mx-2 mt-3">To</span>
                           <input type="date" name="end" id="end" class="form-control">
                           <div class="input-group-append">
                              <button class="btn btn-light border px-4" type="submit">Filter</button>
                              
                            </div>
                        </div>
                     </div>
                     {{-- <button class="btn btn-primary btn-block" type="submit">Filter</button> --}}
                  </form>
                  {{-- <hr>

                  
                  <canvas id="myChart4"></canvas> --}}
                  @if ($thisVessel)
                  <span>
                     VDR Data of <b>{{$thisVessel->name}}</b> between <b>{{formatDate($start)}}</b> and <b>{{formatDate($end)}}</b>
                  </span>
                  @endif
                  
                  <hr>
                  <div class="table-responsive">
                     <table class=" table-striped" id="table-1">
                        <thead>
                           <tr>
                              <th class="text-center">No.</th>
                              <th>VDR Number</th>
                              <th>Vessel</th>
                              <th>Date</th>
                              <th>Crew</th>
                              <th>Loc</th>
                              <th>Status</th>
                           </tr>
                        </thead>
                        <tbody>
      
                              @foreach($vdrs as $vdr)
                              <tr>
                                 <td class="text-muted text-center"><small>{{++$i}}</small></td>
                                 <td>
                                    <a href="{{route('vdr.show', enkripRambo($vdr->id))}}">{{vdrId($vdr->id)}}</a>
      
                                 </td>
                                 <td>{{$vdr->vessel->name}}</td>
                                 <td>{{dayDate($vdr->date)}}</td>
                                 <td>{{$vdr->crew_onduty}} / {{$vdr->crew_max}}</td>
                                 <td>{{$vdr->location_midnight}}</td>
                                 <td>
                                    <x-status-stisla.vdr :vdr="$vdr" />
                                 </td>
                              </tr>
                              @endforeach
                        </tbody>
                     </table>
                  </div>
               
        </div>
      </div>

      <div class="card">
           
         
       </div>
    
   </section>
@endsection

@push('autorefresh')
<script type="text/javascript">
   window.setTimeout( function() {
       window.location.reload();
   }, 300000);
</script>
@endpush

@push('chart')
   <script>
      var ctx = document.getElementById("myChart").getContext('2d');
      var myChart = new Chart(ctx, {
         type: 'line',
         data: {
            labels: {!! json_encode($date) !!},
            datasets: [{
               label: 'Total Hours',
               data: {!! json_encode($value) !!},
               borderWidth: 2,
               backgroundColor: '#89CFF3',
               borderWidth: 0,
               borderColor: 'transparent',
               pointBorderWidth: 0,
               pointRadius: 3.5,
               pointBackgroundColor: 'transparent',
               pointHoverBackgroundColor: '#89CFF3',
            }
            ]
         },
         options: {
            legend: {
               display: false
            },
            scales: {
               yAxes: [{
               gridLines: {
                  // display: false,
                  drawBorder: false,
                  color: '#f2f2f2',
               },
               ticks: {
                  beginAtZero: true,
                  stepSize: 2,
                  callback: function(value, index, values) {
                     return '' + value + ' H';
                  }
               }
               }],
               xAxes: [{
               gridLines: {
                  display: false,
                  tickMarkLength: 15,
               }
               }]
            },
         }
      });

      var ctx = document.getElementById("myChart2").getContext('2d');
      var myChart = new Chart(ctx, {
         type: 'bar',
         data: {
            labels: {!! json_encode($date) !!},
            datasets: [{
               label: 'Total Fuel',
               data: {!! json_encode($fuel) !!},
               borderWidth: 2,
               backgroundColor: '#A0E9FF',
               borderColor: '#A0E9FF',
               borderWidth: 2.5,
               pointBackgroundColor: '#ffffff',
               pointRadius: 4
            }]
         },
         options: {
            legend: {
               display: false
            },
            scales: {
               yAxes: [{
               gridLines: {
                  drawBorder: false,
                  color: '#f2f2f2',
               },
               ticks: {
                  beginAtZero: true,
                  stepSize: 500
               }
               }],
               xAxes: [{
               ticks: {
                  display: false
               },
               gridLines: {
                  display: false
               }
               }]
            },
         }
      });

      var ctx = document.getElementById("myChart3").getContext('2d');
      var myChart = new Chart(ctx, {
         type: 'doughnut',
         data: {
            datasets: [{
               data: [
               
               30,
               20,
               ],
               backgroundColor: [
               
               '#fc544b',
               '#6777ef',
               ],
               label: 'Dataset 1'
            }],
            labels: [
               
               'Fuel Oil',
               'Fresh Water'
            ],
         },
         options: {
            responsive: true,
            legend: {
               position: 'bottom',
            },
         }
      });

      var ctx = document.getElementById("myChart4").getContext('2d');
      var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
         datasets: [{
            data: [
            
            30,
            100,
            ],
            backgroundColor: [
            
            '#fc544b',
            '#6777ef',
            ],
            label: 'Dataset 1'
         }],
         labels: [
            
            'Red',
            'Blue'
         ],
      },
      options: {
         responsive: true,
         legend: {
            position: 'bottom',
         },
      }
      });
   </script>
@endpush


