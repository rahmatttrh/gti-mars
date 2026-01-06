@extends('layouts.stisla.app-main')
@section('title')
   Export VDR
@endsection

@section('content')
   <section class="section">
      <div class="section-body">
         <div class="row">
            <div class="col-md-4">
               <div class="card">
                  <div class="card-body">
                     <h5>Form Export VDR</h5>
                     <span>Fitur ini digunakan untuk Export PDF beberapa VDR sesuai rentang tanggal yang dipilih</span>
                     <hr>
                     <form action="{{route('vdr.export.filter')}}" method="POST">
                        @csrf
                        <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="from">From</label>
                                 <input type="date" class="form-control " required  id="from" name="from" >
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label for="to">To</label>
                                 <input type="date" class="form-control " required  id="to" name="to" >
                              </div>
                           </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-block">Show</button>
                     </form>
                     <hr>
                  </div>
               </div>
            </div>

            <div class="col-md-8">
               <div class="card">
                  <div class="card-body">
                     @if ($data == 0)
                         <h5>Data Empty</h5>
                         <span>Isi data tanggal pada form dan klik 'Show' untuk menampilkan data</span>
                         @else
                         <div class="d-flex justify-content-between">
                           <div>
                              <h5>VDR {{$vessel->name}}</h5>
                              <span>{{formatDate($from)}} - {{formatDate($to)}}</span><br>
                              <span>Total {{count($vdrs)}} VDR</span>
                           </div>
                           <div class="text-right">
                              <a href="{{route('vdr.export.multiple', [enkripRambo($from), enkripRambo($to), enkripRambo($vessel->id)])}}" target="_blank" class="btn btn-light">Export to PDF</a>
                           </div>
                         </div>
                         <hr>
                         <table class="table table-sm border">
                           <thead>
                              <tr>
                                 <th class="border text-center">No</th>
                                 <th class="border ">VDR Number</th>
                                 <th class="border ">Date</th>
                                 <th class="border">Status</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($vdrs as $vdr)
                                  <tr>
                                    <td class="border text-center">{{++$i}}</td>
                                    <td class="border">{{$vdr->code}}</td>
                                    <td class="border">{{formatDate($vdr->date)}}</td>
                                    <td class="border">
                                       <x-status-stisla.vdr :vdr="$vdr" />
                                    </td>
                                  </tr>
                              @endforeach
                           </tbody>
                         </table>
                         <hr>
                         <span>Data yang ditampilkan hanya VDR yang berstatus 'Complete'</span>
                     @endif
                  </div>
                  
               </div>
            </div>
         </div>
      </div>
   </section>
@endsection