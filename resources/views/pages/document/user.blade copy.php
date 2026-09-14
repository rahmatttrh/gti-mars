@extends('layouts.app-docb')

@section('title')
    User Master Data
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
</style>

<div class="container">

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
            <div class="report-title">User Account List</div>
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
               </div>
         </div>

      </div>

   </div>
    

    <!-- User Table -->
    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>User Name</th>
                <th>Username</th>
                <th>Password</th>
                {{-- <th>Type</th> --}}
                {{-- <th>Contract</th> --}}
                {{-- <th>Status</th> --}}
            </tr>
        </thead>

        <tbody>
            @foreach($users as $key => $user)
            <tr>
                <td class="text-center">{{ $key + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->username }}</td>
                <td>oses@2025</td>
                {{-- <td>{{ $vessel->type }}</td> --}}
                {{-- <td>
                    {{ $vessel->contract_type }}

                    @if($vessel->ipb == 'IPB')
                        - IPB
                    @endif

                    @if($vessel->func != null)
                        - {{ $vessel->func }}
                    @endif
                </td> --}}
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

    <br><br>
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
                        <i class="fas fa-phone-alt text-light me-1"></i>
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
            This document is automatically generated from Marine Advanced Reporting System.
        </i>
    </div>

</div>

@endsection