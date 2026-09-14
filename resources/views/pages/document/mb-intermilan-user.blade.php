@extends('layouts.app-docb')

@section('title')
    Manual Book Intermilan - User Guide
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
            <div class="report-title">MANUAL BOOK INTERMILAN <br> USER</div>
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

        <div class="d-flex align-items-center justify-content-between flex-wrap 
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
                            Pengenalan Awal Sistem
                        </h5>

                    </div>

                    <small class="text-muted">
                        Panduan login sistem serta pengenalan menu dan fitur utama pada halaman homepage.
                    </small>

                </div>

            </div>

            <div class="mt-2 mt-md-0">

                <span class="badge bg-light border text-primary px-3 py-2">
                    <i class="fas fa-info-circle me-1"></i>
                    Introduction
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
                        <h6 class="fw-bold text-primary mb-0">
                            Step 1 - Login Sistem
                        </h6>

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
                                Akses Website
                            </div>

                            <div class="text-muted">
                                Buka aplikasi melalui alamat:
                                <span class="text-primary">app.mars-phe.com</span>
                            </div>
                        </div>

                    </div>

                    <div class="d-flex align-items-start mb-2">

                        <div class="me-3">
                            <span class="badge badge-primary px-2 py-1">2</span>
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
                            <span class="badge badge-primary px-2 py-1">3</span>
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
                            <span class="badge badge-success px-2 py-1">4</span>
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
               <img src="{{asset('img/mb/intermilan/2.png')}}"
                    class="img-fluid border rounded"
                    style="width:400px;">
            </div>

            {{-- <div class="col-6">
               <h6 class="fw-bold text-success">
                  Step 2 - Pengenalan Homepage
               </h6>

               <ul class="small text-muted mb-0">
                  <li>Klik tombol "Buat VDR Baru"</li>
                  <li>Sistem akan otomatis menyalin data dari VDR pada tanggal sebelumnya untuk mempercepat proses pengisian. </li>
                  
               </ul>
            </div> --}}

            <div class="col-6">

                {{-- TITLE --}}
                <div class="d-flex align-items-center mb-2">

                    <div class="me-2 text-success">
                        <i class="fas fa-home fa-lg"></i>
                    </div>

                    <div>
                        <h6 class="fw-bold text-success mb-0">
                            Step 2 - Pengenalan Homepage
                        </h6>

                        <small class="text-muted">
                            Memahami fungsi panel pada halaman utama dashboard
                        </small>
                    </div>

                </div>

                
                    

                <div class="small">

                    <div class="d-flex align-items-start mb-2 ">

                        <div class="me-3">
                            <span class="badge badge-primary px-2 py-1">1</span>
                        </div>

                        <div>
                            <div class="font-weight-bold text-dark">
                                Welcome Card User
                            </div>

                            <div class="text-muted">
                                Menampilkan informasi user yang sedang login ke dalam sistem.
                            </div>
                        </div>

                    </div>

                    <div class="d-flex align-items-start mb-2 ">

                        <div class="me-3">
                            <span class="badge badge-info px-2 py-1">2</span>
                        </div>

                        <div>
                            <div class="font-weight-bold text-dark">
                                Intermilan Marine
                            </div>

                            <div class="text-muted">
                                Shortcut untuk mengakses informasi dan menu utama aplikasi.
                            </div>
                        </div>

                    </div>

                    <div class="d-flex align-items-start mb-2 ">

                        <div class="me-3">
                            <span class="badge badge-warning px-2 py-1">3</span>
                        </div>

                        <div>
                            <div class="font-weight-bold text-dark">
                                Log Activity
                            </div>

                            <div class="text-muted">
                                Menampilkan update progress dari Activity Plan yang telah dibuat.
                            </div>
                        </div>

                    </div>

                    <div class="d-flex align-items-start">

                        <div class="me-3">
                            <span class="badge badge-success px-2 py-1">4</span>
                        </div>

                        <div>
                            <div class="font-weight-bold text-dark">
                                Monthly Activity Plan
                            </div>

                            <div class="text-muted">
                                Digunakan untuk membuat dan mengelola rencana aktivitas bulanan user.
                            </div>
                        </div>

                    </div>

                </div>


                

            </div>

         </div>
      </div>

      <div class="d-flex align-items-center small text-muted border-top pt-2 mt-3">

    <div class="me-2 text-success">
        <i class="fas fa-arrow-circle-right"></i>
    </div>

    <div>
        Halaman berikutnya akan menjelaskan fitur dan penggunaan 
        <b class="text-success">Monthly Activity Plan</b>.
    </div>

</div>


      <div class="page-break"></div>

        <div class="d-flex align-items-center justify-content-between flex-wrap 
            px-3 py-2 mb-3 mt-3 border-bottom">

            <div class="d-flex align-items-center">

                <div class="me-3 text-success">
                    <i class="fas fa-calendar-check fa-lg"></i>
                </div>

                <div>

                    <div class="d-flex align-items-center mb-1">

                        <span class="badge bg-success me-2 px-2 py-1">
                            BAGIAN 2
                        </span>

                        <h5 class="fw-bold mb-0 text-dark">
                            Monthly Activity Plan
                        </h5>

                    </div>

                    <small class="text-muted">
                        Panduan pengelolaan rencana aktivitas bulanan, monitoring progress pekerjaan, dan update aktivitas user.
                    </small>

                </div>

            </div>

            <div class="mt-2 mt-md-0">

                <span class="badge bg-light border text-success px-3 py-2">
                    <i class="fas fa-tasks me-1"></i>
                    Activity Guide
                </span>

            </div>

        </div>

        <!-- Step 1 -->
        <div class="border rounded p-3 mb-3">
            <div class="row align-items-center">
                
                <div class="col-6 text-center">
                <img src="{{asset('img/mb/intermilan/4.png')}}"
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
                            <h6 class="fw-bold text-primary mb-0">
                                Step 1 - Membuat Activity Plan
                            </h6>

                            <small class="text-muted">
                                Proses membuat dan mengelola rencana aktivitas bulanan.
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
                                    Pilih Tanggal Activity Plan
                                </div>

                            <div class="text-muted">
                                    Klik pada tanggal yang diinginkan untuk membuat 
                                    <span class="text-primary">Activity Plan</span> pada tanggal tersebut.
                                </div>
                            </div>

                        </div>

                        <div class="d-flex align-items-start mb-2">

                            <div class="me-3">
                                <span class="badge badge-primary px-2 py-1">2</span>
                            </div>

                            <div>
                                <div class="font-weight-bold text-dark">
                                    Input Data Form Pengajuan Activity Plan
                                </div>

                                <div class="text-muted">
                                    Masukkan activity, origin, destination, required boat
                                </div>
                            </div>

                        </div>

                        <div class="d-flex align-items-start mb-2">

                            <div class="me-3">
                                <span class="badge badge-primary px-2 py-1">3</span>
                            </div>

                            <div>
                                <div class="font-weight-bold text-dark">
                                    Simpan Activity Plan
                                </div>

                                <div class="text-muted">
                                    Klik "+ Add" untuk menyimpan kedalam sistem
                                </div>
                            </div>

                        </div>

                        <div class="d-flex align-items-start">

                            

                            <div>
                                {{-- <div class="font-weight-bold text-dark">
                                    Login ke Sistem
                                </div> --}}

                                <div class="text-muted">
                                    Icon <b>bintang</b> pada tanggal menandakan bahwa sudah terdapat 
                                    <span class="text-primary">Activity Plan</span> pada tanggal tersebut.
                                </div>
                            </div>

                        </div>

                        </div>
                </div>

            </div>
        </div>


        <!-- Step 2 -->
        <div class="border rounded p-3 mb-3 shadow-sm bg-white">
            <div class="row align-items-center">

                <div class="col-6 text-center">
                    <img src="{{asset('img/mb/intermilan/3.png')}}"
                        class="img-fluid border rounded"
                        style="width:400px;">
                        <img src="{{asset('img/mb/intermilan/5.png')}}"
                        class="img-fluid border rounded"
                        style="width:400px;">
                </div>

                <div class="col-6">

                    <div class="d-flex align-items-center mb-3">

                        <div class="me-3 text-warning">
                            <i class="fas fa-edit"></i>
                        </div>

                        <div>
                            <h6 class="fw-bold text-warning mb-0">
                                Step 2 - Edit Activity Plan
                            </h6>

                            <small class="text-muted">
                                Proses memperbarui dan menyesuaikan data Activity Plan yang telah dibuat sebelumnya.
                            </small>
                        </div>

                    </div>

                    <div class="small">

                        <div class="d-flex align-items-start mb-3">

                            <div class="me-3">
                                <span class="badge badge-warning px-2 py-1">
                                    1
                                </span>
                            </div>

                            <div>
                                <div class="font-weight-bold text-dark">
                                    Pilih Activity Plan yang Akan Diedit
                                </div>

                                <div class="text-muted">
                                    Klik tanggal untuk menampilkan daftar
                                    <span class="text-warning">Activity Plan</span>.
                                </div>
                            </div>

                        </div>

                        <div class="d-flex align-items-start mb-3">

                            <div class="me-3">
                                <span class="badge badge-warning px-2 py-1">
                                    2
                                </span>
                            </div>

                            <div>
                                <div class="font-weight-bold text-dark">
                                    Edit Activity Plan
                                </div>

                                <div class="text-muted">
                                    Klik Tombol <b>Edit</b> pada kolom Option di table Activity Plan untuk mengubah data
                                </div>
                            </div>

                        </div>

                        <div class="d-flex align-items-start mb-3">

                            <div class="me-3">
                                <span class="badge badge-warning px-2 py-1">
                                    3
                                </span>
                            </div>

                            <div>
                                <div class="font-weight-bold text-dark">
                                    Ubah Informasi Activity Plan
                                </div>

                                <div class="text-muted">
                                    Perbarui data seperti 
                                    <b>activity</b>, 
                                    <b>origin</b>, 
                                    <b>destination</b>, 
                                    <b>required boat</b>, 
                                    maupun detail lainnya sesuai kebutuhan operasional.
                                </div>
                            </div>

                        </div>

                        <div class="d-flex align-items-start mb-3">

                            <div class="me-3">
                                <span class="badge badge-warning px-2 py-1">
                                    4
                                </span>
                            </div>

                            <div>
                                <div class="font-weight-bold text-dark">
                                    Simpan Perubahan
                                </div>

                                <div class="text-muted">
                                    Klik tombol 
                                    <span class="text-success fw-bold">Update</span> 
                                    atau 
                                    <span class="text-primary fw-bold">Save Changes</span> 
                                    untuk menyimpan perubahan data ke dalam sistem.
                                </div>
                            </div>

                        </div>

                        <div class="alert alert-light border small mb-0">

                            <i class="fas fa-info-circle text-primary mr-1"></i>

                            <span class="text-muted">
                                Pastikan seluruh perubahan data telah sesuai sebelum disimpan untuk menghindari kesalahan jadwal operasional.
                            </span>

                        </div>

                    </div>

                </div>

            </div>
        </div>

        <!-- Step 3 -->
        <div class="border rounded p-3 mb-3">
            <div class="row align-items-center">
                
                <div class="col-6 text-center">
                    <img src="{{asset('img/mb/intermilan/3.png')}}"
                        class="img-fluid border rounded"
                        style="width:400px;">
                        <img src="{{asset('img/mb/intermilan/6.png')}}"
                        class="img-fluid border rounded"
                        style="width:400px;">
                </div>

                <div class="col-6">

                    <div class="d-flex align-items-center mb-2">

                        <div class="me-2 text-danger">
                            <i class="fas fa-trash-alt fa-lg"></i>
                        </div>

                        <div>
                            <h6 class="fw-bold text-danger mb-0">
                                Step 1 - Menghapus Activity Plan
                            </h6>

                            <small class="text-muted">
                                Proses menghapus Activity Plan yang sudah tidak digunakan atau tidak valid.
                            </small>
                        </div>

                    </div>

                    <div class="small">

                        <div class="d-flex align-items-start mb-2">

                            <div class="me-3">
                                <span class="badge badge-danger px-2 py-1">1</span>
                            </div>

                            <div>
                                <div class="font-weight-bold text-dark">
                                    Pilih Tanggal Activity Plan
                                </div>

                            <div class="text-muted">
                                    Klik tanggal yang memiliki 
                                    <span class="text-danger">Activity Plan</span> untuk melihat detail aktivitas yang tersedia.
                                </div>
                            </div>

                        </div>

                        <div class="d-flex align-items-start mb-2">

                            <div class="me-3">
                                <span class="badge badge-danger px-2 py-1">2</span>
                            </div>

                            <div>
                                <div class="font-weight-bold text-dark">
                                    Pilih Data Activity Plan
                                </div>

                                <div class="text-muted">
                                    Cari dan pilih data activity plan yang ingin dihapus dari daftar aktivitas.
                                </div>
                            </div>

                        </div>

                        <div class="d-flex align-items-start mb-2">

                            <div class="me-3">
                                <span class="badge badge-danger px-2 py-1">3</span>
                            </div>

                            <div>
                                <div class="font-weight-bold text-dark">
                                    Hapus Activity Plan
                                </div>

                                <div class="text-muted">
                                    Klik tombol <b>Delete</b> atau icon <i class="fas fa-trash text-danger"></i> pada kolom Option di table Activity Plan untuk menghapus data dari sistem.
                                </div>
                            </div>

                        </div>


                        <div class="alert alert-light border small mb-0">

                            <i class="fas fa-info-circle text-danger mr-1"></i>

                            <span class="text-muted">
                                Pastikan data yang dihapus sudah benar, karena 
                                    <span class="text-danger">Activity Plan</span> yang dihapus tidak dapat digunakan kembali.
                            </span>

                        </div>
                    </div>
                </div>

            </div>
        </div>


         <!-- Step 3 -->
        <div class="border rounded p-3 mb-3">
            <div class="row align-items-center">
                
                <div class="col-6 text-center">
                    <img src="{{asset('img/mb/intermilan/3.png')}}"
                        class="img-fluid border rounded"
                        style="width:400px;">
                        <img src="{{asset('img/mb/intermilan/7.png')}}"
                        class="img-fluid border rounded"
                        style="width:400px;">
                </div>

                <div class="col-6">

                    <div class="d-flex align-items-center mb-2">

                        <div class="me-2 text-primary">
                            <i class="fas fa-paper-plane fa-lg"></i>
                        </div>

                        <div>
                            <h6 class="fw-bold text-primary mb-0">
                                Step Final - Submit Activity Plan
                            </h6>

                            <small class="text-muted">
                                Proses mengirim Activity Plan ke pihak Marine/Fleet.
                            </small>
                        </div>

                    </div>

                    <div class="small">

                        <div class="d-flex align-items-start mb-2">

                            <div class="me-3">
                                <span class="badge badge-danger px-2 py-1">1</span>
                            </div>

                            <div>
                                <div class="font-weight-bold text-dark">
                                    Pilih Tanggal Activity Plan
                                </div>

                            <div class="text-muted">
                                    Klik tanggal yang memiliki 
                                    <span class="text-danger">Activity Plan</span> untuk melihat detail aktivitas yang tersedia.
                                </div>
                            </div>

                        </div>

                        <div class="d-flex align-items-start mb-2">

                            <div class="me-3">
                                <span class="badge badge-danger px-2 py-1">2</span>
                            </div>

                            <div>
                                <div class="font-weight-bold text-dark">
                                    Submit Activity Plan
                                </div>

                                <div class="text-muted">
                                    Klik tombol <b>Submit</b> pada kolom Option di table Activity Plan, data akan otomatis dikirim ke pihak Marine/Fleet.
                                </div>
                            </div>

                        </div>

                        <div class="d-flex align-items-start mb-2">

                            <div class="me-3">
                                <span class="badge badge-danger px-2 py-1">3</span>
                            </div>

                            <div>
                                <div class="font-weight-bold text-dark">
                                    Cancel Submit Activity Plan
                                </div>

                                <div class="text-muted">
                                    Klik tombol <b>Cancel</b> pada kolom Option di tabel Activity Plan untuk membatalkan proses pengajuan activity plan yang sudah dikirim.
                                </div>
                            </div>

                        </div>


                        <div class="alert alert-light border small mb-0">

                            <i class="fas fa-info-circle text-info mr-1"></i>

                            <span class="text-muted">
                                Data yang sudah disubmit akan diteruskan ke pihak Marine/Fleet untuk diproses lebih lanjut. Pastikan seluruh data sudah benar sebelum melakukan submit.
                            </span>

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