@extends('layouts.stisla.app')
@section('title')
    Dashboard
@endsection
@section('content')
   <section class="section">
      <div class="row">
         <div class="col-md-12">
            <div class="card shadow-lg">
               {{-- <div class="card-header">
                  <small>INTERMILAN</small>
               </div> --}}
               <div class="card-body">
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><div class="badge badge-danger">1</div></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="enc-tab" data-toggle="tab" href="#enc" role="tab" aria-controls="enc" aria-selected="false"><div class="badge badge-danger">2</div> </a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><div class="badge bg-darkgreen">3</div></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><div class="badge bg-darkgreen">4</div></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="one" aria-selected="false"><div class="badge badge-danger">5</div></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><div class="badge bg-darkgreen">6</div></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><div class="badge bg-darkgreen">7</div></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><div class="badge bg-darkgreen">8</div></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><div class="badge bg-darkgreen">9</div></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><div class="badge bg-darkgreen">10</div></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><div class="badge bg-darkgreen">11</div></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><div class="badge bg-darkgreen">12</div></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><div class="badge bg-darkgreen">13</div></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><div class="badge bg-darkgreen">14</div></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><div class="badge bg-darkgreen">15</div></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><div class="badge bg-darkgreen">16</div></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><div class="badge bg-darkgreen">17</div></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><div class="badge bg-darkgreen">18</div></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><div class="badge bg-darkgreen">19</div></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><div class="badge bg-darkgreen">20</div></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><div class="badge bg-darkgreen">21</div></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><div class="badge bg-darkgreen">22</div></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><div class="badge bg-darkgreen">23</div></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><div class="badge bg-darkgreen">24</div></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><div class="badge bg-darkgreen">25</div></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><div class="badge bg-darkgreen">26</div></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><div class="badge bg-darkgreen">27</div></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><div class="badge bg-darkgreen">28</div></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><div class="badge bg-darkgreen">29</div></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><div class="badge bg-darkgreen">30</div></a>
                     </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                     <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card shadow-none border">
                           <div class="card-body">
                              <b>ENC ONE</b> 
                              <span>Distribute Material</span> <br>
                              Kalijapat 4 - Pabelokan - COSL 222 - COSL 223 - Winner
            
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="enc" role="tabpanel" aria-labelledby="enc-tab">
                        <div class="card shadow-none border">
                           <div class="card-body">
                              <b>GIAT JAYA</b> 
                              <span>Distribute Material</span> <br>
                               Kalijapat 4 - Pabelokan - COSL 222 - COSL 223 - Winner
            
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="one" role="tabpanel" aria-labelledby="one-tab">
                        <div class="card shadow-none border">
                           <div class="card-body">
                              <b>TRANSKO BALIHE</b> 
                              <span>Distribute Material</span> <br>
                               Kalijapat 4 - Pabelokan - COSL 222 - COSL 223 - Winner
            
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="card shadow-none border">
                           <div class="card-body text-center">
                              <small>Data Empty</small>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="card shadow-lg" id="schedule">
               <div class="card-body">
                  {{-- <small><b>Intermilan</b></small>
                  <hr> --}}
                  <div class="table-responsive">
                  <table class="table table-striped table-sm" id="table-12">
                     <thead>                                 
                        <tr>
                        <th class="text-center">
                           #
                        </th>

                        <th>ID</th>
                        <th>Activity</th>
                        <th>Location (From - To)</th>
                        <th>Required Boat</th>
                        <th>Boat Assigned</th>
                        <th>Date</th>
                        {{-- <th class="text-center">Status</th> --}}
                        {{-- <th></th> --}}
                        </tr>
                     </thead>
                     <tbody>     
                        @foreach ($requests as $req)
                           <tr>
                              <td>{{++$i}}</td>
                              <td>{{$req->code}}</td>
                              <td>{{$req->activity->name}}  {{$req->origin_id != null ? 'from ' . $req->origin->name : ''}}</td>
                              <td>{{$req->origin_id != null ? $req->origin->name : ''}} to {{$req->destination_id != null ? $req->destination->name : ''}}</td>
                              <td>{{$req->schedule->vessel->type}}</td>
                              <td>{{$req->schedule->vessel->name}}</td>
                              <td>{{formatDate($req->schedule->date)}}</td>
                              {{-- <td>-</td> --}}
                           </tr>
                        @endforeach                            
                        
                     </tbody>
                  </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
@endsection

@push('autorefresh')
<script type="text/javascript">
   window.setTimeout( function() {
       window.location.reload();
   }, 300000);
</script>
@endpush
