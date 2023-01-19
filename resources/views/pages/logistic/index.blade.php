@extends('layouts.app')
@section('content')
   <div class="container-xl">
      <div class="page-header d-print-none">
         <div class="row align-items-center">
            <div class="col">
               <div class="page-pretitle">
                  Overview
               </div>
               <h2 class="page-title">
                  Logistic
               </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
               <div class="btn-list">
                  <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-add-logistic">
                     <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                     Create new logistic
                  </a>
                  <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
                     <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                     <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="page-body" >
      <div class="container-xl">
         <div class="card">
            <div class="card-body border-bottom py-3">
               <div class="d-flex">
                 <div class="text-muted ">
                     Page
                     <div class="mx-2 d-inline-block">
                        <input type="text" class="form-control form-control-sm" value="{{$logistics->currentPage()}}" size="3" aria-label="Invoices count" disabled>
                     </div>
                 </div>
                 <div class="ms-auto text-muted">
                     Search:
                     <div class="ms-2 d-inline-block">
                        <input type="text" class="form-control form-control-sm" aria-label="Search invoice">
                     </div>
                 </div>
               </div>
            </div>
            <div class="table-responsive">
               <table class="table card-table table-vcenter " >
                  <thead>
                     <tr>
                        {{-- <th class="text-center w-1">No.</th> --}}
                        <th>Name</th>
                        <th>Weight</th>
                        <th>Size</th>
                        <th></th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($logistics as $logistic)
                        <tr>
                           {{-- <td class="text-muted text-center"><small>{{++$no}}</small></td> --}}
                           <td><span class="">{{$logistic->name}}</span></td>
                           <td class="text-muted">
                              {{$logistic->weight}} ton
                           </td>
                           <td class="text-muted">
                              {{$logistic->size}} m
                           </td>
                           <td class="d-flex align-items-center">
                              <div class="ms-auto">
                                 <a href="" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-edit-logistic-{{$logistic->id}}">Edit</a>
                                 <a href="" class="btn btn-danger btn-sm">Delete</a>
                              </div>
                              
                           </td>
                        </tr>
                        <x-modal.edit-logistic :logistic="$logistic" />
                     @endforeach
                  </tbody>
               </table>
            </div>
            <div class="card-footer d-flex align-items-center">
               <small>
                  <p class="m-0 text-muted">Showing <span>{{$logistics->firstItem()}}</span> to <span>{{$logistics->lastItem()}}</span> of <span>{{$totalLogistic}}</span> entries</p>
               </small>
               <div class="pagination m-0 ms-auto">
                  {{$logistics->links()}}
               </div>
            </div>
         </div>
      </div>
   </div>

   <x-modal.add-logistic />
@endsection