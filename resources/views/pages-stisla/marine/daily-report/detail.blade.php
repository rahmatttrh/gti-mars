@extends('layouts.stisla.app')
@section('title')
   Daily Report Management 
@endsection
@section('content')
<section class="section">

   <style>
      td {
  border-right: solid 1px rgb(255, 255, 255); 
  border-left: solid 1px rgb(255, 255, 255);
  


}

.btn-text {
  background: none;
  border: none;
  color: inherit;       /* pakai warna teks di sekitarnya */
  padding: 0;
  font: inherit;        /* biar font sama dengan teks sekitarnya */
  cursor: pointer;      /* tetap kelihatan bisa diklik */
}

.btn-text:hover {
  text-decoration: none; /* efek hover seperti link */
  color: #616263; /* warna biru seperti link (opsional) */
}

table, th, td {
  border: 1px solid #d6d2d2; /* warna hitam */
  border-collapse: collapse; /* biar garisnya tidak double */
  font-size: 12px;
}

      input {
            border:0;
            outline:0;
            text-align: left; 
            /* background-color: rgb(226, 236, 151) */
            
         }

         select {
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
   </style>
   
   <div class="section-body">

      
      
      <div class="card shadow-lg">
         <div class="card-body">
            <div class="row">
               <div class="col-md-3">
                  <a href="" class="btn btn-primary mb-3">Publish</a>
                  <table>
                     <thead>
                        <thead>
                           <tr>
                              <th>Date</th>
                              <th colspan="" class="py-2 " style="">{{formatDateName($dailyReport->date)}}</th>
                           </tr>
                           <tr>
                              <th>Status</th>
                              <th colspan="" class="py-2 " style="">  
                                 <x-status-stisla.daily-report :daily="$dailyReport" />
                              </th>
                           </tr>
                        </thead>
                        
                     </thead>
                  </table>
                  <hr>
                  <table class="w-100">
                     <thead>
                        <thead>
                           <tr>
                              <th colspan="3" class="py-2 text-center" style="background-color: rgb(208, 238, 118)">Barge/Rig/Tanker Location</th>
                           </tr>
                        </thead>
                        <tr>
                           <th colspan="2" class="py-2" >Barge/Rig/Tanker Loc</th>
                           <th class="py-2" >Area</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($dailyBargeLocs as $bargeLoc)
                        <tr>
                           <td>
                              
                              <div class="btn-group">
                                 <button  class="dropdown-toggle btn-text" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{$bargeLoc->barge}}
                                 </button>
                                 <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item text-danger" href="#" data-toggle="modal" data-target="#modalBargeLocationDelete-{{$bargeLoc->id}}">Delete</a>
                                 </div>
                               </div>
                           </td>
                           <td>{{$bargeLoc->loc}}</td>
                           <td>{{$bargeLoc->area}}</td>
                        </tr>
                        @endforeach
                        



                        <tr>
                           <td colspan="3" class="text-center">Form Add</td>
                        </tr>
                        <form action="{{route('daily.barge.location.store')}}" method="POST">
                           @csrf
                           <input type="number" name="dailyId" id="dailyId" value="{{$dailyReport->id}}" hidden>
                        <tr>
                           <td>Barge</td>
                           <td colspan="2">
                              <input type="text" name="barge" id="barge">
                              {{-- <select name="" id="">
                                 <option value="">ONYX</option>
                                 <option value="">COSL223</option>
                              </select> --}}
                           </td>
                           
                           
                           
                        </tr>
                        <tr>
                           <td>Loc</td>
                           <td colspan="2">
                              <input type="text" name="loc" id="loc">
                           </td>
                        </tr>
                        <tr>
                           <td>Area</td>
                           <td colspan="2">
                              <input type="text" name="area" id="area">
                              {{-- <select name="" id="">
                                 <option value="">SBU</option>
                                 <option value="">CBU</option>
                                 <option value="">NBU</option>
                              </select> --}}
                           </td>
                        </tr>
                        
                        <tr>
                           <td colspan="3"><button type="submit" class="btn btn-sm btn-primary btn-block">Add</button></td>
                        </tr>
                        </form>
                     </tbody>
                  </table>

                  <hr>


                  <div class="table-responsive">
                     <table class="w-100">
                        <thead>
                           <tr>
                              <th colspan="4" class="py-2 text-center" style="background-color: rgb(208, 238, 118)">Barge/Rig Move</th>
                           </tr>
                           <tr>
                              <th colspan="" class="py-2" >Barge/Rig</th>
                              <th style="width: 30px !important" class="py-2" >Route</th>
                              <th class="py-2" >Vessel</th>
                              <th class="py-2" >Date</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>Onyx</td>
                              <td style="width: 30px" class="text-truncate">RAMD - SELA</td>
                              <td>Peteka5402</td>
                              <td>6/20/25</td>
                           </tr>
                           <tr>
                              <td>COSL223</td>
                              <td class="text-truncate">BWA - KARA</td>
                              <td>Triton Jawara</td>
                              <td></td>
                           </tr>
                           <tr>
                              <td>Onyx</td>
                              <td class="text-truncate">RAMD - SELA</td>
                              <td>Peteka5402</td>
                              <td></td>
                           </tr>
                           <tr>
                              <td>COSL223</td>
                              <td class="text-truncate">BWA - KARA</td>
                              <td>Triton Jawara</td>
                              <td></td>
                           </tr>

                           <tr>
                              <td colspan="4" class="text-center">Form Add</td>
                           </tr>
                           <tr>
                              <td>Barge</td>
                              <td colspan="3">
                                 
                                 <select name="" id="">
                                    <option value="">ONYX</option>
                                    <option value="">COSL223</option>
                                 </select>
                              </td>
                             
                              
                              
                              
                           </tr>
                           <tr>
                              <td>Route</td>
                              <td colspan="3">
                                 <input type="text" name="" id="">
                              </td>
                           </tr>
                           <tr>
                              <td>Vessel</td>
                              <td colspan="3">
                                 <select name="" id="">
                                    <option value="">Balihe</option>
                                    <option value="">ENC One</option>
                                    {{-- <option value="">NBU</option> --}}
                                 </select>
                              </td>
                           </tr>
                           <tr>
                              <td>Date</td>
                              <td colspan="3">
                                 <input type="date" name="" id="">
                              </td>
                           </tr>
                           
                           <tr>
                              <td colspan="4"><a href="" class="btn btn-sm btn-primary btn-block">Add</a></td>
                           </tr>
                           
                        </tbody>
                     </table>
                  </div>
                  
               </div>

               <div class="col-md-6">
                  <div class="table-responsive">
                     <table>
                        <thead>
                           <tr>
                              <th colspan="4" class="py-2 text-center" style="background-color: rgb(208, 238, 118)">Vessel Daily Activity</th>
                           </tr>
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

                           <tr>
                              <td colspan="3" class="text-center">Form Add</td>
                           </tr>
                           <tr>
                              <td>Vessel</td>
                              <td colspan="2">
                                 <select name="" id="">
                                    <option value="">ENC One</option>
                                    <option value="">Transko Balihe</option>
                                 </select>
                              </td>
                           </tr>
                           <tr>
                              <td>Activity</td>
                              <td colspan="2">
                                 <textarea name="" id="" cols="30" class="w-100" rows="1"></textarea>
                              </td>
                           </tr>
                           <tr>
                              <td>Remark</td>
                              <td>
                                 <input type="text" name="" id="">
                              </td>
                           </tr>
                           <tr>
                              <td colspan="3"><a href="" class="btn btn-sm btn-primary btn-block">Add</a></td>
                           </tr>
                        </tbody>
                     </table>

                     
                  </div>
                  <hr>
                  <div class="table-responsive">
                  

                     <table>
                        {{-- <thead>
                           <tr>
                              <th colspan="" class="py-2" >Barge/Rig</th>
                              <th class="py-2" >Route</th>
                              <th class="py-2" >Vessel</th>
                              <th class="py-2" >Date</th>
                           </tr>
                        </thead> --}}
                        <thead>
                           <tr>
                              <th colspan="3" class="py-2 text-center" style="background-color: rgb(208, 238, 118)">Crew Change Boat & Others</th>
                           </tr>
                        </thead>
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

                           <tr>
                              <td colspan="3" class="text-center">Form Add</td>
                           </tr>
                           <tr>
                              <td>Vessel</td>
                              <td colspan="2">
                                 <select name="" id="">
                                    <option value="">ENC One</option>
                                    <option value="">Prisai</option>
                                 </select>
                              </td>
                           </tr>
                           <tr>
                              <td>Desc</td>
                              <td colspan="2">
                                 <textarea name="" id="" class="w-100" cols="30" rows="1"></textarea>
                              </td>
                           </tr>
                           <tr>
                              <td>Loc</td>
                              <td colspan="2"><input type="text" name="" id=""></td>
                           </tr>
                           <tr>
                              <td colspan="3"><a href="" class="btn btn-sm btn-primary btn-block">Add</a></td>
                           </tr>

                           
                           
                        </tbody>
                     </table>
                  
                    
                  </div>
                  <hr>
                  <div class="table-responsive">
                     <table>
                        <thead>
                           <tr>
                              <th colspan="4" class="py-2 text-center" style="background-color: rgb(208, 238, 118)">Interplatform Boat</th>
                           </tr>
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

                           <tr>
                              <td colspan="3" class="text-center">Form Add</td>
                           </tr>
                           <tr>
                              <td>Barge</td>
                              <td colspan="3">
                                 <select name="" id="">
                                    <option value="">Onyx</option>
                                    <option value="">COSL222</option>
                                 </select>
                              </td>
                           </tr>
                           <tr>
                              <td>Route</td>
                              <td colspan="3">
                                 <input type="text" name="" id="">
                              </td>
                           </tr>
                           <tr>
                              <td>Vessel</td>
                              <td colspan="3">
                                 <select name="" id="">
                                    <option value="">ENC One</option>
                                    <option value="">Transko Balihe</option>
                                 </select>
                              </td>
                           </tr>
                           <tr>
                              <td>Date</td>
                              <td colspan="3">
                                 <input type="date" name="" id="">
                              </td>
                           </tr>
                           <tr>
                              <td colspan="4"><a href="" class="btn btn-sm btn-primary btn-block">Add</a></td>
                           </tr>
                           
                        </tbody>
                     </table>
                  </div>
               </div>

               <div class="col-md-3">
                  <div class="table-responsive">
                     <table>
                        <thead>
                           <tr>
                              <th colspan="2" class="py-2 text-center" style="background-color: rgb(208, 238, 118)">Schedule Lifting Tanker</th>
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

                           <tr>
                              <td colspan="2" class="text-center">Form Add</td>
                           </tr>
                           <tr>
                              <td>Tanker</td>
                              <td colspan="">
                                 <input type="text" name="" id="">
                              </td>
                           </tr>
                           <tr>
                              <td>Desc</td>
                              <td colspan="">
                                 <textarea type="text" name="" id="" class="w-100" rows="1"></textarea>
                              </td>
                           </tr>
                           
                           
                           <tr>
                              <td colspan="2"><a href="" class="btn btn-sm btn-primary btn-block">Add</a></td>
                           </tr>
                        </tbody>
                     </table>
                  </div>

                  <hr>

                  <div class="table-responsive">
                     <table>
                        {{-- <thead>
                           <tr>
                              <th colspan="" class="py-2" >Barge/Rig</th>
                              <th class="py-2" >Route</th>
                              <th class="py-2" >Vessel</th>
                              <th class="py-2" >Date</th>
                           </tr>
                        </thead> --}}
                        <thead>
                           <tr>
                              <th colspan="" class="py-2 text-center" style="background-color: rgb(208, 238, 118)">Notes</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td colspan="2">Zelda Comp. Project support by CB. Pan Marine 6 (60 Pax) 
                                 19 Jun - 3 Jul 
                              </td>
                              
                              
                           </tr>
                           <tr>
                              <td colspan="2" >
                                 Refurbish P/F S. Wanda-A duration 6-8 Week - Plan UV Singgasana Laut
                              </td>
                           </tr>
                           <tr>
                              <td colspan="2">
                                 Project Rejuvenation 10 P/F Support by COSL 222 & AHTS Logindo Overcomer
                              </td>
                           </tr>
                           <tr>
                              <td colspan="2">
                                 CB. Salatiga On Hire Call Out - Support Project/Operation PHE OSES
                              </td>
                           </tr>
                           <tr>
                              <td colspan="2">
                                 CB. NMS Accomplish renewal certificate - Plan W2 Jun
                                 Due date 26 Jun
                              </td>
                           </tr>
                           <tr>
                              <td colspan="2">
                                 Project Rejuvenation 10 P/F Support by COSL 222 & AHTS Logindo Overcomer
                              </td>
                           </tr>
                           <tr>
                              <td colspan="2">
                                 CB. Salatiga On Hire Call Out - Support Project/Operation PHE OSES
                              </td>
                           </tr>
                           <tr>
                              <td colspan="2">
                                 CB. NMS Accomplish renewal certificate - Plan W2 Jun
                                 Due date 26 Jun
                              </td>
                           </tr>


                           <tr>
                              <td colspan="2" class="text-center">Form Add</td>
                           </tr>
                          
                           <tr>
                              <td>Desc</td>
                              <td colspan="">
                                 <textarea type="text" name="" id="" class="w-100" rows="1"></textarea>
                              </td>
                           </tr>
                           
                           
                           <tr>
                              <td colspan="2"><a href="" class="btn btn-sm btn-primary btn-block">Add</a></td>
                           </tr>
                           
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>


@foreach ($dailyBargeLocs as $bargeLoc)
<div class="modal modal-blur fade" id="modalBargeLocationDelete-{{$bargeLoc->id}}" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
     <div class="modal-content">
       <div class="modal-body">
         <div class="modal-title">Confirm</div>
         <hr>
         <div>Delete Barge/Rig/Tanker Location from Daily Report</div>

         <table class="mt-2">
            <tr>
               <td>Barge/Rig/Tanker</td>
               <td>{{$bargeLoc->barge}}</td>
            </tr>
            <tr>
               <td>Loc</td>
               <td>{{$bargeLoc->loc}}</td>
            </tr>
            <tr>
               <td>Area</td>
               <td>{{$bargeLoc->area}}</td>
            </tr>
         </table>
       </div>
       <div class="modal-footer">
         {{-- <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button> --}}
         <a href="{{route('daily.barge.location.delete', enkripRambo($bargeLoc->id))}}" class="btn btn-danger" >Yes, delete this data</a>
         {{-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Yes, delete all my data</button> --}}
       </div>
     </div>
   </div>
</div>
    
@endforeach
    
@endsection