@extends('layouts.app')
@section('title')
   Edit Schedule
@endsection
@section('content')
   <div class="container-xl">
      <!-- Page title -->
      <div class="page-header d-print-none">
         <div class="row align-items-center">
            <div class="col">
            <!-- Page pre-title -->
               <div class="page-pretitle">
                  Form
               </div>
               <h2 class="page-title">
                  Edit Schedule
               </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
               <div class="btn-list">
               
               
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="page-body" >
      <div class="container-xl">
         <div class="card">
            <form action="{{route('schedule.update')}}" method="POST">
               @csrf
               @method('PUT')
               <input type="number" name="schedule" id="schedule" value="{{$schedule->id}}" hidden>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-8">
                        <div class="row">
                           <div class="col-md-8">
                              <div class="form-floating mb-3">
                                 <select required name="vessel" id="vessel" class="form-select">
                                    <option  disabled selected>Choose</option>
                                    @foreach ($vessels as $vessel)
                                       <option {{$schedule->vessel_id == $vessel->id ? 'selected' : ''}} value="{{$vessel->id}}">{{$vessel->name}}</option>
                                    @endforeach
                                    
                                 </select>
                                 <label for="vessel">Boat</label>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-floating mb-3">
                                 <input type="date" value="{{$schedule->date}}" required class="form-control" id="date" name="date" >
                                 <label for="date">Date</label>
                              </div>
                           </div>
                        </div>
                        
                        <div class="row">
                           {{-- <div class="col-md-8">
                              <div class="form-floating">
                                 <select required name="origin" id="origin" class="form-select">
                                    <option  disabled selected>Choose port</option>
                                    @foreach ($ports as $port)
                                       <option {{$schedule->origin_id == $port->id ? 'selected' : ''}} value="{{$port->id}}">{{$port->name}}</option>
                                    @endforeach
                                    
                                 </select>
                                 <label for="origin">From</label>
                              </div>
                           </div> --}}
                           {{-- <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <select required name="destination" id="destination" class="form-select">
                                    <option  disabled selected>Choose port</option>
                                    @foreach ($ports as $port)
                                       <option {{$schedule->destination_id == $port->id ? 'selected' : ''}} value="{{$port->id}}">{{$port->name}}</option>
                                    @endforeach
                                    
                                 </select>
                                 <label for="origin">Destination</label>
                              </div>
                           </div> --}}
                           {{-- <div class="col-md-4">
                              <div class="form-floating mb-3">
                                 <input type="datetime-local" value="{{$schedule->etd}}" required class="form-control" id="departure_estimasi" name="departure_estimasi" >
                                 <label for="departure_estimasi">Estimasi Keberangkatan</label>
                              </div>
                           </div> --}}
                           {{-- <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="datetime-local" value="{{$schedule->eta}}" required class="form-control" id="arrive_estimasi" name="arrive_estimasi" >
                                 <label for="arrive_estimasi">Estimasi Kedatangan</label>
                              </div>
                           </div> --}}
                           <div class="col-md-12">
                              <div class="form-floating mb-3">
                                 <input type="text"  value="{{$schedule->remark}}" class="form-control" id="remark" name="remark" >
                                 <label for="remark">Remark</label>
                              </div>
                           </div>
                        </div>
                     </div>
                     
                     <div class="col-md-4">
                        <div class="card">
                           <div class="card-header">
                           <small class="">Reserved</small>
                           </div>
                           <div class="list-group list-group-flush overflow-auto" id="reserved" style="max-height: 12rem">
                              
                              <div class="list-group-item">
                                 <div class="row">
                                    <div class="col text-truncate">
                                       <small>Schedule will show here</small>
                                    </div>
                                 </div>
                              </div>
                              
                              {{-- <div class="list-group-item">
                                 <div class="row">
                                    <div class="col text-truncate">
                                       <a href="#" class="text-body d-block">09:00 - 10:00</a>
                                       <div class="text-muted text-truncate mt-n1 text-uppercase">Giat Jaya</div>
                                    </div>
                                 </div>
                              </div>
                              <div class="list-group-item">
                                 <div class="row">
                                    <div class="col text-truncate">
                                       <a href="#" class="text-body d-block">09:00 - 10:00</a>
                                       <div class="text-muted text-truncate mt-n1 text-uppercase">Giat Jaya</div>
                                    </div>
                                 </div>
                              </div>
                              <div class="list-group-item">
                                 <div class="row">
                                    <div class="col text-truncate">
                                       <a href="#" class="text-body d-block">09:00 - 10:00</a>
                                       <div class="text-muted text-truncate mt-n1 text-uppercase">Giat Jaya</div>
                                    </div>
                                 </div>
                              </div>
                              <div class="list-group-item">
                                 <div class="row">
                                    <div class="col text-truncate">
                                       <a href="#" class="text-body d-block">09:00 - 10:00</a>
                                       <div class="text-muted text-truncate mt-n1 text-uppercase">Giat Jaya</div>
                                    </div>
                                 </div>
                              </div>
                              <div class="list-group-item">
                                 <div class="row">
                                    <div class="col text-truncate">
                                       <a href="#" class="text-body d-block">09:00 - 10:00</a>
                                       <div class="text-muted text-truncate mt-n1 text-uppercase">Giat Jaya</div>
                                    </div>
                                 </div>
                              </div> --}}
                           </div>
                           <div class="card-footer">
                              <small class="text-muted">Silahkan memilih waktu Docking dan Departure selain waktu diatas</small>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card-footer">
                  <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><circle cx="12" cy="14" r="2" /><polyline points="14 4 14 8 8 8 8 4" /></svg>
                     Update
                  </button>
               </div>
            </form>
         </div>
       </div>
   </div>

@endsection

@push('ports')
   <script>
      console.log('ok mantap');
   
      $(document).ready(function() {
         $('#origin').change(function() {
            if ($(this).val() != '') {
               var value = $(this).val();
               var _token = $('meta[name="csrf-token"]').attr('content');

               console.log(value);

               $.ajax({
                     // console.log(dependent);
                     url: "/fetch/jetty/" + value,
                     method: "GET",
                     dataType: 'json',

                     success: function(result) {
                        console.log(result.result);
                        $.each(result.result, function(i, index) {
                           $('#jetty').html(result.result);
                        });
                     },
                     error: function(error) {
                        console.log(error)
                     }

               })
            }
         })

   

         $('#jetty').change(function() {
            $('#reserved').html(`<div class="list-group-item">
                              <div class="row">
                                 <div class="col text-truncate">
                                    <small>Schedule empty</small>
                                 </div>
                              </div>
                           </div>`);
            if ($(this).val() != '') {
               var date = $('#date').val();
               var jetty = $(this).val();
               var _token = $('meta[name="csrf-token"]').attr('content');

               console.log(date);

               $.ajax({
                     // console.log(dependent);
                     url: "/fetch/schedule/" + date + "/" + jetty,
                     method: "GET",
                     dataType: 'json',

                     success: function(result) {
                        console.log(result.result);
                        if (result.result) {
                           $.each(result.result, function(i, index) {
                           $('#reserved').html(result.result);
                        });

                        } else{
                           $('#reserved').html('kosong');
                        }
                        

                     },
                     error: function(error) {
                        console.log(error)
                        $('#reserved').html(`<div class="list-group-item">
                              <div class="row">
                                 <div class="col text-truncate">
                                    <small>Schedule empty</small>
                                 </div>
                              </div>
                           </div>`);
                     }

               })
            }
         })
      })
   </script>
@endpush