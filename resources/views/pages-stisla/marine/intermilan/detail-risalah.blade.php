@extends('layouts.stisla.app')
@section('title')
    DSP Intermilan Management 
@endsection
@section('content')
<section class="section">

   <style>
      table {
         font-size: 11px;
      }

      td {
  border-right: solid 1px rgb(255, 255, 255); 
  border-left: solid 1px rgb(255, 255, 255);
  line-height: 1.2 !important;
}

input {
      border:0;
      outline:0;
      text-align: left; 
      /* background-color: rgb(226, 236, 151) */
      
   }

   textarea{
      border:0;
      outline:0;
      padding: 7px;
   }



   /* Ubah warna teks dan background Select2 */
.select2-container .select2-selection--single {
  background-color: #fff !important;  /* background putih */
  color: #000 !important;              /* teks hitam */
  border: 1px solid #ced4da !important;
  height: calc(2.25rem + 2px) !important; /* samain sama form-control */
  display: flex;
  align-items: center;
}

/* Saat dropdown terbuka */
.select2-container--default .select2-selection--single .select2-selection__rendered {
  color: #000 !important; /* warna teks */
  line-height: 2.25rem;
}

/* Placeholder biar tetap terlihat */
.select2-container--default .select2-selection--single .select2-selection__placeholder {
  color: #6c757d !important;
}

/* Dropdown list */
.select2-dropdown {
  background-color: #fff !important;
  color: #000 !important;
  border: 1px solid #ced4da !important;
}

/* Highlight option ketika hover */
.select2-results__option--highlighted {
  background-color: #499bc4 !important; /* warna highlight */
  color: #fff !important;
}

   </style>
   
   <div class="section-body">
      <div class="row">
         <div class="col-md-12">

            <div class="card">
               
              
               <div class="card-body">
                  <a href="" class="btn btn-sm btn-primary mb-2">Submit</a>
                  <a class="btn btn-sm btn-light border mb-2" href="{{route('document.intermilan.export', [enkripRambo($start),enkripRambo($end)])}}" target="_blank" class="" data-toggle="tooltip" data-placement="top" title="Export PDF">Export PDF </a>
                  <div class="row">
                     <div class="col-md-8">
                        <div class="">
                           <span>{{$intermilan->code}} </span> <br>
                           <span>{{$intermilan->title}}</span>
                           <h5 class="mb--2">
                           
                              INTERMILAN {{formatDate($start)}} - {{formatDate($end)}}</h5>
                           
                        </div>
                     </div>
                  </div>
                  <div class="d-flex justify-content-between">
                     
                     
                     
                  
                  </div>
                  
                  {{-- <hr> --}}
                 <ul class="nav nav-tabs" id="myTab" role="tablist">
                   <li class="nav-item">
                     <a class="nav-link " id="home-tab"  href="{{route('intermilan.marine.detail', enkripRambo($intermilan->id))}}"  aria-controls="home" aria-selected="true">Intermilan</a>
                   </li>
                   <li class="nav-item">
                     <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Crew</a>
                   </li>
                   <li class="nav-item">
                     <a class="nav-link active" id="contact-tab" data-toggle="tab" href="{{route('intermilan.marine.risalah', enkripRambo($intermilan->id))}}" role="tab" aria-controls="contact" aria-selected="false">Risalah</a>
                   </li>
                     <li class="nav-item">
                        <a class="nav-link" id="ok-tab" data-toggle="tab" href="#ok" role="tab" aria-controls="ok" aria-selected="false">Schedule</a>
                     </li>
                 </ul>
                 <div class="tab-content" id="myTabContent">
                   


                   
                   <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                     <div class=" col-md-12">

                           <b>A. Info HSSE & Highlight Activitas </b>
                           <form action="{{route('intermilan.marine.weather.update')}}" method="POST" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                              <input type="number" name="interWeatherId" id="interWeatherId" value="{{$weather->id}}" hidden>
                           <table class="mb-2">
                              <tr>
                                 <td style="width: 20px">1</td>
                                 <td >Prakiraan Cuaca</td>
                                 
                              </tr>

                              <tr>
                                 <td ></td>
                                 <td ><input type="text" name="title" id="title" style="width: 100%" value="{{$weather->title}}" placeholder="Weather title..."></td>
                                 <td>
                                    
                                    <input type="file" name="file" class="border p-1" id="file">
                                    <button type="submit" class="btn btn-sm">Submit</button>
                                    <a href="#" class="btn btn-sm" data-toggle="modal" data-target="#modalIntermilanWeather">Open</a>
                                 </td>
                                 {{-- <td><button type="submit">Submit</button></td> --}}
                              </tr>
                              
                              
                           </table>
                         </form>
                           
                           {{-- Lifting --}}
                           <div class="table-responsive">
                           <table>
                              <tbody>
                                 <tr>
                                    <td style="width: 20px" >2</td>
                                    <td class="text-left ">Jadwal Lifting Tanker</td>
                                 </tr>
                                 
                                 <tr>
                                    <td></td>
                                    <td colspan="2">
                                       <div class="table-responsive">
                                          
                                          <table class="border w-100">
                                             <thead>
                                                
                                                <tr>
                                                   <th></th>
                                                   <th class="border">CRUDE</th>
                                                   <th class="border">VESSEL</th>
                                                   <th class="border">DESTINATION</th>
                                                   <th class="border text-center">VOLUME <br> Nominasi <br> <small>(Bbls)</small> </th>
                                                   <th class="border text-center">VOLUME <br> Actual <br> <small>(Bbls)</small> </th>
                                                   <th class="border text-center">VOLUME <br> Lifting PPL <br> <small>(Bbls)</small> </th>
                                                   <th class="border text-center">VOLUME <br> Lifting NonPPL <br> <small>(Bbls)</small> </th>
                                                   <th class="border" colspan="2">ALD</th>
                                                   <th class="border text-center">Actual <br>Complete Loading <br>Date</th>
                                                   <th class="border">BL No</th>
                                                   <th class="border">Remark</th>
                                                </tr>
                                             </thead>
                                             <tbody>
                                                @foreach ($liftingSchedules as $lifting)
                                                <tr>
                                                   <td class="border px-1"><a href="#" class="btn btn-sm text-danger" data-toggle="modal" data-target="#modalDeleteLifting-{{$lifting->id}}" class="text-danger"><i class="fa fa-trash"></i></a></td>
                                                   <td class="border">
                                                      {{-- <input type="text" style="width:70px" placeholder="Crude name.."> --}}
                                                      <select  style=" border:none !important; padding:none; text-align: left !important;padding-top: 5px;padding-bottom: 5px;" class="input_lifting_change_{{$lifting->id}}" name="barge" id="lifting_barge_{{$lifting->id}}">
                                                         {{-- <option value="" selected disabled>Select CRUDE</option> --}}
                                                         @foreach ($barges as $barge)
                                                         <option {{$lifting->barge_id == $barge->id ? 'selected' : ''}} value="{{$barge->id}}">{{$barge->name}}</option>
                                                         @endforeach
                                                      </select>
                                                   </td>
                                                   <td class="border"><input type="text" class="input_lifting_{{$lifting->id}}" id="lifting_vessel_{{$lifting->id}}" placeholder="Vessel name.." value="{{$lifting->vessel}}"></td>
                                                   <td class="border"><input type="text" class="input_lifting_{{$lifting->id}}" id="lifting_destination_{{$lifting->id}}" placeholder="Destination.." value="{{$lifting->destination}}"></td>
                                                   <td class="border"><input type="text" class="input_lifting_{{$lifting->id}}" id="lifting_volume_nominasi_{{$lifting->id}}" style="width:70px;text-align:center" value="{{$lifting->volume_nominasi}}"></td>
                                                   <td class="border"><input type="text" class="input_lifting_{{$lifting->id}}" id="lifting_volume_actual_{{$lifting->id}}"  style="width:70px;text-align:center" value="{{$lifting->volume_actual}}"></td>
                                                   <td class="border"><input type="text" class="input_lifting_{{$lifting->id}}" id="lifting_volume_lifting_ppl_{{$lifting->id}}" style="width:70px;text-align:center" value="{{$lifting->volume_lifting_ppl}}"></td>
                                                   <td class="border"><input type="text" class="input_lifting_{{$lifting->id}}" id="lifting_volume_lifting_nonppl_{{$lifting->id}}"  style="width:70px;text-align:center" value="{{$lifting->volume_lifting_nonppl}}"></td>
   
                                                   <td class="border"><input type="date" class="input_lifting_change_{{$lifting->id}}" id="lifting_ald_start_{{$lifting->id}}" value="{{$lifting->ald_start}}"></td>
                                                   <td class="border"><input type="date" class="input_lifting_change_{{$lifting->id}}" id="lifting_ald_end_{{$lifting->id}}" value="{{$lifting->ald_start}}"></td>
   
                                                   <td class="border"><input type="date" class="input_lifting_change_{{$lifting->id}}" id="lifting_complete_date_{{$lifting->id}}" value="{{$lifting->complete_date}}"></td>
                                                   <td class="border"><input type="text"  class="input_lifting_{{$lifting->id}}" id="lifting_bl_no_{{$lifting->id}}" value="{{$lifting->bl_no}}" placeholder="BL no.."></td>
                                                   <td class="border"><input type="text"  class="input_lifting_{{$lifting->id}}" id="lifting_remark_{{$lifting->id}}" value="{{$lifting->remark}}" placeholder="Remark.."></td>
                                                </tr>
                                                @endforeach
                                               



                                                <tr>
                                                   <td class="border" colspan="3"></td>
                                                </tr>
                                                <form action="{{route('intermilan.marine.lifting.store')}}" method="POST">
                                                   @csrf
                                                   <input type="number" id="intermilanId" name="intermilanId" value="{{$intermilan->id}}" hidden>
                                                   <tr>
                                                      <td class="border"></td>
                                                      <td class="border">
                                                         <select  style=" border:none !important; padding:none; text-align: left !important;padding-top: 5px;padding-bottom: 5px;" name="barge" id="barge">
                                                            <option value="" selected disabled>Select CRUDE</option>
                                                            @foreach ($barges as $barge)
                                                            <option value="{{$barge->id}}">{{$barge->name}}</option>
                                                            @endforeach
                                                         </select>
                                                      </td>
                                                      <td class="border">
                                                         <input type="text" id="vessel" name="vessel" placeholder="Vessel name..">
                                                      </td>
                                                      <td class="border">
                                                         <input type="text" id="destination" name="destination" placeholder="Destination..">
                                                      </td>
                                                      <td class="border">
                                                         <input type="number" id="vol_nominasi" name="vol_nominasi" style="width:70px">
                                                      </td>
                                                      <td class="border">
                                                         <input type="number" id="vol_actual" name="vol_actual"  style="width:70px">
                                                      </td>
                                                      <td class="border">
                                                         <input type="number" id="vol_lifting_ppl" name="vol_lifting_ppl"  style="width:70px">
                                                      </td>
                                                      <td class="border">
                                                         <input type="number" id="vol_lifting_nonppl" name="vol_lifting_nonppl"  style="width:70px">
                                                      </td>
      
                                                      <td class="border"><input type="date" id="ald_start" name="ald_start"></td>
                                                      <td class="border"><input type="date" id="ald_end" name="ald_end"></td>
      
                                                      <td class="border"><input type="date" id="complete_date" name="complete_date"></td>
                                                      <td class="border"><input type="text" id="bl_no" name="bl_no" placeholder="BL no.."></td>
                                                      <td class="border"><input type="text" id="remark" name="remark" placeholder="Remark.."></td>
                                                   </tr>
                                                   <tr>
                                                      <td class="border"></td>
                                                      <td class="border" colspan=""><button type="submit" class="btn btn-sm btn-block">Add</button></td>
                                                      <td colspan="7">
                                                         <span class="text-muted">Klik Add untuk menambah data</span>
                                                      </td>
                                                   </tr>
                                                </form>


                                             </tbody>
                                             
                                          </table>
                                       </div>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                           </div>


                           {{-- IPB --}}
                           <table class="mt-2">
                              <tbody>
                                 <tr>
                                    <td style="width: 20px">3</td>
                                    <td class="text-left ">Informasi Kapal IPB</td>
                                 </tr>

                                 @foreach ($ipbs as $ipb)
                                 <tr>
                                    <td></td>
                                    <td>{{$ipb->title}}:</td>
                                 </tr>
                                 <tr>
                                    <td></td>
                                    <td class="border-bottom" style="width: 180px">
                                       {{-- <input type="text" name="" id="" style="width: 100px" placeholder="Kapal Operasi (2 IPB)"> --}}
                                       Kapal Operasi
                                    </td>
                                    
                                    <td class="border-bottom" colspan="4">
                                       <select name="vessel" id="ipb_vessel1_{{$ipb->id}}" style=" border:none !important; padding:none; text-align: left !important;padding-top: 5px;padding-bottom: 5px;"  class="naked-input  input_ipb_vessel_{{$ipb->id}}" >
                                          <option value="0"  selected>Empty</option>
                                          @foreach ($vessels as $vessel)
                                             
                                          <option {{$ipb->vessel1 == $vessel->id ? 'selected' : ''}} value="{{$vessel->id}}">{{$vessel->name}}</option>
                                          @endforeach
                                          
                                          {{-- <option value="Clara58"> Clara58</option> --}}
                                       </select>
                                       <select name="vessel" id="ipb_vessel2_{{$ipb->id}}" style=" border:none !important; padding:none; text-align: left !important;padding-top: 5px;padding-bottom: 5px;"  class="naked-input  input_ipb_vessel_{{$ipb->id}}" >
                                          <option value="0"  selected>Empty</option>
                                          @foreach ($vessels as $vessel)
                                             
                                          <option {{$ipb->vessel2 == $vessel->id ? 'selected' : ''}} value="{{$vessel->id}}">{{$vessel->name}}</option>
                                          @endforeach
                                          
                                          {{-- <option value="Clara58"> Clara58</option> --}}
                                       </select>
                                       <select name="vessel" id="ipb_vessel3_{{$ipb->id}}" style=" border:none !important; padding:none; text-align: left !important;padding-top: 5px;padding-bottom: 5px;"  class="naked-input  input_ipb_vessel_{{$ipb->id}}" >
                                          <option value="0"  selected>Empty</option>
                                          @foreach ($vessels as $vessel)
                                             
                                          <option {{$ipb->vessel3 == $vessel->id ? 'selected' : ''}} value="{{$vessel->id}}">{{$vessel->name}}</option>
                                          @endforeach
                                          
                                          {{-- <option value="Clara58"> Clara58</option> --}}
                                       </select>
                                    </td>
                                 </tr>
                                 @endforeach
                                 
                                 
                              </tbody>
                           </table>


                           {{-- Barge --}}
                           <div class="table-responsive mt-3">
                              <table>
                                 <tbody>
                                    <tr>
                                       <td style="width: 20px" >4</td>
                                       <td class="text-left ">Informasi/Aktifitas Barge Tim Well Intervention/Drilling & Marine P&O</td>
                                    </tr>
                                    
                                    <tr>
                                       <td></td>
                                       <td colspan="2">
                                          <div class="table-responsive">
                                             
                                             <table class="border w-100">
                                                <thead>
                                                   
                                                   <tr>
                                                      <th style="width: 25px" class="py-3"></th>
                                                      <th class="border">Barge</th>
                                                      <th class="border">Description</th>
                                                      <th class="border">Note</th>
                                                      
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                   @foreach ($bargeSchedules as $bargeSchedule)
                                                   <tr>
                                                      <td class="border px-1"><a href="#" class="btn btn-sm text-danger" data-toggle="modal" data-target="#modalDeleteBarge-{{$bargeSchedule->id}}" class="text-danger"><i class="fa fa-trash"></i></a></td>
                                                      <td class="border">
                                                         {{-- <input type="text" style="width:70px" placeholder="Crude name.."> --}}
                                                         <select  style=" border:none !important; padding:none; text-align: left !important;padding-top: 5px;padding-bottom: 5px;" class="input_barge_schedule_change_{{$bargeSchedule->id}}" name="barge" id="barge_schedule_barge_{{$bargeSchedule->id}}">
                                                            {{-- <option value="" selected disabled>Select CRUDE</option> --}}
                                                            @foreach ($barges as $barge)
                                                            <option {{$bargeSchedule->barge_id == $barge->id ? 'selected' : ''}} value="{{$barge->id}}">{{$barge->name}}</option>
                                                            @endforeach
                                                         </select>
                                                      </td>
                                                      <td class="border"><input type="text" class="input_barge_schedule_{{$bargeSchedule->id}} w-100" id="barge_schedule_title_{{$bargeSchedule->id}}" placeholder="Description.." value="{{$bargeSchedule->title}}"></td>
                                                      <td class="border"><input type="text" class="input_barge_schedule_{{$bargeSchedule->id}} w-100" id="barge_schedule_note_{{$bargeSchedule->id}}" placeholder="Note.." value="{{$bargeSchedule->note}}"></td>
                                                   </tr>
                                                   @endforeach
                                                  
   
   
   
                                                   <tr>
                                                      <td class="border" colspan="3"></td>
                                                   </tr>
                                                   <form action="{{route('intermilan.marine.barge.store')}}" method="POST">
                                                      @csrf
                                                      <input type="number" id="intermilanId" name="intermilanId" value="{{$intermilan->id}}" hidden>
                                                      <tr>
                                                         <td class="border"></td>
                                                         <td class="border" style="width: 100px">
                                                            <select  style=" border:none !important; padding:none; text-align: left !important;padding-top: 5px;padding-bottom: 5px;" name="schedule_barge" id="schedule_barge">
                                                               <option value="" selected disabled>Select Barge</option>
                                                               @foreach ($barges as $barge)
                                                               <option value="{{$barge->id}}">{{$barge->name}}</option>
                                                               @endforeach
                                                            </select>
                                                         </td>
                                                         <td class="border">
                                                            <input type="text" class="w-100" id="title" name="title" placeholder="Description..">
                                                         </td>
                                                         <td class="border">
                                                            <input type="text" class="w-100" id="note" name="note" placeholder="Note..">
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td class="border"></td>
                                                         <td class="border" colspan=""><button type="submit" class="btn btn-sm btn-block">Add</button></td>
                                                         <td colspan="7">
                                                            <span class="text-muted">Klik Add untuk menambah data</span>
                                                         </td>
                                                      </tr>
                                                   </form>
   
   
                                                </tbody>
                                                
                                             </table>
                                          </div>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>



                           {{-- Project --}}
                           <div class="table-responsive mt-3">
                              <table>
                                 <tbody>
                                    <tr>
                                       <td style="width: 20px" >5</td>
                                       <td class="text-left ">Jadwal/Aktifitas Tim Proyek</td>
                                    </tr>
                                    
                                    <tr>
                                       <td></td>
                                       <td colspan="2">
                                          <div class="table-responsive">
                                             
                                             <table class="border w-100">
                                                {{-- <thead>
                                                   
                                                   <tr>
                                                      <th style="width: 25px" class="py-3"></th>
                                                      <th class="border">Barge</th>
                                                      <th class="border">Description</th>
                                                      <th class="border">Note</th>
                                                      
                                                   </tr>
                                                </thead> --}}
                                                <tbody>
                                                   @foreach ($projectSchedules as $projectSchedule)
                                                   <tr>
                                                      <td class="border px-1"><a href="#" class="btn btn-sm text-danger" data-toggle="modal" data-target="#modalDeleteProject-{{$projectSchedule->id}}" class="text-danger"><i class="fa fa-trash"></i></a></td>
                                                      <td class="border">
                                                         {{-- <input type="text" style="width:70px" placeholder="Crude name.."> --}}
                                                         <select  style=" border:none !important; padding:none; text-align: left !important;padding-top: 5px;padding-bottom: 5px;" class="input_project_schedule_change_{{$projectSchedule->id}}" name="barge" id="project_schedule_vessel_{{$projectSchedule->id}}">
                                                            {{-- <option value="" selected disabled>Select CRUDE</option> --}}
                                                            @foreach ($vessels as $vessel)
                                                            <option {{$projectSchedule->vessel_id == $vessel->id ? 'selected' : ''}} value="{{$vessel->id}}">{{$vessel->name}}</option>
                                                            @endforeach
                                                         </select>
                                                      </td>
                                                      <td class="border"><input type="text" class="input_project_schedule_{{$projectSchedule->id}} w-100" id="project_schedule_desc_{{$projectSchedule->id}}" placeholder="Description.." value="{{$projectSchedule->description}}"></td>
                                                      <td class="border">
                                                         <select  style=" border:none !important; padding:none; text-align: left !important;padding-top: 5px;padding-bottom: 5px;" class="input_project_schedule_change_{{$projectSchedule->id}}" name="barge" id="prpject_schedule_port_{{$projectSchedule->id}}">
                                                            {{-- <option value="" selected disabled>Select CRUDE</option> --}}
                                                            @foreach ($platforms as $port)
                                                            <option {{$projectSchedule->port_id == $port->id ? 'selected' : ''}} value="{{$port->id}}">{{$port->name}}</option>
                                                            @endforeach
                                                         </select>
                                                      </td>
                                                   </tr>
                                                   @endforeach
                                                  
   
   
   
                                                   <tr>
                                                      <td class="border" colspan="3" ></td>
                                                   </tr>
                                                   <form action="{{route('intermilan.marine.project.store')}}" method="POST">
                                                      @csrf
                                                      <input type="number" id="intermilanId" name="intermilanId" value="{{$intermilan->id}}" hidden>
                                                      <tr>
                                                         <td class="border" style="width: 25px"></td>
                                                         <td class="border" style="width: 100px">
                                                            <select  style=" border:none !important; padding:none; text-align: left !important;padding-top: 5px;padding-bottom: 5px;" name="project_vessel" id="project_vessel">
                                                               <option value="" selected disabled>Select Vessel</option>
                                                               @foreach ($vessels as $vessel)
                                                               <option value="{{$vessel->id}}">{{$vessel->name}}</option>
                                                               @endforeach
                                                            </select>
                                                         </td>
                                                         <td class="border">
                                                            <input type="text" class="w-100" id="description" name="description" placeholder="Description..">
                                                         </td>
                                                         <td class="border">
                                                            <select  style=" border:none !important; padding:none; text-align: left !important;padding-top: 5px;padding-bottom: 5px;" name="project_port" id="project_port">
                                                               <option value="" selected disabled>Select Location</option>
                                                               @foreach ($platforms as $port)
                                                               <option value="{{$port->id}}">{{$port->name}}</option>
                                                               @endforeach
                                                            </select>
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td class="border"></td>
                                                         <td class="border" colspan=""><button type="submit" class="btn btn-sm btn-block">Add</button></td>
                                                         <td colspan="7">
                                                            <span class="text-muted">Klik Add untuk menambah data</span>
                                                         </td>
                                                      </tr>
                                                   </form>
   
   
                                                </tbody>
                                                
                                             </table>
                                          </div>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>



                           {{-- Foodstuff --}}
                           <div class="table-responsive mt-3">
                              <table>
                                 <tbody>
                                    <tr>
                                       <td style="width: 20px" >6</td>
                                       <td class="text-left ">Kapal Foodstuff & Utility (Regular)</td>
                                    </tr>
                                    
                                    <tr>
                                       <td></td>
                                       <td colspan="2">
                                          <div class="table-responsive">
                                             
                                             <table class="border w-100">
                                                {{-- <thead>
                                                   
                                                   <tr>
                                                      <th style="width: 25px" class="py-3"></th>
                                                      <th class="border">Barge</th>
                                                      <th class="border">Description</th>
                                                      <th class="border">Note</th>
                                                      
                                                   </tr>
                                                </thead> --}}
                                                <tbody>
                                                   @foreach ($foodstuffSchedules as $foodSchedule)
                                                   <tr>
                                                      {{-- <td class="border" style="width: 25px"></td> --}}
                                                      <td class="border px-1"><a href="#" class="btn btn-sm text-danger" data-toggle="modal" data-target="#modalDeleteFood-{{$foodSchedule->id}}" class="text-danger"><i class="fa fa-trash"></i></a></td>
                                                      <td class="border" style="width: 100px">
                                                         <select  style=" border:none !important; padding:none; text-align: left !important;padding-top: 5px;padding-bottom: 5px;" class="input_foodstuff_schedule_change_{{$foodSchedule->id}}" name="foodstuff_vessel" id="foodstuff_schedule_vessel_{{$foodSchedule->id}}">
                                                            <option value="" selected disabled>Select Vessel</option>
                                                            @foreach ($vessels as $vessel)
                                                            <option {{$foodSchedule->vessel_id == $vessel->id ? 'selected' : ''}} value="{{$vessel->id}}">{{$vessel->name}}</option>
                                                            @endforeach
                                                         </select>
                                                      </td>
                                                      <td class="border" style="width: 120px">
                                                         <input type="text" class="input_foodstuff_schedule_{{$foodSchedule->id}} w-100" id="foodstuff_schedule_location_{{$foodSchedule->id}}" name="location" placeholder="NBU/CBU/SBU.." value="{{$foodSchedule->location}}">
                                                      </td>
                                                      <td class="border">
                                                         <input type="text" class="input_foodstuff_schedule_{{$foodSchedule->id}} w-100" id="foodstuff_schedule_desc_{{$foodSchedule->id}}" name="description" placeholder="Deskripsi.." value="{{$foodSchedule->description}}">
                                                      </td>
                                                      
                                                   </tr>
                                                   <tr>
                                                      <td colspan="2" class="border"></td>
                                                      <td colspan="2" class="border">
                                                         {{-- <td class="border" > --}}
                                                            <textarea type="text" class="w-100 input_foodstuff_schedule_{{$foodSchedule->id}}" id="foodstuff_schedule_schedule_{{$foodSchedule->id}}" style="border:none; padding:7px"  name="schedule" rows="2" placeholder="Jadwal..">{{$foodSchedule->schedule}}</textarea>
                                                         {{-- </td> --}}
                                                      </td>
                                                   </tr>
                                                   @endforeach
                                                  
   
   
   
                                                   <tr>
                                                      <td class="border" colspan="3" ></td>
                                                   </tr>
                                                   <form action="{{route('intermilan.marine.foodstuff.store')}}" method="POST">
                                                      @csrf
                                                      <input type="number" id="intermilanId" name="intermilanId" value="{{$intermilan->id}}" hidden>
                                                      <tr>
                                                         <td class="border" style="width: 25px"></td>
                                                         <td class="border" style="width: 100px">
                                                            <select  style=" border:none !important; padding:none; text-align: left !important;padding-top: 5px;padding-bottom: 5px;" name="foodstuff_vessel" id="foodstuff_vessel">
                                                               <option value="" selected disabled>Select Vessel</option>
                                                               @foreach ($vessels as $vessel)
                                                               <option value="{{$vessel->id}}">{{$vessel->name}}</option>
                                                               @endforeach
                                                            </select>
                                                         </td>
                                                         <td class="border" style="width: 120px">
                                                            <input type="text" class="w-100" id="location" name="location" placeholder="NBU/CBU/SBU..">
                                                         </td>
                                                         <td class="border">
                                                            <input type="text" class="w-100" id="description" name="description" placeholder="Deskripsi..">
                                                         </td>
                                                         
                                                      </tr>
                                                      <tr>
                                                         <td colspan="2" class="border"></td>
                                                         <td colspan="2" class="border">
                                                            {{-- <td class="border" > --}}
                                                               <textarea type="text" id="schedule" style="border:none; padding:7px" class="w-100" name="schedule" rows="2" placeholder="Jadwal.."></textarea>
                                                            {{-- </td> --}}
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td class="border"></td>
                                                         <td class="border" colspan=""><button type="submit" class="btn btn-sm btn-block">Add</button></td>
                                                         <td colspan="7">
                                                            <span class="text-muted">Klik Add untuk menambah data</span>
                                                         </td>
                                                      </tr>
                                                   </form>
   
   
                                                </tbody>
                                                
                                             </table>
                                          </div>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>



                           {{-- Pax --}}
                           <div class="table-responsive mt-3">
                              <table>
                                 <tbody>
                                    <tr>
                                       <td style="width: 20px" >7</td>
                                       <td class="text-left ">Jadwal Mobilisasi Pax diluar Crew Change</td>
                                    </tr>
                                    
                                    <tr>
                                       <td></td>
                                       <td colspan="2">
                                          <div class="table-responsive">
                                             
                                             <table class="border w-100">
                                                {{-- <thead>
                                                   
                                                   <tr>
                                                      <th style="width: 25px" class="py-3"></th>
                                                      <th class="border">Barge</th>
                                                      <th class="border">Description</th>
                                                      <th class="border">Note</th>
                                                      
                                                   </tr>
                                                </thead> --}}
                                                <tbody>
                                                   @foreach ($paxSchedules as $paxSchedule)
                                                   <tr>
                                                      
                                                      <td class="border px-1"><a href="#" class="btn btn-sm text-danger" data-toggle="modal" data-target="#modalDeletePax-{{$paxSchedule->id}}" class="text-danger"><i class="fa fa-trash"></i></a></td>
                                                      
                                                      <td class="border" colspan="" style="width: 200px">
                                                         <input type="text" class="input_pax_schedule_{{$paxSchedule->id}} w-100" id="pax_schedule_vessel_{{$paxSchedule->id}}" name="location" placeholder="NBU/CBU/SBU.." value="{{$paxSchedule->vessel}}">
                                                      </td>
                                                      <td class="border">
                                                         <textarea type="text" style="border:none; padding:7px" class="input_pax_schedule_{{$paxSchedule->id}} w-100" id="pax_schedule_desc_{{$paxSchedule->id}}" name="description" placeholder="Deskripsi.." rows="2" value="">{{$paxSchedule->description}}</textarea>
                                                      </td>

                                                      
                                                      
                                                   </tr>
                                                   
                                                   @endforeach
                                                  
   
   
   
                                                   <tr>
                                                      <td class="border" colspan="3" ></td>
                                                   </tr>
                                                   <form action="{{route('intermilan.marine.pax.store')}}" method="POST">
                                                      @csrf
                                                      <input type="number" id="intermilanId" name="intermilanId" value="{{$intermilan->id}}" hidden>
                                                      <tr>
                                                         <td class="border" style="width: 25px"></td>
                                                         
                                                         <td class="border" colspan="" style="width: 200px">
                                                            <input type="text" id="vessel" class="w-100" name="vessel" placeholder="Kapal..">
                                                         </td>
                                                         <td class="border">
                                                            <input type="text" id="desc" class="w-100" name="desc" placeholder="Deskripsi..">
                                                         </td>
                                                         
                                                      </tr>
                                                      
                                                      <tr>
                                                         <td class="border"></td>
                                                         <td class="border" colspan=""><button type="submit" class="btn btn-sm btn-block">Add</button></td>
                                                         <td colspan="">
                                                            <span class="text-muted">Klik Add untuk menambah dataaa</span>
                                                         </td>
                                                      </tr>
                                                   </form>
   
   
                                                </tbody>
                                                
                                             </table>
                                          </div>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>


                           {{-- Crew --}}
                           <div class="table-responsive mt-3">
                              <table>
                                 <tbody>
                                    <tr>
                                       <td style="width: 20px" >8</td>
                                       <td class="text-left ">Jadwal Crew Change Bulan Oktober 2025 Terlampir</td>
                                    </tr>
                                    
                                    
                                 </tbody>
                              </table>
                           </div>

                           <br>
                           
                           
                           <b class="mt-3">B. Pemeliharaan Rutin dan atauh Perbaikan Barge & Kapal </b>
                           {{-- Maintenance --}}
                           <div class="table-responsive mt-1">
                              <table>
                                 <tbody>
                                    {{-- <tr>
                                       <td style="width: 20px" >6</td>
                                       <td class="text-left ">Kapal Foodstuff & Utility (Regular)</td>
                                    </tr> --}}
                                    
                                    <tr>
                                       <td></td>
                                       <td colspan="2">
                                          <div class="table-responsive">
                                             
                                             <table class="border w-100">
                                                {{-- <thead>
                                                   
                                                   <tr>
                                                      <th style="width: 25px" class="py-3"></th>
                                                      <th class="border">Barge</th>
                                                      <th class="border">Description</th>
                                                      <th class="border">Note</th>
                                                      
                                                   </tr>
                                                </thead> --}}
                                                <tbody>
                                                   @foreach ($maintenanceSchedules as $maintenanceSchedule)
                                                   <tr>
                                                      <td class="border px-1"><a href="#" class="btn btn-sm text-danger" data-toggle="modal" data-target="#modalDeleteMaintenance-{{$maintenanceSchedule->id}}" class="text-danger"><i class="fa fa-trash"></i></a></td>
                                                      <td class="border" style="width: 100px">
                                                         @if ($maintenanceSchedule->vessel_id != null)
                                                            <select  style=" border:none !important; padding:none; text-align: left !important;padding-top: 5px;padding-bottom: 5px;" class="input_maintenance_schedule_change_{{$maintenanceSchedule->id}}" name="foodstuff_vessel" id="maintenance_schedule_vessel_{{$maintenanceSchedule->id}}">
                                                               <option value="" selected disabled>Select Vessel</option>
                                                               @foreach ($vessels as $vessel)
                                                               <option {{$maintenanceSchedule->vessel_id == $vessel->id ? 'selected' : ''}} value="{{$vessel->id}}">{{$vessel->name}}</option>
                                                               @endforeach
                                                            </select>
                                                            @else
                                                            <select  style=" border:none !important; padding:none; text-align: left !important;padding-top: 5px;padding-bottom: 5px;" class="input_maintenance_schedule_change_{{$maintenanceSchedule->id}}" name="foodstuff_vessel" id="maintenance_schedule_barge_{{$maintenanceSchedule->id}}">
                                                               <option value="" selected disabled>Select Barge</option>
                                                               @foreach ($barges as $barge)
                                                               <option {{$maintenanceSchedule->barge_id == $barge->id ? 'selected' : ''}} value="{{$barge->id}}">{{$vessel->name}}</option>
                                                               @endforeach
                                                            </select>
                                                         @endif
                                                         
                                                      </td>
                                                      
                                                      <td class="border">
                                                         <input type="text" class="input_maintenance_schedule_{{$maintenanceSchedule->id}} w-100" id="maintenance_schedule_desc_{{$maintenanceSchedule->id}}" name="description" placeholder="Deskripsi.." value="{{$maintenanceSchedule->description}}">
                                                      </td>
                                                      
                                                   </tr>
                                                   
                                                   @endforeach
                                                  
   
   
   
                                                   <tr>
                                                      <td class="border" colspan="3" ></td>
                                                   </tr>
                                                   <form action="{{route('intermilan.marine.maintenance.store')}}" method="POST">
                                                      @csrf
                                                      <input type="number" id="intermilanId" name="intermilanId" value="{{$intermilan->id}}" hidden>
                                                      <tr>
                                                         <td class="border" style="width: 25px"></td>
                                                         <td class="border" style="width: 100px">
                                                            <select  style=" border:none !important; padding:none; text-align: left !important;padding-top: 5px;padding-bottom: 5px;" name="maintenance_vessel" id="maintenance_vessel">
                                                               <option value="" selected disabled>Select Kapal</option>
                                                               @foreach ($vessels as $vessel)
                                                               <option value="{{$vessel->id}}">{{$vessel->name}}</option>
                                                               @endforeach
                                                            </select>
                                                            <select  style=" border:none !important; padding:none; text-align: left !important;padding-top: 5px;padding-bottom: 5px;" name="maintenance_barge" id="maintenance_barge">
                                                               <option value="" selected disabled>Select Barge</option>
                                                               @foreach ($barges as $barge)
                                                               <option value="{{$barge->id}}">{{$barge->name}}</option>
                                                               @endforeach
                                                            </select>
                                                         </td>
                                                         
                                                         <td class="border">
                                                            <input type="text" class="w-100" id="desc" name="desc" placeholder="Deskripsi..">
                                                         </td>
                                                         
                                                      </tr>
                                                      
                                                      <tr>
                                                         <td class="border"></td>
                                                         <td class="border" colspan=""><button type="submit" class="btn btn-sm btn-block">Add</button></td>
                                                         <td colspan="7">
                                                            <span class="text-muted">Klik Add untuk menambah data</span>
                                                         </td>
                                                      </tr>
                                                   </form>
   
   
                                                </tbody>
                                                
                                             </table>
                                          </div>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                           <br>


                           <b class="mt-3">C. Hopper </b>
                           {{-- Maintenance --}}
                           <div class="table-responsive mt-1">
                              <table>
                                 <tbody>
                                    {{-- <tr>
                                       <td style="width: 20px" >6</td>
                                       <td class="text-left ">Kapal Foodstuff & Utility (Regular)</td>
                                    </tr> --}}
                                    
                                    <tr>
                                       <td></td>
                                       <td colspan="2">
                                          <div class="table-responsive">
                                             
                                             <table class="border w-100">
                                                {{-- <thead>
                                                   
                                                   <tr>
                                                      <th style="width: 25px" class="py-3"></th>
                                                      <th class="border">Barge</th>
                                                      <th class="border">Description</th>
                                                      <th class="border">Note</th>
                                                      
                                                   </tr>
                                                </thead> --}}
                                                <tbody>
                                                   @foreach ($hopperSchedules as $hopperSchedule)
                                                   <tr>
                                                      <td class="border px-1"><a href="#" class="btn btn-sm text-danger" data-toggle="modal" data-target="#modalDeleteHopper-{{$hopperSchedule->id}}" class="text-danger"><i class="fa fa-trash"></i></a></td>
                                                      
                                                      
                                                      <td class="border" colspan="2">
                                                         <textarea type="text" class="input_hopper_schedule_{{$hopperSchedule->id}} w-100" id="hopper_schedule_desc_{{$hopperSchedule->id}}" name="description" placeholder="Deskripsi.." value="" rows="1">{{$hopperSchedule->description}}</textarea>
                                                      </td>
                                                      
                                                   </tr>
                                                   
                                                   @endforeach
                                                  
   
   
   
                                                   <tr>
                                                      <td class="border" colspan="3" ></td>
                                                   </tr>
                                                   <form action="{{route('intermilan.marine.hopper.store')}}" method="POST">
                                                      @csrf
                                                      <input type="number" id="intermilanId" name="intermilanId" value="{{$intermilan->id}}" hidden>
                                                      <tr>
                                                         <td class="border" style="width: 25px"></td>
                                                         
                                                         
                                                         <td class="border" colspan="2">
                                                            <textarea type="text" class="w-100" id="desc" name="desc" rows="1" placeholder="Hopper baru.."></textarea>
                                                         </td>
                                                         
                                                      </tr>
                                                      
                                                      <tr>
                                                         <td class="border"></td>
                                                         <td class="border" style="width: 100px" colspan=""><button type="submit" class="btn btn-sm btn-block">Add</button></td>
                                                         <td colspan="7">
                                                            <span class="text-muted">Klik Add untuk menambah data</span>
                                                         </td>
                                                      </tr>
                                                   </form>
   
   
                                                </tbody>
                                                
                                             </table>
                                          </div>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                           <br>

                           <b class="mt-3">D. Lain-lain </b>
                           {{-- Maintenance --}}
                           <div class="table-responsive mt-1">
                              <table>
                                 <tbody>
                                    {{-- <tr>
                                       <td style="width: 20px" >6</td>
                                       <td class="text-left ">Kapal Foodstuff & Utility (Regular)</td>
                                    </tr> --}}
                                    
                                    <tr>
                                       <td></td>
                                       <td colspan="2">
                                          <div class="table-responsive">
                                             
                                             <table class="border w-100">
                                                {{-- <thead>
                                                   
                                                   <tr>
                                                      <th style="width: 25px" class="py-3"></th>
                                                      <th class="border">Barge</th>
                                                      <th class="border">Description</th>
                                                      <th class="border">Note</th>
                                                      
                                                   </tr>
                                                </thead> --}}
                                                <tbody>
                                                   @foreach ($otherSchedules as $otherSchedule)
                                                   <tr>
                                                      <td class="border px-1"><a href="#" class="btn btn-sm text-danger" data-toggle="modal" data-target="#modalDeleteOther-{{$otherSchedule->id}}" class="text-danger"><i class="fa fa-trash"></i></a></td>
                                                      
                                                      
                                                      <td class="border" colspan="2">
                                                         <textarea  type="text" rows="1" class="input_other_schedule_{{$otherSchedule->id}} w-100" id="other_schedule_desc_{{$otherSchedule->id}}" name="description" placeholder="Deskripsi.." value="">{{$otherSchedule->description}}</textarea>
                                                      </td>
                                                      
                                                   </tr>
                                                   
                                                   @endforeach
                                                  
   
   
   
                                                   <tr>
                                                      <td class="border" colspan="3" ></td>
                                                   </tr>
                                                   <form action="{{route('intermilan.marine.other.store')}}" method="POST">
                                                      @csrf
                                                      <input type="number" id="intermilanId" name="intermilanId" value="{{$intermilan->id}}" hidden>
                                                      <tr>
                                                         <td class="border" style="width: 25px"></td>
                                                         
                                                         
                                                         <td class="border" colspan="2">
                                                            <textarea type="text" class="w-100" rows="1" id="desc" name="desc" rows="" placeholder="Lain-lain baru.."></textarea>
                                                         </td>
                                                         
                                                      </tr>
                                                      
                                                      <tr>
                                                         <td class="border"></td>
                                                         <td class="border" style="width: 100px" colspan=""><button type="submit" class="btn btn-sm btn-block">Add</button></td>
                                                         <td colspan="7">
                                                            <span class="text-muted">Klik Add untuk menambah data</span>
                                                         </td>
                                                      </tr>
                                                   </form>
   
   
                                                </tbody>
                                                
                                             </table>
                                          </div>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                           <br>



                           <b class="mt-3">E. Main Strategy </b>
                           {{-- Maintenance --}}
                           <div class="table-responsive mt-1">
                              <table>
                                 <tbody>
                                    {{-- <tr>
                                       <td style="width: 20px" >6</td>
                                       <td class="text-left ">Kapal Foodstuff & Utility (Regular)</td>
                                    </tr> --}}
                                    
                                    <tr>
                                       <td></td>
                                       <td colspan="2">
                                          <div class="table-responsive">
                                             
                                             <table class="border w-100">
                                                {{-- <thead>
                                                   
                                                   <tr>
                                                      <th style="width: 25px" class="py-3"></th>
                                                      <th class="border">Barge</th>
                                                      <th class="border">Description</th>
                                                      <th class="border">Note</th>
                                                      
                                                   </tr>
                                                </thead> --}}
                                                <tbody>
                                                   @foreach ($mainStrategies as $mainStrategy)
                                                   <tr>
                                                      <td class="border px-1"><a href="#" class="btn btn-sm text-danger" data-toggle="modal" data-target="#modalDeleteMainStrategy-{{$mainStrategy->id}}" class="text-danger"><i class="fa fa-trash"></i></a></td>
                                                      
                                                      
                                                      <td class="border" colspan="2">
                                                         <textarea  type="text" rows="1" class="input_main_strategy_{{$mainStrategy->id}} w-100" id="main_strategy_desc_{{$mainStrategy->id}}" name="description" placeholder="Deskripsi.." value="">{{$mainStrategy->description}}</textarea>
                                                      </td>
                                                      
                                                   </tr>
                                                   
                                                   @endforeach
                                                  
   
   
   
                                                   <tr>
                                                      <td class="border" colspan="3" ></td>
                                                   </tr>
                                                   <form action="{{route('intermilan.marine.main.strategy.store')}}" method="POST">
                                                      @csrf
                                                      <input type="number" id="intermilanId" name="intermilanId" value="{{$intermilan->id}}" hidden>
                                                      <tr>
                                                         <td class="border" style="width: 25px"></td>
                                                         
                                                         
                                                         <td class="border" colspan="2">
                                                            <textarea type="text" class="w-100" rows="1" id="desc" name="desc" rows="" placeholder="Main Strategy baru.."></textarea>
                                                         </td>
                                                         
                                                      </tr>
                                                      
                                                      <tr>
                                                         <td class="border"></td>
                                                         <td class="border" style="width: 100px" colspan=""><button type="submit" class="btn btn-sm btn-block">Add</button></td>
                                                         <td colspan="7">
                                                            <span class="text-muted">Klik Add untuk menambah data</span>
                                                         </td>
                                                      </tr>
                                                   </form>
   
   
                                                </tbody>
                                                
                                             </table>
                                          </div>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                           <br>





                           
                           <br>
                           <hr>
                        
                        {{-- <textarea class="form-control" id="desc" name="desc"   rows="3"></textarea> --}}
                        <b>#Note</b>
                        <textarea name="note_desc" id="note_desc" cols="30" rows="10" hidden></textarea>
                      {{-- <span>B</span> --}}
                        <main>
                           <trix-toolbar id="my_toolbar"></trix-toolbar>
                           <div class="more-stuff-inbetween"></div>
                           <trix-editor toolbar="my_toolbar" input="note_desc" id="trix_desc" style="height: 200px" class="input_note" >{!! $intermilan->body !!}</trix-editor>
                        </main>
                        {{-- <input type="text" class="form-control text-left" id="desc" name="desc" > --}}
                     </div>


                   </div>

                     <div class="tab-pane fade " id="ok" role="tabpanel" aria-labelledby="ok-tab">
                        <div class="row">
                           <div class="col-md-3">
                              <div class="badge badge-info mb-2">Create Sailing Order</div>
                              <form action="{{route('schedule.store.so')}}" method="POST">
                                 @csrf
                                 {{-- <div class="form-group"> --}}
                                    <input type="date" name="start" id="start" value="{{$start}}" hidden>
                                    <input type="date" name="end" id="end" value="{{$end}}" hidden>
                                    <select name="vessel" id="vessel" class="form-control mb-2">
                                       <option value="" selected disabled>Select Vessel</option>
                                       @foreach ($vessels as $vessel)
                                             <option value="{{$vessel->id}}">{{$vessel->name}}</option>
                                       @endforeach
                                    </select>
                                 {{-- </div> --}}
                                 {{-- <div class="form-group"> --}}
                                    <div class="input-group mb-3">
                                       {{-- min="{{$start}}" max="{{$end}}" --}}
                                       <input type="date" class="form-control" name="date" id="date" value="{{$now->format('Y-m-d')}}"  >
                                       <div class="input-group-append">
                                          <button class="btn btn-light border btn-block " type="submit">Create</button>
                                       </div>
                                    </div>
                                 {{-- </div> --}}
                              </form>
                              <hr>
                              <table class="table table-sm border">
                                 <tbody>
                                    <tr>
                                       <th colspan="2" class="border">Description</th>
                                       
                                    </tr>
                                    <tr>
                                       <td class="border">Color</td>
                                       <td class="border">Keterangan</td>
                                    </tr>
                                    <tr>
                                       <td class="bg-draft border"></td>
                                       <td class="border">Draft</td>
                                    </tr>
                                    <tr>
                                       <td class="bg-assigned border"></td>
                                       <td class="border">Assigned</td>
                                    </tr>
                                    <tr>
                                       <td class="bg-complete border"></td>
                                       <td class="border">Complete</td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>

                           <div class="col-md-9">
                              <table class="table table-sm border">
                                 
                                 <tbody>
                                    {{-- <tr><th colspan="4" class="border">Sailing Order</th></tr> --}}
                                    <tr>

                                       <th class="text-center border" style="width: 100px" >Date</th>
                                       <th class="border" colspan="3">Vessel</th>
                                       {{-- <th>Status</th> --}}
                                    </tr>
                                    @foreach ($weekSchedules as $schedule)
                                          <tr>
                                             @if ($schedule->status == 0)
                                                <td class="text-center bg-draft border">{{formatDateB($schedule->date)}}</td>
                                                @elseif($schedule->status > 0 && $schedule->status != 11)
                                                <td class="text-center bg-assigned border">{{formatDateB($schedule->date)}}</td>
                                                @elseif($schedule->status == 11)
                                                <td class="text-center bg-complete border">{{formatDateB($schedule->date)}}</td>
                                             @endif
                                             
                                             <td class="border" colspan="3">
                                                <a href="{{route('schedule.detail', enkripRambo($schedule->id))}}">{{$schedule->vessel->name ?? 'Not Available'}} </a>
                                                
                                                
                                             </td>
                                             {{-- <td><x-status-stisla.schedule-plain :schedule="$schedule" /></td> --}}
                                          </tr>
                                          @foreach ($schedule->items as $item)
                                             <tr>
                                                <td class="border"></td>
                                                <td class="border">{{$item->description}}</td>
                                                <td class="border">{{$item->request->origin->name}} - {{$item->request->destination->name}}</td>
                                                <td class="border">
                                                   <x-status-stisla.request-plain :request="$item->request" />
                                                </td>
                                             </tr>
                                          @endforeach
                                          
                                    @endforeach
                                    
                                    
                                 </tbody>
                              </table>
                           </div>
                        </div>
                        
                     </div>
                 </div>
               </div>
             </div>
            
            
            
            
            
            
            
         </div>
         
         
      </div>
   </div>
</section>

@foreach ($liftingSchedules as $lifting)
<div class="modal" tabindex="-1" role="dialog" id="modalDeleteLifting-{{$lifting->id}}">
   <div class="modal-dialog " role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title">Konfirmasi Delete Lifting Schedule</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <hr>
         <table >
            <tbody>
               <tr>
                  <td style="font-size: 14px">CRUDE</td>
                  <td style="font-size: 14px">: {{$lifting->barge->name}}</td>
               </tr>
               <tr>
                  <td style="font-size: 14px">Vessel</td>
                  <td style="font-size: 14px">: {{$lifting->vessel}}</td>
               </tr>
               <tr>
                  <td style="font-size: 14px">Destination</td>
                  <td style="font-size: 14px">: {{$lifting->destination}}</td>
               </tr>
            </tbody>
         </table>
         {{-- <span></span> <br> --}}


       </div>
       <div class="modal-footer">
         <a href="{{route('intermilan.marine.lifting.delete', enkripRambo($lifting->id))}}" class="btn btn-danger">Delete</a>
         {{-- <button type="button" class="btn btn-danger">Delete</button> --}}
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       </div>
     </div>
   </div>
</div>
@endforeach

@foreach ($otherSchedules as $other)
<div class="modal" tabindex="-1" role="dialog" id="modalDeleteOther-{{$other->id}}">
   <div class="modal-dialog " role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title">Konfirmasi Delete Lain-lain  </h5>
         {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button> --}}
       </div>
       <div class="modal-body">
         <hr>
         <table class="table table-sm border">
            <tbody>
               
               {{-- <tr>
                  <td colspan="2"></td>
               </tr> --}}
               <tr>
                  <td style="font-size: 14px;vertical-align: top;" class="border">Desc</td>
                  <td style="font-size: 14px" class="border">{{$other->description}}</td>
               </tr>
               
            </tbody>
         </table>
         {{-- <span></span> <br> --}}


       </div>
       <div class="modal-footer">
         <a href="{{route('intermilan.marine.other.delete', enkripRambo($other->id))}}" class="btn btn-danger">Delete</a>
         {{-- <button type="button" class="btn btn-danger">Delete</button> --}}
         {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
       </div>
     </div>
   </div>
</div>
@endforeach


@foreach ($mainStrategies as $main)
<div class="modal" tabindex="-1" role="dialog" id="modalDeleteMainStrategy-{{$main->id}}">
   <div class="modal-dialog " role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title">Konfirmasi Delete Main Strategy  </h5>
         {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button> --}}
       </div>
       <div class="modal-body">
         <hr>
         <table class="table table-sm border">
            <tbody>
               
               {{-- <tr>
                  <td colspan="2"></td>
               </tr> --}}
               <tr>
                  <td style="font-size: 14px;vertical-align: top;" class="border">Desc</td>
                  <td style="font-size: 14px" class="border">{{$main->description}}</td>
               </tr>
               
            </tbody>
         </table>
         {{-- <span></span> <br> --}}


       </div>
       <div class="modal-footer">
         <a href="{{route('intermilan.marine.main.strategy.delete', enkripRambo($main->id))}}" class="btn btn-danger">Delete</a>
         {{-- <button type="button" class="btn btn-danger">Delete</button> --}}
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       </div>
     </div>
   </div>
</div>
@endforeach

@foreach ($hopperSchedules as $hopper)
<div class="modal" tabindex="-1" role="dialog" id="modalDeleteHopper-{{$hopper->id}}">
   <div class="modal-dialog " role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title">Konfirmasi Delete Hopper Schedule </h5>
         {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button> --}}
       </div>
       <div class="modal-body">
         <hr>
         <table class="table table-sm border">
            <tbody>
               
               {{-- <tr>
                  <td colspan="2"></td>
               </tr> --}}
               <tr>
                  <td style="font-size: 14px;vertical-align: top;" class="border">Desc</td>
                  <td style="font-size: 14px" class="border">{{$hopper->description}}</td>
               </tr>
               
            </tbody>
         </table>
         {{-- <span></span> <br> --}}


       </div>
       <div class="modal-footer">
         <a href="{{route('intermilan.marine.hopper.delete', enkripRambo($hopper->id))}}" class="btn btn-danger">Delete</a>
         {{-- <button type="button" class="btn btn-danger">Delete</button> --}}
         {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
       </div>
     </div>
   </div>
</div>
@endforeach

@foreach ($maintenanceSchedules as $main)
<div class="modal" tabindex="-1" role="dialog" id="modalDeleteMaintenance-{{$main->id}}">
   <div class="modal-dialog " role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title">Konfirmasi Delete Maintenance Schedule </h5>
         {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button> --}}
       </div>
       <div class="modal-body">
         <hr>
         <table class="table table-sm border">
            <tbody>
               <tr>
                  <td style="font-size: 14px;vertical-align: top;" class="border">Kapal/Barge</td>
                  <td style="font-size: 14px" class="border"> {{$main->vessel->name ?? ''}} {{$main->barge->name ?? ''}}</td>
               </tr>
               {{-- <tr>
                  <td colspan="2"></td>
               </tr> --}}
               <tr>
                  <td style="font-size: 14px;vertical-align: top;" class="border">Desc</td>
                  <td style="font-size: 14px" class="border">{{$main->description}}</td>
               </tr>
               
            </tbody>
         </table>
         {{-- <span></span> <br> --}}


       </div>
       <div class="modal-footer">
         <a href="{{route('intermilan.marine.maintenance.delete', enkripRambo($main->id))}}" class="btn btn-danger">Delete</a>
         {{-- <button type="button" class="btn btn-danger">Delete</button> --}}
         {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
       </div>
     </div>
   </div>
</div>
@endforeach

@foreach ($paxSchedules as $pax)
<div class="modal" tabindex="-1" role="dialog" id="modalDeletePax-{{$pax->id}}">
   <div class="modal-dialog " role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title">Konfirmasi Delete Pax Schedule diluar Crew Change</h5>
         {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button> --}}
       </div>
       <div class="modal-body">
         <hr>
         <table class="table table-sm border">
            <tbody>
               <tr>
                  <td style="font-size: 14px;vertical-align: top;" class="border">Vessel</td>
                  <td style="font-size: 14px" class="border"> {{$pax->vessel}}</td>
               </tr>
               {{-- <tr>
                  <td colspan="2"></td>
               </tr> --}}
               <tr>
                  <td style="font-size: 14px;vertical-align: top;" class="border">Desc</td>
                  <td style="font-size: 14px" class="border">{{$pax->description}}</td>
               </tr>
               
            </tbody>
         </table>
         {{-- <span></span> <br> --}}


       </div>
       <div class="modal-footer">
         <a href="{{route('intermilan.marine.pax.delete', enkripRambo($pax->id))}}" class="btn btn-danger">Delete</a>
         {{-- <button type="button" class="btn btn-danger">Delete</button> --}}
         {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
       </div>
     </div>
   </div>
</div>
@endforeach

@foreach ($foodstuffSchedules as $food)
<div class="modal" tabindex="-1" role="dialog" id="modalDeleteFood-{{$food->id}}">
   <div class="modal-dialog " role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title">Konfirmasi Delete Foodstuff Schedule</h5>
         {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button> --}}
       </div>
       <div class="modal-body">
         <hr>
         <table >
            <tbody>
               <tr>
                  <td style="font-size: 14px">Vessel</td>
                  <td style="font-size: 14px">: {{$food->vessel->name}}</td>
               </tr>
               <tr>
                  <td style="font-size: 14px">Desc</td>
                  <td style="font-size: 14px">: {{$food->location}} {{$food->description}}</td>
               </tr>
               
            </tbody>
         </table>
         {{-- <span></span> <br> --}}


       </div>
       <div class="modal-footer">
         <a href="{{route('intermilan.marine.foodstuff.delete', enkripRambo($food->id))}}" class="btn btn-danger">Delete</a>
         {{-- <button type="button" class="btn btn-danger">Delete</button> --}}
         {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
       </div>
     </div>
   </div>
</div>
@endforeach

@foreach ($bargeSchedules as $barge)
<div class="modal" tabindex="-1" role="dialog" id="modalDeleteBarge-{{$barge->id}}">
   <div class="modal-dialog " role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title">Konfirmasi Delete Barge Schedule</h5>
         {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button> --}}
       </div>
       <div class="modal-body">
         <hr>
         <table >
            <tbody>
               <tr>
                  <td style="font-size: 14px">Barge</td>
                  <td style="font-size: 14px">: {{$barge->barge->name}}</td>
               </tr>
               <tr>
                  <td style="font-size: 14px">Desc</td>
                  <td style="font-size: 14px">: {{$barge->title}}</td>
               </tr>
               
            </tbody>
         </table>
         {{-- <span></span> <br> --}}


       </div>
       <div class="modal-footer">
         <a href="{{route('intermilan.marine.barge.delete', enkripRambo($barge->id))}}" class="btn btn-danger">Delete</a>
         {{-- <button type="button" class="btn btn-danger">Delete</button> --}}
         {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
       </div>
     </div>
   </div>
</div>
@endforeach

@foreach ($projectSchedules as $project)
<div class="modal" tabindex="-1" role="dialog" id="modalDeleteProject-{{$project->id}}">
   <div class="modal-dialog " role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title">Konfirmasi Delete Project Schedule</h5>
         {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button> --}}
       </div>
       <div class="modal-body">
         <hr>
         <table >
            <tbody>
               <tr>
                  <td style="font-size: 14px">Vessel</td>
                  <td style="font-size: 14px">: {{$project->vessel->name}}</td>
               </tr>
               <tr>
                  <td style="font-size: 14px">Desc</td>
                  <td style="font-size: 14px">: {{$project->description}}</td>
               </tr>
               
            </tbody>
         </table>
         {{-- <span></span> <br> --}}


       </div>
       <div class="modal-footer">
         <a href="{{route('intermilan.marine.project.delete', enkripRambo($project->id))}}" class="btn btn-danger">Delete</a>
         {{-- <button type="button" class="btn btn-danger">Delete</button> --}}
         {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
       </div>
     </div>
   </div>
</div>
@endforeach

<div class="modal" tabindex="-1" role="dialog" id="modalIntermilanWeather">
   <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title">Lampiran Prakiraan Cuaca</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         
         @php

         $ekstensi = strtolower(pathinfo($weather->file, PATHINFO_EXTENSION));


         @endphp  
         
         {{-- {{$absenceemp->doc}} --}}
         @if ($weather->file != null)

               

            @if ($ekstensi == 'pdf')
            <iframe  src="/storage/{{$weather->file}}" style="width:100%; height:550px;" frameborder="0"></iframe>
            @else
            <img width="100%" src="/storage/{{$weather->file}}" alt="">
            @endif
            
            
         @endif


       </div>
       <div class="modal-footer">
         {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       </div>
     </div>
   </div>
</div>

<div class="modal modal-blur fade" id="modalIntermilanWeatherA" tabindex="1" role="dialog" aria-hidden="true">
   <div class="modal-dialog  modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-body">
         <div class="modal-title">Are you sure?</div>
         <div>If you proceed, you will lose data of <b></b>.</div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
         {{-- <a href="{{route('activity.delete', enkripRambo($activity->id))}}" class="btn btn-danger" >Yes, delete this data</a> --}}
         {{-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Yes, delete all my data</button> --}}
       </div>
     </div>
   </div>
</div>

@foreach ($requests as $request)
    @foreach ($request->cargoItems as $cargo)
    <div class="modal modal-blur fade" id="deleteCargo_{{$cargo->id}}" tabindex="" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="modal-title">Are you sure?</div>
            <div>If you proceed, you will lose data of <b>-</b>.</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
            <a href="{{route('activity.delete', enkripRambo($cargo->id))}}" class="btn btn-danger" >Yes, delete this data</a>
            {{-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Yes, delete all my data</button> --}}
          </div>
        </div>
      </div>
   </div>
    @endforeach
@endforeach


    
@endsection




@push('lifting-js')

<script>
   $(document).ready(function() {
      
      $(".input_note" ).keyup(function () {
         console.log('input_note_clicked');
         
         var intermilanId = '{!! $intermilan->id !!}';
         
         var body = $('#trix_desc').val();
         
      
         console.log(body);
      
         var _token = $('meta[name="csrf-token"]').attr('content');
         $.ajax({
            url: "/fetch/intermilan/update/note/" + intermilanId ,
            method: "GET",
            dataType: 'json',
            data: {
               intermilanId: intermilanId,
               body: body,
            },

            success: function(result) {
               

               console.log('Note :' + result.message);

               
               showMessage("Autosave: " + "Data Note otomatis tersimpan");
               
            },
            error: function(error) {
               console.log(error)
            }

         })
      });
      

      


   });
</script>

   @foreach ($mainStrategies as $mainStrategy)
   <script>
      $(document).ready(function() {
         console.log('main_strategy');
         $(".input_main_strategy_" + '{!! $mainStrategy->id !!}').keyup(function () {
            console.log('main_strategy_clicked');
            
            var mainStrategyId = '{!! $mainStrategy->id !!}';
            
            var desc = $('#main_strategy_desc_' + '{!! $mainStrategy->id !!}').val();
            
         
            // console.log(project);
         
            var _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
               url: "/fetch/intermilan/update/main-strategy/" + mainStrategyId ,
               method: "GET",
               dataType: 'json',
               data: {
                  mainStrategyId: mainStrategyId,
                  desc: desc,
               },

               success: function(result) {
                  

                  console.log('Other Schedule :' + result.message);

                  
                  showMessage("Autosave: " + "Data Lain-lain otomatis tersimpan");
                  
               },
               error: function(error) {
                  console.log(error)
               }

            })
         });
         

         


      });
   </script>
   @endforeach

   @foreach ($otherSchedules as $other)
      <script>
         $(document).ready(function() {
            console.log('other_schedule');
            $(".input_other_schedule_" + '{!! $other->id !!}').keyup(function () {
               console.log('other_schedule_clicked');
               
               var otherId = '{!! $other->id !!}';
               
               var desc = $('#other_schedule_desc_' + '{!! $other->id !!}').val();
               
            
               // console.log(project);
            
               var _token = $('meta[name="csrf-token"]').attr('content');
               $.ajax({
                  url: "/fetch/intermilan/update/other/" + otherId ,
                  method: "GET",
                  dataType: 'json',
                  data: {
                     otherId: otherId,
                     desc: desc,
                  },

                  success: function(result) {
                     

                     console.log('Other Schedule :' + result.message);

                     
                     showMessage("Autosave: " + "Data Lain-lain otomatis tersimpan");
                     
                  },
                  error: function(error) {
                     console.log(error)
                  }

               })
            });
            

            


         });
      </script>
   @endforeach

   @foreach ($hopperSchedules as $hopper)
      <script>
         $(document).ready(function() {
            console.log('hopper_schedule');
            $(".input_hopper_schedule_" + '{!! $hopper->id !!}').keyup(function () {
               console.log('hopper_schedule_clicked');
               
               var hopperId = '{!! $hopper->id !!}';
               
               var desc = $('#hopper_schedule_desc_' + '{!! $hopper->id !!}').val();
               
            
               // console.log(project);
            
               var _token = $('meta[name="csrf-token"]').attr('content');
               $.ajax({
                  url: "/fetch/intermilan/update/hopper/" + hopperId ,
                  method: "GET",
                  dataType: 'json',
                  data: {
                     hopperId: hopperId,
                     desc: desc,
                  },

                  success: function(result) {
                     

                     console.log('Hopper Schedule :' + result.message);

                     
                     showMessage("Autosave: " + "Data Hopper Schedule otomatis tersimpan");
                     
                  },
                  error: function(error) {
                     console.log(error)
                  }

               })
            });
            

            


         });
      </script>
   @endforeach

   @foreach ($maintenanceSchedules as $main)
      <script>
         $(document).ready(function() {
            console.log('maintenance_schedule');
            $(".input_maintenance_schedule_" + '{!! $main->id !!}').keyup(function () {
               console.log('maintenance_schedule_clicked');
               
               var maintenanceId = '{!! $main->id !!}';
               var vessel = $('#maintenance_schedule_vessel_' + '{!! $main->id !!}').val();
               var barge = $('#barge_schedule_vessel_' + '{!! $main->id !!}').val();
               var desc = $('#maintenance_schedule_desc_' + '{!! $main->id !!}').val();
              
               // console.log(project);
            
               var _token = $('meta[name="csrf-token"]').attr('content');
               $.ajax({
                  url: "/fetch/intermilan/update/maintenance/" + maintenanceId ,
                  method: "GET",
                  dataType: 'json',
                  data: {
                     maintenanceId: maintenanceId,
                     vessel: vessel,
                     barge: barge,
                     desc: desc,
                  },

                  success: function(result) {
                     

                     console.log('Maintenance Schedule :' + result.message);

                     
                     showMessage("Autosave: " + "Data Maintenance Schedule otomatis tersimpan");
                     
                  },
                  error: function(error) {
                     console.log(error)
                  }

               })
            });
            // .input_barge_shcedule_change_
            $(".input_maintenance_schedule_change_" + '{!! $main->id !!}').change(function () {
               console.log('main');
               var maintenanceId = '{!! $main->id !!}';
               var vessel = $('#maintenance_schedule_vessel_' + '{!! $main->id !!}').val();
               var barge = $('#barge_schedule_vessel_' + '{!! $main->id !!}').val();
               var desc = $('#maintenance_schedule_desc_' + '{!! $main->id !!}').val();

               // console.log);

               var _token = $('meta[name="csrf-token"]').attr('content');
               $.ajax({
                  url: "/fetch/intermilan/update/change/maintenance/" + maintenanceId ,
                  method: "GET",
                  dataType: 'json',
                  data: {
                     maintenanceId: maintenanceId,
                     vessel: vessel,
                     barge: barge,
                     desc: desc,
                  },

                  success: function(result) {
                     

                     console.log('Maintenance change :' + result.message);

                     
                     showMessage("Autosave: " + "Data Maintenance otomatis tersimpan");
                     
                  },
                  error: function(error) {
                     console.log(error)
                  }

               })
            });

            


         });
      </script>
   @endforeach


   @foreach ($paxSchedules as $pax)
      <script>
         $(document).ready(function() {
            console.log('pax_schedule');
            $(".input_pax_schedule_" + '{!! $pax->id !!}').keyup(function () {
               console.log('pax_schedule_clicked');
               
               var paxId = '{!! $pax->id !!}';
               var vessel = $('#pax_schedule_vessel_' + '{!! $pax->id !!}').val();
               var desc = $('#pax_schedule_desc_' + '{!! $pax->id !!}').val();
               
            
               // console.log(project);
            
               var _token = $('meta[name="csrf-token"]').attr('content');
               $.ajax({
                  url: "/fetch/intermilan/update/pax/" + paxId ,
                  method: "GET",
                  dataType: 'json',
                  data: {
                     paxId: paxId,
                     vessel: vessel,
                     desc: desc,
                  },

                  success: function(result) {
                     

                     console.log('Pax Schedule :' + result.message);

                     
                     showMessage("Autosave: " + "Data Pax Schedule otomatis tersimpan");
                     
                  },
                  error: function(error) {
                     console.log(error)
                  }

               })
            });
            

            


         });
      </script>
   @endforeach

   @foreach ($foodstuffSchedules as $food)
      <script>
         $(document).ready(function() {
            console.log('foodstuff_schedule');
            $(".input_foodstuff_schedule_" + '{!! $food->id !!}').keyup(function () {
               console.log('foodstuff_schedule_clicked');
               
               var foodstuffId = '{!! $food->id !!}';
               var vessel = $('#foodstuff_schedule_vessel_' + '{!! $food->id !!}').val();
               var location = $('#foodstuff_schedule_location_' + '{!! $food->id !!}').val();
               var desc = $('#foodstuff_schedule_desc_' + '{!! $food->id !!}').val();
               var schedule = $('#foodstuff_schedule_schedule_' + '{!! $food->id !!}').val();
              
               // console.log(project);
            
               var _token = $('meta[name="csrf-token"]').attr('content');
               $.ajax({
                  url: "/fetch/intermilan/update/foodstuff/" + foodstuffId ,
                  method: "GET",
                  dataType: 'json',
                  data: {
                     foodstuffId: foodstuffId,
                     vessel: vessel,
                     location: location,
                     desc: desc,
                     schedule: schedule,
                  },

                  success: function(result) {
                     

                     console.log('Foodstuff Schedule :' + result.message);

                     
                     showMessage("Autosave: " + "Data Foodstuff Schedule otomatis tersimpan");
                     
                  },
                  error: function(error) {
                     console.log(error)
                  }

               })
            });
            // .input_barge_shcedule_change_
            $(".input_foodstuff_schedule_change_" + '{!! $food->id !!}').change(function () {
               console.log('food');
               var foodstuffId = '{!! $food->id !!}';
               var vessel = $('#foodstuff_schedule_vessel_' + '{!! $food->id !!}').val();
               var location = $('#foodstuff_schedule_location_' + '{!! $food->id !!}').val();
               var desc = $('#foodstuff_schedule_desc_' + '{!! $food->id !!}').val();
               var schedule = $('#foodstuff_schedule_schedule_' + '{!! $food->id !!}').val();

               // console.log);

               var _token = $('meta[name="csrf-token"]').attr('content');
               $.ajax({
                  url: "/fetch/intermilan/update/change/foodstuff/" + foodstuffId ,
                  method: "GET",
                  dataType: 'json',
                  data: {
                     foodstuffId: foodstuffId,
                     vessel: vessel,
                     location: location,
                     desc: desc,
                     schedule: schedule,
                  },

                  success: function(result) {
                     

                     console.log('foodstuff change :' + result.message);

                     
                     showMessage("Autosave: " + "Data Foodstuff otomatis tersimpan");
                     
                  },
                  error: function(error) {
                     console.log(error)
                  }

               })
            });

            


         });
      </script>
   @endforeach


   @foreach ($projectSchedules as $project)
      <script>
         $(document).ready(function() {
            console.log('project_schedule');
            $(".input_project_schedule_" + '{!! $project->id !!}').keyup(function () {
               console.log('project_schedule_clicked');
               
               var projectId = '{!! $project->id !!}';
               var vessel = $('#project_schedule_vessel_' + '{!! $project->id !!}').val();
               var desc = $('#project_schedule_desc_' + '{!! $project->id !!}').val();
               var port = $('#project_schedule_port_' + '{!! $project->id !!}').val();
              
               // console.log(project);
            
               var _token = $('meta[name="csrf-token"]').attr('content');
               $.ajax({
                  url: "/fetch/intermilan/update/project/" + projectId ,
                  method: "GET",
                  dataType: 'json',
                  data: {
                     projectId: projectId,
                     vessel: vessel,
                     desc: desc,
                     port: port,
                  },

                  success: function(result) {
                     

                     console.log('Project Schedule :' + result.message);

                     
                     showMessage("Autosave: " + "Data Project Schedule otomatis tersimpan");
                     
                  },
                  error: function(error) {
                     console.log(error)
                  }

               })
            });
            // .input_barge_shcedule_change_
            $(".input_project_schedule_change_" + '{!! $project->id !!}').change(function () {
               console.log('project');
               var projectId = '{!! $project->id !!}';
               var vessel = $('#project_schedule_vessel_' + '{!! $project->id !!}').val();
               var desc = $('#project_schedule_desc_' + '{!! $project->id !!}').val();
               var port = $('#project_schedule_port_' + '{!! $project->id !!}').val();

               // console.log);

               var _token = $('meta[name="csrf-token"]').attr('content');
               $.ajax({
                  url: "/fetch/intermilan/update/change/project/" + projectId ,
                  method: "GET",
                  dataType: 'json',
                  data: {
                     projectId: projectId,
                     vessel: vessel,
                     desc: desc,
                     port: port,
                  },

                  success: function(result) {
                     

                     console.log('project change :' + result.message);

                     
                     showMessage("Autosave: " + "Data Project otomatis tersimpan");
                     
                  },
                  error: function(error) {
                     console.log(error)
                  }

               })
            });

            


         });
      </script>
   @endforeach


   @foreach ($bargeSchedules as $barge)
      <script>
         
         $(document).ready(function() {
            console.log('lifting_schedule');
            $(".input_barge_schedule_" + '{!! $barge->id !!}').keyup(function () {
               console.log('barge_schedule_clicked');
               
               var bargeId = '{!! $barge->id !!}';
               var barge = $('#barge_schedule_barge_' + '{!! $barge->id !!}').val();
               var title = $('#barge_schedule_title_' + '{!! $barge->id !!}').val();
               var note = $('#barge_schedule_note_' + '{!! $barge->id !!}').val();
              
               console.log(barge);
            
               var _token = $('meta[name="csrf-token"]').attr('content');
               $.ajax({
                  url: "/fetch/intermilan/update/barge/" + bargeId ,
                  method: "GET",
                  dataType: 'json',
                  data: {
                     bargeId: bargeId,
                     barge: barge,
                     title: title,
                     note: note,
                  },

                  success: function(result) {
                     

                     console.log('Barge Schedule :' + result.message);

                     
                     showMessage("Autosave: " + "Data Barge Schedule otomatis tersimpan");
                     
                  },
                  error: function(error) {
                     console.log(error)
                  }

               })
            });
            // .input_barge_shcedule_change_
            $(".input_barge_schedule_change_" + '{!! $barge->id !!}').change(function () {
               console.log('barge');
               var bargeId = '{!! $barge->id !!}';
               var barge = $('#barge_schedule_barge_' + '{!! $barge->id !!}').val();
               var title = $('#barge_schedule_title_' + '{!! $barge->id !!}').val();
               var note = $('#barge_schedule_note_' + '{!! $barge->id !!}').val();

               // console.log);

               var _token = $('meta[name="csrf-token"]').attr('content');
               $.ajax({
                  url: "/fetch/intermilan/update/schedule/barge/" + bargeId ,
                  method: "GET",
                  dataType: 'json',
                  data: {
                     bargeId: bargeId,
                     barge: barge,
                     title: title,
                     note: note,
                     
                  },

                  success: function(result) {
                     

                     console.log('barge change :' + result.message);

                     
                     showMessage("Autosave: " + "Data Barge otomatis tersimpan");
                     
                  },
                  error: function(error) {
                     console.log(error)
                  }

               })
            });

            


         });
      </script>
   @endforeach


   @foreach ($liftingSchedules as $lifting)
      <script>
         
         $(document).ready(function() {
            console.log('lifting_schedule');
            $(".input_lifting_" + '{!! $lifting->id !!}').keyup(function () {
               console.log('lifting_schedule_clicked');
               
               var lifting = '{!! $lifting->id !!}';
               var vessel = $('#lifting_vessel_' + '{!! $lifting->id !!}').val();
               var destination = $('#lifting_destination_' + '{!! $lifting->id !!}').val();
               var volume_nominasi = $('#lifting_volume_nominasi_' + '{!! $lifting->id !!}').val();
               var volume_actual = $('#lifting_volume_actual_' + '{!! $lifting->id !!}').val();
               var volume_lifting_ppl = $('#lifting_volume_lifting_ppl_' + '{!! $lifting->id !!}').val();
               var volume_lifting_nonppl = $('#lifting_volume_lifting_nonppl_' + '{!! $lifting->id !!}').val();
               var bl_no = $('#lifting_bl_no_' + '{!! $lifting->id !!}').val();
               var remark = $('#lifting_remark_' + '{!! $lifting->id !!}').val();
              
               var _token = $('meta[name="csrf-token"]').attr('content');
               $.ajax({
                  url: "/fetch/intermilan/update/lifting/" + lifting ,
                  method: "GET",
                  dataType: 'json',
                  data: {
                     lifting: lifting,
                     vessel: vessel,
                     destination: destination,
                     volume_nominasi: volume_nominasi,
                     volume_actual: volume_actual,
                     volume_lifting_ppl: volume_lifting_ppl,
                     volume_lifting_nonppl: volume_lifting_nonppl,
                     bl_no: bl_no,
                     remark: remark,
                  },

                  success: function(result) {
                     

                     console.log('lifting :' + result.message);

                     
                     showMessage("Autosave: " + "Data otomatis tersimpan");
                     
                  },
                  error: function(error) {
                     console.log(error)
                  }

               })
            });

            $(".input_lifting_change_" + '{!! $lifting->id !!}').change(function () {
               console.log('barge');
               var lifting = '{!! $lifting->id !!}';
               var barge = $('#lifting_barge_' + '{!! $lifting->id !!}').val();
               var ald_start = $('#lifting_ald_start_' + '{!! $lifting->id !!}').val();
               var ald_end = $('#lifting_ald_end_' + '{!! $lifting->id !!}').val();
               var complete_date = $('#lifting_complete_date_' + '{!! $lifting->id !!}').val();

               console.log(lifting);

               var _token = $('meta[name="csrf-token"]').attr('content');
               $.ajax({
                  url: "/fetch/intermilan/update/barge/lifting/" + lifting ,
                  method: "GET",
                  dataType: 'json',
                  data: {
                     lifting: lifting,
                     barge: barge,
                     ald_start: ald_start,
                     ald_end: ald_end,
                     complete_date: complete_date
                     
                  },

                  success: function(result) {
                     

                     console.log('lifting :' + result.message);

                     
                     showMessage("Autosave: " + "Data Barge otomatis tersimpan");
                     
                  },
                  error: function(error) {
                     console.log(error)
                  }

               })
            });

            


         });
      </script>
   @endforeach


   @foreach ($ipbs as $ipb)
    <script>
      $(document).ready(function() {
            // console.log('lifting_schedule');
           

            $(".input_ipb_vessel_" + '{!! $ipb->id !!}').change(function () {
               console.log('ipb');
               var ipb = '{!! $ipb->id !!}';
               var vessel1 = $('#ipb_vessel1_' + '{!! $ipb->id !!}').val();
               var vessel2 = $('#ipb_vessel2_' + '{!! $ipb->id !!}').val();
               var vessel3 = $('#ipb_vessel3_' + '{!! $ipb->id !!}').val();
               

               console.log(vessel);

               var _token = $('meta[name="csrf-token"]').attr('content');
               $.ajax({
                  url: "/fetch/intermilan/update/ipb/vessel/" + ipb ,
                  method: "GET",
                  dataType: 'json',
                  data: {
                     vessel1: vessel1,
                     vessel2: vessel2,
                     vessel3: vessel3,
                     
                     
                  },

                  success: function(result) {
                     

                     console.log('IPB :' + result.message);

                     // $('#ipbvessel').html(result.vesselName);
                     showMessage("Autosave: " + "Data IPB Vessel otomatis tersimpan");
                     
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