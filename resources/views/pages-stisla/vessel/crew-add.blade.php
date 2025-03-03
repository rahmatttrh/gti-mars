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

      <a href="{{route('vessel.crew')}}" class="btn btn-primary">Back</a>
      <hr>
      <div class="row">
         <div class="col-md-7">
            <form action="{{ route('vessel.crew.store') }}" method="POST" enctype="multipart/form-data">
               @csrf
               
                  <div class="form-row">
                     <div class="form-group col-md-7">
                        <label>Designation</label>
                        <select class="custom-select" id="designation"  required name="designation">
                           <option disabled selected>Choose one</option>
                           @foreach ($designations as $desig)
                           <option value="{{$desig->id}}">{{$desig->name}}</option>
                           @endforeach
                           
                        </select>
                     </div>
                     <div class="form-group col-md-5">
                        <label>Shift</label>
                        <select class="custom-select" id="shift"  required name="shift">
                           <option disabled selected>Choose one</option>
                           
                           <option value="1">1</option>
                           <option value="2">2</option>
                           
                        </select>
                     </div>
                  </div>
                  
      
                  <div class="form-row qty">
                     <div class="form-group col-md-12">
                        <label for="name">Name</label>
                        <input class="form-control mb-2" id="name" type="text"  value="{{ old('name') }}" name="name">
                     </div>
                  </div>
      
                 
                  <button class="btn btn-info" type="submit">Add</button>
               
            </form>
         </div>
      </div>
      
   <hr>
   <small>Please pay attention to the alert table on the right</small>

</div>
</section>
@endsection
