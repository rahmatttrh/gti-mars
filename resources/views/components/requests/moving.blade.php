<div class="card card-lg mb-4">
   <div class="table-responsive">
      <table class="table table-vcenter card-table">
         <thead>
            <tr>
               <th>{{$request->bcm ?? '-'}} / {{$request->department->name}} / {{$request->employee->name ?? ''}} </th>
            </tr>
            <tr>
               <th>{{$request->activity->name ?? ''}} - {{$request->description}}</th>
            </tr>
         </thead>
      </table>
      
     
   </div>
</div> 
  