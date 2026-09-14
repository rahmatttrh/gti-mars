@extends('layouts.app-docb')

@section('title')
    Quick User Guide - Company Man
@endsection

@section('content')

<style>
    html {
        -webkit-print-color-adjust: exact;
    }

    body {
        font-family: Arial, sans-serif;
        font-size: 12px;
        color: #333;
    }

    .header-box {
        border-bottom: 2px solid #000;
        padding-bottom: 15px;
        margin-bottom: 20px;
    }

    .company-logo {
        width: 220px;
    }

    .report-title {
        font-size: 14px;
        font-weight: bold;
    }

    .report-subtitle {
        font-size: 12px;
        color: #666;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th {
        background: #f4f6f9;
        border: 1px solid #ddd;
        padding: 10px;
        font-size: 11px;
        text-align: center;
    }

    table td {
        border: 1px solid #ddd;
        padding: 8px;
        font-size: 11px;
    }

    .summary-box {
        background: #f8f9fa;
        padding: 10px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .print-btn {
        margin-bottom: 20px;
    }

    @media print {
        .no-print {
            display: none;
        }
    }

    .page-break {
        page-break-before: always;
        /* alternatif:
        page-break-after: always;
        break-before: page;
        */
    }
</style>

<div class="px-2">

    <!-- Print Button -->
    <div class="text-right no-print print-btn">
        <button onclick="window.print()" class="btn btn-primary">
            <i class="fas fa-print"></i> Print / Save PDF
        </button>
    </div>

    <!-- Header -->
    <div class="header-box d-flex justify-content-between align-items-center">
        <div>
            <img src="{{asset('img/flaticon/mars-logo.png')}}" style="width: 100px" class="company-logo">
        </div>

        <div class="text-end">
            <div class="report-title">QUICK USER GUIDE <br> COMPANY MAN</div>
            {{-- <div class="report-subtitle text-end">
                Generated on {{date('d M Y H:i')}}
            </div> --}}
        </div>
    </div>

   
    

   <div class="alert alert-light border shadow-none mb-3">

      <div class="d-flex align-items-start">
         
         <div class="me-3">
               <i class="fas fa-globe text-primary fa-2x"></i>
         </div>

         <div class="w-100">
               <h5 class="mb-1">
                  System Access Information
               </h5>

               <small class="text-muted d-block mb-2">
                  Gunakan informasi berikut untuk mengakses sistem melalui web browser.
               </small>

               <div class="bg-white p-2  border-start mb-2">
                  <strong>System URL:</strong><br>
                  <a href="https://app.mars-phe.com" target="_blank">
                     app.mars-phe.com
                  </a>
               </div>

               <div class="small text-muted">
                  <i class="fas fa-info-circle text-warning mr-1"></i>
                  Buka melalui browser seperti 
                  <b>Google Chrome</b>, 
                  <b>Microsoft Edge</b>, atau 
                  <b>Safari</b>.
               </div>
         </div>

      </div>

   </div>


    
      {{-- <div class=" mb-4">
         <h5 class="fw-bold mb-1">
            <i class="fas fa-book text-primary"></i>
            Quick User Manual
         </h5>
         <small class="text-muted">
            Panduan singkat penggunaan Intermilan pada System
         </small>
      </div> --}}

    <div class="card border">

        <div class="card-body">

            <div class="text-center mb-2 mt-2">

                <div class="mx-auto mb-3 account-avatar">
                    <i class="fas fa-user-shield"></i>
                </div>

                <h5 class="font-weight-bold mb-1">
                    Company Man Shared Account
                </h5>

                <small class="text-muted">
                    Login Credential Information
                </small>

            </div>

            <div class="list-group list-group-flush">

                <div class="list-group-item ">

                    <small class="text-muted">
                    Role
                    </small>

                    <div class="font-weight-bold">
                    Company Man
                    </div>

                </div>

                <div class="list-group-item ">

                    <small class="text-muted">
                    Username
                    </small>

                    <div class="font-weight-bold">
                    coman
                    </div>

                </div>

                <div class="list-group-item ">

                    <small class="text-muted">
                    Password
                    </small>

                    <div class="font-weight-bold text-danger">
                    oses@2025
                    </div>

                </div>

            </div>

            <div class="bg-light rounded p-3 mt-3">

                <small>
                    <i class="fas fa-shield-alt text-success mr-1"></i>
                    Akun ini digunakan untuk proses approval dan monitoring VDR.
                </small>

            </div>

        </div>

    </div>

    <div class="alert alert-info border shadow-none mb-3 mt-2">
         <div class="d-flex align-items-start">
            
            <div class="me-3" >
                  <i class="fas fa-lock text-primary fa-lg"></i>
            </div>

            <div>
                  <h6 class="mb-1 text-dark">
                     Security Reminder
                  </h6>

                  <small class="text-muted">
                     Password pada dokumen ini hanya digunakan dalam masa Trial. Untuk tahap selanjutnya
                     , User dapat mengganti password sesuai kriteria yang ditentukan.
                  </small>
            </div>

         </div>
      </div>


    {{-- <div class="alert alert-light border mb-3">

        <div class="d-flex align-items-center">

            <i class="fas fa-book-open text-primary me-3"></i>

            <div>

                <strong>User Guide</strong>

                <div class="small text-muted">
                    Halaman berikutnya berisi panduan penggunaan sistem, alur kerja VDR, serta langkah-langkah untuk membuat, mengelola, dan melakukan approval VDR.
                </div>

            </div>

        </div>

    </div> --}}
    <hr>
    <div class="alert alert-info border-left border-info mb-3">

        <div class="d-flex align-items-start">

            <i class="fas fa-info-circle fa-lg me-3 mt-1"></i>

            <div>

                {{-- <strong>Important Notice</strong> --}}

                <div class="">

                    Halaman berikutnya berisi <b>panduan penggunaan sistem</b>,
                    termasuk proses Login dan cara approve VDR pada sistem.

                </div>

            </div>

        </div>

    </div>
    <div class="page-break"></div>
    

        <div class="d-flex mt-2 align-items-center justify-content-between flex-wrap 
            px-3 py-2 mb-3 border-bottom">

            <div class="d-flex align-items-center">

                <div class="me-3 text-primary">
                    <i class="fas fa-book-reader fa-lg"></i>
                </div>

                <div>

                    <div class="d-flex align-items-center mb-1">

                        <span class="badge bg-primary me-2 px-2 py-1">
                            BAGIAN 1
                        </span>

                        <h5 class="fw-bold mb-0 text-dark">
                            Quick User Guide
                        </h5>

                    </div>

                    <small class="text-muted">
                        Panduan login sistem serta cara approve VDR pada sistem.
                    </small>

                </div>

            </div>

            <div class="mt-2 mt-md-0">

                <span class="badge bg-light border text-primary px-3 py-2">
                    <i class="fas fa-info-circle me-1"></i>
                    Guide
                </span>

            </div>

        </div>

      <!-- Step 1 -->
      <div class="border rounded p-3 mb-3">
         <div class="row align-items-center">
            
            <div class="col-6 text-center">
               <img src="{{asset('img/mb/intermilan/1.png')}}"
                    class="img-fluid border rounded"
                    style="width:400px;">
            </div>

            <div class="col-6">
               {{-- <h6 class="fw-bold text-primary">
                  Step 1 - Login Sistem
               </h6> --}}
                <div class="d-flex align-items-center mb-2">

                    <div class="me-2 text-primary">
                        <i class="fas fa-sign-in-alt fa-lg"></i>
                    </div>

                    <div>
                        

                        <small class="text-muted">
                            Proses masuk ke aplikasi menggunakan akun yang telah terdaftar
                        </small>
                    </div>

                </div>

               <div class="small">

                    

                    <div class="d-flex align-items-start mb-2">

                        <div class="me-3">
                            <span class="badge badge-primary px-2 py-1">1</span>
                        </div>

                        <div>
                            <div class="font-weight-bold text-dark">
                                Input Username
                            </div>

                            <div class="text-muted">
                                Masukkan username yang telah diberikan administrator.
                            </div>
                        </div>

                    </div>

                    <div class="d-flex align-items-start mb-2">

                        <div class="me-3">
                            <span class="badge badge-primary px-2 py-1">2</span>
                        </div>

                        <div>
                            <div class="font-weight-bold text-dark">
                                Input Password
                            </div>

                            <div class="text-muted">
                                Masukkan password akun dengan benar dan sesuai.
                            </div>
                        </div>

                    </div>

                    <div class="d-flex align-items-start">

                        <div class="me-3">
                            <span class="badge badge-success px-2 py-1">3</span>
                        </div>

                        <div>
                            <div class="font-weight-bold text-dark">
                                Login ke Sistem
                            </div>

                            <div class="text-muted">
                                Klik tombol <b>Login</b> untuk masuk ke dashboard aplikasi.
                            </div>
                        </div>

                    </div>

                </div>
            </div>

         </div>
      </div>

      <!-- Step 2 -->
      <div class="border rounded p-3 mb-3">
         <div class="row align-items-center">

            <div class="col-6 text-center">
               <img src="{{asset('img/mb/coman/1.png')}}"
                    class="img-fluid border rounded"
                    style="width:400px;">
            </div>

            <div class="col-6">

                {{-- TITLE --}}
                <div class="d-flex align-items-center mb-2">

                    <div class="me-2 text-primary">
                        <i class="fas fa-sign-in-alt fa-lg"></i>
                    </div>

                    <div>
                        {{-- <h6 class="fw-bold text-success mb-0">
                            Step 2 - Memilih VDR
                        </h6> --}}

                        <small class="text-muted">
                            Homepage manampilkan daftar VDR yang menunggu persetujuan Company Man
                        </small>
                    </div>

                </div>

                
                    

                <div class="small">

                    <div class="d-flex align-items-start mb-3 ">

                        <div class="me-3">
                            <span class="badge badge-primary px-2 py-1">4</span>
                        </div>

                        <div>
                            <div class="font-weight-bold text-dark">
                               Klik VDR Number
                            </div>

                            <div class="text-muted">
                                Melihat detail VDR yang menunggu approval pada halaman homepage.
                            </div>
                        </div>

                    </div>

                    

                </div>


                

            </div>

         </div>
      </div>


      <!-- Step 3 -->
      <div class="border rounded p-3 mb-3">
         <div class="row align-items-center">

            <div class="col-6 text-center">
               <img src="{{asset('img/mb/coman/2.png')}}"
                    class="img-fluid border rounded"
                    style="width:400px;">
            </div>

            <div class="col-6">

                {{-- TITLE --}}
                <div class="d-flex align-items-center mb-3">

                    <div class="me-2 text-primary">
                        <i class="fas fa-sign-in-alt fa-lg"></i>
                    </div>

                    <div>
                        

                        <small class="text-muted">
                            Melakukan  review dan validasi data VDR sebelum memberikan persetujuan.
                        </small>
                    </div>

                </div>

                
                    

                <div class="small">

                    <div class="d-flex align-items-start mb-2 ">

                        <div class="me-3">
                            <span class="badge badge-primary px-2 py-1">5</span>
                        </div>

                        <div>
                            <div class="font-weight-bold text-dark">
                               Klik Approve VDR
                            </div>

                            <div class="text-muted">
                                Validasi VDR setelah melakukan review data
                            </div>
                        </div>

                    </div>

                    

                </div>


                

            </div>

         </div>
      </div>

      <!-- Step 4 -->
      <div class="border rounded p-3 mb-3">
         <div class="row align-items-center">

            <div class="col-6 text-center">
               <img src="{{asset('img/mb/coman/3.png')}}"
                    class="img-fluid border rounded"
                    style="width:400px;">
            </div>

            <div class="col-6">

                {{-- TITLE --}}
                <div class="d-flex align-items-center mb-3">

                    <div class="me-2 text-primary">
                        <i class="fas fa-sign-in-alt fa-lg"></i>
                    </div>

                    <div>
                        

                        <small class="text-muted">
                            Sistem menampilkan pop-up konfirmasi approve dan pemilihan PIC Coman
                        </small>
                    </div>

                </div>

                
                    

                <div class="small">

                    <div class="d-flex align-items-start mb-2">

                        <div class="me-3">
                            <span class="badge badge-primary px-2 py-1">6</span>
                        </div>

                        <div>
                            <div class="font-weight-bold text-dark">
                                Pilih PIC Coman
                            </div>

                            <div class="text-muted">
                                Tentukan nama Company Man yang bertanggung jawab untuk proses approval VDR.
                            </div>
                        </div>

                    </div>

                    <div class="d-flex align-items-start mb-2">

                        <div class="me-3">
                            <span class="badge badge-primary px-2 py-1">7</span>
                        </div>

                        <div>
                            <div class="font-weight-bold text-dark">
                                Klik Approve
                            </div>

                            <div class="text-muted">
                                Kirim VDR ke tahap validasi berikutnya setelah seluruh data dipastikan benar.
                            </div>
                        </div>

                    </div>

                    <div class="d-flex align-items-start mb-2">

                        <div class="me-3">
                            <span class="badge badge-primary px-2 py-1">8</span>
                        </div>

                        <div>
                            <div class="font-weight-bold text-dark">
                                Alert Approval Berhasil
                            </div>

                            <div class="text-muted">
                                Sistem akan menampilkan alert berhasil dan mengarahkan Anda kembali ke halaman Homepage.
                            </div>
                        </div>

                    </div>

                </div>


                

            </div>

         </div>
      </div>

      <div class="page-break"></div>
      <!-- Step 5 -->
      <div class="border rounded mt-2 p-3 mb-3">
         <div class="row align-items-center">

            <div class="col-6 text-center">
               <img src="{{asset('img/mb/coman/4.png')}}"
                    class="img-fluid border rounded"
                    style="width:400px;">
            </div>

            <div class="col-6">

                {{-- TITLE --}}
                <div class="d-flex align-items-center mb-3">

                    <div class="me-2 text-primary">
                        <i class="fas fa-sign-in-alt fa-lg"></i>
                    </div>

                    <div>
                        

                        <small class="text-muted">
                            Menu filter data pada Homepage
                        </small>
                    </div>

                </div>

                
                    

                <div class="small">

                    <div class="d-flex align-items-start mb-2 ">

                        <div class="me-3">
                            <span class="badge badge-primary px-2 py-1">9</span>
                        </div>

                        <div>
                            <div class="font-weight-bold text-dark">
                                Pilih Kartu Informasi
                            </div>

                            <div class="text-muted">
                                Klik kartu Waiting, Rejected, atau History untuk menampilkan daftar VDR sesuai status yang ingin Anda lihat.
                            </div>
                        </div>

                    </div>

                    

                </div>


                

            </div>

         </div>
      </div>

      


     

        <br><br>
      <div class="alert alert-light border shadow-none mb-3">

         <div class="d-flex align-items-start">
            
            <!-- Icon -->
            <div class="me-3">
                  <i class="fas fa-headset text-primary fa-lg"></i>
            </div>

            <!-- Content -->
            <div class="w-100">
                  <h6 class="mb-1">
                     Need Help?
                  </h6>

                  <small class="text-muted d-block mb-2">
                     Jika mengalami kendala saat menggunakan sistem, silakan hubungi contact person berikut:
                  </small>

                  <div class="d-flex flex-wrap gap-2">

                     <span class="badge badge-light border p-2 me-2">
                        <i class="fas fa-phone-alt text-success me-1"></i>
                        IT Support : <b>0822-1112-0482</b>
                     </span>

                     {{-- <span class="badge badge-light border p-2">
                        <i class="fas fa-phone-alt text-primary mr-1"></i>
                        System Admin: <b>0813-9876-5432</b>
                     </span> --}}

                  </div>
                  <br>
                  
                  <div class="border-top py-2">
                     <small class="text-dark d-block mb-2">
                        <i class="fas fa-envelope text-danger me-1"></i>
                        <strong>Alternative via Email</strong>
                     </small>

                     <small class="text-muted d-block">
                        Email: <b>develop@ekanuri.com</b>
                     </small>

                     <small class="text-muted d-block mt-2">
                        <b>Subject:</b> Kendala Sistem - [Nama Fitur/Menu]
                     </small>

                     <small class="text-muted d-block">
                        <b>Email Content:</b> Jelaskan kendala yang dialami secara detail agar tim dapat membantu lebih cepat.
                     </small>

                     <small class="text-muted d-block">
                        <b>Attachment (Optional):</b> Sertakan screenshot kendala/error jika diperlukan.
                     </small>
                  </div>
            </div>

         </div>

      </div>

      

      

</div>

@endsection