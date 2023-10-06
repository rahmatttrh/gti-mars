@extends('layouts.app')
@section('title')
   Create Request Activity
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
                  Create Request Activity
               </h2>
            </div>
         </div>
      </div>
   </div>
   <div class="page-body" >
      <div class="container-xl">
         <div class="row">
            <div class="col-md-6">
               <div class="card">
                  <form action="{{route('request.store')}}" method="POST">
                     @csrf
                     <div class="card-body">
                              @if ($errors->any())
                                 <div class="alert alert-danger text-danger">
                                    <ul>
                                          @foreach ($errors->all() as $error)
                                             <li><small>{{ $error }}</small></li>
                                          @endforeach
                                    </ul>
                                 </div>
                              @endif
                              <div class="row">
                                 <div class="col-md-8">
                                    <div class="form-floating mb-3">
                                       <select name="activity" id="activity" required class="form-select">
                                          <option value="" selected disabled >Choose</option>
                                          @foreach ($activities as $activity)
                                             <option {{ old('activity') == $activity->id ? 'selected' : ''}} value="{{$activity->id}}">{{$activity->name}}</option>
                                          @endforeach
                                       </select>
                                       <label for="activity">Type of Activity(*)</label>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-floating">
                                       <input type="date" required value="{{old('date')}}" class="form-control date" id="date" name="date" >
                                       <label for="date"> Date(*)</label>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                       <input type="text" value="{{old('bcm')}}" class="form-control" id="bcm" name="bcm" >
                                       <label for="bcm">BCM</label>
                                    </div>
                                 </div>
                                 
                                 
                                 <div class="col-md-4">
                                    <div class="form-floating">
                                       <select required name="origin" id="origin" class="form-select">
                                          <option  disabled selected>Choose port</option>
                                          @foreach ($ports as $port)
                                             <option {{ old('origin') == $port->id ? 'selected' : ''}} value="{{$port->id}}">{{$port->name}}</option>
                                          @endforeach
                                       </select>
                                       <label for="origin">From(*)</label>
                                    </div>
                                 </div>
                                 <div class="col-md-4 mb-3">
                                    <div class="form-floating">
                                       <select required name="destination" id="destination" class="form-select">
                                          <option  disabled selected>Choose port</option>
                                          @foreach ($ports as $port)
                                             <option {{ old('destination') == $port->id ? 'selected' : ''}} value="{{$port->id}}">{{$port->name}}</option>
                                          @endforeach
                                       </select>
                                       <label for="destination">Destination(*)</label>
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                       <input type="text" value="{{old('desc')}}" class="form-control" id="desc" name="desc" >
                                       <label for="desc">Description</label>
                                    </div>
                                 </div>
                              </div>
                              
                              <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                                 
                                 Save
                              </button>
                           
                     </div>
                     <div class="card-footer">
                        
                        (*) Required
                     </div>
                  </form>
               </div>
            </div>
            <div class="col-md-6">
               <div class="card">
                  <div class="card-header">
                     Available Schedules
                  </div>
                  <div class="table-responsive">
                     <table class="table table-vcenter card-table table-striped">
                        <thead>
                           <tr>
                              <th>Date</th>
                              <th>Vessel</th>
                              <th>Type</th>
                              <th>Space</th>
                           </tr>
                        </thead>
                        <tbody id="result" class="result">
                           {{-- <tr>
                              <td>19/09/23</td>
                              <td>
                                 ELOK JAYA
                              </td>
                              <td>80</td>
                              
                           </tr> --}}
                         
                        </tbody>
                     </table>
                  </div>
               </div>
               {{-- <div class="card">
                  <div class="card-header">
                     <h3 class="card-title">Available Schedules</h3>
                   </div>
                  <div class="list-group list-group-flush list-group-hoverable list">
                     <div class="list-group-item">
                        <div class="row align-items-center">
                           <div class="col text-truncate">
                              <a href="#" class="text-body d-block">Paweł Kuna</a>
                              <small class="d-block text-muted text-truncate mt-n1">Change deprecated html tags to text decoration classes (#29604)</small>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card">
                  <div class="card-header">
                  <small class="">Information</small>
                  </div>
                  <div class="card-body text-center">
                     <img height="140px" width="auto" src="{{asset('img/draw/task.png')}}" alt="">
                  </div>
                  <div class="card-footer">
                     <small>Hint : If the Activity option is not in the List, you can contact Marine Department to add new one</small>
                  </div>
               </div> --}}
            </div> 
         </div>
       </div>
   </div>

@endsection

@push('get_schedules')
   <script>
      console.log('get_schedules function');
   
      $(document).ready(function() {
         $('.date').change(function() {
            var value = $(this).val();
               var _token = $('meta[name="csrf-token"]').attr('content');

               console.log(value);

               $.ajax({
                  url: "/fetch/schedule/"  + value ,
                  method: "GET",
                  dataType: 'json',

                  success: function(result) {
                     $('.result').empty()
                     console.log(result);
                     $.each(result.result, function(i, index) {
                        $('.result').html(result.result);
                     });
                  },
                  error: function(error) {
                     console.log(error)
                  }

               })
         })
      })
   </script>
@endpush