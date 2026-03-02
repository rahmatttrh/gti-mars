@extends('layouts.stisla.app-main')
@section('title')
   Images Feed
@endsection

@section('content')

<div class="card shadow-sm border">          
   <div class="card-body">
      <div class="row">
         <div class="col-md-3">
            <form action="{{route('images.store')}}" method="POST" enctype="multipart/form-data">
               @csrf
               <div class="form-row">
                        
                  <div class="form-group col-md-12">
                     <label for="image">Image*</label>
                     <input type="file" class="form-control "  required id="image" name="image" >
                  </div>
                  <div class="form-group col-md-12">
                     <label for="desc">Description</label>
                     <input type="text" class="form-control "   id="desc" name="desc" >
                  </div>
               </div>
               
               <button type="submit" class="btn btn-info">Add</button>
            </form>
         </div>
         <div class="col-md-9">
            <div class="table-responsive">
               <table class="table table-sm table-striped" id="table-8">
                  <thead>     
                                                
                  <tr>
                     
                     <th>Image</th>
                     <th>Desc</th>
                     <th></th>
                  </tr>
                  </thead>
                  <tbody>     
                     @foreach ($images as $img)
                         <tr>
                         <td>
                           <img width="120" src="{{asset('storage/' . $img->url)}}" alt="..." class="img-thumbnail">
                         </td>
                         <td>{{$img->desc}}</td>
                         <td>
                           <div class="btn-group">
                              <a href="{{route('images.delete', enkripRambo($img->id))}}" class="btn btn-danger btn-sm">Delete</a>
                           </div>
                         </td>
                        </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

