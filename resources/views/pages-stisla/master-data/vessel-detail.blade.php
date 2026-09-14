@extends('layouts.stisla.app-main')
@section('title')
   Vessel Detail
@endsection

@section('content')

<style>
   input, select {
  border: none; /* Sets border width, style, and color */
}
</style>

<style>

   /* =====================================================
      VESSEL CARD
   ====================================================== */

   .vessel-card {
      background: #fff;
      border: 1px solid #e9ecef;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 16px rgba(0,0,0,.05);
   }


   /* =====================================================
      HEADER
   ====================================================== */

   .vessel-header {
      padding: 18px;
      background: linear-gradient(135deg, #f8faff, #ffffff);
      border-bottom: 1px solid #edf0f4;
   }

   .vessel-icon {
      width: 46px;
      height: 46px;
      border-radius: 10px;
      background: #eef4ff;
      color: #4e73df;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 19px;
   }

   .vessel-label {
      font-size: 9px;
      font-weight: 700;
      color: #9aa3af;
      letter-spacing: .7px;
      margin-bottom: 2px;
   }

   .vessel-name {
      font-size: 18px;
      font-weight: 700;
      color: #252a34;
   }

   .username {
      font-size: 11px;
      font-weight: 600;
      color: #495057;
   }


   /* =====================================================
      BADGES
   ====================================================== */

   .badge-type {
      background: #f0f3f7;
      color: #5f6875;
      font-size: 9px;
      font-weight: 600;
      padding: 4px 7px;
      border-radius: 5px;
   }

   .badge-status {
      font-size: 9px;
      font-weight: 600;
      padding: 4px 7px;
      border-radius: 5px;
      margin-left: 3px;
   }

   .status-dot {
      display: inline-block;
      width: 5px;
      height: 5px;
      border-radius: 50%;
      margin-right: 3px;
      background: currentColor;
      vertical-align: middle;
   }

   .status-on {
      background: #eaf8ef;
      color: #28a745;
   }

   .status-off {
      background: #fceeee;
      color: #dc3545;
   }

   .status-maintenance {
      background: #fff5df;
      color: #d89400;
   }


   /* =====================================================
      BODY
   ====================================================== */

   .vessel-body {
      padding: 18px;
   }

   .section-title {
      display: flex;
      align-items: center;
      margin-bottom: 17px;
   }

   .section-icon {
      width: 32px;
      height: 32px;
      border-radius: 7px;
      background: #f1f4f8;
      color: #667085;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 13px;
      margin-right: 9px;
   }

   .section-heading {
      font-size: 12px;
      font-weight: 700;
      color: #343a40;
   }

   .section-subtitle {
      font-size: 9px;
      color: #9aa0a6;
      margin-top: 1px;
   }


   /* =====================================================
      FORM
   ====================================================== */

   .form-label-modern {
      display: block;
      font-size: 10px;
      font-weight: 700;
      color: #626b78;
      margin-bottom: 5px;
   }

   .form-label-modern i {
      width: 14px;
      color: #9aa3af;
      margin-right: 2px;
   }

   .input-modern {
      position: relative;
      display: flex;
      align-items: center;
      height: 36px;
      border: 1px solid #e1e5ea;
      border-radius: 7px;
      background: #fff;
      transition: all .2s ease;
   }

   .input-modern:focus-within {
      border-color: #80a4ff;
      box-shadow: 0 0 0 3px rgba(78,115,223,.08);
   }

   .input-modern > i:first-child {
      width: 34px;
      text-align: center;
      color: #adb5bd;
      font-size: 11px;
   }

   .input-modern input,
   .input-modern select {
      flex: 1;
      width: 100%;
      height: 34px;
      border: 0;
      outline: none;
      background: transparent;
      color: #343a40;
      font-size: 11px;
      padding: 0 7px 0 0;
   }

   .input-modern select {
      appearance: none;
      -webkit-appearance: none;
      padding-right: 25px;
      cursor: pointer;
   }

   .input-modern input::placeholder {
      color: #b8bec6;
   }

   .input-disabled {
      background: #f7f8fa;
   }

   .input-disabled input {
      color: #8b939e;
      cursor: not-allowed;
   }

   .select-arrow {
      position: absolute;
      right: 10px;
      width: auto !important;
      color: #adb5bd !important;
      font-size: 9px !important;
      pointer-events: none;
   }


   /* =====================================================
      ACTION
   ====================================================== */

   .form-actions {
      display: flex;
      align-items: center;
      border-top: 1px solid #edf0f3;
      margin-top: 4px;
      padding-top: 15px;
   }

   .btn-update {
      border: 0;
      border-radius: 7px;
      background: #4e73df;
      color: #fff;
      font-size: 10px;
      font-weight: 600;
      padding: 8px 13px;
      box-shadow: 0 3px 7px rgba(78,115,223,.18);
      transition: all .2s ease;
   }

   .btn-update:hover {
      background: #3f63c5;
      color: #fff;
      transform: translateY(-1px);
   }

   .btn-reset {
      display: inline-flex;
      align-items: center;
      margin-left: 13px;
      padding: 7px 8px;
      color: #dc3545;
      font-size: 10px;
      font-weight: 600;
      border-radius: 6px;
      transition: all .2s ease;
   }

   .btn-reset i {
      margin-right: 5px;
   }

   .btn-reset:hover {
      background: #fff2f2;
      color: #c82333;
      text-decoration: none;
   }


   /* =====================================================
      RESPONSIVE
   ====================================================== */

   @media(max-width: 768px) {

      .vessel-header {
         padding: 15px;
      }

      .vessel-body {
         padding: 15px;
      }

      .vessel-header .text-right {
         display: none;
      }

   }

</style>
<section class="section">
    {{-- <div class="section-header">
      <h1 class="section-title">Detail Vessel</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item "><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item active">Detail Vessel</div>
      </div>
    </div> --}}

   <div class="section-body">
      
     
      <div class="row">
         <div class="col-md-4">
            
            <div class="vessel-card mb-3">

               {{-- =====================================================
                  HEADER / VESSEL SUMMARY
               ====================================================== --}}
               <div class="vessel-header">

                  <div class="d-flex justify-content-between align-items-start">

                     <div class="d-flex align-items-center">
                        <div class="vessel-icon mr-3">
                           <i class="fas fa-ship"></i>
                        </div>

                        <div>
                           <div class="vessel-label">VESSEL</div>
                           <h4 class="vessel-name mb-1">
                              {{$vessel->name}}
                           </h4>

                           <div>
                              <span class="badge badge-type">
                                 <i class="fas fa-anchor mr-1"></i>
                                 {{$vessel->type}}
                              </span>

                              @if($vessel->status == 1)
                                 <span class="badge badge-status status-on">
                                    <span class="status-dot"></span>
                                    On Hire
                                 </span>
                              @elseif($vessel->status == 0)
                                 <span class="badge badge-status status-off">
                                    <span class="status-dot"></span>
                                    Off Hire
                                 </span>
                              @else
                                 <span class="badge badge-status status-maintenance">
                                    <span class="status-dot"></span>
                                    Maintenance
                                 </span>
                              @endif
                           </div>
                        </div>
                     </div>

                     <div class="text-right">
                        <div class="vessel-label">ACCOUNT</div>
                        <div class="username">
                           <i class="fas fa-user-circle mr-1"></i>
                           {{$vessel->username}}
                        </div>
                     </div>

                  </div>

               </div>


               {{-- =====================================================
                  FORM
               ====================================================== --}}
               <div class="vessel-body">

                  {{-- <div class="section-title">
                     <div class="section-icon">
                        <i class="fas fa-sliders-h"></i>
                     </div>

                     <div>
                        <div class="section-heading">Vessel Configuration</div>
                        <div class="section-subtitle">
                           Manage vessel information and operational settings
                        </div>
                     </div>
                  </div> --}}


                  <form action="{{route('vessel.update')}}" method="POST">
                     @csrf
                     @method('PUT')

                     <input type="hidden" name="vessel" value="{{$vessel->id}}">

                     <div class="row">

                        {{-- Vessel Name --}}
                        <div class="col-md-12 mb-3">
                           <label class="form-label-modern">
                              <i class="fas fa-ship"></i>
                              Vessel Name
                           </label>

                           <div class="input-modern">
                              <i class="fas fa-ship"></i>
                              <input
                                 type="text"
                                 id="name"
                                 name="name"
                                 value="{{$vessel->name}}"
                                 placeholder="Enter vessel name">
                           </div>
                        </div>


                        {{-- Vessel Type --}}
                        <div class="col-md-6 mb-3">
                           <label class="form-label-modern">
                              <i class="fas fa-layer-group"></i>
                              Vessel Type
                           </label>

                           <div class="input-modern">
                              <i class="fas fa-layer-group"></i>

                              <select id="type" name="type" required>
                                 <option value="">Select Type</option>
                                 <option {{$vessel->type == 'Crew Boat' ? 'selected' : ''}} value="Crew Boat">
                                    Crew Boat
                                 </option>
                                 <option {{$vessel->type == 'AHTS' ? 'selected' : ''}} value="AHTS">
                                    AHTS
                                 </option>
                                 <option {{$vessel->type == 'Supply' ? 'selected' : ''}} value="Supply">
                                    Supply
                                 </option>
                                 <option {{$vessel->type == 'Tug Boat' ? 'selected' : ''}} value="Tug Boat">Tug Boat</option>
                                 <option {{$vessel->type == 'Oil Barge' ? 'selected' : ''}} value="Oil Barge">Oil Barge</option>
                                 <option {{$vessel->type == 'Self Propelled Oil Barge' ? 'selected' : ''}} value="Self Propelled Oil Barge">Self Propelled Oil Barge</option>
                              </select>

                              <i class="fas fa-chevron-down select-arrow"></i>
                           </div>
                        </div>


                        {{-- Username --}}
                        <div class="col-md-6 mb-3">
                           <label class="form-label-modern">
                              <i class="fas fa-user"></i>
                              Username
                           </label>

                           <div class="input-modern input-disabled">
                              <i class="fas fa-lock"></i>

                              <input
                                 readonly
                                 type="text"
                                 id="username"
                                 name="username"
                                 value="{{$vessel->username}}"
                                 required>
                           </div>
                        </div>


                        {{-- Status --}}
                        <div class="col-md-6 mb-3">
                           <label class="form-label-modern">
                              <i class="fas fa-circle-notch"></i>
                              Operational Status
                           </label>

                           <div class="input-modern">
                              <i class="fas fa-toggle-on"></i>

                              <select id="status" name="status" required>
                                 <option value="">Select Status</option>
                                 <option {{$vessel->status == 0 ? 'selected' : ''}} value="0">
                                    Off Hire
                                 </option>
                                 <option {{$vessel->status == 1 ? 'selected' : ''}} value="1">
                                    On Hire
                                 </option>
                                 <option {{$vessel->status == 2 ? 'selected' : ''}} value="2">
                                    Maintenance
                                 </option>
                              </select>

                              <i class="fas fa-chevron-down select-arrow"></i>
                           </div>
                        </div>


                        {{-- Contract --}}
                        <div class="col-md-6 mb-3">
                           <label class="form-label-modern">
                              <i class="fas fa-file-contract"></i>
                              Contract Type
                           </label>

                           <div class="input-modern">
                              <i class="fas fa-file-signature"></i>

                              <select id="contract_type" name="contract_type" required>
                                 <option value="">Select Contract</option>
                                 <option {{$vessel->contract_type == 'Under PO' ? 'selected' : ''}} value="Under PO">
                                    Under PO
                                 </option>
                                 <option {{$vessel->contract_type == 'Non PO' ? 'selected' : ''}} value="Non PO">
                                    Non PO
                                 </option>
                              </select>

                              <i class="fas fa-chevron-down select-arrow"></i>
                           </div>
                        </div>


                        {{-- IPB --}}
                        <div class="col-md-6 mb-3">
                           <label class="form-label-modern">
                              <i class="fas fa-id-card"></i>
                              IPB Status
                           </label>

                           <div class="input-modern">
                              <i class="fas fa-check-circle"></i>

                              <select id="ipb" name="ipb">
                                 <option value="">Select IPB Status</option>
                                 <option {{$vessel->ipb == 'IPB' ? 'selected' : ''}} value="IPB">
                                    IPB
                                 </option>
                                 <option {{$vessel->ipb == 'Non IPB' ? 'selected' : ''}} value="Non IPB">
                                    Non IPB
                                 </option>
                              </select>

                              <i class="fas fa-chevron-down select-arrow"></i>
                           </div>
                        </div>


                        {{-- Function --}}
                        <div class="col-md-6 mb-3">
                           <label class="form-label-modern">
                              <i class="fas fa-cogs"></i>
                              Function
                           </label>

                           <div class="input-modern">
                              <i class="fas fa-cogs"></i>

                              <select id="func" name="func">
                                 <option value="">Select Function</option>
                                 <option {{$vessel->func == 'Empty' ? 'selected' : ''}} value="Empty">
                                    Non Function
                                 </option>
                                 <option {{$vessel->func == 'WI' ? 'selected' : ''}} value="WI">
                                    WI
                                 </option>
                                 <option {{$vessel->func == 'Drilling' ? 'selected' : ''}} value="Drilling">
                                    Drilling
                                 </option>
                                 <option {{$vessel->func == 'Project' ? 'selected' : ''}} value="Project">
                                    Project
                                 </option>
                                 <option {{$vessel->func == 'Security' ? 'selected' : ''}} value="Security">
                                    Security
                                 </option>
                              </select>

                              <i class="fas fa-chevron-down select-arrow"></i>
                           </div>
                        </div>

                     </div>


                     {{-- ACTION --}}
                     <div class="form-actions">

                        <button type="submit" class="btn-update">
                           <i class="fas fa-save mr-1"></i>
                           Update Vessel
                        </button>

                        <a href="#"
                           class="btn-reset"
                           data-toggle="modal"
                           data-target="#modalResetPassword">

                           <i class="fas fa-key"></i>
                           <span>Reset Password</span>
                        </a>

                     </div>

                  </form>

               </div>

            </div>

            <div class="card">
               <div class="card-body">
                  <div class="badge badge-light">Contract Histories</div>
                  
                  <table class="table table-sm w-100 border mt-2">
                     <tbody>
                        {{-- <tr>
                           <td class="border" colspan="2"><b>Total Contracts:</b> {{ count($contracts) }} </td>
                        </tr> --}}
                        <tr>
                           <td class="border">No. Kontrak</td>
                           <td class="border">Period</td>
                        </tr>
                        @foreach ($contracts as $con)
                           <tr>
                              <td class="border">{{ $con->contract_number }}</td>
                              <td class="border">{{ formatDate($con->start_date) }} to {{ formatDate($con->end_date) }}</td>
                           </tr>
                              
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
            

            

            
            
         </div>

         <div class="col-md-8">
            <div class="card">
               <div class="card-body">
                  
                     
                  

                  <p>
                     <a class="btn btn-light border" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <i class="fas fa-plus"></i> Add Contract
                     </a>
                     <hr>
                     {{-- <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Button with data-target
                     </button> --}}
                     </p>
                     <div class="collapse p-0" id="collapseExample">
                     
                        
                        <form action="{{ route('contract.store') }}" method="POST">
                           @csrf
                           {{-- @method('PUT') --}}
                           <input type="number" name="vessel_id" id="vessel_id" value="{{$vessel->id}}" hidden>

                           <div class="row ">
                              <div class="col-md-6">
                                 <table class="w-100 border mt-2">
                                    <tbody>
                                       <tr>
                                          <td class="border">Contract Number</td>
                                          <td class="border" colspan="2">
                                             <input type="text" class="w-100 py-1" required name="contract_number" id="contract_number" value="{{ old('contract_number') }}">
                                          </td>
                                       </tr>
                                          <tr>
                                          <td class="border">Contract Type</td>
                                          <td class="border" colspan="2">
                                             <select  class="w-100 py-1" required id="contract_type" required name="contract_type" >
                                                <option value="" disabled selected>Select Contract</option>
                                                <option {{ $activeContract->end_date ?? old('contract_type') == 'Under PO' ? 'selected' : ''}} value="Under PO">Under PO</option>
                                                <option {{ $activeContract->end_date ?? old('contract_type') == 'Non PO' ? 'selected' : ''}} value="Non PO">Non PO</option>
                                             </select>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td class="border">IPB {{$vessel->ipb ?? ''}}</td>
                                          <td class="border" colspan="2">
                                             <select  class="w-100 py-1" required id="ipb"  name="ipb" >
                                                <option value="" disabled selected>Select IPB / Non IPB</option>
                                                <option {{ $activeContract->ipb ?? old('ipb') == 'IPB' ? 'selected' : ''}} value="IPB">IPB</option>
                                                <option {{ $activeContract->ipb ?? old('ipb') == 'Non IPB' ? 'selected' : ''}} value="Non IPB">Non IPB</option>
                                                
                                             </select>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td class="border">Func</td>
                                          <td class="border" colspan="2">
                                             <select  class="w-100 py-1" required id="func"  name="func" >
                                                <option value="" disabled selected>Select Func</option>
                                                <option {{ $activeContract->func ?? old('func') =='Empty' ? 'selected' : '' }} value="Empty" >Non Func</option>
                                                <option {{ $activeContract->func ?? old('func') == 'WI' ? 'selected' : ''}} value="WI">WI</option>
                                                <option {{ $activeContract->func ?? old('func') == 'Drilling' ? 'selected' : ''}} value="Drilling">Drilling</option>
                                                <option {{ $activeContract->func ?? old('func') == 'Project' ? 'selected' : ''}} value="Project">Project</option>
                                                <option {{ $activeContract->func ?? old('func') == 'Security' ? 'selected' : ''}} value="Security">Security</option>
                                                
                                             </select>
                                          </td>
                                       </tr>
                                       
                                       {{-- <tr>
                                          <td class="border">Status</td>
                                          <td class="border" colspan="2">
                                             <select name="status" id="status" required class="w-100 py-1">
                                                <option value="1">Active</option>
                                                <option value="0">Disable</option>
                                             </select>
                                          </td>
                                       </tr> --}}
                                    </tbody>
                                 </table>
                              </div>

                              <div class="col-md-6">
                                 <table class="w-100 border mt-2">
                                    <tbody>
                                       <tr>
                                          <td class="border">Start Date</td>
                                          <td class="border" colspan="2">
                                             <input type="date" name="contract_start" required id="contract_start" class="w-100 py-1" value="{{ $activeContract->end_date ?? old('contract_start') }}">
                                          </td>
                                       </tr>
                                       <tr>
                                          <td class="border">End Date</td>
                                          <td class="border" colspan="2">
                                             <input type="date" name="contract_end" required id="contract_end" class="w-100 py-1" value="{{ old('contract_end') }}">
                                          </td>
                                       </tr>
                                       
                                       {{-- <tr>
                                          <td class="border">Status</td>
                                          <td class="border" colspan="2">
                                             <select name="status" id="status" class="w-100 py-1">
                                                <option value="1">Active</option>
                                                <option value="">Disable</option>
                                             </select>
                                          </td>
                                       </tr> --}}
                                    </tbody>
                                 </table>
                              </div>
                           </div>

                           <button class="btn btn-primary mt-3 mb-2" type="submit">Submit New Contract</button> <br>
                           
                           <small>Data VDR kapal {{ $vessel->name }} pada rentang tanggal periode kontrak yg dipilih pada form akan otomatis diubah sesuai data kontrak yang disubmit</small>
                           <hr>

                        </form>
                        
                     </div>

                     @if ($activeContract)
                        <div class="badge badge-info">Current Contract </div>
                           <form action="{{ route('contract.update.details') }}" method="POST">
                           @csrf
                           @method('PUT')
                           <input type="number" name="activeContractId" id="activeContractId" value="{{ $activeContract->id }}" hidden>
                           <div class="row ">
                              <div class="col-md-6">
                                 <table class="w-100 border mt-2">
                                    <tbody>
                                       <tr>
                                          <td class="border">Contract Number</td>
                                          <td class="border" colspan="2">
                                             <input type="text" class="w-100 py-1" name="update_contract_number" id="update_contract_number" value="{{ $activeContract->contract_number }}">
                                          </td>
                                       </tr>
                                       <tr>
                                          <td class="border">Contract Type</td>
                                          <td class="border" colspan="2">
                                             <select  class="w-100 py-1" id="update_type" required name="update_type" >
                                                <option value="" disabled selected>Select Contract</option>
                                                <option {{$activeContract->type == 'Under PO' ? 'selected' : ''}} value="Under PO">Under PO</option>
                                                <option {{$activeContract->type == 'Non PO' ? 'selected' : ''}} value="Non PO">Non PO</option>
                                             </select>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td class="border">IPB</td>
                                          <td class="border" colspan="2">
                                             <select  class="w-100 py-1" id="update_ipb"  name="update_ipb" >
                                                <option value="" disabled selected>Select IPB / Non IPB</option>
                                                <option {{$activeContract->ipb == 'IPB' ? 'selected' : ''}} value="IPB">IPB</option>
                                                <option {{$activeContract->ipb == 'Non IPB' ? 'selected' : ''}} value="Non IPB">Non IPB</option>
                                                
                                             </select>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td class="border">Func</td>
                                          <td class="border" colspan="2">
                                             <select  class="w-100 py-1" id="update_func"  name="update_func" >
                                                <option value="" disabled selected>Select Func</option>
                                                <option value="Empty" >Empty</option>
                                                <option {{$activeContract->func == 'Empty' ? 'selected' : ''}} value="Empty">Non Func</option>
                                                <option {{$activeContract->func == 'WI' ? 'selected' : ''}} value="WI">WI</option>
                                                <option {{$activeContract->func == 'Drilling' ? 'selected' : ''}} value="Drilling">Drilling</option>
                                                <option {{$activeContract->func == 'Project' ? 'selected' : ''}} value="Project">Project</option>
                                                <option {{$activeContract->func == 'Security' ? 'selected' : ''}} value="Security">Security</option>
                                                
                                             </select>
                                          </td>
                                       </tr>
                                       
                                       <tr>
                                          <td class="border">Status</td>
                                          <td class="border" colspan="2">
                                             <select name="update_status" id="update_status" class="w-100 py-1">
                                                <option {{$activeContract->status == 1 ? 'selected' : ''}} value="1">Active</option>
                                                <option {{$activeContract->status == 0 ? 'selected' : ''}} value="0">Disable</option>
                                             </select>
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>

                              <div class="col-md-6">
                                 <table class="w-100 border mt-2">
                                    <tbody>
                                       <tr>
                                          <td class="border">Start Date</td>
                                          <td class="border" colspan="2">
                                             <input type="date" name="update_start_date" id="update_start_date" class="w-100 py-1" value="{{ $activeContract->start_date }}">
                                          </td>
                                       </tr>
                                       <tr>
                                          <td class="border">End Date</td>
                                          <td class="border" colspan="2">
                                             <input type="date" name="update_end_date" id="update_end_date" class="w-100 py-1" value="{{ $activeContract->end_date }}">
                                          </td>
                                       </tr>
                                       
                                       
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                           <div class="table-responsive mt-2" >
                              
                           
                              <table class="w-100 border ">
                              
                                 <thead>
                                    
                                    <tr class=" bg-lgray ">
                                       {{-- <th><input type="checkbox" name="" id="checkboxAll"></th> --}}
                                       <th class="border py-2">Operating Mode</th>
                                       <th class="border py-2">Min. Speed as Contract (Knots) <br> </th>
                                       <th class="border py-2" >Contractual Fuel Cons.
                                          Remuneration Figures</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach ($activeContract->details as $detail)
                                    <input type="text" name="detailId[]" id="detailId" value="{{$detail->id}}" hidden>
                                       <tr>
                                          <td class="text-truncate border">{{$detail->heading->description}}</td>
                                          <td class="text-truncate border">
                                             <input type="number" name="speed[]" id="speed" value="{{$detail->speed}}">
                                          </td>
                                          <td class="text-truncate border">
                                             <input type="number" name="contractual_fuel[]" id="contractual_fuel" value="{{$detail->contractual_fuel}}">
                                          </td>
                                       </tr>
                                    @endforeach
                                    
                                       
                                    
                     
                                    
                                 </tbody>
                              </table>
                              
                              <small>Note: Data diatas akan ditampilkan ketika <i>User Kapal</i> membuat VDR Online .</small>
                           </div>
                           <br>
                           <button class="btn btn-primary" type="submit">Save Update</button>
                           <small class="">Klik 'Save Update', akan merubah data semua VDR pada table 'VDRs in Current Contrcat'</small>
                           
                           <hr>
                           </form>
                           <a href="#" class="text-danger mt-" data-toggle="modal" data-target="#modalDeleteContract">Delete Contract...</a>
                     @else
                           <p class="text-danger"><i>No Active Contract</i></p>
                     @endif
                     
               </div>
            </div>

            <div class="card">
               <div class="card-body">
                  <div class="badge badge-light">VDRs in Current Contract</div>
                  <div class="badge badge-light">{{ count($vdrs) }} VDR</div>
                  <div class="table-responsive mt-2">
                     <table class="table table-bordered table-sm datatables-vdr ">
                        <thead>
                           <tr>
                              <th>VDR ID</th>
                              <th>No. Kontrak</th>
                              <th>Date</th>
                              
                              <th>Status</th>
                              {{-- <th>Speed (Knots)</th>
                              <th>Fuel Cons. (Liters)</th> --}}
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($vdrs as $vdr)
                              <tr class="border-bottom">
                                 <td class=""><a href="{{route('vdr.show.spa', [enkripRambo($vdr->id), enkripRambo('index')])}}"> {{ $vdr->code }}</a></td>
                                 <td>{{ $vdr->contract }}</td>
                                 <td>{{ $vdr->date }}</td>
                                 
                                 <td>
                                    <x-status-stisla.vdr :vdr="$vdr" />
                                 </td>
                                 {{-- <td>{{ $vdr->speed }}</td>
                                 <td>{{ $vdr->fuel_consumption }}</td> --}}
                              </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            
            
         </div>
      </div>
               
            
      <hr>
        
   </div>
</section>


  {{-- @foreach ($vessels as $vessel)
  <div class="modal fade" id="vessel-onhire-{{$vessel->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirm On Hire</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Change Status of {{$vessel->name}} to On Hire?
        </div>
        <div class="modal-footer bg-whitesmoke">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a href="{{route('vessel.onhire', enkripRambo($vessel->id))}}" class="btn btn-primary">On</a>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="vessel-offhire-{{$vessel->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirm Off Hire</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Change Status of {{$vessel->name}} to Off Hire?
        </div>
        <div class="modal-footer bg-whitesmoke">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a href="{{route('vessel.offhire', enkripRambo($vessel->id))}}" class="btn btn-primary">Off</a>
        </div>
      </div>
    </div>
  </div>
  @endforeach --}}

  @if ($activeContract)
      <div class="modal fade" id="modalDeleteContract" tabindex="1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
         
         
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Delete Contract</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               Hapus data kontrak ?
               <hr>
               
               <table>
                  <tbody>
                     <tr>
                        <td><b>Contract Number:</b> {{ $activeContract->contract_number }}</td>
                     </tr>
                     <tr>
                        <td><b>Type:</b> {{ $activeContract->type }}</td>
                     </tr>
                     <tr>
                        <td><b>Start Date:</b> {{ $activeContract->start_date }}</td>
                     </tr>
                     <tr>
                        <td><b>End Date:</b> {{ $activeContract->end_date }}</td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <div class="modal-footer bg-whitesmoke">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <a href="{{route('contract.delete', enkripRambo($activeContract->id))}}"  class="btn btn-danger">Delete Contract</a>
            </div>
         </div>
      </div>
   </div>
  @endif

  <div class="modal fade" id="modalResetPassword" tabindex="-1" role="dialog"  aria-hidden="true">
   <div class="modal-dialog " role="document">
      <form action="{{route('pass.reset.admin')}}" method="POST" enctype="multipart/form-data">
         @csrf
         @method('PUT')
         
         <input type="hidden" name="vessel_id" value="{{$vessel->id}}" id="">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Reset Password</h5>

               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
               
            </div>
            <div class="modal-body">
               
               <b>{{$vessel->name}}</b>
               <hr>
               Password lama akan digantikan dengan password default (mars@2026) dan user akan diminta untuk mengganti password saat login berikutnya.
               {{-- <div class="badge badge-info">Approval 1</div> --}}
               


               
               
            </div>
            <div class="modal-footer bg-whitesmoke">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-danger">Reset</button>
            </div>
         </div>
      </form>
   </div>
</div>
   
  
    
@endsection