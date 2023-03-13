@extends('layouts.app')
@section('title')
    Create Platform
@endsection
@section('content')
   <div class="container-xl">
      <!-- Page title -->
      
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
                        Create Platform
                     </h2>
                  </div>
                  <!-- Page title actions -->
                  <div class="col-auto ms-auto d-print-none">
                     <div class="btn-list">
                     
                     
                     </div>
                  </div>
               </div>
            </div>
            <form action="{{route('platform.store')}}" enctype="multipart/form-data" method="POST">
               @csrf
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-9">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-floating mb-3">
                                 <input type="text" required class="form-control" id="name" name="name" >
                                 <label for="name">Name</label>
                              </div>
                           </div>
                           <div class="col-md-5">
                              <div class="form-floating mb-3">
                                 <input type="text" required class="form-control" id="system" name="system">
                                 <label for="system">System Name</label>
                              </div>
                           </div>
                           <div class="col-md-7">
                              <div class="form-floating mb-3">
                                 <input type="text" required class="form-control" id="tagline" name="tagline" >
                                 <label for="tagline">Tagline</label>
                              </div>
                           </div>
                           
                           <div class="col-md-7">
                              <div class="form-floating mb-3">
                                 <input type="email" required class="form-control" id="email" name="email" >
                                 <label for="email">Email</label>
                              </div>
                           </div>
                           <div class="col-md-5">
                              <div class="form-floating mb-3">
                                 <input type="file" class="form-control" id="logo" name="logo" >
                                 <label for="logo">Logo</label>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-floating mb-3">
                                 <textarea class="form-control" data-bs-toggle="autosize" name="desc" id="desc" rows="4" placeholder="Desc..">&nbsp;</textarea>
                                 <label for="logo">Description</label>
                              </div>
                           </div>
                           {{-- <div class="col-md-12">
                              <div class="mb-3">
                                 <label class="form-label text-muted">Description</label>
                                 <textarea class="form-control" name="desc" id="desc" rows="4" placeholder="Desc.."></textarea>
                               </div>
                           </div> --}}
                           {{-- <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <input type="date" required class="form-control" id="date" name="date" >
                                 <label for="date">Date</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating mb-3">
                                 <select required name="req_boat" id="req_boat" class="form-select">
                                    <option  disabled selected>Choose one</option>
                                    
                                       <option value="SCV">SCV</option>
                                       <option value="AHTS">AHTS</option>
                                 </select>
                                 <label for="req_boat">Required Boat</label>
                              </div>
                           </div> --}}
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
                     Save
                  </button>
               </div>
            </form>
         </div>
       </div>
   </div>

@endsection
