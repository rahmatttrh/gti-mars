@extends('layouts.stisla.app-main')
@section('title')
   Crew List
@endsection

@section('content')
   <section class="section">
      <div class="section-body">
<style>
   table {
      width: 100%;
   }

   table, th, td {
      border: 1px solid rgb(226, 218, 218);
      border-collapse: collapse;
   }
   th, td {
      padding-left: 5px
   }
</style>

      <a href="{{route('vessel.crew.add')}}" class="btn btn-primary">Add New</a>
      <hr>
      <div class="row">
         
         <div class="col-md-6">
            {{-- <div class="badge badge-info">DSP</div> --}}
            
            
            <div class="table-responsive">
               <table class="" id="">
                  <thead >
                     <tr class="bg-primary text-white">
                        <th colspan="4" class="py-1">Shift 1</th>
                     </tr>
                     <tr>
                        {{-- <th class="text-center">No</th> --}}
                        <th>Designation</th>
                        <th>Name</th>
                        
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($crews->where('shift', 1) as $crew)
                     <tr>
                        <td style="width: 150px">{{$crew->designation->name}}</td>
                        <td>{{$crew->name}}</td>
                     </tr>
                     @endforeach
                     
                  </tbody>
               </table>
            </div>
            
            {{--  --}}
         </div>

         <div class="col-md-6">
            {{-- <div class="badge badge-info">DSP</div> --}}
            
            
            <div class="table-responsive">
               <table class="" id="">
                  <thead >
                     <tr>
                        <th colspan="4" class="py-1">Shift 2</th>
                     </tr>
                     <tr>
                        {{-- <th class="text-center">No</th> --}}
                        <th>Designation</th>
                        <th>Name</th>
                        
                     </tr>
                  </thead>
                  <tbody>
                     
                  </tbody>
               </table>
            </div>
            
            {{--  --}}
         </div>
         
      </div>
   <hr>
   <small>Please pay attention to the alert table on the right</small>

</div>
</section>
@endsection
