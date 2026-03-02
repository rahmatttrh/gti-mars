@extends('layouts.app-doc')
@section('title')
   VDR - Preview {{$vdr->code}}
@endsection
@section('content')
<style>

 html { -webkit-print-color-adjust: exact; }
   table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}

.ttd {
   font-size: 7px;
}

table td {
  font-size: 6px
}

.title {
  font-size: 6px;
  font-weight: bold;
}

table th {
   font-weight: bold;
}

table {
   width: 100%;
}

.bg-yellow {
   background-color: rgb(247, 247, 183)
}

.bg-lgray{
   background-color: rgb(236, 237, 238)
}

table th tr td {
   background-color: rgb(236, 237, 238)
}
</style>

<div class="page-body bg-white d-flex justify-content-center" >
   <div>
      @if (session('danger'))
      <div class="alert alert-danger mx-3" style="width: 400px">
         {{ Session::get('danger') }}
      </div>
      
   @endif
   

<div class="card mx-3" style="width: 400px">
   <div class="card-header">
      Input VDR PIN untuk membuka detail VDR
   </div>
   <div class="card-body">
      <form action="{{route('vdr.pin.check.pdf')}}" method="POST">
         @csrf
         <input type="number" id="vdrId" name="vdrId" value="{{$vdr->id}}" hidden>
         <div class="form-group col-md-12">
            <label for="pin" class="label mb-2">Input PIN</label>
            <input type="password" class="form-control text-left" id="pin" name="pin" required >
         </div>
      
      
      
      <button type="submit" class="btn btn-primary mt-4">OPEN</button>
      </form>
   </div>
</div>
   </div>
   
     

   
</div>




@endsection