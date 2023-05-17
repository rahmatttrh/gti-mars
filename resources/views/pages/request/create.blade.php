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
         <div class="card">
            <form action="{{route('request.store')}}" method="POST">
               @csrf
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-8">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-floating mb-3">
                                 <select name="activity" id="activity" class="form-select">
                                    <option value="" selected disabled >Choose Activity</option>
                                    @foreach ($activities as $activity)
                                       <option value="{{$activity->id}}">{{$activity->name}}</option>
                                    @endforeach
                                 </select>
                                 <label for="activity">Activity</label>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-floating mb-3">
                                 <input type="text" class="form-control" id="desc" name="desc" >
                                 <label for="desc">Description</label>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-floating">
                                 <input type="date" required class="form-control" id="date" name="date" >
                                 <label for="date">Departure Date</label>
                              </div>
                           </div>
                           <div class="col-md-4">
                              <div class="form-floating">
                                 <select required name="origin" id="origin" class="form-select">
                                    @foreach ($ports as $port)
                                       <option value="{{$port->id}}">{{$port->name}}</option>
                                    @endforeach
                                 </select>
                                 <label for="origin">From</label>
                              </div>
                           </div>
                           <div class="col-md-4 mb-3">
                              <div class="form-floating">
                                 <select required name="destination" id="destination" class="form-select">
                                    @foreach ($ports as $port)
                                       <option value="{{$port->id}}">{{$port->name}}</option>
                                    @endforeach
                                 </select>
                                 <label for="destination">Destination</label>
                              </div>
                           </div>
                        </div>
                        
                        
                     </div> 
                     
                     <div class="col-md-4">
                        <div class="card">
                           {{-- <div class="card-header">
                           <small class="">Information</small>
                           </div> --}}
                           <div class="card-body text-center">
                              <img height="140px" width="auto" src="{{asset('img/draw/task.png')}}" alt="">
                           </div>
                           <div class="card-footer">
                              <small>Hint : If the Activity option is not in the List, you can fill in the Form Description, or you can fill in both</small>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card-footer">
                  <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                           
                     Save
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