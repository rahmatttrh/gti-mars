{{-- <div class="card  bg-primary-gradient ">
   <div class="card-body">
      <div class="d-flex">
         <div>
            <h5 class="mt-1 b-b1 pb-2 mb-3 badge badge-light">
               
                   Active
              
            </h5>
            <h5 class="mt-1 b-b1 pb-2 mb-3 badge badge-light">
                Days On Board
            </h5>
         </div>
         <h5 class="mt-1 b-b1 pb-2 mb-3 badge badge-light">
            20
            
         </h5>
      </div>
      
      
      <h1 class="mb-2 fw-bold">Lorem, ipsum dolor.</h1>
      <ul class="list-unstyled">
         <li class="d-flex justify-content-between pb-1 pt-1">
            
            <span> 12/08/24</span>
            <div class="d-flex">
               <a href="#" class="text-white mr-2" data-toggle="modal" data-target="#crew-preview-contract-1">Preview</a>
               <div class="dropdown">
                  <a href="#" class="text-white" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Option
                  </a>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                     
                     
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#crew-signon">Sign On</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#crew-edit-contract">Edit</a>
                        
                        <a href="" class="dropdown-item" data-toggle="modal" data-target="#crew-terminate-contract">Terminate</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#crew-delete-contract">Delete</a>
                     
                  </div>
                </div>
            </div>
         </li>
      </ul>
      <hr class="bg-white">
      <ul class="list-unstyled">
         <li class="d-flex justify-content-between pb-1 pt-1">
            <b>Sign On</b>
            <b>Sign Off</b>
            <b>Total</b>
         </li>

      </ul>
   </div>
</div> --}}
<div class="card border">
   @if (auth()->user()->hasRole('fm') && $request->status == 101)
   <div class="card-body">
      <a href="" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#fuel-approve-{{$request->id}}">Approve</a>
   </div>
   @else
   
   @endif
   
   <div class="card-body">
      <div class="d-flex justify-content-between">
         <div class="d-flex align-items-center">
            @if ($request->activity_id == 5)
                  <img width="75" src="{{asset('img/flaticon/oil-barrel.png')}}" alt="" class="img-thumbnail mr-3">
                  @elseif($request->activity_id == 6)
                  <img width="75" src="{{asset('img/flaticon/crude.png')}}" alt="" class="img-thumbnail mr-3">
               @endif
            {{-- <img width="75" src="{{asset('img/flaticon/oil-barrel.png')}}" alt="" class="img-thumbnail mr-3"> --}}
            <div>
               
               <h2>{{$request->activity->name}} for
                  {{$request->user->name ?? ''}} {{$request->employee->name ?? ''}}
               </h2>
               <span >Order #{{$request->id}}</span>
               
            </div>
         </div>
         <x-status-stisla.request :request="$request" />
      </div>
      <hr>
      <div class="row">
         <div class="col-md-8">
            <address>
               <strong>Detail:</strong><br>
                  {{-- @if ()
                     
                  @endif --}}
               Quantity {{$request->fuel->qty ?? ''}} {{$request->water->qty ?? ''}} KL<br>
               Request on {{formatDate($request->date)}}
               by <b>{{$request->user->name}}</b>
               
            </address>

            
         </div>
         <div class="col">
            <address>
               <strong>Schedule:</strong><br>
               {{$request->schedule->code ?? '-'}}<br>
               {{$request->schedule->vessel->name ?? 'Vessel : Waiting Fleet Control'}}
            </address>
         </div>
      </div>
   </div>
   <div class="card-footer bg-whitesmoke">
      <address>
         <strong>Desc : </strong> 
         {{$request->desc ?? '-'}}
      </address>
   </div>
</div>




