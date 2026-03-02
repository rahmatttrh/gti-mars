@extends('layouts.app')
   @section('title')
      Detail Platform
   @endsection
@section('content')
   <div class="container-xl">
      <!-- Page title -->
      {{-- <div class="page-header d-print-none">
         
      </div> --}}
   </div>
   <div class="page-body" >
      <div class="container-xl">
         <div class="card p-2">
            <div class="card-header">
               <div class="row align-items-center">
                  <div class="col">
                  <!-- Page pre-title -->
                     <div class="page-pretitle">
                        Overview
                     </div>
                     <h2 class="page-title">
                        Detail Platform
                     </h2>
                  </div>
                  <!-- Page title actions -->
                  <div class="col-auto ms-auto d-print-none">
                     <div class="btn-list">
                     
                     
                     </div>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-md-4">
                     <div class="card border-none">
                        <div class="card-body text-center">
                           <div class="">
                              {{-- <span class="avatar avatar-xl " style="background-image: url({{asset('storage/' . $platform->logo)}})"></span> --}}
                              @if ($platform->logo)
                              <img  src="{{asset('storage/' . $platform->logo)}}" alt="">
                              @else
                              <img  src="{{asset('img/flaticon/image-gallery.png')}}" alt="">
                              @endif
                              
                           </div>
                        </div>
                        <div class="card-footer">
                           <div class="card-title mb-1"><h1>{{$platform->name}}</h1></div>
                           <div class="text-muted">{{$platform->tagline}}</div>
                        </div>
                        {{-- <a href="#" class="card-btn">View full profile</a> --}}
                     </div>
                  </div>
                  
                  <div class="col-md-8">
                     <div class="card border-none">
                        <div class="card-header">
                        <h3 class="card-title">
                           Detail
                        </h3>
                        <div class="card-actions">
                           <a href="{{route('platform.edit', enkripRambo($platform->id))}}" class="me-3">
                              Edit<!-- Download SVG icon from http://tabler-icons.io/i/edit -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" /><path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" /><line x1="16" y1="5" x2="19" y2="8" /></svg>
                           </a>
                           @if (auth()->user()->hasRole('superuser'))
                              <a href="#" class="text-danger" data-bs-toggle="modal" data-bs-target="#modalDelete_{{$platform->id}}">
                                 Delete
                                 <!-- Download SVG icon from http://tabler-icons.io/i/trash -->
                                 <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="4" y1="7" x2="20" y2="7" /><line x1="10" y1="11" x2="10" y2="17" /><line x1="14" y1="11" x2="14" y2="17" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                              </a>
                           @endif
                           
                        </div>
                        </div>
                        <div class="card-body">
                           <dl class="row">
                              <dd class="col-4">Name</dd>
                              <dd class="col-8">{{$platform->name}}</dd>
                              <dd class="col-4">System Name</dd>
                              <dd class="col-8">{{$platform->system}}</dd>
                              <dd class="col-4">Tagline</dd>
                              <dd class="col-8">{{$platform->tagline}}</dd>
                              <dd class="col-4">Email</dd>
                              <dd class="col-8">{{$platform->email}}</dd>
                              <dd class="col-4">Description</dd>
                              <dd class="col-8">{{$platform->desc}}</dd>
                              
                           </dl>
                        </div>
                     </div>

                     <div class="card mb-3 mt-3">
                        <div class="card-header">
                          <h3 class="card-title">Parties</h3>
                        </div>
                        <div class="list-group list-group-flush list-group-hoverable">
                           @foreach ($parties as $party)
                              <div class="list-group-item">
                                 <div class="row align-items-center">
                                    <div class="col-auto">
                                       @if ($party->logo)
                                          <a href="#">
                                             <img width="50px" height="30" style="object-fit:contain" src="{{asset('storage/' . $party->logo)}}" alt="">
                                             {{-- <span class="icon" style="background-image: url({{asset('storage/' . $party->logo)}})"></span> --}}
                                          </a>
                                          @else
                                          <img width="50" height="30" style="object-fit:contain"  src="{{asset('img/flaticon/image-gallery.png')}}" alt="">
                                       @endif
                                       
                                    </div>
                                    <div class="col text-truncate">
                                       <a href="{{route('party.detail', enkripRambo($party->id))}}" class="text-body d-block">{{$party->name}}</a>
                                       <small class="d-block text-muted text-truncate mt-n1">
                                          @if ($party->type == 2)
                                             Supplier
                                             @elseif($party->type == 3)
                                             Tenant
                                             @elseif($party->type == 4)
                                             Retail
                                          @endif
                                       </small>
                                    </div>
                                 </div>
                              </div>
                           @endforeach
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
       </div>
   </div>

   <div class="modal modal-blur fade" id="modalDelete_{{$platform->id}}" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="modal-title">Are you sure?</div>
            <div>If you proceed, you will lose data of <b>{{$platform->name}}</b>.</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
            <a href="{{route('platform.delete', enkripRambo($platform->id))}}" class="btn btn-danger" >Yes, delete this data</a>
            {{-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Yes, delete all my data</button> --}}
          </div>
        </div>
      </div>
   </div>
@endsection
