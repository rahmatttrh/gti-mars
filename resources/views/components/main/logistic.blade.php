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
</style>


      <div class="row">
         
         <div class="col-md-8">
            {{-- <div class="card">
               <div class="card-header">
                 <h4>Invoices</h4>
                 <div class="card-header-action">
                   <a href="#" class="btn btn-danger"
                     >View More <i class="fas fa-chevron-right"></i
                   ></a>
                 </div>
               </div>
               <div class="card-body p-0">
                 <div class="table-responsive table-invoice">
                   <table class="table table-striped" id="table-6">
                     <tr>
                       <th>Invoice ID</th>
                       <th>Customer</th>
                       <th>Status</th>
                       <th>Due Date</th>
                       <th>Action</th>
                     </tr>
                     <tr>
                       <td><a href="#">INV-87239</a></td>
                       <td class="font-weight-600">Kusnadi</td>
                       <td><div class="badge badge-warning">Unpaid</div></td>
                       <td>July 19, 2018</td>
                       <td>
                         <a href="#" class="btn btn-primary">Detail</a>
                       </td>
                     </tr>
                     <tr>
                       <td><a href="#">INV-48574</a></td>
                       <td class="font-weight-600">Hasan Basri</td>
                       <td><div class="badge badge-success">Paid</div></td>
                       <td>July 21, 2018</td>
                       <td>
                         <a href="#" class="btn btn-primary">Detail</a>
                       </td>
                     </tr>
                     <tr>
                       <td><a href="#">INV-76824</a></td>
                       <td class="font-weight-600">Muhamad Nuruzzaki</td>
                       <td><div class="badge badge-warning">Unpaid</div></td>
                       <td>July 22, 2018</td>
                       <td>
                         <a href="#" class="btn btn-primary">Detail</a>
                       </td>
                     </tr>
                     <tr>
                       <td><a href="#">INV-84990</a></td>
                       <td class="font-weight-600">Agung Ardiansyah</td>
                       <td><div class="badge badge-warning">Unpaid</div></td>
                       <td>July 22, 2018</td>
                       <td>
                         <a href="#" class="btn btn-primary">Detail</a>
                       </td>
                     </tr>
                     <tr>
                       <td><a href="#">INV-87320</a></td>
                       <td class="font-weight-600">Ardian Rahardiansyah</td>
                       <td><div class="badge badge-success">Paid</div></td>
                       <td>July 28, 2018</td>
                       <td>
                         <a href="#" class="btn btn-primary">Detail</a>
                       </td>
                     </tr>
                   </table>
                 </div>
               </div>
            </div> --}}
            {{-- <div class="badge badge-info">DSP</div> --}}
            <div class="table-responsive">
               <table class="" id="table-6">
                  <thead >
                     <tr>
                        <th colspan="4" class="py-1">Manifest Validation</th>
                     </tr>
                     <tr>
                        {{-- <th class="text-center">No</th> --}}
                        <th>Vessel</th>
                        <th>ID</th>
                        <th>Date</th>
                        <th style="width: 120px">Status</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($schedules as $sche)
                         <tr>
                           <td><a href="{{route('schedule.detail', enkripRambo($sche->id))}}"> {{$sche->vessel->name ?? ' Vessel Empty'}}</a></td>
                           <td>{{$sche->code}}</td>
                           <td>{{formatDate($sche->date)}}</td>
                           <td><x-status-stisla.schedule :schedule="$sche" /></td>
                         </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
            
         </div>
         <div class="col-md-4">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corporis, mollitia nisi sequi vero pariatur numquam in eum suscipit. Consectetur mollitia exercitationem natus quibusdam quo rem, molestiae eveniet, id ut nulla dolorum corporis obcaecati, omnis quam perferendis provident. Itaque ad mollitia quisquam, saepe nostrum ab! Unde.</p>
         </div>
      </div>
   <hr>
   <small>Please pay attention to the alert table on the right</small>


