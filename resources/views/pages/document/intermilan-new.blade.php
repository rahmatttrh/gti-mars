@extends('layouts.app-doc')
@section('title')
   Intermilan
@endsection
@section('content')
<style>
   html { -webkit-print-color-adjust: exact; }
   table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  padding-left: 5px;
}

table td, table th {
  font-size: 10px
}

/* .ttd {
   font-size: 10px;
}

table td {
  font-size: 10px
}

.title {
  font-size: 11px
} */

table {
   width: 100%;
}

</style>
<div class="container-xl">
   <!-- Page title -->
   <div class="page-header d-print-none">
     <div class="row align-items-center">
       <div class="col">
         <h2 class="page-title">
           Intermilan
         </h2>
       </div>
       <!-- Page title actions -->
       <div class="col-auto ms-auto d-print-none">
         <button type="button" class="btn btn-primary" onclick="javascript:window.print();">
           <!-- Download SVG icon from http://tabler-icons.io/i/printer -->
           <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" /><path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" /><rect x="7" y="13" width="10" height="8" rx="2" /></svg>
           Print
         </button>
       </div>
     </div>
   </div>
 </div>
 <div class="page-body" >
   <div class="container-xl bg-white rounded">
      <div class="row border-bottom py-2 mb-2">
         <div class="col-12">
            <div class="d-flex justify-content-between">
               <div class="">
                  <small ><b>PERTAMINA HULU ENERGI OSES</b></small><br>
                  <small><b>PRODUCTION & OPERATION - MARINE TEAM</b></small>
               </div>
               <div class="text-center">
                  <h3>MONTHLY INTEGRATED BOAT PLANNING <span class="text-uppercase">{{$monthName}}</span></h3>
               </div>
               <div>
                  <img src="{{asset('img/logo/phe-oses.png')}}"  alt="DSP-PHE" class="navbar-brand-image">
               </div>
            </div>
         </div>
         <div class="col-12">
            {{-- <div class="text-center border-bottom mb-2">
               <h3>MONTHLY INTEGRATED BOAT PLANNING <span class="text-uppercase">{{$monthName}}</span></h3>
            </div> --}}
            
            <table class="mt-2">
               <thead>
                  <tr>
                     <th class="text-center">Station</th>
                     <th class="text-center">Activity</th>
                     <th class="text-center">Loaction (From-To)</th>
                     <th class="text-center">Boat</th>
                     @foreach ($dates as $date)
                        <th class="text-center">{{formatDateOnly($date)}}</th>
                     @endforeach
                  </tr>
               </thead>
               <tbody>
                  @if ($users->count() > 0)
                        @foreach ($users as $user => $reqs)
                           <tr>
                              <td class="text-center " rowspan="{{count($reqs)+1}}">{{$user}}</td>
                           </tr>
                           @foreach ($reqs as $request)

                           
                           <tr style="background-color: rgb(242, 248, 221)">
                           {{-- @if ($request->user->getPort()->func == 'DWI')
                              <tr style="background-color: rgb(242, 248, 221)">
                               @elseif($request->user->getPort()->func == 'PGPI')
                               <tr style="background-color: rgb(214, 217, 250)">
                                 @else
                                 <tr style="background-color: rgb(185, 214, 248)">
                           @endif --}}
                              <td >
                                 {{$request->description}}
                                 {{-- @foreach ($request->cargoItems as $item)
                                       {{$item->description}},
                                 @endforeach --}}
                              </td>
                              <td >
                                 {{-- @if ($request->activity_id < 5)
                                 {{$request->origin->code}} to {{$request->destination->code}}
                                 @else
                                 
                                 @endif --}}
                                 {{$request->getRequest($request->request_id)->origin->code}} to {{$request->getRequest($request->request_id)->destination->code}}
                              </td>
                              <td>
                                 {{$request->schedule->vessel->name ?? 'Not Available'}}
                              </td>
                              @foreach ($dates as $date)
                                 @if ($date == $request->date)
                                    @if ($request->schedule_id != null)
                                       @if ($request->schedule->vessel_id == 7)
                                       {{-- Triton Jawara --}}
                                       <td class="text-center" style="background-color: rgb(255, 231, 16)">A</td>
                                       @elseif($request->schedule->vessel_id == 2)
                                       {{-- Transko Balihe --}}
                                       <td class="text-white text-center" style="background-color: rgb(244, 66, 66)">B</td>
                                       {{-- @elseif($request->schedule->vessel_id == 7)
                                       SK Canopus
                                       <td class="text-center" style="background-color: rgb(184, 152, 46)">C</td> --}}
                                       @elseif($request->schedule->vessel_id == 3)
                                       {{-- Logindo Overcomer --}}
                                       <td class="text-center" style="background-color: rgb(89, 192, 51)">D</td>
                                       @elseif($request->schedule->vessel_id == 9)
                                       {{-- Elok Jaya --}}
                                       <td class="text-center" style="background-color: rgb(41, 95, 134)">E</td>
                                       @elseif($request->schedule->vessel_id == 4)
                                       {{-- Indoliziz Satu --}}
                                       <td class="text-center" style="background-color: rgb(172, 236, 149)">F</td>
                                       @elseif($request->schedule->vessel_id == 11)
                                       {{-- Giat Jaya --}}
                                       <td class="text-center" style="background-color: rgb(129, 181, 245)">G</td>
                                       @elseif($request->schedule->vessel_id == 6 || $request->schedule->vessel_id == 36)
                                       {{-- Sigap Jaya --}}
                                       <td class="text-center" style="background-color: rgb(241, 156, 38)">L</td>
                                       @elseif($request->schedule->vessel_id == 1)
                                       {{-- Transko Moloko --}}
                                       <td class="text-center" style="background-color: rgb(213, 226, 131)">G</td>
                                       @else
                                       <td>-</td>
                                       @endif
                                       @else
                                       <td class="text-center" style="background-color: rgb(248, 154, 87)"></td>
                                    @endif
                                    
                                    
                                    
                                 @else
                                 <td class="text-center">-</td>
                                 @endif
                                 
                              @endforeach
                           </tr>
                           @endforeach
                        @endforeach
                        @else
                        <tr>
                           <td colspan="4" class="text-center" style="height: 35px">Tidak ada data Intermilan di rentang waktu yang dipilih</td>
                        </tr>
                     @endif
               </tbody>

            </table>
         </div>
      </div>
      <div class="row">
         <div class="col-6">
            <table>
               <thead>
                  <tr>
                     <th class="text-center">Abjad</th>
                     <th>Vessel Name</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td class="text-center" style="background-color: rgb(255, 231, 16)">A</td>
                     <td>Triton Jawara</td>
                  </tr>
                  <tr>
                     <td class="text-white text-center" style="background-color: rgb(244, 66, 66)">B</td>
                     <td>Transko Balihe</td>
                  </tr>
                  <tr>
                     <td class="text-center" style="background-color: rgb(89, 192, 51)">D</td>
                     <td>Logindo Overcomer</td>
                  </tr>
                  <tr>
                     <td class="text-center" style="background-color: rgb(41, 95, 134)">E</td>
                     <td>Elok Jaya</td>
                  </tr>
                  <tr>
                     <td class="text-center" style="background-color: rgb(172, 236, 149)">F</td>
                     <td>Indoliziz Satu</td>
                  </tr>
                  <tr>
                     <td class="text-center" style="background-color: rgb(129, 181, 245)">G</td>
                     <td>Giat Jaya</td>
                  </tr>
                  <tr>
                     <td class="text-center" style="background-color: rgb(241, 156, 38)">L</td>
                     <td>Sigap Jaya</td>
                  </tr>
                  <tr>
                     <td class="text-center" style="background-color: rgb(213, 226, 131)">G</td>
                     <td>Transko Moloko</td>
                  </tr>
               </tbody>
            </table>
         </div>
         <div class="col-6">
            <div class="row ttd">
               <div class="col">
                  <br>
                  <small>Acknowladge by,</small><br>
                  <br>
                  <br>
                  <small>Name _____________________  </small>
               </div>
               {{-- <div class="col">
                  <br>
                  <small>Name : <span class="text-primary px-2"><u>{{$vessel->master}}</u></span></small><br>
                  <small>Title : Master</small>
               </div> --}}
               
               
               
               
            </div>
         </div>
      </div>
   </div>
</div>
@endsection