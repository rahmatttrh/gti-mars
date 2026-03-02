@extends('layouts.stisla.app')
@section('title')
    Dashboard User
@endsection
@section('content')
<section class="section">
    <div class="section-header">
      <h1 class="section-title">Dashboard User</h1>
      {{-- <div class="section-header-breadcrumb">
        <div class="breadcrumb-item "><a href="/">Dashboard</a></div>
        <div class="breadcrumb-item active">Schedule Detail</div>
      </div> --}}
    </div>

    <div class="section-body">
      {{-- <h2 class="section-title">Schedule Plan</h2>
      <p class="section-lead">
        We use 'DataTables' made by @SpryMedia. You can check the full documentation <a href="https://datatables.net/">here</a>.
      </p> --}}

      <div class="row">
        <div class="col-md-5">
          <div class="card profile-widget">
            <div class="profile-widget-header">                     
              <img alt="image" src="{{asset('stisla/img/avatar/avatar-1.png ')}}" class="rounded-circle profile-widget-picture">
              <div class="profile-widget-items">
                <div class="profile-widget-item">
                  <div class="profile-widget-item-label">Draft Req</div>
                  <div class="profile-widget-item-value">{{$requests->where('status', 0)->count()}}</div>
                </div>
                <div class="profile-widget-item">
                  <div class="profile-widget-item-label">Progress Req</div>
                  <div class="profile-widget-item-value">{{$requests->where('status', '>', 0)->count()}}</div>
                </div>
                <div class="profile-widget-item">
                  <div class="profile-widget-item-label">Complete Req</div>
                  <div class="profile-widget-item-value">{{$requests->where('status', 12)->count()}}</div>
                </div>
              </div>
              
            </div>
            <div class="profile-widget-description">
              <div class="profile-widget-name">{{$user->name}} <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> {{$user->port->name}}</div></div>
              <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Cras justo odio
                  <span class="badge badge-primary badge-pill">14</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Dapibus ac facilisis in
                  <span class="badge badge-primary badge-pill">2</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Morbi leo risus
                  <span class="badge badge-primary badge-pill">1</span>
                </li>
              </ul>
            </div>
            
          </div>
        </div>
        <div class="col-md-7">
          <div class="card">
            <div class="card-header">
              <h4>Basic DataTables</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>                                 
                    <tr>
                      <th class="text-center">
                        #
                      </th>
                      <th>Task Name</th>
                      <th>Progress</th>
                      <th>Members</th>
                      <th>Due Date</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>                                 
                    <tr>
                      <td>
                        1
                      </td>
                      <td>Create a mobile app</td>
                      <td class="align-middle">
                        <div class="progress" data-height="4" data-toggle="tooltip" title="100%">
                          <div class="progress-bar bg-success" data-width="100%"></div>
                        </div>
                      </td>
                      <td>
                        <img alt="image" src="assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Wildan Ahdian">
                      </td>
                      <td>2018-01-20</td>
                      <td><div class="badge badge-success">Completed</div></td>
                      <td><a href="#" class="btn btn-secondary">Detail</a></td>
                    </tr>
                    <tr>
                      <td>
                        2
                      </td>
                      <td>Redesign homepage</td>
                      <td class="align-middle">
                        <div class="progress" data-height="4" data-toggle="tooltip" title="0%">
                          <div class="progress-bar" data-width="0"></div>
                        </div>
                      </td>
                      <td>
                        <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Nur Alpiana">
                        <img alt="image" src="assets/img/avatar/avatar-3.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Hariono Yusup">
                        <img alt="image" src="assets/img/avatar/avatar-4.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Bagus Dwi Cahya">
                      </td>
                      <td>2018-04-10</td>
                      <td><div class="badge badge-info">Todo</div></td>
                      <td><a href="#" class="btn btn-secondary">Detail</a></td>
                    </tr>
                    <tr>
                      <td>
                        3
                      </td>
                      <td>Backup database</td>
                      <td class="align-middle">
                        <div class="progress" data-height="4" data-toggle="tooltip" title="70%">
                          <div class="progress-bar bg-warning" data-width="70%"></div>
                        </div>
                      </td>
                      <td>
                        <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Rizal Fakhri">
                        <img alt="image" src="assets/img/avatar/avatar-2.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Hasan Basri">
                      </td>
                      <td>2018-01-29</td>
                      <td><div class="badge badge-warning">In Progress</div></td>
                      <td><a href="#" class="btn btn-secondary">Detail</a></td>
                    </tr>
                    <tr>
                      <td>
                        4
                      </td>
                      <td>Input data</td>
                      <td class="align-middle">
                        <div class="progress" data-height="4" data-toggle="tooltip" title="100%">
                          <div class="progress-bar bg-success" data-width="100%"></div>
                        </div>
                      </td>
                      <td>
                        <img alt="image" src="assets/img/avatar/avatar-2.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Rizal Fakhri">
                        <img alt="image" src="assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Isnap Kiswandi">
                        <img alt="image" src="assets/img/avatar/avatar-4.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Yudi Nawawi">
                        <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Khaerul Anwar">
                      </td>
                      <td>2018-01-16</td>
                      <td><div class="badge badge-success">Completed</div></td>
                      <td><a href="#" class="btn btn-secondary">Detail</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  
  
    
@endsection




