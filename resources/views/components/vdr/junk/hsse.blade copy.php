<div class="card">
   <div class="card-header d-flex justify-content-between">
      <b>HSSE</b>
   </div>
   <form action="{{route('vdr.update.hse')}}" method="post">
      @csrf
      @method('PUT')
   <div class="card-body py-0">
      {{-- <div class="table-responsive"> --}}
         <table class="table table-striped table-sm">
            <thead>
               <tr>
                   <th class="text-center">A</th>
                   <th>HSSE STATISTICS (INPUT)</th>
                   <th>Previous</th>
                   <th>Today</th>
                   <th>Monthly</th>
               </tr>
           </thead>
           <tbody>
               

                   <input type="hidden" name="vdr_id" value="{{$vdr->id}}">
                   @php
                   $groupHeader = 'A';
                   $no = 1;
                   @endphp

                   @foreach ($hses as $hse)
                   <input type="hidden" name="id[]" value="{{$hse->id}}">
                   @if($hse->header->group_header != $groupHeader)
                   <thead>
                       <tr>
                           <th class="text-center">B</th>
                           <th>HSSE STATISTICS (Output)</th>
                           <th>Previous</th>
                           <th>Today</th>
                           <th>Monthly</th>
                       </tr>
                   </thead>

                   @php
                   $no = 1;
                   @endphp

                   @endif
                   <tr>
                       <td>{{ $no++}}</td>
                       <td>{{$hse->header->description}}</td>
                       @if($hse->header_id != 8)
                       <td>
                           <input type="number" name="previous[]" class="form-control" value="{{$hse->previous}}">
                       </td>
                       <td>
                           <input type="number" name="today[]" class="form-control" value="{{$hse->today}}">
                       </td>
                       <td>
                           <input type="text" name="monthly[]" class="form-control" value="{{$hse->previous + $hse->today}}" readonly>
                       </td>
                       @else
                       <input type="hidden" name="previous[]" class="form-control" value="{{$hse->previous}}">
                       <input type="hidden" name="today[]" class="form-control" value="{{$hse->today}}">
                       <input type="hidden" name="monthly[]" class="form-control" value="{{$hse->today}}" readonly>
                       <td colspan="3"></td>
                       @endif
                   </tr>

                   @php
                   $groupHeader = $hse->header->group_header
                   @endphp
                   @endforeach

         
               
           </tbody>
         </table>
     {{-- </div> --}}
   </div>
   <div class="card-footer">
      <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Save</button>
   </div>
   </form>
</div>