@extends('layouts.app')
@section('content')
   <div class="container-xl">
      <!-- Page title -->
      <div class="page-header d-print-none">
         <div class="row align-items-center">
            <div class="col">
               {{-- <h2 class="page-title">
               Vessel
               </h2>
               <div class="text-muted mt-1">Detail</div> --}}
               <div class="page-pretitle">
                  Overview
               </div>
               <h2 class="page-title">
                  Vessel Detail
               </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
               <div class="d-flex">
               {{-- <input type="search" class="form-control d-inline-block w-9 me-3" placeholder="Search user…"/> --}}
               {{-- <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-add-vessel">
                  <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                  New vessel
               </a> --}}
                  <div class="dropdown">
                     <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                     Options
                     </button>
                     <div class="dropdown-menu dropdown-menu-end">
                     <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-edit-vessel">
                        Edit
                     </a>
                     <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-delete-vessel">
                        Delete
                     </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="page-body">
      <div class="container-xl">
         <div class="card" href="#">
            <div class="card-cover card-cover-blurred text-center bg-info" style="background-image: url(./static/photos/2854fd67ddbd6217.jpg
)">
              <span class="avatar avatar-xl avatar-thumb avatar-rounded" > <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M2 20a2.4 2.4 0 0 0 2 1a2.4 2.4 0 0 0 2 -1a2.4 2.4 0 0 1 2 -1a2.4 2.4 0 0 1 2 1a2.4 2.4 0 0 0 2 1a2.4 2.4 0 0 0 2 -1a2.4 2.4 0 0 1 2 -1a2.4 2.4 0 0 1 2 1a2.4 2.4 0 0 0 2 1a2.4 2.4 0 0 0 2 -1" /><path d="M4 18l-1 -5h18l-2 4" /><path d="M5 13v-6h8l4 6" /><path d="M7 7v-4h-1" /></svg></span>
            </div>
            <div class="card-body text-center">
              <div class="card-title mb-1">{{$vessel->name}}</div>
              <div class="text-muted">{{$vessel->type}}</div>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-md-6">
               <div class="card">
                  <div class="card-body">
                    <div class="card-title">Basic info</div>
                    <div class="mb-2">
                      <!-- Download SVG icon from http://tabler-icons.io/i/book -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0" /><path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0" /><line x1="3" y1="6" x2="3" y2="19" /><line x1="12" y1="6" x2="12" y2="19" /><line x1="21" y1="6" x2="21" y2="19" /></svg>
                      Went to: <strong>University of Ljubljana</strong>
                    </div>
                    <div class="mb-2">
                      <!-- Download SVG icon from http://tabler-icons.io/i/briefcase -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="3" y="7" width="18" height="13" rx="2" /><path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2" /><line x1="12" y1="12" x2="12" y2="12.01" /><path d="M3 13a20 20 0 0 0 18 0" /></svg>
                      Worked at: <strong>Devpulse</strong>
                    </div>
                    <div class="mb-2">
                      <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                      Lives in: <strong>Šentilj v Slov. Goricah, Slovenia</strong>
                    </div>
                    <div class="mb-2">
                      <!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="11" r="3" /><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" /></svg>
                      From: <strong><span class="flag flag-country-si"></span>
                        Slovenia</strong>
                    </div>
                    <div class="mb-2">
                      <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><line x1="11" y1="15" x2="12" y2="15" /><line x1="12" y1="15" x2="12" y2="18" /></svg>
                      Birth date: <strong>13/01/1985</strong>
                    </div>
                    <div>
                      <!-- Download SVG icon from http://tabler-icons.io/i/clock -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><polyline points="12 7 12 12 15 15" /></svg>
                      Time zone: <strong>Europe/Ljubljana</strong>
                    </div>
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="card">
                  <div class="card-body">
                    <div class="card-title">Basic info</div>
                    <div class="mb-2">
                      <!-- Download SVG icon from http://tabler-icons.io/i/book -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0" /><path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0" /><line x1="3" y1="6" x2="3" y2="19" /><line x1="12" y1="6" x2="12" y2="19" /><line x1="21" y1="6" x2="21" y2="19" /></svg>
                      Went to: <strong>University of Ljubljana</strong>
                    </div>
                    <div class="mb-2">
                      <!-- Download SVG icon from http://tabler-icons.io/i/briefcase -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="3" y="7" width="18" height="13" rx="2" /><path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2" /><line x1="12" y1="12" x2="12" y2="12.01" /><path d="M3 13a20 20 0 0 0 18 0" /></svg>
                      Worked at: <strong>Devpulse</strong>
                    </div>
                    <div class="mb-2">
                      <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><polyline points="5 12 3 12 12 3 21 12 19 12" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                      Lives in: <strong>Šentilj v Slov. Goricah, Slovenia</strong>
                    </div>
                    <div class="mb-2">
                      <!-- Download SVG icon from http://tabler-icons.io/i/map-pin -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="11" r="3" /><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" /></svg>
                      From: <strong><span class="flag flag-country-si"></span>
                        Slovenia</strong>
                    </div>
                    <div class="mb-2">
                      <!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="5" width="16" height="16" rx="2" /><line x1="16" y1="3" x2="16" y2="7" /><line x1="8" y1="3" x2="8" y2="7" /><line x1="4" y1="11" x2="20" y2="11" /><line x1="11" y1="15" x2="12" y2="15" /><line x1="12" y1="15" x2="12" y2="18" /></svg>
                      Birth date: <strong>13/01/1985</strong>
                    </div>
                    <div>
                      <!-- Download SVG icon from http://tabler-icons.io/i/clock -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="9" /><polyline points="12 7 12 12 15 15" /></svg>
                      Time zone: <strong>Europe/Ljubljana</strong>
                    </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <x-modal.edit-vessel :vessel="$vessel" />
   <x-modal.delete-vessel :vessel="$vessel" />
@endsection