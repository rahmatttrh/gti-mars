@extends('layouts.stisla.app-vdr')
@section('title')
    Log Activity VDR
@endsection
@section('content')
<section class="section">
   <div class="section-header">
      <h1 class="section-title">Log Activity VDR</h1>
      <div class="section-header-breadcrumb">
         <div class="breadcrumb-item "><a href="#">Dashboard</a></div>
         <div class="breadcrumb-item active">Log Activity VDR</div>
      </div>
   </div>

   <div class="section-body">
      {{-- <h2 class="section-title">Schedule Plan</h2>
      <p class="section-lead">
         We use 'DataTables' made by @SpryMedia. You can check the full documentation <a href="https://datatables.net/">here</a>.
      </p> --}}

      <div class="row">
         <div class="col-8">
            <div class="card">
            {{-- <div class="card-header">
               <h4>Basic DataTables</h4>
            </div> --}}
            <div class="card-body">
               <div class="table-responsive">
                  <table  class="table table-sm" id="table-1">
                  <thead>                                 
                     <tr>
                        <th class="text-center">
                        #
                        </th>
                        <th>User</th>
                        <th>Action</th>
                        <th>Desc</th>
                        <th>Time</th>
                        {{-- <th class="text-center">Weight</th> --}}
                        {{-- <th></th> --}}
                     </tr>
                  </thead>
                  <tbody>     
                     @foreach ($logs as $log)
                        <tr>
                           <td class="text-center">{{++$i}}</td>
                           <td>{{$log->user->name}}</td>
                           <td>{{$log->action}}</td>
                           <td>{{$log->desc}}</td>
                           <td>{{formatDateTime($log->created_at)}}</td>
                        </tr>
                     @endforeach
                  </tbody>
                  </table>
               </div>
            </div>
            </div>
         </div>
         <div class="col-md-4">
            <div class="card">
               <div class="card-header">
                  @if ($filter == true)
                     @if ($selectedVessel)
                     Log Activity of {{$selectedVessel->name}} from {{formatDate($start)}} to {{formatDate($end)}}
                     @else Log Activity of All Vesel from {{formatDate($start)}} to {{formatDate($end)}}
                     @endif
                      
                      @else
                      All Data
                  @endif
               </div>
               <div class="card-body">
                  <form action="{{route('log.vdr.filter')}}" method="POST">
                     @csrf
                     <div class="form-group">
                        <select class="form-control " required name="vessel" id="vessel">
                           <option value="all" selected>All Vessel</option>
                           @foreach ($vessels as $vess)
                              <option  value="{{$vess->id}}">{{$vess->name}}</option> 
                           @endforeach
                        </select>
                     </div>
                     <div class="form-group">
                        <div class="input-group">
                           
                           
                           <input type="date" name="start" id="start" class="form-control">
                           <span class="mx-2 mt-3">To</span>
                           <input type="date" name="end" id="end" class="form-control">
                           
                        </div>
                     </div>
                     <button class="btn btn-primary px-4" type="submit">Show</button>
                     {{-- <button class="btn btn-primary btn-block" type="submit">Filter</button> --}}
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
    
@endsection