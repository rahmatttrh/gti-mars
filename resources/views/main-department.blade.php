@extends('layouts.stisla.app-main')
@section('title')
   Home Page
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

   .scrolling-body {
        max-height: 500px;
        overflow: hidden;
        position: relative;
      }

      .scrolling-body table {
        animation: scrollUp 15s linear infinite;
      }

      @keyframes scrollUp {
        0% {
          transform: translateY(0);
        }

        100% {
          transform: translateY(-50%);
        }
      }
      thead th {
        position: sticky;
        top: 0;
        
        z-index: 10;
      }
</style>


   <section class="section">
      <div class="section-body">
         <div class="px-1">
            <div class="row">
               <div class="col-md-3">
                  <div class="card bg-primary shadow">
                     <div class="card-body ">
                        
                        Welcome back, <br> <b> <h2>{{auth()->user()->name}}</h2></b>
                        {{-- <hr> --}}
                        {{-- <hr>
                        Location Company Representative/Suptent Area --}}
                     </div>
                  </div>
                  <div class="card">
                     <div class="card-body">
                        <a  data-toggle="collapse" href="#collapseFormIntermilan">Klik Disini</a> untuk membuat Intermilan baru
                     </div>
                  </div>
                  {{-- <a href="" class="btn btn-block  bg-white border btn-lg">Create Intermilan</a> --}}
               </div>

               <div class="col-md-6">
                  <div class="card">

                     <div class="card-body">
                        <div class="collapse" id="collapseFormIntermilan">
                           <form action="{{route('intermilan.user.store')}}" method="POST">
                              @csrf
                              <div class="border-bottom"><i>Form Create Intermilan User</i></div>
                              <div class="row mt-1">
                                 <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                       <label>From</label>
                                       <input type="date" name="from" id="from" class="form-control" required>
                                       
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                       <label>To</label>
                                       <input type="date" name="to" id="to" class="form-control" required>
                                       
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group form-group-default">
                                 <label>Title</label>
                                 <input type="text" name="title" id="title" class="form-control" required>
                              </div>
                              
                              <button class="btn btn-primary " type="submit" >Create</button> 
                              <hr>
                             
                              
                              
                              
                           </form>  
                        </div>

                        <div class="badge badge-info">Recent Intermilan User</div>
                        <a class="badge badge-light border" href="{{route('dsp.user', [enkripRambo(auth()->user()->getMonth()), enkripRambo(auth()->user()->getYear())])}}">Klik Disini untuk mengelola Intermilan User</a>
                        <div class="table-responsive mt-2">
                           <table class="">
                              <thead>
                                 <tr>
                                    {{-- <th>#</th> --}}
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Periode</th>
                                    <th style="display: none">Time</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach ($intermilanUsers as $int)
                                     <tr>
                                       {{-- <td style="width: 30" >{{++$i}}</td> --}}
                                       <td><a href="{{route('intermilan.user.detail', enkripRambo($int->id))}}">{{$int->code}}</a> </td>
                                       <td>{{$int->title}}</td>
                                       <td>{{formatDate($int->from)}} - {{formatDate($int->to)}}</td>
                                       <td style="display: none">{{$int->created_at}}</td>
                                     </tr>
                                 @endforeach
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
                  
               </div>

               <div class="col-md-3">
                  <div class="card">
                     <div class="card-body">
                        <div class="badge badge-info">Announcement</div>
                        <hr>

                     </div>
                  </div>
               </div>
            </div>
      
      
      
      
      
            <div class="card">
               <div class="card-body">
                  <div class="badge badge-info">Daily Report (Data Dummy)</div>
                  <hr>
                  <div class="row">
                     <div class="col-md-3">
                        <div class="card">
                           <div class="card-body p-2 text-center" style="background-color: rgb(208, 238, 118)">
                              <b>Barge/Rig/Tanker Location</b>
                           </div>
                           <div class="card-body p-0">
                              <div class="scrolling-body overflow-auto" style="height: 200px">
                                 <table>
                                    <thead>
                                       <tr>
                                          <th colspan="2" class="py-2" >Barge/Rig/Tanker Loc</th>
                                          <th class="py-2" >Area</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td>AWB COSL 222</td>
                                          <td>Rama - P C/A</td>
                                          <td>SBU</td>
                                       </tr>
                                       <tr>
                                          <td>AWB COSL 225</td>
                                          <td>Widuri - B</td>
                                          <td>NBU</td>
                                       </tr>
                                       <tr>
                                          <td>AWB COSL 222</td>
                                          <td>Rama - P C/A</td>
                                          <td>SBU</td>
                                       </tr>
                                       <tr>
                                          <td>AWB COSL 225</td>
                                          <td>Widuri - B</td>
                                          <td>NBU</td>
                                       </tr>
                                       <tr>
                                          <td>AWB COSL 222</td>
                                          <td>Rama - P C/A</td>
                                          <td>SBU</td>
                                       </tr>
                                       <tr>
                                          <td>AWB COSL 225</td>
                                          <td>Widuri - B</td>
                                          <td>NBU</td>
                                       </tr>
                                       <tr>
                                          <td>AWB COSL 222</td>
                                          <td>Rama - P C/A</td>
                                          <td>SBU</td>
                                       </tr>
                                       <tr>
                                          <td>AWB COSL 225</td>
                                          <td>Widuri - B</td>
                                          <td>NBU</td>
                                       </tr>
                                    </tbody>
                                 </table>
                                 </div>
                           </div>
                           <div class="card-body p-2 text-center" style="background-color: rgb(208, 238, 118)">
                              <b>Barge/Rig Move</b>
                           </div>
                           <div class="card-body p-0">
                              <div class="scrolling-body table-responsive overflow-auto" style="height: 200px">
                                 <table>
                                    <thead>
                                       <tr>
                                          <th colspan="" class="py-2" >Barge/Rig</th>
                                          <th class="py-2" >Route</th>
                                          <th class="py-2" >Vessel</th>
                                          <th class="py-2" >Date</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td>AWB Star Onyx</td>
                                          <td class="text-truncate">RAMD - SELA</td>
                                          <td>AHTS Peteka5402</td>
                                          <td>6/20/2025</td>
                                       </tr>
                                       <tr>
                                          <td>COSL.223</td>
                                          <td class="text-truncate">BWA - KARA</td>
                                          <td>AHTS Triton Jawara</td>
                                          <td></td>
                                       </tr>
                                       <tr>
                                          <td>AWB Star Onyx</td>
                                          <td class="text-truncate">RAMD - SELA</td>
                                          <td>AHTS Peteka5402</td>
                                          <td></td>
                                       </tr>
                                       <tr>
                                          <td>COSL.223</td>
                                          <td class="text-truncate">BWA - KARA</td>
                                          <td>AHTS Triton Jawara</td>
                                          <td></td>
                                       </tr>
                                       
                                    </tbody>
                                 </table>
                                 </div>
                           </div>
                        </div>
            
                        
                        
                     </div>
                     <div class="col-md-6">
                        <div class="card">
                           
                           <div class="card-body p-2 text-center" style="background-color: rgb(208, 238, 118)">
                              <b>Vessel Daily Activity</b>
                           </div>
                           <div class="card-body p-0 " >
                              <div class="scrolling-body overflow-auto" style="height: 250px">
                                 <table>
                                    <thead>
                                       {{-- <tr>
                                          <th colspan="3" class="py-2" style="background-color: rgb(208, 238, 118)">Vessel Daily Activity</th>
                                          
                                       </tr> --}}
                                       <tr>
                                          <th>Vessel Name</th>
                                          <th>Program</th>
                                          <th>Remarks/Note</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td>AHTS Peteka 5402</td>
                                          <td>COSL.223 (Deploy Anchor 4/6) - COSL.223 ( Backload Cargo) - Pab (Offload Backload Cargo)</td>
                                          <td>Proses Pick up anchor</td>
                                       </tr>
                                       <tr>
                                          <td>AHTS Kittiwake</td>
                                          <td>RIG EMD (Support Rig Operation)</td>
                                          <td>Support Rig Operation</td>
                                       </tr>
                                       <tr>
                                          <td>AHTS Petroleum Pioneer</td>
                                          <td>KJ4 (Cargo Operation) - Rig EMD (Support Rig Operation)</td>
                                          <td>Cargo Operation</td>
                                       </tr>
                                       <tr>
                                          <td>AHTS Peteka 5402</td>
                                          <td>COSL.223 (Deploy Anchor 4/6) - COSL.223 ( Backload Cargo) - Pab (Offload Backload Cargo)</td>
                                          <td>Proses Pick up anchor</td>
                                       </tr>
                                       <tr>
                                          <td>AHTS Kittiwake</td>
                                          <td>RIG EMD (Support Rig Operation)</td>
                                          <td>Support Rig Operation</td>
                                       </tr>
                                       <tr>
                                          <td>AHTS Petroleum Pioneer</td>
                                          <td>KJ4 (Cargo Operation) - Rig EMD (Support Rig Operation)</td>
                                          <td>Cargo Operation</td>
                                       </tr>
                                       <tr>
                                          <td>AHTS Peteka 5402</td>
                                          <td>COSL.223 (Deploy Anchor 4/6) - COSL.223 ( Backload Cargo) - Pab (Offload Backload Cargo)</td>
                                          <td>Proses Pick up anchor</td>
                                       </tr>
                                       <tr>
                                          <td>AHTS Kittiwake</td>
                                          <td>RIG EMD (Support Rig Operation)</td>
                                          <td>Support Rig Operation</td>
                                       </tr>
                                       <tr>
                                          <td>AHTS Petroleum Pioneer</td>
                                          <td>KJ4 (Cargo Operation) - Rig EMD (Support Rig Operation)</td>
                                          <td>Cargo Operation</td>
                                       </tr>
                                       <tr>
                                          <td>AHTS Peteka 5402</td>
                                          <td>COSL.223 (Deploy Anchor 4/6) - COSL.223 ( Backload Cargo) - Pab (Offload Backload Cargo)</td>
                                          <td>Proses Pick up anchor</td>
                                       </tr>
                                       <tr>
                                          <td>AHTS Kittiwake</td>
                                          <td>RIG EMD (Support Rig Operation)</td>
                                          <td>Support Rig Operation</td>
                                       </tr>
                                       <tr>
                                          <td>AHTS Petroleum Pioneer</td>
                                          <td>KJ4 (Cargo Operation) - Rig EMD (Support Rig Operation)</td>
                                          <td>Cargo Operation</td>
                                       </tr>
                                       <tr>
                                          <td>AHTS Peteka 5402</td>
                                          <td>COSL.223 (Deploy Anchor 4/6) - COSL.223 ( Backload Cargo) - Pab (Offload Backload Cargo)</td>
                                          <td>Proses Pick up anchor</td>
                                       </tr>
                                       <tr>
                                          <td>AHTS Kittiwake</td>
                                          <td>RIG EMD (Support Rig Operation)</td>
                                          <td>Support Rig Operation</td>
                                       </tr>
                                       <tr>
                                          <td>AHTS Petroleum Pioneer</td>
                                          <td>KJ4 (Cargo Operation) - Rig EMD (Support Rig Operation)</td>
                                          <td>Cargo Operation</td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                           <div class="card-body p-2 text-center" style="background-color: rgb(208, 238, 118)">
                              <b>Crewchange Boat & Others</b>
                           </div>
                           <div class="card-body p-0">
                              <div class="scrolling-body overflow-auto" style="height: 80px">
                                 <table>
                                    {{-- <thead>
                                       <tr>
                                          <th colspan="" class="py-2" >Barge/Rig</th>
                                          <th class="py-2" >Route</th>
                                          <th class="py-2" >Vessel</th>
                                          <th class="py-2" >Date</th>
                                       </tr>
                                    </thead> --}}
                                    <tbody>
                                       <tr>
                                          <td>CB. Tegas Jaya</td>
                                          <td >JKT  -->  S.Onyx (SELATAN-A)  -->  P.Winner (RAMA-I)  -->  G.Jati (RAMA-B)  -->  JKT</td>
                                          <td>CC WI</td>
                                          
                                       </tr>
                                       <tr>
                                          <td>CB. Sigap Jaya</td>
                                          <td >Docking</td>
                                          <td>Offhire</td>
                                          
                                       </tr>
                                       
                                       
                                    </tbody>
                                 </table>
                                 </div>
                           </div>
                           <div class="card-body p-2 text-center" style="background-color: rgb(208, 238, 118)">
                              <b>Interplatform Boat</b>
                           </div>
                           <div class="card-body p-0">
                              <div class="scrolling-body overflow-auto" style="height: 80px">
                                 <table>
                                    <thead>
                                       <tr>
                                          <th colspan="" class="py-2" >Barge/Rig</th>
                                          <th class="py-2" >Route</th>
                                          <th class="py-2" >Vessel</th>
                                          <th class="py-2" >Date</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td>AWB Star Onyx</td>
                                          <td class="text-truncate">RAMD - SELA</td>
                                          <td>AHTS Peteka5402</td>
                                          <td>6/20/2025</td>
                                       </tr>
                                       <tr>
                                          <td>COSL.223</td>
                                          <td class="text-truncate">BWA - KARA</td>
                                          <td>AHTS Triton Jawara</td>
                                          <td></td>
                                       </tr>
                                       <tr>
                                          <td>AWB Star Onyx</td>
                                          <td class="text-truncate">RAMD - SELA</td>
                                          <td>AHTS Peteka5402</td>
                                          <td></td>
                                       </tr>
                                       <tr>
                                          <td>COSL.223</td>
                                          <td class="text-truncate">BWA - KARA</td>
                                          <td>AHTS Triton Jawara</td>
                                          <td></td>
                                       </tr>
                                       
                                    </tbody>
                                 </table>
                                 </div>
                           </div>
                        </div>
                        
                        
                     </div>
                     <div class="col-md-3">
                        
            
                        <div class="card">
                           {{-- <div class="card-body p-2 text-center" style="background-color: rgb(208, 238, 118)">
                              <b>Schedule Lifting Tanker</b>
                           </div> --}}
                           <div class="card-body p-0">
                              <table>
                                 <thead>
                                    <tr>
                                       <th colspan="2" class="py-2" style="background-color: rgb(208, 238, 118)">Schedule Lifting Tanker</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td rowspan="4">Cinta Terminal</td>
                                       
                                    </tr>
                                    <tr>
                                       <td>12 - 13 Jun 2025 (Overcomer & Parakan)</td>
                                    </tr>
                                    <tr>
                                       <td>19 - 20 Jun 2025  (Peteka5402 & Petroleum Pioneer)</td>
                                    </tr>
                                    <tr>
                                       <td>30 Jun - 01 Jul 2025  (TBA)</td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                           <div class="card-body p-2 text-center" style="background-color: rgb(208, 238, 118)">
                              <b>Reminder Notes</b>
                           </div>
                           <div class="card-body p-0">
                              <div class="scrolling-body table-responsive overflow-auto" style="height: 300px">
                                 <table>
                                    {{-- <thead>
                                       <tr>
                                          <th colspan="" class="py-2" >Barge/Rig</th>
                                          <th class="py-2" >Route</th>
                                          <th class="py-2" >Vessel</th>
                                          <th class="py-2" >Date</th>
                                       </tr>
                                    </thead> --}}
                                    <tbody>
                                       <tr>
                                          <td>Zelda Comp. Project support by CB. Pan Marine 6 (60 Pax) 
                                             19 Jun - 3 Jul 
                                          </td>
                                          
                                          
                                       </tr>
                                       <tr>
                                          <td>
                                             Refurbish P/F S. Wanda-A duration 6-8 Week - Plan UV Singgasana Laut
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>
                                             Project Rejuvenation 10 P/F Support by COSL 222 & AHTS Logindo Overcomer
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>
                                             CB. Salatiga On Hire Call Out - Support Project/Operation PHE OSES
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>
                                             CB. NMS Accomplish renewal certificate - Plan W2 Jun
                                             Due date 26 Jun
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>
                                             Project Rejuvenation 10 P/F Support by COSL 222 & AHTS Logindo Overcomer
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>
                                             CB. Salatiga On Hire Call Out - Support Project/Operation PHE OSES
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>
                                             CB. NMS Accomplish renewal certificate - Plan W2 Jun
                                             Due date 26 Jun
                                          </td>
                                       </tr>
                                       
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

  
@endsection



