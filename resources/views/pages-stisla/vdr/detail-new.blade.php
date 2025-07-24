@extends('layouts.stisla.app-vdr')
@section('title')
    Detail VDR
@endsection
@section('content')

<style>
   table {
      width: 100%;
      background-color: white;
      border-radius: 10px;
      box-shadow: 1px 1px 5px rgb(159, 158, 158);
      
   }

   table, th, td {
      border: 1px solid rgba(226, 218, 218, 0);
      border-collapse: collapse;
   }
  
   input {
      border:0;
      outline:0;
      text-align: center; 
      /* background-color: rgb(226, 236, 151) */
      
   }

   .bg-y {
      background-color: rgb(226, 236, 151)
   }

   .border-g {
      border: 1px solid rgb(156, 152, 152);
      border-collapse: collapse;
   }

   .input-bg-y {
      background-color: rgb(226, 236, 151)
   }

   .button {
      cursor: pointer;
    border: none;
    
    outline: inherit;
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
      
      <div class="row">
         {{-- <div class="col-md-2">
            
               @if (auth()->user()->hasRole('vessel'))
                  @if ($vdr->status == 0 || $vdr->status == 101 || $vdr->status == 202 || $vdr->status == 303) 
                  <a href="" class="btn btn-block btn-primary" data-toggle="modal" data-target="#modalReleaseVdr">Release</a>
                  @endif
               @endif
            <hr>
            <table>
               <tbody>
                  <tr>
                     <td colspan="2">{{$vdr->code}}</td>
                  </tr>
                  <tr>
                     <td colspan="2">ENC ONE VDRID {{$vdr->id}}</td>
                  </tr>
                  <tr>
                     <td colspan="2"> <span>Status : <x-status-stisla.vdr :vdr="$vdr" /> </span></td>
                  </tr>
                  <tr>
                     <td>Contract</td>
                     <td><input class="w-100 input_general" id="contract" name="contract" type="text" value="{{$vdr->contract}}" ></td>
                  </tr>
                  <tr>
                     <td>Period</td>
                     <td>
                        <input class="w-100 input_general" id="contract_start" name="contract_start" type="date" value="{{$vdr->contract_start}}" >
                        <input class="w-100 input_general" id="contract_end" name="contract_end" type="date" value="{{$vdr->contract_end}}" >
                     </td>
                  </tr>
                  <tr>
                     <td>Owner</td>
                     <td><input class="w-100 input_general" id="owner" name="owner" type="text" value="{{$vdr->owner}}" ></td>
                  </tr>
                  <tr>
                     <td>Master</td>
                     <td><input class="w-100 input_general" id="master" name="master" type="text" value="{{$vdr->master}}" ></td>
                  </tr>
                  <tr>
                     <td>CE</td>
                     <td><input class="w-100 input_general" id="ce" name="ce" type="text" value="{{$vdr->ce}}" ></td>
                  </tr>
                 
                  <tr>
                     <td></td>
                  </tr>
                  <tr>
                     <td colspan="2"><a href="">Update</a> | <a href="">Delete</a> </td>
                  </tr>
                  <tr>
                     <td colspan="2">
                        <a href="{{route('document.vdr', enkripRambo($vdr->id))}}" target="_blank" class="">Export PDF</a>
                     </td>
                  </tr>
               </tbody>
            </table>
           
               
         </div> --}}
         <div class="d-none d-md-block">
            <div class="col-md-12 ">
               <div class="row">
                  <div class="col-md-12 px-2">
                     <div class="d-flex align-items-center px-3">

                  
                        @if (auth()->user()->hasRole('vessel'))
                           @if ($vdr->status == 0 || $vdr->status == 101 || $vdr->status == 202 || $vdr->status == 303) 
                           <a href="#" class="btn   btn-primary" data-toggle="modal" data-target="#modalReleaseVdr">Release</a>
                           {{-- <a href="" class="btn btn-info mx-2">Edit</a> --}}
                           <a href="#" data-toggle="modal" data-target="#modalDeleteVdr" class="btn  btn-danger  mx-2">Delete</a>
                        
                           
                           
                           @endif
                        @endif
      
                        @if ($vdr->status == 2 && auth()->user()->hasRole('marine') )
                        
                           @if (auth()->user()->username != 'pet')
                           <a href="#" class="btn    btn-info " data-toggle="modal" data-target="#modalAppMarine">Approve</a>
                           <a href="" class="btn btn-danger mx-2" data-toggle="modal" data-target="#vdr-reject-marine">Reject</a>
                           @endif
                           
                        
                           
                        @endif
      
                        @if ($vdr->status == 5 && auth()->user()->hasRole('suptent_loc') )
                        
                           
                           <a href="#" class="btn    btn-info " data-toggle="modal" data-target="#modalAppSuptentLoc">Approve</a>
                           <a href="" class="btn btn-danger mx-2" data-toggle="modal" data-target="#vdr-reject-suptent-loc">Reject</a>
                           
                           
                        
                           
                        @endif
      
                        @if ($vdr->status == 1  && auth()->user()->username == 'pet')
                        {{-- <div class="btn-group mr-2"> --}}
                           {{-- <div class="btn btn-block btn-group p-0"> --}}
                              {{-- <a href="{{route('vdr.approve.marine', enkripRambo($vdr->id))}}" class="btn btn-info btn-block">Approve </a> --}}
                              {{-- <div class="btn-group mr-2"> --}}
                                 <a href="#" class="btn   btn-info " data-toggle="modal" data-target="#modalAppPet">Approve PET</a>
                                 <a href="" class="btn btn-danger mx-2" data-toggle="modal" data-target="#vdr-reject-marine">Reject</a>
                              {{-- </div> --}}
                              
                           {{-- </div> --}}
                           
                           
                        
                        
                        @endif
      
                        <a  class="btn btn-light  bg-white mr-2 shadow-sm" href="{{route('document.vdr', enkripRambo($vdr->id))}}" target="_blank" class=""><i class="fa fa-file"></i> Export PDF</a>
                        
                        
                        
                        
                        @if ($vdr->status == 101 || $vdr->status == 202 || $vdr->status == 303 || $vdr->reject_by != null)
                        <div class="btn btn-danger  mx-2 " style="background-color: rgb(200, 54, 54);" >
                           <span class="badge badge-light border">!</span> Rejected by {{$vdr->rejectBy->name}} at {{formatDateTime($vdr->reject_date)}} :
                           {{$vdr->reject_desc}}
                        </div>
                                             
                        @endif
      
                        
      
                        @if (count($vdrHistories) > 0)
                           <select class="form-control" name="" id="">
                              <option value="" selected disabled>Revision Record</option>
                              @foreach ($vdrHistories as $vhis)
                              <option value="">
                                 <a class="dropdown-item" href="#" >{{$vhis->code}}</a>
                              </option>
                                 @endforeach
                              
                           </select>
                           {{-- <div class="btn-group">
                              <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Action
                              </button>
                              <div class="dropdown-menu" style="max-width: 500px;min-width: 1%;" >
                                 @foreach ($vdrHistories as $vhis)
                                 <a class="dropdown-item" href="#" >{{$vhis->code}} Lorem, ipsum dolor.</a>
                                 
                                 @endforeach
                              </div>
                           </div> --}}
                           {{-- <div class="dropdown">
                              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Riwayat Revisi
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                 
                              
                              </div>
                           </div> --}}
                        @endif
      
                        @if ($vdr->vessel->ipb == 'IPB')
                           @if ($vdr->status == 0)
                              <select name="bu" id="bu" class="form-control shadow input_bu" style="width: 150px">
                                 <option selected disabled >Choose BU</option>
                                 <option {{$vdr->area == 'SBU' ? 'selected' : ''}} value="SBU">SBU</option>
                                 <option {{$vdr->area == 'CBU' ? 'selected' : ''}} value="CBU">CBU</option>
                                 <option {{$vdr->area == 'NBU' ? 'selected' : ''}} value="NBU">NBU</option>
                              </select>
                              @else
                              <a href="#" class="btn btn-light bg-white shadow-sm border" >LOCATION : {{$vdr->area}}</a>
                           @endif
                           
                        @endif

                        @if (auth()->user()->hasRole('vessel'))
                           @if ($vdr->status == 0)
                           <div class="btn btn-warning  mx-2 text-dark" style="background-color: rgb(226, 236, 151);" >
                              <span class="badge badge-dark border">!</span> Harap isi kolom berwarna kuning
                           </div>
                           @endif
                           
                           
                        @endif
                        <a href="#" class="btn mx-2 btn-dark" data-toggle="tooltip" data-placement="top" title="Fitur Auto-save: Active / Perubahan yang anda lakukan pada halaman ini akan otomatis tersimpan.">Info</a>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="">
                        
                     </div>
                  </div>
               </div>
               <div class="d-flex px-1 mb-2">
                  

                  {{-- @if (auth()->user()->hasRole('marine'))
                     <div class="btn-group ml-2 ">
                        <a class="btn btn-light border" href="{{route('vdr.sent.email.approval.pet', enkripRambo($vdr->id))}}">Email PET</a>
                        <a class="btn btn-light border" href="{{route('vdr.sent.email.approval.marine', enkripRambo($vdr->id))}}">Email Marine</a>
                        <a class="btn btn-light border" href="{{route('vdr.sent.email.approval.suptent.loc', enkripRambo($vdr->id))}}">Email Suptent on Location</a>
                        <a class="btn btn-light border" href="{{route('vdr.sent.email.approval.suptent', enkripRambo($vdr->id))}}">Email Suptent</a>
                        
                        
                     </div>
                  @endif --}}


                  

               
                  
                  
                  {{-- <div class="card bg-warning">
                     <div class="card-boy"></div>
                  </div> --}}
               </div>
               
            </div>
         </div>





         {{-- Action Mobile View --}}
         <div class="d-block d-sm-none">
            <div class="row">
               <div class="col-md-12 px-4">
                  @if (auth()->user()->hasRole('vessel'))
                     @if ($vdr->status == 0 || $vdr->status == 101 || $vdr->status == 202 || $vdr->status == 303) 
                     <div class="row">
                        <div class="col-6">
                           <a href="#" class="btn btn-block  btn-primary" data-toggle="modal" data-target="#modalReleaseVdr">Release</a>
                        </div>
                        <div class="col-6">
                           <a href="#" data-toggle="modal" data-target="#modalDeleteVdr" class="btn btn-block  btn-danger  mx-2">Delete</a>
                        </div>
                     </div>
                     
                     {{-- <a href="" class="btn btn-info mx-2">Edit</a> --}}
                     
                  
                     
                     
                     @endif
                  @endif
      
                  @if ($vdr->status == 2 && auth()->user()->hasRole('marine') )
                  
                     @if (auth()->user()->username != 'pet')
                     <a href="#" class="btn    btn-info " data-toggle="modal" data-target="#modalAppMarine">Approve</a>
                     <a href="" class="btn btn-danger mx-2" data-toggle="modal" data-target="#vdr-reject-marine">Reject</a>
                     @endif
                     
                  
                     
                  @endif
         
                  @if ($vdr->status == 5 && auth()->user()->hasRole('suptent_loc') )
                  
                     
                     <a href="#" class="btn    btn-info " data-toggle="modal" data-target="#modalAppSuptentLoc">Approve</a>
                     <a href="" class="btn btn-danger mx-2" data-toggle="modal" data-target="#vdr-reject-suptent-loc">Reject</a>
                     
                     
                  
                     
                  @endif
      
               @if ($vdr->status == 1  && auth()->user()->username == 'pet')
                  {{-- <div class="btn-group mr-2"> --}}
                  {{-- <div class="btn btn-block btn-group p-0"> --}}
                     {{-- <a href="{{route('vdr.approve.marine', enkripRambo($vdr->id))}}" class="btn btn-info btn-block">Approve </a> --}}
                     {{-- <div class="btn-group mr-2"> --}}
                        <a href="#" class="btn   btn-info " data-toggle="modal" data-target="#modalAppPet">Approve PET</a>
                        <a href="" class="btn btn-danger mx-2" data-toggle="modal" data-target="#vdr-reject-marine">Reject</a>
                     {{-- </div> --}}
                     
                  {{-- </div> --}}
                  
                  
               
               
               @endif
               </div>
            </div>

            <div class="row">
               <div class="col-md-12">
                  <a  class="btn btn-light  bg-white mr-2 shadow-sm" href="{{route('document.vdr', enkripRambo($vdr->id))}}" target="_blank" class=""><i class="fa fa-file"></i> Export PDF</a>
               
               
               
               
               @if ($vdr->status == 101 || $vdr->status == 202 || $vdr->status == 303 || $vdr->reject_by != null)
               <div class="btn btn-danger  mx-2 " style="background-color: rgb(200, 54, 54);" >
                  <span class="badge badge-light border">!</span> Rejected by {{$vdr->rejectBy->name}} at {{formatDateTime($vdr->reject_date)}} :
                  {{$vdr->reject_desc}}
               </div>
                                    
               @endif
      
                        
      
               @if (count($vdrHistories) > 0)
                  <select class="form-control" name="" id="">
                     <option value="" selected disabled>Revision Record</option>
                     @foreach ($vdrHistories as $vhis)
                     <option value="">
                        <a class="dropdown-item" href="#" >{{$vhis->code}}</a>
                     </option>
                        @endforeach
                     
                  </select>
                  {{-- <div class="btn-group">
                     <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Action
                     </button>
                     <div class="dropdown-menu" style="max-width: 500px;min-width: 1%;" >
                        @foreach ($vdrHistories as $vhis)
                        <a class="dropdown-item" href="#" >{{$vhis->code}} Lorem, ipsum dolor.</a>
                        
                        @endforeach
                     </div>
                  </div> --}}
                  {{-- <div class="dropdown">
                     <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Riwayat Revisi
                     </button>
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        
                     
                     </div>
                  </div> --}}
               @endif

               @if ($vdr->vessel->ipb == 'IPB')
                  <select name="bu" id="bu" class="form-control shadow input_bu" style="width: 150px">
                     <option selected disabled >Choose BU</option>
                     <option {{$vdr->area == 'SBU' ? 'selected' : ''}} value="SBU">SBU</option>
                     <option {{$vdr->area == 'CBU' ? 'selected' : ''}} value="CBU">CBU</option>
                     <option {{$vdr->area == 'NBU' ? 'selected' : ''}} value="NBU">NBU</option>
                  </select>
               @endif

               @if (auth()->user()->hasRole('vessel'))
                  @if ($vdr->status == 0)
                  <div class="btn btn-warning  mx-2 text-dark" style="background-color: rgb(226, 236, 151);" >
                     <span class="badge badge-dark border">!</span> Harap isi kolom berwarna kuning
                  </div>
                  @endif
                  
                  
               @endif
               <a href="#" class="btn  btn-dark" data-toggle="tooltip" data-placement="top" title="Fitur Auto-save: Active / Perubahan yang anda lakukan pada halaman ini akan otomatis tersimpan.">Info</a>
               </div>
            </div>

            
         </div>
         

         <div class="col-md-12">

            {{-- <div class="d-flex px-1 mb-2">
               

               
               
            </div> --}}
            
            <div class="table-responsive " > 
               <div class="row ">
                  <div class="col-md-5">
                     
                     {{-- <div class="table-responsive overflow-auto" style="height: 75vh"> --}}
                     {{-- General  --}}
                    
                        
                     

                     
                  
                        
                     {{-- <table class="mb-2">
                        <thead>
                           <tr>
                              <td>{{$vdr->code}}</td>
                              <td class="text-right py-2 pr-1"><x-status-stisla.vdr :vdr="$vdr" /></td>
                           </tr>
                          
                        </thead>
                     </table> --}}

                     {{-- <div class="table-responsive overflow-auto pb-4" style="height: 700px ">  --}}
                        <div class="table-responsive p-2" >
                           <table class="">
                              <thead>
                                 <tr>
                                    <td colspan="5"><b class="code">{{$vdr->code}}</b></td>
                                    {{-- <td colspan="2" class="text-right py-2 pr-1"></td> --}}
                                 </tr>
                                 <tr>
                                    <td colspan="5"><x-status-stisla.vdr :vdr="$vdr" /></td>
                                 </tr>
                                 {{-- @if ($vdr->status == 101 || $vdr->status == 202 || $vdr->status == 303)
                                     <tr>
                                      
                                       <td colspan="4" class="text-danger">
                                          {{formatDateTime($vdr->reject_date)}} :
                                          {{$vdr->reject_desc}}
                                       </td>
                                     </tr>
                                 @endif --}}
                                 <tr>
                                    <td colspan="2"><b class="text-primary" style="color: #1f4481 !important">General Information</b></td>
                                    {{-- <td colspan="3" class="text-right py-2 pr-1"><x-status-stisla.vdr :vdr="$vdr" /></td> --}}
                                 </tr>
                              </thead>
                              <tbody class="pb-3">
                                 <form id="form_general"  method="POST">
                                    @csrf
                                    <input type="text" name="vdr" id="vdr" value="{{$vdr->id}}" hidden>
                                    <tr>
                                       <td class="px-1">Date</td>
                                       <td class="bg-y">
                                          <input  class="w-100 input_general input_general_date" id="date" name="date" required {{$editable == 0 ? 'readonly' : ''}} type="date" value="{{$vdr->date}}" style="background-color: rgb(226, 236, 151); text-align: left !important; " >
                                          <small class="errordate"></small>
                                       </td>
                                       <td class="px-1">Loc</td>
                                       <td class="bg-y"><input class="w-100 input_general" id="location_midnight" name="location_midnight" {{$editable == 0 ? 'readonly' : ''}}  required type="text" value="{{$vdr->location_midnight}}" style="background-color: rgb(226, 236, 151); text-align: left !important;" ></td>
                                    </tr>
                                    {{-- <tr>
                                       <td class="px-1">Crew</td>
                                       <td><input class="w-100 input_general" id="onduty" name="onduty" type="text" value="{{$vdr->crew_onduty ?? '0'}}" ></td>
                                       <td class="px-1">Pax</td>
                                       <td><input class="w-100 input_general" id="pax" name="pax" type="text" value="{{$vdr->crew_max ?? '0'}}" ></td>
                                    </tr> --}}
                                    <tr>
                                       <td class="px-1">Vessel</td>
                                       <td class="bg-y"><input {{$editable == 0 ? 'readonly' : ''}} class="w-100 input_general"  type="text" value="{{$vdr->vessel->name ?? '0'}}" style="background-color: rgb(226, 236, 151); text-align: left !important;"></td>
                                       <td class="px-1">Owner</td>
                                       <td class="bg-y"><input {{$editable == 0 ? 'readonly' : ''}} style="background-color: rgb(226, 236, 151); text-align: left !important;" class="w-100 input_general" id="owner" name="owner" type="text" value="{{$vdr->owner ?? '0'}}" ></td>
                                    </tr>
                                    <tr>
                                       <td class="px-1">Contract</td>
                                       <td class="bg-y"><input {{$editable == 0 ? 'readonly' : ''}} style="background-color: rgb(226, 236, 151); text-align: left !important;" class="w-100 input_general" id="contract" name="contract" type="text" value="{{$vdr->contract ?? '0'}}" ></td>
                                       <td class="px-1">Master</td>
                                       <td class="bg-y"><input {{$editable == 0 ? 'readonly' : ''}} style="background-color: rgb(226, 236, 151); text-align: left !important;" class="w-100 input_general" id="master" name="master" type="text" value="{{$vdr->master ?? ''}}" ></td>
                                    </tr>
                                    <tr>
                                       <td></td>
                                       <td></td>
                                       <td class="px-1" colspan="">CE</td>
                                       <td class="bg-y"><input {{$editable == 0 ? 'readonly' : ''}} style="background-color: rgb(226, 236, 151); text-align: left !important;" class="w-100 input_general" id="ce" name="ce" type="text" value="{{$vdr->ce ?? ''}}" ></td>
                                    </tr>
                                    <tr>
                                       <td class="px-1">Contract Period</td>
                                       <td class="bg-y">
                                          <input {{$editable == 0 ? 'readonly' : ''}} style="background-color: rgb(226, 236, 151); text-align: left !important;" class="w-100 input_general input_general_date" id="contract_start" name="contract_start" type="date" value="{{$vdr->contract_start}}" >
                                          <input {{$editable == 0 ? 'readonly' : ''}} style="background-color: rgb(226, 236, 151); text-align: left !important;" class="w-100 input_general input_general_date" id="contract_end" name="contract_end" type="date" value="{{$vdr->contract_end}}" >
                                       </td>
                                       <td class="px-1">Crew / Pax</td>
                                       <td class="bg-y">
                                          <input {{$editable == 0 ? 'readonly' : ''}} style="background-color: rgb(226, 236, 151); text-align: left !important;" class="w-100 input_general" id="onduty" name="onduty" type="text" value="{{$vdr->crew_onduty ?? '0'}}" >
                                          <input {{$editable == 0 ? 'readonly' : ''}} style="background-color: rgb(226, 236, 151); text-align: left !important;" class="w-100 input_general" id="pax" name="pax" type="text" value="{{$vdr->crew_max ?? '0'}}" >
                                       </td>
                                    </tr>
                                    <tr>
                                       <td colspan="4"></td>
                                    </tr>
                                    <tr>
                                       <td colspan="4"></td>
                                    </tr>
                                 </form>
                              </tbody>
                           </table>
                        </div>
                     
                        {{-- Weather --}}
                        <hr>
                     
                        <div class="table-responsive p-2" >
                           <table>
                              <thead>
                                 <tr>
                                    <td colspan="4"><b class="text-primary" style="color: #1f4481 !important">Weather Condition</b></td>
                                 </tr>
                                 <tr>
                                    <td>Weather/Time</td>
                                    <td>00:00 - 06:00 hrs</td>
                                    <td>06:00 - 12:00 hrs</td>
                                    <td>12:00 - 18:00 hrs</td>
                                    <td>18:00 - 24:00 hrs</td>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach ($weathers as $weather)
                                    <input type="hidden" name="vdr_id" value="{{$vdr->id}}">
                                    <input type="hidden" name="id[]" value="{{$weather->id}}">
                                    <tr>
                                       <td class="">{{$weather->heading->description}}</td>
                                       <input {{$editable == 0 ? 'readonly' : ''}} type="text" name="weatherId" id="weatherId" value="{{$weather->id}}" hidden>
                                       <td class="text-center bg-y" style="width: 180px">
                                          <input {{$editable == 0 ? 'readonly' : ''}} style="background-color: rgb(226, 236, 151)" class="w-100 input_weather_{{$weather->id}}" type="text" style="border-color: red!"  id="t_0006_{{$weather->id}}" name="t_0006_{{$weather->id}}" value="{{$weather->t_0006}} ">
                                       </td>
                                       <td class="text-center bg-y" style="width: 180px">
                                          <input {{$editable == 0 ? 'readonly' : ''}} style="background-color: rgb(226, 236, 151)" class="w-100 input_weather_{{$weather->id}}" type="text" id="t_0612_{{$weather->id}}"  name="t_0612_{{$weather->id}}" value="{{$weather->t_0612}}">
                                       </td>
                                       <td class="text-center bg-y" style="width: 180px">
                                          <input {{$editable == 0 ? 'readonly' : ''}} style="background-color: rgb(226, 236, 151)" class="w-100 input_weather_{{$weather->id}}" type="text" id="t_1218_{{$weather->id}}"  name="t_1218_{{$weather->id}}" value="{{$weather->t_1218}}">
                                       </td>
                                       <td class="text-center bg-y" style="width: 180px">
                                          <input {{$editable == 0 ? 'readonly' : ''}} style="background-color: rgb(226, 236, 151)" class="w-100 input_weather_{{$weather->id}}" type="text" id="t_1824_{{$weather->id}}"  name="t_1824_{{$weather->id}}" value="{{$weather->t_1824}}">
                                       </td>
                                    </tr>

                                    @endforeach
                                    <tr>
                                       <td colspan="5"></td>
                                    </tr>
                                    <tr>
                                       <td colspan="5"></td>
                                    </tr>
                                 
                              </tbody>
                           </table>

                           {{-- HSSE --}}
                           <hr>
                        
                           <table>
                              <thead>
                                 <tr>
                                    <td colspan="5"><b class="text-primary" style="color: #1f4481 !important">HSSE</b></td>
                                 </tr>
                                 <tr>
                                    <th class="text-center">A</th>
                                    <th>HSSE STATISTICS (INPUT)</th>
                                    <th>Previous</th>
                                    <th>Today</th>
                                    <th>Monthly</th>
                                 </tr>
                              </thead>
                              <tbody>
                                    
                        
                                       <input type="hidden" name="vdr_id" value="{{$vdr->id}}">
                                       @php
                                       $groupHeader = 'A';
                                       $no = 1;
                                       @endphp
                        
                                       @foreach ($hses as $hse)
                                       <input type="hidden" name="id[]" value="{{$hse->id}}">
                                       <input type="hidden" id="hsse" value="{{$hse->id}}">
                                       @if($hse->header->group_header != $groupHeader)
                                       <thead>
                                          <tr>
                                                <th class="text-center">B</th>
                                                <th>HSSE STATISTICS (Output)</th>
                                                <th>Previous</th>
                                                <th>Today</th>
                                                <th>Cumulative</th>
                                          </tr>
                                       </thead>
                        
                                       @php
                                       $no = 1;
                                       @endphp
                        
                                       @endif

                                       <tr>
                                          <td>{{ $no++}}</td>
                                          <td>{{$hse->header->description}}</td>
                                          @if($hse->header_id != 8)
                                          <td class="bg-y">
                                                <input {{$editable == 0 ? 'readonly' : ''}} style="background-color: rgb(226, 236, 151)" class="w-100 input_hsse_{{$hse->id}}" type="number" id="previous_{{$hse->id}}" name="previous[]"  value="{{$hse->previous}}">
                                          </td>
                                          <td class="bg-y">
                                                <input {{$editable == 0 ? 'readonly' : ''}} style="background-color: rgb(226, 236, 151)" class="w-100 input_hsse_{{$hse->id}}" type="number" id="today_{{$hse->id}}" name="today[]"  value="{{$hse->today}}">
                                          </td>
                                          <td>
                                             {{-- <span class="hse_month"></span> --}}
                                             <input {{$editable == 0 ? 'readonly' : ''}} class="w-100 hse_month_{{$hse->id}}" readonly type="text" name="" id="hse_month_{{$hse->id}}">
                                                {{-- <input {{$editable == 0 ? 'readonly' : ''}} class="w-100 hse_month" type="text" name="monthly[]" id="monthly_{{$hse->id}}"  value="{{$hse->previous + $hse->today}}" readonly> --}}
                                          </td>
                                          @else
                                          <input {{$editable == 0 ? 'readonly' : ''}} type="hidden" name="previous[]"  value="{{$hse->previous}}">
                                          <input {{$editable == 0 ? 'readonly' : ''}} type="hidden" name="today[]"  value="{{$hse->today}}">
                                          <input {{$editable == 0 ? 'readonly' : ''}} type="hidden" name="monthly[]"  value="{{$hse->today}}" readonly>
                                          <td colspan="3"></td>
                                          @endif
                                       </tr>
                        
                                       @php
                                       $groupHeader = $hse->header->group_header
                                       @endphp
                                       @endforeach
                        
                              
                                    
                              </tbody>
                           </table>
                        </div>
                     {{-- </div> --}}
                     <hr>
                     
                     
                  </div>
         
                  <div class="col-md-7">
                     <div class="table-responsive p-2" >
                        <form action="{{route('vdr.activity.delete.row')}}" method="post" >
                           @csrf
                           @method('POST')
                           <table class="w-100">
                              <thead>
                                 <tr>
                                    <td colspan="13"><b class="text-primary" style="color: #1f4481 !important">Detail of Daily Operational Activity </b></td>
                                 </tr>
                                 <tr>
                                    <td colspan="13">
                                       @if ($editable == 1)
                                           
                                       
                                       {{-- <a href="#" onclick="addActivity()">Add Row</a> --}}
                                       <a class="badge badge-info" style="background-color: #1f4481 !important" href="{{route('vdr.activity.add.row', enkripRambo($vdr->id))}}" data-toggle="tooltip" data-placement="top" title="Click to add new row activity"><i class="fa fa-plus"></i> Add Row</a>
                                       {{-- <a class="badge badge-danger" href="" data-toggle="tooltip" data-placement="top" title="Click to add new row activity"><i class="fa fa-trash"></i> Delete </a> --}}
                                       <button  class="badge badge-danger button" data-toggle="tooltip" data-placement="top" title="Click to delete checked activity list"  type="submit"><i class="fas fa-trash"></i> Delete</button>
                                       {{-- <button onclick="addActivity()">Click</button> --}}
                                       @endif
                                    </td>
                                 </tr>
                                 <tr>
                                    <td></td>
                                    <td colspan="2" class="text-center">Time</td>
                                    <td colspan="8" class="text-center">Operating Mode Duration (hh:mm) - 
                                       Except Maintenance & Downtime </td>
                                    <td rowspan="2" class="text-center">Activities</td>
                                 </tr>
                                 <tr>
                                    <th><input type="checkbox" name="" id="checkboxAllActivity"></th>
                                    <td class="text-center">Start</td>
                                    <td class="text-center">Finish</td>
                                    <td class="text-center">High</td>
                                    <td class="text-center">Normal</td>
                                    <td class="text-center">Slow</td>
                                    <td class="text-center">Manu</td>
                                    <td class="text-center">Idle</td>
                                    <td class="text-center">Tow</td>
                                    <td class="text-center">A/H</td>
                                    <td class="text-center">S/B</td>
                                    
                                 </tr>
                              </thead>
                              <tbody>
                                 <input type="text" name="vdr_id" id="vdr_id" value="{{$vdr->id}}" hidden>
                                    @foreach ($activities as $activity)
                                    <input type="text" name="activity" id="activity" value="{{$activity->id}}" hidden>
                                    <tr>
                                       <td>
                                          <input {{$editable == 0 ? 'readonly' : ''}} type="checkbox" name="checkActivity[]" value="{{$activity->id}}" id="checkActivity-{{$activity->id}}">
                                          {{-- <input {{$editable == 0 ? 'readonly' : ''}} class="idActivity" type="checkbox" name="idActivity" id="idActivity"> --}}
                                       </td>
                                          <td class="text-info bg-y">
                                             {{-- {{$activity->id}} --}}
                                             {{-- {{substr($activity->start, 0, 5)}}   --}}
                                             <input {{$editable == 0 ? 'readonly' : ''}} style="background-color: rgb(226, 236, 151)"   class=" input_activity_{{$activity->id}} input_activity_time_{{$activity->id}}"  type="time" name="activity_start" id="start_{{$activity->id}}" value="{{$activity->start}}">
                                          </td>
                                          <td class="text-danger bg-y">
                                             {{-- {{substr($activity->finish, 0, 5)}} --}}
                                             <input {{$editable == 0 ? 'readonly' : ''}}  style="background-color: rgb(226, 236, 151)"  class="input_activity_{{$activity->id}} input_activity_time_{{$activity->id}}"  type="time" name="activity_finish" id="finish_{{$activity->id}}" value="{{$activity->finish}}">
                                          </td>
                                          <td class="bg-y text-center">
                                             {{-- {{getTotalHours($activity->high)}} --}}
                                             <input {{$editable == 0 ? 'readonly' : ''}} style="background-color: rgb(226, 236, 151); width: 55px" class="input_activity_high_{{$activity->id}}"   placeholder="HH.mm" id="high_{{$activity->id}}" name="high" value="{{getTotalHours($activity->high)}}" type="text" >
                                          </td>
                                          <td class="bg-y">
                                             {{-- {{getTotalHours($activity->normal)}} --}}
                                             <input {{$editable == 0 ? 'readonly' : ''}} style="background-color: rgb(226, 236, 151); width: 55px" class="input_activity_normal_{{$activity->id}}"  style="width: 70px" placeholder="HH.mm" id="normal_{{$activity->id}}" name="normal" value="{{getTotalHours($activity->normal)}}" type="text" >
                                          </td>
                                          <td class="bg-y">
                                             {{-- {{getTotalHours($activity->slow)}} --}}
                                             <input {{$editable == 0 ? 'readonly' : ''}} style="background-color: rgb(226, 236, 151); width: 55px" class="input_activity_slow_{{$activity->id}}"  style="width: 70px" placeholder="HH.mm" id="slow_{{$activity->id}}" name="slow" value="{{getTotalHours($activity->slow)}}" type="text" >
                                          </td>
                                          <td class="bg-y">
                                             {{-- {{getTotalHours($activity->manu)}} --}}
                                             <input {{$editable == 0 ? 'readonly' : ''}} style="background-color: rgb(226, 236, 151); width: 55px" class="input_activity_manu_{{$activity->id}}"  style="width: 70px" placeholder="HH.mm" id="manu_{{$activity->id}}" name="manu" value="{{getTotalHours($activity->manu)}}" type="text" >
                                          </td>
                                          <td class="bg-y">
                                             {{-- {{getTotalHours($activity->idle)}} --}}
                                             <input {{$editable == 0 ? 'readonly' : ''}} style="background-color: rgb(226, 236, 151); width: 55px" class="input_activity_idle_{{$activity->id}}"  style="width: 70px" placeholder="HH.mm" id="idle_{{$activity->id}}" name="idle" value="{{getTotalHours($activity->idle)}}" type="text" >
                                          </td>
                                          <td class="bg-y">
                                             {{-- {{getTotalHours($activity->tow)}} --}}
                                             <input {{$editable == 0 ? 'readonly' : ''}} style="background-color: rgb(226, 236, 151); width: 55px" class="input_activity_tow_{{$activity->id}}"  style="width: 70px" placeholder="HH.mm" id="tow_{{$activity->id}}" name="tow" value="{{getTotalHours($activity->tow)}}" type="text" >
                                          </td>
                                          <td class="bg-y">
                                             {{-- {{getTotalHours($activity->ah)}} --}}
                                             <input {{$editable == 0 ? 'readonly' : ''}} style="background-color: rgb(226, 236, 151); width: 55px" class="input_activity_ah_{{$activity->id}}"  style="width: 70px" placeholder="HH.mm" id="ah_{{$activity->id}}" name="ah" value="{{getTotalHours($activity->ah)}}" type="text" >
                                          </td>
                                          <td class="bg-y">
                                             {{-- {{getTotalHours($activity->sb)}} --}}
                                             <input {{$editable == 0 ? 'readonly' : ''}} style="background-color: rgb(226, 236, 151); width: 55px" class="input_activity_sb_{{$activity->id}}"  style="width: 70px" placeholder="HH.mm" id="sb_{{$activity->id}}" name="sb" value="{{getTotalHours($activity->sb)}}" type="text" >
                                          </td>
                                          <td class="bg-y">
                                             <input {{$editable == 0 ? 'readonly' : ''}} style="background-color: rgb(226, 236, 151); " class="input_activity_desc_{{$activity->id}}"  style="width: 160px"  id="activity_{{$activity->id}}" name="sb" value="{{$activity->activity}}" type="text" >
                                             {{-- <textarea class="" style="width: 160px" name="" id=""  rows="1">
                                                {{$activity->activity}}
                                             </textarea> --}}
                                             
                                          </td>
                                          <td>
                                             {{-- <a href="#" class=" badge badge-danger" data-toggle="modal" data-target="#deleteActivitySpa-{{$activity->id}}"><i class="fa fa-trash"></i> Delete </a> --}}
                                          </td>
                                       
                                    </tr>

                                    <!-- Modal Delete -->

                                    {{-- <div class="modal modal-blur fade" id="deleteAct-{{$activity->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                          <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                             <div class="modal-content">

                                                <form action="{{route('vdr.delete.activity')}}" method="POST">
                                                      <div class="modal-body">
                                                         @csrf
                                                         @method('DELETE')
                                                         <input type="hidden" name="id" value="{{$activity->id}}" id="">
                                                         <div class="card-body">
                                                            @if ($errors->any())
                                                            <div class="alert alert-danger text-danger">
                                                                  <ul>
                                                                     @foreach ($errors->all() as $error)
                                                                     <li><small>{{ $error }}</small></li>
                                                                     @endforeach
                                                                  </ul>
                                                            </div>
                                                            @endif
                                                            <h4 class="text-center"> Anda yakin ingin menghapussss activity {{$activity->activity}} ?</h4>
                                                         </div>
                                                         <div class="modal-footer">
                                                            <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-danger">Ya, Saya yakin </button>
                                                         </div>
                                                      </div>
                                                </form>
                                             </div>
                                          </div>
                                    </div> --}}

                                    <!-- End Modal  -->


                                    

                                    <!-- End Modal  -->
                                    @endforeach

                                    <tr>

                                          <td colspan="3" class="text-center">Total</td>
                                          <td class="text-center"><span class="highTime">{{$vdrOperatingHigh}}</span> </td>
                                          <td class="text-center"><span class="normalTime">{{$vdrOperatingNormal}}</span> </td>
                                          <td class="text-center"><span class="slowTime">{{$vdrOperatingSlow}}</span> </td>
                                          <td class="text-center"><span class="manuTime">{{$vdrOperatingManu}}</span> </td>
                                          <td class="text-center"><span class="idleTime">{{$vdrOperatingIdle}}</span> </td>
                                          <td class="text-center"><span class="towTime">{{$vdrOperatingTow}}</span> </td>
                                          <td class="text-center"><span class="ahTime">{{$vdrOperatingAh}}</span> </td>
                                          <td class="text-center"><span class="sbTime">{{$vdrOperatingSb}}</span> </td>
                                          {{-- @foreach ($operatings as $operating)
                                          @if($operating->heading->field)
                                          <td>{{getTotalHours($operating->time)}}</td>
                                          @endif
                                          @endforeach --}}
                                    </tr>
                                 
            
            
                                 
                                 
                              </tbody>
                           </table>
                        </form>
                     </div>
                     <hr>
                     <div class="table-responsive p-2" >
                     <table class="w-100">
                       
                        <thead>
                           <tr>
                              <td colspan="5"><b class="text-primary" style="color: #1f4481 !important">Summary of Daily Operating Data</b></td>
                           </tr>
                           <tr class="text-center ">
                              {{-- <th><input type="checkbox" name="" id="checkboxAll"></th> --}}
                              <th class="">Operating Mode</th>
                              <th>Total Time</th>
                              <th>Min. Speed as Contract (Knots) <br> </th>
                              <th >Contractual Fuel Cons. </th>
                              <th>Daily Fuel Cons. </th>
                           </tr>
                        </thead>
                        <tbody>
                           
                              @foreach ($operatings as $operating)
                              <tr id="baris-{{$operating->id}}">
                                 <!-- <td> -->
                                 <input {{$editable == 0 ? 'readonly' : ''}} type="hidden" name="id[]" value="{{$operating->id}}">
                                 <input {{$editable == 0 ? 'readonly' : ''}} type="hidden" id="operating_{{$operating->id}}" value="{{$operating->id}}">
                                 <!-- </td> -->
                                 <td> {{$operating->heading->description}} </td>
                                 <td class="text-center align-middle ">
                                    <span class="time_{{$operating->heading_id}}">{{getTotalHours($operating->time)}}</span>
                                       <input {{$editable == 0 ? 'readonly' : ''}} type="text" class="time_{{$operating->heading_id}}" id="time_{{$operating->id}}" name="time[]" readonly hidden  value="{{$operating->time}}">
                                 </td>
                                 <td class="text-center align-middle bg-y">
                                       @if($operating->heading->speed == '1')
                                       <input {{$editable == 0 ? 'readonly' : ''}} style="background-color: rgb(226, 236, 151)" class="w-100 input_operating_{{$operating->id}}" type="number" id="speed_{{$operating->id}}" name="speed[]"  value="{{$operating->speed}}">
                                       @else
                                       <input {{$editable == 0 ? 'readonly' : ''}} style="background-color: rgb(226, 236, 151)" class="w-100 input_operating_{{$operating->id}}" type="hidden" id="speed_{{$operating->id}}" name="speed[]"  value="{{$operating->speed}}">
                                       @endif
                                 </td>
            
                                 <td class="text-center align-middle bg-y">
                                    <!-- {{$operating->contractual_fuel}} -->
                                       @if($operating->heading->contractual == '1')
                                       <input {{$editable == 0 ? 'readonly' : ''}} style="background-color: rgb(226, 236, 151)" class="w-100 input_operating_{{$operating->id}}" type="text" id="fuel_{{$operating->id}}" name="contractual_fuel[]"  value="{{$operating->contractual_fuel}}">
                                       @else
                                       <input {{$editable == 0 ? 'readonly' : ''}} style="background-color: rgb(226, 236, 151)" class="w-100 input_operating_{{$operating->id}}" type="hidden" id="fuel_{{$operating->id}}" name="contractual_fuel[]"  value="{{$operating->contractual_fuel}}">
                                       @endif
                                 </td>
                                 <td class="text-center ">
            
            
                                       @if($operating->heading->daily == '1')
                                       <input {{$editable == 0 ? 'readonly' : ''}} class="w-100 input_operating_{{$operating->id}}" type="text" readonly hidden id="dailyhidden_{{$operating->id}}" name="daily[]"  value="{{$operating->daily}}">
                                       <input {{$editable == 0 ? 'readonly' : ''}}  class="w-100 input_operating_{{$operating->id}} daily_{{$operating->heading_id}}" type="text" readonly id="daily_{{$operating->id}}" name="daily[]"  value="{{$operating->daily}}">
                                       @else
                                       <input {{$editable == 0 ? 'readonly' : ''}} class="w-100 input_operating_{{$operating->id}}" type="hidden" readonly id="daily_{{$operating->id}}" name="daily[]"  value="{{$operating->daily}}">
                                       @endif
                                 </td>
                              </tr>
                              @endforeach
                              <tr>
                                 <th>Total Daily</th>
                                 <th class="text-center total_jam">
                                       {{$totalJam}}
                                 </th>
                                 <th colspan="2"></th>
                                 <td class="text-center">
                                    <input {{$editable == 0 ? 'readonly' : ''}} class="w-100 total_daily"  readonly id="totalDaily"   value="{{round($totalDaily)}}">
                                       {{-- <b > <span class="totalDaily"></span> Ltrs</b>  --}}
                                       
                                 </td>
                              </tr>
            
                           
                        </tbody>
                     </table>
                     </div>
                     
                  
                  </div>
                  
                  
               </div>
               <div class="row">
                  <div class="col-md-8">
                     {{-- <div class="table-responsive overflow-auto" style="height: 100vh"> --}}
                     <table class="w-100">
                        
                        <thead>
                           <tr>
                              <td colspan="7"><b class="text-primary" style="color: #1f4481 !important">Summary of Daily Fuel, Water, and Cargoes Remaining Onboard</b></td>
                           </tr>
                           <tr class="text-center align-middle">
                              <th style="width: 120px">TYPE</th>
                              <th style="width: 100px">Opening <br> <small>(ROB from Previous Day)</small></th>
                              <th style="width: 100px" >Actual Consumption <br> <small>(Based on Actual Sounding)</small></th>
                              <th style="width: 100px">Received</th>
                              <th style="width: 100px">Transferred</th>
                              <th style="width: 100px">Closing</th>
                              <th style="width: 180px">Remarks</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($cargos as $cargo)
                              <tr>
                                 <!-- <td> -->
                                 <input {{$editable == 0 ? 'readonly' : ''}} type="hidden" name="id[]" value="{{$cargo->id}}">
                                 <input {{$editable == 0 ? 'readonly' : ''}} type="hidden" id="cargo" value="{{$cargo->id}}">
                                 <!-- </td> -->
                                 <td> {{$cargo->heading->description}} </td>
                                 <td class="text-center align-middle bg-y" >
                                       <input {{$editable == 0 ? 'readonly' : ''}} style="background-color: rgb(226, 236, 151)" class="w-100 input_cargo_{{$cargo->id}}" type="number" id="opening_{{$cargo->id}}" name="opening[]"   value="{{$cargo->opening}}">
                                 </td>
                                 
                                       @if($cargo->heading->is_consumption == '1')
                                       <td class="text-center align-middle">
                                          <input {{$editable == 0 ? 'readonly' : ''}} type="text" class="w-100 input_cargo_{{$cargo->id}} consumption_{{$cargo->id}}"  readonly id="consumption_{{$cargo->id}}" name="consumption[]"  value="{{$cargo->consumption}}">
                                          {{-- <span class="my-2 consumption">{{$cargo->consumption}}</span> --}}
                                       </td>
                                       @else
                                       <td class="" style="background-color: rgb(167, 171, 170)">
                                       <input {{$editable == 0 ? 'readonly' : ''}} type="hidden" style="width: 100px" readonly name="consumption[]"  value="{{$cargo->consumption}}">
                                       </td>
                                       @endif
                                 
                                 <td class="text-center align-middle bg-y">
                                       <input {{$editable == 0 ? 'readonly' : ''}} style="background-color: rgb(226, 236, 151)" type="number" class="w-100 input_cargo_{{$cargo->id}}" id="received_{{$cargo->id}}" name="received[]"   value="{{$cargo->received}}">
                                 </td>
                                 <td class="text-center align-middle bg-y">
                                       <input {{$editable == 0 ? 'readonly' : ''}} style="background-color: rgb(226, 236, 151)" type="number" class="w-100 input_cargo_{{$cargo->id}}" id="transferred_{{$cargo->id}}" name="transferred[]" style="width: 100px"  value="{{$cargo->transferred}}">
                                 </td>
                                 
                                    @if($cargo->heading->is_consumption == '1')
                                    <td class="text-center align-middle bg-y">
                                       <input {{$editable == 0 ? 'readonly' : ''}} type="text" style="background-color: rgb(226, 236, 151)" class="w-100 input_cargo_{{$cargo->id}}" id="closing_{{$cargo->id}}" name="closing[]" style="width: 100px"   value="{{$cargo->closing}}">
                                       @else
                                       <td class="text-center align-middle ">
                                       <span class="my-2">{{ $cargo->closing}}</span>
                                       <input {{$editable == 0 ? 'readonly' : ''}} type="text" hidden name="closing[]" style="width: 100px"   value="{{$cargo->closing}}">
                                    </td>
                                    @endif
                                 
                                 <td class="text-center align-middle bg-y"  >
                                       <input {{$editable == 0 ? 'readonly' : ''}} style="background-color: rgb(226, 236, 151)" class="w-100 input_cargo_{{$cargo->id}}" type="text" id="remark_{{$cargo->id}}" name="remarks[]"  value="{{$cargo->remarks}}">
                                 </td>
                              </tr>
                           @endforeach

                           
                        </tbody>
                     </table>

                     <hr>
                     <table class="w-100">
                        <tbody>
                           <tr>
                              <td rowspan="2"><b class="text-primary" style="color: #1f4481 !important">Periodical Fuel ROB Check/Control by Company Reps. and Surveyor</b></td>
                              <td class="text-truncate">Activity (Select Below)</td>
                              <td>ROB Check Time</td>
                              <td>ROB by VDR at Check Time</td>
                              <td>Actual ROB at Check Time</td>
                              <td>ROB Difference</td>
                           </tr>
                           <input type="number" name="periodic" id="periodic" value="{{$periodic->id}}" hidden>
                           <tr>
                              <td class="bg-y">
                                 <select style="background-color: rgb(226, 236, 151)"  class="w-100 input_periodic_b" name="period_activity" style="height: 30px; width:100px" id="period_activity" >
                                    <option {{$periodic->activity == 'Spot Check' ? 'selected' : '-'}} value="Spot Check">Spot Check</option>
                                    <option {{$periodic->activity == 'Pre-Bunker Check' ? 'selected' : '-'}} value="Pre-Bunker Check">Pre-Bunker Check</option>
                                    <option {{$periodic->activity == 'Not Applicable' ? 'selected' : '-'}} value="Not Applicable">Not Applicable</option>
                                 </select>
                              </td>
                              <td class="bg-y">
                                 <input {{$editable == 0 ? 'readonly' : ''}} style="background-color: rgb(226, 236, 151)"  class="w-100 input_periodic_b"  type="time" name="rob_time" id="period_rob_time" value="{{$periodic->rob_time}}">
                              </td>
                              
                              <td class="bg-y"><input {{$editable == 0 ? 'readonly' : ''}} style="background-color: rgb(226, 236, 151)" class="w-100 input_periodic"  type="number" name="rob_value" id="period_rob_value" value="{{$periodic->rob_value}}" ></td>
                           
                              <td class="bg-y">
                                 <input {{$editable == 0 ? 'readonly' : ''}} style="background-color: rgb(226, 236, 151)" class="w-100 input_periodic"  type="number" name="rob_actual" id="period_rob_actual" value="{{$periodic->rob_actual}}">
                              </td>
                           
                              <td>
                                 <span class="my-3 periodDiff">{{$periodic->rob_diff}}</span>
                                 <input {{$editable == 0 ? 'readonly' : ''}} class="w-100 " hidden  type="number" id="period_rob_diff" readonly value="{{$periodic->rob_diff}}">
                              </td>
                             
                           </tr>

                        </tbody>
                     </table>
                     <hr>
                     {{-- </div> --}}
                  </div>
                  <div class="col-md-4">
                     <table>
                        <thead>
                           <tr>
                              <td colspan="3"><b class="text-primary" style="color: #1f4481 !important"> Special Calculation 
                                 Applicable only for Periodical Fuel ROB Check/Control by Company Reps. and Surveyor</b> </td>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td style="width: 400px">Fuel Cons. by Remuneration or Actual, from 00:00 hours to Check Time (Manual input based on joint calculation by all parties)</td>
                              <td class="bg-y"><input {{$editable == 0 ? 'readonly' : ''}} style="background-color: rgb(226, 236, 151)" style="width: 70px" class="input_special"  type="number" name="fuel_cons_remu" id="fuel_cons_remu" value="{{$periodic->fuel_cons_remu}}"></td>
                           </tr>
                           <tr>
                              <td>Part 1: Corrected Fuel Cons. from 00:00 hours to Check Time (based on calculation by applying ROB Difference) <br>
                                 <i>Note: Refer to ROB COrrection Rules</i>
                              </td>
                              <td >
                                 <input {{$editable == 0 ? 'readonly' : ''}} class="input_special" hidden type="number" name="fuel_cons_correct" id="fuel_cons_correct" value="{{$periodic->fuel_cons_correct}}">
                                 <span class="my-2 fuel_cons_correct">{{$periodic->fuel_cons_correct}}</span>
                              </td>
                              
                           </tr>
                           <tr>
                              <td>Part 2: Actual Fuel Cons. from Check Time to 24:00 hours (manual input based on actual sounding)</td>
                              <td class="bg-y" ><input {{$editable == 0 ? 'readonly' : ''}} style="background-color: rgb(226, 236, 151)" style="width: 70px" class="input_special"  type="number" name="fuel_cons_actual" id="fuel_cons_actual" value="{{$periodic->fuel_cons_actual}}"></td>
                           </tr>
                           <tr>
                              <th>Total Actual Daily Fuel Consumption = (Part 1 + Part 2)</th>
                              <th class=" py-2">
                                 <span class="specialTotal">{{$periodic->fuel_cons_total}}</span>
                              </th>
                           </tr>
                        </tbody>

                     </table>
                  </div>
               </div>

               
               <hr>
               <div class="table-responsive ">
                  <table class="" >
                     <thead>
                        <tr>
                           <th  rowspan="2" class="text-center align-middle border-g">No</th>
                           <th  rowspan="2" class="text-center align-middle border-g">Observed Data / Indicators </th>
                           <th  rowspan="2" class="text-center align-middle border-g">Unit</th>
                           <th  colspan="6" class="text-center border-g">Main Engines Data</th>
                           <th  colspan="6" class="text-center border-g">Aux. Engines Data</th>
                        </tr>
                        <tr>
                           <th style="width: 10px"  class="border-g">Ref. Value</th>
                           <th class="border-g">Port</th>
                           <th class="border-g">Stbd</th>
                           <th class="border-g">Center</th>
                           <th class="border-g">Other</th>
                           <th class="border-g">Ref. Value</th>
                           <th class="border-g">Port</th>
                           <th class="border-g">Stbd</th>
                           <th class="border-g">Other</th>
                        </tr>
                     </thead>
                     <tbody>  
                        @foreach ($engines as $key => $engine)
                        {{-- <input type="hidden" name="id[]" value="{{$engine->id}}"> --}}
                        <input type="text" name="engine" id="engine" value="{{$engine->id}}" hidden>
                        <tr>
                           <td>{{$key+1}}</td>
                           <td class="col-md-3">{{$engine->heading->description}}</td>
                           <td>{{$engine->heading->unit}}</td>
                           <td class="bg-y">
                              <input {{$editable == 0 ? 'readonly' : ''}} class="input-bg-y input_engine_{{$engine->id}}" style="width: 70px" type="number" min="0" name="m_ref_{{$engine->id}}" id="m_ref_{{$engine->id}}" value="{{$engine->m_ref}}">
                           </td>
                           <td class="bg-y">
                              <input {{$editable == 0 ? 'readonly' : ''}} class="input-bg-y input_engine_{{$engine->id}}" style="width: 70px" type="number" min="0" name="m_port_{{$engine->id}}" id="m_port_{{$engine->id}}" value="{{$engine->m_port}}">
                           </td>
                           <td class="bg-y">
                              <input {{$editable == 0 ? 'readonly' : ''}} class="input-bg-y input_engine_{{$engine->id}}" style="width: 70px" type="number" min="0" name="m_stbd_{{$engine->id}}" id="m_stbd_{{$engine->id}}" value="{{$engine->m_stbd}}">
                           </td>
                           <td class="bg-y">
                              <input {{$editable == 0 ? 'readonly' : ''}} class="input-bg-y input_engine_{{$engine->id}}" style="width: 70px" type="number" min="0" name="m_center_{{$engine->id}}" id="m_center_{{$engine->id}}" value="{{$engine->m_center}}">
                           </td>
                           <td class="bg-y">
                              <input {{$editable == 0 ? 'readonly' : ''}} class="input-bg-y input_engine_{{$engine->id}}" style="width: 70px" type="number" min="0" name="m_other_{{$engine->id}}" id="m_other_{{$engine->id}}" value="{{$engine->m_other}}">
                           </td>
                           <td class="bg-y">
                              <input {{$editable == 0 ? 'readonly' : ''}} class="input-bg-y input_engine_{{$engine->id}}" style="width: 70px" type="number" min="0" name="a_ref_{{$engine->id}}" id="a_ref_{{$engine->id}}" value="{{$engine->a_ref}}">
                           </td>
                           <td class="bg-y">
                              <input {{$editable == 0 ? 'readonly' : ''}} class="input-bg-y input_engine_{{$engine->id}}" style="width: 70px" type="number" min="0" name="a_port_{{$engine->id}}" id="a_port_{{$engine->id}}" value="{{$engine->a_port}}">
                           </td>
                           <td class="bg-y">
                              <input {{$editable == 0 ? 'readonly' : ''}} class="input-bg-y input_engine_{{$engine->id}}" style="width: 70px" type="number" min="0" name="a_stbd_{{$engine->id}}" id="a_stbd_{{$engine->id}}" value="{{$engine->a_stbd}}">
                           </td>
                           <td class="bg-y">
                              <input {{$editable == 0 ? 'readonly' : ''}} class="input-bg-y input_engine_{{$engine->id}}" style="width: 70px" type="number" min="0" name="a_other_{{$engine->id}}" id="a_other_{{$engine->id}}" value="{{$engine->a_other}}">
                           </td>
                        </tr>
                        @endforeach
                        <tr>
                           <td colspan="9"></td>
                        </tr>
                        <tr>
                           <td colspan="9"></td>
                        </tr>

                     </tbody>
                  </table>
                  {{-- </div> --}}

                  <hr>
               
                  <div class="row">
                     <div class="col-md-6">
                        <form action="{{route('vdr.crew.delete.row')}}" method="post" >
                           @csrf
                           @method('POST')
                           <table>
                              <thead>
                                 <tr>
                                    <td colspan="3"><b class="text-primary" style="color: #1f4481 !important">Crew List</b></td>
                                 </tr>
                                 <tr>
                                    @if ($editable == 1)
                                    <td colspan="3">
                                       <a href="{{route('vdr.crew.add', enkripRambo($vdr->id))}}" style="background-color: #1f4481 !important" class="badge badge-info"><i class=" fa fa-plus"></i> Add Row</a>
                                       <button  class="badge badge-danger button" data-toggle="tooltip" data-placement="top" title="Click to delete checked crew list"  type="submit"><i class="fas fa-trash"></i> Delete</button>
                                    </td>
                                    @endif
                                    
                                    {{-- <td></td> --}}
                                    
                                 </tr>
                                 <tr>
                                    <th><input type="checkbox" name="" id="checkboxAllCrew"></th>
                                    <td>Name</td>
                                    <td>Rank</td>
                                 </tr>
                              </thead>
                              <tbody>
                                 <input type="text" name="vdr" id="vdr" value="{{$vdr->id}}" hidden>
                                 @foreach ($crews->where('is_crew', 1) as $crew)

                                 <tr>
                                    <td>
                                       <input {{$editable == 0 ? 'readonly' : ''}} type="checkbox" name="checkCrew[]" value="{{$crew->id}}" id="checkCrew-{{$crew->id}}">
                                       {{-- <input {{$editable == 0 ? 'readonly' : ''}} class="idActivity" type="checkbox" name="idActivity" id="idActivity"> --}}
                                    </td>
                                    <td class="bg-y" >
                                       {{-- {{$crew->id}} --}}
                                       <input {{$editable == 0 ? 'readonly' : ''}}  style="background-color: rgb(226, 236, 151); text-align: left !important;" class="w-100 input_crew_{{$crew->id}}" type="text"  id="crew_name_{{$crew->id}}"  value="{{$crew->name}} ">
                                    </td>
                                    <td class="bg-y">
                                       <input {{$editable == 0 ? 'readonly' : ''}} style="background-color: rgb(226, 236, 151); text-align: left !important;" class="w-100 input_crew_{{$crew->id}}" type="text"  id="crew_rank_{{$crew->id}}"  value="{{$crew->rank}} ">
                                    </td>
                                    
                                 </tr>

                                 

                                 
                                 @endforeach

                                 <tr>
                                    <td colspan="3"></td>
                                 </tr>
                                 <tr>
                                    <td colspan="3"></td>
                                 </tr>
                                 
                              </tbody>
                           </table>
                        </form>
                     </div>

                     <div class="col-md-6">
                        <form action="{{route('vdr.pax.delete.row')}}" method="post" >
                           @csrf
                           @method('POST')
                           <table>
                              <thead>
                                 <tr>
                                    <td colspan="3"><b class="text-primary" style="color: #1f4481 !important">Pax List</b></td>
                                 </tr>
                                 <tr>
                                    <td colspan="3">
                                       @if ($editable == 1)
                                          
                                       
                                       <a href="{{route('vdr.pax.add', enkripRambo($vdr->id))}}" style="background-color: #1f4481 !important" class="badge badge-info"><i class=" fa fa-plus"></i> Add Row</a>
                                       <button  class="badge badge-danger button" data-toggle="tooltip" data-placement="top" title="Click to delete checked pax list"  type="submit"><i class="fas fa-trash"></i> Delete</button>
                                       @endif
                                       {{-- <button  class="badge badge-danger button" data-toggle="tooltip" data-placement="top" title="Click to delete checked activity list"  type="submit"><i class="fas fa-trash"></i> Delete</button> --}}
                                    </td>
                                 </tr>
                                 <tr>
                                    <th><input type="checkbox" name="" id="checkboxAllPax"></th>
                                    <td>Name</td>
                                    <td>Company</td>
                                 </tr>
                              </thead>
                              <tbody>
                                 <input type="text" name="vdr" id="vdr" value="{{$vdr->id}}" hidden>
                                 @foreach ($crews->where('is_crew', 0) as $pax)
                                 <tr>
                                    <td>
                                       <input {{$editable == 0 ? 'readonly' : ''}} type="checkbox" name="checkPax[]" value="{{$pax->id}}" id="checkPax-{{$pax->id}}">
                                       {{-- <input {{$editable == 0 ? 'readonly' : ''}} class="idActivity" type="checkbox" name="idActivity" id="idActivity"> --}}
                                    </td>
                                    <td class="bg-y">
                                       <input {{$editable == 0 ? 'readonly' : ''}} style="background-color: rgb(226, 236, 151); text-align: left !important;" class="w-100 input_pax_{{$pax->id}}" type="text"  id="crew_name_{{$pax->id}}"  value="{{$pax->name}} ">
                                    </td>
                                    <td class="bg-y">
                                       <input {{$editable == 0 ? 'readonly' : ''}} style="background-color: rgb(226, 236, 151); text-align: left !important;" class="w-100 input_pax_{{$pax->id}}" type="text"  id="crew_company_{{$pax->id}}"  value="{{$pax->company}} ">
                                    </td>
                                    {{-- <td>
                                       <a href="#" class="text-danger" data-toggle="modal" data-target="#deleteCrew-{{$pax->id}}"> Delete </a>
                                    </td> --}}
                                 </tr>

                                 
                                 @endforeach

                                 <tr>
                                    <td colspan="3"></td>
                                 </tr>
                                 <tr>
                                    <td colspan="3"></td>
                                 </tr>
                                 
                              </tbody>
                           </table>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

   </div>
</section>

@if (auth()->user()->hasRole('marine|suptent_loc') || auth()->user()->hasRole('pet') || auth()->user()->hasRole('suptent')|| auth()->user()->hasRole('chief'))
   <div class="modal fade" id="modalEditApproval" tabindex="-1" role="dialog"  aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
         <form action="{{route('vdr.update.approval')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$vdr->id}}" id="">
            <input type="hidden" name="vessel_id" value="{{$vessel->id}}" id="">
            <input type="hidden" name="created_by" value="{{$user->name}}">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Form Edit VDR Approval</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  

                  {{-- <div class="badge badge-info">Approval 1</div> --}}
                  <div class="row mb-2">
                     <div class="col-md-2">
                        
                        <div class="form-group">
                           <label for="level1">Level </label>
                           <input class="form-control" id="level1" name="level1" type="text" value="1" readonly >
                           
                        </div>
                     </div>
                     <div class="col-md-4">
                        
                        <div class="form-group">
                           <label for="title1">Title </label>
                           <input class="form-control" id="title1" name="title1" type="text" value="{{$vdr->title1}}" >
                           @error('title1')
                              <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="name1">Name </label>
                           <input class="form-control" id="name1" name="name1" type="text" value="{{$vdr->name1}}" >
                           @error('name1')
                              <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                           @enderror
                        </div>
                     </div>
                  </div>

                  {{-- <div class="badge badge-info">Approval 2</div> --}}
                  <div class="row mb-2">
                     <div class="col-md-2">
                        
                        <div class="form-group">
                           <label for="level2">Level </label>
                           <input class="form-control" id="level2" name="level2" type="text" value="2" readonly >
                           
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="title2">Title </label>
                           <input class="form-control" id="title2" name="title2" type="text" value="{{$vdr->title2}}" >
                           @error('title2')
                              <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="name2">Name </label>
                           <input class="form-control" id="name2" name="name2" type="text" value="{{$vdr->name2}}" >
                           @error('name2')
                              <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                           @enderror
                        </div>
                     </div>
                  </div>

                  {{-- <div class="badge badge-info">Approval 3</div> --}}
                  <div class="row">
                     <div class="col-md-2">
                        
                        <div class="form-group">
                           <label for="level3">Level </label>
                           <input class="form-control" id="level3" name="level3" type="text" value="3" readonly >
                           
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="title3">Title </label>
                           <input class="form-control" id="title3" name="title3" type="text" value="{{$vdr->title3}}" >
                           @error('title3')
                              <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="name3">Name </label>
                           <input class="form-control" id="name3" name="name3" type="text" value="{{$vdr->name3}}" >
                           @error('name3')
                              <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                           @enderror
                        </div>
                     </div>
                  </div>
                  <hr>

                  
                  
               </div>
               <div class="modal-footer bg-whitesmoke">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Update</button>
               </div>
            </div>
         </form>
      </div>
   </div>
   <div class="modal fade" id="modalAppPet" tabindex="-1" role="dialog"  aria-hidden="true">
      <div class="modal-dialog " role="document">
         <form action="{{route('vdr.approve.pet')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$vdr->id}}" id="">
            <input type="hidden" name="vessel_id" value="{{$vessel->id}}" id="">
            <input type="hidden" name="created_by" value="{{$user->name}}">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Form Approve VDR</h5>

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
                  
               </div>
               <div class="modal-body">
                  
                  <b>{{$vdr->code}}</b>
                  <hr>
                  {{-- <div class="badge badge-info">Approval 1</div> --}}
                  <div class="row ">
                     
                     <div class="col-6">
                        
                       
                           <select hidden name="title1" id="title1" required>
                              <option value="Fuel Monitoring Team" selected>Fuel Monitoring Team</option>
                              {{-- <option value="PET Kalijapat">PET Kalijapat</option> --}}
                              {{-- <option value="PET SBU">PET SBU</option>
                              <option value="PET CBU">PET CBU</option>
                              <option value="PET NBU">PET NBU</option> --}}
                           </select>
                          
                        
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="title1">PIC PET</label>
                           <select class="form-control" name="name1" id="name1" required>
                              <option value="YFH">Yusuf Falah Hibatullah</option>
                              <option value="SW">Setyo Wiyono</option>
                              <option value="R">Radit</option>
                           </select>
                          
                        </div>
                     </div>
                     {{-- <div class="col-12">
                        <div class="form-group">
                           <label for="name1">Name </label>
                           <input class="form-control" id="name1" name="name1" required type="text" value="{{$vdr->name1}}" >
                           @error('name1')
                              <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                           @enderror
                        </div>
                     </div> --}}
                  </div>


                  
                  
               </div>
               <div class="modal-footer bg-whitesmoke">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-info">Approve</button>
               </div>
            </div>
         </form>
      </div>
   </div>
   <div class="modal fade" id="modalAppMarine" tabindex="-1" role="dialog"  aria-hidden="true">
      <div class="modal-dialog" role="document">
         <form action="{{route('vdr.approve.marine.form')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="vdr" value="{{$vdr->id}}" id="vdr">
            <input type="hidden" name="vessel_id" value="{{$vessel->id}}" id="">
            <input type="hidden" name="created_by" value="{{$user->name}}">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Form Approve VDR</h5>

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
                  
               </div>
               <div class="modal-body">
                  
                  <b>{{$vdr->code}}</b>
                  <hr>
                  {{-- <div class="badge badge-info">Approval 1</div> --}}
                  <div class="row mb-2">
                     
                     <div class="col-md-12">
                        
                        
                        <div class="form-group">
                           <label for="name2">PIC Marine</label>
                           <select class="form-control" name="name2" id="name2" required>
                              <option value="UA">Umar Agam</option>
                              <option value="RH">Rezky Hardanto</option>
                              <option value="MMH">Muhammad Misbakhul Hasan</option>
                              
                           </select>
                          
                        </div>
                        <hr>
                        <small>Inisal nama PIC yang dipilih akan ditampilkan pada Preview PDF VDR</small>
                     </div>
                     {{-- <div class="col-12">
                        <div class="form-group">
                           <label for="name1">Name </label>
                           <input class="form-control" id="name1" name="name1" required type="text" value="{{$vdr->name1}}" >
                           @error('name1')
                              <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                           @enderror
                        </div>
                     </div> --}}
                  </div>


                  
                  
               </div>
               <div class="modal-footer bg-whitesmoke">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-info">Approve</button>
               </div>
            </div>
         </form>
      </div>
   </div>
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
               <b>{{$vdr->code}}</b>
                  <hr>
               <div class="form-row">
                  <div class="form-group col-md-12">
                     <label for="desc">Description</label>
                     <input type="text" class="form-control text-left" id="desc" name="desc" >
                  </div>
               </div>
               <small>VDR akan dikembalikan ke pihak Kapal {{$vdr->vessel->name}} untuk dilakukan perbaikan</small>
            </div>
            <div class="modal-footer bg-whitesmoke">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-danger">Reject</button>
            </div>
         </div>
         </form>
      </div>
   </div>

   <div class="modal fade" id="modalAppSuptentLoc" tabindex="-1" role="dialog"  aria-hidden="true">
      <div class="modal-dialog" role="document">
         <form action="{{route('vdr.approve.suptent.loc.form')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="vdr" value="{{$vdr->id}}" id="vdr">
            <input type="hidden" name="vessel_id" value="{{$vessel->id}}" id="">
            <input type="hidden" name="created_by" value="{{$user->name}}">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Form Approve VDR</h5>

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
                  
               </div>
               <div class="modal-body">
                  
                  <b>{{$vdr->code}}</b>
                  <hr>
                  {{-- <div class="badge badge-info">Approval 1</div> --}}
                  <p>Selanjutnya VDR akan di validasi Marine Representative</p>
                  <div class="row mb-2">
                     
                     {{-- <div class="col-md-12">
                        
                        
                        <div class="form-group">
                           <label for="name2">PIC Marine</label>
                           <select class="form-control" name="name2" id="name2" required>
                              <option value="UA">Umar Agam</option>
                              <option value="RH">Rezky Hardanto</option>
                              <option value="MMH">Muhammad Misbakhul Hasan</option>
                              
                           </select>
                          
                        </div>
                        <hr>
                        <small>Inisal nama PIC yang dipilih akan ditampilkan pada Preview PDF VDR</small>
                     </div> --}}
                     {{-- <div class="col-12">
                        <div class="form-group">
                           <label for="name1">Name </label>
                           <input class="form-control" id="name1" name="name1" required type="text" value="{{$vdr->name1}}" >
                           @error('name1')
                              <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                           @enderror
                        </div>
                     </div> --}}
                  </div>


                  
                  
               </div>
               <div class="modal-footer bg-whitesmoke">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-info">Approve</button>
               </div>
            </div>
         </form>
      </div>
   </div>
   <div class="modal fade" id="vdr-reject-suptent-loc" tabindex="1" role="dialog" aria-hidden="true">
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
               <b>{{$vdr->code}}</b>
                  <hr>
               <div class="form-row">
                  <div class="form-group col-md-12">
                     <label for="desc">Description</label>
                     <input type="text" class="form-control text-left" id="desc" name="desc" >
                  </div>
               </div>
               <small>VDR akan dikembalikan ke pihak Kapal {{$vdr->vessel->name}} untuk dilakukan perbaikan</small>
            </div>
            <div class="modal-footer bg-whitesmoke">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-danger">Reject</button>
            </div>
         </div>
         </form>
      </div>
   </div>





   <div class="modal fade" id="vdr-approve-marine" tabindex="1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
         
         
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Approve this VDR ?</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <hr>
            </div>
            <div class="modal-footer bg-whitesmoke">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <a href="{{route('vdr.approve.marine', enkripRambo($vdr->id))}}"  class="btn btn-info">Approve</a>
            </div>
         </div>
      </div>
   </div>
   <div class="modal fade" id="vdr-approve-marine" tabindex="1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
         
         
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Approve this VDR ?</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <hr>
            </div>
            <div class="modal-footer bg-whitesmoke">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <a href="{{route('vdr.approve.luthfi', enkripRambo($vdr->id))}}"  class="btn btn-info">Approve</a>
            </div>
         </div>
      </div>
   </div>
   
    @else
      @foreach ($crews as $crew)
         <div class="modal fade" id="deleteCrew-{{$crew->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog" role="document">
               <form action="{{route('vdr.delete.crew.spa')}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <input type="hidden" name="id" value="{{$crew->id}}" id="">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title">Delete Crew </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <div class="modal-body">
                        <span>Anda yakin ingin menghapus crew <span class="text-danger">{{$crew->name}} </span> ?</span>
                     </div>
                     <div class="modal-footer bg-whitesmoke">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>

         <div class="modal fade" id="editCrew-{{$crew->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog" role="document">
               <form action="{{route('vdr.update.crew')}}" method="POST">
                  @csrf
                  @method('PUT')
                  <input type="hidden" name="id" value="{{$crew->id}}" id="">
                  <input type="hidden" name="vdr_id" value="{{$vdr->id}}" id="">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title">Delete Crew </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <div class="modal-body">
                        <div class="form-group">
                           <label for="name">Name</label>
                           <input class="form-control" id="name" name="name" type="text" value="{{$crew->name}}" >
                           @error('name')
                              <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                           @enderror
                        </div>

                        <div class="row">
                           <div class="col-md-6">
                              <div class="form mb-3">
                                 <input type="radio" id="is_crew" {{$crew->is_crew == 1 ? 'checked' : ''}} value="1" class="crew" name="is_crew"> Crew
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form mb-3">
                                 <input type="radio" id="is_crew" {{$crew->is_crew == 0 ? 'checked' : ''}} class="passenger" name="is_crew"> Passenger
                              </div>
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="form-group col-md-12">
                              <label for="rank">Rank</label>
                              <input class="form-control" id="rank" name="rank" type="text" value="{{$crew->rank}}">
                              @error('rank')
                                 <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                              @enderror
                           </div>
                           <div class="form-group col-md-12">
                              <label for="company">Company</label>
                              <input class="form-control" id="company" name="company" type="text" value="{{$crew->company}}">
                              @error('company')
                                 <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                              @enderror
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer bg-whitesmoke">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      @endforeach
      <x-vdr.activity-modal :activities="$activities" :user="$user" :vdr="$vdr" :vessel="$vessel"/>

    
@endif


<x-vdr.crew-modal :crews="$crews" :user="$user" :vdr="$vdr" :vessel="$vessel"/>

@push('weather')
    @foreach ($weathers as $w)
        <script>
            $(document).ready(function() {
               $(".input_weather_" + '{!! $w->id !!}').keyup(function () {
                  console.log('weather');
                  var vdr = $('#vdr').val();
                  var weather = '{!! $w->id !!}';
                  var t6 = $('#t_0006_' + '{!! $w->id !!}').val();
                  var t12 = $('#t_0612_' + '{!! $w->id !!}').val();
                  var t18 = $('#t_1218_' + '{!! $w->id !!}').val();
                  var t24 = $('#t_1824_' + '{!! $w->id !!}').val();
                  
                  // console.log(weather);

                  var _token = $('meta[name="csrf-token"]').attr('content');
                  $.ajax({
                     url: "/fetch/vdr/update/weather/" + vdr + "/" + weather +  "/"  + t6 + "/" + t12 +  "/"  + t18 + "/" + t24 ,
                     method: "GET",
                     dataType: 'json',

                     success: function(result) {
                        console.log('result :' + result.result);
                        
                     },
                     error: function(error) {
                        console.log(error)
                     }

                  })
               });
            });
        </script>
    @endforeach
@endpush  

@push('hsse')
   @foreach ($hses as $hse)
   <script>
      $(document).ready(function() {
         var prev = $('#previous_' + '{!! $hse->id !!}').val();
         var today = $('#today_' + '{!! $hse->id !!}').val();
         
         $(".input_hsse_" + '{!! $hse->id !!}').keyup(function () {
            console.log('hsse');
            var vdr = $('#vdr').val();
            var hsse = '{!! $hse->id !!}';
            var prev = $('#previous_' + '{!! $hse->id !!}').val();
            var today = $('#today_' + '{!! $hse->id !!}').val();
            
            
            console.log(hsse);

            var _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
               url: "/fetch/vdr/update/hsse/" + vdr + "/" + hsse +  "/"  + prev + "/" + today,
               method: "GET",
               dataType: 'json',

               success: function(result) {
                  $("#hse_month_" + '{!! $hse->id !!}').val(result.month);
                  console.log('result :' + result.result);
                  
               },
               error: function(error) {
                  console.log(error)
               }

            })
         });

         $("#hse_month_" + '{!! $hse->id !!}').val(parseInt(prev)+parseInt(today));
      });
  </script>
   @endforeach
@endpush

@push('operating')
   @foreach ($operatings as $op)
      <script>
         $(document).ready(function() {
         // var prev = $('#previous_' + '{!! $hse->id !!}').val();
         // var today = $('#today_' + '{!! $hse->id !!}').val();
         
         $(".input_operating_" + '{!! $op->id !!}').keyup(function () {
            console.log('operating');
            var vdr = $('#vdr').val();
            var op = '{!! $op->id !!}';
            var time = $('#time_' + '{!! $op->id !!}').val();
            var minspeed = $('#speed_' + '{!! $op->id !!}').val();
            var contractfuel = $('#fuel_' + '{!! $op->id !!}').val();
            
            
            console.log(time);

            
            var timeValue = parseFloat(time) || 0;
            let bulat = Math.floor(timeValue);
            let desimal = timeValue - bulat;

            // console.log((desimal * 100) / 60);

            // Dapatkan nilai dari input contractual_fuel[]
            var contractualFuelValue = parseFloat(contractfuel) || 0;

            // console.log(contractualFuelValue);
            let a = bulat * contractualFuelValue;
            let b = ((desimal * 100) / 60) * contractualFuelValue;
            // Hitung hasil perkalian
            var result = a + b;
            console.log(result);
            

            // Set hasil perkalian ke input daily[]
            $('#dailyhidden_' + '{!! $op->id !!}').val(result);


            var daily = $('#daily_' + '{!! $op->id !!}').val();
            var dailyhidden = $('#dailyhidden_' + '{!! $op->id !!}').val();


            var _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
               url: "/fetch/vdr/update/operating/" + vdr + "/" + op +  "/"  + minspeed + "/" + contractfuel + "/" + dailyhidden,
               method: "GET",
               dataType: 'json',

               success: function(result) {
                  $('#daily_' + '{!! $op->id !!}').val(result.daily);

                  $("#totalDaily").val(result.totalDaily);
                  console.log('result :' + result.totalDaily);
                  
               },
               error: function(error) {
                  console.log(error)
               }

            })
         });

         // $("#hse_month_" + '{!! $hse->id !!}').val(parseInt(prev)+parseInt(today));
      });
      </script>
   @endforeach
@endpush

@push('cargo')
    @foreach ($cargos as $cargo)
    <script>
      $(document).ready(function() {
      
      $(".input_cargo_" + '{!! $cargo->id !!}').keyup(function () {
         console.log('operating');
         var vdr = $('#vdr').val();
         var cargo = '{!! $cargo->id !!}';
         var opening = $('#opening_' + '{!! $cargo->id !!}').val();
         var consumption = $('#consumption_' + '{!! $cargo->id !!}').val();
         var received = $('#received_' + '{!! $cargo->id !!}').val();
         var transferred = $('#transferred_' + '{!! $cargo->id !!}').val();
         var closing = $('#closing_' + '{!! $cargo->id !!}').val();
         var remark = $('#remark_' + '{!! $cargo->id !!}').val();

         if (remark === '') {
            remark = '-';
         }
         
         
         
         console.log(remark);

         // var closing = (opening + received) - (consumption + transferred);
         // // Tampilkan hasil perhitungan di kolom Closing
         // $(".closing_" + '{!! $cargo->id !!}').val(closing);

        



         var _token = $('meta[name="csrf-token"]').attr('content');
         $.ajax({
            url: "/fetch/vdr/update/cargo/" + vdr + "/" + cargo +  "/"  + opening + "/" + consumption + "/" + received + "/" + transferred + "/" + closing + "/" + remark,
            method: "GET",
            dataType: 'json',

            success: function(result) {
               $('.consumption_' + '{!! $cargo->id !!}').val(result.consumption);
               console.log('result :' + result.consumption);
               
            },
            error: function(error) {
               console.log(error)
            }

         })
      });

      // $("#hse_month_" + '{!! $hse->id !!}').val(parseInt(prev)+parseInt(today));
   });
   </script>
    @endforeach
@endpush

@push('periodic')
   <script>
      $(document).ready(function() {
      
      $(".input_periodic").keyup(function () {
         console.log('periodic');
         var vdr = $('#vdr').val();
         var periodic = $('#periodic').val();
         var periodActivity = $('#period_activity').val();
         var periodTime = $('#period_rob_time').val();
         var periodValue = $('#period_rob_value').val();
         var periodActual = $('#period_rob_actual').val();
        
         if (periodValue === '' ) {
            // $('.specialTotal').html(0);
            console.log('value kosong');
            periodValue = 0;
            $('#period_rob_diff').val(0)
         } 

         if (periodActual === '' ) {
            // $('.specialTotal').html(0);
            // console.log('kosong');
            periodActual = 0;
            $('#period_rob_diff').val(0)
         } 
         
         
         console.log(periodTime);
         var periodDiff = parseInt(periodActual) - parseInt(periodValue);
         $('#period_rob_diff').val(periodDiff)
         // $('.period_rob_diff').val(periodDiff)

         

         // var closing = (opening + received) - (consumption + transferred);
         // // Tampilkan hasil perhitungan di kolom Closing
         // $(".closing_" + '{!! $cargo->id !!}').val(closing);

      



         var _token = $('meta[name="csrf-token"]').attr('content');
         $.ajax({
            url: "/fetch/vdr/update/periodic/" + vdr + "/" + periodic +  "/"  + periodActivity + "/" + periodTime + "/" + periodValue + "/" + periodActual + "/" + periodDiff,
            method: "GET",
            dataType: 'json',

            success: function(result) {
               $('.periodDiff').html(periodDiff);
               console.log('result :' + periodDiff);
               
            },
            error: function(error) {
               console.log(error)
            }

         })
      });

      $(".input_periodic_b").change(function () {
         console.log('periodic');
         var vdr = $('#vdr').val();
         var periodic = $('#periodic').val();
         var periodActivity = $('#period_activity').val();
         var periodTime = $('#period_rob_time').val();
         var periodValue = $('#period_rob_value').val();
         var periodActual = $('#period_rob_actual').val();
        
         


         
         
         
         
         console.log(periodTime);
         var periodDiff = parseInt(periodActual) - parseInt(periodValue);
         $('#period_rob_diff').val(periodDiff)
         // $('.period_rob_diff').val(periodDiff)

         
         if (periodValue === '' ) {
            // $('.specialTotal').html(0);
            console.log('value kosong');
            periodValue = 0;
            periodDiff = 0
         } 

         if (periodActual === '' ) {
            // $('.specialTotal').html(0);
            // console.log('kosong');
            periodActual = 0;
            periodDiff = 0
         } 

         if (periodActivity === 'Not Applicable' ) {
            // $('.specialTotal').html(0);
            console.log(periodActivity);
            $('#period_rob_time').val('00:00:00');
            // console.log($('#period_rob_time').val())
         } 

         // if ($('#period_rob_time').val() === '') {
         //    $periodTime = '';
         // }
         

      



         var _token = $('meta[name="csrf-token"]').attr('content');
         $.ajax({
            url: "/fetch/vdr/update/periodic/" + vdr + "/" + periodic +  "/"  + periodActivity + "/" + periodTime + "/" + periodValue + "/" + periodActual + "/" + periodDiff,
            method: "GET",
            dataType: 'json',

            success: function(result) {
               $('.periodDiff').html(periodDiff);
               console.log('time :' + result.result);
               
            },
            error: function(error) {
               console.log(error)
            }

         })
      });

      // $("#hse_month_" + '{!! $hse->id !!}').val(parseInt(prev)+parseInt(today));
   });
   </script>
    
@endpush

@push('special')
   <script>
      $(document).ready(function() {
      
      $(".input_special").keyup(function () {
         console.log('special');
         var vdr = $('#vdr').val();
         var periodic = $('#periodic').val();
         var remu = $('#fuel_cons_remu').val();
         var correct = $('#fuel_cons_correct').val();
         var actual = $('#fuel_cons_actual').val();
         // var periodActual = $('#period_rob_actual').val();

         var periodDiff = $('#period_rob_diff').val()

        
         // $('#period').val(periodDiff)
        
         
         
         
         // console.log(periodTime);
         var correctValue = parseInt(remu) - parseInt(periodDiff);
         $('#fuel_cons_correct').val(correctValue)
         $('.fuel_cons_correct').html(correctValue)


         var specialTotal = parseInt(correctValue) + parseInt(actual);

         // var closing = (opening + received) - (consumption + transferred);
         // // Tampilkan hasil perhitungan di kolom Closing
         // $(".closing_" + '{!! $cargo->id !!}').val(closing);
         // console.log(remu);
         if (remu === '' ) {
            // $('.specialTotal').html(0);
            console.log('kosong');
            remu = 0;
            $('#fuel_cons_correct').val(0);
            specialTotal = 0;
         } 

         if (actual === '' ) {
            // $('.specialTotal').html(0);
            console.log('kosong');
            actual = 0;
            specialTotal = 0;
         } 



         var _token = $('meta[name="csrf-token"]').attr('content');
         $.ajax({
            url: "/fetch/vdr/update/special/" + vdr + "/" + periodic +  "/"  + remu + "/" + correct + "/" + actual + "/" + specialTotal ,
            method: "GET",
            dataType: 'json',

            success: function(result) {
               $('.specialTotal').html(specialTotal);
               console.log('result :' + specialTotal);
               
            },
            error: function(error) {
               console.log(error);
               $('.specialTotal').html(0);
            }

         })
      });

      // $("#hse_month_" + '{!! $hse->id !!}').val(parseInt(prev)+parseInt(today));
   });
   </script>
    
@endpush

@push('activity')
    @foreach ($activities as $act)
      <script>
         $(document).ready(function() {
         
            $(".input_activity_" + '{!! $act->id !!}').keyup(function () {
               console.log('activity');
               var vdr = $('#vdr').val();
               var act = '{!! $act->id !!}';
               var start = $('#start_' + '{!! $act->id !!}').val();
               var finish = $('#finish_' + '{!! $act->id !!}').val();
               var high = $('#high_' + '{!! $act->id !!}').val();
               var normal = $('#normal_' + '{!! $act->id !!}').val();
               var slow = $('#slow_' + '{!! $act->id !!}').val();
               var manu = $('#manu_' + '{!! $act->id !!}').val();
               var idle = $('#idle_' + '{!! $act->id !!}').val();
               var tow = $('#tow_' + '{!! $act->id !!}').val();
               var ah = $('#ah_' + '{!! $act->id !!}').val();
               var sb = $('#sb_' + '{!! $act->id !!}').val();
               var activity = $('#activity_' + '{!! $act->id !!}').val();
               
               
               
               console.log('value : ' + normal);

               

               var _token = $('meta[name="csrf-token"]').attr('content');
               $.ajax({
                  url: "/fetch/vdr/update/activity/" + vdr + "/" + act +  "/"  + start + "/" + finish + "/" + high + "/" + normal + "/" + slow + "/" + manu  + "/"  + idle + "/" + tow + "/" + ah + "/" + sb + "/" + activity,
                  method: "GET",
                  dataType: 'json',

                  success: function(result) {
                     $('.highTime').html(result.highTime);
                     $('.normalTime').html(result.normalTime);
                     $('.slowTime').html(result.slowTime);
                     $('.idleTime').html(result.idleTime);
                     $('.manuTime').html(result.manuTime);
                     $('.towTime').html(result.towTime);
                     $('.ahTime').html(result.ahTime);
                     $('.sbTime').html(result.sbTime);

                     console.log('daily :' + result.vdrOperatingHigh.daily);

                     $('.time_' + result.vdrOperatingHigh.heading_id).val(result.vdrOperatingHigh.time);
                     $('.time_' + result.vdrOperatingHigh.heading_id).html(result.vdrOperatingHigh.time);
                     $('.daily_' + result.vdrOperatingHigh.heading_id).val(result.vdrOperatingHigh.daily);

                     $('.time_' + result.vdrOperatingNormal.heading_id).val(result.vdrOperatingNormal.time);
                     $('.time_' + result.vdrOperatingNormal.heading_id).html(result.vdrOperatingNormal.time);
                     $('.daily_' + result.vdrOperatingNormal.heading_id).val(result.vdrOperatingNormal.daily);

                     $('.time_' + result.vdrOperatingSlow.heading_id).val(result.vdrOperatingSlow.time);
                     $('.time_' + result.vdrOperatingSlow.heading_id).html(result.vdrOperatingSlow.time);
                     $('.daily_' + result.vdrOperatingSlow.heading_id).val(result.vdrOperatingSlow.daily);

                     $('.time_' + result.vdrOperatingManu.heading_id).val(result.vdrOperatingManu.time);
                     $('.time_' + result.vdrOperatingManu.heading_id).html(result.vdrOperatingManu.time);
                     $('.daily_' + result.vdrOperatingManu.heading_id).val(result.vdrOperatingManu.daily);

                     $('.time_' + result.vdrOperatingIdle.heading_id).val(result.vdrOperatingIdle.time);
                     $('.time_' + result.vdrOperatingIdle.heading_id).html(result.vdrOperatingIdle.time);
                     $('.daily_' + result.vdrOperatingIdle.heading_id).val(result.vdrOperatingIdle.daily);

                     $('.time_' + result.vdrOperatingTow.heading_id).val(result.vdrOperatingTow.time);
                     $('.time_' + result.vdrOperatingTow.heading_id).html(result.vdrOperatingTow.time);
                     $('.daily_' + result.vdrOperatingTow.heading_id).val(result.vdrOperatingTow.daily);

                     $('.time_' + result.vdrOperatingAh.heading_id).val(result.vdrOperatingAh.time);
                     $('.time_' + result.vdrOperatingAh.heading_id).html(result.vdrOperatingAh.time);
                     $('.daily_' + result.vdrOperatingAh.heading_id).val(result.vdrOperatingAh.daily);

                     $('.time_' + result.vdrOperatingSb.heading_id).val(result.vdrOperatingSb.time);
                     $('.time_' + result.vdrOperatingSb.heading_id).html(result.vdrOperatingSb.time);
                     $('.daily_' + result.vdrOperatingSb.heading_id).val(result.vdrOperatingSb.daily);

                     $('.total_jam').html(result.totalJam);
                     
                  },
                  error: function(error) {
                     console.log(error)
                  }

               })
            });

            $(".input_activity_time_" + '{!! $act->id !!}').change(function () {
               console.log('activity');
               var vdr = $('#vdr').val();
               var act = '{!! $act->id !!}';
               var start = $('#start_' + '{!! $act->id !!}').val();
               var finish = $('#finish_' + '{!! $act->id !!}').val();
               
               
               
               
               console.log('VDR : ' + vdr);

               

               var _token = $('meta[name="csrf-token"]').attr('content');
               $.ajax({
                  url: "/fetch/vdr/update/time/activity/" + vdr + "/" + act +  "/"  + start + "/" + finish ,
                  method: "GET",
                  dataType: 'json',

                  success: function(result) {
                     

                     console.log('time :' + result.result);
                     
                  },
                  error: function(error) {
                     console.log(error)
                  }

               })
            });




            $(".input_activity_high_" + '{!! $act->id !!}').keyup(function () {
               console.log('activity');
               var vdr = $('#vdr').val();
               var act = '{!! $act->id !!}';
               var high = $('#high_' + '{!! $act->id !!}').val();
            
               
               console.log('high : ' + high);
         
               var _token = $('meta[name="csrf-token"]').attr('content');
               $.ajax({
                  url: "/fetch/vdr/update/high/activity/" + vdr + "/" + act +  "/"   + high ,
                  method: "GET",
                  dataType: 'json',

                  success: function(result) {
                     $('.highTime').html(result.vdrOperatingHigh.time);
                     

                     console.log('time high :' + result.vdrOperatingHigh.time);

                     $('.time_' + result.vdrOperatingHigh.heading_id).val(result.vdrOperatingHigh.time);
                     $('.time_' + result.vdrOperatingHigh.heading_id).html(result.vdrOperatingHigh.time);
                     $('.daily_' + result.vdrOperatingHigh.heading_id).val(result.vdrOperatingHigh.daily);

                     $('.total_jam').html(result.totalJam);
                     $('.total_daily').val(result.totalDaily);


                     
                  },
                  error: function(error) {
                     console.log(error)
                  }

               })
            });

            $(".input_activity_normal_" + '{!! $act->id !!}').keyup(function () {
               console.log('activity');
               var vdr = $('#vdr').val();
               var act = '{!! $act->id !!}';
               var normal = $('#normal_' + '{!! $act->id !!}').val();
               
               console.log('normal : ' + normal);
            
               var _token = $('meta[name="csrf-token"]').attr('content');
               $.ajax({
                  url: "/fetch/vdr/update/normal/activity/" + vdr + "/" + act +  "/"   + normal ,
                  method: "GET",
                  dataType: 'json',

                  success: function(result) {
                     $('.normalTime').html(result.vdrOperatingNormal.time);
                     console.log('time normal :' + result.vdrOperatingNormal.time);
                     $('.time_' + result.vdrOperatingNormal.heading_id).val(result.vdrOperatingNormal.time);
                     $('.time_' + result.vdrOperatingNormal.heading_id).html(result.vdrOperatingNormal.time);
                     $('.daily_' + result.vdrOperatingNormal.heading_id).val(result.vdrOperatingNormal.daily);

                     $('.total_jam').html(result.totalJam);
                     $('.total_daily').val(result.totalDaily);
                  },
                  error: function(error) {
                     console.log(error)
                  }

               })
            });

            $(".input_activity_slow_" + '{!! $act->id !!}').keyup(function () {
               console.log('activity');
               var vdr = $('#vdr').val();
               var act = '{!! $act->id !!}';
               var slow = $('#slow_' + '{!! $act->id !!}').val();
               
               console.log('slow : ' + slow);
            
               var _token = $('meta[name="csrf-token"]').attr('content');
               $.ajax({
                  url: "/fetch/vdr/update/slow/activity/" + vdr + "/" + act +  "/"   + slow ,
                  method: "GET",
                  dataType: 'json',

                  success: function(result) {
                     $('.slowTime').html(result.vdrOperatingSlow.time);
                     console.log('time slow :' + result.vdrOperatingSlow.time);
                     $('.time_' + result.vdrOperatingSlow.heading_id).val(result.vdrOperatingSlow.time);
                     $('.time_' + result.vdrOperatingSlow.heading_id).html(result.vdrOperatingSlow.time);
                     $('.daily_' + result.vdrOperatingSlow.heading_id).val(result.vdrOperatingSlow.daily);

                     $('.total_jam').html(result.totalJam);
                     $('.total_daily').val(result.totalDaily);
                  },
                  error: function(error) {
                     console.log(error)
                  }

               })
            });

            $(".input_activity_manu_" + '{!! $act->id !!}').keyup(function () {
               console.log('manu');
               var vdr = $('#vdr').val();
               var act = '{!! $act->id !!}';
               var manu = $('#manu_' + '{!! $act->id !!}').val();
               
               console.log('manu : ' + manu);
            
               var _token = $('meta[name="csrf-token"]').attr('content');
               $.ajax({
                  url: "/fetch/vdr/update/manu/activity/" + vdr + "/" + act +  "/"   + manu ,
                  method: "GET",
                  dataType: 'json',

                  success: function(result) {
                     $('.manuTime').html(result.vdrOperatingManu.time);
                     console.log('time manu :' + result.vdrOperatingManu.time);
                     $('.time_' + result.vdrOperatingManu.heading_id).val(result.vdrOperatingManu.time);
                     $('.time_' + result.vdrOperatingManu.heading_id).html(result.vdrOperatingManu.time);
                     $('.daily_' + result.vdrOperatingManu.heading_id).val(result.vdrOperatingManu.daily);

                     $('.total_jam').html(result.totalJam);
                     $('.total_daily').val(result.totalDaily);
                  },
                  error: function(error) {
                     console.log(error)
                  }

               })
            });

            $(".input_activity_idle_" + '{!! $act->id !!}').keyup(function () {
               console.log('idle');
               var vdr = $('#vdr').val();
               var act = '{!! $act->id !!}';
               var idle = $('#idle_' + '{!! $act->id !!}').val();
               
               console.log('idle : ' + idle);
            
               var _token = $('meta[name="csrf-token"]').attr('content');
               $.ajax({
                  url: "/fetch/vdr/update/idle/activity/" + vdr + "/" + act +  "/"   + idle ,
                  method: "GET",
                  dataType: 'json',

                  success: function(result) {
                     $('.idleTime').html(result.vdrOperatingIdle.time);
                     console.log('time idle :' + result.vdrOperatingIdle.time);
                     $('.time_' + result.vdrOperatingIdle.heading_id).val(result.vdrOperatingIdle.time);
                     $('.time_' + result.vdrOperatingIdle.heading_id).html(result.vdrOperatingIdle.time);
                     $('.daily_' + result.vdrOperatingIdle.heading_id).val(result.vdrOperatingIdle.daily);

                     $('.total_jam').html(result.totalJam);
                     $('.total_daily').val(result.totalDaily);
                  },
                  error: function(error) {
                     console.log(error)
                  }

               })
            });

            $(".input_activity_tow_" + '{!! $act->id !!}').keyup(function () {
               console.log('tow');
               var vdr = $('#vdr').val();
               var act = '{!! $act->id !!}';
               var tow = $('#tow_' + '{!! $act->id !!}').val();
               
               console.log('tow : ' + tow);
            
               var _token = $('meta[name="csrf-token"]').attr('content');
               $.ajax({
                  url: "/fetch/vdr/update/tow/activity/" + vdr + "/" + act +  "/"   + tow ,
                  method: "GET",
                  dataType: 'json',

                  success: function(result) {
                     $('.towTime').html(result.vdrOperatingTow.time);
                     console.log('time tow :' + result.vdrOperatingTow.time);
                     $('.time_' + result.vdrOperatingTow.heading_id).val(result.vdrOperatingTow.time);
                     $('.time_' + result.vdrOperatingTow.heading_id).html(result.vdrOperatingTow.time);
                     $('.daily_' + result.vdrOperatingTow.heading_id).val(result.vdrOperatingTow.daily);

                     $('.total_jam').html(result.totalJam);
                     $('.total_daily').val(result.totalDaily);
                  },
                  error: function(error) {
                     console.log(error)
                  }

               })
            });

            $(".input_activity_ah_" + '{!! $act->id !!}').keyup(function () {
               console.log('ah');
               var vdr = $('#vdr').val();
               var act = '{!! $act->id !!}';
               var ah = $('#ah_' + '{!! $act->id !!}').val();
               
               console.log('ah : ' + ah);
            
               var _token = $('meta[name="csrf-token"]').attr('content');
               $.ajax({
                  url: "/fetch/vdr/update/ah/activity/" + vdr + "/" + act +  "/"   + ah ,
                  method: "GET",
                  dataType: 'json',

                  success: function(result) {
                     $('.ahTime').html(result.vdrOperatingAh.time);
                     console.log('time ah :' + result.vdrOperatingAh.time);
                     $('.time_' + result.vdrOperatingAh.heading_id).val(result.vdrOperatingAh.time);
                     $('.time_' + result.vdrOperatingAh.heading_id).html(result.vdrOperatingAh.time);
                     $('.daily_' + result.vdrOperatingAh.heading_id).val(result.vdrOperatingAh.daily);

                     $('.total_jam').html(result.totalJam);
                     $('.total_daily').val(result.totalDaily);
                  },
                  error: function(error) {
                     console.log(error)
                  }

               })
            });

            $(".input_activity_sb_" + '{!! $act->id !!}').keyup(function () {
               console.log('sb');
               var vdr = $('#vdr').val();
               var act = '{!! $act->id !!}';
               var sb = $('#sb_' + '{!! $act->id !!}').val();
               
               console.log('sb : ' + sb);
            
               var _token = $('meta[name="csrf-token"]').attr('content');
               $.ajax({
                  url: "/fetch/vdr/update/sb/activity/" + vdr + "/" + act +  "/"   + sb ,
                  method: "GET",
                  dataType: 'json',

                  success: function(result) {
                     $('.sbTime').html(result.vdrOperatingSb.time);
                     console.log('time sb :' + result.vdrOperatingSb.time);
                     console.log('daily sb :' + result.vdrOperatingSb.daily);
                     $('.time_' + result.vdrOperatingSb.heading_id).val(result.vdrOperatingSb.time);
                     $('.time_' + result.vdrOperatingSb.heading_id).html(result.vdrOperatingSb.time);
                     $('.daily_' + result.vdrOperatingSb.heading_id).val(result.vdrOperatingSb.daily);

                     $('.total_jam').html(result.totalJam);
                     $('.total_daily').val(result.totalDaily);
                  },
                  error: function(error) {
                     console.log(error)
                  }

               })
            });


            $(".input_activity_desc_" + '{!! $act->id !!}').keyup(function () {
               console.log('sb');
               var vdr = $('#vdr').val();
               var act = '{!! $act->id !!}';
               var desc = $('#activity_' + '{!! $act->id !!}').val();
               
               console.log('desc : ' + desc);
            
               var _token = $('meta[name="csrf-token"]').attr('content');
               $.ajax({
                  url: "/fetch/vdr/update/desc/activity/" + vdr + "/" + act +  "/"   + desc ,
                  method: "GET",
                  dataType: 'json',

                  success: function(result) {
                     // $('.sbTime').html(result.vdrOperatingSb.time);
                     console.log('act :' + result.result);
                     
                  },
                  error: function(error) {
                     console.log(error)
                  }

               })
            });

            // $("#hse_month_" + '{!! $hse->id !!}').val(parseInt(prev)+parseInt(today));
         });
      </script>
    @endforeach

   <script>
      function addActivity(){
         console.log('func add activity');
         var _token = $('meta[name="csrf-token"]').attr('content');
         $.ajax({
            url: "/fetch/vdr/add/activity/" + vdr + "/" + periodic +  "/"  + remu + "/" + correct + "/" + actual + "/" + specialTotal ,
            method: "GET",
            dataType: 'json',

            success: function(result) {
               $('.specialTotal').html(specialTotal);
               console.log('result :' + specialTotal);
               
            },
            error: function(error) {
               console.log(error);
               $('.specialTotal').html(0);
            }

         })
      }
   </script>
@endpush

@push('crew')
    @foreach ($crews as $crew)
      <script>
         $(document).ready(function() {

            // $(".idActivity" ).o(function () {
            //    console.log('crew');
            //    var vdr = $('#vdr').val();
            //    var crew = '{!! $crew->id !!}';
            //    var name = $('#crew_name_' + '{!! $crew->id !!}').val();
            //    var rank = $('#crew_rank_' + '{!! $crew->id !!}').val();
               
               
         
            //    console.log('VDR : ' + vdr);

               

            //    var _token = $('meta[name="csrf-token"]').attr('content');
            //    $.ajax({
            //       url: "/fetch/vdr/update/crew/" + vdr + "/" + crew +  "/"  + name + "/" + rank,
            //       method: "GET",
            //       dataType: 'json',

            //       success: function(result) {
                     

            //          console.log('result :' + result.result);

                     
            //       },
            //       error: function(error) {
            //          console.log(error)
            //       }

            //    })
            // });
         
            $(".input_crew_" + '{!! $crew->id !!}').keyup(function () {
               console.log('crew');
               var vdr = $('#vdr').val();
               var crew = '{!! $crew->id !!}';
               var name = $('#crew_name_' + '{!! $crew->id !!}').val();
               var rank = $('#crew_rank_' + '{!! $crew->id !!}').val();
               
               
         
               console.log('VDR : ' + vdr);

               

               var _token = $('meta[name="csrf-token"]').attr('content');
               $.ajax({
                  url: "/fetch/vdr/update/crew/" + vdr + "/" + crew +  "/"  + name + "/" + rank,
                  method: "GET",
                  dataType: 'json',

                  success: function(result) {
                     

                     console.log('result :' + result.result);

                     
                  },
                  error: function(error) {
                     console.log(error)
                  }

               })
            });


            $(".input_pax_" + '{!! $crew->id !!}').keyup(function () {
               console.log('crew');
               var vdr = $('#vdr').val();
               var crew = '{!! $crew->id !!}';
               var name = $('#crew_name_' + '{!! $crew->id !!}').val();
               var company = $('#crew_company_' + '{!! $crew->id !!}').val();
               
               
         
               console.log('VDR : ' + vdr);

               

               var _token = $('meta[name="csrf-token"]').attr('content');
               $.ajax({
                  url: "/fetch/vdr/update/pax/" + vdr + "/" + crew +  "/"  + name + "/" + company,
                  method: "GET",
                  dataType: 'json',

                  success: function(result) {
                     

                     console.log('result :' + result.result);

                     
                  },
                  error: function(error) {
                     console.log(error)
                  }

               })
            });

            // $("#hse_month_" + '{!! $hse->id !!}').val(parseInt(prev)+parseInt(today));
         });
      </script>
    @endforeach

   <script>
      function addActivity(){
         console.log('func add activity');
         var _token = $('meta[name="csrf-token"]').attr('content');
         $.ajax({
            url: "/fetch/vdr/add/activity/" + vdr + "/" + periodic +  "/"  + remu + "/" + correct + "/" + actual + "/" + specialTotal ,
            method: "GET",
            dataType: 'json',

            success: function(result) {
               $('.specialTotal').html(specialTotal);
               console.log('result :' + specialTotal);
               
            },
            error: function(error) {
               console.log(error);
               $('.specialTotal').html(0);
            }

         })
      }
   </script>
@endpush

@push('engine')
    @foreach ($engines as $en)
      <script>
         $(document).ready(function() {
         
            $(".input_engine_" + '{!! $en->id !!}').keyup(function () {
               console.log('engine');
               var vdr = $('#vdr').val();
               var engine = '{!! $en->id !!}';
               var m_ref = $('#m_ref_' + '{!! $en->id !!}').val();
               var m_port = $('#m_port_' + '{!! $en->id !!}').val();
               var m_stbd = $('#m_stbd_' + '{!! $en->id !!}').val();
               var m_center = $('#m_center_' + '{!! $en->id !!}').val();
               var m_other = $('#m_other_' + '{!! $en->id !!}').val();
               var a_ref = $('#a_ref_' + '{!! $en->id !!}').val();
               var a_port = $('#a_port_' + '{!! $en->id !!}').val();
               var a_stbd = $('#a_stbd_' + '{!! $en->id !!}').val();
               var a_other = $('#a_other_' + '{!! $en->id !!}').val();
               
               

               var _token = $('meta[name="csrf-token"]').attr('content');
               $.ajax({
                  url: "/fetch/vdr/update/engine/" + vdr + "/" + engine +  "/"  + m_ref + "/" + m_port + "/" + m_stbd + "/" + m_center + "/" + m_other + "/" + a_ref + "/" + a_port + "/" + a_stbd  + "/" + a_other,
                  method: "GET",
                  dataType: 'json',

                  success: function(result) {
                     // $('.highTime').html(result.highTime);
                     // $('.normalTime').html(result.normalTime);
                     // $('.slowTime').html(result.slowTime);
                     // $('.idleTime').html(result.idleTime);
                     // $('.manuTime').html(result.manuTime);
                     // $('.towTime').html(result.towTime);
                     // $('.ahTime').html(result.ahTime);
                     // $('.sbTime').html(result.sbTime);

                     console.log('engine :' + result.result);

                     // $('.time_' + result.vdrOperatingHigh.heading_id).val(result.vdrOperatingHigh.time);
                     // $('.time_' + result.vdrOperatingHigh.heading_id).html(result.vdrOperatingHigh.time);
                     // $('.daily_' + result.vdrOperatingHigh.heading_id).val(result.vdrOperatingHigh.daily);

                     // $('.time_' + result.vdrOperatingNormal.heading_id).val(result.vdrOperatingNormal.time);
                     // $('.time_' + result.vdrOperatingNormal.heading_id).html(result.vdrOperatingNormal.time);
                     // $('.daily_' + result.vdrOperatingNormal.heading_id).val(result.vdrOperatingNormal.daily);

                     // $('.time_' + result.vdrOperatingSlow.heading_id).val(result.vdrOperatingSlow.time);
                     // $('.time_' + result.vdrOperatingSlow.heading_id).html(result.vdrOperatingSlow.time);
                     // $('.daily_' + result.vdrOperatingSlow.heading_id).val(result.vdrOperatingSlow.daily);

                     // $('.time_' + result.vdrOperatingManu.heading_id).val(result.vdrOperatingManu.time);
                     // $('.time_' + result.vdrOperatingManu.heading_id).html(result.vdrOperatingManu.time);
                     // $('.daily_' + result.vdrOperatingManu.heading_id).val(result.vdrOperatingManu.daily);

                     // $('.time_' + result.vdrOperatingIdle.heading_id).val(result.vdrOperatingIdle.time);
                     // $('.time_' + result.vdrOperatingIdle.heading_id).html(result.vdrOperatingIdle.time);
                     // $('.daily_' + result.vdrOperatingIdle.heading_id).val(result.vdrOperatingIdle.daily);

                     // $('.time_' + result.vdrOperatingTow.heading_id).val(result.vdrOperatingTow.time);
                     // $('.time_' + result.vdrOperatingTow.heading_id).html(result.vdrOperatingTow.time);
                     // $('.daily_' + result.vdrOperatingTow.heading_id).val(result.vdrOperatingTow.daily);

                     // $('.time_' + result.vdrOperatingAh.heading_id).val(result.vdrOperatingAh.time);
                     // $('.time_' + result.vdrOperatingAh.heading_id).html(result.vdrOperatingAh.time);
                     // $('.daily_' + result.vdrOperatingAh.heading_id).val(result.vdrOperatingAh.daily);

                     // $('.time_' + result.vdrOperatingSb.heading_id).val(result.vdrOperatingSb.time);
                     // $('.time_' + result.vdrOperatingSb.heading_id).html(result.vdrOperatingSb.time);
                     // $('.daily_' + result.vdrOperatingSb.heading_id).val(result.vdrOperatingSb.daily);
                     
                  },
                  error: function(error) {
                     console.log(error)
                  }

               })
            });

            // $("#hse_month_" + '{!! $hse->id !!}').val(parseInt(prev)+parseInt(today));
         });
      </script>
    @endforeach

   
@endpush




@push('general')
<script>
   $(document).ready(function() {
      

      // START Form Delete Multiple Activity
      $("#checkboxAllActivity").change(function() {
         $("input[name='checkActivity[]']").prop('checked', $(this).prop('checked'));
         console.log('check all');
      });

      // Ketika salah satu checkbox dengan name=check dicentang atau dicentang ulang
      $("input[name='checkActivity[]']").change(function() {
         console.log('check one');
         // Periksa apakah semua checkbox dengan name=check tercentang
         var allChecked = ($("input[name='checkActivity[]']:checked").length === $("input[name='checkActivity[]']").length);

         // Terapkan status checked pada checkboxAll sesuai hasil pengecekan di atas
         $("#checkboxAllActivity").prop('checked', allChecked);
      });
      // END Form Delete Multiple Activity



      // START Form Delete Multiple Crew
      $("#checkboxAllCrew").change(function() {
         $("input[name='checkCrew[]']").prop('checked', $(this).prop('checked'));
         console.log('check all');
      });

      // Ketika salah satu checkbox dengan name=check dicentang atau dicentang ulang
      $("input[name='checkCrew[]']").change(function() {
         console.log('check one');
         // Periksa apakah semua checkbox dengan name=check tercentang
         var allChecked = ($("input[name='checkCrew[]']:checked").length === $("input[name='checkCrew[]']").length);

         // Terapkan status checked pada checkboxAll sesuai hasil pengecekan di atas
         $("#checkboxAllCrew").prop('checked', allChecked);
      });
      // END Form Delete Multiple Crew


      // START Form Delete Multiple Pax
      $("#checkboxAllPax").change(function() {
         $("input[name='checkPax[]']").prop('checked', $(this).prop('checked'));
         console.log('check all');
      });

      // Ketika salah satu checkbox dengan name=check dicentang atau dicentang ulang
      $("input[name='checkPax[]']").change(function() {
         console.log('check one');
         // Periksa apakah semua checkbox dengan name=check tercentang
         var allChecked = ($("input[name='checkPax[]']:checked").length === $("input[name='checkPax[]']").length);

         // Terapkan status checked pada checkboxAll sesuai hasil pengecekan di atas
         $("#checkboxAllPax").prop('checked', allChecked);
      });
      // END Form Delete Multiple Pax



      $(".input_general").keyup(function () {
         console.log('general')

         var vdr = $('#vdr').val();
         var loc = $('#location_midnight').val();
         var date = $('#date').val();
         var onduty = $('#onduty').val() ;
         var pax = $('#pax').val() ;
         var contract = $('#contract').val();
         var contract_end = $('#contract_end').val();
         var contract_start = $('#contract_start').val();
         var owner = $('#owner').val();
         var master = $('#master').val();
         var ce = $('#ce').val();

         console.log(ce);

         // let form = document.getElementById("form_general");
         // form.submit();


         // $("#form_general").submit(function(e) {
         //    console.log('form submit');

         //    e.preventDefault(); // avoid to execute the actual submit of the form.
         //    var form = $(this);
         //    var actionUrl = form.attr('action');

         //    $.ajax({
         //       type: "POST",
         //       url: actionUrl,
         //       data: form.serialize(), // serializes the form's elements.
         //       success: function(data)
         //       {
         //          alert(data); // show response from the php script.
         //       }
         //    });

         // });



         var _token = $('meta[name="csrf-token"]').attr('content');

         console.log('vdr:' + vdr + ' loc:' + loc);

         $.ajax({
            url: "/fetch/vdr/update/general/" + vdr + "/" + date + "/" + loc +  "/"  + onduty + "/" + pax +  "/"  + contract + "/" + contract_start +  "/"  + contract_end + "/" + owner +  "/"  + master + "/" + ce,
            method: "GET",
            dataType: 'json',

            success: function(result) {
               console.log('result :' + result.result);
               $('.code').html(result.code);
               
            },
            error: function(error) {
               console.log(error)
            }

         })





      
      })

      $('.input_general_date').change( function () {
         
         

         console.log('change general date');

         var vdr = $('#vdr').val();
         var loc = $('#location_midnight').val();
         var date = $('#date').val();
         var onduty = $('#onduty').val() ;
         var pax = $('#pax').val() ;
         var contract = $('#contract').val();
         var contract_end = $('#contract_end').val();
         var contract_start = $('#contract_start').val();
         var owner = $('#owner').val();
         var master = $('#master').val();
         var ce = $('#ce').val();

         console.log(date);

         // let form = document.getElementById("form_general");
         // form.submit();


         // $("#form_general").submit(function(e) {
         //    console.log('form submit');

         //    e.preventDefault(); // avoid to execute the actual submit of the form.
         //    var form = $(this);
         //    var actionUrl = form.attr('action');

         //    $.ajax({
         //       type: "POST",
         //       url: actionUrl,
         //       data: form.serialize(), // serializes the form's elements.
         //       success: function(data)
         //       {
         //          alert(data); // show response from the php script.
         //       }
         //    });

         // });



         var _token = $('meta[name="csrf-token"]').attr('content');

         console.log('vdr:' + vdr + ' loc:' + loc);

         $.ajax({
            url: "/fetch/vdr/update/general/" + vdr + "/" + date + "/" + loc +  "/"  + onduty + "/" + pax +  "/"  + contract + "/" + contract_start +  "/"  + contract_end + "/" + owner +  "/"  + master + "/" + ce,
            method: "GET",
            dataType: 'json',

            success: function(result) {
               console.log('msg :' + result.error );
               $('.code').html(result.code);
               $('.errordate').html(result.error);
               
            },
            error: function(error) {
               console.log(error)
            }

         })
      });

      $('.input_bu').change( function () {
         
         

         console.log('change ipb bu');

         var vdr = $('#vdr').val();
         
         var bu = $('#bu').val();

         console.log(date);

        



         var _token = $('meta[name="csrf-token"]').attr('content');

         console.log('vdr bu:' + vdr);

         $.ajax({
            url: "/fetch/vdr/update/bu/" + vdr + "/" + bu ,
            method: "GET",
            dataType: 'json',

            success: function(result) {
               console.log('msg :' + result.result );
               // $('.code').html(result.code);
               // $('.errordate').html(result.error);
               
            },
            error: function(error) {
               console.log(error)
            }

         })
      });


     
   });
</script>
@endpush
@endsection



