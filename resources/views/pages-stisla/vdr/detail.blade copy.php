@extends('layouts.stisla.app-vdr')
@section('title')
    Detail VDR
@endsection
@section('content')

<style>
   table {
      width: 100%;
   }

   table, th, td {
      border: 1px solid rgb(226, 218, 218);
      border-collapse: collapse;
   }
   th, td {
      padding-left: 5px
   }
</style>
<section class="section">


   {{-- <div class="section-header">
      <h1 class="section-title">Detail VDR </h1>
      <div class="section-header-breadcrumb">
         @if (auth()->user()->hasRole('marine'))
            <div class="breadcrumb-item "><a href="{{route('vdr.marine')}}">Dashboard</a></div>
            @elseif(auth()->user()->hasRole('vessel'))
            <div class="breadcrumb-item "><a href="{{route('vdr.vessel')}}">Dashboard</a></div>
            
         @endif
         
         <div class="breadcrumb-item active">Detail VDR</div>
      </div>
   </div> --}}

   <div class="section-body">
      <div class="card shadow-sm border">
               
         <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
               <li class="nav-item">
                  <a class="nav-link active" id="progress-tab" data-toggle="tab" href="#progress" role="tab" aria-controls="progress" aria-selected="true">Porgress</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="inbox-tab" data-toggle="tab" href="#inbox" role="tab" aria-controls="inbox" aria-selected="false">Inbox</a>
               </li>
               
               <li class="nav-item">
                  <a class="nav-link" id="history-tab" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="false">History </a>
               </li>
      
            </ul>
            <div class="tab-content" id="myTabContent">
               <div class="tab-pane fade show active" id="progress" role="tabpanel" aria-labelledby="progress-tab">
                  <div class="row mt-2">
                     <div class="col-md-6">
                        <table>
                           <tbody>
                              <tr>
                                 <td>Status</td>
                                 <td><x-status-stisla.vdr :vdr="$vdr" /></td>
                              </tr>
                              <tr>
                                 <td>Contract No.</td>
                                 <td>{{$vessel->contract_no ?? '-'}}</td>
                              </tr>
                              <tr>
                                 <td>Contract Period</td>
                                 <td>{{$vessel->contract_start ?? '-'}} - {{$vessel->contract_end ?? '-'}}</td>
                              </tr>
                              <tr>
                                 <td>Location</td>
                                 <td>{{$vdr->location_midnight ?? '-'}}</td>
                              </tr>
                           </tbody>
                        </table>
                        {{-- <dl class="row">
                           <dt class="col-5">Status</dt>
                           <dd class="col-7">Draft</dd>
                           <dt class="col-5">Contract No.</dt>
                           <dd class="col-7">{{$vessel->contract_no ?? '-'}}</dd>
                           <dt class="col-5">Contract Period</dt>
                           <dd class="col-7">{{$vessel->contract_start ?? '-'}} - {{$vessel->contract_end ?? '-'}}</dd>
                           <dt class="col-5">Location</dt>
                           <dd class="col-7">{{$vdr->location_midnight ?? '-'}}</dd>
                        </dl> --}}
                     </div>
                     <div class="col">
                        <dl class="row">
                  
                           <dt class="col-5">Owner</dt>
                           <dd class="col-7"> {{$vessel->owner ?? '-'}} / {{$vessel->operator ?? '-'}}</dd>
                           <dt class="col-5">Master Name</dt>
                           <dd class="col-7"> {{$vessel->master ?? '-'}}</dd>
                           <dt class="col-5">Num of Crew / Pax</dt>
                           <dd class="col-7">{{$vdr->crew_onduty}} / {{$vdr->crew_max}} Person</dd>
                        </dl>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="inbox" role="tabpanel" aria-labelledby="inbox-tab">
                  <b>Inbox</b>
                  
               </div>
               
               <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
                  <b>history</b>
                  
               </div>
      
              
            
            </div>
         </div>
      </div>



      {{-- <x-vdr.detail :vessel="$vessel" :vdr="$vdr" :crews="$crews" :weathers="$weathers" :activities="$activities" :operatings="$operatings" :totaljam="$totalJam" :totaldaily="$totalDaily" :cargos="$cargos" :hses="$hses" :engines="$engines" /> --}}
      
   </div>
</section>


<x-vdr.crew-modal :crews="$crews" :user="$user" :vdr="$vdr" :vessel="$vessel"/>
<x-vdr.activity-modal :activities="$activities" :user="$user" :vdr="$vdr" :vessel="$vessel"/>

{{-- Modal Revision Schedule --}}
<div class="modal fade" id="vdr-reject-marine" tabindex="1" role="dialog" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <form action="{{route('vdr.reject.marine')}}" method="POST">
      @csrf
      <input type="number" name="vdr" id="vdr" value="{{$vdr->id}}" hidden>
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Form Reject VDR</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div class="form-row">
               <div class="form-group col-md-12">
                  <label for="desc">Description</label>
                  <input type="text" class="form-control" id="desc" name="desc" >
               </div>
               
            </div>
         </div>
         <div class="modal-footer bg-whitesmoke">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">Reject</button>
         </div>
      </div>
      </form>
   </div>
</div>
@endsection



