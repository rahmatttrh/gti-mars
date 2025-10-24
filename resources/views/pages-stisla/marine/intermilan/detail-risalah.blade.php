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
      text-align: center; 
      /* background-color: rgb(226, 236, 151) */
      
   }
   </style>
   
   <div class="section-body">
      <div class="row">
         <div class="col-md-9">

            <div class="card">
               
              
               <div class="card-body">
                  <div class="d-flex justify-content-between">
                     <div class="">
                        <h5>INTERMILAN {{formatDate($start)}} - {{formatDate($end)}}</h5>
                        <span>{{$intermilan->title}}</span>
                     </div>
                     
                  <a href="{{route('document.intermilan.export', [enkripRambo($start),enkripRambo($end)])}}" target="_blank" class="" data-toggle="tooltip" data-placement="top" title="Export PDF">Export PDF </a>
                  </div>
                  
                  <hr>
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
                 </ul>
                 <div class="tab-content" id="myTabContent">
                   


                   
                   <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                     <div class="form-group col-md-12">

                           <b>A. Info HSSE & Highlight Activitas </b>
                           <table>
                              <tr>
                                 <td>1</td>
                                 <td>Prakiraan cuaca SBU, NBU, CBU 14-21 Oktober 2025</td>
                                 <td>
                                    <input type="file" name="" id="">
                                 </td>
                              </tr>
                           </table>
                           <hr>
                        
                        {{-- <textarea class="form-control" id="desc" name="desc"   rows="3"></textarea> --}}
   
                        <textarea name="desc" id="desc" cols="30" rows="5" hidden></textarea>
                      {{-- <span>B</span> --}}
                        <main>
                           <trix-toolbar id="my_toolbar"></trix-toolbar>
                           <div class="more-stuff-inbetween"></div>
                           <trix-editor toolbar="my_toolbar" input="desc" ></trix-editor>
                        </main>
                        {{-- <input type="text" class="form-control text-left" id="desc" name="desc" > --}}
                     </div>


                   </div>
                 </div>
               </div>
             </div>
            
            
            
            
            
            
            
         </div>
         <div class="col-md-3">
            <div class="card shadow">
               <div class="card-body">
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
            <table>
               <thead>
                  <tr><th colspan="2" class="">Sailing Order</th></tr>
                  <tr>

                     <th class="text-center">Date</th>
                     <th>Vessel</th>
                     {{-- <th>Status</th> --}}
                  </tr>
               </thead>
               <tbody>
                  @foreach ($weekSchedules as $schedule)
                        <tr>
                        @if ($schedule->status == 0)
                           <td class="text-center bg-draft">{{formatDateOnly($schedule->date)}}</td>
                           @elseif($schedule->status > 0 && $schedule->status != 11)
                           <td class="text-center bg-assigned">{{formatDateOnly($schedule->date)}}</td>
                           @elseif($schedule->status == 11)
                           <td class="text-center bg-complete">{{formatDateOnly($schedule->date)}}</td>
                        @endif
                        
                        <td>
                           <a href="{{route('schedule.detail', enkripRambo($schedule->id))}}">{{$schedule->vessel->name ?? 'Not Available'}} </a>
                           
                           
                        </td>
                        {{-- <td><x-status-stisla.schedule-plain :schedule="$schedule" /></td> --}}
                        </tr>
                  @endforeach
                  <tr>
                     <td></td>
                  </tr>
                  <tr>
                     <th colspan="2">Description</th>
                     
                  </tr>
                  <tr>
                     <td>Color</td>
                     <td>Keterangan</td>
                  </tr>
                  <tr>
                     <td class="bg-draft"></td>
                     <td>Draft</td>
                  </tr>
                  <tr>
                     <td class="bg-assigned"></td>
                     <td>Assigned</td>
                  </tr>
                  <tr>
                     <td class="bg-complete"></td>
                     <td>Complete</td>
                  </tr>
                  
               </tbody>
            </table>
               </div>
            </div>
            
            <hr>
            {{-- <form action="{{route('intermilan.filter')}}" method="POST">
               @csrf
               <div class="">Date Range</div>
               <div class="form-group">
                  <div class="input-group">  
                     <input type="date" class="form-control">
                     <input type="date" class="form-control">
                     
                  </div>
                  </div>
               <div class="form-group">
                  <div class="input-group mb-2">
                     <div class="input-group-prepend">
                        <div class="input-group-text">From</div>
                     </div>
                     <input type="date" class="form-control" id="inlineFormInputGroup" placeholder="Username">
                  </div>
               </div>
               <div class="form-group">
                  <div class="input-group mb-2">
                     <div class="input-group-prepend">
                        <div class="input-group-text">To</div>
                     </div>
                     <input type="date" class="form-control" id="inlineFormInputGroup" placeholder="Username">
                  </div>
               </div>
               <div class="form-group">
                  <div class="input-group">
                     
                     <input type="date" name="start" id="start" class="form-control">
                     <span class="mx-2 mt-3">To</span>
                     <input type="date" name="end" id="end" class="form-control">
                     
                  </div>
                  <button class="btn btn-light border btn-block mt-2" type="submit">Show</button>
               </div>
               <button class="btn btn-light border btn-block mt-2" type="submit">Show</button>
            </form>
            <hr> --}}

            {{-- <table>
               <thead>
                  <tr>
                     <th>Abjad</th>
                     <th>Vessel Name</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td class="bg-triton">A</td>
                     <td>Triton Jawara</td>
                  </tr>
                  <tr>
                     <td class="bg-balihe">B</td>
                     <td>Transko Balihe</td>
                  </tr>
               </tbody>
            </table> --}}

            
            
         </div>
         {{-- <div class="col-md-4">
            <table>
               <thead>
                  <tr>
                     <th>Date</th>
                     <th>Desc</th>
                  </tr>
               </thead>
               <tbody>
                  @if (count($requests) > 0)
                     @foreach ($requests as $req)
                        <tr>
                        <td>{{formatDate($req->date)}}</td>
                        <td>
                           {{$req->desc}} <br>
                           <small>
                           @if ($req->activity_id == 1 || $req->activity_id == 2)
                                 @foreach ($req->cargoItems as $item)
                                    {{$item->desc}}
                                 @endforeach
                                 @if (count($req->passengerItems) >  0)
                                 {{count($req->passengerItems)}} Total Passenger
                                 @endif
                           @endif
                           @if ($req->activity_id == 3)
                           {{$req->origin->name}} - {{$req->destination->name}}
                           @endif
                           @if ($req->activity_id == 5 || $req->activity_id == 6)
                           {{$req->fuel->qty}} KL
                           @endif

                        </small>
                        </td>
                        </tr>
                     @endforeach
                     @else
                     <tr>
                        <td colspan="2" style="height: 200px" class="text-center"><span>Tidak ada Request Activity dari User</span></td>
                     </tr>
                     
                  @endif
                  
               </tbody>
            </table>
         </div> --}}
         
      </div>
   </div>
</section>

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