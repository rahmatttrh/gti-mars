@extends('layouts.app-docb')

@section('title')
    MARS - Quick User Manual
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
        font-size: 22px;
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

        <div class="text-right">
            <div class="report-title">Quick User Manual</div>
            <div class="report-subtitle text-end">
                Generated on {{date('d M Y H:i')}}
            </div>
        </div>
    </div>

    <!-- Summary -->
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
                  <b>Safari</b>, lalu login menggunakan username dan password dibawah ini. 
                  
   Tersedia juga <b>Quick User Manual</b> yang dapat Anda ikuti pada halaman berikutnya untuk panduan penggunaan sistem.
               </div>
         </div>

      </div>

   </div>
    

    <!-- Vessel Table -->
    <!-- Vessel Table -->
    <table>
      <thead>
          <tr>
              <th width="5%">No</th>
              <th>Vessel Name</th>
              <th>Username</th>
              <th>Password</th>
              {{-- <th>Type</th> --}}
              <th>Contract</th>
              {{-- <th>Status</th> --}}
          </tr>
      </thead>

      <tbody>
         @foreach($vessels as $key => $vessel)
            <tr>
                <td class="text-center">{{ $key + 1 }}</td>
                <td>{{ $vessel->name }}</td>
                <td>{{ $vessel->username }}</td>
                <td>oses_2025</td>
                {{-- <td>{{ $vessel->type }}</td> --}}
                <td>
                    {{ $vessel->contract_type }}

                    @if($vessel->ipb == 'IPB')
                        - IPB
                    @endif

                    @if($vessel->func != null)
                        - {{ $vessel->func }}
                    @endif
                </td>
                {{-- <td>
                    @if($vessel->status == 1)
                        On Hire
                    @else
                        Off Hire
                    @endif
                </td> --}}
            </tr>
            @endforeach
          
      </tbody>
  </table>
    

      

  <hr>


  <div class="page-break"></div>
      <!-- Header -->
      <div class="text-center  mt-2 mb-4 pt-2">
         <h5 class="fw-bold mb-1">
            <i class="fas fa-book text-primary"></i>
            Quick User Manual
         </h5>
         <small class="text-muted">
            Panduan singkat penggunaan sistem VDR
         </small>
      </div>

      <!-- Step 1 -->
      <div class="border rounded p-3 mb-3">
         <div class="row align-items-center">
            
            <div class="col-6 text-center">
               <img src="{{asset('img/mb/1.png')}}"
                    class="img-fluid border rounded"
                    style="width:400px;">
            </div>

            <div class="col-6">
               <h6 class="fw-bold text-primary">
                  Step 1 - Login Sistem
               </h6>

               <ul class="small text-muted mb-0">
                    <li>Akses app.mars-phe.com</li>
                  <li>Masukkan username</li>
                  <li>Masukkan password</li>
                  <li>Klik tombol login</li>
               </ul>
            </div>

         </div>
      </div>

      <!-- Step 2 -->
      <div class="border rounded p-3 mb-3">
         <div class="row align-items-center">

            <div class="col-6 text-center">
               <img src="{{asset('img/mb/2V.png')}}"
                    class="img-fluid border rounded"
                    style="width:400px;">
            </div>

            <div class="col-6">
               <h6 class="fw-bold text-success">
                  Step 2 - Create VDR
               </h6>

               <ul class="small text-muted mb-0">
                  <li>Klik tombol "Buat VDR Baru"</li>
                  <li>Sistem akan otomatis menyalin data dari VDR pada tanggal sebelumnya untuk mempercepat proses pengisian. </li>
                  
               </ul>
            </div>

         </div>
      </div>

      <!-- Step 3 -->
      <div class="border rounded p-3 mb-3">
         <div class="row align-items-center">

            <div class="col-6 text-center">
               <img src="{{asset('img/mb/3.png')}}"
                    class="img-fluid border rounded"
                    style="width:400px;">
            </div>

            <div class="col-6">
               <h6 class="fw-bold text-warning">
                  Step 3 - Input Data & Release VDR
               </h6>

               <ul class="small text-muted mb-0">
                  <li>Isi data pada kolom berwarna kuning.</li>
                    <li>Ikuti petunjuk/informasi yang muncul saat proses pengisian data.</li>
                    <li>Klik tombol <b>Release</b> jika seluruh data sudah lengkap dan sesuai.</li>
               </ul>
            </div>

         </div>
      </div>




      <div class="border rounded p-3 mb-3">
         <div class="row align-items-center">

            <div class="col-6 text-center">
               <img src="{{asset('img/mb/4.png')}}"
                    class="img-fluid border rounded"
                    style="width:400px;">
            </div>

            <div class="col-6">
               <h6 class="fw-bold text-danger">
                    VDR REJECT <br>
                  Jika Ada Kesalahan Setelah Release VDR
               </h6>

               <ul class="small text-muted mb-0">
                 <li>Jika VDR direject, sistem akan menampilkan alert reject pada halaman utama.</li>
         <li>Alert akan menampilkan informasi kode VDR, nama approver yang melakukan reject, dan alasan reject.</li>
         <li>Klik tombol <b>"Revisi VDR"</b> untuk melakukan perbaikan data.</li>
         <li>Perbaiki data yang salah sesuai catatan reject.</li>
         <li>Klik tombol <b>Release</b> untuk mengirim ulang VDR setelah revisi selesai.</li>
               </ul>
            </div>

         </div>
      </div>


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

    <!-- Footer -->
    <div class="mt-4 text-muted" style="font-size:11px;">
        <i>
            This document is automatically generated by Marine Advanced Reporting System.
        </i>
    </div>

      

</div>

@endsection