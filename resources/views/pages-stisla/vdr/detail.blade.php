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
      
         {{-- @if (auth()->user()->hasRole('vessel'))

               @if ($vdr->status == 0 || $vdr->status == 101 || $vdr->status == 202 || $vdr->status == 303) 
               <div class="btn btn-group">
                  <a href="{{route('vdr.release', enkripRambo($vdr->id))}}" class="btn  btn-info border shadow-none">Release</a>
                  <a href="#" class="btn   btn-light border shadow-none" data-toggle="modal" data-target="#modalEdit">Edit</a>
                  <a href="#" class="btn   btn-danger  shadow-none" data-toggle="modal" data-target="#modalDeleteVdr">Delete</a>
               </div>
               @endif
            @endif --}}
      
      
      <ul class="nav nav-tabs" id="myTab" role="tablist">
         <li class="nav-item">
            <a class="nav-link {{$tab == 'index' ? 'active' : ''}}" id="progress-tab" data-toggle="tab" href="#progress" role="tab" aria-controls="progress" aria-selected="true">VDR {{$vessel->name}}  {{formatDate($vdr->date)}}</a>
         </li>
         <li class="nav-item">
            <a class="nav-link {{$tab == 'weathers' ? 'active' : ''}}" id="weather-tab" data-toggle="tab" href="#weather" role="tab" aria-controls="weather" aria-selected="false">Weather Condition</a>
         </li>
         
         <li class="nav-item">
            <a class="nav-link {{$tab == 'hse' ? 'active' : ''}}" id="hse-tab" data-toggle="tab" href="#hse" role="tab" aria-controls="hse" aria-selected="false">HSE </a>
         </li>
         <li class="nav-item">
            <a class="nav-link {{$tab == 'operating' ? 'active' : ''}}" id="operating-tab" data-toggle="tab" href="#operating" role="tab" aria-controls="operating" aria-selected="false">Operating Data </a>
         </li>
         <li class="nav-item">
            <a class="nav-link {{$tab == 'activity' ? 'active' : ''}}" id="activity-tab" data-toggle="tab" href="#activity" role="tab" aria-controls="activity" aria-selected="false">Operational Activities </a>
         </li>
         
         <li class="nav-item">
            <a class="nav-link {{$tab == 'cargo' ? 'active' : ''}}" id="cargo-tab" data-toggle="tab" href="#cargo" role="tab" aria-controls="cargo" aria-selected="false">Fuel, Water and Cargoes </a>
         </li>
         
         <li class="nav-item">
            <a class="nav-link {{$tab == 'crew' ? 'active' : ''}}" id="crew-tab" data-toggle="tab" href="#crew" role="tab" aria-controls="crew" aria-selected="false">Crew & Passanger </a>
         </li>
         <li class="nav-item">
            <a class="nav-link {{$tab == 'engine' ? 'active' : ''}}" id="engine-tab" data-toggle="tab" href="#engine" role="tab" aria-controls="engine" aria-selected="false">Engine Parameter Log </a>
         </li>
         <li class="nav-item">
            <a class="nav-link {{$tab == 'periodic' ? 'active' : ''}}" id="periodic-tab" data-toggle="tab" href="#periodic" role="tab" aria-controls="periodic" aria-selected="false">Periodical Fuel ROB Check</a>
         </li>
         <li class="nav-item">
            <a class="nav-link {{$tab == 'special' ? 'active' : ''}}" id="special-tab" data-toggle="tab" href="#special" role="tab" aria-controls="special" aria-selected="false">Special Calculation </a>
         </li>
      </ul>
      <div class="tab-content" id="myTabContent">
         <div class="tab-pane fade {{$tab == 'index' ? 'show active' : ''}}" id="progress" role="tabpanel" aria-labelledby="progress-tab">
            
            <div class="row mt-2">
               <div class="col-md-9">
                  <table>
                     <tbody>
                        <tr>
                           <td style="width: 250px" class="bg-primary text-white"><x-status-stisla.vdr :vdr="$vdr" /></td>
                           <td>{{$vdr->times->where('type', 'reject')->where('status', 1)->first()->desc ?? '-'}}</td>
                        </tr>
                        <tr>
                           <td>Contract No.</td>
                           <td>{{$vdr->contract ?? '-'}}</td>
                        </tr>
                        <tr>
                           <td>Contract Period</td>
                           <td>{{formatDate($vdr->contract_start) ?? '-'}} - {{formatDate($vdr->contract_end) ?? '-'}}</td>
                        </tr>
                        <tr>
                           <td>Location</td>
                           <td>{{$vdr->location_midnight ?? '-'}}</td>
                        </tr>
                        <tr>
                           <td>Owner</td>
                           <td> {{$vdr->owner }}</td>
                        </tr>
                        
                        <tr>
                           <td>Num of Crew</td>
                           <td>{{$vdr->crew_onduty}} / {{$vdr->crew_max}} Person</td>
                        </tr>
                        <tr>
                           <td></td>
                        </tr>
                        <tr>
                           <td>Master</td>
                           <td>{{$vdr->master ?? '-'}}</td>
                        </tr>
                        <tr>
                           <td>Chief Engineer</td>
                           <td>{{$vdr->ce ?? '-'}}</td>
                        </tr>
                     </tbody>
                  </table>

                  <hr>
                  <table>
                     <tbody>
                        <tr>
                           <th colspan="2">Approval Detail</th>
                        </tr>
                        <tr>
                           <td style="width: 250px">{{$vdr->title1 ?? '-'}}</td>
                           <td>{{$vdr->name1 ?? '-'}}</td>
                        </tr>
                        <tr>
                           <td>{{$vdr->title2 ?? '-'}}</td>
                           <td>{{$vdr->name2 ?? '-'}}</td>
                        </tr>
                        <tr>
                           <td>{{$vdr->title3 ?? '-'}}</td>
                           <td>{{$vdr->name3 ?? '-'}}</td>
                        </tr>
                        
                     </tbody>
                  </table>
                 
               </div>
               <div class="col">
                  @if (auth()->user()->hasRole('superuser'))
                     Vessel
                     <div class="d-flex">
                        <a href="#" class="btn btn-block btn-info border shadow-none" data-toggle="modal" data-target="#modalReleaseVdr">Release</a>
                        <div class="btn btn-group p-0">
                           
                           <a href="#" class="btn btn-light border shadow-none" data-toggle="modal" data-target="#modalEdit">Edit</a>
                           <a href="#" class="btn btn-danger  shadow-none" data-toggle="modal" data-target="#modalDeleteVdr">Delete</a>
                        </div>
                     </div>
                     <hr>
                     Marine
                     <div class="btn btn-block btn-group p-0">
                        <a href="" class="btn btn-info btn-block" data-toggle="modal" data-target="#vdr-approve-marine">Approve </a>
                        <a href="" class="btn btn-danger " data-toggle="modal" data-target="#vdr-reject-marine">Reject</a>
                     </div>
                     
                     <a href="#" class="btn  btn-block btn-light border shadow-none" data-toggle="modal" data-target="#modalEditApproval">Approval Level</a>
                     <span class="text-muted">Approval Level wajib diisi sebelum klik Approve</span>
                  @endif

                  @if ($vdr->status == 2 && auth()->user()->hasRole('suptent'))
                  <a href="{{route('vdr.approve.suptent', enkripRambo($vdr->id))}}" class="btn btn-block btn-primary  shadow-none">Approve Superintendent</a>
                  @endif
   
                  @if ($vdr->status == 3 && auth()->user()->hasRole('chief'))
                  <a href="{{route('vdr.approve.luthfi', enkripRambo($vdr->id))}}" class="btn btn-block btn-primary  shadow-none">Approve Mr. Luthfi</a>
                  @endif
                  @if (auth()->user()->hasRole('vessel'))
                     @if ($vdr->status == 0 || $vdr->status == 101 || $vdr->status == 202 || $vdr->status == 303) 
                     <div class="d-flex">
                        <a href="#" class="btn btn-block btn-info border shadow-none" data-toggle="modal" data-target="#modalReleaseVdr">Release</a>
                        <div class="btn btn-group p-0">
                           
                           <a href="#" class="btn btn-light border shadow-none" data-toggle="modal" data-target="#modalEdit">Edit</a>
                           <a href="#" class="btn btn-danger  shadow-none" data-toggle="modal" data-target="#modalDeleteVdr">Delete</a>
                        </div>
                     </div>
                     
                        
                     @endif
                  @endif

                  {{-- @if ($vdr->status == 1 && auth()->user()->hasRole('marine'))
                  @endif --}}
                  @if ($vdr->status == 1 && auth()->user()->hasRole('marine') && auth()->user()->username == 'pet')
                  {{-- <div class="btn-group mr-2"> --}}
                     <div class="btn btn-block btn-group p-0">
                        {{-- <a href="{{route('vdr.approve.marine', enkripRambo($vdr->id))}}" class="btn btn-info btn-block">Approve </a> --}}
                        <a href="#" class="btn  btn-block btn-info " data-toggle="modal" data-target="#modalAppPet">Approve PET</a>
                        <a href="" class="btn btn-danger " data-toggle="modal" data-target="#vdr-reject-marine">Reject</a>
                     </div>
                     
                     
                     {{-- <span class="text-muted">Approval Level wajib diisi sebelum klik Approve</span> --}}
                     
                     <hr>
                     {{-- <div class="btn btn-block btn-group p-0"> --}}
                        {{-- <a href="#" class="btn  btn-block btn-light border shadow-none" data-toggle="modal" data-target="#modalEditApproval">Edit</a> --}}
                     {{-- <a href="#" class="btn btn-light border  shadow-none" data-toggle="modal" data-target="#modalDeleteVdr">Delete</a> --}}
                     {{-- </div> --}}
                  {{-- </div> --}}
                  
                  @endif
                  {{-- <hr> --}}
                  <a href="{{route('document.vdr', enkripRambo($vdr->id))}}" target="_blank" class="btn btn-block btn-light border shadow-none">Export PDF</a>
                  <hr>
                  
                  <span class="text-muted">Setiap Tab terdapat tombol Save yang harus di klik ketika ada perubahan data pada Tab tersebut.</span>
                  <br>
                  <br>
                  <a href="#" class="" data-toggle="modal" data-target="#modalDeleteVdr">Delete</a>
               </div>
            </div>
         </div>
         <div class="tab-pane fade {{$tab == 'weathers' ? 'show active' : ''}}" id="weather" role="tabpanel" aria-labelledby="weather-tab">
            {{-- <b>Inbox</b> --}}
            <x-vdr.weather :weathers="$weathers" :vdr="$vdr" />
         </div>
         <div class="tab-pane fade {{$tab == 'hse' ? 'show active' : ''}}" id="hse" role="tabpanel" aria-labelledby="hse-tab">
            <x-vdr.hsse :hses="$hses" :vdr="$vdr" />
         </div>
         <div class="tab-pane fade {{$tab == 'activity' ? 'show active' : ''}}" id="activity" role="tabpanel" aria-labelledby="activity-tab">
            <x-vdr.activity :activities="$activities" :operatings="$operatings" :vdr="$vdr" />
         </div>
         <div class="tab-pane fade {{$tab == 'operating' ? 'show active' : ''}}" id="operating" role="tabpanel" aria-labelledby="operating-tab">
            <x-vdr.data :operatings="$operatings" :totaljam="$totalJam" :totaldaily="$totalDaily" :vdr="$vdr"/>
         </div>
         <div class="tab-pane fade {{$tab == 'cargo' ? 'show active' : ''}}" id="cargo" role="tabpanel" aria-labelledby="cargo-tab">
            <x-vdr.fuel :cargos="$cargos" :vdr="$vdr" />
         </div>
         <div class="tab-pane fade {{$tab == 'periodic' ? 'show active' : ''}}" id="periodic" role="tabpanel" aria-labelledby="periodic-tab">
            <x-vdr.periodic :periodic="$periodic" :vdr="$vdr" />
         </div>
         <div class="tab-pane fade {{$tab == 'special' ? 'show active' : ''}}" id="special" role="tabpanel" aria-labelledby="special-tab">
            <x-vdr.special :periodic="$periodic" :vdr="$vdr" />
         </div>
         <div class="tab-pane fade {{$tab == 'crew' ? 'show active' : ''}}" id="crew" role="tabpanel" aria-labelledby="crew-tab">
            <x-vdr.crew :crews="$crews" :vdr="$vdr" />
         </div>
         <div class="tab-pane fade {{$tab == 'engine' ? 'show active' : ''}}" id="engine" role="tabpanel" aria-labelledby="engine-tab">
            <x-vdr.engine :engines="$engines" :vdr="$vdr" />
         </div>
         
      </div>



      {{-- <x-vdr.detail :vessel="$vessel" :vdr="$vdr" :crews="$crews" :weathers="$weathers" :activities="$activities" :operatings="$operatings" :totaljam="$totalJam" :totaldaily="$totalDaily" :cargos="$cargos" :hses="$hses" :engines="$engines" /> --}}
      
   </div>
</section>

@if (auth()->user()->hasRole('marine'))
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
      <div class="modal-dialog modal-sm" role="document">
         <form action="{{route('vdr.approve.pet')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$vdr->id}}" id="">
            <input type="hidden" name="vessel_id" value="{{$vessel->id}}" id="">
            <input type="hidden" name="created_by" value="{{$user->name}}">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title">Approve VDR</h5>

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
                  
               </div>
               <div class="modal-body">
                  

                  {{-- <div class="badge badge-info">Approval 1</div> --}}
                  <div class="row mb-2">
                     
                     <div class="col-12">
                        
                        <div class="form-group">
                           <label for="title1">Title </label>
                           <input class="form-control" id="title1" required name="title1" type="text" value="{{$vdr->title1}}" placeholder="Jabatan/Posisi">
                           @error('title1')
                              <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                           @enderror
                        </div>
                     </div>
                     <div class="col-12">
                        <div class="form-group">
                           <label for="name1">Name </label>
                           <input class="form-control" id="name1" name="name1" required type="text" value="{{$vdr->name1}}" >
                           @error('name1')
                              <small class="form-hint nvalid-feedback text-danger">{{ $message }}</small>
                           @enderror
                        </div>
                     </div>
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
   <div class="modal fade" id="vdr-approve-marine" tabindex="1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
         
         
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
    @else
      @foreach ($crews as $crew)
         <div class="modal fade" id="deleteAct-{{$crew->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog" role="document">
               <form action="{{route('vdr.delete.crew')}}" method="POST">
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




@push('get_schedules')
<script>
    $('.box-rank').hide();
    $('.box-company').hide();


    $(".waktu").on("input", function() {
        // Mengambil nilai dari input
        var inputValue = $(this).val();

        // Validasi hanya angka dan maksimal dua digit di belakang koma
        var regex = /^\d{0,2}(\.\d{0,2})?$/;

        if (!regex.test(inputValue)) {
            alert("Input tidak valid. Hanya angka dengan maksimal dua digit di belakang koma.");
            // Mengosongkan nilai input jika tidak valid
            $(this).val("");
            return;
        }

        // Konversi nilai input menjadi float
        var floatValue = parseFloat(inputValue);

        // Paksa nilai desimal menjadi 59 jika lebih besar dari 59
        if (floatValue > 59) {
            floatValue = 59;
        }

        //  Mengambil nilai di belakang koma
        var nilaiDiBelakangKoma = (floatValue % 1).toFixed(2);

        if (nilaiDiBelakangKoma > 0.59) {
            alert("Input tidak valid. Maksimal desimal 59.");
            // Mengosongkan nilai input jika tidak valid
            $(this).val("");
        }

        // Validasi maksimal 24.00
        if (floatValue > 24) {
            alert("Input tidak valid. Maksimal 24.00.");
            // Mengosongkan nilai input jika tidak valid
            $(this).val("");
        }
    });


    // Fungsi untuk menghitung dan menampilkan nilai di kolom Closing
    function calculateClosing(id) {

        // Ambil nilai dari masing-masing input
        var opening = parseInt($("#opening-" + id).val()) || 0;
        var consumption = parseInt($("#consumption-" + id).val()) || 0;
        var received = parseInt($("#received-" + id).val()) || 0;
        var transferred = parseInt($("#transferred-" + id).val()) || 0;

        // Hitung nilai Closing berdasarkan rumus
        var closing = (opening + received) - (consumption + transferred);

        // Tampilkan hasil perhitungan di kolom Closing
        $(".closing").val(closing);
    }

    // Panggil fungsi ketika nilai input berubah
    // $(".hitung-closing").on("input", function() {
    //     var cargoId = $(".hitung-closing ").data("id");
    //     console.log(cargoId);
    //     calculateClosing();
    // });

    // function myFunction(id) {
    //     console.log("Nilai Input: " + inputValue); 
    // }

    // Panggil fungsi saat halaman dimuat
    // calculateClosing();
    $("input[name='is_crew']").change(function() {
        if ($(this).is(":checked")) {
            // Radio button dicentang
            var selectedValue = $(this).val();
            console.log("Selected Option: " + selectedValue);

            visibilityBox(selectedValue);
            // if (selectedValue == '1') {
            //     $('#box-rank').show();
            //     $('#box-company').hide();
            // } else {
            //     $('#box-rank').hide();
            //     $('#box-company').show();
            // }
        }
    });

    function visibilityBox(value) {
        if (value == '1') {
            $('.box-rank').show();
            $('.box-company').hide();

            $(".crew").prop("checked", true);
            $(".passenger").prop("checked", false);
        } else {
            $('.box-rank').hide();
            $('.box-company').show();

            $(".crew").prop("checked", false);
            $(".passenger").prop("checked", true);
        }
    }


    // Perhitungan Operating Mode
    // Tangkap perubahan pada input time[] dan contractual_fuel[]
    $('input[name^="time[]"], input[name^="contractual_fuel[]"]').on('input', function() {
        // Dapatkan ID baris
        var rowId = $(this).closest('tr').attr('id');

        // Dapatkan nilai dari input time[]
        var timeValue = parseFloat($('input[name="time[]"]', '#' + rowId).val()) || 0;

        let bulat = Math.floor(timeValue);

        let desimal = timeValue - bulat;


        console.log((desimal * 100) / 60);

        // Dapatkan nilai dari input contractual_fuel[]
        var contractualFuelValue = parseFloat($('input[name="contractual_fuel[]"]', '#' + rowId).val()) || 0;

        let a = bulat * contractualFuelValue;
        let b = ((desimal * 100) / 60) * contractualFuelValue;
        // Hitung hasil perkalian
        var result = a + b;

        // Set hasil perkalian ke input daily[]
        $('input[name="daily[]"]', '#' + rowId).val(result);
    });
</script>
@endpush
@endsection



