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
        font-size: 10px;
        text-align: center;
    }

    table td {
        border: 1px solid #ddd;
        padding: 8px;
        font-size: 10px;
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
                {{-- Generated on {{date('d M Y H:i')}} --}}
                Non PO & Patrol Boat Approver
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
                  <b>Safari</b>.
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
            </tr>
        </thead>

        <tbody>
             <tr>
                <td class="text-center">1</td>
                <td>Fuel Management</td>
                <td>fm</td>
                <td>oses@2025</td>
            </tr>
            @foreach($users as $key => $user)
            <tr>
                <td class="text-center">{{ $key + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->username }}</td>
                <td>oses@2025</td>
               
            </tr>
            @endforeach
           

            <tr>
                <th colspan="4" class="">Patrol Boat Approver</th>
            </tr>
            <tr>
                <td class="text-center">1</td>
                <td>Lead Command</td>
                <td>leadcommand</td>
                <td>oses@2025</td>
            </tr>
             <tr>
                <td class="text-center">2</td>
                <td>Suptent Security</td>
                <td>suptent_security</td>
                <td>oses@2025</td>
            </tr>
        </tbody>
    </table>

   <table class="table table-sm table-bordered small mb-0 mt-2">

   <thead style="background-color:#f8f9fa;">

      <tr>

         <th width="160" class="text-center align-middle">
            <i class="fas fa-layer-group text-primary mr-1"></i>
            Kontrak
         </th>

         <th class="text-center align-middle">
            Alur Approval VDR
         </th>

      </tr>

   </thead>

   <tbody>

      {{-- NON PO --}}
      <tr>

         <td class="align-middle text-center fw-bold">
            Non PO
         </td>

         <td class="align-middle">

            <div class="d-flex align-items-center flex-wrap text-muted">

               <span>FM</span>

               <i class="fas fa-angle-right mx-2 small"></i>

               <span>PET</span>

               <i class="fas fa-angle-right mx-2 small"></i>

               <span>Coman</span>

               <i class="fas fa-angle-right mx-2 small"></i>

               <span>Marine</span>

               <i class="fas fa-angle-right mx-2 small"></i>

               <span>Marine Rep</span>

               <i class="fas fa-angle-right text-success mx-2 small"></i>

               <span class="text-success fw-bold">
                  Complete
               </span>

            </div>

         </td>

      </tr>

      {{-- PATROL BOAT --}}
      <tr>

         <td class="align-middle text-center fw-bold">
            Patrol Boat
         </td>

         <td class="align-middle">

            <div class="d-flex align-items-center flex-wrap text-muted">

               <span>FM</span>

               <i class="fas fa-angle-right mx-2 small"></i>

               <span>PET</span>

               <i class="fas fa-angle-right mx-2 small"></i>

               <span>Lead Command</span>

               <i class="fas fa-angle-right mx-2 small"></i>

               <span>Suptent Security</span>

               <i class="fas fa-angle-right text-success mx-2 small"></i>

               <span class="text-success fw-bold">
                  Complete
               </span>

            </div>

         </td>

      </tr>

   </tbody>

</table>

    
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



      <div class="page-break"></div>
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

    <!-- Footer -->
    <div class="mt-4 text-muted" style="font-size:11px;">
        <i>
            This document is automatically generated by Marine Advanced Reporting System.
        </i>
    </div>

</div>

@endsection