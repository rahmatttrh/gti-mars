@extends('layouts.app')
   @section('title')
      Edit Parties
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
                        Edit Parties
                     </h2>
                  </div>
                  <!-- Page title actions -->
                  <div class="col-auto ms-auto d-print-none">
                     <div class="btn-list">
                     
                     
                     </div>
                  </div>
               </div>
            </div>
            <form action="{{route('party.update')}}" method="POST" enctype="multipart/form-data">
               @csrf
               @method('PUT')
               <input type="number" name="party" id="party" value="{{$party->id}}" hidden>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-9">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-floating mb-3">
                                 <input type="text" required class="form-control" id="name" name="name" value="{{$party->name}}">
                                 <label for="name">Name</label>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-floating mb-3">
                                 <input type="text" required class="form-control" id="tagline" name="tagline" value="{{$party->tagline}}">
                                 <label for="tagline">Tagline</label>
                              </div>
                           </div>
                           <div class="col-md-2">
                              @if ($party->logo)
                              <img class="img-thumbnail" src="{{asset('storage/' . $party->logo)}}" alt="">
                              @else
                              <div class="card ">
                                 <div class="card-body text-center">
                                    <small class="text-muted">No Image</small>
                                 </div>
                              </div>
                              @endif
                              
                           </div>
                           <div class="col-md-10">
                              <div class="form-floating mb-3">
                                 <input type="file" class="form-control" id="logo" name="logo" >
                                 <label for="logo">Logo</label>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-floating mb-3">
                                 <textarea class="form-control" data-bs-toggle="autosize" name="desc" id="desc" rows="4" placeholder="Desc..">{{$party->desc}}</textarea>
                                 <label for="logo">Description</label>
                              </div>
                           </div>
                           {{-- <div class="col-md-12">
                              <div class="mt-3">
                                 <label class="form-label text-muted">Description</label>
                                 <textarea class="form-control" name="desc" id="desc" rows="4" placeholder="Desc..">{{$party->desc}}</textarea>
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
                     Update
                  </button>
               </div>
            </form>
         </div>
       </div>
   </div>

@endsection
