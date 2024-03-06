@extends('layouts.stisla.app')
@section('title')
   DSP Dashboard Intermilan
@endsection
@section('content')
   <section class="section">
      <div class="row">
         <div class="col-md-12">
            <div class="d-flex justify-content-between">
               <div>
                  <span class="btn btn-white border"><b>INTERMILAN</b></span>
                  <div class="btn-group dropright">
                     <button type="button" class="btn btn-light border shadow-none dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     {{$monthName}}
                     </button>
                     <div class="dropdown-menu dropright">
                        <a class="dropdown-item" href="{{route('dsp.marine.intermilan', [enkripRambo(01), enkripRambo($year)])}}">
                           Januari
                         </a>
                         <a class="dropdown-item" href="{{route('dsp.marine.intermilan', [enkripRambo(02), enkripRambo($year)])}}">
                             Februari
                         </a>
                         <a class="dropdown-item" href="{{route('dsp.marine.intermilan', [enkripRambo(03), enkripRambo($year)])}}">
                             Maret
                         </a>
                         <a class="dropdown-item" href="{{route('dsp.marine.intermilan', [enkripRambo(04), enkripRambo($year)])}}">
                             April
                         </a>
                         <a class="dropdown-item" href="{{route('dsp.marine.intermilan', [enkripRambo(05), enkripRambo($year)])}}">
                             Mei
                         </a>
                         <a class="dropdown-item" href="{{route('dsp.marine.intermilan', [enkripRambo(06), enkripRambo($year)])}}">
                             Juni
                         </a>
                         <a class="dropdown-item" href="{{route('dsp.marine.intermilan', [enkripRambo(7), enkripRambo($year)])}}">
                             Juli
                         </a>
                         <a class="dropdown-item" href="{{route('dsp.marine.intermilan', [enkripRambo(8), enkripRambo($year)])}}">
                             Agustus
                          </a>
                         <a class="dropdown-item" href="{{route('dsp.marine.intermilan', [enkripRambo(9), enkripRambo($year)])}}">
                             September
                         </a>
                         <a class="dropdown-item" href="{{route('dsp.marine.intermilan', [enkripRambo(10), enkripRambo($year)])}}">
                             Oktober
                         </a>
                         <a class="dropdown-item" href="{{route('dsp.marine.intermilan', [enkripRambo(11), enkripRambo($year)])}}">
                             November
                         </a>
                         <a class="dropdown-item" href="{{route('dsp.marine.intermilan', [enkripRambo(12), enkripRambo($year)])}}">
                             Desember
                         </a>
                     </div>
                  </div>
                  <div class="btn-group dropright">
                     <button type="button" class="btn btn-light border shadow-none dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     {{$year}}
                     </button>
                     <div class="dropdown-menu dropright">
                        <a class="dropdown-item" href="{{route('dsp.marine.intermilan', [enkripRambo($month), enkripRambo(2024)])}}">
                           2024
                         </a>
                         <a class="dropdown-item" href="{{route('dsp.marine.intermilan', [enkripRambo($month), enkripRambo(2023)])}}">
                             2023
                         </a>
                         <a class="dropdown-item" href="{{route('dsp.marine.intermilan', [enkripRambo($month), enkripRambo(2022)])}}">
                             2022
                         </a>
                     </div>
                   </div>
               </div>
               <a href="{{route('document.intermilan', enkripRambo(2))}}" class="btn btn-light shadow-none border"><i class="fa fa-print"></i> Print</a>
               
               
               
            </div>
            <div class="card shadow-sm border mt-2">
               {{-- <div class="card-header">
                  <small>INTERMILAN</small>
               </div> --}}
               <div class="card-body">
                  
                  
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                     {{-- @php
                         $status = 'info'
                     @endphp --}}
                     @foreach ($dates as $date)
                     <li class="nav-item">
                        @if ($requests->where('date', $date->format('Y-m-d'))->first() != null)
                        <a class="nav-link" id="date-{{$date->format('d')}}-tab" data-toggle="tab" href="#date-{{$date->format('d')}}" role="tab" aria-controls="date-{{$date->format('d')}}" aria-selected="true"><div class="badge badge-danger">
                           {{$date->format('d')}}
                           {{-- {{$date->format('Y-m-d')}} --}}
                        </div></a>
                        @else 
                        <a class="nav-link" id="date-{{$date->format('d')}}-tab" data-toggle="tab" href="#date-{{$date->format('d')}}" role="tab" aria-controls="date-{{$date->format('d')}}" aria-selected="true"><div class="badge badge-info">
                           {{$date->format('d')}}
                           {{-- {{$date->format('Y-m-d')}} --}}
                        </div></a>
                        @endif
                        {{-- @foreach ($requests as $req)
                            @if ($req->date == $date->format('Y-m-d'))
                                @php
                                    $status = 'danger'
                                @endphp
                                @else
                                @php
                                    $status = 'info'
                                @endphp
                            @endif

                        @endforeach --}}
                        
                       
                     </li>
                     @endforeach
                     
                  </ul>
                  <div class="tab-content" id="myTabContent">
                     <div class="tab-pane fade show active text-center" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="text-muted mt-4 mb-4">klik tanggal diatas untuk menampilkan data Intermilan</div>
                     </div>
                     @foreach ($dates as $date)
                     <div class="tab-pane fade " id="date-{{$date->format('d')}}" role="tabpanel" aria-labelledby="date-{{$date->format('d')}}-tab">
                        <table>
                           <thead>
                              <tr>
                                 <th colspan="6">{{$date->format('d F Y')}}</th>
                              </tr>
                              <tr>
                                 {{-- <th>ID</th> --}}
                                 <th>User</th>
                                 <th>Activity</th>
                                 <th>Location</th>
                                 
                                 <th>Required Boat</th>
                                 <th>Boat Assigned</th>
                                 <th>Schedule</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($requests as $req)
                                 @if ($req->date == $date->format('Y-m-d'))
                                    <tr>
                                       {{-- <td>
                                          <a href="{{route('request.detail', enkripRambo($req->id))}}">{{$req->code}}</a>
                                       </td> --}}
                                       <td> {{$req->employee->port->name}}</td>
                                       <td>
                                          {{$req->desc}} 
                                          @foreach ($req->cargoItems as $cargo)
                                              {{$cargo->desc}},
                                          @endforeach
                                          {{-- <a href="#" data-toggle="modal" data-target="#request-edit-{{$req->id}}">{{$req->activity->name}} </a>
                                          - {{$req->desc}}</td> --}}
                                       <td>
                                          @if ($req->activity_id == 5)
                                             -
                                              @else
                                              {{$req->origin->name ?? '-'}} - {{$req->destination->name ?? '-'}}
                                          @endif
                                       </td>
                                       {{-- <td><a href="{{route('schedule.detail', enkripRambo($req->schedule_id))}}">{{$req->schedule->code ?? ''}}</a></td> --}}
                                       <td>{{$req->schedule->vessel->type ?? '-'}}</td>
                                       <td><a href="{{route('schedule.detail', enkripRambo($req->schedule_id))}}"> {{$req->schedule->vessel->name ?? '-'}}</a></td>
                                       <td><a href="{{route('schedule.detail', enkripRambo($req->schedule_id))}}">{{$req->schedule->code ?? ''}}</a></td>
                                    </tr>
                                    {{-- <b>{{$req->schedule->vessel->name}}</b><br>
                                    <small>{{$req->origin->name}} - {{$req->destination->name}}</small>
                                    <hr> --}}
                                    @else
                                    
                                 @endif
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                     @endforeach
                     
                  </div>
               </div>
            </div>
            {{-- <div class="card shadow-lg" id="schedule">
               <div class="card-body">
                  <div class="table-responsive">
                  <table class="table table-striped table-sm" id="table-12">
                     <thead>                                 
                        <tr>
                        <th class="text-center">
                           #
                        </th>

                        <th>ID</th>
                        <th>Activity</th>
                        <th>Location (From - To)</th>
                        <th>Required Boat</th>
                        <th>Boat Assigned</th>
                        <th>Date</th>
                        </tr>
                     </thead>
                     <tbody>     
                        @foreach ($requests as $req)
                           <tr>
                              <td>{{++$i}}</td>
                              <td>{{$req->code}}</td>
                              <td>{{$req->activity->name}}  {{$req->origin_id != null ? 'from ' . $req->origin->name : ''}}</td>
                              <td>{{$req->origin_id != null ? $req->origin->name : ''}} to {{$req->destination_id != null ? $req->destination->name : ''}}</td>
                              <td>{{$req->schedule->vessel->type}}</td>
                              <td>{{$req->schedule->vessel->name}}</td>
                              <td>{{formatDate($req->schedule->date)}}</td>
                           </tr>
                        @endforeach                            
                        
                     </tbody>
                  </table>
                  </div>
               </div>
            </div> --}}
         </div>
      </div>
   </section>

   @foreach ($requests as $request)
   <div class="modal fade" id="request-edit-{{$request->id}}" tabindex="1" role="dialog"  aria-hidden="true">
      <div class="modal-dialog" role="document">
         <form action="{{route('request.update')}}" method="POST">
            @csrf
            @method('PUT')
            <input type="number" name="requestId" id="requestId" value="{{$request->id}}" hidden>
            <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Edit Request </h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               {{-- Change {{$req->activity->name}} {{$req->description}} to  ...
               <hr> --}}
               <div class="form-row">
                  
                  <div class="form-group col-md-12">
                     <label for="desc">Description</label>
                     <input type="text" class="form-control" name="desc" id="desc" value="{{$request->desc}}">
                  </div>
                  
               </div>
               
            </div>
            <div class="modal-footer bg-whitesmoke">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-info">Save</button>
            </div>
            </div>
         </form>
      </div>
   </div>
   @endforeach
@endsection

@push('autorefresh')
<script type="text/javascript">
   window.setTimeout( function() {
       window.location.reload();
   }, 300000);
</script>
@endpush
