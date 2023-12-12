@extends('layouts.stisla.app')
@section('title')
    User
@endsection
@section('content')
<section class="section">
    <div class="section-header">
      <h1 class="section-title">User Management</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item "><a href="{{route('dsp.user')}}">Dashboard</a></div>
        <div class="breadcrumb-item active">User</div>
      </div>
    </div>

    <div class="section-body">
      {{-- <h2 class="section-title">Schedule Plan</h2>
      <p class="section-lead">
        We use 'DataTables' made by @SpryMedia. You can check the full documentation <a href="https://datatables.net/">here</a>.
      </p> --}}

      <div class="row">
        {{-- <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <form action="">
                <div class="form-row">
                  <div class="form-group col-md-6">
                      <label>Type</label>
                      <select style="background-color: lightgrey" class="custom-select" id="activity" name="activity">
                          <option  disabled selected>Choose one</option>
                          @foreach ($activities as $activity)
                              <option {{ old('activity') == $activity->id ? 'selected' : ''}} value="{{$activity->id}}">{{$activity->name}}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group col-md-6">
                      <label for="date">Date</label>
                      <input style="background-color: lightgrey" type="date" class="form-control date origin input" id="date" name="date" >
                  </div>
                  
              </div>
              </form>
            </div>
          </div>
        </div> --}}
        <div class="col-12">
          <div class="card">
            {{-- <div class="card-header">
              <h4>Basic DataTables</h4>
            </div> --}}
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-sm" id="table-1">
                  <thead>
                    <tr>
                        <th class="text-center">No.</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                    @if ($user->hasRole('vessel'))
                        @else
                        <tr>
                          <td class="text-center">{{++$i}}</td>
                          <td>
                            {{-- <a href="{{route('vessel.detail', enkripRambo($user->id))}}">{{$user->name}}</a>  --}}
                            {{$user->name}}
                          </td>
                          <td>{{$user->getPortName()}}</td>
                          
                          <td>{{$user->username}}</td>
                          <td>{{$user->email}}</td>
                          <td>
                            @if ($user->hasRole('department'))
                                User
                                @elseif($user->hasRole('vessel'))
                                Vessel
                                @elseif($user->hasRole('marine'))
                                Admin
                            @endif
                          </td>
                          <td>
                            <div class="btn-group btn-sm">
                              <a href="" class="btn btn-primary btn-sm">Edit</a>
                              <a href="" class="btn btn-danger btn-sm">Delete</a>
                            </div>
                          </td>
                        </tr>
                    @endif
                    
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
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
  
    
@endsection