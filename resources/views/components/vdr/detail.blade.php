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
   
   input {
      width: 70px"
   }
</style>
<div class="card">
   {{-- <div class="card-header">
     <h4>Accordion</h4>
   </div> --}}
   <div class="card-body">
      {{-- <hr> --}}
      
      <div id="accordion">
         <div class="accordion">
            <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-head" aria-expanded="true">
            <h4>Vessel Daily Report {{$vessel->name}}  | {{dayDate($vdr->date)}}</h4>
            </div>
            <div class="accordion-body collapse show" id="panel-head" data-parent="#accordion">
               
               {{-- <h5 class="mt-2">{{$vessel->name}}</h5> --}}
               @if ($vdr->status == 1)
                  <a href="#" class="btn btn-sm btn-light text-primary border shadow-none" data-toggle="modal" data-target="#modalEdit">Release</a>
               @endif
               
               <a href="#" class="btn btn-sm btn-light border shadow-none" data-toggle="modal" data-target="#modalEdit">Edit</a>
               <a href="{{route('document.vdr', enkripRambo($vdr->id))}}" target="_blank" class="btn btn-sm btn-light border shadow-none">Export PDF</a>
               <div class="row mt-2">
                  <div class="col-md-6">
                     <table>
                        <tbody>
                           <tr>
                              <td>Status</td>
                              <td>Draft</td>
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
         </div>
         <div class="accordion">
            <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-1" >
            <h4>Crew & Passenger List</h4>
            </div>
            <div class="accordion-body collapse" id="panel-body-1" data-parent="#accordion">
               <x-vdr.crew :crews="$crews" :vdr="$vdr" />
            </div>
         </div>
         <div class="accordion">
            <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-2">
               <h4>Wheater Condition</h4>
            </div>
            <div class="accordion-body collapse" id="panel-body-2" data-parent="#accordion">
               <x-vdr.weather :weathers="$weathers" :vdr="$vdr" />
            </div>
         </div>
         <div class="accordion">
            <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-3">
               <h4>Detail of Daily Operational Activities</h4>
            </div>
            <div class="accordion-body collapse" id="panel-body-3" data-parent="#accordion">
               <x-vdr.activity :activities="$activities" :operatings="$operatings" :vdr="$vdr"/>
            </div>
         </div>
         <div class="accordion">
            <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-4">
               <h4>Summary of Daily Operating Data</h4>
            </div>
            <div class="accordion-body collapse" id="panel-body-4" data-parent="#accordion">
               <x-vdr.data :operatings="$operatings" :totaljam="$totaljam" :totaldaily="$totaldaily" :vdr="$vdr"/>
            </div>
         </div>
         <div class="accordion">
            <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-5">
               <h4>Summary of Daily Fuel, Water and Cargos Remaining Onboard</h4>
            </div>
            <div class="accordion-body collapse" id="panel-body-5" data-parent="#accordion">
               <x-vdr.fuel :cargos="$cargos" :vdr="$vdr" />
            </div>
         </div>
         <div class="accordion">
            <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-6">
               <h4>HSSE</h4>
            </div>
            <div class="accordion-body collapse" id="panel-body-6" data-parent="#accordion">
               <x-vdr.hsse :hses="$hses" :vdr="$vdr" />
            </div>
         </div>
         <div class="accordion">
            <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-7">
               <h4>Vessel Daily Engine Parameter Log</h4>
            </div>
            <div class="accordion-body collapse" id="panel-body-7" data-parent="#accordion">
               <x-vdr.engine :engines="$engines" :vdr="$vdr" />
            </div>
         </div>
      </div>
   </div>
</div>