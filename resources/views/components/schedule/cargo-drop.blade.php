{{-- <div class="card shadow-sm border">
                  
   <div class="card-body"> --}}
      <ul class="nav nav-tabs" id="myTab" role="tablist">
         <li class="nav-item">
            <a class="nav-link {{$schedule->class == 'Cargo' ? 'active' : ''}}" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Cargo</a>
         </li>
         
         
      </ul>
      <div class="tab-content" id="myTabContent">
         <div class="tab-pane fade {{$schedule->class == 'Cargo' ? 'show active' : ''}}" id="home" role="tabpanel" aria-labelledby="home-tab">
            
            <div class="row">
               <div class="col-md-6">
                  {{-- <a href="{{route('schedule.detail', enkripRambo($schedule->id))}}" class="btn btn-light border  mb-2">
                     <i class="fa fa-backward"></i>
                     Back
                  </a> --}}
                  <table class="border">
                     <thead>
                        <tr class="border">
                           <th colspan="2" class="py-1 bg-grey text-white">DROP CARGO</th>
                           {{-- <th><a href="">BACK</a></th> --}}
                        </tr>
                     </thead>
                     <tbody>
                        <tr class="border">
                           <td colspan="2">MTD No. {{$item->mtd}}</td>
                        </tr>
                        <tr class="border">
                           <td colspan="2">{{$item->description}}</td>
                        </tr>
                        <tr class="border">
                           <td colspan="2">PO {{$item->contract}}</td>
                        </tr>
                        <tr class="border">
                           <td colspan="">{{$item->qty}} {{$item->unit}}</td>
                           <td>{{$item->weight}} Ton</td>
                        </tr>
                        
                     </tbody>
                  </table>
               </div>
               <div class="col-md-6">
                  <form action="{{route('cargo.item.offloading')}}" method="POST" >
                     @csrf
                     <input type="number" name="cargoItem" id="cargoItem" value="{{$item->id}}" hidden>
                     <div class="form-group">
                        <div class="input-group">
                           <div class="input-group-prepend">
                              <div class="input-group-text">Drop Value</div>
                           </div>
                           <input type="number" class="form-control" id="offloading" name="offloading" max="{{$item->qty}}" >
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="input-group">
                        <div class="input-group-prepend">
                           <div class="input-group-text">Sisa dialihkan ke</div>
                        </div>
                        <select style="width: 120px" required class="form-control" name="destination" id="destination">
                           <option selected disabled>Choose</option>
                           @foreach ($routes as $route)
                              <option value="{{$route->port->id}}">{{$route->port->code}}</option>  
                           @endforeach
                        </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="input-group">
                           <div class="input-group-prepend">
                              <div class="input-group-text">Desc</div>
                           </div>
                           <input type="text" class="form-control" id="desc" name="desc" >
                        </div>
                     </div>
                     <hr>
                     <button type="submit" class="btn btn-light border">Submit</button>
                  </form>
               </div>
            </div>
            
         </div>
         
      </div>
   {{-- </div>
</div> --}}


@push('get_schedules')
   <script>
      console.log('get_schedules function');
      $(".file-cargo").hide();
      $(".file-crew").hide();
      $(".barge").hide();
      $(".platform").hide();
      $(".qty").hide();
      $('#activity').change(function() {
         var activity = $(this).val();
         console.log(activity)
         if (activity == 1) {
            $(".file-cargo").hide();
            $(".file-crew").hide();
            $(".barge").hide();
            $(".destination").show();
            $(".qty").hide();
         } else if (activity == 2) {
            $(".barge").hide();
            $(".file-cargo").hide();
            $(".file-crew").hide();
            $(".destination").show();
            $(".platform").hide();
            $(".port").show();
            $(".qty").hide();
         } else if (activity == 3) {
            $(".file-cargo").hide();
            $(".file-crew").hide();
            $(".barge").show();
            $(".destination").show();
            $(".platform").show();
            $(".port").hide();
            $(".qty").hide();
         } else if (activity == 5 || activity == 6) {
            $(".file-cargo").hide();
            $(".file-crew").hide();
            $(".barge").hide();
            $(".route").hide();
            $(".platform").hide();
            $(".port").hide();
            $(".qty").show();
         }else {
            $(".file-cargo").hide();
            $(".file-crew").hide();
            $(".barge").hide();
            $(".destination").show();
         }
      })


      $(document).ready(function() {
         $('.origin').change(function() {
            $('.result').empty()
            $('.near').empty()
            var origin = $('#origin').val();
            var date = $('#date').val();
            var _token = $('meta[name="csrf-token"]').attr('content');

            console.log('origin:' + origin + ' date:' + date);

            $.ajax({
               url: "/fetch/schedule/" + date + "/" + origin,
               method: "GET",
               dataType: 'json',

               success: function(result) {
                  console.log('near :' + result.near);
                  console.log('result :' + result.result);
                  console.log('log :' + result.log);
                  $.each(result.result, function(i, index) {
                     $('.result').html(result.result);

                  });
                  $.each(result.near, function(i, index) {

                     $('.near').html(result.near);
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