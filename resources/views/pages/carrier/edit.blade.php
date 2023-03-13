@extends('layouts.app')
@section('title')
    Edit Carrier
@endsection
@section('content')
   <div class="container-xl">
      <!-- Page title -->
      {{-- <div class="page-header d-print-none">
         
      </div> --}}
   </div>
   <div class="page-body" >
      <div class="container-xl">
         <div class="card">
            <div class="card-header">
               <div class="row align-items-center">
                  <div class="col">
                  <!-- Page pre-title -->
                     <div class="page-pretitle">
                        Form
                     </div>
                     <h2 class="page-title">
                        Edit Carrier
                     </h2>
                  </div>
                  <!-- Page title actions -->
                  <div class="col-auto ms-auto d-print-none">
                     <div class="btn-list">
                     
                     
                     </div>
                  </div>
               </div>
            </div>
            <form action="{{route('carrier.update')}}" method="POST">
               @csrf
               @method('put')
               <input type="number" name="carrier" id="carrier" value="{{$carrier->id}}" hidden>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-9">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-floating mb-3">
                                 <input type="text" required class="form-control" id="name" name="name" value="{{$carrier->name}}" >
                                 <label for="name">Name</label>
                              </div>
                           </div>
                           
                        </div>
                     </div>
                     
                     <div class="col-md-3">
                        <div class="card">
                           <div class="card-header">
                           <small class="">Reserved</small>
                           </div>
                           <div class="list-group list-group-flush overflow-auto" id="reserved" style="max-height: 12rem">
                              
                              <div class="list-group-item">
                                 <div class="row">
                                    <div class="col text-truncate">
                                       <small>Schedule will show here</small>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="card-footer">
                              <small class="text-muted">Silahkan memilih waktu Docking dan Departure selain waktu diatas</small>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="card-footer">
                  <button type="submit" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2" /><circle cx="12" cy="14" r="2" /><polyline points="14 4 14 8 8 8 8 4" /></svg>
                     Update
                  </button>
               </div>
            </form>
         </div>
       </div>
   </div>

@endsection
