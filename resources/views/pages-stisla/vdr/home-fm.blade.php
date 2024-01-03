@extends('layouts.stisla.app')
@section('title')
    Dashboard
@endsection
@section('content')
   <section class="section">
      <div class="row">
         <div class="col-md-3">
            <div class="card card-statistic-2 border">
               <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-user"></i>
               </div>
               <div class="card-wrap">
                  <div class="card-header">
                     <h4>Name</h4>
                  </div>
                  <div class="card-body">{{$user->name}} </div>
               </div>
            </div>
            <div class="card border">
               <div class="card-body">
                  <small>Progress Request</small><br>
                  {{-- <b>{{$requests->where('status', '>', 0)->count()}} </b> --}}
                  <hr>
                  <small>Complete Request</small><br>
                  {{-- <b>{{$requests->where('status', 12)->count()}} </b> --}}
               </div>
            </div>
            
         </div>
         <div class="col-md-9">
            
            {{-- @if ($confirms->count() > 0)
               @foreach ($confirms as $confirm)
                  <div class="alert alert-primary" role="alert">
                     You have a Arrival Cargo from {{$confirm->origin->name}}. Click <a href="{{route('schedule.detail', enkripRambo($confirm->schedule_id))}}" class="alert-link">here</a> to see detail.
                  </div>
               @endforeach
            @endif --}}
            <div class="card">
               <div class="card-header">
                  <h4>Incoming Fuel Request</h4>
               </div>
               

               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table table-striped table-sm" id="table-13">
                        <thead>                                 
                           <tr>
                              <th>#</th>
                              <th>ID</th>
                              <th>Date</th>
                              <th>User</th>
                              <th>Qty / Approve </th>
                              <th>Status</th>
                              <th></th>
                           </tr>
                        </thead>
                        <tbody>     
                           @if ($requests->count() > 0)
                              @foreach ($requests as $req)
                              <tr>
                                 <td>{{++$i}}</td>
                                 <td>{{$req->code}}</td>
                                 <td>{{formatDate($req->date)}}</td>
                                 <td>{{$req->user->name}}</td>
                                 <td>{{$req->qty}} / {{$req->qty_approve}}</td>
                                 <td><x-status-stisla.request :request="$req" /> </td>
                                 <td>
                                    @if ($req->status == 101)
                                    <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#fuel-approve-{{$req->id}}">Approve</a>
                                    @endif
                                    
                                    <a href="{{route('request.detail', enkripRambo($req->id))}}" class="btn btn-sm btn-primary">Detail</a>
                                 </td>
                              </tr>
                              @endforeach
                              @else
                              <tr>
                                 <td colspan="7" style="text-align: center"><small>Empty</small></td>
                              </tr>
                           @endif
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
        
         </div>

         
      </div>
      
   </section>

   @foreach ($requests as $req)
   {{-- <div class="modal fade" id="fuel-approve-{{$schedule->id}}" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Fuel Approve</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               Approve {{$schedule->code}}?
            </div>
            <div class="modal-footer bg-whitesmoke">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <a href="{{route('schedule.send', enkripRambo($schedule->id))}}" class="btn btn-primary">Approve</a>
            </div>
         </div>
      </div>
   </div> --}}
   <div class="modal fade" id="fuel-approve-{{$req->id}}" tabindex="7" role="dialog"  aria-hidden="true">
      <div class="modal-dialog" role="document">
         <form action="{{route('fuel.approve')}}" method="POST">
            @csrf
            @method('PUT')
            <input type="number" name="requestId" id="requestId" value="{{$req->id}}" hidden>
            <div class="modal-content">
               <div class="modal-header">
                  <div class="modal-title">Fuel Approve</div>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label for="qty">Qty Request</label>
                     <input type="text" required class="form-control" id="qty"  readonly name="qty" value="{{$req->qty}}" >
                  </div>
                  <div class="form-group col-md-6">
                     <label for="qty_approve">Qty Approve</label>
                     <input type="text" required class="form-control" id="qty_approve" name="qty_approve" max="{{$req->qty}}" >
                  </div>
               </div>
               </div>
               <div class="modal-footer bg-whitesmoke">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Approve</button>
               </div>
            </div>
         </form>
      </div>
   </div>

   @endforeach
@endsection

