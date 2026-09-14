<style>
   table {
      width: 100%;
      background-color: white;
      border-radius: 5px;
      /* box-shadow: 1px 1px 5px rgb(159, 158, 158); */
   }

   table, th, td {
      /* border: 1px solid rgb(226, 218, 218); */
      /* border-collapse: collapse; */
   }
   th, td {
      padding-left: 5px
   }

   
</style>


<style>
   .welcome-card {
    background: linear-gradient(135deg, #16315b, #03061b);
    border-radius: 18px;
    position: relative;
    overflow: hidden;
}

/* efek glow */
.welcome-card::after {
    content: '';
    position: absolute;
    width: 200%;
    height: 200%;
    background: rgba(255,255,255,0.08);
    top: -50%;
    left: -50%;
    transform: rotate(25deg);
}

/* icon */
.welcome-icon {
    width: 65px;
    height: 65px;
    border-radius: 16px;
    background: rgba(255,255,255,0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 26px;
    backdrop-filter: blur(6px);
    transition: 0.3s;
}

/* hover effect */
.welcome-card:hover .welcome-icon {
    transform: scale(1.1) rotate(5deg);
}

.welcome-card:hover {
    transform: translateY(-3px);
    transition: 0.3s;
}
</style>

<style>
   .announcement-card {
    border-radius: 16px;
    transition: 0.3s;
    background: #fff;
}

.announcement-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
}

/* icon header */
.ann-icon {
    width: 45px;
    height: 45px;
    border-radius: 12px;
    background: #f1f5ff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
}

/* item list */
.ann-item {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    padding: 8px 10px;
    border-radius: 10px;
    /* margin-bottom: 2px; */
    transition: 0.2s;
    font-size: 12px;
}

/* hover tiap item */
.ann-item:hover {
    background: #f8f9fa;
    transform: translateX(4px);
}

/* icon dalam item */
.ann-item i {
    margin-top: 3px;
    font-size: 16px;
}
</style>


<style>
   .vdr-info {
    background: #fff;
    transition: 0.3s;
}

.vdr-info:hover {
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    transform: translateY(-2px);
}

.vdr-icon {
    font-size: 22px;
    margin-top: 2px;
}
</style>

<style>
   .flow-badge{
    padding: 6px 12px;
    border-radius: 20px;
    color: white;
    font-size: 12px;
    font-weight: 500;
    white-space: nowrap;
}

.flow-row{
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 8px;
}
</style>


<style>
   .ui-update-card {
    border-radius: 12px;
    background: #fff;
    transition: 0.3s;
}

.ui-update-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.06);
}

.ui-icon {
    font-size: 22px;
    margin-top: 2px;
}
</style>









<div class="row">
   <div class="col-md-4">
      <div class="card welcome-card border-0 shadow-lg text-white">
         <div class="card-body p-4">

            <div class="d-flex align-items-center justify-content-between flex-wrap">

                  <!-- KIRI -->
                  <div class="d-flex align-items-center gap-3 mb-2">
                     <div class="welcome-icon">
                        <i class="fa fa-anchor"></i>
                     </div>
                     <div>
                        <i class="fa fa-ship"></i> Welcome Back,
                        <h4 class="mb-1 fw-bold">
                               
                              {{$vessel->name}} 
                        </h4>
                        <small>{{$vessel->type}}</small>
                        <hr class="bg-light">
                        <span class="mb-0 opacity-75 mt-2">
                              Utamakan keselamatan kerja dan patuhi seluruh prosedur HSE dalam setiap aktivitas.
                        </span>
                     </div>
                  </div>

                  <!-- KANAN (INFO TAMBAHAN) -->
                  <div class="text-end mt-4 mt-md-0">
                     <div class="badge bg-light text-dark mb-1">
                        <i class="fa fa-shield-alt"></i> Safety First
                     </div>
                     {{-- <br>
                     <small class="opacity-75">
                        Status: <b>On Duty</b>
                     </small> --}}
                  </div>

            </div>

         </div>
      </div>

      <div class="card announcement-card border-0 shadow-sm">
         <div class="card-body p-4">

            <!-- HEADER -->
            <div class="d-flex align-items-center mb-3">
                  <div class="ann-icon mr-3">
                     <i class="fa fa-bullhorn text-primary"></i>
                  </div>
                  <div>
                     <b class="mb-0 fw-bold">Announcement</b><br>
                     <small class="text-muted">Informasi penting terkait proses VDR</small>
                  </div>
            </div>

            <!-- LIST INFO -->
            <div class="ann-item">
                  <i class="fa fa-sort-numeric-down text-primary"></i>
                  <span><b>Release VDR Draft</b> dari tanggal paling awal secara berurutan</span>
            </div>

            <div class="ann-item">
               <i class="fa fa-check-circle text-success"></i>
               <span>
                  <b>Release VDR</b> hanya dapat dilakukan jika VDR sebelumnya sudah
                  melewati Approval PET
               </span>
            </div>

            <div class="ann-item">
                  <i class="fa fa-clock text-success"></i>
                  <span>Release VDR sebelum <b>07:00</b> atau sebelum <b>19:00</b></span>
            </div>

            <div class="ann-item">
                  <i class="fa fa-exclamation-circle text-danger"></i>
                  <span>VDR Reject harus direvisi dan di-release ulang sebelum <b>16:00</b></span>
            </div>

            <div class="ann-item">
                  <i class="fa fa-ship text-info"></i>
                  <span>Untuk Kapal IPB dan Tug Boat, diharuskan memilih <b>AREA</b> pada form VDR, untuk proses approval VDR di area tersebut</span>
            </div>

         </div>
      </div>

      {{-- <div class="card">
         @if ($vessel->email == null || $vessel->email_office == null)
            
               <div class="card-body text-danger">
                  (!) Anda belum mengatur 
                  @if ($vessel->email == null)
                      Email Vessel
                  @endif
                  @if ($vessel->email_vessel == null)
                      Email Vessel
                  @endif
               </div>
         
         @endif
         <div class="card-body">
           
            
            <form action="{{route('vessel.update.email')}}" method="POST">
               @csrf
               @method('PUT')
               <input type="text" name="vessel" id="vessel" value="{{$vessel->id}}" hidden>
               <div class="form-floating mb-3">
                  
                  <label for="name">Email Kapal</label>
                  <input type="text" required class="form-control" id="email_vessel" name="email_vessel" value="{{$vessel->email}}"  >
                  
               </div>
               <div class="form-floating mb-3">
                  
                  <label for="name">Email Office</label>
                  <input type="text" required class="form-control" id="email_office" name="email_office"  value="{{$vessel->email_office}}">
                  
               </div>
               <button class="btn btn-primary" type="submit">Update</button>
            </form>
         </div>
      </div> --}}

      <div class="card shadow-sm border-0">

         <!-- ALERT -->
         @if ($vessel->email == null || $vessel->email_office == null)
         <div class="card-body py-2 px-3 bg-light text-danger small">
            <i class="fa fa-exclamation-circle mr-1"></i>
            Data belum lengkap:
            @if ($vessel->email == null)
               <b>Email Vessel</b>
            @endif
            @if ($vessel->email_office == null)
               @if ($vessel->email == null) & @endif
               <b>Email Office</b>
            @endif
         </div>
         @endif

         <!-- FORM -->
         <div class="card-body">

            <form action="{{route('vessel.update.email')}}" method="POST">
               @csrf
               @method('PUT')

               <input type="hidden" name="vessel" value="{{$vessel->id}}">

               <!-- Email Vessel -->
               <div class="form-group row mb-2 align-items-center">
                  <label class="col-md-4 col-form-label small text-muted">
                     Email Vessel
                  </label>
                  <div class="col-md-8">
                     <input type="text" required
                        class="form-control form-control-sm"
                        name="email_vessel"
                        value="{{$vessel->email}}">
                  </div>
               </div>

               <!-- Email Office -->
               <div class="form-group row mb-2 align-items-center">
                  <label class="col-md-4 col-form-label small text-muted">
                     Email Office
                  </label>
                  <div class="col-md-8">
                     <input type="text" required
                        class="form-control form-control-sm"
                        name="email_office"
                        value="{{$vessel->email_office}}">
                  </div>
               </div>

               <!-- ACTION -->
               <div class="text-right mt-2">
                  <button class="btn btn-primary btn-sm">
                     <i class="fa fa-save"></i> Update
                  </button>
               </div>

            </form>

         </div>

      </div>
   </div>

   <div class="col-md-8">
      {{-- <div class="card border-0 shadow-sm ui-update-card">
         <div class="card-body d-flex align-items-start gap-3">

            <!-- ICON -->
            <div class="ui-icon text-primary mr-3">
                  <i class="fa fa-info-circle"></i>
            </div>

            <!-- CONTENT -->
            <div>
                  <div class="fw-bold mb-1">
                     Update Tampilan Dashboard
                  </div>

                  <small class="text-muted">
                     Tampilan Dashboard telah diperbarui untuk meningkatkan kenyamanan penggunaan. 
                     Tidak perlu khawatir, data yang ditampilkan dan proses pembuatan VDR tetap sama.
                  </small>
            </div>

         </div>
      </div> --}}


      <div class="card ">
               
         <div class="card-body ">

            @if ($vessel->contract_type == 'Non PO')
                <div class="alert alert-info border-0 shadow-none rounded">
                  <div class="d-flex align-items-center">
                     <i class="fas fa-info-circle fa-lg mr-3 mt-1"></i>
                     <div>
                        <small>
                           <strong>Petunjuk Pengisian</strong><br>
                           Silakan pilih <b>Coman Area</b> pada form Create VDR agar lokasi dan area kerja dapat teridentifikasi dengan benar. 
                           Jika VDR yang diajukan <b>tidak memerlukan approval COMAN</b>, pilih opsi <b>Not Required</b> pada field Coman Area untuk melanjutkan proses pengajuan tanpa persetujuan COMAN.
                        </small>
                     </div>
                  </div>
               </div>
            @endif

            <!-- Header -->
            <div class="d-flex align-items-center mb-2">
               <div class="mr-2">
                  <i class="fas fa-route text-primary fs-4"></i>
               </div>
               <div>
                  {{-- <h6 class="mb-0 fw-bold">VDR Approval Flow</h6> --}}
                  <small class="text-muted">VDR Approval Flow</small>
               </div>
         </div>

         
         @if ($vessel->contract_type != 'Non PO')
             
         
               @if ($vessel->type == 'Tug Boat' || $vessel->ipb == 'IPB')
               <!-- Flow Tug Boat -->
               <div class="flow-row">
                     <span class="badge bg-light text-dark mr-2 px-2 py-2">
                        <i class="fas fa-anchor text-warning mr-1"></i> IPB / Tug Boat
                     </span>

                     <div class="d-flex align-items-center flex-wrap gap-2">
                        <span class="flow-badge bg-info">
                           <i class="fas fa-user-edit mr-1"></i> PET
                        </span>

                        <i class="fas fa-chevron-right text-muted mx-1"></i>

                        <span class="flow-badge bg-warning">
                           <i class="fas fa-broadcast-tower mr-1"></i> Radop
                        </span>

                        <i class="fas fa-chevron-right text-muted mx-1"></i>

                        <span class="flow-badge bg-warning ">
                           <i class="fas fa-user-tie mr-1"></i> Suptent
                        </span>
                        

                        <i class="fas fa-chevron-right text-muted mx-1"></i>

                        <span class="flow-badge bg-primary">
                           <i class="fas fa-user-shield mr-1"></i> Marine Rep
                        </span>

                        <i class="fas fa-chevron-right text-success mx-1"></i>

                        <span class="flow-badge bg-success">
                           <i class="fas fa-check-circle mr-1"></i> Complete
                        </span>
                     </div>
               </div>
               @else
               <!-- Flow Normal -->
               <div class="flow-row mb-2">
                     <span class="badge bg-light text-dark mr-2 px-2 py-2">
                        <i class="fas fa-file-alt text-primary mr-1"></i> Regular
                     </span>

                     <div class="d-flex align-items-center flex-wrap gap-2">
                        <span class="flow-badge bg-info">
                           <i class="fas fa-user-edit mr-1"></i> PET
                        </span>

                        <i class="fas fa-chevron-right text-muted mx-1"></i>

                        <span class="flow-badge bg-warning">
                           <i class="fas fa-ship mr-1"></i> Marine
                        </span>

                        <i class="fas fa-chevron-right text-muted mx-1"></i>

                        <span class="flow-badge bg-primary ">
                           <i class="fas fa-user-tie mr-1"></i> Marine Rep
                        </span>

                        <i class="fas fa-chevron-right text-success mx-1"></i>

                        <span class="flow-badge bg-success">
                           <i class="fas fa-check-circle mr-1"></i> Complete
                        </span>
                     </div>
               </div>
               @endif
            @else
            @if ($vessel->username == 'bestlink88')
            <!-- Flow Normal Non PO -->
               <div class="flow-row mb-2">
                     <span class="badge bg-light text-dark mr-2 px-2 py-2">
                        <i class="fas fa-file-alt text-primary mr-1"></i> Patrol Boat
                     </span>

                     <div class="d-flex align-items-center flex-wrap gap-2">
                        <span class="flow-badge bg-info">
                           <i class="fas fa-user-edit mr-1"></i> FM
                        </span>
                         <i class="fas fa-chevron-right text-muted mx-1"></i>
                        <span class="flow-badge bg-info">
                           <i class="fas fa-user-edit mr-1"></i> PET
                        </span>

                         <i class="fas fa-chevron-right text-muted mx-1"></i>

                        <span class="flow-badge bg-warning">
                           <i class="fas fa-ship mr-1"></i> Lead Command
                        </span>

                        <i class="fas fa-chevron-right text-muted mx-1"></i>

                        <span class="flow-badge bg-primary">
                           <i class="fas fa-user-tie mr-1"></i> Suptent Security
                        </span>

                        

                        {{-- <i class="fas fa-chevron-right text-muted mx-1"></i>

                        <span class="flow-badge bg-primary ">
                           <i class="fas fa-user-tie mr-1"></i> Marine Rep
                        </span> --}}

                        <i class="fas fa-chevron-right text-success mx-1"></i>

                        <span class="flow-badge bg-success">
                           <i class="fas fa-check-circle mr-1"></i> Complete
                        </span>
                     </div>
               </div>
             @else
               
               <div class="flow-row mb-2">
                  <span class="badge bg-light text-dark mr-2 px-2 py-2">
                     <i class="fas fa-ship text-primary mr-1"></i> Non PO
                  </span>

                  <div class="d-flex align-items-center flex-wrap gap-2">
                     <span class="flow-badge bg-info">
                        <i class="fas fa-user-edit mr-1"></i> FM
                     </span>
                        <i class="fas fa-chevron-right text-muted mx-1"></i>
                     <span class="flow-badge bg-info">
                        <i class="fas fa-user-edit mr-1"></i> PET
                     </span>

                        <i class="fas fa-chevron-right text-muted mx-1"></i>

                     <span class="flow-badge bg-warning">
                        <i class="fas fa-ship mr-1"></i> Coman
                     </span>

                     <i class="fas fa-chevron-right text-muted mx-1"></i>

                     <span class="flow-badge bg-warning">
                        <i class="fas fa-ship mr-1"></i> Marine
                     </span>

                     <i class="fas fa-chevron-right text-muted mx-1"></i>

                     <span class="flow-badge bg-primary ">
                        <i class="fas fa-user-tie mr-1"></i> Marine Rep
                     </span>

                     

                     <i class="fas fa-chevron-right text-success mx-1"></i>

                     <span class="flow-badge bg-success">
                        <i class="fas fa-check-circle mr-1"></i> Complete
                     </span>
                  </div>
               </div>
         @endif

         @endif


         <hr>
            
            {{-- <div>Jika anda ingin membuat Vessel Daily Report silahkan 
               
               <a class="btn btn-sm btn-primary" href="{{route('vdr.vessel.create.spa')}}">Klik disini</a>
              
               , atau klik VDR pada menu utama
            </div>
            <hr> --}}
            {{-- <div class="mb-2" style="color: #1f4481 !important">
               <b></b>
            </div> --}}
            @if (count($rejectvdrs) > 0)
            {{-- <div class="card shadow-none border">
               <div class="card-header py-1 bg-danger text-white">
                  <b>VDR REJECT ALERT! </b>
               </div>
               <div class="card-body">
                  @foreach ($rejectvdrs as $rejectvdr)
                  
                     VDR ID  <b>{{$rejectvdr->code}}</b> telah di <b>Reject</b> oleh <b>{{$rejectvdr->rejectBy->name ?? ''}}</b>  
                    <br>
                     <a class="btn btn-sm btn-primary" href="{{route('vdr.revisi.store', enkripRambo($rejectvdr->id))}}" >Klik disini untuk melakukan Revisi</a>
                     <br>
                     @endforeach
               </div>
            </div> --}}
            <div class="card shadow-none border">

               <!-- Header -->
               <div class="card-header bg-danger text-white py-2 d-flex justify-content-between align-items-center">
                  <div>
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        <strong>VDR Rejection Alert</strong>
                  </div>

                  <span class="badge badge-light text-danger">
                        {{count($rejectvdrs)}} Rejected
                  </span>
               </div>

               <!-- Body -->
               <div class="card-body py-3">

                  

                  @foreach ($rejectvdrs as $rejectvdr)
                  <div class="border rounded p-3 mb-3 bg-light">

                        <div class="d-flex justify-content-between flex-wrap">
                           
                           <div>
                              <h6 class="mb-1">
                                    <i class="fas fa-file-alt text-danger mr-1"></i>
                                    VDR ID: <strong>{{$rejectvdr->code}}</strong>
                              </h6>

                              <small class="text-muted">
                                    Rejected by 
                                    <strong>{{$rejectvdr->rejectBy->name ?? '-'}}</strong>
                              </small>

                              @if($rejectvdr->reject_desc)
                              <div class="mt-2">
                                    <small class="text-danger">
                                       <i class="fas fa-comment-alt mr-1"></i>
                                       Reason: {!! $rejectvdr->reject_desc !!}
                                    </small>
                              </div>
                              @endif
                           </div>

                           <div class="mt-2 mt-md-0">
                              <a href="{{route('vdr.revisi.store', enkripRambo($rejectvdr->id))}}" 
                                 class="btn btn-danger btn-sm">
                                    <i class="fas fa-edit mr-1"></i>
                                    Revisi VDR
                              </a>
                           </div>

                        </div>

                  </div>
                  @endforeach

               </div>
            </div>
            @endif

            <div class="d-flex align-items-start gap-4">
               <i class="fa fa-info-circle text-primary mt-1 mr-2"></i>
               <div>
                  <div class="fw-bold">Recent VDR</div>
                  
               </div>
            </div>

            <small class="text-muted">
               Menampilkan data VDR terbaru, <a href="{{ route('vdr.create') }}">Klik disini</a> untuk mengelola seluruh VDR {{ $vessel->name }} yang telah tercatat dalam sistem.
            </small> <br>
            <a href="{{route('vdr.vessel.create.spa')}}" class="btn btn-sm btn-primary text-white mt-2">
                  <i class="fa fa-plus-circle"></i> Buat VDR Baru
            </a>
            <div  class="table-responsive overflow-auto mt-2" style="height: 450px" >
               <table class="table table-sm" >
                  <thead>
                     {{-- <tr>
                        <th colspan="4" style="color: #1f4481 !important">Recent Vessel Daily Report</th>
                     </tr> --}}
                     <tr>
                        {{-- <th class="text-center">No</th> --}}
                        <th>VDR ID</th>
                        <th>VDR Date</th>
                        {{-- <th>Date</th>
                        <th>Crew</th> --}}
                        <th>Released at</th>
                        <th>Area</th>
                        <th style="width: 120px">VDR Status</th>
                        {{-- <th></th> --}}
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($myrecentvdrs as $myvdr)
                     <tr>

                        <td class="border-bottom">
                           @if (auth()->user()->username == 'magelang' )
                           {{-- <div class="dropdown">
                              <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 {{$myvdr->code}}
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                 <a class="dropdown-item" href="{{route('vdr.show.spa', [enkripRambo($myvdr->id), enkripRambo('index')])}}">Form Baru</a>
                                 <a class="dropdown-item" href="{{route('vdr.show', [enkripRambo($myvdr->id), enkripRambo('index')])}}">Form Lama</a>

                                
                              </div>
                           </div> --}}
                           <a href="{{route('vdr.show.spa', [enkripRambo($myvdr->id), enkripRambo('index')])}}">{{$myvdr->code}}</a> 
                           {{-- | <a href="{{route('vdr.show', [enkripRambo($myvdr->id), enkripRambo('index')])}}">Buka di Form Lama</a> --}}
                              
                               @else
                               {{-- <a href="{{route('vdr.show', [enkripRambo($myvdr->id), enkripRambo('index')])}}">{{$myvdr->code}}</a> --}}
                               <a href="{{route('vdr.show.spa', [enkripRambo($myvdr->id), enkripRambo('index')])}}">{{$myvdr->code}}</a>
                           @endif
                           {{-- <a href="{{route('vdr.show', [enkripRambo($myvdr->id), enkripRambo('index')])}}">{{$myvdr->code}}</a> --}}
                        </td>
                        <td class="border-bottom">{{formatDate($myvdr->date)}}</td>
                        <td class="border-bottom">{{$myvdr->release_date}}</td>
                        <td class="border-bottom">{{$myvdr->area ?? '-'}}</td>
                        {{-- <td>{{formatDate($myvdr->date)}}</td>
                        <td>{{$myvdr->crew_onduty}} / {{$myvdr->crew_max}}</td> --}}
                        <td class="text-truncate border-bottom">
                           {{-- @if(date('Y-m-d', strtotime($myvdr->date)) == date('Y-m-d'))
                           <small>Draft</small>
                           @else
                           <small>Release</small>
                           @endif --}}
                           <x-status-stisla.vdr :vdr="$myvdr" />
                        </td>
                        {{-- <td><a href="{{route('vdr.show.spa', [enkripRambo($myvdr->id), enkripRambo('index')])}}">Detail SPA</a> </td> --}}
                     </tr>
                     @endforeach
                     {{-- @if ($myvdr)
                        
                        
                        @else
                        <tr><td colspan="4" class="text-center py-3">Anda belum membuat VDR hari ini</td></tr>
                     @endif --}}
                     
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>


{{-- @if ($vessel->password_default == null)
<div class="card">
   <div class="card-body">
      <b> ⚠️ PENTING</b>
      <hr>
      <b>🔒 Keamanan Akun – Aksi Ubah Password Diperlukan</b> <br>
      Semua pengguna sistem diwajibkan <b>mengubah password</b> secepatnya demi perlindungan data dan akses sistem. <br>
      Mohon pastikan password baru memenuhi kebijakan keamanan yang berlaku. <br> <br>

      <a href="{{route('pass.reset')}}" class="btn btn-sm btn-primary">Ubah Password Disini</a>
   </div>
</div>
@endif --}}
      
      <div class="row">
         {{-- <h1>ok</h1> --}}
         <div class="col-md-7">
            
            
            {{-- <div class="alert bg-info">
               Announcement from PET
               <hr>
               Segera lakukan update nilai VDR pada tab <b>Operating Data</b> bagian <b>Contractual Fuel Consumption</b>, diisi ulang dengan nilai Decimal lengkap dengan angka dibelakang koma(.) jika ada.
               <br>
               Langkah ini hanya dilakukan sekali, abaikan pesan ini jika anda telah merubah nilai tersebut. Terimakasih.
            </div> --}}
            {{-- <div class="badge badge-info">DSP</div> --}}
            
            
           

            

            
            
            
            
            
            
            
            
         </div>
         <div class="col-md-5">
            
            
            


            
            
            
            
            
            


            
            {{-- <form action="{{route('vessel.stowage.update')}}" method="POST" enctype="multipart/form-data">
               @csrf
               @method('PUT')
               <input type="number" name="vessel" id="vessel" value="{{$vessel->id}}" hidden>
               <div class="form-group">
                  
                  <input type="file" class="form-control" id="stowage_plan" required name="stowage_plan" >
               </div>
               <button type="submit" class="btn btn-primary">Update Stowage Plan</button>
            </form>
            
            <hr>
            @if ($vessel->stowage_plan)
               <embed  style="width: 100%; height:500px;overflow:hidden" class="text-center" id="preview-pdf" src="{{asset('storage/' . $vessel->stowage_plan)}}" frameborder="0"></embed>
                @else
                <p>Stowage Plan Document Empty</p>
            @endif --}}
         </div>
      </div>
   <hr>
   <small>Please pay attention to the alert table on the right</small>


