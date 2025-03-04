@extends('layouts.stisla.app')
@section('title')
    VDR Create
@endsection
@section('content')
<section class="section">
    <div class="section-header">
      <h1 class="section-title">VDR Create</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item "><a href="/">Dashboard</a></div>
        <div class="breadcrumb-item active">VDR Create</div>
      </div>
    </div>

    <div class="section-body">
        {{-- <h2 class="section-title">Schedule Plan</h2>
        <p class="section-lead">
            We use 'DataTables' made by @SpryMedia. You can check the full documentation <a href="https://datatables.net/">here</a>.
        </p> --}}
        @if ($errors->any())
        <div class="alert alert-danger text-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li><small>{{ $error }}</small></li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{route('vdr.store')}}" method="POST">
            @csrf
            <input type="hidden" name="vessel_id" value="{{$vessel->id}}" id="">
            <input type="hidden" name="created_by" value="{{$user->name}}">
            <div class="row">
                <div class="col-4">
                    <div class="card border shadow-sm">
                        <div class="card-header">
                        <h4>{{$user->name}}</h4>
                        </div>
                        <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="date" name="date" >
                            </div>
                            <div class="form-group col-md-6">
                                <label for="location_midnight">Location (Midnight)</label>
                                <input type="text" class="form-control" required id="location_midnight" name="location_midnight">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="onduty">On Duty</label>
                            <input type="number" class="form-control" required id="onduty" name="onduty" >
                            </div>
                            <div class="form-group col-md-6">
                            <label for="max">Pax</label>
                            <input type="number" class="form-control" required id="max" name="max" >
                            </div>
                            
                        </div>
                        {{-- <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress2">Address 2</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputCity">City</label>
                            <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-4">
                            <label for="inputState">State</label>
                            <select id="inputState" class="form-control">
                                <option selected>Choose...</option>
                                <option>...</option>
                            </select>
                            </div>
                            <div class="form-group col-md-2">
                            <label for="inputZip">Zip</label>
                            <input type="text" class="form-control" id="inputZip">
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Check me out
                            </label>
                            </div>
                        </div> --}}
                        </div>
                        <div class="card-footer bg-whitesmoke">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
  </section>
    
@endsection