@extends('layouts.stisla.app')
@section('title')
    Incoming Crew Change 
@endsection
@section('content')
<section class="section">
   
   <div class="section-body">
      <div class="row">
         <div class="col-md-4">
            <h3>CREW CHANGE</h3>
            <hr>
         </div>
         <div class="col-md-8 d-flex justify-content-end">
            <form action="{{route('intermilan.filter')}}" method="POST">
               @csrf
               <div class="form-group">
                  <div class="input-group">
                     <select class="form-control " required name="month" id="month" style="width: 130px">
                        <option {{$month == 1 ? 'selected' : ''}} value="1">Januari</option>  
                        <option {{$month == 2 ? 'selected' : ''}} value="2">Februari</option> 
                        <option {{$month == 3 ? 'selected' : ''}} value="3">Maret</option> 
                        <option {{$month == 4 ? 'selected' : ''}} value="4">April</option> 
                        <option {{$month == 5 ? 'selected' : ''}} value="5">Mei</option> 
                        <option {{$month == 6 ? 'selected' : ''}} value="6">Juni</option> 
                        <option {{$month == 7 ? 'selected' : ''}} value="7">Juli</option> 
                        <option {{$month == 8 ? 'selected' : ''}} value="8">Agustus</option> 
                        <option {{$month == 9 ? 'selected' : ''}} value="9">September</option> 
                        <option {{$month == 10 ? 'selected' : ''}} value="10">Oktober</option> 
                        <option {{$month == 11 ? 'selected' : ''}} value="11">November</option> 
                        <option {{$month == 12 ? 'selected' : ''}} value="12">Desember</option> 
                     </select>
                     <select class="form-control " required name="year" id="year" style="width: 90px">
                        <option {{$year == 2024 ? 'selected' : ''}} value="2024">2024</option>  
                        <option {{$year == 2023 ? 'selected' : ''}} value="2023">2023</option> 
                        <option {{$year == 2022 ? 'selected' : ''}} value="2022">2022</option> 
                     </select>
                  <div class="input-group-append">
                     <button class="btn btn-light border btn-block " type="submit">Show</button>
                  </div>
                  </div>
               </div>
            </form>

            <div class="form-group">
               <a href="" target="_blank" class="btn btn-light shadow-sm  ml-1" data-toggle="tooltip" data-placement="top" title="Export PDF"><i class="fa fa-print"></i> </a>
            </div>
            
            
         </div>
      </div>
      <div class="row">
         <div class="col-2">
            <div class="badge badge-info mb-2">Create Schedule Plan</div>
            <form action="{{route('schedule.store.crew.change')}}" method="POST">
               @csrf
               <select name="vessel" id="vessel" class="form-control mb-2">
                     
                  <option value="6">Sigap Jaya</option>
                  <option value="36">Tegas Jaya</option>
               </select>
               <input type="text" name="func" id="func" class="form-control mb-2">
               <input type="date" class="form-control" name="date" id="date" >
               <hr>
               <button class="btn btn-lg btn-light border btn-block " type="submit">Create</button>
            </form>
         </div>
         
         <div class="col-10">
            
            <div class="badge badge-info mb-2">Incoming Request Crew Change</div>
            <div class="table-responsive">
               <table class=" table-striped " >
                  <thead>
                     
                     <tr>
                        <th  class="text-center">Date</th>
                        <th >Destination</th>
                        <th >User</th>
                        <th >Pax  Onduty</th>
                        <th >Pax  Offduty</th>

                     </tr>
                     
                  </thead>
                  <tbody>

                     @foreach ($requests as $req)
                         <tr>
                           <td><a href="{{route('request.detail.new', enkripRambo($req->id))}}">{{formatDayName($req->date)}}, {{formatDate($req->date)}}</a></td>
                           <td>{{$req->origin->name}} -  {{$req->destination->name}}</td>
                           <td>{{$req->description}}</td>
                           <td>{{count($req->passengerItems->where('type', 'Departure'))}}</td>
                           <td>{{count($req->passengerItems->where('type', 'Return'))}}</td>
                           
                         </tr>
                     @endforeach

                  </tbody>
               </table>
            </div>
            <hr>
            
            
            
            <div class="table-responsive">
               <table class=" table-striped " >
                  <thead>
                     
                     <tr>
                        <th rowspan="2" class="text-center">Date</th>
                        <th rowspan="2">Destination</th>
                        <th rowspan="2">Func</th>
                        <th rowspan="2">Pax <br> Onduty</th>
                        <th rowspan="2">Pax <br> Offduty</th>
                        <th rowspan="2">Boat</th>
                        <th rowspan="2">Cap. Pax</th>
                        <th colspan="2" class="text-center">Time of Movement</th>
                        <th rowspan="2">Remark</th>

                     </tr>
                     <tr>
                        <th>Depart KJ4</th>
                        <th>Arrived KJ4</th>
                     </tr>
                  </thead>
                  <tbody>

                     @foreach ($schedules as $sche)
                         <tr>
                           <td><a href="{{route('schedule.detail', enkripRambo($sche->id))}}">{{formatDayName($sche->date)}}, {{formatDate($sche->date)}}</a></td>
                           <td>{{$sche->requests->first()->origin->name}} -  {{$sche->requests->first()->destination->name}}</td>
                           <td>{{$sche->description}}</td>
                           <td>{{$sche->total_depart}}</td>
                           <td>{{$sche->total_return}}</td>
                           <td>{{$sche->vessel->name ?? '-'}}</td>
                           <td>150</td>
                           <td>-</td>
                           <td>-</td>
                           <td>-</td>
                         </tr>
                     @endforeach

                  </tbody>
               </table>
            </div>
            
         </div>
      </div>

      
</section>
    
@endsection