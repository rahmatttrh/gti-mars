@extends('layouts.stisla.app-vdr')
@section('title')
   VDR Dashboard
@endsection
@section('content')

   <section class="section">
      <div class="row">
         <div class="col-md-5">
            
            <div class="card shadow">
               <div class="card-body">
                  <small class="mb-2 badge badge-primary">Fuel Consumption (Liter) 
                     @if ($title == 'Today')
                     (7 Hari Terakhir)
                     @else 
                        @if ($thisVessel)
                          ( {{formatDate($start)}} - {{formatDate($end)}} )
                            @else
                            (7 Hari Terakhir)
                        @endif
                     @endif 
                  </small>
                  <canvas class="mt-2" id="myChart2" height="130px"></canvas>
                  {{-- <hr>
                  <small class="mb-2 badge badge-info">Total Operating Mode (Hour)
                      
                  
                     @if ($title == 'Today')
                     (7 Hari Terakhir)
                     @else 
                        @if ($thisVessel)
                          ( {{formatDate($start)}} - {{formatDate($end)}} )
                            @else
                            (7 Hari Terakhir)
                        @endif
                     @endif   
                  </small>
                  <canvas class="mt-2" id="myChart" height="130px"></canvas> --}}
               </div>
            </div>
            <div class="card shadow">
               <div class="card-body">
                  <small class="mb-2 badge badge-info">Total Operating Mode (Hour)
                      
                  
                     @if ($title == 'Today')
                     (7 Hari Terakhir)
                     @else 
                        @if ($thisVessel)
                          ( {{formatDate($start)}} - {{formatDate($end)}} )
                            @else
                            (7 Hari Terakhir)
                        @endif
                     @endif   
                  </small>
                  <canvas class="mt-2" id="myChart" height="130px"></canvas>
               </div>
            </div>
            
            
            {{-- <div class="card shadow-sm border">
               
               <div class="card-body">
                  <div class="badge badge-info">
                     <x-status-stisla.user />
                  </div>
               </div>
               
               <div class="card-body">
                  <small class="mb-2">Total Operating Mode (Hour)</small>
                  <canvas class="mt-2" id="myChart"></canvas>
               </div>
               <div class="card-body">
                  <small class="mb-2">Fuel Consumption (Liter)</small>
                  <canvas class="mt-2" id="myChart2"></canvas>
               </div>
               <div class="card-footer bg-whitesmoke">
                  <small>Nilai <b>Total Hours</b> adalah hasil dari penjumlahan nilai High, Normal, Slow, Maneuvering, Idle, Towing, A/H, S/B, Maintenance dan Downtime  </small>
               </div>
           </div> --}}
         </div>
         <div class="col-md-7">
            
                  @if ($title == 'All')
                  <form action="{{route('vdr.filter')}}" method="POST">
                     @csrf
                    
                     <div class="form-group">
                        <div class="input-group">
                           
                           <select class="form-control " required name="vessel" id="vessel">
                              <option value="" selected disabled>Select Vessel</option>
                              @foreach ($vessels as $vess)
                                 <option {{$vessel == $vess->id ? 'selected' : ''}} value="{{$vess->id}}">{{$vess->name}}</option> 
                              @endforeach
                             
                           </select>
                           <input type="date" name="start" id="start" value="{{$start}}" class="form-control">
                           <span class="mx-2 mt-3">To</span>
                           <input type="date" name="end" id="end" value="{{$end}}" class="form-control">
                           <div class="input-group-append">
                              <button class="btn btn-primary  px-4" type="submit">Filter</button>
                              
                            </div>
                        </div>
                     </div>
                     
                  </form>
                  @endif
                 
                  
                  

                  
                  
                  {{-- <hr> --}}
                  <div class="card shadow">
                     {{-- <div class="card-header">
                        <a href="" class="btn btn-primary mr-2">Today VDR</a>
                        <a href="" class="btn btn-light border">All VDR</a>
                     </div> --}}
                     <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                           <div>
                              <a href="{{route('vdr.marine')}}" class="btn {{$title == 'Today' ? 'btn-primary' : 'bg-white btn-light border'}} mr-2 mb-2">Recent VDR</a>
                              <a href="{{route('vdr.marine.all')}}" class="btn {{$title == 'All' ? 'btn-primary' : 'bg-white btn-light border'}} mb-2">All VDR</a>
                           </div>
                           @if ($title == 'Today')
                           <h5>{{formatDateName($now)}}</h5>
                           @else
                           @if ($thisVessel)
                           <div class="text-right">
                              {{$thisVessel->name}} [ {{formatDate($start)}} - {{formatDate($end)}} ] <br>
                              {{count($vdrs)}} Submited VDR
                           </div>
                           
                           @else
                           <h5>All VDR</h5>
                           @endif
                           
                           @endif
                           
                        </div>
                        {{-- <div class="table-responsive"> --}}
                           <table class="datatables-b" id="datatables">
                              <thead>
                                 <tr>
                                    {{-- <th class="text-center">No.</th> --}}
                                    <th>ID</th>
                                    {{-- <th>Vessel</th> --}}
                                    {{-- <th>Date</th> --}}
                                    {{-- <th>Crew</th> --}}
                                    {{-- <th>Loc</th> --}}
                                    <th>Status</th>
                                    <th></th>
                                 </tr>
                              </thead>
                              <tbody>
            
                                    @foreach($vdrs as $vdr)
                                    <tr>
                                       {{-- <td class="text-muted text-center"><small>{{++$i}}</small></td> --}}
                                       <td>
                                          <a href="{{route('vdr.show.spa', [enkripRambo($vdr->id), enkripRambo('index')])}}">{{$vdr->code}}</a>
            
                                       </td>
                                       {{-- <td>{{$vdr->vessel->name}}</td> --}}
                                       {{-- <td>{{formatDate($vdr->date)}}</td> --}}
                                       {{-- <td>{{$vdr->crew_onduty}} / {{$vdr->crew_max}}</td> --}}
                                       {{-- <td>{{$vdr->location_midnight}}</td> --}}
                                       <td>
                                          <x-status-stisla.vdr :vdr="$vdr" />
                                       </td>
                                       <td>
                                          {{$vdr->updated_at}}
                                       </td>
                                    </tr>
                                    @endforeach
                              </tbody>
                           </table>
                        {{-- </div> --}}
                     </div>
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
               backgroundColor: '#25b1e8',
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
                  stepSize: 10,
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
               backgroundColor: '#1698f0',
               borderColor: '#1698f0',
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
                  stepSize: 1500
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


