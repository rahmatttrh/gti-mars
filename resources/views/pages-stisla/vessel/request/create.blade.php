@extends('layouts.stisla.app')
@section('title')
	DSP Create Request
@endsection
@section('content')
   <section class="section">
      

      <div class="section-body">
         <div class="row">
            <div class="col-md-5">
               @if ($errors->any())
                  <div class="alert alert-danger">
                     @foreach ($errors->all() as $err)
                        {{ $err }}
                     @endforeach
                  </div>
               @endif
               <div class="card border shadow-sm">
                  <form action="{{ route('request.vessel.store') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <div class="card-body">
                        <div class="form-row">
                           <div class="form-group col-md-7">
                              <label>Type*</label>
                              <select class="custom-select" id="activity" style="background-color: lightgrey" required name="activity">
                                 <option disabled selected>Choose one</option>
                                 <option value="5">Fuel Oil</option>
                                 <option value="6">Fresh Water</option>
                              </select>
                           </div>
                           <div class="form-group col-md-5">
                              <label for="date">Date*</label>
                              <input class="form-control date origin input" id="date" style="background-color: lightgrey" type="date" required name="date">
                           </div>
                        </div>
                        

                        <div class="form-row qty">
                           <div class="form-group col-md-12">
                              <label for="qty">Quantity (KL)</label>
                              <input class="form-control mb-2" id="qty" type="text" style="background-color: lightgrey" value="{{ old('qty') }}" name="qty">
                           </div>
                        </div>

                        <div class="form-row">
                           <div class="form-group col-md-12">
                              <label for="desc">Description</label>
                              <input class="form-control mb-2" id="desc" type="text" style="background-color:lightgrey" value="{{ old('desc') }}" name="desc">
                           </div>
                        </div>
                        <button class="btn btn-info" type="submit">Submit</button>
                     </div>
                     {{-- <div class="card-footer bg-whitesmoke">
                        <button class="btn btn-primary" type="submit">Submit</button>
                     </div> --}}
                  </form>
               </div>
            </div>      
         </div>
      </div>
   </section>
@endsection

